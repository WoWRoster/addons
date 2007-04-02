<?php
/******************************
* $Id: $
******************************/

$wordings['addoncredits']['Gatherer'] = array(
	array(
		"name"=>	"Foxy",
		"info"=>	"Original Addon Developer"
	),
	array(
		"name"=>	"Zeryl",
		"info"=>	"Localization, fixed many minor issues, SQL import optimizations"
	),
	array(
		"name"=>	"Zanix",
		"info"=>	"Localization, fixed many minor issues"
	)
);

// ENGLISH
include_once($addonDir.'languages'.DIR_SEP.'enUS.php');

// FRENCH
include_once($addonDir.'languages'.DIR_SEP.'frFR.php');

// SPANISH
include_once($addonDir.'languages'.DIR_SEP.'esES.php');

// GERMAN
include_once($addonDir.'languages'.DIR_SEP.'deDE.php');

$gatherwords = &$wordings[$roster_conf['roster_lang']];