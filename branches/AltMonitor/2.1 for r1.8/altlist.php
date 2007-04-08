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

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}


if( $roster_conf['index_update_inst'] )
{
	print '            <a href="#update"><font size="4">'.$act_words['update_link'].'</font></a><br /><br />';
}


if ( $roster_conf['index_motd'] == 1 && !empty($guild_info['guild_motd']) )
{
	if( $roster_conf['motd_display_mode'] )
	{
		print '<img src="motd.php" alt="'.$guild_info['guild_motd'].'" /><br /><br />';
	}
	else
	{
		echo '<span class="GMOTD">Guild MOTD: '.$guild_info['guild_motd'].'</span><br /><br />';
	}
}

$roster_menu = new RosterMenu;
print $roster_menu->makeMenu('main');


echo "<table>\n  <tr>\n";

if ( $roster_conf['index_hslist'] == 1 )
{
	echo '    <td valign="top">';
	include_once( ROSTER_LIB.'hslist.php');
	echo "    </td>\n";
}

if ( $roster_conf['index_pvplist'] == 1 )
{
	echo '    <td valign="top">';
	include_once( ROSTER_LIB.'pvplist.php');
	echo "    </td>\n";
}

echo "  </tr>\n</table>\n";

$altopen = ((array_key_exists('altopen',$_GET) && $_GET['altopen'] != '')?($_GET['altopen']=='yes'):$addon['config']['altopen']);

/*
this section drives the entire output.
Later I'll probably write some query string handling for either/or:
1) fieldsets : given a get request, load a specific set of fields to display (note, will have to add that get string setting to all column sorting headers)
2) customisation by end user: create a list of individual fields, and load them in based off a checkbox-driven form (probably with defaults) for which columns they wish to see.
3) optomisation of query: ie, add to the fields here the section of query to add for it, so it only queries what it has to show.
- at present you need to ensure all fields we will ever display are in the query, the reason I havent done this yet is because of the joins, it makes it narky.
*/


/************************
Example FIELD[] parameters
*************************
// Start the array like this
$FIELD[] = array (

	 // the field name, taken from the query below
	 // if you add options, be sure the query returns those fields or they'll be blank
	 // This is the only required part
	'name' => array(

		// This is for the column header, check the lang files for whatever they need to be called
		// If this is not found, this table header will show what is placed here
		'lang_field' => 'lang_key_name',

		// An ordering array
		// Some sorts benifit from multiple order fields, name the fields here as you would in the query
		'order'    => array( '`table`.`field` SORT' ),

		// An ordering descending array
		// This is the same as above, but this is used when the field sort is reversed
		// Some sorts benifit from multiple order fields, name the fields here as you would in the query
		'order_d'    => array( '`table`.`field` SORT' ),

		// This will let you divide out the table on the sections
		'divider' => true,

		// Prefix this text before the the name of the divider
		'divider_prefix' => 'Level ',

		// This is in case you need to use a function to modify the value for a divider
		// See examples at the bottom of this file
		'divider_value' => 'function_name',

		// Not currently used, but left as a reminder to me that we want to always have at least the name...
		'required' => true,

		// Not currently used, indicates to show by default
		'default'  => true,

		// This is in case you need to use a function to modify the value for a field
		// See examples at the bottom of this file
		'value' => 'function_name',
	),
);
************************/

// Merge Arrays
$FIELDS = array();
foreach ($FIELD as $field )
{
	$FIELDS += $field;
}


/************************
 * Set up the default secondary sorting
 * This is what everything will be sorted by after the first sort specified in the arrays
 * DO NOT leave this blank, at least one sort must be here
************************/
$always_sort = '`mains`.`level` DESC, `mains`.`name` ASC, isalt, `members`.`level` DESC, `members`.`name` ASC';



// Join the tables. These are small tables thankfully

// remember that any fields added above need to have a column pulled here
$query =
	'SELECT '.
// we limit down what it actually pulls
// The query is a lot simpler than it looks...

