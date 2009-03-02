<?php
$i = 0;
$t = 0;

$className = "Death Knight Talents";
$talentPath = "/info/basics/talents/";

$tree[$i] = "Blood"; $i++;
$tree[$i] = "Frost"; $i++;
$tree[$i] = "Unholy"; $i++;

$i = 0;

//rank
//horizontal position
//vertical position
//Blood talents
$talent = array();
$talent[$i] = array(0, "Butchery", 2, 1, 1); $i++;
$talent[$i] = array(0, "Subversion", 3, 2, 1); $i++;
$talent[$i] = array(0, "Blade Barrier", 5, 3, 1); $i++;
$talent[$i] = array(0, "Bladed Armor", 5, 1, 2); $i++;
$talent[$i] = array(0, "Scent of Blood", 3, 2, 2); $i++;
$talent[$i] = array(0, "Two-Handed Weapon Specialization", 2, 3, 2); $i++;
$talent[$i] = array(0, "Rune Tap", 1, 1, 3); $i++;
$talent[$i] = array(0, "Dark Conviction", 5, 2, 3); $i++;
$talent[$i] = array(0, "Death Rune Mastery", 3, 3, 3); $i++;
$talent[$i] = array(0, "Improved Rune Tap", 3, 1, 4); $i++;
$talent[$i] = array(0, "Spell Deflection", 3, 3, 4); $i++;
$talent[$i] = array(0, "Vendetta", 3, 4, 4); $i++;
$talent[$i] = array(0, "Bloody Strikes", 3, 1, 5); $i++;
$talent[$i] = array(0, "Veteran of the Third War", 3, 3, 5); $i++;
$talent[$i] = array(0, "Mark of Blood", 1, 4, 5); $i++;
$talent[$i] = array(0, "Bloody Vengeance", 3, 2, 6); $i++;
$talent[$i] = array(0, "Abomination\'s Might", 2, 3, 6); $i++;
$talent[$i] = array(0, "Bloodworms", 3, 1, 7); $i++;
$talent[$i] = array(0, "Hysteria", 1, 2, 7); $i++;
$talent[$i] = array(0, "Blood Aura", 2, 3, 7); $i++;
$talent[$i] = array(0, "Sudden Doom", 5, 2, 8); $i++;
$talent[$i] = array(0, "Vampiric Blood", 1, 3, 8); $i++;
$talent[$i] = array(0, "Will of the Necropolis", 3, 1, 9); $i++;
$talent[$i] = array(0, "Heart Strike", 1, 2, 9); $i++;
$talent[$i] = array(0, "Might of Mograine", 3, 3, 9); $i++;
$talent[$i] = array(0, "Blood Gorged", 5, 2, 10); $i++;
$talent[$i] = array(0, "Dancing Rune Weapon", 1, 2, 11); $i++;
$treeStartStop[$t] = $i -1;
$t++;

//Frost talents
$talent[$i] = array(1, "Improved Icy Touch", 3, 1, 1); $i++;
$talent[$i] = array(1, "Glacier Rot", 2, 2, 1); $i++;
$talent[$i] = array(1, "Toughness", 5, 3, 1); $i++;
$talent[$i] = array(1, "Icy Reach", 2, 2, 2); $i++;
$talent[$i] = array(1, "Black Ice", 5, 3, 2); $i++;
$talent[$i] = array(1, "Nerves of Cold Steel", 3, 4, 2); $i++;
$talent[$i] = array(1, "Icy Talons", 5, 1, 3); $i++;
$talent[$i] = array(1, "Lichborne", 1, 2, 3); $i++;
$talent[$i] = array(1, "Annihilation", 3, 3, 3); $i++;
$talent[$i] = array(1, "Runic Power Mastery", 3, 2, 4); $i++;
$talent[$i] = array(1, "Killing Machine", 5, 3, 4); $i++;
$talent[$i] = array(1, "Frigid Dreadplate", 3, 2, 5); $i++;
$talent[$i] = array(1, "Chill of the Grave", 2, 3, 5); $i++;
$talent[$i] = array(1, "Deathchill", 1, 4, 5); $i++;
$talent[$i] = array(1, "Improved Icy Talons", 1, 1, 6); $i++;
$talent[$i] = array(1, "Merciless Combat", 2, 2, 6); $i++;
$talent[$i] = array(1, "Rime", 3, 3, 6); $i++;
$talent[$i] = array(1, "Endless Winter", 2, 4, 6); $i++;
$talent[$i] = array(1, "Howling Blast", 1, 2, 7); $i++;
$talent[$i] = array(1, "Frost Aura", 2, 3, 7); $i++;
$talent[$i] = array(1, "Chilblains", 3, 4, 7); $i++;
$talent[$i] = array(1, "Blood of the North", 5, 2, 8); $i++;
$talent[$i] = array(1, "Unbreakable Armor", 1, 3, 8); $i++;
$talent[$i] = array(1, "Acclimation", 3, 1, 9); $i++;
$talent[$i] = array(1, "Frost Strike", 1, 2, 9); $i++;
$talent[$i] = array(1, "Guile of Gorefiend", 3, 3, 9); $i++;
$talent[$i] = array(1, "Tundra Stalker", 5, 2, 10); $i++;
$talent[$i] = array(1, "Hungering Cold", 1, 2, 11); $i++;
$treeStartStop[$t] = $i -1;
$t++;

