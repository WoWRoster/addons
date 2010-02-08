<?php
if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}
/**
 * Addon Update class
 * This MUST be the same name as the addon basename
 */
include ($addon['inc_dir'].'b.php');
 
class progressUpdate
{

var $messages = '';		// Update messages
	var $data = array();		// Addon config data automatically pulled from the addon_config table
	var $files = array();
	var $evid = '';
	var $evt = '0';
	var $debuging_flag = '0';
	var $a = Array();
	var $cfg = array();
	
	function progressUpdate($data)
	{
		global $roster, $update, $addon;
		
		$this->data = $data;

	}
		/**
	 * Resets addon messages
	 */
	function reset_messages()
	{
		$this->messages = '';
	}
	/*
	     ok we are updating for each guild updated in the lua because this will save on
	     processing time, soon i will add a config option to select what type of update to use 
	     when getting and updating the data.. but for now its each guild..
      */
      function getbossid( $boss)
      {
            global $roster, $addon;
            
            $sql2 = "SELECT * FROM `".$roster->db->table('boss',$this->data['basename'])."` WHERE `b_name` = '".addslashes($boss)."' and `guild_id` = '".$roster->data['guild_id']."'";
            $result2 = $roster->db->query($sql2) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql2);
            $row2 = $roster->db->fetch($result2);
            
