<?php
/******************************
* $Id: $
******************************/

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ( !defined('ROSTER_INSTALLED') )
{
	exit('Detected invalid access to this file!');
}

require_once(dirname(__FILE__).'/localization.php');

$gatherwords = &$wordings[$roster_conf['roster_lang']];

function processGatherer($luaData, $gatherwords)
{
	global $wowdb, $gatherwords;

	$query = "SELECT `map`,`number` FROM `".GATHERER_TABLE."`;";
	$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);

	if($wowdb->num_rows($result) > 0)
	{
		$dbData = array();
		while($row = $wowdb->fetch_assoc($result))
		{
			$coords = toXY($row['number']);
			$xPos = $coords['xPos'];
			$yPos = $coords['yPos'];
			$dbData[$row['map']]['x'] = $xPos;
			$dbData[$row['map']]['y'] = $yPos;
			$dbData[$row['map']]['id'] = $row['number'];
		}
	}
	$wowdb->free_result($result);

	$wowdb->resetMessages();

	$inserts = '';
	foreach ($luaData as $index => $zone)
	{
		if(is_array($zone))
		{
			foreach ($zone as $map => $nodeInfo)
			{
				foreach ($nodeInfo as $nodeNumber => $nodeInfo2)
				{
					foreach ($nodeInfo2 as $varName => $value)
					{
						if(is_array($value))
						{
							$xPos 			= substr($value['1'], 0, 6);
							$yPos 			= substr($value['2'], 0, 6);
							$id 			= toID($xPos, $yPos);
							$gtype			= ( isset($nodeInfo2['gtype']) ? $nodeInfo2['gtype'] : 'Unknown' );


							if( isset($dbData) && ((isset($dbData[$map]['id']) && ($dbData[$map]['id'] != $id) || ($dbData[$map]['y'] != $yPos && $dbData[$map]['x'] != $xPos))))
							{
								continue;
							}
							else
							{
								if(!empty($inserts))
								{
									$inserts .= ", ";
								}
								$inserts .= "( '".$id."', '".$nodeNumber."', '".$wowdb->escape($map)."', '".$wowdb->escape($gtype)."', '".$index."' )";
							}
						}
					}
				}
			}
		}
	}

	if(!empty($inserts))
	{
		$query = "INSERT INTO `".GATHERER_TABLE."` (`number`, `nodeNumber`, `map`, `nodeType`, `continent`) VALUES ";
		$query = $query . $inserts . ';';
		$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
	}
}

//Do not remove $gatherwords from this, it doesn't work globally for some reason.
function processCartoHerb($luaData, $gatherwords)
{
	global $wowdb;
	
	$query = "SELECT `map`,`number` FROM `".GATHERER_TABLE."` where `nodeType` = 'HERB';";
	$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);

	if($wowdb->num_rows($result) > 0)
	{
		$dbData = array();
		while($row = $wowdb->fetch_assoc($result))
		{
			$coords = toXY($row['number']);
			$xPos = $coords['xPos'];
			$yPos = $coords['yPos'];
			$dbData[$row['map']]['x'] = $xPos;
			$dbData[$row['map']]['y'] = $yPos;
			$dbData[$row['map']]['id'] = $row['number'];
		}
	}
	$wowdb->free_result($result);

	$wowdb->resetMessages();

	$inserts = '';
	foreach ($luaData as $zone => $data)
	{
		$old = array( "'", ' ', 'SHATTERAH_CITY', 'SHATTRATH_CITY', 'THE_BARRENS', 'BLADES_EDGE_MOUNTAINS', 'NETHERSTORM', 'THE_HINTERLANDS', 'GHOSTLANDS');
		$new = array( '', '_', 'SHATTRATH', 'SHATTRATH', 'BARRENS', 'BLADES_EDGE_MOUNTAINS', 'NETHERSTORM', 'HINTERLANDS', 'GHOSTLANDS');
		$map = str_replace($old, $new, strtoupper($zone));
		
		if(is_array($data))
		{
			foreach ($data as $number => $herb)
			{
				$coords	= toXY($number);
				$xPos 	= $coords['xPos'];
				$yPos 	= $coords['yPos'];
				$id 	= toID($xPos, $yPos);
				$gtype	= 'HERB';
				$index 	= $gatherwords['zonecont'][$map];
				$nodeNumber = array_search($herb, $gatherwords['node_names']['HERB']);
				
				if( isset($dbData) && isset($dbData[$map]) && ((isset($dbData[$map]['id']) && ($dbData[$map]['id'] != $id) || ($dbData[$map]['y'] != $yPos && $dbData[$map]['x'] != $xPos))))
				{
					continue;
				}
				else
				{
					if(!empty($inserts))
					{
						$inserts .= ", ";
					}
					$inserts .= "( '".$id."', '".$nodeNumber."', '".$wowdb->escape($map)."', '".$wowdb->escape($gtype)."', '".$index."' )";
				}
			}
		}
	}
	if(!empty($inserts))
	{
		$query = "INSERT INTO `".GATHERER_TABLE."` (`number`, `nodeNumber`, `map`, `nodeType`, `continent`) VALUES ";
		$query = $query . $inserts . ';';
		$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
	}
}

