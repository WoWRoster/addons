<?php
/**
 * WoWRoster.net WoWRoster
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 *
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    SMFSync
 * @subpackage Locale
*/


$lang['smfsync']='SMFSync';
$lang['smfsync_desc']='Syncrhonize guild members with forum members.';

$lang['admin']['smf_menu_main']='Main|Main settings';
$lang['admin']['smf_menu_player']='Player|Options for items updated on player update';
$lang['admin']['smf_menu_guild']='Guild|Options for items updated on guild update';
$lang['admin']['smf_menu_groupcal']='GroupCalendar|Options for GroupCalendar mod';
$lang['admin']['smf_menu_permissions']='Permissions|Set permissions for groups here';

$lang['admin']['main_enable']='Enable SMFSync|If disabled, SMFSync will not run at all.';
$lang['admin']['forum_prefix']='SMF database prefix|This must be the same as the forums DB prefix.<br />Default is: smf_';
$lang['admin']['forum_path']='Web path from root site|Enter the path to get to your SMF forum here<br />Ex: forum/; SMF/;<br />Be sure to include the last /';
$lang['admin']['choose_guild']='Choose a guild|Choose the guild which you wish to sync to SMF.';

$lang['admin']['player_update_location']='Set Location|Set the Location in SMF with Hearth or Zone. Set below.<br />ex. Location: Shattrath City';
$lang['admin']['player_location']='Choose location|Choose Hearth or Zone. <br />Hearth is where the hearthstone is set. <br />Zone is where the player was last seen.';
$lang['admin']['player_enable_signature']='Enable default signature|Enable setting the default signature in SMF, will use the below value.';
$lang['admin']['player_signature']='Default signature|Use %name% for member name. Ideal for siggen.'; //When translating, do not translate %name%. It is used in a preg_replace.
$lang['admin']['player_enable_avatar']='Enable default avatar|Enable setting the default avatar in SMF, will use the below value.';
$lang['admin']['player_avatar']='Default avatar|Use %name% for member name. Ideal for siggen.';//When translating, do not translate %name%. It is used in a preg_replace.

$lang['admin']['guild_add']='Allow Add Members|Allow SMFSync to add new members of the guild to the forum.';
$lang['admin']['guild_suspend']='Allow suspend members|Allow SMFSync to suspend accounts of members who have left the guild.<br />(This will deactivate the account, change the password<br />email, signature, avatar and personal text so the member can not<br />reclaim the account. Re-activation will have to be done by an admin.)<br />They will also be placed in the group "Suspended"(Changeable in locale file.}';
$lang['admin']['guild_groups']='Allow to manage groups|Allow SMFSync to change guild members groups based on guild rank.<br />Members will not be assigned to groups until they are created<br />It will error on the first time the guild update is run but will work successfully thereafter.';
$lang['admin']['guild_groups_create']='Automatically create groups|Automatically create the groups in SMF.<br />This setting will automatically disable itself after successful run.<br />(Don\'t forget to set your group permissions in SMF.)';
$lang['admin']['guild_enable_personaltext']='Set Personal text to Guild note|Set SMF Personal Text to Guild note.';
$lang['admin']['guild_protected_group']='Protected group|Members of this group will not have their account suspended or any of their settings changed.<br />To use, create a group in SMF that you wish to use, and set permissions accordingly.<br />Then select the appropriate group here.';
$lang['admin']['group_permissions']='Group Permissions';
$lang['admin']['guild_suspended_group']='Select a group to put suspended members in|';

$lang['admin']['groupcal_enable']='Enable GroupCalendar Sync with SMF Calendar|Dont forget to enable and setup permissions<br />for the calendar in SMF\'s admin panel.';
$lang['admin']['groupcal_update_permission']='Permission to update|Select permission level to update calendar';

$lang['LocationNotSpecified']='Location not specified. Assuming inside ArmorySync.';
$lang['LocationIsCurrent']='Location is current.';
$lang['LocationNotUpdated']='Location could not be updated.';
$lang['PlayerNotInForum']='Player not found in forum.';
$lang['SigUpdated']='Signature updated.';
$lang['SigNotUpdated']='Signature not updated.';
$lang['SigCurrent']='Signature is current.';
$lang['AvUpdated']='Avatar updated.';
$lang['AvNotUpdated']='Avatar not updated.';
$lang['AvCurrent']='Avatar is current.';

