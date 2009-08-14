<?php
$i = 0;
$t = 0;

$className = "Rogue Talents";
$talentPath = "/info/basics/talents/";

$tree[$i] = "Assassination"; $i++;
$tree[$i] = "Combat"; $i++;
$tree[$i] = "Subtlety"; $i++;

$i = 0;

$talent[$i] = array(0, "Improved Eviscerate", 3, 1, 1); $i++;
$talent[$i] = array(0, "Remorseless Attacks", 2, 2, 1); $i++;
$talent[$i] = array(0, "Malice", 5, 3, 1); $i++;
$talent[$i] = array(0, "Ruthlessness", 3, 1, 2); $i++; 
$talent[$i] = array(0, "Blood Spatter", 2, 2, 2); $i++;
$talent[$i] = array(0, "Puncturing Wounds", 3, 4, 2); $i++;
$talent[$i] = array(0, "Vigor", 1, 1, 3); $i++;
$talent[$i] = array(0, "Improved Expose Armor", 2, 2, 3); $i++;
$talent[$i] = array(0, "Lethality", 5, 3, 3); $i++;
$talent[$i] = array(0, "Vile Poisons", 3, 2, 4); $i++;
$talent[$i] = array(0, "Improved Poisons", 5, 3, 4); $i++;
$talent[$i] = array(0, "Fleet Footed", 2, 1, 5); $i++;
$talent[$i] = array(0, "Cold Blood", 1, 2, 5); $i++;
$talent[$i] = array(0, "Improved Kidney Shot", 3, 3, 5); $i++;
$talent[$i] = array(0, "Quick Recovery", 2, 4, 5); $i++;
$talent[$i] = array(0, "Seal Fate", 5, 2, 6); $i++;
$talent[$i] = array(0, "Murder", 2, 3, 6); $i++;
$talent[$i] = array(0, "Deadly Brew", 2, 1, 7); $i++;
$talent[$i] = array(0, "Overkill", 1, 2, 7); $i++;
$talent[$i] = array(0, "Deadened Nerves", 3, 3, 7); $i++;
$talent[$i] = array(0, "Focused Attacks", 3, 1, 8); $i++;
$talent[$i] = array(0, "Find Weakness", 3, 3, 8); $i++;
$talent[$i] = array(0, "Master Poisoner", 3, 1, 9); $i++;
$talent[$i] = array(0, "Mutilate", 1, 2, 9); $i++;
$talent[$i] = array(0, "Turn the Tables", 3, 3, 9); $i++;
$talent[$i] = array(0, "Cut to the Chase", 5, 2, 10); $i++;
$talent[$i] = array(0, "Hunger For Blood", 1, 2, 11); $i++;

$treeStartStop[$t] = $i -1;
$t++;

$talent[$i] = array(1, "Improved Gouge", 3, 1, 1); $i++;
$talent[$i] = array(1, "Improved Sinister Strike", 2, 2, 1); $i++;
$talent[$i] = array(1, "Dual Wield Specialization", 5, 3, 1); $i++;
$talent[$i] = array(1, "Improved Slice and Dice", 2, 1, 2); $i++;
$talent[$i] = array(1, "Deflection", 3, 2, 2); $i++;
$talent[$i] = array(1, "Precision", 5, 4, 2); $i++;
$talent[$i] = array(1, "Endurance", 2, 1, 3); $i++;
$talent[$i] = array(1, "Riposte", 1, 2, 3); $i++;
$talent[$i] = array(1, "Close Quarters Combat", 5, 3, 3); $i++;
$talent[$i] = array(1, "Improved Kick", 2, 1, 4); $i++;
$talent[$i] = array(1, "Improved Sprint", 2, 2, 4); $i++;
$talent[$i] = array(1, "Lightning Reflexes", 3, 3, 4); $i++;
$talent[$i] = array(1, "Aggression", 5, 4, 4); $i++;
$talent[$i] = array(1, "Mace Specialization", 5, 1, 5); $i++;
$talent[$i] = array(1, "Blade Flurry", 1, 2, 5); $i++;
$talent[$i] = array(1, "Sword Specialization", 5, 3, 5); $i++;
$talent[$i] = array(1, "Weapon Expertise", 2, 2, 6); $i++;
$talent[$i] = array(1, "Blade Twisting", 2, 3, 6); $i++;
$talent[$i] = array(1, "Vitality", 3, 1, 7); $i++;
$talent[$i] = array(1, "Adrenaline Rush", 1, 2, 7); $i++;
$talent[$i] = array(1, "Nerves of Steel", 2, 3, 7); $i++;
$talent[$i] = array(1, "Throwing Specialization", 2, 1, 8); $i++;
$talent[$i] = array(1, "Combat Potency", 5, 3, 8); $i++;
$talent[$i] = array(1, "Unfair Advantage", 2, 1, 9); $i++;
$talent[$i] = array(1, "Surprise Attacks", 1, 2, 9); $i++;
$talent[$i] = array(1, "Savage Combat", 2, 3, 9); $i++;
$talent[$i] = array(1, "Prey on the Weak", 5, 2, 10); $i++;
$talent[$i] = array(1, "Killing Spree", 1, 2, 11); $i++;