// Fields to get from the members table
	'`members`.`member_id`, '.
	'`members`.`name`, '.
	'`members`.`class`, '.
	'`members`.`note`, '.
	"IF( `members`.`note` IS NULL OR `members`.`note` = '', 1, 0 ) AS 'nisnull', ".
	'`members`.`level`, '.
	'`members`.`guild_rank`, '.
	'`members`.`guild_title`, '.
	'`members`.`zone`, '.
	'`members`.`last_online`, '.
	"DATE_FORMAT( `members`.`last_online`, '".$act_words['timeformat']."' ) AS 'last_online_f', ".

// Fields to get from the players table
	'`players`.`race`, '.
	'`players`.`lifetimeRankName`, '.
	'`players`.`lifetimeHighestRank`, '.
	"IF( `players`.`lifetimeHighestRank` IS NULL OR `players`.`lifetimeHighestRank` = '0', 1, 0 ) AS 'risnull', ".
	'`players`.`exp`, '.
	'`players`.`server`, '.
	'`players`.`clientLocale`, '.

// Fields to get from the alts table
	"IF( `alts`.`alt_type` & 2, 1, 0 ) AS 'isalt', ".
	"`alts`.`alt_type`, ".

// Fields to get from the mains table
	"`mains`.`name` AS 'main_name', ".
	"IF( `mains`.`name` IS NULL OR `mains`.`name` = '', 1, 0 ) AS 'nomain', ".
	"IF( `mains`.`note` IS NULL OR `mains`.`note` = '', 1, 0 ) AS 'mnisnull', ".

// Fields to get from the main player table
	"IF( `main_players`.`lifetimeHighestRank` IS NULL OR `main_players`.`lifetimeHighestRank` = '0', 1, 0 ) AS 'mrisnull' ";



// Get additional SQL from files
	if( isset($additional_sql) )
	{
		$query .= ', ';
		foreach( $additional_sql as $more_sql )
		{
			$query .= $more_sql;
		}
	}

// Continue with JOINS
$query .=
	"FROM `".ROSTER_MEMBERSTABLE."` AS members ".

// All those people asking about guild searching, here's a spot!  and here's the simple alteration to stop guild filtering in this particular place
	"LEFT JOIN `".ROSTER_PLAYERSTABLE."` AS players ON `members`.`member_id` = `players`.`member_id` AND `members`.`guild_id` = '".$guild_info['guild_id']."' ".
	"LEFT JOIN `".ROSTER_ALT_TABLE."` AS alts ON `members`.`member_id` = `alts`.`member_id` ".
	"LEFT JOIN `".ROSTER_MEMBERSTABLE."` as mains ON `mains`.`member_id` = `alts`.`main_id` ".
	"LEFT JOIN `".ROSTER_PLAYERSTABLE."` AS main_players ON `mains`.`member_id` = `main_players`.`member_id` AND `mains`.`guild_id` = '".$guild_info['guild_id']."' ".
	"ORDER BY ".(($addon['config']['mainlessbottom'])?"nomain, ":"nomain DESC, ");


// Add custom primary and secondary ORDER BY definitions
// removed all the switchstring jazz as it wasn't needed

// Get default sort from roster config
if( !isset($_GET['s']) && !empty($roster_conf['index_sort']) )
{
   $_GET['s'] = $roster_conf['index_sort'];
}

if ( isset($_GET['s']) && $ORDER_FIELD = $FIELDS[$_GET['s']] )
{
	$order_field = $_GET['s'];

	if( isset($_GET['d']) && $_GET['d'] && isset( $ORDER_FIELD['order_d'] ) )
	{
		foreach ( $ORDER_FIELD['order_d'] as $order_field_sql )
		{
			$query .= $order_field_sql.', ';
		}
	}
	elseif( isset( $ORDER_FIELD['order']) )
	{
		foreach ( $ORDER_FIELD['order'] as $order_field_sql )
		{
			$query .= $order_field_sql.', ';
		}
	}
}
$query .= $always_sort;


$result = $wowdb->query( $query ) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);


// switching the quoting around as I loathe printing ugly html, and I like readable code, so I compromise.

$cols = count( $FIELDS ) + 1;

$tableHeader = "<table>\n  <tr>\n    <td>\n";

function borderTop( $text='' )
{
	return "<br />\n".border('syellow','start',$text)."\n<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n";
}