//Unholy talents
$talent[$i] = array(2, "Vicious Strikes", 2, 1, 1); $i++;
$talent[$i] = array(2, "Morbidity", 3, 2, 1); $i++;
$talent[$i] = array(2, "Anticipation", 5, 3, 1); $i++;
$talent[$i] = array(2, "Epidemic", 2, 1, 2); $i++;
$talent[$i] = array(2, "Virulence", 3, 2, 2); $i++;
$talent[$i] = array(2, "Unholy Command", 2, 3, 2); $i++;
$talent[$i] = array(2, "Ravenous Dead", 3, 4, 2); $i++;
$talent[$i] = array(2, "Outbreak", 3, 1, 3); $i++;
$talent[$i] = array(2, "Necrosis", 5, 2, 3); $i++;
$talent[$i] = array(2, "Corpse Explosion", 1, 3, 3); $i++;
$talent[$i] = array(2, "On a Pale Horse", 2, 2, 4); $i++;
$talent[$i] = array(2, "Blood-Caked Blade", 3, 3, 4); $i++;
$talent[$i] = array(2, "Shadow of Death", 1, 4, 4); $i++;
$talent[$i] = array(2, "Summon Gargoyle", 1, 1, 5); $i++;
$talent[$i] = array(2, "Impurity", 5, 2, 5); $i++;
$talent[$i] = array(2, "Dirge", 2, 3, 5); $i++;
$talent[$i] = array(2, "Magic Suppression", 5, 2, 6); $i++;
$talent[$i] = array(2, "Reaping", 3, 3, 6); $i++;
$talent[$i] = array(2, "Master of Ghouls", 1, 4, 6); $i++;
$talent[$i] = array(2, "Desecration", 5, 1, 7); $i++;
$talent[$i] = array(2, "Anti-Magic Zone", 1, 2, 7); $i++;
$talent[$i] = array(2, "Unholy Aura", 2, 3, 7); $i++;
$talent[$i] = array(2, "Night of the Dead", 2, 1, 8); $i++;
$talent[$i] = array(2, "Crypt Fever", 3, 2, 8); $i++;
$talent[$i] = array(2, "Bone Shield", 1, 3, 8); $i++;
$talent[$i] = array(2, "Wandering Plague", 3, 1, 9); $i++;
$talent[$i] = array(2, "Ebon Plaguebringer", 3, 2, 9); $i++;
$talent[$i] = array(2, "Scourge Strike", 1, 3, 9); $i++;
$talent[$i] = array(2, "Rage of Rivendare", 5, 2, 10); $i++;
$talent[$i] = array(2, "Unholy Blight", 1, 2, 11); $i++;
$treeStartStop[$t] = $i -1;
$t++;

$i = 0;


//Blood Talents Begin

//Butchery - BLOOD
$rank[$i] = array(
"Whenever you kill an enemy that grants experience or honor, you generate up to 10 runic power. In addition, you generate 1 runic power per 5 sec. while in combat.",
"Whenever you kill an enemy that grants experience or honor, you generate up to 20 runic power. In addition, you generate 2 runic power per 5 sec. while in combat."
		);
$i++;	
//Blood Talents End

//SUBVERSION - BLOOD
$rank[$i] = array(
"Increases the critical strike chance of Blood Strike, Heart Strike and Obliterate by 3%, and reduces threat generated while in Blood or Unholy Presence by 8%.",
"Increases the critical strike chance of Blood Strike, Heart Strike and Obliterate by 6%, and reduces threat generated while in Blood or Unholy Presence by 16%.",
"Increases the critical strike chance of Blood Strike, Heart Strike and Obliterate by 9%, and reduces threat generated while in Blood or Unholy Presence by 25%."
		);
$i++;

//BLADE BARRIER - BLOOD
$rank[$i] = array(
"Whenever your Blood Runes are on cooldown, your Parry chance increases by 2% for the next 10 sec.",
"Whenever your Blood Runes are on cooldown, your Parry chance increases by 4% for the next 10 sec.",
"Whenever your Blood Runes are on cooldown, your Parry chance increases by 6% for the next 10 sec.",
"Whenever your Blood Runes are on cooldown, your Parry chance increases by 8% for the next 10 sec.",
"Whenever your Blood Runes are on cooldown, your Parry chance increases by 10% for the next 10 sec."
		);
$i++;

//Bladed Armor - Blood
$rank[$i] = array(
"Increases your attack power by 1 for every 180 armor value you have. ",
"Increases your attack power by 2 for every 180 armor value you have. ",
"Increases your attack power by 3 for every 180 armor value you have. ",
"Increases your attack power by 4 for every 180 armor value you have. ",
"Increases your attack power by 5 for every 180 armor value you have. "
		);
$i++;



//SCENT OF BLOOD - BLOOD
$rank[$i] = array(
"You have a 15% chance after being struck by a ranged or melee hit to gain the Scent of Blood effect, causing your next melee hit to generate 5 runic power. This effect cannot occur more often than once every 20 sec.",
"You have a 15% chance after being struck by a ranged or melee hit to gain the Scent of Blood effect, causing your next 2 melee hits to generate 5 runic power. This effect cannot occur more often than once every 20 sec.",
"You have a 15% chance after being struck by a ranged or melee hit to gain the Scent of Blood effect, causing your next 3 melee hits to generate 5 runic power. This effect cannot occur more often than once every 20 sec."
		);
$i++;

	
//Two-Handed Weapon Specialization - BLOOD
$rank[$i] = array(
"Increases the damage you deal with two-handed melee weapons by 2%.",
"Increases the damage you deal with two-handed melee weapons by 4%."
		);
$i++;	
	
//Rune Tap - Blood
$rank[$i] = array(
"<span style=text-align:left;float:left;>1 Blood<br></span><br><span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>1 min cooldown</span><br>Converts 1 Blood Rune into 10% of your maximum health."
		);
$i++;
	
//Dark Conviction - Blood
$rank[$i] = array(
"Increases your chance to critically hit with weapons, spells and abilities by 1%.",
"Increases your chance to critically hit with weapons, spells and abilities by 2%.",
"Increases your chance to critically hit with weapons, spells and abilities by 3%.",
"Increases your chance to critically hit with weapons, spells and abilities by 4%.",
"Increases your chance to critically hit with weapons, spells and abilities by 5%."
		);
