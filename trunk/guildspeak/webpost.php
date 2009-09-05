<?php
/*
****************************************************************
* gllcTS2 for TeamSpeak 2 © Gryphon, LLC (www.gryphonllc.com ) *
****************************************************************
*
* $Id: webpost.php 5 2005-10-26 23:19:04Z gryphon $
* $Rev: 5 $
* $LastChangedBy: gryphon $
* $Date: 2005-10-26 16:19:04 -0700 (Wed, 26 Oct 2005) $
*/
include("./admin/db_inc.php");

if (empty($_POST['server_port'])) {
//  header ("location: $setting[homepage]");
}

if ($_POST["gllc_posttest"]) {
  $server_ip = $_POST["gllc_posttest"];
} else {
  if (getenv("HTTP_X_FORWARDED_FOR")) {
    $server_ip = getenv("HTTP_X_FORWARDED_FOR");
    if ($server_ip == '') {
      $server_ip = $_SERVER["REMOTE_ADDR"];
    }
    $server_ip = preg_replace( "/,.*$/", "", $server_ip );
  } else {
    $server_ip = getenv("REMOTE_ADDR");
    if ($server_ip == '') {
      $server_ip = $_SERVER["REMOTE_ADDR"];
    }
  }
}

$r = query("SELECT * FROM $dbtable5 WHERE listips LIKE '%$server_ip,%'");
$r2 = query("SELECT * FROM $dbtable1");
$r3 = query("SELECT * FROM $dbtable1 WHERE server_ip = '$server_ip'");
if (mysql_num_rows($r) == '0' && mysql_num_rows($r2) >= $setting["listamount"] && mysql_num_rows($r3) == '0') {
  exit;
}

$server_port = $_POST["server_port"];

$sql = query("SELECT * FROM $dbtable1 WHERE server_ip='$server_ip' AND server_port='$server_port'");

$server_adminemail = urldecode($_POST['server_adminemail']);

$server_isplinkurl = urldecode($_POST['server_isplinkurl']);
if (isset($server_isplinkurl) && $server_isplinkurl != 'na' && $server_isplinkurl != '') {
  if (preg_match("/http:\/\//i", $server_isplinkurl)) {
    $server_isplinkurl = $server_isplinkurl;
  } else {
    $server_isplinkurl = 'http://'.$server_isplinkurl.'';
  }
}

$server_linkurl = urldecode($_POST['server_linkurl']);
if (isset($server_linkurl) && $server_linkurl != 'na' && $server_linkurl != '') {
  if (preg_match("/http:\/\//i", $server_linkurl)) {
    $server_linkurl = $server_linkurl;
  } else {
    $server_linkurl = 'http://'.$server_linkurl.'';
  }
}

$server_name = urldecode($_POST['server_name']);
$server_name = trim(str_replace("", "", $server_name));

$server_ispname = addslashes(urldecode($_POST['server_ispname']));
$server_ispcountry = addslashes(urldecode($_POST['server_ispcountry']));

$server_password = addslashes(urldecode($_POST['server_password']));

if ($server_ispname == 'na') {
  $server_ispname = 'Private';
}

//$server_uptodate = ''.$_POST["server_version_major"].''.$_POST["server_version_minor"].''.$_POST["server_version_release"].''.$_POST["server_version_build"].'';

//if ($server_uptodate < "201940") { // Enter the version number you wish to allow, no decimals. Anything under this version will not be allowed.
//  exit;
//}

