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

}