$treeStartStop[$t] = $i -1;
$t++;

//shadow talents
$talent[$i] = array(2, "Relentless Strikes", 5, 1, 1); $i++;
$talent[$i] = array(2, "Master of Deception", 3, 2, 1); $i++;
$talent[$i] = array(2, "Opportunity", 2, 3, 1); $i++;
$talent[$i] = array(2, "Sleight of Hand", 2, 1, 2); $i++;
$talent[$i] = array(2, "Dirty Tricks", 2, 2, 2); $i++;
$talent[$i] = array(2, "Camouflage", 3, 3, 2); $i++;
$talent[$i] = array(2, "Elusiveness", 2, 1, 3); $i++;
$talent[$i] = array(2, "Ghostly Strike", 1, 2, 3); $i++;
$talent[$i] = array(2, "Serrated Blades", 3, 3, 3); $i++;
$talent[$i] = array(2, "Setup", 3, 1, 4); $i++;
$talent[$i] = array(2, "Initiative", 3, 2, 4); $i++;
$talent[$i] = array(2, "Improved Ambush", 2, 3, 4); $i++;
$talent[$i] = array(2, "Heightened Senses", 2, 1, 5); $i++;
$talent[$i] = array(2, "Preparation", 1, 2, 5); $i++;
$talent[$i] = array(2, "Dirty Deeds", 2, 3, 5); $i++;
$talent[$i] = array(2, "Hemorrhage", 1, 4, 5); $i++;
$talent[$i] = array(2, "Master of Subtlety", 3, 1, 6); $i++;
$talent[$i] = array(2, "Deadliness", 5, 3, 6); $i++;
$talent[$i] = array(2, "Enveloping Shadows", 3, 1, 7); $i++;
$talent[$i] = array(2, "Premeditation", 1, 2, 7); $i++;
$talent[$i] = array(2, "Cheat Death", 3, 3, 7); $i++;
$talent[$i] = array(2, "Sinister Calling", 5, 2, 8); $i++;
$talent[$i] = array(2, "Waylay", 2, 3, 8); $i++;
$talent[$i] = array(2, "Honor Among Thieves", 3, 1, 9); $i++;
$talent[$i] = array(2, "Shadowstep", 1, 2, 9); $i++;
$talent[$i] = array(2, "Filthy Tricks", 2, 3, 9); $i++;
$talent[$i] = array(2, "Slaughter from the Shadows", 5, 2, 10); $i++;
$talent[$i] = array(2, "Shadow Dance", 1, 2, 11); $i++;
$treeStartStop[$t] = $i -1;
$t++;

$i = 0;


//Assassination Talents Begin

//Improved Eviscerate - Assassination
$rank[$i] = array(
"Increases the damage done by your Eviscerate ability by 7%.",
"Increases the damage done by your Eviscerate ability by 14%.",
"Increases the damage done by your Eviscerate ability by 20%."
		);
$i++;		
		
//Remorseless Attacks - Assassination - 
$rank[$i] = array(
"After killing an opponent that yields experience or honor, gives you a 20% increased critical strike chance on your next Sinister Strike, Backstab, Mutilate, Hemorrhage, Ambush, or Ghostly Strike. Lasts 20 sec.",
"After killing an opponent that yields experience or honor, gives you a 40% increased critical strike chance on your next Sinister Strike, Backstab, Mutilate, Hemorrhage, Ambush, or Ghostly Strike. Lasts 20 sec."
		);
$i++;		

//Malice - Assassination	
$rank[$i] = array(
"Increases your critical strike chance by 1%.",
"Increases your critical strike chance by 2%.",
"Increases your critical strike chance by 3%.",
"Increases your critical strike chance by 4%.",
"Increases your critical strike chance by 5%."
		);
$i++;		
		
//Ruthlessness - Assassination	
$rank[$i] = array(
"Gives your melee finishing moves a 20% chance to add a combo point to your target.",
"Gives your melee finishing moves a 40% chance to add a combo point to your target.",
"Gives your melee finishing moves a 60% chance to add a combo point to your target."
		);
$i++;		

//Blood Spatter - Assassination
$rank[$i] = array(
"Increases the damage caused by your Garrote and Rupture abilities by 15%.",
"Increases the damage caused by your Garrote and Rupture abilities by 30%."
		);
$i++;


//Puncturing Wounds - Assassination
$rank[$i] = array(
"Increases the critical strike chance of your Backstab ability by 10%, and the critical strike chance of your Mutilate ability by 5%.",
"Increases the critical strike chance of your Backstab ability by 20%, and the critical strike chance of your Mutilate ability by 10%.",
"Increases the critical strike chance of your Backstab ability by 30%, and the critical strike chance of your Mutilate ability by 15%."
		);
$i++;	

