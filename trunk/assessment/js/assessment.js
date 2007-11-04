/**
 * WoWRoster.net WoWRoster
 *
 * ArmorySync javascript
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @since      File available since Release 2.6.0
*/


function showDamageDealt() {
	hide('healingDone');
	changeClass( 'healingDoneTab', 'tabInactive' );
	hide('damageTaken');
	changeClass( 'damageTakenTab', 'tabInactive' );
	hide('healingTaken');
	changeClass( 'healingTakenTab', 'tabInactive' );
	show('damageDealt');
	changeClass( 'damageDealtTab', 'tabActive' );
}
function showHealingDone() {
	hide('damageDealt');
	changeClass( 'damageDealtTab', 'tabInactive' );
	hide('damageTaken');
	changeClass( 'damageTakenTab', 'tabInactive' );
	hide('healingTaken');
	changeClass( 'healingTakenTab', 'tabInactive' );
	show('healingDone');
	changeClass( 'healingDoneTab', 'tabActive' );
}
function showDamageTaken() {
	hide('damageDealt');
	changeClass( 'damageDealtTab', 'tabInactive' );
	hide('healingDone');
	changeClass( 'healingDoneTab', 'tabInactive' );
	hide('healingTaken');
	changeClass( 'healingTakenTab', 'tabInactive' );
	show('damageTaken');
	changeClass( 'damageTakenTab', 'tabActive' );
}
function showHealingTaken() {
	hide('damageDealt');
	changeClass( 'damageDealtTab', 'tabInactive' );
	hide('healingDone');
	changeClass( 'healingDoneTab', 'tabInactive' );
	hide('damageTaken');
	changeClass( 'damageTakenTab', 'tabInactive' );
	show('healingTaken');
	changeClass( 'healingTakenTab', 'tabActive' );
}


function showMobDamageDealt() {
	hide('mobHealingDone');
	changeClass( 'mobHealingDoneTab', 'mobTabInactive' );
	hide('mobDamageTaken');
	changeClass( 'mobDamageTakenTab', 'mobTabInactive' );
	hide('mobHealingTaken');
	changeClass( 'mobHealingTakenTab', 'mobTabInactive' );
	show('mobDamageDealt');
	changeClass( 'mobDamageDealtTab', 'mobTabActive' );
}
function showMobHealingDone() {
	hide('mobDamageDealt');
	changeClass( 'mobDamageDealtTab', 'mobTabInactive' );
	hide('mobDamageTaken');
	changeClass( 'mobDamageTakenTab', 'mobTabInactive' );
	hide('mobHealingTaken');
	changeClass( 'mobHealingTakenTab', 'mobTabInactive' );
	show('mobHealingDone');
	changeClass( 'mobHealingDoneTab', 'mobTabActive' );
}
function showMobDamageTaken() {
	hide('mobDamageDealt');
	changeClass( 'mobDamageDealtTab', 'mobTabInactive' );
	hide('mobHealingDone');
	changeClass( 'mobHealingDoneTab', 'mobTabInactive' );
	hide('mobHealingTaken');
	changeClass( 'mobHealingTakenTab', 'mobTabInactive' );
	show('mobDamageTaken');
	changeClass( 'mobDamageTakenTab', 'mobTabActive' );
}
function showMobHealingTaken() {
	hide('mobDamageDealt');
	changeClass( 'mobDamageDealtTab', 'mobTabInactive' );
	hide('mobHealingDone');
	changeClass( 'mobHealingDoneTab', 'mobTabInactive' );
	hide('mobDamageTaken');
	changeClass( 'mobDamageTakenTab', 'mobTabInactive' );
	show('mobHealingTaken');
	changeClass( 'mobHealingTakenTab', 'mobTabActive' );
}


function changeClass( id, className ) {
	if(document.getElementById)
		if(document.getElementById(id))
			document.getElementById(id).className = className;
}
