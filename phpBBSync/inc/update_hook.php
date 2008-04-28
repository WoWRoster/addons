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
		
		if($this->data['config']['phbb_db']!=''){
			$phpbbdb=$this->data['config']['phbb_db'].".";
		}else{
			$phpbbdb="";
		}
		
 		if ($this->data['config']['main_enable'] == true){
 			//Manage groups
 			if ($this->data['config']['guild_groups'] == true){
 				//Create groups if enabled
					
	 				/* creating all groups that don't exist first*/
	 				if ($this->data['config']['forum_type'] == 0) /*DF*/{
		 				$query = "INSERT INTO `{$phpbbdb}{$this->data['config']['forum_prefix']}bbgroups` (`group_type` , `group_name` , `group_description`, `group_moderator`, `group_single_user` ) 
		 					SELECT 1, m.guild_title, '', 0, 0 from {$roster->db->prefix}members m 
							left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}users u on m.name=u.{$this->data['config']['char_field']} /*using real name field to store main char name */
							left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}bbgroups g on g.group_name=m.guild_title
							where g.group_name is null and u.{$this->data['config']['char_field']} is not null
							group by guild_title";
					}
					if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
		 				$query = "INSERT INTO `{$phpbbdb}{$this->data['config']['forum_prefix']}groups` (`group_type` , group_founder_manage, `group_name` , `group_desc`, `group_desc_bitfield`, `group_desc_options`, `group_desc_uid`, group_display, group_avatar, group_avatar_type, group_avatar_width, group_avatar_height, group_rank, group_colour, group_sig_chars, group_receive_pm, group_message_limit, group_legend) 
		 					SELECT 1,0, m.guild_title, '','',7,'',0,'',0,0,0,0,'',0,0,0,0 from {$roster->db->prefix}members m 
							left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}users u on ucase(m.name)=ucase(u.{$this->data['config']['char_field']}) 
							left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}groups g on g.group_name=m.guild_title
							where g.group_name is null and u.{$this->data['config']['char_field']} is not null
							group by guild_title";
					}
					
					$result = $roster->db->query ( $query );
					$this->messages .= "<span class=\"green\">{$roster->locale->act['SuccessCreatingGroup']}</span><br />\n";

					//Now the important bit - moving groups based on guild rank					
 					//First remove other memberships
 					if ($this->data['config']['forum_type'] == 0) /*DF*/{
	 					$query = "delete from {$phpbbdb}{$this->data['config']['forum_prefix']}bbuser_group where user_id in (select user_id from (SELECT distinct u.user_id from {$roster->db->prefix}memberlog ml
							inner join {$roster->db->prefix}members m on m.name=ml.name 
							inner join {$phpbbdb}{$this->data['config']['forum_prefix']}users u on ucase(u.{$this->data['config']['char_field']})=ucase(ml.name)
							inner join {$phpbbdb}{$this->data['config']['forum_prefix']}bbgroups g on m.guild_title=g.group_name
							inner join {$phpbbdb}{$this->data['config']['forum_prefix']}bbuser_group ug on ug.user_id = u.user_id 
							and u.user_id not in /*makes sure user is not protected*/
							(select ug1.user_id from {$phpbbdb}{$this->data['config']['forum_prefix']}bbuser_group ug1 left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}bbgroups g1 on g1.group_id=ug1.group_id where g1.group_id={$this->data['config']['guild_protected_group']})
							) uid )";
						}
					if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
						//make sure group type three is excluded - these are the built in groups
						$query = "delete from {$phpbbdb}{$this->data['config']['forum_prefix']}user_group where user_id in (select user_id from (SELECT distinct u.user_id from {$roster->db->prefix}memberlog ml
							inner join {$roster->db->prefix}members m on m.name=ml.name 
							inner join {$phpbbdb}{$this->data['config']['forum_prefix']}users u on ucase(u.{$this->data['config']['char_field']})=ucase(ml.name)
							inner join {$phpbbdb}{$this->data['config']['forum_prefix']}groups g on m.guild_title=g.group_name
							inner join {$phpbbdb}{$this->data['config']['forum_prefix']}user_group ug on ug.user_id = u.user_id 
							where g.group_type!=3
							and u.user_id not in /*makes sure user is not protected*/
							(select ug1.user_id from {$phpbbdb}{$this->data['config']['forum_prefix']}user_group ug1 left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}groups g1 on g1.group_id=ug1.group_id where g1.group_id={$this->data['config']['guild_protected_group']})
							) uid )";
						
					}
					$result = $roster->db->query ( $query );
					//then move to correct membership
					if ($this->data['config']['forum_type'] == 0) /*DF*/{
						$query = "insert into {$phpbbdb}{$this->data['config']['forum_prefix']}bbuser_group (group_id, user_id, user_pending)
						 	SELECT distinct g.group_id, u.user_id, 0 from {$roster->db->prefix}memberlog ml
							inner join {$roster->db->prefix}members m on m.name=ml.name 
							inner join {$phpbbdb}{$this->data['config']['forum_prefix']}users u on ucase(u.{$this->data['config']['char_field']})=ucase(ml.name)
							inner join {$phpbbdb}{$this->data['config']['forum_prefix']}bbgroups g on m.guild_title=g.group_name
							left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}bbuser_group ug on ug.user_id = u.user_id 
							where u.user_id not in /*makes sure user is not protected*/
							(select ug1.user_id from {$phpbbdb}{$this->data['config']['forum_prefix']}bbuser_group ug1 left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}bbgroups g1 on g1.group_id=ug1.group_id where g1.group_id={$this->data['config']['guild_protected_group']})
							";
					}
					if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
						$query = "insert into {$phpbbdb}{$this->data['config']['forum_prefix']}user_group (group_id, user_id, group_leader, user_pending)
						 	SELECT distinct g.group_id, u.user_id, 0, 0 from {$roster->db->prefix}memberlog ml
							inner join {$roster->db->prefix}members m on m.name=ml.name 
							inner join {$phpbbdb}{$this->data['config']['forum_prefix']}users u on ucase(u.{$this->data['config']['char_field']})=ucase(ml.name)
							inner join {$phpbbdb}{$this->data['config']['forum_prefix']}groups g on m.guild_title=g.group_name
							left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}user_group ug on ug.user_id = u.user_id 
							where u.user_id not in /*makes sure user is not protected*/
							(select ug1.user_id from {$phpbbdb}{$this->data['config']['forum_prefix']}user_group ug1 left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}groups g1 on g1.group_id=ug1.group_id where g1.group_id={$this->data['config']['guild_protected_group']})
							";
					}	
					$result = $roster->db->query ( $query );
					//put in default group here
					if($this->data['config']['default_group'] == 1){
						if ($this->data['config']['forum_type'] == 1)/*phpBB3*/{
							$query="UPDATE {$phpbbdb}{$this->data['config']['forum_prefix']}users u inner join {$roster->db->prefix}members m inner join {$phpbbdb}{$this->data['config']['forum_prefix']}groups g
							SET u.user_group=g.group_id
							WHERE ucase(u.{$this->data['config']['char_field']})=ucase(m.name)
							AND m.guild_title=g.group_name";
							$result = $roster->db->query ( $query );
						}
					}
					$this->messages .= "<span class=\"green\">{$roster->locale->act['GroupUpdated']}</span><br />\n";

					
				}
		
 			//Suspend members after leaving the guild. May have to add in something to unsuspend if they rejoin
			if ($this->data['config']['guild_suspend'] == 1){
				//need to change user_level to 0 to suspend
				if ($this->data['config']['forum_type'] == 0) /*DF*/{
					$query = "UPDATE {$phpbbdb}{$this->data['config']['forum_prefix']}users u 
						left outer join {$roster->db->prefix}members m 
						set u.user_level=0 
						where ucase(m.name)=ucase(u.{$this->data['config']['char_field']}) 
						and m.name is null 
						and u.user_id not in /*makes sure user is not protected*/
							(select ug1.user_id from {$phpbbdb}{$this->data['config']['forum_prefix']}bbuser_group ug1 left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}bbgroups g1 on g1.group_id=ug1.group_id where g1.group_id={$this->data['config']['guild_protected_group']})";
				}
				if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
					//want to 'deactivate' - need to test how this works.
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
						$query = "delete from {$phpbbdb}{$this->data['config']['forum_prefix']}bbuser_group where user_id in (select user_id from (SELECT distinct u.user_id from {$roster->db->prefix}memberlog ml
							left outer join {$roster->db->prefix}members m on m.name=ml.name 
							left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}users u on ucase(u.{$this->data['config']['char_field']})=ucase(ml.name)
							left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}bbuser_group ug on ug.user_id = u.user_id 
							where m.name is null and u.{$this->data['config']['char_field']} is not null and group_id is not null
							and u.user_id not in 
								(select ug1.user_id from {$phpbbdb}{$this->data['config']['forum_prefix']}bbuser_group ug1
								left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}bbgroups g1 on g1.group_id=ug1.group_id
								where g1.group_id={$this->data['config']['guild_protected_group']})) temp
							)";
					}
					if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
						$query = "delete from {$phpbbdb}{$this->data['config']['forum_prefix']}user_group where user_id in (select user_id from (SELECT distinct u.user_id from {$roster->db->prefix}memberlog ml
							left outer join {$roster->db->prefix}members m on m.name=ml.name 
							inner join {$phpbbdb}{$this->data['config']['forum_prefix']}users u on ucase(u.{$this->data['config']['char_field']})=ucase(ml.name)
							inner join {$phpbbdb}{$this->data['config']['forum_prefix']}groups g on m.guild_title=g.group_name
							inner join {$phpbbdb}{$this->data['config']['forum_prefix']}user_group ug on ug.user_id = u.user_id 
							where g.group_type!=3
							and m.name is null
							and u.user_id not in /*makes sure user is not protected*/
							(select ug1.user_id from {$phpbbdb}{$this->data['config']['forum_prefix']}user_group ug1 left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}groups g1 on g1.group_id=ug1.group_id where g1.group_id={$this->data['config']['guild_protected_group']})
							) uid )";
					}
					$result = $roster->db->query ( $query );
					//Then add in the suspended membership
					if ($this->data['config']['forum_type'] == 0) /*DF*/{
						$query = "INSERT INTO {$phpbbdb}{$this->data['config']['forum_prefix']}bbuser_group (group_id, user_id, user_pending)
							SELECT distinct (select group_id from `{$phpbbdb}{$this->data['config']['forum_prefix']}bbgroups` where group_id='{$this->data['config']['guild_suspended_group']}') as group_id, u.user_id, 0 from `{$roster->db->prefix}memberlog` ml
							left outer join `{$roster->db->prefix}members` m on m.name=ml.name 
							left outer join `{$phpbbdb}{$this->data['config']['forum_prefix']}users` u on ucase(u.{$this->data['config']['char_field']})=ucase(ml.name)
							/*left outer join `{$phpbbdb}{$this->data['config']['forum_prefix']}bbuser_group` ug on ug.user_id = u.user_id */
							where m.name is null and u.{$this->data['config']['char_field']} is not null and u.user_id not in 
									(select ug1.user_id from `{$phpbbdb}{$this->data['config']['forum_prefix']}bbuser_group` ug1
									left outer join `{$phpbbdb}{$this->data['config']['forum_prefix']}bbgroups` g1 on g1.group_id=ug1.group_id
									where g1.group_id={$this->data['config']['guild_protected_group']})";
					}
					if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
						$query = "insert into {$phpbbdb}{$this->data['config']['forum_prefix']}user_group (group_id, user_id, group_leader, user_pending)
						 	SELECT distinct (select group_id from `{$phpbbdb}{$this->data['config']['forum_prefix']}groups` where group_id='{$this->data['config']['guild_suspended_group']}') as group_id, u.user_id, 0, 0 from {$roster->db->prefix}memberlog ml
							left outer join {$roster->db->prefix}members m on m.name=ml.name 
							inner join {$phpbbdb}{$this->data['config']['forum_prefix']}users u on ucase(u.{$this->data['config']['char_field']})=ucase(ml.name)
							left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}user_group ug on ug.user_id = u.user_id 
							where m.name is null
							and u.user_id not in /*makes sure user is not protected*/
							(select ug1.user_id from {$phpbbdb}{$this->data['config']['forum_prefix']}user_group ug1 left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}groups g1 on g1.group_id=ug1.group_id where g1.group_id={$this->data['config']['guild_protected_group']})
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
						$query ="update {$phpbbdb}{$this->data['config']['forum_prefix']}users u, {$roster->db->prefix}members m set u.user_from=m.zone where ucase(u.{$this->data['config']['char_field']})=ucase(m.name)";
					}
					if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
						$query ="update {$phpbbdb}{$this->data['config']['forum_prefix']}users u, {$roster->db->prefix}members m set u.user_from=m.zone where ucase(u.{$this->data['config']['char_field']})=ucase(m.name)";
					}
					$result = $roster->db->query ( $query );
					$affected = $roster->db->affected_rows($result);
					$this->messages .= "<span class=\"green\">{$affected} {$roster->locale->act['LocationUpdated']}</span><br />\n";
				}else{
					if ($this->data['config']['forum_type'] == 0) /*DF*/{
						$query="update {$phpbbdb}{$this->data['config']['forum_prefix']}users u, {$roster->db->prefix}players p set u.user_from=p.hearth where ucase(u.{$this->data['config']['char_field']})=ucase(p.name) and p.hearth !=''";	
					}
					if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
						$query="update {$phpbbdb}{$this->data['config']['forum_prefix']}users u, {$roster->db->prefix}players p set u.user_from=p.hearth where ucase(u.{$this->data['config']['char_field']})=ucase(p.name) and p.hearth !=''";	
					}
					$result = $roster->db->query ( $query );
					$this->messages .= "<span class=\"green\">{$roster->db->affected_rows()} {$roster->locale->act['LocationUpdated']}</span><br />\n";
				}
			}
			//change sigs and avatars
			if ($this->data['config']['player_enable_signature'] == true){
				$sig = explode("%name%",$this->data['config']['player_signature']);
				//want to use siggen path but can't see how to get this at present. Use path in textbox.
				//Will only change sig if currently blank. Need to add an option for overwriting.
				if ($this->data['config']['forum_type'] == 0) /*DF*/{
					$query="update {$phpbbdb}{$this->data['config']['forum_prefix']}users u inner join {$roster->db->prefix}members m inner join {$roster->db->prefix}players p
						set u.user_sig = concat(\"[img]\", '$sig[0]', m.name, '$sig[1]', \"[/img]\") 
						where ucase(u.{$this->data['config']['char_field']}) = ucase(m.name)
						and p.name=m.name
						and user_sig is null"; /*only updates people with blank signatures*/
				}
				if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
					$query="update {$phpbbdb}{$this->data['config']['forum_prefix']}users u inner join {$roster->db->prefix}members m inner join {$roster->db->prefix}players p
						set u.user_sig = concat(\"[img]\", '$sig[0]', m.name, '$sig[1]', \"[/img]\") 
						where ucase(u.{$this->data['config']['char_field']}) = ucase(m.name)
						and p.name=m.name
						and user_sig is null"; /*only updates people with blank signatures*/
				}
				$result = $roster->db->query ( $query );
				$this->messages .= "<span class=\"green\">{$roster->locale->act['SigUpdated']}</span><br />\n";
				
			}
			if ($this->data['config']['player_enable_avatar'] == true){
				//Will only change avatar if currently blank.gif. Need to add an option for overwriting.
				//have to split the setting to avoid using replace in query, as it seems to cause a problem.
				$ava = explode("%name%",$this->data['config']['player_avatar']);
				if ($this->data['config']['forum_type'] == 0) /*DF*/{
					$query="update {$phpbbdb}{$this->data['config']['forum_prefix']}users u inner join {$roster->db->prefix}members m inner join {$roster->db->prefix}players p 
						set u.user_avatar = concat('$ava[0]', m.name, '$ava[1]')
						where ucase(u.{$this->data['config']['char_field']}) = ucase(m.name) 
						and p.name=m.name 
						and user_avatar=\"{$this->data['config']['forum_default_avatar']}\""; /*only updates people with blank avatars*/
				}
				if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
					$query="update {$phpbbdb}{$this->data['config']['forum_prefix']}users u inner join {$roster->db->prefix}members m inner join {$roster->db->prefix}players p 
						set u.user_avatar = concat('$ava[0]', m.name, '$ava[1]')
						where ucase(u.{$this->data['config']['char_field']}) = ucase(m.name) 
						and p.name=m.name 
						and user_avatar=\"{$this->data['config']['forum_default_avatar']}\""; /*only updates people with blank avatars*/
				}
				$result = $roster->db->query ( $query );
				$this->messages .= "<span class=\"green\">{$roster->locale->act['AvUpdated']}</span><br />\n";
				
			}
			if ($this->data['config']['guild_ranks'] == true){
				if ($this->data['config']['use_multirank'] == false){
					//Changes rank - unless in protected group
					//First need to create any ranks that don't exist
					if ($this->data['config']['forum_type'] == 0) /*DF*/{
						$query = "INSERT INTO `{$phpbbdb}{$this->data['config']['forum_prefix']}bbranks` (`rank_title` , `rank_min` , `rank_max`, `rank_special`, `rank_image` ) 
		 					SELECT DISTINCT m.guild_title, '-1', 0, 1, '' from {$roster->db->prefix}members m 
							left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}users u on m.name=u.{$this->data['config']['char_field']}
							left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}bbranks r on r.rank_title=m.guild_title
							where r.rank_title is null and u.{$this->data['config']['char_field']} is not null
							group by m.guild_title";
					}
					if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
						$query = "INSERT INTO `{$phpbbdb}{$this->data['config']['forum_prefix']}ranks` (`rank_title` , `rank_min` , `rank_special`, `rank_image` ) 
		 					SELECT DISTINCT m.guild_title,0, 1, '' from {$roster->db->prefix}members m 
							left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}users u on m.name=u.{$this->data['config']['char_field']}
							left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}ranks r on r.rank_title=m.guild_title
							where r.rank_title is null and u.{$this->data['config']['char_field']} is not null
							group by m.guild_title";
					}
					$result = $roster->db->query ( $query ); 
					$this->messages .= "<span class=\"green\">{$roster->locale->act['RankCreated']}</span><br />\n";
					//Then need to change user ranks based on guild title
					//simpler than groups as one-to-one relationship - no intermediate table
					if ($this->data['config']['forum_type'] == 0) /*DF*/{
						$query="update {$phpbbdb}{$this->data['config']['forum_prefix']}users u inner join {$roster->db->prefix}members m inner join {$phpbbdb}{$this->data['config']['forum_prefix']}bbranks r
							set u.user_rank = r.rank_id
							where ucase(m.name)=ucase(u.{$this->data['config']['char_field']}) 
							and m.guild_title=r.rank_title
							/*and r.rank_id=u.user_rank*/ 
							and u.user_id not in 
								(select ug1.user_id from `{$phpbbdb}{$this->data['config']['forum_prefix']}bbuser_group` ug1
								left outer join `{$phpbbdb}{$this->data['config']['forum_prefix']}bbgroups` g1 on g1.group_id=ug1.group_id
								where g1.group_id={$this->data['config']['guild_protected_group']})";
					}
					if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
						$query="update {$phpbbdb}{$this->data['config']['forum_prefix']}users u inner join {$roster->db->prefix}members m inner join {$phpbbdb}{$this->data['config']['forum_prefix']}ranks r
							set u.user_rank = r.rank_id
							where ucase(m.name)=ucase(u.{$this->data['config']['char_field']}) 
							and m.guild_title=r.rank_title
							/*and r.rank_id=u.user_rank*/ 
							and u.user_id not in 
								(select ug1.user_id from `{$phpbbdb}{$this->data['config']['forum_prefix']}user_group` ug1
								left outer join `{$phpbbdb}{$this->data['config']['forum_prefix']}groups` g1 on g1.group_id=ug1.group_id
								where g1.group_id={$this->data['config']['guild_protected_group']})";
					}
					$result = $roster->db->query ( $query );
					$this->messages .= "<span class=\"green\">{$roster->locale->act['RankUpdated']}</span><br />\n";
				}
				else{
					//First create ranks that don't exist
					if ($this->data['config']['forum_type'] == 0) /*DF*/{
						$query = "INSERT INTO `{$phpbbdb}{$this->data['config']['forum_prefix']}bbranks` (`rank_title` , `rank_min` , `rank_max`, `rank_special`, `rank_image` ) 
		 					SELECT mp.ranks, '-1', 0, 1, '' from (";
	 					$first=true;
	 					for($i=1;$i<=5;$i++){
		 					if ($this->data['config']['multirank_'.$i]!=''){
			 					if ($first==false){
				 					$query .= "UNION ALL ";
		 						}else{
			 						$first=false;
			 					}
		 						$query .="SELECT DISTINCT {$this->data['config']['multirank_'.$i]} as ranks from {$roster->db->prefix}members members
									left outer join {$roster->db->prefix}players players on players.name=members.name
									left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}bbranks r on {$this->data['config']['multirank_'.$i]}=r.rank_title
									left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}users u on members.name=u.{$this->data['config']['char_field']}
									where r.rank_title is null
									and u.{$this->data['config']['char_field']} is not null
									and {$this->data['config']['multirank_'.$i]} is not null ";
				 			}
	 					}
	 					$query .= ") mp";			
					}
					if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
						//Test DF first
						$query = "INSERT INTO `{$phpbbdb}{$this->data['config']['forum_prefix']}ranks` (`rank_title` , `rank_min`, `rank_special`, `rank_image` ) 
		 					SELECT mp.ranks, 0, 1, '' from (";
	 					$first=true;
	 					for($i=1;$i<=5;$i++){
		 					if ($this->data['config']['multirank_'.$i]!=''){
			 					if ($first==false){
				 					$query .= "UNION ALL ";
		 						}else{
			 						$first=false;
			 					}
		 						$query .="SELECT DISTINCT {$this->data['config']['multirank_'.$i]} as ranks from {$roster->db->prefix}members members
									left outer join {$roster->db->prefix}players players on players.name=members.name
									left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}ranks r on {$this->data['config']['multirank_'.$i]}=r.rank_title
									left outer join {$phpbbdb}{$this->data['config']['forum_prefix']}users u on members.name=u.{$this->data['config']['char_field']}
									where r.rank_title is null
									and u.{$this->data['config']['char_field']} is not null
									and {$this->data['config']['multirank_'.$i]} is not null ";
				 			}
	 					}
	 					$query .= ") mp";	
					}
					$result = $roster->db->query ( $query );
					//Next, we need to add people to all the ranks. Ugly SQL alert.
					if ($this->data['config']['forum_type'] == 0) /*DF*/{
						$query ="UPDATE {$phpbbdb}{$this->data['config']['forum_prefix']}users u inner join {$roster->db->prefix}members members inner join {$roster->db->prefix}players players ";
						for($i=1;$i<=5;$i++){
			 				if ($this->data['config']['multirank_'.$i]!=''){
				 				$query .="inner join {$phpbbdb}{$this->data['config']['forum_prefix']}bbranks r{$i} ";
			 				}
		 				}
		 				$first=true;
		 				for($i=1;$i<=5;$i++){
							if ($this->data['config']['multirank_'.$i]!=''){
								if ($i==1){$rankcol="user_rank";}else{$rankcol="user_rank".$i;}
								if ($first==false){
				 					$query .= ", {$rankcol}=r{$i}.rank_id ";
		 						}else{
			 						$first=false;
			 						$query .= "SET {$rankcol}=r{$i}.rank_id ";
			 					}
							}
						}
						$first=true;
		 				for($i=1;$i<=5;$i++){
							if ($this->data['config']['multirank_'.$i]!=''){
								if ($first==false){
				 					$query .= " and r{$i}.rank_title={$this->data['config']['multirank_'.$i]} ";
		 						}else{
			 						$first=false;
			 						$query .= "WHERE r{$i}.rank_title={$this->data['config']['multirank_'.$i]} ";
			 					}
							}
						}
						$query .="AND ucase(u.{$this->data['config']['char_field']})=ucase(members.name) and members.name=players.name";
					}
					if ($this->data['config']['forum_type'] == 1) /*phpBB3*/{
						$query ="UPDATE {$phpbbdb}{$this->data['config']['forum_prefix']}users u inner join {$roster->db->prefix}members members inner join {$roster->db->prefix}players players ";
						for($i=1;$i<=5;$i++){
			 				if ($this->data['config']['multirank_'.$i]!=''){
				 				$query .="inner join {$phpbbdb}{$this->data['config']['forum_prefix']}ranks r{$i} ";
			 				}
		 				}
		 				$first=true;
		 				for($i=1;$i<=5;$i++){
							if ($this->data['config']['multirank_'.$i]!=''){
								if ($i==1){$rankcol="user_rank";}else{$rankcol="user_rank".$i;}
								if ($first==false){
				 					$query .= ", {$rankcol}=r{$i}.rank_id ";
		 						}else{
			 						$first=false;
			 						$query .= "SET {$rankcol}=r{$i}.rank_id ";
			 					}
							}
						}
						$first=true;
		 				for($i=1;$i<=5;$i++){
							if ($this->data['config']['multirank_'.$i]!=''){
								if ($first==false){
				 					$query .= " and r{$i}.rank_title={$this->data['config']['multirank_'.$i]} ";
		 						}else{
			 						$first=false;
			 						$query .= "WHERE r{$i}.rank_title={$this->data['config']['multirank_'.$i]} ";
			 					}
							}
						}
						$query .="AND ucase(u.{$this->data['config']['char_field']})=ucase(members.name) and members.name=players.name";
					}
					$result = $roster->db->query ( $query );
					$this->messages .= "<span class=\"green\">{$roster->locale->act['RankUpdated']}</span><br />\n";
				}
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
//May add some functions here for updating some character specific items - sig, avatar, location, but not ranks or groups (for security).
 		return true;
	}

	function char_post( $data )
	{
		global $roster;

		return true;
	}

}