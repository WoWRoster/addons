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

function GetGuildList(){
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
	if ($addon['config']['choose_guild'] == 0){	
		//UPDATE `roster20_addon_config` SET `config_value` = '1' WHERE `addon_id` =49 AND `id` =1100 LIMIT 1 ;
		$query = "UPDATE {$roster->db->prefix}addon_config SET `config_value` = '0' WHERE `addon_id` = '{$addon['addon_id']}' AND `config_name` = 'main_enable' ";
		$result = $roster->db->query ( $query );
		return messagebox("Guild must be selected before enabling.","Warning");
	}
}