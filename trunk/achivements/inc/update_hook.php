<?php
/**
 * WoWRoster.net WoWRoster
 *
 * Displays Raid Progresion info
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *

 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $Id$
 * @link       http://ulminia.zenutech.com
 * @package    Achivements
*/

class achivementsUpdate
{

var $messages = '';		// Update messages
	var $data = array();		// Addon config data automatically pulled from the addon_config table
	var $files = array();
	var $evid = '';
	var $evt = '0';
	var $debuging_flag = '0';
	var $a = Array();
	var $cfg = array();
	var $achnum = '';
	var $armory;
	var $base_url;
      
      
      
var $pages = array(
	'92' => Array(
		'0' => 'General',
		),
	'96' => Array(
		'0' => 'Quests',
		'1' => 'Classic',
		'2' => 'The Burning Crusade',
		'3' => 'Wrath of the Lich King',
		),
	'97' => Array(
		'0' => 'Exploration',
		'1' => 'Eastern Kingdoms',
		'2' => 'Kalimdor',
		'3' => 'Outland',
		'4' => 'Northrend',
		),
	'95' => Array(
		'0' => 'Player vs. Player',
		'1' => 'Arena',
		'2' => 'Alterac Valley',
		'3' => 'Arathi Basin',
		'4' => 'Eye of the Storm',
		'5' => 'Warsong Gulch',
		'6' => 'Strand of the Ancients',
		'7' => 'Wintergrasp',
		'8' => 'Isle of Conquest',
		),
	'168' => Array(
		'0' => 'Dungeons &amp; Raids',
            '1' => 'Classic',
            '2' => 'The Burning Crusade',
            '3' => 'Lich King Dungeon',
            '4' => 'Lich King Heroic',
            '5' => 'Lich King 10-Player Raid',
            '6' => 'Lich King 25-Player Raid',
            '7' => 'Secrets of Ulduar 10-Player Raid',
            '8' => 'Secrets of Ulduar 25-Player Raid',
            '9' => 'Call of the Crusade 10-Player Raid',
            '10' => 'Call of the Crusade 25-Player Raid',
		),
	'169' => Array(
		'0' => 'Professions',
		'1' => 'Cooking',
		'2' => 'Fishing',
		'3' => 'First Aid',
		),
	'201' => Array(
		'0' => 'Reputation',
		'1' => 'Classic',
		'2' => 'The Burning Crusade',
		'3' => 'Wrath of the Lich King',
		),
	'155' => Array(
		'0' => 'World Events',
		'1' => 'Lunar Festival',
		'2' => 'Love is in the Air',
		'3' => 'Noblegarden',
		'4' => 'Children\'s Week',
		'5' => 'Midsummer',
		'6' => 'Brewfest',
		'7' => 'Hallow\'s End',
		'8' => 'Pilgrim\'s Bounty',
		'9' => 'Winter Veil',
		'10' => 'Argent Tournament',
		),
	'81' => Array(
		'0' => 'Feats of Strength',
		),
);

      var $order = '0';
      
	function achivementsUpdate( $data )
	{
		$this->data = $data;
		
            $this->baseurl();
	}

	/**
	 * Standalone Update Hook
	 *
	 * @return bool
	 */
      function baseurl(){
      global $roster, $addon;
      
      $r =split("en", $roster->config['locale']);
      print_r($r);
	 
	 
	 if( $r[1] == 'US' )
		{
			//$base_url = 'http://localhost:18080/?url=http://www.wowarmory.com/';
			$this->base_url = 'http://www.wowarmory.com/';
		}
		else
		{
			//$base_url = 'http://localhost:18080/?url=http://eu.wowarmory.com/';
			$this->base_url = 'http://eu.wowarmory.com/';
		}
	}

	/**
	 * Standalone Update Hook
	 *
	 * @return bool
	 */
	function update( )
	{
		global $roster;
		return true;
	}

