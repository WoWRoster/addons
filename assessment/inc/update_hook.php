<?php
/**
 * WoWRoster.net WoWRoster
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    Assessment
 * @subpackage UpdateHook
*/

if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}


/**
 * Addon Update class
 * This MUST be the same name as the addon basename
 *
 * @package    Assessment
 * @subpackage UpdateHook
 */
class assessmentUpdate
{
	var $messages = '';		// Update messages
	var $files = array();


	/**
	 * Class instantiation
	 * The name of this function MUST be the same name as the class name
	 *
	 * @param array $data	| Addon data
	 * @return recipe
	 */
	function assessmentUpdate( $data )
	{
		$this->data = $data;
		$this->files[] = 'assessment';
	}

	/**
	 * Standalone Update Hook
	 *
	 * @return bool
	 */
	function update( )
	{
		global $roster, $update;

		$this->usage = memory_get_usage();
		$this->last_usage = memory_get_usage();

		ini_set('memory_limit', '64M');
		print "limit: ". ini_get('memory_limit'). '<br />';
		print "start: ". $this->usage. '<br />';

		$this->reset_messages();
		$fightData =& $update->uploadData['assessment']['AssessmentDBPerCharacter']['global']['fightData'];

		$this->mem( 'datacopy');

		$this->messages .= '<ul>';
		foreach ( $fightData as $fightName => &$data ) {
			if ( preg_match( "/^\d+$/", $fightName ) ) {
				continue;
			}
			$this->_updateEvent( $fightName, $data );
		}
		$this->messages .= '</ul><br />';

		return true;
	}

	function mem ( $tag ) {
		print "$tag: ". ( memory_get_usage() - $this->usage ). ' gain: '. (memory_get_usage() - $this->last_usage).'<br />';
		$this->last_usage = memory_get_usage();
	}

	function _updateEvent( &$name = false, &$data = false ) {
		global $roster;

		require_once (ROSTER_BASE. 'addons'. DIR_SEP. 'assessment'. DIR_SEP. 'inc'. DIR_SEP. 'assessment.event.class.php');
		$this->mem( $name);

		$assEvent = new AssessmentEvent;
		$assEvent->get( 0, $name );
		$assEvent->set();
		$this->messages .= '<li>'. $name;

		$this->messages .= '<ul>';
		foreach ( $data as $detailName => &$detailData ) {
			$this->_updateEventDetail( $assEvent->id, $detailName, $detailData );
		}
		unset ($assEvent, $name, $data);
		$this->messages .= '</ul></li>';

	}

	function _updateEventDetail( &$eventId = 0, &$name = false, &$data = false ) {
		global $roster;

		$classFile = ROSTER_BASE. 'addons'. DIR_SEP. 'assessment'. DIR_SEP. 'inc/assessment.'. strtolower($name). '.class.php';

		$this->mem( $name);

		switch ( $name ) {
			case 'gain':
				require_once ($classFile);
				$this->_updateEventGain( $eventId, $name, $data );
				break;

			case 'deaths':
				require_once ($classFile);
				$this->_updateEventDeaths( $eventId, $name, $data );
				break;

			case 'activity':
				require_once ($classFile);
				$this->_updateEventActivity( $eventId, $name, $data );
				break;

			case 'healingDone':
				require_once ($classFile);
				$this->_updateEventHealingDone( $eventId, $name, $data );
				break;

			case 'damageTaken':
				require_once ($classFile);
				$this->_updateEventDamageTaken( $eventId, $name, $data );
				break;

			case 'dispel':
				require_once ($classFile);
				$this->_updateEventDispel( $eventId, $name, $data );
				break;

			case 'healingTaken':
				require_once ($classFile);
				$this->_updateEventHealingTaken( $eventId, $name, $data );
				break;

			case 'aura':
				require_once ($classFile);
				$this->_updateEventAura( $eventId, $name, $data );
				break;

			case 'combatTime':
				require_once ($classFile);
				$this->_updateEventCombatTime( $eventId, $name, $data );
				break;

			case 'damageDealt':
				require_once ($classFile);
				$this->_updateEventDamageDealt( $eventId, $name, $data );
				break;

			case 'dataUpdateTimes':
				require_once ($classFile);
				$this->_updateEventDataUpdateTimes( $eventId, $name, $data );
				break;

			case 'groupMembers':
				require_once ($classFile);
				$this->_updateEventGroupMembers( $eventId, $name, $data );
				break;

			case 'interrupt':
				require_once ($classFile);
				$this->_updateEventInterrupt( $eventId, $name, $data );
				break;

			case 'crowdControlBreak':
				require_once ($classFile);
				$this->_updateEventCrowdControlBreak( $eventId, $name, $data );
				break;

			default:
				break;
		}
		$this->messages .= '<li>'. $name. '</li>';
		unset ($name, $data);
	}

