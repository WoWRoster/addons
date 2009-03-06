<?php
$i = 0;
$t = 0;

$className = "Druid Talents - Wrath of the Lich King Beta Talents";
$talentPath = "/info/basics/talents/";

$tree[$i] = "Balance"; $i++;
$tree[$i] = "Feral Combat"; $i++;
$tree[$i] = "Restoration"; $i++;


$i = 0;

$talent[$i] = array(0, "Starlight Wrath", 5, 2, 1); $i++;
$talent[$i] = array(0, "Genesis", 5, 3, 1); $i++;
$talent[$i] = array(0, "Moonglow", 3, 1, 2); $i++;
$talent[$i] = array(0, "Nature\'s Majesty", 2, 2, 2); $i++;
$talent[$i] = array(0, "Improved Moonfire", 2, 4, 2); $i++;
$talent[$i] = array(0, "Brambles", 3, 1, 3); $i++;
$talent[$i] = array(0, "Nature\'s Grace", 3, 2, 3); $i++;
$talent[$i] = array(0, "Nature\'s Splendor", 1, 3, 3); $i++;
$talent[$i] = array(0, "Nature\'s Reach", 2, 4, 3); $i++;
$talent[$i] = array(0, "Vengeance", 5, 2, 4); $i++;
$talent[$i] = array(0, "Celestial Focus", 3, 3, 4); $i++;
$talent[$i] = array(0, "Lunar Guidance", 3, 1, 5); $i++;
$talent[$i] = array(0, "Insect Swarm", 1, 2, 5); $i++;
$talent[$i] = array(0, "Improved Insect Swarm", 3, 3, 5); $i++;
$talent[$i] = array(0, "Dreamstate", 3, 1, 6); $i++;
$talent[$i] = array(0, "Moonfury", 3, 2, 6); $i++;
$talent[$i] = array(0, "Balance of Power", 2, 3, 6); $i++;
$talent[$i] = array(0, "Moonkin Form", 1, 2, 7); $i++;
$talent[$i] = array(0, "Improved Moonkin Form", 3, 3, 7); $i++;
$talent[$i] = array(0, "Improved Faerie Fire", 3, 4, 7); $i++;
$talent[$i] = array(0, "Owlkin Frenzy", 3, 1, 8); $i++;
$talent[$i] = array(0, "Wrath of Cenarius", 5, 3, 8); $i++;
$talent[$i] = array(0, "Eclipse", 3, 1, 9); $i++;
$talent[$i] = array(0, "Typhoon", 1, 2, 9); $i++;
$talent[$i] = array(0, "Force of Nature", 1, 3, 9); $i++;
$talent[$i] = array(0, "Gale Winds", 2, 4, 9); $i++;
$talent[$i] = array(0, "Earth and Moon", 3, 2, 10); $i++;
$talent[$i] = array(0, "Starfall", 1, 2, 11); $i++;
$treeStartStop[$t] = $i -1;
$t++;

//feral combat talents
$talent[$i] = array(1, "Ferocity", 5, 2, 1); $i++;
$talent[$i] = array(1, "Feral Aggression", 5, 3, 1); $i++;
$talent[$i] = array(1, "Feral Instinct", 3, 1, 2); $i++;
$talent[$i] = array(1, "Savage Fury", 2, 2, 2); $i++;
$talent[$i] = array(1, "Thick Hide", 3, 3, 2); $i++;
$talent[$i] = array(1, "Feral Swiftness", 2, 1, 3); $i++;
$talent[$i] = array(1, "Survival Instincts", 1, 2, 3); $i++;
$talent[$i] = array(1, "Sharpened Claws", 3, 3, 3); $i++;
$talent[$i] = array(1, "Shredding Attacks", 2, 1, 4); $i++;
$talent[$i] = array(1, "Predatory Strikes", 3, 2, 4); $i++;
$talent[$i] = array(1, "Primal Fury", 2, 3, 4); $i++;
$talent[$i] = array(1, "Primal Precision", 2, 4, 4); $i++;
$talent[$i] = array(1, "Brutal Impact", 2, 1, 5); $i++;
$talent[$i] = array(1, "Feral Charge", 1, 3, 5); $i++;
$talent[$i] = array(1, "Nurturing Instinct", 2, 4, 5); $i++;
$talent[$i] = array(1, "Natural Reaction", 3, 1, 6); $i++;
$talent[$i] = array(1, "Heart of the Wild", 5, 2, 6); $i++;
$talent[$i] = array(1, "Survival of the Fittest", 3, 3, 6); $i++;
$talent[$i] = array(1, "Leader of the Pack", 1, 2, 7); $i++;
$talent[$i] = array(1, "Improved Leader of the Pack", 2, 3, 7); $i++;
$talent[$i] = array(1, "Primal Tenacity", 3, 4, 7); $i++;
$talent[$i] = array(1, "Protector of the Pack", 3, 1, 8); $i++;
$talent[$i] = array(1, "Predatory Instincts", 3, 3, 8); $i++;
$talent[$i] = array(1, "Infected Wounds", 3, 4, 8); $i++;
$talent[$i] = array(1, "King of the Jungle", 3, 1, 9); $i++;
$talent[$i] = array(1, "Mangle", 1, 2, 9); $i++;
$talent[$i] = array(1, "Improved Mangle", 3, 3, 9); $i++;
$talent[$i] = array(1, "Rend and Tear", 5, 2, 10); $i++;
$talent[$i] = array(1, "Berserk", 1, 2, 11); $i++;
$treeStartStop[$t] = $i -1;
$t++;

