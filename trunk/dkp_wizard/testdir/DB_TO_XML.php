<?php require_once('connection.php'); ?>
<?php require_once('class.ADODB_XML.php'); ?>
<?
/*
This example saves the data of the consultation in an file XML
*/
$adodbXML = new ADODB_XML("1.0", "ISO-8859-1");
$adodbXML->ConvertToXML(&$objConnection, "SELECT * FROM user", "usersxml.xml");
?>
