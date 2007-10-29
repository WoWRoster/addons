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

class AssessmentInterrupt extends AssessmentBase {

	var $eventId;
	var $name;
	var $interruptOrder;
	var $count;
	var $targetName;
	var $time;
	var $abilityName;

	var $tableName = 'interrupt';
	var $tableCols = array(
							'eventId',
							'name',
							'interruptOrder',
							'count',
							'targetName',
							'time',
							'abilityName',
						);
	var $tableKeys = array(
							'eventId',
							'name',
							'interruptOrder',
						);

	function get ( $eventId = 0, $name = false, $interruptOrder = false ) {
		$this->eventId = $eventId;
		$this->name = $name;
		$this->interruptOrder = $interruptOrder;
		$this->_dbRead();
	}

}
