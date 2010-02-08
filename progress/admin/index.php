<?php


if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

$roster->output['html_head'] = '<script src="http://www.wowhead.com/widgets/power.js"></script>';
$roster->output['html_head'] = '
<script src="'.$addon['url_path'] . 'css/SpryTooltip.js" type="text/javascript"></script>
<link href="'.$addon['url_path'] . 'css/samples.css" rel="stylesheet" type="text/css" />
<link href="'.$addon['url_path'] . 'style.css" rel="stylesheet" type="text/css" />
<link href="'.$addon['url_path'] . 'css/SpryTooltip.css" rel="stylesheet" type="text/css" />';
//$roster->output['body_onload'] .= 'initARC(\'rp_menu\',\'radioOn\',\'radioOff\',\'checkboxOn\',\'checkboxOff\');';
include( $addon['dir'] . 'inc/functions.php' );
//$roster->output['show_menu'] = false;

$roster->scope = 'guild';
$roster->get_scope_data();
$prog = new prog;	
$bosscfg = $prog->getConfigDataboss($roster->db->table('boss',$addon['basename']));
$instcfg = $prog->getConfigDatainst($roster->db->table('inst_table',$addon['basename']));
$lootcfg = $prog->getConfigDataloots($roster->db->table('loot_table',$addon['basename']));
$form = '';
$html = '';    

$menu = '
'.border('sgray','start',$roster->locale->act['admin']['config']).'
<table align="center" width="100%">
<tr>
<td >
'.$roster->locale->act['admin']['config'].'
<select name="guild" onchange="window.location.href=this.options[this.selectedIndex].value;">
<option value="" selected="selected">-None-</option>

<option value="'.makelink('&amp cfg=loot').'" '.($_GET['cfg'] == 'loot' ? 'selected="selected"' : '' ).'>'.$roster->locale->act['admin']['loot'].'</option>
<option value="'.makelink('&amp cfg=boss').'" '.($_GET['cfg'] == 'boss' ? 'selected="selected"' : '' ).'>'.$roster->locale->act['admin']['boss'].'</option>
<option value="'.makelink('&amp cfg=mod').'" '.($_GET['cfg'] == 'mod' ? 'selected="selected"' : '' ).'>'.$roster->locale->act['admin']['mod'].'-</option>
</select>
</form>
</td></tr></table>
'.border('sgray','end','').'
<br>';


if (!isset($_GET['cfg']))
{

echo ''.border('sgreen','start',$roster->locale->act['admin']['main']).'
<table align="center" width="400">
<tr>


<td width="800" valign="top">'.$roster->locale->act['admin']['main_text'];

echo '
<form action="index.php?p=rostercp-addon-progress&amp;a=g:1" name="list_select" method="post" style="margin:0;">
'.$roster->locale->act['admin']['config'].'
<select name="guild" onchange="window.location.href=this.options[this.selectedIndex].value;">
<option value="" selected="selected">-None-</option>
<option value="'.makelink('&amp cfg=loot').'" '.($_GET['cfg'] == 'loot' ? 'selected="selected"' : '' ).'>'.$roster->locale->act['admin']['loot'].'</option>
<option value="'.makelink('&amp cfg=boss').'" '.($_GET['cfg'] == 'boss' ? 'selected="selected"' : '' ).'>'.$roster->locale->act['admin']['boss'].'</option>
<option value="'.makelink('&amp cfg=mod').'" '.($_GET['cfg'] == 'mod' ? 'selected="selected"' : '' ).'>'.$roster->locale->act['admin']['mod'].'-</option>
</select>
</form>'.
"</td>
</tr>
</table>
".border('sgreen','end','')."";
} 

if (isset($_GET['cfg']))
{
ob_start();
include_once( $addon['dir'].'admin/'.$_GET['cfg'].'.php' );
$page = ob_get_contents();
ob_end_clean();
echo $page;
}






