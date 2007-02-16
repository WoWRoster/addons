<?php
/******************************
 * $Id: localization.php,v 1.7.0 2006/06/14 07:16:03 Ulminia Exp $
 ******************************/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}


// common loc
$wordings['enUS']['ss']['name'] = 'Roster Gallery';
$wordings['enUS']['ss']['next'] = 'Next';
$wordings['enUS']['ss']['previous'] = 'Previous';
$wordings['enUS']['ss']['all'] = 'All';

$wordings['enUS']['ss']['rating'] = 'Rating';
$wordings['enUS']['ss']['norating'] = 'No Rating';

$wordings['enUS']['ss']['imgloc'] = 'Image location';
$wordings['enUS']['ss']['capt'] = 'Caption';
$wordings['enUS']['ss']['cat'] = 'Catagory';
$wordings['enUS']['ss']['desc'] = 'Discription';
$wordings['enUS']['ss']['upimg'] = 'Upload Image';

$wordings['enUS']['ss']['upload'] = 'Upload';
$wordings['enUS']['ss']['view'] = 'View';
$wordings['enUS']['ss']['uninstallmsg'] = "Roster Gallery was Uninstalled successfuly.<br><br>All tables and config settings have been removed from the sql database as well as the screenshots folder and any subfolders where deleted.<br><br>Thank you for trying the Roster Gallory and i am sorry this addon was not what your where looking for.<br><br>Ulminia - Azjol-Nerub (joseph foster) please emailme at warcraftalliance @ gmail.com for any help or comments you would like to make :)";
$wordings['enUS']['ss']['uninstallmsgtitle'] = "Roster Gallery Un-Installer";
$wordings['enUS']['ss']['height'] = 'Height';
$wordings['enUS']['ss']['width'] = 'Width';
$wordings['enUS']['ss']['rows'] = 'Rows';
$wordings['enUS']['ss']['amount'] = 'Amount';
$wordings['enUS']['ss']['yes'] = 'Yes';
$wordings['enUS']['ss']['no'] = 'No';
$wordings['enUS']['ss']['enable'] = 'Enable';
$wordings['enUS']['ss']['disable'] = 'Disable';
//begin admin loc
$wordings['enUS']['ss']['admin']['configurationsettings'] = "Configuration Settings";
$wordings['enUS']['ss']['admin']['configurationgreeting'] = "Welcome to the Roster Gallery admin section.<BR><BR>Here you can delete screenshots that are not wanted<BR>and approve Images that have been uploaded";
$wordings['enUS']['ss']['admin']['sssize'] = "Screenshots Folder Size";
$wordings['enUS']['ss']['admin']['version'] = "Version";
$wordings['enUS']['ss']['admin']['applysettings'] = "Apply Settings";
$wordings['enUS']['ss']['admin']['approvedimages'] = "Approved Images";
$wordings['enUS']['ss']['admin']['un-approvedimages'] = "Un-Approved Images";
$wordings['enUS']['ss']['admin']['imageapproved'] = "Image Approved";
$wordings['enUS']['ss']['admin']['imagenotapproved'] = "Un Approved";
$wordings['enUS']['ss']['admin']['na1'] = "The image with id ";
$wordings['enUS']['ss']['admin']['na2'] = " is not approved. To approve it, check the box next to the red text, then click approve at the bottom";
$wordings['enUS']['ss']['admin']['delimage'] = "Delete Image";
$wordings['enUS']['ss']['admin']['delsel'] = "Delete Selected";
$wordings['enUS']['ss']['admin']['approve'] = "Approve";
$wordings['enUS']['ss']['admin']['messages'] = "Messages";
$wordings['enUS']['ss']['admin']['uninstall'] = "Uninstall";
// begin tool tip loc
$wordings['enUS']['ss']['admin']['tooltip01cap'] = "Thumbnail size";
$wordings['enUS']['ss']['admin']['tooltip01'] = "Size of the Thumbnail image to be displayed and generated";
$wordings['enUS']['ss']['admin']['tooltip02cap'] = "Images per page";
$wordings['enUS']['ss']['admin']['tooltip02'] = "This sets the amount of images per page";
$wordings['enUS']['ss']['admin']['tooltip03cap'] = "Images per line";
$wordings['enUS']['ss']['admin']['tooltip03'] = "This sets the amount of images per line";
$wordings['enUS']['ss']['admin']['tooltip04cap'] = "Rows Per Page";
$wordings['enUS']['ss']['admin']['tooltip04'] = "This sets the amount of rows of images there are per page";
$wordings['enUS']['ss']['admin']['tooltip05cap'] = "Send to friend link";
$wordings['enUS']['ss']['admin']['tooltip05'] = "This sets whether or not the send to friend link exists or not";
$wordings['enUS']['ss']['admin']['tooltip06cap'] = "Caption Text";
$wordings['enUS']['ss']['admin']['tooltip06'] = "This sets whether or not the caption text will be dislayed";
$wordings['enUS']['ss']['admin']['tooltip07cap'] = "Upload Settings";
$wordings['enUS']['ss']['admin']['tooltip07'] = "Enable this Option to allow Uploads Disable to turn them off";
$wordings['enUS']['ss']['admin']['tooltip08cap'] = "Show Catagory";
$wordings['enUS']['ss']['admin']['tooltip08'] = "This option sets whether to show the catagory selection or not";
$wordings['enUS']['ss']['admin']['tooltip09cap'] = "Show Caption";
$wordings['enUS']['ss']['admin']['tooltip09'] = "This option sets whether to show the caption of images";

