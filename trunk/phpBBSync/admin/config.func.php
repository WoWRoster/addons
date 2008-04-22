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

function getGroups($values){
	global $roster;
	global $addon;
	
	if (!$addon['config']['forum_prefix'] || $addon['config']['forum_prefix'] == ''){
		return 'Set forum_prefix.';
		//need to check group tables exist
	}
	if ($addon['config']['forum_type'] == 0) /*DF*/{
		$query = "SHOW TABLES LIKE '{$addon['config']['forum_prefix']}bbgroups'";
		$result = $roster->db->query ( $query );
		if ($roster->db->num_rows($result)==0){
			return "{$addon['config']['forum_prefix']}bbgroups table does not exist";
		}
		$query = "SHOW TABLES LIKE '{$addon['config']['forum_prefix']}users'";
		$result = $roster->db->query ( $query );
		if (!$result){
			return "{$addon['config']['forum_prefix']}users table does not exist";
		}
		$query = "SHOW TABLES LIKE '{$addon['config']['forum_prefix']}bbuser_group'";
		$result = $roster->db->query ( $query );
		if (!$result){
			return "{$addon['config']['forum_prefix']}bbuser_group table does not exist";
		}
	
		$configName = $values['name'];
		$query = "SELECT * FROM `{$addon['config']['forum_prefix']}bbgroups` where group_single_user=0 order by group_name";
	}
	if ($addon['config']['forum_type'] == 1) /*phpBB3*/{
		$configName = $values['name'];
		$query = "SELECT * FROM `{$addon['config']['forum_prefix']}groups` where group_type!=3 order by group_name";
	}
	$result = $roster->db->query ( $query );
	$return = '<select name="config_' . $configName . '">';
	if ($addon['config'][$configName] == 0){
		$return .= '<option value="0" selected="selected">-[ Disabled ]-</option>';
	}else{
		$return .= '<option value="0">Disabled</option>';
	}

	while ($row = $roster->db->fetch ( $result ) ){

		if ($row['group_id'] == $addon['config'][$configName]){
			$return .= '<option value="'. $row['group_id'] .'" selected="selected">-[ '. $row['group_name'] .' ]-</option>';
		}else{
			$return .= '<option value="'. $row['group_id'] .'">'. $row['group_name'] .'</option>';
		}
	}
	$return .= '</select>';
	return $return;
}


function getGuildList(){
	global $roster;
	global $addon;

	$query = "SELECT * FROM {$roster->db->prefix}guild ORDER BY `guild_id` ASC";
	$result = $roster->db->query( $query );

	$return = '<select name="config_choose_guild">';
	if ($addon['config']['choose_guild'] == 0){
		$return .= '<option value="0" selected="selected">-[ Disabled ]-</option>';
	}else{
		$return .= '<option value="0">Disabled</option>';
	}

	while ($row = $roster->db->fetch( $result ) ){
		if ($row['guild_id'] == $addon['config']['choose_guild']){
			$return .= '<option value="'. $row['guild_id'].'" selected="selected">-[ '.$row['guild_name'].']-</option>';
		}else{
			$return .= '<option value="' . $row['guild_id'] . '">' . $row['guild_name'] . '</option>';
		}

	}
	$return .= "</select>";
	$roster->db->free_result($result);
	return $return;
}

function topBox(){
	global $roster;
	global $addon;
	$return = '';
	if ($addon['config']['choose_guild'] == 0){
		//UPDATE `roster20_addon_config` SET `config_value` = '1' WHERE `addon_id` =49 AND `id` =1100 LIMIT 1 ;
		$query = "UPDATE {$roster->db->prefix}addon_config SET `config_value` = '0' WHERE `addon_id` =
					'{$addon['addon_id']}' AND `config_name` = 'main_enable' ";
		$result = $roster->db->query ( $query );
		//return messagebox("Guild must be selected before enabling.","Warning");
		$return .= messagebox("Guild must be selected before enabling.","Warning");
	}
	if($addon['config']['forum_prefix']==''){
		$query = "UPDATE {$roster->db->prefix}addon_config SET `config_value` = '0' WHERE `addon_id` =
					'{$addon['addon_id']}' AND `config_name` = 'main_enable' ";
		$result = $roster->db->query ( $query );
		$return .= messagebox("Forum prefix incorrect.","Warning");
	}
	return $return;
}

