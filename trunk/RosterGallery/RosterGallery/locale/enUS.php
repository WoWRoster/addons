<?php
/******************************
 * $Id$
 ******************************/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}


// common loc

$lang['rgname'] = 'Roster Gallery';
$lang['rg_button'] = 'Roster Gallery|Image screen shot database';
$lang['name'] = 'Roster Gallery';
$lang['next'] = 'Next';
$lang['previous'] = 'Previous';

$lang['all'] = 'All';
$lang['vote'] = 'Vote!';

$lang['rating'] = 'Rating';
$lang['nodisc'] = 'No Discrption';
$lang['norating'] = 'No Rating';
$lang['nocaption'] = 'No Caption';

$lang['imgloc'] = 'Image location';
$lang['capt'] = 'Caption';
$lang['cat'] = 'Category';
$lang['desc'] = 'Description';
$lang['upimg'] = 'Upload Image';

$lang['upload'] = 'Upload';
$lang['view'] = 'View';
$lang['uninstallmsg'] = "Roster Gallery was Uninstalled successfuly.<br><br>All tables and config settings have been removed from the sql database as well as the screenshots folder and any subfolders where deleted.<br><br>Thank you for trying the Roster Gallory and i am sorry this addon was not what your where looking for.<br><br>Ulminia - Azjol-Nerub (joseph foster) please emailme at warcraftalliance @ gmail.com for any help or comments you would like to make :)";
$lang['uninstallmsgtitle'] = "Roster Gallery Un-Installer";
$lang['height'] = 'Height';
$lang['width'] = 'Width';
$lang['rows'] = 'Rows';
$lang['amount'] = 'Amount';
$lang['yes'] = 'Yes';
$lang['no'] = 'No';
$lang['enable'] = 'Enable';
$lang['disable'] = 'Disable';
// status page test
$lang['admin']['status_config'] = 'Addon Status';
$lang['admin']['dir_is_write'] = 'Is writeable';
$lang['admin']['dir_not_write'] = 'is not Writeable Click <a href="%1$s" onclick="return popitup(\'%1$s\')">HERE</a> to chmod';
$lang['admin']['status_info'] = 'This section displays weather the directories that<br>Roster Gallery uses to save images and upload them are writeable';
$lang['admin']['dir_check'] = 'Checking directory <span class="green">[%1$s]</span> for write access';
$lang['admin']['status_chmod'] = 'Updating Dir Attrib';
$lang['admin']['status_chmod_changed'] = 'Attributes Changed';
$lang['admin']['status_chmod_unchanged'] = 'Attributes not change do so manualy';
$lang['admin']['status_chmod_nodir'] = 'The directory <span class="red">[%1$s]</span><br>does not exist or is hidden';
//$lang['admin']['vote_config'] = '';
// admin vote page txt
$lang['admin']['vote_config'] = "Voteing Settings";
$lang['admin']['page_vote'] = "Voteing Settings";
$lang['admin']['page_vote_disc'] = "These are the settings you change for the voting system display settings<br> how to vote to enable to disable it all that good stuff";
$lang['admin']['popup_on'] = 'Use Popup';
$lang['admin']['popup_off'] = 'Normal';
// upload settings
$lang['admin']['rg_upload_size'] = 'Size';
$lang['admin']['open'] = 'Open';
$lang['admin']['closed'] = 'Closed';
//begin admin loc
$lang['admin']['edit'] = 'Edit';
$lang['admin']['configurationsettings'] = "Configuration Settings";
$lang['admin']['configurationgreeting'] = "Welcome to the Roster Gallery admin section.<BR>Here you can delete screenshots that are not wanted<BR>and approve Images that have been uploaded";
$lang['admin']['sssize'] = "Screenshots Folder Size";
$lang['admin']['w_version'] = "Version";
$lang['admin']['rg_version'] = "Roster Gallery Version";
$lang['admin']['applysettings'] = "Apply Settings";
$lang['admin']['approvedimages'] = "Approved Images";
$lang['admin']['un-approvedimages'] = "Un-Approved Images";
$lang['admin']['imageapproved'] = "Image Approved";
$lang['admin']['imagenotapproved'] = "Approve Image?";
$lang['admin']['na1'] = 'The image with id %1$s is not approved. To approve it, check the box next to the red text, then click approve at the bottom';
$lang['admin']['delimage'] = "Delete Image";
$lang['admin']['delimage_ov'] = 'To Delete The image with id %1$s check the box next to Delete, then click Delete Selected at the bottom';
$lang['admin']['delsel'] = "Delete Selected";
$lang['admin']['approve'] = "Approve";
$lang['admin']['messages'] = "Messages";
$lang['admin']['uninstall'] = "Uninstall";
// begin tool tip loc
$lang['admin']['tooltip01cap'] = "Thumbnail size";
$lang['admin']['tooltip01'] = "Size of the Thumbnail image to be displayed and generated";
$lang['admin']['tooltip02cap'] = "Images per page";
$lang['admin']['tooltip02'] = "This sets the amount of images per page";
$lang['admin']['tooltip03cap'] = "Images per line";
$lang['admin']['tooltip03'] = "This sets the amount of images per line";
$lang['admin']['tooltip04cap'] = "Rows Per Page";
$lang['admin']['tooltip04'] = "This sets the amount of rows of images there are per page";
$lang['admin']['tooltip05cap'] = "Send to friend link";
$lang['admin']['tooltip05'] = "This sets whether or not the send to friend link exists or not";
$lang['admin']['tooltip06cap'] = "Caption Text";
$lang['admin']['tooltip06'] = "This sets whether or not the caption text will be dislayed";
$lang['admin']['tooltip07cap'] = "Upload Settings";
$lang['admin']['tooltip07'] = "Enable this Option to allow Uploads Disable to turn them off";
$lang['admin']['tooltip08cap'] = "Show Catagory";
$lang['admin']['tooltip08'] = "This option sets whether to show the catagory selection or not";
$lang['admin']['tooltip09cap'] = "Show Caption";
$lang['admin']['tooltip09'] = "This option sets whether to show the caption of images";


