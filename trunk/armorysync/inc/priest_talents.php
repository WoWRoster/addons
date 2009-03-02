<?php
$i = 0;
$t = 0;

$className = "Priest Talents - Wrath of the Lich King Beta Talents";
$talentPath = "/info/basics/talents/";

$tree[$i] = "Discipline"; $i++;
$tree[$i] = "Holy"; $i++;
$tree[$i] = "Shadow"; $i++;

$i = 0;

$talent[$i] = array(0, "Unbreakable Will", 5, 2, 1); $i++;
$talent[$i] = array(0, "Twin Disciplines", 5, 3, 1); $i++;
$talent[$i] = array(0, "Silent Resolve", 3, 1, 2); $i++;
$talent[$i] = array(0, "Improved Inner Fire", 3, 2, 2); $i++;
$talent[$i] = array(0, "Improved Power Word: Fortitude", 2, 3, 2); $i++;
$talent[$i] = array(0, "Martyrdom", 2, 4, 2); $i++; 
$talent[$i] = array(0, "Improved Power Word: Shield", 3, 1, 3); $i++;
$talent[$i] = array(0, "Inner Focus", 1, 2, 3); $i++;
$talent[$i] = array(0, "Meditation", 3, 3, 3); $i++;
$talent[$i] = array(0, "Absolution", 3, 1, 4); $i++;
$talent[$i] = array(0, "Mental Agility", 5, 2, 4); $i++;
$talent[$i] = array(0, "Improved Mana Burn", 2, 4, 4); $i++;
$talent[$i] = array(0, "Mental Strength", 5, 2, 5); $i++;
$talent[$i] = array(0, "Divine Spirit", 1, 3, 5); $i++;
$talent[$i] = array(0, "Improved Divine Spirit", 2, 4, 5); $i++;
$talent[$i] = array(0, "Focused Power", 2, 1, 6); $i++;
$talent[$i] = array(0, "Enlightenment", 5, 3, 6); $i++;
$talent[$i] = array(0, "Focused Will", 3, 1, 7); $i++;
$talent[$i] = array(0, "Power Infusion", 1, 2, 7); $i++;
$talent[$i] = array(0, "Reflective Shield", 3, 3, 7); $i++;
$talent[$i] = array(0, "Renewed Hope", 2, 1, 8); $i++;
$talent[$i] = array(0, "Rapture", 5, 2, 8); $i++;
$talent[$i] = array(0, "Aspiration", 2, 3, 8); $i++;
$talent[$i] = array(0, "Divine Aegis", 3, 1, 9); $i++;
$talent[$i] = array(0, "Pain Suppression", 1, 2, 9); $i++;
$talent[$i] = array(0, "Grace", 2, 3, 9); $i++;
$talent[$i] = array(0, "Borrowed Time", 5, 2, 10); $i++;
$talent[$i] = array(0, "Penance", 1, 2, 11); $i++;
$treeStartStop[$t] = $i -1;
$t++;

//holy talents
$talent[$i] = array(1, "Healing Focus", 2, 1, 1); $i++;
$talent[$i] = array(1, "Improved Renew", 3, 2, 1); $i++;
$talent[$i] = array(1, "Holy Specialization", 5, 3, 1); $i++;
$talent[$i] = array(1, "Spell Warding", 5, 2, 2); $i++;
$talent[$i] = array(1, "Divine Fury", 5, 3, 2); $i++;
$talent[$i] = array(1, "Desperate Prayer", 1, 1, 3); $i++;
$talent[$i] = array(1, "Blessed Recovery", 3, 2, 3); $i++;
$talent[$i] = array(1, "Inspiration", 3, 4, 3); $i++;
$talent[$i] = array(1, "Holy Reach", 2, 1, 4); $i++;
$talent[$i] = array(1, "Improved Healing", 3, 2, 4); $i++;
$talent[$i] = array(1, "Searing Light", 2, 3, 4); $i++;
$talent[$i] = array(1, "Healing Prayers", 2, 1, 5); $i++;
$talent[$i] = array(1, "Spirit of Redemption", 1, 2, 5); $i++;
$talent[$i] = array(1, "Spiritual Guidance", 5, 3, 5); $i++;
$talent[$i] = array(1, "Surge of Light", 2, 1, 6); $i++; 
$talent[$i] = array(1, "Spiritual Healing", 5, 3, 6); $i++;
$talent[$i] = array(1, "Holy Concentration", 3, 1, 7); $i++; 
$talent[$i] = array(1, "Lightwell", 1, 2, 7); $i++;
$talent[$i] = array(1, "Blessed Resilience", 3, 3, 7); $i++;
$talent[$i] = array(1, "Empowered Healing", 5, 2, 8); $i++;
$talent[$i] = array(1, "Serendipity", 3, 3, 8); $i++;
$talent[$i] = array(1, "Improved Holy Concentration", 3, 1, 9); $i++;
$talent[$i] = array(1, "Circle of Healing", 1, 2, 9); $i++;
$talent[$i] = array(1, "Test of Faith", 3, 3, 9); $i++; 
$talent[$i] = array(1, "Divine Providence", 5, 2, 10); $i++; 
$talent[$i] = array(1, "Guardian Spirit", 1, 2, 11); $i++; 
$treeStartStop[$t] = $i -1;
$t++;

