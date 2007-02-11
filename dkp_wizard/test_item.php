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
 * $Id$
 *
 ******************************/

define('ROSTER_INSTALLED','true');
require_once('../../settings.php');
require_once('../../lib/wowdb.php');
require_once('conf.php');
require('inc/rosterdkp.class.php');

//$item = getitemcache('19703:0:0:0', 'test', $itemdkpval = '');
//getitemcache($itemid, $itemname, $itemdkpval = '', $itemquality = 0, $itemcolor = 0, $itemtexture = 0, $update_outdated = 0)
$item = getitemcache('19722:0:0:0', 'Primal Hakkari Tabard', 5.00, 4, 'ffa335ee', 'INV_Banner_01');

print("<pre>Item:\n");
//print_r($wordings);
print_r($item);
print('<pre>');




?>
