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
 * @package    phpBBSync
 * @subpackage Locale
*/


$lang['phpbbsync']='phpBBSync';
$lang['phpbbsync_desc']='Sychronises ranks in your guild roster with groups in your phpBB forum.';

$lang['admin']['phpbb_menu_main']='Main|Main settings';
$lang['admin']['phpbb_menu_player']='Player|Options for items updated on player update';
$lang['admin']['phpbb_menu_guild']='Guild|Options for items updated on guild update';
$lang['admin']['phpbb_menu_multirank']='Multirank|Options for users of the multirank forum mod.<br />No effect on non-users.';

$lang['admin']['main_enable']='Enable phpBBSync|If disabled, ppBBSync will not run at all.';
$lang['admin']['forum_prefix']='phpBB database prefix|This must be the same as the forums DB prefix.<br />Default is: cms_';
$lang['admin']['forum_path']='Web path from root site|Enter the path to get to your phpBB forum here<br />Ex: forum/; phpBB/;<br />Be sure to include the last /';
$lang['admin']['choose_guild']='Choose a guild|Choose the guild which you wish to sync to phpBB.';
$lang['admin']['phpbb_db']='phpBB database|If your phpBB installation is on a different database <br />to roster, please enter the name here. Otherwise leave blank.';

$lang['admin']['player_update_location']='Set Location|Set the Location in phpBB with Hearth or Zone. Set below.<br />ex. Location: Shattrath City';
$lang['admin']['player_location']='Choose location|Choose Hearth or Zone. <br />Hearth is where the hearthstone is set. <br />Zone is where the player was last seen.';
$lang['admin']['player_enable_signature']='Enable default signature|Enable setting the default signature in phpBB, will use the below value.';
$lang['admin']['player_signature']='Default signature|Use %name% for member name. Ideal for siggen.'; //When translating, do not translate %name%. It is used in a preg_replace.
$lang['admin']['player_enable_avatar']='Enable default avatar|Enable setting the default avatar in phpBB, will use the below value.';
$lang['admin']['player_avatar']='Default avatar|Use %name% for member name. Ideal for siggen.';//When translating, do not translate %name%. It is used in a preg_replace.
$lang['admin']['forum_default_avatar']='Replaceable avatar|Any users with this avatar will have their avatar replaced. Leave blank for no avatar.';

$lang['admin']['guild_add']='Allow Add Members|Allow phpBBSync to add new members of the guild to the forum.';
$lang['admin']['guild_suspend']='Allow suspend members|Allow phpBBSync to suspend accounts of members who have left the guild.<br />This will deactivate the account.<br /> The \'group\' option will not suspend the user but will put them into the suspended group.';
$lang['admin']['guild_groups']='Allow to manage groups|Allow phpBBSync to change guild members groups based on guild rank.<br />Groups are created automatically.';
//$lang['admin']['guild_groups_create']='Automatically create groups|Automatically create the groups in phpBB.<br />This setting will automatically disable itself after successful run.<br />(Don\'t forget to set your group permissions in phpBB.)';
$lang['admin']['guild_enable_personaltext']='Set Personal text to Guild note|Set phpBB Personal Text to Guild note.';
$lang['admin']['guild_protected_group']='Protected group|Members of this group will not have their account suspended or any of their settings changed.<br />To use, create a group in phpBB that you wish to use, and set permissions accordingly.<br />Then select the appropriate group here.';
$lang['admin']['group_permissions']='Group Permissions';
$lang['admin']['guild_suspended_group']='Select a group to put suspended members in|Create a group in your forum to put suspended members in and set permissions accordingly.';
$lang['admin']['guild_ranks']='Allow to manage ranks|Allow phpBBSync to change guild members ranks based on guild rank.<br />Ranks are created automatically as \'special\' ranks but rank image will have to be manually set.';
$lang['admin']['groupcal_enable']='Enable GroupCalendar Sync with phpBB Calendar|Dont forget to enable and setup permissions<br />for the calendar in phpBB\'s admin panel.';
$lang['admin']['groupcal_update_permission']='Permission to update|Select permission level to update calendar';
$lang['admin']['forum_type']='Set forum type|Select Dragonfly or phpBB3';
$lang['admin']['char_field']='Set field for character name|Select the field name to use for character names.<br />Options you could use are username, name (real name in DF), or a user created field.';
$lang['admin']['default_group']='Set default group|This will set the guild rank group as the default group for that user.<br />This only affects phpBB3.';

$lang['admin']['use_multirank']='Use the mutirank addon for phpBB forums|Leave fields blank if you don\'t wish to update that rank.<br />Otherwise fill in with either members.[field] or players.[field] <br />depending on which table you wish to draw your data from. <br />Common fields to use might be members.guild_title, members.class, players.race or players.sex.<br />Expect errors if you enable this and don\'t have it installed.';
$lang['admin']['multirank_1']='Field to use for Rank 1|This is the built in rank and is often used for the post count ranks.<br />Leave blank if you wish to use it for that purpose.';
$lang['admin']['multirank_2']='Field to use for Rank 2';
$lang['admin']['multirank_3']='Field to use for Rank 3';
$lang['admin']['multirank_4']='Field to use for Rank 4';
$lang['admin']['multirank_5']='Field to use for Rank 5';

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
$lang['SuccessCreatingGroup']='Success creating group(s)';
$lang['GroupExists']='Membergroup already exists - ';

$lang['RankCreated']='User rank(s) created';
$lang['RankUpdated']='User rank(s) updated';
$lang['SuspUpdated']='Suspensions updated';
$lang['GroupUpdated']='Groups updated';

$lang['Hearth']='Hearth';
$lang['Zone']='Zone';
$lang['LocationUpdatedFrom']='Location updated from';
$lang['LocationUpdated']='Location updated.';
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

/*phpBB Specific Settings*/
$lang['Stars']='1#star.gif';
$lang['Suspended']='Suspended'; /*If you want to change your suspended group title, change this.*/
?>