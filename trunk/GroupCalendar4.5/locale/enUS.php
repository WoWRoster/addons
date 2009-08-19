<?php
	$lang['months'] = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	$lang['months_short'] = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
	$lang['days'] 		= array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
	$lang['abrvdays'] 	= array("Sun", "Mon", "Tue", "Wed", "Thur", "Fri", "Sat");
	$lang['timeAM']		= "am";	//as in 4:30am
	$lang['timePM']		= "pm";	//as in 7:15pm
	$lang['gc_title'] = 'Guild Group Calendar';
      $lang['gc_button'] = 'Guild Group Calendar|Display Raid and schedules for your <br>guild with this addon from GroupCalendar In game';
	$lang['Class_txt']	= 'Class';
	$lang['Class']['P']	= 'Priest';
	$lang['Class']['S']	= 'Shaman';
	$lang['Class']['M']	= 'Mage';
	$lang['Class']['R']	= 'Rogue';
	$lang['Class']['D']	= 'Druid';
	$lang['Class']['W']	= 'Warrior';
	$lang['Class']['H']	= 'Hunter';
	$lang['Class']['K']	= 'Warlock';
	$lang['Class']['L']	= 'Paladin';
	$lang['Class']['?']	= 'n/a';

	$lang['Race_txt']	= 'Race';
	$lang['Race']['U']	= 'Undead';
	$lang['Race']['R']	= 'Troll';
	$lang['Race']['T']	= 'Tauren';
	$lang['Race']['O']	= 'Orc';
	$lang['Race']['B']	= 'Blood Elf';
	$lang['Race']['N']	= 'Night Elf';
	$lang['Race']['H']	= 'Human';
	$lang['Race']['G']	= 'Gnome';
	$lang['Race']['D']	= 'Dwarf';
	$lang['Race']['A']	= 'Draenei';
	$lang['Race']['?']	= 'n/a';
	
	$lang['Role']['MH'] = "Healer";
	$lang['Role']['OH'] = "Off-Healer";
	$lang['Role']['MT'] = "Tank";
	$lang['Role']['OT'] = "Off-Tank";
	$lang['Role']['RD'] = "Ranged";
	$lang['Role']['MD'] = "Melee";


