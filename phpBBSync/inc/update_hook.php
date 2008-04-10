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
 * @package    phpBBSync
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
class phpbbsyncUpdate
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
	function phpbbsyncUpdate($data)
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
		global $roster, $update;
		
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
// Rather than updating per member, going to update after guild
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
					
	 				/* creating all groups that don't exist first*/
	 				if ($this->data['config']['forum_type'] == 0) /*DF*/{
		 				$query = "INSERT INTO `{$this->data['config']['forum_prefix']}bbgroups` (`group_type` , `group_name` , `group_description`, `group_moderator`, `group_single_user` ) 
		 					SELECT 1, m.guild_title, '', 0, 0 from {$roster->db->prefix}members m 
							left outer join {$this->data['config']['forum_prefix']}users u on m.name=u.name /*using real name field to store main char name */
							left outer join {$this->data['config']['forum_prefix']}bbgroups g on g.group_name=m.guild_title
							where g.group_name is null and u.name is not null
							group by guild_title";
					}
					if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
		 				$query = "INSERT INTO `{$this->data['config']['forum_prefix']}groups` (`group_type` , group_founder_manage, `group_name` , `group_desc`, `group_desc_bitfield`, `group_desc_options`, `group_desc_uid`, group_display, group_avatar, group_avatar_type, group_avatar_width, group_avatar_height, group_rank, group_colour, group_sig_chars, group_receive_pm, group_message_limit, group_legend) 
		 					SELECT 1,0, m.guild_title, '','',7,'',0,'',0,0,0,0,'',0,0,0,0 from {$roster->db->prefix}members m 
							left outer join {$this->data['config']['forum_prefix']}users u on ucase(m.name)=ucase(u.user_aim) /*no real name - use yahoo/aim/msn field or similar */
							left outer join {$this->data['config']['forum_prefix']}groups g on g.group_name=m.guild_title
							where g.group_name is null and u.user_aim is not null
							group by guild_title";
					}
					
					$result = $roster->db->query ( $query );
					$this->messages .= "<span class=\"green\">{$roster->locale->act['SuccessCreatingGroup']}</span><br />\n";

					//Now the important bit - moving groups based on guild rank					
 					//First remove other memberships
 					if ($this->data['config']['forum_type'] == 0) /*DF*/{
	 					$query = "delete from {$this->data['config']['forum_prefix']}bbuser_group where user_id in (select user_id from (SELECT distinct u.user_id from {$roster->db->prefix}memberlog ml
							inner join {$roster->db->prefix}members m on m.name=ml.name 
							inner join {$this->data['config']['forum_prefix']}users u on ucase(u.name)=ucase(ml.name)
							inner join {$this->data['config']['forum_prefix']}bbgroups g on m.guild_title=g.group_name
							inner join {$this->data['config']['forum_prefix']}bbuser_group ug on ug.user_id = u.user_id 
							and u.user_id not in /*makes sure user is not protected*/
							(select ug1.user_id from {$this->data['config']['forum_prefix']}bbuser_group ug1 left outer join {$this->data['config']['forum_prefix']}bbgroups g1 on g1.group_id=ug1.group_id where g1.group_id={$this->data['config']['guild_protected_group']})
							) uid )";
						}
					if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
						//make sure group type three is excluded - these are the built in groups
						$query = "delete from {$this->data['config']['forum_prefix']}user_group where user_id in (select user_id from (SELECT distinct u.user_id from {$roster->db->prefix}memberlog ml
							inner join {$roster->db->prefix}members m on m.name=ml.name 
							inner join {$this->data['config']['forum_prefix']}users u on ucase(u.user_aim)=ucase(ml.name)
							inner join {$this->data['config']['forum_prefix']}groups g on m.guild_title=g.group_name
							inner join {$this->data['config']['forum_prefix']}user_group ug on ug.user_id = u.user_id 
							where g.group_type!=3
							and u.user_id not in /*makes sure user is not protected*/
							(select ug1.user_id from {$this->data['config']['forum_prefix']}user_group ug1 left outer join {$this->data['config']['forum_prefix']}groups g1 on g1.group_id=ug1.group_id where g1.group_id={$this->data['config']['guild_protected_group']})
							) uid )";
						
					}
					$result = $roster->db->query ( $query );
					//then move to correct membership
					if ($this->data['config']['forum_type'] == 0) /*DF*/{
						$query = "insert into {$this->data['config']['forum_prefix']}bbuser_group (group_id, user_id, user_pending)
						 	SELECT distinct g.group_id, u.user_id, 0 from {$roster->db->prefix}memberlog ml
							inner join {$roster->db->prefix}members m on m.name=ml.name 
							inner join {$this->data['config']['forum_prefix']}users u on ucase(u.name)=ucase(ml.name)
							inner join {$this->data['config']['forum_prefix']}bbgroups g on m.guild_title=g.group_name
							left outer join {$this->data['config']['forum_prefix']}bbuser_group ug on ug.user_id = u.user_id 
							where u.user_id not in /*makes sure user is not protected*/
							(select ug1.user_id from {$this->data['config']['forum_prefix']}bbuser_group ug1 left outer join {$this->data['config']['forum_prefix']}bbgroups g1 on g1.group_id=ug1.group_id where g1.group_id={$this->data['config']['guild_protected_group']})
							";
					}
					if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
						$query = "insert into {$this->data['config']['forum_prefix']}user_group (group_id, user_id, group_leader, user_pending)
						 	SELECT distinct g.group_id, u.user_id, 0, 0 from {$roster->db->prefix}memberlog ml
							inner join {$roster->db->prefix}members m on m.name=ml.name 
							inner join {$this->data['config']['forum_prefix']}users u on ucase(u.user_aim)=ucase(ml.name)
							inner join {$this->data['config']['forum_prefix']}groups g on m.guild_title=g.group_name
							left outer join {$this->data['config']['forum_prefix']}user_group ug on ug.user_id = u.user_id 
							where u.user_id not in /*makes sure user is not protected*/
							(select ug1.user_id from {$this->data['config']['forum_prefix']}user_group ug1 left outer join {$this->data['config']['forum_prefix']}groups g1 on g1.group_id=ug1.group_id where g1.group_id={$this->data['config']['guild_protected_group']})
							";
					}	
					$result = $roster->db->query ( $query );
					$this->messages .= "<span class=\"green\">{$roster->locale->act['GroupUpdated']}</span><br />\n";

					
				}
		
 			//Suspend members after leaving the guild. May have to add in something to unsuspend if they rejoin
			if ($this->data['config']['guild_suspend'] == 1){
				//need to change user_level to 0 to suspend
				if ($this->data['config']['forum_type'] == 0) /*DF*/{
					$query = "UPDATE {$this->data['config']['forum_prefix']}users u left outer join {$roster->db->prefix}members m set u.user_level=0 where ucase(m.name)=ucase(u.name) and m.name is null and u.user_id not in /*makes sure user is not protected*/
							(select ug1.user_id from {$this->data['config']['forum_prefix']}bbuser_group ug1 left outer join {$this->data['config']['forum_prefix']}bbgroups g1 on g1.group_id=ug1.group_id where g1.group_id={$this->data['config']['guild_protected_group']})";
				}
				if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
					//want to 'deactivate' - need to test this.
						$query="select 'nothing'";
				}
				$result = $roster->db->query ( $query );
				$this->messages .= "<span class=\"green\">{$roster->locale->act['SuspUpdated']}</span><br />\n";
			}
			//Move members to a different group after leaving.
			elseif($this->data['config']['guild_suspend'] == 2){
				//
				if ($this->data['config']['guild_suspended_group'] != 0){
					// First delete all other memberships
					if ($this->data['config']['forum_type'] == 0) /*DF*/{
						$query = "delete from {$this->data['config']['forum_prefix']}bbuser_group where user_id in (select user_id from (SELECT distinct u.user_id from {$roster->db->prefix}memberlog ml
							left outer join {$roster->db->prefix}members m on m.name=ml.name 
							left outer join {$this->data['config']['forum_prefix']}users u on ucase(u.name)=ucase(ml.name)
							left outer join {$this->data['config']['forum_prefix']}bbuser_group ug on ug.user_id = u.user_id 
							where m.name is null and u.name is not null and group_id is not null
							and u.user_id not in 
								(select ug1.user_id from {$this->data['config']['forum_prefix']}bbuser_group ug1
								left outer join {$this->data['config']['forum_prefix']}bbgroups g1 on g1.group_id=ug1.group_id
								where g1.group_id={$this->data['config']['guild_protected_group']})) temp
							)";
					}
					if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
						$query = "delete from {$this->data['config']['forum_prefix']}user_group where user_id in (select user_id from (SELECT distinct u.user_id from {$roster->db->prefix}memberlog ml
							left outer join {$roster->db->prefix}members m on m.name=ml.name 
							inner join {$this->data['config']['forum_prefix']}users u on ucase(u.user_aim)=ucase(ml.name)
							inner join {$this->data['config']['forum_prefix']}groups g on m.guild_title=g.group_name
							inner join {$this->data['config']['forum_prefix']}user_group ug on ug.user_id = u.user_id 
							where g.group_type!=3
							and m.name is null
							and u.user_id not in /*makes sure user is not protected*/
							(select ug1.user_id from {$this->data['config']['forum_prefix']}user_group ug1 left outer join {$this->data['config']['forum_prefix']}groups g1 on g1.group_id=ug1.group_id where g1.group_id={$this->data['config']['guild_protected_group']})
							) uid )";
					}
					$result = $roster->db->query ( $query );
					//Then add in the suspended membership
					if ($this->data['config']['forum_type'] == 0) /*DF*/{
						$query = "INSERT INTO {$this->data['config']['forum_prefix']}bbuser_group (group_id, user_id, user_pending)
							SELECT distinct (select group_id from `{$this->data['config']['forum_prefix']}bbgroups` where group_id='{$this->data['config']['guild_suspended_group']}') as group_id, u.user_id, 0 from `{$roster->db->prefix}memberlog` ml
							left outer join `{$roster->db->prefix}members` m on m.name=ml.name 
							left outer join `{$this->data['config']['forum_prefix']}users` u on ucase(u.name)=ucase(ml.name)
							/*left outer join `{$this->data['config']['forum_prefix']}bbuser_group` ug on ug.user_id = u.user_id */
							where m.name is null and u.name is not null and u.user_id not in 
									(select ug1.user_id from `{$this->data['config']['forum_prefix']}bbuser_group` ug1
									left outer join `{$this->data['config']['forum_prefix']}bbgroups` g1 on g1.group_id=ug1.group_id
									where g1.group_id={$this->data['config']['guild_protected_group']})";
					}
					if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
						$query = "insert into {$this->data['config']['forum_prefix']}user_group (group_id, user_id, group_leader, user_pending)
						 	SELECT distinct (select group_id from `{$this->data['config']['forum_prefix']}groups` where group_id='{$this->data['config']['guild_suspended_group']}') as group_id, u.user_id, 0, 0 from {$roster->db->prefix}memberlog ml
							left outer join {$roster->db->prefix}members m on m.name=ml.name 
							inner join {$this->data['config']['forum_prefix']}users u on ucase(u.user_aim)=ucase(ml.name)
							left outer join {$this->data['config']['forum_prefix']}user_group ug on ug.user_id = u.user_id 
							where m.name is null
							and u.user_id not in /*makes sure user is not protected*/
							(select ug1.user_id from {$this->data['config']['forum_prefix']}user_group ug1 left outer join {$this->data['config']['forum_prefix']}groups g1 on g1.group_id=ug1.group_id where g1.group_id={$this->data['config']['guild_protected_group']})
							";
					}
					$result = $roster->db->query ( $query );
					$this->messages .= "<span class=\"green\">{$roster->locale->act['SuspUpdated']}</span><br />\n";

				}

			}
			//change location
			if ($this->data['config']['player_update_location'] == true){
				if ($this->data['config']['player_location'] == 'Zone'){
					if ($this->data['config']['forum_type'] == 0) /*DF*/{
						$query ="update {$this->data['config']['forum_prefix']}users u, {$roster->db->prefix}members m set u.user_from=m.zone where ucase(u.name)=ucase(m.name)";
					}
					if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
						$query="select 'nothing'";
					}
					$result = $roster->db->query ( $query );
					$this->messages .= "<span class=\"green\">{$roster->locale->act['LocationUpdated']}</span><br />\n";
				}else{
					if ($this->data['config']['forum_type'] == 0) /*DF*/{
						$query="update {$this->data['config']['forum_prefix']}users u, {$roster->db->prefix}players p set u.user_from=p.hearth where ucase(u.name)=ucase(p.name) and p.hearth !=''";	
					}
					if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
						$query="select 'nothing'";
					}
					$result = $roster->db->query ( $query );
					$this->messages .= "<span class=\"green\">{$roster->locale->act['LocationUpdated']}</span><br />\n";
				}
			}
			//change sigs and avatars
			if ($this->data['config']['player_enable_signature'] == true){
				$sig = explode("%name%",$this->data['config']['player_signature']);
				//want to use siggen path but can't see how to get this at present. Use path in textbox.
				//Will only change sig if currently blank. Need to add an option for overwriting.
				if ($this->data['config']['forum_type'] == 0) /*DF*/{
					$query="update {$this->data['config']['forum_prefix']}users u inner join {$roster->db->prefix}members m 
						set u.user_sig = concat(\"[img]\", '$sig[0]', m.name, '$sig[1]', \"[/img]\") 
						where ucase(u.name) = ucase(m.name)
						and user_sig is null"; /*only updates people with blank signatures*/
				}
				if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
					$query="select 'nothing'";
				}
				$result = $roster->db->query ( $query );
				$this->messages .= "<span class=\"green\">{$roster->locale->act['SigUpdated']}</span><br />\n";
				
			}
			if ($this->data['config']['player_enable_avatar'] == true){
				//Will only change avatar if currently blank.gif. Need to add an option for overwriting.
				//have to split the setting to avoid using replace in query, as it seems to cause a problem.
				$ava = explode("%name%",$this->data['config']['player_avatar']);
				if ($this->data['config']['forum_type'] == 0) /*DF*/{
					$query="update {$this->data['config']['forum_prefix']}users u inner join {$roster->db->prefix}members m inner join {$roster->db->prefix}players p 
						set u.user_avatar = concat('$ava[0]', m.name, '$ava[1]')
						where ucase(u.name) = ucase(m.name) 
						and p.name=m.name 
						and user_avatar=\"gallery/blank.gif\""; /*only updates people with blank avatars*/
				}
				if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
					$query="select 'nothing'";
				}
				$result = $roster->db->query ( $query );
				$this->messages .= "<span class=\"green\">{$roster->locale->act['AvUpdated']}</span><br />\n";
				
			}
			if ($this->data['config']['guild_ranks'] == true){
				//Changes rank - unless in protected group
				//First need to create any ranks that don't exist
				if ($this->data['config']['forum_type'] == 0) /*DF*/{
					$query = "INSERT INTO `{$this->data['config']['forum_prefix']}bbranks` (`rank_title` , `rank_min` , `rank_max`, `rank_special`, `rank_image` ) 
	 					SELECT m.guild_title, '-1', 0, 1, '' from {$roster->db->prefix}members m 
						left outer join {$this->data['config']['forum_prefix']}users u on m.name=u.name /*using real name field to store main char name */
						left outer join {$this->data['config']['forum_prefix']}bbranks r on r.rank_title=m.guild_title
						where r.rank_title is null and u.name is not null
						group by m.guild_title";
				}
				if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
						$query="select 'nothing'";
				}
				$result = $roster->db->query ( $query ); 
				$this->messages .= "<span class=\"green\">{$roster->locale->act['RankCreated']}</span><br />\n";
				//Then need to change user ranks based on guild title
				//simpler than groups as one-to-one relationship - no intermediate table
				if ($this->data['config']['forum_type'] == 0) /*DF*/{
					$query="update {$this->data['config']['forum_prefix']}users u inner join {$roster->db->prefix}members m inner join {$this->data['config']['forum_prefix']}bbranks r
						set u.user_rank = r.rank_id
						where ucase(m.name)=ucase(u.name) 
						and m.guild_title=r.rank_title
						/*and r.rank_id=u.user_rank*/ 
						and u.user_id not in 
							(select ug1.user_id from `{$this->data['config']['forum_prefix']}bbuser_group` ug1
							left outer join `{$this->data['config']['forum_prefix']}bbgroups` g1 on g1.group_id=ug1.group_id
							where g1.group_id={$this->data['config']['guild_protected_group']})";
				}
				if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
						$query="select 'nothing'";
				}
				$result = $roster->db->query ( $query );
				$this->messages .= "<span class=\"green\">{$roster->locale->act['RankUpdated']}</span><br />\n";
			}
 		/* 

personal text to guild note?
*/
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

 		return true;
	}

	function char_post( $data )
	{
		global $roster;

		return true;
	}

}