//shadow talents
$talent[$i] = array(2, "Spirit Tap", 3, 1, 1); $i++;
$talent[$i] = array(2, "Improved Spirit Tap", 2, 2, 1); $i++;
$talent[$i] = array(2, "Blackout", 5, 3, 1); $i++;
$talent[$i] = array(2, "Shadow Affinity", 3, 1, 2); $i++;
$talent[$i] = array(2, "Improved Shadow Word: Pain", 2, 2, 2); $i++;
$talent[$i] = array(2, "Shadow Focus", 3, 3, 2); $i++;
$talent[$i] = array(2, "Improved Psychic Scream", 2, 1, 3); $i++;
$talent[$i] = array(2, "Improved Mind Blast", 5, 2, 3); $i++;
$talent[$i] = array(2, "Mind Flay", 1, 3, 3); $i++;
$talent[$i] = array(2, "Veiled Shadows", 2, 2, 4); $i++;
$talent[$i] = array(2, "Shadow Reach", 2, 3, 4); $i++;
$talent[$i] = array(2, "Shadow Weaving", 3, 4, 4); $i++;
$talent[$i] = array(2, "Silence", 1, 1, 5); $i++;
$talent[$i] = array(2, "Vampiric Embrace", 1, 2, 5); $i++;
$talent[$i] = array(2, "Improved Vampiric Embrace", 2, 3, 5); $i++;
$talent[$i] = array(2, "Focused Mind", 3, 4, 5); $i++; 
$talent[$i] = array(2, "Mind Melt", 2, 1, 6); $i++;
$talent[$i] = array(2, "Darkness", 5, 3, 6); $i++;
$talent[$i] = array(2, "Shadowform", 1, 2, 7); $i++;
$talent[$i] = array(2, "Shadow Power", 5, 3, 7); $i++;
$talent[$i] = array(2, "Improved Shadowform", 2, 1, 8); $i++;
$talent[$i] = array(2, "Misery", 3, 3, 8); $i++; 
$talent[$i] = array(2, "Psychic Horror", 2, 1, 9); $i++;
$talent[$i] = array(2, "Vampiric Touch", 1, 2, 9); $i++; 
$talent[$i] = array(2, "Pain and Suffering", 3, 3, 9); $i++;
$talent[$i] = array(2, "Twisted Faith", 5, 3, 10); $i++;
$talent[$i] = array(2, "Dispersion", 1, 2, 11); $i++; 
$treeStartStop[$t] = $i -1;
$t++;

$i = 0;


//Discipline Talents Begin


//Unbreakable Will - Discipline
$rank[$i] = array(
		"Reduces the duration of Stun, Fear, and Silence effects done to you by an additional 3%.",
		"Reduces the duration of Stun, Fear, and Silence effects done to you by an additional 6%.",
		"Reduces the duration of Stun, Fear, and Silence effects done to you by an additional 9%.",
		"Reduces the duration of Stun, Fear, and Silence effects done to you by an additional 12%.",
		"Reduces the duration of Stun, Fear, and Silence effects done to you by an additional 15%."
		);
$i++;


	
//Twin Disciplines - Discipline
$rank[$i] = array(
"Increases the damage and healing done by your instant spells by 1%.",
"Increases the damage and healing done by your instant spells by 2%.",
"Increases the damage and healing done by your instant spells by 3%.",
"Increases the damage and healing done by your instant spells by 4%.",
"Increases the damage and healing done by your instant spells by 5%."
		);
$i++;
				
		
//Silent Resolve - Discipline
$rank[$i] = array(
		"Reduces the threat generated by your Holy and Discipline spells by 7% and reduces the chance your spells will be dispelled by 10%.",
		"Reduces the threat generated by your Holy and Discipline spells by 14% and reduces the chance your spells will be dispelled by 20%.",
		"Reduces the threat generated by your Holy and Discipline spells by 20% and reduces the chance your spells will be dispelled by 30%.",
		);

$i++;	

//Improved Inner Fire - Discipline		
$rank[$i] = array(
		"Increases the effect of your Inner Fire spell by 15%, and increases the total number of charges by 4.",
		"Increases the effect of your Inner Fire spell by 30%, and increases the total number of charges by 8.",
		"Increases the effect of your Inner Fire spell by 45%, and increases the total number of charges by 12."
		);

$i++;

//Improved Power Word: Fortitude - Discipline		
$rank[$i] = array(
		"Increases the effect of your Power Word: Fortitude and Prayer of Fortitude spells by 15%.",
		"Increases the effect of your Power Word: Fortitude and Prayer of Fortitude spells by 30%."
		);

$i++;	

		

		

		
//Martyrdom - Discipline		
$rank[$i] = array(
"Gives you a 50% chance to gain the Focused Casting effect that lasts for 6 sec after being the victim of a melee or ranged critical strike. The Focused Casting effect reduces the pushback suffered from damaging attacks while casting Priest spells and decreases the duration of Interrupt effects by 10%.",
"Gives you a 100% chance to gain the Focused Casting effect that lasts for 6 sec after being the victim of a melee or ranged critical strike. The Focused Casting effect reduces the pushback suffered from damaging attacks while casting Priest spells and decreases the duration of Interrupt effects by 20%."
		);

$i++;		





//Improved Power Word: Shield - Discipline		
$rank[$i] = array(
		"Increases the damage absorbed by your Power Word: Shield by 5%.",
"Increases the damage absorbed by your Power Word: Shield by 10%.",
"Increases the damage absorbed by your Power Word: Shield by 15%."
		);

$i++;



//Inner Focus - Discipline		
$rank[$i] = array(
		"<span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>3 min cooldown</span><br>When activated, reduces the Mana cost of your next spell by 100% and increases its critical effect chance by 25% if it is capable of a critical effect."
		);

$i++;		


//Meditation - Discipline
$rank[$i] = array(
		"Allows 10% of your Mana regeneration to continue while casting.",
		"Allows 20% of your Mana regeneration to continue while casting.",
		"Allows 30% of your Mana regeneration to continue while casting.",
		);

$i++;	




//Absolution - Discipline 3
$rank[$i] = array(
		"Reduces the mana cost of your Dispel Magic, Cure Disease, Abolish Disease and Mass Dispel spells by 5%.",
		"Reduces the mana cost of your Dispel Magic, Cure Disease, Abolish Disease and Mass Dispel spells by 10%.",
		"Reduces the mana cost of your Dispel Magic, Cure Disease, Abolish Disease and Mass Dispel spells by 15%."				
		);

$i++;	


//Mental Agility - Discipline		
$rank[$i] = array( 
		"Reduces the mana cost of your instant cast spells by 2%.",
		"Reduces the mana cost of your instant cast spells by 4%.",
		"Reduces the mana cost of your instant cast spells by 6%.",
		"Reduces the mana cost of your instant cast spells by 8%.",
		"Reduces the mana cost of your instant cast spells by 10%."
		);

$i++;		

