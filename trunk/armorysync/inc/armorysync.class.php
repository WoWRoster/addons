<?php
/**
 * WoWRoster.net WoWRoster
 *
 * ArmorySync Library
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    ArmorySync
*/

if( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

require_once ($addon['dir'] . 'inc/simpleclass.lib.php');


class ArmorySync {
    
    var $memberName = '';
    var $memberId = 0;
    var $server = '';
    var $region = '';
    
    var $content = array();
    var $data = array();
    
    var $message;
    
    var $datas = array();
    
    var $status = array(    'guildInfo' => 0,
                            'characterInfo' => 0,
                            'skillInfo' => 0,
                            'reputationInfo' => 0,
                            'equipmentInfo' => 0,
                            'talentInfo' => 0,
                        );
    
    
    /**
     * syncronises one member with blizzards armory
     *
     * @param string $server
     * @param int $memberId
     * @return bool
     */
    function synchMemberByID( $server, $memberId = 0, $memberName = false ) {
        global $addon, $roster;
 
        $this->server = $server;
        $this->memberId = $memberId;
    
        
        $this->memberName = $memberName;
        
        $this->_getRosterData();
        if ( $this->status['characterInfo'] ) {
            include_once(ROSTER_LIB . 'update.lib.php');
            $update = new update;
            $update->fetchAddonData();
            $update->uploadData['characterprofiler']['myProfile'][$this->server]['Character'][$this->data['Name']] = $this->data;
            $this->message = $update->processMyProfile();
            $tmp = explode( "\n", $this->message);
            array_pop( $tmp );
            array_pop( $tmp );
            array_pop( $tmp );
            array_pop( $tmp );
            $this->message = implode( '', $tmp);

            return true;
        } else {
            $this->message = "No infos for ". $this->memberName. "<br>Character has probalby not been updated for a while";
        }
        return false;
    }
    
    /**
     * syncronises one member with blizzards armory
     *
     * @param string $server
     * @param int $memberId
     * @return bool
     */
    function synchGuildByID( $server, $memberId = 0 ) {
        global $addon, $roster;
 
        $this->server = $server;
        $this->memberId = $memberId;
    
        
        $this->memberName = $roster->data['guild_name'];
        
        $this->_getGuildInfo();
        if ( $this->status['guildInfo'] ) {
            include_once(ROSTER_LIB . 'update.lib.php');
            $update = new update;
            $update->fetchAddonData();
            
            $update->uploadData['characterprofiler']['myProfile'][$this->server]['Guild'][$this->data['name']] = $this->data;
            $this->message = $update->processGuildRoster();
            $tmp = explode( "\n", $this->message);
            array_pop( $tmp );
            array_pop( $tmp );
            array_pop( $tmp );
            array_pop( $tmp );
            $this->message = implode( '', $tmp);
            
            return true;
        }
        return false;
    }
    
    /**
     * fetches seperate parts of the character sheet
     *
     */
    function _getRosterData() {
        
        $this->_getCharacterInfo();
        $this->_getSkillInfo();
        $this->_getReputationInfo();
        $this->_getTalentInfo();
    }

    /**
     * fetches guild info
     *
     */
    function _getGuildInfo() {
        global $roster, $addon;
        
        include_once(ROSTER_LIB . 'armory.class.php');
        $armory = new RosterArmory;
        $armory->region = $roster->data['region'];
        $armory->setTimeOut( $addon['config']['armorysync_fetch_timeout']);
        
        $content = $this->_parseData( $armory->fetchGuild( $this->memberName, $roster->config['locale'], $this->server ) );
        if ( $this->_checkContent( $content, array( 'guildInfo', 'guild' ) ) ) {
            $guild = $content->guildInfo->guild;
            
            $this->data['Ranks'] = $this->_getGuildRanks( $roster->data['guild_id'] );
            $this->data['timestamp']['init']['datakey'] = $roster->data['region'];
            $this->data['timestamp']['init']['TimeStamp'] = time();
            $this->data['timestamp']['init']['Date'] = date('Y-m-d H:i:s');
            $this->data['timestamp']['init']['DateUTC'] = gmdate('Y-m-d H:i:s');
            
            $this->data['GPprovider'] = "rpgo";
            $this->data['GPversion'] = "2.1.0";
            $this->data['name'] = $roster->data['guild_name'];
            $this->data['Info'] = $roster->data['guild_info_text'];
            
            $members = $this->_getGuildMembers( $roster->data['guild_id'] );
            
            $min = 60;
            $hour = 60 * $min;
            $day = 24 * $hour;
            $month = 30 * $day;
            $year = 365 * $day;
            
            foreach ( $guild->members->character as $char ) {
                $player = array();
                $player['name'] = $char->name;
                $player['Class'] = $char->class;
                if ( substr($player["Class"] ,0,1) == 'J' && substr($player["Class"] ,-3) == 'ger' ) {
                        $player["Class"] = utf8_encode('Jäger');
                }
                $player['Level'] = $char->level;
                $player['Rank'] = $char->rank;
                if ( array_key_exists ( $char->name, $members ) ) {
                    $player['Note'] = $members[$char->name]['note'];
                    $player['Zone'] = $members[$char->name]['zone'];
                    $player['Status'] = $members[$char->name]['status'];
                    $player['Online'] = "0";
                    
                    $curtime = time();
                    $diff = $curtime - strtotime( $members[$char->name]['last_online'] );
                    $years = floor( $diff / $year );
                    $diff -= $years * $year;
                    $months = floor( $diff / $month );
                    $diff -= $months * $month;
                    $days = floor ( $diff / $day );
                    $diff -= $days * $day;
                    $hours = floor ( $diff / $hour );
                    
                    $player['LastOnline'] = $years. ":". $months. ":". $days. ":". $hours;
                    
                    $members[$char->name]['done'] = 1;
                } else {
                    $player['Online'] = "1";
                }
                $this->data['Members'][$char->name] = $player;
                $this->status['guildInfo'] += 1;
            }
            
            foreach ( $members as $member ) {
                if ( ! array_key_exists( 'done', $member ) ) {
                    if ( is_int( array_search( $member['guild_title'], explode( ',', $addon['config']['armorysync_protectedtitle'] ) ) ) ) {
                        
                        $player['name'] = $member['name'];
                        $player['Class'] = $member['class'];
                        $player['Level'] = $member['level'];
                        $player['Rank'] = $member['guild_rank'];
                        $player['Note'] = $member['note'];
                        $player['Zone'] = $member['zone'];
                        $player['Status'] = $member['status'];
                        $player['Online'] = "0";
                        
                        $curtime = time();
                        $diff = $curtime - strtotime( $member['last_online'] );
                        $years = floor( $diff / $year );
                        $diff -= $years * $year;
                        $months = floor( $diff / $month );
                        $diff -= $months * $month;
                        $days = floor ( $diff / $day );
                        $diff -= $days * $day;
                        $hours = floor ( $diff / $hour );
                        
                        $player['LastOnline'] = $years. ":". $months. ":". $days. ":". $hours;
                        
                        $this->data['Members'][$member['name']] = $player;
                    }
                }
            }
        }
    }
    
    /**
     * fetches guild info
     *
     */
    function checkGuildInfo( $name = false, $server = false, $region = false ) {
        global $roster, $addon;
        
        include_once(ROSTER_LIB . 'armory.class.php');
        $armory = new RosterArmory;
        $armory->region = $region;
        $armory->setTimeOut( $addon['config']['armorysync_fetch_timeout']);
        
        $content = $this->_parseData( $armory->fetchGuild( $name, $roster->config['locale'], $server ) );
        if ( $this->_checkContent( $content, array( 'guildInfo', 'guild' ) ) ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * fetches character info
     *
     */
    function _getCharacterInfo() {
        global $roster, $addon;
        
        include_once(ROSTER_LIB . 'armory.class.php');
        $armory = new RosterArmory;
        $armory->region = $roster->data['region'];
        $armory->setTimeOut( $addon['config']['armorysync_fetch_timeout']);
        
        $content = $this->_parseData( $armory->fetchCharacter( $this->memberName, $roster->config['locale'], $this->server ) );
        if ( $this->_checkContent($content, array('characterInfo', 'characterTab' ) ) ) {
            
            $char = $content->characterInfo->character;
            $tab = $content->characterInfo->characterTab;
            
            $rank = $this->_getMemberRank( $this->memberId );
            
            $this->data["Name"] = $char->name;
            $this->data["Level"] = $char->level;
            $this->data["Server"] = $char->realm;
            if ($char->hasProp("guildName") ) {
                    $this->data["Guild"]["Name"] = $char->guildName;
            } elseif ($char->hasProp("name")) {
                    $this->data["Guild"]["Name"] = $char->name;
            }
            $this->data["Guild"]["Title"] = $rank['guild_title'];
            $this->data["Guild"]["Rank"] = $rank['guild_rank'];
            $this->data["CPprovider"] = 'rpgo';
            $this->data["CPversion"] = '2.1.1';

            $this->data["Honor"]["Lifetime"]["HK"] = $tab->pvp->lifetimehonorablekills->value;
            $this->data["Honor"]["Lifetime"]["Name"] = $char->title;
            $this->data["Honor"]["Session"] = array();
            $this->data["Honor"]["Yesterday"] = array();
            $this->data["Honor"]["Current"] = array();

            $this->data["Attributes"]["Stats"]["Intellect"] = $tab->baseStats->intellect->base. ":" . ($tab->baseStats->intellect->effective - $tab->baseStats->intellect->base) . ":0";
            $this->data["Attributes"]["Stats"]["Agility"] = $tab->baseStats->agility->base. ":" . ($tab->baseStats->agility->effective - $tab->baseStats->agility->base) . ":0";
            $this->data["Attributes"]["Stats"]["Stamina"] = $tab->baseStats->stamina->base . ":" . ($tab->baseStats->stamina->effective - $tab->baseStats->stamina->base) . ":0";
            $this->data["Attributes"]["Stats"]["Strength"] = $tab->baseStats->strength->base . ":" . ($tab->baseStats->strength->effective - $tab->baseStats->strength->base) . ":0";
            $this->data["Attributes"]["Stats"]["Spirit"] = $tab->baseStats->spirit->base . ":" . ($tab->baseStats->spirit->effective - $tab->baseStats->spirit->base) . ":0";

            $this->data["Attributes"]["Defense"]["DodgeChance"] = $tab->defenses->dodge->percent;
            $this->data["Attributes"]["Defense"]["ParryChance"] = $tab->defenses->parry->percent;
            $this->data["Attributes"]["Defense"]["BlockChance"] = $tab->defenses->block->percent;
            $this->data["Attributes"]["Defense"]["ArmorReduction"] = $tab->defenses->armor->percent;

            $this->data["Attributes"]["Defense"]["Armor"] = $tab->baseStats->armor->base . ":" . ($tab->baseStats->armor->effective - $tab->baseStats->armor->base) . ":0";
            $this->data["Attributes"]["Defense"]["Defense"] = $tab->defenses->defense->value . ":" . $tab->defenses->defense->plusDefense . ":0";
            $this->data["Attributes"]["Defense"]["BlockRating"] = $tab->defenses->block->rating. ":0". ":0";
            $this->data["Attributes"]["Defense"]["ParryRating"] = $tab->defenses->parry->rating. ":0". ":0";
            $this->data["Attributes"]["Defense"]["DefenseRating"] = $tab->defenses->defense->rating. ":0". ":0";
            $this->data["Attributes"]["Defense"]["DodgeRating"] = $tab->defenses->dodge->rating. ":0". ":0";

            $this->data["Attributes"]["Defense"]["Resilience"]["Melee"] = $tab->defenses->resilience->value;
            // ??? $this->data["Attributes"]["Defense"]["Resilience"]["Ranged"]
            // ??? $this->data["Attributes"]["Defense"]["Resilience"]["Spell"]
            
            $this->data["Attributes"]["Resists"]["Frost"] = $tab->resistances->frost->value . ":0:0";
            $this->data["Attributes"]["Resists"]["Arcane"] = $tab->resistances->arcane->value . ":0:0";
            $this->data["Attributes"]["Resists"]["Fire"] = $tab->resistances->fire->value . ":0:0";
            $this->data["Attributes"]["Resists"]["Shadow"] = $tab->resistances->shadow->value . ":0:0";
            $this->data["Attributes"]["Resists"]["Nature"] = $tab->resistances->nature->value . ":0:0";
            $this->data["Attributes"]["Resists"]["Holy"] = $tab->resistances->holy->value . ":0:0";

            $this->data["Attributes"]["Melee"]["AttackPower"] = $tab->melee->power->base . ":". ($tab->melee->power->effective - $tab->melee->power->base ). ":0";
            $this->data["Attributes"]["Melee"]["HitRating"] = $tab->melee->hitRating->value . ":0:0";
            $this->data["Attributes"]["Melee"]["CritRating"] = $tab->melee->critChance->rating . ":0:0";
            $this->data["Attributes"]["Melee"]["HasteRating"] = $tab->melee->mainHandSpeed->hasteRating . ":0:0";
            
            $this->data["Attributes"]["Melee"]["CritChance"] = $tab->melee->critChance->percent;
            $this->data["Attributes"]["Melee"]["AttackPowerDPS"] = $tab->melee->power->increasedDps;
            
            if ( $tab->melee->mainHandWeaponSkill->value > 0 ) {
                
                $this->data["Attributes"]["Melee"]["MainHand"]["AttackSpeed"] = $tab->melee->mainHandDamage->speed;
                $this->data["Attributes"]["Melee"]["MainHand"]["AttackDPS"] = $tab->melee->mainHandDamage->dps;
                $this->data["Attributes"]["Melee"]["MainHand"]["AttackSkill"] = $tab->melee->mainHandWeaponSkill->value;
                $this->data["Attributes"]["Melee"]["MainHand"]["DamageRange"] = $tab->melee->mainHandDamage->min . ":" . $tab->melee->mainHandDamage->max;
                $this->data["Attributes"]["Melee"]["MainHand"]["AttackRating"] = $tab->melee->mainHandWeaponSkill->rating;
            }
            
            if ( $tab->melee->offHandWeaponSkill->value > 0 ) {
                
                $this->data["Attributes"]["Melee"]["OffHand"]["AttackSpeed"] = $tab->melee->offHandDamage->speed;
                $this->data["Attributes"]["Melee"]["OffHand"]["AttackDPS"] = $tab->melee->offHandDamage->dps;
                $this->data["Attributes"]["Melee"]["OffHand"]["AttackSkill"] = $tab->melee->offHandWeaponSkill->value;
                $this->data["Attributes"]["Melee"]["OffHand"]["DamageRange"] = $tab->melee->offHandDamage->min . ":" . $tab->melee->mainHandDamage->max;
                $this->data["Attributes"]["Melee"]["OffHand"]["AttackRating"] = $tab->melee->offHandWeaponSkill->rating;
            }

            // ??? $this->data["Attributes"]["Melee"]["DamageRangeTooltip"] = "";
            // ??? $this->data["Attributes"]["Melee"]["AttackPowerTooltip"] = "";

            
            if ( $tab->ranged->weaponSkill->value > 0 ) {
                
                $this->data["Attributes"]["Ranged"]["AttackPower"] = $tab->ranged->power->base . ":". ( $tab->ranged->power->effective - $tab->ranged->power->base ). ":0";
                $this->data["Attributes"]["Ranged"]["HitRating"] = $tab->ranged->hitRating->value. ":0:0";
                $this->data["Attributes"]["Ranged"]["CritRating"] = $tab->ranged->critChance->rating. ":0:0";
                $this->data["Attributes"]["Ranged"]["HasteRating"] = $tab->ranged->speed->hasteRating. ":0:0";
                
                $this->data["Attributes"]["Ranged"]["CritChance"] = $tab->ranged->critChance->percent;
                $this->data["Attributes"]["Ranged"]["AttackPowerDPS"] = $tab->ranged->power->increasedDps;
                
                $this->data["Attributes"]["Ranged"]["AttackSpeed"] = $tab->ranged->speed->value;
                $this->data["Attributes"]["Ranged"]["AttackDPS"] = $tab->ranged->damage->dps;
                $this->data["Attributes"]["Ranged"]["AttackSkill"] = $tab->ranged->weaponSkill->value;
                $this->data["Attributes"]["Ranged"]["DamageRange"] = $tab->ranged->damage->min . ":" . $tab->ranged->damage->max;
                $this->data["Attributes"]["Ranged"]["AttackRating"] = $tab->ranged->weaponSkill->rating;
            }
            
            $this->data["Attributes"]["Spell"]["HitRating"] = $tab->spell->hitRating->value . ":0:0";
            $this->data["Attributes"]["Spell"]["CritRating"] = $tab->spell->critChance->rating . ":0:0";
            $this->data["Attributes"]["Spell"]["HasteRating"] = "0:0:0"; // ???
            
            $this->data["Attributes"]["Spell"]["CritChance"] = min ( array (
                                                                    $tab->spell->critChance->arcane->percent,
                                                                    $tab->spell->critChance->fire->percent,
                                                                    $tab->spell->critChance->frost->percent,
                                                                    $tab->spell->critChance->holy->percent,
                                                                    $tab->spell->critChance->nature->percent,
                                                                    $tab->spell->critChance->shadow->percent ) );
            
            $this->data["Attributes"]["Spell"]["ManaRegen"] = $tab->spell->manaRegen->notCasting . ":". $tab->spell->manaRegen->casting;
            $this->data["Attributes"]["Spell"]["Penetration"] = $tab->spell->penetration->value;
            $this->data["Attributes"]["Spell"]["BonusDamage"] = min ( array(
                                                                    $tab->spell->bonusDamage->arcane->value,
                                                                    $tab->spell->bonusDamage->fire->value,
                                                                    $tab->spell->bonusDamage->frost->value,
                                                                    $tab->spell->bonusDamage->holy->value,
                                                                    $tab->spell->bonusDamage->nature->value,
                                                                    $tab->spell->bonusDamage->shadow->value ) );
            $this->data["Attributes"]["Spell"]["BonusHealing"] = $tab->spell->bonusHealing->value;
            
            $this->data["Attributes"]["Spell"]["SchoolCrit"]["Holy"] = $tab->spell->critChance->holy->percent;
            $this->data["Attributes"]["Spell"]["SchoolCrit"]["Frost"] = $tab->spell->critChance->frost->percent;
            $this->data["Attributes"]["Spell"]["SchoolCrit"]["Arcane"] = $tab->spell->critChance->arcane->percent;
            $this->data["Attributes"]["Spell"]["SchoolCrit"]["Fire"] = $tab->spell->critChance->fire->percent;
            $this->data["Attributes"]["Spell"]["SchoolCrit"]["Shadow"] = $tab->spell->critChance->shadow->percent;
            $this->data["Attributes"]["Spell"]["SchoolCrit"]["Nature"] = $tab->spell->critChance->nature->percent;

            $this->data["Attributes"]["Spell"]["School"]["Holy"] = $tab->spell->bonusDamage->holy->value;
            $this->data["Attributes"]["Spell"]["School"]["Frost"] = $tab->spell->bonusDamage->frost->value;
            $this->data["Attributes"]["Spell"]["School"]["Arcane"] = $tab->spell->bonusDamage->arcane->value;
            $this->data["Attributes"]["Spell"]["School"]["Fire"] = $tab->spell->bonusDamage->fire->value;
            $this->data["Attributes"]["Spell"]["School"]["Shadow"] = $tab->spell->bonusDamage->shadow->value;
            $this->data["Attributes"]["Spell"]["School"]["Nature"] = $tab->spell->bonusDamage->nature->value;
            
            
            
            $this->data["TalentPoints"] = ($char->level > 0) ? $char->level - $tab->talentSpec->treeOne - $tab->talentSpec->treeTwo - $tab->talentSpec->treeThree - 9 : 0;
            $this->data["Race"] = $char->race;
            $this->data["RaceId"] = $char->raceId;
            $this->data["RaceEn"] = $roster->locale->act['race_to_en'][$char->race];
            $this->data["Class"] = $char->class;
            
            // This is an ugly workaround for an encoding error in the armory
            if ( substr($this->data["Class"] ,0,1) == 'J' && substr($this->data["Class"] ,-3) == 'ger' ) {
                    $this->data["Class"] = utf8_encode('Jäger');
            }
            // This is an ugly workaround for an encoding error in the armory

            $this->data["ClassId"] = $char->classId;
            $this->data["ClassEn"] = preg_replace( "/\s/", "", $roster->locale->act['class_to_en'][$this->data["Class"]] );
            if ( $this->data["ClassEn"] == "Undead" ) {
                $this->data["ClassEn"] = "Scourge";
            }
            $this->data["Health"] = $tab->characterBars->health->effective;
            $this->data["Mana"] = $tab->characterBars->secondBar->effective;
            if ( $tab->characterBars->secondBar->type == "m" ) {
                $this->data["Power"] = $roster->locale->act['mana'];
            } elseif ( $tab->characterBars->secondBar->type == "r" ) {
                $this->data["Power"] = $roster->locale->act['rage'];
            } elseif ( $tab->characterBars->secondBar->type == "e" ) {
                $this->data["Power"] = $roster->locale->act['energy'];
            } elseif ( $tab->characterBars->secondBar->type == "f" ) {
                $this->data["Power"] = $roster->locale->act['focus'];
            }
            $this->data["Sex"] = $char->gender;

            // This is an ugly workaround for an encoding error in the armory
            if ( substr($this->data["Sex"],0,1) == 'M' && substr($this->data["Sex"],-6) == 'nnlich' ) {
                    $this->data["Sex"] = utf8_encode('Männlich');
            }
            // This is an ugly workaround for an encoding error in the armory

            $this->data["SexId"] = $char->genderId;
            
            $this->data["Money"]["Copper"] = 0;
            $this->data["Money"]["Silver"] = 0;
            $this->data["Money"]["Gold"] = 0;
            $this->data["Experience"] = 0;
            
            //$this->data["Hearth"] = "";

            $this->data["timestamp"]["init"]["DateUTC"] = date('Y/m/d/ H:i:s', strtotime($char->lastModified));
            $this->data['timestamp']['init']['datakey'] = $roster->data['region']. ":";
            // $this->data["TimePlayed"] = 0; //Needed, otherwise WoWDB will kick out this character
            // $this->data["TimeLevelPlayed"] = 0; //Needed, otherwise WoWDB will kick out this character

            // $this->data["Quests"] = array(); //No info for this from Armory
            // $this->data["Inventory"] = array(); //No info for this from Armory
            
            $this->data["Locale"] = $roster->config['locale'];
            
            $this->data["Inventory"] = array();
            $this->data["Equipment"] = array();
            $this->data["Skills"] = array();
            $this->data["Reputation"] = array();
            $this->data["Talents"] = array();
            
            $this->status['characterInfo'] = 1;
            $this->status['guildInfo'] = 1;
            
            if ( $this->_checkContent( $tab, array( 'items', 'item' ) ) ) {
                $equip = $tab->items->item;
                $this->_getEquipmentInfo( $equip );
            }
        }
    }

    /**
     * fetches character equipment info
     *
     */
    function _getEquipmentInfo( $equip = array() ) {
        global $roster, $addon;

        include_once(ROSTER_LIB . 'armory.class.php');
        
	foreach($equip as $item) {
            
            $slot = $this->_getItemSlot($item->slot);
            $this->data["Equipment"][$slot] = array();
            
            $this->data["Equipment"][$slot]['Item'] = $item->id;
            
            $this->data["Equipment"][$slot]['Icon'] = $item->icon;
            
            
            $armory = new RosterArmory;
            $armory->region = $roster->data['region'];
            $armory->setTimeOut( $addon['config']['armorysync_fetch_timeout']);
            
            $content = $this->_parseData( $armory->fetchItemTooltip( $item->id, $roster->config['locale'], $this->memberName, $this->server ) );
            
            if ( $this->_checkContent( $content, array( 'itemTooltips', 'itemTooltip' ) ) ) {
                
                $tooltip = $content->itemTooltips->itemTooltip;
                $this->data["Equipment"][$slot]['Name'] = $tooltip->name->_CDATA;
                //$this->data["Equipment"][$slot]['Name'] = $tooltip['name'][0]['data'];
                $this->data["Equipment"][$slot]['Color'] = $this->_getItemColor($tooltip->overallQualityId->_CDATA);
                $this->data["Equipment"][$slot]['Tooltip'] = $this->_getItemTooltip( $item->id );
                
                //// if ( is_array($tooltip['socketData'][0]['child']['socket']) ) {
                ////    $gems = $tooltip['socketData'][0]['child']['socket'];
                //    //$this->data["Equipment"][$slot]['Gem'] = array();
                //    //$i = 0;
                //    //foreach ( $gems as $gem ) {
                //    //    if ( $gemContent = $armory->fetchItemInfo( $item->gem'. $i. 'Id'], $roster->config['locale'] ) ) {
                //    //        $gemTooltip = $gemContent['page'][0]['child']['itemInfo'][0]['child']['item'][0];
                //    //        $newgem = array();
                //    //        $newgem['Item'] = $gemTooltip->id'].':0:0:0:0:0:0:0';
                //    //        $newgem['Color'] = $this->_getItemColor($gemTooltip->quality']);
                //    //        $newgem['Name'] = $gemTooltip->name'];
                //    //        $newgem['Icon'] = $gemTooltip->icon'];
                //    //        $newgem['Tooltip'] = $this->_getGemTooltip($gemTooltip->id']);
                //    //        $this->data["Equipment"][$slot]['Gem'][] = $newgem;
                //    //        $this->data["Equipment"][$slot]['Item'] .= ":". $gemTooltip['child']['createdBy'][0]['child']['spell'][0]->id'];
                //    //    }
                //    //    $i++;
                //    //}
                //    //if ( $i <= 2 ) {
                //    //    $this->data["Equipment"][$slot]['Item'] .= ":0";
                //    //}
                //    //if ( $i <= 1 ) {
                //    //    $this->data["Equipment"][$slot]['Item'] .= ":0";
                //    //}
                ////} else {
                //    $this->data["Equipment"][$slot]['Item'] .= ":0:0:0";
                //}
            }
            $this->data["Equipment"][$slot]['Item'] .= ":". $item->permanentenchant;
            $this->data["Equipment"][$slot]['Item'] .= ":". "0"; // GemId0
            $this->data["Equipment"][$slot]['Item'] .= ":". "0"; // GemId1
            $this->data["Equipment"][$slot]['Item'] .= ":". "0"; // GemId2
            $this->data["Equipment"][$slot]['Item'] .= ":". "0"; // ???
            $this->data["Equipment"][$slot]['Item'] .= ":". "0"; // ???
            $this->data["Equipment"][$slot]['Item'] .= ":". $item->seed;
            $this->status['equipmentInfo'] += 1;
        }
    }
    
    /**
     * fetches character skill info
     *
     */
    function _getSkillInfo() {
        global $roster, $addon;
        
        include_once(ROSTER_LIB . 'armory.class.php');
        $armory = new RosterArmory;
        $armory->region = $roster->data['region'];
        $armory->setTimeOut( $addon['config']['armorysync_fetch_timeout']);
        
        $content = $this->_parseData( $armory->fetchCharacterSkills( $this->memberName, $roster->config['locale'], $this->server ) );
        
        if ( $this->_checkContent( $content, array( 'characterInfo', 'skillTab' ) ) ) {
            
            $skillSets = $content->characterInfo->skillTab->skillCategory;
            
            foreach ($skillSets as $skillSet) {
                $type = $skillSet->name;
                $this->data["Skills"][$type] = array();
                
                if (is_array($skillSet->skill)) {
                    foreach($skillSet->skill as $skill) {
                        if ( $skill->key == 'lockpicking' || $skill->key == 'poisons' ) {
                            $this->data["Skills"][$type][$skill->name] = $skill->value . ":" . (($skill->max > 0) ? $skill->max : $skill->value);
                        } else {
                            $this->data["Skills"][$type][$skill->name] = $skill->value . ":" . (($skill->max > 0) ? $skill->max : 1);
                        }
                        $this->status['skillInfo'] += 1;
                    }
                } else {
                    $skill = $skillSet->skill;
                    $this->data["Skills"][$type][$skill->name] = $skill->value . ":" . (($skill->max > 0) ? $skill->max : 1);
                    $this->status['skillInfo'] += 1;
                }
                
                $this->data["Skills"][$type]["Order"] = $this->_getSkillOrder($type);
            }
            
            
        }
    }

    /**
     * fetches character reputation info
     *
     */
    function _getReputationInfo() {
        global $roster, $addon;
        
        include_once(ROSTER_LIB . 'armory.class.php');
        $armory = new RosterArmory;
        $armory->region = $roster->data['region'];
        $armory->setTimeOut( $addon['config']['armorysync_fetch_timeout']);
        
        $content = $this->_parseData( $armory->fetchCharacterReputation( $this->memberName, $roster->config['locale'], $this->server ) );
        
        if ( $this->_checkContent( $content, array( 'characterInfo', 'reputationTab') ) ) {
            
            $factionReputation = $content->characterInfo->reputationTab->factionCategory;
            
            $this->data["Reputation"]["Count"] = 0;
            
            if (is_array($factionReputation)) {
                foreach ($factionReputation as $factionRep) {
                    $factionType = $factionRep->name;
                    
                    if (is_array($factionRep->faction)) {
                        foreach($factionRep->faction as $faction) {
                            $this->_setFactionRep( $factionType, $faction);
                        }
                    } else {
                        $this->_setFactionRep( $factionType, $factionRep->faction);
                    }
                }
            } else {
                $factionRep = $factionReputation;
                $factionType = $factionRep->name;
                if (is_array($factionRep->faction)) {
                    foreach($factionRep->faction as $faction) {
                        $this->_setFactionRep( $factionType, $faction);
                    }
                } else {
                    $this->_setFactionRep( $factionType, $factionRep->faction);
                }
            }
        }
    }

    /**
     * fetches character talent info
     *
     */
    function _getTalentInfo() {
        global $roster, $addon;
        
        include_once(ROSTER_LIB . 'armory.class.php');
        $armory = new RosterArmory;
        $armory->region = $roster->data['region'];
        $armory->setTimeOut( $addon['config']['armorysync_fetch_timeout']);
        
        $content = $this->_parseData( $armory->fetchCharacterTalents( $this->memberName, $roster->config['locale'], $this->server ) );
        
        if ( $this->_checkContent( $content, array( 'characterInfo', 'talentTab') ) ) {
            
            $armoryTalents = $content->characterInfo->talentTab->talentTree->value;
            $talentArray = preg_split('//', $armoryTalents, -1, PREG_SPLIT_NO_EMPTY);
            $dl_class = $roster->locale->act['class_to_en'][$this->data["Class"]];
            //$dl_class = $this->_getDelocalisedClass($this->data["Class"]);
            $class = strtolower($dl_class);
            $locale = $roster->config['locale'];
            
            require_once ($addon['dir'] . 'inc/armorysynctalents.class.php');
            $ast = new ArmorySyncTalents();
            $talents = $ast->getTalents(  $class );
            
            require_once ($addon['dir'] . 'inc/talenticons_'. $class. '.php');
            
            $pointsSpent = array();
            
            for ($i = 0; $i < sizeof($talentArray); $i++) {
                    $talentName = $talents['talent'][$i][1];
                    $talentX = $talents['talent'][$i][3];
                    $talentY = $talents['talent'][$i][4];
                    $talentRank = $talentArray[$i];
                    $talentMax = $talents['talent'][$i][2];
                    $talentDesc = $talents['rank'][$i][(($talentRank > 0) ? $talentRank -1 : 0)];
                    $talentDesc = str_replace("\\\r\n", '', $talentDesc);
                    $talentDesc = str_replace("\t", '', $talentDesc);
                    $talentTree = $talents['tree'][
                                                    $i <= $talents['treeStartStop'][0] ? 0 :
                                                    ( $i <= $talents['treeStartStop'][1] ? 1 : 2 )
                                                   ];
                    $talentTreeOrder =  $i <= $talents['treeStartStop'][0] ? 1 :
                                        ( $i <= $talents['treeStartStop'][1] ? 2 : 3 );
                    $talentPic = $talentIcons[$class][$talentTreeOrder][$talentX][$talentY];
                    if ( array_key_exists ( $talentTree, $pointsSpent ) ) {
                        $pointsSpent[$talentTree] += $talentRank;
                    } else {
                        $pointsSpent[$talentTree] = $talentRank;
                    }
                    $this->status['talentInfo'] += $talentRank;

                    $talent = array(
                            "Location" => $talentY . ":" . $talentX,
                            "Tooltip" => $talentName . "<br>". $roster->locale->act['misc']['Rank']. " " . $talentRank ."/" . $talentMax . "<br>" . $talentDesc, 
                            "Icon" => $talentPic,
                            "Rank" => $talentRank . ":" . $talentMax
                    );
                    
                    $this->data["Talents"][$talentTree][$talentName] = $talent;
                    $this->data["Talents"][$talentTree]["Order"] = $talentTreeOrder;
                    $dl_talentTree = $this->_getDelocalisedTalenttree($talentTree, $dl_class);
                    $this->data["Talents"][$talentTree]["Background"] = $this->_getTalentBackground($dl_class, $dl_talentTree);
                    $this->data["Talents"][$talentTree]["PointsSpent"] = $pointsSpent[$talentTree];
            }
        }
    }
    // Helper functions

    /**
     * helper function to get classes for content
     *
     * @param string $class
     * @param string $tree
     * @return string
     */
    function _checkContent( $object = false, $keys = array( ) ) {

        if ( is_object ($object ) && count (array_keys ( $keys ) ) !== 0 ) {
            
            $subobject = $object;
            
            foreach ( $keys as $key ) {
                if ( $subobject->hasProp($key) ) {
                    $subobject = $subobject->$key;
                } else {
                    return false;
                }
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * helper function to get classes for content
     *
     * @param string $class
     * @param string $tree
     * @return string
     */
    function _setFactionRep( $factionType, $faction = array() ) {
        $this->data["Reputation"][$factionType][$faction->name] = array();
        $this->data["Reputation"][$factionType][$faction->name]["Value"] = $this->_getRepValue($faction->reputation) . ":" . $this->_getRepCap($faction->reputation);
        $this->data["Reputation"][$factionType][$faction->name]["Standing"] = $this->_getRepStanding($faction->reputation);
        $this->data["Reputation"][$factionType][$faction->name]["AtWar"] = $this->_getRepAtWar($faction->reputation);
        $this->status['reputationInfo'] += 1;
    }
    
    /**
     * helper function to get classes for content
     *
     * @param string $class
     * @param string $tree
     * @return string
     */
    function _parseData ( $array = array() ) {
        $this->datas = array();
        $this->_makeSimpleClass( $array );
        return $this->datas[0];
    }

    function _makeSimpleClass ( $array = array() ) {
        
        $tags = array_keys( $array );
        foreach ( $array as $tag => $content ) {
            foreach ( $content as $leave ) {
                $this->_initClass( $tag, $leave['attribs'] );
                $this->datas[count($this->datas)-1]->setProp("_CDATA", $leave['data']);
                if ( array_keys($leave['child']) ) {
                    $this->_makeSimpleClass( $leave['child'] );
                }
                $this->_finalClass( $tag );
            }
        }
    }

    /**
     * helper function initialise a simpleClass Object
     *
     * @param string $class
     * @param string $tree
     * @return string
     */
    function _initClass( $tag, $attribs = array() ) {
       $node = new SimpleClass();
       $node->setArray($attribs);
       $node->setProp("_TAGNAME", $tag);
       $this->datas[] = $node;
    }


    /**
     * helper function finalize a simpleClass Object
     *
     * @param string $class
     * @param string $tree
     * @return string
     */
    function _finalClass( $tag, $val = array() ) {
        if (count($this->datas) > 1) {
            $child = array_pop($this->datas);
                            
            if (count($this->datas) > 0) {
                $parent = &$this->datas[count($this->datas)-1];
                $tag = $child->_TAGNAME;
                
                if ($parent->hasProp($tag)) {
                    if (is_array($parent->$tag)) {
                        //Add to children array
                        $array = &$parent->$tag;
                        $array[] = $child;
                    } else {
                        //Convert node to an array
                        $children = array();
                        $children[] = $parent->$tag;
                        $children[] = $child;
                        $parent->$tag = $children;
                    }
                } else {
                    $parent->setProp($tag, $child);
                }
            }
        }
    }

    /**
     * helper function to get talent background
     *
     * @param string $class
     * @param string $tree
     * @return string
     */
    function _getTalentBackground($class, $tree) {
        $background = $class . str_replace(" ", "", $tree);
        
        switch ($tree) {
            case "Elemental":
            case "Feral":
                $background .= "Combat";
                break;
            case "Retribution":
                $background = $class . "Combat";
                break;
            case "Affliction":
                $background = $class . "Curses";
                break;
            case "Demonology":
                $background = $class . "Summoning";
                break;
        }
        
        return $background;
    }

    /**
     * helper function to delocalise character classes
     *
     * @param string $class
     * @return string
     */
    function _getDelocalisedClass($class) {
            global $addon, $roster;
            $ret = $class;
    
            foreach ( $roster->locale->act['Classes'] as $key => $value ) {
                    $value = $value;
                    if ( $value == $class ) {
                            $ret = $key;
                            break;
                    }
            }
            return $ret;
    }
    
    /**
     * helper function to delocalise talent trees
     *
     * @param string $tree
     * @param string $class
     * @return string
     */
    function _getDelocalisedTalenttree($tree, $class) {
            global $addon, $roster;
            $ret = $tree;
    
            foreach ( $roster->locale->act['Talenttrees'][$class] as $key => $value ) {
                    $value = $value;
                    if ( $value == $tree ) {
                            $ret = $key;
                            break;
                    }
            }
            return $ret;
    }

    /**
     * helper function to get item tooltips
     *
     * @param int $value
     * @return string 
     */
    function _getItemTooltip( $itemId = 0 ) {
        global $roster, $addon;
        
        include_once(ROSTER_LIB . 'armory.class.php');

        $armory = new RosterArmory;
        $armory->region = $roster->data['region'];
        $armory->setTimeOut( $addon['config']['armorysync_fetch_timeout']);

        if ( $content = $armory->fetchItemTooltipHTML( $itemId, $roster->config['locale'], $this->memberName, $this->server ) ) {
            
            $content = str_replace("\n", "", $content );
            $content = str_replace('<span class="tooltipRight">', "\t", $content );
            $content = str_replace("<br>", "%__BRTAG%", $content );
            
            $content = strip_tags( $content );
            
            $content = str_replace("%__BRTAG%", "<br>", $content );
            $content = utf8_encode($this->_unhtmlentities( $content ));
            //$content = mb_convert_encoding( $content, "UTF-8", "HTML-ENTITIES");
            $content = str_replace($roster->locale->act['bindings']['bind_on_pickup'], $roster->locale->act['bindings']['bind'], $content);
            $content = str_replace($roster->locale->act['bindings']['bind_on_equip'], $roster->locale->act['bindings']['bind'], $content);
            return $content;
        }
        return false;
    }

    /**
     * helper function to get item tooltips
     *
     * @param int $value
     * @return string 
     */
    function _getGemTooltip( $itemId = 0 ) {
        global $roster, $addon;
        
        include_once(ROSTER_LIB . 'armory.class.php');

        $armory = new RosterArmory;
        $armory->region = $roster->data['region'];
        if ( $content = $armory->fetchItemInfoHTML( $itemId, $roster->config['locale'] ) ) {
            
            //$pos = $this->_stripos_b($content, '<div class="displayTable">');
            $pos = $this->_stripos_b($content, '<div class="myTable">');
            if ($pos != 0){
                    //Need to trim garbage off..
                    $content = substr ($content, $pos);
            }
            $pos = 0;
            $pos = $this->_stripos_b($content, '</div>');
            $pos += 6;
            $len = strlen($content) - $pos;
            $len *= -1;
            if ($pos != 0){
                    //Need to trim garbage off..
                    $content = substr ($content, 0, $len);
            }

            $content = str_replace("\n", "", $content );
            $content = str_replace("<br>", "%__BRTAG%", $content );
            
            $content = strip_tags( $content );
            
            $content = str_replace("%__BRTAG%", "<br>", $content );
            $content = mb_convert_encoding( $content, "UTF-8", "HTML-ENTITIES");
            return $content;
        }
        return false;
    }

    /**
     * helper function to strip of a string
     *
     * @param string $haystack
     * @param string $needle
     * @return string
     */
    function _stripos_b($haystack, $needle){
        return strpos($haystack, stristr( $haystack, $needle ));
    }

    /**
     * helper function to get hex value for item color
     *
     * @param int $value
     * @return string hex color
     */
    function _getItemColor($value) {
        switch ($value) {
            case 5: return "ff8000"; //Orange
            case 4: return "a335ee"; //Purple
            case 3: return "0070dd"; //Blue
            case 2: return "1eff00"; //Green
            case 1: return "ffffff"; //White
            default: return "9d9d9d"; //Grey
        }
    }
    
    /**
     * helper function to get string value for item slot
     *
     * @param int $value
     * @return string slot
     */
    function _getItemSlot($value) {
        switch ($value) {
            case 0: return "Head";
            case 1: return "Neck";
            case 2: return "Shoulder";
            case 3: return "Shirt";
            case 4: return "Chest";
            case 5: return "Waist";
            case 6: return "Legs";
            case 7: return "Feet";
            case 8: return "Wrist";
            case 9: return "Hands";
            case 10: return "Finger0";
            case 11: return "Finger1";
            case 12: return "Trinket0";
            case 13: return "Trinket1";
            case 14: return "Back";
            case 15: return "MainHand";
            case 16: return "SecondaryHand";
            case 17: return "Ranged";
            case 18: return "Tabard";
        }
    }

    /**
     * helper function to get numerical value for skill order
     *
     * @param int $value
     * @return int SkillOrder
     */
    function _getSkillOrder($value) {
        global $roster, $addon;
        switch ($value) {
            case $roster->locale->act['Skills']['Class Skills']: return 1;
            case $roster->locale->act['Skills']['Professions']: return 2;
            case $roster->locale->act['Skills']['Secondary Skills']: return 3;
            case $roster->locale->act['Skills']['Weapon Skills']: return 4;
            case $roster->locale->act['Skills']['Armor Proficiencies']: return 5;
            case $roster->locale->act['Skills']['Languages']: return 6;
            default: return 0;
        }
    }

    /**
     * helper function to get relative value for reputation
     *
     * @param int $value
     * @return int RepValue
     */
    function _getRepValue($value) {
        $value = abs($value);
        
        if ($value >= 42000 && $value < 43000) { $value -= 42000; }
        elseif ($value >= 21000 && $value < 42000) { $value -= 21000; }
        elseif ($value >= 9000 && $value < 21000) { $value -= 9000;  }
        elseif ($value >= 3000 && $value < 9000) { $value -= 3000; }
        elseif ($value >= -3000 && $value < 3000) { $value -= 0;  }
        elseif ($value >= -6000 && $value < -3000) { $value -= 3000; }
        elseif ($value >= -42000 && $value < -6000) { $value -= 6000; }
        
        return $value;
    }

    /**
     * helper function to get cap value for reputation
     *
     * @param int $value
     * @return int RepCap
     */
    function _getRepCap($value) {
        if ($value >= 42000 && $value < 43000) { return 1000; }
        if ($value >= 21000 && $value < 42000) { return 21000; }
        if ($value >= 9000 && $value < 21000) { return 12000; }
        if ($value >= 3000 && $value < 9000) { return 6000; }
        if ($value >= -6000 && $value < 3000) { return 3000; }
        if ($value >= -42000 && $value < -6000) { return 36000; }
        
        return 0;
    }

    /**
     * helper function to get war status for reputation
     *
     * @param int $value
     * @return bool
     */
    function _getRepAtWar($value) {
        if ($value >= -3000) { return 0; }
        else { return 1; }
    }

    /**
     * helper function to get localized string for reputation
     *
     * @param int $value
     * @return string RepStanding
     */
    function _getRepStanding($value) {
        global $roster, $addon;
        
        if ($value >= 42000 && $value < 43000) { return $roster->locale->act['exalted']; }
        if ($value >= 21000 && $value < 42000) { return $roster->locale->act['revered']; }
        if ($value >= 9000 && $value < 21000) { return $roster->locale->act['honored']; }
        if ($value >= 3000 && $value < 9000) { return $roster->locale->act['friendly']; }
        if ($value >= 0 && $value < 3000) { return $roster->locale->act['neutral']; }
        if ($value >= -3000 && $value < 0) { return $roster->locale->act['unfriendly']; }
        if ($value >= -6000 && $value < -3000) { return $roster->locale->act['hostile']; }
        if ($value >= -42000 && $value < -6000) { return $roster->locale->act['hated']; }
        
        return "";
    }

    /**
     * helper function mbconvert workaround
     *
     * @param int $value
     * @return string RepStanding
     */
    function _unhtmlentities($string)
    {
        // Ersetzen numerischer Darstellungen
        $string = preg_replace('~&#x([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $string);
        $string = preg_replace('~&#([0-9]+);~e', 'chr("\\1")', $string);
        // Ersetzen benannter Zeichen
        $trans_tbl = get_html_translation_table(HTML_ENTITIES);
        $trans_tbl = array_flip($trans_tbl);
        return strtr($string, $trans_tbl);
    }
    


    // DB functions

    /**
     * db function to get member name by its id
     * 
     * @param int $memberId
     * @return string $memberName
     */
    function _getGuildMembers( $guildID ) {
        global $roster, $addon;
        
        $query =	"SELECT * ".
                        "FROM ". $roster->db->table('members'). " AS members ".
                        "WHERE ".
                        "members.guild_id=". $guildID;
        $result = $roster->db->query($query);
        if( $roster->db->num_rows($result) > 0 ) {
            
            $members = $roster->db->fetch_all();
            $array = array();
            foreach ( $members as $member ) {
                $array[$member['name']] = $member;
            }
            return $array;
        } else {
            return array();
        }
    }
    
    /**
     * db function to get member name by its id
     * 
     * @param int $memberId
     * @return string $memberName
     */
    function _getNamefromID( $memberID ) {
        global $roster, $addon;
        
        $query =	"SELECT ".
                        "members.name ".
                        "FROM ". $roster->db->table('members'). " AS members ".
                        "WHERE ".
                        "members.member_id=". $memberID;
        $memberName = $roster->db->query_first( $query );

        return $memberName;
    }

    /**
     * db function to get member name by its id
     * 
     * @param int $memberId
     * @return string $memberName
     */
    function _getGuildRanks( $guild_id ) {
        global $roster, $addon;
        
        $query =	"SELECT ".
                        "guild_rank, guild_title ".
                        "FROM ". $roster->db->table('members'). " AS members ".
                        "WHERE ".
                        "members.guild_id=". $guild_id. " ".
                        "AND NOT members.guild_title='' ".
                        "GROUP BY guild_rank, guild_title;";
        $result = $roster->db->query($query);
        if( $roster->db->num_rows($result) > 0 ) {
            
            $ranks = $roster->db->fetch_all();
            $array = array();
            foreach ( $ranks as $rank ) {
                $array[$rank['guild_rank']]['Title'] = $rank['guild_title'];
            }
            return $array;
        } else {
            $array = array();
            $array['0']['Title'] = $roster->locale->act['guildleader'];
            for ( $i = 1; $i <= 9; $i++ ) {
                $array[$i]['Title'] = $roster->locale->act['rank']. $i;
            }
            return $array;
        }
    }

    /**
     * db function to get members guild_rank and guild_title by its id
     * 
     * @param int $memberId
     * @return string $memberName
     */
    function _getMemberRank( $member_id ) {
        global $roster, $addon;
        
        $query =	"SELECT ".
                        "guild_rank, guild_title ".
                        "FROM ". $roster->db->table('members'). " AS members ".
                        "WHERE ".
                        "members.member_id=". $member_id. ";";
        $result = $roster->db->query($query);
        if( $roster->db->num_rows($result) > 0 ) {
            
            $ranks = $roster->db->fetch_all();
            return $ranks[0];
        } else {
            $array = array();
            return $array;
        }
    }


}
