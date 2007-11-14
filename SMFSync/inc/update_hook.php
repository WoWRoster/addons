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
		$this->files[] = 'groupcalendar';
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


		$CALENDAR_TABLE = "group_calendar_info";
		$ATTENDANCE_TABLE = "group_calendar_attend";
		$OTHERINFO_TABLE = "group_calendar_other";

		//Verifiy that SMFSync is enabled before attempting to procede.
		if ($this->data['config']['main_enable'] == true){
			//Check to see if GroupCalendar sync is enabled and current user is authorized.
			$roster_login = new RosterLogin();

			if ( ($this->data['config']['groupcal_enable'] == true) &&
				 ($roster_login->getAuthorized() >= $this->data['config']['groupcal_update_permission']) ) {

				///////////////////////////////////////////////////////////////////
				//  Original credit for this goes to Munazz of Mediocrity in Motion
				///////////////////////////////////////////////////////////////////
				$filefield = "GroupCalendar";
				if(isset($_FILES[$filefield])){
					//If the file is gzipped, uncompress the file first
					$filename = $_FILES[$filefield]['tmp_name'];
					if (substr_count($_FILES[$filefield]['name'],'.gz') > 0)	// If the file is gzipped
						$file_as_array = gzfile($filename);
					else		// The file is not gzipped
						$file_as_array = file($filename);
					unlink($filename);

					//Parse the LUA file into an array
					//$luahandler = new lua();

					//$lua_data = $luahandler->luatophp($file_as_array);
					//I attempted to use the built in lua parser, but it just didnt work for some reason
					//and to keep me from getting a headache I just gave up and use the original authors work.
					$lua_data = $this->ParseLuaArray($file_as_array);

					unset($file_as_array);

					$calendar_data = $this->GroupCalendarParse($lua_data,'');

					unset($lua_data);

					$replace_chars = array("&a;","&c;","&s;","&cn;","&n;");
					$substu_chars = array("&",",","/",":","\n");

					if (count($calendar_data) > 0 )
					{
						if ($debuging_flag) { debug_output("** Count of data array is: ". count($calendar_data) .".  Tables dumped for anticipated data entry.\n"); }
						//empty table to get rid of all information before reposting new events.  This eliminate events that were removed in game.
						$query = "TRUNCATE ". $CALENDAR_TABLE;
						$result = $roster->db->query ( $query );
						if (!$result) die("Failed to clear out the old data. SQL: $query.<b>".mysql_error()."</b>\n");
						$query = "TRUNCATE ". $ATTENDANCE_TABLE;
						$result = $roster->db->query ( $query );
						if (!$result) die("Failed to clear out the old data. SQL: $query.<b>".mysql_error()."</b>\n");
						$query = "UPDATE ". $OTHERINFO_TABLE ." SET `value`='". gmmktime() ."' WHERE id='upload_time'";
						$result = $roster->db->query ( $query );
						if ($roster->db->affected_rows() == 0) {
							$query = "INSERT INTO ". $OTHERINFO_TABLE ." SET id='upload_time',`value`='". gmmktime() ."'";
							$result = $roster->db->query ( $query );
							if (!$result) die("Failed to create the upload_time field. SQL: $query.<b>".mysql_error()."</b>\n");
						}

						//Dump the SMF Calendar.
						$sql2 = "DELETE FROM `{$this->data['config']['forum_prefix']}calendar` WHERE `title` LIKE '(GC)%' ";
						$roster->db->query ( $sql2 );
					}
					else if ($debuging_flag) { debug_output("** Count of data array is: ". count($calendar_data) .".  Tables not emptied.\n"); }

					$good_adds = 0;
					$bad_adds = 0;

					$id_counter = 1;

					foreach (array_keys($calendar_data) as $eid) {
						if ($calendar_data[$eid]['MinLevel'] == "") $calendar_data[$eid]['MinLevel'] = "NULL";
						if ($calendar_data[$eid]['MaxLevel'] == "") $calendar_data[$eid]['MaxLevel'] = "NULL";
						if ($calendar_data[$eid]['MaxAttendance'] == "") $calendar_data[$eid]['MaxAttendance'] = "NULL";
						$sql = "INSERT INTO ". $CALENDAR_TABLE ." SET ";
						$sql.= "`id`='".$id_counter."', ";
						$sql.= "`creator`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['Creator'])) ."', ";
						$sql.= "`start`=FROM_UNIXTIME(". $calendar_data[$eid]['DateTime'] ."), ";
						$sql.= "`title`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['Title'])) ."', ";
						$sql.= "`type`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['Type'])) ."', ";
						$sql.= "`description`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['description'])) ."', ";
						$sql.= "`guildonly`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['GuildOnly'])) ."', ";
						$sql.= "`duration`=". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['Duration'])) .", ";
						$sql.= "`minlevel`=". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['MinLevel'])) .", ";
						$sql.= "`maxlevel`=". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['MaxLevel'])) .", ";
						$sql.= "`maxattend`=". mysql_escape_string(str_replace($replace_chars,$substu_chars,$calendar_data[$eid]['MaxAttendance'])). ", ";

						$NewEventTitle = '(GC)' . $calendar_data[$eid]['Title'] . ' - ' . date("g:ia", $calendar_data[$eid]['DateTime']);
						$EventDate = date("Y-m-d",$calendar_data[$eid]['DateTime']);

						$sql2 = "INSERT INTO `{$this->data['config']['forum_prefix']}calendar` SET `title` = '$NewEventTitle', `startDate` = '$EventDate', `endDate` = '$EventDate' ";
						$roster->db->query ( $sql2 );

						$limitstr = "";
						if (is_array($calendar_data[$eid]['Limits'])) {
							$tempLimits = array();
							foreach (array_keys($calendar_data[$eid]['Limits']) as $k) {
								$v = $calendar_data[$eid]['Limits'][$k]['mMax'];
								if ($v >0) $tempLimits[ClassInt($k)] = $v;
							}
							$tk = array_keys($tempLimits);
							sort($tk);
							foreach ($tk as $k) {
								$limitstr .= $k .": ". mysql_escape_string(str_replace($replace_chars,$substu_chars,$tempLimits[$k])) ."<br />";
							}
						}
						$sql.= "`limits`='" . $limitstr ."'";
						if ($debuging_flag) debug_output("$sql\n");
						$result = $roster->db->query ( $sql );
						if (!$result) {
							$bad_adds++;
							if ($debuging_flag) debug_output("***FAILED to add event. <b>".mysql_error()."</b>\n");
						}
						else {
							$good_adds++;
							if (is_array($calendar_data[$eid]['Attendance'])) {
								foreach (array_keys($calendar_data[$eid]['Attendance']) as $i) {
									$v = $calendar_data[$eid]['Attendance'][$i];
									if ($v['modDate']=="") $v['modDate']="1971-1-1";
									if ($v['modTime']=="") $v['modTime']="0";
									if ($v['GuildRank']=="") $v['GuildRank']="0";
									if ($v['createDate']=="") $v['createDate']=$v['modDate'];
									if ($v['createTime']=="") $v['createTime']=$v['modTime'];
									if ($v['Level']=="") $v['Level']="0";
									$sql = "INSERT INTO ". $ATTENDANCE_TABLE ." SET ";
									$sql.= "`eid`='". $id_counter ."', ";
									$sql.= "`name`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['Name'])) ."', ";
									$sql.= "`modDate`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['modDate'])) ."', ";
									$sql.= "`modTime`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['modTime'])) ."', ";
									$sql.= "`status`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['Status'])) ."', ";
									$sql.= "`level`=". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['Level'])) .", ";
									$sql.= "`racecode`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['RaceCode'])) ."', ";
									$sql.= "`classcode`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['ClassCode'])) ."', ";
									$sql.= "`comment`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['Comment'])) ."', ";
									$sql.= "`guild`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['Guild'])) ."', ";
									$sql.= "`guildRank`=". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['GuildRank'])) .", ";
									$sql.= "`createDate`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['createDate'])) ."', ";
									$sql.= "`createTime`='". mysql_escape_string(str_replace($replace_chars,$substu_chars,$v['createTime'])) ."'";
									if ($debuging_flag) debug_output("$sql\n");
									$result = $roster->db->query ( $sql );
									if (!$result) {
										$bad_adds++;
										if ($debuging_flag) debug_output("***FAILED to add attendance. <b>".mysql_error()."</b>\n");
									}
								}
							}
						}
						$id_counter++;
					}
					$this->messages .= "Updated $good_adds Records in the Calendar \n";

				}
			}
		}
		return true;
	}

	function guild_pre( $data )
	{
		global $roster;

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
				$query = "SELECT * FROM `{$this->data['config']['forum_prefix']}members` WHERE
							`realName` = '{$data['Name']}' ";
				$result = $roster->db->query ( $query );
				$row = $roster->db->fetch ( $result );

				if ($roster->db->affected_rows() == 0){ //Player is not in forum
					$this->messages .= "<li><span class=\"red\">{$roster->locale->act['PlayerNotInForum']}
										{$roster->locale->act['MemberGroupNotUpdated']}</span><br />\n";

				}else{ //Player is in forum, check forum group to guild title.
					//Dont forget to check if forum group is 1(admin) and set it to additional groups when changing
					$query = "SELECT * FROM `{$this->data['config']['forum_prefix']}members` m,
							 `{$this->data['config']['forum_prefix']}membergroups` g WHERE m.realName =
							 '{$data['Name']}' AND m.ID_GROUP = g.ID_GROUP ";
					$result = $roster->db->query ( $query );
					$row = $roster->db->fetch ( $result );

					$query2 = "SELECT * FROM `{$roster->db->prefix}members` WHERE `name` = '{$data['Name']}'";
					$result2 = $roster->db->query ( $query2 );
					$row2 = $roster->db->fetch ( $result2 );

					//If user is in a protected group, don't even look them up. We're not going to change anything anyways.
					if ($this->protectedGroup($data['Name']) == false){
						if ($row['groupName'] != $row2['guild_title']){
							//No match. Update the forum
							$query3 = "SELECT * FROM `{$this->data['config']['forum_prefix']}membergroups`
										WHERE `groupName` = '{$row2['guild_title']}' ";
							$result3 = $roster->db->query ( $query3 );
							$row3 = $roster->db->fetch ( $result3 );

							if ($roster->db->affected_rows() == 0){//The players rank does not exist as a group.
								$this->messages .= "<li><span class=\"red\">{$roster->locale->act['NoSuchGroup']}
													</span><br />\n";
							}else{
								$query4 = "UPDATE `{$this->data['config']['forum_prefix']}members` SET `ID_GROUP` =
											'{$row3['ID_GROUP']}' WHERE `realName` = '{$row2['name']}' LIMIT 1";
								$result4 = $roster->db->query ( $query4 );

								if ($row['ID_GROUP'] == 1){ //Check if user was an admin and set it in additional groups
									$query5 = "UPDATE `{$this->data['config']['forum_prefix']}members`
												SET `additionalGroups` = '1' WHERE `realName` =
												'{$row2['name']}' LIMIT 1";
									$result5 = $roster->db->query ( $query5 );
								}
								$this->messages .= "<li><span class=\"yellow\">{$roster->locale->act['MemberGroupUpdated']}
													{$row2['guild_title']}</span><br />\n";
							}

						}else{
							$this->messages .= "<li><span class=\"green\">{$roster->locale->act['MemberGroupCurrent']}
												</span><br />\n";
						}
					}else{
						$this->messages .= "<li><span class=\"red\">{$roster->locale->act['MemberGroupProtected']}
											</span><br />\n";
					}
				}
			}

			//Update Forum signature. Check to make sure it's enabled and that the default setting isn't blank.
 			if ( ($this->data['config']['player_enable_signature'] == true )
 					&& ($this->data['config']['player_signature'] != "")
 					&& ($this->protectedGroup($data['Name']) == false)
 					){
 				$query = "SELECT `signature` FROM `{$this->data['config']['forum_prefix']}members` WHERE
 							`realName` = '{$data['Name']}' LIMIT 1";
 				$result = $roster->db->query( $query );
 				$row = $roster->db->fetch ( $result );

 				//Make sure player is a member of the forum before trying to write to the database.
 				if ($roster->db->affected_rows() == 0){
 					$this->messages .= "<li><span class=\"red\">{$roster->locale->act['PlayerNotInForum']}
 										{$roster->locale->act['SigNotUpdated']}</span><br />\n";
 				}else{
	 				$SetSigAs = preg_replace("/%name%/",$data['Name'],$this->data['config']['player_signature']);
	 				if ($row['signature'] != $SetSigAs){
	 					//Update Signature
	 					$query = "UPDATE `{$this->data['config']['forum_prefix']}members` SET `signature` =
	 								'$SetSigAs' WHERE `realName` = '{$data['Name']}' LIMIT 1";
	 					$result = $roster->db->query ( $query );
	 					if ($roster->db->affected_rows() == 1){
	 						$this->messages .= "<li><span class=\"green\">{$roster->locale->act['SigUpdated']}
	 											</span><br />\n";
	 					}else{
	 						$this->messages .= "<li><span class=\"red\">{$roster->locale->act['SigNotUpdated']}
	 											</span><br />\n";
	 					}

	 				}else{
	 					//Signature is already set.
	 					$this->messages .= "<li><span class=\"green\">{$roster->locale->act['SigCurrent']}</span><br />\n";
	 				}
 				}
 			}

 			//Update Forum avatar. Check to make sure it's enabled and that the default setting isn't blank.
 			if ( ($this->data['config']['player_enable_avatar'] == true )
 					&& ($this->data['config']['player_avatar'] != "")
 					&& ($this->protectedGroup($data['Name']) == false)
 					){
 				$query = "SELECT `avatar` FROM `{$this->data['config']['forum_prefix']}members` WHERE
 							`realName` = '{$data['Name']}' LIMIT 1";
 				$result = $roster->db->query( $query );
 				$row = $roster->db->fetch ( $result );

 				//Make sure player is a member of the forum before trying to write to the database.
 				if ($roster->db->affected_rows() == 0){
 					$this->messages .= "<li><span class=\"red\">{$roster->locale->act['PlayerNotInForum']}
 										{$roster->locale->act['AvNotUpdated']}</span><br />\n";
 				}else{
	 				$SetAvAs = preg_replace("/%name%/",$data['Name'],$this->data['config']['player_avatar']);
	 				if ($row['avatar'] != $SetAvAs){
	 					//Update Signature
	 					$query = "UPDATE `{$this->data['config']['forum_prefix']}members` SET `avatar` = '$SetAvAs'
	 								WHERE `realName` = '{$data['Name']}' LIMIT 1";
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
			if ( ($this->data['config']['guild_enable_personaltext'] == true )
				&& ($this->protectedGroup($data['Name']) == false)
				){
				if (isset($data['Note']) == true){
					$Note = $roster->db->escape($data['Note']);
					$query = "UPDATE `{$this->data['config']['forum_prefix']}members` SET `personalText` =
								'{$Note}' WHERE `realName` = '{$data['Name']}' LIMIT 1 ;";
					$result = $roster->db->query ( $query );
					if ($roster->db->affected_rows() == 1){
						$this->messages .= "<li><span class=\"green\">{$roster->locale->act['PersonalTextUpdated']}
											{$data['Note']}.</span><br />\n";
					}else{
						$this->messages .= "<li><span class=\"yellow\">{$roster->locale->act['PersonalTextNotUpdated']}
											</span><br />\n";
					}
				}else{
					$this->messages .= "<li><span class=\"red\">{$roster->locale->act['PersonalTextNone']}</span><br />\n";
				}



			}
		}

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
 				if ( ($this->data['config']['guild_groups_create'] == true)
 						&& ($this->data['config']['guild_groups'] == true)
 					){
 					$query = "SELECT * FROM {$roster->db->prefix}members WHERE `guild_id` =
 								'{$this->data['config']['choose_guild']}' ORDER BY `guild_rank` ASC";
 					$result = $roster->db->query ( $query );
 					$PrevGroup = "";
 					while ($row = $roster->db->fetch ($result) ){
						if ($PrevGroup != $row['guild_title']){ //Here to prevent unneccesary db inquiries
	 						$query2 = "SELECT * FROM `{$this->data['config']['forum_prefix']}membergroups` WHERE
	 									`groupName` = '{$row['guild_title']}' ";
	 						$result2 = $roster->db->query ( $query2 );
	 						if ($roster->db->affected_rows() == 0){//Group didnt exist, lets create it.
	 							$query3 = "INSERT INTO `{$this->data['config']['forum_prefix']}membergroups`
	 										( `ID_GROUP` , `groupName` , `onlineColor` , `minPosts` , `maxMessages` , `stars` )
	 										VALUES (NULL, '{$row['guild_title']}', '', '-1', '0',
	 										'{$roster->locale->act['Stars']}' )";
	 							$result3 = $roster->db->query ( $query3 );
	 							if ($roster->db->affected_rows() != 1){
	 								$this->messages .= "<span class=\"red\">{$roster->locale->act['ErrorCreatingGroup']}
	 													{$row['guild_title']}</span><br />\n";
	 							}else{
	 								$this->messages .= "<span class=\"green\">{$roster->locale->act['SuccessCreatingGroup']}
	 													{$row['guild_title']}</span><br />\n";
	 							}
	 						}else{
	 							$this->messages .= "<span class=\"green\">{$roster->locale->act['GroupExists']}
	 												{$row['guild_title']}</span><br />\n";
	 						}

	 						$PrevGroup = $row['guild_title'];
						}
 					}

 					//Lets create a group for those who are suspended
 					$query = "SELECT * FROM `{$this->data['config']['forum_prefix']}membergroups` WHERE `groupName` =
 								'{$roster->locale->act['Suspended']}' ";
 					$result = $roster->db->query ( $query );
 					$row = $roster->db->fetch ( $result );
 					if (!$row['ID_GROUP']){//It hasnt been created already, so we're going to create it now.
 						$query = "INSERT INTO `{$this->data['config']['forum_prefix']}membergroups`
 									( `ID_GROUP` , `groupName` , `onlineColor` , `minPosts` , `maxMessages` , `stars` )
 									VALUES (NULL, '{$roster->locale->act['Suspended']}', '', '-1', '0', '' )";
 						$result = $roster->db->query ( $query );
 						$this->messages .= "<span class=\"green\">{$roster->locale->act['SuccessCreatingGroup']}
 											{$roster->locale->act['Suspended']}</span><br />\n";
 					}else{
 						$this->messages .= "<span class=\"green\">{$roster->locale->act['GroupExists']}
 											{$roster->locale->act['Suspended']}</span><br />\n";
 					}

	 				//Make sure to shut off create groups when done.
	 				$query = "UPDATE {$roster->db->prefix}addon_config SET `config_value` = '0' WHERE `addon_id` =
	 							'{$this->data['addon_id']}' AND `config_name` = 'guild_groups_create' ";
	 				$result = $roster->db->query ( $query );
 				}
 			}
 			//Suspend members after leaving the guild.
			if ($this->data['config']['guild_suspend'] == 1){
				//Get the suspended group ID
				$query = "SELECT * FROM `{$this->data['config']['forum_prefix']}membergroups` WHERE `groupName` =
							'{$roster->locale->act['Suspended']}' ";
				$row = $roster->db->fetch ( $roster->db->query ( $query ) );
				$GroupID = $row['ID_GROUP'];

				$query = "SELECT * FROM `{$roster->db->prefix}members` m, `{$this->data['config']['forum_prefix']}members` f
							WHERE m.active = 0 AND f.is_activated = 1 AND m.name = f.realName";
				$result = $roster->db->query ( $query );
				while ($row = $roster->db->fetch ( $result ) ){
					if ($this->protectedGroup($row['realName']) == true){
						$this->messages .= "<span class=\"green\">{$row['realName']} -
											{$roster->locale->act['MemberGroupProtected']}</span><br />\n";
						break;
					}
					$query = "UPDATE `{$this->data['config']['forum_prefix']}members` SET `is_activated` = '0',
								`passwd` = '', `passwordSalt` = '', `emailAddress` = 'SUSPENDED_{$row['emailAddress']}_SUSPENDED',
								`personalText` = '', `signature` = '{$roster->locale->act['NoLongerAMember']}', `avatar` = '',
								`ID_GROUP` = '$GroupID', `additionalGroups` = '' WHERE `realName` = '{$row['name']}' LIMIT 1";
					$roster->db->query( $query );
					//---------------------------------------------No space here \/ because locale file has 's in it.
					$this->messages .= "<span class=\"green\">{$row['realName']}{$roster->locale->act['MemberSuspended']}
									</span><br />\n";

				}
			}//Move members to a different group after leaving.
			elseif($this->data['config']['guild_suspend'] == 2){
				//
				if ($this->data['config']['guild_suspended_group'] != 0){
					//
					$query = "SELECT * FROM `{$roster->db->prefix}members` m, `{$this->data['config']['forum_prefix']}members` f
							WHERE m.active = 0 AND f.is_activated = 1 AND m.name = f.realName";
					$result = $roster->db->query ( $query );
					while ($row = $roster->db->fetch ( $result ) ){
						if ($this->protectedGroup($row['realName']) == true){
							$this->messages .= "<span class=\"green\">{$row['realName']} -
												{$roster->locale->act['MemberGroupProtected']}</span><br />\n";
							break;
						}
							$query = "UPDATE `{$this->data['config']['forum_prefix']}members` SET
									`ID_GROUP` = '{$this->data['config']['guild_suspended_group']}', `additionalGroups` = ''
									WHERE `realName` = '{$row['name']}' LIMIT 1";
							$roster->db->query ( $query );
							$this->messages .= "<span class=\"green\">{$row['realName']} moved to guest group.</span><br />\n";
					}

				}

			}

 		}

		return true;
	}

	function char_pre( $data )
	{
		global $roster;

		return true;

	}

	function char( $data , $memberid )
	{
		global $roster;
		//The functions here will attempt to update all members of the forum, regardless of what guild they are in.
		//Verifiy that SMFSync is enabled before attempting to procede.
 		if ($this->data['config']['main_enable'] == true){

 			//Update Hearth or Zone to forum Location (if enabled)
 			if ( ($this->data['config']['player_update_location'] == true)
 					&& ($this->protectedGroup($data['Name']) == false)
 				){
 				//Read the current location setting.
 				$query = "SELECT `location` FROM `{$this->data['config']['forum_prefix']}members` WHERE `realName` =
 							'{$data['Name']}' ";
 				$result = $roster->db->query( $query );

 				$row = $roster->db->fetch ( $result );

 				//Check to make sure the player is a member of the forum before going any further.
 				if ($roster->db->affected_rows() == 1){
	 				if ($this->data['config']['player_location'] == 'Hearth'){
	 					//Location setting is Hearth
		 				//Check if current Location is the same as current Hearth
		 				if(!$data['Hearth']){
		 					$this->messages .= "<span class=\"yellow\">{$roster->locale->act['LocationNotSpecified']}
		 										</span><br />\n";
		 				}elseif ($row['location'] == $data['Hearth']){
		 					$this->messages .= "<span class=\"green\">{$roster->locale->act['LocationIsCurrent']}
		 										</span><br />\n";
		 				}else{
		 					$query = "UPDATE `{$this->data['config']['forum_prefix']}members` SET `location` =
		 								'{$data['Hearth']}'	WHERE `realName` = '{$data['Name']}' LIMIT 1 ";
		 					$result = $roster->db->query ( $query );
		 					$ResultRows = $roster->db->affected_rows();
		 					if ($ResultRows == 1){
		 						$this->messages .= "<span class=\"green\">{$roster->locale->act['LocationUpdatedFrom']}
		 											{$row['location']} {$roster->locale->act['to']} {$data['Hearth']}
		 											</span><br />\n";
		 					}else{
		 						$this->messages .= "<span class=\"red\">{$roster->locale->act['LocationNotUpdated']}
		 											</span><br />\n";
		 					}

		 				}
	 				}elseif($this->data['config']['player_location'] == 'Zone'){
	 					//Location setting is Zone
		 				//Check if current Location is the same as current Hearth
		 				if(!$data['Zone']){
		 					$this->messages .= "<span class=\"yellow\">{$roster->locale->act['LocationNotSpecified']}
		 										</span><br />\n";
		 				}elseif ($row['location'] == $data['Zone']){
		 					$this->messages .= "<span class=\"green\">{$roster->locale->act['LocationIsCurrent']}
		 										</span><br />\n";
		 				}else{
		 					$query = "UPDATE `{$this->data['config']['forum_prefix']}members` SET `location` =
		 								'{$data['Zone']}' WHERE `realName` = '{$data['Name']}' LIMIT 1 ";
		 					$result = $roster->db->query ( $query );
		 					$ResultRows = $roster->db->affected_rows();
		 					if ($ResultRows == 1){
		 						$this->messages .= "<span class=\"green\">{$roster->locale->act['LocationUpdatedFrom']}
		 											{$row['location']} {$roster->locale->act['to']} {$data['Zone']}
		 											</span><br />\n";
		 					}else{
		 						$this->messages .= "<span class=\"red\">{$roster->locale->act['LocationNotUpdated']}
		 											</span><br />\n";
		 					}

		 				}
 					}
 				}else{
 					$this->messages .= "<span class=\"red\">{$roster->locale->act['PlayerNotInForum']}</span><br />\n";
 				}

 			}//End of Player Update Location
 		}

 		return true;
	}

	function char_post( $data )
	{
		global $roster;

		return true;
	}

	function protectedGroup($name){
		global $roster;

		$protectedGroup = $this->data['config']['guild_protected_group'];

		if ($protectedGroup == 0){//No protected groups exist. Dont even bother searching the DB.
			return false;
		}

		//Get groups.
		$query = "SELECT * FROM `{$this->data['config']['forum_prefix']}members` WHERE `realName` = '$name' LIMIT 1";
		$result = $roster->db->query ( $query );
		$row = $roster->db->fetch ( $result );
		$groups = $row['ID_GROUP'].','.$row['additionalGroups'];

		//Split the groups up into an array for searching.
		$groups = preg_split('/,/',$groups);

		//Search thru the groups.
		for ($i=0; $i < count($groups); $i++){
			if ($groups[$i] == $protectedGroup){
				return true; //Member is in a protected group. Do nothing.
			}
		}

		return false; //Member is NOT in a protected group, proceed as normal.

	}

	///////////////////////////////////////////////////////////
	//  Parses the associative array provided from the LUA
	//		input:	$lua_data is an associative array
	//				$only_realm is an optional restrictor of data
	//		returns an associative array of events
	//  Original credit for this goes to Munazz of Mediocrity in Motion
	///////////////////////////////////////////////////////////
	function GroupCalendarParse($lua_data,$only_realm = "") {

	  global $debuging_flag;

	  $calendar_items = array();
	  $count = 0;

	  if (!array_key_exists("gGroupCalendar_Database",$lua_data)) {
	  	if ($debuging_flag) debug_output("\n\nERROR:  No Calendar Database key found in LUA Data.\n\n");
		return array();
	  }
	  $database = $lua_data['gGroupCalendar_Database'];
	  if ($debuging_flag) debug_output("Database Format is ". $database['Format'] ."\n");
	  if ($debuging_flag && $database['Format'] != 14) debug_output("WARNING: Expecting Format 14, possible errors from different format versions.  Continuing anyway...\n");

	  $gd = $database['Databases'];
	  foreach( array_keys( $gd ) as $char_name ) {
	    //get char name that posted the event
		$charName = $gd[$char_name]['UserName'];
		$realm = $gd[$char_name]['Realm'];
		if ($only_realm != "" && $realm != $only_realm) {
			if ($debuging_flag) debug_output("Entry $char_name is being skipped because the realm '$realm' does not meet required realm of '$only_realm'.\n");
			continue;
		}

		$events = $gd[$char_name]['Events'];
		if ($debuging_flag == 2) { debug_output("$char_name Events "); debug_output(print_r($events,1)); }
		foreach(array_keys($events) as $event){
		  if ($debuging_flag == 2) { debug_output("Event $event\n"); }
		  $detail = $events[$event];
		  foreach(array_keys($detail) as $detailinfo){
		    $thisEvent = array();
			$detailedinfo = $detail[$detailinfo];
			if ($debuging_flag == 2) { debug_output(print_r($detailedinfo,1)); }

			// the 'mPrivate' field will signify if this event is private and shouldn't be uploaded
			if ($detailedinfo['mPrivate'] == "true") continue;

			$mDate = $detailedinfo['mDate'];
			$mTitle = $detailedinfo['mTitle'];
			$mType = $detailedinfo['mType'];
			$mID = $detailedinfo['mID'];
			$mTime = $detailedinfo['mTime'];
			$mGuildOnly = $detailedinfo['mGuild'];
			$mDescription = $detailedinfo['mDescription'];
			$mDuration = $detailedinfo['mDuration'];
			$mMinLevel = $detailedinfo['mMinLevel'];
			$mMaxLevel = $detailedinfo['mMaxLevel'];
			$mAttendance = $detailedinfo['mAttendance'];
			$mLimits = $detailedinfo['mLimits'];
			$mMaxAttendance = $detailedinfo['mLimits']['mMaxAttendance'];

			//Convert GroupCal Date to Calendar date
			$startdate = mktime(12,0,0,1,1,2000);
			$mDateConv = $startdate + ($mDate * 86400);
			$eventDate = getdate($mDateConv);

			//Convert GroupCal Time to Standard Time
			$eventTime = $mTime / 60;
			if($decpos = strpos($eventTime,'.')){
			  $eventTimeH = substr($eventTime,0,$decpos);
			  $eventTimeM = substr($eventTime,$decpos);
			  $eventTimeM = 60 * $eventTimeM;
			  $eventTimeS = 0;
			  if($eventTimeM > 0 && $eventTimeM < 10){
			    $eventTimeM = 05;
			  }
			}else{
			  $eventTimeH = $eventTime;
			  $eventTimeM = 0;
			  $eventTimeS = 0;
			}

			//Calculate Duration (leave it in minutes)
			$duration = (int)$mDuration;

			if ($debuging_flag==2) print "Title: $mTitle<br />Date: $mDate Time: $mTime<br />\n";
			if ($debuging_flag==2) print "Initial Date found to be $eventTimeH:$eventTimeM:$eventTimeS ". $eventDate['mon'] ."/". $eventDate['mday'] ."/". $eventDate['year'] ."<br />\n";

			//check event type for b-day and set time to be allday event
			if($mType == 'Birth'){
			  $eventTimeS = 25;
			  $eventTimeH = 0;
			  $eventTimeM = 0;
			  $duration = 0;
			} else $eventTimeS = $eventTimeS - (WOW_TIME_OFFSET * 3600);
				//Not a birthday, so add the Server Time Offset to store it in GMT

			//Calculate the Unix Date using the vars we have gotten from our data.
			$date = mktime($eventTimeH,$eventTimeM,$eventTimeS,$eventDate['mon'],$eventDate['mday'],$eventDate['year']);

			if ($debuging_flag==2) print "GMT Date found to be ". date("r",$date) ."<br />\n";

			//Parse the attendace information.
			$fAttendance = "";
			if(is_array($mAttendance)){
			  $fAttendance = array();
			  //Check for People whom will attend the event.
			  $attenCount = 0;
			  foreach(array_keys($mAttendance) as $attendees){
			    $currAttend = explode(",",$mAttendance[$attendees]);
				//$currAttend = array(modified date,modified time,status,playerinfo,attend_comment,guild,guild rank,create date,create time)
				// playerinfo is string of 4 characters: first one is Race, second one is Class, last two are level
				$fAttendance[$attenCount]['Name'] = $attendees;
				$fAttendance[$attenCount]['str'] = $mAttendance[$attendees];
				$fAttendance[$attenCount]['modDate'] = $currAttend[0];
				$fAttendance[$attenCount]['modTime'] = $currAttend[1];
				$fAttendance[$attenCount]['Status'] = $currAttend[2];
				$fAttendance[$attenCount]['Level'] = substr($currAttend[3],2,2);
				$fAttendance[$attenCount]['RaceCode'] = substr($currAttend[3],0,1);
				$fAttendance[$attenCount]['ClassCode'] = substr($currAttend[3],1,1);
				$fAttendance[$attenCount]['Comment'] = $currAttend[4];
				$fAttendance[$attenCount]['Guild'] = $currAttend[5];
				$fAttendance[$attenCount]['GuildRank'] = $currAttend[6];
				$fAttendance[$attenCount]['createDate'] = $currAttend[7];
				$fAttendance[$attenCount]['createTime'] = $currAttend[8];

				//Convert GroupCal Time and Date to Gregorian Calendar date GMT timezone
				//	Time is stored is seconds since midnight
				$startdate = mktime(12,0,0,1,1,2000);
				if ($fAttendance[$attenCount]['modDate'] != "") {
					$mDateConv = $startdate + ($fAttendance[$attenCount]['modDate'] * 86400);
					$modDate = getdate($mDateConv);
					$eventTimeS = $fAttendance[$attenCount]['modTime'] % 60;
					$eventTimeH = floor($fAttendance[$attenCount]['modTime'] / 60);
					$eventTimeM = $eventTimeH % 60;
					$eventTimeH = floor($eventTimeH / 60);
					$modDate = mktime($eventTimeH,$eventTimeM,$eventTimeS,$modDate['mon'],$modDate['mday'],$modDate['year']);
					$modDate = $modDate - (WOW_TIME_OFFSET * 3600);
					$fAttendance[$attenCount]['modDate'] = date("Y-m-d",$modDate);
					$fAttendance[$attenCount]['modTime'] = date("H:i:s",$modDate);
				}

				if ($fAttendance[$attenCount]['createDate'] != "") {
					$mDateConv = $startdate + ($fAttendance[$attenCount]['createDate'] * 86400);
					$modDate = getdate($mDateConv);
					$eventTimeS = $fAttendance[$attenCount]['createTime'] % 60;
					$eventTimeH = floor($fAttendance[$attenCount]['createTime'] / 60);
					$eventTimeM = $eventTimeH % 60;
					$eventTimeH = floor($eventTimeH / 60);
					$modDate = mktime($eventTimeH,$eventTimeM,$eventTimeS,$modDate['mon'],$modDate['mday'],$modDate['year']);
					$modDate = $modDate - (WOW_TIME_OFFSET * 3600);
					$fAttendance[$attenCount]['createDate'] = date("Y-m-d",$modDate);
					$fAttendance[$attenCount]['createTime'] = date("H:i:s",$modDate);
				}

				//Increment and ready for next loop
				$attenCount++;
				if ($debuging_flag==2) debug_output('<br>'.$name.' '.$status.' '.$level.' '.Race($raceCode).' '.ClassInt($classCode).' '.$guild);
			  }
			}

			$fAttendLimits = $mLimits['mClassLimits'];

			$thisEvent['Creator'] = $charName;
			$thisEvent['DateTime'] = $date;
			$thisEvent['Title'] = $mTitle;
			$thisEvent['Type'] = $mType;
			$thisEvent['ID'] = $mID;
			$thisEvent['description'] = $mDescription;
			$thisEvent['GuildOnly'] = $mGuildOnly;
			$thisEvent['Duration'] = $duration;
			$thisEvent['MinLevel'] = $mMinLevel;
			$thisEvent['MaxLevel'] = $mMaxLevel;
			$thisEvent['Attendance'] = $fAttendance;
			$thisEvent['Limits'] = $fAttendLimits;
			$thisEvent['MaxAttendance'] = $mMaxAttendance;

			$calendar_items[$charName . $mID] = $thisEvent;
		  }
		}
	  }
	  return $calendar_items;
	}

	function ParseLuaArray( &$file_as_array )
	{
		if( !is_array($file_as_array) )
		{
			// return false if not presented with an array
			return(false);
		}
		else
		{
			// Parse the contents of the array
			$stack = array( array( '',  array() ) );
			$stack_pos = 0;
			$last_line = '';
			foreach( $file_as_array as $line )
			{
				// join lines ending in \\ together
				if( substr( $line, -2, 1 ) == '\\' )
				{
					$last_line .= substr($line, 0, -2) . "\n";
					continue;
				}
				if($last_line!='')
				{
					$line = trim($last_line . $line);
					$last_line = '';
				}
				else
				{
					$line = trim($line);
				}

				// Look for end of an array
				if( $line[0] == '}' )
				{
					$hash = $stack[$stack_pos];
					unset($stack[$stack_pos]);
					$stack_pos--;
					$stack[$stack_pos][1][$hash[0]] = $hash[1];
					unset($hash);
				}
				// Handle other cases
				else
				{
					// Check if the key is given
					if( strpos($line,'=') )
					{
						list($name, $value) = explode( '=', $line, 2 );
						$name = trim($name);
						$value = trim($value,', ');
						if($name[0]=='[')
						{
							$name = trim($name, '[]"');
						}
					}
					// Otherwise we'll have to make one up for ourselves
					else
					{
						$value = $line;
						if( empty($stack[$stack_pos][1]) )
						{
							$name = 1;
						}
						else
						{
							$name = max(array_keys($stack[$stack_pos][1]))+1;
						}
						if( strpos($line,'-- [') )
						{
							$value = explode('-- [',$value);
							array_pop($value);
							$value = implode('-- [',$value);
						}
						$value = trim($value,', ');
					}
					if( $value == '{' )
					{
						$stack_pos++;
						$stack[$stack_pos] = array($name, array());
					}
					else
					{
						if($value[0]=='"')
						{
							$value = substr($value,1,-1);
						}
						else if($value == 'true')
						{
							$value = true;
						}
						else if($value == 'false')
						{
							$value = false;
						}
						else if($value == 'nil')
						{
							$value = NULL;
						}
						$stack[$stack_pos][1][$name] = $value;
					}
				}
			}
			return($stack[0][1]);
		}
	}
}