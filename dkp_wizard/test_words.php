<?php
/******************************
 * WoWRoster.net  Roster
 * Copyright 2002-2006
 * Licensed under the Creative Commons
 * "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * Short summary
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/
 *
 * Full license information
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/legalcode
 * -----------------------------
 *
 * $Id$
 *
 ******************************/

include '../../settings.php';


$words = array('stamina', 'strength', 'spirit', 'intellect', 'agility', 'defense', 'res_arcane', 'res_fire', 'res_nature', 'res_frost', 'res_shadow', 'arcane_spell_damage', 'fire_spell_damage', 'frost_spell_damage', 'holy_spell_damage', 'nature_spell_damage', 'shadow_spell_damage', 'block', 'dodge', 'armor', 'ranged_attack_power', 'attack_power', 'beast_slaying', 'mana_every_5', 'health_every_5', 'healing_spells', 'damage_healing_spells', 'on_get_hit_shadow_bolt', 'damage', 'critical_hit');

print('<pre>');
foreach ($words as $word)
{
	print($word.' => '.$wordings['enUS'][$word]."\n");
	print($word.' => '.$wordings['deDE'][$word]."\n");
}
//print_r($wordings['enUS']);
print('</pre>');

/*
Missing
arcane_spell_damage => 
fire_spell_damage => 
frost_spell_damage => 
holy_spell_damage => 
nature_spell_damage => 
shadow_spell_damage => 
ranged_attack_power => 
attack_power => 
beast_slaying => 
mana_every_5 => 
health_every_5 => 
healing_spells => 
damage_healing_spells => 
on_get_hit_shadow_bolt => 
critical_hit => 

enUS
stamina => Stamina
strength => Strength
spirit => Spirit
intellect => Intellect
agility => Agility
defense => Defense
res_arcane => Arcane Resistance
res_fire => Fire Resistance
res_nature => Nature Resistance
res_frost => Frost Resistance
res_shadow => Shadow Resistance
arcane_spell_damage => 
fire_spell_damage => 
frost_spell_damage => 
holy_spell_damage => 
nature_spell_damage => 
shadow_spell_damage => 
block => Block
dodge => Dodge
armor => Armor
ranged_attack_power => 
attack_power => 
beast_slaying => 
mana_every_5 => 
health_every_5 => 
healing_spells => 
damage_healing_spells => 
on_get_hit_shadow_bolt => 
damage => Damage
critical_hit => 

deDE
stamina => Ausdauer
strength => Stärke
spirit => Willenskraft
intellect => Intelligenz
agility => Beweglichkeit
defense => Verteidigung
res_arcane => Arkan Widerstand
res_fire => Feuer Widerstand
res_nature => Natur Widerstand
res_frost => Frost Widerstand
res_shadow => Schatten Widerstand
arcane_spell_damage => 
fire_spell_damage => 
frost_spell_damage => 
holy_spell_damage => 
nature_spell_damage => 
shadow_spell_damage => 
block => Blocken
dodge => Ausweichen
armor => Rüstung
ranged_attack_power => 
attack_power => 
beast_slaying => 
mana_every_5 => 
health_every_5 => 
healing_spells => 
damage_healing_spells => 
on_get_hit_shadow_bolt => 
damage => Schaden
critical_hit => 
*/

?>

 <FORM action="http://somesite.com/prog/adduser" method="post">
    <P>
    First name: <INPUT type="text" name="firstname"><BR>
    Last name: <INPUT type="text" name="lastname"><BR>
    email: <INPUT type="text" name="email"><BR>
    <INPUT type="radio" name="sex" value="Male"> Male<BR>
    <INPUT type="radio" name="sex" value="Female"> Female<BR>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
    </P>
 </FORM>
