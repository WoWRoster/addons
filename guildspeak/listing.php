<?php
/**
 * WoWRoster GuildSpeak - TeamSpeak 2 and Ventrilo for WoWRoster
 * 
 * Addon based on Gryphon, LLC's gllcts2 version 4.2.5
 * and the Ventrilo Server Monitor Script
 *
 * @author Mike DeShane (mdeshane@pkcomp.net)
 * @copyright 2006-2008 Mike DeShane, US
 * @package WoWRoster GuildSpeak
 * @subpackage Listing Page
 * 
 */

include_once($addon['inc_dir'] . 'db_inc.php');
clearinactive();

if (isset($_GET['direction'])) {
      switch ($_GET['direction'])
      {
            case "desc":
                  $sort = "desc";
                  break;
            default:
                  $direction = "asc";
                  break;
      }
}

if (isset($_GET["page"]))
{
	$page = intval($_GET["page"]);
}

if (!isset($_GET["sort"]))
{
	$version_direction = "void";
	$sort = "server_name";
}
else if ($_GET["sort"] == 'server_version')
{
	$version_direction = "server_version";
	$sort = "server_version_major ".$direction.", server_version_minor ".$direction.", server_version_release ".$direction.", server_version_build";
}
else
{
	$version_direction = "void";
	switch ($_GET['sort'])
	{
		case "server_password":
			$sort = "server_password";
			break;
		case "server_name":
			$sort = "server_name";
			break;
		case "server_ip":
			$sort = "server_ip";
			break;
		case "clients_current":
			$sort = "clients_current";
			break;
		case "clients_maximum":
			$sort = "clients_maximum";
			break;
		case "server_platform":
			$sort = "server_platform";
			break;
		default:
			$sort = "server_name";
			break;
	}
}

if ((!isset($_GET["showgroup"])) or ($_GET["showgroup"] == 'all'))
{
	$showgroup = "all";
	$group = "WHERE 1";
}
else if ($_GET["showgroup"] == 'Private')
{
	$group = "WHERE server_ispname='$showgroup' OR server_ispname=''";
}
else if ($_GET["showgroup"] != 'Private')
{
	$group = "WHERE server_ispname='" . addslashes(htmlspecialchars($_GET['showgroup'])) . "'";
}

$roster->tpl->assign_block_vars('listing_top', array(
      'TABLEWIDTH'      => $addon['config']['guildspeak_ts_tablewidth'],
      'CATROWCOLOR1'    => $addon['config']['guildspeak_ts_catrowcolor1'],
      'ACTIVE_SERVERS_LNK' => makelink('util-guildspeak-listing&sort=clients_current&direction=desc&showgroup=all'),
      'ACTIVE_SERVER_COUNT' => getactiveservercount(),
      'USERS_ONLINE_LNK' => makelink('util-guildspeak-listing&sort=clients_current&direction=desc&showgroup=all'),
      'TOTAL_ONLINE'    => gettotalonline(),
      'HOMEPAGE'        => $addon['config']['guildspeak_ts_homepage'],
      'IMG_DIR'         => $addon['image_path'],
      'IMG_SRC'         => $addon['config']['guildspeak_ts_logo'],
      'PAGETITLE'       => $addon['config']['guildspeak_ts_pagetitle'],
      'MESSAGE'         => $addon['config']['guildspeak_ts_message'],
      )
);

$roster->tpl->set_filenames(array('listing_top' => $addon['basename'] . '/tpl_listing_top.html'));
$roster->tpl->display('listing_top');

if (empty($pagedirection))
{
	$pagedirection = "asc";
}

if (empty($direction))
{
	$direction = "asc";
}
if (empty($page))
{
	$page = 1;
	$pagestart = $page -1;
}
else
{
	$pagestart = (($page -1) * $addon['config']['guildspeak_ts_perpage']);
}

$serverquery = $roster->db->query("SELECT * FROM $dbtable1 $group");
$servercount = number_format($roster->db->num_rows($serverquery));

$request = $roster->db->query("SELECT * FROM $dbtable1 $group order by $sort $direction, server_name LIMIT $pagestart," . $addon['config']['guildspeak_ts_perpage']);

if ($direction == "asc")
{
	$direction = "desc";
}
else if ($direction == "desc")
{
      $direction = "asc";
}