$i++;

//DEATH RUNE MASTERY - BLOOD
$rank[$i] = array(
"Whenever you hit with Death Strike or Obliterate there is a 33% chance that the Frost and Unholy Runes will become Death Runes when they activate.",
"Whenever you hit with Death Strike or Obliterate there is a 66% chance that the Frost and Unholy Runes will become Death Runes when they activate.",
"Whenever you hit with Death Strike or Obliterate there is a 100% chance that the Frost and Unholy Runes will become Death Runes when they activate."
		);
$i++;


//Improved Rune Tap - Blood
$rank[$i] = array(
"Increases the health provided by Rune Tap by 33% and lowers its cooldown by 10 sec.",
"Increases the health provided by Rune Tap by 66% and lowers its cooldown by 20 sec.",
"Increases the health provided by Rune Tap by 100% and lowers its cooldown by 30 sec."
		);
$i++;

//SPELL DEFLECTION - BLOOD
$rank[$i] = array(
"You have a chance equal to your Parry chance of taking 10% less damage from a direct damage spell.",
"You have a chance equal to your Parry chance of taking 20% less damage from a direct damage spell.",
"You have a chance equal to your Parry chance of taking 30% less damage from a direct damage spell."
		);
$i++;

//VENDETTA - BLOOD
$rank[$i] = array(
"Heals you for up to 2% of your total maximum health whenever you kill a target that yields experience or honor.",
"Heals you for up to 4% of your total maximum health whenever you kill a target that yields experience or honor.",
"Heals you for up to 6% of your total maximum health whenever you kill a target that yields experience or honor."
		);
$i++;



//Bloody Strikes - Blood
$rank[$i] = array(
"Increases the damage by 10% and the bonus damage from diseases by 20% of your Blood Strike and Heart strike, and increases the damage of Pestilence by 20%.",
"Increases the damage by 20% and the bonus damage from diseases by 40% of your Blood Strike and Heart strike, and increases the damage of Pestilence by 40%.",
"Increases the damage by 30% and the bonus damage from diseases by 60% of your Blood Strike and Heart strike, and increases the damage of Pestilence by 60%."
		);
$i++;




//Veteran of the Third War - Blood
$rank[$i] = array(
"Increases your total Strength and Stamina by 2% and your expertise by 2.",
"Increases your total Strength and Stamina by 4% and your expertise by 4.",
"Increases your total Strength and Stamina by 6% and your expertise by 6."
		);
$i++;

//Mark of Blood - Blood
$rank[$i] = array(
"<span style=text-align:left;float:left;>1 Blood</span><span style=text-align:right;float:right;>30 yd range</span><br><span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>3 min cooldown</span><br>Place a Mark of Blood on an enemy. Whenever the marked enemy deals damage to a target, that target is healed for 4% of its maximum health. Lasts for 20 sec or up to 20 hits."
		);
$i++;






//Bloody Vengeance - Blood
$rank[$i] = array(
"Gives you a 1% bonus to physical damage you deal for 30 sec after dealing a critical strike from a weapon swing, spell, or ability. This effect stacks up to 3 times.",
"Gives you a 2% bonus to physical damage you deal for 30 sec after dealing a critical strike from a weapon swing, spell, or ability. This effect stacks up to 3 times.",
"Gives you a 3% bonus to physical damage you deal for 30 sec after dealing a critical strike from a weapon swing, spell, or ability. This effect stacks up to 3 times."
		);
$i++;

//Abomination\'s Might - Blood
$rank[$i] = array(
"Your Blood Strikes and Heart Strikes have a 25% chance and your Obliterates have a 50% chance to increase the attack power by 10% of raid members within 45 yards by 10 sec. Also increases your total Strength by 1%.",
"Your Blood Strikes and Heart Strikes have a 50% chance and your Obliterates have a 100% chance to increase the attack power by 10% of raid members within 45 yards by 10 sec. Also increases your total Strength by 2%."
		);
$i++;
	

//Bloodworms - Blood
$rank[$i] = array(
"Your weapon hits have a 3% chance to cause the target to spawn 2-4 Bloodworms. Bloodworms attack your enemies, healing you as they do damage for 20 sec or until killed.",
"Your weapon hits have a 6% chance to cause the target to spawn 2-4 Bloodworms. Bloodworms attack your enemies, healing you as they do damage for 20 sec or until killed.",
"Your weapon hits have a 9% chance to cause the target to spawn 2-4 Bloodworms. Bloodworms attack your enemies, healing you as they do damage for 20 sec or until killed."
		);
$i++;

//Hysteria - Blood
$rank[$i] = array(
"<span style=text-align:left;float:left;>1 Blood</span><span style=text-align:right;float:right;>30 yd range</span><br><span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>2 min cooldown</span><br> Induces a friendly unit into a killing frenzy for 30 sec. The target is Enraged, which increases their physical damage by 20%, but causes them to suffer damage equal to 1% of their maximum health every second."
		);
$i++;

//Blood Aura - Blood
$rank[$i] = array(
"All party or raid members within 45 yards of the Death Knight are healed by 2% of the damage they deal. Only damage dealt to targets that grant experience or honor can trigger this heal.",
"All party or raid members within 45 yards of the Death Knight are healed by 4% of the damage they deal. Only damage dealt to targets that grant experience or honor can trigger this heal.",
		);
$i++;


//SUDDEN DOOM - BLOOD
$rank[$i] = array(
"Your Blood Strikes and Heart Strikes have a 4% chance to make your next Death Coil consume no runic power and critically hit if cast within 15 sec.",
"Your Blood Strikes and Heart Strikes have a 8% chance to make your next Death Coil consume no runic power and critically hit if cast within 15 sec.",
"Your Blood Strikes and Heart Strikes have a 12% chance to make your next Death Coil consume no runic power and critically hit if cast within 15 sec.",
"Your Blood Strikes and Heart Strikes have a 16% chance to make your next Death Coil consume no runic power and critically hit if cast within 15 sec.",
"Your Blood Strikes and Heart Strikes have a 20% chance to make your next Death Coil consume no runic power and critically hit if cast within 15 sec."
		);
