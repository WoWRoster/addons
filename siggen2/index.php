<?php
/**
 * SigGen - Signature and Avatar Generator for WoWRoster
 *
 * SigGen generator interface
 *
 * @copyright  2012
 * @author     Joshua Clark
 * @license    http://www.gnu.org/licenses/gpl.html   Licensed under the GNU General Public License v3.
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    SigGen
 * @filesource
 */

if (!defined('IN_ROSTER')) {
  exit('Detected invalid access to this file!');
}

$test_string = '[level:size(20):color(ff3333)] [name:color(66ffff)]: [race] [class] [exp:format_exp:color(00ff00)]';

$array = array(
	'file'   => 'background/back.png',
	'x'      => '0',
	'y'      => '0',
	'width'  => '',
	'height' => ''
);

$array2 = array(
	'file'   => '',
	'x'      => '10',
	'y'      => '10',
	'width'  => '',
	'height' => ''
);

$array3 = array(
	'size'    => '12',
	'angle'   => '5',
	'x'       => '10',
	'y'       => '80',
	'color'   => '#ffffff',
	'alpha'   => '0',
	'font'    => '',
	'text'    => $test_string,
	'align'   => '0',
	'outline' => array(
    'color' => '#000000',
    'width' => '2'
  ),
  'shadow'  => array(
		'color'     => '#000fff',
		'distance'  => '10',
		'direction' => '45',
		'spread'    => '1'
  )
);

$array4 = array(
	'desc_x'  => '100',
	'desc_y'  => '100',
	'level_x' => '200',
	'level_y' => '100',
	'color'   => '#ffff00',
	'alpha'   => '0',
	'size'    => '8',
	'font'    => '',
	'angle'   => '0',
	'outline' => array(
    'color' => '#000000',
    'width' => '1'
  ),
  'shadow'  => array(
		'color'     => '',
		'distance'  => '50',
		'direction' => '45',
		'spread'    => '1'
  ),
	'primary'     => 1,
	'secondary'   => 1,
	'riding'      => 1,
	'disp_desc'   => 1,
	'disp_level'  => 1,
	'desc_length' => 30,

	'align_desc'      => 0,
	'align_level'     => 2,
	'disp_levelmax'   => 0,
	'desc_linespace'  => 12,
	'level_linespace' => 12,
	'desc_gap'        => 5,
	'level_gap'       => 5
);


$sql = "UPDATE `" . $roster->db->table('layers', $addon['basename']) . "` SET `data` = '" . serialize($array) . "' WHERE `layer_id` = '1';";
$roster->db->query($sql);

$sql = "UPDATE `" . $roster->db->table('layers', $addon['basename']) . "` SET `data` = '" . serialize($array2) . "' WHERE `layer_id` = '2';";
$roster->db->query($sql);

$sql = "UPDATE `" . $roster->db->table('layers', $addon['basename']) . "` SET `data` = '" . serialize($array3) . "' WHERE `layer_id` = '3';";
$roster->db->query($sql);

$sql = "UPDATE `" . $roster->db->table('layers', $addon['basename']) . "` SET `data` = '" . serialize($array4) . "' WHERE `layer_id` = '4';";
$roster->db->query($sql);


//trigger_error(serialize($array));




$starttime = format_microtime();

require($addon['inc_dir'] . 'siggen.class.php');

if (isset($_GET['member'])) {
  if (is_numeric($_GET['member'])) {
    $where = '`members`.`member_id` = "' . $_GET['member'] . '"';
  } elseif (strpos($_GET['member'], '@') !== FALSE) {
    list($name, $realm) = explode('@', $_GET['member']);
    if (strpos($realm, '-') !== FALSE) {
      list($region, $relm) = explode('-', $realm, 2);
      $where = '`members`.`name` = "' . $name . '" AND `members`.`server` = "' . $realm . '" AND `members`.`region` = "' . strtoupper($region) . '"';
    } else {
      $where = '`members`.`name` = "' . $name . '" AND `members`.`server` = "' . $realm . '"';
    }
  } else {
    $name = $_GET['member'];
    $where = '`members`.`name` = "' . $name . '"';
  }

  $sql = "SELECT
	`players`.*,
	`guild`.*,
	`members`.*,
	UNIX_TIMESTAMP(`members`.`last_online`) AS 'last_online_stamp',
	UNIX_TIMESTAMP(`players`.`dateupdatedutc`) AS 'last_update_stamp',
	`proftable`.`professions`,
	`talenttable`.`talents`
	FROM `roster_members` AS members
	LEFT JOIN `roster_players` AS players ON `members`.`member_id` = `players`.`member_id`
	LEFT JOIN `roster_guild` AS guild ON `members`.`guild_id` = `guild`.`guild_id`
	LEFT JOIN (SELECT `member_id` , GROUP_CONCAT( CONCAT( `skill_type` , '|',`skill_name` , '|', `skill_level` ) ORDER BY `skill_order`) AS 'professions' FROM `roster_skills` GROUP BY `member_id`) AS proftable ON `members`.`member_id` = `proftable`.`member_id`
	LEFT JOIN (SELECT `member_id` , GROUP_CONCAT( CONCAT( `tree` , '|', `pointsspent` , '|', `background` ) ORDER BY `order`) AS 'talents' FROM `roster_talenttree` GROUP BY `member_id`) AS talenttable ON `members`.`member_id` = `talenttable`.`member_id`
	WHERE " . $where . ";";

  $siggen = new SigGen($addon, 'sig');
} elseif (isset($_GET['guild'])) {
  if (is_numeric($_GET['guild'])) {
    $where = '`guild_id` = "' . $_GET['guild'] . '"';
  } elseif (strpos($_GET['guild'], '@') !== FALSE) {
    list($name, $realm) = explode('@', $_GET['guild']);
    if (strpos($realm, '-') !== FALSE) {
      list($region, $realm) = explode('-', $realm, 2);
      $where = '`guild_name` = "' . $name . '" ' . 'AND `server` = "' . $realm . '" ' . 'AND `region` = "' . strtoupper($region) . '" ';
    } else {
      $where = '`guild_name` = "' . $name . '" ' . 'AND `server` = "' . $realm . '" ';
    }
  } else {
    $name = $_GET['guild'];
    $where = '`guild_name` = "' . $name . '"';
  }

  $sql = "SELECT * FROM `roster_guild` WHERE " . $where . ";";

  $siggen = new SigGen($addon, 'bnr');
}

$result = $roster->db->query($sql);

$array = $roster->db->fetch($result, SQL_ASSOC);

foreach ($array as $index => $item) {
  $siggen->tag->add_tag(array(
    'tag' => $index,
    'data' => $item
  ));
}

//$siggen->make_image();

if (isset($_GET['test'])) {
  $siggen->get_image();
  $siggen->finish();
} else {
  print $test_string . '<br/><br/>' . $siggen->tag->parse($test_string);

  $totaltime = round(format_microtime() - $starttime, 4);

  echo "<br /><br />$totaltime";

  aprint($array);
}