if (!empty($_GET["detail"]))
{
	$r = $roster->db->query("SELECT * FROM $dbtable1 WHERE server_ip='" . addslashes(htmlspecialchars($_GET['detail'])) . "' AND server_port='" . addslashes(htmlspecialchars($_GET['detailport'])) . "'");
	$row = $roster->db->fetch($r);

      $js = '<script type="text/javascript" language="javascript">
        function jstime(phptime) {
          $newdate = new Date(phptime*1000);
          $hours = $newdate.getHours();
          $mins = $newdate.getMinutes();
          $secs = $newdate.getSeconds();
          $offset = $newdate.getTimezoneOffset();

          if ($hours == 0) {
            $hours = "12";
            $ap = "AM";
          }
          else if ($hours < 12) {
            $ap = "AM";
          }
          else if ($hours == 12) {
            $ap = "PM";
          }
          else {
            $hours = $hours - 12
            $ap = "PM";
          }
          if ($mins < 10) { $mins = "0" + $mins; }
          if ($secs < 10) { $secs = "0" + $secs; }

          $offsetString = Math.floor(Math.abs($offset / 60));
          if ( ($offset % 60) != 0 ) { $offsetString = $offsetString + ":" + Math.abs($offset % 60); }
          if ( $offset > 0 ) { $timezone = "UTC-" + $offsetString; }
          else if ( $offset < 0 ) { $timezone = "UTC+" + $offsetString; }
          else { $timezone = "UTC"; }

          //$datestring = $newdate.toTimeString();
          $datestring = $hours + ":" + $mins + ":" + $secs + " " + $ap + " " + "(" + $timezone + ")";
          document.write($datestring);
        }
      </script>';
      
      $js2 = '<script>jstime(' . sprintf("%u",$row->server_timestamp) . ');</script>';
      $js3 = '<script>jstime(' . sprintf("%u",time()) . ');</script>';
      
      $roster->tpl->assign_block_vars('serverdetail', array(
            'JS'                    => $js,
            'JS2'                   => $js2,
            'JS3'                   => $js3,
            'BORDERCOLOR'           => $addon['config']['guildspeak_ts_bordercolor'],
            'CATROWCOLOR1'          => $addon['config']['guildspeak_ts_catrowcolor1'],
            'SERVER_LINK_URL'       => $row->server_linkurl,
            'SERVER_NAME'           => $row->server_name,
            'SERVER_ISP_COUNTRY'    => $row->server_ispcountry,
            'SERVER_ISP_LINKURL'    => $row->server_isplinkurl,
            'SERVER_ISP_NAME'       => $row->server_ispname,
            'SERVER_PASSWORD'       => $row->server_password,
            'SERVER_ADMIN_EMAIL'    => $row->server_adminemail,
            'SERVER_ID'             => $row->server_id,
            'SERVER_IP'             => $row->server_ip,
            'SERVER_PORT'           => $row->server_port,
            'SERVER_PLATFORM'       => $row->server_platform,
            'SERVER_VER_MAJOR'      => $row->server_version_major,
            'SERVER_VER_MINOR'      => $row->server_version_minor,
            'SERVER_VER_RELEASE'    => $row->server_version_release,
            'SERVER_VER_BUILD'      => $row->server_version_build,
            'SERVER_TYPE1'          => ucfirst($row->server_type1),
            'SERVER_TYPE2'          => ucfirst($row->server_type2),
            'CHANNELS_CURRENT'      => $row->channels_current,
            'POPUP_WIDTH'           => $addon['config']['guildspeak_ts_popupwidth'],
            'POPUP_HEIGHT'          => $addon['config']['guildspeak_ts_popupheight'],
            'IMG_BG'                => $addon['config']['guildspeak_ts_imgbg'],
            'ROWCOLOR1'             => $addon['config']['guildspeak_ts_rowcolor1'],
            'ROWCOLOR2'             => $addon['config']['guildspeak_ts_rowcolor2'],
            'NF_CLIENT_CURRENT'     => number_format($row->clients_current),
            'NF_CLIENT_MAXIMUM'     => number_format($row->clients_maximum),
            'GET_UPTIME'            => getuptime($row->server_uptime,server),
            'GET_CLDETAIL'          => getcldetail($row->server_ip, $row->server_port, $row->server_id),
            )
      );

      $roster->tpl->set_filenames(array('serverdetail' => $addon['basename'] . '/tpl_serverdetail.html'));
      $roster->tpl->display('serverdetail');

}

$roster->tpl->assign_block_vars('serverlist_top', array(
      'BORDERCOLOR'      => $addon['config']['guildspeak_ts_bordercolor'],
      'CATROWCOLOR1'    => $addon['config']['guildspeak_ts_catrowcolor1'],
      'SERVER_COUNT'    => $servercount,
      'SORT'            => $sort,
      'DIRECTION'       => $direction,
      'SHOW_GROUP'      => $showgroup,
      'PAGE_DIRECTION'  => $pagedirection,
      'IMG_DIR'         => $addon['image_path'],
      'PAGETITLE'       => $addon['config']['guildspeak_ts_pagetitle'],
      'MESSAGE'         => $addon['config']['guildspeak_ts_message'],
      'VERSION_DIRECTION' => $version_direction,
      'LISTING_LNK'     => makelink('util-guildspeak-listing&'),
      )
);

$roster->tpl->set_filenames(array('serverlist_top' => $addon['basename'] . '/tpl_serverlist_top.html'));
$roster->tpl->display('serverlist_top');

$numlink = 1;
$pagelinks = ceil($servercount / $addon['config']['guildspeak_ts_perpage']);

$pageprev = $page -1;