//Vigor - Assassination
$rank[$i] = array(
"Increases your maximum Energy by 10."
		);
$i++;	
		

//Improved Expose Armor - Assassination	
$rank[$i] = array( 
"Reduces the energy cost of your Expose Armor ability by 5.",
"Reduces the energy cost of your Expose Armor ability by 10."
		);
$i++;		

//Lethality - Assassination //UPDATED 3.1.0
$rank[$i] = array(
"Increases the critical strike damage bonus of all combo point-generating abilities that do not require stealth by 6%.",
"Increases the critical strike damage bonus of all combo point-generating abilities that do not require stealth by 12%.",
"Increases the critical strike damage bonus of all combo point-generating abilities that do not require stealth by 18%.",
"Increases the critical strike damage bonus of all combo point-generating abilities that do not require stealth by 24%.",
"Increases the critical strike damage bonus of all combo point-generating abilities that do not require stealth by 30%.",		
	);
$i++;		

//Vile Poisons - Assassination //UPDATED 3.1.0
$rank[$i] = array(
"Increases the damage dealt by your poisons and Envenom ability by 7% and gives your damage over time poisons an additional 10% chance to resist dispel effects.",
"Increases the damage dealt by your poisons and Envenom ability by 14% and gives your damage over time poisons an additional 20% chance to resist dispel effects.",
"Increases the damage dealt by your poisons and Envenom ability by 20% and gives your damage over time poisons an additional 30% chance to resist dispel effects."

		);
$i++;		

//Improved Poisons - Assassination //UPDATED 3.1.0	
$rank[$i] = array(
"Increases the chance to apply Deadly Poison to your target by 2% and the frequency of applying instant Poison to your target by 10%.",
"Increases the chance to apply Deadly Poison to your target by 4% and the frequency of applying instant Poison to your target by 20%.",
"Increases the chance to apply Deadly Poison to your target by 6% and the frequency of applying instant Poison to your target by 30%.",
"Increases the chance to apply Deadly Poison to your target by 8% and the frequency of applying instant Poison to your target by 40%.",
"Increases the chance to apply Deadly Poison to your target by 10% and the frequency of applying instant Poison to your target by 50%."
		);
$i++;		

//Fleet Footed - Assassination	
$rank[$i] = array(
"Reduces the duration of all movement impairing effects by 15% and increases your movement speed by 8%. This does not stack with other movement speed increasing effects.",
"Reduces the duration of all movement impairing effects by 30% and increases your movement speed by 15%. This does not stack with other movement speed increasing effects."
		);
$i++;

//Cold Blood - Assassination
$rank[$i] = array(
			"<span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>3 min cooldown</span><br>When activated, increases the critical strike chance of your next offensive ability by 100%."
		);
$i++;		

//Improved Kidney Shot - Assassination
$rank[$i] = array(
"While affected by your Kidney Shot ability, the target receives an additional 3% damage from all sources.",
"While affected by your Kidney Shot ability, the target receives an additional 6% damage from all sources.",
"While affected by your Kidney Shot ability, the target receives an additional 9% damage from all sources."
		);
$i++;		

//Quick Recovery - Assassination //UPDATED 3.1.0
$rank[$i] = array(
"All healing effects on you are increased by 10%. In addition, your finishing moves refund 40% of their Energy cost when they fail to hit.",
"All healing effects on you are increased by 20%. In addition, your finishing moves refund 80% of their Energy cost when they fail to hit.."
		);
$i++;		

//Seal Fate - Assassination		
$rank[$i] = array(
"Your critical strikes from abilities that add combo points have a 20% chance to add an additional combo point.",
"Your critical strikes from abilities that add combo points have a 40% chance to add an additional combo point.",
"Your critical strikes from abilities that add combo points have a 60% chance to add an additional combo point.",
"Your critical strikes from abilities that add combo points have a 80% chance to add an additional combo point.",
"Your critical strikes from abilities that add combo points have a 100% chance to add an additional combo point."
		);
$i++;

//Murder - Assassination - 
$rank[$i] = array(
"Increases all damage caused against Humanoid, Giant, Beast, and Dragonkin targets by 2%",
"Increases all damage caused against Humanoid, Giant, Beast, and Dragonkin targets by 4%"
		);
$i++;		



//Deadly Brew - Assassination 
$rank[$i] = array(
"When you apply Instant, Wound or Mind-Numbing poison to a target, you have a 50% chance to apply Crippling poison.",
"When you apply Instant, Wound or Mind-Numbing poison to a target, you have a 100% chance to apply Crippling poison."
		);
$i++;	

//Overkill - Assassination
$rank[$i] = array(
"Abilities used while stealthed and for 6 seconds after breaking stealth cost 10 less energy.",
		);
$i++;	
	

//Deadened Nerves - Assassination - 
$rank[$i] = array(
"Reduces all damage taken by 2%.",
"Reduces all damage taken by 4%.",
"Reduces all damage taken by 6%."
		);
$i++;	

