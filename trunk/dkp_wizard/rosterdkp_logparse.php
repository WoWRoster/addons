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

require_once('xml_helper.php');

class ct_raidtracker
{
	var $raid_start = '21:00';       // Either H:i or Y-m-d H:i:s
	var $raid_end = '00:00';         // Either H:i or Y-m-d H:i:s

	var $quality_threshold = 2;
	var $items_forced = array();
	var $items_ignored = array();
	var $looters_ignored = array();

	var $zone_name = '';             // Name of the zone.
	var $raid_note = '';                 // Raid note.

	var $players = array();         // List of players and their attendance duration

	var $players_ontime = array();          // Players who where on time
	var $players_tillend = array();         // Players who where present end of raid
	var $players_ontimethreshold = null;    // Date / Time of the ontime mark.
	var $raid_endthreshold = null; // Date / Time of the end of raid mark.

	var $items = array();           // Loot array
	var $bosses = array();          // Bosses array
	var $zones = array();           // Bosses array

	var $log = '';                  // Holds the log string.
	var $error = '';                // Error

	/**
	* Internal data holders.
	*/
	var $start = null;
	var $end = null;
	var $boss_kills = null;
	var $zone = null;
	var $raidnote = null;
	var $player_info = null;
	var $loot = null;
	var $joins = null;
	var $leaves = null;

	function convert_date($string)
	{
		return preg_replace('|(\d+)/(\d+)/(\d+) (\d+):(\d+):(\d+)|', '20\3-\1-\2 \4:\5:\6', $string);
	}

	function ct_raidtracker($options = array() )
	{

		$this->xml = new xml_string();
		if(isset($options['raid_start']))
		{
			$this->raid_start = $options['raid_start'];
		}
		if(isset($options['raid_end']))
		{
			$this->raid_end = $options['raid_end'];
		}
		if(isset($options['gap_threshold']))
		{
			$this->gap_threshold = $options['gap_threshold'];
		}
		if(isset($options['quality_threshold']))
		{
			$this->quality_threshold = $options['quality_threshold'];
		}
		if(isset($options['items_forced']))
		{
			foreach($options['items_forced'] as $v)
			{
				$this->items_forced[]=strtolower($v);
			}
		}
		if(isset($options['items_ignored']))
		{
			foreach($options['items_ignored'] as $v)
			{
				$this->items_ignored[]=strtolower($v);
			}
		}
		if(isset($options['looters_ignored'])) {
			foreach($options['looters_ignored'] as $v) {
				$this->looters_ignored[]=strtolower($v);
			}
		}
	}

	function get_zone()
	{
		$zone = $this->xml->get('zone', $this->log);
		if(is_object($zone))
		{
			$this->zone = $zone->get_content();
		}
	}

	function get_start()
	{
		$start = $this->xml->get('start', $this->log);
		if(is_object($start))
		{
			$this->start = $this->convert_date($start->get_content());
		}
	}

	function get_end()
	{
		$end = $this->xml->get('end', $this->log);
		if(is_object($end))
		{
			$this->end = $this->convert_date($end->get_content());
		}
	}

	function get_raidnote()
	{
		$raid_note = $this->xml->get('note', $this->log);
		if(is_object($raid_note))
		{
			$this->note = $raid_note->get_content();
		}
	}

	function get_bosskills()
	{
		$this->boss_kills = $this->xml->get('BossKills', $this->log);
	}

	function get_loot()
	{
		$this->loot = $this->xml->get('Loot', $this->log);
	}

	function get_joins()
	{
		$this->joins = $this->xml->get('Join', $this->log);
	}

	function get_leaves()
	{
		$this->leaves = $this->xml->get('Leave', $this->log);
	}

	function get_playerinfo()
	{
		$this->player_info = $this->xml->get('PlayerInfos', $this->log);
	}

	function parse_bosses()
	{
		$tmpbosses = array();
		if(is_array($this->boss_kills->children))
		{
			foreach($this->boss_kills->children as $child)
			{
				$boss = array();
				foreach($child->children as $i)
				{
					switch($i->tagname)
					{
						case 'name':
							$boss['name']=$i->get_content();
							break;
						case 'time':
							$boss['time']=$this->convert_date($i->get_content());
							break;
					}
				}
				$tmpbosses[$boss['time']]=$boss;
			}
		}

		ksort($tmpbosses);
		foreach($tmpbosses as $boss)
		{
			$this->bosses[$boss['name']]=$boss;
		}
	}

