<?php
/**
 * WoWRoster GuildSpeak - TeamSpeak 2 and Ventrilo for WoWRoster
 * 
 * Addon based on Gryphon, LLC's gllcts2 version 4.2.5
 * and the Ventrilo Server Monitor Script
 *
 * @author Mike DeShane (mdeshane@pkcomp.net)
 * @copyright 2006-2008 Mike DeShane, US
 * @package WoWRoster GuildSpeak
 * @subpackage Index
 * 
 */

include($addon['inc_dir'] . 'db_inc.php');

if ($addon['config']['guildspeak_server_mode'] == 1)
{

      // Set UI Configs to templates
      $roster->tpl->assign_block_vars('ts_style', array(
            'VERSION'      => $wpost2version,
            'PAGETITLE'    => $addon['config']['guildspeak_ts_pagetitle'],
            'CATROWCOLOR1' => $addon['config']['guildspeak_ts_catrowcolor1'],
	     'CATTXTCOLOR'     => $addon['config']['guildspeak_ts_cattxtcolor'],
	     'ROWCOLOR1' => $addon['config']['guildspeak_ts_rowcolor1'],
            'LSTTXTCOLOR'     => $addon['config']['guildspeak_ts_lsttxtcolor'],
	     'LSTLNKCOLOR' => $addon['config']['guildspeak_ts_lstlnkcolor'],
	     'LSTVLNKCOLOR'     => $addon['config']['guildspeak_ts_lstvlnkcolor'],
	     'LSTALNKCOLOR' => $addon['config']['guildspeak_ts_lstalnkcolor'],
	     'LSTHVRCOLOR'     => $addon['config']['guildspeak_ts_lsthvrcolor'],
	     'CATLNKCOLOR' => $addon['config']['guildspeak_ts_catlnkcolor'],
	     'CATHVRCOLOR'     => $addon['config']['guildspeak_ts_cathvrcolor'],
	     'REFRESH' => $addon['config']['guildspeak_ts_refresh'],
	     'REFRESHTIME'     => $addon['config']['guildspeak_ts_refreshtime'],
	     'BODYBGCOLOR' => $addon['config']['guildspeak_ts_bodybgcolor'],
	     'BODYTXTCOLOR'     => $addon['config']['guildspeak_ts_bodytxtcolor'],
	     'BODYLNKCOLOR' => $addon['config']['guildspeak_ts_bodylnkcolor'],
	     'BODYVLNKCOLOR'     => $addon['config']['guildspeak_ts_bodyvlnkcolor'],
	     'BODYALNKCOLOR' => $addon['config']['guildspeak_ts_bodyalnkcolor'],
	     'TICKERREFRESH' => $tickerrefresh,
	     'TICKERMARG' => $tickermarg,
	     )
      );

      $roster->tpl->set_filenames(array('ts_style' => $addon['basename'] . '/tpl_style.html'));
      $roster->tpl->display('ts_style');

      if ($addon['config']['guildspeak_ts_showgroups'] == '1') {
      header ('location: ' . makelink('util-guildspeak-group'));
      } else {
      header ('location: ' . makelink('util-guildspeak-listing'));
      }
} 
elseif ($addon['config']['guildspeak_server_mode'] == 0)
{
      if($addon['config']['guildspeak_vent_mode'] == 1)
      {
            include($addon['inc_dir'] . 'ventrilostatus.php');
            include($addon['inc_dir'] . 'ventrilodisplay.php');
      
            // Set Ventrilo status settings
            $vstat = new CVentriloStatus;
            $vstat->m_cmdprog	= $addon['config']['guildspeak_vent_prog'];	// Adjust accordingly.
            $vstat->m_cmdcode	= $addon['config']['guildspeak_vent_code'];					// Detail mode.
            $vstat->m_cmdhost	= $addon['config']['guildspeak_vent_host'];			// Assume ventrilo server on same machine.
            $vstat->m_cmdport	= $addon['config']['guildspeak_vent_port'];				// Port to be statused.
            $vstat->m_cmdpass	= $addon['config']['guildspeak_vent_pass'];					// Status password if necessary.

            $rc = $vstat->Request();
            if ( $rc )
            {
	           roster_die("CVentriloStatus->Request() failed.<br>\n<strong>$vstat->m_error</strong><br>\n", "GuildSpeak Error", "sred");
            }
      
            // Create ventrilo web link
            $weblink = "ventrilo://$vstat->m_cmdhost:$vstat->m_cmdport/servername=$vstat->m_name";

            if ($addon['config']['guildspeak_vent_disp'] == 1) //Basic
            {
                  include($addon['inc_dir'] . 'ventriloinfo.php');
            
                  $display = VentriloInfo1( $vstat );
            
            }
            elseif ($addon['config']['guildspeak_vent_disp'] == 2) //Classic
            {
                  $name = "";
                  $display = "<center><table width=\"95%\" border=\"0\">\n";
                  $display .= VentriloDisplay2( $vstat, $name, 0, 0 );
                  $display .= "</table></center>\n";
            }
            elseif ($addon['config']['guildspeak_vent_disp'] == 3) //Roster
            {
                  $name = "Lobby";

                  $display = "<center><table width=\"95%\" border=\"0\">\n";
                  $display .= VentriloDisplay1( $vstat, $name, 0, 0 );
                  $display .= "</table></center>\n";
            }
            return $display;
      }
      elseif($addon['config']['guildspeak_vent_mode'] == 0)
      {
            require_once($addon['inc_dir'] . 'vent.inc.php');

            $vent = new Vent;
            $vent->setTimeout( 300000 );		// 300 ms timeout

            if($vent->makeRequest( 2, $addon['config']['guildspeak_vent_host'], $addon['config']['guildspeak_vent_port'], $addon['config']['guildspeak_vent_pass'] ))
            {
                  $res = array(
                  'NAME' => '',
                  'PHONETIC' => '',
                  'COMMENT' => '',
                  'AUTH' => '',
                  'MAXCLIENTS' => '',
                  'VOICECODEC' => '',
                  'VOICEFORMAT' => '',
                  'UPTIME' => '',
                  'PLATFORM' => '',
                  'VERSION' => '',
                  'CHANNELCOUNT' => '',
                  'CLIENTCOUNT' => '',
                  'CLIENTFIELDS' => '',
                  'CLIENT:' => '',
                  );
                  $clientarr = array();
                  $cfields = array();
                  
                  $response = $vent->getResponse();
                  
                  // Start sorting and cleaning the string into an array
                  foreach($res as $key => $value)
                  {
                        $res[$key] = strstr($response, $key); 
                  }
                  
                  foreach($res as $key => $value)
                  {
                        $res[$key] = str_replace($key.":", "", $value);
                  }
                  foreach($res as $key => $value)
                  {
                        $res[$key] = strstr($response, $key);
                        
                        next($res);
                        $ckey = key($res);
                        if($ckey != false && array_key_exists($ckey, $res))
                        {
                              $str = $ckey.':'; // Our Key text
                              $re1='(?-i:)';    // Case Sensitive
                              $re2='((?:[a-z][a-z]+))';	// Word 1
                              $re3='(:)';	// Any Single Character 1

                              $tempres = substr($value, 0, strpos($value, $ckey));
                              if ($c=preg_match_all ("/".$re1.$re2.$re3."/is", $str, $matches))
                              {
                                    $ws1=$matches[1][0];
                                    $word1=$matches[2][0];
                                    $c1=$matches[3][0];
                                    $tempres2 = str_replace($ws1.$word1.$c1, '', $tempres);
                                    $res[$key] = trim($tempres2);
                              }
                        }
                  }
                  // Clean up the client fields
                  $cfields = explode(',', $res['CLIENTFIELDS']);
                  $parse = str_replace(',', '&', $res['CLIENT:']);
                  parse_str($parse, $clientarr);
                  $numcl = $res['CLIENTCOUNT']; 
                  for($i=1; $i == $numcl;)
                  {
                        foreach($clientarr as $key => $value)
                        {
                              if($key == 'CLIENT:_ADMIN')
                              {
                                    unset($clientarr[$key]); // Drop the bad key
                                    $clientarr['ADMIN'] = $value; // Replace with the good one
                              }
                        }
                        $clients[$i] = array();
                        foreach($cfields as $value)
                        {
                              $clients[$i][$value] = $clientarr[$value];
                        }
                        $i++;
                  }
                  
                  $display = ''; 
                  foreach($res as $key =>$value)
                  {
                        $display .= '<u><b>'.$key.'</b></u>:  '.$value.'<br>';
                  }
                  print $display.'<u><b>Client Fields</u></b>: ';
                  print_r($cfields);
                  print '<br><u><b>Client Array</u></b>: ';
                  print_r($clientarr);
                  print '<br><u><b>Clients</u></b>: ';
                  print_r($clients);
            }
      }
}
else
{
      roster_die('Please check your GuildSpeak server settings and try again.', 'GuildSpeak Error', 'sred');
}