$wordings['enUS']['ss']['admin']['dispconfig'] = "Display Config";
$wordings['enUS']['ss']['admin']['uplodconfig'] = "Upload Config";
$wordings['enUS']['ss']['admin']['thumbconfig'] = "Thumbnail Config";
$wordings['enUS']['ss']['admin']['catconfig'] = "Catagory Config";
$wordings['enUS']['ss']['admin']['apconfig'] = "Approved Screenshots";
$wordings['enUS']['ss']['admin']['unapconfig'] = "Pending Screenshots";
$wordings['enUS']['ss']['admin']['tooltip10cap'] = "Display";
$wordings['enUS']['ss']['admin']['tooltip10'] = "This option is used to set the active amount of cataories to use and display in asending order";
$wordings['enUS']['ss']['admin']['tooltip11cap'] = "Catagory";
$wordings['enUS']['ss']['admin']['tooltip11'] = "This is one of 10 enabled catagories. Set the name and choose:<br> En to enable <br> And <br> Dis to disable";

$wordings['enUS']['ss']['admin']['tooltip12cap'] = "Rating Placement";
$wordings['enUS']['ss']['admin']['tooltip12'] = "This option sets the alignment of the Rating value of an image to ither the top or the botton of the thumbnail";


$wordings['enUS']['ss']['admin']['tooltip13cap'] = "Caption Placement";
$wordings['enUS']['ss']['admin']['tooltip13'] = "This option sets the alignment of the Caption of an image to ither the top or the botton of the thumbnail";

$wordings['enUS']['ss']['admin']['tooltip14cap'] = "Overlib Caption";
$wordings['enUS']['ss']['admin']['tooltip14'] = "This feature will alow you to chose to use the new overlib display for the thumbs on the main page making them when moused over display the discription for the image";

$wordings['enUS']['ss']['admin']['tooltip15cap'] = "Watermark Use";
$wordings['enUS']['ss']['admin']['tooltip15'] = "Thsi feature when activated will use the watermark image you have uploaded and selected in the Thumnail config section";

$wordings['enUS']['ss']['admin']['tooltip16cap'] = "Watermark Location";
$wordings['enUS']['ss']['admin']['tooltip16'] = "Here you can select wich corner of the thimbnail image you want the watermark to appear in";

$wordings['enUS']['ss']['admin']['tooltip17cap'] = "Watermark Image";
$wordings['enUS']['ss']['admin']['tooltip17'] = "this is an array of the wm filder in the Roster Gallery folder of all the png images this is the default type of image that will be used in placing a water mark";

