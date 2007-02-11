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

class RtImport extends EQdkp_Admin
{
    var $RTerrors;


    function RtImport()
    {
        global $db, $eqdkp, $user, $tpl, $pm;
        global $SID;

        parent::eqdkp_admin();

        $this->assoc_buttons(array(
            'parse' => array(
                'name'    => 'parse',
                'process' => 'process_parse',
                'check'   => 'a_raid_add'),
            'form' => array(
                'name'    => '',
                'process' => 'display_form',
                'check'   => 'a_raid_add'),
        		)
        );
        $this->RTerrors = array();
        $this->sanitizeConfig();
    }


    function process_parse() {
        global $db, $eqdkp, $user, $tpl, $pm;
        global $SID;
        $template = 'rtimport_step2.html';
        $tpl->assign_vars(array(
            'L_ERROR'    => ''));


        if(strlen($_REQUEST['xml'])) {


            $xml = $this->stripslashes($_REQUEST['xml']);
            $options = array();

            if(isset($GLOBALS['rtimport_qualityThreshold'])) $options['qualityThreshold'] = $GLOBALS['rtimport_qualityThreshold'];
            if(isset($GLOBALS['rtimport_forceItems'])) $options['forceItems'] = $GLOBALS['rtimport_forceItems'];
            if(isset($GLOBALS['rtimport_ignoreItems'])) $options['ignoreItems'] = $GLOBALS['rtimport_ignoreItems'];
            if(isset($GLOBALS['rtimport_ignoreLooter'])) $options['ignoreLooter'] = $GLOBALS['rtimport_ignoreLooter'];

            if(preg_match('|^\d{2}:\d{2}$|', trim($_REQUEST['startTime']) )) $options['startTime'] = $_REQUEST['startTime'];
            if(preg_match('|^\d{2}:\d{2}$|', trim($_REQUEST['endTime']) )) $options['endTime'] = $_REQUEST['endTime'];
            $parser = new RTLogParse($options);
            // Save the parser to the session.
            $_SESSION['dkp_parser'] = &$parser;

            $result = $parser->process($xml);
            if(!$result) {
                return $this->display_form($user->lang['rtimport_invalid_xml_data']);
            } else {
                list($players, $loot, $events) = $this->initializeImport($parser);
                $this->prepare_confirmation($parser->players, $parser->items, $events);
            }
        } else {
            if(strlen($_REQUEST['step2'])) {
                list($players, $items, $events) = $this->validate_confirmation();
                if($_REQUEST['insert'] && !count($this->RTerrors)) {
                    $this->insert($players, $items, $events);
                    header('Location: done.php');
                    exit;
                } else {
                    $this->prepare_confirmation($players, $items, $events);
                }
            } else {
                return $this->display_form($user->lang['rtimport_no_xml_data']);
            }
        }


        $eqdkp->set_vars(array(
            'page_title'        => sprintf($user->lang['admin_title_prefix'], $eqdkp->config['guildtag'], $eqdkp->config['dkp_name']).': '.$user->lang['rtimport_step2'],
            'template_path'     => $pm->get_data('rtimport', 'template_path'),
            'template_file'     => $template,
            'display'           => true,
            )
        );

    }

