<?php
/**
 * WoWRoster.net WoWRoster
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    SMFSync
*/
//$A = preg_replace("/%name%/",$Name,$String);
//$this->data['config']['forum_prefix']

if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

/**
 * Addon Update class
 * This MUST be the same name as the addon basename
 */
class smfsyncUpdate
{
	var $messages = '';	// Update messages
	var $data = array();	// Addon config data automatically pulled from the addon_config table
	var $files = array();


	/**
	 * Class instantiation
	 * The name of this function MUST be the same name as the class name
	 *
	 * @param array $data	| Addon data
	 * @return recipe
	 */
	function smfsyncUpdate($data)
	{
		$this->data = $data;
	}

	/**
	 * Resets addon messages
	 */
	function reset_messages()
	{
		$this->messages = '';
	}


	function update()
	{
		global $roster;

		//$this->messages .= "<span class=\"green\">This is a non CP hook</span><br />\n";

		return true;
	}

	function guild_pre( $data )
	{
		global $roster;

		//$this->messages .= "<span class=\"green\">This is a guild_pre hook</span><br />\n";

		return true;
	}

	function guild( $data , $memberid )
	{
		global $roster;

		//Verifiy that SMFSync is enabled before attempting to procede.
		if ($this->data['config']['main_enable'] == true){

			//Manage user groups here.
			if ($this->data['config']['guild_groups'] == true){
				//This "should" be safe here, from looking in roster/lib/update.lib.php
				//it looks like this function is run AFTER the guild is updated.
				$query = "SELECT * FROM `{$this->data['config']['forum_prefix']}members` WHERE `memberName` = '{$data['Name']}' ";
				$result = $roster->db->query ( $query );
				$row = $roster->db->fetch ( $result );

				if ($roster->db->affected_rows() == 0){ //Player is not in forum
					$this->messages .= "<li><span class=\"red\">{$roster->locale->act['PlayerNotInForum']} {$roster->locale->act['MemberGroupNotUpdated']}</span><br />\n";

				}else{ //Player is in forum, check forum group to guild title.
					//Dont forget to check if forum group is 1(admin) and set it to additional groups when changing
					$query = "SELECT * FROM `{$this->data['config']['forum_prefix']}members` m, `{$this->data['config']['forum_prefix']}membergroups` g WHERE m.memberName = '{$data['Name']}' AND m.ID_GROUP = g.ID_GROUP ";
					$result = $roster->db->query ( $query );
					$row = $roster->db->fetch ( $result );

					$query2 = "SELECT * FROM `{$roster->db->prefix}members` WHERE `name` = '{$data['Name']}'";
					$result2 = $roster->db->query ( $query2 );
					$row2 = $roster->db->fetch ( $result2 );

					if ($row['groupName'] != $row2['guild_title']){
						//No match. Update the forum
						$query3 = "SELECT * FROM `{$this->data['config']['forum_prefix']}membergroups` WHERE `groupName` = '{$row2['guild_title']}' ";
						$result3 = $roster->db->query ( $query3 );
						$row3 = $roster->db->fetch ( $result3 );

						if ($roster->db->affected_rows() == 0){//The players rank does not exist as a group.
							$this->messages .= "<li><span class=\"red\">{$roster->locale->act['NoSuchGroup']}</span><br />\n";
						}else{
							$query4 = "UPDATE `{$this->data['config']['forum_prefix']}members` SET `ID_GROUP` = '{$row3['ID_GROUP']}' WHERE `memberName` = '{$row2['name']}' LIMIT 1";
							$result4 = $roster->db->query ( $query4 );

							if ($row['ID_GROUP'] == 1){ //Check if user was an admin and set it in additional groups
								$query5 = "UPDATE `{$this->data['config']['forum_prefix']}members` SET `additionalGroups` = '1' WHERE `memberName` = '{$row2['name']}' LIMIT 1";
								$result5 = $roster->db->query ( $query5 );
							}
							$this->messages .= "<li><span class=\"yellow\">{$roster->locale->act['MemberGroupUpdated']} {$row2['guild_title']}</span><br />\n";
						}

					}else{
						$this->messages .= "<li><span class=\"green\">{$roster->locale->act['MemberGroupCurrent']}</span><br />\n";
					}
				}
			}

			//Update Forum signature. Check to make sure it's enabled and that the default setting isn't blank.
 			if ( ($this->data['config']['player_enable_signature'] == true ) && ($this->data['config']['player_signature'] != "") ){
 				$query = "SELECT `signature` FROM `{$this->data['config']['forum_prefix']}members` WHERE `memberName` = '{$data['Name']}' LIMIT 1";
 				$result = $roster->db->query( $query );
 				$row = $roster->db->fetch ( $result );

 				//Make sure player is a member of the forum before trying to write to the database.
 				if ($roster->db->affected_rows() == 0){
 					$this->messages .= "<li><span class=\"red\">{$roster->locale->act['PlayerNotInForum']} {$roster->locale->act['SigNotUpdated']}</span><br />\n";
 				}else{
	 				$SetSigAs = preg_replace("/%name%/",$data['Name'],$this->data['config']['player_signature']);
	 				if ($row['signature'] != $SetSigAs){
	 					//Update Signature
	 					$query = "UPDATE `{$this->data['config']['forum_prefix']}members` SET `signature` = '$SetSigAs' WHERE `memberName` = '{$data['Name']}' LIMIT 1";
	 					$result = $roster->db->query ( $query );
	 					if ($roster->db->affected_rows() == 1){
	 						$this->messages .= "<li><span class=\"green\">{$roster->locale->act['SigUpdated']}</span><br />\n";
	 					}else{
	 						$this->messages .= "<li><span class=\"red\">{$roster->locale->act['SigNotUpdated']}</span><br />\n";
	 					}

	 				}else{
	 					//Signature is already set.
	 					$this->messages .= "<li><span class=\"green\">{$roster->locale->act['SigCurrent']}</span><br />\n";
	 				}
 				}
 			}

 			//Update Forum avatar. Check to make sure it's enabled and that the default setting isn't blank.
 			if ( ($this->data['config']['player_enable_avatar'] == true ) && ($this->data['config']['player_avatar'] != "")){
 				$query = "SELECT `avatar` FROM `{$this->data['config']['forum_prefix']}members` WHERE `memberName` = '{$data['Name']}' LIMIT 1";
 				$result = $roster->db->query( $query );
 				$row = $roster->db->fetch ( $result );

 				//Make sure player is a member of the forum before trying to write to the database.
 				if ($roster->db->affected_rows() == 0){
 					$this->messages .= "<li><span class=\"red\">{$roster->locale->act['PlayerNotInForum']} {$roster->locale->act['AvNotUpdated']}</span><br />\n";
 				}else{
	 				$SetAvAs = preg_replace("/%name%/",$data['Name'],$this->data['config']['player_avatar']);
	 				if ($row['avatar'] != $SetAvAs){
	 					//Update Signature
	 					$query = "UPDATE `{$this->data['config']['forum_prefix']}members` SET `avatar` = '$SetAvAs' WHERE `memberName` = '{$data['Name']}' LIMIT 1";
	 					$result = $roster->db->query ( $query );
	 					if ($roster->db->affected_rows() == 1){
	 						$this->messages .= "<li><span class=\"green\">{$roster->locale->act['AvUpdated']}</span><br />\n";
	 					}else{
	 						$this->messages .= "<li><span class=\"red\">{$roster->locale->act['AvNotUpdated']}</span><br />\n";
	 					}

	 				}else{
	 					//Signature is already set.
	 					$this->messages .= "<li><span class=\"green\">{$roster->locale->act['AvCurrent']}</span><br />\n";
	 				}
 				}

 			}

			//Change SMF's personal text to the players guild note.
			if ($this->data['config']['guild_enable_personaltext'] == true){
				if (isset($data['Note']) == true){
					$query = "UPDATE `{$this->data['config']['forum_prefix']}members` SET `personalText` = '{$roster->db->escape($data['Note'])}' WHERE `memberName` = '{$data['Name']}' LIMIT 1 ;";
					$result = $roster->db->query ( $query );
					if ($roster->db->affected_rows() == 1){
						$this->messages .= "<li><span class=\"green\">{$roster->locale->act['PersonalTextUpdated']} {$data['Note']}.</span><br />\n";
					}else{
						$this->messages .= "<li><span class=\"yellow\">{$roster->locale->act['PersonalTextNotUpdated']}</span><br />\n";
					}
				}else{
					$this->messages .= "<li><span class=\"red\">{$roster->locale->act['PersonalTextNone']}</span><br />\n";
				}



			}
		}
		//$this->messages .= "<span class=\"yellow\">This is a guild hook</span><br />\n";

		return true;
	}

