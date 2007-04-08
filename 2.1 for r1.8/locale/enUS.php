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

// -[ enUS Localization ]-

// Installer
$lang['AltMonitor_install_page']= 'AltMonitor Installer';
$lang['AltMonitor_install']     = 'The AltMonitor tables haven\'t been installed yet. Click Install to start the installation';
$lang['AltMonitor_upgrade']     = 'The AltMonitor tables are not up to date. Click Updade to update the database or click Install to drop and recreate the AltMonitor tables.';
$lang['AltMonitor_no_upgrade']  = 'The AltMonitor tables are already up to date. Click Reinstall below to reinstall the tables.';
$lang['AltMonitor_uninstall']   = 'This will remove the AltMonitor configuration and main/alt relations. Click \'Uninstall\' to proceed';
$lang['AltMonitor_installed']   = 'Congratulations, AltMonitor has been successfully installed. Click the link below to configure it.';
$lang['AltMonitor_uninstalled'] = 'AltMonitor has been uninstalled. You may now delete the addon from your webserver.';

// Main/Alt display
$lang['AltMonitor_Menu']        = 'Mains/Alts';
$lang['AltMonitor_NoAction']    = 'Please check if you mistyped the url, as an invalid action was defined. If you got here by a link from within this addon, report the bug on the WoWroster forums.';
$lang['main_name']              = 'Main\'s  name';
$lang['altlist_menu']           = 'Open/Close all tabs';
$lang['altlist_close']          = 'Close all';
$lang['altlist_open']           = 'Open all';

// Configuration
$lang['AltMonitor_config']      = 'Go to AltMonitor configuration';
$lang['AltMonitor_config_page'] = 'AltMonitor Configuration';
$lang['uninstall']              = 'Uninstall';

// Page names
$lang['admin']['build']         = 'Main/Alt Relations|Configure how the Main/Alt relations are detected.';
$lang['admin']['display']       = 'Display|Configure display options specific to AltMonitor.';
$lang['admin']['documentation'] = 'Documentation|AltMonitor documentation on the WoWRoster wiki.';
$lang['admin']['updMainAlt']    = 'Update Relations|Update the Main/Alt relations using the data already in the DB.';

// Settings names on build page
$lang['admin']['getmain_regex'] = 'Regex|The top 3 variables define how the regex is extracted from the member info. <br /> See the wiki link for details. <br /> This field specifies the regex to use.';
$lang['admin']['getmain_field'] = 'Apply on field|The top 3 variables define how the regex is extracted from the member info. <br /> See the wiki link for details. <br /> This field specifies which member field the regex is applied on.';
$lang['admin']['getmain_match'] = 'Use match no|The top 3 variables define how the regex is extracted from the member info. <br /> See the wiki link for details. <br /> This field specifies which return value of the regex is used.';

$lang['admin']['getmain_main']  = 'Main identifier|If the regex resolves to this value the character is assumed to be a main.';
$lang['admin']['defmain']       = 'No result|Set what you want the character to be defined as if the regex doesn\'t return anything.';
$lang['admin']['invmain']       = 'Invalid result|Set what you want the character to be defined as if the regex returns a result that isn\'t a guild member or equal to the main identifier.';
$lang['admin']['altofalt']      = 'Alt of Alt|Specify what to do if the character is a mainless alt.';

$lang['admin']['update_type']   = 'Update type|Specify on which trigger types to update main/alt relations.';

// Settings names on display page
$lang['admin']['showmain']      = 'Show main name|Specify if you want to show or hide the character\'s main\'s name in the alt list.';
$lang['admin']['altopen']       = 'Alt foldouts|Specify if you want the alt foldouts open or closed by default.';
$lang['admin']['mainlessbottom']= 'Show mainless alts|Specify if you want mainless alts at the top or at the bottom.';
