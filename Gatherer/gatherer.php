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

if( eregi(basename(__FILE__),$_SERVER['PHP_SELF']) )
{
	die("You can't access this file directly!");
}

if(isset($_GET['continent']))
{
	$continent = $_GET['continent'];
}

if(isset($_GET['map']))
{
	$map = $_GET['map'];
}

require_once('arrays.php');

$options = '';


foreach($locations as $zonenumber => $zonename)
{
	$options .= "<select class=\"combobox\" name=\"$zonename\" onchange=\"if(options[selectedIndex].value){location = options[selectedIndex].value}\">\r\n";
	$options .= "\t<option selected value=\"$script_filename&amp;continent=$zonename\">$zonename</option>\r\n";
	foreach($zones[$zonenumber] as $cap => $localized)
	{
		$options .= "\t<option value=\"$script_filename&amp;continent=$zonename&amp;map=$cap\">$localized</option>\r\n";
	}
	$options .= "</select>\r\n";
}


?>
<div align="center">
  <FORM METHOD="POST" ACTION="gatherer.php">
<?php echo($options);?>
  </FORM>
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="1000" height="668" title="Gatherer">
    <param name="movie" value="/roster/addons/gatherer/flash/gatherer.swf?addonResults=<?php echo("$addonResults"); ?>&amp;continent=<?php echo("$continent");?>&amp;map=<?php echo("$map"); ?>">
    <param name="quality" value="high">
    <embed src="<?php echo(ROSTER_URL); ?>/addons/gatherer/flash/gatherer.swf?addonResults=<?php echo("$addonResults"); ?>&amp;continent=<?php echo("$continent");?>&amp;map=<?php echo("$map"); ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="1000" height="668"></embed>
  </object>
</div>