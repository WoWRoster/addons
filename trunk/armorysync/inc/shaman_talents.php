<?php
$i = 0;
$t = 0;

$className = "Shaman Talents - Wrath of the Lich King Beta Talents";
$talentPath = "/info/basics/talents/";

$tree[$i] = "Elemental"; $i++;
$tree[$i] = "Enhancement"; $i++;
$tree[$i] = "Restoration"; $i++;

$i = 0;


$talent[$i] = array(0, "Convection", 5, 2, 1); $i++;
$talent[$i] = array(0, "Concussion", 5, 3, 1); $i++;
$talent[$i] = array(0, "Call of Flame", 3, 1, 2); $i++;
$talent[$i] = array(0, "Elemental Warding", 3, 2, 2); $i++; 
$talent[$i] = array(0, "Elemental Devastation", 3, 3, 2); $i++;
$talent[$i] = array(0, "Reverberation", 5, 1, 3); $i++;
$talent[$i] = array(0, "Elemental Focus", 1, 2, 3); $i++;
$talent[$i] = array(0, "Elemental Fury", 5, 3, 3); $i++;
$talent[$i] = array(0, "Improved Fire Nova Totem", 2, 1, 4); $i++;
$talent[$i] = array(0, "Eye of the Storm", 3, 4, 4); $i++;
$talent[$i] = array(0, "Elemental Reach", 2, 1, 5); $i++;
$talent[$i] = array(0, "Call of Thunder", 1, 2, 5); $i++;
$talent[$i] = array(0, "Unrelenting Storm", 3, 4, 5); $i++;
$talent[$i] = array(0, "Elemental Precision", 3, 1, 6); $i++;
$talent[$i] = array(0, "Lightning Mastery", 5, 3, 6); $i++;
$talent[$i] = array(0, "Elemental Mastery", 1, 2, 7); $i++;
$talent[$i] = array(0, "Storm, Earth and Fire", 3, 3, 7); $i++;
$talent[$i] = array(0, "Elemental Oath", 2, 2, 8); $i++;
$talent[$i] = array(0, "Lightning Overload", 5, 3, 8); $i++;
$talent[$i] = array(0, "Astral Shift", 3, 1, 9); $i++;
$talent[$i] = array(0, "Totem of Wrath", 1, 2, 9); $i++;
$talent[$i] = array(0, "Lava Flows", 3, 3, 9); $i++;
$talent[$i] = array(0, "Shamanism", 5, 2, 10); $i++;
$talent[$i] = array(0, "Thunderstorm", 1, 2, 11); $i++;

$treeStartStop[$t] = $i -1;
$t++;

//enhancement talents
$talent[$i] = array(1, "Enhancing Totems", 3, 1, 1); $i++;
$talent[$i] = array(1, "Earth\'s Grasp", 2, 2, 1); $i++;
$talent[$i] = array(1, "Ancestral Knowledge", 5, 3, 1); $i++;
$talent[$i] = array(1, "Guardian Totems", 2, 1, 2); $i++;
$talent[$i] = array(1, "Thundering Strikes", 5, 2, 2); $i++;
$talent[$i] = array(1, "Improved Ghost Wolf", 2, 3, 2); $i++;
$talent[$i] = array(1, "Improved Shields", 3, 4, 2); $i++;
$talent[$i] = array(1, "Elemental Weapons", 3, 1, 3); $i++;
$talent[$i] = array(1, "Shamanistic Focus", 1, 3, 3); $i++;
$talent[$i] = array(1, "Anticipation", 3, 4, 3); $i++;
$talent[$i] = array(1, "Flurry", 5, 2, 4); $i++;
$talent[$i] = array(1, "Toughness", 5, 3, 4); $i++;
$talent[$i] = array(1, "Improved Windfury Totem", 2, 1, 5); $i++;
$talent[$i] = array(1, "Spirit Weapons", 1, 2, 5); $i++;
$talent[$i] = array(1, "Mental Dexterity", 3, 3, 5); $i++;
$talent[$i] = array(1, "Unleashed Rage", 5, 1, 6); $i++;  
$talent[$i] = array(1, "Weapon Mastery", 3, 3, 6); $i++;
$talent[$i] = array(1, "Dual Wield Specialization", 3, 1, 7); $i++;
$talent[$i] = array(1, "Dual Wield", 1, 2, 7); $i++;
$talent[$i] = array(1, "Stormstrike", 1, 3, 7); $i++;
$talent[$i] = array(1, "Static Shock", 3, 1, 8); $i++;
$talent[$i] = array(1, "Lava Lash", 1, 2, 8); $i++;
$talent[$i] = array(1, "Improved Stormstrike", 2, 3, 8); $i++;
$talent[$i] = array(1, "Mental Quickness", 3, 1, 9); $i++; 
$talent[$i] = array(1, "Shamanistic Rage", 1, 2, 9); $i++;
$talent[$i] = array(1, "Earthen Power", 2, 3, 9); $i++;
$talent[$i] = array(1, "Maelstrom Weapon", 5, 2, 10); $i++;
$talent[$i] = array(1, "Feral Spirit", 1, 2, 11); $i++;

$treeStartStop[$t] = $i -1;
$t++;