	function char($char, $memberid) 
	{
	     //print_r($this->data);
		global $roster, $addon;
            $this->messages .='<li>Updating Achievements: ';
            $sql = '';
            $sqll = "DELETE FROM `" . $roster->db->table('data',$this->data['basename']) . "` Where `member_id` = '".$memberid."';";
            $resultl = $roster->db->query($sqll) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sqll);
            $sqlll = "DELETE FROM `" . $roster->db->table('summary',$this->data['basename']) . "` Where `member_id` = '".$memberid."';";
            $resultll = $roster->db->query($sqlll) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sqlll);
            
            require_once(ROSTER_LIB . 'armory.class.php');
			$armory = new RosterArmory();
		$r = '';
            	
	// begin page phasibng
      		
      foreach ($this->pages as $cat => $title)
      {      
                  
            $r = $armory->fetchArmorya( $type = '12', $character =$char['Name'], $guild = false, $realm = $char['Server'], $item_id = $cat,$fetch_type = 'array' );//getArmoryDataXML($url);
	
            $g = 0;

            foreach ($r as $category )
            {
                  
                  //echo '<hr><br>~~-  '.$title[0].'~~~<br>';
                  foreach ($category->achievement as $achievement)
                  {
                  
                        
                        $achv_points='';
                        $achv_icon='';
                        $achv_title='';
                        $achv_disc='';
                        $achv_date='';
                        $achv_title='';
                        $achv_id='';
                        $achv_reward_title = '';
                        $achv_criteria = '';
                        $achv_progress = '';
                        $achv_progress_width = '';
                        $achv_complete = '';
                        $quantity = '';
                        $max = '';
                        $order = '';
                        
                        //echo '~~----  '.$title[$g].'~~~<br>';
                        $achv_cat_sub = $title[$g];
                        $temp = get_object_vars($achievement);
                        $achv_title = $temp['@attributes']['title'];//.' -<br>';
                        //--echo $temp['@attributes']['categoryId']v.' -<br>';// => 97
                        if (isset($temp['@attributes']['dateCompleted']))
                        {
                              $achv_date=$temp['@attributes']['dateCompleted'];//.' -<br>';// => 2009-01-16-07:00
                              $achv_complete = '1';
                        }
                        $achv_disc=$temp['@attributes']['desc'];//.' -<br>';// => Explore the regions of Northrend.
                        $achv_icon=$temp['@attributes']['icon'];//.' -<br>';// => achievement_zone_northrend_01
                        $achv_id=$temp['@attributes']['id'];//.' -<br>';// => 45
                        $achv_points=$temp['@attributes']['points'];//.' -<br>';// => 25
                        if (isset($temp['@attributes']['reward']))
                        {
                              $achv_reward_title = $temp['@attributes']['reward'];//.' -<br><br>';// => Reward: Tabard of the Explorer
                        }
                        ////--echo $achievements->{'@attributes'}['title'].' -<br>';
                        //--echo 'Criteria listing<br>';
                        $datae = '';
                        foreach($achievement->criteria as $achievemen)
                        {

                              $temp2 = get_object_vars($achievemen);
                              if (isset($temp2['@attributes']['name']))
                              {
                                    $datae.= $temp2['@attributes']['name'].'<br>';//.' -<br>';
                              }
                              if (isset($temp2['@attributes']['quantity']))
                              {
                                    $quantity = $temp2['@attributes']['quantity'];//.'-<br>';
                              }
                              if (isset($temp2['@attributes']['maxQuantity']))
                              {
                                     $max = $temp2['@attributes']['maxQuantity'];//.'-<br>';
                              }
                              if ($max != '')
                              {
                                    $achv_progress_width = 'width:'.round( ( ( $quantity / $max )*100 ) ).'%';
                                    $achv_progress = ''.$quantity.' / '.$max.'';
                              }
                              
                        }
                        
                        //--echo 'Achivement Criteria <BR>';
                        
                        foreach($achievement->achievement as $achievemen)
                        {
                              $date = '';
                              $b1 = '';
                              $b2 = '';
                              $temp2 = get_object_vars($achievemen);
                  
                              if (isset($temp2['@attributes']['dateCompleted']))
                              {
                        ////--echo '-------'.$temp2['@attributes']['date'].' -<br>';
                                    $date = '( ' . $temp2['@attributes']['dateCompleted'] . ' )';
                                    $b1 = '<b><span style="color:#7eff00;">';
                                    $b2 = '</span></b>';
                              }
                              else
                              {
                                    $date = '';
                                    $b1 = '';
                                    $b2 = '';
                              }
                              if (isset($temp2['@attributes']['icon']))
                              {
                                    $datae.= '<img src="img/Interface/Icons/' .$temp2['@attributes']['icon'] . '.png" width="24" height="24"> ';
                              }
                              if (isset($temp2['@attributes']['title']))
                              {
                                    $datae.= $b1.$temp2['@attributes']['title'].$b2.' ' . $date . ' ';
                              }

                              if (isset($temp2['@attributes']['quantity']))
                              {
                                    $quantity = $temp2['@attributes']['quantity'];//.'-<br>';
                              }
                              if (isset($temp2['@attributes']['maxQuantity']))
                              {
                                     $max = $temp2['@attributes']['maxQuantity'];//.'-<br>';
                              }
                              if ($max != '')
                              {
                                    $achv_progress_width = 'width:'.round( ( ( $quantity / $max )*100 ) ).'%';
                                    $achv_progress = ''.$quantity.' / '.$max.'';
                              }
                              if (isset($temp2['@attributes']['points']))
                              {
                                    $datae.= ' Points'.$temp2['@attributes']['points'].'<br>';
                              }
                               
                        }
                        
                        $achv_criteria = $datae;
            
               
                        
                        $this->achnum++;

                        if ($achv_title != '' && $achv_disc != '')
                        {
                              $sql = "INSERT INTO `" . $roster->db->table('data',$this->data['basename']) . "` 
                              (`id`,`member_id`,`guild_id`,`achv_cat`,`achv_cat_title`,`achv_cat_sub`,`achv_cat_sub2`,
                              `achv_id`,`achv_points`,`achv_icon`,`achv_title`,`achv_reward_title`,`achv_disc`,`achv_date`,
                              `achv_criteria`,`achv_progress`,`achv_progress_width`,`achv_complete`) 
                              VALUES 
                              (null,'".$memberid."','".$this->data['guild_id']."','".$cat."','".addslashes($title[0])."',
                              '','".addslashes($title[0])."','".$achv_id."','".$achv_points."',
                              '".addslashes($achv_icon)."','".$achv_id."title','".addslashes($achv_reward_title)."','".$achv_id."disc',
                              '".addslashes($achv_date)."','".addslashes($achv_criteria)."','".$achv_progress."','".$achv_progress_width."','".$achv_complete."');";
                              $result = $roster->db->query($sql) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql);
                        }
                  
                        $this->order++;
                  }
      
                  foreach($category->category as $f => $achievements)
                  {
                        $g++;
                        
                        //aprint($category);
                        $achv_cat_sub = $title[$g];
                       // echo  $achv_cat_sub.' - '.$f.' - '.$category.'<br>';
      
                        foreach ($achievements as $achiev)
                        {
            
                              $achv_points='';
                              $achv_icon='';
                              $achv_title='';
                              $achv_disc='';
                              $achv_date='';
                              $achv_title='';
                              $achv_id='';
                              $achv_reward_title = '';
                              $achv_criteria = '';
                              $achv_progress = '';
                              $achv_progress_width = '';
                              $quantity = '';
                              $max = '';
                              $order = '';
                              $achv_complete = '';
                        
                  
                              $temp = get_object_vars($achiev);
                              $achv_title = $temp['@attributes']['title'];//.' -<br>';
                              //--echo $temp['@attributes']['categoryId']v.' -<br>';// => 97
                              if (isset($temp['@attributes']['dateCompleted']))
                              {
                                    $achv_date=$temp['@attributes']['dateCompleted'];//.' -<br>';// => 2009-01-16-07:00
                                    $achv_complete = '1';
                              }
                              $achv_disc=$temp['@attributes']['desc'];//.' -<br>';// => Explore the regions of Northrend.
                              $achv_icon=$temp['@attributes']['icon'];//.' -<br>';// => achievement_zone_northrend_01
                              $achv_id=$temp['@attributes']['id'];//.' -<br>';// => 45
                              $achv_points=$temp['@attributes']['points'];//.' -<br>';// => 25
                              if (isset($temp['@attributes']['reward']))
                              {
                                    $achv_reward_title = $temp['@attributes']['reward'];//.' -<br><br>';// => Reward: Tabard of the Explorer
                              }
                              ////--echo $achievements->{'@attributes'}['title'].' -<br>';
                              //--echo 'Criteria listing<br>';
                              $datae = '';
                              foreach($achiev->criteria as $achievemen)
                              {

                                    $temp2 = get_object_vars($achievemen);
                                    if (isset($temp2['@attributes']['name']))
                                    {
                                          $datae.= $temp2['@attributes']['name'].'<br>';//.' -<br>';
                                    }
                                    if (isset($temp2['@attributes']['quantity']))
                                    {
                                          $quantity = $temp2['@attributes']['quantity'];//.'-<br>';
                                    }
                                    if (isset($temp2['@attributes']['maxQuantity']))
                                    {
                                          $max = $temp2['@attributes']['maxQuantity'];//.'-<br>';
                                    }
                                    if ($max != '')
                                    {
                                          $achv_progress_width = 'width:'.round( ( ( $quantity / $max )*100 ) ).'%';
                                          $achv_progress = ''.$quantity.' / '.$max.'';
                                    }
                              
                              }
                        
                        //--echo 'Achivement Criteria <BR>';
                        
                              foreach($achiev->achievement as $achievemen)
                              {
                                    $date = '';
                                    $b1 = '';
                                    $b2 = '';
                                    $temp2 = get_object_vars($achievemen);
                  
                                    if (isset($temp2['@attributes']['dateCompleted']))
                                    {
                        ////--echo '-------'.$temp2['@attributes']['date'].' -<br>';
                                          $date = '( ' . $temp2['@attributes']['dateCompleted'] . ' )';
                                          $b1 = '<b><span style="color:#7eff00;">';
                                          $b2 = '</span></b>';
                                    }
                                    else
                                    {
                                          $date = '';
                                          $b1 = '';
                                          $b2 = '';
                                    }
                                    if (isset($temp2['@attributes']['icon']))
                                    {
                                          $datae.= '<img src="img/Interface/Icons/' .$temp2['@attributes']['icon'] . '.png" width="24" height="24"> ';
                                    }
                                    if (isset($temp2['@attributes']['title']))
                                    {
                                          $datae.= $b1.$temp2['@attributes']['title'].$b2.' ' . $date . ' ';
                                    }

                                    if (isset($temp2['@attributes']['quantity']))
                                    {
                                          $quantity = $temp2['@attributes']['quantity'];//.'-<br>';
                                    }
                                    if (isset($temp2['@attributes']['maxQuantity']))
                                    {
                                          $max = $temp2['@attributes']['maxQuantity'];//.'-<br>';
                                    }
                                    if ($max != '')
                                    {
                                          $achv_progress_width = 'width:'.round( ( ( $quantity / $max )*100 ) ).'%';
                                          $achv_progress = ''.$quantity.' / '.$max.'';
                                    }
                                    if (isset($temp2['@attributes']['points']))
                                    {
                                          $datae.= ' Points'.$temp2['@attributes']['points'].'<br>';
                                    }
                               
                              }
                        
                              $achv_criteria = $datae;
                              $this->achnum++;
                              
                              if ($achv_title != '' && $achv_disc != '')
                              {
                                    $sql = "INSERT INTO `" . $roster->db->table('data',$this->data['basename']) . "` 
                                    (`id`,`member_id`,`guild_id`,`achv_cat`,`achv_cat_title`,`achv_cat_sub`,`achv_cat_sub2`,
                                    `achv_id`,`achv_points`,`achv_icon`,`achv_title`,`achv_reward_title`,`achv_disc`,`achv_date`,
                                    `achv_criteria`,`achv_progress`,`achv_progress_width`,`achv_complete`) 
                                    VALUES 
                                    (null,'".$memberid."','".$this->data['guild_id']."','".$cat."','".addslashes($title['0'])."',
                                    '".addslashes($achv_cat_sub)."','".$this->order."','".$achv_id."','".$achv_points."',
                                    '".addslashes($achv_icon)."','".$achv_id."title','".addslashes($achv_reward_title)."','".$achv_id."disc',
                                    '".addslashes($achv_date)."','".addslashes($achv_criteria)."','".$achv_progress."','".$achv_progress_width."','".$achv_complete."');";
                              
                                    $result = $roster->db->query($sql) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql);
                              }            
                        }
                  }
            }
            //end pages
      }

            
            $summarya = $armory->fetchArmorya( $type = '11', $character =$char['Name'], $guild = false, $realm = $char['Server'], $item_id = '',$fetch_type = 'array' );//getArmoryDataXML($url);
	
	     	$temps = get_object_vars($summarya->achievements->summary);
            $total = 'Total Completed: '.$temps['c']['earned'].' / '.$temps['c']['total'];
            $general         = $temps['category']['0']->c['earned'].' / '.$temps['category'][0]->c['total'];
            $quests          = $temps['category']['1']->c['earned'].' / '.$temps['category'][1]->c['total'];
            $exploration     = $temps['category']['2']->c['earned'].' / '.$temps['category'][2]->c['total'];
            $pvp             = $temps['category']['3']->c['earned'].' / '.$temps['category'][3]->c['total'];
            $dn_raids        = $temps['category']['4']->c['earned'].' / '.$temps['category'][4]->c['total'];
            $prof            = $temps['category']['5']->c['earned'].' / '.$temps['category'][5]->c['total'];
            $rep             = $temps['category']['6']->c['earned'].' / '.$temps['category'][6]->c['total'];
            $world_events    = $temps['category']['7']->c['earned'].' / '.$temps['category'][7]->c['total'];
            $feats           = $temps['category']['8']->c['earned'].' / '.$temps['category'][8]->c['total'];
            $title_1 = $temps['achievement']['0']['title'];
            $date_1 = $temps['achievement']['0']['dateCompleted'];
            $disc_1 =  $temps['achievement']['0']['desc'];
            $points_1 = $temps['achievement']['0']['points'];

            $title_2 = $temps['achievement']['1']['title'];
            $date_2 = $temps['achievement']['1']['dateCompleted'];
            $disc_2 =  $temps['achievement']['1']['desc'];
            $points_2 = $temps['achievement']['1']['points'];
            
            $title_3 = $temps['achievement']['2']['title'];
            $date_3 = $temps['achievement']['2']['dateCompleted'];
            $disc_3 =  $temps['achievement']['2']['desc'];
            $points_3 = $temps['achievement']['2']['points'];
            
            $title_4 = $temps['achievement']['3']['title'];
            $date_4 = $temps['achievement']['3']['dateCompleted'];
            $disc_4 =  $temps['achievement']['3']['desc'];
            $points_4 = $temps['achievement']['3']['points'];
            
            $title_5 = $temps['achievement']['4']['title'];
            $date_5 = $temps['achievement']['4']['dateCompleted'];
            $disc_5 =  $temps['achievement']['4']['desc'];
            $points_5 = $temps['achievement']['4']['points'];

            $sql7 = "INSERT INTO `" . $roster->db->table('summary',$this->data['basename']) . "` 
                  (`id`,`member_id`,`guild_id`,`total`,
                    `general`,`quests`,`exploration`,`pvp`,`dn_raids`,`prof`,`rep`,`world_events`,`feats`,
                    `title_1`,`disc_1`,`date_1`,`points_1`,`title_2`,`disc_2`,`date_2`,`points_2`,
                    `title_3`,`disc_3`,`date_3`,`points_3`,`title_4`,`disc_4`,`date_4`,`points_4`,
                    `title_5`,`disc_5`,`date_5`,`points_5`
                    ) 
                    VALUES 
                    (null,'".$memberid."','".$this->data['guild_id']."','".$total."','".$general."','".$quests."',".
                    "'".$exploration."','".$pvp."','".$dn_raids."','".$prof."','".$rep."','".$world_events."','".$feats."',".
                    "'".addslashes($title_1)."','".addslashes($disc_1)."','".$date_1."','".$points_1."',".
                    "'".addslashes($title_2)."','".addslashes($disc_1)."','".$date_2."','".$points_2."',".
                    "'".addslashes($title_3)."','".addslashes($disc_1)."','".$date_3."','".$points_3."',".
                    "'".addslashes($title_4)."','".addslashes($disc_1)."','".$date_4."','".$points_4."',".
                    "'".addslashes($title_5)."','".addslashes($disc_1)."','".$date_5."','".$points_5."');";
                    $result7 = $roster->db->query($sql7) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql7);

            $this->messages .=$this->achnum.'</li>';
            return true;
      }
	
	function reset_messages()
	{
		$this->messages = '';

	}
	
	function reset_values()
	{
		$this->assignstr = '';
	}
	     
	function setError($message,$error)
	{
		$this->errors[] = array($message=>$error);
	}
      
      
      /**
     * helper function to get classes for content
     *
     * @param string $class
     * @param string $tree
     * @return string
     */
    function _parseData ( $array = array() ) {
        $this->datas = array();
        $this->_makeSimpleClass( $array );
        $this->_debug( 3, true, 'Parsed XML data', 'OK' );
        return $this->datas[0];
        $this->_debug( 3, '', 'Parsed XML data', 'OK' );
    }

    function _makeSimpleClass ( $array = array() ) {

        $tags = array_keys( $array );
        foreach ( $array as $tag => $content ) {
            foreach ( $content as $leave ) {
                $this->_initClass( $tag, $leave['attribs'] );
                $this->datas[count($this->datas)-1]->setProp("_CDATA", $leave['data']);
                if ( array_keys($leave['child']) ) {
                    $this->_makeSimpleClass( $leave['child'] );
                }
                $this->_finalClass( $tag );
            }
        }
        $this->_debug( 3, '', 'Made simple class', 'OK' );
    }

    /**
     * helper function initialise a simpleClass Object
     *
     * @param string $class
     * @param string $tree
     * @return string
     */
    function _initClass( $tag, $attribs = array() ) {
        $node = new SimpleClass();
        $node->setArray($attribs);
        $node->setProp("_TAGNAME", $tag);
        $this->datas[] = $node;
        $this->_debug( 3, '', 'Initialized simple class', 'OK' );
    }


    /**
     * helper function finalize a simpleClass Object
     *
     * @param string $class
     * @param string $tree
     * @return string
     */
    function _finalClass( $tag, $val = array() ) {
        if (count($this->datas) > 1) {
            $child = array_pop($this->datas);

            if (count($this->datas) > 0) {
                $parent = &$this->datas[count($this->datas)-1];
                $tag = $child->_TAGNAME;

                if ($parent->hasProp($tag)) {
                    if (is_array($parent->$tag)) {
                        //Add to children array
                        $array = &$parent->$tag;
                        $array[] = $child;
                    } else {
                        //Convert node to an array
                        $children = array();
                        $children[] = $parent->$tag;
                        $children[] = $child;
                        $parent->$tag = $children;
                    }
                } else {
                    $parent->setProp($tag, $child);
                }
            }
        }
        $this->_debug( 3, '', 'Finalized simple class', 'OK' );
    }
         

}

