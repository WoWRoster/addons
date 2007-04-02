<?php
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

$gatherwords = &$wordings[$roster_conf['roster_lang']];

error_reporting(E_ALL);
ini_set('display_errors', 1);

$query = "SELECT `map`,`xPos`,`yPos`, `nodeType`, `nodeNumber` FROM `".GATHERER_TABLE."`;";
$oldinfo = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);

if($wowdb->num_rows($oldinfo) > 0)
{
	while($row = $wowdb->fetch_assoc($oldinfo))
	{
		$convert = toID($row['xPos'], $row['yPos']);
		$type = isset($gatherwords['node_names'][$row['nodeType']][$row['nodeNumber']]) ? $gatherwords['node_names'][$row['nodeType']][$row['nodeNumber']] : '';
		if($type == '')
		{
			continue;
		}
		$dbData[$row['map']][$convert][$row['nodeNumber']] = $row['nodeType'];
	}
}

unset($oldinfo);

$sql = 'DROP TABLE IF EXISTS `'.GATHERER_TABLE.'`;';
$drop = $wowdb->query($sql) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$sql);

if($drop == TRUE)
{
	echo("Drop Successful");
} else {
	echo("Drop didn't work");
}

unset($drop);

$sql = 'CREATE TABLE `'.GATHERER_TABLE.'` (
		`id` int(11) NOT NULL auto_increment,
		`number` int(15) NOT NULL,
		`nodeNumber` int(11) NOT NULL,
		`map` varchar(25) NOT NULL,
		`nodeType` varchar(25) NOT NULL,
		`continent` int(3) NOT NULL,
		PRIMARY KEY  (`id`),
		KEY `number` (`number`)
		) ENGINE=MyISAM;';

$insert = $wowdb->query($sql) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$sql);
unset($insert);

foreach($dbData as $map => $value)
{
	foreach($value as $number => $nnumber)
	{
		foreach($nnumber as $nnumber2 => $type)
		{
			if(isset($insert))
			{
				$insert .= ", ";
			}
			else {
				$insert = '';
			}

			$insert .= "( '".$number."', '".$nnumber2."', '".$map."', '".$type."', '".$gatherwords['zonecont'][$map]."' )";
		}
	}
}

$prefix = "INSERT INTO `".GATHERER_TABLE."` (`number`, `nodeNumber`, `map`, `nodeType`, `continent`) VALUES ";

$sql = $prefix . $insert;
$insert = $wowdb->query($sql) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$sql);


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