<?php
/**
 * WoWRoster.net WoWRoster
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $ v2.0 Titan99  $
 * @link       http://www.wowroster.net
 * @package    Key_BC
 * @subpackage Admin
*/
if(isset($_POST['action']))
{
  if($_POST['action']=='add')
  {
	$query="INSERT INTO `" . $roster->db->table('Key','Key_BC') . "` ( `id` , `lang` , `id_display` , `instance_name` , `key_name` , `Type` , `order` )
		VALUES (
		'".addslashes($_POST['id'])."', '".$roster->config['locale']."',
		'".addslashes($_POST['id_display'])."', '".addslashes($_POST['instance_name'])."',
		'".addslashes($_POST['key_name'])."', '".$_POST['Type']."',
		'".$_POST['order']."'
		);";
	
	$result_key = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', 	basename(__FILE__),__LINE__,$query);
  }
  elseif($_POST['action']=='change')
  {
	$query="UPDATE `" . $roster->db->table('Key','Key_BC') . "` 
		SET `id` = '".addslashes($_POST['Mid'])."',
		`id_display` = '".addslashes($_POST['Mid_display'])."',
		`instance_name` = '".addslashes($_POST['Minstance_name'])."',
		`key_name` = '".addslashes($_POST['Mkey_name'])."',
		`Type` = '".$_POST['MType']."'
		WHERE `id` = '".$_POST['AMid']."' AND `lang` = '".$roster->config['locale']."' LIMIT 1;";
		
	$result_key = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', 	basename(__FILE__),__LINE__,$query);
	
	$query="UPDATE `" . $roster->db->table('Quest','Key_BC') . "` 
		SET `id` = '".addslashes($_POST['Mid'])."'
		WHERE `id` = '".$_POST['AMid']."';";
		
	$result_key = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', 	basename(__FILE__),__LINE__,$query);
  }
  else
  {
	$tab=explode("_",$_POST['action']);
	if($tab[0]=='del')
	{
	$query="DELETE FROM `" . $roster->db->table('Key','Key_BC') . "` 
		WHERE `id` = '".$tab[1]."' AND `lang` = '".$roster->config['locale']."' LIMIT 1;";
	
	$result_key = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', 	basename(__FILE__),__LINE__,$query);
	
	$query="DELETE FROM `" . $roster->db->table('Quest','Key_BC') . "` 
		WHERE `id` = '".$tab[1]."' AND `lang` = '".$roster->config['locale']."' LIMIT 1;";
	
	$result_key = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', 	basename(__FILE__),__LINE__,$query);
	}
  }
}

echo '<form action="' . makelink() . '" method="post" id="allow">
	<input type="hidden" id="action" name="action" value="" />';

require_once('admin_key.php');

if(isset($_POST['check'])&&$_POST['check']!='')
{
	echo '<br/><br/>';
	
	require_once('admin_key_change.php');
	
	echo '<br/><br/>';
	

	if($Type=='Quests')
	{
		require_once('admin_quest.php');
		echo '<br/><br/>';
		if($Q_id!='')
 			require_once('admin_quest_change.php');
	}
	elseif($Type=='Reputation')
		require_once('admin_reput.php');
		
}//end if(isset($_POST['check'])&&$_POST['check']==$row['id'])

echo "</form>";

?>