$i++;


//Vampiric Blood - Blood
$rank[$i] = array(
"<span style=text-align:left;float:left;>1 Blood</span><br><span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>1 min cooldown</span><br>Temporarily grants the Death Knight 15% of maximum health and increases the amount of health generated through spells and effects by 35% for 20 sec. After the effect expires, the health is lost."
		);
$i++;

//Will of the Necropolis - Blood
$rank[$i] = array(
"Damage that would take you below 35% health is reduced by 5%.",
"Damage that would take you below 35% health is reduced by 10%.",
"Damage that would take you below 35% health is reduced by 15%.",
		);
$i++;

//Heart Strike - Blood
$rank[$i] = array(
"<span style=text-align:left;float:left;>1 Blood</span><span style=text-align:right;float:right;>Melee range</span><br><span style=text-align:left;float:left;>Instant</span><br><span style=text-align:left;float:left;>Requires Melee Weapon</span><br> Instantly strike the target and his nearest ally, causing 60% weapon damage plus 75, and an additional 38 bonus damage per disease."
		);
$i++;

//Might of Mograine - BLOOD
$rank[$i] = array(
"Increases the critical strike damage bonus of your Blood Boil, Blood Strike, Death Strike, Heart Strike, and Obliterate abilities by 15%.",
"Increases the critical strike damage bonus of your Blood Boil, Blood Strike, Death Strike, Heart Strike, and Obliterate abilities by 30%.",
"Increases the critical strike damage bonus of your Blood Boil, Blood Strike, Death Strike, Heart Strike, and Obliterate abilities by 45%."
		);
$i++;

//Blood Gorged - Blood
$rank[$i] = array(
"When you are above 75% health, you deal 2% more damage. Also increases your expertise by 1.",
"When you are above 75% health, you deal 4% more damage. Also increases your expertise by 2.",
"When you are above 75% health, you deal 6% more damage. Also increases your expertise by 3.",
"When you are above 75% health, you deal 8% more damage. Also increases your expertise by 4.",
"When you are above 75% health, you deal 10% more damage. Also increases your expertise by 5."
		);
$i++;

//Dancing Rune Weapon - Blood
$rank[$i] = array(
"<span style=text-align:left;float:left;>50 Runic Power</span><span style=text-align:right;float:right;>30 yd range</span><br><span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>3 min cooldown</span><br><span style=text-align:left;float:left;>Requires Melee Weapon</span><br> Unleashes all available runic power to summon a second rune weapon that fights on its own for 10 sec plus 1 sec per 5 additional runic power, doing the same attacks as the Death Knight."
		);
$i++;

//FROST TALENTS BEGIN----------------------------------------------------------------------
//Improved Icy Touch - Frost
$rank[$i] = array(
"Your Icy Touch does an additional 10% damage and your Frost Fever reduces melee and ranged attack speed by an additional 2%.",
"Your Icy Touch does an additional 20% damage and your Frost Fever reduces melee and ranged attack speed by an additional 4%.",
"Your Icy Touch does an additional 30% damage and your Frost Fever reduces melee and ranged attack speed by an additional 6%."
		);
$i++;		


//GLACIER ROT - FROST
$rank[$i]= array(
"Diseased enemies take 5% more damage from your Icy Touch, Howling Blast and Frost Strike spells.",
"Diseased enemies take 10% more damage from your Icy Touch, Howling Blast and Frost Strike spells."
	);
$i++;

//Toughness - Frost
$rank[$i]= array(
"Increases your armor value from items by 3% and reduces the duration of all movement slowing effects by 6%.",
"Increases your armor value from items by 6% and reduces the duration of all movement slowing effects by 12%.",
"Increases your armor value from items by 9% and reduces the duration of all movement slowing effects by 18%.",
"Increases your armor value from items by 12% and reduces the duration of all movement slowing effects by 24%.",
"Increases your armor value from items by 15% and reduces the duration of all movement slowing effects by 30%."
	);
$i++;

//Icy Reach - Frost
$rank[$i]= array(
"Increases the range of your Icy Touch, Chains of Ice and Howling Blast by 5 yards.",
"Increases the range of your Icy Touch, Chains of Ice and Howling Blast by 10 yards."
	);
$i++;

//Black Ice - Frost
$rank[$i] = array(
"Increases your Frost damage by 6%.",
"Increases your Frost damage by 12%.",
"Increases your Frost damage by 18%.",
"Increases your Frost damage by 24%.",
"Increases your Frost damage by 30%."
		);
$i++;

//Nerves of Cold Steel - FROST
$rank[$i] = array(
"Increases your chance to hit with a one-handed melee weapon by 1% and increases the damage done by your offhand weapon by 5%.",
"Increases your chance to hit with a one-handed melee weapon by 2% and increases the damage done by your offhand weapon by 10%.",
"Increases your chance to hit with a one-handed melee weapon by 3% and increases the damage done by your offhand weapon by 15%."
		);
$i++;

//Icy Talons - Frost
$rank[$i] = array(
"You leech heat from victims of your Frost Fever, so that when their melee speed is reduced, yours increases by 4% for the next 20 sec.",
"You leech heat from victims of your Frost Fever, so that when their melee speed is reduced, yours increases by 8% for the next 20 sec.",
"You leech heat from victims of your Frost Fever, so that when their melee speed is reduced, yours increases by 12% for the next 20 sec.",
"You leech heat from victims of your Frost Fever, so that when their melee speed is reduced, yours increases by 16% for the next 20 sec.",
"You leech heat from victims of your Frost Fever, so that when their melee speed is reduced, yours increases by 20% for the next 20 sec."
		);