//restoration talents
$talent[$i] = array(2, "Improved Mark of the Wild", 2, 1, 1); $i++;
$talent[$i] = array(2, "Nature\'s Focus", 3, 2, 1); $i++;
$talent[$i] = array(2, "Furor", 5, 3, 1); $i++;
$talent[$i] = array(2, "Naturalist", 5, 1, 2); $i++;
$talent[$i] = array(2, "Subtlety", 3, 2, 2); $i++;
$talent[$i] = array(2, "Natural Shapeshifter", 3, 3, 2); $i++;
$talent[$i] = array(2, "Intensity", 3, 1, 3); $i++;
$talent[$i] = array(2, "Omen of Clarity", 1, 2, 3); $i++;
$talent[$i] = array(2, "Master Shapeshifter", 2, 3, 3); $i++;
$talent[$i] = array(2, "Tranquil Spirit", 5, 2, 4); $i++;
$talent[$i] = array(2, "Improved Rejuvenation", 3, 3, 4); $i++;
$talent[$i] = array(2, "Nature\'s Swiftness", 1, 1, 5); $i++;
$talent[$i] = array(2, "Gift of Nature", 5, 2, 5); $i++;
$talent[$i] = array(2, "Improved Tranquility", 2, 4, 5); $i++;
$talent[$i] = array(2, "Empowered Touch", 2, 1, 6); $i++;
$talent[$i] = array(2, "Improved Regrowth", 5, 3, 6); $i++;
$talent[$i] = array(2, "Living Spirit", 3, 1, 7); $i++;
$talent[$i] = array(2, "Swiftmend", 1, 2, 7); $i++;
$talent[$i] = array(2, "Natural Perfection", 3, 3, 7); $i++;
$talent[$i] = array(2, "Empowered Rejuvenation", 5, 2, 8); $i++;
$talent[$i] = array(2, "Living Seed", 3, 3, 8); $i++;
$talent[$i] = array(2, "Replenish", 3, 1, 9); $i++;
$talent[$i] = array(2, "Tree of Life", 1, 2, 9); $i++;
$talent[$i] = array(2, "Improved Tree of Life", 3, 3, 9); $i++;
$talent[$i] = array(2, "Gift of the Earthmother", 5, 3, 10); $i++;
$talent[$i] = array(2, "Wild Growth", 1, 2, 11); $i++;

$treeStartStop[$t] = $i -1;
$t++;

$i = 0;


//Balance Talents Begin---------------------------------------------------------------

//Starlight Wrath - Balance 
$rank[$i] = array(
"Reduces the cast time of your Wrath and Starfire spells by 0.1 sec.",
"Reduces the cast time of your Wrath and Starfire spells by 0.2 sec.",
"Reduces the cast time of your Wrath and Starfire spells by 0.3 sec.",
"Reduces the cast time of your Wrath and Starfire spells by 0.4 sec.",
"Reduces the cast time of your Wrath and Starfire spells by 0.5 sec."
		);
$i++;

//Genesis - Balance 
$rank[$i] = array(
"Increases the damage and healing done by your periodic damage and healing effects by 1%.",
"Increases the damage and healing done by your periodic damage and healing effects by 2%.",
"Increases the damage and healing done by your periodic damage and healing effects by 3%.",
"Increases the damage and healing done by your periodic damage and healing effects by 4%.",
"Increases the damage and healing done by your periodic damage and healing effects by 5%."
		);
$i++;

//Moonglow - Balance
$rank[$i] = array(
"Reduces the Mana cost of your Moonfire, Starfire, Starfall, Wrath, Healing Touch, Nourish, Regrowth and Rejuvenation spells by 3%.",
"Reduces the Mana cost of your Moonfire, Starfire, Starfall, Wrath, Healing Touch, Nourish, Regrowth and Rejuvenation spells by 6%.",
"Reduces the Mana cost of your Moonfire, Starfire, Starfall, Wrath, Healing Touch, Nourish, Regrowth and Rejuvenation spells by 9%."
		);		
$i++;	
		

//Nature\'s Mastery - Balance 
$rank[$i] = array(
"Increases the critical strike chance of your Wrath, Starfire, Starfall, Nourish and Healing Touch spells by 2%.",
"Increases the critical strike chance of your Wrath, Starfire, Starfall, Nourish and Healing Touch spells by 4%."
		);
$i++;		

//Improved Moonfire - Balance
$rank[$i] = array(
"Increases the damage and critical strike chance of your Moonfire spell by 5%.",
"Increases the damage and critical strike chance of your Moonfire spell by 10%."
		);
$i++;		

//Brambles - Balance
$rank[$i] = array( 
"Damage from your Thorns and Entangling Roots increased by 25% and damage done by your Treants increased by 5%. In addition, damage from your Treants and attacks done to you while you have Barkskin active have a 5% chance to daze the target for 3 sec.",
"Damage from your Thorns and Entangling Roots increased by 50% and damage done by your Treants increased by 10%. In addition, damage from your Treants and attacks done to you while you have Barkskin active have a 10% chance to daze the target for 3 sec.",
"Damage from your Thorns and Entangling Roots increased by 75% and damage done by your Treants increased by 15%. In addition, damage from your Treants and attacks done to you while you have Barkskin active have a 15% chance to daze the target for 3 sec."
		);
$i++;		

//Nature\'s Grace - Balance
$rank[$i] = array(
"All spell criticals have a 33% chance to grace you with a blessing of nature, reducing the casting time of your next spell by 0.5 sec.",
"All spell criticals have a 66% chance to grace you with a blessing of nature, reducing the casting time of your next spell by 0.5 sec.",
"All spell criticals have a 100% chance to grace you with a blessing of nature, reducing the casting time of your next spell by 0.5 sec."
		);
$i++;	

//Nature\'s Splendor - Balance //UPDATED
$rank[$i] = array(
"Increases the duration of your Moonfire and Rejuvenation spells by 3 sec, your Regrowth spell by 6 sec, and your Insect Swarm and Lifebloom spells by 2 sec."
		);
$i++;
	

//Nature\'s Reach - Balance
$rank[$i] = array(
"Increases the range of your Balance spells and Faerie Fire (Feral) ability by 10%, and reduces the threat generated by your Balance spells by 15%.",
"Increases the range of your Balance spells and Faerie Fire (Feral) ability by 20%, and reduces the threat generated by your Balance spells by 30%."
		);
$i++;		

