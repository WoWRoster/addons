<?php
/******************************
* $Id: $
******************************/

// Make sure we include the right files by doing some pathing voodoo
// THis is to help if this addon sis ported over to wowrosterdf
// Although many other things would need to be changed to actually make it work
$roster_dir = $gatherer_dir = dirname(__FILE__); // Here we have "somepath/roster/addons/gatherer"
$gatherer_dir .= DIRECTORY_SEPARATOR;
$roster_dir = explode(DIRECTORY_SEPARATOR,$roster_dir);

// Take off two parent directories
array_pop($roster_dir); // Here we have "somepath/roster/addons"
array_pop($roster_dir); // Here we have "somepath/roster"
$roster_dir = implode(DIRECTORY_SEPARATOR,$roster_dir).DIRECTORY_SEPARATOR; // Here we have "somepath/roster/"

// Include roster's settings file
include_once($roster_dir.'settings.php');
unset($roster_dir);

// Include gatherer's conf and locale files
include_once($gatherer_dir.'conf.php');
include_once($gatherer_dir.'localization.php');
unset($gatherer_dir);

// Get our map and continent if they exist
$continent = ( isset($_GET['continent']) ? $_GET['continent'] : '');
$map = ( isset($_GET['map']) ? $_GET['map'] : '');


// Grab our data
$query  = "SELECT * FROM `".GATHERER_TABLE."` WHERE `continent` = '$continent' AND `map` = '$map' ORDER BY `nodeType` DESC;";
$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);

header('Content-type: text/xml');

echo ("<map>\n <a_map continent=\"".$gatherwords['continents'][$continent]."\" map=\"".$gatherwords['zones'][$continent][$map]."\" image=\"".ROSTER_URL."/images/MAP/$continent/$map.jpg\"> \n");

while( $row = mysql_fetch_array($result) )
{
	$nodeName = ( isset($gatherwords['node_names'][$row['nodeType']]) ? $gatherwords['node_names'][$row['nodeType']] : $row['nodeType'] );

	$coords = toXY($row['number']);
	$xPos   = $coords['xPos'];
	$yPos   = $coords['yPos'];
	
	echo ("<Gatherable Gtype=\"".$row['nodeType']."\" XPos=\"".($xPos * 1000)."\" YPos=\"".($yPos * 668)."\" Icon=\"".ROSTER_URL."/images/".$row['nodeType']."/".$row['nodeNumber'].".png\" GatherableName=\"".$gatherwords['node_names'][$row['nodeType']][$row['nodeNumber']]."\" />");
}
echo("</a_map> \n </map> \n");

function toID($xPos, $yPos)
{
	return round($xPos * 10000, 0) + (round($yPos * 10000, 0) * 10001);
}

function toXY($num)
{
	$return['xPos'] = ($num % 10001) / 10000;
	$return['yPos'] = floor($num / 10001) / 10000;
	return $return;
}

?>