//Improved Mana Burn - Discipline		
$rank[$i] = array(
		"Reduces the casting time of your Mana Burn spell by 0.5 sec.",
		"Reduces the casting time of your Mana Burn spell by 1.0 sec."
		);

$i++;		


//Mental Strength - Discipline		
$rank[$i] = array(
		"Increases your total Intellect by 3%.",
		"Increases your total Intellect by 6%.",
		"Increases your total Intellect by 9%.",
		"Increases your total Intellect by 12%.",
		"Increases your total Intellect by 15%."
		);

$i++;		


	
//Divine Spirit - Discipline				
$rank[$i] = array(
			"<span style=text-align:left;float:left;>3013 Mana</span><span style=text-align:right;float:right;>30 yd range</span><br>Instant cast<br>Holy power infuses the target, increasing their Spirit by 17 for 30 min.<br><br>\
			&nbsp;Trainable Ranks Listed Below:<br>\
			&nbsp;Rank 2: 23 Spirit<br>\
			&nbsp;Rank 3: 33 Spirit<br>\
			&nbsp;Rank 4: 40 Spirit<br>\
			&nbsp;Rank 5: 50 Spirit<br>\
			&nbsp;Rank 6: 80 Spirit<br>"
		);

$i++;		

//Improved Divine Spirit - Discipline				
$rank[$i] = array(
"Your Divine Spirit and Prayer of Spirit spells also increase the target\'s spell damage by an amount equal to 50% of the Spirit granted.",
"Your Divine Spirit and Prayer of Spirit spells also increase the target\'s spell damage by an amount equal to 100% of the Spirit granted."
		);

$i++;		
		
//Focused Power - Discipline 				
$rank[$i] = array(
"Increases damage and healing done by your spells by 2%. In addition, your Mass Dispel cast time is reduced by 0.5 sec.",
"Increases damage and healing done by your spells by 4%. In addition, your Mass Dispel cast time is reduced by 1 sec."			
		);

$i++;				


//Enlightenment - Discipline		
$rank[$i] = array(
"Increases your total Stamina and Spirit by 1% and increases your spell haste by 1%.",
"Increases your total Stamina and Spirit by 2% and increases your spell haste by 2%.",
"Increases your total Stamina and Spirit by 3% and increases your spell haste by 3%.",
"Increases your total Stamina and Spirit by 4% and increases your spell haste by 4%.",
"Increases your total Stamina and Spirit by 5% and increases your spell haste by 5%."
		);

$i++;		


//Focused Will - Discipline		
$rank[$i] = array(
		"After taking a critical hit you gain the Focused Will effect, reducing all damage taken by 2% and increasing healing effects on you by 3%.  Stacks up to 3 times.  Lasts 8 sec.",
		"After taking a critical hit you gain the Focused Will effect, reducing all damage taken by 3% and increasing healing effects on you by 4%.  Stacks up to 3 times.  Lasts 8 sec.",
		"After taking a critical hit you gain the Focused Will effect, reducing all damage taken by 4% and increasing healing effects on you by 5%.  Stacks up to 3 times.  Lasts 8 sec.",
		);

$i++;		


//Power Infusion - Discipline				
$rank[$i] = array(
			"<span style=text-align:left;float:left;>419 Mana</span><span style=text-align:right;float:right;>30 yd range</span><br><span style=text-align:left;float:left;>Instant cast</span><span style=text-align:right;float:right;>2 min cooldown</span><br>Infuses the target with power, increasing spell casting speed by 20% and reducing the mana cost of all spells by 20%. Lasts 15 sec."
		);
$i++;			
		
//Reflective Shield - Discipline		
$rank[$i] = array(
		"Causes 15% of the damage absorbed by your Power Word: Shield to reflect back at the attacker. This damage causes no threat.",
		"Causes 30% of the damage absorbed by your Power Word: Shield to reflect back at the attacker. This damage causes no threat.",
		"Causes 45% of the damage absorbed by your Power Word: Shield to reflect back at the attacker. This damage causes no threat."								
		);

$i++;

//Renewed Hope - Discipline		
$rank[$i] = array(
"Increases the critical effect chance of your Flash Heal, Greater Heal and Penance spells by 2% on targets afflicted by the Weakened Soul effect.",
"Increases the critical effect chance of your Flash Heal, Greater Heal and Penance spells by 4% on targets afflicted by the Weakened Soul effect."								
		);

$i++;

	

//Rapture - Discipline 	
$rank[$i] = array(
"Causes you to gain mana equal to 0.5% of your maximum mana each time you heal with Greater Heal, Flash Heal and Penance, or damage is absorbed by your Power Word: Shield or Divine Aegis. Increasing the amount healed or absorbed increases the mana gained.",
"Causes you to gain mana equal to 1.0% of your maximum mana each time you heal with Greater Heal, Flash Heal and Penance, or damage is absorbed by your Power Word: Shield or Divine Aegis. Increasing the amount healed or absorbed increases the mana gained.",
"Causes you to gain mana equal to 1.5% of your maximum mana each time you heal with Greater Heal, Flash Heal and Penance, or damage is absorbed by your Power Word: Shield or Divine Aegis. Increasing the amount healed or absorbed increases the mana gained.",
"Causes you to gain mana equal to 2.0% of your maximum mana each time you heal with Greater Heal, Flash Heal and Penance, or damage is absorbed by your Power Word: Shield or Divine Aegis. Increasing the amount healed or absorbed increases the mana gained.",
"Causes you to gain mana equal to 2.5% of your maximum mana each time you heal with Greater Heal, Flash Heal and Penance, or damage is absorbed by your Power Word: Shield or Divine Aegis. Increasing the amount healed or absorbed increases the mana gained."
		);
$i++;

//Aspiration - Discipline 	
$rank[$i] = array(
"Reduces the cooldown of your Inner Focus, Power Infusion, Pain Suppression and Penance spells by 10%.",
"Reduces the cooldown of your Inner Focus, Power Infusion, Pain Suppression and Penance spells by 20%."
		);

$i++;

