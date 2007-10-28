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

class AssessmentAura extends AssessmentBase {

	var $eventId;
	var $name;
	var $abilityName;
	var $count;
	var $isBuff;

	var $tableName = 'aura';
	var $tableCols = array(
						'eventId',
						'name',
						'abilityName',
						'count',
						'isBuff',
						);
	var $tableKeys = array(
						'eventId',
						'name',
						'abilityName',
						);

	function get ( $eventId = 0 , $name = false, $abilityName = false ) {
		$this->eventId = $eventId;
		$this->name = $name;
		$this->abilityName = $abilityName;
		$this->_dbRead();
	}

}
