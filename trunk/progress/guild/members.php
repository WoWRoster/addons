<?php
      require ($addon['dir'] . 'inc/b.php');
      include( $addon['dir'] . 'inc/functions.php' );
      $roster->output['show_menu']['pro'] = 1;
      //$roster->output['show_menu'] = false;
      $prog = new prog;

      $roster->output['html_head'] = '
      <script src="'.$addon['url_path'] . 'css/SpryTooltip.js" type="text/javascript"></script>
      <script src="http://www.wowhead.com/widgets/power.js"></script>
      <link href="'.$addon['url_path'] . 'css/samples.css" rel="stylesheet" type="text/css" />
      <link href="'.$addon['url_path'] . 'style.css" rel="stylesheet" type="text/css" />
      <link href="'.$addon['url_path'] . 'css/SpryTooltip.css" rel="stylesheet" type="text/css" />';
            
            
            
            $sqlf = "SELECT `addon_id` FROM `".$roster->db->table('addon')."` WHERE `basename` = 'memberslist';";
$resultsf = $roster->db->query($sqlf);
$rowf = $roster->db->fetch($resultsf);


$addon_cfgn = $rowf['addon_id'];
                  /**
                   * Get the current config values from the roster config table
                   */
                  $sqlc = "SELECT `config_name`, `config_value` FROM `".$roster->db->table('addon_config')."` WHERE `addon_id` = '".$addon_cfgn."' ORDER BY `id` ASC;";
                  $resultsc = $roster->db->query($sqlc);

                  if( !$resultsc || $roster->db->num_rows($resultsc) == 0 )
                        {
	                       $install = 1;
                        }

                  /**
                   * Fill the config array with values
                   */
                        while( $rowc = $roster->db->fetch($resultsc) )
                              {
	                             $mladdon['config'][$rowc['config_name']] = stripslashes($rowc['config_value']);
                              }
                        $roster->db->free_result($resultsc);
                        
                        
                        
      $bosscfg = $prog->getConfigDataboss($roster->db->table('boss',$addon['basename']));
      $instcfg = $prog->getConfigDatainst($roster->db->table('inst_table',$addon['basename']));
      $lootcfg = $prog->getConfigDataloots($roster->db->table('loot_table',$addon['basename']));


      $roster->tpl->assign_block_vars('head',array(
                                    'VALUE' => makelink(''),
                                    'NAME' => $roster->locale->act['main_page'],
                                    'WELCOME1' => sprintf($roster->locale->act['welcome_1'],$roster->data['guild_name']),
                                    'GUILD_NAME' => $roster->data['guild_name'],
                                    'ADDON_NAME' => $roster->locale->act['menupanel_pro'],
                                    )
                              );
                              
      $roster->tpl->assign_block_vars('dropdown',array(
                                    'VALUE' => makelink(),
                                    'NAME' => $roster->locale->act['main_page'],                                    
                                    )
                              );

      foreach( $instcfg as $instance => $inst)
	{
  //          $head .= '<option value="'.makelink('&amp;inst='.$inst['inst_acronym']).'">'.$inst['inst_name']."</option>\n";		
            $roster->tpl->assign_block_vars('dropdown',array(
                                    'VALUE' => makelink('&amp;inst='.$inst['inst_acronym']),
                                    'NAME' => $inst['inst_name']                                    
                                    )
                              );
                        }
                              
                              
 foreach( $instcfg as $instance => $inst)
            {//echo $instance;
                  $prog->makestatpage($instance,$inst,$bosscfg);
            }
