<?php
/**
 * Project: SigGen - Signature and Avatar Generator for WoWRoster
 * File: /char/index.php
 *
 * Licensed under the Creative Commons
 * "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * Short summary:
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/
 *
 * Legal Information:
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/legalcode
 *
 * Full License:
 *  license.txt (Included within this library)
 *
 * You should have recieved a FULL copy of this license in license.txt
 * along with this library, if you did not and you are unable to find
 * and agree to the license you may not use this library.
 *
 * For questions, comments, information and documentation please visit
 * the official website at cpframework.org
 *
 * @link http://www.wowroster.net
 * @license http://creativecommons.org/licenses/by-nc-sa/2.5/
 * @author Joshua Clark
 * @version $Id$
 * @copyright 2005-2007 Joshua Clark
 * @package SigGen
 * @filesource
 *
 */

if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

// Read SigGen Config data from Database
$config_str = "SELECT `config_id`,`main_image_size_w`,`main_image_size_h` FROM `" . $roster->db->table('config',$addon['basename']) . "`;";

$config_sql = $roster->db->query($config_str);
if( $config_sql )
{
	while( $row = $roster->db->fetch($config_sql, SQL_ASSOC) )
	{
		print messagebox('<img src="' . makelink('util-' . $addon['basename'] . '-' . $row['config_id'] . '&amp;member=' . $roster->data['member_id'] . '&amp;saveonly=0') . '" alt="" width="' . $row['main_image_size_w'] . '" height="' . $row['main_image_size_h'] . '" /><br />'
			. makelink('util-' . $addon['basename'] . '-' . $row['config_id'] . '&amp;member=' . $roster->data['name'] . '@' . $roster->data['region'] . '-' . $roster->data['server'],true), ucfirst($row['config_id']),'sblue') . '<br />';
	}
	$roster->db->free_result();
}
