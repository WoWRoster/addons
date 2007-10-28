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

class AssessmentDamageTaken extends AssessmentBase {

	var $idNeeded = 1;

	var $eventId;
	var $name;
	var $maximumAmount;
	var $count;
	var $maximumAmountAttack;
	var $amount;

	var $tableName = 'damagetaken';
	var $tableCols = array(
						'id',
						'eventId',
						'name',
						'maximumAmount',
						'count',
						'maximumAmountAttack',
						'amount',
						);
	var $tableKeys = array(
						'id',
						'eventId',
						'name',
						);

	function get ( $id = 0, $eventId = 0 , $name = false ) {
		$this->id = $id;
		$this->eventId = $eventId;
		$this->name = $name;
		$this->_dbRead();
	}

}