	function _updateEventCrowdControlBreak( &$eventId = 0, &$name = false, &$data = false ) {
		global $roster;

		foreach ( $data as $memberName => &$memberData ) {
			$eventBreak = new AssessmentCrowdControlBreak;
			$eventBreak->get( $eventId, $memberName, 'sum' );
			$eventBreak->set( $memberData );

			if ( isset($memberData['detailList'])) {
				$i = 1;
				foreach ( $memberData['detailList'] as &$detailData ) {
					$eventBreakDetail = new AssessmentCrowdControlBreak;
					$eventBreakDetail->get( $eventId, $memberName, $i++ );
					$eventBreakDetail->set( $detailData );
					unset($eventBreakDetail);
				}
				unset($eventBreak);
			}
		}
		unset($eventId, $name, $data);
	}

	function _updateEventInterrupt( &$eventId = 0, &$name = false, &$data = false ) {
		global $roster;

		foreach ( $data as $memberName => &$memberData ) {
			$eventInterrupt = new AssessmentInterrupt;
			$eventInterrupt->get( $eventId, $memberName, 'sum' );
			$eventInterrupt->set( $memberData );

			$i = 1;
			foreach ( $memberData['detailList'] as &$detailData ) {
				$eventInterruptDetail = new AssessmentInterrupt;
				$eventInterruptDetail->get( $eventId, $memberName, $i++ );
				$eventInterruptDetail->set( $detailData );
				unset($eventInterruptDetail);
			}
			unset($eventInterrupt);
		}
		unset($eventId, $name, $data);
	}

	function _updateEventGroupMembers( &$eventId = 0, &$name = false, &$data = false ) {
		global $roster;

		foreach ( $data as $memberName => &$memberData ) {
			$eventGroupMember = new AssessmentGroupMembers;
			$eventGroupMember->get( $eventId, $memberName );
			$tmp = array( 'memberClass' => $memberData );
			$eventGroupMember->set( $tmp );
			unset($eventGroupMember, $tmp);
		}
		unset($eventId, $name, $data);
	}

	function _updateEventDataUpdateTimes( &$eventId = 0, &$name = false, &$data = false ) {
		global $roster;

		$eventDataUpdateTime = new AssessmentDataUpdateTimes;
		$eventDataUpdateTime->get( $eventId );
		$eventDataUpdateTime->set( $data );
		unset($eventDataUpdateTime, $data);
	}

	function _updateEventDamageDealt( &$eventId = 0, &$name = false, &$data = false ) {
		global $roster;

		foreach ( $data as $memberName => &$damages ) {
			$eventDamage = new AssessmentDamageDealt;
			$eventDamage->get( 0, $eventId, $memberName );
			$eventDamage->set( $damages );

			require_once( ROSTER_BASE. 'addons'. DIR_SEP. 'assessment'. DIR_SEP. 'inc/assessment.damagedealtattackdetails.class.php' );
			foreach ( $damages['attackDetails'] as $abilityName => &$abilityData ) {
				$eventDamageDetail = new AssessmentDamageDealtAttackDetails;
				$eventDamageDetail->get( $eventDamage->id, $abilityName, 'sum');
				$eventDamageDetail->set( $abilityData );

				foreach ( $abilityData['hitDetails'] as $hitDetail => &$hitDetailData ) {
					$eventDamageHitDetail = new AssessmentDamageDealtAttackDetails;
					$eventDamageHitDetail->get( $eventDamage->id, $abilityName, $hitDetail );
					$eventDamageHitDetail->set( $hitDetailData );
					unset($eventDamageHitDetail);
				}
				unset($eventDamageDetail);
			}

			require_once( ROSTER_BASE. 'addons'. DIR_SEP. 'assessment'. DIR_SEP. 'inc/assessment.damagedealtdamagetypedetails.class.php' );
			foreach ( $damages['damageTypeDetails'] as $typeName => &$typeData ) {
				$eventDamageDetail = new AssessmentDamageDealtDamageTypeDetails;
				$eventDamageDetail->get( $eventDamage->id, $typeName );
				$eventDamageDetail->set( $typeData );
				unset($eventDamageDetail);
			}
			unset($eventDamage);
		}
		unset($eventId, $name, $data);
	}