//Vengeance - Balance
$rank[$i] = array(
"Increases the critical strike damage bonus of your Starfire, Starfall, Moonfire, and Wrath spells by 20%.",
"Increases the critical strike damage bonus of your Starfire, Starfall, Moonfire, and Wrath spells by 40%.",
"Increases the critical strike damage bonus of your Starfire, Starfall, Moonfire, and Wrath spells by 60%.",
"Increases the critical strike damage bonus of your Starfire, Starfall, Moonfire, and Wrath spells by 80%.",
"Increases the critical strike damage bonus of your Starfire, Starfall, Moonfire, and Wrath spells by 100%."
		);
$i++;		

//Celestial Focus - Balance  
$rank[$i] = array(
"Gives your Starfire spells a 5% chance to stun the target for 3 sec and increases your total spell haste by 1%.",
"Gives your Starfire spells a 10% chance to stun the target for 3 sec and increases your total spell haste by 2%.",
"Gives your Starfire spells a 15% chance to stun the target for 3 sec and increases your total spell haste by 3%."
		);
$i++;

//Lunar Guidance - Balance  
$rank[$i] = array(
"Increases your spell power by 4% of your total Intellect.",
"Increases your spell power by 8% of your total Intellect.",
"Increases your spell power by 12% of your total Intellect."
		);
$i++;

//Insect Swarm - Balance
$rank[$i]= array(
		"<span style=text-align:left;float:left;>314</span><span style=text-align:right;float:right;>30 yd range</span><br>Instant cast<br>The enemy target is swarmed by insects, decreasing their chance to hit with melee and ranged attacks by 3% and causing 144 Nature damage over 12 sec<br><br>\
		&nbsp;Trainable Ranks Listed Below:<br>\
		&nbsp;Rank 2: 85 Mana, 192 Damage<br>\
		&nbsp;Rank 3: 110 Mana, 300 Damage<br>\
		&nbsp;Rank 4: 135 Mana, 432 Damage<br>\
		&nbsp;Rank 5: 155 Mana, 594 Damage<br>\
		&nbsp;Rank 6: 175 Mana, 792 Damage"
		);
$i++;

//Improved Insect Swarm - Balance
$rank[$i] = array(
"Increases your damage done by your Wrath spell to targets afflicted by your Insect Swarm by 1%, and increases the critical strike chance of your Starfire spell by 1% on targets afflicted by your Moonfire spell.",
"Increases your damage done by your Wrath spell to targets afflicted by your Insect Swarm by 2%, and increases the critical strike chance of your Starfire spell by 2% on targets afflicted by your Moonfire spell.",
"Increases your damage done by your Wrath spell to targets afflicted by your Insect Swarm by 3%, and increases the critical strike chance of your Starfire spell by 3% on targets afflicted by your Moonfire spell."
		);		
$i++;

//Dreamstate - Balance
$rank[$i] = array(
"Regenerate mana equal to 4% of your Intellect every 5 sec. even while casting.",
"Regenerate mana equal to 7% of your Intellect every 5 sec. even while casting.",
"Regenerate mana equal to 10% of your Intellect every 5 sec. even while casting."
		);		
$i++;

//Moonfury - Balance  			
$rank[$i] = array(
"Increases the damage done by your Starfire, Moonfire and Wrath spells by 3%.",
"Increases the damage done by your Starfire, Moonfire and Wrath spells by 6%.",
"Increases the damage done by your Starfire, Moonfire and Wrath spells by 10%."
		);
$i++;		


//Nature\'s Warrior - Balance  			
$rank[$i] = array(
"Increases your chance to hit with all spells and reduces the chance you\'ll be hit by spells by 2%.",
"Increases your chance to hit with all spells and reduces the chance you\'ll be hit by spells by 4%."
		);
$i++;


//Moonkin Form - Balance  //UPDATED
$rank[$i] = array(
		"769 Mana<br><span style=text-align:left;float:left;>Instant cast</span><br>Shapeshift into Moonkin Form. While in this form the armor contribution from items is increased by 370% and all party and raid members within 45 yards have their spell critical chance increased by 5%. Single target spell critical strikes in this form have a chance to instantly regenerate 2% of your total mana. The Moonkin can only cast Balance and Remove Curse spells while shapeshifted.<br><br>The act of shapeshifting frees the caster of Polymorph and Movement Impairing effects."
		);
$i++;

//Improved Moonkin Form - Balance  			
$rank[$i] = array(
"Your Moonkin Aura also causes affected targets to gain 1% haste and you to gain 5% of your spirit as additional spell damage.",
"Your Moonkin Aura also causes affected targets to gain 2% haste and you to gain 10% of your spirit as additional spell damage.",
"Your Moonkin Aura also causes affected targets to gain 3% haste and you to gain 15% of your spirit as additional spell damage."
		);
$i++;


//Improved Faerie Fire - Balance  			
$rank[$i] = array(
"Your Faerie Fire spell also increases the chance the target will be hit by spell attacks by 1%, and increases the critical strike chance of your damage spells by 1% on targets afflicted by Faerie Fire.",
"Your Faerie Fire spell also increases the chance the target will be hit by spell attacks by 2%, and increases the critical strike chance of your damage spells by 2% on targets afflicted by Faerie Fire.",
"Your Faerie Fire spell also increases the chance the target will be hit by spell attacks by 3%, and increases the critical strike chance of your damage spells by 3% on targets afflicted by Faerie Fire."
		);
$i++;

//Owlkin Frenzy - Balance  			
$rank[$i] = array(
"Attacks done to you while in Moonkin form have a 5% chance to cause you to go into a Frenzy, increasing your damage by 10% and causes you to be immune to pushback while casting Balance spells. Lasts 10 sec.",
"Attacks done to you while in Moonkin form have a 10% chance to cause you to go into a Frenzy, increasing your damage by 10% and causes you to be immune to pushback while casting Balance spells. Lasts 10 sec.",
"Attacks done to you while in Moonkin form have a 15% chance to cause you to go into a Frenzy, increasing your damage by 10% and causes you to be immune to pushback while casting Balance spells. Lasts 10 sec."
		);
$i++;