$lang['WG'] = 'Warsong Gulch';
$lang['EYE'] = 'Eye of the Storm';
$lang['AB'] = 'Arathi Basin';
$lang['AV'] = 'Alterac Valley';
//	$lang['gcType'] = array();
/*
	$lang['gcType']['AB']		= "Arathi Basin";
	$lang['gcType']['AQR']		= "Ruins of Ahn'Qiraj";
	$lang['gcType']['AQT']		= "Temple of Ahn'Qiraj";
	$lang['gcType']['Arcatraz']	= "TK: The Arcatraz";
	$lang['gcType']['AV']		= "Alterac Valley";
	$lang['gcType']['BFD']		= "Blackfathom Deeps";
	$lang['gcType']['Birth']		= "Birthday";
	$lang['gcType']['Botanica']	= "TK: The Botanica";
	$lang['gcType']['BRD']		= "Blackrock Depths";
	$lang['gcType']['BRS'] 		= "Blackrock Spire";
	$lang['gcType']['BWL'] 		= "Blackwing Lair";
	$lang['gcType']['Crypts']	= "Auchenai Crypts";
	$lang['gcType']['Deadmines']	= "The Deadmines";
	$lang['gcType']['Dentist']	= "Dentist visit";
	$lang['gcType']['Doctor']	= "Doctor visit";
	$lang['gcType']['DM']		= "Dire Maul";
	$lang['gcType']['Durnholde']	= "Escape from Durnholde Keep";
	$lang['gcType']['EotS']		= "Eye of the Storm";
	$lang['gcType']['Furnace']	= "HC: Blood Furnace";
	$lang['gcType']['Gnomer']	= "Gnomeregan";
	$lang['gcType']['Gruul']		= "Gruul's Lair";
	$lang['gcType']['Holiday']	= "Holiday";
	$lang['gcType']['Hyjal']		= "Battle of Mount Hyjal";
	$lang['gcType']['Karazhan']	= "Karazhan";
	$lang['gcType']['Laby']		= "Shadow Labyrinth";
	$lang['gcType']['LBRS']		= "Lower Blackrock Spire";
	$lang['gcType']['Mag']		= "HC: Magtheridon's Lair";
	$lang['gcType']['ManaTombs']	= "Mana-Tombs";
	$lang['gcType']['Mara']		= "Maraudon";
	$lang['gcType']['MC']		= "Molten Core";
	$lang['gcType']['Mechanar']	= "TK: The Mechanar";
	$lang['gcType']['Meet']		= "A Meeting";
	$lang['gcType']['Naxx']		= "Naxxramas";
	$lang['gcType']['Onyxia']	= "Onyxia's Lair";
	$lang['gcType']['ONX']		= "Onyxia's Lair";
	$lang['gcType']['Portal']	= "Opening of the Dark Portal";
	$lang['gcType']['PvP']		= "PvP Action";
	$lang['gcType']['Ramparts']	= "HC: Hellfire Ramparts";
	$lang['gcType']['RFC']		= "Ragefire Chasm";
	$lang['gcType']['RFD']		= "Razorfen Downs";
	$lang['gcType']['RFK']		= "Razorfen Kraul";
	$lang['gcType']['RP']		= "Role Playing";
	$lang['gcType']['Scholo']	= "Scholomance";
	$lang['gcType']['Serpentshrine']	= "CFR: Serpentshrine Cavern";
	$lang['gcType']['Sethekk']	= "Sethekk Halls";
	$lang['gcType']['SFK']		= "Shadowfang Keep";
	$lang['gcType']['Shattered']	= "HC: The Shattered Halls";
	$lang['gcType']['SlavePens']	= "CFR: The Slave Pens";
	$lang['gcType']['SM']		= "The Scarlet Monastery";
	$lang['gcType']['ST']		= "Temple of Atal'hakkar (Sunken Temple)";
	$lang['gcType']['Steamvault']= "CFR: The Steamvault";
	$lang['gcType']['Stockades']	= "The Stockade";
	$lang['gcType']['Strath']	= "Stratholme";
	$lang['gcType']['TheEye']	= "TK: The Eye";
	$lang['gcType']['UBRS']		= "Upper Blackrock Spire";
	$lang['gcType']['Uld']		= "Uldaman";
	$lang['gcType']['Underbog']	= "CFR: The Underbog";
	$lang['gcType']['Vacation']	= "Vacation";
	$lang['gcType']['WC']		= "Wailing Caverns";
	$lang['gcType']['WSG']		= "Warsong Gulch";
	$lang['gcType']['ZF']		= "Zul'Furrak";
	$lang['gcType']['ZG']		= "Zul'Gurub";
	$lang['gcType']['ZulAman']	= "Zul'Aman";
	$lang['gcType']['ZA']		= "Zul'Aman";
	$lang['gcType']['CR: Serpentshrine Cavern'] = 'CR: Serpentshrine Cavern';
	$lang['gcType']['CoT: Battle for Mount Hyjal'] = 'CoT: Battle for Mount Hyjal';
	$lang['gcType']['Tempest Keep: The Eye'] = 'Tempest Keep: The Eye';
	$lang['gcType']['Gruul\'s Lair'] = 'Gruul\'s Lair';
	$lang['gcType']['Blackwing Lair'] = 'Blackwing Lair';
	$lang['gcType']['Molten Core'] = 'Molten Core';
	$lang['gcType']['Zul\'Aman'] = 'Zul\'Aman';
      $lang['gcType']['Zul\'Gurub'] = 'Zul\'Gurub';
	$lang['gcType']['Temple of Ahn\'Qiraj'] = 'Temple of Ahn\'Qiraj';
	$lang['gcType']['Naxxramas'] = 'Naxxramas';
      $lang['gcType']['Magtheridon'] = 'Magtheridon\'s Lair';
	$lang['gcType'][''] = '';
	$lang['gcType']['OTHER']	= "Other";
	
*/
$lang['gcType']['Meeting'] = "Meeting";
$lang['gcType']['Meet'] = "Meeting";
$lang['gcType']['Birthday'] = "Birthday";
$lang['gcType']['Birth'] = "Birthday";
$lang['gcType']['Roleplay'] = "Roleplaying";
$lang['gcType']['RP'] = "Roleplaying";
$lang['gcType']['Holiday'] = "Holiday";
$lang['gcType']['Dentist'] = "Dentist";
$lang['gcType']['Doctor'] = "Doctor";
$lang['gcType']['Vacation'] = "Vacation";
$lang['gcType']['Other'] = "Other";
$lang['gcType']['OTHER'] = "Other";

