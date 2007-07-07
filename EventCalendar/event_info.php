<?php

/**
 * WoWRoster.net EventCalendar
 *
 * Event Calendar is a Roster addon that will show upcoming events from ingame
 * WoW addons GuildEventManager (GEM) or GroupCalendar
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2006-2007 PoloDude
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    1.0.3
 * @svn        SVN: $Id$
 * @author     PoloDude
 * @link       http://www.wowroster.net/Forums/viewforum/f=59.html
 *
*/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

global $ec_wordings, $roster_conf;

require_once 'lib/wowdb.php';

$eventid = $_REQUEST['event'];

// Get all eventinfo
$query = 'SELECT * FROM `'.$db_prefix.'events` WHERE eventid="'.$eventid.'"';
if ($roster_conf['sqldebug'])
{
	print "<!-- $query -->\n";
}
$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
$row = $wowdb->fetch_array($result);

$title_col = '<div style="cursor:pointer;width:240px;" onclick="swapShow(\'info_col\',\'info_full\')"><img src="'.$roster_conf['img_url'].'plus.gif" style="float:right;" />';
$title_col .= date($addon_conf['EventCalendar']['EventDate'],strtotime($row['date']));
$title_col .= '</div>';

$title_full = '<div style="cursor:pointer;width:240px;" onclick="swapShow(\'info_col\',\'info_full\')"><img src="'.$roster_conf['img_url'].'minus.gif" style="float:right;" />';
$title_full .= date($addon_conf['EventCalendar']['EventDate'],strtotime($row['date']));
$title_full .= '</div>';

// Show collapsed infobox
echo '<div id="info_col">';
// Display the Top / left side of the Stylish Border
echo border('syellow', 'start', $title_col);
// Make a table with back link
echo '<table width="250px" cellpadding="0" cellspacing="0">';
echo '<th><td style="text-align:center" class="membersHeader">';
echo '<a href="addon.php?roster_addon_name=EventCalendar">'.$rc_wordings[$roster_conf['roster_lang']]['Back'].'</a>';
echo '</td></th>';
// Close table
echo '</table>';
// Display the Right side / Bottom of the Stylish Border
echo border('syellow','end');
echo '</div>';

// Show full infobox
echo '<div id="info_full" style="display:none;">';
// Display the Top / left side of the Stylish Border
echo border('syellow', 'start', $title_full);
// Make a table to hold the eventinfo
echo '<table width="250px"  style="color:#260A17;font-weight:bold;background-image:url(addons/EventCalendar/img/paperback.jpg);background-repeat:no-repeat;padding:20px 20px 20px 20px;margin:0;" cellpadding="0" cellspacing="0">';

echo '<tr><td valign="top">';
$zoneicon = $roster_conf['roster_dir'].'/addons/EventCalendar/img/icons/';
$zoneicon .= ($rc_wordings[$roster_conf['roster_lang']]['Zones'][$row['type']] !=''?'Icon-'.$row['type'].'.jpg':'Icon-Unknown.jpg');
$zone = ($rc_wordings[$roster_conf['roster_lang']]['Zones'][$row['type']] != ''?$rc_wordings[$roster_conf['roster_lang']]['Zones'][$row['type']]:$row['type']);
if($addon_conf['EventCalendar']['ShowIcon'])
echo '<img class="membersRowimg" src="'.$zoneicon.'" alt="'.$zone.'"  width="'.($roster_conf['index_iconsize']*2).'" height="'.($roster_conf['index_iconsize']*2).'" style="float:right;"/> ';
echo 'Date: '.date($addon_conf['EventCalendar']['EventDate'],strtotime($row['date'])).'<br/>';
echo 'Type: '.$zone;
if($row['title'] != ''){echo '<br/>Title: '.$row['title'].'<br/><br/>';}else{echo '<br/><br/>';}
if($row['note'] != '')
echo 'Note:<br/>';
echo $row['note'];
echo '</td></tr>';

// Close table
echo '</table>';

// Display the Right side / Bottom of the Stylish Border
echo border('syellow','end');
echo '</div>';


?>