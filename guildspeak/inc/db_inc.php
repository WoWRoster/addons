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
 * @subpackage Database Functions
 * 
 */

$wpost2version = "4.2.5";
$server_timestamp = time();

$dbtable1 = $roster->db->table('weblist', $addon['basename']); // Table for servers
$dbtable2 = $roster->db->table('user', $addon['basename']); // Table for server details
$dbtable3 = $roster->db->table('channel', $addon['basename']); // Table for server details
$dbtable4 = $roster->db->table('group', $addon['basename']); // Table for server isp groups

// main db info
function db_main()
{
      global $roster,$addon;

      $main_db = $roster->db;
      if (!$main_db) {
            echo "Could not connect to main MySQL.";
            exit();
      }
      return $main_db;
}

// count queries
function qcount($query_count)
{
      return $query_count;
}

function query($query)
{
      global $roster, $addon, $query_count;
      $query_count++;
      qcount($query_count);

      $result = $roster->db->query($query);
      if (!$result) {
            echo "MySQL Error in [ <b>".$query."</b> ]: ".$roster->db->error()."<br><br>Please contact a the site admin immediately.<br>";
            exit();
      }
      return $result;
}

// connect to the main db
$main_db = db_main();

function mod($f,$g)
{
      $r = floor($f / $g);
      $f = $f - ($r * $g);
      return $f;
}

function getuptime($var2,$var3)
{
      $r = floor($var2);
      $uptimes = mod($r,60);

      $r = floor($r / 60);
      $uptimem = mod($r,60);

      $r = floor($r / 60);
      $uptimeh = mod($r,24);

      $uptimed = number_format(floor($r / 24));

      if ($var3 == 'server') {
            return ''.$uptimed.'d '.$uptimeh.'h<br>'.$uptimem.'m '.$uptimes.'s';
      } else {
            return ''.$uptimed.'d'.$uptimeh.'h'.$uptimem.'m';
      }
}

function getlogindetail($var3)
{
      global $roster, $addon, $dbtable1;
      $logindata = $roster->db->query("SELECT * FROM $dbtable1 WHERE server_id='$var3'");
      $servername = str_replace(" ", "", $logindata[12]);
      $servername = preg_replace("/[^0-9a-z -#]/i",'', $servername);

      global $channel;

      $channel = stripslashes($channel);

      include($addon['tpl_dir'] . 'tpl_login.php');
}

function getservercount()
{
      global $roster, $addon, $dbtable1;
      $sql = $roster->db->query("SELECT * FROM $dbtable1");
      $servercount = number_format($roster->db->num_rows($sql));
      echo ''.$servercount.'';
}

function getgroupcount()
{
      global $roster, $addon, $dbtable4;
      $sql = $roster->db->query("SELECT * FROM $dbtable4");
      $groupcount = number_format($roster->db->num_rows($sql));
      echo ''.$groupcount.'';
}

function getactiveservercount()
{
      global $roster, $addon, $dbtable1;
      $sql = $roster->db->query("SELECT * FROM $dbtable1 WHERE clients_current > 0");
      $activeservercount = number_format($roster->db->num_rows($sql));
      return ''.$activeservercount.'';
}

function getchannelcount()
{
      global $roster, $addon, $dbtable3;
      $sql = $roster->db->query("SELECT * FROM $dbtable3");
      $channelcount = number_format($roster->db->num_rows($sql));
      echo ''.$channelcount.'';
}

function gettotalonline()
{
      global $roster, $addon, $dbtable1;
      $users = '0';
      $sql = $roster->db->query("SELECT * FROM $dbtable1 WHERE clients_current > 0");
      $servercount = number_format($roster->db->num_rows($sql));
      while ($row = $roster->db->fetch($sql))
      {
            $users = $users + $row['clients_current'];
      }
      return ''.$users.'';
}

function table_exists($table, $db)
{
      $tables = mysql_list_tables($db);
      while (list($temp) = $roster->db->fetch_all($tables))
      {
            if($temp == $table) {
            return TRUE;
            }
      }
      return FALSE;
}

$rowcolor = $addon['config']['guildspeak_ts_rowcolor2'];

