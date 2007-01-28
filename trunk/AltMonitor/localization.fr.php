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

// -[ frFR Localization by Harut and Antaros]-

// Installer
$wordings['frFR']['AltMonitor_install_page']= 'Installation d\'AltMonitor';
$wordings['frFR']['AltMonitor_install']     = 'Les tables de AltMonitor n\'ont pas encore �t� install�es. Cliquez sur Install pour d�buter l\'installation.';
$wordings['frFR']['AltMonitor_upgrade']     = 'Les tables de AltMonitor ne sont pas � jour. Cliquez sur MAJ pour mettre � jour la base de donn�es ou cliquez sur Install pour �ffacer et r�cr�er les tables n�cessaires � AltMonitor.';
$wordings['frFR']['AltMonitor_no_upgrade']  = 'Les tables de AltMonitor sont d�j� � jour. Cliquez ci-dessous sur Reinstall pour r�installer les tables.';
$wordings['enUS']['AltMonitor_uninstall']   = 'This will remove the AltMonitor configuration and main/alt relations. Click \'Uninstall\' to proceed';
$wordings['frFR']['AltMonitor_installed']   = 'F�licitations, AltMonitor a �t� install� avec succ�s. Cliquez sur le lien ci dessous pour le configurer.';
$wordings['enUS']['AltMonitor_uninstalled'] = 'AltMonitor has been uninstalled. You may now delete the addon from your webserver.';

// Main/Alt display
$wordings['frFR']['AltMonitor_Menu']        = 'Mains/Rerolls';
$wordings['frFR']['AltMonitor_NoAction']    = 'Action invalide : Veuillez v�rifier si vous avez correctement tap� l\'url. Si vous avez acc�d� � cette page via le lien pr�sent sur cet addon, signalez ce bug sur les forums de WoWroster.';
$wordings['frFR']['main_name']              = 'Nom du perso principal';
$wordings['frFR']['altlist_menu']           = 'Ouvrir/Fermer l\'arborescence';
$wordings['frFR']['altlist_close']          = 'Fermer Tout';
$wordings['frFR']['altlist_open']           = 'Ouvrir Tout';

// Configuration
$wordings['frFR']['AltMonitor_config']      = 'Configurer AltMonitor';
$wordings['frFR']['AltMonitor_config_page'] = 'Configuration d\'AltMonitor';
$wordings['frFR']['documentation']          = 'Documentation';
$wordings['frFR']['updMainAlt']             = 'Mettre a jour les relations';
$wordings['frFR']['uninstall']              = 'Uninstall';

// Page names
$wordings['frFR']['admin']['build']         = 'Relations Main/Reroll';
$wordings['frFR']['admin']['display']       = 'Montrer';

// Settings names on build page
$wordings['frFR']['admin']['getmain_regex'] = 'Regex|Les 3 premi�res variables d�finissent la fa�on dont le regex est extrait depuis les infos du membre. <br /> Voir le wiki pour les d�tails. <br /> Ce champ d�fini quel regex utiliser.';
$wordings['frFR']['admin']['getmain_field'] = 'Appliquer sur le champ|Les 3 premi�res variables d�finissent la fa�on dont le regex est extrait depuis les infos du membre. <br /> Voir le wiki pour les d�tails. <br />Ce champ d�fini sur quel champ du membre le regex est appliqu�.';
$wordings['frFR']['admin']['getmain_match'] = 'Use match no|Les 3 premi�res variables d�finissent la fa�on dont le regex est extrait depuis les infos du membre. <br /> Voir le wiki pour les d�tails. <br /> Ce champ d�fini quel valeur de retour est utilis�e par le regex.';

$wordings['frFR']['admin']['getmain_main']  = 'Identification du perso principal|Si le regex retourne cette valeur le perso est consid�r� comme un perso principal.';
$wordings['frFR']['admin']['defmain']       = 'Pas de r�sultats|D�finir ce que sera le perso si le regex ne retourne rien.';
$wordings['frFR']['admin']['invmain']       = 'R�sultat invalide|D�finnir ce que sera le perso si le regex donne un perso n\'�tant pas dans la guilde ou correspondant a un perso principal.';
$wordings['frFR']['admin']['altofalt']      = 'Reroll de Reroll|D�finir ce qu\'il faut faire si le perso est sans perso principal.';

$wordings['frFR']['admin']['update_type']   = 'Type de mise �  jour | Indiquez le type de mise �  jour de la relation main/alt';

// Settings names on display page
$wordings['frFR']['admin']['showmain']      = 'Montrer le nom du perso principal|D�finir si vous voulez montrer ou masquer le nom du perso principal dans la liste des rerolls.';
$wordings['frFR']['admin']['altopen']       = 'Arborescence des Rerolls|D�finir si vous voulez l\'arborescence des rerolls ouverte ou ferm�e par d�faut.';
$wordings['frFR']['admin']['mainlessbottom']= 'Montrer les persos sans perso principal|D�finir si vous voulez montrer les persos sans perso principal au d�but ou � la fin de la liste.';