//Focused Attacks - Assassination
$rank[$i] = array(
"Your melee critical strikes have a 33% chance to give you 2 energy.",
"Your melee critical strikes have a 66% chance to give you 2 energy.",
"Your melee critical strikes have a 100% chance to give you 2 energy."
		);
$i++;



//Find Weakness - Assassination
$rank[$i] = array(
"Offensive ability damage increased by 2%.",
"Offensive ability damage increased by 4%.",
"Offensive ability damage increased by 6%."
		);
$i++;	

//Master Poisoner - Assassination //UPDATED 3.1.0
$rank[$i] = array(
"Increases the critical hit chance of all attacks made against any target you have poisoned by 1%, reduces the duration of all Poison effects applied to you by 17% and increases the bonus chance to apply Deadly Poison when Envenom is used by an additional 15%.",
"Increases the critical hit chance of all attacks made against any target you have poisoned by 2%, reduces the duration of all Poison effects applied to you by 34% and increases the bonus chance to apply Deadly Poison when Envenom is used by an additional 30%.",
"Increases the critical hit chance of all attacks made against any target you have poisoned by 3%, reduces the duration of all Poison effects applied to you by 50% and increases the bonus chance to apply Deadly Poison when Envenom is used by an additional 45%."
		);
$i++;

//Mutilate - Assassination
$rank[$i] = array(
			"<span style=text-align:left;float:left;>60 Energy</span><span style=text-align:right;float:right;>Melee range</span><br>Instant<br>Requires Daggers<br>Instantly attacks with both weapons for an additional 44 with each weapon. Damage is increased by 20% against Poisoned targets. Awards 2 combo points.<br><br>"
		);
$i++;	

//Turn the Tables - Assassination
$rank[$i] = array(
"Whenever anyone in your party or raid blocks, dodges, or parries an attack your chance to critically hit with all combo moves is increased by 2% for 8 sec.",
"Whenever anyone in your party or raid blocks, dodges, or parries an attack your chance to critically hit with all combo moves is increased by 4% for 8 sec.",
"Whenever anyone in your party or raid blocks, dodges, or parries an attack your chance to critically hit with all combo moves is increased by 6% for 8 sec."
		);
$i++;	

//Cut to the Chase - Assassination 
$rank[$i] = array(
"Your Eviscerate and Envenom abilities have a 20% chance to refresh your Slice and Dice duration to its 5 combo point maximum.",
"Your Eviscerate and Envenom abilities have a 40% chance to refresh your Slice and Dice duration to its 5 combo point maximum.",
"Your Eviscerate and Envenom abilities have a 60% chance to refresh your Slice and Dice duration to its 5 combo point maximum.",
"Your Eviscerate and Envenom abilities have a 80% chance to refresh your Slice and Dice duration to its 5 combo point maximum.",
"Your Eviscerate and Envenom abilities have a 100% chance to refresh your Slice and Dice duration to its 5 combo point maximum."
		);
$i++;

//Hunger For Blood - Assassination //UPDATED 3.1.0
$rank[$i] = array(
			"<span style=text-align:left;float:left;>15 Energy</span><br><span style=text-align:left;float:left;>Instant</span><br>Enrages you, increasing all damage caused by 15%. Requires a bleed effect to be active on the target. Lasts 30 sec."
		);
$i++;


//COMBAT TREE------------------------------------------------------------------------------
//Improved Gouge - Combat
$rank[$i] = array(
"Increases the effect duration of your Gouge ability by 0.5 sec.",
"Increases the effect duration of your Gouge ability by 1 sec.",
"Increases the effect duration of your Gouge ability by 1.5 sec."
		);
$i++;		

//Improved Sinister Strike - Combat 
$rank[$i] = array(
"Reduces the Energy cost of your Sinister Strike ability by 3.",
"Reduces the Energy cost of your Sinister Strike ability by 5."
		);
$i++;		

//Dual Wield Specialization - Combat  
$rank[$i] = array(
"Increases the damage done by your offhand weapon by 10%.",
"Increases the damage done by your offhand weapon by 20%.",
"Increases the damage done by your offhand weapon by 30%.",
"Increases the damage done by your offhand weapon by 40%.",
"Increases the damage done by your offhand weapon by 50%."
		);
$i++;	

		

//Improved Slice and Dice - Combat
$rank[$i] = array(
"Increases the duration of your Slice and Dice ability by 25%.",
"Increases the duration of your Slice and Dice ability by 50%."

		);
$i++;		
	
//Deflection - Combat	
$rank[$i] = array(
"Increases your Parry chance by 2%.",
"Increases your Parry chance by 4%.",
"Increases your Parry chance by 6%."
		);
$i++;		

//Precision - Combat 
$rank[$i] = array(
"Increases your chance to hit with weapon and poison attacks by 1%.",
"Increases your chance to hit with weapon and poison attacks by 2%.",
"Increases your chance to hit with weapon and poison attacks by 3%.",
"Increases your chance to hit with weapon and poison attacks by 4%.",
"Increases your chance to hit with weapon and poison attacks by 5%."
		);