    function initializeImport(&$parser) {
        global $db, $eqdkp, $user, $tpl, $pm;
        global $SID;

        $events = array();

        $raidindex = 0;

        $raid_ids=array();

// Set up events
        // Set up on time event.
        if(isset($GLOBALS['rtimport_raids']['onTime'])) {
            $events[$raidindex] = array('event_locked' => 1,
                           'event_id' => $raidindex,
                           'event' => $parser->zone,
                           'name' => $user->lang['rtimport_ontime_bonus'],
                           'value' => sprintf("%02.2f", $GLOBALS['rtimport_raids']['onTime']),
                           'time' => date('Y-m-d H:i:s', strtotime($parser->onTimeThreshold)-1),
                           'players' => array() );

            $raid_ids['onTime']=$raidindex;
            $raidindex++;
        }

        // Set up hour event.
        if(isset($GLOBALS['rtimport_raids']['hour'])) {
            $start = strtotime($parser->onTimeThreshold);
            $end = strtotime($parser->end);
            $endCap = strtotime($parser->endOfRaidThreshold);
            $time = $start;
            $i = 1;
            while($time < $end) {
                $events[$raidindex] = array('event_locked' => 1,
                                'event_id' => $raidindex,
                                'event' => $parser->zone,
                                'name' => $user->lang['rtimport_hour'].' '.$i,
                                'value' => sprintf("%02.2f", ($time < $endCap ? $GLOBALS['rtimport_raids']['hour'] : 0)),
                                'time' => date('Y-m-d H:i:s', $time), 'players' => array());

                $raid_ids['hours'][$i]=$raidindex;
                $raidindex++; $i++;
                $time += 3600;

            }
        }

        // Set up end of raid event.
        if(isset($GLOBALS['rtimport_raids']['endOfRaid'])) {
            $events[$raidindex] = array('event_locked' => 1,
                                'event_id' => $raidindex,
                                'event' => $parser->zone,
                                'name' => $user->lang['rtimport_endofraid_bonus'],
                                'value' => sprintf("%02.2f", $GLOBALS['rtimport_raids']['endOfRaid']),
                                'time' => date('Y-m-d H:i:s', strtotime($parser->endOfRaidThreshold)+1),
                                'players' => array());
            $raid_ids['endOfRaid']=$raidindex;
            $raidindex++;
        }

        // Set up end of raid event.
        if(isset($GLOBALS['rtimport_raids']['raid'])) {
            $events[$raidindex] = array('event_locked' => 1,
                                'event_id' => $raidindex,
                                'event' => $parser->zone,
                                'name' => $user->lang['rtimport_raid_bonus'],
                                'value' => sprintf("%02.2f", $GLOBALS['rtimport_raids']['raid']),
                                'time' => date('Y-m-d H:i:s', strtotime($parser->onTimeThreshold)-1),
                                'players' => array());
            $raid_ids['raid']=$raidindex;
            $raidindex++;
        }

        // Set up boss events
        foreach($parser->bosses as $b) {
            // Add time event for boss if no boss event was defined.
            if(!isset($GLOBALS['rtimport_raids']['bosses'][strtolower($b['name'])]) && !isset($GLOBALS['rtimport_raids']['bosses']['default'])) {
            	$time = strtotime($b['time']);
                if(is_array($raid_ids['hours']) && count($raid_ids['hours'])) {
                	foreach($raid_ids['hours'] as $k => $v) {
                	    if($time >= strtotime($events[$v]['time']) && $time < strtotime($events[$v]['time'])+3600) {
                	        $events[$v]['name'].=', '.$b['name'];
                	    }
                    }
                }
            } else {
                if(isset($GLOBALS['rtimport_raids']['bosses'][strtolower($b['name'])])) {
                    $bossbonus = $GLOBALS['rtimport_raids']['bosses'][strtolower($b['name'])];
                } else {
                    $bossbonus = $GLOBALS['rtimport_raids']['bosses']['default'];
                }
                $events[$raidindex] = array('event_locked' => 1,
                                'event_id' => $raidindex,
                                'event' => $parser->zone,
                                'name' => $b['name'],
                                'value' => sprintf("%02.2f", $bossbonus),
                                'time' => $b['time'],
                                'players' => array());
                $raid_ids['bosses'][strtolower($b['name'])]=$raidindex;
                $raidindex++;
            }
        }

// Set up players.
        $playerNames = array_keys($parser->players);
        $players = &$parser->players;

        if(isset($GLOBALS['rtimport_raids']['raidThreshold'])) {
            $attendancePercentage = $GLOBALS['rtimport_raids']['raidThreshold'];
        } else {
            $attendancePercentage = 90;
        }

        foreach($playerNames as $player) {
            // Add to on time raid
            if(isset($raid_ids['onTime'])) {
        	   if($players[$player]['onTime']) $events[$raid_ids['onTime']]['players'][]=$player;
            }

            // Add to end of raid
            if(isset($raid_ids['endOfRaid'])) {
        	   if($players[$player]['endOfRaid']) $events[$raid_ids['endOfRaid']]['players'][]=$player;
            }

            // Add to full raid
            if(isset($raid_ids['raid'])) {
        	   if($players[$player]['percentage'] >= $attendancePercentage) $events[$raid_ids['raid']]['players'][]=$player;
            }

            // Create mouseover block for joins / leaves
            $block2='';
        	for($i=0; $i<count($players[$player]['joins']); $i++) {
        	    $block2.=$players[$player]['joins'][$i].'<br/>';
        	    $block2.='<i>'.$players[$player]['leaves'][$i].'</i><br/>';
        	}

            $block3='';
            $a = count($players[$player]['oldjoins']);
            $b = count($players[$player]['oldleaves']);
            $c = $a > $b ? $a : $b;

        	for($i=0; $i<$c; $i++) {
        	    $block3.=$players[$player]['oldjoins'][$i].'<br/>';
        	    $block3.='<i>'.$players[$player]['oldleaves'][$i].'</i><br/>';
        	}


        	// Add to hourly attendance raids
        	$rows = count($players[$player]['hourAttendance'])+2;
        	$block = "<table cellspacing='0' cellpadding='0'><tr><td colspan='2'>".$player."</td><td rowspan='".$rows."' valign='top'>Joins/Leaves<br/>".$block2."</td><td rowspan='".$rows."' valign='top'>Raw Joins/Leaves<br/>".$block3."</td></tr><tr><td>Hour</td><td>Time (%)</td></tr>";
            if(is_array($players[$player]['hourAttendance'])) {
            	foreach($players[$player]['hourAttendance'] as $h => $time) {

            	    if($time >= 1800 || strtotime($events[$h+1]['time']) >= $endCap) {
            	        if(isset($raid_ids['hours'][$h+1])) {
            	           $events[$raid_ids['hours'][$h+1]]['players'][]=$player;
            	        }
            	    }

            	    $block.="<tr><td>".($h+1)."</td><td>".round(($time/3600)*100 , 2)."</td></tr>";
            	}
            }
        	$block .="</table>";

        	// Boss attendance for this player.
        	if(is_array($raid_ids['bosses'])) {
            	foreach($raid_ids['bosses'] as $k => $id) {
            	    $timestamp = strtotime($events[$id]['time']);
                	for($i=0; $i<count($players[$player]['joins']); $i++) {
                	    $join  = strtotime($players[$player]['joins'][$i]);
                	    $leave = strtotime($players[$player]['leaves'][$i]);
                	    if($join <= $timestamp && $leave >= $timestamp) {
                	        $events[$id]['players'][]=$player;
                	        break;
                	    }
                	}
            	}
        	}

        	// Set up alt assign
        	if(is_array($GLOBALS['rtimport_playerAliasses'])) {
                if(in_array(strtolower($player), array_keys($GLOBALS['rtimport_playerAliasses']))) {
    			   $players[$player]['alt'] = 'checked';
    			}
        	}

        	$_SESSION['joinLeaveTables'][$player]=addslashes($block);
        	$_SESSION['playerinfo']['join'][$player]=$players[$player]['firstJoin'];
        	$_SESSION['playerinfo']['leave'][$player]=$players[$player]['lastLeave'];
        	$_SESSION['playerinfo']['percentage'][$player]=$players[$player]['percentage'];
        	$_SESSION['playerinfo']['classes'][$player]=$players[$player]['class'];
        	$_SESSION['playerinfo']['races'][$player]=$players[$player]['race'];
        	$_SESSION['playerinfo']['levels'][$player]=$players[$player]['level'];
        }

        $loot = &$parser->items;
        if(is_array($loot)) {
            $dbupdater = new EqdkpDbUpdater();

            // Set the raid id's for the loot.
            $lootKeys = array_keys($loot);
            foreach($lootKeys as $key) {
                $l = &$loot[$key];

                if(isset($raid_ids['bosses'][strtolower($l['boss'])])) {
                    $l['event_id']=$raid_ids['bosses'][strtolower($l['boss'])];
                } else {
                    if(isset($raid_ids['hours'])) {
                        $time = strtotime($l['time']);
                        foreach($raid_ids['hours'] as $hour => $raid_id) {
                            $e = &$events[$raid_id];
                            if(strtotime($e['time']) <= $time && $time < (strtotime($e['time'])+3600) ) {
                                $l['event_id']=$e['event_id'];
                            }
                        }
                    }
                }

                if($l['value'] === null) {
                    if($GLOBALS['rtimport_DBItemValues']) {
                        $l['value'] = sprintf('%0.2f', $dbupdater->getLootValue($l['name']));
                    } else {
                        $l['value'] = '0.00';
                    }
                }
            }
        }


        return array(&$parser->players, &$loot, &$events);
    }

