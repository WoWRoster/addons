##################################################################################
****************************************************************
* gllcTS2 for TeamSpeak 2 © Gryphon, LLC (www.gryphonllc.com ) *
****************************************************************
*
* $Id: readme.txt 999 2008-07-03 17:51:49Z gryphon $
* $Rev: 999 $
* $LastChangedBy: gryphon $
* $Date: 2008-07-03 10:51:49 -0700 (Thu, 03 Jul 2008) $

Readme.txt
##################################################################################

** Warning ** This script can cause a large server load if you have a lot of
     servers posting to it. I have not found a solution for this at the moment.

Note:  The .htaccess file may not be needed.  Only use this file if you are
     getting allow_call_time_pass_reference errors displayed on your listing page
     What this file does is override your servers php setting.

Note:  Because of the way the return query can be delayed at the time the server
     issues the webpost, user online count and the whois online display may not
     match at random times.


TO UPGRADE:
1. Open admin/config.php in notepad and enter your database information.
2. Replace all existing files.
3. Login go to yoursite.com/admin and enter the admin password.


TO INSTALL:
1. Open admin/config.php.new in notepad and enter your database information and
   and save as admin/config.php
2. Upload all files to server and run the admin/install.php script from the browser
   and follow the prompts.
3. To change your webpost settings, go to
   http://www.yoursite.com/admin

Configuring TeamSpeak Server:
4. Open your TeamSpeak server admin panel and login as superadmin.
5. Click "Global Settings" and fill the following information:
   WebPost PostUrl: http://www.yoursite.com/webpost.php
   WebPost Enabled: X (enabled)
6. Click SAVE. And you are done.

In Addition, you could supply a Link to your main site (per server).
This will add a home icon to the server name on gllcTS2.
The server name will be clickable and will point to the website you specified.
7. Click "Servers" and Select the server for which you want to add the LinkURL.
8. Click "Server Settings". Scroll to the bottom and fill the "Server WebPost LinkUrl".
9. You can use "Server WebPost PostUrl" to provide an alternate PostUrl per server.
   This is used only if you want a particular server to post to a different webpost.


Notes:
* It will take several minutes for your server to be displayed.
* The TeamSpeak Server sends updated information to gllcTS2 every 5 minutes.

##################################################################################

No support for this, if it may break over time as I am not keeping up
  on the code for it.

Ticker: (Windows Users) To use the ticker, right click on your windows task
     bar and choose:

  1. Toolbars > New Toolbar...
  2. Folder: http://www.yoursite.com/ticker.php?***CHOICE***
  3. Press OK

Ticker CHOICES, (2) group or name. Enter your ISP Name for "group" or
      server name for "Name" exactly as it appears on the list, no extra spaces.

  Ticker Group examples:
  http://www.yoursite.com/ticker.php?group=TS-Team
  http://www.yoursite.com/ticker.php?group=TS Team

  Ticker Name examples:
  http://www.yoursite.com/ticker.php?name=[TS2 Public -3-]
  http://www.yoursite.com/ticker.php?name=The Hounds of Zeus

##################################################################################
Releases
##################################################################################
4.2.5
- Security updates
4.2.4
- Changed $row->server_ispname to $row->server_ispcountry - Makc666
4.2.3
- Fixed bug in javascript time offset calculation - McAfee
4.2.2
- incorporated MrGuide's playerflag solution
- other housekeeping fixes
4.2.1
- PHP 5 Changes http://www.gryphonllc.com/forum/showthread.php?s=&threadid=60
4.2.0
- changed most files, suggest upload all files
4.1.7
- fixed dates show local time
- fixed javascript syntax
- changed db_inc.php, readme.txt, tpl_serverdetail.php, tpl_style.php
- thanks McAfee
4.1.6
- fixed parse error in tpl_admin
- updated various variable names
- changed db_inc.php, readme.txt, tpl_admin.php, config.php, install.php
- thanks McAfee
4.1.5
- fixed Request_Uri error
- changed readme.txt, db_inc.php, tpl_admin.php
- thanks moon44
4.1.4
- fixed login popup
- changed db_inc.php, readme.txt, login.php, tpl_login.php, tpl_loggedin.php,
    tpl_admin.php