$i++;		

//Endurance - Combat
$rank[$i] = array(
"Reduces the cooldown of your Sprint and Evasion abilities by 30 sec and increases your total Stamina by 2%.",
"Reduces the cooldown of your Sprint and Evasion abilities by 60 sec and increases your total Stamina by 4%."
		);
$i++;		

//Riposte - Combat
$rank[$i] = array(
			"<span style=text-align:left;float:left;>10 Energy</span><span style=text-align:right;float:right;>Melee range</span><br><span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>6 sec cooldown</span><br>A strike that becomes active after parrying an opponent\'s attack. This attack deals 150% weapon damage and slows their melee attack speed by 20% for 30 sec. Awards 1 combo point."
		);
$i++;	

	
//Close Quarters Combat - Combat  
$rank[$i] = array(
"Increases your chance to get a critical strike with Daggers and Fist Weapons by 1%.",
"Increases your chance to get a critical strike with Daggers and Fist Weapons by 2%.",
"Increases your chance to get a critical strike with Daggers and Fist Weapons by 3%.",
"Increases your chance to get a critical strike with Daggers and Fist Weapons by 4%.",
"Increases your chance to get a critical strike with Daggers and Fist Weapons by 5%."
);
$i++;	




//Improved Kick - Combat 
$rank[$i] = array(
"Gives your Kick ability a 50% chance to silence the target for 2 sec.",
"Gives your Kick ability a 100% chance to silence the target for 2 sec."
		);
$i++;		

//Improved Sprint - Combat
$rank[$i] = array(
"Gives a 50% chance to remove all movement imparing effects when you activate your Sprint ability.",
"Gives a 100% chance to remove all movement imparing effects when you activate your Sprint ability."
		);
$i++;

//Lightning Reflexes - Combat //UPDATED 3.1.0
$rank[$i] = array(
"Increases your Dodge chance by 2% and gives you 4% melee haste.",
"Increases your Dodge chance by 4% and gives you 7% melee haste.",
"Increases your Dodge chance by 6% and gives you 10% melee haste."
		);
$i++;

//Aggression - Combat 
$rank[$i]= array(
"Increases the damage of your Sinister Strike, Backstab, and Eviscerate abilities by 3%.",
"Increases the damage of your Sinister Strike, Backstab, and Eviscerate abilities by 6%.",
"Increases the damage of your Sinister Strike, Backstab, and Eviscerate abilities by 9%.",
"Increases the damage of your Sinister Strike, Backstab, and Eviscerate abilities by 12%.",
"Increases the damage of your Sinister Strike, Backstab, and Eviscerate abilities by 15%."
		);
$i++;

//Mace Specialization - Combat 
$rank[$i] = array(
"Your attacks with maces ignore up to 3% of your opponents armor.",
"Your attacks with maces ignore up to 6% of your opponents armor.",
"Your attacks with maces ignore up to 9% of your opponents armor.",
"Your attacks with maces ignore up to 12% of your opponents armor.",
"Your attacks with maces ignore up to 15% of your opponents armor.",
);
$i++;
		
//Blade Flurry - Combat  
$rank[$i]= array(
			"25 Energy<br><span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>2 min cooldown</span><br>Increases your attack speed by 20%. In addition, attacks strike an additional nearby opponent. Lasts 15 sec."
			);
$i++;			
			
//Sword Specialization - Combat
$rank[$i]= array(
"Gives you a 1% chance to get an extra attack on the same target after hitting your target with your Sword.",
"Gives you a 2% chance to get an extra attack on the same target after hitting your target with your Sword.",
"Gives you a 3% chance to get an extra attack on the same target after hitting your target with your Sword.",
"Gives you a 4% chance to get an extra attack on the same target after hitting your target with your Sword.",
"Gives you a 5% chance to get an extra attack on the same target after hitting your target with your Sword."
		);
$i++;

	
		


//Weapon Expertise - Combat 
$rank[$i]= array(
"Increases your expertise by 5.",
"Increases your expertise by 10."
		);
$i++;		

//Blade Twisting - Combat 
$rank[$i]= array(
"Increases the damage dealt by Sinister Strike and Backstab by 5% and your damaging melee attacks have a 10% chance to Daze the target for 4 sec.",
"Increases the damage dealt by Sinister Strike and Backstab by 10% and your damaging melee attacks have a 10% chance to Daze the target for 8 sec."
);
$i++;	

//Vitality - Combat 
$rank[$i]= array(
"Increases your Energy regeneration rate by 8%.",
"Increases your Energy regeneration rate by 16%.",
"Increases your Energy regeneration rate by 25%."
		);
$i++;
		
//Adrenaline Rush - Combat  
$rank[$i]= array(
			"<span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>3 min cooldown</span><br>Increases your Energy regeneration rate by 100% for 15 sec."
		);
$i++;		

