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

require_once (ROSTER_BASE. 'addons'. DIR_SEP. 'assessment'. DIR_SEP. 'inc/assessment.damagetaken.class.php');

class AssessmentDamageDealt extends AssessmentDamageTaken {

	var $friendlyCount;
	var $friendlyAmount;

	var $tableName = 'damagedealt';
	var $tableCols = array(
						'id',
						'eventId',
						'name',
						'maximumAmount',
						'friendlyAmount',
						'count',
						'maximumAmountAttack',
						'amount',
						'friendlyCount',
						);

}
