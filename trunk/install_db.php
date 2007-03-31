<?php

if( eregi(basename(__FILE__),$_SERVER['PHP_SELF']) )
{
    die("You can't access this file directly!");
}

createTables();

function createTables(){
	global $wowdb, $roster_conf, $wordings, $db_prefix;
	
	// Declare tables needed for RaidTracker
	$create_nodes = "CREATE TABLE `".$db_prefix."gatherer_nodes` (
  		`id` int(5) NOT NULL auto_increment,
  		`continent` varchar(25) NOT NULL default '',
  		`map` varchar(25) NOT NULL default '',
  		`nodeNumber` varchar(10) NOT NULL default '',
  		`nodeTypeWord` varchar(50) NOT NULL default '',
  		`nodeType` varchar(25) NOT NULL default '',
  		`xPos` varchar(10) NOT NULL default '',
  		`yPos` varchar(10) NOT NULL default '',
  		`method` varchar(10) NOT NULL default '',
  		PRIMARY KEY  (`id`)
		) TYPE=MyISAM AUTO_INCREMENT=1 ;";
	
	// Create tables declared above
	$tables = 0;
	if($wowdb->query($create_nodes) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$create_nodes)){
		$tables += 1;
	}
	if($tables == 1){
		echo border('syellow','start');
		echo '<table width="300px">';
		echo '<tr><td align="center">All tables successfully added</td></tr>';
		echo '<tr><td align="center"><a href="addon.php?roster_addon_name=gatherer">Finish installation</a></td></tr>';
		echo '</table>';
		echo border('syellow','end');
	}
}
?>