//Divine Aegis - Discipline 	
$rank[$i] = array(
"Critical heals create a protective shield on the target, absorbing 10% of the amount healed. Lasts 12 sec.",
"Critical heals create a protective shield on the target, absorbing 20% of the amount healed. Lasts 12 sec.",
"Critical heals create a protective shield on the target, absorbing 30% of the amount healed. Lasts 12 sec."
		);
$i++;



//Pain Suppression - Discipline				
$rank[$i] = array(
			"<span style=text-align:left;float:left;>209 Mana</span><span style=text-align:right;float:right;>40 yd range</span><br><span style=text-align:left;float:left;>Instant cast</span><span style=text-align:right;float:right;>3 min cooldown</span><br>Instantly reduces a friendly target\'s threat by 5%, reduces all damage taken by 40% and increases resistance to Dispel mechanics by 65% for 8 sec."
		);
$i++;			
	
	
//Grace - Discipline 	
$rank[$i] = array(
"Your Flash Heal, Greater Heal, and Penance spells have a 50% chance to bless the target with Grace, reducing damage done to the target by 1% and increases all healing received from the Priest by 2%. This effect will stack up to 3 times. Effect lasts 8 sec.",
"Your Flash Heal, Greater Heal, and Penance spells have a 100% chance to bless the target with Grace, reducing damage done to the target by 1% and increases all healing received from the Priest by 2%. This effect will stack up to 3 times. Effect lasts 8 sec."
		);
$i++;	

//Borrowed Time - Discipline 	
$rank[$i] = array(
"Grants 5% spell haste for your next spell after casting Power Word: Shield, and increases the amount absorbed by your Power Word: Shield equal to 8% of your spell power.",
"Grants 10% spell haste for your next spell after casting Power Word: Shield, and increases the amount absorbed by your Power Word: Shield equal to 16% of your spell power.",
"Grants 15% spell haste for your next spell after casting Power Word: Shield, and increases the amount absorbed by your Power Word: Shield equal to 24% of your spell power.",
"Grants 20% spell haste for your next spell after casting Power Word: Shield, and increases the amount absorbed by your Power Word: Shield equal to 32% of your spell power.",
"Grants 25% spell haste for your next spell after casting Power Word: Shield, and increases the amount absorbed by your Power Word: Shield equal to 40% of your spell power."
		);
$i++;


//Penance - Discipline
$rank[$i]= array(
			"<span style=text-align:right;float:right;>Enemy: 30 yd range</span><br><span style=text-align:left;float:left;>618 Mana</span><span style=text-align:right;float:right;>Friendly: 40 yd range</span><br><span style=text-align:left;float:left;>Channeled</span><span style=text-align:right;float:right;>10 sec cooldown</span><br>Launches a volley of holy light at the target, causing 184 Holy damage to an enemy, or 670 to 756 healing to an ally every 1 sec for 2 sec."
		);

$i++;
	
//HOLY SPELLS------------------------------------------------------------------------------	
//Healing Focus - Holy
	
$rank[$i] = array(
			"Reduces the pushback suffered from damaging attacks while casting any healing spell by 35%.",
			"Reduces the pushback suffered from damaging attacks while casting any healing spell by 70%."
		);		

$i++;				
		
		
//Improved Renew - Holy 
	
$rank[$i] = array(
			"Increases the amount healed by your Renew spell by 5%.",
			"Increases the amount healed by your Renew spell by 10%.",
			"Increases the amount healed by your Renew spell by 15%."
		);		

$i++;		
		
//Holy Specialization - Holy

$rank[$i] = array(
			"Increases the critical effect chance of your Holy spells by 1%.",
			"Increases the critical effect chance of your Holy spells by 2%.",
			"Increases the critical effect chance of your Holy spells by 3%.",
			"Increases the critical effect chance of your Holy spells by 4%.",
			"Increases the critical effect chance of your Holy spells by 5%."
		);

$i++;		


//Spell Warding - Holy
		
$rank[$i] = array(
			"Reduces all spell damage taken by 2%.",
			"Reduces all spell damage taken by 4%.",
			"Reduces all spell damage taken by 6%.",
			"Reduces all spell damage taken by 8%.",
			"Reduces all spell damage taken by 10%."
		);

$i++;	


//Divine Fury - Holy

$rank[$i] = array(
			"Reduces the casting time of your Smite, Holy Fire, Heal and Greater Heal spells by 0.1 sec.",
			"Reduces the casting time of your Smite, Holy Fire, Heal and Greater Heal spells by 0.2 sec.",
			"Reduces the casting time of your Smite, Holy Fire, Heal and Greater Heal spells by 0.3 sec.",
			"Reduces the casting time of your Smite, Holy Fire, Heal and Greater Heal spells by 0.4 sec.",
			"Reduces the casting time of your Smite, Holy Fire, Heal and Greater Heal spells by 0.5 sec."
		);

$i++;

//Desperate Prayer - Discipline
$rank[$i]= array(
			"<span style=text-align:left;float:left;>888 Mana</span><br/><span style=text-align:left;float:left;>Instant cast</span><span style=text-align:right;float:right;>2 min cooldown</span><br>Instantly heals the caster for 263 to 325.<br>\
			&nbsp;Trainable Ranks Listed Below:<br><br>\
			&nbsp;Rank 2: 447 to 543<br>\
			&nbsp;Rank 3: 588 to 708<br>\
			&nbsp;Rank 4: 872 to 1033<br>\
			&nbsp;Rank 5: 1101 to 1305<br>\
			&nbsp;Rank 6: 1324 to 1562<br>\
			&nbsp;Rank 7: 1601 to 1887<br>\
			&nbsp;Rank 8: 3111 to 3669<br>\
			&nbsp;Rank 9: 3716 to 4384<br>\
		    "
);

$i++;


//Blessed Recovery - Holy	
		
$rank[$i] = array(
"After being struck by a melee or ranged critical hit, heal 5% of the damage taken over 6 sec. Additional critical hits taken during the effect increases the healing received.",
"After being struck by a melee or ranged critical hit, heal 10% of the damage taken over 6 sec. Additional critical hits taken during the effect increases the healing received",
"After being struck by a melee or ranged critical hit, heal 15% of the damage taken over 6 sec. Additional critical hits taken during the effect increases the healing received"
		);

$i++;	