//restoration talents
$talent[$i] = array(2, "Improved Healing Wave", 5, 2, 1); $i++;
$talent[$i] = array(2, "Totemic Focus", 5, 3, 1); $i++;
$talent[$i] = array(2, "Improved Reincarnation", 2, 1, 2); $i++;
$talent[$i] = array(2, "Ancestral Healing", 3, 2, 2); $i++;
$talent[$i] = array(2, "Tidal Focus", 5, 3, 2); $i++;
$talent[$i] = array(2, "Improved Water Shield", 3, 1, 3); $i++;
$talent[$i] = array(2, "Healing Focus", 3, 2, 3); $i++;
$talent[$i] = array(2, "Tidal Force", 1, 3, 3); $i++;
$talent[$i] = array(2, "Healing Grace", 3, 4, 3); $i++;
$talent[$i] = array(2, "Restorative Totems", 5, 2, 4); $i++;
$talent[$i] = array(2, "Tidal Mastery", 5, 3, 4); $i++;
$talent[$i] = array(2, "Healing Way", 3, 1, 5); $i++;
$talent[$i] = array(2, "Nature\'s Swiftness", 1, 3, 5); $i++;
$talent[$i] = array(2, "Focused Mind", 3, 4, 5); $i++;
$talent[$i] = array(2, "Purification", 5, 3, 6); $i++;
$talent[$i] = array(2, "Nature\'s Guardian", 5, 1, 7); $i++;
$talent[$i] = array(2, "Mana Tide Totem", 1, 2, 7); $i++;
$talent[$i] = array(2, "Cleanse Spirit", 1, 3, 7); $i++;
$talent[$i] = array(2, "Blessing of the Eternals", 2, 1, 8); $i++;
$talent[$i] = array(2, "Improved Chain Heal", 2, 2, 8); $i++;
$talent[$i] = array(2, "Nature\'s Blessing", 3, 3, 8); $i++;
$talent[$i] = array(2, "Ancestral Awakening", 3, 1, 9); $i++;
$talent[$i] = array(2, "Earth Shield", 1, 2, 9,); $i++;
$talent[$i] = array(2, "Improved Earth Shield", 2, 3, 9); $i++;
$talent[$i] = array(2, "Tidal Waves", 5, 2, 10,); $i++;
$talent[$i] = array(2, "Riptide", 1, 2, 11); $i++;
$treeStartStop[$t] = $i -1;
$t++;

$i = 0;


//Elemental Talents Begin




//Convection - Elemental
$rank[$i] = array(
"Reduces the mana cost of your Shock, Lightning Bolt, Chain Lightning, and Lava Burst spells by 2%.",
"Reduces the mana cost of your Shock, Lightning Bolt, Chain Lightning, and Lava Burst spells by 4%.",
"Reduces the mana cost of your Shock, Lightning Bolt, Chain Lightning, and Lava Burst spells by 6%.",
"Reduces the mana cost of your Shock, Lightning Bolt, Chain Lightning, and Lava Burst spells by 8%.",
"Reduces the mana cost of your Shock, Lightning Bolt, Chain Lightning, and Lava Burst spells by 10%."
		);
$i++;		
		
//Concussion - Elemental
$rank[$i] = array(
"Increases the damage done by your Lightning Bolt, Chain Lightning, Lava Burst and Shock spells by 1%.",
"Increases the damage done by your Lightning Bolt, Chain Lightning, Lava Burst and Shock spells by 2%.",
"Increases the damage done by your Lightning Bolt, Chain Lightning, Lava Burst and Lava Lash and Shock spells by 3%.",
"Increases the damage done by your Lightning Bolt, Chain Lightning, Lava Burst and Shock spells by 4%.",
"Increases the damage done by your Lightning Bolt, Chain Lightning, Lava Burst and Shock spells by 5%."
		);
$i++;		

//Call of Flame - Elemental
$rank[$i] = array(
"Increases the damage done by your Fire Totems by 5%, and damage done by your Lava Burst spell by 2%.",
"Increases the damage done by your Fire Totems by 10%, and damage done by your Lava Burst spell by 4%.",
"Increases the damage done by your Fire Totems by 15%, and damage done by your Lava Burst spell by 6%."
		);
$i++;	
		
		
//Elemental Warding - Elemental
$rank[$i] = array(
"Reduces all damage taken by 2%.",
"Reduces all damage taken by 4%.",
"Reduces all damage taken by 6%."
		);
$i++;				
		
	
//Elemental Devistation - Elemental 
$rank[$i] = array(
"Your offensive spell crits will increase your chance to get a critical strike with melee attacks by 3% for 10 sec.",
"Your offensive spell crits will increase your chance to get a critical strike with melee attacks by 6% for 10 sec.",
"Your offensive spell crits will increase your chance to get a critical strike with melee attacks by 9% for 10 sec."
		);
$i++;

//Reverberation - Elemental
$rank[$i] = array(
"Reduces the cooldown of your Shock spells by 0.2 sec.",
"Reduces the cooldown of your Shock spells by 0.4 sec.",
"Reduces the cooldown of your Shock spells by 0.6 sec.",
"Reduces the cooldown of your Shock spells by 0.8 sec.",
"Reduces the cooldown of your Shock spells by 1 sec."
		);
$i++;

//Elemental Focus - Elemental
$rank[$i] = array(
"After landing a critical strike with a Fire, Frost, or Nature damage spell, you enter a Clearcasting state.  The Clearcasting state reduces the mana cost of your next 2 damage or healing spells by 40%."
		);		
$i++;		
	