//Nerves of Steel - Combat 
$rank[$i]= array(
"Reduces the damage taken while affected by Stun and Fear effects by 15%.",
"Reduces the damage taken while affected by Stun and Fear effects by 30%."
		);
$i++;

//Throwing Specialization - Combat 
$rank[$i]= array(
"Increases the range of Throw and Deadly Throw by 2 yards and gives your Deadly Throw and Fan of Knives abilities a 50% chance to interrupt the target for 3 sec.",
"Increases the range of Throw and Deadly Throw by 4 yards and gives your Deadly Throw and Fan of Knives abilities a 100% chance to interrupt the target for 3 sec."
		);
$i++;

//Combat Potency - Combat 
$rank[$i]= array(
"Gives your successful off-hand melee autoattacks a 20% chance to generate 3 Energy.",
"Gives your successful off-hand melee autoattacks a 20% chance to generate 6 Energy.",
"Gives your successful off-hand melee autoattacks a 20% chance to generate 9 Energy.",
"Gives your successful off-hand melee autoattacks a 20% chance to generate 12 Energy.",
"Gives your successful off-hand melee autoattacks a 20% chance to generate 15 Energy."
		);
$i++;

//Unfair Advantage - Combat 
$rank[$i]= array(
"Whenever you dodge an attack you gain an Unfair Advantage, striking back for 50% of your main hand weapon\'s damage. This cannot occur more than once per second.",
"Whenever you dodge an attack you gain an Unfair Advantage, striking back for 100% of your main hand weapon\'s damage. This cannot occur more than once per second."
		);
$i++;

//Surprise Attack - Combat
$rank[$i] = array(
"Your finishing moves can no longer be dodged, and the damage dealt by your Sinister Strike, Backstab, Shiv, Hemorrhage and Gouge abilities is increased by 10%."
		);
$i++;		

//Savage Combat - Combat
$rank[$i]= array(
"Increases your total attack power by 2% and all physical damage caused to enemies you have poisoned is increased by 2%.",
"Increases your total attack power by 4% and all physical damage caused to enemies you have poisoned is increased by 4%."
		);
$i++;


//Prey on the Weak - Combat 
$rank[$i]= array(
"Your critical strike damage is increased by 4% when the target has less health than you (as a percentage of total health).",
"Your critical strike damage is increased by 8% when the target has less health than you (as a percentage of total health).",
"Your critical strike damage is increased by 12% when the target has less health than you (as a percentage of total health).",
"Your critical strike damage is increased by 16% when the target has less health than you (as a percentage of total health).",
"Your critical strike damage is increased by 20% when the target has less health than you (as a percentage of total health)."
		);
$i++;

//Killing Spree - Combat //UPDATED 3.1.0
$rank[$i]= array(
			"<span style=text-align:left;float:left;>10 yd range</span><br/><span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>2 min cooldown</span><br><span style=text-align:left;float:left;>Requires Melee Weapon</span><br/>Step through the shadows from enemy to enemy within 10 yards, attacking an enemy every .5 secs with both weapons until 5 assaults are made and increasing all damage done by 20% for the duration. Can hit the same target multiple times. Cannot hit invisible or stealthed targets."
		);
$i++;	


//SUBTLETY------------------------------------------------------------------------------------->	

//Relentless Strikes - Subtlety
$rank[$i]= array(
"Your finishing moves have a 4% chance per combo point to restore 25 energy.",
"Your finishing moves have a 8% chance per combo point to restore 25 energy.",
"Your finishing moves have a 12% chance per combo point to restore 25 energy.",
"Your finishing moves have a 16% chance per combo point to restore 25 energy.",
"Your finishing moves have a 20% chance per combo point to restore 25 energy."
		);
$i++;		





//Master of Deception - Subtlety
$rank[$i]= array(
"Reduces the chance enemies have to detect you while in Stealth mode.",
"Reduces the chance enemies have to detect you while in Stealth mode. More effective than Master of Deception (Rank 1).",
"Reduces the chance enemies have to detect you while in Stealth mode. More effective than Master of Deception (Rank 2)."
		);
$i++;		

//Opportunity - Subtlety 
$rank[$i]= array(
"Increases the damage dealt with your Backstab, Mutilate, Garrote, and Ambush abilities by 10%.",
"Increases the damage dealt with your Backstab, Mutilate, Garrote, and Ambush abilities by 20%."
		);
$i++;		
		
//Sleight of Hand - Subtlety 
$rank[$i]= array(
"Reduces the chance you are critically hit by melee and ranged attacks by 1% and increases the threat reduction of your Feint ability by 10%.",
"Reduces the chance you are critically hit by melee and ranged attacks by 2% and increases the threat reduction of your Feint ability by 20%."
		);
$i++;				
		
//Dirty Tricks - Subtlety
$rank[$i]= array(
"Increases the range of your Blind and Sap abilities by 2 yards and reduces the energy cost of your Blind and Sap abilities by 25%.",
"Increases the range of your Blind and Sap abilities by 5 yards and reduces the energy cost of your Blind and Sap abilities by 50%."

		);
