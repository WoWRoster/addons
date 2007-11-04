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

require_once ($addon['dir'] . 'inc/assessment.view.base.class.php');

class AssessmentViewEventDetails extends AssessmentViewBase {

	var $event;

    /**
     * helper function for debugging
     *
     * @param string $string
     * @return string date
     */
	function start( $id = 0 ) {
		global $roster, $addon;

		$this->_eventDetails( $id );
	}

	function _eventDetails( $id = 0 ) {
		global $roster, $addon;
		$this->_getEventDetails( $id );

		$jscript = "<script type=\"text/javascript\" src=\"". $addon['url_path']. "js/assessment.js\"></script>\n";
		$roster->output['html_head'] = $jscript;

		$roster->tpl->assign_vars(array(
				'EVENTID' => $this->event->id,
				'EVENTNAME' => $this->event->eventName,
				'FORMLINK' => makelink(),
				'DDS' => $this->event->damageDealtSum,
				'HDS' => $this->event->healingDoneSum,
				'DTS' => $this->event->damageTakenSum,
				'HTS' => $this->event->healingTakenSum,
				'DRUIDICON' => $roster->config['img_url']. 'class/druid_icon.jpg',
				'HUNTERICON' => $roster->config['img_url']. 'class/hunter_icon.jpg',
				'MAGEICON' => $roster->config['img_url']. 'class/mage_icon.jpg',
				'PALADINICON' => $roster->config['img_url']. 'class/paladin_icon.jpg',
				'PRIESTICON' => $roster->config['img_url']. 'class/priest_icon.jpg',
				'ROGUEICON' => $roster->config['img_url']. 'class/rogue_icon.jpg',
				'SHAMANICON' => $roster->config['img_url']. 'class/shaman_icon.jpg',
				'WARLOCKICON' => $roster->config['img_url']. 'class/warlock_icon.jpg',
				'WARRIORICON' => $roster->config['img_url']. 'class/warrior_icon.jpg',
				'DRUIDCOUNT' => isset( $this->event->memberClasses['DRUID']) ? $this->event->memberClasses['DRUID'] : 0,
				'HUNTERCOUNT' => isset( $this->event->memberClasses['HUNTER']) ? $this->event->memberClasses['HUNTER'] : 0,
				'MAGECOUNT' => isset( $this->event->memberClasses['MAGE']) ? $this->event->memberClasses['MAGE'] : 0,
				'PALADINCOUNT' => isset( $this->event->memberClasses['PALADIN']) ? $this->event->memberClasses['PALADIN'] : 0,
				'PRIESTCOUNT' => isset( $this->event->memberClasses['PRIEST']) ? $this->event->memberClasses['PRIEST'] : 0,
				'ROGUECOUNT' => isset( $this->event->memberClasses['ROGUE']) ? $this->event->memberClasses['ROGUE'] : 0,
				'SHAMANCOUNT' => isset( $this->event->memberClasses['SHAMAN']) ? $this->event->memberClasses['SHAMAN'] : 0,
				'WARLOCKCOUNT' => isset( $this->event->memberClasses['WARLOCK']) ? $this->event->memberClasses['WARLOCK'] : 0,
				'WARRIORCOUNT' => isset( $this->event->memberClasses['WARRIOR']) ? $this->event->memberClasses['WARRIOR'] : 0,
			));

		if ($roster->switch_row_class(false) != 1 ) {
			$roster->switch_row_class();
		}

		usort( $this->event->groupMembers, array( "AssessmentViewEventDetails", "_damageDoneCompare" ) );
		$i = 1;
		foreach ( $this->event->groupMembers as $member ) {
			$perc = round( $member->damageDealt->amount * 100 / $this->event->damageDealtSum, 0 );
			$percleft = 100 - $perc;
			$roster->tpl->assign_block_vars( 'dd_row', array(
				'ROWCLASS' => $roster->switch_row_class(),
				'ORDER' => $i++,
				'MEMBERNAME' => $member->name,
				'CLASS' => ucfirst( strtolower($member->memberClass) ),
				'DAMAGEDEALT' => $member->damageDealt->amount,
				'DAMAGEDEALTPERC' => round( $member->damageDealt->amount * 100 / $this->event->damageDealtSum, 2 ),
				'DAMAGEDEALTPERSEC' => round( $member->damageDealt->amount / $this->event->combatTime->totalDuration, 0 ),
				'PERC' => $perc,
				'PERCLEFT' => $percleft,
				'DEATHS' => isset( $member->deaths->count ) ? $member->deaths->count : 0,
				'INTERRUPTS' => isset( $member->interrupts->count ) ? $member->interrupts->count : 0,
				'CROWDCONTROLBREAKS' => isset( $member->crowdControlBreaks->count ) ? $member->crowdControlBreaks->count : 0,
				'HEALINGDONEPERC' => round( $member->healingDone->amount * 100 / $this->event->healingDoneSum, 2 ),
				'DAMAGETAKENPERC' => round( $member->damageTaken->amount * 100 / $this->event->damageTakenSum, 2 ),
				'HEALINGTAKENPERC' => round( $member->healingTaken->amount * 100 / $this->event->healingTakenSum, 2 ),
			));
		}

		if ($roster->switch_row_class(false) != 1 ) {
			$roster->switch_row_class();
		}

		usort( $this->event->groupMembers, array( "AssessmentViewEventDetails", "_healingDoneCompare" ) );
		$i = 1;
		foreach ( $this->event->groupMembers as $member ) {
			$perc = round( ( $member->healingDone->amount - $member->healingDone->overhealAmount ) * 100 / $this->event->healingDoneSum, 0 );
			$percleft = 100 - $perc;
			$roster->tpl->assign_block_vars( 'hd_row', array(
				'ROWCLASS' => $roster->switch_row_class(),
				'ORDER' => $i++,
				'MEMBERNAME' => $member->name,
				'CLASS' => ucfirst( strtolower($member->memberClass) ),
				'HEALINGDONE' => $member->healingDone->amount - $member->healingDone->overhealAmount,
				'HEALINGDONEPERC' => round( ( $member->healingDone->amount - $member->healingDone->overhealAmount ) * 100 / $this->event->healingDoneSum, 2 ),
				'PERC' => $perc,
				'PERCLEFT' => $percleft,
				'OVERHEAL' => $member->healingDone->overhealAmount,
				'OVERHEALPERC' => $member->healingDone->amount ? round( $member->healingDone->overhealAmount * 100 / $member->healingDone->amount, 2 ) : 0,
				'HEALINGDONEPERSEC' => round( $member->healingDone->amount / $this->event->combatTime->totalDuration, 0 ),
				'DISPELS' => isset( $member->dispels->count ) ? $member->dispels->count : 0,
				'DAMAGEDEALTPERC' => round( $member->damageDealt->amount * 100 / $this->event->damageDealtSum, 2 ),
				'DAMAGETAKENPERC' => round( $member->damageTaken->amount * 100 / $this->event->damageTakenSum, 2 ),
				'HEALINGTAKENPERC' => round( $member->healingTaken->amount * 100 / $this->event->healingTakenSum, 2 ),
											));
		}

		if ($roster->switch_row_class(false) != 1 ) {
			$roster->switch_row_class();
		}

		usort( $this->event->groupMembers, array( "AssessmentViewEventDetails", "_damageTakenCompare" ) );
		$i = 1;
		foreach ( $this->event->groupMembers as $member ) {
			$perc = round( $member->damageTaken->amount * 100 / $this->event->damageTakenSum, 0 );
			$percleft = 100 - $perc;
			$roster->tpl->assign_block_vars( 'dt_row', array(
				'ROWCLASS' => $roster->switch_row_class(),
				'ORDER' => $i++,
				'MEMBERNAME' => $member->name,
				'CLASS' => ucfirst( strtolower($member->memberClass) ),
				'DAMAGETAKEN' => $member->damageTaken->amount,
				'DAMAGETAKENPERC' => round( $member->damageTaken->amount * 100 / $this->event->damageTakenSum, 2 ),
				'DAMAGETAKENPERSEC' => round( $member->damageTaken->amount / $this->event->combatTime->totalDuration, 0 ),
				'PERC' => $perc,
				'PERCLEFT' => $percleft,
				'DAMAGEDEALTPERC' => round( $member->damageDealt->amount * 100 / $this->event->damageDealtSum, 2 ),
				'HEALINGDONEPERC' => round( $member->healingDone->amount * 100 / $this->event->healingDoneSum, 2 ),
				'HEALINGTAKENPERC' => round( $member->healingTaken->amount * 100 / $this->event->healingTakenSum, 2 ),
											));
		}

		if ($roster->switch_row_class(false) != 1 ) {
			$roster->switch_row_class();
		}

		usort( $this->event->groupMembers, array( "AssessmentViewEventDetails", "_healingTakenCompare" ) );
		$i = 1;
		foreach ( $this->event->groupMembers as $member ) {
			$perc = round( ( $member->healingTaken->amount - $member->healingTaken->overhealAmount ) * 100 / $this->event->healingTakenSum, 0 );
			$percleft = 100 - $perc;
			$roster->tpl->assign_block_vars( 'ht_row', array(
				'ROWCLASS' => $roster->switch_row_class(),
				'ORDER' => $i++,
				'MEMBERNAME' => $member->name,
				'CLASS' => ucfirst( strtolower($member->memberClass) ),
				'HEALINGTAKEN' => $member->healingTaken->amount - $member->healingTaken->overhealAmount,
				'HEALINGTAKENPERC' => round( ( $member->healingTaken->amount - $member->healingTaken->overhealAmount ) * 100 / $this->event->healingTakenSum, 2 ),
				'OVERHEAL' => $member->healingTaken->overhealAmount,
				'OVERHEALPERC' => round( $member->healingTaken->overhealAmount * 100 / $member->healingTaken->amount, 2 ),
				'HEALINGTAKENPERSEC' => round( $member->healingTaken->amount / $this->event->combatTime->totalDuration, 0 ),
				'PERC' => $perc,
				'PERCLEFT' => $percleft,
				'DAMAGEDEALTPERC' => round( $member->damageDealt->amount * 100 / $this->event->damageDealtSum, 2 ),
				'HEALINGDONEPERC' => round( $member->healingDone->amount * 100 / $this->event->healingDoneSum, 2 ),
				'DAMAGETAKENPERC' => round( $member->damageTaken->amount * 100 / $this->event->damageTakenSum, 2 ),
			));
		}




		if ($roster->switch_row_class(false) != 1 ) {
			$roster->switch_row_class();
		}

		usort( $this->event->mobs, array( "AssessmentViewEventDetails", "_damageDoneCompare" ) );
		$i = 1;
		foreach ( $this->event->mobs as $member ) {
			$perc = round( $member->damageDealt->amount * 100 / $this->event->mobDamageDealtSum, 0 );
			$percleft = 100 - $perc;
			$roster->tpl->assign_block_vars( 'mdd_row', array(
				'ROWCLASS' => $roster->switch_row_class(),
				'ORDER' => $i++,
				'MEMBERNAME' => $member->name,
				'DAMAGEDEALT' => $member->damageDealt->amount,
				'DAMAGEDEALTPERC' => round( $member->damageDealt->amount * 100 / $this->event->mobDamageDealtSum, 2 ),
				'DAMAGEDEALTPERSEC' => round( $member->damageDealt->amount / $this->event->combatTime->totalDuration, 0 ),
				'PERC' => $perc,
				'PERCLEFT' => $percleft,
				'DEATHS' => isset( $member->deaths->count ) ? $member->deaths->count : 0,
				'INTERRUPTS' => isset( $member->interrupts->count ) ? $member->interrupts->count : 0,
				'CROWDCONTROLBREAKS' => isset( $member->crowdControlBreaks->count ) ? $member->crowdControlBreaks->count : 0,
				'HEALINGDONEPERC' => round( $member->healingDone->amount * 100 / $this->event->mobHealingDoneSum, 2 ),
				'DAMAGETAKENPERC' => round( $member->damageTaken->amount * 100 / $this->event->mobDamageTakenSum, 2 ),
				'HEALINGTAKENPERC' => round( $member->healingTaken->amount * 100 / $this->event->mobHealingTakenSum, 2 ),
			));
		}

		if ($roster->switch_row_class(false) != 1 ) {
			$roster->switch_row_class();
		}

		usort( $this->event->mobs, array( "AssessmentViewEventDetails", "_healingDoneCompare" ) );
		$i = 1;
		foreach ( $this->event->mobs as $member ) {
			$perc = round( ( $member->healingDone->amount - $member->healingDone->overhealAmount ) * 100 / $this->event->mobHealingDoneSum, 0 );
			$percleft = 100 - $perc;
			$roster->tpl->assign_block_vars( 'mhd_row', array(
				'ROWCLASS' => $roster->switch_row_class(),
				'ORDER' => $i++,
				'MEMBERNAME' => $member->name,
				'HEALINGDONE' => $member->healingDone->amount - $member->healingDone->overhealAmount,
				'HEALINGDONEPERC' => round( ( $member->healingDone->amount - $member->healingDone->overhealAmount ) * 100 / $this->event->mobHealingDoneSum, 2 ),
				'PERC' => $perc,
				'PERCLEFT' => $percleft,
				'OVERHEAL' => $member->healingDone->overhealAmount,
				'OVERHEALPERC' => $member->healingDone->amount ? round( $member->healingDone->overhealAmount * 100 / $member->healingDone->amount, 2 ) : 0,
				'HEALINGDONEPERSEC' => round( $member->healingDone->amount / $this->event->combatTime->totalDuration, 0 ),
				'DISPELS' => isset( $member->dispels->count ) ? $member->dispels->count : 0,
				'DAMAGEDEALTPERC' => round( $member->damageDealt->amount * 100 / $this->event->mobDamageDealtSum, 2 ),
				'DAMAGETAKENPERC' => round( $member->damageTaken->amount * 100 / $this->event->mobDamageTakenSum, 2 ),
				'HEALINGTAKENPERC' => round( $member->healingTaken->amount * 100 / $this->event->mobHealingTakenSum, 2 ),
											));
		}

		if ($roster->switch_row_class(false) != 1 ) {
			$roster->switch_row_class();
		}

		usort( $this->event->mobs, array( "AssessmentViewEventDetails", "_damageTakenCompare" ) );
		$i = 1;
		foreach ( $this->event->mobs as $member ) {
			$perc = round( $member->damageTaken->amount * 100 / $this->event->mobDamageTakenSum, 0 );
			$percleft = 100 - $perc;
			$roster->tpl->assign_block_vars( 'mdt_row', array(
				'ROWCLASS' => $roster->switch_row_class(),
				'ORDER' => $i++,
				'MEMBERNAME' => $member->name,
				'DAMAGETAKEN' => $member->damageTaken->amount,
				'DAMAGETAKENPERC' => round( $member->damageTaken->amount * 100 / $this->event->mobDamageTakenSum, 2 ),
				'DAMAGETAKENPERSEC' => round( $member->damageTaken->amount / $this->event->combatTime->totalDuration, 0 ),
				'PERC' => $perc,
				'PERCLEFT' => $percleft,
				'DAMAGEDEALTPERC' => round( $member->damageDealt->amount * 100 / $this->event->mobDamageDealtSum, 2 ),
				'HEALINGDONEPERC' => round( $member->healingDone->amount * 100 / $this->event->mobHealingDoneSum, 2 ),
				'HEALINGTAKENPERC' => round( $member->healingTaken->amount * 100 / $this->event->mobHealingTakenSum, 2 ),
											));
		}

		if ($roster->switch_row_class(false) != 1 ) {
			$roster->switch_row_class();
		}

		usort( $this->event->mobs, array( "AssessmentViewEventDetails", "_healingTakenCompare" ) );
		$i = 1;
		foreach ( $this->event->mobs as $member ) {
			$perc = round( ( $member->healingTaken->amount - $member->healingTaken->overhealAmount ) * 100 / $this->event->mobHealingTakenSum, 0 );
			$percleft = 100 - $perc;
			$roster->tpl->assign_block_vars( 'mht_row', array(
				'ROWCLASS' => $roster->switch_row_class(),
				'ORDER' => $i++,
				'MEMBERNAME' => $member->name,
				'HEALINGTAKEN' => $member->healingTaken->amount - $member->healingTaken->overhealAmount,
				'HEALINGTAKENPERC' => round( ( $member->healingTaken->amount - $member->healingTaken->overhealAmount ) * 100 / $this->event->mobHealingTakenSum, 2 ),
				'OVERHEAL' => $member->healingTaken->overhealAmount,
				'OVERHEALPERC' => $member->healingTaken->amount ? round( $member->healingTaken->overhealAmount * 100 / $member->healingTaken->amount, 2 ) : 0,
				'HEALINGTAKENPERSEC' => round( $member->healingTaken->amount / $this->event->combatTime->totalDuration, 0 ),
				'PERC' => $perc,
				'PERCLEFT' => $percleft,
				'DAMAGEDEALTPERC' => round( $member->damageDealt->amount * 100 / $this->event->mobDamageDealtSum, 2 ),
				'HEALINGDONEPERC' => round( $member->healingDone->amount * 100 / $this->event->mobHealingDoneSum, 2 ),
				'DAMAGETAKENPERC' => round( $member->damageTaken->amount * 100 / $this->event->mobDamageTakenSum, 2 ),
			));
		}


		$roster->tpl->set_filenames(array(
                'eventDetailsBody' => $addon['basename'] . '/assessment.view.eventdetails.body.html',
                ));
        $roster->tpl->display('eventDetailsBody');
	}