// header row
$tableHeaderRow = "  <thead><tr>\n";
$current_col = 1;
foreach ( $FIELDS as $field => $DATA )
{
	// See if there is a lang value for the header
	if( !empty($wordings[$roster_conf['roster_lang']][$DATA['lang_field']]) )
	{
		$th_text = $wordings[$roster_conf['roster_lang']][$DATA['lang_field']];
	}
	else
	{
		$th_text = $DATA['lang_field'];
	}

	// click a sorted field again to reverse sort it
	// Don't add it if it is detected already
	if( isset($_REQUEST['d']) && $_REQUEST['d'] != 'true' )
	{
		$desc = ( $order_field == $field ) ? '&amp;d=true' : '';
	}
	else
	{
		$desc = '';
	}

	if( $current_col == 1 )
	{
		$tableHeaderRow .= '    <th colspan="2" class="membersHeaderRight"><a href="'.makelink(ROSTER_PAGE_NAME.'&amp;s='.$field.$desc.($altopen?'&amp;altopen=yes':'')).'">'.$th_text."</a></th>\n";
	}
	elseif( $current_col == $cols )
	{
		$tableHeaderRow .= '    <th class="membersHeaderRight"><a href="'.makelink(ROSTER_PAGE_NAME.'&amp;s='.$field.$desc.($altopen?'&amp;altopen=yes':'')).'">'.$th_text."</a></th>\n";
	}
	else
	{
		$tableHeaderRow .= '    <th class="membersHeader"><a href="'.makelink(ROSTER_PAGE_NAME.'&amp;s='.$field.$desc.($altopen?'&amp;altopen=yes':'')).'">'.$th_text."</a></th>\n";
	}


	$current_col++;
}
$tableHeaderRow .= "  </tr>\n";
// end header row

$borderBottom = "</table>\n".border('syellow','end');

$tableFooter = '</td></tr></table>';


echo border('sgreen','start',$act_words['altlist_menu']).
     '<table width="100%" cellpadding="0" cellspacing="0"><tr>'.
     '<td><a href="'.makelink(ROSTER_PAGE_NAME.(isset($_GET['s'])?'&amp;s='.$_GET['s']:'').'&amp;altopen=yes').'"><img src="'.$roster_conf['img_url'].'plus.gif" alt="+">'.$act_words['altlist_open'].'</a>'.
     '<td><a href="'.makelink(ROSTER_PAGE_NAME.(isset($_GET['s'])?'&amp;s='.$_GET['s']:'')).'"><img src="'.$roster_conf['img_url'].'minus.gif" alt="-">'.$act_words['altlist_close'].'</a>'.
     '</table>'.border('sgreen','end');


print($tableHeader);


// Counter for row striping
$striping_counter = 0;

$last_value = 'some obscurely random string because i\'m too lazy to do this a better way.';
$firstrow = true;
$mainless = false;

