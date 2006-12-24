<?php
/******************************
 * WoWRoster.net  Roster
 * Copyright 2002-2006
 * Licensed under the Creative Commons
 * "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * Short summary
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/
 *
 * Full license information
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/legalcode
 ******************************/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

$query = "SELECT `name`, `member_id` FROM `".ROSTER_MEMBERSTABLE."` as members";
$memberresult = $wowdb->query( $query ) or die_quietly( $wowdb->error() );
if ( $roster_conf['sqldebug'] )
{
	echo "<!--$query-->\n";
}

$messages = '';

while ($row = $wowdb->fetch_array($memberresult))
{
	$member_name = $row['name'];
	$member_id = $row['member_id'];
	include($addonDir.'update.php');
	$messages .= "<br />\n";
}

$wowdb->free_result($memberresult);

$sqlstringout = $wowdb->getSQLStrings();
$errorstringout = $wowdb->getErrors();

// print the error messages
if( !empty($errorstringout) )
{
	print
	'<div id="errorCol" style="display:inline;">
		'.border('sred','start',"<div style=\"cursor:pointer;width:550px;\" onclick=\"swapShow('errorCol','error')\"><img src=\"".$roster_conf['img_url']."plus.gif\" style=\"float:right;\" /><span class=\"red\">Update Errors</span></div>").'
		'.border('sred','end').'
	</div>
	<div id="error" style="display:none">
	'.border('sred','start',"<div style=\"cursor:pointer;width:550px;\" onclick=\"swapShow('errorCol','error')\"><img src=\"".$roster_conf['img_url']."minus.gif\" style=\"float:right;\" /><span class=\"red\">Update Errors</span></div>").
	$errorstringout.
	border('sred','end').
	'</div>';

	// Print the downloadable errors separately so we can generate a download
	print "<br />\n";
	print '<form method="post" action="update.php" name="post">'."\n";
	print '<input type="hidden" name="data" value="'.htmlspecialchars(stripAllHtml($errorstringout)).'" />'."\n";
	print '<input type="hidden" name="send_file" value="error" />'."\n";
	print '<input type="submit" name="download" value="Save Error Log" />'."\n";
	print '</form>';
	print "<br />\n";
}

// Print the update messages
print
	border('syellow','start','Update Log').
	'<div style="font-size:10px;background-color:#1F1E1D;text-align:left;height:300px;width:550px;overflow:auto;">'.
	$messages.
	'</div>'.
	border('syellow','end');

// Print the downloadable messages separately so we can generate a download
print "<br />\n";
print '<form method="post" action="'.$roster_conf['roster_dir'].'/admin/update.php" name="post">'."\n";
print '<input type="hidden" name="data" value="'.htmlspecialchars(stripAllHtml($messages)).'" />'."\n";
print '<input type="hidden" name="send_file" value="update" />'."\n";
print '<input type="submit" name="download" value="Save Update Log" />'."\n";
print '</form>';
print "<br />\n";

if( $roster_conf['sqldebug'] )
{
	print
	'<div id="sqlDebugCol" style="display:inline;">
		'.border('sgray','start',"<div style=\"cursor:pointer;width:550px;\" onclick=\"swapShow('sqlDebugCol','sqlDebug')\"><img src=\"".$roster_conf['img_url']."plus.gif\" style=\"float:right;\" />SQL Queries</div>").'
		'.border('sgray','end').'
	</div>
	<div id="sqlDebug" style="display:none">
	'.border('sgreen','start',"<div style=\"cursor:pointer;width:550px;\" onclick=\"swapShow('sqlDebugCol','sqlDebug')\"><img src=\"".$roster_conf['img_url']."minus.gif\" style=\"float:right;\" />SQL Queries</div>").'
	<div style="font-size:10px;background-color:#1F1E1D;text-align:left;height:300px;width:560px;overflow:auto;">'.
		nl2br(sql_highlight($wowdb->getSQLStrings())).
	'</div>
	'.border('sgreen','end').
	'</div>';


	// Print the downloadable sql separately so we can generate a download
	print "<br />\n";
	print '<form method="post" action="'.$roster_conf['roster_dir'].'/admin/update.php" name="post">'."\n";
	print '<input type="hidden" name="data" value="'.htmlspecialchars($wowdb->getSQLStrings()).'" />'."\n";
	print '<input type="hidden" name="send_file" value="sql" />'."\n";
	print '<input type="submit" name="download" value="Save SQL Log" />'."\n";
	print '</form>';
}
?>