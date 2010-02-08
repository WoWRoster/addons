<?php
define('ARMORY','http://www.wowarmory.com');



class prog
{
      	var $xml;
      var $b = '';
      var $y;
      var $form = '1';
      var $cfg = array();
      var $header_name = '';
      /**
	 * xmlParsing object
	 *
	 * @var XmlParser
	 */
	var $xmlParser;

	/**
	 * simpleParsing object
	 *
	 * @var XmlParser
	 */
	var $simpleParser;

function processData($data)
{
	global $roster, $addon_cfg, $addon, $queries;
      //global $addon_cfg, $addon;
	$this->reset_values();
	foreach( $data as $settingName => $settingValue )
	{
			if(  $settingName != 'process' )
			{
				$update_sql[] = "UPDATE `".$roster->db->table('config',$addon['basename'])."` SET `config_value` = '".$roster->db->escape( $settingValue )."' WHERE `config_name` = '".$settingName."';";
			}
		
	}

	// Update DataBase
	if( is_array($update_sql) )
	{
		foreach( $update_sql as $sql )
		{
			$queries[] = $sql;

			$result = $roster->db->query($sql);
			if( !$result )
			{
				$this->setMessage('<span style="color:#0099FF;font-size:11px;">Error saving settings</span><br />MySQL Said:<br /><pre>'.$roster->db->error().'</pre>');
			}
		}
		$this->setMessage('<span style="color:#0099FF;font-size:11px;">Settings have been changed</span>');
	}
	else
	{
		$this->setMessage('<span style="color:#0099FF;font-size:11px;">No changes have been made</span>');
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

function getstatus($per,$down){

      global $addon, $roster;


            if ($down == 'yes')
            {
                  $b = 'green';
            }
            if ($down == 'no')
            {
                  $b = 'red';
            }
            if ($per >= '50%')
            {
                  $b = 'yellow';
            }
            return $b;

      return $b;
      
      
}

function bossboxtoggle( $message , $title='Message' , $style='sgray' , $open=false , $width='550px' )
{
	global $toggleboxes, $roster;

	$toggleboxes++;

	$title = "<div style=\"cursor:pointer;width:100%;\" onclick=\"showHide('msgbox_" . $toggleboxes . "','msgboximg_" . $toggleboxes . "','" . $roster->config['img_url'] . "minus.gif','" . $roster->config['img_url'] . "plus.gif');\">"
		   . "<img src=\"" . $roster->config['img_url'] . (($open)?'minus':'plus') . ".gif\" style=\"float:right;\" alt=\"\" id=\"msgboximg_" . $toggleboxes . "\" />" . $title . "</div>";

	return
		//border($style, 'start', $title, $width).
		'<div style="display:' . (($open)?'inline':'none') . ';" id="msgbox_' . $toggleboxes . '">'.
			$message.
		'</div>';//.
		//border($style, 'end');
}


function getbossloot($inst, $boss)
      {

            global $addon, $roster;
      
            $sql = "SELECT * FROM `".$roster->db->table('config',$addon['basename'])."` WHERE `config_type` = '".$inst."' AND `downed` = '".$boss."' AND `config_value` = 'yes'";
            $result = $roster->db->query($sql) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql);
            $row = $roster->db->fetch($result);
            $num = $roster->db->num_rows($result);
            if ($num >= 1)
                  {
                        $sql4 = "UPDATE `".$roster->db->table('config',$addon['basename'])."` SET `downed` = 'yes', `config_value` = 'yes' WHERE `config_name` = '".$this->nospace($boss)."'";
                        $result4 = $roster->db->query($sql4) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql4);
                  }      
      
            return $row;
      }

function getbosslootcheck($inst, $boss)
      {

            global $addon, $roster;
            $this->getbossloot($inst, $boss);
            $sql = "SELECT * FROM `".$roster->db->table('config',$addon['basename'])."` WHERE `config_type` = '".$inst."' AND `downed` = '".$boss."'";
            //echo "<!-- $sql -->\n\n";
            //echo "<hr><br>".$sql."<br>";
            $result = $roster->db->query($sql) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql);
            $loots = $roster->db->num_rows($result);
            //echo $inst.' - '.$boss.' - Loots '.$loots.' <br>';
            //$row = $roster->db->fetch($result);
            $num = '0';
      
            while ($row = $roster->db->fetch($result))
                  {
                        //if ( isset($y) != $row['item_name']){
                        #this line was dimb....
                        #if ($row['config_value'] != 'yes')
                        #      {
                                                                      //
                                    $sql2 = "SELECT * FROM `".$roster->db->table('items')."` WHERE `item_name` = '".addslashes($row['item_name'])."' LIMIT 1";
                                    //echo "<!-- $sql2 -->\n\n";
                                    //echo "".$sql."<br>";
                                    $result2 = $roster->db->query($sql2) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql2);
                                    $row2 = $roster->db->fetch($result2);
                                    $id = explode(':',$row2['item_id']); 
                                    if ($result2)
                                          {
            
                                                $num++;
                                                //echo 'Loot Number '.$id[0].'<br>';
                                                if ($id[0] != '')
                                                      {
                                                      $ltrs = explode("|", $row['percent']);
                                                      //print_R($ltrs).'<br><hr>';
                                                      if ($this->inArray( $ltrs,$row2['member_id']))
                                                      {
                                                            $looter = $row['percent'];
                                                            $d = 0;
                                                      }
                                                      else
                                                      {
                                                            $looter = $row['percent'].'|'.$row2['member_id'];
                                                            $d = 1;
                                                      }

                                                            if ($d == 1)
                                                            {
                                                            $sql3 = "UPDATE `".$roster->db->table('config',$addon['basename'])."` SET `config_value` = 'yes' , `percent` = '".$looter."' WHERE `item_id` = '".addslashes($row['item_id'])."'";
                                                            //echo "<!-- $sql3 -->\n\n";
                                                            $result3 = $roster->db->query($sql3) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql3);
                                                            }
                                                            $sql4 = "UPDATE `".$roster->db->table('config',$addon['basename'])."` SET `downed` = 'yes',`percent` = '100%' WHERE `config_name` = '".$this->nospace($boss)."'";
                                                            //echo "<!-- $sql4 -->\n\n";
                                                            $result4 = $roster->db->query($sql4) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql4);
                                                      }
                                          }
            
            
                                    //echo "".$num."<br>";
                                    $y = $row['item_name'];
                              #}
                  }
      
            if ($num > 0)
                  {
                        return true;
                  }
            if ($num == 0)
                  {
                        return false;
                  }
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

