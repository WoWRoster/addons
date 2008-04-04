<?php

/**
 * WoWRoster.net ItemSets
 *
 * Itemsets is a Roster addon that shows a list of all your guildmates above lvl 50
 * and which setitems of their class-sets they have.
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2004-2007 PoloDude
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    2.0.3.377
 * @svn        SVN: $Id$
 * @author     Gorgar, PoloDude, Zeryl, Munazz, Rouven
 * @link       http://www.wowroster.net/Forums/viewforum/f=35.html
 * @package    ItemSets
 *
*/

if( !defined('IN_ROSTER') )
    {
    exit('Detected invalid access to this file!');
    }
    
include( ROSTER_LIB . 'item.php' );
    
// Set the output page title
$roster->output['title'] = $roster->locale->act['ItemSets'];

// Get the faction
$guildFaction = substr($roster->data['factionEn'],0,1);

// Get the minimun character level
$minlevel = $addon['config']['itemsets_lvl'];

// Tier Selection
// Get the default selection from the config
$tier = $addon['config']['defaultset'];
if (isset($_REQUEST["tierselect"])) $tier = $_REQUEST["tierselect"];
if($tier=='') $tier = 'Dungeon_1';

// Class Selection
$class = "";
if (isset($_REQUEST["classfilter"])) $class = $_REQUEST["classfilter"];


// Create the Selection Form
// First get the sets
$all_sets = array_keys($roster->locale->act['ItemSets_Set']);
sort($all_sets);
$form = '';
$form .= '<table cellpadding="0" cellspacing="0" class="membersList">';
$form .= '<form method="GET" name="myform" action="'. getFormAction() .'">';
$form .= '<input type="hidden" name="p" value="realm-ItemSets" />';
$form .= '<input type="hidden" name="realm" value="'.$roster->data['region'].'-'.$roster->data['server'].'" />';
$form .= '<tr><th class="membersRow1">Tier:</th>';
$form .= '<td class="membersRow1">';
$form .= '<select name="tierselect" size="1" onchange="window.location.href=this.options[this.selectedIndex].value">';
for ($i = 0; $i < sizeof($all_sets); $i++) { 
	if ($tier == $all_sets[$i]) $is_selected = 'selected';
	else $is_selected = '';
	$form .= '<option value="'.makelink('realm-ItemSets&amp;classfilter='.$class.'&amp;tierselect='.$all_sets[$i], true).'" '.$is_selected.'>'.$roster->locale->act[ $all_sets[$i] ].'</option>'; 
}
$form .= '</select></td>';

// Then get the class names
$form .= '<td class="membersRow1">';
$form .= '<select name="classfilter" onchange="window.location.href=this.options[this.selectedIndex].value">';
if ($class == '') $is_selected = ' selected';
else $is_selected = '';
$form .= '<option value="'.makelink('realm-ItemSets&amp;tierselect='.$tier, true).'" '.$is_selected.'>'. $roster->locale->act['All_Classes'] .'</option>';
$classArray = array();
$tmpArray = array_keys($roster->locale->act['ItemSets_Set']['Dungeon_1']);
foreach ($tmpArray as $tmpClassname)
	if ($tmpClassname != 'Name')
		$classArray[] = $tmpClassname;
sort($classArray);
foreach ($classArray as $tmpClassname){
	if ($class == $tmpClassname) $is_selected = ' selected';
	else $is_selected = '';
	$form .= '<option value="'.makelink('realm-ItemSets&amp;tierselect='.$tier.'&amp;classfilter='.$tmpClassname, true).'" '.$is_selected.'>'.$tmpClassname.'</option>';
}
$form .= '</select></td>';
$form .= '</tr></form></table>';

// Display the Selection Form in a box
echo border('syellow','start');
echo $form;
echo border('syellow','end');
echo "<br />\n";

// Lets start the output
echo border('syellow', 'start', $roster->locale->act[$tier]);

// Make a table to hold the content
echo '<table cellpadding="0" cellspacing="0" class="membersList">';

