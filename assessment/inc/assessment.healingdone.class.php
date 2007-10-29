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

class AssessmentHealingDone extends AssessmentBase {

	var $eventId;
	var $name;
	var $type;
	var $abilityName;
	var $count;
	var $overhealAmount;
	var $amount;

	var $tableName = 'healingdone';
	var $tableCols = array(
						'eventId',
						'name',
						'abilityName',
						'type',
						'count',
						'overhealAmount',
						'amount',
						);
	var $tableKeys = array(
						'eventId',
						'name',
						'abilityName',
						'type',
						);

	function get ( $eventId = 0 , $name = false, $abilityName = false, $type = false ) {
		$this->eventId = $eventId;
		$this->name = $name;
		$this->abilityName = $abilityName;
		$this->type = $type;
		$this->_dbRead();
	}

}
