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

class AssessmentGain extends AssessmentBase {

	var $eventId;
	var $memberName;
	var $name;
	var $type;
	var $count;
	var $ammount;

	var $tableName = 'gain';
	var $tableCols = array(
						'eventId',
						'memberName',
						'name',
						'type',
						'count',
						'ammount',
						);
	var $tableKeys = array(
						'eventId',
						'memberName',
						'name',
						);

	function get ( $eventId = 0 , $memberName = false, $name = false ) {
		$this->eventId = $eventId;
		$this->memberName = $memberName;
		$this->name = $name;
		$this->_dbRead();
	}

}