4.1.3
- fixed undefined vars in db_inc.php and ticker.php
- updated misc info that has changed since gllcTS2 domain moves
- changed db_inc.php, readme.txt, tpl_settings.php, tpl_admin_menu.php,
    install.php, tpl_admin.php, login.php, ticker.php
4.1.2
- fixed should stop double listing people who drop and join
- fixed removed quotes around names and channels in latest ver
- fixed channels with apostrophes should not break the script now
- changed db_inc.php, readme.txt, tpl_serverdetail.php,
    tpl_login.php, tpl_loggedin.php
4.1.1
- changed webpost.php, db_inc.php, readme.txt
4.1.0
- pushed release, may be buggy
- added blocking versions older than 201940 from posting, edit webpost.php if you
  wish to change this value
- added feature to strip weird characters from server names, ( not fully tested )
- changed login process
- changed name of script to gllcTS2
- changed all files
4.0.2
- changed the admin login to be more compatible
4.0.1
- fixed install script
4.0.0
- added admin panel
- changed files - nearly all of them
3.1.1
- fixed undefined variable hopefully
- fixed redirect in webpost.php
- fixed groups deletion
- changed files - webpost.php, db_inc.php, readme.txt, listing.php, groups.php
    tpl_login.php, tpl_serverlist.php, tpl_serverdetail.php, webpost.sql,
    tpl_serverlist_top.php, tpl_style.php, tpl_listing_top.php,
    tpl_serverlist_nav.php
3.1.0
- added tpl_ispgroup_nav.php, spacer.gif, on.gif, off.gif, ticker.php
- changed files - db_inc.php, readme.txt, listing.php, groups.php, config_inc.php
    webpost.php, webpost2.sql
3.0.4
- added dark_www.gif, light_www.gif, dark_email.gif, light_email.gif
- changed files - readme.txt, db_inc.php, tpl_serverlist.php,
    tpl_serverdetail.php, tpl_serverlist_top.php
3.0.3
- fixed problems with special characters in server names (I hope)
- fixed removed some redundant code in webpost.php
- fixed borders on the whois online display
- fixed transparency for dark_private.gif
- fixed ? in the ts_logo.gif link
- fixed table width in login popup
- changed files - readme.txt, db_inc.php, tpl_serverdetail.php,
    tpl_listing_top.php, tpl_login.php, tpl_loggedin.php, webpost.php,
    dark_private.gif
3.0.2
- fixed "Data Unavailable" problem
- changed files - webpost2.sql, readme.txt, db_inc.php
3.0.1
- fixed urldecode server_adminemail
- changed files - webpost.php, readme.txt, db_inc.php
3.0.0
- fixed problem with Opera not following links
- added channel flags
- added channel topics
- added 3 new fields in database
- changed files - db_inc.php, readme.txt, webpost2.sql, config_inc.php, index.php,
    webpost.php, tpl_listing.php, tpl_serverlist.php, tpl_serverlist_nav.php,
    tpl_serverlist_bot.php, tpl_serverlist_top.php, tpl_style.php
- added files - listing.php, groups.php
- thanks Maletin
2.2.2
- fixed removed table optimization from db_inc.php
- fixed webpost.php issue with headers already sent
- changed files - db_inc.php, readme.txt, webpost.php
- thanks Maletin
2.2.1
- added $serverremove to config
- added $message to config to make it easier to change
- fixed tpl_style.php spelling error
- changed files - db_inc.php, readme.txt, tpl_style.php, tpl_listing_top.php,
    config_inc.php
2.2.0
- added a check for updates, go to http://www.yoursite.com/listing.php?version=check
- added version and software check to help me in the event you need support
- changed files - db_inc.php, readme.txt
2.1.1
- added refresh text to tpl_serverlist_bot.php
2.1.0
- fixed tpl_serverlist.php removed thz url
- fixed tpl_serverdetail.php removed thz url
- fixed readme.txt
- added bullet_24.gif
- added auto-refresh on/off option
- added list admin email contact
- thanks Andy
2.0.2
- fixed missing html tag in tpl_style
- thanks GrimReeper
2.0.1
- .htaccess added to set Call-time pass-by-reference to on
2.0
- Original release

##################################################################################