//Wrath of Cenarius - Balance  			
$rank[$i] = array(
"Your Starfire spell gains an additional 4% and your Wrath gains an additional 2% of your bonus damage effects.",
"Your Starfire spell gains an additional 8% and your Wrath gains an additional 4% of your bonus damage effects.",
"Your Starfire spell gains an additional 12% and your Wrath gains an additional 6% of your bonus damage effects.",
"Your Starfire spell gains an additional 16% and your Wrath gains an additional 8% of your bonus damage effects.",
"Your Starfire spell gains an additional 20% and your Wrath gains an additional 10% of your bonus damage effects."
		);
$i++;

//Eclipse - Balance  			
$rank[$i] = array(
"When you critically hit with Starfire, you have a 33% chance of increasing damage done by Wrath by 10%. When you critically hit with Wrath, you have a 20% chance of increasing your critical strike chance with Starfire by 15%. Effect lasts 15 sec and has a 30 sec cooldown.",
"When you critically hit with Starfire, you have a 66% chance of increasing damage done by Wrath by 10%. When you critically hit with Wrath, you have a 40% chance of increasing your critical strike chance with Starfire by 15%. Effect lasts 15 sec and has a 30 sec cooldown.",
"When you critically hit with Starfire, you have a 100% chance of increasing damage done by Wrath by 10%. When you critically hit with Wrath, you have a 60% chance of increasing your critical strike chance with Starfire by 15%. Effect lasts 15 sec and has a 30 sec cooldown."
		);
$i++;

//Typhoon - Balance  //UPDATED
$rank[$i] = array(
"<span style=text-align:left;float:left;>1258 Mana</span><span style=text-align:right;float:right;>30 yd range</span><br><span style=text-align:left;float:left;>Instant cast</span><span style=text-align:right;float:right;>20 sec cooldown</span><br>You summon a violent Typhoon that does 400 Nature damage when in contact with hostile targets, knocking them back 5 yards."
		);
$i++;



//Force of Nature - Balance  
$rank[$i] = array(
		"<span style=text-align:left;float:left;>284 Mana</span><span style=text-align:right;float:right;>30 yd range</span><br><span style=text-align:left;float:left;>Instant cast</span><span style=text-align:right;float:right;>3 min cooldown</span><br>Summons 3 treants to attack the enemy target for 30 sec."
		);
$i++;

//Gale Winds - Balance
$rank[$i] = array(
"Increases damage done by your Hurricane and Typhoon spells by 15%, and increases the range of your Cyclone spell by 2 yards.",
"Increases damage done by your Hurricane and Typhoon spells by 30%, and increases the range of your Cyclone spell by 4 yards."
		);
$i++;

//Earth and Moon - Balance
$rank[$i] = array(
"Your Wrath and Starfire spells have a 100% chance to apply the Earth and Moon effect, which increases spell damage taken by 4% for 12 sec. Also increases your spell damage by 1%.",
"Your Wrath and Starfire spells have a 100% chance to apply the Earth and Moon effect, which increases spell damage taken by 9% for 12 sec. Also increases your spell damage by 2%.",
"Your Wrath and Starfire spells have a 100% chance to apply the Earth and Moon effect, which increases spell damage taken by 13% for 12 sec. Also increases your spell damage by 3%.",
		);
$i++;

//Starfall - Balance  
$rank[$i] = array(
		"<span style=text-align:left;float:left;>1365 Mana</span><span style=text-align:right;float:right;>30 yd range</span><br><span style=text-align:left;float:left;>Instant cast</span><span style=text-align:right;float:right;>3 min cooldown</span><br>You summon a flurry of stars from the sky on all targets within 30 yards of the caster, each doing 111 to 129 Arcane damage. Also causes 20 Arcane damage to other enemies within 5 yards of the enemy target. Maximum 20 stars. Lasts 10 sec. Shapeshifting into an animal form or mounting cancels the effect. Any effect which causes you to lose control of your character will supress the starfall effect."
		);
$i++;



//Ferocity - Feral 
$rank[$i] = array(
"Reduces the cost of your Maul, Swipe, Claw, Rake and Mangle abilities by 1 Rage or Energy.",
"Reduces the cost of your Maul, Swipe, Claw, Rake and Mangle abilities by 2 Rage or Energy.",
"Reduces the cost of your Maul, Swipe, Claw, Rake and Mangle abilities by 3 Rage or Energy.",
"Reduces the cost of your Maul, Swipe, Claw, Rake and Mangle abilities by 4 Rage or Energy.",
"Reduces the cost of your Maul, Swipe, Claw, Rake and Mangle abilities by 5 Rage or Energy."
		);
$i++;

//Feral Aggression - Feral
$rank[$i] = array(
"Increases the Attack Power reduction of your Demoralizing Roar by 8% and the damage caused by your Ferocious Bite by 3%.",
"Increases the Attack Power reduction of your Demoralizing Roar by 16% and the damage caused by your Ferocious Bite by 6%.",
"Increases the Attack Power reduction of your Demoralizing Roar by 24% and the damage caused by your Ferocious Bite by 9%.",
"Increases the Attack Power reduction of your Demoralizing Roar by 32% and the damage caused by your Ferocious Bite by 12%.",
"Increases the Attack Power reduction of your Demoralizing Roar by 40% and the damage caused by your Ferocious Bite by 15%."
		);
$i++;

//Feral Instinct - Feral
$rank[$i] = array(
"Increases the damage done by your Swipe (Bear) ability by 10% and reduces the chance enemies have to detect you while Prowling.",
"Increases the damage done by your Swipe (Bear) ability by 20% and reduces the chance enemies have to detect you while Prowling.",
"Increases the damage done by your Swipe (Bear) ability by 30% and reduces the chance enemies have to detect you while Prowling."
		);
$i++;		



//Savage Fury - Feral 
$rank[$i] = array(
		"Increases the damage caused by your Claw, Rake, Mangle (Cat), Mangle (Bear) and Maul abilities by 10%.",
		"Increases the damage caused by your Claw, Rake, Mangle (Cat), Mangle (Bear) and Maul abilities by 20%."		
		);
$i++;	


//Thick Hide - Feral 
$rank[$i] = array(
"Increases your Armor contribution from items by 4%.",
"Increases your Armor contribution from items by 7%.",
"Increases your Armor contribution from items by 10%."
		);		
$i++;		

