<?php
/**
 * WoWRoster.net WoWRoster
 *
 * ArmorySync guild memberlist update
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    ArmorySync
*/

if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

$title = "<h3>". $roster->locale->act['armorySyncTitle_Guildmembers']. "</h3>\n";

// ----[ Check log-in ]-------------------------------------
$roster_login = new RosterLogin();
// Disallow viewing of the page
if( $roster_login->getAuthorized() < 2 )
{

    print
    '<span class="title_text">'. $title. '</span><br />'.
    $roster_login->getMessage().
    $roster_login->getLoginForm(2);

} else {
// ----[ Check log-in ]-------------------------------------

    require_once ($addon['dir'] . 'inc/armorysyncjob.class.php');
    
    if ( isset($_REQUEST['guild']) && !isset($_REQUEST['job_id'])) {
        
        $job = new ArmorySyncJob();
        $job->title = $title;
        if ( $job->prepare_updateMemberlist() ) {
            $ret = $job->update_statusMemberlist();
            $job->show_statusMemberlist();
            if ( $ret ) {
                $job->link_guildMemberlist();
            }
        } else {
            $job->nothing_to_do();
        }
    
    } elseif ( isset($_REQUEST['guild']) && isset($_REQUEST['job_id'])) {
    
        $job = new ArmorySyncJob();
        $job->title = $title;
        $job->jobid = $_REQUEST['job_id'];
        $ret = $job->update_statusMemberlist();
        if ( $ret ) {
            $ret = $job->update_statusMemberlist();
        }
        $job->show_statusMemberlist();
        if ( $ret ) {
            $job->link_guildMemberlist();
        }
    
    } else {
        print "No Guild given<br>";
    }
}