$lang['gcType']['AQR'] = "Ruins of Ahn'Qiraj";
$lang['gcType']['AQT'] = "Ahn'Qiraj Temple";
$lang['gcType']['BFD'] = "Blackfathom Deeps";
$lang['gcType']['BRD'] = "Blackrock Depths";
$lang['gcType']['UBRS'] = "Blackrock Spire (Upper)";
$lang['gcType']['LBRS'] = "Blackrock Spire (Lower)";
$lang['gcType']['BWL'] = "Blackwing Lair";
$lang['gcType']['Deadmines'] = "The Deadmines";
$lang['gcType']['DM'] = "Dire Maul";
$lang['gcType']['Gnomer'] = "Gnomeregan";
$lang['gcType']['Mara'] = "Maraudon";
$lang['gcType']['MC'] = "Molten Core";
$lang['gcType']['Onyxia'] = "Onyxia's Lair";
$lang['gcType']['RFC'] = "Ragefire Chasm";
$lang['gcType']['RFD'] = "Razorfen Downs";
$lang['gcType']['RFK'] = "Razorfen Kraul";
$lang['gcType']['SM'] = "Scarlet Monastery";
$lang['gcType']['Scholo'] = "Scholomance";
$lang['gcType']['SFK'] = "Shadowfang Keep";
$lang['gcType']['Stockades'] = "The Stockades";
$lang['gcType']['Strath'] = "Stratholme";
$lang['gcType']['ST'] = "The Sunken Temple";
$lang['gcType']['Uld'] = "Uldaman";
$lang['gcType']['WC'] = "Wailing Caverns";
$lang['gcType']['ZF'] = "Zul'Farrak";
$lang['gcType']['ZG'] = "Zul'Gurub";

//TBC Raids and Dungeons
$lang['gcType']['TheEye'] = "The Eye";
$lang['gcType']['Serpentshrine'] = "Serpentshrine";
$lang['gcType']['Magtheridon'] = "Magtheridon";
$lang['gcType']['Mag'] = "Magtheridon";
$lang['gcType']['Hyjal'] = "Mount Hyjal";
$lang['gcType']['Karazhan'] = "Karazhan";
$lang['gcType']['ZulAman'] = "Zul'Aman";
$lang['gcType']['Gruul'] = "Gruul's Lair";
$lang['gcType']['BlackTemple'] = "Black Temple";
$lang['gcType']['Arcatraz'] = "Tempest: Arcatraz";
$lang['gcType']['Botanica'] = "Tempest: Botanica";
$lang['gcType']['Mechanar'] = "Tempest: Mechanar";
			
$lang['gcType']['Durnholde'] = "CoT: Durnholde Keep";
$lang['gcType']['DarkPortal'] = "CoT: Black Morass (Dark Portal)";

$lang['gcType']['AuchenaiCrypts'] = "Auch: Crypts";
$lang['gcType']['SethekkHalls'] = "Auch: Sethekk Halls";
$lang['gcType']['ShadowLabyrinth'] = "Auch: Labyrinth";
$lang['gcType']['ManaTombs'] = "Auch: Mana Tombs";
$lang['gcType']['Sethekk']	= "Sethekk Halls";
$lang['gcType']['SethekkH']	= "Sethekk Halls (Heroic)";

$lang['gcType']['Steamvault'] = "CFR: Steamvault";
$lang['gcType']['Underbog'] = "CFR: Underbog";
$lang['gcType']['SlavePens'] = "CFR: Slave Pens";
			
$lang['gcType']['ShatteredHalls'] = "Hellfire: Shattered Halls";
$lang['gcType']['Furnace'] = "Hellfire: Blood Furnace";
$lang['gcType']['Ramparts'] = "Hellfire: Ramparts";