    function validate_confirmation() {
        global $db, $eqdkp, $user, $tpl, $pm;
        global $SID;

        $parser =& $_SESSION['dkp_parser'];

        // First retrieve all infomation.

        // Get event / boss info
        $bosses = array();
        $events = array();
        if(is_array($_REQUEST['event_event'])) {
            foreach($_REQUEST['event_event'] as $k=>$v) {
                    $k = $this->stripslashes(trim($k));
                    $v = $this->stripslashes(trim($v));
    	        	if(strlen($v)) {
        				$events[$k] = array(
        					'event_id' => $k,
        					'event' => $v,
        					'name' => $this->stripslashes(trim($_REQUEST['event_name'][$k])),                          // is actually the note field
        					'time' => $this->stripslashes(trim($_REQUEST['event_time'][$k])),
        					'value' => $this->stripslashes(trim($_REQUEST['event_value'][$k])),
        					'players' => array()
        				);

        				// Check the date
        				if(!$this->checkdate($events[$k]['time'])) {
        				    $this->RTerrors['events'][$k]['time']='Invalid date/time.';
        				}

        				// Check the value.
        				if(!strlen($events[$k]['value'])) {
        				    $events[$k]['value'] = '0.00';
        				}

        				if(!is_numeric($events[$k]['value'])) {
        				    $this->RTerrors['events'][$k]['value']='DKP value not numeric.';
        				} else {
        				    $events[$k]['value'] = sprintf("%02.2f", $events[$k]['value']);
        				}
    	        	}
            }
        }

        // Get Player info
        $players = array();
        if(is_array($_REQUEST['player_name'])) {
            foreach($_REQUEST['player_name'] as $k => $v) {
                $k = $this->stripslashes($k);
                if(isset($_SESSION['playerinfo']['join'][$k])) {
            		$player=array();
        			$player['firstJoin'] = $_SESSION['playerinfo']['join'][$k];
        			$player['lastLeave'] = $_SESSION['playerinfo']['leave'][$k];
        			$player['name'] = $this->stripslashes($_REQUEST['player_name'][$k]);
        			$player['percentage'] = $_SESSION['playerinfo']['percentage'][$k];
        			$player['class'] = $_SESSION['playerinfo']['classes'][$player['name']];
        			$player['level'] = $_SESSION['playerinfo']['levels'][$player['name']];
        			$player['race'] = $_SESSION['playerinfo']['races'][$player['name']];

           			if(isset($_REQUEST['player_alt'][$k])) {
           			    $player['alt']='checked';
           			} else {
           			    $player['alt']='';
           			}

           			$players[$k]=$player;


           			if(is_array($_REQUEST['player_event'][$k])) {
               			foreach($_REQUEST['player_event'][$k] as $eid => $e) {
               			    if(isset($events[$eid])) $events[$eid]['players'][]=$k;
               			}
           			}
                }
            }
        }

		// Get loot info
		$items = array();
		if(is_array($_REQUEST['loot_item'])) {
            foreach($_REQUEST['loot_item'] as $k => $v) {
            	if(strlen($v)) {
            		$loot=array();
            		$loot['event_id'] = $this->stripslashes($_REQUEST['loot_event_id'][$k]);
        			$loot['name'] = $this->stripslashes($_REQUEST['loot_item'][$k]);
        			$loot['player'] = $this->stripslashes($_REQUEST['loot_player'][$k]);
        			//$loot['boss'] = $_REQUEST['loot_boss'][$k];
        			$loot['time'] = $this->stripslashes($_REQUEST['loot_time'][$k]);
        			$loot['value'] = $this->stripslashes($_REQUEST['loot_value'][$k]);
           			$items[$k]=$loot;

           			if(!$this->checkdate($items[$k]['time'])) {
                        $this->RTerrors['loot'][$k]['time']='Invalid loot time.';
           			}
           			if(!isset($events[$loot['event_id']])) {
           			    $this->RTerrors['loot'][$k]['event_id']='No event selected for item.';
           			}
    				// Check the value.
    				if(!strlen($items[$k]['value'])) {
    				    $items[$k]['value'] = '0.00';
    				}

    				if(!is_numeric($items[$k]['value'])) {
    				    $this->RTerrors['loot'][$k]['value']='DKP value not numeric.';
    				} else {
    				    $items[$k]['value'] = sprintf("%02.2f", $items[$k]['value']);
    				}
        		}
            }
		}

        // Next check all data.

        return array($players, $items, $events);
    }