$lang['admin']['dispconfig'] = "Display Config";
$lang['admin']['uplodconfig'] = "Upload Config";
$lang['admin']['thumbconfig'] = "Thumbnail Config";
$lang['admin']['catconfig'] = "Catagory Config";
$lang['admin']['apconfig'] = "Approved Screenshots";
$lang['admin']['unapconfig'] = "Pending Screenshots";
$lang['admin']['tooltip10cap'] = "Display";
$lang['admin']['tooltip10'] = "This option is used to set the active amount of cataories to use and display in asending order";
$lang['admin']['tooltip11cap'] = "Catagory";
$lang['admin']['tooltip11'] = "This is one of 10 enabled catagories. Set the name and choose:<br> Enable: This makes the Catagory able to show in the menue and upload bars<br>Disable: This removes this Catagory from showing in Catagory menues and lists";

$lang['admin']['tooltip12cap'] = "Rating Placement";
$lang['admin']['tooltip12'] = "This option sets the alignment of the Rating value of an image to ither the top or the botton of the thumbnail";


$lang['admin']['tooltip13cap'] = "Caption Placement";
$lang['admin']['tooltip13'] = "This option sets the alignment of the Caption of an image to ither the top or the botton of the thumbnail";

$lang['admin']['tooltip14cap'] = "Overlib Caption";
$lang['admin']['tooltip14'] = "This feature will alow you to chose to use the new overlib display for the thumbs on the main page making them when moused over display the discription for the image";

$lang['admin']['tooltip15cap'] = "Watermark Use";
$lang['admin']['tooltip15'] = "Thsi feature when activated will use the watermark image you have uploaded and selected in the Thumnail config section";

$lang['admin']['tooltip16cap'] = "Watermark Location";
$lang['admin']['tooltip16'] = "Here you can select wich corner of the thimbnail image you want the watermark to appear in";

$lang['admin']['tooltip17cap'] = "Watermark Image";
$lang['admin']['tooltip17'] = "this is an array of the wm filder in the Roster Gallery folder of all the png images this is the default type of image that will be used in placing a water mark";

$lang['admin']['tooltip18cap'] = "Main Gallery Border Color";
$lang['admin']['tooltip18'] = "This option sets the main color of the border of the roster gallery with one of the 8 allready in the border colors of the main roster";

$lang['admin']['tooltip19cap'] = "Thumbnail Border Color";
$lang['admin']['tooltip19'] = "This option sets the color of the border of the thumbnails with one<br> of the 8 allready in the border colors of the main roster";

$lang['admin']['tooltip20cap'] = "Use LightBox";
$lang['admin']['tooltip20'] = "Activating this option allowes <br>You to use the New Lightbox feature to display <br>the image Insted of going to a nother page";

$lang['admin']['tooltip21cap'] = "Voteing Display";
$lang['admin']['tooltip21'] = "This will chose how the voting option is displayed.<br> There are 2 options Pop-up and Normal.<br>Pop-up: when the link is clicked a new small window will open and display the image thumb and the standard voting selection<br>Normal: the page will go to the old style of voting showing the image large sized with a clickable link to go back to the roster.";

$lang['admin']['tooltip22cap'] = "Voteing Display";
$lang['admin']['tooltip22'] = "This will chose how the voting option is displayed.<br> There are 2 options Pop-up and Normal.<br>Pop-up: when the link is clicked a new small window will open and display the image thumb and the standard voting selection<br>Normal: the page will go to the old style of voting showing the image large sized with a clickable link to go back to the roster.";

$lang['admin']['tooltip23cap'] = "Upload size";
$lang['admin']['tooltip23'] = "Set the max size that a file can<br> be in KB remember 1024kb = 1mb lol";

$lang['admin']['tooltip24cap'] = "Upload Window";
$lang['admin']['tooltip24'] = "Sets weather the upload screenshot<br> window is open or closed";


$lang['cannot_check_version'] = 'Cannot Check the File Version';
$lang['new_rg_available'] = 'There is  new version of the Roster Gallery Avualable <span class="green">v %1$s</span> <b>Click Here!</b> to get it';
$lang['cannot_writeto_ss_folder'] = 'Custom Images folder is not writable<br />Click <a href="%1$s">HERE</a> to try to chmod [<span class="green">%2$s</span>]<br />Custom Image uploading is temporarily disabled';

