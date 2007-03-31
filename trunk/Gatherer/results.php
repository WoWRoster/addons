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
* $Id: bookworm.php 59 2006-06-14 21:17:28Z Sahasrahla $
*
******************************/

include_once('../../settings.php');

if(isset($_GET['continent']))
{
	$continent = $_GET['continent'];
}

if(isset($_GET['map']))
{
	$map = $_GET['map'];
}

header('Content-type: text/xml');


$query  = "SELECT * FROM `".$db_prefix."gatherer_nodes` WHERE continent ='$continent' and map = '$map' ORDER BY nodeType DESC";
$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);

echo ("<map>\n <a_map continent=\"$continent\" map=\"$map\" image=\"".ROSTER_URL."/images/MAP/$continent/$map.jpg\"> \n");

while ($row = mysql_fetch_array($result)) 
{
	echo ("<Gatherable Gtype=\"".$row['nodeType']."\" XPos=\"".($row['xPos'] * 1002)."\" YPos=\"".($row['yPos'] * 668)."\" Icon=\"".ROSTER_URL."/images/".$row['nodeType']."/".$row['nodeNumber'].".png\" GatherableName=\"".$row['nodeTypeWord']."\" />");
}
echo("</a_map> \n </map> \n");
?>