//Elemental Fury - Elemental 
$rank[$i] = array(
"Increases the critical strike damage bonus of your Searing, Magma, and Fire Nova Totems and your Fire, Frost, and Nature spells by 20%.",
"Increases the critical strike damage bonus of your Searing, Magma, and Fire Nova Totems and your Fire, Frost, and Nature spells by 40%.",
"Increases the critical strike damage bonus of your Searing, Magma, and Fire Nova Totems and your Fire, Frost, and Nature spells by 60%.",
"Increases the critical strike damage bonus of your Searing, Magma, and Fire Nova Totems and your Fire, Frost, and Nature spells by 80%.",
"Increases the critical strike damage bonus of your Searing, Magma, and Fire Nova Totems andbn your Fire, Frost, and Nature spells by 100%."
		);
$i++;

//Improved Fire Nova Totem - Elemental
$rank[$i] = array(
"Increases the damage done by your Fire Nova totem by 10%, and your Fire Nova Totem has a 50% chance to stun all targets damaged by your Fire Nova Totem for 2 sec.",
"Increases the damage done by your Fire Nova totem by 20%, and your Fire Nova Totem has a 100% chance to stun all targets damaged by your Fire Nova Totem for 2 sec."
		);
$i++;		

//Eye of the Storm - Elemental
$rank[$i] = array(
"Reduces the pushback suffered from damaging attacks while casting Lightning Bolt, Chain Lightning, Lava Burst and Hex spells by 23%.",
"Reduces the pushback suffered from damaging attacks while casting Lightning Bolt, Chain Lightning, Lava Burst and Hex spells by 46%.",
"Reduces the pushback suffered from damaging attacks while casting Lightning Bolt, Chain Lightning, Lava Burst and Hex spells by 70%."
		);
$i++;		

		

//Elemental Reach - Elemental 
$rank[$i] = array(
"Increases the range of your Lightning Bolt and Chain Lightning spells by 3 yards, and increases the radius of your Thunderstorm spell by 10%.",
"Increases the range of your Lightning Bolt and Chain Lightning spells by 6 yards, and increases the radius of your Thunderstorm spell by 20%."
		);
$i++;	

//Call of Thunder - Elemental
$rank[$i] = array( 
"Increases the critical strike chance of your Lightning Bolt, Chain Lightning and Thunderstorm spells by an additional 5%."
		);
$i++;

		

//Unrelenting Storm - Elemental 
$rank[$i] = array(
"Regenerate mana equal to 4% of your Intellect every 5 sec, even while casting.",
"Regenerate mana equal to 8% of your Intellect every 5 sec, even while casting.",
"Regenerate mana equal to 12% of your Intellect every 5 sec, even while casting."
		);
$i++;		

//Elemental Precision - Elemental 
$rank[$i] = array(
"Increases your chance to hit with Fire, Frost, and Nature spells by 1% and reduces the threat caused by Fire, Frost, and Nature spells by 10%.",
"Increases your chance to hit with Fire, Frost, and Nature spells by 2% and reduces the threat caused by Fire, Frost, and Nature spells by 20%.",
"Increases your chance to hit with Fire, Frost, and Nature spells by 3% and reduces the threat caused by Fire, Frost, and Nature spells by 30%."
		);
$i++;		

//Lightning Mastery - Elemental  
$rank[$i] = array(
"Reduces the cast time of your Lightning Bolt, Chain Lightning, and Lava Burst spells by 0.1 sec.",
"Reduces the cast time of your Lightning Bolt, Chain Lightning, and Lava Burst spells by 0.2 sec.",
"Reduces the cast time of your Lightning Bolt, Chain Lightning, and Lava Burst pells by 0.3 sec.",
"Reduces the cast time of your Lightning Bolt, Chain Lightning, and Lava Burst spells by 0.4 sec.",
"Reduces the cast time of your Lightning Bolt, Chain Lightning, and Lava Burst spells by 0.5 sec."
		);
$i++;		

//Elemental Mastery - Elemental				
$rank[$i] = array(
		"<span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>3 min cooldown</span><br>When activated, this spell gives your Fire, Frost, or Nature damage spell a 20% increased critical strike chance and reduces their mana cost by 20%. Lasts 30 sec."
		);
$i++;	

//Storm, Earth and Fire - Elemental
$rank[$i] = array(
"Reduces the cooldown of your Chain Lightning spell by .75 sec, your Earth Shock and Wind Shock range is increased by 1 yards and the periodic damage done by your Flame Shock is increased by 20%.",
"Reduces the cooldown of your Chain Lightning spell by 1.5 sec, your Earth Shock and Wind Shock range is increased by 3 yards and the periodic damage done by your Flame Shock is increased by 40%.",
"Reduces the cooldown of your Chain Lightning spell by 2.5 sec, your Earth Shock and Wind Shock range is increased by 5 yards and the periodic damage done by your Flame Shock is increased by 60%.",
		);
$i++;

//Elemental Oath - Elemental  
$rank[$i] = array(
"Your spell critical strikes grant your party or raid members within 100 yards Elemental Oath, increasing spell critical strike chance by 3%. In addition, while Clearcasting from Elemental Focus is active, you deal 5% more spell damage. Lasts 15 seconds.",
"Your spell critical strikes grant your party or raid members within 100 yards Elemental Oath, increasing spell critical strike chance by 5%. In addition, while Clearcasting from Elemental Focus is active, you deal 10% more spell damage. Lasts 15 seconds.",
		);
$i++;