function getpldetail($var1, $var2, $var3, $var4)
{
      global $roster, $addon, $dbtable2;

      if ($var4 == 'sub') { $plsub = "sub"; }
      $display = '';
      $sql = $roster->db->query("SELECT * FROM $dbtable2 WHERE server_ip='$var1' AND server_port='$var2' and pl_channelid='$var3' ORDER BY pl_playerprivileges desc, pl_nickname asc");
      while ($row = $roster->db->fetch($sql)) {

            if ($row['pl_playerprivileges'] == '13') {
                  $plpriv = "R <b>SA</b>";
            } else if ($row['pl_playerprivileges'] == '5') {
                  $plpriv = "R SA";
            } else if ($row['pl_playerprivileges'] == '4') {
                  $plpriv = "R";
            } else if ($row['pl_playerprivileges'] == '0') {
                  $plpriv = "U";
            }
            if ($row['pl_channelprivileges'] == '1') {
                  $clpriv = " CA";
            } else {
                  $clpriv = "";
            }

            if ($var4 == 'sub') {
                  $display .= '<nobr><img src="'.$addon['image_path'].'bullet_sub.gif">';
            } else if ($var4 == 'nonsub') {
                  $display .= '<nobr>';
            }

            if ($addon['config']['guildspeak_ts_showtimeonline'] == '1') {
                  $m_online = '('.getuptime($row['pl_logintime'],'client').')';
            } else {
                  $m_online = "";
            }

            // Thanks MrGuide
            if (($row['pl_playerflags'] & 8) == 8) {
                  $plflag = "away";
            } else if (($row['pl_playerflags'] & 32) == 32) {
		  	$plflag = "m_speak";
            } else if (($row['pl_playerflags'] & 16) == 16) {
                  $plflag = "m_mic";
		} else if (($row['pl_playerflags'] & 1) == 1) {
		  	$plflag = "cc";
		} else {
		  	$plflag = "normal";
		}

            $display .= '<img src="'.$addon['image_path'].'bullet_'.$plflag.'.gif" align="absmiddle" alt="User" title="Ping '.$row['pl_ping'].' | Packet Loss '.$row['pl_pktloss'].'"> '.$row['pl_nickname'].' ('.$plpriv.''.$clpriv.') '.$m_online.'</nobr><br>';
      }
      return $display;
}

function getsubcldetail($var1, $var2, $var3, $var4, $var5)
{
      global $roster, $addon, $detail, $dbtable3;

      $display = '';
      $sql = $roster->db->query("SELECT * FROM $dbtable3 WHERE server_ip='$var1' AND server_port='$var2' and cl_parent='$var3' ORDER BY cl_order asc, cl_number");
      while ($row = $roster->db->fetch($sql)) {
            $clsubname = stripslashes($row['cl_name']);
            $clsubnamelink = urlencode($clsubname);

            $display .= '<nobr><img src="'.$addon['image_path'].'bullet_subchannel.gif" align="absmiddle"> <a href="' . makelink('util-guildspeak-login') . '&detail='.$var5.'&channel='.$clsubnamelink.'" title="Click to join subchannel \''.$row['cl_name'].'\' on server '.$var1.':'.$var2.' | Topic: '.htmlentities($row['cl_topic']).' | This opens in a popup window." onClick="NewWindow(this.href,\'login\',\''; echo ''.$addon['config']['guildspeak_ts_popupwidth'].''; echo '\',\''; echo ''.$addon['config']['guildspeak_ts_popupheight'].''; echo '\');return false">'.$clsubname.'</a></nobr><br>';  echo "\n                  ";
            $display.= getpldetail($var1, $var2, $row['cl_number'], 'sub');
      }
      return $display;
}