if ($page == $pagelinks) {
  $pagenext = $page;
} else {
  $pagenext = $page +1;
}

$roster->tpl->assign_block_vars('serverlist_nav', array(
            'BORDERCOLOR'      => $addon['config']['guildspeak_ts_bordercolor'],
            'CATROWCOLOR1'    => $addon['config']['guildspeak_ts_catrowcolor1'],
            'SERVER_COUNT'    => $servercount,
            'SORT'            => $sort,
            'DIRECTION'       => $direction,
            'SHOW_GROUP'      => $showgroup,
            'PAGE'            => $page,
            'PAGE_DIRECTION'  => $pagedirection,
            'PAGE_PREV'       => $pageprev,
            'PAGE_NEXT'       => $pagenext,
            'PAGE_LINKS'      => $pagelinks,
            'NUM_LINK'        => $numlink,
            'INC_NUM_LINK'    => $numlink++,
            'IMG_DIR'         => $addon['image_path'],
            'PAGETITLE'       => $addon['config']['guildspeak_ts_pagetitle'],
            'MESSAGE'         => $addon['config']['guildspeak_ts_message'],
            'VERSION_DIRECTION' => $version_direction,
            'LISTING_LNK'     => makelink('util-guildspeak-listing&'),
            'SPACES'          => '  ',
            )
      );

      $roster->tpl->set_filenames(array('serverlist_nav' => $addon['basename'] . '/tpl_serverlist_nav.html'));

if ($servercount > $addon['config']['guildspeak_ts_perpage'])
{
      $roster->tpl-display('serverlist_nav');
}
while ($row = $roster->db->fetch($request))
{

	if ($rowcolor == $addon['config']['guildspeak_ts_rowcolor2'])
	{
		$rowcolor = $addon['config']['guildspeak_ts_rowcolor1'];
	}
	else
	{
		$rowcolor = $addon['config']['guildspeak_ts_rowcolor2'];
	}

	$roster->tpl->assign_block_vars('serverlist', array(
            'ROWCOLOR'        => $addon['config']['guildspeak_ts_rowcolor'],
            'CATROWCOLOR1'    => $addon['config']['guildspeak_ts_catrowcolor1'],
            'SERVER_IP'       => $row->server_ip,
            'SERVER_PORT'     => $row->server_port,
            'SERVER_PASS'     => $row->server_password,
            'SERVER_LINKURL'  => $row->server_linkurl,
            'SERVER_NAME'     => $row->server_name,
            'SERVER_ID'       => $row->server_id,
            'SERVER_PLATFORM' => $row->server_platform,
            'SERVER_VERSION_MAJOR' => $row->server_version_major,
            'SERVER_VERSION_MINOR' => $row->server_version_minor,
            'SERVER_VERSION_RELEASE' => $row->server_version_release,
            'SERVER_VERSION_BUILD' => $row->server_version_build,
            'PAGE'            => $page,
            'SORT'            => $sort,
            'DIRECTION'       => $direction,
            'SHOW_GROUP'      => $showgroup,
            'PAGE_DIRECTION'  => $pagedirection,
            'IMG_DIR'         => $addon['image_path'],
            'IMGBG'           => $addon['config']['guildspeak_ts_imgbg'],
            'POPUP_WIDTH'     => $addon['config']['guildspeak_ts_popupwidth'],
            'POPUP_HEIGHT'    => $addon['config']['guildspeak_ts_popupheight'],
            'VERSION_DIRECTION' => $version_direction,
            'CLIENTS_CURRENT' => number_format($row->clients_current),
            'CLIENTS_MAXIMUM' => number_format($row->clients_maximum),
            'LISTING_LNK'     => makelink('util-guildspeak-listing&'),
            'LOGIN_LNK'       => makelink('util-guildspeak-login&'),
            )
      );

      $roster->tpl->set_filenames(array('serverlist' => $addon['basename'] . '/tpl_serverlist.html'));
      $roster->tpl->display('serverlist');

}

if ($servercount > $addon['config']['guildspeak_ts_perpage'])
{
	$roster->tpl-display('serverlist_nav');
}

$roster->tpl->assign_block_vars('serverlist_bot', array(
      'YEAR'            => date('Y'),
      'BORDERCOLOR'     => $addon['config']['guildspeak_ts_bordercolor'],
      'CATROWCOLOR1'    => $addon['config']['guildspeak_ts_catrowcolor1'],
      'SERVER_COUNT'    => getservercount(),
      'CHANNEL_COUNT'   => getchannelcount(),
      'LISTADMIN'       => $addon['config']['guildspeak_ts_listadmin'],
      'REFRESH'         => $addon['config']['guildspeak_ts_refresh'],
      'REFRESH_TIME'    => $addon['config']['guildspeak_ts_refreshtime'],
      )
);

$roster->tpl->set_filenames(array('serverlist_bot' => $addon['basename'] . '/tpl_serverlist_bot.html'));
$roster->tpl->display('serverlist_bot');