//Lightning Overload - Elemental
$rank[$i] = array(
"Gives your Lightning Bolt and Chain Lightning spells a 4% chance to cast a second, similar spell on the same target at no additional cost that causes half damage and no threat.",
"Gives your Lightning Bolt and Chain Lightning spells a 8% chance to cast a second, similar spell on the same target at no additional cost that causes half damage and no threat.",
"Gives your Lightning Bolt and Chain Lightning spells a 12% chance to cast a second, similar spell on the same target at no additional cost that causes half damage and no threat.",
"Gives your Lightning Bolt and Chain Lightning spells a 16% chance to cast a second, similar spell on the same target at no additional cost that causes half damage and no threat.",
"Gives your Lightning Bolt and Chain Lightning spells a 20% chance to cast a second, similar spell on the same target at no additional cost that causes half damage and no threat."
		);
$i++;

//Astral Shift - Elemental
$rank[$i] = array(
"When stunned, feared or silenced you shift into the Astral Plane reducing all damage taken by 10% for the duration of the stun, fear or silence effect.",
"When stunned, feared or silenced you shift into the Astral Plane reducing all damage taken by 20% for the duration of the stun, fear or silence effect.",
"When stunned, feared or silenced you shift into the Astral Plane reducing all damage taken by 30% for the duration of the stun, fear or silence effect."
		);
$i++;

//Totem of Wrath - Elemental
$rank[$i] = array(
	"219 Mana<br>Instant cast<br>Tools: Fire Totem<br>Summons a Totem of Wrath with 5 health at the feet of the caster. The totem increases the damage done by spells and effects by 100 for all party and raid members, and increases the critical strike chance of spells and effects by 3% against all enemies within 40 yards. Lasts 5 min."
		);
$i++;	

//Lava Flows - Elemental
$rank[$i] = array(
"Increases the range of your Flame Shock by 5 yards, and increases the critical strike damage bonus of your Lava Burst spell by an additional 6%.",
"Increases the range of your Flame Shock by 10 yards, and increases the critical strike damage bonus of your Lava Burst spell by an additional 12%.",
"Increases the range of your Flame Shock by 15 yards, and increases the critical strike damage bonus of your Lava Burst spell by an additional 24%."
		);
$i++;

//Shamanism - Elemental
$rank[$i] = array(
"Your Lightning Bolt spell gains an additional 2% and your Lava Burst gains an additional 4% of your bonus damage effects.",
"Your Lightning Bolt spell gains an additional 4% and your Lava Burst gains an additional 8% of your bonus damage effects.",
"Your Lightning Bolt spell gains an additional 6% and your Lava Burst gains an additional 12% of your bonus damage effects.",
"Your Lightning Bolt spell gains an additional 8% and your Lava Burst gains an additional 16% of your bonus damage effects.",
"Your Lightning Bolt spell gains an additional 10% and your Lava Burst gains an additional 20% of your bonus damage effects."
		);		
$i++;

//Thunderstorm - Elemental
$rank[$i] = array(
	"<span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>45 sec cooldown</span><br>You call down a bolt of lightning, energizing you and damaging nearby enemies within 10 yards. Restores 5% mana to you and deals 566 to 644 Nature damage to all nearby enemies, knocking them back 20 yards."
		);
$i++;

//ENHANCEMENT TREE---------------------------------------------------------------------------------->

//Enhancing Totems - Enhancement	
$rank[$i] = array(
"Increases the effect of your Strength of Earth and Flametongue Totems by 5%.",
"Increases the effect of your Strength of Earth and Flametongue Totems by 10%.",
"Increases the effect of your Strength of Earth and Flametongue Totems by 15%."
		);
$i++;	


//Earth\'s Grasp - Elemental
$rank[$i] = array(
"Increases the health of your Stoneclaw Totem by 25% and the radius of your Earthbind Totem by 10%.",
"Increases the health of your Stoneclaw Totem by 50% and the radius of your Earthbind Totem by 20%."
		);
$i++;

//Ancestral Knowledge - Enhancement
$rank[$i] = array(
"Increases your intellect by 2%.",
"Increases your intellect by 4%.",
"Increases your intellect by 6%.",
"Increases your intellect by 8%.",
"Increases your intellect by 10%."
		);
$i++;		

//Guardian Totems - Enhancement
$rank[$i] = array(
"Increases the amount of armor increased by your Stoneskin Totem 10% and reduces the cooldown of your Grounding Totem by 1 sec.",
"Increases the amount of armor increased by your Stoneskin Totem 20% and reduces the cooldown of your Grounding Totem by 2 sec."
		);
$i++;		

//Thundering Strikes - Enhancement 
$rank[$i] = array(
"Improves your chance to get a critical strike with all spells and attacks by 1%.",
"Improves your chance to get a critical strike with all spells and attacks by 2%.",
"Improves your chance to get a critical strike with all spells and attacks by 3%.",
"Improves your chance to get a critical strike with all spells and attacks by 4%.",
"Improves your chance to get a critical strike with all spells and attacks by 5%."
		);		
$i++;		

//Improved Ghost Wolf - Enhancement 
$rank[$i] = array(

"Reduces the cast time of your Ghost Wolf spell by 1 sec.",
"Reduces the cast time of your Ghost Wolf spell by 2 sec."
		);
$i++;		

//Improved Shields - Enhancement
$rank[$i] = array(
"Increases the damage done by your Lightning Shield orbs by 5%, increases the amount of mana gained from your Water Shield orbs by 5% and increases the amount of healing done by your Earth Shield orbs by 5%.",
"Increases the damage done by your Lightning Shield orbs by 10%, increases the amount of mana gained from your Water Shield orbs by 10% and increases the amount of healing done by your Earth Shield orbs by 10%.",
"Increases the damage done by your Lightning Shield orbs by 15%, increases the amount of mana gained from your Water Shield orbs by 15% and increases the amount of healing done by your Earth Shield orbs by 15%."
		);
