<?php
/*
****************************************************************
* gllcTS2 for TeamSpeak 2 © Gryphon, LLC (www.gryphonllc.com ) *
****************************************************************
*
* $Id: login.php 999 2008-07-03 17:51:49Z gryphon $
* $Rev: 999 $
* $LastChangedBy: gryphon $
* $Date: 2008-07-03 10:51:49 -0700 (Thu, 03 Jul 2008) $
*/

if (isset($_POST["action"]))
{
	include("./admin/db_inc.php");
	include("tpl_style.php");
	include("tpl_loggedin.php");
}
else
{
	include("./admin/db_inc.php");
	include("tpl_style.php");
	$r = query("SELECT * FROM $dbtable1 WHERE server_id='" . addslashes(htmlspecialchars($_GET['detail'])) . "'");
	$row = mysql_fetch_object($r);

	include("tpl_login.php");
}
?>