	function _getEventDetails( $id = 0 ) {
		global $roster, $addon;

		require_once ($addon['dir'] . 'inc/assessment.event.class.php');
		$this->event = new AssessmentEvent;
		$this->event->get( $id );
		$this->event->getEventDetails();
	}

	function _damageDoneCompare( $a, $b ) {

		if ( ! isset( $a->damageDealt->amount ) || $a->damageDealt->amount == '' ) {
			$a->damageDealt->amount = 0;
		}
		if ( ! isset ( $b->damageDealt->amount ) || $b->damageDealt->amount == '' ) {
			$b->damageDealt->amount = 0;
		}
		if ( $a->damageDealt->amount == $b->damageDealt->amount ) {
			return 0;
		}

		return ( $a->damageDealt->amount > $b->damageDealt->amount ) ? -1 : 1;

	}

	function _healingDoneCompare( $a, $b ) {

		if ( ! isset( $a->healingDone->amount ) || $a->healingDone->amount == '' ) {
			$a->healingDone->amount = 0;
		}
		if ( ! isset( $a->healingDone->overhealAmount ) || $a->healingDone->overhealAmount == '' ) {
			$a->healingDone->overhealAmount = 0;
		}
		if ( ! isset ( $b->healingDone->amount ) || $b->healingDone->amount == '' ) {
			$b->healingDone->amount = 0;
		}
		if ( ! isset( $b->healingDone->overhealAmount ) || $b->healingDone->overhealAmount == '' ) {
			$b->healingDone->overhealAmount = 0;
		}
		if ( $a->healingDone->amount - $a->healingDone->overhealAmount == $b->healingDone->amount - $b->healingDone->overhealAmount ) {
			return 0;
		}

		return ( $a->healingDone->amount - $a->healingDone->overhealAmount > $b->healingDone->amount - $b->healingDone->overhealAmount ) ? -1 : 1;

	}