while ( $row = $wowdb->fetch_assoc( $result ) )
{
	echo "<!-- ".$row['name']."-->\n";
	// Adding grouping dividers
	if ( isset($ORDER_FIELD['divider']) && $ORDER_FIELD['divider'] )
	{
		if ( $last_value != $row[$order_field] & !$row['isalt'])
		{
			if ( $roster_conf['sqldebug'] )
			{
				echo "<!-- $order_field :: $last_value != $row[$order_field] -->\n";
			}
			if ( $striping_counter )
			{
				echo $borderBottom;
			}

			if( isset($ORDER_FIELD['divider_value']) )
			{
				$divider_text = $ORDER_FIELD['divider_value']( $ORDER_FIELD['divider_prefix'].$row[$order_field] );
			}
			else
			{
				$divider_text = '<div class="membersGroup">'.$ORDER_FIELD['divider_prefix'].$row[$order_field]."</div>\n";
			}

			echo
			borderTop($divider_text).
			$tableHeaderRow;

			$striping_counter = 0;
			$last_value = $row[$order_field];
		}
		else if ( $firstrow )
		{
			echo borderTop('Mainless Alts').$tableHeaderRow;
		}
	}
	else if ( $striping_counter == 0 )
	{
		echo borderTop().
			$tableHeaderRow;
	}

	if ( $addon['config']['mainlessbottom'] && $row['nomain'] && !$mainless)
	{
		$mainless = true;
		echo $borderBottom.borderTop('Mainless Alts').$tableHeaderRow;
	}


	$firstrow = false;

	if ( !$row['isalt'] ) // This is a main, start a new tbody section for alt foldouts
	{
		echo "<tbody>";
	}

	// actual player rows
	echo "  <tr>\n";

	// Increment counter so rows are colored alternately
	$stripe_counter = ( ( $striping_counter++ % 2 ) + 1 );
	$stripe_class = 'membersRow'.$stripe_counter;
	$stripe_class_right =  'membersRowRight'.$stripe_counter;
	$current_col = 1;


	// Echoing cells w/ data
	foreach ( $FIELDS as $field => $DATA )
	{
		if ( isset( $DATA['value'] ) )
		{
			$cell_value = $DATA['value']( $row );
		}
		else
		{
			$cell_value = empty( $row[$field] ) ? '&nbsp;' : $row[$field];
		}

		//---[ Adding trade skills images ]---------------
		if ( $roster_conf['index_tradeskill_icon'] == 1 && $field == $roster_conf['index_tradeskill_loc'] )
		{
			$cell_value .= tradeskill_icons($row);
		}

		if ( $current_col == 1 ) // Indentations
		{
			if ($row['name']==$row['main_name'])
			{	// this is a main
				if ( ($row['alt_type'] & 3) == 0 )
				{
					if ( $altopen )
						$openimg = 'minus.gif';
					else
						$openimg = 'plus.gif';

					echo '    <td class="'.$stripe_class.'"><a href="#" onclick="showHide(\'playerrow-'.$row['main_name'].'\',\'foldout-'.$row['main_name'].'\',\''.$roster_conf['img_url'].'plus.gif\',\''.$roster_conf['img_url'].'minus.gif\'); return false;"><img src="'.$roster_conf['img_url'].$openimg.'" id="foldout-'.$row['main_name'].'"></a>'."\n";
					echo '<td class="'.$stripe_class.'">'.$cell_value.'</td>'."\n";
				}
				else
				{
					echo '    <td class="'.$stripe_class.'"><td class="'.$stripe_class.'">'.$cell_value.'</td>'."\n";
				}
			}
			else
			{	// this is an alt
				echo '	  <td class="'.$stripe_class.'"><td class="'.$stripe_class.'" style="padding-left: 20px">'.$cell_value.'</td>'."\n";
			}
		}
		elseif ( $current_col == $cols ) // last col
		{
			echo '    <td class="'.$stripe_class_right.'">'.$cell_value.'</td>'."\n";
		}
		else
		{
			echo '    <td class="'.$stripe_class.'">'.$cell_value.'</td>'."\n";
		}
		$current_col++;
	}
	echo "  </tr>\n";
	if ( ($row['alt_type'] & 3) == 0 ) // This is a main with alts, start new tbody element below this character
	{				// We can't use $row['isalt'] because empty tbody elements are against the standard
		if ( $altopen )
			$tbodystyle = '';
		else
			$tbodystyle = 'display:none';
		echo "<tbody id='playerrow-".$row['name']."' style='$tbodystyle'>";
	}
}

echo $borderBottom;

print($tableFooter);



// Print the update instructions
if( $roster_conf['index_update_inst'] )
{
	print "<br />\n\n<a name=\"update\"></a>\n";

	echo border('sgray','start',$act_words['update_instructions']);
	echo '<div align="left" style="font-size:10px;">'.$act_words['update_instruct'];

	if ($roster_conf['pvp_log_allow'] == 1)
	{
		echo $act_words['update_instructpvp'];
	}
	echo '</div>'.border('sgray','end');
}

echo "<center><small>AltMonitor ".$addon['version']."</small></center>";

/*********************************************************************
 function(s) to return a value from a row with some logic applied.
*********************************************************************/


/**
 * Controls Output of the Name Column
 *
 * @param array $row - of character data
 * @return string - Formatted output
 */