//Feral Swiftness - Feral
$rank[$i] = array(
"Increases your movement speed by 15% in Cat Form and increases your chance to dodge while in Cat Form, Bear Form and Dire Bear Form by 2%.",
"Increases your movement speed by 30% in Cat Form and increases your chance to dodge while in Cat Form, Bear Form and Dire Bear Form by 4%."
		);
$i++;		

//Survival Instincts - Feral 
$rank[$i] = array(
"<span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>5 min cooldown</span><br>When activated, this ability temporarily grants you 30% of your maximum health for 20 sec while in Bear Form, Cat Form, or Dire Bear Form. After the effect expires, the health is lost."
		);
$i++;		

//Sharpened Claws - Feral  
$rank[$i] = array(
"Increases your critical strike chance while in Bear, Dire Bear or Cat Form by 2%.",
"Increases your critical strike chance while in Bear, Dire Bear or Cat Form by 4%.",
"Increases your critical strike chance while in Bear, Dire Bear or Cat Form by 6%."
		);
$i++;		

//Shredding Attacks - Feral 
$rank[$i] = array(
"Reduces the energy cost of your Shred ability by 9 and the rage cost of your Lacerate ability by 1.",
"Reduces the energy cost of your Shred ability by 18 and the rage cost of your Lacerate ability by 2."
		);
$i++;		

//Predatory Strikes - Feral  
$rank[$i] = array(
"Increases your melee attack power in Cat, Bear, Dire Bear and Moonkin Forms by 50% of your level and 7% of any attack power on your equipped weapon.",
"Increases your melee attack power in Cat, Bear, Dire Bear and Moonkin Forms by 100% of your level and 14% of any attack power on your equipped weapon.",
"Increases your melee attack power in Cat, Bear, Dire Bear and Moonkin Forms by 150% of your level and 20% of any attack power on your equipped weapon."
		);
$i++;				
	
//Primal Fury - Feral 
$rank[$i] = array(
"Gives you a 50% chance to gain an additional 5 Rage anytime you get a critical strike while in Bear and Dire Bear Form and your critical strikes from Cat Form abilities that add combo points have a 50% chance to add an additional combo point.",
"Gives you a 100% chance to gain an additional 5 Rage anytime you get a critical strike while in Bear and Dire Bear Form and your critical strikes from Cat Form abilities that add combo points have a 100% chance to add an additional combo point."
		);
$i++;

//Primal Precision - Feral 
$rank[$i] = array(
"Increases your expertise by 5, and you are refunded 40% of the energy cost of a finishing move if it fails to land.",
"Increases your expertise by 10, and you are refunded 80% of the energy cost of a finishing move if it fails to land."
		);
$i++;



//Brutal Impact - Feral
$rank[$i] = array(
"Increases the stun duration of your Bash and Pounce abilities by 0.5 sec and decreases the cooldown of Bash by 15 sec.",
"Increases the stun duration of your Bash and Pounce abilities by 1 sec and decreases the cooldown of Bash by 30 sec."
		);
$i++;	


	
//Feral Charge - Feral 
$rank[$i] = array(
		"Teaches Feral Charge (Bear) and Feral Charge (Cat).<br/><br/> Feral Charge (Bear) - Causes you to charge an enemy, immobilizing and interrupting any spell being cast for 4 sec. This ability can be used in Bear Form and Dire Bear Form. 15 second cooldown.<br/><br/> Feral Charge (Cat) - Causes you to leap behind an enemy, dazing them for 3 sec. 30 second cooldown."
		);
$i++;			


//Nurturing Instinct - Feral
$rank[$i]= array(
"Increases your healing spells by up to 35% of your Agility, and increases healing done to you by 10% while in Cat form.",
"Increases your healing spells by up to 70% of your Agility, and increases healing done to you by 20% while in Cat form."
		);
$i++;		

//Natural Reaction - Feral
$rank[$i]= array(
"Increases your dodge while in Bear Form or Dire Bear Form by 2%, and you regenerate 1 rage everytime you dodge while in Bear Form or Dire Bear Form.",
"Increases your dodge while in Bear Form or Dire Bear Form by 4%, and you regenerate 2 rage everytime you dodge while in Bear Form or Dire Bear Form.",
"Increases your dodge while in Bear Form or Dire Bear Form by 6%, and you regenerate 3 rage everytime you dodge while in Bear Form or Dire Bear Form."
		);
$i++;

	
//Heart of the Wild - Feral
$rank[$i]= array(
"Increases your Intellect by 4%. In addition, while in Bear or Dire Bear Form your Stamina is increased by 4% and while in Cat Form your attack power is increased by 2%.",
"Increases your Intellect by 8%. In addition, while in Bear or Dire Bear Form your Stamina is increased by 8% and while in Cat Form your attack power is increased by 4%.",
"Increases your Intellect by 12%. In addition, while in Bear or Dire Bear Form your Stamina is increased by 12% and while in Cat Form your attack power is increased by 6%.",
"Increases your Intellect by 16%. In addition, while in Bear or Dire Bear Form your Stamina is increased by 16% and while in Cat Form your attack power is increased by 8%.",
"Increases your Intellect by 20%. In addition, while in Bear or Dire Bear Form your Stamina is increased by 20% and while in Cat Form your attack power is increased by 10%."
		);
$i++;

//Survival of the Fittest - Feral
$rank[$i]= array(
"Increases all attributes by 2% and reduces the chance you\'ll be critically hit by melee attacks by 2%, and increases your armor contribution from cloth and leather items in Bear Form and Dire Bear Form by 22%.",
"Increases all attributes by 4% and reduces the chance you\'ll be critically hit by melee attacks by 4%, and increases your armor contribution from cloth and leather items in Bear Form and Dire Bear Form by 44%.",
"Increases all attributes by 6% and reduces the chance you\'ll be critically hit by melee attacks by 6%, and increases your armor contribution from cloth and leather items in Bear Form and Dire Bear Form by 66%."
		);
$i++;



//Leader of the Pack - Feral
$rank[$i]= array(
"While in Cat, Bear or Dire Bear Form, the Leader of the Pack increases ranged and melee critical chance of all party members within 45 yards by 5%."
		);
