<?php
/******************************
 * WoWRoster.net  Roster
 * Copyright 2002-2007
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
 * $Id: membersinst.php 603 2007-02-14 07:37:56Z zanix , SartriX, Grirrle$
 *
 ******************************/

if ( !defined('ROSTER_INSTALLED') )
    exit('Detected invalid access to this file!');

require_once (ROSTER_LIB.'item.php');

//---[ Check for Guild Info ]------------
if( empty($guild_info) )
	message_die( $wordings[$row['clientLocale']]['nodata'] );

// Get guild info from guild info check above
$guildId = $guild_info['guild_id'];
$faction = $guild_info['faction'];

include_once( ROSTER_LIB.'menu.php');
print "<br />\n";

// Tooltip colors
$colorcmp = '00ff00;'; // Complete color
$colorcur = 'ffd700;'; // Current color
$colorno = 'ff0000;';  // Uncomplete color

$striping_counter = 1;
$tableHeader = '<table cellpadding="0" cellspacing="0">'."\n";
$tableFooter = "</table>\n";

function borderTop()
{
	print border('sgray','start');
}

function tableHeaderRow($th)
{
	global $items, $itemlink, $roster_conf,$inst_name;

	$acount = 0;
	print "  <tr>\n";
	foreach ($th as $header)
	{
		++$acount;
		if($items[$header])
		{
			list($iname, $thottnum) = explode('|', $items[$header][$header]);
			$header = '<a href="'.$itemlink[$row['clientLocale']].urlencode(utf8_decode(stripslashes($iname))).'" target="_blank">'.$inst_name[$header].'</a>';
		}
		if ($acount == 1)
		{
			print '    <th class="membersHeader">'.$header.'</th>'."\n";
		}
		elseif ($acount == count($th))
		{
			print '    <th class="membersHeaderRight">'.$header.'</th>'."\n";
		}
		else
		{
			print '    <th class="membersHeader" align="center">'.$header."</th>\n";
		}
	}
	print "  </tr>\n";
}

function borderBottom()
{
	print border('sgray','end');
}

function rankLeft($sc)
{
	print '    <td class="membersKeyRowLeft'.$sc.'">';
}

function rankMid($sc)
{
	print '    <td class="membersKeyRow'.$sc.'">';
}

function rankRight($sc)
{
	print '    <td class="membersKeyRowRight'.$sc.'">';
}

function buildSQL($item,$key,$type)
{
	global $wowdb, $selectp, $wherep, $pcount, $selectq, $whereq, $qcount, $selectr, $wherer, $rcount;

	list($iname, $thottnum) = explode('|', $item);

	if ($type == 'quest')
	{
		++$pcount;
		$selectq .= ", sum(if(quests.quest_name = '".$iname."', 1, 0)) AS $key";
		if ($pcount == 1)
		{
			$whereq .= " quests.quest_name = '".$iname."'";
		}
		else
		{
			$whereq .= " OR quests.quest_name = '".$iname."'";
		}
	}
	else if ($type == 'item')
	{
		++$qcount;
		$selectp .= ", sum(if(items.item_name = '".$iname."', 1, 0)) AS $key";
		if ($qcount == 1)
		{
			$wherep .= " items.item_name = '".$iname."'";
		}
		else
		{
			$wherep .= " OR items.item_name = '".$iname."'";
		}
	}
	else if ($type == 'rep')
	{
		++$rcount;
		$selectr .= "WHEN '".$iname."' THEN '".$key."' ";
		if ($rcount==1)
		    $wherer .= " reputation.name = '".$iname."'";
		else
		    $wherer .= " OR reputation.name = '".$iname."'";
	}
}

//Minimum lockpicking skill to get it, 1000 indicates that the lock can't be picked

$min_skill_for_lock = array(
        'SL' => 350,
        'SH' => 350,
        'Arcatraz' => 350,
        'Kara' => 1001,
        'HA' => 1001,
        'HHC' => 1001,
        'HCR' => 1001,
        'HTK' => 1001,
        'HCoT' => 1001,
	'TK' => 1001,
);

$items = $inst_keys_bc[$roster_conf['roster_lang']][substr($faction,0,1)];
$keys = array('Name');
foreach ($items as $key => $data)
{
	array_push($keys,$key);
}
print("<h1>".$wordings[$roster_conf['roster_lang']]['kbc_title_addon']."</h1><br>");
borderTop();
print($tableHeader);
tableHeaderRow($keys);

$query = "SELECT name, level, member_id, class, clientLocale FROM `".ROSTER_PLAYERSTABLE."` GROUP BY name ORDER BY name ASC";
$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
if ($roster_conf['sqldebug'])
{
	print ("<!--$query-->");
}

