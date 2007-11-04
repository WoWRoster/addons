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

class AssessmentGroupMember extends AssessmentBase {

	var $eventId;
	var $name;
	var $memberClass;
	var $memberId;

	var $damageDealt;
	var $activity;
	var $healingDone;
	var $damageTaken;
	var $healingTaken;
	var $deaths;
	var $dispels;
	var $interrupts;
	var $crowdControlBreaks;

	var $tableName = 'groupmembers';
	var $tableCols = array(
							'eventId',
							'name',
							'memberClass',
							'memberId',
						);
	var $tableKeys = array(
							'eventId',
							'name',
						);

	function get ( $eventId = 0, $name = false ) {
		$this->eventId = $eventId;
		$this->name = $name;
		$this->_dbRead();
	}

	function getEventListDetails ( $eventId = 0 ) {
		$this->_getMemberActivitys( $eventId );
		$this->_getMemberDamageDealt( $eventId );
		$this->_getMemberHealingDone( $eventId );
		$this->_getMemberDamageTaken( $eventId );
		$this->_getMemberHealingTaken( $eventId );
	}

	function getEventDetails ( $eventId = 0 ) {
		$this->_getMemberActivitys( $eventId );
		$this->_getMemberDamageDealt( $eventId );
		$this->_getMemberHealingDone( $eventId );
		$this->_getMemberDamageTaken( $eventId );
		$this->_getMemberHealingTaken( $eventId );
		$this->_getMemberDeaths( $eventId );
		$this->_getMemberDispels( $eventId );
		$this->_getMemberInterrupts( $eventId );
		$this->_getMemberCrowdControlBreaks( $eventId );
	}

	function _getMemberCrowdControlBreaks( $eventId = 0 ) {
		global $roster;

		require_once (ROSTER_BASE. 'addons'. DIR_SEP. 'assessment'. DIR_SEP. 'inc/assessment.crowdcontrolbreak.class.php');
		$this->crowdControlBreaks = new AssessmentCrowdControlBreak;
		$this->crowdControlBreaks->get( $eventId, $this->name );
	}

	function _getMemberInterrupts( $eventId = 0 ) {
		global $roster;

		require_once (ROSTER_BASE. 'addons'. DIR_SEP. 'assessment'. DIR_SEP. 'inc/assessment.interrupt.class.php');
		$this->interrupts = new AssessmentInterrupt;
		$this->interrupts->get( $eventId, $this->name );
	}

	function _getMemberDispels( $eventId = 0 ) {
		global $roster;

		require_once (ROSTER_BASE. 'addons'. DIR_SEP. 'assessment'. DIR_SEP. 'inc/assessment.dispel.class.php');
		$this->dispels = new AssessmentDispel;
		$this->dispels->get( $eventId, $this->name );
	}

	function _getMemberDeaths( $eventId = 0 ) {
		global $roster;

		require_once (ROSTER_BASE. 'addons'. DIR_SEP. 'assessment'. DIR_SEP. 'inc/assessment.deaths.class.php');
		$this->deaths = new AssessmentDeaths;
		$this->deaths->get( 0, $eventId, $this->name );
	}

	function _getMemberHealingTaken( $eventId = 0 ) {
		global $roster;

		require_once (ROSTER_BASE. 'addons'. DIR_SEP. 'assessment'. DIR_SEP. 'inc/assessment.healingtaken.class.php');
		$this->healingTaken = new AssessmentHealingTaken;
		$this->healingTaken->get( $eventId, $this->name );
	}

	function _getMemberDamageTaken( $eventId = 0 ) {
		global $roster;

		require_once (ROSTER_BASE. 'addons'. DIR_SEP. 'assessment'. DIR_SEP. 'inc/assessment.damagetaken.class.php');
		$this->damageTaken = new AssessmentDamageTaken;
		$this->damageTaken->get( 0, $eventId, $this->name );
	}

	function _getMemberHealingDone( $eventId = 0 ) {
		global $roster;

		require_once (ROSTER_BASE. 'addons'. DIR_SEP. 'assessment'. DIR_SEP. 'inc/assessment.healingdone.class.php');
		$this->healingDone = new AssessmentHealingDone;
		$this->healingDone->get( $eventId, $this->name );
	}

	function _getMemberActivitys( $eventId = 0 ) {
		global $roster;

		require_once (ROSTER_BASE. 'addons'. DIR_SEP. 'assessment'. DIR_SEP. 'inc/assessment.activity.class.php');
		$activity = new AssessmentActivity;
		$activity->get( $eventId, $this->name );
		$this->activity = $activity;
	}

	function _getMemberDamageDealt( $eventId = 0 ) {
		global $roster;

		require_once (ROSTER_BASE. 'addons'. DIR_SEP. 'assessment'. DIR_SEP. 'inc/assessment.damagedealt.class.php');
		$dd = new AssessmentDamageDealt;
		$dd->get( 0, $eventId, $this->name );
		$this->damageDealt = $dd;

	}
}