$i++;

//Improved Leader of the Pack - Feral
$rank[$i]= array(
"Your Leader of the Pack ability also causes affected targets to heal themselves for 2% of their total health when they critically hit with a melee or ranged attack. The healing effect cannot occur more than once every 6 sec. In addition, you gain 4% of your maximum mana when you benefit from this heal.",
"Your Leader of the Pack ability also causes affected targets to heal themselves for 4% of their total health when they critically hit with a melee or ranged attack. The healing effect cannot occur more than once every 6 sec. In addition, you gain 8% of your maximum mana when you benefit from this heal."
		);
$i++;

	
//Primal Tenacity - Feral
$rank[$i]= array(
"Reduces the duration of Fear effects by 10%, and reduces all damage taken while Stunned by 10%, and reduces the mana cost of Bear Form, Cat Form, and Dire Bear Form by 17%.",
"Reduces the duration of Fear effects by 20%, and reduces all damage taken while Stunned by 20%, and reduces the mana cost of Bear Form, Cat Form, and Dire Bear Form by 33%.",
"Reduces the duration of Fear effects by 30%, and reduces all damage taken while Stunned by 30%, and reduces the mana cost of Bear Form, Cat Form, and Dire Bear Form by 50%."
		);
$i++;

//Protector of the Pack - Feral  
$rank[$i] = array(
"Increases your attack power by 2%, and reduces the damage you take by 4% while in Bear or Dire Bear Form.",
"Increases your attack power by 4%, and reduces the damage you take by 8% while in Bear or Dire Bear Form.",
"Increases your attack power by 6%, and reduces the damage you take by 12% while in Bear or Dire Bear Form."
		);
$i++;		

//Predatory Instincts - Feral 
$rank[$i]= array(
"While in Cat Form increases your damage from melee critical strikes by 3% and reduces the damage taken from area of effect attacks by 10%.",
"While in Cat Form increases your damage from melee critical strikes by 7% and reduces the damage taken from area of effect attacks by 20%.",
"While in Cat Form increases your damage from melee critical strikes by 10% and reduces the damage taken from area of effect attacks by 30%."
		);
$i++;

//Infected Wounds - Feral
$rank[$i] = array( 
"Your Shred, Maul and Mangle attacks cause an Infected Wound in the target. The Infected Wound reduces the movement speed of the target by 8% and the attack speed by 3%. Stacks up to 2 times. Lasts 12 sec.",
"Your Shred, Maul and Mangle attacks cause an Infected Wound in the target. The Infected Wound reduces the movement speed of the target by 17% and the attack speed by 7%. Stacks up to 2 times. Lasts 12 sec.",
"Your Shred, Maul and Mangle attacks cause an Infected Wound in the target. The Infected Wound reduces the movement speed of the target by 25% and the attack speed by 10%. Stacks up to 2 times. Lasts 12 sec."
		);
$i++;

//King of the Jungle - Feral
$rank[$i] = array( 
"While using your Enrage ability in Bear form or Dire Bear form, your damage is increased by 5%, and your Tiger\'s Fury ability also instantly restores 20 energy.",
"While using your Enrage ability in Bear form or Dire Bear form, your damage is increased by 10%, and your Tiger\'s Fury ability also instantly restores 40 energy.",
"While using your Enrage ability in Bear form or Dire Bear form, your damage is increased by 15%, and your Tiger\'s Fury ability also instantly restores 60 energy."
		);
$i++;	

//Mangle - Feral
$rank[$i]= array(
"Mangle the target, inflicting damage and causing the target to take additional damage from bleed effects for 12 sec. This ability can be used in Cat Form for Dire Bear Form."
		);
$i++;

//Improved Mangle - Feral
$rank[$i] = array(
"Reduces the cooldown of your Mangle (Bear) ability by 0.5 sec., and reduces the energy cost of your Mangle (Cat) ability by 2.",
"Reduces the cooldown of your Mangle (Bear) ability by 1.0 sec., and reduces the energy cost of your Mangle (Cat) ability by 4.",
"Reduces the cooldown of your Mangle (Bear) ability by 1.5 sec., and reduces the energy cost of your Mangle (Cat) ability by 6."
		);
$i++;

//Rend and Tear - Feral
$rank[$i] = array(
"Increases damage done by your Maul and Shred attacks on bleeding targets by 4%, and increases the critical strike chance of your Ferocious Bite ability on bleeding targets by 10%.",
"Increases damage done by your Maul and Shred attacks on bleeding targets by 8%, and increases the critical strike chance of your Ferocious Bite ability on bleeding targets by 20%.",
"Increases damage done by your Maul and Shred attacks on bleeding targets by 12%, and increases the critical strike chance of your Ferocious Bite ability on bleeding targets by 30%.",
"Increases damage done by your Maul and Shred attacks on bleeding targets by 16%, and increases the critical strike chance of your Ferocious Bite ability on bleeding targets by 40%.",
"Increases damage done by your Maul and Shred attacks on bleeding targets by 20%, and increases the critical strike chance of your Ferocious Bite ability on bleeding targets by 50%."
		);
$i++;	

//Berserk - Feral
$rank[$i]= array(
"<span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>3 min cooldown</span><br>When activated, this ability causes your Mangle (Bear) ability to hit up to 3 targets and have no cooldown, and reduces the energy cost of all your Cat Form abilities by 50%. Lasts 15 sec. You cannot use Tiger\'s Fury while Berserk is active.<br/><br/>Clears the effect of Fear and makes you immune to Fear for the duration."
		);
$i++;	

//RESTORATION--------------------------------------------------------------

//Improved Mark of the Wild - Restoration
$rank[$i]= array(
"Increases the effects of your Mark of the Wild and Gift of the Wild spells by 20%.",
"Increases the effects of your Mark of the Wild and Gift of the Wild spells by 40%."
		);
$i++;	

