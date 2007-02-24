<?php
error_reporting(E_ALL);
if ( !defined('ROSTER_INSTALLED') ) {
	exit('Detected invalid access to this file!');
}

if ( !defined('ADMINSEC') ) {
	exit('Detected invalid access to this file!');
}

// ----[ Check for a cookie, and verrify it on admin page load ]-------------
$script_filename = 'addon.php?roster_addon_name=announcements&admin';
$roster_login = new RosterLogin($script_filename);

// ----[ Disallow viewing of the page ]-------------
if( !$roster_login->getAuthorized() ) {
	include_once (ROSTER_BASE.'roster_header.tpl');
	include_once (ROSTER_LIB.'menu.php');

	print
	'<span class="title_text">'.$wordings[$roster_conf['roster_lang']]['roster_config'].'</span><br />'.
	$roster_login->getMessage().
	$roster_login->getLoginForm();

	include_once (ROSTER_BASE.'roster_footer.tpl');

	exit();
}

if (isset($_REQUEST['install']) == 'yes') {

	$results = $wowdb->query($announce_inistdb);

	if ($results) {
		echo 'Step 1 of 1: Database was installed.<br>';
		echo 'You can make your first post by visiting the <a href="'.$announce->filename.'&amp;admin">Administration</a>';
		return;
	} else {
		echo "There was a problem installing the database.";
		return;
	}
}

if (!table_exists(ANNOUNCE_TABLE) && !isset($_GET['action']) == 'install') {
	echo "The announcements database hasn't been installed yet!<br>";
	echo 'You can <a href="'.$announce->filename.'&amp;admin&amp;install=yes">install it now</a>.';
	return;
}

if (!isset($_GET['action']))
	$op = '';
elseif (($_GET['action']) == 'add')
	$op = 'add';
elseif (($_GET['action']) == 'edit')
	$op = 'edit';
elseif (($_GET['action']) == 'delete')
	$op = 'delete';


switch ($op) {

// The add panel
	case 'add':

		if(isset($_GET['action']) == 'add' && isset($_POST['add'])) {

			$d = gmdate('Y-m-d H:i:s');

			$query = "INSERT INTO ".ANNOUNCE_TABLE." (ID, title, post, date, active) VALUES (NULL , '$_POST[title]', '$_POST[message]', '$d', '$_POST[published]')";
			$wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);

			if(mysql_affected_rows())
			echo "Your post was entered".'<br>';
			else
			echo "There was an error entering your post".'<br>';
		}


		?>
		<br><br>
		<form id="subnews" name="postannouncement" method="POST" action="<?php echo $announce->filename; ?>&amp;admin&amp;action=add">
		<input type="hidden" value="1" name="add" />
		<table width="311" border="0" cellpadding="5" cellspacing="0">
		  <tr>
		    <td width="108">Title:</td>
		    <td width="183"><input name="title" type="text" size="80" id="title" /></td>
		  </tr>
		  <tr>
		    <td valign="top"><br />Announcement:</td>
		    <td><textarea name="message" cols="80" rows="6" id="Message"></textarea></td>
		  </tr>
		<tr>
		  <td>&nbsp;</td>
		  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><input name="published" type="radio" value="1" checked="checked" /> Published
  				  <input name="published" type="radio" value="0" /> Draft </td>
              <td><div align="right"> <input type="submit" name="Submit" value="Submit"/> </div>
              </td>
            </tr>
          </table></td>
		</tr>
		</table></form>
		<?php make_admin_link();
		break;



		// The edit panel
	case 'edit':

		if(isset($_GET['action']) == 'edit' && isset($_POST['edit'])) {
			// This needs to be altered in the future to confirm that the post has been removed.

			$query = "UPDATE ".ANNOUNCE_TABLE." SET `title`='$_POST[title]', `post`='$_POST[message]', `active`='$_POST[published]' WHERE `ID` = $_GET[id]";
			$results = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);

			if(mysql_affected_rows())
			echo "Your post was modified".'<br>';
			else
			echo "There was an error modifying your post".'<br>';
		}


		if(isset($_GET['id']) && !isset($_POST['edit'])) {
			//////////////////////////////////////
			// Code for editing an individual post
			//////////////////////////////////////

			$query = "SELECT * FROM ".ANNOUNCE_TABLE." WHERE ID = '$_GET[id]' order by date DESC";

			$results = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);

			if(mysql_num_rows($results)) {
					$row = $wowdb->fetch_array($results); ?>

<form id="subnews" name="postannouncement" method="post" action="<?php echo $announce->filename; ?>&amp;admin&amp;action=edit&amp;id=<?PHP echo $row['ID'] ?>">
  <input type="hidden" value="1" name="edit">
  <table width="311" border="0" cellpadding="5" cellspacing="0">
    <tr>
      <td width="108">Title:</td>
      <td width="183"><input name="title" type="text" id="title" value="<?php echo $row['title']; ?>" size="80"></td>
    </tr>
    <tr>
      <td valign="top"><br>
        Announcement:</td>
      <td><textarea name="message" cols="80" rows="6" id="Message"><?php echo $row['post']; ?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><?php if ($row['active'] == '1') { ?>
              <input name="published" type="radio" value="1" checked="checked" />
Published
<input name="published" type="radio" value="0" />
Draft
<?php
              			  		} else { ?>
<input name="published" type="radio" value="1" />
Published
<input name="published" type="radio" value="0" checked="checked" />
Draft
<?php } ?></td>
            <td><div align="right">
              <input type="submit" name="Submit" value="Submit" />
            </div></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
				<?php
			}
			else
			echo "Article was not specified";
		}

		else {
			?>
			<h3 >Edit Announcements</h3>
			<table width="700" border="1" cellspacing="0" cellpadding="0">
			<?php
			$query = "SELECT * FROM ".ANNOUNCE_TABLE." order by date DESC";

			$results = $wowdb->query($query) or die_quietly($wowdb->error(), 'Database Error', basename(__FILE__),__LINE__,$query);

			while ($row = $wowdb->fetch_array($results)){ ?>
			  <tr>
    		    <td><?PHP echo $row['title']; ?> <?php if ($row['active'] == '0') { echo " | --DRAFT"; } ?></td>
    		    <td width="160"><?php echo $row['date'] ?></td>
    		    <td width="120"><div align="center">
    		      <a href="<?php echo $announce->filename; ?>&amp;admin&amp;action=edit&amp;id=<?php echo $row['ID'] ?>">Edit</a> -
    		      <a href="<?php echo $announce->filename; ?>&amp;admin&amp;action=delete&amp;id=<?php echo $row['ID'] ?>">Delete</a></div></td>
  			  </tr>

		<?php } ?>
		</table>
		<?php }
		make_admin_link();
		break;