$wordings['enUS']['ss']['admin']['tooltip18cap'] = "Main Gallery Border Color";
$wordings['enUS']['ss']['admin']['tooltip18'] = "This option sets the main color of the border of the roster gallery with one of the 8 allready in the border colors of the main roster";

$wordings['enUS']['ss']['admin']['tooltip19cap'] = "Thumbnail Border Color";
$wordings['enUS']['ss']['admin']['tooltip19'] = "This option sets the color of the border of the thumbnails with one of the 8 allready in the border colors of the main roster";


// common loc
$wordings['deDE']['ss']['name'] = 'Roster Galerie';
$wordings['deDE']['ss']['next'] = 'N&auml;chstes';
$wordings['deDE']['ss']['previous'] = 'Vorheriges';
$wordings['deDE']['ss']['upload'] = 'Hochladen';
$wordings['deDE']['ss']['view'] = 'Anschauen';
$wordings['deDE']['ss']['uninstallmsg'] = "Roster Gallerie wurde erfolgreich deinstalliert.<br><br>All Tabellen und Konfigurationseintr&auml;ge wurden aus der SQL Datenbank entfernt, ebenso der Screenshort Ordner und alle Unterordner.<br><br>Danke f&uuml;r das Testen der Roster Galerie und es tut mir leid, dass es Dir nicht gefallen hat :-(<br><br>Ulminia - Azjol-Nerub (joseph foster). Schicke mir doch bitte eine Email an warcraftalliance @ gmail.com f&uuml;r Hilfe oder Kommentare :)";
$wordings['deDE']['ss']['uninstallmsgtitle'] = "Roster Gallery De-Installation";
$wordings['deDE']['ss']['height'] = 'H&ouml;he';
$wordings['deDE']['ss']['width'] = 'Breite';
$wordings['deDE']['ss']['rows'] = 'Zeilen';
$wordings['deDE']['ss']['amount'] = 'Anzahl';
$wordings['deDE']['ss']['yes'] = 'Ja';
$wordings['deDE']['ss']['no'] = 'Nein';
$wordings['deDE']['ss']['enable'] = 'Aktivieren';
$wordings['deDE']['ss']['disable'] = 'Deaktivieren';
//begin admin loc
$wordings['deDE']['ss']['admin']['configurationsettings'] = "Konfigurationseinstellungen";
$wordings['deDE']['ss']['admin']['configurationgreeting'] = "Willkommen im Roster Galerie Admin Bereich.<BR><BR>Hier kannst Du unerw&uuml;nschte Screenshots l&ouml;schen und neu<BR>hochgeladene Screenshots freischalten.";
$wordings['deDE']['ss']['admin']['sssize'] = "Screenshot Verzeichnis Gr&ouml;sse";
$wordings['deDE']['ss']['admin']['version'] = "Version";
$wordings['deDE']['ss']['admin']['applysettings'] = "&Auml;nderungen &uuml;bernehmen";
$wordings['deDE']['ss']['admin']['approvedimages'] = "Freigeschaltete Bilder";
$wordings['deDE']['ss']['admin']['un-approvedimages'] = "nicht freigeschaltete Bilder";
$wordings['deDE']['ss']['admin']['imageapproved'] = "Bild Freigeschaltet";
$wordings['deDE']['ss']['admin']['imagenotapproved'] = "nicht freigeschaltet";
$wordings['deDE']['ss']['admin']['na1'] = "Das Bild mit der ID ";
$wordings['deDE']['ss']['admin']['na2'] = " is nicht freigeschaltet. Zum Freischalten, mache einen Haken in die Box neben dem roten Text und Klicke unten auf Freischalten";
$wordings['deDE']['ss']['admin']['delimage'] = "L&ouml;sche Bild";
$wordings['deDE']['ss']['admin']['delsel'] = "L&ouml;sche Ausgew&auml;hlte Bilder";
$wordings['deDE']['ss']['admin']['approve'] = "Freischalten";
$wordings['deDE']['ss']['admin']['messages'] = "Nachrichten";
$wordings['deDE']['ss']['admin']['uninstall'] = "De-Installieren";
// begin tool tip loc
$wordings['deDE']['ss']['admin']['tooltip01cap'] = "Vorschaugr&ouml;sse";
$wordings['deDE']['ss']['admin']['tooltip01'] = "Gr&ouml;sse der Vorschaubilder, welche generiert und vorberechnet werden.";
$wordings['deDE']['ss']['admin']['tooltip02cap'] = "Bilder pro Seite";
$wordings['deDE']['ss']['admin']['tooltip02'] = "Legt die Anzahl der Bilder pro Seite fest.";
$wordings['deDE']['ss']['admin']['tooltip03cap'] = "Bilder pro Zeile";
$wordings['deDE']['ss']['admin']['tooltip03'] = "Legt die Anzahl der Bilder pro Zeile fest.";
$wordings['deDE']['ss']['admin']['tooltip04cap'] = "Zeilen pro Seite";
$wordings['deDE']['ss']['admin']['tooltip04'] = "Legt die Anzahl der Bilder-Zeilen pro Seite fest.";
$wordings['deDE']['ss']['admin']['tooltip05cap'] = "Email Link";
$wordings['deDE']['ss']['admin']['tooltip05'] = "Legt fest, ob der 'Sende an einen Freund' Link angezeigt werden soll.";
$wordings['deDE']['ss']['admin']['tooltip06cap'] = "Beschreibung";
$wordings['deDE']['ss']['admin']['tooltip06'] = "Legt fest, ob Beschreibungen eingegeben werden k&ouml;nnen.";
$wordings['deDE']['ss']['admin']['tooltip07cap'] = "Uploads erlaubt?";
$wordings['deDE']['ss']['admin']['tooltip07'] = "Legt fest, ob Uploads erlaubt sind.";
$wordings['deDE']['ss']['admin']['tooltip08cap'] = "Zeige Kategorien";
$wordings['deDE']['ss']['admin']['tooltip08'] = "Legt fest, ob die Kategorie-Auswahl angezeigt werden soll.";
$wordings['deDE']['ss']['admin']['tooltip09cap'] = "Beschreibungen anzeigen";
$wordings['deDE']['ss']['admin']['tooltip09'] = "Legt fest, ob Beschreibungen angezeigt werden sollen.";