function processCartoMine($luaData, $gatherwords)
{
	global $wowdb;
	$query = "SELECT `map`,`number` FROM `".GATHERER_TABLE."` where `nodeType` = 'MINE';";
	$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);

	if($wowdb->num_rows($result) > 0)
	{
		$dbData = array();
		while($row = $wowdb->fetch_assoc($result))
		{
			$coords = toXY($row['number']);
			$xPos = $coords['xPos'];
			$yPos = $coords['yPos'];
			$dbData[$row['map']]['x'] = $xPos;
			$dbData[$row['map']]['y'] = $yPos;
			$dbData[$row['map']]['id'] = $row['number'];
		}
	}
	$wowdb->free_result($result);

	$wowdb->resetMessages();

	$inserts = '';
	foreach ($luaData as $zone => $data)
	{
		$old = array( "'", ' ', 'SHATTERAH_CITY', 'SHATTRATH_CITY', 'THE_BARRENS', 'BLADES_EDGE_MOUNTAINS', 'NETHERSTORM', 'THE_HINTERLANDS', 'GHOSTLANDS');
		$new = array( '', '_', 'SHATTRATH', 'SHATTRATH', 'BARRENS', 'BLADES_EDGE_MOUNTAINS', 'NETHERSTORM', 'HINTERLANDS', 'GHOSTLANDS');
		$map = str_replace($old, $new, strtoupper($zone));
		
		if(is_array($data))
		{
			foreach ($data as $number => $mine)
			{
				$coords	= toXY($number);
				$xPos 	= $coords['xPos'];
				$yPos 	= $coords['yPos'];
				$id 	= toID($xPos, $yPos);
				$gtype	= 'MINE';
				$index 	= $gatherwords['zonecont'][$map];
				$nodeNumber = array_search($mine, $gatherwords['node_names']['MINE']);
				
				if( isset($dbData) && isset($dbData[$map]) && ((isset($dbData[$map]['id']) && ($dbData[$map]['id'] != $id) || ($dbData[$map]['y'] != $yPos && $dbData[$map]['x'] != $xPos))))
				{
					continue;
				}
				else
				{
					if(!empty($inserts))
					{
						$inserts .= ", ";
					}
					$inserts .= "( '".$id."', '".$nodeNumber."', '".$wowdb->escape($map)."', '".$wowdb->escape($gtype)."', '".$index."' )";
				}
			}
		}
	}
	if(!empty($inserts))
	{
		$query = "INSERT INTO `".GATHERER_TABLE."` (`number`, `nodeNumber`, `map`, `nodeType`, `continent`) VALUES ";
		$query = $query . $inserts . ';';
		$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
	}
}

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