function name_value ( $row )
{
	global $roster_conf, $act_words;

	if( $roster_conf['index_member_tooltip'] )
	{
		$tooltip_h = $row['name'].' : '.$row['guild_title'];

		$tooltip = 'Level '.$row['level'].' '.$row['class']."\n";
		
		switch ( $row['alt_type'] & 3 )
		{
			case 0:
				$tooltip .= 'Main with alts'."\n";
				break;
			case 1:
				$tooltip .= 'Main without alts'."\n";
				break;
			case 2:
				$tooltip .= 'Alt of '.$row['main_name']."\n";
				break;
			case 3:
				$tooltip .= 'Mainless Alt'."\n";
				break;
		}

		$tooltip .= $act_words['lastonline'].': '.$row['last_online_f'].' in '.$row['zone'];
		$tooltip .= ($row['nisnull'] ? '' : "\n".$act_words['note'].': '.$row['note']);

		$tooltip = '<div style="cursor:help;" '.makeOverlib($tooltip,$tooltip_h,'',1,'',',WRAP').'>';


		if ( $row['server'] )
		{
			return $tooltip.'<a href="'.makelink('char&amp;member='.$row['member_id']).'">'.$row['name'].'</a></div>';
		}
		else
		{
			return $tooltip.$row['name'].'</div>';
		}
	}
	else
	{
		if ( $row['server'] )
		{
			return '<a href="'.makelink('char&amp;member='.$row['member_id']).'">'.$row['name'].'</a>';
		}
		else
		{
			return $row['name'];
		}
	}
}


/**
 * Controls Output of the Honor Column
 *
 * @param array $row - of character data
 * @return string - Formatted output
 */
function honor_value ( $row )
{
	global $roster_conf, $wordings;

	if ( $row['lifetimeHighestRank'] > 0 )
	{
		if ( $roster_conf['index_honoricon'] )
		{
			if( $row['lifetimeHighestRank'] < 10 )
			{
				$rankicon = 'Interface/PvPRankBadges/PvPRank0'.$row['lifetimeHighestRank'].'.'.$roster_conf['alt_img_suffix'];
			}
			else
			{
				$rankicon = 'Interface/PvPRankBadges/PvPRank'.$row['lifetimeHighestRank'].'.'.$roster_conf['alt_img_suffix'];
			}
			$rankicon = $roster_conf['interface_url'].$rankicon;
			$rankicon = "<img class=\"membersRowimg\" width=\"".$roster_conf['index_iconsize']."\" height=\"".$roster_conf['index_iconsize']."\" src=\"".$rankicon."\" alt=\"\" />";
		}
		else
		{
			$rankicon = '';
		}

		$cell_value = $rankicon.' '.$row['lifetimeRankName'];

		return $cell_value;
	}
	else
	{
		return '&nbsp;';
	}
}


/**
 * Controls Output of the Last Online Column
 *
 * @param array $row - of character data
 * @return string - Formatted output
 */
function last_online_value ( $row )
{
	global $roster_conf, $act_words, $guild_info;

	if ( $row['last_online'] != '')
	{
		$guild_time = strtotime($guild_info['update_time']);
		$update_time = strtotime($row['last_online']);

		$difference = $guild_time - $update_time;

		if( $row['online'] == '1' || $difference < 0 )
		{
			return $act_words['online_at_up'];
		}

		if($difference < 60)
		{
			return $difference.' second'.($difference == '1' ? '' : 's').' ago';
		}
		else
		{
			$difference = round($difference / 60);
			if($difference < 60)
			{
				return $difference.' minute'.($difference == '1' ? '' : 's').' ago';
			}
			else
			{
				$difference = round($difference / 60);
				if($difference < 24)
				{
					return $difference.' hour'.($difference == '1' ? '' : 's').' ago';
				}
				else
				{
					$difference = round($difference / 24);
					if($difference < 7)
					{
						return $difference.' day'.($difference == '1' ? '' : 's').' ago';
					}
					else
					{
						$difference = round($difference / 7);
						if( $difference < 4 )
						{
							return $difference.' week'.($difference == '1' ? '' : 's').' ago';
						}
						else
						{
							$difference = round($difference / 4);
							if( $difference < 12 )
							{
								return $difference.' month'.($difference == '1' ? '' : 's').' ago';
							}
							else
							{
								$difference = round($difference / 12);
								return $difference.' year'.($difference == '1' ? '' : 's').' ago';
							}

						}
					}
				}
			}
		}
	}
	else
	{
		return '&nbsp;';
	}
}


/**
 * Controls Output of the Class Column
 *
 * @param array $row - of character data
 * @return string - Formatted output
 */