$lang['gcType']['ArcatrazH'] = "Tempest: Arcatraz (Heroic)";
$lang['gcType']['BotanicaH'] = "Tempest: Botanica (Heroic)";
$lang['gcType']['MechanarH'] = "Tempest: Mechanar (Heroic)";
			
$lang['gcType']['DurnholdeH'] = "CoT: Durnholde Keep (Heroic)";
$lang['gcType']['DarkPortalH'] = "CoT: Dark Portal (Heroic)";

$lang['gcType']['AuchenaiCryptsH'] = "Auch: Crypts (Heroic)";
$lang['gcType']['SethekkHallsH'] = "Auchn: Sethekk Halls (Heroic)";
$lang['gcType']['ShadowLabyrinthH'] = "Auch: Labyrinth (Heroic)";
$lang['gcType']['ManaTombsH'] = "Auch: Mana Tombs (Heroic)";

$lang['gcType']['SteamvaultH'] = "CFR: Steamvault (Heroic)";
$lang['gcType']['UnderbogH'] = "CFR: Underbog (Heroic)";
$lang['gcType']['SlavePensH'] = "CFR: Slave Pens (Heroic)";
			
$lang['gcType']['ShatteredHallsH'] = "Hellfire: Shattered Halls (Heroic)";
$lang['gcType']['FurnaceH'] = "Hellfire: Blood Furnace (Heroic)";
$lang['gcType']['RampartsH'] = "Hellfire: Ramparts (Heroic)";

$lang['gcType']['Magisters'] = "Magister's Terrace";
$lang['gcType']['MagistersH'] = "Magister's Terrace (Heroic)";
$lang['gcType']['Sunwell'] = "Sunwell Plateau";

// WotLK Raids
$lang['gcType']['Naxx'] = "Naxxramas";
$lang['gcType']['NaxxH'] = "Naxxramas (Heroic)";
$lang['gcType']['Eternity'] = "Eye of Eternity";
$lang['gcType']['EternityH'] = "Eye of Eternity (Heroic)";
$lang['gcType']['Obsidian'] = "Obsidian Sanctum";
$lang['gcType']['ObsidianH'] = "Obsidian Sanctum (Heroic)";
$lang['gcType']['Archavon'] = "Vault of Archavon";
$lang['gcType']['ArchavonH'] = "Vault of Archavon (Heroic)";
$lang['gcType']['Ulduar'] = "Ulduar";
$lang['gcType']['UlduarH'] = "Ulduar (Heroic)";


// WotLK Dungeons
$lang['gcType']['Ahnkalet'] = "Ahn'kahet: The Old Kingdom";
$lang['gcType']['AhnkaletH'] = "Ahn'kahet: The Old Kingdom (Heroic)";
$lang['gcType']['AzjolNerub'] = "Azjol-Nerub";
$lang['gcType']['AzjolNerubH'] = "Azjol-Nerub (Heroic)";
$lang['gcType']['Culling'] = "The Culling of Stratholme";
$lang['gcType']['CullingH'] = "The Culling of Stratholme (Heroic)";
$lang['gcType']['DrakTharon'] = "Drak'Tharon Keep";
$lang['gcType']['DrakTharonH'] = "Drak'Tharon Keep (Heroic)";
$lang['gcType']['Gundrak'] = "Gundrak";
$lang['gcType']['GundrakH'] = "Gundrak (Heroic)";
$lang['gcType']['TheNexus'] = "The Nexus";
$lang['gcType']['TheNexusH'] = "The Nexus (Heroic)";
$lang['gcType']['TheOculus'] = "The Oculus";
$lang['gcType']['TheOculusH'] = "The Oculus (Heroic)";
$lang['gcType']['HallsofLightning'] = "Halls of Lightning";
$lang['gcType']['HallsofLightningH'] = "Halls of Lightning (Heroic)";
$lang['gcType']['HallsofStone'] = "Halls of Stone";
$lang['gcType']['HallsofStoneH'] = "Halls of Stone (Heroic)";
$lang['gcType']['Utgarde'] = "Utgarde Keep";
$lang['gcType']['UtgardeH'] = "Utgarde Keep (Heroic)";
$lang['gcType']['UtgardePinnacle'] = "Utgarde Pinnacle";
$lang['gcType']['UtgardePinnacleH'] = "Utgarde Pinnacle (Heroic)";
$lang['gcType']['TheVioletHold'] = "The Violet Hold";
$lang['gcType']['TheVioletHoldH'] = "The Violet Hold (Heroic)";