$i++;	

//Elemental Weapons - Enhancement 

$rank[$i] = array(
"Increases the damage caused by your Windfury Weapon effect by 13% increases the spell damage on your Flametongue Weapon by 10% and increases the bonus healing on your Earthliving Weapon by 10%.",
"Increases the damage caused by your Windfury Weapon effect by 27% increases the spell damage on your Flametongue Weapon by 20% and increases the bonus healing on your Earthliving Weapon by 20%.",
"Increases the damage caused by your Windfury Weapon effect by 40% increases the spell damage on your Flametongue Weapon by 30% and increases the bonus healing on your Earthliving Weapon by 30%."
		);
$i++;

	
	

//Shamanistic Focus - Enhancement  
$rank[$i] = array(
"Reduces the mana cost of your Shock spells by 45%."
		);
$i++;		

//Anticipation - Enhancement 
$rank[$i] = array(
"Increases your chance to dodge by an additional 1%, and reduces the duration of all Disarm effects used against you by 16%. This does not stack with other Disarm duration reducing effects.",
"Increases your chance to dodge by an additional 2%, and reduces the duration of all Disarm effects used against you by 25%. This does not stack with other Disarm duration reducing effects.",
"Increases your chance to dodge by an additional 3%, and reduces the duration of all Disarm effects used against you by 50%. This does not stack with other Disarm duration reducing effects."
		);$i++;		

//Flurry - Enhancement
$rank[$i] = array(
"Increases your attack speed by 10% for your next 3 swings after dealing a critical strike.",
"Increases your attack speed by 15% for your next 3 swings after dealing a critical strike.",
"Increases your attack speed by 20% for your next 3 swings after dealing a critical strike.",
"Increases your attack speed by 25% for your next 3 swings after dealing a critical strike.",
"Increases your attack speed by 30% for your next 3 swings after dealing a critical strike."
		);
$i++;		

//Toughness - Enhancement 
$rank[$i]= array(
"Increases your armor value from items by 2%, and reduces the duration of movement slowing effects on you by 6%.",
"Increases your armor value from items by 4%, and reduces the duration of movement slowing effects on you by 12%.",
"Increases your armor value from items by 6%, and reduces the duration of movement slowing effects on you by 18%.",
"Increases your armor value from items by 8%, and reduces the duration of movement slowing effects on you by 24%.",
"Increases your armor value from items by 10%, and reduces the duration of movement slowing effects on you by 30%."
		);
$i++;		

//Improved Windfury Weapon - Enhancement  
$rank[$i] = array(
"Increases the melee haste granted by your Windfury totem by 2%.",
"Increases the melee haste granted by your Windfury totem by 4%."
		);
$i++;

//Spirit Weapons - Enhancement
$rank[$i]= array(
"Gives a chance to parry enemy melee attacks and reduces the threat generated by your melee attacks by 30%."
			);
$i++;			

//Mental Dexterity - Enhancement 
$rank[$i] = array(
"Increases your Attack Power by 33% of your intellect.",
"Increases your Attack Power by 66% of your intellect.",
"Increases your Attack Power by 100% of your intellect."
		);
$i++;

	
//Unleashed Rage - Enhancement 
$rank[$i] = array(
"Causes your critical hits with melee attacks to increase all party members\' attack power by 2% if within 45 yards of the Shaman. Lasts 10 sec.",
"Causes your critical hits with melee attacks to increase all party members\' attack power by 4% if within 45 yards of the Shaman. Lasts 10 sec.",
"Causes your critical hits with melee attacks to increase all party members\' attack power by 6% if within 45 yards of the Shaman. Lasts 10 sec.",
"Causes your critical hits with melee attacks to increase all party members\' attack power by 8% if within 45 yards of the Shaman. Lasts 10 sec.",
"Causes your critical hits with melee attacks to increase all party members\' attack power by 10% if within 45 yards of the Shaman. Lasts 10 sec."
		);
$i++;		
			
//Weapon Mastery - Enhancement
$rank[$i]= array(
"Increases the damage you deal with all weapons by 4%.",
"Increases the damage you deal with all weapons by 7%.",
"Increases the damage you deal with all weapons by 10%."
		);
$i++;		

//Dual Wield Specialization - Enhancement
$rank[$i]= array(
"Increases your chance to hit while dual wielding by an additional 2%.",
"Increases your chance to hit while dual wielding by an additional 4%.",
"Increases your chance to hit while dual wielding by an additional 6%."
		);
$i++;		

//Dual Wield - Enhancement
$rank[$i]= array(
"Allows one-hand and off-hand weapons to be equipped in the off-hand."
		);
$i++;		

//Stormstrike - Enhancement 
$rank[$i]= array(
		"<span style=text-align:left;float:left;>351 Mana</span><span style=text-align:right;float:right;>Melee Range</span><br><span style=text-align:left;float:left;>Instant cast</span><span style=text-align:right;float:right;>10 sec cooldown</span><br><span style=text-align:left;float:left;>Requires Melee Weapon</span><BR>Instantly attack with both weapons. In addition, the next 2 sources of Nature damage dealt to the target are increased by 20%. Lasts 12 sec."
		);
$i++;


//Static Shock - Enhancement 
$rank[$i] = array(
"You have a 2% chance to hit your target with a Lightning Shield Orb charge when you do damage, and increases the number of charges of your Lightning Shield by 2.",
"You have a 4% chance to hit your target with a Lightning Shield Orb charge when you do damage, and increases the number of charges of your Lightning Shield by 4.",
"You have a 6% chance to hit your target with a Lightning Shield Orb charge when you do damage, and increases the number of charges of your Lightning Shield by 6."
		);