//Inspiration - Holy 
		
$rank[$i] = array(
			"Increases your target\'s armor by 8% for 15 sec after getting a critical effect from your Flash Heal, Heal, Greater Heal, Binding Heal, Penance, Prayer of Healing, or Circle of Healing spell.",
			"Increases your target\'s armor by 16% for 15 sec after getting a critical effect from your Flash Heal, Heal, Greater Heal, Binding Heal, Penance, Prayer of Healing, or Circle of Healing spell.",
			"Increases your target\'s armor by 25% for 15 sec after getting a critical effect from your Flash Heal, Heal, Greater Heal, Binding Heal, Penance, Prayer of Healing, or Circle of Healing spell."
		);

$i++;		





//Holy Reach - Holy 
$rank[$i] = array(
"Increases the range of your Smite and Holy Fire spells and the radius of your Prayer of Healing, Holy Nova, Divine Hymm and Circle of Healing spells by 10%.",
"Increases the range of your Smite and Holy Fire spells and the radius of your Prayer of Healing, Holy Nova, Divine Hymm and Circle of Healing spells by 20%."
		);

$i++;		

//Improved Healing - Holy

$rank[$i] = array(
			"Reduces the Mana cost of your Lesser Heal, Heal, Greater Heal, Divine Hymn and Penance spells by 5%.",
			"Reduces the Mana cost of your Lesser Heal, Heal, Greater Heal, Divine Hymn and Penance spells by 10%.",
			"Reduces the Mana cost of your Lesser Heal, Heal, Greater Heal, Divine Hymn and Penance spells by 15%."
		);

$i++;		

//Searing Light - Holy

$rank[$i] = array(
			"Increases the damage of your Smite, Holy Fire, Holy Nova and Penance spells by 5%.",
			"Increases the damage of your Smite, Holy Fire, Holy Nova and Penance spells by 10%."
		);

$i++;		




//Healing Prayers - Holy	
		
$rank[$i] = array(
			"Reduces the Mana cost of your Prayer of Healing and Prayer of Mending spells by 10%.",
			"Reduces the Mana cost of your Prayer of Healing and Prayer of Mending spells by 20%."
		);

$i++;

//Spirit of Redemption - Holy
		
$rank[$i] = array(
			"Increases total Spirit by 5% and upon death, the priest becomes the Spirit of Redemption for 15 sec.  The Spirit of Redemption cannot move, attack, be attacked or targeted by any spells or effects.  While in this form, the priest can cast any healing spell free of cost.  When the effect ends, the priest dies."
		);

$i++;		




//Spiritual Guidance - Holy
		
$rank[$i] = array(
			"Increases spell damage and healing by up to 5% of your total Spirit.",
			"Increases spell damage and healing by up to 10% of your total Spirit.",
			"Increases spell damage and healing by up to 15% of your total Spirit.",
			"Increases spell damage and healing by up to 20% of your total Spirit.",
			"Increases spell damage and healing by up to 25% of your total Spirit."
		);

$i++;

//Surge of Light - Holy
$rank[$i]= array(
			"Your spell criticals have a 25% chance to cause your next Smite or Flash Heal spell to be instant cast, cost no mana but be incapable of a critical hit. This effect lasts 10 sec.",
			"Your spell criticals have a 50% chance to cause your next Smite or Flash Heal spell to be instant cast, cost no mana but be incapable of a critical hit. This effect lasts 10 sec."
			);
$i++;	

//Spiritual Healing - Holy

$rank[$i] = array(
			"Increases the amount healed by your healing spells by 2%.",
			"Increases the amount healed by your healing spells by 4%.",
			"Increases the amount healed by your healing spells by 6%.",
			"Increases the amount healed by your healing spells by 8%.",
			"Increases the amount healed by your healing spells by 10%."
		);		

$i++;

//Holy Concentration - Holy
$rank[$i] = array(
"Gives you a 10% chance to enter a Clearcasting state after casting any critical Flash Heal, Binding Heal, or Greater Heal spell.  The Clearcasting state reduces the mana cost of your next Flash Heal, Binding Heal, or Greater Heal spell by 100%.",
"Gives you a 20% chance to enter a Clearcasting state after casting any critical Flash Heal, Binding Heal, or Greater Heal spell.  The Clearcasting state reduces the mana cost of your next Flash Heal, Binding Heal, or Greater Heal spell by 100%.",
"Gives you a 30% chance to enter a Clearcasting state after casting any critical Flash Heal, Binding Heal, or Greater Heal spell.  The Clearcasting state reduces the mana cost of your next Flash Heal, Binding Heal, or Greater Heal spell by 100%."			
		);		

$i++;	


//Lightwell - Holy

$rank[$i] = array(
			"<span style=text-align:left;float:left;>733 Mana</span><span style=text-align:right;float:right;>40 yd range</span><br><span style=text-align:left;float:left;>0.5 sec cast</span><span style=text-align:right;float:right;>3 min cooldown</span><br>Creates a Holy Lightwell.  Members of your raid or party can click the Lightwell to restore 801 health over 6 sec. Attacks done to you equal to 30% of your total health will cancel the effect. Lightwell lasts for 3 min or 10 charges.<br><br>\
			&nbsp;Trainable Ranks Listed Below:<br>\
			&nbsp;Rank 2: 295 Mana, 1164 Health<br>\
			&nbsp;Rank 3: 365 Mana, 1599 Health<br>\
			&nbsp;Rank 4: 445 Mana, 2361 Health<br>\
			&nbsp;Rank 5: 656 Mana, 3915 Health<br>\
			&nbsp;Rank 6: 656 Mana, 4620 Health"

		);		

$i++;	

//Blessed Resilience - Holy
$rank[$i] = array(
			"Critical hits made against you have a 20% chance to prevent you from being critically hit again for 6 sec.",
			"Critical hits made against you have a 40% chance to prevent you from being critically hit again for 6 sec.",
			"Critical hits made against you have a 60% chance to prevent you from being critically hit again for 6 sec."						
		);

$i++;		