$lang['gcType']['PvP'] = "General PvP";
$lang['gcType']['A2v2'] = "Arena (2v2)";
$lang['gcType']['A3v3'] = "Arena (3v3)";
$lang['gcType']['A5v5'] = "Arena (5v5)";
$lang['gcType']['AB'] = "Arathi Basin";
$lang['gcType']['AV'] = "Alterac Valley";
$lang['gcType']['WSG'] = "Warsong Gulch";
$lang['gcType']['EotS'] = "Eye of the Storm";

$lang['gcType']['DoomWalker'] = "Doomwalker";
$lang['gcType']['DoomLordKazzak'] = "Doom Lord Kazzak";

$lang['gcType']['ZGReset'] = "Zul'Gurub Resets";
$lang['gcType']['MCReset'] = "Molten Core Resets";
$lang['gcType']['OnyxiaReset'] = "Onyxia Resets";
$lang['gcType']['BWLReset'] = "Blackwing Lair Resets";
$lang['gcType']['AQRReset'] = "Ruins of Ahn'Qiraj Resets";
$lang['gcType']['AQTReset'] = "Ahn'Qiraj Temple Resets";
$lang['gcType']['NaxxReset'] = "Naxxramas Resets";
$lang['gcType']['KarazhanReset'] = "Karazhan Resets";
$lang['gcType']['ZulAmanReset'] = "Zul'Aman Resets";
$lang['gcType']['BlackTempleReset'] = "Black Temple Resets";
$lang['gcType']['TheEyeReset'] = "The Eye Resets";
$lang['gcType']['SerpentshrineReset'] = "Serpentshrine Resets";
$lang['gcType']['MagtheridonReset'] = "Magtheridon Resets";
$lang['gcType']['HyjalReset'] = "Mount Hyjal Resets";
$lang['gcType']['GruulReset'] = "Gruul's Lair Resets";
$lang['gcType']['SunwellReset'] = "Sunwell Plateau Resets";
$lang['gcType']['Magtheridon'] = "Magtheridon Resets";
$lang['gcType']['Gruul\'s Lair'] = "Gruul's Lair";
$lang['gcType']['CoT: Battle for Mount Hyjal'] = "CoT: Battle for Mount Hyjal";
$lang['gcType']['Tempest Keep: The Eye'] = "Tempest Keep: The Eye";
$lang['gcType']['CR: Serpentshrine Cavern'] = "CR: Serpentshrine Cavern";
$lang['gcType']['Zul\'Aman'] = "Zul'Aman";

// admin text 


