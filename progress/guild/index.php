<?php
/**
 * WoWRoster.net WoWRoster
 *
 * Displays Raid Progresion info
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *

 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $Id$
 * @link       http://ulminia.zenutech.com
 * @package    Raid Progresion
*/

      require ($addon['dir'] . 'inc/b.php');
      include( $addon['dir'] . 'inc/functions.php' );
      $prog = new prog;
  
      $roster->output['html_head'] = '
            <script src="http://www.wowhead.com/widgets/power.js"></script>
            <link href="'.$addon['url_path'] . 'css/samples.css" rel="stylesheet" type="text/css" />
            <link href="'.$addon['url_path'] . 'style.css" rel="stylesheet" type="text/css" />
            <script type="text/javascript">
<!--
	var ol_width=300;var ol_offsetx=15;var ol_offsety=15;var ol_hauto=1;var ol_vauto=1;
	
//-->
</script>
';
      $roster->output['body_onload'] .= 'initARC(\'rp_menu\',\'radioOn\',\'radioOff\',\'checkboxOn\',\'checkboxOff\');';
      $roster->output['show_menu']['pro'] = 1; 

$d = '';
$mod_dir = ROSTER_ADDONS . $addon['basename'] . '\moduels';
      if( $handle = @opendir($mod_dir) )
	{
		while( false !== ($file = readdir($handle)) )
		{
			if( $file != '.' && $file != '..' && $file != '.svn' )
			{
				$mods[] = $file;
				foreach( $roster->multilanguages as $lang )
                        {
				if (file_exists($mod_dir . DIR_SEP . $file . DIR_SEP . $lang . '.php'))
                        {
			
			            $localetemp = $roster->locale->wordings;

                              if (file_exists($mod_dir . DIR_SEP . $file . DIR_SEP . $lang . '.php'))
                              {
                                    $roster->locale->add_locale_file($mod_dir . DIR_SEP . $file . DIR_SEP . $lang . '.php',$lang);

                              }
                        
                              $roster->locale->wordings = $localetemp;
                              unset($localetemp);
                        }
                        }
			}
		}
	}      
      usort($mods, 'strnatcasecmp');    

      # ok with the new table system we need to see if the installed addon is installed :P
      if ($prog->installed($roster->data['guild_id']) == 1)
      {
            $rpinstall = '';
      }
      else
      {
            $rpinstall = '<font color="red">Addon Not installed Updating tables now</font><br>';
            $prog->installtables($roster->data['guild_id'],$array,$roster->data['guild_name']);
      }

      #and here we get our config arrays
      $bosscfg = $prog->getConfigDataboss($roster->db->table('boss',$addon['basename']));
      $instcfg = $prog->getConfigDatainst($roster->db->table('inst_table',$addon['basename']));
      $lootcfg = $prog->getConfigDataloots($roster->db->table('loot_table',$addon['basename']));
      $modcfg = $prog->getConfigDatamod($roster->db->table('mod_info',$addon['basename']));
      
      $menu = '';
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
            $menu .= '<!-- Begin Config Menu -->
                  '.border('sgray','start','Boss Menu').'
                  <div >
                  <ul id="rp_menu" class="tab_menu">'."\n";
                  $first_tab = ' class="selected"';
                  $menu .= '<li class="selected">';
                  $imgext = $roster->config['img_suffix'];
                  
                  

            foreach( $instcfg as $instance => $inst)
            {$sx = '0';
                  if ($inst['inst_acronym'] == $insts)
                  {
                  $roster->tpl->assign_vars(array(
	                 'INST_NAME' => $inst['inst_name'],
	                 )
	           );
                        foreach ($bosscfg['i'.$inst['inst_id']] as $instid => $bid)
                        {
                              $menu .= '<li><a href="#" rel="b'.$bid['b_id'].'" >'.$bid['b_name'].'</a></li>'."\n";    
                              $sx++;
                              
                              $roster->tpl->assign_block_vars('menue',array(
                                    'ID' => $bid['b_id'],
                                    'NAME' => $bid['b_name'],
                                    'SELECTED' => (isset($sx) && $sx == 1 ? true : false)
                                    )
                              );
                  
                              $roster->tpl->assign_block_vars('boss_block',array(
                                    'ID' => $bid['b_id'],
                                    'B_NAME' => $bid['b_name'],
                                    'B_IMAGE' => ( isset($roster->locale->act['img'][$bid['b_name']]['small']) && file_exists($addon['url'].'images/'.$roster->locale->act['img'][$bid['b_name']]['small']) ? '<img src="'.$addon['url'].'images/'.$roster->locale->act['img'][$bid['b_name']]['small'].'" />' : ''),
                                    'B_KILLS' => $bid['b_kills'],
                                    'B_PERCENT' => $bid['b_percent'],
                                )
                              );            
                        if (isset($lootcfg[$inst['inst_id']][$bid['b_id']][$bid['b_lt_id']]))
                              {
                                    foreach ($lootcfg[$inst['inst_id']][$bid['b_id']][$bid['b_lt_id']] as $loot => $lt)
                                    {
                                          if ($lt['l_looted'] == 'yes'){
                                                $class = ' class="loot1"';
                                          }
                                          else
                                          {
                                                $class = ' class="loot2"';
                                          }
                                          $textur = $lt['l_texture'];
                                          if ($lt['l_texture'] == '')
                                          {
                                                $textur =  $prog->get_item_icon($lt['l_id'], 'loot_info');
                                          }
            
                                          
                                                
                                          $roster->tpl->assign_block_vars('boss_block.info',array(
                                                'ID' => $bid['b_id'],
				                        'I_TEXTURE' => $roster->config['interface_url'].'Interface/Icons/'.strtolower($textur).'.'.$imgext,
				                        'I_ID' => $lt['l_id'],
				                        'I_LT_TABLE' => $lt['l_lt_id'],
                                                'I_QUALITY' => (isset($roster->locale->act['quality'][$lt['l_id']]) && $roster->locale->act['quality'][$lt['l_id']] != '' ? $roster->locale->act['quality'][$lt['l_id']] : ''), //$roster->locale->act['quality'][$lt['l_id']],
				                        'NAME' => $lt['l_name'],
				                        'I_TOOLTIP' => makeOverlib( $prog->get_tooltip( $lt['l_id'] ) , $caption=$items['item_name'] , $caption_color='' , $mode=2 , $locale='' , $extra_parameters=''), //$prog->get_tooltip( $items['item_id'] ),
				                        'I_CLASS' => $class,
				                        'I_LOOTED' => $lt['l_looted']
				                        )
			                        );
                                    }
                              }
                                          
                                /*          
                              $ltt .= '</table>';
                                          
                              $body .= messageboxtoggle($ltt, $title = '<span style="color:#00ff00;">Loots</span>', $style = 'sgreen', false, $width = '500px').'</td></tr>';
                              $body .= '</table>'.border('sgreen','end').'';
                              $body .= "</div>\n\n";
      */
                        }
                  }
                 
            }
            $menu .='</ul></div>'.border('sgray','end');

$roster->tpl->set_handle('body', $addon['basename'] . '/index.html');
$roster->tpl->display('body');


    }


