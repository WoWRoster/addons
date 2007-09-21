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
//A good majority of the code here was based off of Character Info and borrowed from there.

if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

if( isset($_POST['process']) && $_POST['process'] != '' )
{
	$roster_config_message = processData();
}


//Check to make sure database field exists, if not create it.
$fieldExists = '';
$query = "SELECT * FROM `{$addon['config']['forum_prefix']}membergroups`";
$result = $roster->db->query ( $query );
$i = mysql_num_fields( $result ) - 1;
while ($i > -1){
	$meta = mysql_fetch_field($result, $i);
	if ($meta->name == "rosterGroup"){
		$fieldExists = true;
	}
	$i--;
}

if ($fieldExists != true){
	$query = "ALTER TABLE `{$addon['config']['forum_prefix']}membergroups` ADD `rosterGroup` VARCHAR( 128 ) NOT NULL ;";
	$result = $roster->db->query ( $query );
}

$query = "SELECT * FROM `{$addon['config']['forum_prefix']}membergroups` ORDER BY `ID_GROUP` ASC";
$result = $roster->db->query( $query );

//Start table
$body = '';
$body .= "<div id=\"char_disp\">\n" . border('sblue','start',$roster->locale->act['admin']['group_permissions']) . "\n<table cellspacing=\"0\" cellpadding=\"0\" class=\"bodyline\">\n";
$body .= '
	<tr>
		<th class="membersHeader">
			Group name
		</th>
		<th class="membersHeader">
			Permission
		</th>
	</tr>'."\n";

$i=0;
while ($row = $roster->db->fetch ( $result ) ){
	$body .= '	<tr>'."\n";
	$body .= '		<td class="membersRow' . (($i%2)+1) . '">'."\n";
	$body .= '			'.$row['groupName']."\n";
	$body .= '		</td>'."\n";
	$body .= '		<td class="membersRow' . (($i%2)+1) . '">';//."\n";
	$body .= '			'.levels ( $row['ID_GROUP'], $row['rosterGroup'] )."\n";
	$body .= '		</td>'."\n";
	$body .= '	</tr>'."\n";

	$i++;
}
//Close table
$body .= "</table>\n" . border('syellow','end') . "\n</div>\n";

//Build the rest of the page
$body = $roster_login->getMessage() . "<br />
<form action=\"\" method=\"post\" enctype=\"multipart/form-data\" id=\"config\" onsubmit=\"return confirm('" . $roster->locale->act['confirm_config_submit'] . "');submitonce(this);\">
	$body
<br /><br />\n<input type=\"submit\" value=\"" . $roster->locale->act['config_submit_button'] . "\" />\n<input type=\"reset\" name=\"Reset\" value=\"" . $roster->locale->act['config_reset_button'] . "\" onclick=\"return confirm('" . $roster->locale->act['confirm_config_reset'] . "')\"/>\n<input type=\"hidden\" name=\"process\" value=\"process\" />\n
</form>";

//Make the menu
$tab1 = explode('|',$roster->locale->act['admin']['smf_menu_main']);
$tab2 = explode('|',$roster->locale->act['admin']['smf_menu_permissions']);

$menu = messagebox('
<ul class="tab_menu">
	<li><a href="' . makelink('rostercp-addon-smfsync') . '" style="cursor:help;"' . makeOverlib($tab1[1],$tab1[0],'',1,'',',WRAP') . '>' . $tab1[0] . '</a></li>
	<li class="selected"><a href="' . makelink('rostercp-addon-smfsync-permissions') . '" style="cursor:help;"' . makeOverlib($tab2[1],$tab2[0],'',1,'',',WRAP') . '>' . $tab2[0] . '</a></li>
</ul>
',$roster->locale->act['roster_config_menu'],'sgray','145px');

function levels( $rank, $set=0 ){
	global $roster;
	$return = "\n";

	$return .= '			<select name="rank_' . $rank . '">'."\n";

	$return .= '				<option value="3" ';
	if ($set == 3){$return .= 'selected="selected"';}
	$return .= '>'.$roster->locale->act['Admin'].'</option>'."\n";

	$return .= '				<option value="2" ';
	if ($set == 2){$return .= 'selected="selected"';}
	$return .= '>'.$roster->locale->act['Officer'].'</option>'."\n";

	$return .= '				<option value="1" ';
	if ($set == 1){$return .= 'selected="selected"';}
	$return .= '>'.$roster->locale->act['Guild'].'</option>'."\n";

	$return .= '				<option value="0" ';
	if ( ($set == 0) || ($set != 3 && $set !=2 && $set != 1) ){$return .= 'selected="selected"';}
	$return .= '>'.$roster->locale->act['Public'].'</option>'."\n";

	$return .= '			</select>';

	return $return;
}

function processData(){
	//
	global $roster;
	global $addon;

	foreach ($_POST as $settingName => $settingValue){
		$tabs = explode('_',$settingName);
		if ($tabs[0] == 'rank'){
			//UPDATE `smf_membergroups` SET `rosterGroup` = '3' WHERE `smf_membergroups`.`ID_GROUP` =1 LIMIT 1 ;
			$query = "UPDATE `{$addon['config']['forum_prefix']}membergroups` SET `rosterGroup` = '{$settingValue}' WHERE `ID_GROUP` = '{$tabs[1]}' LIMIT 1";
			$result = $roster->db->query ( $query );
		}
	}
}