function class_value ( $row )
{
	global $wordings, $roster_conf;

	if( $row['class'] != '' )
	{
		// Class Icon
		if( $roster_conf['index_classicon'] == 1 )
		{
			foreach ($roster_conf['multilanguages'] as $language)
			{
				$icon_name = isset($wordings[$language]['class_iconArray'][$row['class']]) ? $wordings[$language]['class_iconArray'][$row['class']] : '';
				if( strlen($icon_name) > 0 ) break;
			}
			$icon_name = 'Interface/Icons/'.$icon_name;

			$icon_value = '<img class="membersRowimg" width="'.$roster_conf['index_iconsize'].'" height="'.$roster_conf['index_iconsize'].'" src="'.$roster_conf['interface_url'].$icon_name.'.'.$roster_conf['img_suffix'].'" alt="" />&nbsp;';
		}
		else
		{
			$icon_value = '';
		}

		// Class name coloring
		if ( $roster_conf['index_class_color'] == 1 )
		{
			foreach( $roster_conf['multilanguages'] as $language )
			{
				$class_color = array_search($row['class'],$wordings[$language]);
				if( strlen($class_color) > 0 )
				{
					$class_color = $wordings['enUS'][$class_color];
					break;
				}
			}

			if( $class_color != '' )
				return $icon_value.'<span class="class'.$class_color.'txt">'.$row['class'].'</span>';
			else
				return $icon_value.'<span class="class'.$row['class'].'txt">'.$row['class'].'</span>';
		}
		else
		{
		    return $icon_value.$row['class'];
		}
	}
	else
	{
		return '&nbsp;';
	}
}


/**
 * Controls Output of the Class Dividers
 *
 * @param array $row - of character data
 * @return string - Formatted output
 */
function class_divider ( $text )
{
	global $wordings, $roster_conf;

	// Class Icon
	foreach ($roster_conf['multilanguages'] as $language)
	{
		$icon_name = isset($wordings[$language]['class_iconArray'][$text]) ? $wordings[$language]['class_iconArray'][$text] : '';
		if( strlen($icon_name) > 0 ) break;
	}
	$icon_name = 'Interface/Icons/'.$icon_name;

	$icon_value = '<a id="'.$text.'"></a><img class="membersRowimg" width="16" height="16" src="'.$roster_conf['interface_url'].$icon_name.'.'.$roster_conf['img_suffix'].'" alt="" />&nbsp;';

	return '<div class="membersGroup">'.$icon_value.$text.'</div>';

}


/**
 * Controls Output of the Tradeskill Icons Column
 *
 * @param array $row - of character data
 * @return string - Formatted output
 */
function tradeskill_icons ( $row )
{
	global $wowdb, $roster_conf, $wordings;

	if( $row['clientLocale'] != '' )
	{
		$lang = $row['clientLocale'];

		$SQL_prof = $wowdb->query( "SELECT * FROM `".ROSTER_SKILLSTABLE."` WHERE `member_id` = '".$row['member_id']."' AND (`skill_type` = '".$wordings[$lang]['professions']."' OR `skill_type` = '".$wordings[$lang]['secondary']."') ORDER BY `skill_order` ASC" );

		if( !$SQL_prof )
		{
			return 'Error while fetching professions for '.$row['name'].'. MySQL said: '.$wowdb->error();
		}

		$cell_value = '';
		while ( $r_prof = $wowdb->fetch_assoc( $SQL_prof ) )
		{
			$toolTip = str_replace(':','/',$r_prof['skill_level']);
			$toolTiph = $r_prof['skill_name'];

			if( $r_prof['skill_name'] == $wordings[$lang]['riding'] )
			{
				if( $row['class']==$wordings[$lang]['Paladin'] || $row['class']==$wordings[$lang]['Warlock'] )
				{
					$skill_image = 'Interface/Icons/'.$wordings[$lang]['ts_ridingIcon'][$row['class']];
				}
				else
				{
					$skill_image = 'Interface/Icons/'.$wordings[$lang]['ts_ridingIcon'][$row['race']];
				}
			}
			else
			{
				$skill_image = 'Interface/Icons/'.$wordings[$lang]['ts_iconArray'][$r_prof['skill_name']];
			}

			$cell_value .= "<img class=\"membersRowimg\" width=\"".$roster_conf['index_iconsize']."\" height=\"".$roster_conf['index_iconsize']."\" src=\"".$roster_conf['interface_url'].$skill_image.'.'.$roster_conf['img_suffix']."\" alt=\"\" ".makeOverlib($toolTip,$toolTiph,'',2,'',',RIGHT,WRAP')." />\n";
		}
	}
	else
	{
		$cell_value = '&nbsp;';
	}
	return $cell_value;
}