function getloot($inst, $ac, $boss, $form)
{
      global $addon, $roster;
  
      $imgext = $roster->config['img_suffix'];
      $sql = "SELECT * FROM `" . $roster->db->table('config',$addon['basename']) . "` WHERE `config_type` = '".$ac."' AND `downed` = '".$boss."'";

      $result = $roster->db->query($sql) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql);

     
      $num = '0';
      
      $tip = '<span id="'.$form.'Trigger">'.$boss.'</b></span>';
      $tip .= '<form id="'.$form.'" onsubmit="return analyseForm(this);" class="tooltip" action="" method="get">
            '.border('sgray','start',' '.$boss.' Loots').'
            <table>';
      while ($row = $roster->db->fetch($result)){
            $num++;
            if ($row['config_value'] == 'yes'){
            $class = 'class="loot1"';

            }
            else
            {
            $class = 'class="loot2"';
  
            }
            $tip .='<tr>
            <td width="25"><img src ="'.$roster->config['interface_url'].'Interface/Icons/'.strtolower($row['item_texture']).'.'.$imgext.'" width="20" height="20"></a></td><td '.$class.'><a href="http://www.wowhead.com/?item='.$row['item_id'].'" rel="nofollow">'.$row['config_name'].'</a></td>
            </tr>';
            
      }   
  $tip .= '</table>
  '.border('sgray','end').'