    function prepare_confirmation($players, $loots, $events) {
        global $db, $eqdkp, $user, $tpl, $pm;
        global $SID;


        if(!is_array($players)) $players = array();
        if(!is_array($loots)) $loots = array();
        if(!is_array($events)) $events = array();

    	foreach($events as $e) {
            $values = array(
	            'event_id' => $e['event_id'],
				'event' => htmlspecialchars($e['event']),
				'name' => htmlspecialchars($e['name']),
				'urlname' => urlencode($e['name']),
				'time' => htmlspecialchars($e['time']),
				'value' => htmlspecialchars($e['value']),
    		);

    		if(isset($this->RTerrors['events'][$e['event_id']])) {
    		    foreach($this->RTerrors['events'][$e['event_id']] as $k => $v) {
                    $values['error'] .= ', '.$v;
                    $values['error_'.$k.'_attr'] = ' style = "background : #ff8080;" ';
    		    }
    		    $values['error'] = substr($values['error'], 2);
            }

    		$tpl->assign_block_vars('event_row', $values);
    	}

    	// Set up players
    	foreach($players as $i => $player) {
    		$info = array(
    			'row_class' => $eqdkp->switch_row_class(),
    			'player_id' => $i,
    			'player_join' => htmlspecialchars($player['firstJoin']),
    			'player_leave' => htmlspecialchars($player['lastLeave']),
    			'player_name' => htmlspecialchars($player['name']),
    			'player_ontime' => $player['onTime'] ? 'checked' : '',
    			'player_endofraid' => $player['endOfRaid'] ? 'checked' : '',
    			'player_attendance' => $player['attendance'] ? 'checked' : '',
    			'player_percentage' => htmlspecialchars($player['percentage']),
    			'player_alt' => $player['alt'],
                'player_joinleavetable' => $_SESSION['joinLeaveTables'][$player['name']]

			);

			if(in_array(strtolower($player['name']), array_keys($GLOBALS['rtimport_playerAliasses']))) {
			    $info['PLAYER_ALTASSIGN'] = true;
			    $info['player_main'] = htmlspecialchars(ucfirst($GLOBALS['rtimport_playerAliasses'][strtolower($player['name'])]));

			} else {
			    $info['PLAYER_ALTASSIGN'] = false;
			}

			$tpl->assign_block_vars('player_row', $info);


			foreach($events as $id => $e) {
				$raid=array();

				if(in_array($player['name'], $e['players'])) {
					$raid=array('event_id' => $id, 'event_present' => 'checked');
				} else {
					$raid=array('event_id' => $id, 'event_present' => '');
				}

				$tpl->assign_block_vars('player_row.pevent_row', $raid);
			}

    	}

    	foreach($loots as $i => $loot) {
    		$info = array(
    			'row_class' => $eqdkp->switch_row_class(),
    			'loot_id' => $i,
    			'loot_event_id' => htmlspecialchars($loot['event_id']),
    			'loot_item' => htmlspecialchars($loot['name'], ENT_QUOTES),
    			'loot_player' => htmlspecialchars($loot['player'], ENT_QUOTES),
    			'loot_boss' => htmlspecialchars($loot['boss']),
    			'loot_time' => htmlspecialchars($loot['time']),
    			'loot_value' => htmlspecialchars($loot['value']),

			);

			if(isset($this->RTerrors['loot'][$i])) {
    		    foreach($this->RTerrors['loot'][$i] as $k => $v) {
                    $info['error'] .= ', '.$v;
                    $info['error_'.$k.'_attr'] = ' style = "background : #ff8080;" ';
    		    }
    		    $info['error'] = substr($info['error'], 2);
            }


			$tpl->assign_block_vars('loot_row', $info);

			foreach($events as $e) {
			    $raid = array();
			    $raid['event_name'] = htmlspecialchars($e['name']);
			    $raid['event_id'] =$e['event_id'];
			    if($loot['event_id'] == $e['event_id']) {
			        $raid['selected'] = ' selected';
			    } else {
			        $raid['selected'] = '';
			    }
			    $tpl->assign_block_vars('loot_row.levent_row', $raid);
			}
    	}

        if(count($this->RTerrors)) {
            $tpl->assign_vars(array('HIDE_INSERT' => 'display : none'));
        }

         $tpl->assign_vars(array(
            'F_PARSE_LOG'   => 'index.php' . $SID,
            'L_PASTE_LOG'   => $user->lang['rtimport_paste'],
            'L_PARSE_LOG'   => $user->lang['rtimport_parse'],
            'L_START_TIME'  => $user->lang['rtimport_start_time'],
            'L_END_TIME'    => $user->lang['rtimport_end_time'],
            'L_EVENTS'		=> $user->lang['rtimport_events'],
            'L_PLAYERS'		=> $user->lang['rtimport_players'],

            'L_EVENT'		=> $user->lang['rtimport_event'],
            'L_NOTE'		=> $user->lang['rtimport_note'],
            'L_VALUE'		=> $user->lang['rtimport_value'],
            'L_TIME'		=> $user->lang['rtimport_time'],

            'L_LOOT'		=> $user->lang['rtimport_loot'],

            'L_PLAYER'		=> $user->lang['rtimport_player'],
            'L_JOIN'		=> $user->lang['rtimport_join'],
            'L_LEAVE'		=> $user->lang['rtimport_leave'],
            'L_PERCENT'		=> $user->lang['rtimport_percent'],
            'L_ASSIGN_TO'	=> $user->lang['rtimport_assign_to'],

            'L_ITEM'	    => $user->lang['rtimport_item'],
            'L_LOOTED_BY'	=> $user->lang['rtimport_looted_by'],
            'L_LOOTED_FROM'	=> $user->lang['rtimport_looted_from'],
            'L_DKP_COST'	=> $user->lang['rtimport_dkp_cost'],
            'L_LOOT_TIME'	=> $user->lang['rtimport_loot_time'],
            'L_PERCENTAGE'	=> $user->lang['rtimport_percentage'],

            'L_CHECK'	    => $user->lang['rtimport_check'],
            'L_INSERT'	    => $user->lang['rtimport_insert'],

            'L_ERROR'       => $error
        	)
        );

    }

