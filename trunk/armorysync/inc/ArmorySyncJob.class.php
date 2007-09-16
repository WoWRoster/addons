<?php
/**
 * WoWRoster.net WoWRoster
 *
 * ArmorySyncJob Library
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

if( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}


class ArmorySyncJob {
    
    var $jobid;
    var $members = array();
    var $active_member = array();
    var $time_started;
    var $title;
    
    var $done;
    var $total;
    
    var $message;
    
    var $ArmorySync;
    
    function _init() {
        global $addon;
       
        if ( ! is_object( $this->ArmorySync ) ) {
            require_once ($addon['dir'] . 'inc/ArmorySync.class.php');
            $this->ArmorySync = new ArmorySync();
        }
    }
   
    /**
     * fetch insert jobid, fill jobqueue
     *
     */
    function prepare_update() {
        global $roster, $addon;
    
        $this->time_started = gmdate('Y-m-d H:i:s');
        
        if ( $roster->scope == 'char' ) {
        
            $this->members = array(
                        array(
                                'member_id' => $roster->data['member_id'],
                                'name' => $roster->data['name'],
                                'guild_id' => $roster->data['guild_id'],
                                'guild_name' => $roster->data['guild_name'],
                                'server' => $roster->data['server'],
                                'region' => $roster->data['region'] ) );
        } elseif ( $roster->scope == 'guild' ) {
            
            $this->members = $this->_getGuildMembersToUpdate();
        } elseif ( $roster->scope == 'realm' ) {
            
            $this->members = $this->_getRealmMembersToUpdate();
        }
        
        if ( array_keys( $this->members ) ) {
            
            $this->jobid = $this->_insertJobID($this->time_started);
            $this->_insertMembersToJobqueue($this->jobid, $this->members);
            return true;
        }
        return false;
    }

    /**
     * fetch insert jobid, fill jobqueue
     *
     */
    function prepare_updateMemberlist() {
        global $roster, $addon;
    
        $this->time_started = gmdate('Y-m-d H:i:s');
            
        $this->members = array(
                    array(
                            'name' => false,
                            'member_id' => false,
                            'guild_id' => $roster->data['guild_id'],
                            'guild_name' => $roster->data['guild_name'],
                            'server' => $roster->data['server'],
                            'region' => $roster->data['region'] ) );
        
        if ( array_keys( $this->members ) ) {
            
            $this->jobid = $this->_insertJobID($this->time_started);
            $this->_insertMembersToJobqueue($this->jobid, $this->members);
            return true;
        }
        return false;
    }

    /**
     * statusbox output
     *
     * @param int $jobid
     */
    function nothing_to_do() {
        global $roster;
        
        $html = '<h3>&nbsp;&nbsp;'. $roster->locale->act['nothing_to_do']. '&nbsp;&nbsp;</h3>';
        
        print messagebox( $html , $title=$this->title , $style='syellow' , $width='' );
    }

    
    /**
     * statusbox output
     *
     * @param int $jobid
     */
    function show_status( $jobid = 0, $memberlist = false ) {
        global $roster;
        
        $members = $this->members; //_getMembersFromJobqueue( $jobid );
        
        $html = '';
        $html .= "
<script type=\"text/javascript\">
function popup(\$arg) {
	var formID = document.getElementById(\$arg);

	formID.style.display=(formID.style.display=='block'?'none':'block');
}
</script>
";
        
        
        $title = '';
        
        $title .= "
                <table align=\"center\" width=\"100%\">
                    <tr>
                        <td width=33% align=\"center\">";
        if ($this->active_member['name']) {
            $title .= $roster->locale->act['next_to_update']. $this->active_member['name'];
        }
        $title .= "      </td>
                        <td width=33% align=\"center\">";
        $title .= $this->title;
        $title .= "      </td>
                        <td width=33% align=\"right\">";
        $title .=            $this->_getProgressBar($this->done, $this->total);
        $title .= "      </td>
                    </tr>
                </table>";
        
        $html .= '<table align="center"><tr><td>';
        $html .= '<table class="border_frame">';
        if (  ! $memberlist ) {
            $html .= '
                    <th class="membersHeader ts_string">'.$roster->locale->act['name']. '</th>';
        }
        $html .= '  <th class="membersHeader ts_string">'.$roster->locale->act['guild']. '</th>
                    <th class="membersHeader ts_string">'.$roster->locale->act['realm']. '</th>
                    <th class="membersHeader ts_string">Infos<br>'.$roster->locale->act['guild_short']. '</th>';
        if (  ! $memberlist ) {
            $html .= '
                    <th class="membersHeader ts_string">Infos<br>'.$roster->locale->act['character_short']. '</th>
                    <th class="membersHeader ts_string">Infos<br>'.$roster->locale->act['skill_short']. '</th>
                    <th class="membersHeader ts_string">Infos<br>'.$roster->locale->act['reputation_short']. '</th>
                    <th class="membersHeader ts_string">Infos<br>'.$roster->locale->act['equipment_short']. '</th>
                    <th class="membersHeader ts_string">Infos<br>'.$roster->locale->act['talents_short']. '</th>';
        }
        $html .= '  <th class="membersHeader ts_string">'.$roster->locale->act['started']. '</th>
                    <th class="membersHeader ts_string">'.$roster->locale->act['finished']. '</th>
                    <th class="membersHeader ts_string">'."Log". '</th>';
        
        $i = 1;
        $l = 1;
        foreach ( $members as $member ) {
            
            $j = $i > 0 ? 1 : 2;
            $html .= "<tr class=\"membersRowColor". $j. "\">";
            if (  ! $memberlist ) {
                $html .= "
                        <td class=\"membersRowCell\">". $member['name']. "</td>";
            }
            $html .= "  <td class=\"membersRowCell\">". $member['guild_name']. "</td>
                        <td class=\"membersRowCell\">". $member['region']."-". $member['server']."</td>";
            if ( ! $memberlist ) {
                $html .= "  <td class=\"membersRowCell\"><img src='img/";
                                isset ($member['guild_info']) ?
                                    ( $member['guild_info'] == 1 ?    $html .= "pvp-win.gif'/>" :
                                                                    $html .= "pvp-loss.gif'/>" ) :
                                    $html .= "blue-question-mark.gif'/>";
            } else {
                $html .= "  <td class=\"membersRowCell\">";
                                isset ($member['guild_info']) ?
                                    $html .= $member['guild_info'] :
                                    $html .= "<img src='img/blue-question-mark.gif'/>";
            }
            $html .= "         </td>";
    
            if (  ! $memberlist ) {
                $html .= "
                            <td class=\"membersRowCell\"><img src='img/";
                            isset ($member['character_info']) ?
                                ( $member['character_info'] == 1 ?  $html .= "pvp-win.gif'" :
                                                                    $html .= "pvp-loss.gif'" ) :
                                $html .= "blue-question-mark.gif'";
                $html .= "         /></td>";
    
                $html .= "     <td class=\"membersRowCell\">";
                            isset ($member['skill_info']) ?
                                ( $member['skill_info'] >= 1 ?  $html .= $member['skill_info'] :
                                                                $html .= "<img src='img/pvp-loss.gif'/>" ) :
                                $html .= "<img src='img/blue-question-mark.gif'/>";
                $html .= "         </td>";
    
                $html .= "     <td class=\"membersRowCell\">";
                            isset ($member['reputation_info']) ?
                                ( $member['reputation_info'] >= 1 ?   $html .= $member['reputation_info'] :
                                                                    $html .= "<img src='img/pvp-loss.gif'/>" ) :
                                $html .= "<img src='img/blue-question-mark.gif'/>";
                $html .= "         </td>";
    
                $html .= "     <td class=\"membersRowCell\">";
                            isset ($member['equipment_info']) ?
                                ( $member['equipment_info'] >= 1 ?  $html .= $member['equipment_info'] :
                                                                    $html .= "<img src='img/pvp-loss.gif'/>" ) :
                                $html .= "<img src='img/blue-question-mark.gif'/>";
                $html .= "         </td>";
    
                $html .= "     <td class=\"membersRowCell\">";
                            isset ($member['talent_info']) ?
                                ($member['talent_info'] >= 1 ?   $html .= $member['talent_info'] :
                                                                $html .= "<img src='img/pvp-loss.gif'/>" ) :
                                $html .= "<img src='img/blue-question-mark.gif'/>";
                $html .= "         </td>";
            }
    
            $html .= "     <td class=\"membersRowCell\">";
                            isset ($member['starttimeutc']) ?
                                $html .= $this->_getLocalisedTime($member['starttimeutc']) :
                                $html .= "<img src='img/blue-question-mark.gif'/>";
            $html .= "         </td>";
    
            $html .= "     <td class=\"membersRowCell\">";
                            isset ($member['stoptimeutc']) ?
                                $html .= $this->_getLocalisedTime($member['stoptimeutc']) :
                                $html .= "<img src='img/blue-question-mark.gif'/>";
            $html .= "         </td>";
            
            if (  ! $memberlist ) {
                $html .= "     <td class=\"membersRowCell\">";
                                if ( isset ($member['log']) ) {
                                    $tooltip = $member['log'];
                                    $html .= "<img src='img/note.gif'". makeOverlib( $tooltip , $roster->locale->act['update_log'] , '' ,0 , '' , ',WRAP' ). "/>";
                                } else {
                                    $html .= "<img src='img/no_note.gif'/>";
                                }
            } else {
                $html .= "     <td class=\"membersRowCell\">";
                                if ( isset ($member['log']) ) {
                                    $tooltip = $member['log'];
                                    $html .= '<a href="javascript:popup(\'logPopup\');">';
                                    $html .= "<img src='img/note.gif'/></a>";
                                    $html .= '<div id="logPopup" class="popup">';
                                    $html .= scrollbox($member['log'], $roster->locale->act['update_log'], $style = 'sgray', $width = '550px', $height = '300px');
                                    $html .= '</div>';
                                } else {
                                    $html .= "<img src='img/no_note.gif'/>";
                                }
                $html .= "         </td>";
            }
            $html .= " </tr>";
            
            $i *= -1;
            $l++;
        }
        
        
        $html .= " </table>\n";
        $html .= "</td></tr></table>";
        
        print messagebox( $html , $title , 'syellow' , "800px" );
    }
    
    /**
     * statusbox Memberlist output
     *
     * @param int $jobid
     */
    function show_statusMemberlist( $jobid = 0 ) {
        global $roster;
        
        $this->show_status( $jobid, 1 );
    }
    
    /**
     * this is the main logic of the syncjob.
     * 
     *
     * @param int $jobid
     */
    function update_status( $jobid = 0 ) {
        global $roster;
        
        $this->_init();
        $this->active_member = $this->_isPostSyncStatus( $this->jobid );
        $active_member = $this->active_member;
        
        if ( ! isset ($active_member['name']) ) {
            $this->active_member = $this->_getNextMemberToUpdate( $this->jobid );
            $active_member = $this->active_member;
            $cleanup = 0;
            if ( isset ($active_member['name']) ) {
                $this->active_member['starttimeutc'] = gmdate('Y-m-d H:i:s');
                if ( $this->_updateMemberJobStatus( $this->jobid, $this->active_member ) ) {
                    $ret = true;
                }
            } else {
                $cleanup = 1;
                $ret = false;
            }
            $this->members = $this->_getMembersFromJobqueue( $this->jobid );
            list ( $this->done, $this->total ) = $this->_getJobProgress($this->jobid);
            if ( $cleanup ) {
                $this->_cleanUpJob( $this->jobid );
            }
            return $ret;
        } else {
            $this->ArmorySync->synchMemberByID( $active_member['server'], $active_member['member_id'], $active_member['name']);
            
            $this->active_member['guild_info'] = $this->ArmorySync->status['guildInfo'];
            $this->active_member['character_info'] = $this->ArmorySync->status['characterInfo'];;
            $this->active_member['skill_info'] = $this->ArmorySync->status['skillInfo'];;
            $this->active_member['reputation_info'] = $this->ArmorySync->status['reputationInfo'];;
            $this->active_member['equipment_info'] = $this->ArmorySync->status['equipmentInfo'];;
            $this->active_member['talent_info'] = $this->ArmorySync->status['talentInfo'];;
            $this->active_member['stoptimeutc'] = gmdate('Y-m-d H:i:s');
            $this->active_member['log'] = $this->ArmorySync->message;
            if ( $this->_updateMemberJobStatus( $this->jobid, $this->active_member ) ) {
                $this->members = $this->_getMembersFromJobqueue( $this->jobid );
                list ( $this->done, $this->total ) = $this->_getJobProgress($this->jobid);
                return true;
            }
        }
    }
    
    function update_statusMemberlist( $jobid = 0 ) {
        global $roster;
        
        $this->_init();
        $this->active_member = $this->_isPostSyncStatus( $this->jobid );
        $active_member = $this->active_member;
        
        if ( ! isset ($active_member['guild_name']) ) {
            $this->active_member = $this->_getNextGuildToUpdate( $this->jobid );
            $active_member = $this->active_member;
            $cleanup = 0;
            if ( isset ($active_member['guild_name']) ) {
                $this->active_member['starttimeutc'] = gmdate('Y-m-d H:i:s');
                if ( $this->_updateGuildJobStatus( $this->jobid, $this->active_member ) ) {
                    $ret = true;
                }
            } else {
                $cleanup = 1;
                $ret = false;
            }
            $this->members = $this->_getMembersFromJobqueue( $this->jobid );
            list ( $this->done, $this->total ) = $this->_getJobProgress($this->jobid);
            if ( $cleanup ) {
                $this->_cleanUpJob( $this->jobid );
            }
            return $ret;
        } else {
            $this->ArmorySync->synchGuildByID( $active_member['server'], $active_member['member_id']);
            
            $this->active_member['guild_info'] = $this->ArmorySync->status['guildInfo'];
            $this->active_member['stoptimeutc'] = gmdate('Y-m-d H:i:s');
            $this->active_member['log'] = $this->ArmorySync->message;
            if ( $this->_updateGuildJobStatus( $this->jobid, $this->active_member ) ) {
                $this->members = $this->_getMembersFromJobqueue( $this->jobid );
                list ( $this->done, $this->total ) = $this->_getJobProgress($this->jobid);
                return true;
            }
        }
    }
    
    // Helper functions

    /**
     * Create localised time based on utc + offset;
     *
     * @param string $time
     * @return string
     */
    function _getLocalisedTime ( $time = false ) {
        global $roster;
        
        $offset = $roster->config['localtimeoffset'];
        $date = new DateTime($time);
        $date->modify("+". $offset. " hour");
        $ret = $date->format("d.m H:i:s");
        return $ret;
    }
    /**
     * Creates a progress bar
     * 
     */
    function _getProgressBar($step, $total) {
        global $roster;
        
        $perc = 0;
        if ( $total == 0 ) {
            $perc = 100;
        } else {
            $perc = round ($step / $total * 100);
        }
        $per_left = 100 - $perc;
        $pb = "<TABLE class=\"main_roster_menu\" cellspacing=0 cellpadding=0 border=1 align=center width=200 ID=\"Table1\">";
        $pb .= "<TR>";
        $pb .= "<TD class=\"header\" colspan = 2 align=\"center\">";
        $pb .= "$perc% ". $roster->locale->act['complete']. " ($step of $total)";
        $pb .= "	</TD>";
        $pb .= "</TR>";
        $pb .= "<TR>";
        if ( $perc ) {
            $pb .= "	<TD bgcolor=#660000 height=12px width=$perc%>" ;
            $pb .= "	</TD>";
        }
        if ( $per_left ) {
            $pb .= "	<TD bgcolor=#FFF7CE height=12px width=$per_left%>";
            $pb .= "        </TD>";
        }
        $pb .= "</TR>";
        $pb .= "</TABLE>";
        return $pb;
    }


    /**
     * Create java reload code for guildsync
     * 
     */
    function link_char() {
        global $roster;
        
        $link = 'index.php?p=char-armorysync&member='. $roster->data['member_id']. '&job_id='. $this->jobid;
        $this->_link( $link );
    }
    
    /**
     * Create java reload code for guilds
     * 
     */
    function link_guild() {
        global $roster;
        $link = 'index.php?p=guild-armorysync&guild='. $roster->data['guild_id']. '&job_id='. $this->jobid;
        $this->_link( $link );
    }
    
    /**
     * Create java reload code for guild memberlists
     * 
     */
    function link_guildMemberlist() {
        global $roster;
        $link = 'index.php?p=guild-armorysync-memberlist&guild='. $roster->data['guild_id']. '&job_id='. $this->jobid;
        $this->_link( $link );
    }
    
    /**
     * Create java reload code
     *
     * @param string $link
     */
    function _link ( $link = '' ) {
        global $addon;

        //Link to next job step
        $reloadTime = $addon['config']['armorysync_reloadwaittime'] * 1000;

        Print '<script LANGUAGE="JavaScript">';
        Print 'function nextMember() {';
        Print '	window.location="' . $link . '";';
        Print '}';
        Print "self.setTimeout('nextMember()', ". $reloadTime. ");";
        Print '</script>';
    }
    
    // DB functions
    
    /**
     * Get realm members that match prerequesists from db for update
     *
     * @return array ()
     */
    function _getRealmMembersToUpdate(){
        global $roster;
        
        return $this->_getMembersToUpdate("members.server = \"". $roster->data['server']. "\" AND members.region = \"". $roster->data['region']. "\" AND NOT members.guild_id = 0 AND " );
    }

    /**
     * Get guild members that match prerequesists from db for update
     *
     * @return array ()
     */
    function _getGuildMembersToUpdate(){
        global $roster;
        
        return $this->_getMembersToUpdate("members.guild_id = ". $roster->data['guild_id']. " AND " );
    }

    /**
     * Get that match prerequesists from db for update
     *
     * @return array ()
     */
    function _getMembersToUpdate( $where = false ){
        global $roster, $addon;
        
        $query =    "SELECT members.member_id, members.name, " .
                    "guild.guild_id, guild.guild_name, guild.server, guild.region ".
                    "FROM `".$roster->db->table('members')."` members ". 
                    "LEFT JOIN `".$roster->db->table('players')."` players " .
                    "ON members.name = players.name " .
                    "LEFT JOIN `".$roster->db->table('guild')."` guild " .
                    "ON members.guild_id = guild.guild_id " .
                    "WHERE ". $where.
                    "members.level >= " . $addon['config']['armorysync_minlevel'] . " " .
                    "AND ( ".
                    "   ISNULL(players.name) ".
                    "   OR ".
                    "   players.dateupdatedutc <= DATE_SUB(UTC_TIMESTAMP(), INTERVAL " . $addon['config']['armorysync_synchcutofftime'] . " DAY) ".
                    " ) ".
                    "ORDER BY members.member_id;";
                    //"ORDER BY members.member_id ".
                    //"LIMIT 5;";
    
                    
                    
        $result = $roster->db->query($query);
        if( $roster->db->num_rows($result) > 0 ) {
            return $roster->db->fetch_all();
        } else {
            return array();
        }
    
    }
    
    /**
     * Get guild members that match prerequesists from db for update
     *
     * @param string $starttimeutc
     * @return int $jobid
     */
    function _insertJobID( $starttimeutc = '' ) {
        global $roster, $addon;
        
        $query =    "INSERT INTO ". $roster->db->table('jobs',$addon['basename']). " ".
                    "SET starttimeutc=".'"'. $starttimeutc. '"'.";";
        
        $result = $roster->db->query($query);
        if ( $result ) {
            $query = "SELECT LAST_INSERT_ID();";
            $jobid = $roster->db->query_first($query);
            if ( $jobid ) {
                //print "Job inserted to ". $roster->db->table('jobs',$addon['basename']). " with id: ". $jobid. "<br>\n";
                return $jobid;
            } else {
                print "Error fetching id <br>\n";
                return false;
            }
        } else {
            print "Error inserting jobid<br>\n";
            return false;
        }
    
    }
    
    /**
     * Get job starttime from db
     *
     * @param int $jobid
     * @return string $starttime
     */
    function _getJobStartTime( $jobid = 0 ) {
        global $roster, $addon;
        
        $query =    "SELECT starttimeutc ".
                    "FROM `". $roster->db->table('jobqueue',$addon['basename']). "` ".
                    "WHERE job_id=". $jobid;
        $starttime = $roster->db->query_first($query);
        if ( $starttime ) {
            return $starttime;
        } else {
            return false;
        }
    }
    
    /**
     * Inserts members to jobqueue
     *
     * @param int $jobid
     * @param array $members
     * @return bool 
     */
    function _insertMembersToJobqueue( $jobid = 0, $members = array() ) {
        global $roster, $addon;
        
        if ( array_keys( $members ) ) {
        
            $query =    "INSERT INTO ". $roster->db->table('jobqueue',$addon['basename']). " ".
                        "VALUES ";
            foreach ( $members as $member ) {
                $query .= "(".
                            $jobid. ", ".
                            ( $member['member_id'] ? $member['member_id'] : 0 ). ", ".
                            '"'.$roster->db->escape($member['name']). '"'.", ".
                            $member['guild_id']. ", ".
                            '"'.$roster->db->escape($member['guild_name']). '"'.", ".
                            '"'.$roster->db->escape($member['server']). '"'.", ".
                            '"'.$roster->db->escape($member['region']). '"'.", ".
                            "NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL), ";
            }
            $query = preg_replace('/, $/', ';', $query);
            $result = $roster->db->query($query);
            if ( $result ) {
                return true;
            }
        }
        return false;
    }
    
    /**
     * Fetches members from jobqueue
     *
     * @param int $jobid
     * @return array $members
     */
    function _getMembersFromJobqueue( $jobid = 0 ) {
        global $roster, $addon;
        
        $query =    "SELECT * ".
                    "FROM `". $roster->db->table('jobqueue',$addon['basename']). "` ".
                    "WHERE job_id=". $jobid. " ".
                    "ORDER BY member_id;";
    
                    
        $result = $roster->db->query($query);
        if( $roster->db->num_rows($result) > 0 ) {
            return $roster->db->fetch_all();
        } else {
            return array();
        }
        
    }
    
    /**
     * Fetches member which status was updated last
     *
     * @param int $jobid
     * @return array $member
     */
    function _isPostSyncStatus ( $jobid = 0 ) {
        global $roster, $addon;
        
        $query =    "SELECT * ".
                    "FROM `". $roster->db->table('jobqueue',$addon['basename']). "` ".
                    "WHERE job_id=". $jobid. " ".
                    "AND NOT ISNULL(starttimeutc) AND ISNULL(stoptimeutc);";
                    
        $result = $roster->db->query($query);
        if( $roster->db->num_rows($result) > 0 ) {
            $member = $roster->db->fetch_all();
            return $member[0];
        } else {
            return false;
        }
    }

    /**
     * Fetches job progress
     *
     * @param int $jobid
     * @return array $progress
     */
    function _getJobProgress ( $jobid = 0 ) {
        return array($this->_getJobDone($jobid), $this->_getJobTotal($jobid));
    }

    /**
     * Fetches total number of members to sync
     *
     * @param int $jobid
     * @return array $progress
     */
    function _getJobTotal ( $jobid = 0 ) {
        global $roster, $addon;
        
        $query =    "SELECT ".
                    "COUNT(member_id) as total ".
                    "FROM `". $roster->db->table('jobqueue',$addon['basename']). "` ".
                    "WHERE job_id=". $jobid. ";";
                    
        $result = $roster->db->query_first($query);
        if( $result ) {
            return $result;
        } else {
            return 0;
        }
    }

    /**
     * Fetches total number of members to sync
     *
     * @param int $jobid
     * @return array $progress
     */
    function _getJobDone ( $jobid = 0 ) {
        global $roster, $addon;
        
        $query =    "SELECT ".
                    "COUNT(member_id) as done ".
                    "FROM `". $roster->db->table('jobqueue',$addon['basename']). "` ".
                    "WHERE job_id=". $jobid. " ".
                    "AND NOT ISNULL(stoptimeutc);";

                    
        $result = $roster->db->query_first($query);
        if( $result ) {
            return $result;
        } else {
            return 0;
        }
    }
    
    /**
     * Fetches member which status will be updated next
     *
     * @param int $jobid
     * @return array $member
     */
    function _getNextMemberToUpdate ( $jobid = 0 ) {
        return $this->_getNextToUpdate( $jobid, 'member_id' );
    }

    /**
     * Fetches guild which status will be updated next
     *
     * @param int $jobid
     * @return array $member
     */
    function _getNextGuildToUpdate ( $jobid = 0 ) {
        return $this->_getNextToUpdate( $jobid, 'guild_id' );
    }

    /**
     * Fetches next whatever which status will be updated next
     *
     * @param int $jobid
     * @param string $field
     * @return array $member
     */
    function _getNextToUpdate ( $jobid = 0, $field = false ) {
        global $roster, $addon;

        if ( $field == false ) {
            return false;
        }
        
        $query =    "SELECT MIN(". $field. ") ". $field. " ".
                    "FROM `". $roster->db->table('jobqueue',$addon['basename']). "` ".
                    "WHERE job_id=". $jobid. " ".
                    "AND ISNULL(starttimeutc) AND ISNULL(stoptimeutc);";
        $id = $roster->db->query_first($query);
        if ( $id ) {
            
            $query =    "SELECT * ".
                        "FROM `". $roster->db->table('jobqueue',$addon['basename']). "` ".
                        "WHERE job_id=". $jobid. " ".
                        "AND ". $field. "=". $id. ";";
            $result = $roster->db->query($query);
            if( $roster->db->num_rows($result) > 0 ) {
                $next = $roster->db->fetch_all();
                return $next[0];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    /**
     * Updates Members job status in jobqueue
     *
     * @param int $jobid
     * @param array $member
     * @return bool
     */
    function _updateMemberJobStatus ( $jobid = 0, $member = array() ) {
        return $this->_updateJobStatus( $jobid, $member, 'member_id' );
    }
    
    /**
     * Updates Guilds job status in jobqueue
     *
     * @param int $jobid
     * @param array $member
     * @return bool
     */
    function _updateGuildJobStatus ( $jobid = 0, $member = array() ) {
        return $this->_updateJobStatus( $jobid, $member, 'guild_id' );
    }

    /**
     * Updates job status in jobqueue
     *
     * @param int $jobid
     * @param array $member
     * @return bool
     */
    function _updateJobStatus ( $jobid = 0, $member = array(), $field = false ) {
        global $roster, $addon;

        if ( $field == false ) {
            return false;
        }
        
        $query =    "UPDATE `". $roster->db->table('jobqueue',$addon['basename']). "` ".
                    "SET ";
                    
        $set = '';
        isset ( $member['guild_info'] ) ? $set .= "guild_info=". '"'.$roster->db->escape($member['guild_info']). '"'. ", " : 1;
        isset ( $member['character_info'] ) ? $set .= "character_info=". $member['character_info']. ", " : 1;
        isset ( $member['skill_info'] ) ? $set .= "skill_info=". $member['skill_info']. ", " : 1;
        isset ( $member['reputation_info'] ) ? $set .= "reputation_info=". $member['reputation_info']. ", " : 1;
        isset ( $member['equipment_info'] ) ? $set .= "equipment_info=". $member['equipment_info']. ", " : 1;
        isset ( $member['talent_info'] ) ? $set .= "talent_info=". $member['talent_info']. ", " : 1;
    
        isset ( $member['starttimeutc'] ) ? $set .= "starttimeutc=".'"'. $roster->db->escape($member['starttimeutc']). '"'.", " : 1;
        isset ( $member['stoptimeutc'] ) ? $set .= "stoptimeutc=".'"'. $roster->db->escape($member['stoptimeutc']). '"'.", " : 1;
        isset ( $member['log'] ) ? $set .= "log=".'"'. $roster->db->escape($member['log']). '"'.", " : 1;
        $set = preg_replace( '/, $/', ' ', $set );
        $query .= $set;
        
        $query .=   "WHERE job_id=". $jobid. " ".
                    "AND ". $field. "=". $member[$field]. ";";
        
        $result = $roster->db->query($query);
        if ( $result ) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Deletes job from jobqueue
     *
     * @param int $jobid
     */
    function _cleanUpJob ( $jobid = 0 ) {
        global $roster, $addon;
        
        $query =    "DELETE FROM `". $roster->db->table('jobqueue',$addon['basename']). "` ".
                    "WHERE job_id=". $jobid. ";";
        $result = $roster->db->query($query);
        
        $query =    "DELETE FROM `". $roster->db->table('jobs',$addon['basename']). "` ".
                    "WHERE job_id=". $jobid. ";";
        $result = $roster->db->query($query);
        
    }

}