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
							$xPos 			= substr($value['1'], 0, 6);
							$yPos 			= substr($value['2'], 0, 6);
							$type  			= (isset($value['6']) ? $value['6'] : 'Unknown');

							$query = "SELECT * FROM ".$db_prefix."gatherer_nodes where `xPos` = '".$xPos."' and `yPos` = '".$yPos."' and `map` = '".$wowdb->escape($map)."'";
							$results = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);

							if($wowdb->num_rows($results) > 0)
							{
								continue;
							}
							else {

								if(!isset($inserts))
								{
									$inserts = "( '".$locations[$index]."', '".$wowdb->escape($map)."', '".$nodeNumber."', '".$nodeInfo2['gtype']."', '".$xPos."', '".$yPos."')";
								}
								else {
									$inserts .= ", ( '".$locations[$index]."', '".$wowdb->escape($map)."', '".$nodeNumber."', '".$nodeInfo2['gtype']."', '".$xPos."', '".$yPos."')";
								}
							}
						}
					}
				}
			}
		}
	}

	if(isset($inserts))
	{
		$query = "INSERT INTO ".$db_prefix."gatherer_nodes (continent, map, nodeNumber, nodeType, xPos, yPos) VALUES ";
		$query = $query . $inserts . ";";
		$results = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
	}
}

?>