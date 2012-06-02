<?php
	
	//$char = $roster->api->Char->getCharInfo('Zangarmarsh','zonous','4');
	$gemx = array();
	$a = $roster->api->Data->getItemInfo('70138');
	
	echo '<pre>';
	print_r($a);
	echo '</pre>';
	echo '<br><hr><br>';
	echo '<pre>';
	/*
	print_r($char['items']['shoulder']);
	echo '</pre>';
	$item = $char['items']['shoulder'];
	if (isset($item['tooltipParams']['gem0']))
	{
		$gemx['gem0'] = $roster->api->Data->getItemInfo($item['tooltipParams']['gem0']);
	}
	if (isset($item['tooltipParams']['gem1']))
	{
		$gemx['gem1'] = $roster->api->Data->getItemInfo($item['tooltipParams']['gem1']);
	}
	if (isset($item['tooltipParams']['gem2']))
	{
		$gemx['gem2'] = $roster->api->Data->getItemInfo($item['tooltipParams']['gem2']);
	}
	echo '<br><hr><br>';
	echo '<pre>';
	print_r($gemx);
	echo '</pre>';
	*/
	$tx =  $roster->api->Item->item($a,null,null);
	echo $tx;
	echo '<br><br><br>';
	$e = $roster->api->Item->item($a,null,null);
	echo $e;