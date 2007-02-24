<?php

error_reporting(E_ALL);
if ( !defined('ROSTER_INSTALLED') ) {
	exit('Detected invalid access to this file!');
}

# Dont forget to add the functions!
require_once($announce->incdir.'inc/functions.php' );
require_once($announce->incdir.'inc/db.php' );

//clearstatcache();

if(isset($_REQUEST['admin'])) {
	define('ADMINSEC', 'yes');
	require_once ($announce->incdir.'admin.php');
	return;
}

if (!table_exists(ANNOUNCE_TABLE)) {
	echo "The announcements database hasn't been installed yet!<br>";
	echo 'If you are an admin, you can <a href="'.$announce->filename.'&amp;admin">log in</a> to install it now.';
	return;
}


if (isset($_GET['last'])) {
	$howmany = $_GET['last'];
	$op = 'getlast';
}
elseif (!isset($_GET['last']))
$op = '';

switch($op) {
	case 'getlast':

		global $toggleboxes;

		$toggleboxes++;

		$query = "SELECT * FROM ".ANNOUNCE_TABLE." WHERE active = '1' order by date DESC LIMIT ".$howmany."";
		$results = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);

		while ($row = $wowdb->fetch_array($results)) {

			$message = $row['post'];;
			$title = $row['title'];
			$style = 'sgray';
			$open = false;
			$width = '550px';
			$height = '100px';

			echo
			'<div id="toggleCol'.$toggleboxes.'" style="display:'.(($open)?'none':'inline').';">'.
			border($style,'start',"<div style=\"cursor:pointer;width:".$width.";\" onclick=\"swapShow('toggleCol".$toggleboxes."','toggle".$toggleboxes."')\"><img src=\"".$roster_conf['img_url']."plus.gif\" style=\"float:right;\" /> Announcement: ".$title."</div>").
			border($style,'end').
			'</div>'.
			'<div id="toggle'.$toggleboxes.'" style="display:'.(($open)?'inline':'none').';">'.
			scrollbox($message,"<div style=\"cursor:pointer;width:".$width.";\" onclick=\"swapShow('toggleCol".$toggleboxes."','toggle".$toggleboxes."')\"><img src=\"".$roster_conf['img_url']."minus.gif\" style=\"float:right;\" /> Announcement: ".$title."</div>",$style, $width, $height).
			'</div><br>';
		}
		break;

	default:

		$query = "SELECT * FROM ".ANNOUNCE_TABLE." WHERE active='1' order by date DESC";
		$results = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);

		while ($row = $wowdb->fetch_array($results)){
			// Convert the date to readable time
			$date = get_local_date($row['date'], $roster_conf['localtimeoffset']);

			// In the archive, display all boxes open.
	echo border('syellow','start');	?>

<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class='simpleborderheader syellowborderheader'><div class="membersGroup">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td> <?PHP echo $row['title']; ?></td>
          <td><div align="right"><?php echo $date.' ('. $roster_conf['timezone'] ?>)</div></td>
        </tr>
      </table>
      </div></td>
  </tr>
  <tr>
    <td><?PHP echo  $row['post']; ?>
	</td>
  </tr>
</table>

		<?php echo border('syellow','end'); ?> <br>
		<?php } make_admin_link(); break; } ?>