// Display the header of the table
if ($tier == 'ZG'){
    $headeritems = array(
	$roster->locale->act['Name'],
	$roster->locale->act['Waist'],
	$roster->locale->act['Wrists'],
	$roster->locale->act['Chest'],
	$roster->locale->act['Shoulder'],
	$roster->locale->act['Neck'],
	$roster->locale->act['Trinket']);
} elseif ($tier == 'AQ20'){
    $headeritems = array(
	$roster->locale->act['Name'],
	$roster->locale->act['Back'],
	$roster->locale->act['Finger'],
	$roster->locale->act['Mainhand']);
} elseif ($tier == 'AQ40'){
    $headeritems = array(
	$roster->locale->act['Name'],
	$roster->locale->act['Feet'],
	$roster->locale->act['Chest'],
	$roster->locale->act['Head'],
	$roster->locale->act['Legs'],
	$roster->locale->act['Shoulder']);
} elseif ($tier == 'Tier_3'){
    $headeritems = array(
	$roster->locale->act['Name'],
	$roster->locale->act['Waist'],
	$roster->locale->act['Feet'],
	$roster->locale->act['Wrists'],
	$roster->locale->act['Chest'],
	$roster->locale->act['Hands'],
	$roster->locale->act['Head'],
	$roster->locale->act['Legs'],
	$roster->locale->act['Shoulder'],
	$roster->locale->act['Finger']);
} elseif ($tier == 'PVP_Rare' || $tier == 'PVP_Epic'){
    $headeritems = array(
	$roster->locale->act['Name'],
	$roster->locale->act['Feet'],
	$roster->locale->act['Chest'],
	$roster->locale->act['Hands'],
	$roster->locale->act['Head'],
	$roster->locale->act['Legs'],
	$roster->locale->act['Shoulder']);
}  elseif ($tier == 'Dungeon_3'){
    $headeritems = array(
	$roster->locale->act['Name'],
	$roster->locale->act['Chest'],
	$roster->locale->act['Hands'],
	$roster->locale->act['Head'],
	$roster->locale->act['Legs'],
	$roster->locale->act['Shoulder'],
	$roster->locale->act['Separator'],	    
	$roster->locale->act['Chest'],
	$roster->locale->act['Hands'],
	$roster->locale->act['Head'],
	$roster->locale->act['Legs'],
	$roster->locale->act['Shoulder']);	
}  elseif ($tier == 'Tier_4' || $tier == 'Tier_5' || $tier == 'Tier_6' || $tier == 'PVP_Level70' || $tier == 'Arena_1' || $tier == 'Arena_2' || $tier == 'Arena_3'){
    $headeritems = array(
	$roster->locale->act['Name'],
	$roster->locale->act['Chest'],
	$roster->locale->act['Hands'],
	$roster->locale->act['Head'],
	$roster->locale->act['Legs'],
	$roster->locale->act['Shoulder'],
	$roster->locale->act['Separator'],	    
	$roster->locale->act['Chest'],
	$roster->locale->act['Hands'],
	$roster->locale->act['Head'],
	$roster->locale->act['Legs'],
	$roster->locale->act['Shoulder'],	
	$roster->locale->act['Separator'],	    
	$roster->locale->act['Chest'],
	$roster->locale->act['Hands'],
	$roster->locale->act['Head'],
	$roster->locale->act['Legs'],
	$roster->locale->act['Shoulder']);	
} else {
    $headeritems = array(
	$roster->locale->act['Name'],
	$roster->locale->act['Waist'],
	$roster->locale->act['Feet'],
	$roster->locale->act['Wrists'],
	$roster->locale->act['Chest'],
	$roster->locale->act['Hands'],
	$roster->locale->act['Head'],
	$roster->locale->act['Legs'],
	$roster->locale->act['Shoulder']);
}
echo '<tr>';
foreach ($headeritems as $headeritem) {

	// I'm not sure what "$items" or "$itemlink" is referring to...
//	if($items[$headeritem]) {
//		list($iname, $thottnum) = explode('|', $items[$headeritem][$headeritem]);
//		$header = '<a href="'.$itemlink.urlencode($iname).'" target="_thottbot">'.$headeritem.'</a>';
//	} else {
		$header = $headeritem;
//	}
	if ($headeritem == $roster->locale->act['Name']) {
		echo '<th class="membersHeader">'.$header.'</th>';
	} else {
		echo '<th class="membersHeader"><center>'.$header.'</center></th>';
	}
}
echo '</tr>' . "\n";

// Check if we have a Class Filter
$class_where = '';
if ($class != '') {
    // Flip the array for reverse mapping
    $flippedclasses = array_flip($roster->locale->act['classes']['Name']);
    $uniclass = $flippedclasses[$class];
    if (isset ($uniclass)) {
       $class_where = ' AND (class = \''.$class.'\' OR class = \''.$uniclass.'\') ';
    } else {
        $class_where = ' AND (class = \''.$class.'\' ';
    }
}

// Get the table name
$player_table = $roster->db->table('players');
$items_table = $roster->db->table('items');

// Get all the players of the realm above L50 from the DB and sort by member name (Filtered by Class if selected)
$query = 'SELECT name, level, member_id, class, clientLocale FROM `'. $player_table .'` WHERE server = "'.$roster->data['server'].'" AND level >= '.$minlevel.' '.$class_where.' GROUP BY name ORDER BY class ASC, name ASC';
$result = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error',__FILE__,__LINE__,$query);

