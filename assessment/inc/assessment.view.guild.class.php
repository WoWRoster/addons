<?php
/**
 * WoWRoster.net WoWRoster
 *
 * Assessment Library
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    Assessment
*/

if( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

require_once ($addon['dir'] . 'inc/assessment.view.base.class.php');

class AssessmentViewGuild extends AssessmentViewBase {

    /**
     * helper function for debugging
     *
     * @param string $string
     * @return string date
     */
	function start() {
		global $roster, $addon;
		$this->_eventList();
	}

	function _eventList() {
		global $roster, $addon;
		$events = $this->_getGuildEvents();
		foreach ( $events as $event ) {
			print $event->eventName. "<br />";
		}
	}

	function _getGuildEvents() {
		global $roster, $addon;

		$query = "SELECT ";
		$query .= "asevent.id ";
		$query .= "FROM `". $roster->db->table( 'event', 'assessment'). "` AS asevent ";
		$query .= "LEFT JOIN `". $roster->db->table( 'groupmembers', 'assessment'). "` AS asmembers ";
		$query .= "ON asmembers.eventId = asevent.id ";
		$query .= "LEFT JOIN `". $roster->db->table( 'members'). "` AS members ";
		$query .= "ON asmembers.name = members.name ";
		$query .= "WHERE members.guild_id = ". $roster->data['guild_id']. " ";
		$query .= "GROUP BY asevent.id ";
		$query .= "ORDER BY asevent.eventName";

		if ( $result = $roster->db->query($query) ) {
			$ret = array();
			if( $roster->db->num_rows($result) > 0 ) {
				$array = $roster->db->fetch_all();
				require_once ($addon['dir'] . 'inc/assessment.event.class.php');
				foreach ( $array as $set ) {
					$event = new AssessmentEvent;
					$event->get($set['id']);
					$ret[] = $event;
				}
				$roster->db->free_result($result);
			}
			return $ret;
		} else {
			die_quietly($roster->db->error(),'Database Error',__FILE__,__LINE__,$query);
		}

	}

}