function getcldetail($var1, $var2, $var3)
{
      global $roster, $addon, $dbtable3;

      $display = '';
      $sql = $roster->db->query("SELECT * FROM $dbtable3 WHERE server_ip='$var1' AND server_port='$var2' and cl_parent='-1' ORDER BY cl_order asc, cl_name, cl_number");
      if ($roster->db->num_rows($sql) == 0) {
            $display .= '<center><b>Data unavailable.<br>TCPQueryPort may not be open.</b></center>';
      }
      while ($row = $roster->db->fetch($sql)) {
            $clname = stripslashes($row['cl_name']);
            $clnamelink = urlencode($clname);

            // (RMPSD) (0 2 4 6 8 16)

            if ($row['cl_flags'] == '30') {
                  $clflag = "(RMPSD)";
            } else if ($row['cl_flags'] == '28') {
                  $clflag = "(RPSD)";
            } else if ($row['cl_flags'] == '26') {
                  $clflag = "(RMSD)";
            } else if ($row['cl_flags'] == '24') {
                  $clflag = "(RSD)";
            } else if ($row['cl_flags'] == '22') {
                  $clflag = "(RMPD)";
            } else if ($row['cl_flags'] == '20') {
                  $clflag = "(RPD)";
            } else if ($row['cl_flags'] == '18') {
                  $clflag = "(RMD)";
            } else if ($row['cl_flags'] == '16') {
                  $clflag = "(RD)";
            } else if ($row['cl_flags'] == '15') {
                  $clflag = "(UMPS)";
            } else if ($row['cl_flags'] == '14') {
                  $clflag = "(RMPS)";
            } else if ($row['cl_flags'] == '13') {
                  $clflag = "(UPS)";
            } else if ($row['cl_flags'] == '12') {
                  $clflag = "(RPS)";
            } else if ($row['cl_flags'] == '11') {
                  $clflag = "(UMS)";
            } else if ($row['cl_flags'] == '10') {
                  $clflag = "(RMS)";
            } else if ($row['cl_flags'] == '9') {
                  $clflag = "(US)";
            } else if ($row['cl_flags'] == '8') {
                  $clflag = "(RS)";
            } else if ($row['cl_flags'] == '7') {
                  $clflag = "(UMP)";
            } else if ($row['cl_flags'] == '6') {
                  $clflag = "(RMP)";
            } else if ($row['cl_flags'] == '5') {
                  $clflag = "(UP)";
            } else if ($row['cl_flags'] == '4') {
                  $clflag = "(RP)";
            } else if ($row['cl_flags'] == '3') {
                  $clflag = "(UM)";
            } else if ($row['cl_flags'] == '2') {
                  $clflag = "(RM)";
            } else if ($row['cl_flags'] == '1') {
                  $clflag = "(U)";
            } else if ($row['cl_flags'] == '0') {
                  $clflag = "(R)";
            } else {
                  $clflag = "";
            }

            $display .= '<nobr><img src="'.$addon['image_path'].'bullet_channel.gif" align="absmiddle"> <a href="' . makelink('util-guildspeak-login') . '&detail='.$var3.'&channel='.$clnamelink.'" title="Click to join channel \''.$clname.'\' on server '.$var1.':'.$var2.' | Topic: '.htmlentities($row['cl_topic']).'" onClick="NewWindow(this.href,\'login\',\'';
            $display .= ''.$addon['config']['guildspeak_ts_popupwidth'].'';
            $display .= '\',\'';
            $display .= ''.$addon['config']['guildspeak_ts_popupheight'].'';
            $display .= '\');return false">'.$clname.'</a>&nbsp;&nbsp;'.$clflag.'</nobr><br>';
            $display .= "\n                  ";
            $display.= getsubcldetail($var1, $var2, $row['cl_number'], $row['cl_private'], $var3);
            $display.= getpldetail($var1, $var2, $row['cl_number'], "nonsub");
      }
      return $display;
}