//Nature\'s Focus - Restoration 
$rank[$i]= array(
"Reduces the pushback suffered from damaging attacks while casting Healing Touch, Wrath, Entangling Roots, Cyclone, Nourish, Regrowth and Tranquility by 23%.",
"Reduces the pushback suffered from damaging attacks while casting Healing Touch, Wrath, Entangling Roots, Cyclone, Nourish, Regrowth and Tranquility by 46%.",
"Reduces the pushback suffered from damaging attacks while casting Healing Touch, Wrath, Entangling Roots, Cyclone, Nourish, Regrowth and Tranquility by 70%."
		);
$i++;	
		
//Furor - Restoration
$rank[$i]= array(
"Gives you 20% chance to gain 10 Rage when you shapeshift into Bear and Dire Bear Form, and you keep up to 20 Energy when you shapeshift into Cat Form, and increases your total Intellect while in Moonkin form by 2%.",
"Gives you 40% chance to gain 10 Rage when you shapeshift into Bear and Dire Bear Form, and you keep up to 40 Energy when you shapeshift into Cat Form, and increases your total Intellect while in Moonkin form by 4%.",
"Gives you 60% chance to gain 10 Rage when you shapeshift into Bear and Dire Bear Form, and you keep up to 60 Energy when you shapeshift into Cat Form, and increases your total Intellect while in Moonkin form by 6%.",
"Gives you 80% chance to gain 10 Rage when you shapeshift into Bear and Dire Bear Form, and you keep up to 80 Energy when you shapeshift into Cat Form, and increases your total Intellect while in Moonkin form by 8%.",
"Gives you 100% chance to gain 10 Rage when you shapeshift into Bear and Dire Bear Form, and you keep up to 100 Energy when you shapeshift into Cat Form, and increases your total Intellect while in Moonkin form by 10%."
		);
$i++;		

//Naturalist - Restoration
$rank[$i]= array(
"Reduces the cast time of your Healing Touch spell by 0.1 sec and increases the damage you deal with physical attacks in all forms by 2%.",
"Reduces the cast time of your Healing Touch spell by 0.2 sec and increases the damage you deal with physical attacks in all forms by 4%.",
"Reduces the cast time of your Healing Touch spell by 0.3 sec and increases the damage you deal with physical attacks in all forms by 6%.",
"Reduces the cast time of your Healing Touch spell by 0.4 sec and increases the damage you deal with physical attacks in all forms by 8%.",
"Reduces the cast time of your Healing Touch spell by 0.5 sec and increases the damage you deal with physical attacks in all forms by 10%."
		);
$i++;		
		
//Subtlety - Restoration 
$rank[$i]= array(
"Reduces the threat generated by your restoration spells by 10% and reduces the chance your healing over time spells will be dispelled by 10%.",
"Reduces the threat generated by your restoration spells by 20% and reduces the chance your healing over time spells will be dispelled by 20%.",
"Reduces the threat generated by your restoration spells by 30% and reduces the chance your healing over time spells will be dispelled by 30%."
		);
$i++;	
	
//Natural Shapeshifter - Balance 
$rank[$i] = array(
"Reduces the mana cost of all shapeshifting by 10%.",
"Reduces the mana cost of all shapeshifting by 20%.",
"Reduces the mana cost of all shapeshifting by 30%."
		);		
$i++;		
		
//Intensity - Restoration 
$rank[$i]= array(
"Allows 10% of your Mana regeneration to continue while casting and causes your Enrage ability to instantly generate 4 rage.",
"Allows 20% of your Mana regeneration to continue while casting and causes your Enrage ability to instantly generate 7 rage.",
"Allows 30% of your Mana regeneration to continue while casting and causes your Enrage ability to instantly generate 10 rage."
		);
$i++;


		
//Omen of Clarity - Restoration //UPDATED
$rank[$i] = array(
"Each of the Druid\'s damage, healing spells and auto attacks have a chance of causing the caster to enter a Clearcasting state. The Clearcasting state reduces the Mana, Rage or Energy cost of your next damage, healing spell or offensive ability by 100%."
		);
$i++;
		
//MASTER SHAPESHIFTER - Restoration 
$rank[$i]= array(
"Grants an effect which lasts while the Druid is within the respective shapeshift form.<br><br>Bear form - Increases physical damage by 2%<br><br>Cat form - Increases critical strike chance by 2%<br><br>Moonkin form - Increases spell damage by 2%<br><br>Tree of Life form - Increases healing by 2%.",
"Grants an effect which lasts while the Druid is within the respective shapeshift form.<br><br>Bear form - Increases physical damage by 4%<br><br>Cat form - Increases critical strike chance by 4%<br><br>Moonkin form - Increases spell damage by 4%<br><br>Tree of Life form - Increases healing by 4%."
		);
$i++;		
		
		
//Tranquil Spirit - Restoration  
$rank[$i]= array(
"Reduces the mana cost of your Healing Touch, Nourish and Tranquility spells by 2%.",
"Reduces the mana cost of your Healing Touch, Nourish and Tranquility spells by 4%.",
"Reduces the mana cost of your Healing Touch, Nourish and Tranquility spells by 6%.",
"Reduces the mana cost of your Healing Touch, Nourish and Tranquility spells by 8%.",
"Reduces the mana cost of your Healing Touch, Nourish and Tranquility spells by 10%."
		);
$i++;		
		
//Improved Rejuvenation - Restoration   
$rank[$i]= array(
"Increases the effect of your Rejuvenation spell by 5%.",
"Increases the effect of your Rejuvenation spell by 10%.",
"Increases the effect of your Rejuvenation spell by 15%."
		);
$i++;	
		
//Nature\'s Swiftness - Restoration   
$rank[$i]= array(
		"<span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>3 min cooldown</span><br>When activated, your next Nature spell with a casting time less than 10 sec. becomes an instant cast spell."
		);
$i++;	


//Gift of Nature - Restoration 
$rank[$i]= array(
"Increases the effect of all healing spells by 2%.",
"Increases the effect of all healing spells by 4%.",
"Increases the effect of all healing spells by 6%.",
"Increases the effect of all healing spells by 8%.",
"Increases the effect of all healing spells by 10%."
		);
$i++;	


//Improved Tranquility - Restoration
$rank[$i]= array(
"Reduces threat caused by Tranquility by 50%, and reduces the cooldown by 30%.",
"Reduces threat caused by Tranquility by 100%, and reduces the cooldown by 60%."
		);
