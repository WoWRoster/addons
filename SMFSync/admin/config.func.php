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

if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

function getProtectedGroup(){
	global $roster;
	global $addon;
	if (!$addon['config']['forum_prefix'] || $addon['config']['forum_prefix'] == ''){
		$return = 'Set forum_prefix.';
	}else{
		$query = "SELECT * FROM `{$addon['config']['forum_prefix']}membergroups` WHERE `minPosts` = '-1'";
		//$query = "SELECT * FROM `smf_membergroups` ";
		$result = $roster->db->query ( $query );

		$return = '<select name="config_guild_protected_group">';
		if ($addon['config']['guild_protected_group'] == 0){
			$return .= '<option value="0" selected="selected">-[ Disabled ]-</option>';
		}else{
			$return .= '<option value="0">Disabled</option>';
		}

		while ($row = $roster->db->fetch ( $result ) ){
			if ($row['ID_GROUP'] == $addon['config']['guild_protected_group']){
				$return .= '<option value="'. $row['ID_GROUP'] .'" selected="selected">-[ '. $row['groupName'] .' ]-</option>';
			}else{
				$return .= '<option value="'. $row['ID_GROUP'] .'">'. $row['groupName'] .'</option>';
			}
		}
		$return .= '</select>';
	}
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
	//Check for up to date version from wowroster.net
	//$return .= updateCheck( $addon );

	return $return;
}