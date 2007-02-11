<?php require_once('connection.php'); ?>
<?php require_once('class.ADODB_XML.php'); ?>
<?
/*
This example saves the content of file XML in the table "users" of the Data base.  
Tags of the XML corresponds to the fields of the table.
*/
$adodbXML = new ADODB_XML("1.0", "ISO-8859-1");
$adodbXML->InsertIntoDB(&$objConnection, "usersxml.xml", "user");
?>