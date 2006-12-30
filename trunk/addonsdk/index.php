<?php
/******************************
 * $Id$
 ******************************/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

$guildId = $guild_info['guild_id'];
$guildname = $guild_info['guild_name'];
$updateTime = date($phptimeformat[$roster_conf['roster_lang']],strtotime($guild_info['update_time']));


if ($roster_conf['sqldebug'])
{
	print "<!-- $query -->\n";
}


$display_text = $_REQUEST['display_text'];
$display_image = $_REQUEST['display_image'];

//begin generation the addon's output
print '<br />';

if ($addon_conf['dummy']['generate_output'])
{
	if ($display_text)
	{
		print "Your guild ID is [ <b>$guildId</b> ] for Guild: [ <b>$guildname</b> ] .";
		print '<br />';
		print "And was last updated on ".$updateTime;
		print '<br />';
	}
	if ($display_image)
	{
		print "<div class='dummyStyle' >".$wordings[$roster_conf['roster_lang']]['dummy']."<br><img src='".$roster_conf['img_url']."mini_diablo.gif'></div>\n";
		print '<br />';
	}
}

print '<br />';
