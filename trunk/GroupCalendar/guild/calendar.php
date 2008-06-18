<?php // Include all the settings and functions

	require("include/helper_functions.php");
	require("include/calendar_functions.php");
	
	define('CALENDAR_TABLE',$roster->db->table('info',$addon['basename']));
	
	define('ATTENDANCE_TABLE',$roster->db->table('attend',$addon['basename']));
	
	define('OTHERINFO_TABLE',$roster->db->table('other',$addon['basename']));
$roster->output['html_head'] = '
<script type="text/javascript" src="' . ROSTER_PATH . 'addons/GroupCalendar/css/tooltip.js"></script>

<link rel="stylesheet" href="' . ROSTER_PATH . 'addons/GroupCalendar/css/calendar.css" type="text/css" />
<link rel="stylesheet" href="' . ROSTER_PATH . 'addons/GroupCalendar/css/style.css" type="text/css" />
';
?>



<?php echo  $tooltipHolder ?>
<?php javaScript() ?>
<?php //print makeContainerTop($gc_lang['event_calendar'],"100%"); 
?>
	<?php 
	
	if (isset($_GET['id'])){
	include 'calendar_event.php';
	}
	
	if (!isset($_GET['id'])){
	
	
      print border('sgreen','start',$roster->locale->act['event_calendar']); ?>
	<table cellpadding="0" cellspacing="0" border="0" align="center">
	<tr>
		<td>
			<?php echo  $scrollarrows ?><span class="date_header">&nbsp;<?php echo  $roster->locale->act['months'][$m-1] ?>&nbsp;<?php echo  $y ?></span>
		</td>
	
		<!-- form tags must be outside of <td> tags -->
		<form name="monthYear">
		
		<td align="right">
		<?php monthPullDown($m, $roster->locale->act['months']); yearPullDown($y); ?>
		<input type="button" value="<?php echo  $roster->locale->act['forms']['go'] ?>" onClick="submitMonthYear()">
		</td>
		</form>
	
	</tr>
	
	<tr>
		<td colspan="2" bgcolor="#000000">
		<?php echo writeCalendar($m, $y); 
            ?>
		</td>
	</tr>
	<tr>
		<td colspan="2">
		  <font size="-1"><?php echo  $roster->locale->act['Last_Updated'] ?><?php echo  get_calendar_update_time() ?></font>
		</td>
	</tr>
	</table>
	<?php 
      echo border('sgreen','end');
      }
	
      ?>




