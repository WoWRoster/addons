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

class AssessmentActivity extends AssessmentBase {

	var $eventId;
	var $name;
	var $total;
	var $healing;
	var $lastDamage;
	var $last;
	var $lastHealing;
	var $damage;

	var $tableName = 'activity';
	var $tableCols = array(
						'eventId',
						'name',
						'total',
						'healing',
						'lastDamage',
						'last',
						'lastHealing',
						'damage',
						);
	var $tableKeys = array(
						'eventId',
						'name',
						);
	var $tableColRewrite = array(
									'lastDamage' => 'last_damage',
									'lastHealing' => 'last_healing',
								 );

	function get ( $eventId = 0 , $name = false ) {
		$this->eventId = $eventId;
		$this->name = $name;
		$this->_dbRead();
	}

}
