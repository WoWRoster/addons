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
 * $Id$
 *
 ******************************/
 
 // Connecting, selecting database
$link = mysql_connect('localhost', 'root', 'Verw8ing')
   or die('Could not connect: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db('roster_itemdb') or die('Could not select database');

 
 include '../inc/functions.php';
 include 'xmls.php';
 include 'xmlhelper.php';
 include 'urlreader.php';

$locale = 'enUS';
print('<pre>');
$i=0;
/*foreach ($items as $item_id => $itemname)
{
	if ($item_id > 4628)
	{

	if ($i == 5)
	{
		$i=0;
		sleep (3);
	}

/*	print_r(rosterdkp_gettooltip('http://wow.allakhazam.com/ihtml?'.$itemid.'&locale='.$locale));
	sleep(2);
	print("\n");
	$i++;
	if ($i > 10)
		break;
} */

//$item_id = 21703;
/*
$xml_helper = new XmlHelper();
$xml_data = itemstats_read_url('http://wow.allakhazam.com/dev/wow/item-xml.pl?witem=' . $item_id);
$item['id'] = $item_id;
$item['name'] = $xml_helper->parse($xml_data, 'name1');
$item['setid'] = $xml_helper->parse($xml_data, 'setid');
$item['icon'] = $xml_helper->parse($xml_data, 'icon');
$item['icon'] = str_replace("/images/icons/", '', $item['icon']);
$item_found = true;
$i++;
//print($xml_data."\n\n");
// Performing SQL query
//mysql_query ('INSERT INTO ' . $table . ' ( `' . $id_field . '` ) VALUES ( NULL );') or die('Error, query failed. ' . mysql_error());
$query = "INSERT INTO itemlist (`itemid`, `setid`, `texture`) VALUES ('".$item['id']."', '".$item['setid']."', '".$item['icon']."')";
$result = mysql_query($query);// or die('Query failed: ' . mysql_error());

print($result."\n\n");
	
// Free resultset
//mysql_free_result($result);

// Closing connection
//mysql_close($link);

print_r($item);
	}
}*/
 //while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
 
 
print('</pre>');
?>