$rownum=1;
while ($row = $roster->db->fetch($result, SQL_ASSOC)) {
	if($tier=='PVP_Rare' || $tier=='PVP_Epic' || $tier=='PVP_Level70' ){
		$items = $roster->locale->act['ItemSets_Set'][$tier][$guildFaction][$row['class']];
	}
	else{
	   if (isset ($roster->locale->act['classes']['Name'][$row['class']])) {
	   $uniclass = $roster->locale->act['classes']['Name'][$row['class']];
	   } else {
	   $uniclass = $row['class'];
	   }
	   $items = $roster->locale->act['ItemSets_Set'][$tier][$uniclass];
	}
	
	if ($items) {
		// Open a new Row
		echo "\n\n\n<tr>\n";

		// Display the member and set details in the first column
		echo '<td><div class="membersKeyRowLeft'.$rownum.'">';
		echo '<a href="'.makelink('char-info&amp;a=c:'.$row['member_id']).'">'. $row['name'] .'</a><br /><nobr>'.$row['class'].' ('.$row['level'].')</nobr><br />';
		if($tier=='PVP_Rare' || $tier=='PVP_Epic'){
			echo '<span class="tooltipline" style="color:#0070dd; font-size: 10px;">'.$roster->locale->act['ItemSets_Set'][$tier][$guildFaction]['Name'][$uniclass].'</span></div>';
                }else if($tier=='Dungeon_3' || $tier=='Tier_4' || $tier == 'Tier_5' || $tier == 'Tier_6' || $tier == 'Arena_1' || $tier == 'Arena_2' || $tier == 'Arena_3' || $tier=='PVP_Level70'){
			$armorsets = explode("|", $roster->locale->act['ItemSets_Set'][$tier]['Name'][$uniclass]);
		 	$seperatorIndex = 0;
		 	echo '<span class="tooltipline" style="color:#0070dd; font-size: 10px;">'.$armorsets[0].'</span></div>';
		}else{
			echo '<span class="tooltipline" style="color:#0070dd; font-size: 10px;">'.$roster->locale->act['ItemSets_Set'][$tier]['Name'][$uniclass].'</span></div>';
		}
		echo "</td>\n";
		
		// Process all set's for the member_id
		foreach ($items as $setpiece) {
			if ( $setpiece == "-setname-" ) {
			   // make empty Cell
				echo '<td class="membersKeyRow'.$rownum.'">';
				if($tier=='Dungeon_3' || $tier=='Tier_4' || $tier=='Tier_5' || $tier=='Tier_6' || $tier=='Arena_1' || $tier=='Arena_2' || $tier=='Arena_3' || $tier=='PVP_Level70' ){
					$seperatorIndex++;
		 			echo '<span class="tooltipline" style="color:#0070dd; font-size: 10px;">'.$armorsets[$seperatorIndex].'</span>';
				}
				echo '</td>';
				echo '</div>';
				continue;
			}

			// Open a new Cell
			echo '<td class="membersKeyRow'.$rownum.'">';
			echo '<div class="bagSlot">';

			$setpiecename = explode("|", $setpiece);
			// Modification for french localization, thx to Ansgar
			if (isset($SetAlternateName[$setpiecename[0]])) {
				$iquery = "SELECT * FROM `".$items_table."` WHERE (item_name = '".$setpiecename[0]."' OR item_name = '".$SetAlternateName[$setpiecename[0]]."')  AND member_id = '".$row['member_id']."'";
			} else {
				$iquery = "SELECT * FROM `".$items_table."` WHERE item_name = '".$setpiecename[0]."' AND member_id = '".$row['member_id']."'";
			}
			$iresult = $roster->db->query($iquery) or die_quietly($roster->db->error(),'Database Error',__FILE__,__LINE__,$iquery);
			$idata = $roster->db->fetch($iresult, SQL_ASSOC);
// if (!$idata) print "Empty idata"; else {print "\$idata = "; print_r($idata); }
                        if ($idata) {
                            $item = new item($idata);
                            if ($item->name)
                                print $item->out();
                            else
                                echo '<center>N/A</center>';
                        } else {
                            if ($setpiecename[0])
				echo '<span style="z-index: 1000;" onMouseover="return overlib(\'<span class=&quot;tooltipheader&quot; style=&quot;color:#0070dd; font-weight: bold&quot;>'.$setpiecename[0].'</span><br><span class=&quot;tooltipline&quot; style=&quot;color:#ffffff; font-size: 10px;&quot;>'.$roster->locale->act['DropsFrom'].' <b>'.$setpiecename[1].'</b></span><br><span class=&quot;tooltipline&quot; style=&quot;color:#ffffff; font-size: 10px;&quot;>'.$roster->locale->act['DropsIn'].' <b>'.$setpiecename[2].'</b></span>\');" onMouseout="return nd();"><center>X</center></span>';
			    else
			        echo '<center>N/A</center>';
			}
			echo '</td>' . "\n\n";
			echo '</div>';
			echo '</div>';
		}
		// Close the Row
		echo '</tr>' . "\n";
	}
	
	switch ($rownum) {
		case 1:
			$rownum=2;
			break;
		default:
			$rownum=1;
	}
}

// Close the table
echo '</table>';

// Display the Right side / Bottom of the Stylish Border
echo border('syellow','end');
