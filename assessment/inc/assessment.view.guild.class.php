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

		if ( isset($_POST['process']) ) {

			if ( $_POST['process'] == 'showEventDetails' ) {
				if ( isset($_POST['eventId']) ) {
					$id = $_POST['eventId'];
					require_once ($addon['dir'] . 'inc/assessment.view.eventdetails.class.php');
					$details = new AssessmentViewEventDetails;
					$details->start( $id );
				}
			}

		} else {
			$this->_eventList();
		}
	}

	function _eventList() {
		global $roster, $addon;
		$events = $this->_getGuildEvents();

		$roster->tpl->assign_vars(array(
				'START_BORDER' => border( 'syellow', 'start' ),
				'STOP_BORDER' => border( 'syellow', 'end' ),
				'FORMLINK' => makelink(),
			));
		foreach ( $events as $event ) {
			$roster->tpl->assign_block_vars( 'body_row', array(
				'EVENTID' => $event->id,
				'EVENTNAME' => $event->eventName,
				'DDS' => $event->damageDealtSum,
				'HDS' => $event->healingDoneSum,
				'DTS' => $event->damageTakenSum,
				'HTS' => $event->healingTakenSum,
				'DRUIDICON' => $roster->config['img_url']. 'class/druid_icon.jpg',
				'HUNTERICON' => $roster->config['img_url']. 'class/hunter_icon.jpg',
				'MAGEICON' => $roster->config['img_url']. 'class/mage_icon.jpg',
				'PALADINICON' => $roster->config['img_url']. 'class/paladin_icon.jpg',
				'PRIESTICON' => $roster->config['img_url']. 'class/priest_icon.jpg',
				'ROGUEICON' => $roster->config['img_url']. 'class/rogue_icon.jpg',
				'SHAMANICON' => $roster->config['img_url']. 'class/shaman_icon.jpg',
				'WARLOCKICON' => $roster->config['img_url']. 'class/warlock_icon.jpg',
				'WARRIORICON' => $roster->config['img_url']. 'class/warrior_icon.jpg',
				'DRUIDCOUNT' => isset( $event->memberClasses['DRUID']) ? $event->memberClasses['DRUID'] : 0,
				'HUNTERCOUNT' => isset( $event->memberClasses['HUNTER']) ? $event->memberClasses['HUNTER'] : 0,
				'MAGECOUNT' => isset( $event->memberClasses['MAGE']) ? $event->memberClasses['MAGE'] : 0,
				'PALADINCOUNT' => isset( $event->memberClasses['PALADIN']) ? $event->memberClasses['PALADIN'] : 0,
				'PRIESTCOUNT' => isset( $event->memberClasses['PRIEST']) ? $event->memberClasses['PRIEST'] : 0,
				'ROGUECOUNT' => isset( $event->memberClasses['ROGUE']) ? $event->memberClasses['ROGUE'] : 0,
				'SHAMANCOUNT' => isset( $event->memberClasses['SHAMAN']) ? $event->memberClasses['SHAMAN'] : 0,
				'WARLOCKCOUNT' => isset( $event->memberClasses['WARLOCK']) ? $event->memberClasses['WARLOCK'] : 0,
				'WARRIORCOUNT' => isset( $event->memberClasses['WARRIOR']) ? $event->memberClasses['WARRIOR'] : 0,
			));
		}
		$roster->tpl->set_filenames(array(
                'eventListBody' => $addon['basename'] . '/assessment.view.eventlist.body.html',
                ));
        $roster->tpl->display('eventListBody');
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
					$event->getEventListDetails();
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
