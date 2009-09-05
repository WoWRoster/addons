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
 * @subpackage Group Page
 * 
 */

      include_once($addon['inc_dir'] . 'db_inc.php');
      clearinactive();

	switch ($_GET['direction'])
	{
		case "desc":
			$sort = "desc";
			break;
		default:
			$direction = "asc";
			break;
	}
	
	if (isset($_GET["page"]))
	{
		$page = intval($_GET["page"]);
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

	if (empty($sort))
	{
		$sort = "clients_current";
	}

	if (isset($direction))
	{
		$pagedirection = $direction;
	}

	if (empty($pagedirection)) 
	{
		$pagedirection = "asc";
	}

	if (empty($direction)) 
	{
		$direction = "desc";
	}
	if (empty($page)) 
	{
		$page = 1;
		$pagestart = $page -1;
	}
	else 
	{
		$pagestart = (($page -1) * $addon['config']['guildspeak_ts_ispperpage']);
	}

	$sqlcount = $roster->db->query("SELECT * FROM $dbtable4 ORDER BY group_users DESC, group_servers DESC, group_ispname");
	$servercount = number_format($roster->db->num_rows($sqlcount));

	$sqlgs = $roster->db->query("SELECT sum(group_servers) FROM $dbtable4");
	$glists = $roster->db->fetch($sqlgs);
	$glistsd = number_format($glists[0]);

	$sqlgu = $roster->db->query("SELECT sum(group_users) FROM $dbtable4");
	$glistu = $roster->db->fetch($sqlgu);
	$glistud = number_format($glistu[0]);

	$sql = $roster->db->query("SELECT * FROM $dbtable4 ORDER BY group_users DESC, group_servers DESC, group_ispname LIMIT $pagestart,$addon[config][guildspeak_ts_ispperpage]");

	if ($direction == "asc") 
	{
		$direction = "desc";
	}
	else if ($direction == "desc") 
	{
		$direction = "asc";
	}

	echo '      <br>
      <table align="center" border="0" cellpadding="3" cellspacing="1" width="100%" bgcolor="'.$addon["config"]["guildspeak_ts_bordercolor"].'">
        <tr>
          <td align="center" bgcolor="'.$addon["config"]["guildspeak_ts_catrowcolor1"].'" class="catagory" valign="middle" nowrap><b>'.$servercount.'</b></td>
          <td align="center" bgcolor="'.$addon["config"]["guildspeak_ts_catrowcolor1"].'" class="catagory" valign="middle" nowrap><b>ISP Name</b></td>
          <td align="center" bgcolor="'.$addon["config"]["guildspeak_ts_catrowcolor1"].'" class="catagory" valign="middle" nowrap><b>Servers</b></td>
          <td align="center" bgcolor="'.$addon["config"]["guildspeak_ts_catrowcolor1"].'" colspan="2" class="catagory" valign="middle" nowrap><b>Users</b></td>
        </tr>';

	if (($page == '0') or ($page == '1')) 
	{
		echo '        <tr class="glistfont">
        <td align="center" bgcolor="'.$rowcolor.'" class="glisting"><a href="listing.php">Show Group</a></td>
        <td align="center" bgcolor="'.$rowcolor.'" class="glisting" nowrap>Show All</td>
        <td align="center" bgcolor="'.$rowcolor.'" class="glisting">'.$glistsd.'</td>
        <td align="center" bgcolor="'.$rowcolor.'" class="glisting">'.$glistud.'</td>
        <td align="center" bgcolor="'.$rowcolor.'" class="glisting"><img src="images/'.$addon["config"]["guildspeak_ts_imgbg"].'_open.gif" border="0" alt="Users Online" title="Users Online"></td>
      </tr class="listfont">';
	}

	if ($servercount > $addon['config']['guildspeak_ts_ispperpage']) 
	{
		$numlink = 1;
            $pagelinks = ceil($servercount / $addon['config']['guildspeak_ts_ispperpage']);

            $pageprev = $page -1;

            if ($page == $pagelinks) {
                  $pagenext = $page;
            } else {
                  $pagenext = $page +1;
            }

            $roster->tpl->assign_block_vars('ispgroup_nav', array(
                  'CATROWCOLOR1'    => $addon['config']['guildspeak_ts_catrowcolor1'],
                  'PAGE_PREV'       => $pageprev,
                  'PAGE_NEXT'       => $pagenext,
                  'PAGE_LINKS'      => $pagelinks,
                  'PAGE'            => $page,
                  'NUM_LINK'        => $numlink,
                  'INC_NUM_LINK'    => $numlink++,
                  'SPACE'           => ' ',
                  )
            );

            $roster->tpl->set_filenames(array('ispgroup_nav' => $addon['basename'] . '/tpl_ispgroup_nav.html'));
            $roster->tpl->display('ispgroup_nav');

	}

	$rowcolor = $addon['config']['guildspeak_ts_rowcolor2'];

	while ($data = $roster->db->fetch($sql)) 
	{

		if ($rowcolor == $addon['config']['guildspeak_ts_rowcolor2']) 
		{
			$rowcolor = $addon['config']['guildspeak_ts_rowcolor1'];
		}
		else 
		{
			$rowcolor = $addon['config']['guildspeak_ts_rowcolor2'];
		}

		$ispname = str_replace(" ", "+", $data[1]);
		
		if (($data[2]) and ($data[2] != 'na')) 
		{
			$linkit = '<img src="images/'.$addon["config"]["guildspeak_ts_imgbg"].'_www.gif" border="0" alt="WWW" title="Visit '.$data[1].' website" align="absmiddle"> <a href="'.$data[2].'" title="Visit '.$data[1].'" target="_blank">';
		}
		else 
		{
			$linkit = '';
		}
		
		echo '        <tr class="glistfont">
        <td align="center" bgcolor="'.$rowcolor.'" class="glisting"><a href="listing.php?showgroup='.$ispname.'">Show Group</a></td>
        <td align="center" bgcolor="'.$rowcolor.'" class="glisting" nowrap>'.$linkit.''.$data[1].'</a></td>
        <td align="center" bgcolor="'.$rowcolor.'" class="glisting">'.$data[3].'</td>
        <td align="center" bgcolor="'.$rowcolor.'" class="glisting">'.$data[4].'</td>
        <td align="center" bgcolor="'.$rowcolor.'" class="glisting"><img src="images/'.$addon["config"]["guildspeak_ts_imgbg"].'_open.gif" border="0" alt="Users Online" title="Users Online"></td>
      </tr class="listfont">';
	}

	if ($servercount > $addon['config']['guildspeak_ts_ispperpage']) 
	{
		$numlink = 1;
            $pagelinks = ceil($servercount / $addon['config']['guildspeak_ts_ispperpage']);

            $pageprev = $page -1;

            if ($page == $pagelinks) {
                  $pagenext = $page;
            } else {
                  $pagenext = $page +1;
            }

            $roster->tpl->assign_block_vars('ispgroup_nav', array(
                  'CATROWCOLOR1'    => $addon['config']['guildspeak_ts_catrowcolor1'],
                  'PAGE_PREV'       => $pageprev,
                  'PAGE_NEXT'       => $pagenext,
                  'PAGE_LINKS'      => $pagelinks,
                  'PAGE'            => $page,
                  'NUM_LINK'        => $numlink,
                  'INC_NUM_LINK'    => $numlink++,
                  'SPACE'           => ' ',
                  )
            );

            $roster->tpl->set_filenames(array('ispgroup_nav' => $addon['basename'] . '/tpl_ispgroup_nav.html'));
            $roster->tpl->display('ispgroup_nav');
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