while ($row = $wowdb->fetch_array($result))
{
	if ($row['clientLocale'] == '')
	{
		$row['clientLocale'] = $row['clientLocale'];
	}
	// build SQL search string for the instance keys only
	$selectk = ''; $wherek = ''; $countk = 0;
	foreach ($items as $key => $item)
	{
		foreach ($items[$key] as $subkey => $subitem)
		{
			$onechar = substr($subkey, 0, 1);
			if (!is_numeric($onechar))
			{
				++$countk;
				list($iname, $thottnum) = explode('|', $subitem);
				$selectk .= ", sum(if(items.item_name = '".$iname."', -1, 0)) as $key";
				if ($countk == 1)
				{
					$wherek .= " items.item_name = '".$iname."'";
				}
				else
				{
					$wherek .= " or items.item_name = '".$iname."'";
				}
			}
		}
	}
	// instance key search
	$kquery = "SELECT members.name".$selectk." FROM `".ROSTER_ITEMSTABLE."` items LEFT JOIN `".ROSTER_MEMBERSTABLE."` members ON members.member_id = items.member_id WHERE items.member_id = '".$row['member_id']."' AND (".$wherek.") GROUP BY members.name";
	$kresult = $wowdb->query($kquery) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$kquery);
	$krow = $wowdb->fetch_array($kresult);
	$kcount = 0; // counts how many keys this player has. if 0 at the end don't display
	$selectp = ''; $wherep = ''; $pcount = 0;
	$selectq = ''; $whereq = ''; $qcount = 0;
	$selectr = ''; $wherer = ''; $rcount = 0;


	$inttorep = array(0,
		$wordings[$row['clientLocale']]['neutral'],
		$wordings[$row['clientLocale']]['friendly'],
		$wordings[$row['clientLocale']]['honored'],
		$wordings[$row['clientLocale']]['revered'],
		$wordings[$row['clientLocale']]['exalted']);
	$reptoint = array_flip($inttorep);



	// ==============================
	// VALUE:MEANING for $krow[$key]:
	// ==============================
	// -1: player has the key
	// -2: player (rogue) can pick the lock but doesn't have the key
	//  0: no access
	// 1+: current quest step
	// 0|1|2|...: completed steps
	// ==============================
	foreach ($items as $key => $item)
	{
		if ($krow[$key] == '-1')
		{
			++$kcount;
		}
		else
		{
			if ($row['class'] == $wordings[$row['clientLocale']]['Rogue'])
			{
				$squery = "SELECT skill_level FROM `".ROSTER_SKILLSTABLE."` WHERE member_id = ".$row['member_id']." and skill_name = '".$wordings[$row['clientLocale']]['lockpicking']."'";
				$sresult = $wowdb->query($squery) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$squery);
				$srow = $wowdb->fetch_array($sresult);
				list($current_skill,$max_skill) = explode(':',$srow['skill_level']);
				$wowdb->free_result($sresult);
				if ($current_skill >= $min_skill_for_lock[$key])
				{
					$krow[$key] = '-2';
					++$kcount;
					continue;
				}
			}
			if ($items[$key][0] == 'Quests')
			{
				$type = 'quest';
			}
			else if ($items[$key][0] == 'Parts')
			{
				$type = 'item';
			}
			else if ($items[$key][0] == 'Reputation')
			{
				buildSQL($items[$key][1], $key, 'rep');
				continue;
			}
			else
			{
				continue;
			}
			for ($acount=1;$acount<count($items[$key])-1;$acount++) {
				buildSQL($items[$key][$acount], "${key}$acount", $type);
			}
		}
	}

	if ($selectr != '') 
	{
		$queryr = "SELECT reputation.name, reputation.standing, (CASE reputation.name ".$selectr."END) AS rkey 
			FROM `".ROSTER_REPUTATIONTABLE."` reputation 
			LEFT JOIN `". ROSTER_MEMBERSTABLE."` members ON members.member_id = reputation.member_id 
			WHERE reputation.member_id = ".$row['member_id']." AND (".$wherer.") ORDER BY members.name ASC";
		$rresult = $wowdb->query($queryr) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$queryr);
	//echo $queryr."<br>";
		while($rrow = $wowdb->fetch_array($rresult)) 
		{
			$rkey = $rrow['rkey'];
			$rvalue = $rrow['standing'];

//echo $rvalue.":".$reptoint[$rvalue]." ";

			if ($reptoint[$rvalue]>0 && !is_numeric($rkey)) 
			{
				$key = preg_replace('/[0-9]/', '', $rkey);
				$krow[$key] = $reptoint[$rvalue];
				if ($row['level']>60) $kcount++;
			}
		}
		$wowdb->free_result($rresult);
	}
	if ($selectp != '')
	{
		// parts search (only the remaining ones!)
		$queryp = "SELECT members.name".$selectp." 
			FROM `".ROSTER_ITEMSTABLE."` items 
			LEFT JOIN `".ROSTER_MEMBERSTABLE."` members ON members.member_id = items.member_id 
			WHERE items.member_id = ".$row['member_id']." AND (".$wherep.") 
			GROUP BY members.name ORDER BY members.name ASC";
		$presult = $wowdb->query($queryp) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$queryp);
		$prow = $wowdb->fetch_array($presult);
		if (is_array($prow))
		{
			foreach ($prow as $pkey => $pvalue)
			{
				if ($pvalue == 1 && !is_numeric($pkey))
				{
					++$kcount;
					$key = preg_replace('/[0-9]/', '', $pkey);
					$step = preg_replace('/[A-Za-z]/', '', $pkey);
					list($junk,$milestone) = explode('||',$items[$key][$step]);
					if ($milestone == 'MS')
					{
						$krow[$key] = '0';
						for ($i=1;$i<=$step;$i++)
						{
							$krow[$key] .= "|".$i;
						}
					}
					else
					{
						$krow[$key] .= "|".$step;
					}
				}
			}
		}
		$wowdb->free_result($presult);
	}
	if ($selectq != '')
	{
		// quests search (only the remaining ones!)
		$queryq = "SELECT members.name".$selectq." 
			FROM `".ROSTER_QUESTSTABLE."` quests 
			LEFT JOIN `".ROSTER_MEMBERSTABLE."` members ON members.member_id = quests.member_id 
			WHERE quests.member_id = ".$row['member_id']." AND (".$whereq.") 
			GROUP BY members.name ORDER BY members.name ASC";
		$qresult = $wowdb->query($queryq) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$queryq);
		$qrow = $wowdb->fetch_array($qresult);
		if (is_array($qrow))
		{
			foreach ($qrow as $qkey => $qvalue)
			{
				if ($qvalue == 1 && !is_numeric($qkey))
				{
					++$kcount;
					$key = preg_replace('/[0-9]/', '', $qkey);
					$step = preg_replace('/[A-Za-z]/', '', $qkey);
					$krow[$key] = $step;
				}
			}
		}
		$wowdb->free_result($qresult);
	}

	if ($kcount == 0)
	{
		continue; // nothing to display -> next player
	}

	// ========================================================================
	// ----------------------------> DISPLAY CODE <----------------------------
	// ========================================================================
	++$striping_counter;
	print '<tr>'."\n";
	$acount = 0;
	rankLeft((($striping_counter % 2) +1));
	print '<a href="char.php?name='.$row['name'].'&amp;server='.$roster_conf['server_name'].'">'.$row['name'].'</a><br />'.$row['class'].' ('.$row['level'].')</td>'."\n";
	foreach ($items as $key => $data)
	{
		
		++$acount;
		if($acount == count($items))
		{
			rankRight((($striping_counter % 2) +1));
		}
		else
		{
			rankMid((($striping_counter % 2) +1));
		}
		//echo $krow[$key];
		if ($krow[$key] == '-2')
		{
			$iname = $wordings[$row['clientLocale']]['thievestools'];
			$iquery = "SELECT * FROM `".ROSTER_ITEMSTABLE."` WHERE `item_name` = '".$iname."' AND `member_id` = '".$row['member_id']."'";
			$iresult = $wowdb->query($iquery);
			$idata = $wowdb->fetch_assoc($iresult);
			$item = new item($idata);
			print $item->out($key);
		}
		else if ($krow[$key] == '-1')
		{
			list($iname, $thottnum) = explode('|', $data[$key]);
			if(isset($$key))
			{
				print($$key);
				continue;
			} else {
				$iquery = "SELECT * FROM `".ROSTER_ITEMSTABLE."` WHERE `item_name` = '".$iname."' AND `member_id` = '".$row['member_id']."'";
				$iresult = $wowdb->query($iquery);
				$idata = $wowdb->fetch_assoc($iresult);
				$item = new item($idata);
				$$key = $item->out();
				print $$key;
			}
		}
		else if ($krow[$key] == '0')
		{
			print '&nbsp;';
		}
		else if ($krow[$key] == '')
		{
			print '&nbsp;';
		}
		else
		{
			list($iname, $thottnum) = explode('|', $items[$key][$key]);
			$qcount = count($items[$key])-2;    //number of parts/quests
			if ($items[$key][0] == 'Quests' || $items[$key][0] == 'Reputation')    //-> $krow[$key] = "5" (e.g.)
			{
				$bcount = $krow[$key];
			}
			else
			{                             //-> $krow[$key] = "0|1|2|3" (e.g.)
				$parray = explode('|',$krow[$key]); //array for completed parts
				$bcount = count($parray)-1;
			}

			$tooltip_h = $key.' '.$wordings[$row['clientLocale']]['key'].' Status';
			$tooltip = '<span style="color:#'.$colorcmp.'">'.$wordings[$row['clientLocale']]['completedsteps'].'</span><br />';
			if ($items[$key][0] == 'Quests')
			{
				$tooltip .= '<span style="color:#'.$colorcur.'">'.$wordings[$row['clientLocale']]['currentstep'].'</span><br />';
			}
			$tooltip .= '<span style="color:#'.$colorno.'">'.$wordings[$row['clientLocale']]['uncompletedsteps'].'</span><br /><br />';
			if ($items[$key][0] == 'Quests')
			{
				for ($i=1;$i<count($items[$key])-1;$i++)
				{
					if ($krow[$key]>$i)
						$color = $colorcmp;
					else if ($krow[$key]==$i)
						$color = $colorcur;
					else
						$color = $colorno;
					list($qname,$junk) = explode('|',$items[$key][$i]);
					$qname = preg_replace('/\\\/', '', $qname);
					$tooltip .= '<span style="color:#'.$color.'">'.$i.': '.$qname.'</span><br />';
				}
			}
			elseif ($items[$key][0] == 'Reputation')
			{
			
			    list($rname,$rtarget) = explode('|',$items[$key][1]);
			    $qcount = $reptoint[$rtarget];
			    if ($krow[$key]>=$qcount)
				$color = $colorcmp;
			    else
				$color = $colorno;
			    $rname = preg_replace('/\\\/', '', $rname);

			    $queryR="SELECT reputation.name, reputation.standing, reputation.curr_rep, reputation.max_rep  
					FROM `".ROSTER_REPUTATIONTABLE."` reputation 
					LEFT JOIN `". ROSTER_MEMBERSTABLE."` members ON members.member_id = reputation.member_id 
					WHERE reputation.member_id = ".$row['member_id']." 
					AND reputation.name='".addslashes ($rname)."'";
			    $Rresult = $wowdb->query($queryR) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$queryR);
				$Rrow = $wowdb->fetch_array($Rresult);
				if (is_array($Rrow))
				{
					$rname.=" : ".$Rrow['curr_rep']."/".$Rrow['max_rep']." ".$Rrow['standing'];
				}

			    $tooltip .= '<span style="color:#'.$color.'">'.$rname.'</span><br />';
			
				for ($i=1;$i<=$qcount;$i++)
				{
					if ($krow[$key]>=$i)
						$color = $colorcmp;
					else
						$color = $colorno;
					$tooltip .= '<span style="color:#'.$color.'">- '.$inttorep[$i].'</span><br />';
				}
			
			}
			else
			{
				$j=1;
				for ($i=1;$i<count($items[$key])-1;$i++)
				{
					if ($j < count($parray) && $parray[$j] == $i)
					{
						$color = $colorcmp;
						$j++;
					}
					else
					{
						$color = $colorno;
					}
					list($pname,$junk) = explode('|',$items[$key][$i]);
					$pname = preg_replace('/\\\/', '', $pname);
					$tooltip .= '<span style="color:#'.$color.'">'.$i.': '.$pname.'</span><br />';
				}
			}

			$pcent = round(($bcount/$qcount) * 100);

			echo '<div style="cursor:default;" '.makeOverlib($tooltip,$tooltip_h,'',2).'>'."\n";
			print '<a href="'.$itemlink[$row['clientLocale']].urlencode(utf8_decode($iname)).'" target="_blank">'."\n";
			print '<span class="name">'.substr($items[$key][0], 0, 5).'</span></a>'."\n";

			print '<div class="levelbarParent" style="width:40px;"><div class="levelbarChild">'.$bcount.'/'.$qcount.'</div></div>'."\n";
			print '<table class="expOutline" border="0" cellpadding="0" cellspacing="0" width="40">'."\n";
			print "<tr>\n";
			print '<td style="background-image: url(\''.$roster_conf['img_url'].'expbar-var2.gif\');" width="'.$pcent.'%"><img src="'.$roster_conf['img_url'].'pixel.gif" height="14" width="1" alt=""></td>'."\n";
			print '<td width="'.(100 - $pcent).'%"></td>'."\n";
			print "</tr>\n</table>\n</div>\n";
		}

		print "</td>\n";
	}
	print("  </tr>\n");
	$wowdb->free_result($kresult);
}
$wowdb->free_result($result);

print($tableFooter);
borderBottom();

?>