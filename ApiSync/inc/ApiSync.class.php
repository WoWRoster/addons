<?php
/**
 * WoWRoster.net WoWRoster
 *
 * ApiSync Library
 *
 * LICENSE: Licensed under the Creative Commons
 *  		"Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license	http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version	SVN: $Id$
 * @link   	http://www.wowroster.net
 * @package	ApiSync
*/

if( !defined('IN_ROSTER') )
{
	exit('Detected invalid access to this file!');
}

require_once ($addon['dir'] . 'inc/ApiSyncbase.class.php');
require_once( ROSTER_LIB . 'simple.class.php' );
define("USE_CURL", TRUE);


class ApiSync extends ApiSyncBase {

	var $memberName = '';
	var $memberId = 0;
	var $guildId = 0;
	var $server = '';
	var $guild_name = '';
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
	var $apidata=array();
	var $message;
	var $debuglevel = 0;
	var $debugmessages = array();
	var $errormessages = array();
	var $assignstr = '';
	var $assigngem = '';
	
	var $gemx = array();

	var $datas = array();

	var $status = array(	'guildInfo' => 0,
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
					$val = 'US';
				}
				return $val;
		}
 						
		
	function synchMemberByID( $server, $memberId = 0, $memberName = false, $region = false, $guildId = 0 ) {
		global $addon, $roster, $update;

		$this->server = $server;
		$this->memberId = $memberId;
		$this->memberName = $memberName;
		$roster->data['region'] = $region;
		$this->guildId = $guildId;
		//aprint($this->data);
		$this->_getRosterData();
		if ( $this->status['characterInfo'] ) {
			include_once(ROSTER_LIB . 'update.lib.php');
			$update = new update;
			$update->fetchAddonData();
			
			//echo'<pre>';
			//print_r($this->data);
			//echo '</pre>';
			
			$update->uploadData['wowrcp']['cpProfile'][$this->server]['Character'][$this->data['Name']] = $this->data;
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
		$roster->data['region'] = $region;
		$this->memberName = $memberName;
		$this->_getGuildInfo();
		include_once(ROSTER_LIB . 'update.lib.php');
		$update = new update;
		$update->fetchAddonData();

		$update->uploadData['wowrcp']['cpProfile'][$this->server]['Guild'][$this->data['name']] = $this->data;
		$this->message = $update->processGuildRoster();
		$tmp = explode( "\n", $this->message);
		$this->message = implode( '', $tmp);

		$this->_debug( 1, true, 'Synced armory data '. $this->memberName. ' with roster',  'OK' );
		return true;
	}

	function _synchGuildByID( $server, $memberId = 0, $memberName = false, $region = false, $guilddata)
	{
		global $addon, $roster, $update;

		$this->server = $server;
		$this->guildId = $memberId;
		$roster->data['region'] = $region;
		$this->memberName = $memberName;
		$this->build_guild($guilddata, $this->guildId);
		$this->_getGuildInfo();

			include_once(ROSTER_LIB . 'update.lib.php');
			$update = new update;
			$update->fetchAddonData();

			$update->uploadData['wowrcp']['cpProfile'][$this->server]['Guild'][$this->data['GuildName']] = $this->data;
			$this->message = $update->processGuildRoster();
			$tmp = explode( "\n", $this->message);
			$this->message = implode( '', $tmp);

			$this->_debug( 1, true, 'Synced armory data '. $this->data['GuildName'] . ' with roster',  'OK' );
			return true;

	}
	
	function synchGuildbob( $server, $memberId = 0, $memberName = false, $region = false, $data)
	{
		global $addon, $roster, $update;

		$this->server = $server;
		$this->guildId = $memberId;
		$roster->data['region'] = $region;
		$this->memberName = $memberName;
		$this->active_member['starttimeutc'] = gmdate('Y-m-d H:i:s');

		include_once(ROSTER_LIB . 'update.lib.php');
		$update = new update;
		$update->fetchAddonData();
		$update->uploadData['wowrcp']['cpProfile'][$server]['Guild'][ $memberName] = $this->data;
		$x = $update->processGuildRoster();
		$x .= ''.$this->message.'<br>';
		$this->_debug( 1, true, 'Synced armory data '. $this->memberName. ' with roster',  'OK' );
		return $x;//true;

	}
	/**
 	* fetches seperate parts of the character sheet
 	*
 	*/
  	function _getRosterData()
	{
		$this->_getCharacterInfo();
		if ( $this->status['characterInfo'] ) 
		{
			$this->_insertGems();
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

	/**
 	* fetches guild info
 	*
 	*/
	function _getGuildInfo() {
		global $roster, $addon;

		$guild_name = (isset($roster->data['guild_name']) ? $roster->data['guild_name'] : $this->guild_name);
		$content = $this->datas;

		$this->data['Ranks'] = $this->_getGuildRanks( $this->guildId );
		$this->data['timestamp']['init']['datakey'] = $roster->data['region'];
		$this->data['timestamp']['init']['TimeStamp'] = time();
		$this->data['timestamp']['init']['Date'] = date('Y-m-d H:i:s');
		$this->data['timestamp']['init']['DateUTC'] = gmdate('Y-m-d H:i:s');
		$this->data['Locale'] = $roster->data['region'];
		$this->data['GPprovider'] = "ApiSyncGuild";
		$this->data['FactionEn'] = $roster->locale->act['id_to_faction'][$content['side']];
		$this->data['Faction'] = $roster->locale->act['id_to_faction'][$content['side']];
		$this->data["DBversion"] = '3.1';
		$this->data["GPversion"] = $roster->config['minGPver'];
		$this->data['name'] = $guild_name;
		$this->data['Server'] = $this->datas['realm'];
		$this->data['GuildName'] = $guild_name;
		$this->data['GuildLevel'] = $content['level'];
		$this->data['NumMembers'] = count($content['members']);
		$this->data['GuildLevel'] = $content['level'];
		$this->data['Info'] = ''; //$roster->data['guild_info_text'];
			
		$min = 60;
		$hour = 60 * $min;
		$day = 24 * $hour;
		$month = 30 * $day;
		$year = 365 * $day;
		foreach ( $content['members'] as $id => $member )
		{
			$player['AchRank'] = '';
			$player['Zone'] = "";
			$player['Class'] = $roster->locale->act['id_to_class'][$member['character']['class']];
			$player['ClassId'] = $member['character']['class'];
			$player['Name'] = $member['character']['name'];
			$player['Level'] = $member['character']['level'];
			$player['Mobile'] = false;
			$player['Title'] = $this->data['Ranks'][$member['rank']]['Title'];
			$player['AchPoints'] = $member['character']['achievementPoints'];
			$player['RankEn'] = $this->data['Ranks'][$member['rank']]['Title'];
			$player['LastOnline'] = "0:0:0:0";
			$player['Rank'] = $member['rank'];
			$player['Online'] ='0';
			$this->status['guildInfo'] += 1;
			$this->data['Members'][$member['character']['name']] = $player;
		}

		$this->_debug( 1, $this->data, 'Parsed guild info',  'OK' );
	}

	/*
 	* had to get evil and make a new guild data paser for the new adding style...
 	*/
	
	function build_guild( $content, $gid ) 
	{
		global $roster, $addon;

		$guild = $content->guildInfo->guild;
		$guildh = $content->guildInfo->guildHeader;
		
		$this->data['timestamp']['init']['datakey'] = $roster->data['3'];
		$this->data['Ranks'] = $this->_getGuildRanks( $this->guildId );
		$this->data['timestamp']['init']['datakey'] = $roster->data['region'];
		$this->data['timestamp']['init']['TimeStamp'] = time();
		$this->data['timestamp']['init']['Date'] = date('Y-m-d H:i:s');
		$this->data['timestamp']['init']['DateUTC'] = gmdate('Y-m-d H:i:s');
		$this->data['GPprovider'] = "ApiSync";
		$this->data['FactionEn'] = $roster->locale->act['id_to_faction'][(string)$guildh["faction"]];
		$this->data["DBversion"] = $roster->config['minGPver'];
		$this->data["GPversion"] = $roster->config['minGPver'];
		$this->data["GuildName"] = $roster->data['guild_name'];
		$this->data['EventLog'] = array();
		$this->data['name'] = $this->memberName;
		$this->data['Info'] = '';
		$members = $this->_getGuildMembers( $gid );

		$min = 60;
		$hour = 60 * $min;
		$day = 24 * $hour;
		$month = 30 * $day;
		$year = 365 * $day;

		foreach ( $guild->members->character as $ch => $char )
		{
			$player = array();
			$player["name"] = ''.$char['name'].'';
			$player["ClassId"] = ''.$char['classId'].'';
			$player['Class'] = $roster->locale->act['id_to_class'][''.$player["ClassId"].''];//$char['class'];
			$player["ClassEn"] = $roster->locale->act['class_to_en'][''.$player["Class"].''];
			if ( substr($player["Class"] ,0,1) == 'J' && substr($player["Class"] ,-3) == 'ger' ) {
					$player["Class"] = utf8_encode('Jäger');
			}
			$player['Level'] = ''.$char['level'].'';
			$player['Rank'] = ''.$char['rank'].'';
			if ( array_key_exists( ''.$char['name'].'', $members ) )
			{
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
			}
			else
			{
				$player['Online'] = "1";
			}
			$this->data['Members'][''.$char['name'].''] = $player;
			$this->status['guildInfo'] += 1;
		}

		if ( isset($roster->addon_data['guildbank']) && $roster->addon_data['guildbank']['active'] == 1 )
		{
			$guildbank = getaddon('guildbank');
		}

		foreach ( $members as $member )
		{
			if ( ! array_key_exists( 'done', $member ) )
			{
				if ( is_int( array_search( $member['guild_title'], explode( ',', $addon['config']['ApiSync_protectedtitle'] ) ) ) || ( isset($guildbank) && strstr($member[$guildbank['config']['banker_fieldname']], $guildbank['config']['banker_rankname']) )
					)
				{
					$player['name'] = $member['name'];
					$player['Class'] = $roster->locale->act['enUS']['id_to_class'][$member['classid']];//$member['class'];
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
 	* end new guild data phasing....
 	* /
 	*/
	/**
 	* fetches guild info
 	*
 	*/
	function checkGuildInfo( $name = false, $server = false, $region = false ) 
	{
		global $roster, $addon;
		
		$content = $roster->api->Guild->getGuildInfo($server,$name,'1');
		$this->datas = $content;
		if ( is_array( $content['members']) ) //_checkContent( $content, array( 'guildInfo', 'guild' ) ) )
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

		$roster->data['region'] = $region;
		$this->apidata = $roster->api->Char->getCharInfo($server,$name,'1:2:3:4:5:7:11:14');

		if (is_array($this->apidata) && isset($this->apidata['name'])) 
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
	function _getCharacterInfo()
	{
			global $roster, $addon;

			$char = (!empty($this->apidata) ? $this->apidata :$roster->api->Char->getCharInfo($this->server,$this->memberName,'1:2:3:4:5:7:11:14'));

			$this->apidata = $char;

			if ( isset($char['name']) )
			{
  				$rank = $this->_getMemberRank( $this->memberId );

  				$this->data["Name"] = ''.$char['name'].'';//$char['name'];
  				$this->data["Level"] = ''.$char['level'].'';
  				$this->data["Server"] = ''.$char['realm'].'';
				$this->guild_name=$char['guild']['name'];
				$this->data["Guild"]["Name"] = $char['guild']['name'];
  				$this->data["Guild"]["Title"] = '';
  				$this->data["Guild"]["Rank"] = '';
  				
				$this->data["CPprovider"] = 'ApiSyncChar';
  				$this->data["CPversion"] = $roster->config['minCPver'];//'2.6.0';

  				$this->data["Honor"]["Lifetime"]["HK"] = ''.$char['pvp']['totalHonorableKills'].'';
  				//$this->data["Honor"]["Lifetime"]["Name"] = $char->title;
  				$this->data["Honor"]["Session"] = array();
  				$this->data["Honor"]["Yesterday"] = array();
  				$this->data["Honor"]["Current"] = array();
												/*"str":91,    "agi":3884,    "sta":6306,    "int":112,    "spr":120,*/
  				$this->data["Attributes"]["Stats"]["Intellect"] = "0:" . $char['stats']['int'] . ":0";
  				$this->data["Attributes"]["Stats"]["Agility"] = "0:" . $char['stats']['agi'] . ":0";
  				$this->data["Attributes"]["Stats"]["Stamina"] = "0:" . $char['stats']['sta'] . ":0";
  				$this->data["Attributes"]["Stats"]["Strength"] = "0:" . $char['stats']['str'] . ":0";
  				$this->data["Attributes"]["Stats"]["Spirit"] = "0:" . $char['stats']['spr'] . ":0";

  				$this->data["Attributes"]["Defense"]["DodgeChance"] = $char['stats']['dodge'];
  				$this->data["Attributes"]["Defense"]["ParryChance"] = $char['stats']['parry'];
  				$this->data["Attributes"]["Defense"]["BlockChance"] = $char['stats']['block'];
  				$this->data["Attributes"]["Defense"]["ArmorReduction"] = '';

  				$this->data["Attributes"]["Defense"]["Armor"] = "):" . $char['stats']['armor'] . ":0";
  				$this->data["Attributes"]["Defense"]["Defense"] = '';//$tab->defenses->defense['value'] . ":" . $tab->defenses->defense['plusDefense'] . ":0";
  				$this->data["Attributes"]["Defense"]["BlockRating"] = $char['stats']['blockRating']. ":0". ":0";
  				$this->data["Attributes"]["Defense"]["ParryRating"] = $char['stats']['parryRating']. ":0". ":0";
  				$this->data["Attributes"]["Defense"]["DefenseRating"] = '';//$tab->defenses->defense['rating']. ":0". ":0";
  				$this->data["Attributes"]["Defense"]["DodgeRating"] = $char['stats']['dodgeRating']. ":0". ":0";

  				$this->data["Attributes"]["Defense"]["Resilience"]["Melee"] = $char['stats']['resil'];
			// ??? $this->data["Attributes"]["Defense"]["Resilience"]["Ranged"]
			// ??? $this->data["Attributes"]["Defense"]["Resilience"]["Spell"]

  				$this->data["Attributes"]["Resists"]["Frost"] 		=   "0:0:0";
  				$this->data["Attributes"]["Resists"]["Arcane"] 		= "0:0:0";
  				$this->data["Attributes"]["Resists"]["Fire"] 		= 	"0:0:0";
  				$this->data["Attributes"]["Resists"]["Shadow"] 		= "0:0:0";
  				$this->data["Attributes"]["Resists"]["Nature"] 		= "0:0:0";
  				$this->data["Attributes"]["Resists"]["Holy"] 		= 	"0:0:0";

  				$this->data["Attributes"]["Melee"]["AttackPower"] 	= $char['stats']['attackPower'] . ":".$char['stats']['attackPower'].":0";
  				$this->data["Attributes"]["Melee"]["HitRating"] 	= $char['stats']['hitRating'] . ":0:0";
  				$this->data["Attributes"]["Melee"]["CritRating"] 	= $char['stats']['crit'] . ":0:0";
  				$this->data["Attributes"]["Melee"]["HasteRating"] 	= $char['stats']['hasteRating'] . ":".$char['stats']['hitPercent'].":0";

  				$this->data["Attributes"]["Melee"]["CritChance"] = ''.$char['stats']['critRating'].'';
  				$this->data["Attributes"]["Melee"]["AttackPowerDPS"] = '';

			if ( $char['stats']['mainHandSpeed'] > 0 ) 
			{

				$this->data["Attributes"]["Melee"]["MainHand"]["AttackSpeed"] = ''.$char['stats']['mainHandSpeed'].'';
				$this->data["Attributes"]["Melee"]["MainHand"]["AttackDPS"] = ''.$char['stats']['mainHandDps'].'';
				$this->data["Attributes"]["Melee"]["MainHand"]["AttackSkill"] = '';//''.$char['stats']['mainHandSpeed['value'].'';
				$this->data["Attributes"]["Melee"]["MainHand"]["DamageRange"] = $char['stats']['mainHandDmgMin'] . ":" . $char['stats']['mainHandDmgMax'];
				$this->data["Attributes"]["Melee"]["MainHand"]["DamageRangeBase"] = $char['stats']['mainHandDmgMin'] . ":" . $char['stats']['mainHandDmgMax'];
				$this->data["Attributes"]["Melee"]["MainHand"]["AttackRating"] = ''.$char['stats']['mainHandSpeed'].'';
			}

			if ( $char['stats']['offHandSpeed'] > 0 ) 
			{

				$this->data["Attributes"]["Melee"]["OffHand"]["AttackSpeed"] = ''.$char['stats']['offHandSpeed'].'';
				$this->data["Attributes"]["Melee"]["OffHand"]["AttackDPS"] = ''.$char['stats']['offHandDps'].'';
				$this->data["Attributes"]["Melee"]["OffHand"]["AttackSkill"] = '';//''.$char['stats']['offHandSpeed['value'].'';
				$this->data["Attributes"]["Melee"]["OffHand"]["DamageRange"] = $char['stats']['offHandDmgMin'] . ":" . $char['stats']['mainHandDmgMax'];
				$this->data["Attributes"]["Melee"]["OffHand"]["DamageRangeBase"] = $char['stats']['offHandDmgMin'] . ":" . $char['stats']['mainHandDmgMax'];
				$this->data["Attributes"]["Melee"]["OffHand"]["AttackRating"] = ''.$char['stats']['offHandSpeed'].'';
			}

			// ??? $this->data["Attributes"]["Melee"]["DamageRangeTooltip"] = "";
			// ??? $this->data["Attributes"]["Melee"]["AttackPowerTooltip"] = "";


			if ( $char['stats']['rangedDmgMin'] > 0 ) 
			{
/*	"rangedDmgMin":3044.0,    "rangedDmgMax":4070.0,    "rangedSpeed":2.622,    "rangedDps":1356.5209,    "rangedCrit":18.545528,
    "rangedCritRating":1456,    "rangedHitPercent":7.32669,    "rangedHitRating":880	*/
				$this->data["Attributes"]["Ranged"]["AttackPower"] 		= "0:". $char['stats']['rangedAttackPower'] . ":0";
				$this->data["Attributes"]["Ranged"]["HitRating"] 		= $char['stats']['rangedHitRating']. ":0:0";
				$this->data["Attributes"]["Ranged"]["CritRating"] 		= $char['stats']['rangedCritRating']. ":0:0";
				$this->data["Attributes"]["Ranged"]["HasteRating"] 		= $char['stats']['hasteRating']. ":0:0";

				$this->data["Attributes"]["Ranged"]["CritChance"] 		= $char['stats']['crit'];
				$this->data["Attributes"]["Ranged"]["AttackPowerDPS"] 	= '';//$char['stats']['increasedDps'];

				$this->data["Attributes"]["Ranged"]["AttackSpeed"] 		= $char['stats']['rangedSpeed'];
				$this->data["Attributes"]["Ranged"]["AttackDPS"] 		= $char['stats']['rangedDps'];
				$this->data["Attributes"]["Ranged"]["AttackSkill"] 		= '';//$char['stats']['value'];
				$this->data["Attributes"]["Ranged"]["DamageRange"] 		= $char['stats']['rangedDmgMin'] . ":" . $char['stats']['rangedDmgMax'];
				$this->data["Attributes"]["Ranged"]["AttackRating"] 	= $char['stats']['rangedHitPercent'];
				$this->data["Attributes"]["Ranged"]["DamageRangeBase"] 	= $char['stats']['rangedDmgMin'] . ":" . $char['stats']['rangedDmgMax'];
			}
/*    "spellPower":102,    "spellPen":0,    "spellCrit":8.121372,    "spellCritRating":1456,    "spellHitPercent":8.589913,
																		"spellHitRating":880,  */
			$this->data["Attributes"]["Spell"]["HitRating"] = $char['stats']['spellHitRating'] . ":0:0";
			$this->data["Attributes"]["Spell"]["CritRating"] = $char['stats']['spellCritRating'] . ":0:0";
			$this->data["Attributes"]["Spell"]["HasteRating"] = "0:0:0"; // ???

			$this->data["Attributes"]["Spell"]["CritChance"] = min ( array ('0','0','0','0','0','0' ) );
			if (isset($char['stats']['mana5']) && isset($char['stats']['mana5Combat']))
			{
  				$this->data["Attributes"]["Spell"]["ManaRegen"] = $char['stats']['mana5'] . ":". $char['stats']['mana5Combat'];
			}
			else
			{
  				$this->data["Attributes"]["Spell"]["ManaRegen"] = "0:0";
			}
			$this->data["Attributes"]["Spell"]["Penetration"] = ''.$char['stats']['spellPen'].'';
			$this->data["Attributes"]["Spell"]["BonusDamage"] = min ( array ('0','0','0','0','0','0' ) );
			
			$this->data["Attributes"]["Spell"]["BonusHealing"] = '0';

			$this->data["Attributes"]["Spell"]["SchoolCrit"]["Holy"] = ''.$char['stats']['spellCrit'].'';
			$this->data["Attributes"]["Spell"]["SchoolCrit"]["Frost"] = ''.$char['stats']['spellCrit'].'';
			$this->data["Attributes"]["Spell"]["SchoolCrit"]["Arcane"] = ''.$char['stats']['spellCrit'].'';
			$this->data["Attributes"]["Spell"]["SchoolCrit"]["Fire"] = ''.$char['stats']['spellCrit'].'';
			$this->data["Attributes"]["Spell"]["SchoolCrit"]["Shadow"] = ''.$char['stats']['spellCrit'].'';
			$this->data["Attributes"]["Spell"]["SchoolCrit"]["Nature"] = ''.$char['stats']['spellCrit'].'';

			$this->data["Attributes"]["Spell"]["School"]["Holy"] = '';//''.$tab->spell->bonusDamage->holy['value'].'';
			$this->data["Attributes"]["Spell"]["School"]["Frost"] = '';//''.$tab->spell->bonusDamage->frost['value'].'';
			$this->data["Attributes"]["Spell"]["School"]["Arcane"] = '';//''.$tab->spell->bonusDamage->arcane['value'].'';
			$this->data["Attributes"]["Spell"]["School"]["Fire"] = '';//''.$tab->spell->bonusDamage->fire['value'].'';
			$this->data["Attributes"]["Spell"]["School"]["Shadow"] = '';//''.$tab->spell->bonusDamage->shadow['value'].'';
			$this->data["Attributes"]["Spell"]["School"]["Nature"] = '';//''.$tab->spell->bonusDamage->nature['value'].'';

			$this->data["Race"] 				= $roster->locale->act['id_to_race'][$char['race']];
			$this->data["RaceId"]   			= ''.$char['race'].'';
			$this->data["RaceEn"]   			= $roster->locale->act['race_to_en'][$this->data["Race"]];

			$this->data["Class"]				= $roster->locale->act['id_to_class'][$char['class']];
			$this->class						= $roster->locale->act['id_to_class'][$char['class']];

			$this->data["ClassId"]  			= ''.$char['class'].'';
			$this->data["ClassEn"]  			= ''.$roster->locale->act['class_to_en'][$this->data["Class"]].'';
			$this->data["Health"]   			= $char['stats']['health'];
			$this->data["Mana"] 				= $char['stats']['power'];

			if ( $char['stats']['powerType'] == "mana" ) 
			{
				$this->data["Power"]			= ''.$roster->locale->act['mana'].'';
			} 
			elseif ( $char['stats']['powerType'] == "rage" ) 
			{
				$this->data["Power"]			= ''.$roster->locale->act['rage'].'';
			} 
			elseif ( $char['stats']['powerType'] == "energy" ) 
			{
				$this->data["Power"]			= ''.$roster->locale->act['energy'].'';
			} 
			elseif ( $char['stats']['powerType'] == "focus" ) 
			{
				$this->data["Power"]			= ''.$roster->locale->act['focus'].'';
			}
			$this->data["Sex"]  				= $this->return_gender($char['gender']);

			// This is an ugly workaround for an encoding error in the armory
			if ( substr($this->data["Sex"],0,1) == 'M' && substr($this->data["Sex"],-6) == 'nnlich' ) {
					$this->data["Sex"] = utf8_encode('Männlich');
			}
			// This is an ugly workaround for an encoding error in the armory

			$this->data["SexId"] = $char['gender'];
			$this->data["Money"]["Copper"] = 0;
			$this->data["Money"]["Silver"] = 0;
			$this->data["Money"]["Gold"] = 0;
			$this->data["Experience"] = 0;
			$this->data["timestamp"]["init"]["DateUTC"] = ''.$this->_getDate($char['lastModified']).'';
			$this->data['timestamp']['init']['datakey'] = $roster->data['region']. ":";
			$this->data['Region']=$roster->data['region'];
			$this->data["Locale"] = $roster->config['locale'];
			$this->data["Inventory"] = array();
			$this->data["Equipment"] = array();
			$this->data["Skills"] = array();
			$this->data["Reputation"] = array();
			$this->data["Talents"] = array();
			$this->data["Glyphs"] = array();
			$this->data["DualSpec"] = array();
			$this->data["DualSpec"]["Talents"] = array();
			$this->data["DualSpec"]["Glyphs"] = array();
			

			$this->status['characterInfo'] = 1;
			$this->status['guildInfo'] = 1;

			$this->_debug( 1, true, 'Parsed character infos',  'OK' );

			if ( isset($char['items']))
			{
				$equip = $char['items'];
				$this->_getEquipmentInfo( $equip );
			}

		}
		else 
		{
			$this->_debug( 1, false, 'Parsed character infos',  'Failed' );
		} 
	}

function return_gender($genderid) {
		if ($genderid == "0") {$gender = "Male";}
		if ($genderid == "1") {$gender = "Female";}
		return $gender;
	}
  	/**
  	* fetches character skill info from the main character tab
  	*
  	*/
  	function _getSkillInfo() 
  	{
			global $roster, $addon;

			$skills = $this->apidata['professions'];
			$o = 0;
			foreach ($skills['primary'] as $id =>$skil) 
			{

				if ( isset($skil['name']) )
				{ 			
					$this->data["Skills"][''.$roster->locale->act['professions'].''][''.$skil['name'].''] = "".$skil['rank'].":".$skil['max']."";
					$this->data["Skills"][''.$roster->locale->act['professions'].'']["Order"] = $o;
					$this->status['skillInfo'] += 1;
					$o++;
				}
				else
				{
					$this->status['skillInfo'] = '0';
				}
			}

			foreach ($skills['secondary'] as $id =>$skil) 
			{
				if ( isset($skil['name']) )
				{ 			
					$this->data["Skills"][''.$roster->locale->act['secondary'].''][''.$skil['name'].''] = "".$skil['rank'].":".$skil['max']."";
					$this->data["Skills"][''.$roster->locale->act['secondary'].'']["Order"] = $o;
					$this->status['skillInfo'] += 1;
					$o++;
				}
				else
				{
					$this->status['skillInfo'] = $this->status['skillInfo'];
				}
			}   		
			$this->_debug( 1, true, 'Parsed skill info', 'OK' );
	}
	
	
	
	/**
 	* fetches character equipment info
 	*
 	*/
	function _getEquipmentInfo( $equip = array() )
	{
		global $roster, $addon;

		foreach($equip as $slot => $item) 
		{
		
			if ($slot != 'averageItemLevel' && $slot != 'averageItemLevelEquipped')
			{

				$enchant =  $gem0 =  $gem1 =  $gem2 = $es = $set = $reforge = $suffex = $seed = null;
				$gam['enchant']=$gam['enchant']=$gam['reforge']=$gam['suffix']=$gam['seed']=$gam['set']=null;
				$gam['gem0']=$gam['gem1']=$gam['gem2']=$gam['extraSocket']=null;
				$tip = '';//str_replace($string, '', $x);
				$gam = null;
				$this->gemx = array();
				$gam = array();
				foreach ($item['tooltipParams'] as $ge => $id)
				{
					$gam[$ge] = $id;
				}
				if (isset($gam['enchant']))
				{
					$enchant = $gam['enchant'] ? $gam['enchant'] : null;
				}
				if (isset($gam['reforge']))
				{
					$reforge = $gam['reforge'] ? $gam['reforge'] : null;
				}
				if (isset($gam['suffix']))
				{
					$suffix = $gam['suffix'] ? $gam['suffix'] : null;
				}
				if (isset($gam['seed']))
				{
					$seed = $gam['seed'] ? $gam['seed'] : null;
				}
				if (isset($gam['set']))
				{
					$e='';
					foreach ($gam['set'] as $id => $inf)
					{
						$e .= $inf.',';
					}
					$set = preg_replace('/,$/', '', $e);
				}
				
				if (isset($item['tooltipParams']['gem0']))
				{
					$gem0 = $item['tooltipParams']['gem0'];
					$g0 = $roster->api->Data->getItemInfo($item['tooltipParams']['gem0']);
					$this->gemx['gem0'] = $g0;
					$this->gemx['gem0']['Tooltip'] = $roster->db->escape($g0['name']."<br>".$g0['gemInfo']['bonus']['name']."<br>".$g0['description']);
					$this->gemx['gem0']['gem_bonus'] = $roster->db->escape($g0['gemInfo']['bonus']['name']);
					$this->gemx['gem0']['gem_color'] = strtolower($g0['gemInfo']['type']['type']);
				}
				if (isset($item['tooltipParams']['gem1']))
				{
					$gem1 = $item['tooltipParams']['gem1'];
					$g1 = $roster->api->Data->getItemInfo($item['tooltipParams']['gem1']);
					$this->gemx['gem1'] = $g1;
					$this->gemx['gem1']['Tooltip'] = $roster->db->escape($g1['name']."<br>".$g1['gemInfo']['bonus']['name']."<br>".$g1['description']);
					$this->gemx['gem1']['gem_bonus'] = $roster->db->escape($g1['gemInfo']['bonus']['name']);
					$this->gemx['gem1']['gem_color'] = strtolower($g1['gemInfo']['type']['type']);
				}
				if (isset($item['tooltipParams']['gem2']))
				{
					$gem2 = $item['tooltipParams']['gem2'];
					$g2 = $roster->api->Data->getItemInfo($item['tooltipParams']['gem2']);
					$this->gemx['gem2'] = $g2;
					$this->gemx['gem2']['Tooltip'] = $roster->db->escape($g2['name']."<br>".$g2['gemInfo']['bonus']['name']."<br>".$g2['description']);
					$this->gemx['gem2']['gem_bonus'] = $roster->db->escape($g2['gemInfo']['bonus']['name']);
					$this->gemx['gem2']['gem_color'] = strtolower($g2['gemInfo']['type']['type']);
				}
				$this->_insertGems();
		
				if (isset($gam['extraSocket']))
				{
					$es = $gam['extraSocket'] ? true : false;
				}
				
				$gam = null;
				$slot = ucfirst($slot);
				if ($slot == 'Finger1')
				{
				$slot = 'Finger0';
				}
				if ($slot == 'Finger2')
				{
				$slot = 'Finger1';
				}
				
				if ($slot == 'Trinket1')
				{
				$slot = 'Trinket0';
				}
				if ($slot == 'Trinket2')
				{
				$slot = 'Trinket1';
				}
				if ($slot == 'OffHand')
				{
					$slot = 'SecondaryHand';
				}
				$enchant = 0;
				$item_api = $roster->api->Data->getItemInfo($item['id']);
				$this->data["Equipment"][$slot] = array();
				$this->data["Equipment"][$slot]['Item'] = $item['id'];
				$this->data["Equipment"][$slot]['Type'] = $roster->api->Item->itemclass[$item_api['itemClass']];
				$this->data["Equipment"][$slot]['SubType'] = $roster->api->Item->itemSubClass[$item_api['itemClass']][$item_api['itemSubClass']];
				$this->data["Equipment"][$slot]['Icon'] = ''.$item['icon'].'';
				$this->data["Equipment"][$slot]['Name'] = ''.$item['name'].'';
				$this->data["Equipment"][$slot]['Color'] = $this->_getItemColor($item['quality']);
				// api gen tooltip some issues may occure
				// woraroud itemapi makes html tooltips roster dont like them so we remove them
				$tx =  $roster->api->Item->item($item_api,$item,$this->gemx);
				$tt = $this->processtooltips($tx);
				////echo '<br><hr><br>'.$tt.'<br><hr><br>';
				$this->data["Equipment"][$slot]['Tooltip'] = $tt;//addslashes($tip);
				//	$enchant =  $gem0 =  $gem1 =  $gem2 = $es = $set = $reforge = $suffex = $seed = null;
				$this->data["Equipment"][$slot]['Item'] .= ":". $enchant;
				$this->data["Equipment"][$slot]['Item'] .= ":". $gem0; // GemId0
				$this->data["Equipment"][$slot]['Item'] .= ":". $gem1; // GemId1
				$this->data["Equipment"][$slot]['Item'] .= ":". $gem2; // GemId2
				$this->data["Equipment"][$slot]['Item'] .= ":". "0"; // ???
				$this->data["Equipment"][$slot]['Item'] .= ":". "0"; // ???
				$this->data["Equipment"][$slot]['Item'] .= ":". $seed;
				// gems !!!!
				$this->data["Equipment"][$slot]["Gem"]= array();
				foreach($this->gemx as $gid => $gd)
				{
					$gm = array();
					$gm["gemID"] = $gd['id'];
					$gm["Name"] = $gd['name'];
					$gm["Link"] = "|cff".$this->_getItemColor($gd['quality'])."|Hitem:".$gd['id'].":0:0:0:0:0:0:0:".$gd['itemLevel'].":0|h[".$gd['name']."]|h|r";
					$gm["Color"] = $this->_getItemColor($gd['quality']);
					$gm["Tooltip"] = $gd['Tooltip'];
					$gm["Icon"] = $gd['icon'];
					$gm["Item"] = $gd['id'];
					$this->data["Equipment"][$slot]["Gem"][] = $gm;
				}
			}
			$this->status['equipmentInfo'] += 1;
   		}
		
		if ( $this->status['equipmentInfo'] > 0 )
		{
			$this->_debug( 1, true, 'Parsed equipment info', 'OK' );
		}
		else
		{
			$this->_debug( 1, false, 'Parsed equipment info', 'Failed' );
		}

	}
	
	function _insertGems()
	{
		global $roster;
		
		foreach($this->gemx as $id => $info)
		{
			////echo '<pre>';
			//print_r($info);
			$query ="REPLACE INTO `roster_gems` SET 
			`gem_id` = '".$info['id']."', 
			`gem_name` = '".addslashes($info['name'])."', 
			`gem_color` = '".$info['gem_color']."', 
			`gem_tooltip` = '".$info['Tooltip']."', 
			`gem_bonus` = '".$info['gem_bonus']."', 
			`gem_socketid` = '".$info['id']."', 
			`gem_texture` = '".$info['icon']."', 
			`locale` = '".$roster->config['locale']."';";
			////echo '<br>'.$query.'<br><hr><br>';
			$result2 = $roster->db->query($query);
			
		}	
	}

	function processtooltips($t)
	{
		$tx = preg_replace ('/\<br \/\>/', "\n", $t);
		$tx = strip_tags($tx);
		$tx = preg_replace ("/\n\n/", "\n", $tx);
	
		return $tx;
	}

	/**
 	* fetches character reputation info
 	*
 	*/
  	function _getReputationInfo() 
  	{
			global $roster, $addon;
			
			$rep = $this->apidata['reputation'];

			
			$xrep = array(
    "Wildhammer Clan"				=> array ("parent" => "Cataclysm"),
	"Baradin's Wardens"				=> array ("parent" => "Cataclysm"),
	"The Earthen Ring"				=> array ("parent" => "Cataclysm"),
	"Avengers of Hyjal"				=> array ("parent" => "Cataclysm"),
	"Ramkahen"						=> array ("parent" => "Cataclysm"),
	"Guardians of Hyjal"			=> array ("parent" => "Cataclysm"),
	"Therazane"						=> array ("parent" => "Cataclysm"),
	"Knights of the Ebon Blade"		=> array ("parent" => "Wrath of the Lich King"),
	"Argent Crusade"				=> array ("parent" => "Wrath of the Lich King"),
	"The Kalu'ak"					=> array ("parent" => "Wrath of the Lich King"),
	"The Sons of Hodir"				=> array ("parent" => "Wrath of the Lich King"),
	"Alliance Vanguard"				=> array ("parent" => "Wrath of the Lich King"),
	"Valiance Expedition"			=> array ("parent" => "Wrath of the Lich King","faction" => "Alliance Vanguard"),
	"Explorers' League"				=> array ("parent" => "Wrath of the Lich King","faction" => "Alliance Vanguard"),
	"The Silver Covenant"			=> array ("parent" => "Wrath of the Lich King","faction" => "Alliance Vanguard"),
	"The Frostborn"					=> array ("parent" => "Wrath of the Lich King","faction" => "Alliance Vanguard"),
	"Kirin Tor"						=> array ("parent" => "Wrath of the Lich King"),
	"Sholazar Basin"				=> array ("parent" => "Wrath of the Lich King"),
	"Frenzyheart Tribe"				=> array ("parent" => "Wrath of the Lich King","faction" => "Sholazar Basin"),
	"The Oracles"					=> array ("parent" => "Wrath of the Lich King","faction" => "Sholazar Basin"),
	"The Wyrmrest Accord"			=> array ("parent" => "Wrath of the Lich King"),
	"The Ashen Verdict"				=> array ("parent" => "Wrath of the Lich King"),
	"The Violet Eye"				=> array ("parent" => "The Burning Crusade"),
	"Sporeggar"						=> array ("parent" => "The Burning Crusade"),
	"Ashtongue Deathsworn"			=> array ("parent" => "The Burning Crusade"),
	"Ogri'la"						=> array ("parent" => "The Burning Crusade"),
	"The Scale of the Sands"		=> array ("parent" => "The Burning Crusade"),
	"Shattrath City"				=> array ("parent" => "The Burning Crusade"),
	"The Sha'tar"					=> array ("parent" => "The Burning Crusade","faction" => "Shattrath City"),
	"Shattered Sun Offensive"		=> array ("parent" => "The Burning Crusade","faction" => "Shattrath City"),
	"The Scryers"					=> array ("parent" => "The Burning Crusade","faction" => "Shattrath City"),
	"Lower City"					=> array ("parent" => "The Burning Crusade","faction" => "Shattrath City"),
	"The Aldor"						=> array ("parent" => "The Burning Crusade","faction" => "Shattrath City"),
	"Sha'tari Skyguard"				=> array ("parent" => "The Burning Crusade","faction" => "Shattrath City"),
	"Kurenai"						=> array ("parent" => "The Burning Crusade"),
	"Netherwing"					=> array ("parent" => "The Burning Crusade"),
	"The Consortium"				=> array ("parent" => "The Burning Crusade"),
	"Keepers of Time"				=> array ("parent" => "The Burning Crusade"),
	"Honor Hold"					=> array ("parent" => "The Burning Crusade"),
	"Cenarion Expedition"			=> array ("parent" => "The Burning Crusade"),
	"Thorium Brotherhood"			=> array ("parent" => "Classic"),
	"Bloodsail Buccaneers"			=> array ("parent" => "Classic"),
	"Cenarion Circle"				=> array ("parent" => "Classic"),
	"Darkmoon Faire"				=> array ("parent" => "Classic"),
	"Gelkis Clan Centaur"			=> array ("parent" => "Classic"),
	"Magram Clan Centaur"			=> array ("parent" => "Classic"),
	"Alliance Forces"				=> array ("parent" => "Classic"),
	"Stormpike Guard"				=> array ("parent" => "Classic","faction" => "Alliance Forces"),
	"Silverwing Sentinels"			=> array ("parent" => "Classic","faction" => "Alliance Forces"),
	"The League of Arathor"			=> array ("parent" => "Classic","faction" => "Alliance Forces"),
	"Bizmo\'s Brawlpub"				=> array ("parent" => "Classic","faction" => "Alliance Forces"),
	"Timbermaw Hold"				=> array ("parent" => "Classic"),
	"Zandalar Tribe"				=> array ("parent" => "Classic"),
	//"Alliance"					=> array ("parent" => "Classic"),
	"Exodar"						=> array ("parent" => "Classic","faction" => "Alliance"),
	"Gilneas"						=> array ("parent" => "Classic","faction" => "Alliance"),
	"Gnomeregan"					=> array ("parent" => "Classic","faction" => "Alliance"),
	"Stormwind"						=> array ("parent" => "Classic","faction" => "Alliance"),
	"Ironforge"						=> array ("parent" => "Classic","faction" => "Alliance"),
	"Darnassus"						=> array ("parent" => "Classic","faction" => "Alliance"),
	"Tushui Pandaren"				=> array ("parent" => "Classic","faction" => "Alliance"),
	"Shen'dralar"					=> array ("parent" => "Classic"),
	"Brood of Nozdormu"				=> array ("parent" => "Classic"),
	"Ravenholdt"					=> array ("parent" => "Classic"),
	"Steamwheedle Cartel"			=> array ("parent" => "Classic"),
	"Everlook"						=> array ("parent" => "Classic","faction" => "Steamwheedle Cartel"),
	"Gadgetzan"						=> array ("parent" => "Classic","faction" => "Steamwheedle Cartel"),
	"Ratchet"						=> array ("parent" => "Classic","faction" => "Steamwheedle Cartel"),
	"Booty Bay"						=> array ("parent" => "Classic","faction" => "Steamwheedle Cartel"),
	"Hydraxian Waterlords"			=> array ("parent" => "Classic"),
	"Argent Dawn"					=> array ("parent" => "Classic"),
	"Wintersaber Trainers"			=> array ("parent" => "Other"),
	"Syndicate"						=> array ("parent" => "Other"),
	"Nomi"							=> array ("parent" => "Other"),
	"The August Celestials" 		=> array ("parent" => "Mists of Pandaria"),
	"Order of the Cloud Serpent" 	=> array ("parent" => "Mists of Pandaria"),
	"The Klaxxi" 					=> array ("parent" => "Mists of Pandaria"),
	"Golden Lotus" 					=> array ("parent" => "Mists of Pandaria"),
	"The Lorewalkers" 				=> array ("parent" => "Mists of Pandaria"),
	"Shado-Pan" 					=> array ("parent" => "Mists of Pandaria"),
	"The Black Prince" 				=> array ("parent" => "Mists of Pandaria"),
	"Shang Xi\'s Academy"			=> array ("parent" => "Mists of Pandaria"),
	"The Anglers" 					=> array ("parent" => "Mists of Pandaria","faction" => "The Anglers"),
	"Nat Pagle" 					=> array ("parent" => "Mists of Pandaria","faction" => "The Anglers"),
	"The Tillers" 					=> array ("parent" => "Mists of Pandaria","faction" => "The Tillers"),
	"Fish Fellreed" 				=> array ("parent" => "Mists of Pandaria","faction" => "The Tillers"),
	"Chee Chee" 					=> array ("parent" => "Mists of Pandaria","faction" => "The Tillers"),
	"Haohan Mudclaw" 				=> array ("parent" => "Mists of Pandaria","faction" => "The Tillers"),
	"Old Hillpaw" 					=> array ("parent" => "Mists of Pandaria","faction" => "The Tillers"),
	"Farmer Fung"					=> array ("parent" => "Mists of Pandaria","faction" => "The Tillers"),
	"Gina Mudclaw" 					=> array ("parent" => "Mists of Pandaria","faction" => "The Tillers"),
	"Sho" 							=> array ("parent" => "Mists of Pandaria","faction" => "The Tillers"),
	"Tina Mudclaw"					=> array ("parent" => "Mists of Pandaria","faction" => "The Tillers"),
	"Jogu the Drunk" 				=> array ("parent" => "Mists of Pandaria","faction" => "The Tillers"),
	"Ella" 							=> array ("parent" => "Mists of Pandaria","faction" => "The Tillers"),
	"".$this->guild_name."" 		=> array ("parent" => "Guild"),);
	//echo '<pre>';print_r($xrep);//echo'</pre>';
	
			$this->data["Reputation"]["Count"] = 0;
			$is = 0;

			foreach ($rep as $var => $info)
  				{
						$ft = 'Reputation';
						if ($info['name'] == $roster->locale->act['guild'])
						{
							$ft2 = $this->apidata['guild']['name'];
						}
						else
						{
							$ft2 = $info['name'];
						}
						if (isset($info['name']))
						{
							if (isset($xrep[$ft2]['faction']))
							{
								$this->data["Reputation"][$xrep[$ft2]['parent']][''.$xrep[$ft2]['faction'].''][''.$ft2.''] = array();
								$this->data["Reputation"][$xrep[$ft2]['parent']][''.$xrep[$ft2]['faction'].''][''.$ft2.'']["Value"] = $info['value'] . ":" . $info['max'];
								$this->data["Reputation"][$xrep[$ft2]['parent']][''.$xrep[$ft2]['faction'].''][''.$ft2.'']["Standing"] = $this->_getRepStanding($info['standing']);
								$this->data["Reputation"][$xrep[$ft2]['parent']][''.$xrep[$ft2]['faction'].''][''.$ft2.'']["AtWar"] = $this->_getRepAtWar($info['value']);
							}
							else
							{
								$this->data["Reputation"][$xrep[$ft2]['parent']][''.$ft2.''] = array();
								$this->data["Reputation"][$xrep[$ft2]['parent']][''.$ft2.'']["Value"] = $info['value'] . ":" . $info['max'];
								$this->data["Reputation"][$xrep[$ft2]['parent']][''.$ft2.'']["Standing"] = $this->_getRepStanding($info['standing']);
								$this->data["Reputation"][$xrep[$ft2]['parent']][''.$ft2.'']["AtWar"] = $this->_getRepAtWar($info['value']);
							}
						}

						$this->data["Reputation"]["Count"]++;
  				}
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
				
		$content = array();
		$content = $this->apidata['talents'];
		$branch=null;
		$talentBuildData=array();
		$main=false;
		$defaulttalents = $this->build_talent_data($this->data["ClassId"]);
		$_talents = array();
		$talent = array();

		foreach ($content as $key => $spec)
		{
			$_talents=null;
			$_talents = $defaulttalents;
			foreach($spec['talents'] as $s => $spell)
			{
				$_talents['Talents'][$spell['spell']['name']]['Selected'] = true;
				$this->status['talentInfo']+= 1;
			}

			foreach ($spec['glyphs'] as $a => $gl)
			{
				foreach($gl as $xx => $glyph)
				{
				//echo '<pre>'; print_r($glyph); echo $glyph['name'].'</pre>';
				$item_api = $tx = $tt = null;
					$item_api = $roster->api->Data->getItemInfo($glyph['item']);
					$tx =  $roster->api->Item->item($item_api);
					$tt = $this->processtooltips($tx);
				
					$_talents["Glyphs"][] = array(
						'Type'		=> $this->glyphtype($a),
						'Tooltip'	=> $tt,
						'Icon'		=> $glyph['icon'],
						'Name'		=> $glyph['name'],
					);


				}
				
			}
			//echo '<pre>'; print_r($_talents["Glyphs"]); echo '</pre>';
			
			$_talents["Background"] = $spec['spec']['backgroundImage'];//"bg-hunter-marksman",
			$_talents["Icon"] 		= $spec['spec']['icon'];//"Ability_Hunter_FocusedAim",
			$_talents["Desc"] 		= $spec['spec']['description'];//"A master archer or sharpshooter who excels in bringing down enemies from afar.",
			$_talents["Name"] 		= $spec['spec']['name'];//Beast Mastery
			$_talents["Role"] 		= $spec['spec']['role'];//DPS
			$_talents["Active"]		= (isset($spec['selected']) ? true : false);
			$talent[] = $_talents;
		}

		$this->data["Talents"] = $talent;
		
		return true;
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
				$t["Talents"][$row['name']]['Name'] = $row['name'];
				$t["Talents"][$row['name']]['id'] = $row['talent_id'];
				//$t[$row['name']]['Tooltip'] = $row['tooltip'];
				$t["Talents"][$row['name']]['Texture'] = $row['texture'];
				$t["Talents"][$row['name']]['Selected'] = false;
				$t["Talents"][$row['name']]['Location'] = $row['row'].':'.$row['column'];
			}
		}

		return $t;
	}
	// Helper functions
function glyphtype($name)
	{
		switch( strtolower( $name ) )
		{
			case 'prime':
				$quality_id = '3';
				$quality = 'uncommon';
				break;
			case 'major':
				$quality_id = '2';
				$quality = 'common';
				break;
			case 'minor':
				$quality_id = '1';
				$quality = 'poor';
				break;
			default:
				$quality_id = '0';
				$quality = 'none';
				break;
		}
		return $quality_id;
	}
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
				//echo 'Key - '.$key.'<br>';
				if ( $this->hasProp($key) ) {
					$subobject = $subobject->$key;
					//echo 'Sub - '.$subobject.'<br>';
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
		if ($value == '7') { $ret = $roster->locale->act['exalted']; }
		if ($value == '6') { $ret = $roster->locale->act['revered']; }
		if ($value == '5') { $ret = $roster->locale->act['honored']; }
		if ($value == '4') { $ret = $roster->locale->act['friendly']; }
		if ($value == '3') { $ret = $roster->locale->act['neutral']; }
		if ($value == '2') { $ret = $roster->locale->act['unfriendly']; }
		if ($value == '1') { $ret = $roster->locale->act['hostile']; }
		if ($value == '0') { $ret = $roster->locale->act['hated']; }

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
		$ret = date('Y/m/d H:i:s', ($string/1000));
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
		if ( $addon['config']['ApiSync_rank_set_order'] >= 1 ) {
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

		if ( $addon['config']['ApiSync_rank_set_order'] == 3 ) 
			{
			for ( $i = 0; $i <= 9; $i++ ) 
  				{
				$array[$i]['Title'] = isset($ranks[$i]) && $ranks[$i] != '' ?
				$ranks[$i] :
				( $addon['config']['ApiSync_rank_'. $i] != '' ?
				$addon['config']['ApiSync_rank_'. $i] :
				( $i == 0 ?
				$roster->locale->act['guildleader'] :
				$roster->locale->act['rank']. $i ) );
			}
		}
		elseif ( $addon['config']['ApiSync_rank_set_order'] == 2 ) 
			{
			for ( $i = 0; $i <= 9; $i++ ) 
  				{
				$array[$i]['Title'] = $addon['config']['ApiSync_rank_'. $i] != '' ?
				$addon['config']['ApiSync_rank_'. $i] :
				( isset($ranks[$i]) && $ranks[$i] != '' ?
				$ranks[$i] :
				( $i == 0 ?
				$roster->locale->act['guildleader'] :
				$roster->locale->act['rank']. $i ) );
			}
		}
		elseif ( $addon['config']['ApiSync_rank_set_order'] == 1 ) 
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
		elseif ( $addon['config']['ApiSync_rank_set_order'] == 0 ) 
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

	function arraydisplay($array)
	{
		 //////echo '<pre>';
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
	// get gem color
	function gemcolor( $gem_data)
	{
		global $roster;

		$gemtt = explode( '<br>', $gem_data );

		if( $gemtt[0] !== '' )
		{
			foreach( $gemtt as $line )
			{
				$colors = array();
				$line = preg_replace('/\|c[a-f0-9]{8}(.+?)\|r/i','$1',$line); // CP error? strip out color
				// -- start the parsing
				if( preg_match('/'.$roster->locale->act['tooltip_boss'] . '|' . $roster->locale->act['tooltip_source'] . '|' . $roster->locale->act['tooltip_droprate'].'/', $line) )
				{
					continue;
				}
				elseif( preg_match('/%|\+|'.$roster->locale->act['tooltip_chance'].'/', $line) )  // if the line has a + or % or the word Chance assume it's bonus line.
				{
					$gem_bonus = $line;
				}
				elseif( preg_match($roster->locale->act['gem_preg_meta'], $line) )
				{
					$gem_color = 'meta';
				}
				elseif( preg_match($roster->locale->act['gem_preg_multicolor'], $line, $colors) )
				{
					if( $colors[1] == $roster->locale->act['gem_colors']['red'] && $colors[2] == $roster->locale->act['gem_colors']['blue'] || $colors[1] == $roster->locale->act['gem_colors']['blue'] && $colors[2] == $roster->locale->act['gem_colors']['red'] )
					{
						$gem_color = 'purple';
					}
					elseif( $colors[1] == $roster->locale->act['gem_colors']['yellow'] && $colors[2] == $roster->locale->act['gem_colors']['red'] || $colors[1] == $roster->locale->act['gem_colors']['red'] && $colors[2] == $roster->locale->act['gem_colors']['yellow'] )
					{
						$gem_color = 'orange';
					}
					elseif( $colors[1] == $roster->locale->act['gem_colors']['yellow'] && $colors[2] == $roster->locale->act['gem_colors']['blue'] || $colors[1] == $roster->locale->act['gem_colors']['blue'] && $colors[2] == $roster->locale->act['gem_colors']['yellow'] )
					{
						$gem_color = 'green';
					}
				}
				elseif( preg_match($roster->locale->act['gem_preg_singlecolor'], $line, $colors) )
				{
					$tmp = array_flip($roster->locale->act['gem_colors']);
					$gem_color = $tmp[$colors[1]];
				}
				elseif( preg_match($roster->locale->act['gem_preg_prismatic'], $line) )
				{
					$gem_color = 'prismatic';
				}
			}

			return $gem_color;
		}
		else
		{
			return '';
		}
	}
	

}