$roster->tpl->set_handle('header', $addon['basename'] . '/rp_header.html');
$roster->tpl->display('header'); 

      //$sql = 'Select * From `'.$roster->db->table('members').'` Where `guild_id` = "'.$roster->data['guild_id'].'" And `level` >= "70" ORDER BY `level` DESC, `name` ASC';
      $sql = 'SELECT '.
	'`members`.`member_id`, '.
	'`members`.`name`, '.
	'`members`.`class`, '.
	'`members`.`level`, '.
	'`members`.`zone`, '.
	'`members`.`online`, '.
	'`members`.`last_online`, '.
	"UNIX_TIMESTAMP(`members`.`last_online`) AS 'last_online_stamp', ".
	"DATE_FORMAT(  DATE_ADD(`members`.`last_online`, INTERVAL ".$roster->config['localtimeoffset']." HOUR ), '".$roster->locale->act['timeformat']."' ) AS 'last_online_format', ".
	'`members`.`note`, '.
	'`members`.`guild_title`, '.

	'`alts`.`main_id`, '.

	'`guild`.`update_time`, '.

	"IF( `members`.`note` IS NULL OR `members`.`note` = '', 1, 0 ) AS 'nisnull', ".
	'`members`.`officer_note`, '.
	"IF( `members`.`officer_note` IS NULL OR `members`.`officer_note` = '', 1, 0 ) AS 'onisnull', ".
	'`members`.`guild_rank`, '.

	'`players`.`server`, '.
	'`players`.`race`, '.
	'`players`.`sex`, '.
	'`players`.`exp`, '.
	'`players`.`clientLocale`, '.

	'`players`.`lifetimeRankName`, '.
	'`players`.`lifetimeHighestRank`, '.
	"IF( `players`.`lifetimeHighestRank` IS NULL OR `players`.`lifetimeHighestRank` = '0', 1, 0 ) AS 'risnull', ".
	'`players`.`hearth`, '.
	"IF( `players`.`hearth` IS NULL OR `players`.`hearth` = '', 1, 0 ) AS 'hisnull', ".
	"UNIX_TIMESTAMP( `players`.`dateupdatedutc`) AS 'last_update_stamp', ".
	"DATE_FORMAT(  DATE_ADD(`players`.`dateupdatedutc`, INTERVAL ".$roster->config['localtimeoffset']." HOUR ), '".$roster->locale->act['timeformat']."' ) AS 'last_update_format', ".
	"IF( `players`.`dateupdatedutc` IS NULL OR `players`.`dateupdatedutc` = '', 1, 0 ) AS 'luisnull', ".

	"GROUP_CONCAT( DISTINCT CONCAT( `proftable`.`skill_name` , '|', `proftable`.`skill_level` ) ORDER BY `proftable`.`skill_order`) as professions, ".
	"GROUP_CONCAT( DISTINCT CONCAT( `talenttable`.`tree` , '|', `talenttable`.`pointsspent` , '|', `talenttable`.`background` ) ORDER BY `talenttable`.`order`) AS 'talents' ".

	'FROM `'.$roster->db->table('members').'` AS members '.
	'LEFT JOIN `'.$roster->db->table('players').'` AS players ON `members`.`member_id` = `players`.`member_id` '.
	'LEFT JOIN `'.$roster->db->table('skills').'` AS proftable ON `members`.`member_id` = `proftable`.`member_id` '.
	'LEFT JOIN `'.$roster->db->table('talenttree').'` AS talenttable ON `members`.`member_id` = `talenttable`.`member_id` '.
	'LEFT JOIN `'.$roster->db->table('alts','memberslist').'` AS alts ON `members`.`member_id` = `alts`.`member_id` '.
	'LEFT JOIN `'.$roster->db->table('guild').'` AS guild ON `members`.`guild_id` = `guild`.`guild_id` '.
	'WHERE `members`.`guild_id` = "'.$roster->data['guild_id'].'" and `members`.`level` >= "70"'.
	'GROUP BY `members`.`member_id` '.
	'ORDER BY `level` DESC, `name` ASC ';
      $result = $roster->db->query($sql) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql);
      //$row = $roster->db->fetch($result);      
      
include_once ($addon['inc_dir'] . 'memberslist.php');



                              
                              
$memberlist = new memberslist;
$FIELD['level'] = array (
	'lang_field' => 'level',
	'order_d'    => array( '`members`.`level` ASC' ),
	'value' => array($memberlist,'level_value'),
	'js_type' => 'ts_number',
	'display' => $mladdon['config']['member_level'],
);
$FIELD['name'] = array (
	'lang_field' => 'name',
	'order'    => array( '`members`.`name` ASC' ),
	'order_d'    => array( '`members`.`name` DESC' ),
	'value' => array($memberlist,'name_value'),
	'js_type' => 'ts_string',
	'display' => 3,
);
$FIELD['class'] = array (
	'lang_field' => 'class',
	'order'    => array( '`members`.`class` ASC' ),
	'order_d'    => array( '`members`.`class` DESC' ),
	'value' => array($memberlist,'class_value'),
	'js_type' => 'ts_string',
	'display' => $mladdon['config']['member_class'],
);
            $stripe = '0';
$roster->tpl->assign_vars(array(
	'GUILDNAME' => $roster->data['guild_name'],
	'TNAME' => $roster->locale->act['ms_name'],
      'TLEVEL' => $roster->locale->act['ms_level'],                                    
      'TCLASS' => $roster->locale->act['ms_class'],
      'TTRADE' => $roster->locale->act['ms_trade'],
      'TINSTANCE' => $roster->locale->act['ms_instance']
	)
);            

      while ($row = $roster->db->fetch($result))
            {
            $stripe = (($stripe%2)+1);
            
                  $roster->tpl->assign_block_vars('members',array(
                        'NAME' => $prog->name_value ( $row, $FIELD ),
                        'CLASS' => $prog->class_value ( $row, $FIELD ),
                        'LEVEL' => $prog->level_value ( $row, $FIELD ),
                        'TRADE' => $prog->tradeskill_icons ( $row ),
                        'INST' => $prog->getinstlootnum($row['member_id'],$array,$bosscfg,$lootcfg,$instcfg),
                        'STRIPE' => $stripe 
                        )
                  );
                  
            }
$roster->tpl->set_handle('body', $addon['basename'] . '/members.html');
$roster->tpl->display('body');
      
      