$i++;		

//Camouflage - Subtlety 
$rank[$i]= array(
"Increases your speed while stealthed by 5% and reduces the cooldown of your Stealth ability by 2 sec.",
"Increases your speed while stealthed by 10% and reduces the cooldown of your Stealth ability by 4 sec.",
"Increases your speed while stealthed by 15% and reduces the cooldown of your Stealth ability by 6 sec."
		);
$i++;	

//Elusiveness - Subtlety 
$rank[$i]= array(
"Reduces the cooldown of your Vanish and Blind abilities by 30 sec. and your Cloak of Shadows ability by 15 sec.",
"Reduces the cooldown of your Vanish and Blind abilities by 60 sec. and your Cloak of Shadows ability by 30 sec."
		);
$i++;		
		
		
	

		
//Ghostly Strike - Subtlety 
$rank[$i]= array(
			"<span style=text-align:left;float:left;>40 Energy</span><span style=text-align:right;float:right;>Melee range</span><br><span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>20 sec cooldown</span><br><span style=\'text-align:left;float:left;\'>Requires Melee Weapon</span><br>A strike that deals 125% weapon damage and increases your chance to dodge by 15% for 7 sec. Awards 1 combo point."
		);
$i++;		
		
//Serrated Blades - Subtlety 
$rank[$i]= array(
"Causes your attacks to ignore 186 of your target\'s Armor and increases the damage dealt by your Rupture ability by 10%.  The amount of Armor reduced increases with your level.",
"Causes your attacks to ignore 373 of your target\'s Armor and increases the damage dealt by your Rupture ability by 20%.  The amount of Armor reduced increases with your level.",
"Causes your attacks to ignore 560 of your target\'s Armor and increases the damage dealt by your Rupture ability by 30%.  The amount of Armor reduced increases with your level."
		);
$i++;
		
//Setup - Subtlety 
$rank[$i]= array(
"Gives you a 33% chance to add a combo point to your target after dodging their attack or fully resisting one of their spells. This cannot happen more than once per second.",
"Gives you a 66% chance to add a combo point to your target after dodging their attack or fully resisting one of their spells. This cannot happen more than once per second.",
"Gives you a 100% chance to add a combo point to your target after dodging their attack or fully resisting one of their spells. This cannot happen more than once per second."
		);
$i++;		
		
//Initiative - Subtlety 
$rank[$i]= array(
"Gives you a 33% chance to add an additional combo point to your target when using your Ambush, Garrote, or Cheap Shot ability.",
"Gives you a 66% chance to add an additional combo point to your target when using your Ambush, Garrote, or Cheap Shot ability.",
"Gives you a 100% chance to add an additional combo point to your target when using your Ambush, Garrote, or Cheap Shot ability."
		);
$i++;

//Improved Ambush - Subtlety
$rank[$i]= array(
"Increases the critical strike chance of your Ambush ability by 25%.",
"Increases the critical strike chance of your Ambush ability by 50%."
		);
$i++;

				
		
//Heightened Senses - Subtlety
$rank[$i]= array(
"Increases your Stealth detection and reduces the chance you are hit by spells and ranged attacks by 2%.",
"Increases your Stealth detection and reduces the chance you are hit by spells and ranged attacks by 4%. More effective than Heightened Senses (Rank 1)."
		);
$i++;			
		
//Preparation - Subtlety 
$rank[$i]= array(
			"<span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>10 min cooldown</span><br>When activated, this ability immediately finishes the cooldown on your Evasion, Sprint, Vanish, Cold Blood and Shadowstep abilities."
		);
$i++;		
	
//Dirty Deeds - Subtlety 
$rank[$i]= array(
			"Reduces the Energy Cost of your Cheap Shot and Garrote abilities by 10. Additionally, your special abilities cause 10% more damage against targets below 35% health.",
			"Reduces the Energy Cost of your Cheap Shot and Garrote abilities by 20. Additionally, your special abilities cause 20% more damage against targets below 35% health."
		);
$i++;	
		
//Hemorrhage - Subtlety 
$rank[$i]= array(
			"<span style=text-align:left;float:left;>35 Energy</span><span style=text-align:right;float:right;>Melee range</span><br>Instant<br>Requires Melee Weapon<br>An instant strike that deals 110% weapon damage and causes the target to hemorrhage, increasing any Physical damage dealt to the target by up to 13.  Lasts 10 charges or 15 sec.  Awards 1 combo point.<br><br>"
		);
$i++;		
		
//Master of Subtlety - Subtlety
$rank[$i]= array(
"Attacks made while stealthed and for 6 seconds after breaking stealth cause an additional 4% damage.",
"Attacks made while stealthed and for 6 seconds after breaking stealth cause an additional 7% damage.",
"Attacks made while stealthed and for 6 seconds after breaking stealth cause an additional 10% damage."		);
$i++;				
		
		
//Deadliness - Subtlety
$rank[$i]= array(
"Increases your Attack Power by 2%.",
"Increases your Attack Power by 4%.",
"Increases your Attack Power by 6%.",
"Increases your Attack Power by 8%.",
"Increases your Attack Power by 10%."
		);
