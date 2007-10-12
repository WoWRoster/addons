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

//$lang['']=
//$lang['admin']['']=
//$lang['gbankbutton']='GuildBank|Shows the inventory of characters marked as the Guild Bank';
$lang['smfsync']='SMFSync';
$lang['smfsync_desc']='Syncrhonize guild members with forum members.';

$lang['admin']['smf_menu_main']='Main|Main settings';
$lang['admin']['smf_menu_player']='Player|Options for items updated on player update';
$lang['admin']['smf_menu_guild']='Guild|Options for items updated on guild update';
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
