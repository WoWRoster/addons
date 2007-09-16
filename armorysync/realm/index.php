<?php
/**
 * WoWRoster.net WoWRoster
 *
 * index file for realms
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

$title = "<h3>". $roster->locale->act['armorySyncTitle_Realm']. "</h3>\n";

// ----[ Check log-in ]-------------------------------------
$roster_login = new RosterLogin();
// Disallow viewing of the page
if( $roster_login->getAuthorized() < 3 )
{

    print
    '<span class="title_text">'. $title. '</span><br />'.
    $roster_login->getMessage().
    $roster_login->getLoginForm(3);

} else {
// ----[ Check log-in ]-------------------------------------
    
    require_once ($addon['dir'] . 'inc/armorysyncjob.class.php');
    
    if ( isset($_REQUEST['realm']) && !isset($_REQUEST['job_id'])) {
        
        $job = new ArmorySyncJob();
        if ( $job->prepare_update() ) {
            $ret = $job->update_status();
            $job->title = $title;
            $job->show_status();
            if ( $ret ) {
                $job->link_realm();
            }
        } else {
            $job->nothing_to_do();
        }
        
    } elseif ( isset($_REQUEST['realm']) && isset($_REQUEST['job_id'])) {
    
        //print "This is Jobs next step. Job ID: ". $_REQUEST['job_id']. "<br>\n";
        
        $job = new ArmorySyncJob();
        $job->jobid = $_REQUEST['job_id'];
        $ret = $job->update_status();
        if ( $ret ) {
            $ret = $job->update_status();
        }
        $job->title = $title;
        $job->show_status();
        if ( $ret ) {
            $job->link_realm();
        }
    
    } else {
        $title .= "No Member given<br>";
    }
}