$i++;		
		
//Enveloping Shadows - Subtlety
$rank[$i]= array(
"Reduces the damage taken by area of effect attacks by 10%.",
"Reduces the damage taken by area of effect attacks by 20%.",
"Reduces the damage taken by area of effect attacks by 30%."
		);
$i++;				
	
//Premeditation - Subtlety - 
$rank[$i]= array(
			"30 yd range<br><span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>20 sec cooldown</span><br><span style=color:eb0504>Requires Stealth</span><br>When used, adds 2 combo points to your target. You must add to or use those combo points within 20 sec or the combo points are lost."
		);
$i++;	
	
//Cheat Death - Subtlety
$rank[$i]= array(
"You have a 33% chance that an attack which would otherwise kill you will instead reduce you to 10% of your maximum health. In addition, all damage taken will be reduced by up to 90% for 3 sec (modified by resilience). This effect cannot occur more than once per minute.",
"You have a 66% chance that an attack which would otherwise kill you will instead reduce you to 10% of your maximum health. In addition, all damage taken will be reduced by up to 90% for 3 sec (modified by resilience). This effect cannot occur more than once per minute.",
"You have a 100% chance that an attack which would otherwise kill you will instead reduce you to 10% of your maximum health. In addition, all damage taken will be reduced by up to 90% for 3 sec (modified by resilience). This effect cannot occur more than once per minute."
		);
$i++;	
		
//Sinister Calling - Subtlety
$rank[$i]= array(
"Increases your total Agility by 3% and increases the percentage damage bonus of Backstab and Hemorrhage by an additional 2%.",
"Increases your total Agility by 6% and increases the percentage damage bonus of Backstab and Hemorrhage by an additional 4%.",
"Increases your total Agility by 9% and increases the percentage damage bonus of Backstab and Hemorrhage by an additional 6%.",
"Increases your total Agility by 12% and increases the percentage damage bonus of Backstab and Hemorrhage by an additional 8%.",
"Increases your total Agility by 15% and increases the percentage damage bonus of Backstab and Hemorrhage by an additional 10%."
		);
$i++;	

//Waylay - Subtlety
$rank[$i]= array(
"Your Ambush critical hits have a 50% chance to reduce the target\'s melee and ranged attack speed by 20%, movement speed by 70% for 8 sec.",
"Your Ambush critical hits have a 100% chance to reduce the target\'s melee and ranged attack speed by 20%, movement speed by 70% for 8 sec."
		);
$i++;

//Honor Among Thieves - Subtlety
$rank[$i]= array(
"When anyone in your group critically hits with a damage or healing spell or ability, you have a 33% chance to gain a combo point on your current target. This effect cannot occur more than once every second.",
"When anyone in your group critically hits with a damage or healing spell or ability, you have a 66% chance to gain a combo point on your current target. This effect cannot occur more than once every second.",
"When anyone in your group critically hits with a damage or healing spell or ability, you have a 100% chance to gain a combo point on your current target. This effect cannot occur more than once every second."
		);
$i++;

//Shadowstep - Subtlety 
$rank[$i]= array(
			"<span style=text-align:left;float:left;>10 Energy</span><span style=text-align:right;float:right;>25 yd range</span><br><span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>30 sec cooldown</span><br>Attempts to step through the shadows and reappear behind your enemy and increases movement speed by 70% for 3 sec. The damage of your next ability is increased by 20% and the threat caused is reduced by 50%. Lasts 10 sec."
		);
$i++;

//Filthy Tricks - Subtlety
$rank[$i]= array(
"Reduces the cooldown of your Tricks of the Trade and Distract abilities by 5 secs and Preparation by 2.5 min.",
"Reduces the cooldown of your Tricks of the Trade and Distract abilities by 10 secs and Preparation by 5 min."
		);
$i++;

//Slaughter form the Shadows - Subtlety
$rank[$i]= array(
"Reduces the energy cost of your Backstab and Ambush abilities by 3 and the energy cost of your Hemorrhage by 1.",
"Reduces the energy cost of your Backstab and Ambush abilities by 6 and the energy cost of your Hemorrhage by 2.",
"Reduces the energy cost of your Backstab and Ambush abilities by 9 and the energy cost of your Hemorrhage by 3.",
"Reduces the energy cost of your Backstab and Ambush abilities by 12 and the energy cost of your Hemorrhage by 4.",
"Reduces the energy cost of your Backstab and Ambush abilities by 15 and the energy cost of your Hemorrhage by 5."
		);
$i++;

//Shadow Dance - Subtlety 
$rank[$i]= array(
			"<span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>2 min cooldown</span><br>Enter the Shadow Dance, allowing the use of Sap, Garrotte, Ambush, Cheap Shot, Premeditation, Pickpocket and Disarm Trap regardless of being stealthed."
		);
$i++;
//Survival Talents End^^
