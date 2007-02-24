<?php
error_reporting(E_ALL);

/**
 * Convert a unix timestamp to a more presentalbe display
 *
 * @param $string
 * 		The unix timestamp to convert
 * @param $os
 * 		The offest, or timezone
 * @return the presentable time format
 */
function get_local_date($string, $os) {
  	preg_match('#([0-9]{1,4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})#', $string, $matches);
  	$string_time = gmmktime($matches[4], $matches[5], $matches[6], $matches[2], $matches[3], $matches[1]);
  	$string_localtime = gmdate('M dS D, g:ia', $string_time + $os*3600);
  	return $string_localtime;
}
/**
 * Check to see if the provided table exists
 *
 * @param $table_name
 * 		The name of the table to chek for
 * @return TRUE if the table exists or FALSE if the table does not exist
 */
function table_exists($table_name) {
	global $wowdb;

	$table = $wowdb->query("SHOW TABLES LIKE '" . $table_name . "'");

	if($wowdb->fetch_row($table) === false)
        return(false);
    else
    	return(true);
}
/**
 * Get the last x announcements
 *
 * @param $x
 * 		The number of announcements to get
 * @return 
 */
function last_announcements($x){
	
}

/**
 * Create a link to the admin area of announcements
 * 
 */
function make_admin_link() {
	global $announce;
	echo '<br><div align="center"><a href="'.$announce->filename.'&amp;admin">Administration</a></div>';
}

?>