</form>
<script type="text/javascript">
// <!--
	analyseForm = function(formEl)
	{
		var inputs = formEl.getElementsByTagName(\'input\');
		var typedValue = \'\'
		for (var i=0; i < inputs.length; i++)
		{
			if (inputs[i].getAttribute(\'type\').toLowerCase() == \'text\'){
				typedValue +=\' \'+inputs[i].value;
				inputs[i].value = \'\';
			}
		}
		alert(\'Your name: \n\' + typedValue);
		return false;
	}

// The tooltip constructor
var surveyTooltip = new Spry.Widget.Tooltip(\''.$form.'\', \'#'.$form.'Trigger\', {hideDelay: 1500, closeOnTooltipLeave: true, offsetX: "10px", offsetY:"-10px"});
// -->
</script>
';

if ( $num >= 1 ){
      return $tip;
}
else
{
      return $boss;
}

}



function getloots($inst, $ac, $boss, $form)
{
      global $addon, $roster;
  
      //$form = ($form + 1);
      $imgext = $roster->config['img_suffix'];
  
      
      
     
      $sql = "SELECT * FROM `" . $roster->db->table('config',$addon['basename']) . "` WHERE `config_type` = '".$ac."' AND `downed` = '".$boss."'";
      $result = $roster->db->query($sql) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql);
     
      $num = '0';
      
      $tip = '<span id="'.$form.'Trigger" class="purpleB">[ Loots ]</b></span>';
      $tip .= '<form id="'.$form.'" onsubmit="return analyseForm(this);" class="tooltip" action="" method="get">
            '.border('sgray','start',' '.$boss.' Loots').'
            <table>';
      while ($row = $roster->db->fetch($result)){
            $num++;
            if ($row['config_value'] == 'yes'){
            $class = ' class="loot1"';

            }
            else
            {
            $class = ' class="loot2"';
  
            }
            $tip .='<tr>
            <td width="25"><img src ="'.$roster->config['interface_url'].'Interface/Icons/'.strtolower($row['item_texture']).'.'.$imgext.'" width="20" height="20"></a></td><td '.$class.'><a href="http://www.wowhead.com/?item='.$row['item_id'].'" rel="nofollow">'.$row['config_name'].'</a></td>
            </tr>';
            
      }   
  $tip .= '</table>
  '.border('sgray','end').'
</form>
<script type="text/javascript">
// <!--
	analyseForm = function(formEl)
	{
		var inputs = formEl.getElementsByTagName(\'input\');
		var typedValue = \'\'
		for (var i=0; i < inputs.length; i++)
		{
			if (inputs[i].getAttribute(\'type\').toLowerCase() == \'text\'){
				typedValue +=\' \'+inputs[i].value;
				inputs[i].value = \'\';
			}
		}
		alert(\'Your name: \n\' + typedValue);
		return false;
	}

// The tooltip constructor
var surveyTooltip = new Spry.Widget.Tooltip(\''.$form.'\', \'#'.$form.'Trigger\', {hideDelay: 1500, closeOnTooltipLeave: true, offsetX: "10px", offsetY:"-10px"});
// -->
</script>
';

if ( $num >= 1 ){
      return $tip;
}
else
{
      return $boss;
}

}


function getper($inst, $ac, $boss)
{
      global $addon, $roster;
  
      $sql = "SELECT * FROM `" . $roster->db->table('config',$addon['basename']) . "` WHERE `config_type` = '".$ac."' AND `config_name` = '".$boss."'";

      $result = $roster->db->query($sql) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql);
      $row = $roster->db->fetch($result);
 return $row['percent']; 

}

function getbossinfo($inst, $ac, $boss)
      {
            global $addon, $roster;
      }
      
      
      #
      #     ok lets create an array of data from the database this is like the rpc one but a lil better in funcionality
      #

      function getConfigData($where, $order, $tablename)
	{
		global $roster, $addon;

		$sql = "SELECT * FROM `" . $tablename . "` WHERE " . $where . " ORDER BY " . $order . " ASC;";

		// Get the current config values
		$results = $roster->db->query($sql);
		if( $results && $roster->db->num_rows($results) > 0 )
		{
			while($row = $roster->db->fetch($results))
			{
                        //this gives us the config type from the database ex: KARA
				$setitem = $row['config_type'];
				//this gives us the Config name ex: Attumen the Huntsman
				$arrayitem = $row['config_name'];

				$this->cfg[$setitem][$arrayitem]['id'] = $row['id'];
				$this->cfg[$setitem][$arrayitem]['name'] = $row['config_name'];
				$this->cfg[$setitem][$arrayitem]['config_type'] = $row['config_type'];
				$this->cfg[$setitem][$arrayitem]['value'] = $row['config_value'];
				$this->cfg[$setitem][$arrayitem]['form_type'] = $row['form_type'];
				$this->cfg[$setitem][$arrayitem]['percent'] = $row['percent'];
				$this->cfg[$setitem][$arrayitem]['downed'] = $row['downed'];
				$this->cfg[$setitem][$arrayitem]['item_id'] = $row['item_id'];
				$this->cfg[$setitem][$arrayitem]['item_name'] = $row['item_name'];
				$this->cfg[$setitem][$arrayitem]['item_texture'] = $row['item_texture'];
				$this->cfg[$setitem][$arrayitem]['item_looted'] = $row['item_looted'];

				$db_val_line = '<br /><br /><span style="color:#FFFFFF;font-size:10px;">db name: <span style="color:#0099FF;">' . $row['config_name'] . '</span></span>';

				// Get description and tooltip
				if( isset($roster->locale->act['admin'][$row['config_name']]) )
				{
					$desc_tip = explode('|',$roster->locale->act['admin'][$row['config_name']],2);
					$this->cfg[$setitem][$arrayitem]['description'] = $desc_tip[0];
					$this->cfg[$setitem][$arrayitem]['tooltip'] = ( isset($desc_tip[1]) ? $desc_tip[1] : '' ) . $db_val_line;
				}
				else
				{
					$desc_tip = $row['config_name'];
					$this->cfg[$setitem][$arrayitem]['description'] = $row['config_name'];
					$this->cfg[$setitem][$arrayitem]['tooltip'] = $row['config_name'] . ' From ' . $row['downed']. $db_val_line;
				}
				$this->cfg['all'][$arrayitem] =& $cfg[$setitem][$arrayitem];
			}

			$roster->db->free_result($results);

			return $this->cfg;
		}
		else
		{
			return $roster->db->error();
		}
	}
function buildBlock($block)
	{
		global $roster, $addon;

		$i = 0;
		$html = '';
		foreach($block as $values)
		{
			// Figure out input type
			$input_field = '';
			$input_type = explode('{',$values['form_type']);

			switch ($input_type[0])
			{
				case 'text':
					$length = explode('|',$input_type[1]);

					if( $length[1] < 20 )
					{
						$text_class = '64';
					}
					elseif( $length[1] < 30 )
					{
						$text_class = '128';
					}
					elseif( $length[1] < 40 )
					{
						$text_class = '192';
					}
					else
					{
						$text_class = '';
					}

					$input_field = '<input class="wowinput' . $text_class . '" name="' .  $values['name'] . '" type="text" value="' . htmlentities($values['value']) . '" size="' . $length[1] . '" maxlength="' . $length[0] . '" />';
					break;

				case 'radio':
					$options = explode('|',$input_type[1]);
					foreach( $options as $value )
					{
						$vals = explode('^',$value);
						$input_field .= '<input type="radio" id="rad_' . $this->prefix . $this->radio_num . '" name="' . $this->prefix . $this->nospaceud($values['name']) . '" value="' . $vals[1] . '" ' . ( $values['value'] == $vals[1] ? 'checked="checked"' : '' ) . ' /><label for="rad_' . $this->prefix . $this->radio_num . '" class="' . ( $values['value'] == $vals[1] ? 'blue' : 'white' ) . '">' . $vals[0] . "</label>\n";
						$this->radio_num++;
					}
					break;
					
				case 'radio2':
					$options = explode('|',$input_type[1]);
					foreach( $options as $value )
					{
						$vals = explode('^',$value);
						$input_field .= '<input type="radio" id="rad_' . $this->radio_num . '" name="' . $this->nospaceud($values['name']) . '_radio" value="' . $vals[1] . '" ' . ( $values['value'] == $vals[1] ? 'checked="checked"' : '' ) . ' /><label for="rad_' .  $this->radio_num . '" class="' . ( $values['value'] == $vals[1] ? 'blue' : 'white' ) . '">' . $vals[0] . "</label>\n";
						$this->radio_num++;
					}
					break;

				case 'select':
					$options = explode('|',$input_type[1]);
					$input_field .= '<select name="' . $this->prefix . $values['name'] . '">' . "\n";
					$select_one = 1;
					foreach( $options as $value )
					{
						$vals = explode('^',$value);
						if( $values['value'] == $vals[1] && $select_one )
						{
							$input_field .= '  <option value="' . $vals[1] . '" selected="selected">-[ ' . $vals[0] . ' ]-</option>' . "\n";
							$select_one = 0;
						}
						else
						{
							$input_field .= '  <option value="' . $vals[1] . '">' . $vals[0] . '</option>' . "\n";
						}
					}
					$input_field .= '</select>';
					break;

				case 'color':
					$input_field .= '<input type="text" class="colorinput" maxlength="7" size="10" style="background-color:' . $values['value'] . ';" value="' . $values['value'] . '" name="' . $this->prefix . 'color_' . $values['name'] . '" id="' . $this->prefix . 'color_' . $values['name'] . '" /><img src="' . $roster->config['theme_path'] . '/images/color/select_arrow.gif" style="cursor:pointer;vertical-align:middle;margin-bottom:2px;" onclick="showColorPicker(this,document.getElementById(\'' . $this->prefix . 'color_' . $values['name'] . '\'))" alt="" />' . "\n";
					break;

				case 'access':
					$input_field = $roster->auth->rosterAccess($values);
					break;

				case 'function':
					$input_field = $input_type[1]($values);
					break;

				case 'display':
					$input_field = $values['value'];
					break;

				default:
					$input_field = $values['value'];
					break;
			}
		if ($this->header_name != $values['downed']){
            $html .= '
		<tr>
			<td class="membersRow' . (($i%2)+1) . '" colspan="3"><center><font color="blue">'.$values['downed'].'</font></center></td>
		</tr>';
            }	
		$this->header_name = $values['downed'];

			$html .= '
		<tr>
			<td class="membersRow' . (($i%2)+1) . '"><div' . $this->createTip($values['description'],$values['tooltip'],$values['description']) . '</div></td>
			<td class="membersRowRight' . (($i%2)+1) . '"><div align="right">' . $input_field . '</div></td>
			<td class="membersRowRight' . (($i%2)+1) . '"><div align="right"><input class="wowinput64" name="'.$this->nospaceud($values['name']).'_percent" type="text" value="' . htmlentities($values['percent']) . '" size="10" maxlength="50" /></div></td>
		</tr>';

			$i++;
		}
		return $html;
	}
	function createTip( $disp_text , $content , $caption )
	{
		$tip = makeOverlib($content,$caption,'',2,'',',WRAP');
		//$tip = " style=\"cursor:help;\" $tip>$disp_text";

		return $tip;
	}
	
	function createTip2( $disp_text , $content , $caption )
	{
		$tip = makeOverlib($content,$caption,'',2,'',',WRAP');
		$tip = " style=\"cursor:help;\" $tip>$disp_text";

		return $tip;
	}
	
      function makeinstpage($insts, $array, $bosscfg, $lootcfg, $instcfg)
      {
            global $roster, $addon;
            $form = '1';
            
            $sql = "Select * From `" . $roster->db->table('inst_table',$addon['basename']) . "` WHERE `inst_acronym` = '".addslashes($insts)."' AND `guild_id` = '".$roster->data['guild_id']."'";
            $result = $roster->db->query($sql) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql);
            //$total = $roster->db->num_rows($result);
            $rowx = $roster->db->fetch($result);
            
            $i = '1';
            $body = ''.border('sgreen','start',''.$rowx['inst_name'].'').'';
            $body .= "<table width=\"600\">\n\n";
            $title = $rowx['inst_name'];
            $body .= '<tr><td colspan=3>Acronym: '.$rowx['inst_acronym'].'<br>Instance Name: '
            .$rowx['inst_name'].'<br>Location: '
            .$rowx['inst_zone'].'<br></td></tr><tr><td width="15%"></td><td width="70%" align="left">';

            $sql2 = "Select * From `" . $roster->db->table('boss',$addon['basename']) . "` WHERE `b_inst_id` = 'i".$rowx['inst_id']."' and `guild_id` = '".$roster->data['guild_id']."'";
            $result2 = $roster->db->query($sql2) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql2);
            $down = '0';//$roster->db->num_rows($result2);
            $total = $roster->db->num_rows($result2);
            
            while ($row = $roster->db->fetch($result2))
            {
                  $color = $this->getstatus($row['b_percent'], $row['b_down']);
                  $loots = $this->getloots($rowx['inst_name'], $rowx['inst_acronym'], addslashes($row['b_name']), $form++);
                  $body .= ''.border('s'.$color.'','start',''.stripslashes($row['b_name']).'').'
                  <table width="400">
                  <tr><td>
                  <img src="'.$addon['url'].'images/'.$row['b_name'].'.jpg" ></a></td><td>'.$loots.'<br>Kills: n/a<br>Percent Down: '.$row['b_percent'].'<br>
                  </td></tr></table>
                  '.border('s'.$color.'','end','').'<br>';
            }

            $body .= '<td width="15%"></td></tr></table>';
            $body .= ''.border('sgreen','end').'</div>';
            
            return $body;
            
      }
	
      function getname($inst, $confname, $count)
	{
	$name= '';
	     for($i=1;$i<20;$i++)
                  {
                        if (isset($inst['Boss'.$i.'']))
                        { 
                              if (!is_array($inst['Boss'.$i.'']))
                              {
                                    if ($this->nospace($inst['Boss'.$i.'']) == $confname)
                                    {
                                          $name = $inst['Boss'.$i.''];
                                    }
                              }
                        }
                  }
            return $name;
	}
      function makestatpage($instance,$inst,$bosscfg)
      {
            global $roster, $addon;
           
            $tip = '';
            //$total = (count($inst) - 4);
            $stat = '';
            $down = '0';
            /*
            $sql = "Select * From `" . $roster->db->table('inst_table',$addon['basename']) . "` WHERE `inst_name` = '".addslashes($inst['ZoneName'])."' AND `guild_id` = '".$roster->data['guild_id']."'";
            $result = $roster->db->query($sql) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql);
            //$total = $roster->db->num_rows($result);
            $rowx = $roster->db->fetch($result);

            
           
            $sql2 = "Select * From `" . $roster->db->table('boss',$addon['basename']) . "` WHERE `b_inst_id` = 'i".$rowx['inst_id']."' and `guild_id` = '".$roster->data['guild_id']."'";
            $result2 = $roster->db->query($sql2) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql2);
            $down = '0';//$roster->db->num_rows($result2);
            $total = $roster->db->num_rows($result2);
            */
            
            /*
                  Make the tooltip now i hope....
            */
            //while ($row = $roster->db->fetch($result2))
            foreach ($bosscfg['i'.$inst['inst_id']] as $instid => $bid)
            {
                  
                  //echo $instid .'-'. $bid['b_name'].'<br>';
                  
                  if ($bid['b_down'] == 'yes')
                  {
                        $tip .= '<span style="color:#00ff00;">'.$bid['b_name'].' - '.$bid['b_percent'].'<span><br>';
                        $down++;
                  }
                  else
                  {
                        $tip .= '<span style="color:#ff0000;">'.$bid['b_name'].' - '.$bid['b_percent'].'</span><br>';
                  }
            }
            
            $percent_exp = ($inst['inst_t_bosses'] > 0 ? round(($down/$inst['inst_t_bosses'])*100) : 0);

		$tip2 = '<br><div style="white-space:nowrap;" class="levelbarParent" style="width:200px;"><div class="levelbarChild">' . $down . '/' . $inst['inst_t_bosses'] . ' (' . ($percent_exp) . '% )</div></div>';
		$tip2 .= '<table class="expOutline" align="center" border="0" cellpadding="0" cellspacing="0" width="200">';
		$tip2 .= '<tr>';
		$tip2 .= '<td style="background-image: url(\'' . $roster->config['img_url'] . 'expbar-var2.gif\');" width="' . $percent_exp . '%"><img src="' . $roster->config['img_url'] . 'pixel.gif" height="14" width="1" alt="" /></td>';
		$tip2 .= '<td width="' . (100 - $percent_exp) . '%"></td>';
		$tip2 .= '</tr>';
		$tip2 .= '</table><br>';
			
			
            $tip = str_replace('<span style="color:#ff0000;"></span><br>', '', $tip);
            $tip = str_replace('<span style="color:#00ff00;"></span><br>', '', $tip);
           $tips = $this->createTip2( '' , $tip2.$tip , $inst['inst_name'] );
           $gray = '';
           if ($down == 0){
           $gray = '-gray';
           }
           
           $stat .= "";
            $roster->tpl->assign_block_vars('stats',array(
                  'INSTNAME' => $inst['inst_name'],
                  'LINK' => makelink("&amp;inst=".$inst["inst_acronym"]),
                  'IMAGE' => $inst['inst_acronym'].$gray,
                  'TOOLTIP' => $tips,
                  'DOWN' => $down,
                  'BOSSES' => $inst['inst_t_bosses']
                  )
            );
            
            
            
            return $stat;	
	}
	
	function getitemcolor($id)
	{
	global $roster, $addon;
            $sql = "Select * From `".$roster->db->table('items')."` WHERE `item_name` = '".addslashes($id)."' ";
            $result = $roster->db->query($sql) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql);
            $row = $roster->db->fetch($result);
            //echo $row['item_color'];  
            return $row['item_color'];
	}
	function getplayername($id)
	{
	     global $roster, $addon;
	     
            $sql = "Select * From `".$roster->db->table('members')."` WHERE `member_id` = '".$id."' ";
            $result = $roster->db->query($sql) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql);
            $row = $roster->db->fetch($result);        
            return $row['name'];          
                              
                              
	
	}
      function getinstid( $boss)
      {
            global $roster, $addon;
            
            $sql2 = "SELECT * FROM `".$roster->db->table('inst_table',$addon['basename'])."` WHERE `inst_acronym` = '".addslashes($boss)."' and `guild_id` = '".$roster->data['guild_id']."'";
            $result2 = $roster->db->query($sql2) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql2);
            $row2 = $roster->db->fetch($result2);
            
            return $row2['inst_id'];
      }
	function getbossid( $boss)
      {
            global $roster, $addon;
            
            $sql2 = "SELECT * FROM `".$roster->db->table('boss',$addon['basename'])."` WHERE `b_name` = '".addslashes($boss)."' and `guild_id` = '".$roster->data['guild_id']."'";
            $result2 = $roster->db->query($sql2) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql2);
            $row2 = $roster->db->fetch($result2);
            
            return $row2['b_id'];
      }
      function makelootpage($insts, $array)
      {
            global $roster, $addon;
            $form = '1';
            
            $body2 = '';
            foreach( $array as $instance => $inst)
            {
            if ($insts == $inst['Acronym'])
            {
            $inst_id = $this->getinstid($inst['Acronym']);
             $cfg = $this->getConfigDataloots($roster->db->table('loot_table',$addon['basename']));
                              //echo '<pre>';
                              //print_r($cfg);
                              //echo '</pre>';
                              
                              
      
                  for($i=1;$i<20;$i++)
                  { 
                        if (isset($inst['Boss'.$i.'']))
                        {
                              if (!empty($inst['Boss'.$i.'']))
                              {
                              
                              $b_id = $this->getbossid($inst['Boss'.$i.'']);
                              $body = '';
                              
                             
      
      
                              //$body .= ''.border('sblue','start','<span style="color:#00ff00;">'.$inst['Boss'.$i.''].' Looters</span>').'<table width="550" cellspacing="0" cellpadding="0">';
                              $body .= '<table width="550" cellspacing="0" cellpadding="0"><tr><td class="header_text" colspan=2 >Item</td><td colspan=2 class="header_text">Looter</td></tr>';
                              $imgext = $roster->config['img_suffix'];
                              $sql = "Select * From `" . $roster->db->table('loot_table',$addon['basename']) . "` WHERE `l_boss_id` = '".$b_id."' and `l_inst_id` = '".$inst_id."' and `guild_id` = '".$roster->data['guild_id']."'";
                              $result = $roster->db->query($sql) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql);
                              $down = $roster->db->num_rows($result);
                              //echo $down.'-<br>';
                              $stripe = 0;
                               while ($row = $roster->db->fetch($result))
                               {
                               $stripe = (($stripe%2)+1);
                               $players = explode('|',$row['l_looters']);
                               $ltr = '';
					foreach( $players as $value )
					{
					if ($value !=''){
					$ltr .= '<a href="index.php?p=char-info&amp;a=c:'.$value.'">'.$this->getplayername($value).'</a><br>'; 
					}
					if ($value == '' && $ltr == ''){
					$ltr .= '&nbsp;'; 
					} 
					}
					$col = $this->getitemcolor($row['l_name']);
                               $body .= '<tr><td class="membersRow' . $stripe . '" valign="center"><img src ="'.$roster->config['interface_url'].'Interface/Icons/'.strtolower($row['l_texture']).'.'.$imgext.'" width="40" height="40"></a></td>
                               <td class="membersRow' . $stripe . '" valign="center"><a href="http://www.wowhead.com/?item='.$row['l_id'].'" rel="nofollow"><span style="color:#'.$col.'">'.$row['l_name'].'<span></a></td>
                               <td class="membersRow' . $stripe . '">'.$ltr.'</td>
                               <td class="membersRow' . $stripe . '">'.$row['l_lt_id'].'</td></tr>';
                               }
                              $body .='</table>';
                              
                              
                              
                              
                              //$body .= ''.border('sblue','end','').'</table><br>';
                              
                              $body2 .= messageboxtoggle($body, $title = '<span style="color:#00ff00;">'.$inst['Boss'.$i.''].' Looters</span>', $style = 'sgreen', false, $width = '450px').'<br>';

                              }
                        }
                  }
	     }
	     }
	     
	     
	     return $body2;
	}
	
	function getinstlootnum($memid,$array,$bosscfg,$lootcfg,$instcfg)
	{
            global $roster, $addon;
            //$tooltip = '';
            $tooltip2 = '';
            
            #Phase the array and make our tooltip...
            foreach( $instcfg as $instanc => $inst)
            {
            //echo $instanc .'+'. $inst['inst_name'].'<br>';
            $x = '';
            $tooltip ='';
            $tooltip3 = '';
            $inst_id = $inst['inst_id'];//$this->getinstid($inst['Acronym']);
            
                  
            foreach( $lootcfg as $instance => $boss)
            {
            if ($instance == $inst_id)
                  {
                  
                  
            //echo $instance .'+'. $boss.'<br>';
            
            
                  foreach ($boss as $b_id => $loot)
                  {
                        if ($bosscfg['i'.$inst_id][$b_id]['b_down'] == 'yes')
                        {
                              $color = '33CC33';
                        }
                        else
                        {
                              $color = 'FF0000';
                        }
                        //echo '->'.$b_id .' = '. $loot .'<br>';
                        $tooltip .= '<font color="#'.$color.'" />'.$bosscfg['i'.$inst_id][$b_id]['b_name'].'</span /><br>';
                        foreach ($loot as $l_id => $l_num)
                        {
                              //echo '-->'.$l_id .' = '. $l_num .'<br>';
                              foreach ($l_num as $l_info => $l_nm)
                              {$tooltip3 = '';
                                    //echo '--->'.$l_info .' = '. $l_nm['l_name'] .'<br>';
                                    $ltrs = explode("|", $l_nm['l_looters']);
                                    
                                    
                                    if ($this->inArray( $ltrs,$memid))
                                    {
                                          $tooltip3 .= '<font color="#3333FF" />-->'.$l_nm['l_name'].'</font /><br>';
                                          $x++;
                                    }
                                    else
                                    {
                                          $tooltip3 .= '';
                                    }
                                    
                              $tooltip .= $tooltip3.'';
                              $tooltip = str_replace('<span style="color:#00ff00;"></span><br>', '', $tooltip);
                              $tooltip = str_replace('<span style="color:#000000;"></span><br>', '', $tooltip);      
                              $tooltip = str_replace('<br><br>', '', $tooltip);
                              }
                        }
                        
                  }
                  }
            }
            
            $tips = $this->createTip( '' , $tooltip , $inst['inst_name'] );
                 // $tooltip .= $tooltip3.'';
                  if ($x == 0){
                  $gray = '-gray';
                  $col = '000000';
                  }else{
                  $gray = '';
                  $col = '00ff00';
                  //span style="color:#00ff00;">
                  }
                  $tooltip2 .= '<img src="'.$addon['image_url'].''.strtolower($inst['inst_acronym']).$gray.'.gif" width="18" height="22" '.$tips.'></a>&nbsp;';
                  
            }
            $tooltip2 .= '';
            return $tooltip2;
	     
	     
	     
	     
	}
	
	function installed($guild_id)
            {
                  global $roster, $addon;
                  
                  $sql = "SELECT * FROM `".$roster->db->table('info',$addon['basename'])."` WHERE `guild_id` = '".$guild_id."' AND `installed` = 'yes' ";
                  $result = $roster->db->query($sql) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql);
                  //echo $sql.'<br>';
                  $loots = $roster->db->num_rows($result);
                  //echo $loots;
                  return $loots;                  
            }
            
      function installtables($guild_id, $array, $guild_name)
            {
                  global $roster, $addon;
                  $iid = '1';
                  $boss_num = '0';
                  
                  $icount = '0';
                  foreach( $array as $instance => $inst)
                  {
                        $boss_num = '0';
                        $icount++;
                        $instid = $iid++;
                        $bid = '0';
                        for($i=1;$i<20;$i++)
                        { 
                              if (isset($inst['Boss'.$i.'']))
                              {
                                    if (!empty($inst['Boss'.$i.'']))
                                    {
                                          $boss_num++;
                                          $bid++;
                                          $sqliv = "INSERT INTO`".$roster->db->table('boss',$addon['basename'])."`
                                          (`id`,`guild_id`,`b_id`,`b_inst_id`,`b_name`,`b_lt_id`,`b_percent`,`b_kills`,`b_down`) VALUES ".
                                          "(Null,'".$guild_id."','b".$i."','i".$instid."','".addslashes($inst['Boss'.$i.''])."','".$bid."lt','0%','0','no')";
                                          $resultiv = $roster->db->query($sqliv) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sqliv);
                                          //echo $sqliv.'<br>';
                                          
                                          //update the loot table this is fun and will take time......
                                          
                                          $sqm = "SELECT * FROM `".$roster->db->table('config',$addon['basename'])."` WHERE `downed` = '".addslashes($inst['Boss'.$i.''])."'";
                                          $resultm = $roster->db->query($sqm) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sqm);
                                          
                                          while ($row = $roster->db->fetch($resultm))
                                          {
                                          $sqlit = "INSERT INTO`".$roster->db->table('loot_table',$addon['basename'])."`
                                          (`id`,`guild_id`,`l_id`,`l_name`,`l_looters`,`l_boss_id`,`l_inst_id`,`l_lt_id`,`l_texture`,`l_quality`,`l_looted`) VALUES ".
                                          "(Null,'".$guild_id."','".$row['item_id']."','".addslashes($row['item_name'])."','','b".$i."','".$instid."','".$i."lt','".$row['item_texture']."','".$row['item_quality']."','')";
                                          $resultit = $roster->db->query($sqlit) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sqlit);
                                          }
                                          
                                    }
                              }
                        }
                        
                        
                        $sqlinv = "INSERT INTO`".$roster->db->table('inst_table',$addon['basename'])."`
                        (`id`, `guild_id`, `inst_id`, `inst_name`, `inst_zone`, `inst_acronym`, `inst_t_bosses`, `inst_disc`) VALUES ".
                        "(Null,'".$guild_id."','".$instid."','".addslashes($inst['ZoneName'])."','".addslashes($inst['Location'])."','".$inst['Acronym']."','".$boss_num."','-')";
                        $resultinv = $roster->db->query($sqlinv) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sqlinv);
                        //echo $sqlinv.'<br>';
                  
                  }
                  
                  $sqlit = "INSERT INTO`".$roster->db->table('info',$addon['basename'])."`
                  (`id`,`guild_id`,`guild_n`,`raiders`,`i_instance`,`t_instances`,`c_instancess`,installed) VALUES ".
                  "(Null,'".$guild_id."','".addslashes($guild_name)."','n/a','".$icount."','".$icount."','0','yes')";
                  $resultit = $roster->db->query($sqlit) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sqlit);
                  //echo $sqlit.'<br>';
            if (is_bool($resultiv) && is_bool($resultinv) && is_bool($resultit))
            {
                  echo 'installed';
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
	
	function tradeskill_icons ( $row )
{
	global $roster, $addon;

	$cell_value ='';

	// Don't proceed for characters without data
	if ($row['clientLocale'] == '')
	{
		return '<div>&nbsp;</div>';
	}

	$lang = $row['clientLocale'];

	$profs = explode(',',$row['professions']);
	foreach ( $profs as $prof )
	{
		$r_prof = explode('|',$prof);
		$toolTip = (isset($r_prof[1]) ? str_replace(':','/',$r_prof[1]) : '');
		$toolTiph = $r_prof[0];

		if( $r_prof[0] == $roster->locale->wordings[$lang]['riding'] )
		{
			if( $row['class']==$roster->locale->wordings[$lang]['Paladin'] || $row['class']==$roster->locale->wordings[$lang]['Warlock'] )
			{
				$icon = $roster->locale->wordings[$lang]['ts_ridingIcon'][$row['class']];
			}
			else
			{
				$icon = $roster->locale->wordings[$lang]['ts_ridingIcon'][$row['race']];
			}
		}
		else
		{
			$icon = isset($roster->locale->wordings[$lang]['ts_iconArray'][$r_prof[0]])?$roster->locale->wordings[$lang]['ts_iconArray'][$r_prof[0]]:'';
		}

		// Don't add professions we don't have an icon for. This keeps other skills out.
		if ($icon != '')
		{
			$icon = '<img class="membersRowimg" width="16" height="16" src="'.$roster->config['interface_url'].'Interface/Icons/'.$icon.'.'.$roster->config['img_suffix'].'" alt="" '.makeOverlib($toolTip,$toolTiph,'',2,'',',RIGHT,WRAP').' />';

			if( active_addon('info') )
			{
				$cell_value .= '<a href="' . makelink('char-info-recipes&amp;a=c:' . $row['member_id'] . '#' . strtolower(str_replace(' ','',$r_prof[0]))) . '">' . $icon . '</a>&nbsp;';
			}
			else
			{
				$cell_value .= $icon;
			}
		}
	}
	return $cell_value;
}

	function level_value ( $row, $field )
	{
		global $roster,$addon;

		$tooltip = '';

		
		if (isset($row['exp']) && $row['exp'] != '' && $row['exp'] != '0')
		{
                  list($current, $max, $rested) = explode( ':', $row['exp'] );

			if( $rested > 0 )
			{
				$rested = ' : ' . $rested;
			}
			$togo = sprintf('Xp to Go ', $max - $current, ($row['level']+1));

			$percent_exp = ($max > 0 ? round(($current/$max)*100) : 0);

			$tooltip = '<div style="white-space:nowrap;" class="levelbarParent" style="width:200px;"><div class="levelbarChild">XP ' . $current . '/' . $max . $rested . '</div></div>';
			$tooltip .= '<table class="expOutline" border="0" cellpadding="0" cellspacing="0" width="200">';
			$tooltip .= '<tr>';
			$tooltip .= '<td style="background-image: url(\'' . $roster->config['img_url'] . 'expbar-var2.gif\');" width="' . $percent_exp . '%"><img src="' . $roster->config['img_url'] . 'pixel.gif" height="14" width="1" alt="" /></td>';
			$tooltip .= '<td width="' . (100 - $percent_exp) . '%"></td>';
			$tooltip .= '</tr>';
			$tooltip .= '</table>';
		


			if( $row['level'] == ROSTER_MAXCHARLEVEL )
			{
				$tooltip = makeOverlib('Player is at Max LVL no xp data','','',2,'',',WRAP');
			}
			else
			{
				$tooltip = makeOverlib($tooltip,$togo,'',2,'',',WRAP');
			}
		}

			$percentage = round(($row['level']/ROSTER_MAXCHARLEVEL)*100);

			$cell_value = '<div ' . $tooltip . ' style="cursor:default;"><div class="levelbarParent" style="width:70px;"><div class="levelbarChild">' . $row['level'] . '</div></div>';
			$cell_value .= '<table class="expOutline" border="0" cellpadding="0" cellspacing="0" width="70">';
			$cell_value .= '<tr>';
			$cell_value .= '<td style="background-image: url(\'' . $roster->config['img_url'] . 'expbar-var2.gif\');" width="' . $percentage . '%"><img src="' . $roster->config['img_url'] . 'pixel.gif" height="14" width="1" alt="" /></td>';
			$cell_value .= '<td width="' . (100 - $percentage) . '%"></td>';
			$cell_value .= "</tr>\n</table>\n</div>\n";


		return '<div style="display:none;text-align:center;padding-top:15px;">' . str_pad($row['level'],2,'0',STR_PAD_LEFT) . '</div>' . $cell_value;
	}
	
	
		function name_value ( $row, $field )
	{
		global $roster, $addon;


			$tooltip_h = $row['name'] . ' : ' . $row['guild_title'];

			$tooltip = 'Level ' . $row['level'] . ' ' . $row['sex'] . ' ' . $row['race'] . ' ' . $row['class'] . "\n";

			$tooltip .= $roster->locale->act['lastonline'] . ': ' . $row['last_online'] . ' in ' . $row['zone'];
			//$tooltip .= ( $this->addon['config']['member_note'] == 0 || $row['nisnull'] ? '' : "\n" . $roster->locale->act['note'] . ': ' . $row['note'] );

			$tooltip = '<div style="cursor:help;" ' . makeOverlib($tooltip,$tooltip_h,'',1,'',',WRAP') . '>';


			if( active_addon('info') && $row['server'] )
			{
				return '<div style="display:none;">' . $row['name'] . '</div>' . $tooltip . '<a href="' . makelink('char-info&amp;a=c:' . $row['member_id']) . '">' . $row['name'] . '</a></div>';
			}
			else
			{
				return '<div style="display:none;">' . $row['name'] . '</div>' . $tooltip . $row['name'] . '</div>';
			}

	}
	
	
	function class_value ( $row, $field )
	{
		global $roster, $addon;

		if( $row['class'] != '' )
		{
			$icon_value = '';

				foreach ($roster->multilanguages as $language)
				{
					$icon_name = isset($roster->locale->wordings[$language]['class_iconArray'][$row['class']]) ? $roster->locale->wordings[$language]['class_iconArray'][$row['class']] : '';
					if( strlen($icon_name) > 0 ) break;
				}

				$icon_value .= '<img class="membersRowimg" width="18" height="18" src="' . $roster->config['img_url'] . 'class/' . $icon_name . '.jpg" alt="" />';

				$lang = $roster->config['locale'];

				$talents = explode(',',$row['talents']);

				$spec = $specicon = '';
				$name = '';
                        $points = '';
                        $icon = '';
				$tooltip = array();
				$specpoint = 0;
				$notalent = true;
				//print_r($talents).'<br><br>';
				if (is_array($talents))
                        {
				foreach( $talents as $talent )
				{
				  if (isset($talent) && $talent != ''){
					list($name, $points, $icon) = explode('|',$talent);
					$tooltip[] = $points;
					if( $points > $specpoint )
					{
						$specpoint = $points;
						$spec = $name;
						$specicon = $icon;
						$notalent = false;
					}
					}
				}
				$specline = implode(' / ', $tooltip);
				if( !$notalent )
				{
					$specicon = '<img class="membersRowimg" width="18" height="18" src="' . $roster->config['img_url'] . 'spec/' . $specicon . '.' . $roster->config['img_suffix'] . '" alt="" ' . makeOverlib($specline,$spec,'',1,'',',RIGHT,WRAP') . ' />';
				}
				}

				if( active_addon('info') )
				{
					$icon_value .= '<a href="' . makelink('char-info-talents&amp;a=c:' . $row['member_id']) . '">&nbsp;' . $specicon . '</a>';
				}
				else
				{
					$icon_value .= $specicon;
				}


				$fieldtext = $row['class'];
			

				
				$class_color = ( isset($roster->locale->wordings[$language]['class_to_en'][$row['class']]) ? $roster->locale->wordings[$language]['class_to_en'][$row['class']] : '' );

				if( strlen($class_color) > 0 )
				{
					$class_color = $roster->locale->wordings[$language][$class_color];
					//break;
				}

				if( $class_color != '' )
				{
					return '<div style="display:none;">' . $row['class'] . '</div>' . $icon_value . '<span class="class' . $class_color . 'txt">&nbsp;' . $fieldtext . '</span>';
				}
				else
				{
					return '<div style="display:none;">' . $row['class'] . '</div>' . $icon_value . '<span class="class' . $row['class'] . 'txt">&nbsp;' . $fieldtext . '</span>';
				}

		}
		else
		{
			return '&nbsp;';
		}
	}
	function spec_icon( $row )
	{
		global $roster, $addon;

		$cell_value ='';

		// Don't proceed for characters without data
		if( !isset($row['talents']) || $row['talents'] == '' )
		{
			return '<img class="membersRowimg" width="18" height="18" src="' . $roster->config['img_url'] . 'pixel.gif" alt="" />';
		}

		$lang = $row['clientLocale'];

		$talents = explode(',',$row['talents']);

		$spec = $specicon = '';
		$tooltip = array();
		$specpoint = 0;
		foreach( $talents as $talent )
		{
			list($name, $points, $icon) = explode('|',$talent);
			$tooltip[] = $points;
			if( $points > $specpoint )
			{
				$specpoint = $points;
				$spec = $name;
				$specicon = $icon;
			}
		}
		$tooltip = implode(' / ', $tooltip);

		$specicon = '<img class="membersRowimg" width="18" height="18" src="' . $roster->config['img_url'] . 'spec/' . $specicon . '.' . $roster->config['img_suffix'] . '" alt="" ' . makeOverlib($tooltip,$spec,'',1,'',',RIGHT,WRAP') . ' />';

		if( active_addon('info') )
		{
			$cell_value .= '<a href="' . makelink('char-info-talents&amp;a=c:' . $row['member_id']) . '">' . $specicon . '</a>';
		}
		else
		{
			$cell_value .= $specicon;
		}
		return $cell_value;
	}
	function text()
	{
	     echo '<hr><br><hr><br>';
	}
	
	

    
    function get_item_icon_mod($pitem,$table)
      {
      global $roster, $addon;
      
            require_once($addon['dir'] . 'inc\Snoopy.class.php');
            $snoopy = new Snoopy;
            if($snoopy->fetch("http://www.wowarmory.com/item-info.xml?i=".$pitem.""))
            $text = ($snoopy->results);
            preg_match('|<img class="p" src="/wow-icons/_images/64x64/(.+?).jpg"></div>|', $text, $match);
            $sql3 = "UPDATE `".$roster->db->table($table,$addon['basename'])."` SET `m_info_icon` = '".$match['1']."' WHERE `m_info_id` = '".addslashes($pitem)."'";
                                                            //echo "<!-- $sql3 -->\n\n";
            $result3 = $roster->db->query($sql3) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql3);
                                                            
                                                            
            return $match['1'];
            
      }
      function get_item_icon($pitem,$table)
      {
      global $roster, $addon;
      
            require_once($addon['dir'] . 'inc\Snoopy.class.php');
            $snoopy = new Snoopy;
            if($snoopy->fetch("http://www.wowarmory.com/item-info.xml?i=".$pitem.""))
            $text = ($snoopy->results);
            preg_match('|<img class="p" src="/wow-icons/_images/64x64/(.+?).jpg"></div>|', $text, $match);
            $sql3 = "UPDATE `".$roster->db->table($table,$addon['basename'])."` SET `l_texture` = '".$match['1']."' WHERE `l_id` = '".addslashes($pitem)."'";
                                                            //echo "<!-- $sql3 -->\n\n";
            $result3 = $roster->db->query($sql3) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql3);
                                                            
                                                            
            return $match['1'];
            
      }
      
      function get_item_quality($pitem,$item_name)
      {
      global $roster, $addon;
      
            require_once($addon['dir'] . 'inc\Snoopy.class.php');
            $snoopy = new Snoopy;
            if($snoopy->fetch("http://www.wowarmory.com/item-info.xml?i=".$pitem.""))
            $text = ($snoopy->results);//$item_name
            preg_match('|<span class="my(.+?) myBold myItemName"><span class="">'.$item_name.'|', $text, $match);
            
            return $match['1'];
      }
      
      function color($v)
{
	switch($v)
	{
		case 'Grey': return "#c9c9c9"; break;
		case 'White': return "#FFFFFF"; break;
		case 'Green': return "#00FF00"; break;
		case 'Blue': return "#0070DD"; break;
		case 'Purple': return "#A335EE"; break;
		case 'Orange': return "#FF8000"; break;
		case 'Gold': return "#e5cc80"; break;
		case 'Red': return "#d80000"; break;
	}
}
      
      function get_tooltip($itemid)
      {
            global $roster, $addon;

      
      $filename = $addon['dir'] . 'cache\\'.$itemid.'-US-tooltip.html';
      //echo $filename;
      $lang = 'US';
      
      
      if(file_exists($filename) && trim(file_get_contents($filename))!="" && time()-filemtime($filename) < 604800)
      {
	     return file_get_contents($filename);
      }
      else
      {
	$url = ARMORY . '/item-tooltip.xml?i='.$itemid;

            if (function_exists('curl_init'))
            {
                  $ch = curl_init();
                  curl_setopt ($ch, CURLOPT_URL, $url);
                  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
                  curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, '10');
                  curl_setopt ($ch, CURLOPT_HEADER, 0);
                  curl_setopt ($ch, CURLOPT_HTTPHEADER, array("Accept-Language: ".$lang)); 
		
                  $f = curl_exec($ch);
                  curl_close($ch);
            } 
            elseif(ini_get('allow_url_fopen') == 1) 
            {
                  $contextOptions = array('http'=>array('method'=>"GET",'header'=>"Accept-language: ".$lang."\r\n"));
                  $context = stream_context_create($contextOptions);
                  $f = '';
                  $handle = fopen($url, 'r', false, $context);
                  while(!feof($handle))
                  {
                        $f .= fgets($handle);
                  }
                  fclose ($handle);
                  return $f;
            }
             
            elseif(function_exists('stream_context_create') && function_exists('file_get_contents')) 
            {
                  $contextOptions = array('http'=>array('method'=>"GET",'header'=>"Accept-language: ".$lang."\r\n"));
                  $context = stream_context_create($contextOptions);
                  $f = file_get_contents($url,false, $context);
            } 
            else 
            {
                  die('There couldn\'t be found any function on your server, which work!<br /><br />Try this functions:<br />- curl<br />- file_get_contents with stream_context_create<br />- fopen with stream_context_create<br /><br />Ask your hoster to activate these functions.');
            }
	
            $f = str_replace('<!DOCTYPE table PUBLIC \"<\/i>-//W3C//DTD XHTML 1.0 Transitional//EN\"<\/i> \"<\/i>http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"<\/i>>','',$f);
	     $f = str_replace('<\/i>' , '', $f);
	     $f = str_replace('/shared/global/tooltip/images/icons','/image',$f);
	
	     $handle = @fopen($filename, 'w+') or die("Cannot open file ($filename)");
	     @fwrite($handle, str_replace('/shared/global/tooltip/images/icons','/image',$f)) or die("Cannot write to file ($filename)");
	     fclose($handle);
	
	     return $f;
	}
	
	}

        
      
}
?>