$i++;

//Lichborne - Frost
$rank[$i] = array(
"<span style=text-align:left;float:left;>Instant<br></span><span style=text-align:right;float:right;>3 min cooldown</span><br>Draw upon unholy energy to become undead for 15 sec. While undead, you are immune to Charm, Fear and Sleep effects, and your horrifying visage causes melee attacks to have an additional 25% chance to miss you."
		);
$i++;

//Annihilation - Frost
$rank[$i] = array(
"Increases the critical strike chance of your melee special abilities by 1%. In addition, there is a 33% chance that your Obliterate will do its damage without consuming diseases.",
"Increases the critical strike chance of your melee special abilities by 2%. In addition, there is a 66% chance that your Obliterate will do its damage without consuming diseases.",
"Increases the critical strike chance of your melee special abilities by 3%. In addition, there is a 100% chance that your Obliterate will do its damage without consuming diseases.",
		);
$i++;


//RUNIC POWER MASTERY - FROST
$rank[$i]= array(
"Increases your maximum Runic Power by 10.",
"Increases your maximum Runic Power by 20.",
"Increases your maximum Runic Power by 30."
	);
$i++;



//Killing Machine - Frost
$rank[$i] = array(
"Your melee attacks have a chance to make your next Icy Touch, Howling Blast or Frost Strike a critical Strike.",
"Your melee attacks have a chance to make your next Icy Touch, Howling Blast or Frost Strike a critical Strike. Effect occurs more often than Killing Machine (Rank 1).",
"Your melee attacks have a chance to make your next Icy Touch, Howling Blast or Frost Strike a critical Strike.  Effect occurs more often than Killing Machine (Rank 2).",
"Your melee attacks have a chance to make your next Icy Touch, Howling Blast or Frost Strike a critical Strike.  Effect occurs more often than Killing Machine (Rank 3).",
"Your melee attacks have a chance to make your next Icy Touch, Howling Blast or Frost Strike a critical Strike.  Effect occurs more often than Killing Machine (Rank 4).",
		);
$i++;	



//Frigid Dreadplate - Frost
$rank[$i]= array(
"Reduces the chance melee attacks will hit you by 1%.",
"Reduces the chance melee attacks will hit you by 2%.",
"Reduces the chance melee attacks will hit you by 3%."
	);
$i++;

//Chill of the Grave - Frost
$rank[$i] = array(
"Your Chains of Ice, Howling Blast, Icy Touch and Obliterate generate 2.5 additional runic power.",
"Your Chains of Ice, Howling Blast, Icy Touch and Obliterate generate 5 additional runic power. "
		);
$i++;

//Deathchill - Frost
$rank[$i] = array(
"<span style=text-align:left;float:left;>Instant<br></span><br><span style=text-align:right;float:right;>2 min cooldown</span><br>When activated, makes your next Icy Touch, Howling Blast, Frost Strike or Obliterate a critical hit if used within 30 sec."
		);
$i++;

//Improved Icy Talons - Frost
$rank[$i] = array(
"Your Icy Talons effect increases the melee attack speed of your entire group or raid by 20% for the next 20 sec. In addition, increases your melee attack speed by 5% at all times."
		);
$i++;



//Merciless Combat - Frost
$rank[$i] = array(
"Your Icy Touch, Howling Blast, Obliterate and Frost Strike do an additional 6% damage when striking targets with less than 35% health.",
"Your Icy Touch, Howling Blast, Obliterate and Frost Strike do an additional 12% damage when striking targets with less than 35% health."
		);
$i++;

//Rime - Frost
$rank[$i] = array(
"Increases the critical strike chance of your Icy Touch and Obliterate by 5% and casting Icy Touch has a 5% chance to cause your next Howling Blast to consume no runes.",
"Increases the critical strike chance of your Icy Touch and Obliterate by 10% and casting Icy Touch has a 10% chance to cause your next Howling Blast to consume no runes.",
"Increases the critical strike chance of your Icy Touch and Obliterate by 15% and casting Icy Touch has a 15% chance to cause your next Howling Blast to consume no runes.",
		);
$i++;



//ENDLESS WINTER - FROST
$rank[$i] = array(
"Your Chains of Ice has a 50% chance to cause Frost Fever and the cost of your Mind Freeze is reduced to 10 runic power.",
"Your Chains of Ice has a 100% chance to cause Frost Fever and the cost of your Mind Freeze is reduced to no runic power."
);
$i++;



//Howling Blast - Frost
$rank[$i] = array(
"<span style=text-align:left;float:left;>1 Unholy 1 Frost<br></span><span style=text-align:right;float:right;>20 yd range</span><br> <span style=text-align:left;float:left;>Instant<br></span><span style=text-align:right;float:right;>5 sec cooldown</span><br>Blast the target with a frigid wind dealing 99 to 107 Frost damage to all enemies within 10 yards. Deals double damage to targets infected with Frost Fever."
		);
$i++;

//FROST AURA - FROST
$rank[$i] = array(
"All party or raid members within 45 yards of the Death Knight gain 40 spell resistance.",
"All party or raid members within 45 yards of the Death Knight gain 80 spell resistance."
		);
$i++;


//Chilbrains - Frost
$rank[$i] = array(
"Victims of your Frost Fever disease are Chilled, reducing movement speed by 10% for 10 sec.",
"Victims of your Frost Fever disease are Chilled, reducing movement speed by 20% for 10 sec.",
"Victims of your Frost Fever disease are Chilled, reducing movement speed by 30% for 10 sec."
		);
$i++;