//Empowered Healing - Holy
$rank[$i]= array(
"Your Greater Heal spell gains an additional 8% and your Flash Heal and Binding Heal gain an additional 4% of your bonus healing effects.",
"Your Greater Heal spell gains an additional 16% and your Flash Heal and Binding Heal gain an additional 8% of your bonus healing effects.",
"Your Greater Heal spell gains an additional 24% and your Flash Heal and Binding Heal gain an additional 12% of your bonus healing effects.",
"Your Greater Heal spell gains an additional 32% and your Flash Heal and Binding Heal gain an additional 16% of your bonus healing effects.",
"Your Greater Heal spell gains an additional 40% and your Flash Heal and Binding Heal gain an additional 20% of your bonus healing effects."												
			);
$i++;

//Serendipity - Holy
$rank[$i]= array(
"If your Greater Heal or Flash Heal spells heal your target over maximum health, you are instantly refunded 8% of the spell\'s mana cost.",
"If your Greater Heal or Flash Heal spells heal your target over maximum health, you are instantly refunded 17% of the spell\'s mana cost.",
"If your Greater Heal or Flash Heal spells heal your target over maximum health, you are instantly refunded 25% of the spell\'s mana cost."								
			);
$i++;

//Improved Holy Concentration - Holy
$rank[$i] = array(
"Increases the chance you\'ll enter Holy Concentration by 5%, and also increases your spell haste by 10% for the next 2 Greater Heal, Flash Heal or Binding Heal spells after you gain Holy Concentration. Lasts 20 sec.",
"Increases the chance you\'ll enter Holy Concentration by 10%, and also increases your spell haste by 20% for the next 2 Greater Heal, Flash Heal or Binding Heal spells after you gain Holy Concentration. Lasts 20 sec.",
"Increases the chance you\'ll enter Holy Concentration by 15%, and also increases your spell haste by 30% for the next 2 Greater Heal, Flash Heal or Binding Heal spells after you gain Holy Concentration. Lasts 20 sec."
		);

$i++;
		
//Circle of Healing - Holy 
$rank[$i]= array(
			"<span style=text-align:left;float:left;>927 Mana</span><span style=text-align:right;float:right;>40 yd range</span><br><span style=text-align:left;float:left;>Instant cast</span><span style=text-align:right;float:right;>6 sec cooldown</span><br>Heals up to 5 friendly party or raid members within 15 yards of the target for 250 to 274.<br><br>\
			&nbsp;Trainable Ranks Listed Below:<br>\
			&nbsp;Rank 2: 425 Mana, 292 to 323 Healing<br>\
			&nbsp;Rank 3: 460 Mana, 332 to 367 Healing<br>\
			&nbsp;Rank 4: 505 Mana, 376 to 415 Healing<br>\
			&nbsp;Rank 5: 550 Mana, 416 to 459 Healing<br>\
			&nbsp;Rank 6: 760 Mana, 597 to 659 Healing<br>\
			&nbsp;Rank 7: 890 Mana, 684 to 756 Healing<br>\
			"
			);
$i++;

//Test of Faith - Holy
$rank[$i] = array(
"Increases healing by 2% and spell critical effect chance by 2% on friendly targets at or below 50% health.",
"Increases healing by 4% and spell critical effect chance by 4% on friendly targets at or below 50% health.",
"Increases healing by 6% and spell critical effect chance by 6% on friendly targets at or below 50% health."
		);

$i++;

//Divine Providence - Holy
$rank[$i] = array(
"Increases the amount healed by Circle of Healing, Binding Heal, Holy Nova, Prayer of Healing, Divine Hymn and Prayer of Mending by 2% and reduces the cooldown of your Prayer of Mending by 6%.",
"Increases the amount healed by Circle of Healing, Binding Heal, Holy Nova, Prayer of Healing, Divine Hymn and Prayer of Mending by 4% and reduces the cooldown of your Prayer of Mending by 12%.",
"Increases the amount healed by Circle of Healing, Binding Heal, Holy Nova, Prayer of Healing, Divine Hymn and Prayer of Mending by 6% and reduces the cooldown of your Prayer of Mending by 18%.",
"Increases the amount healed by Circle of Healing, Binding Heal, Holy Nova, Prayer of Healing, Divine Hymn and Prayer of Mending by 8% and reduces the cooldown of your Prayer of Mending by 24%.",
"Increases the amount healed by Circle of Healing, Binding Heal, Holy Nova, Prayer of Healing, Divine Hymn and Prayer of Mending by 10% and reduces the cooldown of your Prayer of Mending by 30%."
		);		

$i++;

//Guardian Spirit - Discipline				
$rank[$i] = array(
			"<span style=text-align:left;float:left;>231 Mana</span><span style=text-align:right;float:right;>40 yd range</span><br><span style=text-align:left;float:left;>Instant cast</span><span style=text-align:right;float:right;>3 min cooldown</span><br>Calls upon a guardian spirit to watch over the friendly target. The spirit increases the healing received by the target by 40%, and also prevents the target from dying by sacrificing itself. This sacrifice terminates the effect but heals the target of 50% of their maximum health. Lasts 10 sec."
		);

$i++;
	
//SHADOW TALENTS---------------------------------------------------------------->	

//Spirit Tap - Shadow
$rank[$i]= array(
"Gives you a 33% chance to gain a 100% bonus to your Spirit after killing a target that yields experience or honor.  For the duration, your Mana will regenerate at a 50% rate while casting. Lasts 15 sec.",
"Gives you a 66% chance to gain a 100% bonus to your Spirit after killing a target that yields experience or honor.  For the duration, your Mana will regenerate at a 50% rate while casting. Lasts 15 sec.",
"Gives you a 100% chance to gain a 100% bonus to your Spirit after killing a target that yields experience or honor.  For the duration, your Mana will regenerate at a 50% rate while casting. Lasts 15 sec."
			);
$i++;

//Improved Spirit Tap - Shadow
$rank[$i]= array(
"Your Mind Blast and Shadow Word: Death critical strikes increase your total Spirit by 5%. For the duration, your mana will regenerate at a 10% rate while casting. Lasts 8 sec.",
"Your Mind Blast and Shadow Word: Death critical strikes increase your total Spirit by 10%. For the duration, your mana will regenerate at a 20% rate while casting. Lasts 8 sec."
			);
