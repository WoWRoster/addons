<?php
/**
 * WoWRoster.net WoWRoster
 *
 * ArmorySync Library
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    ArmorySync
*/

if( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

require_once ($addon['dir'] . 'inc/armorysyncbase.class.php');
require_once( ROSTER_LIB . 'simple.class.php' );
define("USE_CURL", TRUE);


class ArmorySync extends ArmorySyncBase {

    var $memberName = '';
    var $memberId = 0;
    var $guildId = 0;
    var $server = '';
    var $region = '';

    var $content = array();
    var $content2 = array();
    var $talentsc = array();
    var $talentsr = array();
    var $talentst = array();
    var $tree = array();
    var $talenticon = array();
    var $armroytalents1 = '';
    var $armroytalents2 = '';
    var $data = array();
    var $properties = array();
    var $classId = '';
    var $class = '';

    var $message;
    var $debuglevel = 0;
    var $debugmessages = array();
    var $errormessages = array();
    var $assignstr = '';
	var $assigngem = '';

    var $datas = array();

    var $status = array(    'guildInfo' => 0,
                            'characterInfo' => 0,
                            'skillInfo' => 0,
                            'reputationInfo' => 0,
                            'equipmentInfo' => 0,
                            'talentInfo' => 0,
                        );
                        

	function getMessages()
	
	{
	global $roster, $addon;
		$message = $this->message;
$output = '';
		if( !empty($message) )
		{
			// Replace newline feeds with <br />, then newline
			$messageArr = explode("\n",$message);

			$row=0;
			foreach( $messageArr as $line )
			{
				if( $line != '' )
				{
					$output .= ''.$line.'<BR>';
				}
			}

			return $output;
		}
		else
		{
			return '';
		}
	}
	function setMessage($message)
	{
		$this->message .= $message;
	}
	
    function reset_values()
	{
		$this->assignstr = '';
	}


	/**
	 * Add a value to an INSERT or UPDATE SQL string
	 *
	 * @param string $row_name
	 * @param string $row_data
	 */
	function add_value( $row_name , $row_data )
	{
		global $roster;

		if( $this->assignstr != '' )
		{
			$this->assignstr .= ',';
		}

		// str_replace added to get rid of non breaking spaces in cp.lua tooltips
		$row_data = str_replace(chr(194) . chr(160), ' ', $row_data);
		$row_data = stripslashes($row_data);
		$row_data = $roster->db->escape($row_data);

		$this->assignstr .= " `$row_name` = '$row_data'";
	}

    /**
     * syncronises one member with blizzards armory
     *
     * @param string $server
     * @param int $memberId
     * @return bool
     */
        function regionlocal($loc)
        {
                if (isset($loc))
                {
                switch( $loc )
		{
		        case 'en_us':
		                $val = 'US';
		        break;
		        case 'fr_fr':
		                $val = 'FR';
		        break;
		        case 'de_de':
		                $val = 'DE';
		        break;
		        case 'es_es':
		                $val = 'ES';
		        break;
		}
                }
                else
                {
                $var = 'US';
                }
                return $val;
        }
                         
        
    function synchMemberByID( $server, $memberId = 0, $memberName = false, $region = false, $guildId = 0 ) {
        global $addon, $roster, $update;

        $this->server = $server;
        $this->memberId = $memberId;
        $this->memberName = $memberName;
        $this->region = $region;
        $this->guildId = $guildId;
        //aprint($this->data);
        $this->_getRosterData();
        if ( $this->status['characterInfo'] ) {
            include_once(ROSTER_LIB . 'update.lib.php');
            $update = new update;
            $update->fetchAddonData();
            $update->uploadData['characterprofiler']['myProfile'][$this->server]['Character'][$this->data['Name']] = $this->data;
            $this->message = $update->processMyProfile();
            $tmp = explode( "\n", $this->message);
            $this->message = implode( '', $tmp);
            if ( strpos( $this->message, sprintf($roster->locale->act['upload_data'],$roster->locale->act['char'],$memberName,$server,$region)) ) {
                $this->_debug( 1, true, 'Synced armory data for '. $this->memberName. ' with roster',  'OK' );
                return true;
            } else {
                $this->_debug( 1, false, 'Synced armory data for '. $this->memberName. ' with roster',  'Failed' );
                return false;
            }
        } else {
            $this->message = "No infos for ". $this->memberName. "<br>Character has probalby not been updated for a while";
            $this->_debug( 1, false, 'Synced armory data '. $this->memberName. ' with roster',  'Failed' );
            return false;
        }
    }

    /**
     * syncronises one member with blizzards armory
     *
     * @param string $server
     * @param int $memberId
     * @return bool
     */
    function synchGuildByID( $server, $memberId = 0, $memberName = false, $region = false ) {
        global $addon, $roster, $update;

        $this->server = $server;
        $this->guildId = $memberId;
        $this->region = $region;
        $this->memberName = $memberName;
        $this->_getGuildInfo();
       /// if ( $this->status['guildInfo'] ) {
            include_once(ROSTER_LIB . 'update.lib.php');
            $update = new update;
            $update->fetchAddonData();

            $update->uploadData['characterprofiler']['myProfile'][$this->server]['Guild'][$this->data['name']] = $this->data;
            $this->message = $update->processGuildRoster();
            $tmp = explode( "\n", $this->message);
            $this->message = implode( '', $tmp);

            $this->_debug( 1, true, 'Synced armory data '. $this->memberName. ' with roster',  'OK' );
            return true;
       // }
       // $this->_debug( 0, false, 'Synced armory data '. $this->memberName. ' with roster',  'Failed' );
       // return false;
    }

function _synchGuildByID( $server, $memberId = 0, $memberName = false, $region = false, $guilddata) {
        global $addon, $roster, $update;

        $this->server = $server;
        $this->guildId = $memberId;
        $this->region = $region;
        $this->memberName = $memberName;
        $this->build_guild($guilddata, $this->guildId);
       /// if ( $this->status['guildInfo'] ) {
       //aprint($this-data);
            include_once(ROSTER_LIB . 'update.lib.php');
            $update = new update;
            $update->fetchAddonData();

            $update->uploadData['characterprofiler']['myProfile'][$this->server]['Guild'][$this->data['GuildName']] = $this->data;
            $this->message = $update->processGuildRoster();
            $tmp = explode( "\n", $this->message);
            $this->message = implode( '', $tmp);

            $this->_debug( 1, true, 'Synced armory data '. $this->data['GuileName'] . ' with roster',  'OK' );
            return true;
       // }
       // $this->_debug( 0, false, 'Synced armory data '. $this->memberName. ' with roster',  'Failed' );
       // return false;
    }
    
function synchGuildbob( $server, $memberId = 0, $memberName = false, $region = false, $data) {
        global $addon, $roster, $update;

        $this->server = $server;
        $this->guildId = $memberId;
        $this->region = $region;
        $this->memberName = $memberName;
        //$this->_getGuildInfo();
       /// if ( $this->status['guildInfo'] ) {
            include_once(ROSTER_LIB . 'update.lib.php');
            $update = new update;
            $update->fetchAddonData();

            $update->uploadData['characterprofiler']['cpProfile'][$server]['Guild'][$data['GuildName']] = $data;
            echo $update->processGuildRoster();
            //$tmp = explode( "\n", $this->message);
            //$this->message = implode( '', $tmp);
			echo ''.$this->message.'<br>';
            $this->_debug( 1, true, 'Synced armory data '. $this->memberName. ' with roster',  'OK' );
            return true;
       // }
       // $this->_debug( 0, false, 'Synced armory data '. $this->memberName. ' with roster',  'Failed' );
       // return false;
    }
    /**
     * fetches seperate parts of the character sheet
     *
     */
      function _getRosterData() {

            if (function_exists('curl_init')) 
                  {
                        $this->_getCharacterInfo();
                        if ( $this->status['characterInfo'] ) 
                              {
                                    $this->_getSkillInfo();
                                    $this->_getReputationInfo();
                                    $this->_getTalentInfo();
                                    $this->_debug( 1, $this->data, 'Parsed all armory data',  'OK' );
                              }
                        else
                              {
                                    $this->_debug( 1, $this->data, 'Parsed all armory data',  'Failed' );
                              }
                        $this->_debug( 1, $this->data, 'Armory sync initialization',  'Passed' );
                  }
            else
                  {
                        $this->_debug( 1, $this->data, 'Armory sync initialization',  'Failed' );
                  }

    }

    /**
     * fetches guild info
     *
     */
    function _getGuildInfo() {
        global $roster, $addon;

        $content = $this->getguilddata( $roster->data['guild_name'], $this->region, $this->server, $fetch_type='array' );//$this->fetchGuild( $this->memberName, $roster->config['locale'], $this->server );
       // //aprint($content);
        //if ( $this->_checkContent( $content, array( 'guildInfo', 'guild' ) ) ) {
            $guild = $content->guildInfo->guild;
            $guildh = $content->guildInfo->guildHeader;


            //$this->data['Ranks'] = $this->_getGuildRanks( $roster->data['guild_id'] );
            //$this->data['timestamp']['init']['datakey'] = $roster->data['region'];
            $this->data['Ranks'] = $this->_getGuildRanks( $this->guildId );
            $this->data['timestamp']['init']['datakey'] = $this->region;
            $this->data['timestamp']['init']['TimeStamp'] = time();
            $this->data['timestamp']['init']['Date'] = date('Y-m-d H:i:s');
            $this->data['timestamp']['init']['DateUTC'] = gmdate('Y-m-d H:i:s');

            $this->data['GPprovider'] = "armorysync";
            $this->datd['FactionEn'] = $roster->locale->act['id_to_faction'][$guildh['faction']];
            $this->data["DBversion"] = $roster->config['minGPver'];
			$this->data["GPversion"] = $roster->config['minGPver'];
            //$this->data['GPversion'] = "v2.6.0";
            //$this->data['name'] = $roster->data['guild_name'];
            $this->data['name'] = $this->memberName;
            $this->data['Info'] = ''; //$roster->data['guild_info_text'];

            //$members = $this->_getGuildMembers( $roster->data['guild_id'] );
            $members = $this->_getGuildMembers( $this->guildId );

            $min = 60;
            $hour = 60 * $min;
            $day = 24 * $hour;
            $month = 30 * $day;
            $year = 365 * $day;

            foreach ( $guild->members->character as $char ) {
                 ////aprint($char);
                $player = array();
                $player['name'] = $char['name'];
                $player["ClassId"] = $char['classId'];
                $player['Class'] = $roster->locale->act['id_to_class'][''.$player["ClassId"].''];//$char['class'];


               	//$player["ClassId"] = $char->classId;
            	$player["ClassEn"] = $roster->locale->act['class_to_en'][''.$player["Class"].''];
                if ( substr($player["Class"] ,0,1) == 'J' && substr($player["Class"] ,-3) == 'ger' ) {
                        $player["Class"] = utf8_encode('Jäger');
                }
                $player['Level'] = $char['level'];
                $player['Rank'] = $char['rank'];
                if ( array_key_exists( $char->name, $members ) ) {
                    $player['Note'] = $members[$char['name']]['note'];
                    $player['Zone'] = $members[$char['name']]['zone'];
                    $player['Status'] = $members[$char['name']]['status'];
                    $player['Online'] = "0";

                    $curtime = time();
                    $diff = $curtime - strtotime( $members[$char['name']]['last_online'] );
                    $years = floor( $diff / $year );
                    $diff -= $years * $year;
                    $months = floor( $diff / $month );
                    $diff -= $months * $month;
                    $days = floor ( $diff / $day );
                    $diff -= $days * $day;
                    $hours = floor ( $diff / $hour );

                    $player['LastOnline'] = $years. ":". $months. ":". $days. ":". $hours;

                    $members[$char['name']]['done'] = 1;
                } else {
                    $player['Online'] = "1";
                }
                $this->data['Members'][''.$char['name'].''] = $player;
                $this->status['guildInfo'] += 1;
            }

			if ( isset($roster->addon_data['guildbank']) && $roster->addon_data['guildbank']['active'] == 1 ) {
				$guildbank = getaddon('guildbank');
			}
           // //aprint($members);
            foreach ( $members as $member ) {
                if ( ! array_key_exists( 'done', $member ) ) {
                    if ( is_int( array_search( $member['guild_title'], explode( ',', $addon['config']['armorysync_protectedtitle'] ) ) )
						||
						( isset($guildbank) && strstr($member[$guildbank['config']['banker_fieldname']], $guildbank['config']['banker_rankname']) )
						) {
                        echo $roster->locale->wordings['enUS']['id_to_class'][$member['classid']];
                        $player['name'] = $member['name'];
                        $player['Class'] = $roster->locale->wordings['enUS']['id_to_class'][$member['classid']];//$member['class'];
                        $player['Level'] = $member['level'];
                        $player['Rank'] = $member['guild_rank'];
                        $player['Note'] = $member['note'];
                        $player['Zone'] = $member['zone'];
                        $player['Status'] = $member['status'];
                        $player['Online'] = $member['online'];

                        $curtime = time();
                        $diff = $curtime - strtotime( $member['last_online'] );
                        $years = floor( $diff / $year );
                        $diff -= $years * $year;
                        $months = floor( $diff / $month );
                        $diff -= $months * $month;
                        $days = floor ( $diff / $day );
                        $diff -= $days * $day;
                        $hours = floor ( $diff / $hour );

                        $player['LastOnline'] = $years. ":". $months. ":". $days. ":". $hours;

                        $this->data['Members'][$member['name']] = $player;
                    }
                }
            }

            $this->_debug( 1, $this->data, 'Parsed guild info',  'OK' );
    }

    /*
     * 
     * had to get evil and make a new guild data paser for the new adding style...
     * 
     */
    
    
    
    function build_guild( $content, $gid ) {
        global $roster, $addon;

            $guild = $content->guildInfo->guild;
            $guildh = $content->guildInfo->guildHeader;
			//$this->data = array();

            //$this->data['Ranks'] = $this->_getGuildRanks( $roster->data['guild_id'] );
			$this->data['timestamp']['init']['datakey'] = $roster->data['3'];
            $this->data['Ranks'] = $this->_getGuildRanks( $this->guildId );
            //$this->data['timestamp']['init']['datakey'] = $this->region;
            $this->data['timestamp']['init']['TimeStamp'] = time();
            $this->data['timestamp']['init']['Date'] = date('Y-m-d H:i:s');
            $this->data['timestamp']['init']['DateUTC'] = gmdate('Y-m-d H:i:s');

            $this->data['GPprovider'] = "armorysync";
            $this->data['FactionEn'] = $roster->locale->act['id_to_faction'][$guildh->faction];
            $this->data["DBversion"] = $roster->config['minGPver'];
			$this->data["GPversion"] = $roster->config['minGPver'];
            //$this->data['GPversion'] = "v2.6.0";
            $this->data["GuildName"] = $roster->data['guild_name'];
            $this->data['name'] = $this->memberName;
            $this->data['Info'] = ''; //$roster->data['guild_info_text'];

            //$members = $this->_getGuildMembers( $roster->data['guild_id'] );
            $members = $this->_getGuildMembers( $gid );

            $min = 60;
            $hour = 60 * $min;
            $day = 24 * $hour;
            $month = 30 * $day;
            $year = 365 * $day;

            foreach ( $guild->members->character as $ch => $char ) {
                //aprint($char);
                $player = array();
                $player["name"] = ''.$char['name'].'';
                $player["ClassId"] = ''.$char['classId'].'';
                $player['Class'] = $roster->locale->act['id_to_class'][''.$player["ClassId"].''];//$char['class'];


               	//$player["ClassId"] = $char->classId;
            	$player["ClassEn"] = $roster->locale->act['class_to_en'][''.$player["Class"].''];
                if ( substr($player["Class"] ,0,1) == 'J' && substr($player["Class"] ,-3) == 'ger' ) {
                        $player["Class"] = utf8_encode('Jäger');
                }
                $player['Level'] = ''.$char['level'].'';
                $player['Rank'] = ''.$char['rank'].'';
                if ( array_key_exists( ''.$char['name'].'', $members ) ) {
                    $player['Note'] = $members[''.$char['name'].'']['note'];
                    $player['Zone'] = $members[''.$char['name'].'']['zone'];
                    $player['Status'] = $members[''.$char['name'].'']['status'];
                    $player['Online'] = "0";

                    $curtime = time();
                    $diff = $curtime - strtotime( $members[''.$char['name'].'']['last_online'] );
                    $years = floor( $diff / $year );
                    $diff -= $years * $year;
                    $months = floor( $diff / $month );
                    $diff -= $months * $month;
                    $days = floor ( $diff / $day );
                    $diff -= $days * $day;
                    $hours = floor ( $diff / $hour );

                    $player['LastOnline'] = $years. ":". $months. ":". $days. ":". $hours;

                    $members[''.$char['name'].'']['done'] = 1;
                } else {
                    $player['Online'] = "1";
                }
                $this->data['Members'][''.$char['name'].''] = $player;
                $this->status['guildInfo'] += 1;
            }

			if ( isset($roster->addon_data['guildbank']) && $roster->addon_data['guildbank']['active'] == 1 ) {
				$guildbank = getaddon('guildbank');
			}
           // //aprint($members);
            foreach ( $members as $member ) {
                if ( ! array_key_exists( 'done', $member ) ) {
                    if ( is_int( array_search( $member['guild_title'], explode( ',', $addon['config']['armorysync_protectedtitle'] ) ) )
						||
						( isset($guildbank) && strstr($member[$guildbank['config']['banker_fieldname']], $guildbank['config']['banker_rankname']) )
						) {
                        echo $roster->locale->wordings['enUS']['id_to_class'][$member['classid']];
                        $player['name'] = $member['name'];
                        $player['Class'] = $roster->locale->wordings['enUS']['id_to_class'][$member['classid']];//$member['class'];
                        $player['Level'] = $member['level'];
                        $player['Rank'] = $member['guild_rank'];
                        $player['Note'] = $member['note'];
                        $player['Zone'] = $member['zone'];
                        $player['Status'] = $member['status'];
                        $player['Online'] = $member['online'];

                        $curtime = time();
                        $diff = $curtime - strtotime( $member['last_online'] );
                        $years = floor( $diff / $year );
                        $diff -= $years * $year;
                        $months = floor( $diff / $month );
                        $diff -= $months * $month;
                        $days = floor ( $diff / $day );
                        $diff -= $days * $day;
                        $hours = floor ( $diff / $hour );

                        $player['LastOnline'] = $years. ":". $months. ":". $days. ":". $hours;

                        $this->data['Members'][$member['name']] = $player;
                    }
                }
            }
			//$this->data;
            $this->_debug( 1, $this->data, 'Parsed guild info',  'OK' );
    }
    
    /*
     * end new guild data phasing....
     * /
     */
    /**
     * fetches guild info
     *
     */
    function checkGuildInfo( $name = false, $server = false, $region = false ) {
        global $roster, $addon;
            include_once(ROSTER_LIB . 'armory.class.php');
		$armory = new RosterArmory;
		
            $content = $this->_parseData($armory->fetchGuild( $name, $region, $server,$fetch_type='array' ));//$this->getguilddata( $roster->data['guild_name'], $this->region, $this->server, $fetch_type='array' );//$this->fetchGuild( $this->memberName, $roster->config['locale'], $this->server );
            //echo $name.'<br><pre>';
            //aprint($content);
        if ( $this->_xcheckarray( $content, array( 'guildInfo', 'guildHeader' ) ) ) //_checkContent( $content, array( 'guildInfo', 'guild' ) ) )
        {
            $this->_debug( 1, true, 'Checked guild on existence',  'OK' );
            return true;
        } 
        else 
        {
            $this->_debug( 1, false, 'Checked guild on existence',  'Failed' );
            return false;
        }
    }

    /**
     * fetches guild info
     *
     */
    function checkCharInfo( $name = false, $server = false, $region = false ) {
        global $roster, $addon;

        $this->region = $region;
        $content = $this->getCharacterData($realm, $name);

        if (is_array($content['characterInfo']) && is_array($content['characterInfo']['characterTab'])) 
        {
            $this->_debug( 1, false, 'Checked char on existence',  'passed' );    
            return true;
        } else {
            $this->_debug( 1, false, 'Checked char on existence',  'Failed' );
            return false;
        }
    }

    function _contentcheck($array, $keys = array() )
    {
        global $roster, $addon;
        ////aprint($array);
        if (is_object($array))
        {
            if (is_array($keys))
            {
                foreach ( $keys as $key ) 
                {
                    if (array_key_exists($key, $array)) 
                    {
                        $this->_debug( 1, true, 'Checked "'.$key.'" on existence',  'Passed' );                
                    }
                    else
                    {
                        $this->_debug( 1, false, 'Checked "'.$key.'" on existence 3',  'Fail' );
                        return false;
                    }
                }
            $this->_debug( 1, True, 'Checked if array',  'Pass' );
            return true;
            
            }
            else
            {
                $this->_debug( 1, false, 'Checked if array 2',  'Fail' );
                return false;
            }
            $this->_debug( 1, True, 'Checked if is_object',  'Pass' );
            return true;
        }
        else
        {
            $this->_debug( 1, false, 'Checked if is_object',  'Fail' );
            return false;
        }
    }
    /**
     * fetches character info
     *
     */
    function _getCharacterInfo() {
            global $roster, $addon;

            include_once(ROSTER_LIB . 'armory.class.php');
		    
            $armory = new Rosterarmory;
            
            $this->_setUserAgent($armory);

            $content = $armory->pull_xmln($this->memberName, $roster->data['guild_name'], $this->server, 'character');
            //$datam = $armory->pull_xmln($this->memberName, $roster->data['guild_name'], $roster->data['server'], 'character');
            //$this->_parseData($armory->fetchCharacter( $this->memberName, '', $roster->config['locale'], $this->server ));
            $armory->region = $this->regionlocal($content['lang']);
            $this->region = $armory->region;
            //aprint($content);
            if ( isset($content->characterInfo->character['name']) )
            {
            
                  $char = $content->characterInfo->character;
                  //$char = $charr['@attributes'];
                 
                  $tab = $content->characterInfo->characterTab;
                  // //aprint($tab);
                  

                  $rank = $this->_getMemberRank( $this->memberId );
                  
                  $this->content2 = $content->characterInfo->characterTab;
                 // $this->_getSkillInfo($skills);
                 // echo $char['name'].' '.$armory->region.'<br>';
                  $this->data["Name"] = ''.$char['name'].'';//$char['name'];
                  $this->data["Level"] = ''.$char['level'].'';
                  $this->data["Server"] = ''.$char['realm'].'';
                  
                  if ($this->hasProp("guildName") ) 
                  {
                        $this->data["Guild"]["Name"] = ''.$char['guildName'];
                  } 
                  elseif ($this->hasProp("name")) 
                  {
                        $this->data["Guild"]["Name"] = ''.$char['name'];
                  }
                  
                  $this->data["Guild"]["Title"] = $rank['guild_title'];
                  $this->data["Guild"]["Rank"] = $rank['guild_rank'];
                  $this->data["CPprovider"] = 'armorysync';
                  $this->data["CPversion"] = $roster->config['minCPver'];//'2.6.0';

                  $this->data["Honor"]["Lifetime"]["HK"] = ''.$tab->pvp->lifetimehonorablekills['value'].'';
                  //$this->data["Honor"]["Lifetime"]["Name"] = $char->title;
                  $this->data["Honor"]["Session"] = array();
                  $this->data["Honor"]["Yesterday"] = array();
                  $this->data["Honor"]["Current"] = array();

                  $this->data["Attributes"]["Stats"]["Intellect"] = $tab->baseStats->intellect['base']. ":" . ($tab->baseStats->intellect['effective'] - $tab->baseStats->intellect['base']) . ":0";
                  $this->data["Attributes"]["Stats"]["Agility"] = $tab->baseStats->agility['base']. ":" . ($tab->baseStats->agility['effective'] - $tab->baseStats->agility['base']) . ":0";
                  $this->data["Attributes"]["Stats"]["Stamina"] = $tab->baseStats->stamina['base'] . ":" . ($tab->baseStats->stamina['effective'] - $tab->baseStats->stamina['base']) . ":0";
                  $this->data["Attributes"]["Stats"]["Strength"] = $tab->baseStats->strength['base'] . ":" . ($tab->baseStats->strength['effective'] - $tab->baseStats->strength['base']) . ":0";
                  $this->data["Attributes"]["Stats"]["Spirit"] = $tab->baseStats->spirit['>base'] . ":" . ($tab->baseStats->spirit['effective'] - $tab->baseStats->spirit['base']) . ":0";

                  $this->data["Attributes"]["Defense"]["DodgeChance"] = ''.$tab->defenses->dodge['percent'].'';
                  $this->data["Attributes"]["Defense"]["ParryChance"] = ''.$tab->defenses->parry['percent'].'';
                  $this->data["Attributes"]["Defense"]["BlockChance"] = ''.$tab->defenses->block['percent'].'';
                  $this->data["Attributes"]["Defense"]["ArmorReduction"] = ''.$tab->defenses->armor['percent'].'';

                  $this->data["Attributes"]["Defense"]["Armor"] = $tab->baseStats->armor['base'] . ":" . ($tab->baseStats->armor['effective'] - $tab->baseStats->armor['base']) . ":0";
                  $this->data["Attributes"]["Defense"]["Defense"] = $tab->defenses->defense['value'] . ":" . $tab->defenses->defense['plusDefense'] . ":0";
                  $this->data["Attributes"]["Defense"]["BlockRating"] = $tab->defenses->block['rating']. ":0". ":0";
                  $this->data["Attributes"]["Defense"]["ParryRating"] = $tab->defenses->parry['rating']. ":0". ":0";
                  $this->data["Attributes"]["Defense"]["DefenseRating"] = $tab->defenses->defense['rating']. ":0". ":0";
                  $this->data["Attributes"]["Defense"]["DodgeRating"] = $tab->defenses->dodge['rating']. ":0". ":0";

                  $this->data["Attributes"]["Defense"]["Resilience"]["Melee"] = ''.$tab->defenses->resilience['value'].'';
            // ??? $this->data["Attributes"]["Defense"]["Resilience"]["Ranged"]
            // ??? $this->data["Attributes"]["Defense"]["Resilience"]["Spell"]

                  $this->data["Attributes"]["Resists"]["Frost"] =   $tab->resistances->frost['value'] . ":0:0";
                  $this->data["Attributes"]["Resists"]["Arcane"] = $tab->resistances->arcane['value'] . ":0:0";
                  $this->data["Attributes"]["Resists"]["Fire"] =     $tab->resistances->fire['value'] . ":0:0";
                  $this->data["Attributes"]["Resists"]["Shadow"] = $tab->resistances->shadow['value'] . ":0:0";
                  $this->data["Attributes"]["Resists"]["Nature"] = $tab->resistances->nature['value'] . ":0:0";
                  $this->data["Attributes"]["Resists"]["Holy"] =     $tab->resistances->holy['value'] . ":0:0";

                  $this->data["Attributes"]["Melee"]["AttackPower"] =         $tab->melee->power['base'] . ":". ($tab->melee->power['effective'] - $tab->melee->power['base'] ). ":0";
                  $this->data["Attributes"]["Melee"]["HitRating"] =       $tab->melee->hitRating['value'] . ":0:0";
                  $this->data["Attributes"]["Melee"]["CritRating"] =     $tab->melee->critChance['rating'] . ":0:0";
                  $this->data["Attributes"]["Melee"]["HasteRating"] = $tab->melee->mainHandSpeed['hasteRating'] . ":0:0";

                  $this->data["Attributes"]["Melee"]["CritChance"] = ''.$tab->melee->critChance['percent'].'';
                  $this->data["Attributes"]["Melee"]["AttackPowerDPS"] = ''.$tab->melee->power['increasedDps'].'';

            if ( $tab->melee->mainHandSpeed['value'] > 0 ) 
            {

                $this->data["Attributes"]["Melee"]["MainHand"]["AttackSpeed"] = ''.$tab->melee->mainHandDamage['speed'].'';
                $this->data["Attributes"]["Melee"]["MainHand"]["AttackDPS"] = ''.$tab->melee->mainHandDamage['dps'].'';
                $this->data["Attributes"]["Melee"]["MainHand"]["AttackSkill"] = ''.$tab->melee->mainHandSpeed['value'].'';
                $this->data["Attributes"]["Melee"]["MainHand"]["DamageRange"] = $tab->melee->mainHandDamage['min'] . ":" . $tab->melee->mainHandDamage['max'];
                $this->data["Attributes"]["Melee"]["MainHand"]["AttackRating"] = ''.$tab->melee->mainHandSpeed['hasteRating'].'';
            }

            if ( $tab->melee->offHandSpeed['value'] > 0 ) 
            {

                $this->data["Attributes"]["Melee"]["OffHand"]["AttackSpeed"] = ''.$tab->melee->offHandDamage['speed'].'';
                $this->data["Attributes"]["Melee"]["OffHand"]["AttackDPS"] = ''.$tab->melee->offHandDamage['dps'].'';
                $this->data["Attributes"]["Melee"]["OffHand"]["AttackSkill"] = ''.$tab->melee->offHandSpeed['value'].'';
                $this->data["Attributes"]["Melee"]["OffHand"]["DamageRange"] = $tab->melee->offHandDamage['min'] . ":" . $tab->melee->mainHandDamage['max'];
                $this->data["Attributes"]["Melee"]["OffHand"]["AttackRating"] = ''.$tab->melee->offHandSpeed['hasteRating'].'';
            }

            // ??? $this->data["Attributes"]["Melee"]["DamageRangeTooltip"] = "";
            // ??? $this->data["Attributes"]["Melee"]["AttackPowerTooltip"] = "";


            if ( $tab->ranged->damage['min'] > 0 ) 
            {

                $this->data["Attributes"]["Ranged"]["AttackPower"] = $tab->ranged->power['base'] . ":". ( $tab->ranged->power['effective'] - $tab->ranged->power['base'] ). ":0";
                $this->data["Attributes"]["Ranged"]["HitRating"] = $tab->ranged->hitRating['value']. ":0:0";
                $this->data["Attributes"]["Ranged"]["CritRating"] = $tab->ranged->critChance['rating']. ":0:0";
                $this->data["Attributes"]["Ranged"]["HasteRating"] = $tab->ranged->speed['hasteRating']. ":0:0";

                $this->data["Attributes"]["Ranged"]["CritChance"] = $tab->ranged->critChance['percent'];
                $this->data["Attributes"]["Ranged"]["AttackPowerDPS"] = $tab->ranged->power['increasedDps'];

                $this->data["Attributes"]["Ranged"]["AttackSpeed"] = $tab->ranged->speed['value'];
                $this->data["Attributes"]["Ranged"]["AttackDPS"] = $tab->ranged->damage['dps'];
                $this->data["Attributes"]["Ranged"]["AttackSkill"] = $tab->ranged->weaponSkill['value'];
                $this->data["Attributes"]["Ranged"]["DamageRange"] = $tab->ranged->damage['min'] . ":" . $tab->ranged->damage['max'];
                $this->data["Attributes"]["Ranged"]["AttackRating"] = $tab->ranged->weaponSkill['rating'];
            }

            $this->data["Attributes"]["Spell"]["HitRating"] = $tab->spell->hitRating['value'] . ":0:0";
            $this->data["Attributes"]["Spell"]["CritRating"] = $tab->spell->critChance['rating'] . ":0:0";
            $this->data["Attributes"]["Spell"]["HasteRating"] = "0:0:0"; // ???

            $this->data["Attributes"]["Spell"]["CritChance"] = min ( array (
                                                                    ''.$tab->spell->critChance->arcane['percent'].'',
                                                                    ''.$tab->spell->critChance->fire['percent'].'',
                                                                    ''.$tab->spell->critChance->frost['percent'].'',
                                                                    ''.$tab->spell->critChance->holy['percent'].'',
                                                                    ''.$tab->spell->critChance->nature['percent'].'',
                                                                    ''.$tab->spell->critChance->shadow['percent'].'' ) );
            if (isset($tab->spell->manaRegen['notCasting']) && isset($tab->spell->manaRegen['casting']))
            {
                  $this->data["Attributes"]["Spell"]["ManaRegen"] = $tab->spell->manaRegen['notCasting'] . ":". $tab->spell->manaRegen['casting'];
            }
            else
            {
                  $this->data["Attributes"]["Spell"]["ManaRegen"] = "0:0";
            }
            $this->data["Attributes"]["Spell"]["Penetration"] = ''.$tab->spell->penetration['value'].'';
            $this->data["Attributes"]["Spell"]["BonusDamage"] = min ( array(
                                                                    ''.$tab->spell->bonusDamage->arcane['value'].'',
                                                                    ''.$tab->spell->bonusDamage->fire['value'].'',
                                                                    ''.$tab->spell->bonusDamage->frost['value'].'',
                                                                    ''.$tab->spell->bonusDamage->holy['value'].'',
                                                                    ''.$tab->spell->bonusDamage->nature['value'].'',
                                                                    ''.$tab->spell->bonusDamage->shadow['value'].'' ) );
            $this->data["Attributes"]["Spell"]["BonusHealing"] = ''.$tab->spell->bonusHealing['value'].'';

            $this->data["Attributes"]["Spell"]["SchoolCrit"]["Holy"] = ''.$tab->spell->critChance->holy['percent'].'';
            $this->data["Attributes"]["Spell"]["SchoolCrit"]["Frost"] = ''.$tab->spell->critChance->frost['percent'].'';
            $this->data["Attributes"]["Spell"]["SchoolCrit"]["Arcane"] = ''.$tab->spell->critChance->arcane['percent'].'';
            $this->data["Attributes"]["Spell"]["SchoolCrit"]["Fire"] = ''.$tab->spell->critChance->fire['percent'].'';
            $this->data["Attributes"]["Spell"]["SchoolCrit"]["Shadow"] = ''.$tab->spell->critChance->shadow['percent'].'';
            $this->data["Attributes"]["Spell"]["SchoolCrit"]["Nature"] = ''.$tab->spell->critChance->nature['percent'].'';

            $this->data["Attributes"]["Spell"]["School"]["Holy"] = ''.$tab->spell->bonusDamage->holy['value'].'';
            $this->data["Attributes"]["Spell"]["School"]["Frost"] = ''.$tab->spell->bonusDamage->frost['value'].'';
            $this->data["Attributes"]["Spell"]["School"]["Arcane"] = ''.$tab->spell->bonusDamage->arcane['value'].'';
            $this->data["Attributes"]["Spell"]["School"]["Fire"] = ''.$tab->spell->bonusDamage->fire['value'].'';
            $this->data["Attributes"]["Spell"]["School"]["Shadow"] = ''.$tab->spell->bonusDamage->shadow['value'].'';
            $this->data["Attributes"]["Spell"]["School"]["Nature"] = ''.$tab->spell->bonusDamage->nature['value'].'';



            //$this->data["TalentPoints"] = ($char->level > 0) ? $char->level - $tab->talentGroup->talentSpec->treeOne - $tab->talentGroup->talentSpec->treeTwo - $tab->talentGroup->talentSpec->treeThree - 9 : 0;
            $this->data["Race"]                 = ''.$char['race'].'';
            $this->data["RaceId"]               = ''.$char['raceId'].'';
            $this->data["RaceEn"]               = ''.preg_replace( "/\s/", "", $roster->locale->act['race_to_en'][$char['race']] );

            if ( $this->data["RaceEn"] == "Undead" ) 
            {
                $this->data["RaceEn"]           = "Scourge";
            }
            $this->data["Class"]                = ''.$char['class'].'';
            $this->class                        = ''.$char['class'].'';

            // This is an ugly workaround for an encoding error in the armory
            if ( substr($this->data["Class"] ,0,1) == 'J' && substr($this->data["Class"] ,-3) == 'ger' ) 
            {
                    $this->data["Class"] = utf8_encode('Jäger');
            }
            // This is an ugly workaround for an encoding error in the armory

            $this->data["ClassId"]              = ''.$char['classId'].'';
            $this->data["ClassEn"]              = ''.$roster->locale->act['class_to_en'][$this->data["Class"]].'';
            $this->data["Health"]               = ''.$tab->characterBars->health['effective'].'';
            $this->data["Mana"]                 = ''.$tab->characterBars->secondBar['effective'].'';

            if ( $tab->characterBars->secondBar['type'] == "m" ) 
            {
                $this->data["Power"]            = ''.$roster->locale->act['mana'].'';
            } 
            elseif ( $tab->characterBars->secondBar['type'] == "r" ) 
            {
                $this->data["Power"]            = ''.$roster->locale->act['rage'].'';
            } 
            elseif ( $tab->characterBars->secondBar['type'] == "e" ) 
            {
                $this->data["Power"]            = ''.$roster->locale->act['energy'].'';
            } 
            elseif ( $tab->characterBars->secondBar['type'] == "f" ) 
            {
                $this->data["Power"]            = ''.$roster->locale->act['focus'].'';
            }
            $this->data["Sex"]                  = ''.$char['gender'].'';

            // This is an ugly workaround for an encoding error in the armory
            if ( substr($this->data["Sex"],0,1) == 'M' && substr($this->data["Sex"],-6) == 'nnlich' ) {
                    $this->data["Sex"] = utf8_encode('Männlich');
            }
            // This is an ugly workaround for an encoding error in the armory

            $this->data["SexId"] = ''.$char['genderId'].'';
            $this->data["Money"]["Copper"] = 0;
            $this->data["Money"]["Silver"] = 0;
            $this->data["Money"]["Gold"] = 0;
            $this->data["Experience"] = 0;
            $this->data["timestamp"]["init"]["DateUTC"] = ''.$this->_getDate($char['lastModified']).'';
            $this->data['timestamp']['init']['datakey'] = $this->region. ":";
            $this->data['Region']=$this->region;
            $this->data["Locale"] = $roster->config['locale'];
            $this->data["Inventory"] = array();
            $this->data["Equipment"] = array();
            $this->data["Skills"] = array();
            $this->data["Reputation"] = array();
            $this->data["Talents"] = array();

            $this->status['characterInfo'] = 1;
            $this->status['guildInfo'] = 1;

            $this->_debug( 1, true, 'Parsed character infos',  'OK' );

            if ( $this->_contentcheck($tab->items, array('item' ) )) //$this->_checkContent( $tab, array( 'items', 'item' ) ) )
            {
                $equip = $tab->items;
               //aprint($equip);
                $this->_getEquipmentInfo( $equip );
            }
            //aprint( $this->data);
        
        }
        else 
        {
            $this->_debug( 1, false, 'Parsed character infos',  'Failed' );
        } 
    }


      /**
      * fetches character skill info from the main character tab
      *
      */
      function _getSkillInfo() 
      {
            global $roster, $addon;
            
            //$this->data["Skills"]["Count"] = 0;
            $skills = $this->content2->professions;
            ////aprint($skills);
            foreach ($skills as $skill) 
            {
                  foreach ($skill as $skil) 
                  {
                        if ( isset($skil['name']) )
                        {             
                              $this->data["Skills"]["Professions"][''.$skil['name'].''] = "".$skil['value'].":".$skil['max']."";
                              $this->status['skillInfo'] += 1;
                        }
                        else
                        {
                              $this->status['skillInfo'] = '0';
                        }

                  }
            }
            
            //secondaryProfessions
            
            $skill = $this->content2->secondaryProfessions;
            ////aprint($skills);
            foreach ($skill as $skill) 
            {
                  foreach ($skill as $skil) 
                  {
                        if ( isset($skil['name']) )
                        {             
                              $this->data["Skills"]["Secondary Skills"][''.$skil['name'].''] = "".$skil['value'].":".$skil['max']."";
                              $this->status['skillInfo'] += 1;
                        }
                        else
                        {
                              $this->status['skillInfo'] = $this->status['skillInfo'];
                        }

                  }
            }           
            $this->_debug( 1, true, 'Parsed skill info', 'OK' );
    }
    
    
    
    /**
     * fetches character equipment info
     *
     */
    function _getEquipmentInfo( $equip = array() ) {
        global $roster, $addon;

        include_once(ROSTER_LIB . 'armory.class.php');
		    
            $armory = new Rosterarmory;

        foreach($equip->item as $item) {
        
        if ($item['slot'] != '-1'){
           //aprint($item);
            $slot = $this->_getItemSlot($item['slot']);
            $this->data["Equipment"][$slot] = array();

            $this->data["Equipment"][$slot]['Item'] = $item['id'];

            $this->data["Equipment"][$slot]['Icon'] = ''.$item['icon'].'';

            if( $this->region == 'US' )
		{
			//$base_url = 'http://localhost:18080/?url=http://www.wowarmory.com/';
			$base_url = 'http://www.wowarmory.com/';
		}
		else
		{
			//$base_url = 'http://localhost:18080/?url=http://eu.wowarmory.com/';
			$base_url = 'http://eu.wowarmory.com/';
		}

            //$url = $base_url.'item-tooltip.xml?i='.$item->id.'&n=' . urlencode($this->memberName) . '&r=' . urlencode($this->server);
            //$url = $this->url_prefix_itemtooltip. $guild . '&cn=' . urlencode( utf8_encode($guildie)) . '&r=' . urlencode( utf8_encode( $server ) );
            $d = $armory->pull_xmln($this->memberName, ''.$item['id'].'', $this->server, 'itemtooltip');
            //aprint($d);
            $x = $this->get_tooltip($item['id'],urlencode($this->memberName),urlencode($this->server),$d->itemTooltips->itemTooltip['name'],$d->itemTooltips->itemTooltip['icon']);
            ////aprint($x);
            $string = array('<!DOCTYPE table PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">','<table border="0" cellpadding="0" cellspacing="0">','<tbody>','<span class="">','</span>','</tr>','</td>','</table>','<tr>','<td>','<table>','<td valign="top">','<div class="myTable">','</tbody>');

            $tip = str_replace($string, '', $x);
            //$tooltip = $content->itemTooltips->itemTooltip;

                $this->data["Equipment"][$slot]['Name'] = ''.$item['name'].'';//''.$d->itemTooltips->itemTooltip['name'].'';
                //$this->data["Equipment"][$slot]['Level'] = $d->itemTooltips->itemTooltip['requiredLevel'];
                $this->data["Equipment"][$slot]['Color'] = $this->_getItemColor($d->itemTooltips->itemTooltip['overallQualityId']);
                $this->data["Equipment"][$slot]['Tooltip'] = addslashes($tip);
                
                

            $this->data["Equipment"][$slot]['Item'] .= ":". $item['permanentenchant'];
            $this->data["Equipment"][$slot]['Item'] .= ":". $d->itemTooltips->itemTooltip['gem0Id']; // GemId0
            $this->data["Equipment"][$slot]['Item'] .= ":". $d->itemTooltips->itemTooltip['gem1Id']; // GemId1
            $this->data["Equipment"][$slot]['Item'] .= ":". $d->itemTooltips->itemTooltip['gem2Id']; // GemId2
            $this->data["Equipment"][$slot]['Item'] .= ":". "0"; // ???
            $this->data["Equipment"][$slot]['Item'] .= ":". "0"; // ???
            $this->data["Equipment"][$slot]['Item'] .= ":". $item['seed'];
            
            if ( is_array($d->itemTooltips->itemTooltipsocketData['socket']) ) 
                  {
				$t = 1;
				foreach ( $d->itemTooltips->itemTooltipsocketData['socket'] as $gem ) 
                        {
                              if ( $gem->hasProp('icon') && $gem['icon'] ) 
                              {
						$this->data["Equipment"][$slot]['Gem'][$t]['Icon'] = $gem['icon'];
						$this->data["Equipment"][$slot]['Gem'][$t]['_tmp_enchant'] = $gem['enchant'];
					}
					$t++;
				}
			} 
                  elseif ( is_object($d->itemTooltips->itemTooltipsocketData['socket']) ) 
                  {
                        $gem = $d->itemTooltips->itemTooltipsocketData['socket'];
				if ( $gem->hasProp('icon') && $gem['icon'] ) 
                        {
					$this->data["Equipment"][$slot]['Gem'][1]['Icon'] = $gem['icon'];
					$this->data["Equipment"][$slot]['Gem'][1]['_tmp_enchant'] = $gem['enchant'];
				}
			}
					
            $this->status['equipmentInfo'] += 1;
           }

        }
        if ( $this->status['equipmentInfo'] > 0 ) {
            $this->_debug( 1, true, 'Parsed equipment info', 'OK' );
        } else {
            $this->_debug( 1, false, 'Parsed equipment info', 'Failed' );
        }

    }

   

    /**
     * fetches character reputation info
     *
     */
      function _getReputationInfo() 
      {
            global $roster, $addon;
            
            include_once(ROSTER_LIB . 'armory.class.php');
		$armory = new RosterArmory;
		
                                    //$character, $locale, $realm, $fetch_type='array' )
            //$content =  $this->_parseData($armory->fetchCharacterReputation($this->memberName, $roster->config['locale'], $this->server, $fetch_type='array'));
            $content = $armory->pull_xmln($this->memberName, $this->data["Guild"]["Name"], $this->server, 'rep');    
            //aprint($content);
            $factionReputation = $content->characterInfo->reputationTab->faction;

            $this->data["Reputation"]["Count"] = 0;
            $is = 0;
            //echo '<pre>';
            //print_r($factionReputation);
            foreach ($factionReputation as $factiona) 
            {
                  //echo '<br><hr><br>'.$factiona->name.'<br>';
                  $factionType= $factiona['name'];
                  foreach ($factiona->faction as $factionRep => $data) 
                  {
                        ////aprint($data);
                        //echo $data->name.' -+- '.$data->reputation.'<br>'; //->id.'<br>';
                        //$this->_setFactionRep( $factionType, $data );
                        $factionType2 = $data['name'];
                        if (isset($data['reputation']))
                        {
                        $this->data["Reputation"][''.$factionType.''][''.$data['name'].''] = array();
                        $this->data["Reputation"][''.$factionType.''][''.$data['name'].'']["Value"] = $this->_getRepValue($data['reputation']) . ":" . $this->_getRepCap($data['reputation']);
                        $this->data["Reputation"][''.$factionType.''][''.$data['name'].'']["Standing"] = $this->_getRepStanding($data['reputation']);
                        $this->data["Reputation"][''.$factionType.''][''.$data['name'].'']["AtWar"] = $this->_getRepAtWar($data['reputation']);
                        }
                        
                        
                        if (isset($data->faction))
                        {
                              foreach ($data->faction as $fact => $dat) 
                              {
                                    //echo '--'.$dat->name.' -+- '.$dat->reputation.'<br>';
                                    //$this->_setFactionRep( $data->name, $dat );
                                    $this->data["Reputation"]["Count"]++;
                                    $this->data["Reputation"][''.$factionType.''][''.$factionType2.''][''.$dat['name'].''] = array();
                                    $this->data["Reputation"][''.$factionType.''][''.$factionType2.''][''.$dat['name'].'']["Value"] = $this->_getRepValue($dat['reputation']) . ":" . $this->_getRepCap($dat['reputation']);
                                    $this->data["Reputation"][''.$factionType.''][''.$factionType2.''][''.$dat['name'].'']["Standing"] = $this->_getRepStanding($dat['reputation']);
                                    $this->data["Reputation"][''.$factionType.''][''.$factionType2.''][''.$dat['name'].'']["AtWar"] = $this->_getRepAtWar($dat['reputation']);
                        
                              }
                        }
                        $this->data["Reputation"]["Count"]++;
                  }

            }
            ////aprint($this->data["Reputation"]);
            $this->status['reputationInfo'] = $this->data["Reputation"]["Count"];
            $this->_debug( 1, true, 'Parsed reputation info', 'OK' );

    }
    /**
     * helper function to get classes for content
     *
     * @param string $class
     * @param string $tree
     * @return string
     */
    function _setFactionRep( $factionType, $faction ) {
            
        $this->data["Reputation"][$factionType][$faction['name']] = array();
        $this->data["Reputation"][$factionType][$faction['name']]["Value"] = $this->_getRepValue($faction['reputation']) . ":" . $this->_getRepCap($faction['reputation']);
        $this->data["Reputation"][$factionType][$faction['name']]["Standing"] = $this->_getRepStanding($faction['reputation']);
        $this->data["Reputation"][$factionType][$faction['name']]["AtWar"] = $this->_getRepAtWar($faction['reputation']);
        //$this->status['reputationInfo'] + 1;
        $this->_debug( 2, $this->data["Reputation"][$factionType][$faction->name], 'Set reputation for single faction', 'OK' );
    }
    
    function _getTalentInfo() 
    {
	global $roster, $addon;
        include_once(ROSTER_LIB . 'armory.class.php');
		$armory = new RosterArmory;
                
	$content = array();
        $content = $armory->pull_xmln($this->memberName, $this->data["Guild"]["Name"], $this->server, 'talents');
       // aprint(content);
        $querystr = "DELETE FROM `" . $roster->db->table('talent_builds') . "` WHERE `member_id` = '$this->memberId';";
			if( !$roster->db->query($querystr) )
			{
				$this->_debug( 1, true, $roster->locale->act['talent_build_'.$build].' Talent build could not be deleted', 'Failed' );
				return;
			}
	    foreach ($content->characterInfo->talents->talentGroup as $spec)
	    {
            //aprint($spec);
	       //	foreach ($spec as $t_dat => $data)
		//{
		    if (isset($spec['active']) )
		    {
			$branch = '0';
			if ($this->process_talents($spec->talentSpec['value'], $branch))//
                        {
                                $this->status['talentInfo'] = ($this->status['talentInfo'] + 1);
                        };//$data['value'];
		    }
		    else
		    {
			$branch = '1';
			if ($this->process_talents($spec->talentSpec['value'], $branch))
                        {
                                $this->status['talentInfo'] = ($this->status['talentInfo'] + 1);
                        }//;//$data['value'];
		    }                 
			
		    $this->_debug( 1, true, 'Char: '. $this->memberName. ' ('.$this->class.') Parsed talent('.$branch.') info', 'OK' );
	       //	}
	    }

	    
	return true;
    }
    
    function process_talents($armoryTalents, $branch)
    {
        global $roster, $addon;
       // echo $armoryTalents.'<br>'.$branch.'<br>';

       // $this->reset_values();
//	$this->add_value('build', $build);
//	$this->add_value('member_id', $memberId);
//	$this->add_value('tree', $build_url);

        $this->Build_talenttreedata($armoryTalents, $branch);
	$querystr = "INSERT INTO `" . $roster->db->table('talent_builds') . "` SET "
        . "`build` = '".$branch."',"
        . "`member_id` = '".$this->memberId."',"
        . "`tree` = '".$armoryTalents."'";

	$result = $roster->db->query($querystr);
	if( !$result )
	{
		$this->_debug( 1, true, 'Char: '.$roster->locale->act['talent_build_' . $branch] . ' could not be inserted', 'Fail' );
                return false;
	}
        else
        {
        return true;
        }
    }
    
    // incente tree builds... this code sucks.....

        function Build_talenttreedata($build, $branch)
        {
                global $roster, $addon;
               // echo $build.'<br>';
                $talentArray = preg_split('//', $build, -1, PREG_SPLIT_NO_EMPTY);
                $talentinfo = $this->build_talent_data($this->data["ClassId"]);
                $sqlquery = "SELECT * FROM `" . $roster->db->table('talenttree_data') . "`"
			. " WHERE `class_id` = '" . $this->data["ClassId"] . "';";

		$result = $roster->db->query($sqlquery);

		$treed = array();
		while( $row = $roster->db->fetch($result, SQL_ASSOC) )
		{
			$treed[$row['tree']]['background'] = $row['background'];
			$treed[$row['tree']]['icon'] = $row['icon'];
			$treed[$row['tree']]['order'] = $row['order'];
		}
                
                foreach( $talentinfo as $ti => $talentdata )
		{
			for( $r = 1; $r < ROSTER_TALENT_ROWS + 1; $r++ )
			{
				for( $c = 1; $c < ROSTER_TALENT_COLS + 1; $c++ )
				{
					$returndata[$ti][$r][$c]['name'] = '';
				}
			}
			$spent = '';
			$returndata[$ti]['icon'] = $treed[$ti]['icon'];
			$returndata[$ti]['background'] = $treed[$ti]['background'];
			$returndata[$ti]['order'] = $treed[$ti]['order'];

			foreach( $talentdata as $c => $cdata )
			{
                        	$maxrank = 0;
				foreach( $cdata as $r => $rdata )
				{
                                       //	aprint($rdata);
					
					$returndata[$ti][$c][$r]['rank'] = $talentArray[$i];
					
					$spent = ($spent + $talentArray[$i]);
					if( $rdata['name'] != $n )
					{
						$i++;

					}
					$n = $rdata['name'];
				}
			}
			$returndata[$ti]['spent'] = $spent;

			$t++;
		}
                //return $returndata;
                
                
                foreach( $returndata as $tree => $data )
		{
                       // ($data);
	                $order = $data['order'];
                            
                        $this->reset_values();
                        $this->add_value('member_id', $this->memberId);
	                $this->add_value('tree', $tree);
	                $this->add_value('background', strtolower($this->fix_icon($data['background'])));
	                $this->add_value('pointsspent', $data['spent']);
        	        $this->add_value('order', $order);
	                $this->add_value('build', $branch);

	                $querystr = "INSERT INTO `" . $roster->db->table('talenttree') . "` SET " . $this->assignstr;
                       // echo $querystr.'<br>';
	                $result = $roster->db->query($querystr);
	                if( !$result )
	                {
                               // $this->setError($roster->locale->act['talent_build_' . $build] . ' Talent Tree [' . $talent_tree . '] could not be inserted',$roster->db->error());
                        }
                
                }

        }
  



function build_talenttree_data( $class )
	{
		global $roster, $addon;
		$sql = "SELECT * FROM `" . $roster->db->table('talenttree_data') . "`"
			. " WHERE `class_id` = '" . $class . "'"
			. " ORDER BY `order` ASC;";

		$t = array();
		$results = $roster->db->query($sql);
		$is = '';
		$ii = '';

		if( $results && $roster->db->num_rows($results) > 0 )
		{
			while( $row = $roster->db->fetch($results, SQL_ASSOC) )
			{
				$is++;
				$ii++;
				$t[$row['tree']]['name'] = $row['tree'];
				$t[$row['tree']]['background'] = $row['background'];
				$t[$row['tree']]['icon'] = $row['icon'];
				$t[$row['tree']]['order'] = $row['order'];
			}
		}
		return $t;

	}

	function build_talent_data( $class )
	{
		global $roster, $addon;

		$sql = "SELECT * FROM `" . $roster->db->table('talents_data') . "`"
			. " WHERE `class_id` = '" . $class . "'"
			. " ORDER BY `tree_order` ASC, `row` ASC , `column` ASC;";

		$t = array();
		$results = $roster->db->query($sql);

		$is = '';
		$ii = '';
		if( $results && $roster->db->num_rows($results) > 0 )
		{
			while( $row = $roster->db->fetch($results, SQL_ASSOC) )
			{
				$is++;
				$ii++;
				$t[$row['tree']][$row['row']][$row['column']]['name'] = $row['name'];
				$t[$row['tree']][$row['row']][$row['column']]['id'] = $row['talent_id'];
				$t[$row['tree']][$row['row']][$row['column']]['tooltip'][$row['rank']] = $row['tooltip'];
				$t[$row['tree']][$row['row']][$row['column']]['icon'] = $row['texture'];
			}
		}
		return $t;
	}
    // Helper functions

    /**
     * helper function to get classes for content
     *
     * @param string $class
     * @param string $tree
     * @return string
     */
     
      function _xcheckarray($array=false, $keys)
      {
            foreach ( $keys as $key ) 
            {
                  if (array_key_exists($key, $array))
                  {
                        return true;
                  }
                  else
                  {
                        return false;
                  }
            } 
      }
      
    function _checkContent( $object = false, $keys = array( ) ) {

        if ( is_object ($object ) && count (array_keys ( $keys ) ) !== 0 ) 
        {

            $subobject = $object;

            foreach ( $keys as $key ) {
                echo 'Key - '.$key.'<br>';
                if ( $this->hasProp($key) ) {
                    $subobject = $subobject->$key;
                    echo 'Sub - '.$subobject.'<br>';
                } else {
                    $this->_debug( 3, $object, 'Checked XML content', 'Failed' );
                    return false;
                }
            }
            $this->_debug( 2, true, 'Checked XML content', 'OK' );
            return true;
        } else {
            $this->_debug( 2, false, 'Checked XML content', 'Failed' );
            return false;
        }
    }

    /**
     * helper function to get classes for content
     *
     * @param string $class
     * @param string $tree
     * @return string
     */
    function _setUserAgent( $armory ) {
		global $roster;

		$userAgent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; ';
		switch ( $roster->config['locale'] ) {
			case 'enUS': $userAgent .= 'en-US';
				break;

			case 'deDE': $userAgent .= 'de-DE';
				break;

			case 'frFR': $userAgent .= 'fr-FR';
				break;

			case 'esES': $userAgent .= 'es-ES';
				break;
		}

		$userAgent .= '; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1';
		$armory->setUserAgent($userAgent);

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

    /**
     * helper function to get talent background
     *
     * @param string $class
     * @param string $tree
     * @return string
     */
    function _getTalentBackground($class, $tree) {
        $background = str_replace("_", "", $class) . str_replace(" ", "", $tree);

        switch ($tree) {
            case "Elemental":
            case "Feral":
                $background .= "Combat";
                break;
            case "Retribution":
                $background = $class . "Combat";
                break;
            case "Affliction":
                $background = $class . "Curses";
                break;
            case "Demonology":
                $background = $class . "Summoning";
                break;
        }
        $this->_debug( 2, $background, 'Looked up talent background', 'OK' );
        return $background;
    }

    /**
     * helper function to delocalise character classes
     *
     * @param string $class
     * @return string
     */
    function _getDelocalisedClass($class) {
        global $addon, $roster;
        $ret = $class;

        foreach ( $roster->locale->act['Classes'] as $key => $value ) 
        {
                $value = $value;
                if ( $value == $class ) 
                {
                        $ret = $key;
                        break;
                }
        }
        $this->_debug( 2, $ret, 'Delocalized class', 'OK' );
        return $ret;
    }

    /**
     * helper function to delocalise talent trees
     *
     * @param string $tree
     * @param string $class
     * @return string
     */
    function _getDelocalisedTalenttree($tree, $class) {
        global $addon, $roster;
        $ret = $tree;

        foreach ( $roster->locale->act['Talenttrees'][$class] as $key => $value ) {
                $value = $value;
                if ( $value == $tree ) {
                        $ret = $key;
                        break;
                }
        }
        $this->_debug( 2, $ret, 'Delocalized talenttree', 'OK' );
        return $ret;
    }


    /**
     * helper function to strip of a string
     *
     * @param string $haystack
     * @param string $needle
     * @return string
     */
    function _striposB($haystack, $needle){
        $ret = strpos($haystack, stristr( $haystack, $needle ));
        $this->_debug( 3, $ret, 'Fetched item tooltip', 'OK' );
        return $ret;
    }

    /**
     * helper function to get hex value for item color
     *
     * @param int $value
     * @return string hex color
     */
    function _getItemColor($value) {
        $ret = '';
        switch ($value) {
            case 5: $ret = "ff8000"; //Orange
				break;
            case 4: $ret = "a335ee"; //Purple
				break;
            case 3: $ret = "0070dd"; //Blue
				break;
            case 2: $ret = "1eff00"; //Green
				break;
            case 1: $ret = "ffffff"; //White
				break;
            default: $ret = "9d9d9d"; //Grey
				break;
        }
        $this->_debug( 2, $ret, 'Determined item color', 'OK' );
        return $ret;
    }

    /**
     * helper function to get string value for item slot
     *
     * @param int $value
     * @return string slot
     */
    function _getItemSlot($value) {
        $ret = '';
        switch ($value) {
            case 0: $ret = "Head";
				break;
            case 1: $ret = "Neck";
				break;
            case 2: $ret = "Shoulder";
				break;
            case 3: $ret = "Shirt";
				break;
            case 4: $ret = "Chest";
				break;
            case 5: $ret = "Waist";
				break;
            case 6: $ret = "Legs";
				break;
            case 7: $ret = "Feet";
				break;
            case 8: $ret = "Wrist";
				break;
            case 9: $ret = "Hands";
				break;
            case 10: $ret = "Finger0";
				break;
            case 11: $ret = "Finger1";
				break;
            case 12: $ret = "Trinket0";
				break;
            case 13: $ret = "Trinket1";
				break;
            case 14: $ret = "Back";
				break;
            case 15: $ret = "MainHand";
				break;
            case 16: $ret = "SecondaryHand";
				break;
            case 17: $ret = "Ranged";
				break;
            case 18: $ret = "Tabard";
				break;
            case 19: $ret = "Ammo";
				break;
        }
        $this->_debug( 2, $ret, 'Determined item slot', 'OK' );
        return $ret;
    }

    /**
     * helper function to get numerical value for skill order
     *
     * @param int $value
     * @return int SkillOrder
     */
    function _getSkillOrder($value) {
        global $roster, $addon;
        $ret = 0;
        switch ($value) {
            case $roster->locale->act['Skills']['Class Skills']: $ret = 1;
				break;
            case $roster->locale->act['Skills']['Professions']: $ret = 2;
				break;
            case $roster->locale->act['Skills']['Secondary Skills']: $ret = 3;
				break;
            case $roster->locale->act['Skills']['Weapon Skills']: $ret = 4;
				break;
            case $roster->locale->act['Skills']['Armor Proficiencies']: $ret = 5;
				break;
            case $roster->locale->act['Skills']['Languages']: $ret = 6;
				break;
            default: $ret = 0;
				break;
        }
        $this->_debug( 2, $ret, 'Determined skill order', 'OK' );
        return $ret;
    }

    /**
     * helper function to get relative value for reputation
     *
     * @param int $value
     * @return int RepValue
     */
    function _getRepValue($value) {
        $value = abs($value);

        if ($value >= 42000 && $value < 43000) { $value -= 42000; }
        elseif ($value >= 21000 && $value < 42000) { $value -= 21000; }
        elseif ($value >= 9000 && $value < 21000) { $value -= 9000;  }
        elseif ($value >= 3000 && $value < 9000) { $value -= 3000; }
        elseif ($value >= -3000 && $value < 3000) { $value -= 0;  }
        elseif ($value >= -6000 && $value < -3000) { $value -= 3000; }
        elseif ($value >= -42000 && $value < -6000) { $value -= 6000; }

        $this->_debug( 2, $value, 'Determined reputation value', 'OK' );
        return $value;
    }

    /**
     * helper function to get cap value for reputation
     *
     * @param int $value
     * @return int RepCap
     */
    function _getRepCap($value) {
        $ret = 0;
        if ($value >= 42000 && $value < 43000) { $ret = 1000; }
        if ($value >= 21000 && $value < 42000) { $ret = 21000; }
        if ($value >= 9000 && $value < 21000) { $ret = 12000; }
        if ($value >= 3000 && $value < 9000) { $ret = 6000; }
        if ($value >= -6000 && $value < 3000) { $ret = 3000; }
        if ($value >= -42000 && $value < -6000) { $ret = 36000; }

        $this->_debug( 2, $ret, 'Determined reputation cap', 'OK' );
        return $ret;
    }

    /**
     * helper function to get war status for reputation
     *
     * @param int $value
     * @return bool
     */
    function _getRepAtWar($value) {
        if ($value >= -3000) { $ret = 0; }
        else { $ret = 1; }
        $this->_debug( 2, $ret, 'Determined reputation at war', 'OK' );
        return $ret;
    }

    /**
     * helper function to get localized string for reputation
     *
     * @param int $value
     * @return string RepStanding
     */
    function _getRepStanding($value) {
        global $roster, $addon;

        $ret = '';
        if ($value >= 42000 && $value < 43000) { $ret = $roster->locale->act['exalted']; }
        if ($value >= 21000 && $value < 42000) { $ret = $roster->locale->act['revered']; }
        if ($value >= 9000 && $value < 21000) { $ret = $roster->locale->act['honored']; }
        if ($value >= 3000 && $value < 9000) { $ret = $roster->locale->act['friendly']; }
        if ($value >= 0 && $value < 3000) { $ret = $roster->locale->act['neutral']; }
        if ($value >= -3000 && $value < 0) { $ret = $roster->locale->act['unfriendly']; }
        if ($value >= -6000 && $value < -3000) { $ret = $roster->locale->act['hostile']; }
        if ($value >= -42000 && $value < -6000) { $ret = $roster->locale->act['hated']; }

        $this->_debug( 2, $ret, 'Determined reputation standing', 'OK' );
        return $ret;
    }

    /**
     * helper function mbconvert workaround
     *
     * @param int $value
     * @return string RepStanding
     */
    function _unhtmlentities($string)
    {
        // Ersetzen numerischer Darstellungen
        $string = preg_replace('~&#x([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $string);
        $string = preg_replace('~&#([0-9]+);~e', 'chr("\\1")', $string);
        // Ersetzen benannter Zeichen
        $trans_tbl = get_html_translation_table(HTML_ENTITIES);
        $trans_tbl = array_flip($trans_tbl);
        $ret = strtr($string, $trans_tbl);
        $this->_debug( 3, $ret, 'Removed HTML entities', 'OK' );
        return $ret;
    }

    /**
     * helper function for non enUS strtodate
     *
     * @param string $string
     * @return string date
     */
    function _getDate($string)
    {
        global $roster;

        if ( $roster->locale->curlocale == 'esES') 
        {
            $string = str_replace( 'de ', '', $string );
        }
        if ( $roster->locale->curlocale != 'enUS') 
        {
            $array = explode(" ", $string );
            $array[1] = $roster->locale->act['month_to_en'][$array[1]];
            $string = implode( " ", $array );
        }
        $ret = date('Y/m/d H:i:s', strtotime($string));
        $this->_debug( 2, $ret, 'Converted date', 'OK' );
        return $ret;
    }

    // DB functions

    /**
     * db function to get member name by its id
     *
     * @param int $memberId
     * @return string $memberName
     */
    function _getGuildMembers( $guildID ) {
        global $roster, $addon;

        $query =	"SELECT * ".
                        "FROM ". $roster->db->table('members'). " AS members ".
                        "WHERE ".
                        "members.guild_id=". $guildID;
        $result = $roster->db->query($query);
        if( $roster->db->num_rows($result) > 0 ) 
        {

            $members = $roster->db->fetch_all();
            $array = array();
            foreach ( $members as $member ) 
            {
                $array[$member['name']] = $member;
            }
            $this->_debug( 3, $array, 'Fetched guild members from DB', 'OK' );
            return $array;
        } 
        else 
        {
            $this->_debug( 3, $array, 'Fetched guild members from DB', 'Failed' );
            return array();
        }
    }

    /**
     * db function to get member name by its id
     *
     * @param int $memberId
     * @return string $memberName
     */
    function _getNamefromID( $memberID ) {
        global $roster, $addon;

        $query =	"SELECT ".
                        "members.name ".
                        "FROM ". $roster->db->table('members'). " AS members ".
                        "WHERE ".
                        "members.member_id=". $memberID;
        $memberName = $roster->db->query_first( $query );

        if ( $membername ) {
            $this->_debug( 3, $array, 'Fetched member name from DB', 'OK' );
            return $memberName;
        } else {
            $this->_debug( 3, $array, 'Fetched member name from DB', 'Failed' );
            return $memberName;
        }
    }

    /**
     * db function to get member name by its id
     *
     * @param int $memberId
     * @return string $memberName
     */
    function _getGuildRanks( $guild_id ) {
        global $roster, $addon;

		$array = array();
		$ranks = array();
		if ( $addon['config']['armorysync_rank_set_order'] >= 1 ) {
			$query =	"SELECT ".
							"guild_rank, guild_title ".
							"FROM ". $roster->db->table('members'). " AS members ".
							"WHERE ".
							"members.guild_id=". $guild_id. " ".
							"AND NOT members.guild_title='' ".
							"GROUP BY guild_rank, guild_title ".
							"ORDER BY guild_rank;";
			$result = $roster->db->query($query);
			if( $roster->db->num_rows($result) > 0 ) {

				$tmp = $roster->db->fetch_all();
				foreach ( $tmp as $rank ) {
					$ranks[$rank['guild_rank']] = $rank['guild_title'];
				}
			}
		}

		if ( $addon['config']['armorysync_rank_set_order'] == 3 ) 
            {
            for ( $i = 0; $i <= 9; $i++ ) 
                  {
				$array[$i]['Title'] = isset($ranks[$i]) && $ranks[$i] != '' ?
				$ranks[$i] :
				( $addon['config']['armorysync_rank_'. $i] != '' ?
				$addon['config']['armorysync_rank_'. $i] :
				( $i == 0 ?
				$roster->locale->act['guildleader'] :
				$roster->locale->act['rank']. $i ) );
			}
		}
		elseif ( $addon['config']['armorysync_rank_set_order'] == 2 ) 
            {
            for ( $i = 0; $i <= 9; $i++ ) 
                  {
				$array[$i]['Title'] = $addon['config']['armorysync_rank_'. $i] != '' ?
				$addon['config']['armorysync_rank_'. $i] :
				( isset($ranks[$i]) && $ranks[$i] != '' ?
				$ranks[$i] :
				( $i == 0 ?
				$roster->locale->act['guildleader'] :
				$roster->locale->act['rank']. $i ) );
			}
		}
		elseif ( $addon['config']['armorysync_rank_set_order'] == 1 ) 
            {
                  for ( $i = 0; $i <= 9; $i++ ) 
                  {
				$array[$i]['Title'] = isset($ranks[$i]) && $ranks[$i] != '' ?
						$ranks[$i] :
						( $i == 0 ?
						$roster->locale->act['guildleader'] :
						$roster->locale->act['rank']. $i );
			}
		}
		elseif ( $addon['config']['armorysync_rank_set_order'] == 0 ) 
            {
            for ( $i = 0; $i <= 9; $i++ ) {
				$array[$i]['Title'] = $i == 0 ?
				$roster->locale->act['guildleader'] :
				$roster->locale->act['rank']. $i;
			}
		}
		$this->_debug( 3, $array, 'Fetched guild ranks from DB', 'OK' );
		return $array;
    }

    /**
     * db function to get members guild_rank and guild_title by its id
     *
     * @param int $memberId
     * @return string $memberName
     */
    function _getMemberRank( $member_id ) 
    {
        global $roster, $addon;

        $query =	"SELECT ".
                        "guild_rank, guild_title ".
                        "FROM ". $roster->db->table('members'). " AS members ".
                        "WHERE ".
                        "members.member_id=". $member_id. ";";
        $result = $roster->db->query($query);
        if( $roster->db->num_rows($result) > 0 ) {

            $ranks = $roster->db->fetch_all();
            $this->_debug( 3, $ranks[0], 'Fetched member rank from DB', 'OK' );
            return $ranks[0];
        } else {
            $array = array();
            $this->_debug( 3, $array, 'Fetched member rank from DB', 'Failed' );
            return $array;
        }
    }
    


      /*
      
            adding xml grabbing code here ... to locallise and standalone this addon...
      
      */
      
      
      function getArmoryDataXML($url) 
      {
            global $xmlDataCache, $roster, $addon;
            $data = null;
		if(!$data) 
            {
			$f = "";
			if(USE_CURL) {
				$ch = curl_init();
				$timeout = 30; // set to zero for no timeout
				$useragent="Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1";
				curl_setopt ($ch, CURLOPT_URL, $url);
				curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
				curl_setopt ($ch, CURLOPT_USERAGENT, $useragent);
				$f = curl_exec($ch);
				curl_close($ch);			
			} else {
				$f = file_get_contents($url);
			}
			$xml = simplexml_load_string($f, 'SimpleXMLElement', LIBXML_NOCDATA);
			if($xml)
				$this->setCachedXML($url, $f);
		} 
            else 
            {
			$xml = @simplexml_load_string($data);
			
			if(!$xml) 
                  {
				$f = file_get_contents($url);
				$this->setCachedXML($url, $f);
				$xml = simplexml_load_string($f);
			}
		}
		return $xml;
      }
    
function pharsexml($url)
      {
            $ch = curl_init();
            curl_setopt ($ch, CURLOPT_URL, $url);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, '10');
            curl_setopt ($ch, CURLOPT_HEADER, 0);
            curl_setopt ($ch, CURLOPT_HTTPHEADER, array("Accept-Language: ".$lang)); 
		
            $f = curl_exec($ch);
            curl_close($ch);
            
            return $f;
      }
	

function getGuildMembers($base_url, $realm, $guild, $minLevel, $clsFilter = false) {
	$url = $base_url . "/guild-info.xml?r=" . urlencode(stripslashes($realm)) . "&n=" . urlencode(stripslashes($guild)) . "&p=1";
	$xml = $this->pharsexml($url);
	$node = $xml->xpath("/page/guildInfo/guild/members");
	$attr = attribs($node[0]);
	$maxPages = $attr["maxPage"];
	
	$cList = $this->getCharacterList($xml, $minLevel, $clsFilter);
	for($i=2; $i<=$maxPages; $i++) {
		$url = $base_url . "/guild-info.xml?r=" . urlencode(stripslashes($realm)) . "&n=" . urlencode(stripslashes($guild)) . "&p=$i";
		$xml = $this->getArmoryDataXML($url);
		$cList = array_merge($cList, getCharacterList($xml, $minLevel, $clsFilter));
	}
	
	return $cList;
}

function getTeamInfo($base_url, $realm, $teamSize, $teamName) {
	$url = $base_url . "/team-info.xml?r=" . urlencode(stripslashes($realm)) . "&ts=" . $teamSize . "&t=" . urlencode(stripslashes($teamName));
	$xml = $this->getArmoryDataXML($url);
	$n = $xml->xpath("/page/teamInfo/arenaTeam");
	return attribs($n[0]);
}

function getTeamMembers($base_url, $realm, $teamSize, $teamName) {
	$url = $base_url . "/team-info.xml?r=" . urlencode(stripslashes($realm)) . "&ts=" . $teamSize . "&t=" . urlencode(stripslashes($teamName));
	$xml = $this->getArmoryDataXML($url);
	$n = $xml->xpath("/page/teamInfo/arenaTeam/members/character");
	$chars = array();
	foreach($n as $char) {
		$a = attribs($char);
		$chars[$a["name"]] = $char;
	}
	return array_values($chars);
}

function getTeamEmblem($base_url, $realm, $teamSize, $teamName) {
	$url = $base_url . "/team-info.xml?r=" . urlencode(stripslashes($realm)) . "&ts=" . $teamSize . "&t=" . urlencode(stripslashes($teamName));
	$xml = $this->getArmoryDataXML($url);
	$n = $xml->xpath("/page/teamInfo/arenaTeam/emblem");
	$b = $n[0];
	return $b;	
}

function getCachedXML($url) {
	$max_age = 60 * 60 * 11.5;		// 11.5 hours to allow for Coralization race conditions
	$db = $this->getDBCacheConnection();
	$result = mysql_query("select * from cache where hash = '" . md5($url) . "'", $db);
	if(mysql_num_rows($result) == 0) return false;
	$row = mysql_fetch_assoc($result);
	if(time() - strtotime($row["updated_at"]) > $max_age) return false;
	$data = @gzuncompress($row["data"]);
	return $data;
}

function setCachedXML($url, $xml) {
/*	$db = getDBCacheConnection();
	$result = mysql_query("select * from cache where hash = '" . md5($url) . "'", $db);
	$mu = md5($url);
	$md = mysql_real_escape_string(gzcompress($xml, 9));
	if(mysql_num_rows($result) == 0) {
		$sql = "insert into cache (hash, data, updated_at) values ('$mu', '$md', NOW())";
	} else {
		$sql = "update cache set data = '$md', updated_at = NOW() where hash = '$mu'";
	}
	mysql_query($sql, $db);
	*/return;
}

function attribs($node) {
	$attribs = array();
	if(!$node) {
		throw new Exception("Unable to get node attributes; this likely means that we were unable to retrieve data for the entered realm/guild from the Armory. Please check your input and/or try again later.");
	}
		
	foreach($node->attributes() as $key => $attrib) {
		$attribs[$key] = (string)$attrib;
	}
	return $attribs;
}

function getCharacterList($xml, $minLevel, $class) {
	$cList = array();
	$characters = $xml->xpath("/page/guildInfo/guild/members/character");
	if(sizeof($characters) == 0) {
		echo "<font style='color: #f00; font-weight: bold;'>Warning! No characters found!</font><p />";
	}
	foreach($characters as $character) {
		$attribs = attribs($character);
		if((int)($attribs["level"]) >= $minLevel) {
			if (!$class || $class == $attribs["class"]) {
				$cList[] = array($attribs["name"], $attribs["level"], $attribs["class"]);
			}
		}	
	}
	return $cList;
}

function killCacheEntry($url) {
//	$db = getDBCacheConnection();
	$key = md5($url);
	$sql = "delete from cache where hash = '$key'";
	mysql_query($sql, $db);
}


function getguilddata( $guild, $locale, $realm, $fetch_type='array' )
	{
            $url = $this->_makeUrl( '3', $locale, $id=false, $char=false, $realm, $guild );
		return $this->getArmoryDataXML($url);//return $this->fetchArmory( 3, false, $guild, $realm, false, $fetch_type );
	}
	
function getCharacterData($realm, $name)
{
    $url = $this->_makeUrl( 2, $this->region, $id=false, $name, $realm, $guild );//
	return $this->getArmoryDataXML($url);
}
function getTalentData($realm, $name) {
	$url = $this->_makeUrl( 4, $this->region, $id=false, $name, $realm, $guild );//
      //$url = $base_url . "/character-talents.xml?r=" . urlencode(stripslashes($realm)) . "&n=" . urlencode(stripslashes($name));
	return $this->getArmoryDataXML($url);
}

function getCharacterRep($realm, $name) {
      $url = $this->_makeUrl( 6, $this->region, $id=false, $name, $realm, $guild );//
	//$url = $base_url . "/character-reputation.xml?r=" . urlencode(stripslashes($realm)) . "&n=" . urlencode(stripslashes($name));
	return $this->getArmoryDataXML($url);
}

function logReferer($output) {
	return;
	$db = $this->getDBCacheConnection();
	$url = preg_replace("/(sid|jsessionid)=[0-9A-F]{32}/i", "", @$_SERVER["HTTP_REFERER"]);
	$hash = md5($url);
	$url = mysql_real_escape_string($url);
	$output = mysql_real_escape_string($output);
	if(!preg_match("/tachyonsix\.com/i", @$_SERVER["HTTP_REFERER"]) && strlen(@$_SERVER["HTTP_REFERER"]) > 0) {
		$sql = "select id from referrer_log where referrer_hash = '$hash' and app = '$output'";
		$result = mysql_query($sql, $db);
		if(mysql_num_rows($result) == 0) {
			$sql = "insert into referrer_log (referrer_url, referrer_hash, hits, created_at, updated_at, app) values (\"$url\", \"$hash\", 1, NOW(), NOW(), '$output')";
			mysql_query($sql, $db);
		} else {
			$row = mysql_fetch_assoc($result);
			$id = $row["id"];
			$sql = "update referrer_log set hits = hits + 1, updated_at = NOW() where id = '$id'";
			mysql_query($sql, $db);
		}
	}
}

function _makeUrl( $mode, $locale, $id=false, $char=false, $realm=false, $guild=false )
	{
		if( $locale == 'US' )
		{
			//$base_url = 'http://localhost:18080/?url=http://www.wowarmory.com/';
			$base_url = 'http://www.wowarmory.com/';
		}
		else
		{
			//$base_url = 'http://localhost:18080/?url=http://eu.wowarmory.com/';
			$base_url = 'http://eu.wowarmory.com/';
		}

		// get request mode
		switch( $mode )
		{
			case 0:
			case 'item-tooltip':
				$mode = 'item-tooltip.xml?i=' . $id;
				if( $char )
				{
					$mode .= '&n=' . urlencode($char) . '&r=' . urlencode($realm);
				}
				break;
			case 1:
			case 'item-info':
				$mode = 'item-info.xml?i=' . $id;
				if( $char )
				{
					$mode .= '&n=' . urlencode($char) . '&r=' . urlencode($realm);
				}
				break;
			case 2:
			case 'character-sheet':
				$mode = 'character-sheet.xml?n=' . urlencode($char) . '&r=' . urlencode($realm);
				break;
			case 3:
			case 'guild-info':
				$mode = 'guild-info.xml?r=' . urlencode($realm) . '&gn=' . urlencode($guild) . '&p=1';
				break;
			case 4:
			case 'character-talents':
				$mode = 'character-talents.xml?cn=' . urlencode($char) . '&r=' . urlencode($realm);
				break;
			case 5:
			case 'character-skills':
				$mode = 'character-skills.xml?n=' . urlencode($char) . '&r=' . urlencode($realm);
				break;
			case 6:
			case 'character-reputation':
				$mode = 'character-reputation.xml?cn=' . urlencode($char) . '&r=' . urlencode($realm);
				break;
			case 7:
			case 'character-arenateams':
				$mode = 'character-arenateams.xml?n=' . urlencode($char) . '&r=' . urlencode($realm);
				break;
			case 8:
			case 'strings':
				switch( substr($this->locale, 0, 2) )
				{
					case 'en':
						$val = 'en_us';
						break;
					case 'fr':
						$val = 'fr_fr';
						break;
					case 'de':
						$val = 'de_de';
						break;
					case 'es':
						$val = 'es_es';
						break;
				}
				$mode = 'strings/' . $val . '/strings.xml?';
				break;
			case 9:
			case 'search':
				$mode = 'search.xml?searchQuery=' . urlencode($id) . '&searchType=items';
				break;

		}

		$url = $base_url . $mode;

		if( $this->debug_url )
		{
			//echo $url;
			trigger_error('Debug: Sending [' . $url . '] to urlgrabber()', E_NOTICE);
		}
		return $url;
	}


/*

      end my localisaiation for xml....

*/
    
    
            function get_tooltip($itemid,$user='',$server='',$name='',$icon='')
            {
                  global $roster, $addon;

      
                  $filename = $addon['dir'] . 'cache\\'.$itemid.'-US-tooltip.html';

                  $lang = 'US';

                  $url = 'http://www.wowarmory.com/item-tooltip.xml?i='.$itemid.'&n='.$user.'&r='.$server.'';

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
                  $content = str_replace("\n", "", $f );
                  $content = str_replace('<div id="XssName'.$itemid.'" style="display:none">'.$name.'</div>', "\t", $content );
                  $content = str_replace('<div id="XssIcon'.$itemid.'" style="display:none">'.$icon.'</div>', "\t", $content );
                  $content = str_replace('<span class="tooltipRight">', "\t", $content );
                  $content = preg_replace('/<img class="socketImg p".*?>(.*?)<br>/', '|cffffffff${1}|r<br>', $content );
                  $content = str_replace("&nbsp;", " ", $content );
                  $content = str_replace("<br/>", "%__BRTAG%", $content );
                  $content = str_replace("<br>", "%__BRTAG%", $content );
                  $content = strip_tags( $content );
                  $content = str_replace("%__BRTAG%", "\n", $content );
                  /// $content = str_replace($roster->locale->act['bindings']['bind_on_pickup'], $roster->locale->act['bindings']['bind'], $content);
                  //$content = str_replace($roster->locale->act['bindings']['bind_on_equip'], $roster->locale->act['bindings']['bind'], $content);
                  $string = array('<!DOCTYPE table PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">','<table border="0" cellpadding="0" cellspacing="0">','<tbody>','<span class="">','</span>','</tr>','</td>','</table>','<tr>','<td>','<table>','<td valign="top">','<div class="myTable">','</tbody>');
                  $tip = str_replace($string, '', $content);
      
	
                  return $tip;

	     }
	
      function arraydisplay($array)
	{
	     ////echo '<pre>';
	     ////print_r($array);
	}
	
function setProp($propName, $propValue) {
		$this->$propName = $propValue;
		if (!in_array($propName, $this->properties)) {
			$this->properties[] = $propName;
		}
  } 
  
	function setArray($array) {
		if (is_array($array)) {
			foreach ($array as $key => $value) {
				$this->setProp($key, $value);
			}
		}
	}
	
	function hasProp($propName) {
		return in_array($propName, $this->properties);
	}
        	function fix_icon( $icon_name )
	{
		$icon_name = str_replace('Interface\\\\Icons\\\\','',$icon_name);
		return strtolower(str_replace(' ','_',$icon_name));
	}

}
