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

require_once ($addon['dir'] . 'inc/assessment.base.class.php');

class AssessmentCombatTime extends AssessmentBase {

	var $eventId;
	var $currentDurationOffset;
	var $totalDurationOffset;
	var $totalDuration;
	var $duration;
	var $durationOffset;
	var $currentDuration;

	var $tableName = 'combattime';
	var $tableCols = array(
						'eventId',
						'currentDurationOffset',
						'totalDurationOffset',
						'totalDuration',
						'duration',
						'durationOffset',
						'currentDuration',
						);
	var $tableKeys = array(
						'eventId',
						);

	function get ( $eventId = 0 , $name = false ) {
		$this->eventId = $eventId;
		$this->_dbRead();
	}

}