	function guild_post( $data )
	{
		global $roster;
		global $addon;

 		if ($this->data['config']['main_enable'] == true){
 			//Manage groups
 			if ($this->data['config']['guild_groups'] == true){
 				//Create groups if enabled
 				if ( ($this->data['config']['guild_groups_create'] == true) && ($this->data['config']['guild_groups'] == true) ){
 					$query = "SELECT * FROM {$roster->db->prefix}members WHERE `guild_id` = '{$this->data['config']['choose_guild']}' ORDER BY `guild_rank` ASC";
 					$result = $roster->db->query ( $query );
 					$PrevGroup = "";
 					while ($row = $roster->db->fetch ($result) ){
						if ($PrevGroup != $row['guild_title']){ //Here to prevent unneccesary db inquiries
	 						$query2 = "SELECT * FROM `{$this->data['config']['forum_prefix']}membergroups` WHERE `groupName` = '{$row['guild_title']}' ";
	 						$result2 = $roster->db->query ( $query2 );
	 						if ($roster->db->affected_rows() == 0){//Group didnt exist, lets create it.
	 							$query3 = "INSERT INTO `{$this->data['config']['forum_prefix']}membergroups` ( `ID_GROUP` , `groupName` , `onlineColor` , `minPosts` , `maxMessages` , `stars` ) VALUES (NULL, '{$row['guild_title']}', '', '-1', '0', '{$roster->locale->act['Stars']}' )";
	 							$result3 = $roster->db->query ( $query3 );
	 							if ($roster->db->affected_rows() != 1){
	 								$this->messages .= "<span class=\"red\">{$roster->locale->act['ErrorCreatingGroup']} {$row['guild_title']}</span><br />\n";
	 							}else{
	 								$this->messages .= "<span class=\"green\">{$roster->locale->act['SuccessCreatingGroup']} {$row['guild_title']}</span><br />\n";
	 							}
	 						}else{
	 							$this->messages .= "<span class=\"green\">{$roster->locale->act['GroupExists']} {$row['guild_title']}</span><br />\n";
	 						}

	 						$PrevGroup = $row['guild_title'];
						}
 					}

 					//Lets create a group for those who are suspended
 					$query = "SELECT * FROM `{$this->data['config']['forum_prefix']}membergroups` WHERE `groupName` = '{$roster->locale->act['Suspended']}' ";
 					$result = $roster->db->query ( $query );
 					$row = $roster->db->fetch ( $result );
 					if (!$row['ID_GROUP']){//It hasnt been created already, so we're going to create it now.
 						$query = "INSERT INTO `{$this->data['config']['forum_prefix']}membergroups` ( `ID_GROUP` , `groupName` , `onlineColor` , `minPosts` , `maxMessages` , `stars` ) VALUES (NULL, '{$roster->locale->act['Suspended']}', '', '-1', '0', '' )";
 						$result = $roster->db->query ( $query );
 						$this->messages .= "<span class=\"green\">{$roster->locale->act['SuccessCreatingGroup']} {$roster->locale->act['Suspended']}</span><br />\n";
 					}else{
 						$this->messages .= "<span class=\"green\">{$roster->locale->act['GroupExists']} {$roster->locale->act['Suspended']}</span><br />\n";
 					}

	 				//Make sure to shut off create groups when done.
	 				$query = "UPDATE {$roster->db->prefix}addon_config SET `config_value` = '0' WHERE `addon_id` = '{$this->data['addon_id']}' AND `config_name` = 'guild_groups_create' ";
	 				$result = $roster->db->query ( $query );
 				}
 			}
 			//Suspend members after leaving the guild.
			if ($this->data['config']['guild_suspend'] == true){
				//Get the suspended group ID
				$query = "SELECT * FROM `{$this->data['config']['forum_prefix']}membergroups` WHERE `groupName` = '{$roster->locale->act['Suspended']}' ";
				$row = $roster->db->fetch ( $roster->db->query ( $query ) );
				$GroupID = $row['ID_GROUP'];

				$query = "SELECT * FROM `{$roster->db->prefix}members` m, `{$this->data['config']['forum_prefix']}members` f WHERE m.active = 0 AND f.is_activated = 1 AND m.name = f.memberName";
				$result = $roster->db->query ( $query );
				while ($row = $roster->db->fetch ( $result ) ){
					$query = "UPDATE `{$this->data['config']['forum_prefix']}members` SET `is_activated` = '0', `passwd` = '', `passwordSalt` = '', `emailAddress` = 'SUSPENDED_{$row['emailAddress']}_SUSPENDED', `personalText` = '', `signature` = '{$roster->locale->act['NoLongerAMember']}', `avatar` = '', `ID_GROUP` = '$GroupID' WHERE `memberName` = '{$row['name']}' LIMIT 1";
					$roster->db->query( $query );
					//                                             No space here \/ because locale file has 's in it.
					$this->messages .= "<span class=\"green\">{$row['memberName']}{$roster->locale->act['MemberSuspended']} </span><br />\n";

				}
			}

 		}

		//$this->messages .= "<span class=\"red\">This is a guild_post hook</span><br />\n";

		return true;
	}