	function parse_loot()
	{
		$tmpitems = array();
		if(is_array($this->loot->children))
		{
			foreach($this->loot->children as $child)
			{
				$item = array();
				foreach($child->children as $i)
				{
					switch($i->tagname)
					{
						case 'ItemName':
							$item['name']=utf8_decode($i->get_content());
							break;
						case 'Color':
							$item['quality']=$this->get_qualitybycolor($i->get_content());
							break;
						case 'Player':
							$item['player']=ucfirst(strtolower(utf8_decode($i->get_content())));
							break;
						case 'Time':
							$item['time']=$this->convert_date($i->get_content());
							break;
						case 'Zone':
							$item['zone']=$i->get_content();
							break;
						case 'Boss':
							$item['boss']=$i->get_content();
							break;
						case 'Note':
							$item['note']=$i->get_content();
							break;
					}
				}

				if( ($item['quality'] >= $this->quality_threshold || in_array(strtolower($item['name']), $this->items_forced)) && !in_array(strtolower($item['name']), $this->items_ignored) && !in_array(strtolower($item['player']), $this->looters_ignored))
				{
					// Save zone if it's not known yet
					if(strlen($item['zone']))
					{
						if(!isset($this->zones[$item['zone']])) $this->zones[$item['zone']]=array('name' => $item['zone']);
					}

					// Save boss zone if it's not known yet
					if(strlen($item['boss']))
					{
						if(isset($this->bosses[$item['boss']])) $this->bosses[$item['boss']]['zone']=$item['zone'];
					}

					// Get item value if it's supplied.
					if(preg_match('|[-] ([0-9.]+) DKP|i', $item['note'], $match))
					{
						$item['value'] = sprintf('%0.2f', $match[1]);
					}
					else
					{
						$item['value'] = null;
					}
					$tmpitems[$item['time']]=$item;
				}
			}
		}
		ksort($tmpitems);
		$this->items=$tmpitems;
	}

	function parse_players()
	{
		// Get player data
		if(is_array($this->player_info->children))
		{
			foreach($this->player_info->children as $child)
			{
				$currentplayer = array();
				foreach($child->children as $element)
				{
					switch(strtolower($element->tagname))
					{
						case 'name':
							$currentplayer['name'] = ucfirst(strtolower(utf8_decode($element->get_content())));
							break;
						case 'class':
							$currentplayer['class'] = $element->get_content();
							break;
						case 'race':
							$currentplayer['race'] = $element->get_content();
							break;
						case 'level':
							$currentplayer['level'] = $element->get_content();
							break;
					}
				}
				$this->players[$currentplayer['name']] = $currentplayer;
			}
		}

		$joins = array();
		$leaves = array();

		// Get join data
		if(is_array($this->joins->children))
		{
			foreach($this->joins->children as $child)
			{
				$currentplayer = array();
				foreach($child->children as $element)
				{

					switch($element->tagname)
					{
						case 'player':
							$currentplayer['name'] = ucfirst(strtolower(utf8_decode($element->get_content())));
							break;
						case 'time':
							$currentplayer['time'] = $this->convert_date($element->get_content());
							break;
					}
				}
				$this->players[$currentplayer['name']]['joins'][]=$currentplayer['time'];
			}
		}

		// Get leave data and find latest leave time
		$last_leave = 0;
		if(is_array($this->leaves->children))
		{
			foreach($this->leaves->children as $child)
			{
				$currentplayer = array();
				foreach($child->children as $element)
				{
					switch($element->tagname)
					{
						case 'player':
							$currentplayer['name'] =  ucfirst(strtolower(utf8_decode($element->get_content())));
							break;
						case 'time':
							$currentplayer['time'] = $this->convert_date($element->get_content());
							break;
					}
				}

				$this->players[$currentplayer['name']]['leaves'][]=$currentplayer['time'];
				if(strtotime($currentplayer['time']) > $last_leave) $last_leave = $currentplayer['time'];
			}
		}


		// Set raid end time to latest leave time if none has been recorded.
		if(is_null($this->end))
		{
			$this->end = date('Y-m-d H:i:s', $last_leave);
		}

		// Clean up joins and leaves.
		$playerNames = array_keys($this->players);
		foreach($playerNames as $player)
		{
			if(!is_array( $this->players[$player]['joins']))
			{
				$this->players[$player]['joins']=array();
			}
			if(!is_array( $this->players[$player]['leaves']))
			{
				$this->players[$player]['leaves']=array();
			}
		}

		// Calculate on time threshold value
		$players_ontimethreshold = strtotime(substr($this->start, 0, 10).' '.$this->raid_start);

		// Calculate end of raid threshold value
		$raid_endthreshold  = strtotime(substr($this->start, 0, 10).' '.$this->raid_end);
		if($raid_endthreshold < $players_ontimethreshold)
		{
			$raid_endthreshold = mktime(date('H', $raid_endthreshold), date('i', $raid_endthreshold), date('s', $raid_endthreshold), date('m', $raid_endthreshold), (date('d', $raid_endthreshold) +1), date('Y', $raid_endthreshold));
		}

		$this->was_ontimeThreshold = date('Y-m-d H:i:s', $players_ontimethreshold);
		$this->stay_tillendThreshold = date('Y-m-d H:i:s', $raid_endthreshold);

		foreach($playerNames as $player)
		{
			// Get a reference to the data array.
			$playerdata = &$this->players[$player];

			$jp = array();
			// Sort joins and parts and remove inconsistencies.
			foreach($playerdata['joins'] as $j)
			{
				$time = strtotime($j);
				$jp[$time]='join';
			}

			foreach($playerdata['leaves'] as $j)
			{
				$time = strtotime($j);
				//if(isset($jp[$time]) && $jp[$time] != 'leave') $doubles[$time]='leave';
				if(isset($jp[$time]))
				{
					$jp[$time+1]='leave';
				}
				else
				{
					$jp[$time]='leave';
				}
			}

			// Remove multiples.
			ksort($jp);
			$count = 0;
			$keys = array_keys($jp);
			$joins = array();
			$leaves = array();
			$last = '';

			foreach($keys as $k)
			{
				if($jp[$k] == $last)
				{
					unset($jp[$k]);
				}
				else
				{
					$last=$jp[$k];
				}
			}

			ksort($jp);

			// Last one should be a leave event.
			if(end($jp) != 'leave')
			{
				$jp[strtotime($this->end)]='leave';
			}

			if(reset($jp) != 'join')
			{
				$jp[strtotime($this->start)]='join';
			}

			ksort($jp);

			foreach($jp as $k=>$v)
			{
				if($v=='join')
				{
					$joins[]=date('Y-m-d H:i:s', $k);
				}
				if($v=='leave')
				{
					$leaves[]=date('Y-m-d H:i:s', $k);
				}
			}

			$playerdata['oldjoins']=$playerdata['joins'];
			$playerdata['oldleaves']=$playerdata['leaves'];

			$playerdata['joins']=$joins;
			$playerdata['leaves']=$leaves;

			// Get first join and last leave timestamps
			$first_join = strtotime(reset($playerdata['joins']));
			$last_leave = strtotime(end($playerdata['leaves']));

			$playerdata['first_join'] = date('Y-m-d H:i:s', $first_join);
			$playerdata['last_leave'] = date('Y-m-d H:i:s', $last_leave);

			// Was the player on time?
			if($first_join < $players_ontimethreshold && $last_leave > $players_ontimethreshold)
			{
				$playerdata['was_ontime'] = true;
			}
			else
			{
				$playerdata['was_ontime'] = false;
			}

			// Check whether player was there at the end of the raid.
			if($last_leave > $raid_endthreshold && $first_join < $raid_endthreshold)
			{
				$playerdata['stay_tillend'] = true;
			}
			else
			{
				$playerdata['stay_tillend'] = false;
			}

			$totaltime = $this->get_attendancetime($playerdata, $players_ontimethreshold, $raid_endthreshold);
			$time = $players_ontimethreshold;

			while($time < $last_leave)
			{
				$hourtime = $this->get_attendancetime($playerdata, $time, ($time+3600 > $last_leave ? $last_leave : $time+3600) );
				$playerdata['time_perhour'][]=$hourtime;
				$time += 3600;
			}


			$stringtime = $this->get_time($totaltime);
			$playerdata['totaltime'] = $totaltime;
			$playerdata['stringtime'] = $stringtime;
			$playerdata['percentage']= round($totaltime / ($raid_endthreshold-$players_ontimethreshold) * 100);

		}
		ksort($this->players);
	}