$i++;


		
//Lava Lash - Enhancement
$rank[$i]= array(
"<span style=text-align:left;float:left;>164 Mana</span><span style=text-align:right;float:right;>Melee Range</span><br><span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>6 sec cooldown</span><br>You charge your off-hand weapon with lava, instantly dealing 100% off-hand Weapon damage. Damage is increased by 25% if your off-hand weapon is enchanted with Flametongue."
		);
$i++;		


//Improved Stormstrike - Enhancement
$rank[$i]= array(
"Increases the amount of Stormstrike charges by 1, and reduces the cooldown by 1 sec.",
"Increases the amount of Stormstrike charges by 2, and reduces the cooldown by 2 sec."
		);
$i++;



//Mental Quickness - Enhancement
$rank[$i]= array(
"Reduces the mana cost of your instant cast Shaman spells by 2% and increases your spell power by an amount equal to 10% of your attack power.",
"Reduces the mana cost of your instant cast Shaman spells by 4% and increases your spell power by an amount equal to 20% of your attack power.",
"Reduces the mana cost of your instant cast Shaman spells by 6% and increases your spell power by an amount equal to 30% of your attack power."
		);
$i++;

//Shamanistic Rage - Enhancement 
$rank[$i]= array(
		"<span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>2 min cooldown</span><br>Reduces all damage taken by 30% and gives your successful melee attacks a chance to regenerate mana equal to 30% of your attack power.  Lasts 15 sec."
		);
$i++;

//Earthen Power - Enhancement 
$rank[$i] = array(
"Your Earthbind Totem has a 50% chance to also remove all snare effects from you and nearby friendly targets when it pulses.",
"Your Earthbind Totem has a 100% chance to also remove all snare effects from you and nearby friendly targets when it pulses."
		);
$i++;

//Maelstrom Weapon - Enhancement 
$rank[$i] = array(
"When you deal damage with a melee weapon, you have a chance to reduce the cast time of your next Lightning Bolt, Chain Lightning, Lesser Healing Wave, Chain Heal or Healing Wave Spell by 20%. Stacks up to 5 times. Lasts 30 seconds.",
"When you deal damage with a melee weapon, you have a chance (higher than rank 1) to reduce the cast time of your next Lightning Bolt, Chain Lightning, Lesser Healing Wave, Chain Heal or Healing Wave Spell by 20%. Stacks up to 5 times. Lasts 30 seconds.",
"When you deal damage with a melee weapon, you have a chance (higher than rank 2) to reduce the cast time of your next Lightning Bolt, Chain Lightning, Lesser Healing Wave, Chain Heal or Healing Wave Spell by 20%. Stacks up to 5 times. Lasts 30 seconds.",
"When you deal damage with a melee weapon, you have a chance (higher than rank 3) to reduce the cast time of your next Lightning Bolt, Chain Lightning, Lesser Healing Wave, Chain Heal or Healing Wave Spell by 20%. Stacks up to 5 times. Lasts 30 seconds.",
"When you deal damage with a melee weapon, you have a chance (higher than rank 4) to reduce the cast time of your next Lightning Bolt, Chain Lightning, Lesser Healing Wave, Chain Heal or Healing Wave Spell by 20%. Stacks up to 5 times. Lasts 30 seconds."

		);
$i++;

//Feral Spirit - Enhancement
$rank[$i] = array(
	"<span style=text-align:left;float:left;>495 Mana</span><span style=text-align:right;float:right;>30 yd range</span><br><span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>3 min cooldown</span><br>Summons two Spirit Wolves under the command of the Shaman, lasting 45 sec."
		);
$i++;


//RESTORATION TREE------------------------------------------------------------------------------->
//Improved Healing Wave - Restoration 
$rank[$i]= array(
"Reduces the casting time of your Healing Wave spell by 0.1 sec.",
"Reduces the casting time of your Healing Wave spell by 0.2 sec.",
"Reduces the casting time of your Healing Wave spell by 0.3 sec.",
"Reduces the casting time of your Healing Wave spell by 0.4 sec.",
"Reduces the casting time of your Healing Wave spell by 0.5 sec."
		);
$i++;		
		
	
//Totemic Focus - Restoration
$rank[$i]= array(
"Reduces the Mana cost of your totems by 5%.",
"Reduces the Mana cost of your totems by 10%.",
"Reduces the Mana cost of your totems by 15%.",
"Reduces the Mana cost of your totems by 20%.",
"Reduces the Mana cost of your totems by 25%."
		);
$i++;
		
//Improved Reincarnation - Restoration 
$rank[$i]= array(
"Reduces the cooldown of your Reincarnation spell by 10 min and increases the amount of health and mana you reincarnate with by an additional 10%.",
"Reduces the cooldown of your Reincarnation spell by 20 min and increases the amount of health and mana you reincarnate with by an additional 20%."
		);
$i++;		
		
//Ancestral Healing - Restoration 
$rank[$i]= array(
"Increases your target\'s armor value by 8% for 15 sec after getting a critical effect from one of your healing spells.",
"Increases your target\'s armor value by 16% for 15 sec after getting a critical effect from one of your healing spells.",
"Increases your target\'s armor value by 25% for 15 sec after getting a critical effect from one of your healing spells."
		);
$i++;		
		
