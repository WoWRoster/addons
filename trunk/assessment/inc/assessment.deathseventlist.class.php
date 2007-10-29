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

class AssessmentDeathsEventList extends AssessmentBase {

	var $eventId;
	var $deathsId;
	var $eventNumber;
	var $type;
	var $healthChange;
	var $typeLocal;
	var $message;
	var $maximumHealth;
	var $time;
	var $abilityName;
	var $health;
	var $reportedHealth;
	var $timeOffset;

	var $tableName = 'deathseventlist';
	var $tableCols = array(
						'eventId',
						'deathsId',
						'eventNumber',
						'type',
						'healthChange',
						'typeLocal',
						'message',
						'maximumHealth',
						'time',
						'abilityName',
						'health',
						'reportedHealth',
						'timeOffset',
						);
	var $tableKeys = array(
						'eventId',
						'deathsId',
						'eventNumber',
						);

	function get ( $eventId = false, $deathsId = false , $eventNumber = false ) {
		$this->eventId = $eventId;
		$this->deathsId = $deathsId;
		$this->eventNumber = $eventNumber;
		$this->_dbRead();
	}

}