            return $row2['b_id'];
      }
      
      function getinstid( $boss)
      {
            global $roster, $addon;
            
            $sql2 = "SELECT * FROM `".$roster->db->table('inst_table',$this->data['basename'])."` WHERE `inst_acronym` = '".addslashes($boss)."' and `guild_id` = '".$roster->data['guild_id']."'";
            $result2 = $roster->db->query($sql2) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql2);
            $row2 = $roster->db->fetch($result2);
            
            return $row2['inst_id'];
      }
	function guild_post( $data )
	{
		global $roster, $addon;
            $this->messages .='<br>Raid Progresion Updating<ul>';
            
      $bosscfg = $this->getConfigDataboss($roster->db->table('boss',$this->data['basename']));
      $instcfg = $this->getConfigDatainst($roster->db->table('inst_table',$this->data['basename']));
      $lootcfg = $this->getConfigDataloots($roster->db->table('loot_table',$this->data['basename']));
      $modcfg = $this->getConfigDatamod($roster->db->table('mod_info',$this->data['basename']));
      
            /*
            foreach( $instcfg as $instance => $inst)
            {
                  for($i=1;$i<20;$i++)
                  {
                        if (isset($inst['Boss'.$i.'']))
                        {
                              $inst_id = $this->getinstid($inst['Acronym']);
                              $boss_id = $this->getbossid(addslashes($inst['Boss'.$i.'']));
                              $this->processboss($inst['Acronym'], $boss_id, $inst_id);                              
                        }
                  }
            
            }*/
            foreach( $instcfg as $instance => $inst)
            {
                  $this->messages .='<li>Raid '.$inst['inst_name'].'</li><ul>';
                  foreach ($bosscfg['i'.$inst['inst_id']] as $instid => $bid)
                  {
                                    
                        ///if (isset($lootcfg[$inst['inst_id']][$bid['b_id']][$bid['b_lt_id']]))
                        //{
                              //foreach ($lootcfg[$inst['inst_id']][$bid['b_id']][$bid['b_lt_id']] as $loot => $lt)
                              //{
                                    
                                    $this->processboss($inst['inst_acronym'], $bid['b_id'], $inst['inst_id'],$bid['b_name']);
                                    
                              //}
                        //}
                  }
                  $this->messages .='</ul>';
            }
		# ok we have the member id this is why lol we need this to add it to the array
		# of any looted item so we can display who looted what BUT! we need to make 
            # sure they are not in the array allready this is fun
            
            #
            #     ok now we need to process my mods..
            #
            
            foreach( $modcfg as $guild_id => $a)
            {
                  
                  foreach ($a as $mod => $key1)
                  {
                        #echo $mod .' - '. $key1.'<br>';
                        $this->messages .='<li>Mod '.$mod.'</li><ul>';            
                        foreach ($key1 as $key2 => $key3)
                        {
                              #echo $key2 .' -- '. $key3.'<br>';
                              $this->messages .='<li>'.$key2.'</li><ul>';
                              
                              foreach ($key3 as $sub => $sub_info)
                              {
                                    #echo $sub .' --- '. $sub_info.'<br>';
                                    $this->messages .='<li>'.$sub.': ';
                                    foreach ($sub_info['info'] as $info => $infoz)
                                    {
                                          $this->processmod($mod, $key2, $sub);
                                    }
                                    $this->messages .='</li>';
                              }
                              $this->messages .='</ul>';
                        }
                        $this->messages .='</ul>';
                  }
                  $this->messages .='</ul>';
                  
            }
            
            $this->messages .='</ul><br>';
		return true;
	}
	function getlootper($id, $boss_id, $inst_id)
	{
	global $roster, $addon;
	$sql3 = "SELECT * FROM `".$roster->db->table('loot_table',$this->data['basename'])."` WHERE `l_name` = '".addslashes($id)."'and `l_inst_id` = '".$inst_id."' and `l_boss_id` = '".$boss_id."' and `guild_id` = '".$roster->data['guild_id']."'";
	//echo $sql3.'<br>';
      $result3 = $roster->db->query($sql3) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql3);
      //$this->messages .='<li>Member '.$looter.' looted '.$row['item_name'].'</li>';
      $row = $roster->db->fetch($result3);
      return $row['l_looters'];
	
	}
	//getlootperm($row3['item_name'],$row['m_info_id'])
	function getlootperm($item_name, $item_id)
	{
	global $roster, $addon;
	$sql3 = "SELECT * FROM `".$roster->db->table('mod_info',$this->data['basename'])."` WHERE `m_info_name` = '".addslashes($item_name)."'and `m_info_id` = '".$item_id."' and `m_guild_id` = '".$roster->data['guild_id']."'";
	//echo $sql3.'<br>';
      $result3 = $roster->db->query($sql3) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql3);
      //$this->messages .='<li>Member '.$looter.' looted '.$row['item_name'].'</li>';
      $row = $roster->db->fetch($result3);
      return $row['m_info_val_2'];
	
	}
	
	#process the boss through the loot database see if any items match...
	
	function processboss($inst, $boss_id, $inst_id, $boss_name)
	{
	global $roster, $addon;
	     #ok first thing in processing the boss we need to see if there is any of there loot in the items table
            $sql = "SELECT * FROM `".$roster->db->table('loot_table',$this->data['basename'])."` WHERE `guild_id` = '".$roster->data['guild_id']."' and `l_inst_id` = '".$inst_id."' and `l_boss_id` = '".$boss_id."'";
            //echo $sql.'<br>';
            $result = $roster->db->query($sql) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql);
            $loots = $roster->db->num_rows($result);
            $memids = $this->getmemData();
            $ddd = '';
            $f = '';
            

            $num = '0';
      
            while ($row = $roster->db->fetch($result))
                  {
                        $sql2 = "SELECT * FROM `".$roster->db->table('items')."` WHERE `item_name` = '".addslashes($row['l_name'])."'";
                        $result2 = $roster->db->query($sql2) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql2);
                        //$row2 = $roster->db->fetch($result2);
                        //$id = explode(':',$row2['item_id']);
                        
                        while ($row3 = $roster->db->fetch($result2))
                        {
                        $f = '';
                              if ($this->inArray( $memids,$row3['member_id']))
                              {
                         
                                    $ltrs = explode("|", $this->getlootper($row3['item_name'],$boss_id, $inst_id));
                                    
                                    if ($this->inArray( $ltrs,$row3['member_id']))
                                    {
                                          $looter = $this->getlootper($row3['item_name'],$boss_id, $inst_id);
                                          $d = 0;
                                    }
                                    else
                                    {
                                          $looter = $this->getlootper($row3['item_name'],$boss_id, $inst_id).'|'.$row3['member_id'];
                                          $ddd .='.';
                                          $d = 1;
                                    }
                              }
                        if ($d == 1)
                        {
                        
                        $sql3 = "UPDATE `".$roster->db->table('loot_table',$this->data['basename'])."` SET `l_looted` = 'yes' , `l_looters` = '".$looter."' WHERE `l_id` = '".addslashes($row['l_id'])."' and `l_inst_id` = '".$inst_id."' and `guild_id` = '".$roster->data['guild_id']."'";
                        $result3 = $roster->db->query($sql3) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql3);
                        //$this->messages .='<li>Member '.$looter.' looted '.$row['l_name'].'</li>';
                        }
                                          
                        $sql4 = "UPDATE `".$roster->db->table('boss',$this->data['basename'])."` SET `b_down` = 'yes',`b_percent` = '100%' WHERE `guild_id` = '".$roster->data['guild_id']."' and `b_inst_id` = 'i".$inst_id."' and `b_id` = '".$boss_id."' and `guild_id` = '".$roster->data['guild_id']."'";
                        $result4 = $roster->db->query($sql4) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql4);
                        //$this->messages .='<li>-Boss '.$boss_id.' confirmed Down</li>';
                        $y = $row['l_name'];
                        $f = 'Downed!';
                        }
                  }
                  $this->messages .='<li>Boss '.$boss_name.' '.$ddd.' - '.$f.'</li>';
      
            if ($num > 0)
            {
            return true;
            }
            if ($num == 0)
            {
            return false;
            }
	
	
	
      }
      
      
      function processmod($mod, $key1, $key2)
	{
	global $roster, $addon;
	     #ok first thing in processing the boss we need to see if there is any of there loot in the items table
            $sql = "SELECT * FROM `".$roster->db->table('mod_info',$this->data['basename'])."` WHERE `m_guild_id` = '".$roster->data['guild_id']."' and `m_key_1` = '".$key1."'";
            //echo $sql.'<br>';
            $result = $roster->db->query($sql) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql);
            $loots = $roster->db->num_rows($result);
            $memids = $this->getmemData();
            $ddd = '';
            $f = '';
            

            $num = '0';
      
            while ($row = $roster->db->fetch($result))
                  {
                        $sql2 = "SELECT * FROM `".$roster->db->table('items')."` WHERE `item_name` = '".addslashes($row['m_info_name'])."'";
                        $result2 = $roster->db->query($sql2) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql2);
                        //$row2 = $roster->db->fetch($result2);
                        //$id = explode(':',$row2['item_id']);
                        
                        while ($row3 = $roster->db->fetch($result2))
                        {
                        $f = '';
                              if ($this->inArray( $memids,$row3['member_id']))
                              {
                         
                                    $ltrs = explode("|", $this->getlootperm($row3['item_name'],$row['m_info_id']));
                                    
                                    if ($this->inArray( $ltrs,$row3['member_id']))
                                    {
                                          $looter = $this->getlootperm($row3['item_name'],$row['m_info_id']);
                                          $d = 0;
                                    }
                                    else
                                    {
                                          $looter = $this->getlootperm($row3['item_name'],$row['m_info_id']).'|'.$row3['member_id'];
                                          $ddd .='.';
                                          $d = 1;
                                    }
                              }
                        if ($d == 1)
                        {
                        
                        $sql3 = "UPDATE `".$roster->db->table('mod_info',$this->data['basename'])."` SET `m_info_val_1` = 'yes' , `m_info_val_2` = '".$looter."' WHERE `m_info_id` = '".addslashes($row['m_info_id'])."' and `m_guild_id` = '".$roster->data['guild_id']."'";
                        //echo $sql3.'<br>'.$looter.'<br>';
                        $result3 = $roster->db->query($sql3) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql3);
                        //$this->messages .='<li>Member '.$looter.' looted '.$row['l_name'].'</li>';
                        }
                                          
                        }
                  }
                  $this->messages .=' '.$ddd.' - '.$f.'</li>';
      
            if ($num > 0)
            {
            return true;
            }
            if ($num == 0)
            {
            return false;
            }
	
	
	
      }
      
      function getmemData()
      {
		global $roster, $addon;

            $sql = "SELECT * FROM `".$roster->db->table('members')."` WHERE `guild_id` = '".$roster->data['guild_id']."'";

            $this->cfg = '';
		// Get the current config values
		$results = $roster->db->query($sql);
		$is = '';
		//echo $roster->db->num_rows($results).'<br>';
		if( $results && $roster->db->num_rows($results) > 0 )
		{
			while($row = $roster->db->fetch($results))
			{
                        //this gives us the config type from the database ex: KARA
				//$setitem = $row['guild_id'];
				//this gives us the Config name ex: Attumen the Huntsman
				//$arrayitem = $row['guild_id'];
				// gives the loottable for the boss
				// numbers the loots
				$is++;

				//$this->cfg[$arrayitem]['guild_id'] = $row['guild_id'];
				$this->cfg[$is] = $row['member_id'];
				//$this->cfg[$arrayitem]['name'] = $row['name'];


				//$db_val_line = '<br /><br /><span style="color:#FFFFFF;font-size:10px;">db name: <span style="color:#0099FF;">' . $row['id'] . '</span></span>';

			}

			$roster->db->free_result($results);

			return $this->cfg;
		}
		else
		{
			return $roster->db->error();
		}
	}
	
	