//Tidal Focus - Restoration 
$rank[$i]= array(
"Reduces the Mana cost of your healing spells by 1%.",
"Reduces the Mana cost of your healing spells by 2%.",
"Reduces the Mana cost of your healing spells by 3%.",
"Reduces the Mana cost of your healing spells by 4%.",
"Reduces the Mana cost of your healing spells by 5%."
		);
$i++;		
		
//Improved Water Shield - Restoration      
$rank[$i]= array(
"You have a 33% chance to instantly consume a Water Shield Orb when you gain a critical effect from your Healing Wave or Riptide spells, and a 20% chance when you gain a critical effect from your Lesser Healing Wave Spell.",
"You have a 66% chance to instantly consume a Water Shield Orb when you gain a critical effect from your Healing Wave or Riptide spells, and a 20% chance when you gain a critical effect from your Lesser Healing Wave Spell.",
"You have a 100% chance to instantly consume a Water Shield Orb when you gain a critical effect from your Healing Wave or Riptide spells, and a 20% chance when you gain a critical effect from your Lesser Healing Wave Spell."
		);
$i++;		
	
//Healing Focus - Restoration  
$rank[$i]= array(
"Gives you a 23% chance to avoid interruption caused by damage while casting any Shaman healing spell.",
"Gives you a 46% chance to avoid interruption caused by damage while casting any Shaman healing spell.",
"Gives you a 70% chance to avoid interruption caused by damage while casting any Shaman healing spell."
		);
$i++;		
		
//Tidal Force - Restoration 
$rank[$i]= array(
"<span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>3 min cooldown</span><br>Increases the critical effect chance of your Healing Wave, Lesser Healing Wave and Chain heal by 60%. Each critical heal reduces the chance by 20%."
		);
$i++;		

//Healing Grace - Restoration 
$rank[$i]= array(
"Reduces the threat generated by your healing spells by 5% and reduces the chance your spells will be dispelled by 10%.",
"Reduces the threat generated by your healing spells by 10% and reduces the chance your spells will be dispelled by 20%.",
"Reduces the threat generated by your healing spells by 15% and reduces the chance your spells will be dispelled by 30%."
		);
$i++;	

//Improved Mana Spring Totem - Restoration  
$rank[$i]= array(
"Increases the effect of your Mana Spring and Healing Stream Totems by 5%.",
"Increases the effect of your Mana Spring and Healing Stream Totems by 10%.",
"Increases the effect of your Mana Spring and Healing Stream Totems by 15%.",
"Increases the effect of your Mana Spring and Healing Stream Totems by 20%.",
"Increases the effect of your Mana Spring and Healing Stream Totems by 25%."
		);
$i++;	

		
//Tidal Mastery - Restoration 
$rank[$i]= array(
"Increases the critical effect chance of your healing and lightning spells by 1%.",
"Increases the critical effect chance of your healing and lightning spells by 2%.",
"Increases the critical effect chance of your healing and lightning spells by 3%.",
"Increases the critical effect chance of your healing and lightning spells by 4%.",
"Increases the critical effect chance of your healing and lightning spells by 5%."
		);
$i++;	
		
//Healing Way - Restoration  
$rank[$i]= array(
"Your Healing Wave spells have a 33% chance to increase the effect of subsequent Healing Wave spells on that target by 18% for 15 sec.",
"Your Healing Wave spells have a 66% chance to increase the effect of subsequent Healing Wave spells on that target by 18% for 15 sec. ",
"Your Healing Wave spells have a 100% chance to increase the effect of subsequent Healing Wave spells on that target by 18% for 15 sec. "
		);
$i++;

//Nature\'s Swiftness - Restoration
$rank[$i]= array(
		"<span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>3 min cooldown</span><br>When activated, your next Nature spell with a casting time less than 10 sec becomes an instant cast spell."
		);
$i++;	

//Focused Mind - Restoration  
$rank[$i]= array(
"Reduces the duration of any Silence or Interrupt effects used against the Shaman by 10%. This effect does not stack with other similar effects.",
"Reduces the duration of any Silence or Interrupt effects used against the Shaman by 20%. This effect does not stack with other similar effects.",
"Reduces the duration of any Silence or Interrupt effects used against the Shaman by 30%. This effect does not stack with other similar effects."
		);
$i++;	

//Purification - Restoration  
$rank[$i]= array(
"Increases the effectiveness of your healing spells by 2%.",
"Increases the effectiveness of your healing spells by 4%.",
"Increases the effectiveness of your healing spells by 6%.",
"Increases the effectiveness of your healing spells by 8%.",
"Increases the effectiveness of your healing spells by 10%."
		);
$i++;

//Nature\'s Guardian - Restoration  
$rank[$i]= array(
"Whenever a damaging attack is taken that reduces you below 30% health, you have a 10% chance to heal 10% of your total health and reduce your threat level on that target. 8 second cooldown.",
"Whenever a damaging attack is taken that reduces you below 30% health, you have a 20% chance to heal 10% of your total health and reduce your threat level on that target. 8 second cooldown.",
"Whenever a damaging attack is taken that reduces you below 30% health, you have a 30% chance to heal 10% of your total health and reduce your threat level on that target. 8 second cooldown.",
"Whenever a damaging attack is taken that reduces you below 30% health, you have a 40% chance to heal 10% of your total health and reduce your threat level on that target. 8 second cooldown.",
"Whenever a damaging attack is taken that reduces you below 30% health, you have a 50% chance to heal 10% of your total health and reduce your threat level on that target. 8 second cooldown."
		);
$i++;


