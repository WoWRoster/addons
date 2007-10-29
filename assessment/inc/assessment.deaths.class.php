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

class AssessmentDeaths extends AssessmentBase {

	var $idNeeded = 1;

	var $eventId;
	var $name;
	var $type;
	var $count;
	var $time;
	var $referenceTime;

	var $tableName = 'deaths';
	var $tableCols = array(
						'id',
						'eventId',
						'name',
						'type',
						'count',
						'time',
						'referenceTime',
						);
	var $tableKeys = array(
						'id',
						'eventId',
						'name',
						'type',
						);

	function get ( $id = 0, $eventId = 0 , $name = false, $type = false ) {
		$this->id = $id;
		$this->eventId = $eventId;
		$this->name = $name;
		$this->type = $type;
		$this->_dbRead();
	}

}
