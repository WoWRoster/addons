<?php require_once('YOUR_PATH/adodb.inc.php'); ?>
<?php
$objConnection = &ADONewConnection('mysql'); 
$objConnection->Connect('localhost','root','','test');
?>