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
if( $roster_login->getAuthorized() < 3 )
{

    print
    '<span class="title_text">'. $title. '</span><br />'.
    $roster_login->getMessage().
    $roster_login->getLoginForm(3);

} else {
// ----[ Check log-in ]-------------------------------------

    
    if ( isset($_POST['process']) && $_POST['process'] == 'process' ) {
        
        if ( isset($_POST['action']) && $_POST['action'] == 'add' ) {
            
            if ( isset($_POST['name']) && isset($_POST['server']) && isset($_POST['region']) ) {
                
                $name = urldecode(trim(stripslashes( $_POST['name'] )));
                $server = urldecode(trim(stripslashes( $_POST['server'] )));
                $region = strtoupper($_POST['region']);
                
                if ( $region == "EU" || $region == "US" ) {
                    if ( check_guild_exist( $name, $server, $_POST['region'] ) ) {
    
                        insert_uploadRule( $name, $server, $_POST['region'] );
                        if ( $id = insert_guild( $name, $server, $_POST['region'] ) ) {
                            
                            require_once ($addon['dir'] . 'inc/armorysyncjob.class.php');
                            
                            $job = new ArmorySyncJob();
                            $job->title = $title;
                            if ( $job->prepare_updateMemberlist( $id, $name, $server, $region ) ) {
                                $ret = $job->update_statusMemberlist();
                                $job->show_statusMemberlist();
                                if ( $ret ) {
                                    $job->link_guildMemberlist( $id );
                                }
                            } else {
                                $job->nothing_to_do();
                            }
                        } else {
                            $html = "&nbsp;&nbsp;".
                                    $roster->locale->act['error_guild_insert'].
                                    "&nbsp;&nbsp;";
                            print messagebox( $html , $roster->locale->act['error'] , $style='sred' , '' );
                        }
                    } else {
                        $html = "&nbsp;&nbsp;".
                                $roster->locale->act['error_guild_notexist'].
                                "&nbsp;&nbsp;";
                        print messagebox( $html , $roster->locale->act['error'] , $style='sred' , '' );
                    }
                } else {

                    $html = "&nbsp;&nbsp;".
                            $roster->locale->act['error_wrong_region'].
                            "&nbsp;&nbsp;";
                    print messagebox( $html , $roster->locale->act['error'] , $style='sred' , '' );
                }
            } else {
                
                $html = "&nbsp;&nbsp;".
                        $roster->locale->act['error_missing_params'].
                        "&nbsp;&nbsp;";
                print messagebox( $html , $roster->locale->act['error'] , $style='sred' , '' );
            }
        }
    
    } else {
        $body = '';
        $body .= '<form action="' . makelink() . '" method="post" id="allow">
        <input type="hidden" id="addguild" name="action" value="" />
        <input type="hidden" name="process" value="process" />
        <input type="hidden" name="block" value="allow" />';
        
        $body .= ruletable_head('sgreen',$roster->locale->act['armorysync_guildadd'],'addguild','');
        $body .= ruletable_foot('sgreen','addguild','');
        
        $body .= '</form>';
        
        $body .= "<br />\n";
        $body .= messagebox($roster->locale->act['armorysync_guildadd_helpText'],'<img src="' . $roster->config['img_url'] . 'blue-question-mark.gif" alt="?" style="float:right;" />' . $roster->locale->act['armorysync_guildadd_help'],'sgray');
        
        print $body;
    }
}





function ruletable_head( $style , $title , $type , $mode )
{
	global $roster;

	$output = border($style,'start',$title) . '
<table class="bodyline" cellspacing="0">
	<thead>
		<tr>
';

        $name = $roster->locale->act['guildname'];

	$output .= '
			<th class="membersHeader" ' . makeOverlib($name) . '> ' . $roster->locale->act['guildname'] . '</th>
			<th class="membersHeader" ' . makeOverlib($roster->locale->act['realmname']) . '> ' . $roster->locale->act['server'] . '</th>
			<th class="membersHeader" ' . makeOverlib($roster->locale->act['regionname']) . '> ' . $roster->locale->act['region'] . '</th>
			<th class="membersHeaderRight">&nbsp;</th>
		</tr>
	</thead>
	<tbody>' . "\n";
	return $output;
}


function ruletable_foot( $style , $type , $mode )
{
	global $roster;

	$output = "\n\t\t<tr>\n";

	$output .= '
			<td class="membersRow2"><input class="wowinput128" type="text" name="name" value="" /></td>
			<td class="membersRow2"><input class="wowinput128" type="text" name="server" value="" /></td>
			<td class="membersRow2"><input class="wowinput64" type="text" name="region" value="" /></td>
			<td class="membersRowRight2"><button type="submit" class="input" onclick="setvalue(\'' . $type . '\',\'add\');">' . $roster->locale->act['add'] . '</button></td>
		</tr>
	</tbody>
</table>
' . border($style,'end');
	return $output;
}

function check_guild_exist( $name, $server, $region ) {
    global $addon;
    
    require_once ($addon['dir'] . 'inc/armorysync.class.php');
    
    $as = new ArmorySync;
    return $as->checkGuildInfo( $name, $server, $region );
}

function insert_uploadRule( $name, $server, $region ) {
    global $roster;
    
    $query =    "INSERT ".
                "INTO `". $roster->db->table('upload'). "` ".
                "(`name`,`server`,`region`,`type`,`default`) VALUES ".
                "('" . $_POST['name'] . "','" . $_POST['server'] . "','" . strtoupper($_POST['region']) . "','0','0');";
                
    if( !$roster->db->query($query) )
    {
            die_quietly($roster->db->error(),'Database Error',__FILE__,__LINE__,$query);
    }
}

function insert_guild( $name, $server, $region ) {
    global $roster;
    
    $query =    "INSERT ".
                "INTO `". $roster->db->table('guild'). "` ".
                "SET ".
                "`guild_name`='". $roster->db->escape($_POST['name']). "', ".
                "`server`='". $roster->db->escape($_POST['server']). "', ".
                "`region`='". $roster->db->escape($_POST['region']). "';";
                
    if( !$roster->db->query($query) )
    {
        die_quietly($roster->db->error(),'Database Error',__FILE__,__LINE__,$query);
    } else {
        $query = "SELECT LAST_INSERT_ID();";
        $jobid = $roster->db->query_first($query);
        if ( $jobid ) {
            return $jobid;
        } else {
            print "Error fetching id <br>\n";
            return false;
        }
    }
}
