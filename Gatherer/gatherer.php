<?php
/******************************
* $Id: $
******************************/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

// Get our map and continent if they exist
$continent = ( isset($_GET['continent']) ? $_GET['continent'] : '');
$map = ( isset($_GET['map']) ? $_GET['map'] : '');


// Initialize our select boxes
$options_table = "<table cellspacing=\"0\"><tr>\n";
$options= '';

// Itterate over our locale defines for world continents and zones
foreach( $gatherwords['continents'] as $worldnumber => $worldname )
{
	// Store the world map names to a separate variable so we can make headers
	$options_table .= "\t<th class=\"membersHeader\">$worldname</th>\n";

	// Start the selectbox
	$options .= "\t<td>\n\t\t<select class=\"combobox\" name=\"$worldname\" onchange=\"if(options[selectedIndex].value){location = options[selectedIndex].value}\">\n";

	// First option is blank
	$options .= "\t\t<option>------</option>\n";

	foreach( $gatherwords['zones'][$worldnumber] as $zone => $zonename )
	{
		// Select the option if we are viewing it
		if( $continent == $worldnumber && $map == $zone )
			$options .= "\t\t<option selected=\"selected\" value=\"$script_filename&amp;continent=".rawurlencode($worldname)."&amp;map=$zone\">$zonename</option>\n";
		else
			$options .= "\t\t<option value=\"$script_filename&amp;continent=$worldnumber&amp;map=$zone\">$zonename</option>\n";
	}

	$options .= "\t\t</select></td>\n";
}

// Build the complete table
$options = $options_table."</tr>\n<tr>\n".$options."</tr></table>\n";

// Output table in a pretty border
$options = messagebox($options,$gatherwords['gatherer_selectzone']);


?>
<div align="center">
	<form method="post" action="<?php print $script_filename; ?>">
<?php echo($options); ?>
	</form>
	<br />
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="1000" height="668" title="Gatherer">
		<param name="movie" value="<?php echo(ROSTER_URL); ?>/addons/<?php print $addonName; ?>/flash/gatherer.swf?addonResults=<?php echo ("$addonResults"); ?>&amp;continent=<?php echo ("$continent");?>&amp;map=<?php echo rawurlencode("$map"); ?>">
		<param name="quality" value="high">
		<embed src="<?php echo(ROSTER_URL); ?>/addons/<?php print $addonName; ?>/flash/gatherer.swf?addonResults=<?php echo ("$addonResults"); ?>&amp;continent=<?php echo ("$continent");?>&amp;map=<?php echo rawurlencode("$map"); ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="1000" height="668"></embed>
	</object>
</div>