//Blood of the North - FROST
$rank[$i] = array(
"Increases Blood Strike damage by 3%. In addition, whenever you hit with a Blood Strike or Pestilence there is a 20% chance that the Blood Rune will become a Death Rune when it activates.",
"Increases Blood Strike damage by 6%. In addition, whenever you hit with a Blood Strike or Pestilence there is a 40% chance that the Blood Rune will become a Death Rune when it activates.",
"Increases Blood Strike damage by 9%. In addition, whenever you hit with a Blood Strike or Pestilence there is a 60% chance that the Blood Rune will become a Death Rune when it activates.",
"Increases Blood Strike damage by 12%. In addition, whenever you hit with a Blood Strike or Pestilence there is a 80% chance that the Blood Rune will become a Death Rune when it activates.",
"Increases Blood Strike damage by 15%. In addition, whenever you hit with a Blood Strike or Pestilence there is a 100% chance that the Blood Rune will become a Death Rune when it activates."
		);
$i++;


//UNBREAKABLE ARMOR - FROST
$rank[$i] = array(
"<span style=text-align:left;float:left;>1 Frost<br></span><br><span style=text-align:left;float:left;>Instant<br></span><span style=text-align:right;float:right;>1 min cooldown</span><br>Increases your armor by 25%, your total Strength by 10% and your Parry chance by 5% for 20 sec."
		);
$i++;



//Acclimation - Frost
$rank[$i] = array(
"When you are hit by a spell, you have a 10% chance to boost your resistance to that type of magic for 18 sec. Stacks up to 3 times.",
"When you are hit by a spell, you have a 20% chance to boost your resistance to that type of magic for 18 sec. Stacks up to 3 times.",
"When you are hit by a spell, you have a 30% chance to boost your resistance to that type of magic for 18 sec. Stacks up to 3 times.",
		);
$i++;

//Frost Strike - Frost
$rank[$i] = array(
"<span style=text-align:left;float:left;>40 Runic Power<br></span><span style=text-align:right;float:right;>Melee Range</span><br><span style=text-align:left;float:left;>Instant</span><br/><span style=text-align:left;float:left;>Requires Melee Weapon<br></span><br>Instantly strike the enemy, causing 60% weapon damage plus 52 as Frost damage. Can\'t be dodged, blocked, or parried."
		);
$i++;

//Guile of Gorefiend - Frost
$rank[$i] = array(
"Increases the critical strike damage bonus of your Blood Strike, Frost Strike, Howling Blast and Obliterate abilities by 15%, and increases the duration of your Icebound Fortitude by 2 sec.",
"Increases the critical strike damage bonus of your Blood Strike, Frost Strike, Howling Blast and Obliterate abilities by 30%, and increases the duration of your Icebound Fortitude by 4 sec.",
"Increases the critical strike damage bonus of your Blood Strike, Frost Strike, Howling Blast and Obliterate abilities by 45%, and increases the duration of your Icebound Fortitude by 6 sec."
		);
$i++;

//Tundra Stalker - Frost
$rank[$i] = array(
"Your spells and abilities deal 2% more damage to targets infected with Frost Fever. Also increases your expertise by 1.",
"Your spells and abilities deal 4% more damage to targets infected with Frost Fever. Also increases your expertise by 2.",
"Your spells and abilities deal 6% more damage to targets infected with Frost Fever. Also increases your expertise by 3.",
"Your spells and abilities deal 8% more damage to targets infected with Frost Fever. Also increases your expertise by 4.",
"Your spells and abilities deal 10% more damage to targets infected with Frost Fever. Also increases your expertise by 5. "
		);
$i++;

//HUNGERING COLD - FROST
$rank[$i] = array(
"<span style=text-align:left;float:left;>60 Runic Power<br></span><br> <span style=text-align:left;float:left;>Instant<br></span><span style=text-align:right;float:right;>1 min cooldown</span><br>Purges the earth around the Death Knight of all heat. Enemies within 10 yards are trapped in ice, preventing them from performing any action for 10 sec and infecting them with Frost Fever. Enemies are considered Frozen, but any damage other than diseases will break the ice."
		);
$i++;

//UNHOLY TALENTS BEGIN--------------------------------------------------------

//Vicious Strikes - UNHOLY
$rank[$i]= array(
"Increases the critical strike chance by 3% and the critical strike damage bonus by 15% of your Plague Strike, Death Strike and Scourge Strike.",
"Increases the critical strike chance by 6% and the critical strike damage bonus by 30% of your Plague Strike, Death Strike and Scourge Strike.",
	);
$i++;

//Morbidity - UNHOLY
$rank[$i] = array(
"Increases the damage and healing of Death Coil by 5% and reduces the cooldown on Death and Decay by 5 sec.",
"Increases the damage and healing of Death Coil by 10% and reduces the cooldown on Death and Decay by 10 sec.",
"Increases the damage and healing of Death Coil by 15% and reduces the cooldown on Death and Decay by 15 sec."
		);
$i++;


//Anticipation - UNHOLY
$rank[$i]= array(
"Increases your chance to dodge by 1%.",
"Increases your chance to dodge by 2%.",
"Increases your chance to dodge by 3%.",
"Increases your chance to dodge by 4%.",
"Increases your chance to dodge by 5%."
	);
$i++;

//EPIDEMIC - UNHOLY
$rank[$i]= array(
"Increases the duration of Blood Plague and Frost Fever by 3 sec.",
"Increases the duration of Blood Plague and Frost Fever by 6 sec."
	);
$i++;

//VIRULENCE - UNHOLY
$rank[$i]= array(
"Increases your chance to hit with your spells by 1% and reduces the chance that your spells and diseases you cause can be cured by 10%.",
"Increases your chance to hit with your spells by 2% and reduces the chance that your spells and diseases you cause can be cured by 20%.",
"Increases your chance to hit with your spells by 3% and reduces the chance that your spells and diseases you cause can be cured by 30%."
	);
$i++;




//Unholy Command - Unholy
$rank[$i]= array(
"Reduces the cooldown of your Death Grip ability by 5 sec.",
"Reduces the cooldown of your Death Grip ability by 10 sec."
	);
