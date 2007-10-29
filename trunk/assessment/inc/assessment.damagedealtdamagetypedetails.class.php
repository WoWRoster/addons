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

require_once (ROSTER_BASE. 'addons'. DIR_SEP. 'assessment'. DIR_SEP. 'inc/assessment.damagetakendamagetypedetails.class.php');

class AssessmentDamageDealtDamageTypeDetails extends AssessmentDamageTakenDamageTypeDetails {

	var $damageDealtId;
	var $friendlyCount;
	var $friendlyAmount;

	var $tableName = 'damagedealtdamagetypedetails';

	var $tableCols = array(
						'damageDealtId',
						'damageType',
						'count',
						'amount',
						'friendlyCount',
						'friendlyAmount',
						);
	var $tableKeys = array(
						'damageDealtId',
						'damageType',
						);

	function get ( $damageDealtId = 0, $damageType = 0 ) {
		$this->damageDealtId = $damageDealtId;
		$this->damageType = $damageType;
		$this->_dbRead();
	}
}