	function get_attendancetime(&$playerdata, $start, $end)
	{
		// Cap time at thresholds.
		$totaltime = 0;

		for($i=0; $i<count($playerdata['joins']); $i++)
		{
			$j = strtotime($playerdata['joins'][$i]);
			$l = strtotime($playerdata['leaves'][$i]);
			if($l >= $start && $j <= $end)
			{
				$totaltime += ($l > $end ? $end : $l) - ($j < $start ? $start : $j);
			}
		}

		return $totaltime;
	}

	function get_qualitybycolor($color)
	{
		$color = strtolower($color);
		if($color == "ffff8000")
		{
			return 5;
		}
		elseif($color == "ffa335ee")
		{
			return 4;
		}
		elseif($color == "ff0070dd")
		{
			return 3;
		}
		elseif($color == "ff1eff00")
		{
			return 2;
		}
		elseif($color == "ffffffff")
		{
			return 1;
		}
		elseif($color == "ff9d9d9d")
		{
			return 0;
		}
		else
		{
			return false;
		}
	}

	function get_time($seconds)
	{
		$minutes = floor($seconds / 60);
		$seconds = $seconds - $minutes * 60;
		$hours = floor($minutes / 60);
		$minutes = $minutes - $hours * 60;
		return sprintf("%01d:%02d:%02d", $hours, $minutes, $seconds);
	}

	function process($log)
	{
		$this->log = trim(str_replace(array("\r", "\n"), '', $log));
		if(!preg_match('|<raidinfo>.*</raidinfo>|i', $this->log))
		{
			$this->error = 'Invalid logdata';
			return false;
		}

		// Convert to DOM tree
		$this->log = $this->xml->getRootNode($this->log);

		// Retrieve subtrees
		$this->get_start();
		$this->get_end();
		$this->get_zone();
		$this->get_raidnote();
		$this->get_bosskills();
		$this->get_loot();
		$this->get_playerinfo();
		$this->get_joins();
		$this->get_leaves();

		$this->parse_players();
		$this->parse_bosses();
		$this->parse_loot();

		return true;
	}
}


?>
