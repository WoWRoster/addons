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

require_once (ROSTER_BASE. 'addons'. DIR_SEP. 'assessment'. DIR_SEP. 'inc/assessment.base.class.php');

class AssessmentEvent extends AssessmentBase {

	var $idNeeded = 1;
	var $eventName;

	var $damageDealtSum = 0;
	var $healingDoneSum = 0;
	var $damageTakenSum = 0;
	var $healingTakenSum = 0;

	var $mobDamageDealtSum = 0;
	var $mobHealingDoneSum = 0;
	var $mobDamageTakenSum = 0;
	var $mobHealingTakenSum = 0;


	var $groupMembers = array();
	var $memberClasses = array();
	var $combatTime;
	var $mobs = array();

	var $tableName = 'event';
	var $tableCols = array(
						'id',
						'eventName',
						);
	var $tableKeys = array(
						'id',
						'eventName',
						);

	function get ( $id = 0, $name = false ) {
		$this->id = $id;
		$this->eventName = $name;
		$this->_dbRead();
	}

	function getEventDetails () {
		$this->_getGroupMembers( 'getEventDetails' );
		$this->_getCombatTime();
		$this->_getMobs();
	}

	function getEventListDetails () {
		$this->_getGroupMembers( 'getEventListDetails' );
		$this->_getCombatTime();
	}

	function _getCombatTime() {
		global $roster;
		require_once (ROSTER_BASE. 'addons'. DIR_SEP. 'assessment'. DIR_SEP. 'inc/assessment.combattime.class.php');
		$this->combatTime = new AssessmentCombatTime;
		$this->combatTime->get($this->id);
	}

	function _getMobs() {
		global $roster;

		$query =  "SELECT ";
		$query .= "name ";
		$query .= "FROM `". $roster->db->table( 'damagedealt', 'assessment'). "` ";
		$query .= "WHERE eventId=". $this->id. " ";
		$query .= "AND name NOT IN ( ";
		$query .= "		SELECT ";
		$query .= "		name ";
		$query .= "		FROM `". $roster->db->table( 'groupmembers', 'assessment'). "` ";
		$query .= "		WHERE eventId=". $this->id. ");";

		if ( $result = $roster->db->query($query) ) {
			if( $roster->db->num_rows($result) > 0 ) {
				$array = $roster->db->fetch_all();
				foreach ( $array as $set ) {
					require_once (ROSTER_BASE. 'addons'. DIR_SEP. 'assessment'. DIR_SEP. 'inc/assessment.groupmembers.class.php');
					$member = new AssessmentGroupMember;
					$member->get($this->id, $set['name']);
					$member->getEventDetails();
					$this->mobs[] = $member;
				}
				$roster->db->free_result($result);
				$this->_getMobDamageDealtSum();
				$this->_getMobHealingDoneSum();
				$this->_getMobDamageTakenSum();
				$this->_getMobHealingTakenSum();
			}
		} else {
			die_quietly($roster->db->error(),'Database Error',__FILE__,__LINE__,$query);
		}
	}

	function _getGroupMembers( $detailFunc = false ) {
		global $roster;

		$query =  "SELECT ";
		$query .= "name ";
		$query .= "FROM `". $roster->db->table( 'groupmembers', 'assessment'). "` ";
		$query .= "WHERE eventId=". $this->id. ";";

		if ( $result = $roster->db->query($query) ) {
			if( $roster->db->num_rows($result) > 0 ) {
				$array = $roster->db->fetch_all();
				foreach ( $array as $set ) {
					require_once (ROSTER_BASE. 'addons'. DIR_SEP. 'assessment'. DIR_SEP. 'inc/assessment.groupmembers.class.php');
					$member = new AssessmentGroupMember;
					$member->get($this->id, $set['name']);
					$member->$detailFunc();
					if ( ! isset( $this->memberClasses[$member->memberClass])) {
						$this->memberClasses[$member->memberClass] = 1;
					} else {
						$this->memberClasses[$member->memberClass]++;
					}
					$this->groupMembers[] = $member;
				}
				$roster->db->free_result($result);
				$this->_getDamageDealtSum();
				$this->_getHealingDoneSum();
				$this->_getDamageTakenSum();
				$this->_getHealingTakenSum();
			}
		} else {
			die_quietly($roster->db->error(),'Database Error',__FILE__,__LINE__,$query);
		}

	}

	function _getDamageDealtSum() {
		foreach ( $this->groupMembers as $member ) {
			$this->damageDealtSum += $member->damageDealt->amount;
		}
	}

	function _getHealingDoneSum() {
		foreach ( $this->groupMembers as $member ) {
			$this->healingDoneSum += $member->healingDone->amount - $member->healingDone->overhealAmount;
		}
	}

	function _getDamageTakenSum() {
		foreach ( $this->groupMembers as $member ) {
			$this->damageTakenSum += $member->damageTaken->amount;
		}
	}

	function _getHealingTakenSum() {
		foreach ( $this->groupMembers as $member ) {
			$this->healingTakenSum += $member->healingTaken->amount - $member->healingTaken->overhealAmount;
		}
	}



	function _getMobDamageDealtSum() {
		foreach ( $this->mobs as $mob ) {
			$this->mobDamageDealtSum += $mob->damageDealt->amount;
		}
	}

	function _getMobHealingDoneSum() {
		foreach ( $this->mobs as $mob ) {
			$this->mobHealingDoneSum += $mob->healingDone->amount - $mob->healingDone->overhealAmount;
		}
	}

	function _getMobDamageTakenSum() {
		foreach ( $this->mobs as $mob ) {
			$this->mobDamageTakenSum += $mob->damageTaken->amount;
		}
	}

	function _getMobHealingTakenSum() {
		foreach ( $this->mobs as $mob ) {
			$this->mobHealingTakenSum += $mob->healingTaken->amount - $mob->healingTaken->overhealAmount;
		}
	}


}
