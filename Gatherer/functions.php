<?php
/******************************
* $Id: $
******************************/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

function processGatherer($luaData)
{
	global $wowdb;

	$query = "SELECT `map`,`xPos`,`yPos` FROM `".GATHERER_TABLE."`;";
	$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);

	if($wowdb->num_rows($result) > 0)
	{
		$dbData = array();
		while($row = $wowdb->fetch_assoc($result))
		{
			$dbData[$row['map']]['x'] = $row['xPos'];
			$dbData[$row['map']]['y'] = $row['yPos'];
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
							$type  			= ( isset($value['6']) ? $value['6'] : 'Unknown' );
							$gtype			= ( isset($nodeInfo2['gtype']) ? $nodeInfo2['gtype'] : 'Unknown' );

							/*$query = "SELECT * FROM `".GATHERER_TABLE."` WHERE `xPos` = '".$xPos."' AND `yPos` = '".$yPos."' AND `map` = '".$wowdb->escape($map)."';";
							$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);

							if($wowdb->num_rows($result) > 0)
							{
								continue;
							}*/

							if( isset($dbData) && $dbData[$map]['x'] != $xPos && $dbData[$map]['y'] != $yPos )
							{
								continue;
							}
							else
							{
								if(!empty($inserts))
								{
									$inserts .= ", ";
								}
								$inserts .= "( '".$index."', '".$wowdb->escape($map)."', '".$nodeNumber."', '".$wowdb->escape($gtype)."', '".$xPos."', '".$yPos."')";
							}
						}
					}
				}
			}
		}
	}

	if(!empty($inserts))
	{
		$query = "INSERT INTO `".GATHERER_TABLE."` (`continent`, `map`, `nodeNumber`, `nodeType`, `xPos`, `yPos`) VALUES ";
		$query = $query . $inserts . ';';
		$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
	}
}
