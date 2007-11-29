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
$config_str = "SELECT `config_id`,`main_image_size_w`,`main_image_size_h`,`image_type`,`link_type`,`save_images_dir` FROM `" . $roster->db->table('config',$addon['basename']) . "`;";


print "<table><tr><td>\n";

$config_sql = $roster->db->query($config_str);
if( $config_sql )
{
	while( $row = $roster->db->fetch($config_sql, SQL_ASSOC) )
	{
		$siggen_saved_find = array('/', '%r', '%s');
		$siggen_saved_rep  = array(DIR_SEP, ROSTER_URL, $addon['url_full']);
		$save_loc = str_replace('\\','/',str_replace($siggen_saved_find,$siggen_saved_rep,$row['save_images_dir']));

		$curr_seo = $roster->config['seo_url'];

		$roster->config['seo_url'] = ( $row['link_type'] == 'forceseo' ? 1 : $curr_seo );

		if( $row['link_type'] == 'saved' )
		{
			print messagebox('<img src="' . str_replace('.html', '.' . $row['image_type'], makelink('util-' . $addon['basename'] . '-' . $row['config_id'] . '&amp;a=c:' . $roster->data['member_id'])) . '" alt="" width="' . $row['main_image_size_w'] . '" height="' . $row['main_image_size_h'] . '" /><br />'
				. $save_loc . $roster->data['member_id'] . '.' . $row['image_type'], ucfirst($row['config_id']),'sblue','100%') . '<br />';
		}
		else
		{
			print messagebox('<img src="' . str_replace('.html', '.' . $row['image_type'], makelink('util-' . $addon['basename'] . '-' . $row['config_id'] . '&amp;a=c:' . $roster->data['member_id'] . '&amp;saveonly=0')) . '" alt="" width="' . $row['main_image_size_w'] . '" height="' . $row['main_image_size_h'] . '" /><br />'
				. str_replace('.html', '.' . $row['image_type'], makelink('util-' . $addon['basename'] . '-' . $row['config_id'] . '&amp;a=c:' . $roster->data['member_id'],true)), ucfirst($row['config_id']),'sblue','100%') . '<br />';
		}

		$roster->config['seo_url'] = $curr_seo;
	}
	$roster->db->free_result();
}

print "</td></tr></table>\n";