function nospace($value)
      {
            $ns = str_replace(" ", '', $value);
            return $ns;
      }
function nospaceud($value)
      {
            $ns = str_replace(" ", '~', $value);
            return $ns;
      }
function nospacedu($value)
      {
            $ns = str_replace("~", ' ', $value);
            return $ns;
      }
      function inArray($array, $key)
{
  if(func_num_args() == 2 && is_string($key))
    return in_array($key, $array);
  else if(func_num_args() == 2 && is_array($key))
  {
    $r = true;
    for($i=0; $i < count($key); $i++)
      $r = (!in_array($key[$i], $array)) ? false : $r;
    
    return $r;
  }
  else if(func_num_args > 2)
  {
    $args = func_get_args();
    $r = true;
    for($i=1; $i < count($args); $i++)
      $r = (!in_array($args[$i], $array)) ? false : $r;
    
    return $r;
  }
}




function getConfigDataloots($tablename)
      {
		global $roster, $addon;

            $sql = "SELECT * FROM `" . $tablename . "` WHERE `guild_id` = '".$roster->data['guild_id']."'";

		//echo $sql.'<br>';
            $this->cfg = '';
		// Get the current config values
		$results = $roster->db->query($sql);
		$is = '';
		//echo $roster->db->num_rows($results).'<br>';
		if( $results && $roster->db->num_rows($results) > 0 )
		{
			while($row = $roster->db->fetch($results))
			{
                        //this gives us the config type from the database ex: KARA
				$setitem = $row['l_inst_id'];
				//this gives us the Config name ex: Attumen the Huntsman
				$arrayitem = $row['l_boss_id'];
				// gives the loottable for the boss
				$loots = $row['l_lt_id'];
				// numbers the loots
				$is++;

				$this->cfg[$setitem][$arrayitem][$loots][$is]['guild_id'] = $row['guild_id'];
				$this->cfg[$setitem][$arrayitem][$loots][$is]['id'] = $row['id'];
				$this->cfg[$setitem][$arrayitem][$loots][$is]['l_name'] = $row['l_name'];
				$this->cfg[$setitem][$arrayitem][$loots][$is]['l_id'] = $row['l_id'];
				$this->cfg[$setitem][$arrayitem][$loots][$is]['l_looters'] = $row['l_looters'];
				$this->cfg[$setitem][$arrayitem][$loots][$is]['l_boss_id'] = $row['l_boss_id'];
				//$this->cfg[$setitem][$arrayitem][$loots][$is]['l_boss_n'] = $row['b_name'];
				$this->cfg[$setitem][$arrayitem][$loots][$is]['l_inst_id'] = $row['l_inst_id'];
				$this->cfg[$setitem][$arrayitem][$loots][$is]['l_lt_id'] = $row['l_lt_id'];
				$this->cfg[$setitem][$arrayitem][$loots][$is]['l_texture'] = $row['l_texture'];
				$this->cfg[$setitem][$arrayitem][$loots][$is]['l_looted'] = $row['l_looted'];
				//$this->cfg[$setitem][$arrayitem]['item_looted'] = $row['item_looted'];

				$db_val_line = '<br /><br /><span style="color:#FFFFFF;font-size:10px;">db name: <span style="color:#0099FF;">' . $row['id'] . '</span></span>';

			}

			$roster->db->free_result($results);

			return $this->cfg;
		}
		else
		{
			return $roster->db->error();
		}
	}
	
	
	
	
	function getConfigDataboss($tablename)
      {
		global $roster, $addon;

            $sql = "SELECT * FROM `" . $tablename . "` WHERE `guild_id` = '".$roster->data['guild_id']."'";

            $this->cfg = '';
		// Get the current config values
		$results = $roster->db->query($sql);
		$is = '';
		//echo $roster->db->num_rows($results).'<br>';
		if( $results && $roster->db->num_rows($results) > 0 )
		{
			while($row = $roster->db->fetch($results))
			{
                        //this gives us the config type from the database ex: KARA
				$setitem = $row['b_inst_id'];
				//this gives us the Config name ex: Attumen the Huntsman
				$arrayitem = $row['b_id'];
				// gives the loottable for the boss
				// numbers the loots
				$is++;

				$this->cfg[$setitem][$arrayitem]['guild_id'] = $row['guild_id'];
				$this->cfg[$setitem][$arrayitem]['id'] = $row['id'];
				$this->cfg[$setitem][$arrayitem]['b_name'] = $row['b_name'];
				$this->cfg[$setitem][$arrayitem]['b_id'] = $row['b_id'];
				$this->cfg[$setitem][$arrayitem]['b_percent'] = $row['b_percent'];
				$this->cfg[$setitem][$arrayitem]['b_lt_id'] = $row['b_lt_id'];
				$this->cfg[$setitem][$arrayitem]['b_down'] = $row['b_down'];
				$this->cfg[$setitem][$arrayitem]['b_kills'] = $row['b_kills'];

				$db_val_line = '<br /><br /><span style="color:#FFFFFF;font-size:10px;">db name: <span style="color:#0099FF;">' . $row['id'] . '</span></span>';

			}

			$roster->db->free_result($results);

			return $this->cfg;
		}
		else
		{
			return $roster->db->error();
		}
	}
	
	function getConfigDatamod($tablename)
      {
		global $roster, $addon;

            $sql = "SELECT * FROM `" . $tablename . "` WHERE `m_guild_id` = '".$roster->data['guild_id']."'";

            $this->cfg = '';
		// Get the current config values
		$results = $roster->db->query($sql);
		$is = '';
		//echo $roster->db->num_rows($results).'<br>';
		if( $results && $roster->db->num_rows($results) > 0 )
		{
			while($row = $roster->db->fetch($results))
			{
                        //this gives us the config type from the database ex: KARA
				//$setitem = $row['guild_id'];
				//this gives us the Config name ex: Attumen the Huntsman
				$arraymod = $row['m_name'];
				// gives the loottable for the boss
				// numbers the loots
				$arrayguild = $row['m_guild_id'];
				$mkey1 = $row['m_key_1'];
				$mkey2 = $row['m_key_2'];
				$mkey3 = $row['m_key_3'];
				$is++;

				$this->cfg[$arrayguild][$arraymod][$mkey1][$mkey2]['m_key_2_texture'] = $row['m_key_2_texture'];
				$this->cfg[$arrayguild][$arraymod][$mkey1][$mkey2]['m_key_2_quality'] = $row['m_key_2_quality'];
				$this->cfg[$arrayguild][$arraymod][$mkey1][$mkey2]['m_key_2_sub_head'] = $row['m_key_3'];
				$this->cfg[$arrayguild][$arraymod][$mkey1][$mkey2]['info'][$is]['item_id'] = $row['m_info_id'];
				$this->cfg[$arrayguild][$arraymod][$mkey1][$mkey2]['info'][$is]['item_name'] = $row['m_info_name'];
				$this->cfg[$arrayguild][$arraymod][$mkey1][$mkey2]['info'][$is]['item_texture'] = $row['m_info_icon'];
				$this->cfg[$arrayguild][$arraymod][$mkey1][$mkey2]['info'][$is]['item_quality'] = $row['m_info_quality'];
				$this->cfg[$arrayguild][$arraymod][$mkey1][$mkey2]['info'][$is]['item_tooltip'] = $row['m_info_tooltip'];
				$this->cfg[$arrayguild][$arraymod][$mkey1][$mkey2]['info'][$is]['item_looted'] = $row['m_info_val_1'];
				$this->cfg[$arrayguild][$arraymod][$mkey1][$mkey2]['info'][$is]['item_looters'] = $row['m_info_val_2'];
				
				/*
				$this->cfg[$arrayguild][$arraymod]['inst_id'] = $row['inst_id'];
				$this->cfg[$arrayguild][$arraymod]['inst_name'] = $row['inst_name'];
				$this->cfg[$arrayguild][$arraymod]['inst_zone'] = $row['inst_zone'];
				$this->cfg[$arrayguild][$arraymod]['inst_acronym'] = $row['inst_acronym'];
				$this->cfg[$arrayguild][$arraymod]['inst_t_bosses'] = $row['inst_t_bosses'];
				$this->cfg[$arrayguild][$arraymod]['inst_disc'] = $row['inst_disc'];
                        */
				$db_val_line = '<br /><br /><span style="color:#FFFFFF;font-size:10px;">db name: <span style="color:#0099FF;">' . $row['id'] . '</span></span>';

			}

			$roster->db->free_result($results);

			return $this->cfg;
		}
		else
		{
			return $roster->db->error();
		}
	}
	
	function getConfigDatainst($tablename)
      {
		global $roster, $addon;

            $sql = "SELECT * FROM `" . $tablename . "` WHERE `guild_id` = '".$roster->data['guild_id']."'";

            $this->cfg = '';
		// Get the current config values
		$results = $roster->db->query($sql);
		$is = '';
		//echo $roster->db->num_rows($results).'<br>';
		if( $results && $roster->db->num_rows($results) > 0 )
		{
			while($row = $roster->db->fetch($results))
			{
                        //this gives us the config type from the database ex: KARA
				//$setitem = $row['guild_id'];
				//this gives us the Config name ex: Attumen the Huntsman
				$arrayitem = $row['inst_id'];
				// gives the loottable for the boss
				// numbers the loots
				$is++;

				$this->cfg[$arrayitem]['guild_id'] = $row['guild_id'];
				$this->cfg[$arrayitem]['inst_id'] = $row['inst_id'];
				$this->cfg[$arrayitem]['inst_name'] = $row['inst_name'];
				$this->cfg[$arrayitem]['inst_zone'] = $row['inst_zone'];
				$this->cfg[$arrayitem]['inst_acronym'] = $row['inst_acronym'];
				$this->cfg[$arrayitem]['inst_t_bosses'] = $row['inst_t_bosses'];
				$this->cfg[$arrayitem]['inst_disc'] = $row['inst_disc'];

				$db_val_line = '<br /><br /><span style="color:#FFFFFF;font-size:10px;">db name: <span style="color:#0099FF;">' . $row['id'] . '</span></span>';

			}

			$roster->db->free_result($results);

			return $this->cfg;
		}
		else
		{
			return $roster->db->error();
		}
	}
	
	
}
?>
