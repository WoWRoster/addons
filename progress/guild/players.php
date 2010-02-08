<?php
require ($addon['dir'] . 'inc/b.php');
include( $addon['dir'] . 'inc/functions.php' );
//$roster->output['show_menu'] = false;
$roster->output['show_menu']['pro'] = 1;
$prog = new prog;

$roster->output['html_head'] = '
<script src="'.$addon['url_path'] . 'css/SpryTooltip.js" type="text/javascript"></script>
<script src="http://www.wowhead.com/widgets/power.js"></script>
<link href="'.$addon['url_path'] . 'css/samples.css" rel="stylesheet" type="text/css" />
<link href="'.$addon['url_path'] . 'style.css" rel="stylesheet" type="text/css" />
<link href="'.$addon['url_path'] . 'css/SpryTooltip.css" rel="stylesheet" type="text/css" />
';
$roster->output['body_onload'] .= 'initARC(\'rp_menu\',\'radioOn\',\'radioOff\',\'checkboxOn\',\'checkboxOff\');';
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
      foreach( $instcfg as $instance => $inst)
	{
            $roster->tpl->assign_block_vars('dropdown',array(
                        'VALUE' => makelink('&amp;inst='.$inst['inst_acronym']),
                        'NAME' => $inst['inst_name']                                    
                  )
            );
      }
      
      if (isset($_GET['inst']))
      {
            $insts = $_GET['inst'];
      }
      else
      {
            $insts = '';
      }


      foreach( $instcfg as $instance => $inst)
      {
            $prog->makestatpage($instance,$inst,$bosscfg);
      }

      $roster->tpl->set_handle('header', $addon['basename'] . '/rp_header.html');
      $roster->tpl->display('header');     

      if ($insts != '')
      {

$imgext = $roster->config['img_suffix'];
$stripe = '';
$roster->tpl->assign_vars(array(
	'I_NAME' => $roster->locale->act['name'],
	'I_ICON' => $roster->locale->act['icon'],

	'I_LOOTERS' => $roster->locale->act['looters'],
	'I_LOOTABLE' => $roster->locale->act['loottable'],
	)
);
		
            foreach( $instcfg as $instance => $inst)
            {
                  if ($inst['inst_acronym'] == $insts)
                  {
                        $sx = 0;
                        foreach ($bosscfg['i'.$inst['inst_id']] as $instid => $bid)
                        {
                              $sx++;
                              $roster->tpl->assign_block_vars('menue',array(
                                    'ID' => $bid['b_id'],
                                    'NAME' => $bid['b_name'],
                                    'SELECTED' => (isset($sx) && $sx == 1 ? true : false)
                                    )
                              );
                  
                  $roster->tpl->assign_block_vars('player_loot',array(
				'ID' => $bid['b_id'],
				'P_B_NAME' => $bid['b_name']
				
				)
			);    
                                          
                                        $ltt = '<table width="400" cellspacing="0" cellpadding="0">\n\n';
                                          
                                          if (isset($lootcfg[$inst['inst_id']][$bid['b_id']][$bid['b_lt_id']]))
                                                {
                                          
                                                      foreach ($lootcfg[$inst['inst_id']][$bid['b_id']][$bid['b_lt_id']] as $loot => $lt)
                                                            {
                                                                  $stripe = (($stripe%2)+1);
                                                                  $players = explode('|',$lt['l_looters']);
                                                                  $ltr = '';
					                                    foreach( $players as $value )
                                                                        {
                                                                              if ($value !='')
                                                                                    {
                                                                                          $ltr .= '<a href="index.php?p=char-info&amp;a=c:'.$value.'">'.$prog->getplayername($value).'</a><br>'; 
                                                                                    }
                                                                        
                                                                              if ($value == '' && $ltr == '')
                                                                                    {
                                                                                          $ltr .= '&nbsp;'; 
                                                                                    } 
                                                                        }
                                                                 $roster->tpl->assign_block_vars('player_loot.info',array(
                                                                        'ID' => $bid['b_id'],
				                                                  'I_TEXTURE' => $roster->config['interface_url'].'Interface/Icons/'.strtolower($lt['l_texture']).'.'.$imgext,
				                                                  'I_ID' => $lt['l_id'],
				                                                  'I_LTRS' => $ltr,
				                                                  'I_LT_TABLE' => $lt['l_lt_id'],
				                                                  'I_QUALITY' => (isset($roster->locale->act['quality'][$lt['l_id']]) && $roster->locale->act['quality'][$lt['l_id']] != '' ? $roster->locale->act['quality'][$lt['l_id']] : ''), //$roster->locale->act['quality'][$lt['l_id']],
				                                                  'I_NAME' => $lt['l_name'],
				                                                  'I_STRIPE' => $stripe
				                                                  )
			                                                   );
                                                            }
                                                }
                                    }
                        }
                  }
$roster->tpl->set_handle('header', $addon['basename'] . '/rp_header.html');
$roster->tpl->display('header'); 
$roster->tpl->set_handle('body', $addon['basename'] . '/players.html');
$roster->tpl->display('body');
            
      }