	function _updateEventCombatTime( &$eventId = 0, &$name = false, &$data = false ) {
		global $roster;

		$eventCombatTime = new AssessmentCombatTime;
		$eventCombatTime->get( $eventId );
		$eventCombatTime->set( $data );
	}

	function _updateEventAura( &$eventId = 0, &$name = false, &$data = false ) {
		global $roster;

		foreach ( $data as $memberName => &$auras ) {
			$eventAura = new AssessmentAura;
			$eventAura->get( $eventId, $memberName, 'sum' );
			$eventAura->set( $auras['count'] );
			foreach ( $auras['auraList'] as $auraName => &$auraData ) {
				$eventAuraDetail = new AssessmentAura;
				$eventAuraDetail->get( $eventId, $memberName, $auraName );
				$eventAuraDetail->set( $auraData );
				unset($eventAuraDetail);
			}
			unset($eventAura);
		}
		unset($eventId, $name, $data);
	}

	function _updateEventHealingTaken( &$eventId = 0, &$name = false, &$data = false ) {
		$this->_updateEventHealingX( $eventId, $name, $data, 'AssessmentHealingTaken');
	}

	function _updateEventDispel( &$eventId = 0, &$name = false, &$data = false ) {
		global $roster;

		foreach ( $data as $memberName => &$dispels ) {
			$eventDispel = new AssessmentDispel;
			$eventDispel->get( $eventId, $memberName );
			$eventDispel->set( $dispels );
			unset($eventDispel);
		}
		unset($eventId, $name, $data);
	}

	function _updateEventDamageTaken( &$eventId = 0, &$name = false, &$data = false ) {
		global $roster;

		foreach ( $data as $memberName => &$damages ) {
			$eventDamage = new AssessmentDamageTaken;
			$eventDamage->get( 0, $eventId, $memberName );
			$eventDamage->set( $damages );

			require_once( ROSTER_BASE. 'addons'. DIR_SEP. 'assessment'. DIR_SEP. 'inc/assessment.damagetakenattackdetails.class.php' );
			foreach ( $damages['attackDetails'] as $abilityName => &$abilityData ) {
				$eventDamageDetail = new AssessmentDamageTakenAttackDetails;
				$eventDamageDetail->get( $eventDamage->id, $abilityName, 'sum');
				$eventDamageDetail->set( $abilityData );

				foreach ( $abilityData['hitDetails'] as $hitDetail => &$hitDetailData ) {
					$eventDamageHitDetail = new AssessmentDamageTakenAttackDetails;
					$eventDamageHitDetail->get( $eventDamage->id, $abilityName, $hitDetail );
					$eventDamageHitDetail->set( $hitDetailData );
					unset($eventDamageHitDetail);
				}
				unset($eventDamageDetail);
			}

			require_once( ROSTER_BASE. 'addons'. DIR_SEP. 'assessment'. DIR_SEP. 'inc/assessment.damagetakendamagetypedetails.class.php' );
			foreach ( $damages['damageTypeDetails'] as $typeName => &$typeData ) {
				$eventDamageDetail = new AssessmentDamageTakenDamageTypeDetails;
				$eventDamageDetail->get( $eventDamage->id, $typeName );
				$eventDamageDetail->set( $typeData );
				unset($eventDamageDetail);
			}
			unset($eventDamage);
		}
		unset($eventId, $name, $data);
	}

	function _updateEventHealingDone( &$eventId = 0, &$name = false, &$data = false ) {
		$this->_updateEventHealingX( $eventId, $name, $data, 'AssessmentHealingDone');
		unset($eventId, $name, $data);
	}

