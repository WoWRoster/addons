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
 * $Id: status.php 13 2006-12-24 07:25:20Z Rabbitbunny $
 *
 ******************************/
if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}
// Check if we already assigned something to $content, if not, Declare it
if (!isset($content))
{
	$content = '';
}


//State our includes
include $addon['dir']."ventrilostatus.php";
require( $addon['dir']."ventriloinfo_ex1.php");
include $addon['dir']."ventrilodisplay_ex1.php";
include $addon['dir']."ventrilodisplay_ex2.php";
include $addon['dir']."ventrilodisplay_ex3.php";


//Set up our variables
//$r['conf_data']
$stat = new CVentriloStatus;
	$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'cmdprog'");
	$r = $roster->db->fetch($result);
$stat->m_cmdprog	= $addon['dir'].$r['conf_data'];	// Adjust accordingly.
	$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'cmdcode'");
	
	$r = $roster->db->fetch($result);
	
$stat->m_cmdcode	= $r['conf_data'];	// Detail mode.
	$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'cmdhost'");
	
	$r = $roster->db->fetch($result);
	
$stat->m_cmdhost	= $r['conf_data'];  // Assume ventrilo server on same machine.
	$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'cmdport'");
	
	$r = $roster->db->fetch($result);
	
$stat->m_cmdport	= $r['conf_data'];	// Port to be statused.
	$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'cmdpass'");
	
	$r = $roster->db->fetch($result);
	
$stat->m_cmdpass	= $r['conf_data'];	// Status password if necessary.
	$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'info1'");
	
	$r = $roster->db->fetch($result);
	
$stat->m_info1	= $r['conf_data'];	// show Info1 box
	$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'display3'");
	
	$r = $roster->db->fetch($result);
	
$stat->m_display3	= $r['conf_data'];	// show Display3 box
	$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'display2'");
	
	$r = $roster->db->fetch($result);
	
$stat->m_display2	= $r['conf_data'];	// show Display2 box
	$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'display1'");
	
	$r = $roster->db->fetch($result);
$stat->m_display1	= $r['conf_data'];	// show Display1 box
	$result = $roster->db->query("SELECT conf_data FROM `".$roster->db->table('config',$addon['basename'])."` WHERE conf_name = 'lobby'");
	
	$r = $roster->db->fetch($result);
$stat->m_lobby	= $r['conf_data'];	// show Lobby box


$rc = $stat->Request();
if ( $rc )
{
	$content .= "CVentriloStatus->Request() failed. <strong>$stat->m_error</strong><br><br>\n";
}

// Create a web link for this server. Please note that the status password
// is not the same thing as a servers global logon password. This is why the
// example doesn't add one.

//Building a ventrilo:// web link from the supplied information.
//Please note that if the retrieved server name has spaces in it then anything following them
//will not show up in the client. This is a client side issue. You might use _'s in server names
//instead until the problem is fixed.

$weblink = "ventrilo://$stat->m_cmdhost:$stat->m_cmdport/servername=$stat->m_name";
echo "<a href=\"$weblink\">Click here to connect.</a><br><br>\n";

// Server basic info.
//Basic information about the server using VentriloInfoEX1.
if ( $stat->m_info1 == "1" )
{
	echo border('syellow','start')."<center><table width='450' border='0'>\n";
	VentriloInfoEX1( $stat );
	echo "</table></center>\n".border('syellow','end');
//	echo $stat->m_uptime;
}
	
// Server channelsusers info.

// Channel and user info using VentriloDisplayEX3
if ( $stat->m_display3 == "1" )
{
	if ($stat->m_lobby == "1" )
	{
		$name = $stat->m_name;
		if ( strlen( $stat->m_comment ) )
			$name .=  $stat->m_comment;
	} else {
		$name = "Lobby";
	}
	echo "<br>\n";
	echo border('syellow','start')."<center><table border='0' bgcolor='white'>\n";
	VentriloDisplayEX3( $stat, $name, 0, 0 );
	echo "</table></center>\n".border('syellow','end');
}


// Channel and user info using VentriloDisplayEX2
if ( $stat->m_display2 == "1" )
{
	echo "<br>\n";
	$name = "";
	echo border('syellow','start')."<center><table width='450' border='0'>\n";
	VentriloDisplayEX2( $stat, $name, 0, 0 );
	echo "</table></center>\n".border('syellow','end');
}

// Channel and user info using VentriloDisplayEX1
if ( $stat->m_display1 == "1" )
{
	if ($stat->m_lobby == "1" )
	{
		$name = $stat->m_name;
		if ( strlen( $stat->m_comment ) )
			$name .=  $stat->m_comment;
	} else {
		$name = "Lobby";
	}
	echo "<br>\n";
	echo border('syellow','start') . "<center><table width='450' border='0'>\n";
	VentriloDisplayEX1( $stat, $name, 0, 0 );
	echo "</table></center>" . border('syellow','end');
}
$roster->db->free_result($result);
?>