$i++;

//Ravenous Dead - Unholy
$rank[$i]= array(
"Increases the total Strength 1% and the contribution your Ghouls get from your Strength and Stamina by 20%.",
"Increases the total Strength 2% and the contribution your Ghouls get from your Strength and Stamina by 40%.",
"Increases the total Strength 3% and the contribution your Ghouls get from your Strength and Stamina by 60%."
	);
$i++;

//Outbreak - Unholy
$rank[$i]= array(
"Increases the damage of Plague Strike and Blood Boil by 15%.",
"Increases the damage of Plague Strike and Blood Boil by 30%.",
"Increases the damage of Plague Strike and Blood Boil by 45%."
	);
$i++;

//Necrosis - Unholy
$rank[$i]= array(
"Your auto attacks deal an additional 2% Shadow damage.",
"Your auto attacks deal an additional 4% Shadow damage.",
"Your auto attacks deal an additional 6% Shadow damage.",
"Your auto attacks deal an additional 8% Shadow damage.",
"Your auto attacks deal an additional 10% Shadow damage."
	);
$i++;

//Corpse Explosion - Unholy
$rank[$i] = array(
"<span style=text-align:left;float:left;>40 Runic Power<br></span><span style=text-align:right;float:right;>30 yd range</span><br><span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>5 sec cooldown</span><br>Cause a corpse to explode for 166 Shadow damage to all enemies within 20 yards. Will use a nearby corpse if the target is not a corpse. Does not affect mechanical or elemental corpses."
		);
$i++;



//ON A PALE HORSE - UNHOLY
$rank[$i]= array(
"You become as hard to stop as death itself. The duration of all Stun and Fear effects used against you is reduced by 10%, and your mounted speed is increased by 10%. This does not stack with other movement speed increasing effects.",
"You become as hard to stop as death itself. The duration of all Stun and Fear effects used against you is reduced by 20%, and your mounted speed is increased by 20%. This does not stack with other movement speed increasing effects."
	);
$i++;

//Blood-Caked Blade – Unholy 
$rank[$i] = array(
"Your auto attacks have a 10% chance to cause a Blood-Caked Strike, which hits for 25% weapon damage plus 13% for each of your diseases on the target.",
"Your auto attacks have a 20% chance to cause a Blood-Caked Strike, which hits for 25% weapon damage plus 13% for each of your diseases on the target.",
"Your auto attacks have a 30% chance to cause a Blood-Caked Strike, which hits for 25% weapon damage plus 13% for each of your diseases on the target."
		);
$i++;

//Shadow of Death - Unholy
$rank[$i] = array(
"Increases your total Strength and Stamina by 2%. In addition, when you die, you return to keep fighting as a Ghoul for 25 sec. 15 minute cooldown."
		);
$i++;

//Summon Gargoyle - Unholy
$rank[$i] = array(
"<span style=text-align:left;float:left;>50 Runic Power<br></span><span style=text-align:right;float:right;>30 yd range</span><br> <span style=text-align:left;float:left;>Instant<br></span><span style=text-align:right;float:right;>3 min cooldown</span><br>A Gargoyle flies into the area and bombards the target with Nature damage modified by the Death Knight\'s attack power. Persists for 10 sec plus 1 sec per 8 runic power up to 30 sec."
		);
$i++;

//IMPURITY - UNHOLY
$rank[$i] = array(
"Your spells receive an additional 5% benefit from your attack power.",
"Your spells receive an additional 10% benefit from your attack power.",
"Your spells receive an additional 15% benefit from your attack power.",
"Your spells receive an additional 20% benefit from your attack power.",
"Your spells receive an additional 25% benefit from your attack power."
		);
$i++;

//Dirge - Unholy
$rank[$i] = array(
"Your Death Strike, Obliterate, Plague Strike and Scourge Strike generate 2.5 additional runic power.",
"Your Death Strike, Obliterate, Plague Strike and Scourge Strike generate 5 additional runic power."
		);
$i++;

//Magic Suppression - UNHOLY
$rank[$i] = array(
"You take 1% less damage from all magic. In addition, your Anti-Magic Shell absorbs an additional 5% of spell damage.",
"You take 2% less damage from all magic. In addition, your Anti-Magic Shell absorbs an additional 10% of spell damage.",
"You take 3% less damage from all magic. In addition, your Anti-Magic Shell absorbs an additional 15% of spell damage.",
"You take 4% less damage from all magic. In addition, your Anti-Magic Shell absorbs an additional 20% of spell damage.",
"You take 5% less damage from all magic. In addition, your Anti-Magic Shell absorbs an additional 25% of spell damage.",
		);
$i++;

//Reaping - Unholy
$rank[$i] = array(
"Whenever you hit with Blood Strike or Blood Boil there is a 33% chance that the Blood Rune becomes a Death Rune when it activates.",
"Whenever you hit with Blood Strike or Blood Boil there is a 66% chance that the Blood Rune becomes a Death Rune when it activates.",
"Whenever you hit with Blood Strike or Blood Boil there is a 100% chance that the Blood Rune becomes a Death Rune when it activates."
		);
$i++;

//Master of Ghouls - Unholy
$rank[$i]= array(
"The Ghoul summoned by your Raise Dead spell is considered a pet and is under your control. Unlike normal Death Knight Ghouls, your pet does not have a limited duration."
	);
$i++;