//Mana Tide Totem - Restoration 
$rank[$i]= array(
"88 Mana<br><span style=text-align:left;float:left;>Instant cast</span><span style=text-align:right;float:right;>5 min cooldown</span><br>Tools: Water Totem<br>Summons a Mana Tide Totem with 5 health at the feet of the caster for 12 sec that restores 6% of total mana every 3 seconds to group members within 20 yards."
		);
$i++;

//Cleanse Spirit - Restoration 
$rank[$i]= array(
"<span style=text-align:left;float:left;>307 Mana</span><span style=text-align:right;float:right;>40 yd range</span><br>Instant Cast<br>Cleanse the spirit of a friendly target, removing 1 poison effect, 1 disease effect, and 1 curse effect."
				);
$i++;

//Blessing of the Eternals - Restoration  
$rank[$i]= array(
"Increases the critical effect chance of your spells by 2%, and increases the chance to apply the Earthliving heal over time effect ont he target by 40% when they are at or under 35% total health.",
"Increases the critical effect chance of your spells by 4%, and increases the chance to apply the Earthliving heal over time effect ont he target by 40% when they are at or under 35% total health."
		);
$i++;

//Improved Chain Heal - Restoration  
$rank[$i]= array(
"Increases the amount healed by your Chain Heal spell by 10%.",
"Increases the amount healed by your Chain Heal spell by 20%."
		);
$i++;	

	
//Nature\'s Blessing - Restoration  
$rank[$i]= array(
"Increases your healing by an amount equal to 5% of your Intellect.",
"Increases your healing by an amount equal to 10% of your Intellect.",
"Increases your healing by an amount equal to 15% of your Intellect."
		);
$i++;			
	
//Ancestral Awakening - Restoration  
$rank[$i]= array(
"When you critically heal with your Healing Wave or Lesser Healing Wave, you summon an Ancestral spirit to aid you, instantly healing the lowest precentage health friendly party or raid target within 40 yards for 10% of the amount healed.",
"When you critically heal with your Healing Wave or Lesser Healing Wave, you summon an Ancestral spirit to aid you, instantly healing the lowest precentage health friendly party or raid target within 40 yards for 20% of the amount healed.",
"When you critically heal with your Healing Wave or Lesser Healing Wave, you summon an Ancestral spirit to aid you, instantly healing the lowes tprecentage health friendly party or raid target within 40 yards for 30% of the amount healed."
		);
$i++;		
				
		
//Earth Shield - Restoration 
$rank[$i]= array(
		"<span style=text-align:left;float:left;>600 Mana</span><span style=text-align:right;float:right;>40 yd range</span><br>Instant Cast<br>Protects the target with an earthen shield, giving a 30% chance of ignoring spell interruption when damaged and causing melee attacks to heal the shielded target for 150. This effect can only occur once every few seconds. 6 charges. Lasts 10 min. Earth Shield can only be placed on one target at a time and only one Elemental Shield can be active on a target at a time.<br><br>\
		&nbsp;Trainable Ranks Listed Below:<br>\
		&nbsp;Rank 2: 745 Mana, Heals for 205<br>\
		&nbsp;Rank 3: 900 Mana, Heals for 270"
				);
$i++;

//Improved Earth Shield - Restoration  
$rank[$i]= array(
"Increases the amount of charges for your Earth Shield by 1, and increases the healing done by your Earth Shield by 5%.",
"Increases the amount of charges for your Earth Shield by 2, and increases the healing done by your Earth Shield by 10%."
		);
$i++;	

//Tidal Waves - Restoration  
$rank[$i]= array(
"You have a 20% chance after you cast Chain Heal or Riptide to lower the cast time of your next 2 Lesser Healing Wave or Healing Wave spells by 30%. In addition, your Healing Wave gains an additional 4% of your bonus healing effects and your Lesser Healing Wave gains an additional 2% of your bonus healing effects.",
"You have a 40% chance after you cast Chain Heal or Riptide to lower the cast time of your next 2 Lesser Healing Wave or Healing Wave spells by 30%. In addition, your Healing Wave gains an additional 8% of your bonus healing effects and your Lesser Healing Wave gains an additional 4% of your bonus healing effects.",
"You have a 60% chance after you cast Chain Heal or Riptide to lower the cast time of your next 2 Lesser Healing Wave or Healing Wave spells by 30%. In addition, your Healing Wave gains an additional 12% of your bonus healing effects and your Lesser Healing Wave gains an additional 6% of your bonus healing effects.",
"You have a 80% chance after you cast Chain Heal or Riptide to lower the cast time of your next 2 Lesser Healing Wave or Healing Wave spells by 30%. In addition, your Healing Wave gains an additional 16% of your bonus healing effects and your Lesser Healing Wave gains an additional 8% of your bonus healing effects.",
"You have a 100% chance after you cast Chain Heal or Riptide to lower the cast time of your next 2 Lesser Healing Wave or Healing Wave spells by 30%. In addition, your Healing Wave gains an additional 20% of your bonus healing effects and your Lesser Healing Wave gains an additional 10% of your bonus healing effects."
		);
$i++;	

//Riptide - Restoration 
$rank[$i]= array(
"<span style=text-align:left;float:left;>923 Mana</span><span style=text-align:right;float:right;>40 yd range</span><br><span style=text-align:left;float:left;>Instant cast</span><span style=text-align:right;float:right;>6 sec cooldown</span><br>Heals a friendly target for 639 to 691 and another 665 over 15 sec. Your next Chain Heal cast on that primary target within 15 sec will consume the healing over time effect and increase the amount of Chain Heal by 25%."
				);
$i++;
		
//Restoration Talents End^^


?>
