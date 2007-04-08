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

// -[ frFR Localization ]-

// Installer
$lang['AltMonitor_install_page']= 'Installation d\'AltMonitor';
$lang['AltMonitor_install']     = 'Les tables de AltMonitor n\'ont pas encore été installée. Cliquez sur Install pour débuter l\'installation.';
$lang['AltMonitor_upgrade']     = 'Les tables de AltMonitor ne sont pas à jour. Cliquez sur MAJ pour mettre à jour la base de données ou cliquez sur Install pour effacer et recréer les tables nécessaires à AltMonitor.';
$lang['AltMonitor_no_upgrade']  = 'Les tables de AltMonitor sont déjà à jour. Cliquez ci-dessous sur Reinstall pour réinstaller les tables.';
$lang['SortMember_uninstall']   = 'Cela supprimera la configuration et les relations main/alt. Cliquez sur \'Désinstaller\' pour continuer.';
$lang['AltMonitor_installed']   = 'Félicitations, AltMonitor a été installé avec succès. Cliquez sur le lien ci dessous pour le configurer.';
$lang['SortMember_uninstalled'] = 'AltMonitor a été désinstallé. Vous pouvez supprimer le dossier du serveur';

// Main/Alt display
$lang['AltMonitor_Menu']        = 'Mains/Rerolls';
$lang['AltMonitor_NoAction']    = 'Action invalide : Veuillez vérifier si vous avez correctement tapé l\'url. Si vous avez accédé à cette page via le lien présent sur cet addon, signalez ce bug sur les forums de WoWroster.';
$lang['main_name']              = 'Nom du perso principal';
$lang['altlist_menu']           = 'Ouvrir/Fermer l\'arborescence';
$lang['altlist_close']          = 'Fermer Tout';
$lang['altlist_open']           = 'Ouvrir Tout';

// Configuration
$lang['AltMonitor_config']      = 'Configurer AltMonitor';
$lang['AltMonitor_config_page'] = 'Configuration d\'AltMonitor';
$lang['documentation']          = 'Documentation';
$lang['updMainAlt']             = 'Mettre a jour les relations';
$lang['uninstall']              = 'Uninstall';

// Page names
$lang['admin']['build']         = 'Main/Alt Relations|Configure how the Main/Alt relations are detected.';
$lang['admin']['display']       = 'Display|Configure display options specific to AltMonitor.';
$lang['admin']['documentation'] = 'Documentation|AltMonitor documentation on the WoWRoster wiki.';
$lang['admin']['updMainAlt']    = 'Update Relations|Update the Main/Alt relations using the data already in the DB.';

// Settings names on build page
$lang['admin']['getmain_regex'] = 'Regex|Les 3 premières variables définissent la façon dont le regex est extrait depuis les infos du membre. <br /> Voir le wiki pour les détails. <br /> Ce champ défini quel regex utiliser.';
$lang['admin']['getmain_field'] = 'Appliquer sur le champ|Les 3 premières variables définissent la façon dont le regex est extrait depuis les infos du membre. <br /> Voir le wiki pour les détails. <br />Ce champ défini sur quel champ du membre le regex est appliqué.';
$lang['admin']['getmain_match'] = 'Use match no|Les 3 premières variables définissent la façon dont le regex est extrait depuis les infos du membre. <br /> Voir le wiki pour les détails. <br /> Ce champ défini quel valeur de retour est utilisée par le regex.';

$lang['admin']['getmain_main']  = 'Identification du perso principal|Si le regex retourne cette valeur le perso est considéré comme un perso principal.';
$lang['admin']['defmain']       = 'Pas de résultats|Définir ce que sera le perso si le regex ne retourne rien.';
$lang['admin']['invmain']       = 'Résultat invalide|Définir ce que sera le perso si le regex donne un perso n\'étant pas dans la guilde ou correspondant a un perso principal.';
$lang['admin']['altofalt']      = 'Reroll de Reroll|Définir ce qu\'il faut faire si le perso est sans perso principal.';

$lang['admin']['update_type']   = 'Type de mise à jour | Indiquez le type de mise à jour de la relation main/alt';

// Settings names on display page
$lang['admin']['showmain']      = 'Montrer le nom du perso principal|Définir si vous voulez montrer ou masquer le nom du perso principal dans la liste des rerolls.';
$lang['admin']['altopen']       = 'Arborescence des Rerolls|Définir si vous voulez l\'arborescence des rerolls ouverte ou fermée par défaut.';
$lang['admin']['mainlessbottom']= 'Montrer les persos sans perso principal|Définir si vous voulez montrer les persos sans perso principal au début ou à la fin de la liste.';

// Translators:
//
// Harut
// Antaros
// Luinil