$wordings['deDE']['ss']['admin']['catconfig'] = "Catagory Config";
$wordings['deDE']['ss']['admin']['tooltip10cap'] = "Display";
$wordings['deDE']['ss']['admin']['tooltip10'] = "This option is used to set the active amount of cataories to use and display in asending order";
$wordings['deDE']['ss']['admin']['tooltip11cap'] = "Catagory";
$wordings['deDE']['ss']['admin']['tooltip11'] = "This is one of 10 enableable catagories set the anme and choose:<br> En to enable <br> And <br> Dis to disable";



// French Translation by Malkom
// common loc
$wordings['frFR']['ss']['name'] = 'Roster Galerie';
$wordings['frFR']['ss']['next'] = 'Suivant';
$wordings['frFR']['ss']['previous'] = 'Pr&eacute;c&eacute;dent';
$wordings['frFR']['ss']['all'] = 'Tous';

$wordings['frFR']['ss']['rating'] = 'Note ';
$wordings['frFR']['ss']['norating'] = 'Pas de Note';

$wordings['frFR']['ss']['imgloc'] = 'Emplacement de l\'image';
$wordings['frFR']['ss']['capt'] = 'L&eacute;gende';
$wordings['frFR']['ss']['cat'] = 'Cat&eacute;gorie';
$wordings['frFR']['ss']['desc'] = 'Description';
$wordings['frFR']['ss']['upimg'] = 'T&eacute;l&eacute;charger Image';

