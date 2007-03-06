<?php
/******************************
 * WoWRoster.net  Roster
 * Copyright 2002-2006
 * Licensed under the Creative Commons
 * "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * Short summary
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/
 *
 * Full license information
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/legalcode
 * -----------------------------
 *
 * $Id: localization.php 19 2006-12-27 06:25:26Z zanix $
 *
 ******************************/

$wordings['addoncredits']['Key bc v0.3'] = array(
	array(	"name"=>	"Titan99, SartriX",
		"info"=>	"Display a key bc"),
);

if($roster_conf['roster_lang']=="frFR")
	include_once($addonDir.'lang/frFR.php');
elseif($roster_conf['roster_lang']=="deDE")
	include_once($addonDir.'lang/deDE.php');
elseif($roster_conf['roster_lang']=="enUS")
	include_once($addonDir.'lang/enUS.php');


?>