//// TIMEZONE information
$lang['admin']['CURR_TIME_OFFSET'] = 'Time Offset|This directive allows you to specify <br>a number of hours by which the GMT time <br>will be offset.  Both positive and <br>negative values are valid. This value <br>will be the default value for displaying times';
$lang['admin']['WOW_TIME_OFFSET'] = 'WoW Server Offset|Set the following value to the <br>WoW Server\'s timezone.  This value will <br>be used to add to the GroupCalendar <br>times to make them GMT values instead <br>of saving them in Server Time.';
$lang['admin']['TIME_DISPLAY_FORMAT'] = 'Time Format|Allows you to specify the format <br>in which time values are output.  Currently <br>there are two formats available: <br>"12hr", which displays hours 1-12 with <br>an am/pm, and "24hr" which display <br>hours 00-23 with no am/pm.';
$lang['admin']['DISPLAY_INSTANCE_RESETS'] = 'Instance Resets|Choose whether you want <br>to display the icons for when instance <br>resets occur. set to 1 to display, 0 to <br>not display';
$lang['admin']['COLOR_CODE_PLAYERS'] = 'Class Color|Do you want to display the Attendance <br>lists color-coded by player class? <br>set to 1 for yes, 0 for no';
$lang['admin']['MAX_TITLES_DISPLAYED'] = 'Events Displayed|Maximum number of event titles <br>that appear per day on month-view.  <br>Note: doesn\'t limit number of events <br>a user can post, just what appears <br>on month view.';
$lang['admin']['TITLE_CHAR_LIMIT'] = 'Title Char Limit|Title character limit.  Adjust this <br>value so event titles don\'t take <br>more space than you want them to on <br>calendar month-view.';
$lang['admin']['WEEK_START'] = 'Week Start|Allows you to specify the weekstart, or the day <br>the calendar starts with.  The value <br>must be a numeric value from 0-6.  <br>Zero indicates that the weekstart is to be <br>Sunday, 1 indicates that it is Monday, <br>2 Tuesday, 3 Wednesday... For most users <br>it will be zero or one.';
$lang['admin']['INSTANCE_RESET_TYPE'] = 'Instance Reset Type| Select which set if instances<br>you want to show the resets<br>for Ither Both or Original or Burning Crusade';
$lang['admin']['INSTANCE_RESET_ICON_SIZE'] = 'Reset Icon Size|Set the size of <br>the icons for reset evens on the calendar';
$lang['admin']['EVENT_ICON_SIZE'] = 'Event Icon Size|Set the Event Icon size<br> for events on the main calendar';
$lang['admin']['GC_PATH'] = 'GroupCalendar Path|This is to be set to the fill path of the GC<br>addon so that images will be shown no mater<br>what the path is set too.<br>  EX: /addons/GroupCalendar/<br>  Or<br>  for Roster DF<br>  /moduals/WoWRosterDf/addons/GroupCalendar/';

$lang['admin']['GroupCalendar_config'] = 'Config';

	//This text is used on various forms in the program
	$lang['forms']['submit']	= "Submit";
	$lang['forms']['go']		= "GO";
	$lang['forms']['username']	= "Username";
	$lang['forms']['password']	= "Password";
	$lang['forms']['autologin']	= "Save info for next time";
	
	//This is the HTML that is displayed to inform the user that they are not logged in
	$lang['Invalid User'] = "<p>Invalid Username and/or Password or you are not a member of an authorized usergroup
		to view this page.</p><p>Please supply a new username and password and try again.</p>";
	$lang['login_required'] = "Login Required";
		
	//Text used on the Calendar Event page
	$lang['event_calendar'] = "Event Calendar";
	$lang['posted_by'] = "posted by";
	$lang['event_info'] = "Event Information";
	$lang['created_by'] = "Created by";
	$lang['Level'] = "Level";		//Used in context of $lang['Level'] $event_level $lang['Only']
	$lang['Only'] = "only";
	$lang['Levels'] = "Levels";		//Used in context of $lang['Levels'] $min $lang['to'] $max
	$lang['to'] = "to";
	$lang['least_level'] = "At least level";
	$lang['below_level'] = "Anyone below level";
	$lang['max_attend'] = "Max Attendance";
	$lang['attend_info'] = "Attendance Information";
	$lang['conf_yes'] = "Confirmed Yes";
	$lang['conf_no'] = "Confirmed No";
	$lang['standby'] = "On Standby";
	$lang['level_abrv'] = "Lvl";
	$lang['Name'] = "Name";
	$lang['Guild'] = "Guild";
	$lang['Comment'] = "Comment";
	$lang['Role'] = "Role";
	$lang['Other_Events_Today'] = "Other Events This Day";
	$lang['Events_Today'] = "Events for the Day";
	$lang['Last_Updated'] = "Last Updated:";
	$lang['GuildRestricted'] = "Only for members of";
	
	//Text used on the calendar display
	$lang['reset_time'] = "Reset Time";
	
	//Text used on the Calendar Upload page
	$lang['Data_Uploaded'] = "Data Uploaded";
	$lang['Updated'] = "Updated";
	$lang['Failed'] = "Failed to update";
	$lang['Records_Calendar'] = "Records in the Calendar";
	$lang['Browse_to'] = "Please browse to the location of your GroupCalendar.lua file.<br>This is typically found at: <br>\"C:\\Program Files\\World of Warcraft\\WTF\\Account\\<i>Your WoW User Name</i>\\SavedVariables\\GroupCalendar.lua\"";
	$lang['no_file'] = "Error!  No file was specified for this webpage to process.";

?>