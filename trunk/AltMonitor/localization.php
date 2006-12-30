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
$wordings['enUS']['AltMonitor_install_page']= 'AltMonitor Installer';
$wordings['enUS']['AltMonitor_install']     = 'The AltMonitor tables haven\'t been installed yet. Click Install to start the installation';
$wordings['enUS']['AltMonitor_upgrade']     = 'The AltMonitor tables are not up to date. Click Updade to update the database or click Install to drop and recreate the AltMonitor tables.';
$wordings['enUS']['AltMonitor_no_upgrade']  = 'The AltMonitor tables are already up to date. Click Reinstall below to reinstall the tables.';
$wordings['enUS']['AltMonitor_installed']   = 'Congratulations, AltMonitor has been successfully installed. Click the link below to configure it.';

// Main/Alt display
$wordings['enUS']['AltMonitor_Menu']        = 'Mains/Alts';
$wordings['enUS']['AltMonitor_NoAction']    = 'Please check if you mistyped the url, as an invalid action was defined. If you got here by a link from within this addon, report the bug on the WoWroster forums.';
$wordings['enUS']['main_name']              = 'Main\'s  name';
$wordings['enUS']['altlist_menu']           = 'Open/Close all tabs';
$wordings['enUS']['altlist_close']          = 'Close all';
$wordings['enUS']['altlist_open']           = 'Open all';


// Configuration
$wordings['enUS']['AltMonitor_config']      = 'Go to AltMonitor configuration';
$wordings['enUS']['AltMonitor_config_page'] = 'AltMonitor Configuration';
$wordings['enUS']['updMainAlt']             = 'Update Relations';

// Page names
$wordings['enUS']['admin']['confpage']      = 'Configuration';
$wordings['enUS']['admin']['updaterel']     = 'Update Relations';
$wordings['enUS']['admin']['documentation'] = 'Documentation';

$wordings['enUS']['admin']['build']         = 'Main/Alt Relations';
$wordings['enUS']['admin']['display']       = 'Display';

// Settings names on build page
$wordings['enUS']['admin']['getmain_regex'] = 'Regex|The top 3 variables define how the regex is extracted from the member info. <br /> See the wiki link for details. <br /> This field specifies the regex to use.';
$wordings['enUS']['admin']['getmain_field'] = 'Apply on field|The top 3 variables define how the regex is extracted from the member info. <br /> See the wiki link for details. <br /> This field specifies which member field the regex is applied on.';
$wordings['enUS']['admin']['getmain_match'] = 'Use match no|The top 3 variables define how the regex is extracted from the member info. <br /> See the wiki link for details. <br /> This field specifies which return value of the regex is used.';

$wordings['enUS']['admin']['getmain_main']  = 'Main identifier|If the regex resolves to this value the character is assumed to be a main.';
$wordings['enUS']['admin']['defmain']       = 'No result|Set what you want the character to be defined as if the regex doesn\'t return anything.';
$wordings['enUS']['admin']['invmain']       = 'Invalid result|Set what you want the character to be defined as if the regex returns a result that isn\'t a guild member or equal to the main identifier.';
$wordings['enUS']['admin']['altofalt']      = 'Alt of Alt|Specify what to do if the character is a mainless alt.';

// Settings names on display page
$wordings['enUS']['admin']['showmain']      = 'Show main name|Specify if you want to show or hide the character\'s main\'s name in the alt list.';
$wordings['enUS']['admin']['altopen']       = 'Alt foldouts|Specify if you want the alt foldouts open or closed by default.';
$wordings['enUS']['admin']['mainlessbottom']= 'Show mainless alts|Specify if you want mainless alts at the top or at the bottom.';

// -[ frFR Localization by Harut and Antaros]-

// Installer
$wordings['frFR']['AltMonitor_install_page']= 'Installation d\'AltMonitor';
$wordings['frFR']['AltMonitor_install']     = 'Les tables de AltMonitor n\'ont pas encore �t� install�es. Cliquez sur Install pour d�buter l\'installation.';
$wordings['frFR']['AltMonitor_upgrade']     = 'Les tables de AltMonitor ne sont pas � jour. Cliquez sur MAJ pour mettre � jour la base de donn�es ou cliquez sur Install pour �ffacer et r�cr�er les tables n�cessaires � AltMonitor.';
$wordings['frFR']['AltMonitor_no_upgrade']  = 'Les tables de AltMonitor sont d�j� � jour. Cliquez ci-dessous sur Reinstall pour r�installer les tables.';
$wordings['frFR']['AltMonitor_installed']   = 'F�licitations, AltMonitor a �t� install� avec succ�s. Cliquez sur le lien ci dessous pour le configurer.';

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
$wordings['frFR']['updMainAlt']             = 'Mettre a jour les relations';

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

// Settings names on display page
$wordings['frFR']['admin']['showmain']      = 'Montrer le nom du perso principal|D�finir si vous voulez montrer ou masquer le nom du perso principal dans la liste des rerolls.';
$wordings['frFR']['admin']['altopen']       = 'Arborescence des Rerolls|D�finir si vous voulez l\'arborescence des rerolls ouverte ou ferm�e par d�faut.';
$wordings['frFR']['admin']['mainlessbottom']= 'Montrer les persos sans perso principal|D�finir si vous voulez montrer les persos sans perso principal au d�but ou � la fin de la liste.';