//Desecration - Unholy 
$rank[$i] = array(
"Your Plague Strikes have a 20% chance to cause the Desecrated Ground effect. Targets in the area are slowed by 50% by the grasping arms of the dead while you cause 5% additional damage while standing on the unholy ground. Lasts 12 sec.",
"Your Plague Strikes have a 40% chance to cause the Desecrated Ground effect. Targets in the area are slowed by 50% by the grasping arms of the dead while you cause 5% additional damage while standing on the unholy ground. Lasts 12 sec.",
"Your Plague Strikes have a 60% chance to cause the Desecrated Ground effect. Targets in the area are slowed by 50% by the grasping arms of the dead while you cause 5% additional damage while standing on the unholy ground. Lasts 12 sec.",
"Your Plague Strikes have a 80% chance to cause the Desecrated Ground effect. Targets in the area are slowed by 50% by the grasping arms of the dead while you cause 5% additional damage while standing on the unholy ground. Lasts 12 sec.",
"Your Plague Strikes have a 100% chance to cause the Desecrated Ground effect. Targets in the area are slowed by 50% by the grasping arms of the dead while you cause 5% additional damage while standing on the unholy ground. Lasts 12 sec."
		);
$i++;


//Anti-Magic Zone - Unholy
$rank[$i] = array(
"<span style=text-align:left;float:left;>1 Unholy<br></span><br><span style=text-align:left;float:left;>Instant<br></span><span style=text-align:right;float:right;>2 min cooldown</span><br> Places a large, stationary Anti-Magic Zone that reduces spell damage done to party or raid members inside it by 75%. The Anti-Magic Zone lasts for 10 sec or until it absorbs 11,804 spell damage."
		);
$i++;

//UNHOLY AURA - UNHOLY
$rank[$i] = array(
"All party or raid members within 45 yards of the Death Knight move 8% faster. This effect does not stack with other movement improving effects.",
"All party or raid members within 45 yards of the Death Knight move 15% faster. This effect does not stack with other movement improving effects."
		);
$i++;

//Night of the Dead - Unholy
$rank[$i] = array(
"Your next 10 Plague Strikes and Scourge Strikes lower the cooldown of Raise Dead by 15 sec and Army of the Dead by 30 sec per strike. Also reduces the damage your pet takes from area of effect attacks by 40%.",
"Your next 10 Plague Strikes and Scourge Strikes lower the cooldown of Raise Dead by 30 sec and Army of the Dead by 30 sec per strike. Also reduces the damage your pet takes from area of effect attacks by 70%."
		);
$i++;


//Crypt Fever - Unholy
$rank[$i] = array(
"Your diseases also cause Crypt Fever, which increases disease damage taken by the target by 10%.",
"Your diseases also cause Crypt Fever, which increases disease damage taken by the target by 20%.",
"Your diseases also cause Crypt Fever, which increases disease damage taken by the target by 30%."
		);
$i++;



//Bone Shield - Unholy
$rank[$i] = array(
"<span style=text-align:left;float:left;>1 Unholy<br></span><br><span style=text-align:left;float:left;>Instant<br></span><span style=text-align:right;float:right;>1 min cooldown</span><br><br>The Death Knight is surrounded by 4 whirling bones. While at least 1 bone remains, he takes 20% less damage from all sources and deals 2% more damage with all attacks, spells and abilities. Each damaging attack that lands consumes 1 bone. Lasts 5 mins."
		);
$i++;



//Wandering Plague - UNHOLY
$rank[$i] = array(
"When your diseases damage an enemy, there is a chance equal to your melee critical strike chance that they will cause 33% additional damage to the target and all enemies within 8 yards. Ignores any target under the effect of a spell that is cancelled by taking damage.",
"When your diseases damage an enemy, there is a chance equal to your melee critical strike chance that they will cause 66% additional damage to the target and all enemies within 8 yards. Ignores any target under the effect of a spell that is cancelled by taking damage.",
"When your diseases damage an enemy, there is a chance equal to your melee critical strike chance that they will cause 100% additional damage to the target and all enemies within 8 yards. Ignores any target under the effect of a spell that is cancelled by taking damage."
		);
$i++;

//EBON PLAGUEBRINGER - UNHOLY
$rank[$i] = array(
"Your Crypt Fever morphs into Ebon Plague, which increases vulnerability to magic by 4% in addition to increasing the damage done by diseases. Improves your critical strike chance with weapons and spells by 1% at all times.",
"Your Crypt Fever morphs into Ebon Plague, which increases vulnerability to magic by 9% in addition to increasing the damage done by diseases. Improves your critical strike chance with weapons and spells by 2% at all times.",
"Your Crypt Fever morphs into Ebon Plague, which increases vulnerability to magic by 13% in addition to increasing the damage done by diseases. Improves your critical strike chance with weapons and spells by 3% at all times."
		);
$i++;

//Scourge Strike - Unholy
$rank[$i] = array(
"<span style=text-align:left;float:left;>1 Unholy 1 Frost<br></span><span style=text-align:right;float:right;>Melee range</span><br> <span style=text-align:left;float:left;>Instant<br></span><br><span style=text-align:left;float:left;>Requires Melee Weapon<br></span><br>An unholy strike that deals 60% weapon damage as Shadow damage plus 81, and an additional 41 bonus damage per disease."
		);
$i++;


//Rage of Rivendare - Unholy
$rank[$i] = array(
"Your spells and abilities deal 2% more damage to targets infected with Blood Plague. Also increases your expertise by 1.",
"Your spells and abilities deal 4% more damage to targets infected with Blood Plague. Also increases your expertise by 2.",
"Your spells and abilities deal 6% more damage to targets infected with Blood Plague. Also increases your expertise by 3.",
"Your spells and abilities deal 8% more damage to targets infected with Blood Plague. Also increases your expertise by 4.",
"Your spells and abilities deal 10% more damage to targets infected with Blood Plague. Also increases your expertise by 5."
		);
$i++;

//Unholy Blight - Unholy
$rank[$i] = array(
"<span style=text-align:left;float:left;>40 Runic Power<br></span><br> <span style=text-align:left;float:left;>Instant<br></span><br>A vile swarm of unholy insects surrounds the Death Knight for a 10 yard radius. Enemies caught in the area take 21 Shadow damage per sec. Lasts 20 sec."
		);
$i++;
$i++;
?>