$lang['ErrorCreatingGroup']='Error creating group';
$lang['SuccessCreatingGroup']='Success creating group';
$lang['GroupExists']='Membergroup already exists - ';

$lang['Hearth']='Hearth';
$lang['Zone']='Zone';
$lang['LocationUpdatedFrom']='Location updated from';
$lang['to']='to';

$lang['MemberGroupCurrent']='Membergroup is current.';
$lang['MemberGroupUpdated']='Membergroup has been updated to';
$lang['NoSuchGroup']='Membergroup has not been created yet.';
$lang['MemberGroupNotUpdated'] = 'Membergroup not updated.';
$lang['PersonalTextUpdated']='Personal text updated to';
$lang['PersonalTextNotUpdated']='Personal text <span class=red>not</span> updated. May be current or user not found.';
$lang['PersonalTextNone']='No guild note set.';

$lang['MemberSuspended']='\'s forum account has been suspended.';

$lang['NoLongerAMember']='I am no longer a member of the guild.';

$lang['Admin']='Admin';
$lang['Officer']='Officer';
$lang['Guild']='Guild';
$lang['Public']='Public';

$lang['MemberGroupProtected']='Member is in protected group. Nothing changed.';

//SMF Specific Settings
$lang['Stars']='1#star.gif';
$lang['Suspended']='Suspended'; //If you want to change your suspended group title, change this.

	$gc_lang['months'] = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	$gc_lang['months_short'] = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
	$gc_lang['days'] 		= array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
	$gc_lang['abrvdays'] 	= array("Sun", "Mon", "Tue", "Wed", "Thur", "Fri", "Sat");
	$gc_lang['timeAM']		= "am";	//as in 4:30am
	$gc_lang['timePM']		= "pm";	//as in 7:15pm

	$gc_lang['Class_txt']	= 'Class';
	$gc_lang['Class']['P']	= 'Priest';
	$gc_lang['Class']['S']	= 'Shaman';
	$gc_lang['Class']['M']	= 'Mage';
	$gc_lang['Class']['R']	= 'Rogue';
	$gc_lang['Class']['D']	= 'Druid';
	$gc_lang['Class']['W']	= 'Warrior';
	$gc_lang['Class']['H']	= 'Hunter';
	$gc_lang['Class']['K']	= 'Warlock';
	$gc_lang['Class']['L']	= 'Paladin';

	$gc_lang['Race_txt']	= 'Race';
	$gc_lang['Race']['U']	= 'Undead';
	$gc_lang['Race']['R']	= 'Troll';
	$gc_lang['Race']['T']	= 'Tauren';
	$gc_lang['Race']['O']	= 'Orc';
	$gc_lang['Race']['B']	= 'Blood Elf';
	$gc_lang['Race']['N']	= 'Night Elf';
	$gc_lang['Race']['H']	= 'Human';
	$gc_lang['Race']['G']	= 'Gnome';
	$gc_lang['Race']['D']	= 'Dwarf';
	$gc_lang['Race']['A']	= 'Draenei';

	$gc_lang['gcType'] = array();
	$gc_lang['gcType']['AB']		= "Arathi Basin";
	$gc_lang['gcType']['AQR']		= "Ruins of Ahn'Qiraj";
	$gc_lang['gcType']['AQT']		= "Temple of Ahn'Qiraj";
	$gc_lang['gcType']['Arcatraz']	= "TK: The Arcatraz";
	$gc_lang['gcType']['AV']		= "Alterac Valley";
	$gc_lang['gcType']['BFD']		= "Blackfathom Deeps";
	$gc_lang['gcType']['Birth']		= "Birthday";
	$gc_lang['gcType']['Botanica']	= "TK: The Botanica";
	$gc_lang['gcType']['BRD']		= "Blackrock Depths";
	$gc_lang['gcType']['BRS'] 		= "Blackrock Spire";
	$gc_lang['gcType']['BWL'] 		= "Blackwing Lair";
	$gc_lang['gcType']['Crypts']	= "Auchenai Crypts";
	$gc_lang['gcType']['Deadmines']	= "The Deadmines";
	$gc_lang['gcType']['Dentist']	= "Dentist visit";
	$gc_lang['gcType']['Doctor']	= "Doctor visit";
	$gc_lang['gcType']['DM']		= "Dire Maul";
	$gc_lang['gcType']['Durnholde']	= "Escape from Durnholde Keep";
	$gc_lang['gcType']['EotS']		= "Eye of the Storm";
	$gc_lang['gcType']['Furnace']	= "HC: Blood Furnace";
	$gc_lang['gcType']['Gnomer']	= "Gnomeregan";
	$gc_lang['gcType']['Gruul']		= "Gruul's Lair";
	$gc_lang['gcType']['Holiday']	= "Holiday";
	$gc_lang['gcType']['Hyjal']		= "Battle of Mount Hyjal";
	$gc_lang['gcType']['Karazhan']	= "Karazhan";
	$gc_lang['gcType']['Laby']		= "Shadow Labyrinth";
	$gc_lang['gcType']['LBRS']		= "Lower Blackrock Spire";
	$gc_lang['gcType']['Mag']		= "HC: Magtheridon's Lair";
	$gc_lang['gcType']['ManaTombs']	= "Mana-Tombs";
	$gc_lang['gcType']['Mara']		= "Maraudon";
	$gc_lang['gcType']['MC']		= "Molten Core";
	$gc_lang['gcType']['Mechanar']	= "TK: The Mechanar";
	$gc_lang['gcType']['Meet']		= "A Meeting";
	$gc_lang['gcType']['Naxx']		= "Naxxramas";
	$gc_lang['gcType']['Onyxia']	= "Onyxia's Lair";
	$gc_lang['gcType']['ONX']		= "Onyxia's Lair";
	$gc_lang['gcType']['Portal']	= "Opening of the Dark Portal";
	$gc_lang['gcType']['PvP']		= "PvP Action";
	$gc_lang['gcType']['Ramparts']	= "HC: Hellfire Ramparts";
	$gc_lang['gcType']['RFC']		= "Ragefire Chasm";
	$gc_lang['gcType']['RFD']		= "Razorfen Downs";
	$gc_lang['gcType']['RFK']		= "Razorfen Kraul";
	$gc_lang['gcType']['RP']		= "Role Playing";
	$gc_lang['gcType']['Scholo']	= "Scholomance";
	$gc_lang['gcType']['Serpentshrine']	= "CFR: Serpentshrine Cavern";
	$gc_lang['gcType']['Sethekk']	= "Sethekk Halls";
	$gc_lang['gcType']['SFK']		= "Shadowfang Keep";
	$gc_lang['gcType']['Shattered']	= "HC: The Shattered Halls";
	$gc_lang['gcType']['SlavePens']	= "CFR: The Slave Pens";
	$gc_lang['gcType']['SM']		= "The Scarlet Monastery";
	$gc_lang['gcType']['ST']		= "Temple of Atal'hakkar (Sunken Temple)";
	$gc_lang['gcType']['Steamvault']= "CFR: The Steamvault";
	$gc_lang['gcType']['Stockades']	= "The Stockade";
	$gc_lang['gcType']['Strath']	= "Stratholme";
	$gc_lang['gcType']['TheEye']	= "TK: The Eye";
	$gc_lang['gcType']['UBRS']		= "Upper Blackrock Spire";
	$gc_lang['gcType']['Uld']		= "Uldaman";
	$gc_lang['gcType']['Underbog']	= "CFR: The Underbog";
	$gc_lang['gcType']['Vacation']	= "Vacation";
	$gc_lang['gcType']['WC']		= "Wailing Caverns";
	$gc_lang['gcType']['WSG']		= "Warsong Gulch";
	$gc_lang['gcType']['ZF']		= "Zul'Furrak";
	$gc_lang['gcType']['ZG']		= "Zul'Gurub";
	$gc_lang['gcType']['OTHER']		= "Other";
