# wowroster-addons

##What is a WoWRoster Addon?
A WoW Roster Addon is code that supplements the core components of WoWRoster, giving additional functionality and/or other ways to view Available Roster Data or even to create new data

[WoWRoster Project on GitHub](https://github.com/WoWRoster/wowroster/)

[<img src="http://www.wowroster.net/images/bigdownload.gif">](http://www.wowroster.net/downloads/?cat=15)


##Install AddOns
All Roster AddOns are placed or extracted to `roster/addons/`

If you have an AddOn named SomeAddon, then it's folder will be at `roster/addons/SomeAddon/`
with it's files inside that folder

Some AddOn authors "zip up" their AddOns with just their folder name
```
SomeAddon/
 |_inc/
 |  |_conf.php
 |  |_install.def.php
 |_guild/
 |  |_index.php
 |_locale/
 |  |_enUS.php
 |_style.css
 |_index.php
```
With this type, set the extract location to `roster/addons/`

While some may put the entire Roster folder structure in the zip file
```
addons/
 |_SomeAddon/
    |_inc/
    |  |_conf.php
    |  |_install.def.php
    |_guild/
    |  |_index.php
    |_locale/
    |  |_enUS.php
    |_style.css
    |_index.php
```
With this type, set the extract location to `roster/`

Just remember that the folder structure needs to look something like this
```
roster/
 |_addons/
    |_SomeAddon/
    |  |_inc/
    |  |  |_conf.php
    |  |  |_install.def.php
    |  |_guild/
    |  |  |_index.php
    |  |_locale/
    |  |  |_enUS.php
    |  |_style.css
    |  |_index.php
    |_AnotherAddon/
       |_inc/
       |  |_conf.php
       |  |_install.def.php
       |_guild/
       |  |_index.php
       |_locale/
       |  |_enUS.php
       |_style.css
       |_index.php
```
Next, go to the [Roster Control Panel](http://www.wowroster.net/MediaWiki/Roster:CP) under AddOn Management to install your AddOn

##Un-Install AddOns
First, go to the [Roster Control Panel](http://www.wowroster.net/MediaWiki/Roster:CP) under AddOn Management to un-install your AddOn

Remove the folder in `roster/addons/`

You are done!

##Make an AddOn
The [Addon SDK](http://www.wowroster.net/MediaWiki/AddonSDK) will help you in the creation of an AddOn