// update existing server
if (mysql_num_rows($sql)!= 0) {
  query("UPDATE $dbtable1 SET
    server_adminemail='$server_adminemail',
    server_isplinkurl='$server_isplinkurl',
    server_ispname='$server_ispname',
    server_ispcountry='$server_ispcountry',
    server_platform='$_POST[server_platform]',
    server_version_major='$_POST[server_version_major]',
    server_version_minor='$_POST[server_version_minor]',
    server_version_release='$_POST[server_version_release]',
    server_version_build='$_POST[server_version_build]',
    server_ip='$server_ip',
    server_port='$server_port',
    server_name='$server_name',
    server_uptime='$_POST[server_uptime]',
    server_password='$server_password',
    server_type1='$_POST[server_type1]',
    server_type2='$_POST[server_type2]',
    clients_current='$_POST[clients_current]',
    clients_maximum='$_POST[clients_maximum]',
    channels_current='$_POST[channels_current]',
    server_linkurl='$server_linkurl',
    server_queryport='$_POST[server_queryport]',
    server_timestamp='$server_timestamp'
      WHERE server_ip='$server_ip' AND server_port='$server_port'");
} else if ($server_port) {
// insert new server
  query("INSERT INTO $dbtable1
    (server_adminemail,
     server_isplinkurl,
     server_ispname,
     server_ispcountry,
     server_platform,
     server_version_major,
     server_version_minor,
     server_version_release,
     server_version_build,
     server_ip,
     server_port,
     server_name,
     server_uptime,
     server_password,
     server_type1,
     server_type2,
     clients_current,
     clients_maximum,
     channels_current,
     server_linkurl,
     server_queryport,
     server_timestamp)
      VALUES
    ('$server_adminemail',
     '$server_isplinkurl',
     '$server_ispname',
     '$server_ispcountry',
     '$_POST[server_platform]',
     '$_POST[server_version_major]',
     '$_POST[server_version_minor]',
     '$_POST[server_version_release]',
     '$_POST[server_version_build]',
     '$server_ip',
     '$server_port',
     '$server_name',
     '$_POST[server_uptime]',
     '$server_password',
     '$_POST[server_type1]',
     '$_POST[server_type2]',
     '$_POST[clients_current]',
     '$_POST[clients_maximum]',
     '$_POST[channels_current]',
     '$server_linkurl',
     '$_POST[server_queryport]',
     '$server_timestamp')");
}

if ($server_port) {
  $ts_version = "$_POST[server_version_major]" . "$_POST[server_version_minor]" . "$_POST[server_version_release]" . "$_POST[server_version_build]";
  insertchannelinfo($server_ip, $_POST["server_queryport"], $server_port, $ts_version);
  insertuserinfo($server_ip, $_POST["server_queryport"], $server_port, $ts_version);
}

$sqlg = query("SELECT * FROM $dbtable4 WHERE group_ispname='$server_ispname'");

// update existing server
if (mysql_num_rows($sqlg)!= 0) {
  $sqlg2 = query("SELECT * FROM $dbtable1 WHERE server_ispname='$server_ispname'");
  $groupservercount = mysql_num_rows($sqlg2);

  if (($server_ispname == 'Private') or ($server_ispname == '')) {
    $server_ispname = 'Private';
    $server_isplinkurl = 'na';
  }
  $sqlg3 = query("SELECT sum(clients_current) FROM $dbtable1 WHERE server_ispname='$server_ispname'");
  $sqlg3data = mysql_fetch_row($sqlg3);

  query("UPDATE $dbtable4 SET group_ispurl='$server_isplinkurl', group_ispname='$server_ispname', group_servers='$groupservercount', group_users='$sqlg3data[0]', server_timestamp='$server_timestamp' WHERE group_ispname='$server_ispname'");
} else if ($server_ispname) {
// insert new server
  $sqlg2 = query("SELECT * FROM $dbtable1 WHERE server_ispname='$server_ispname'");
  $groupservercount = mysql_num_rows($sqlg2);

  if (($server_ispname == 'Private') or ($server_ispname == '')) {
    $server_ispname = 'Private';
    $server_isplinkurl = 'na';
  }
  $sqlg3 = query("SELECT sum(clients_current) FROM $dbtable1 WHERE server_ispname='$server_ispname'");
  $sqlg3data = mysql_fetch_row($sqlg3);

  query("INSERT INTO $dbtable4 (group_ispurl,group_ispname,group_servers,group_users,server_timestamp) VALUES ('$server_isplinkurl','$server_ispname','$groupservercount','$sqlg3data[0]','$server_timestamp')");
}
?>