// -[ deDE localization by Geschan and Sphinx ]-

// Installer
$wordings['deDE']['AltMonitor_install_page']= 'AltMonitor Installationssystem';
$wordings['deDE']['AltMonitor_install']     = 'Die AltMonitor Tabellen sind noch nicht installiert. Dr�cke Install um die ben�tigten Tabellen zu erzeugen.';
$wordings['deDE']['AltMonitor_upgrade']     = 'Die AltMonitor Tabellen sind nicht auf dem neuesten Stand. Bet�tige Update um die Datenbank zu aktualisieren oder Install um die Tabellen zu l�schen und neu zu erzeugen.';
$wordings['deDE']['AltMonitor_no_upgrade']  = 'Die AltMonitor Tabellen sind schon auf dem neuesten Stand. Bet�tige Reinstall um die Tabellen nochmal zu installieren.';
$wordings['deDE']['AltMonitor_installed']   = 'Glückwunsch, AltMonitor wurde erfolgreich installiert. Klicke auf den unten stehenden Link um es zu Konfigurieren.';

// Main/Alt display, Not fully translated yet
$wordings['deDE']['AltMonitor_Menu']        = 'Mains/Twinks';
$wordings['deDE']['AltMonitor_NoAction']    = 'Schau bitte nach, ob die URL korrekt ist, da eine inkorrekte Aktion get�tigt wurde. Bist du einem Link innerhalb dieses Addons gefolgt, mache bitte einen Bugreport im WoWroster Forum.';
$wordings['deDE']['main_name']              = 'Name des Mains';
$wordings['deDE']['altlist_menu']           = '&Ouml;ffne/Schlie�e alle Tabs';
$wordings['deDE']['altlist_close']          = 'Alle öffnen';
$wordings['deDE']['altlist_open']           = 'Alle schlie�en';

// Configuration
$wordings['deDE']['AltMonitor_config']      = '&Ouml;ffne die AltMonitor Konfiguration';
$wordings['deDE']['AltMonitor_config_page'] = 'AltMonitor Konfiguration';
$wordings['deDE']['updMainAlt']             = 'Beziehungen Aktualisieren';

// Page names
$wordings['deDE']['admin']['build']         = 'Main/Twink Beziehungen';
$wordings['deDE']['admin']['display']       = 'Anzeige';

// Settings names on build page
$wordings['deDE']['admin']['getmain_regex'] = 'Regex|Die oberen 3 Variablen definieren wie Regex aus der Mitgliederinformation herausgefiltert werden soll. <br /> Für mehr Details, benutzte den Link auf die Wiki Seite. <br /> Dieses Feld gibt an, wie Regex arbeiten soll.';
$wordings['deDE']['admin']['getmain_field'] = 'Auf dieses Feld beziehen| Die oberen 3 Variablen definieren wie Regex aus der Mitgliederinformation herausgefiltert werden soll. <br /> Für mehr Details, benutzte den Link auf die Wiki Seite. <br /> Dieses Feld gibt an, aus welchen Mitgliederfeld Regex seine Informationen beziehen soll.';
$wordings['deDE']['admin']['getmain_match'] = 'Benutze Treffer Nr. | Die oberen 3 Variablen definieren wie Regex aus der Mitgliederinformation herausgefiltert werden soll. <br /> Für mehr Details, benutzte den Link auf die Wiki Seite. <br /> Dieses Feld gibt an, welcher Rückgabewert von Regex benutzt werden soll.';

$wordings['deDE']['admin']['getmain_main']  = 'Main Identifikator| Wenn Regex diesen Wert findet, wird der Charakter als Main erkannt.';
$wordings['deDE']['admin']['defmain']       = 'Kein Ergebnis|Gebe an, als was ein Charakter eingestuft werden soll, wenn Regex nicht\'s findet.';
$wordings['deDE']['admin']['invmain']       = 'Ungültiges Ergebnis|Gebe an, als was ein Charakter eingestuft werden soll, wenn Regex ein Ergebnis findet, dass keinem Gildenmitglied zugeordnet werden kann oder mit dem Main Identifikator identisch ist.';
$wordings['deDE']['admin']['altofalt']      = 'Twink eines Twinks|Gebe an, als was ein Charakter eingestuft werden soll, wenn er als Twink ohne Main erkannt wurde.';

// Settings names on display page
$wordings['deDE']['admin']['showmain']      = 'Zeige den Namen des Mains|Gebe an, ob du möchtest, dass der Name des Mains in der Twink-Liste angezeigt werden soll oder nicht.';
$wordings['deDE']['admin']['altopen']       = 'Aufgeklappte Twinks|Gebe an, ob du möchtest, dass standardmäßig alle Twinks ausgeklappt sein sollen oder nicht.';
$wordings['deDE']['admin']['mainlessbottom']= 'Position der Mainlosen Twinks|Gebe an ob die Mainlosen Twinks über oder unterhalb der Liste angezeigt werden sollen.';

// Notes from German translator:

// UTF-8
// ä = �
// Ä = �
// ö = �
// &Ouml;  = �  //Da fehlt mir irgendwie die Kurzform ;)
// ü = �
// Ü = �
// ß = �
// ´ = �
//  = "


?>
