<?php
if (!function_exists("makeContainerTop")) {
	function makeContainerTop($title,$w=0,$h=0) {
		if (!$h) {$h = "";}
		else {$h = "height=\"$h\""; }
		if (!$w) {$w = "width=\"100%\""; }
		else {$w = "width=\"$w\""; }
		$res = "";
		$res .= "<table border=\"0\" $w $h cellpadding=\"0\" cellspacing=\"0\" class=\"ContainerTable\">\n";
		$res .= "<tr>\n";
		$res .= "<td colspan=\"3\">\n";
		$res .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n";
		$res .= "<tr>\n";
		$res .= "<td width=\"24\"><img src=\"".$addon['image_url']."container-1.jpg\" width=\"24\" height=\"25\" border=\"0\"></td>\n";
		$res .= "<td class=\"ContainerTitle\" align=left>$title</td>\n";
		$res .= "<td width=\"11\"><img src=\"".$addon['image_url']."container-3.jpg\" width=\"11\" height=\"25\"></td>\n";
		$res .= "</tr>\n";
		$res .= "</table>\n";
		$res .= "</td>\n";
		$res .= "</tr>\n";
		$res .= "<tr>\n";
		$res .= "<td class=\"ContainerLeft\" width=\"3\"><img src=\"".$addon['image_url']."blank.gif\"></td>\n";
		$res .= "<td class=\"ContainerContent\" width=\"100%\">\n";
		return $res;
	};
}

if (!function_exists("makeContainerBottom")) {
	function makeContainerBottom() {
		$res = "";
		$res .= "</td>\n";
		$res .= "<td class=\"ContainerRight\" width=\"3\"><img src=\"".$addon['image_url']."blank.gif\"></td>\n";
		$res .= "</tr>\n";
		$res .= "<tr>\n";
		$res .= "<td colspan=\"3\">\n";
		$res .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n";
		$res .= "<td width=\"24\"><img src=\"".$addon['image_url']."container-4.gif\" width=\"24\" height=\"8\" border=\"0\"></td>\n";
		$res .= "<td style=\"background-image:url('".$addon['image_url']."container-5.gif')\"><img src=\"images/blank.gif\"></td>\n";
		$res .= "<td width=\"11\"><img src=\"".$addon['image_url']."container-6.gif\" width=\"11\" height=\"8\" border=\"0\"></td>\n";
		$res .= "</table>\n";
		$res .= "</td>\n";
		$res .= "</tr>\n";
		$res .= "</table>\n";
		return $res;
	};
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?=$PAGE_TITLE?></title>
<link rel=StyleSheet title="Basic" type="text/css" href="style.css">
<link rel=StyleSheet title="Basic" type="text/css" href="calendar.css">
</head>

<body>
<table align="center" width="85%" cellpadding="0" cellspacing="0" border="0">
  <tr>
    <td width="25"><img src="images/bird-left-1-top.gif" width="25" height="40" border=0></td>
	<td style="background-image: url('<?php echo $addon['image_url'] ?>mainbox-top.gif')">
	  <table width="100%" cellpadding="0" cellspacing="0" border="0">
	    <tr>
		  <td width="46"><img src="<?php echo $addon['image_url'] ?>bird-left-2-top.gif" width="46" height="40" border="0"></td>
		  <td><img src="<?php echo $addon['image_url'] ?>blank.gif" width="2" height="2" border="0"></td>
		  <td width="46"><img src="<?php echo $addon['image_url'] ?>bird-right-1-top.gif" width="46" height="40" border="0"></td>
		</tr>
	  </table>
	</td>
	<td width="25"><img src="<?php echo $addon['image_url'] ?>bird-right-2-top.gif" width="25" height="40" border="0"></td>
  </tr>
  <tr>
    <td width="25" valign="top" class="MainLeftBar"><img src="<?php echo $addon['image_url'] ?>bird-left-1-bottom.gif" width="25" height="25" border="0"></td>
	<td valign="top" style="background-image: url('<?php echo $addon['image_url'] ?>bg-kalidar.jpg')">
	  <table border="0" cellpadding="0" cellspacing="0" width="100%">
	    <tr>
		  <td style="background-image: url('<?php echo $addon['image_url'] ?>mainbox-top-remainder.gif')"><img src="images/blank.gif" width="2" height="3" border="0"></td>
		</tr>
		<tr>
		  <td height="200" align="center">
		  <!-- INSERT A GUILD GRAPHIC HERE -->
		  </td>
		</tr>
	  </table>
	<td width="25" valign="top" class="MainRightBar"><img src="<?php echo $addon['image_url'] ?>bird-right-2-bottom.gif" width="25" height="25" border="0"></td>
  </tr>
  <tr>
    <td width="25"><img src="<?php echo $addon['image_url'] ?>divider-left.gif" width="25" height="20" border="0"></td>
	<td height="20">
	  <table border="0" cellpadding="0" cellspacing="0" width="100%">
	    <tr>
		  <td class="MainLinkBar" align="left"> &nbsp;&nbsp;&nbsp;&nbsp;
		    <a class="MainLinkBar" href="calendar.php">Calendar</a> &nbsp;&nbsp;|&nbsp;&nbsp;
			<a class="MainLinkBar" href="calendar_upload.php">Upload Data</a> &nbsp;&nbsp;|&nbsp;&nbsp;
			<a class="MainLinkBar" href="/">Main Page</a>
		  </td>
		  <td class="MainLinkBar" align="right"><?
		  	if (!defined(CURR_TIME_OFFSET)) define(CURR_TIME_OFFSET,-7);
		  	if (!isset($gc_user['user_timezone'])) $gc_user['user_timezone'] = CURR_TIME_OFFSET;
			if (!defined(TIME_DISPLAY_FORMAT)) define(TIME_DISPLAY_FORMAT,"24hr");
		  	if (TIME_DISPLAY_FORMAT == "24hr") echo date("F j, Y H:i",gmmktime()+(3600*$gc_user['user_timezone']));
			else echo date("F j, Y g:i A",gmmktime()+(3600*$gc_user['user_timezone']));
		  ?></td>
		</tr>
	  </table>
	</td>
	<td width="25"><img src="<?php echo $addon['image_url'] ?>divider-right.gif"></td>
  </tr>
  <tr>
    <td width="25" class="MainLeftBar"><img src="<?php echo $addon['image_url'] ?>blank.gif" width="2" height="2" border="0"></td>
	<td class="ContentCell">

