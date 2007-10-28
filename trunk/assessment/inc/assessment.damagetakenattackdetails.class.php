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

class AssessmentDamageTakenAttackDetails extends AssessmentBase {

	var $damageTakenId;
	var $abilityName;
	var $type;
	var $damageType;
	var $maximumAmount;
	var $count;
	var $maximumAmountAttack;
	var $amount;

	var $tableName = 'damagetakenattackdetails';
	var $tableCols = array(
						'damageTakenId',
						'abilityName',
						'type',
						'damageType',
						'maximumAmount',
						'count',
						'maximumAmountAttack',
						'amount',
						);
	var $tableKeys = array(
						'damageTakenId',
						'abilityName',
						'type',
						);

	function get ( $damageTakenId = 0, $abilityName = 0 , $type = false ) {
		$this->damageTakenId = $damageTakenId;
		$this->abilityName = $abilityName;
		$this->type = $type;
		$this->_dbRead();
	}

}