$wordings['frFR']['ss']['upload'] = 'T&eacute;l&eacute;charger';
$wordings['frFR']['ss']['view'] = 'Voir';
$wordings['frFR']['ss']['uninstallmsg'] = "Roster Galerie ne s'est pas install&eacute; correctement.<br><br>Toutes les param&egrave;tres des tables et de la configuration ont &eacute;t&eacute; supprim&eacute;s de la base de donn&eacute;es SQL, ainsi que les r&eacute;pertoires et sous-r&eacute;pertoires des images.<br><br>Merci d’essayer le Roster Galerie et je suis d&eacute;sol&eacute; que cet addon ne soit pas ce que vous recherchiez.<br><br>Ulminia - Azjol-Nerub (joseph foster) merci de me faire un mail en anglais sur warcraftalliance@gmail.com pour tous commentaires ou aides :)";
$wordings['frFR']['ss']['uninstallmsgtitle'] = "D&eacute;sinstallation de Roster Galerie";
$wordings['frFR']['ss']['height'] = 'Hauteur ';
$wordings['frFR']['ss']['width'] = 'Largeur ';
$wordings['frFR']['ss']['rows'] = 'Colonnes ';
$wordings['frFR']['ss']['amount'] = 'Nombre ';
$wordings['frFR']['ss']['yes'] = 'Oui';
$wordings['frFR']['ss']['no'] = 'Non';
$wordings['frFR']['ss']['enable'] = 'Activ&eacute;';
$wordings['frFR']['ss']['disable'] = 'D&eacute;sactiv&eacute;';
//begin admin loc
$wordings['frFR']['ss']['admin']['configurationsettings'] = "Param&egrave;tres de Configuration";
$wordings['frFR']['ss']['admin']['configurationgreeting'] = "Bienvenue dans la section admin de Roster Galerie.<BR><BR>Ici vous pouvez effacer ou approuver les images t&eacute;l&eacute;charg&eacute;es";
$wordings['frFR']['ss']['admin']['sssize'] = "Taille du r&eacute;pertoire d'image";
$wordings['frFR']['ss']['admin']['version'] = "Version";
$wordings['frFR']['ss']['admin']['applysettings'] = "Sauvegarder les param&egrave;tres";
$wordings['frFR']['ss']['admin']['approvedimages'] = "Approuv&eacute; les Images";
$wordings['frFR']['ss']['admin']['un-approvedimages'] = "Images Rejet&eacute;es";
$wordings['frFR']['ss']['admin']['imageapproved'] = "Approuv&eacute;e";
$wordings['frFR']['ss']['admin']['imagenotapproved'] = "Rejet&eacute;e";
$wordings['frFR']['ss']['admin']['na1'] = "L'image avec l'id ";
$wordings['frFR']['ss']['admin']['na2'] = " est rejet&eacute;e. Pour l\'approuver, cochez la case à côt&eacute; du texte rouge, et cliquez sur Approuv&eacute; en bas";
$wordings['frFR']['ss']['admin']['delimage'] = "Effacer l'image ";
$wordings['frFR']['ss']['admin']['delsel'] = "Effacer les images s&eacute;lectionn&eacute;es";
$wordings['frFR']['ss']['admin']['approve'] = "Approuv&eacute;";
$wordings['frFR']['ss']['admin']['messages'] = "Messages";
$wordings['frFR']['ss']['admin']['uninstall'] = "D&eacute;sinstallation";
// begin tool tip loc
$wordings['frFR']['ss']['admin']['tooltip01cap'] = "Taille de la vignette";
$wordings['frFR']['ss']['admin']['tooltip01'] = "Taille de la vignette affich&eacute; et g&eacute;n&eacute;r&eacute; de l\'image";
$wordings['frFR']['ss']['admin']['tooltip02cap'] = "Images par page";
$wordings['frFR']['ss']['admin']['tooltip02'] = "Configure le nombre d'image par page";
$wordings['frFR']['ss']['admin']['tooltip03cap'] = "Images par ligne";
$wordings['frFR']['ss']['admin']['tooltip03'] = "Configure le nombre d'image par ligne";
$wordings['frFR']['ss']['admin']['tooltip04cap'] = "Colonnes par page";
$wordings['frFR']['ss']['admin']['tooltip04'] = "Configure le nombre de colonnes par page";
$wordings['frFR']['ss']['admin']['tooltip05cap'] = "Envoyer vers un lien";
$wordings['frFR']['ss']['admin']['tooltip05'] = "Configure la possibilit&eacute; d'envoyer l\'image ou non";
$wordings['frFR']['ss']['admin']['tooltip06cap'] = "Texte de L&eacute;gende";
$wordings['frFR']['ss']['admin']['tooltip06'] = "Configure l\'acivation du texte de l&eacute;gende";
$wordings['frFR']['ss']['admin']['tooltip07cap'] = "T&eacute;l&eacute;chargement";
$wordings['frFR']['ss']['admin']['tooltip07'] = "Activer cette option pour emp&ecirc;cher le t&eacute;l&eacute;chargement";
$wordings['frFR']['ss']['admin']['tooltip08cap'] = "Afficher les Cat&eacute;gories";
$wordings['frFR']['ss']['admin']['tooltip08'] = "Configure l\'affichage des cat&eacute;gories";
$wordings['frFR']['ss']['admin']['tooltip09cap'] = "Afficher les L&eacute;gendes";
$wordings['frFR']['ss']['admin']['tooltip09'] = "Configure l\'affcihage des l&eacute;gendes";