$i++;
			
//Blackout - Shadow
$rank[$i]= array(
			"Gives your Shadow damage spells a 2% chance to stun the target for 3 sec.",
			"Gives your Shadow damage spells a 4% chance to stun the target for 3 sec.",
			"Gives your Shadow damage spells a 6% chance to stun the target for 3 sec.",
			"Gives your Shadow damage spells a 8% chance to stun the target for 3 sec.",
			"Gives your Shadow damage spells a 10% chance to stun the target for 3 sec."
		);

$i++;		
		
//Shadow Affinity - Shadow
$rank[$i]= array(
			"Reduces the threat generated by your Shadow spells by 8%.",
			"Reduces the threat generated by your Shadow spells by 16%.",
			"Reduces the threat generated by your Shadow spells by 25%."
		);

$i++;		
		
//Improved Shadow Word: Pain - Shadow
$rank[$i]= array(
"Increases the damage of your Shadow Word: Pain spell by 3%.",
"Increases the damage of your Shadow Word: Pain spell by 6%."
		);

$i++;		
		
//Shadow Focus - Shadow
$rank[$i]= array(
"Increases your chance to hit with your Shadow spells by 1%, and reduces the mana cost of your Shadow spells by 2%.",
"Increases your chance to hit with your Shadow spells by 2%, and reduces the mana cost of your Shadow spells by 4%.",
"Increases your chance to hit with your Shadow spells by 3%, and reduces the mana cost of your Shadow spells by 6%."
		);

$i++;		
		
//Improved Psychic Scream - Shadow
$rank[$i]= array(
			"Reduces the cooldown of your Psychic Scream spell by 2 sec.",
			"Reduces the cooldown of your Psychic Scream spell by 4 sec."
		);

$i++;		
		
//Improved Mind Blast - Shadow
$rank[$i]= array(
			"Reduces the cooldown of your Mind Blast spell by 0.5 sec.",
			"Reduces the cooldown of your Mind Blast spell by 1 sec.",
			"Reduces the cooldown of your Mind Blast spell by 1.5 sec.",
			"Reduces the cooldown of your Mind Blast spell by 2 sec.",
			"Reduces the cooldown of your Mind Blast spell by 2.5 sec."
		);

$i++;		
		
//Mind Flay - Shadow
$rank[$i]= array(
			"<span style=text-align:left;float:left;>386 Mana</span><span style=text-align:right;float:right;>20 yd range</span><br>Channeled<br>Assault the target\'s mind with Shadow energy, causing 45 damage over 3 sec and slowing their movement speed by 50%.\
			<br><br>\
			&nbsp;Trainable Ranks Listed Below:<br>\
			&nbsp;Rank 2: 70 Mana, 126 Damage<br>\
			&nbsp;Rank 3: 100 Mana, 186 Damage<br>\
			&nbsp;Rank 4: 135 Mana, 261 Damage<br>\
			&nbsp;Rank 5: 165 Mana, 330 Damage<br>\
			&nbsp;Rank 6: 205 Mana, 426 Damage<br>\
			&nbsp;Rank 7: 230 Mana, 528 Damage"
		);

$i++;		
		
//Veiled Shadows - Shadow
$rank[$i]= array(
"Decreases the cooldown of your Fade ability by 3 sec, and reduces the cooldown of your Shadowfiend ability by 1 minute.",
"Decreases the cooldown of your Fade ability by 6 sec, and reduces the cooldown of your Shadowfiend ability by 2 minutes."
		);

$i++;		
		
//Shadow Reach - Shadow
$rank[$i]= array(
			"Increases the range of your offensive Shadow spells by 10%.",
			"Increases the range of your offensive Shadow spells by 20%."
		);

$i++;		
		
		
//Shadow Weaving - Shadow
$rank[$i]= array(
"Your Shadow damage spells have a 33% chance to increase the Shadow damage you deal by 2% for 15 sec. Stacks up to 5 times.",
"Your Shadow damage spells have a 66% chance to increase the Shadow damage you deal by 2% for 15 sec. Stacks up to 5 times.",
"Your Shadow damage spells have a 100% chance to increase the Shadow damage you deal by 2% for 15 sec. Stacks up to 5 times."
		);

$i++;				
		
//Silence - Shadow
$rank[$i]= array(
			"<span style=text-align:left;float:left;>225 Mana</span><span style=text-align:right;float:right;>20 yd range</span><br><span style=text-align:left;float:left;>Instant cast</span><span style=text-align:right;float:right;>45 sec cooldown</span><br>Silences the target, preventing them from casting spells for 5 sec."
		);

$i++;		
		

		
//Vampiric Embrace - Shadow
$rank[$i]= array(
			"<span style=text-align:left;float:left;>102 Mana</span><span style=text-align:right;float:right;>30 yd range</span><br><span style=text-align:left;float:left;>Instant cast</span><span style=text-align:right;float:right;>10 sec cooldown</span><br>Afflicts your target with Shadow energy that causes you to be healed by 15% and other party members to be healed for 3% of any Shadow spell damage you deal for 1 min."
		);

$i++;		


//Improved Vampiric Embrace - Shadow
$rank[$i]= array(
			"Increases the healing received from Vampiric Embrace by 33%.",
			"Increases the healing received from Vampiric Embrace by 67%."
		);

$i++;		
		
//Focused Mind - Shadow 
$rank[$i]= array(
			"Reduces the mana cost of your Mind Blast, Mind Control, Mind Flay and Mind Sear spells by 5%.",
			"Reduces the mana cost of your Mind Blast, Mind Control, Mind Flay and Mind Sear spells by 10%.",
			"Reduces the mana cost of your Mind Blast, Mind Control, Mind Flay and Mind Sear spells by 15%."
		);

$i++;				
		
//Mind Melt - Shadow
$rank[$i]= array(
"Increases the critical strike chance of your Mind Blast, Mind Flay, and Mind Sear spells by 2%.",
"Increases the critical strike chance of your Mind Blast, Mind Flay, and Mind Sear spells by 4%."		
		);

$i++;						
		