/**
 * Controls Output of the Level Column
 *
 * @param array $row - of character data
 * @return string - Formatted output
 */
function level_value ( $row )
{
	global $wowdb, $roster_conf, $wordings, $act_words;

	$tooltip = '';
	// Configurlate exp is player has it
	if( !empty($row['exp']) )
	{
		list($current, $max, $rested) = explode( ':', $row['exp'] );

		if( $rested > 0 )
		{
			$rested = ' : '.$rested;
		}
		$togo = $max - $current;
		$togo .= ' XP until level '.($row['level']+1);

		$percent_exp = ($max > 0 ? round(($current/$max)*100) : 0);

		$tooltip = '<div style="white-space:nowrap;" class="levelbarParent" style="width:200px;"><div class="levelbarChild">XP '.$current.'/'.$max.$rested.'</div></div>';
		$tooltip .= '<table class="expOutline" border="0" cellpadding="0" cellspacing="0" width="200">';
		$tooltip .= '<tr>';
		$tooltip .= '<td style="background-image:url(\''.$roster_conf['img_url'].'expbar-var2.gif\');" width="'.$percent_exp.'%"><img src="'.$roster_conf['img_url'].'pixel.gif" height="14" width="1" alt="" /></td>';
		$tooltip .= '<td width="'.(100 - $percent_exp).'%"></td>';
		$tooltip .= '</tr>';
		$tooltip .= '</table>';


		if( $row['level'] == ROSTER_MAXCHARLEVEL )
		{
			$tooltip = makeOverlib($act_words['max_exp'],'','',2,'',',WRAP');
		}
		else
		{
			$tooltip = makeOverlib($tooltip,$togo,'',2,'',',WRAP');
		}
	}

	if( $roster_conf['index_level_bar'] )
	{
		$percentage = round(($row['level']/ROSTER_MAXCHARLEVEL)*100);

		$cell_value = '<div '.$tooltip.' style="cursor:default;"><div class="levelbarParent" style="width:70px;"><div class="levelbarChild">'.$row['level'].'</div></div>';
		$cell_value .= '<table class="expOutline" border="0" cellpadding="0" cellspacing="0" width="70">';
		$cell_value .= '<tr>';
		$cell_value .= '<td style="background-image:url(\''.$roster_conf['img_url'].'expbar-var2.gif\');" width="'.$percentage.'%"><img src="'.$roster_conf['img_url'].'pixel.gif" height="14" width="1" alt="" /></td>';
		$cell_value .= '<td width="'.(100 - $percentage).'%"></td>';
		$cell_value .= "</tr>\n</table>\n</div>\n";
	}
	else
	{
		$cell_value = '<div'.$tooltip.' style="cursor:default;">'.$row['level'].'</div>';
	}

	return $cell_value;
}


/**
 * Controls Output of a Note Column
 *
 * @param array $row - of character data
 * @return string - Formatted output
 */
function note_value ( $row )
{
	global $roster_conf, $wordings, $act_words;

	$note='';
	if( !empty($row['note']) )
	{
		$prg_find = array('/"/','/&/','|\\>|','|\\<|',"/\\n/");
		$prg_rep  = array('&quot;','&amp;','&gt;','&lt;','<br />');

		$note = preg_replace($prg_find, $prg_rep, $row['note']);

		if( $roster_conf['compress_note'] )
		{
			$note = '<img src="'.$roster_conf['img_url'].'note.gif" style="cursor:help;" '.makeOverlib($note,$act_words['note'],'',1,'',',WRAP').' alt="[]" />';
		}
	}
	else
	{
		$note = '&nbsp;';
		if( $roster_conf['compress_note'] )
		{
			$note = '<img src="'.$roster_conf['img_url'].'no_note.gif" alt="[]" />';
		}
	}

	return $note;
}