$i++;	


//Empowered Touch - Restoration
$rank[$i]= array(
"Your Healing Touch spell gains an additional 20% of your bonus healing effects.",
"Your Healing Touch spell gains an additional 40% of your bonus healing effects."
		);
$i++;	


//Improved Regrowth - Restoration 
$rank[$i]= array(
"Increases the critical effect chance of your Regrowth spell by 10%.",
"Increases the critical effect chance of your Regrowth spell by 20%.",
"Increases the critical effect chance of your Regrowth spell by 30%.",
"Increases the critical effect chance of your Regrowth spell by 40%.",
"Increases the critical effect chance of your Regrowth spell by 50%."
		);
$i++;

//Living Spirit - Restoration 
$rank[$i]= array(
"Increases your total Spirit by 5%.",
"Increases your total Spirit by 10%.",
"Increases your total Spirit by 15%."
		);
$i++;	

//Swiftmend - Restoration 
$rank[$i]= array(
		"<span style=text-align:left;float:left;>379 Mana</span><span style=text-align:right;float:right;>40 yd range</span><br><span style=text-align:left;float:left;>Instant cast</span><span style=text-align:right;float:right;>15 sec cooldown</span><br>Consumes a Rejuvenation or Regrowth effect on a friendly target to instantly heal them an amount equal to 12 sec. of Rejuvenation or 18 sec. of Regrowth."
		);
$i++;


//Natural Perfection - Restoration 
$rank[$i]= array(
"Your critical strike chance with all spells is increased by 1% and critical strikes against you give you the Natural Perfection effect reducing all damage taken by 2%.  Stacks up to 3 times.  Lasts 8 sec.",
"Your critical strike chance with all spells is increased by 2% and critical strikes against you give you the Natural Perfection effect reducing all damage taken by 3%.  Stacks up to 3 times.  Lasts 8 sec.",
"Your critical strike chance with all spells is increased by 3% and critical strikes against you give you the Natural Perfection effect reducing all damage taken by 4%.  Stacks up to 3 times.  Lasts 8 sec."
		);
$i++;

//Empowered Rejuvenation - Restoration 
$rank[$i]= array(
"The bonus healing effects of your healing over time spells is increased by 4%.",
"The bonus healing effects of your healing over time spells is increased by 8%.",
"The bonus healing effects of your healing over time spells is increased by 12%.",
"The bonus healing effects of your healing over time spells is increased by 16%.",
"The bonus healing effects of your healing over time spells is increased by 20%."
		);
$i++;

//Living Seed - Restoration
$rank[$i]= array(
"When you gain a critical effect from your Swiftmend, Regrowth, Nourish or Healing Touch spell you have a 33% chance to plant a Living Seed on the target for 30% of the amount healed. The Living Seed will bloom when the target is next attacked. Lasts 15 sec.",
"When you gain a critical effect from your Swiftmend, Regrowth, Nourish or Healing Touch spell you have a 66% chance to plant a Living Seed on the target for 30% of the amount healed. The Living Seed will bloom when the target is next attacked. Lasts 15 sec.",
"When you gain a critical effect from your Swiftmend, Regrowth, Nourish or Healing Touch spell you have a 100% chance to plant a Living Seed on the target for 30% of the amount healed. The Living Seed will bloom when the target is next attacked. Lasts 15 sec."
		);
$i++;

//REPLENISH - Restoration 
$rank[$i]= array(
"Your Rejuvenation spell has a 5% chance to restore 8 Energy, 4 Rage, 1% Mana or 16 Runic Power per tick.",
"Your Rejuvenation spell has a 10% chance to restore 8 Energy, 4 Rage, 1% Mana or 16 Runic Power per tick.",
"Your Rejuvenation spell has a 15% chance to restore 8 Energy, 4 Rage, 1% Mana or 16 Runic Power per tick."
		);
$i++;

//Tree of Life - Restoration 
$rank[$i]= array(
		"<span>978 Mana</span><br><span>Instant cast</span><br>Shapeshift into the Tree of Life. While in this form you increase healing received by 6% for all party and raid members within 45 yards, and you can only cast Restoration, Innervate and Barkskin spells, but the mana cost of your healing over time spells is reduced by 20%.<br><br>The act of shapeshifting frees the caster of Polymorph and Movement Impairing effects."
		);
$i++;

//IMPROVED TREE OF LIFE - Restoration 
$rank[$i]= array(
"Increases your armor contribution from items while in Tree of Life Form by 33%, and increases your healing spell power by 5% of your spirit while in Tree of Life Form.",
"Increases your armor contribution from items while in Tree of Life Form by 66%, and increases your healing spell power by 10% of your spirit while in Tree of Life Form.",
"Increases your armor contribution from items while in Tree of Life Form by 100%, and increases your healing spell power by 15% of your spirit while in Tree of Life Form."
		);
$i++;

//GIFT OF THE EARTHMOTHER - Restoration 
$rank[$i]= array(
"Reduces the base global cooldown of your Rejuvenation, Lifebloom and Wild Growth spells by 4%.",
"Reduces the base global cooldown of your Rejuvenation, Lifebloom and Wild Growth spells by 8%.",
"Reduces the base global cooldown of your Rejuvenation, Lifebloom and Wild Growth spells by 12%.",
"Reduces the base global cooldown of your Rejuvenation, Lifebloom and Wild Growth spells by 16%.",
"Reduces the base global cooldown of your Rejuvenation, Lifebloom and Wild Growth spells by 20%."
		);
$i++;

//Wild Growth - Restoration 
$rank[$i]= array(
		"<span style=text-align:left;float:left;>908 Mana</span><span style=text-align:right;float:right;>40 yd range</span><br><span style=text-align:left;float:left;>Instant cast</span><span style=text-align:right;float:right;>6 sec cooldown</span><br>Heals up to 5 friendly party or raid members within 15 yards of the target for 686 over 7 sec. The amount healed is applied quickly at first, and slows down as the Wild Growth reaches its full duration."
		);
$i++;
	
//Restoration Talents End^^


?>
