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

class AssessmentDataUpdateTimes extends AssessmentBase {

	var $eventId;
	var $gain;
	var $deaths;
	var $activity;
	var $healing;
	var $dispel;
	var $aura;
	var $target;
	var $groupMembers;
	var $combatTime;
	var $damage;

	var $tableName = 'dataupdatetimes';
	var $tableCols = array(
							'eventId',
							'gain',
							'deaths',
							'activity',
							'healing',
							'dispel',
							'aura',
							'target',
							'groupMembers',
							'combatTime',
							'damage',
						);
	var $tableKeys = array(
						'eventId',
						);

	function get ( $eventId = 0 ) {
		$this->eventId = $eventId;
		$this->_dbRead();
	}
}
