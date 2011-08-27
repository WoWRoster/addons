<?php
/**
 * Project: SigGen - Signature and Avatar Generator for WoWRoster
 * File: /inc/conf.php
 *
 * @link http://www.wowroster.net
 * @license    http://www.gnu.org/licenses/gpl.html   Licensed under the GNU General Public License v3.
 * @author Joshua Clark
 * @version $Id$
 * @copyright 2005-2011 Joshua Clark
 * @package SigGen
 * @filesource
 */

if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}



// ----[ SigGen directory ]---------------------------------
// This should be the path to the siggen addon directory
// Starting from where siggen config is accessed
define('SIGGEN_DIR', $addon['dir']);




// ----[ Define the sig_config table ]----------------------
if( !defined('ROSTER_SIGCONFIGTABLE') )
{
	define('ROSTER_SIGCONFIGTABLE',$roster->db->table('config',$addon['basename']));
}


//------[ END OF CONFIG ]-------------------------










// ----[ Database version DO NOT CHANGE!! ]-----------------
$sc_db_ver = '1.9';




define('SIGCONFIG_CONF',true);