	function char_pre( $data )
	{
		global $roster;

		//$this->messages .= "<span class=\"green\">This is a char_pre hook</span><br />\n";

		return true;

	}

	function char( $data , $memberid )
	{
		global $roster;
		//The functions here will attempt to update all members of the forum, regardless of what guild they are in.
		//Verifiy that SMFSync is enabled before attempting to procede.
 		if ($this->data['config']['main_enable'] == true){

 			//Update Hearth or Zone to forum Location (if enabled)
 			if ($this->data['config']['player_update_location'] == true){
 				//Read the current location setting.
 				$query = "SELECT `location` FROM `{$this->data['config']['forum_prefix']}members` WHERE `memberName` = '{$data['Name']}' ";
 				$result = $roster->db->query( $query );

 				$row = $roster->db->fetch ( $result );

 				//Check to make sure the player is a member of the forum before going any further.
 				if ($roster->db->affected_rows() == 1){
	 				if ($this->data['config']['player_location'] == 'Hearth'){
	 					//Location setting is Hearth
		 				//Check if current Location is the same as current Hearth
		 				if(!$data['Hearth']){
		 					$this->messages .= "<span class=\"yellow\">{$roster->locale->act['LocationNotSpecified']}</span><br />\n";
		 				}elseif ($row['location'] == $data['Hearth']){
		 					$this->messages .= "<span class=\"green\">{$roster->locale->act['LocationIsCurrent']}</span><br />\n";
		 				}else{
		 					$query = "UPDATE `{$this->data['config']['forum_prefix']}members` SET `location` = '{$data['Hearth']}' WHERE `memberName` = '{$data['Name']}' LIMIT 1 ";
		 					$result = $roster->db->query ( $query );
		 					$ResultRows = $roster->db->affected_rows();
		 					if ($ResultRows == 1){
		 						$this->messages .= "<span class=\"green\">{$roster->locale->act['LocationUpdatedFrom']} {$row['location']} {$roster->locale->act['to']} {$data['Hearth']} </span><br />\n";
		 					}else{
		 						$this->messages .= "<span class=\"red\">{$roster->locale->act['LocationNotUpdated']}</span><br />\n";
		 					}

		 				}
	 				}elseif($this->data['config']['player_location'] == 'Zone'){
	 					//Location setting is Zone
		 				//Check if current Location is the same as current Hearth
		 				if(!$data['Zone']){
		 					$this->messages .= "<span class=\"yellow\">{$roster->locale->act['LocationNotSpecified']}</span><br />\n";
		 				}elseif ($row['location'] == $data['Zone']){
		 					$this->messages .= "<span class=\"green\">{$roster->locale->act['LocationIsCurrent']}</span><br />\n";
		 				}else{
		 					$query = "UPDATE `{$this->data['config']['forum_prefix']}members` SET `location` = '{$data['Zone']}' WHERE `memberName` = '{$data['Name']}' LIMIT 1 ";
		 					$result = $roster->db->query ( $query );
		 					$ResultRows = $roster->db->affected_rows();
		 					if ($ResultRows == 1){
		 						$this->messages .= "<span class=\"green\">{$roster->locale->act['LocationUpdatedFrom']} {$row['location']} {$roster->locale->act['to']} {$data['Zone']}</span><br />\n";
		 					}else{
		 						$this->messages .= "<span class=\"red\">{$roster->locale->act['LocationNotUpdated']}</span><br />\n";
		 					}

		 				}
 					}
 				}else{
 					$this->messages .= "<span class=\"red\">{$roster->locale->act['PlayerNotInForum']}</span><br />\n";
 				}

 			}//End of Player Update Location
 		}
		//$this->messages .= "<span class=\"yellow\">This is a char hook</span><br />\n";

		return true;
	}

	function char_post( $data )
	{
		global $roster;

		//$this->messages .= "<span class=\"red\">This is a char_post hook</span><br />\n";

		return true;
	}
}