function insertchannelinfo($var1, $var2, $var3, $var4)
{
      global $roster, $addon, $dbtable3, $server_timestamp;

      $cmd = "cl $var3\nquit\n";

      $connection = @fsockopen ("$var1", $var2, $errno, $errstr, 1);
      if (!$connection) {
            // echo "Cannot connect: ($errno)-$errstr<br>";
      } else {
            @fputs($connection,$cmd, strlen($cmd));
            while($channeldata = @fgets($connection, 4096)) {
                  $channeldata = explode("	", $channeldata);
                  $channeldata0 = trim($channeldata[0]);  // number
                  $channeldata1 = trim($channeldata[1]);  // codec
                  $channeldata2 = trim($channeldata[2]);  // parent
                  $channeldata3 = trim($channeldata[3]);  // order
                  $channeldata4 = trim($channeldata[4]);  // maxuser
                  $channeldata5 = addslashes(htmlspecialchars(trim($channeldata[5], "\x22\x27"))); // name
                  $channeldata6 = trim($channeldata[6]);  // channel flags
                  $channeldata7 = trim($channeldata[7]);  // priv/pub
                  $channeldata8 = addslashes(htmlspecialchars(trim($channeldata[8], "\x22\x27\x0D\n"))); // topic

                  $sql = $roster->db->query("SELECT * FROM $dbtable3 WHERE server_ip='$var1' AND server_port='$var3' AND cl_number='$channeldata0'");

                  if (($roster->db->num_rows($sql) != 0) && is_numeric($channeldata0)) {
                  $roster->db->query("UPDATE $dbtable3 SET
                        server_ip='$var1',
                        server_port='$var3',
                        cl_number='$channeldata0',
                        cl_codec='$channeldata1',
                        cl_parent='$channeldata2',
                        cl_order='$channeldata3',
                        cl_maxuser='$channeldata4',
                        cl_name='$channeldata5',
                        cl_flags='$channeldata6',
                        cl_private='$channeldata7',
                        cl_topic='$channeldata8',
                        server_timestamp='$server_timestamp'
                  WHERE server_ip='$var1'
                  AND server_port='$var3'
                  AND cl_number='$channeldata0'
                  ");
                  } else if (is_numeric($channeldata0)) {
                        $roster->db->query("INSERT INTO $dbtable3
                        (server_ip, server_port, cl_number, cl_codec, cl_parent, cl_order, cl_maxuser, cl_name, cl_flags, cl_private, cl_topic, server_timestamp)
                        VALUES
                        ('$var1','$var3','$channeldata0','$channeldata1','$channeldata2','$channeldata3','$channeldata4','$channeldata5','$channeldata6','$channeldata7','$channeldata8','$server_timestamp')
                        ");
                  }
            }
            @fclose($connection);
      }
}

function insertuserinfo($var1, $var2, $var3, $var4)
{
      global $roster, $addon, $dbtable2, $server_timestamp;

      $cmd = "pl $var3\nquit\n";

      $connection = @fsockopen ("$var1", $var2, $errno, $errstr, 1);
      if (!$connection) {
            // echo "Cannot connect: ($errno)-$errstr<br>";
      } else {
            @fputs($connection,$cmd, strlen($cmd));
            while($userdata = @fgets($connection, 4096)) {
                  $userdata = explode("	", $userdata);
                  $userdata0 = trim($userdata[0]);  // pl_id
                  $userdata1 = trim($userdata[1]);  // pl_channelid
                  $userdata2 = trim($userdata[2]);  // pl_pktssend
                  $userdata3 = trim($userdata[3]);  // pl_bytessend
                  $userdata4 = trim($userdata[4]);  // pl_pktsrecv
                  $userdata5 = trim($userdata[5]);  // pl_bytesrecv
                  $userdata6 = trim($userdata[6]);  // pl_pktloss
                  $userdata7 = trim($userdata[7]);  // pl_ping
                  $userdata8 = trim($userdata[8]);  // pl_logintime
                  $userdata9 = trim($userdata[9]);  // pl_idletime
                  $userdata10 = trim($userdata[10]);  // pl_channelprivileges
                  $userdata11 = trim($userdata[11]);  // pl_playerprivileges
                  $userdata12 = trim($userdata[12]);  // pl_playerflags
                  $userdata13 = trim($userdata[13], "\x22\x27");  // pl_ipaddress
                  $userdata14 = addslashes(htmlspecialchars(trim($userdata[14], "\x22\x27"))); // pl_nickname
                  $userdata15 = trim($userdata[15], "\x22\x27"); // pl_loginname

                  $sql = $roster->db->query("SELECT * FROM $dbtable2 WHERE server_ip='$var1' AND server_port='$var3' AND pl_nickname='$userdata14'");

                  if (($roster->db->num_rows($sql) != 0) && is_numeric($userdata0)) {
                        $roster->db->query("UPDATE $dbtable2 SET
                              server_ip='$var1',
                              server_port='$var3',
                              pl_id='$userdata0',
                              pl_channelid='$userdata1',
                              pl_pktssend='$userdata2',
                              pl_bytessend='$userdata3',
                              pl_pktsrecv='$userdata4',
                              pl_bytesrecv='$userdata5',
                              pl_pktloss='$userdata6',
                              pl_ping='$userdata7',
                              pl_logintime='$userdata8',
                              pl_idletime='$userdata9',
                              pl_channelprivileges='$userdata10',
                              pl_playerprivileges='$userdata11',
                              pl_playerflags='$userdata12',
                              pl_ipaddress='$userdata13',
                              pl_nickname='$userdata14',
                              pl_loginname='$userdata15',
                              server_timestamp='$server_timestamp'
                        WHERE server_ip='$var1'
                        AND server_port='$var3'
                        AND pl_nickname='$userdata14'
                        ");
                  } else if (is_numeric($userdata0)) {
                        $roster->db->query("INSERT INTO $dbtable2
                        (server_ip, server_port, pl_id, pl_channelid, pl_pktssend, pl_bytessend, pl_pktsrecv, pl_bytesrecv, pl_pktloss, pl_ping, pl_logintime, pl_idletime, pl_channelprivileges, pl_playerprivileges, pl_playerflags, pl_ipaddress, pl_nickname, pl_loginname, server_timestamp)
                        VALUES
                        ('$var1','$var3','$userdata0','$userdata1','$userdata2','$userdata3','$userdata4','$userdata5','$userdata6','$userdata7','$userdata8','$userdata9','$userdata10','$userdata11','$userdata12','$userdata13','$userdata14','$userdata15','$server_timestamp')
                        ");
                  }
            }
            @fclose($connection);
      }
}

function clearinactive()
{
      global $roster, $addon, $dbtable1, $dbtable2, $dbtable3, $dbtable4;
      $current_time = time();

      $roster->db->query("DELETE FROM $dbtable1 WHERE server_timestamp < ($current_time - 900)");
      $roster->db->query("DELETE FROM $dbtable2 WHERE server_timestamp < ($current_time - 295)");
      $roster->db->query("DELETE FROM $dbtable3 WHERE server_timestamp < ($current_time - 900)");
      $roster->db->query("DELETE FROM $dbtable4 WHERE server_timestamp < ($current_time - 900)");
}

if (isset($_POST["pass"])) {
      $pass = $_POST["pass"];
} else if (isset($_GET["pass"])) {
      $pass = $_GET["pass"];
} else {
      $pass = "";
}