// ----[ Handle deleting announcements by id ]-------------
	case 'delete':

		$id = $_GET['id'];

		if(isset($_GET['action']) == 'delete' && isset($_POST['confirm'])) {
			// This needs to be altered in the future to confirm that the post has been removed.
			$query = "DELETE FROM ".ANNOUNCE_TABLE." WHERE ID = $id";
			$results = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);

			if(mysql_affected_rows())
			echo "Your post was deleted".'<br>';
			else
			echo "There was an error deleting your post".'<br>';
		}



		$query = "SELECT * FROM ".ANNOUNCE_TABLE." WHERE ID = '$id'";

		$results = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);

		if(!mysql_num_rows($results))
		echo "There were no results.";


			$row = $wowdb->fetch_array($results); ?>


			<h3 >Delete Announcements</h3>
			<table width="550" border="1" cellspacing="0" cellpadding="0">
  			  <tr>
    			<td width="110">Date</td>
    			<td width="434"><?PHP echo $row['date']; ?></td>
  			  </tr>
  			  <tr>
    			<td>Title</td>
    			<td><?PHP echo $row['title']; ?></td>
  			  </tr>
  			  <tr>
    			<td>Announcement</td>
    			<td><?PHP echo $row['post']; ?></td>
  			  </tr>
			</table><br>
			<p>Are you sure you want to delete this announcement? This action CAN NOT be undone!</p>
			<form id="delete" name="Delete" method="POST" action="<?php echo $announce->filename; ?>&amp;admin&amp;action=delete&amp;id=<?PHP echo $row['ID']; ?>">
			<input type="hidden" value="1" name="confirm" />
			<input type="submit" name="Submit" value="Delete"/></form><br />

		<?php make_admin_link();
		break;

// ----[ Load the administration panel ]-------------
	default:
	?>
<h3 >Announcements Administration</h3>

<div align="center"><a href="<?php echo $announce->filename; ?>&amp;admin&amp;action=add">Add Announcements</a></div>
<div align="center"><a href="<?php echo $announce->filename; ?>&amp;admin&amp;action=edit">Manage Announcements</a></div>
<?php break;
}


		?>