    function display_form($error = '') {
        global $db, $eqdkp, $user, $tpl, $pm;
        global $SID;

        $tpl->assign_vars(array(
            'F_PARSE_LOG'   => 'index.php' . $SID,
            'L_PASTE_LOG'   => $user->lang['rtimport_paste'],
            'L_PARSE_LOG'   => $user->lang['rtimport_parse'],
            'L_START_TIME'  => $user->lang['rtimport_start_time'],
            'L_END_TIME'    => $user->lang['rtimport_end_time'],
            'V_START_TIME'  => $GLOBALS['rtimport_startTime'],
            'V_END_TIME'    => $GLOBALS['rtimport_endTime'],
            'L_ERROR'       => $error
        	)
        );

        $eqdkp->set_vars(array(
            'page_title'        => sprintf($user->lang['admin_title_prefix'], $eqdkp->config['guildtag'], $eqdkp->config['dkp_name']).': '.$user->lang['rtimport_step1'],
            'template_path'     => $pm->get_data('rtimport', 'template_path'),
            'template_file'     => 'rtimport_step1.html',
            'display'           => true,
            )
        );

    }

    function insert($players, $loot, $events) {
    // Clean updates_done.
        $_SESSION['updates_done'] = '';

    // Preprocess before insertion.
        // Set up raid info per player
        $playerNames = array_keys($players);
        $eventKeys = array_keys($events);

        foreach($playerNames as $player) {
            if($players[$player]['alt'] == true && isset($GLOBALS['rtimport_playerAliasses'][strtolower($player)])) {
                // Assign this raid to the main.
                $main = ucfirst(strtolower($GLOBALS['rtimport_playerAliasses'][strtolower($player)]));
                $alt = true;
                if(isset($players[$main])) {
                    $current =& $players[$main];
                } else {
                    $current = array (
                        'name' => $main,
                        'class' => '',
                        'race' => '',
                        'level' => 0,
                        'events' => 0,
                        'earned' => 0,
                        'spent' => 0,
                    );

                    $players[$main] = $current;
                    $current =& $players[$main];
                }
            } else {
                // Normal assign.
                $current = &$players[$player];
                $alt = false;
                $main = null;
            }

            $early = 0;


            foreach($eventKeys as $eventKey) {
                $event =& $events[$eventKey];
                $index = array_search($player, $event['players']);
                if($index !== false) {
                    if($alt) {
                        // Remove the alt
                        unset($event['players'][$index]);

                        // Update data for main if main is not yet in there.
                        if(!in_array($main, $event['players'])) {
                            // Insert the main
                            $event['players'][$index]=$main;

                            // Adjust winnings for the main
                            $current['events']++;
                            $current['earned']+=$event['value'];

                        }
                    } else {
                        $current['events']++;
                        $current['earned']+=$event['value'];
                    }
                    if($early === 0 || strtotime($event['time']) < strtotime($early) ) $early = $event['time'];
                }
            }

            $current['raid_date'] = $early;
            $current['spent'] = 0;
        }

        // Set up spent dkp's per player
        foreach($loot as $l ){
            $players[$l['player']]['spent']+=$l['value'];
        }

    // Perform the actual insertion.
        $dbupdater = new EqdkpDbUpdater();

        // Update players in the database.
        $dbupdater->updatePlayers($players);

        // Add the events
        $dbupdater->updateEvents($events);

        // Add the events
        $dbupdater->updateLoot($loot);

        if($GLOBALS['rtimport_showQueries']) {
            foreach($dbupdater->queryList as $q) {
                 $ql =  "$q;<br/>\n";
                 $_SESSION['updates_done'].="<br/>Querylist<br/>\n".$ql;
            }
        }

        if($GLOBALS['rtimport_writeLog']) {
            $f = @fopen('log.txt', 'a');
            if($f) {
                fwrite($f, "---------\n".date('Y-m-d H:i:s')."$_SERVER[REMOTE_ADDR] $_SERVER[REMOTE_PORT]\n");
                fwrite($f, $_SESSION['updates_done']);
                fwrite($f, "---------\n\n");
                fclose($f);
            }
        }


        header('location : done.php');

    }

    function checkdate($date) {
        return ( $date == date('Y-m-d H:i:s', strtotime($date)) );
    }

    function stripslashes($value) {
        if(get_magic_quotes_gpc()) {
            return stripslashes($value);
        } else {
            return $value;
        }
    }
    
    function sanitizeConfig() {
    	// Make sure bosses are in lowercase
    	if(is_array($GLOBALS['rtimport_raids']['bosses'])) {
    		$bosses=array();
    		foreach($GLOBALS['rtimport_raids']['bosses'] as $k => $v) {
    			$bosses[strtolower($k)]=$v;
    		}
    		$GLOBALS['rtimport_raids']['bosses']=$bosses;
    	}
    	
    	
    }

}

?>
