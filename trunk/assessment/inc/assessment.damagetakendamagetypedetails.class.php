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

class AssessmentDamageTakenDamageTypeDetails extends AssessmentBase {

	var $damageTakenId;
	var $damageType;
	var $count;
	var $amount;

	var $tableName = 'damagetakendamagetypedetails';
	var $tableCols = array(
						'damageTakenId',
						'damageType',
						'count',
						'amount',
						);
	var $tableKeys = array(
						'damageTakenId',
						'damageType',
						);

	function get ( $damageTakenId = 0, $damageType = 0 ) {
		$this->damageTakenId = $damageTakenId;
		$this->damageType = $damageType;
		$this->_dbRead();
	}

}
