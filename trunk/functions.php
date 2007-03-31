<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

function processGatherer($GatherData)
{
	global $wowdb, $roster_conf, $wordings, $db_prefix;

	$wowdb->resetMessages();
	include_once('arrays.php');

	foreach ($GatherData as $index => $zone)
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
							$xPos 			= $value['1'];
							$yPos 			= $value['2'];
							$type  = (isset($value['6']) ? $value['6'] : 'Unknown');
							$nodetypeword = (isset(${$nodeInfo2['gtype']}[$nodeNumber]) ? ${$nodeInfo2['gtype']}[$nodeNumber] : 'Unknown');

							if(!isset($inserts))
							{
								$inserts = "( '".$locations[$index]."', '".$wowdb->escape($map)."', '".$nodeNumber."', '".$wowdb->escape($nodetypeword)."', '".$nodeInfo2['gtype']."', '".$xPos."', '".$yPos."')";
							}
							else {
								$inserts .= ", ( '".$locations[$index]."', '".$wowdb->escape($map)."', '".$nodeNumber."', '".$wowdb->escape($nodetypeword)."', '".$nodeInfo2['gtype']."', '".$xPos."', '".$yPos."')";
							}
						}
					}
				}
			}
		}
	}

	if(isset($inserts))
	{
		$query = "INSERT INTO ".$db_prefix."gatherer_nodes (continent, map, nodeNumber, nodeTypeWord, nodeType, xPos, yPos) VALUES ";
		$query = $query . $inserts . ";";
		$results = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
	}
}

?>