//Darkness - Shadow
$rank[$i]= array(
			"Increases your Shadow spell damage by 2%.",
			"Increases your Shadow spell damage by 4%.",
			"Increases your Shadow spell damage by 6%.",
			"Increases your Shadow spell damage by 8%.",
			"Increases your Shadow spell damage by 10%."
		);

$i++;		
		
//Shadow Form - Shadow
$rank[$i]= array(
			"1634 Mana<br><span style=text-align:left;float:left;>Instant cast</span><span style=text-align:right;float:right;>1.5 sec cooldown</span><br>Assume a Shadowform, increasing your Shadow damage by 15%, reducing Physical damage done to you by 15% and threat generated by 30%. However, you may not cast Holy spells while in this form. Your Shadow Word: Pain, Devouring Plague, and Vampiric Touch abilities deal increased percentage damage equal to your spell critical strike chance."
		);
$i++;		
		
//Shadow Power - Shadow
$rank[$i]= array(
"Increases the critical strike damage bonus of your Mind Blast, Mind Flay and Shadow Word: Death spells by 20%.",
"Increases the critical strike damage bonus of your Mind Blast, Mind Flay and Shadow Word: Death spells by 40%.",
"Increases the critical strike damage bonus of your Mind Blast, Mind Flay and Shadow Word: Death spells by 60%.",
"Increases the critical strike damage bonus of your Mind Blast, Mind Flay and Shadow Word: Death spells by 80%.",
"Increases the critical strike damage bonus of your Mind Blast, Mind Flay and Shadow Word: Death spells by 100%."								
		);

$i++;

//Improved Shadowform - Shadow
$rank[$i]= array(
"Your Fade ability now has a 50% chance to remove all movement impairing effects when used while in Shadowform, and reduces casting or channeling time lost when damaged by 35% when casting any Shadow spell while in Shadowform.",
"Your Fade ability now has a 100% chance to remove all movement impairing effects when used while in Shadowform, and reduces casting or channeling time lost when damaged by 70% when casting any Shadow spell while in Shadowform."										
		);

$i++;
		
		
//Misery - Shadow 
$rank[$i] = array(
"Your Shadow Word: Pain, Mind Flay and Vampiric Touch spells also increase the chance for harmful spells to hit by 1% lasting 24 sec, and increases the damage of your Mind Blast, Mind Flay and Mind Sear spells by an amount equal to 5% of your spell power.",
"Your Shadow Word: Pain, Mind Flay and Vampiric Touch spells also increase the chance for harmful spells to hit by 2% lasting 24 sec, and increases the damage of your Mind Blast, Mind Flay and Mind Sear spells by an amount equal to 10% of your spell power.",
"Your Shadow Word: Pain, Mind Flay and Vampiric Touch spells also increase the chance for harmful spells to hit by 3% lasting 24 sec, and increases the damage of your Mind Blast, Mind Flay and Mind Sear spells by an amount equal to 15% of your spell power."
		);

$i++;

//Psychic Horror - Shadow
$rank[$i]= array(
"Causes your Psychic Scream ability to inflict Psychic Horror on the target when the fear effect ends. Psychic Horror reduces all damage done by the target by 15% for 6 sec.",
"Causes your Psychic Scream ability to inflict Psychic Horror on the target when the fear effect ends. Psychic Horror reduces all damage done by the target by 30% for 6 sec."											
		);
$i++;

//Vampiric Touch - Shadow 
$rank[$i]= array(
			"<span style=text-align:left;float:left;>695 Mana</span><span style=text-align:right;float:right;>30 yd range</span><br>1.5 sec cast<br>\
			Causes 495 Shadow damage over 15 sec to your target and causes up to 10 party or raid members to gain 0.25% of their maximum mana per second when you deal damage from Mind Blast.\
			<br><br>\
			&nbsp;Trainable Ranks Listed Below:<br>\
			&nbsp;Rank 2: 400 Mana, 600 Damage<br>\
			&nbsp;Rank 3: 425 Mana, 650 Damage<br>\
			&nbsp;Rank 4: 580 Mana, 805 to 810 Damage<br>\
			&nbsp;Rank 5: 580 Mana, 935 Damage"
		);		
		
$i++;

//Pain and Suffering - Shadow
$rank[$i]= array(
"Your Mind Flay has a 33% chance to refresh the duration of your Shadow Word: Pain on the target, and reduces the damage you take from your own Shadow Word: Death by 10%.",
"Your Mind Flay has a 66% chance to refresh the duration of your Shadow Word: Pain on the target, and reduces the damage you take from your own Shadow Word: Death by 20%.",	
"Your Mind Flay has a 100% chance to refresh the duration of your Shadow Word: Pain on the target, and reduces the damage you take from your own Shadow Word: Death by 30%."	
		);
$i++;

//Twisted Faith - Shadow
$rank[$i]= array(
"Increases your spell power by 2% of your total Spirit, and your damage done by your Mind Flay and Mind Blast is increased by 2% if your target is afflicted by your Shadow Word: Pain.",
"Increases your spell power by 4% of your total Spirit, and your damage done by your Mind Flay and Mind Blast is increased by 4% if your target is afflicted by your Shadow Word: Pain.",
"Increases your spell power by 6% of your total Spirit, and your damage done by your Mind Flay and Mind Blast is increased by 6% if your target is afflicted by your Shadow Word: Pain.",
"Increases your spell power by 8% of your total Spirit, and your damage done by your Mind Flay and Mind Blast is increased by 8% if your target is afflicted by your Shadow Word: Pain.",
"Increases your spell power by 10% of your total Spirit, and your damage done by your Mind Flay and Mind Blast is increased by 10% if your target is afflicted by your Shadow Word: Pain."									
		);
$i++;

//Dispersion - Shadow 
$rank[$i]= array(
"<span style=text-align:left;float:left;>Instant</span><span style=text-align:right;float:right;>3 min cooldown</span><br>You disperse into pure Shadow energy, reducing all damage taken by 90%. You are unable to attack or cast spells, but you regenerate 6% mana every 1 sec for 6 sec. Dispersion can be cast while stunned, feared or silenced."
		);		
		
$i++;

//Shadow Talents End^^


?>