$wordings['frFR']['ss']['admin']['dispconfig'] = "Config de l'Affichage";
$wordings['frFR']['ss']['admin']['uplodconfig'] = "Config des T&eacute;l&eacute;chargements";
$wordings['frFR']['ss']['admin']['thumbconfig'] = "Config des Vignettes";
$wordings['frFR']['ss']['admin']['catconfig'] = "Config des Cat&eacute;gories";
$wordings['frFR']['ss']['admin']['apconfig'] = "Images Approuv&eacute;es";
$wordings['frFR']['ss']['admin']['unapconfig'] = "Images en Attente";
$wordings['frFR']['ss']['admin']['tooltip10cap'] = "Affichage";
$wordings['frFR']['ss']['admin']['tooltip10'] = "Cette option permet de d&eacute;finir le nombre de cat&eacute;gories utilis&eacute;es";
$wordings['frFR']['ss']['admin']['tooltip11cap'] = "Catagorie";
$wordings['frFR']['ss']['admin']['tooltip11'] = "Ceci est une des 10 cat&eacute;gories. Modifier le nom et choisissez :<br> Activ&eacute;e ou D&eacute;sactiv&eacute;e";

$wordings['frFR']['ss']['admin']['tooltip12cap'] = "Placement";
$wordings['frFR']['ss']['admin']['tooltip12'] = "Cette option configure l\'alignement de la vignette par rapport &agrave; l\'image";


$wordings['frFR']['ss']['admin']['tooltip13cap'] = "Emplacement de la L&eacute;gende";
$wordings['frFR']['ss']['admin']['tooltip13'] = "Cette option configure l\'emplacement de la l&eacute;gende par rapport &agrave; la vignette";

$wordings['frFR']['ss']['admin']['tooltip14cap'] = "Affichage de la L&eacute;gende ";
$wordings['frFR']['ss']['admin']['tooltip14'] = "Cete option permet d\'afficher la l&eacute;gende des images dans la page principale de Roster Galerie";

$wordings['frFR']['ss']['admin']['tooltip15cap'] = "Utilisation du filigrane";
$wordings['frFR']['ss']['admin']['tooltip15'] = "Cette option active l\'utilisation du filigrane";

$wordings['frFR']['ss']['admin']['tooltip16cap'] = "Emplacement du filigrane";
$wordings['frFR']['ss']['admin']['tooltip16'] = "Cette option permet de choisir l\'emplacement du filigrane";

$wordings['frFR']['ss']['admin']['tooltip17cap'] = "Image du filigrane";
$wordings['frFR']['ss']['admin']['tooltip17'] = "Cette option permet de choisir l\'image du filigrane";

$wordings['frFR']['ss']['admin']['tooltip18cap'] = "Couleur de la bordure";
$wordings['frFR']['ss']['admin']['tooltip18'] = "Cette option permet de choisir la couleur de la bordure de la galerie";

$wordings['frFR']['ss']['admin']['tooltip19cap'] = "Couleur de la borduer";
$wordings['frFR']['ss']['admin']['tooltip19'] = "Cette option permet de choisir la couleur de la bordure des vignettes";


?>