	function _updateEventHealingX( &$eventId = 0, &$name = false, &$data = false, $class = false ) {
		global $roster;

		foreach ( $data as $memberName => &$healings ) {
			$eventHealing = new $class;
			$eventHealing->get( $eventId, $memberName, 'sum', 'sum' );
			$eventHealing->set( $healings );

			foreach ( $healings['healDetails'] as $abilityName => &$abilityDetails ) {
				$eventHealingDetail = new $class;
				$eventHealingDetail->get( $eventId, $memberName, $abilityName, 'abilitySum');
				$eventHealingDetail->set( $abilityDetails );
				unset($eventHealingDetail);

				if ( isset( $abilityDetails['hitDetails']['Heal'] ) ) {
					$eventHealingDetail = new $class;
					$eventHealingDetail->get( $eventId, $memberName, $abilityName, 'heal');
					$eventHealingDetail->set( $abilityDetails['hitDetails']['Heal'] );
					unset($eventHealingDetail);

				}
				if ( isset( $abilityDetails['hitDetails']['Critical Heal'] ) ) {
					$eventHealingDetail = new $class;
					$eventHealingDetail->get( $eventId, $memberName, $abilityName, 'criticalHeal');
					$eventHealingDetail->set( $abilityDetails['hitDetails']['Critical Heal'] );
					unset($eventHealingDetail);
				}
			}
			unset($eventHealing);
		}
		unset($eventId, $name, $data);
	}

	function _updateEventActivity( &$eventId = 0, &$name = false, &$data = false ) {
		global $roster;

		foreach ( $data as $memberName => &$activitys ) {
			$eventActivity = new AssessmentActivity;
			$eventActivity->get( $eventId, $memberName );
			$eventActivity->set( $activitys );
			unset($eventActivity);
		}
		unset($eventId, $name, $data);
	}

	function _updateEventDeaths( &$eventId = 0, &$name = false, &$data = false ) {
		global $roster;

		foreach ( $data as $memberName => &$deaths ) {
			$eventDeaths = new AssessmentDeaths;
			$eventDeaths->get( 0, $eventId, $memberName, 'sum' );
			$eventDeaths->set( $deaths );

			if ( isset($deaths['deathTimes']) ) {
				$i = 1;
				foreach ( $deaths['deathTimes'] as &$deathTime ) {
					$eventDeathsDetail = new AssessmentDeaths;
					$eventDeathsDetail->get( 0, $eventId, $memberName, $i++ );
					$tmp = array( 'deathTime' => $deathTime );
					$eventDeathsDetail->set( $tmp );
					unset($eventDeathsDetail);
				}
			}

			if ( isset($deaths['deathList'])) {
				$i = 1;
				foreach ( $deaths['deathList'] as &$deathDetails ) {
					$eventDeathsDetail = new AssessmentDeaths;
					$eventDeathsDetail->get( 0, $eventId, $memberName, $i );
					$eventDeathsDetail->set( $deathDetails );
					$j = 1;
					foreach ( $deathDetails['recentEventList'] as &$eventList ) {
						require_once( ROSTER_BASE. 'addons'. DIR_SEP. 'assessment'. DIR_SEP. 'inc/assessment.deathseventlist.class.php' );

						$deathEventList = new AssessmentDeathsEventList;
						$deathEventList->get( $eventId, $i, $j++ );
						$deathEventList->set( $eventList );
						unset($deathEventList);
					}
					$i++;
					unset($eventDeathsDetail);
				}
			}
			unset($eventDeaths);
		}
		unset($eventId, $name, $data);
	}

	function _updateEventGain( &$eventId = 0, &$name = false, &$data = false ) {
		global $roster;

		foreach ( $data as $memberName => &$gains ) {
			$eventGain = new AssessmentGain;
			$eventGain->get( $eventId, $memberName, 'sum' );
			$eventGain->set( $gains );

			foreach ( $gains['gainDetails'] as $gainDetailName => &$gainDetailData ) {
				$eventGainDetail = new AssessmentGain;
				$eventGainDetail->get( $eventId, $memberName, $gainDetailName);
				$eventGainDetail->set( $gainDetailData );
				unset($eventGainDetail);
			}
			unset($eventGain);
		}
		unset($eventId, $name, $data);
	}

	/**
	 * Resets addon messages
	 */
	function reset_messages()
	{
		$this->messages = 'Assessment:';
	}
}