	function _damageTakenCompare( $a, $b ) {

		if ( ! isset( $a->damageTaken->amount ) || $a->damageTaken->amount == '' ) {
			$a->damageTaken->amount = 0;
		}
		if ( ! isset ( $b->damageTaken->amount ) || $b->damageTaken->amount == '' ) {
			$b->damageTaken->amount = 0;
		}
		if ( $a->damageTaken->amount == $b->damageTaken->amount ) {
			return 0;
		}

		return ( $a->damageTaken->amount > $b->damageTaken->amount ) ? -1 : 1;

	}

	function _healingTakenCompare( $a, $b ) {

		if ( ! isset( $a->healingTaken->amount ) || $a->healingTaken->amount == '' ) {
			$a->healingTaken->amount = 0;
		}
		if ( ! isset( $a->healingTaken->overhealAmount ) || $a->healingTaken->overhealAmount == '' ) {
			$a->healingTaken->overhealAmount = 0;
		}
		if ( ! isset ( $b->healingTaken->amount ) || $b->healingTaken->amount == '' ) {
			$b->healingTaken->amount = 0;
		}
		if ( ! isset( $b->healingTaken->overhealAmount ) || $b->healingTaken->overhealAmount == '' ) {
			$b->healingTaken->overhealAmount = 0;
		}
		if ( $a->healingTaken->amount - $a->healingTaken->overhealAmount == $b->healingTaken->amount - $b->healingTaken->overhealAmount ) {
			return 0;
		}

		return ( $a->healingTaken->amount - $a->healingTaken->overhealAmount > $b->healingTaken->amount - $b->healingTaken->overhealAmount) ? -1 : 1;

	}
}
