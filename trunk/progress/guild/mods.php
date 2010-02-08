<?php


      include( $addon['dir'] . 'inc/functions.php' );
      //$roster->output['show_menu'] = false;
      $roster->output['show_menu']['pro'] = 1;
      $prog = new prog;
      //include( $addon['dir'] . 'inc/wat_item_tooltip.class.php' );
      //include( $addon['dir'] . 'inc/phpArmory.class.php');
      //$itemx = new WAT_Item_ToolTip;
      //$armory = new phpArmory;
      
      
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
//ol_width
$roster->output['body_onload'] .= 'initARC(\'rp_menu\',\'radioOn\',\'radioOff\',\'checkboxOn\',\'checkboxOff\');';
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
      $bosscfg = $prog->getConfigDataboss($roster->db->table('boss',$addon['basename']));
      $instcfg = $prog->getConfigDatainst($roster->db->table('inst_table',$addon['basename']));
      $lootcfg = $prog->getConfigDataloots($roster->db->table('loot_table',$addon['basename']));
      $modcfg = $prog->getConfigDatamod($roster->db->table('mod_info',$addon['basename']));
      //echo '<pre>';
      //print_r($modcfg);
if (isset($_GET['mod']))
      {
            $mod = $_GET['mod'];
      }
      else
      {
            $mod = '';
      }    
      
        
      
            
            
      $menu = '';
      $roster->tpl->assign_block_vars('head',array(
                                    'VALUE' => makelink(''),
                                    'MODNAME' => $roster->locale->act['title'.$mod],
                                    'NAME' => $roster->locale->act['main_page'],
                                    'WELCOME1' => sprintf($roster->locale->act['welcome_1'],$roster->data['guild_name']),
                                    )
                              );

      foreach( $instcfg as $instance => $inst)
	{
  //          $head .= '<option value="'.makelink('&amp;inst='.$inst['inst_acronym']).'">'.$inst['inst_name']."</option>\n";		
            $roster->tpl->assign_block_vars('head.dropdown',array(
                                    'VALUE' => makelink('&amp;inst='.$inst['inst_acronym']),
                                    'NAME' => $inst['inst_name']                                    
                                    )
                              );
      }
      
      foreach( $instcfg as $instance => $inst)
      {
            $prog->makestatpage($instance,$inst,$bosscfg);
      }

      $roster->tpl->set_handle('header', $addon['basename'] . '/rp_header.html');
$roster->tpl->display('header');
$imgext = $roster->config['img_suffix'];
$stripe = '0';
$roster->tpl->assign_vars(array(
	'I_NAME' => $roster->locale->act['name'],
	'I_ICON' => $roster->locale->act['icon'],

	'I_LOOTERS' => $roster->locale->act['looters'],
	'I_LOOTABLE' => $roster->locale->act['loottable'],
	)
);
if ($mod != '')
{
            $menu .= '<!-- Begin Config Menu -->
                  '.border('sgray','start',''.$mod.' Menu').'
                  <div >
                  <ul id="rp_menu" class="tab_menu">'."\n";
                  $first_tab = ' class="selected"';
                  $menu .= '<li class="selected">';
                  $imgext = $roster->config['img_suffix'];
                  
                  
$ff = '0';
            foreach( $modcfg as $mods => $modx)
            {
            $sx = '0';
            
            //echo $mods.' - ' . $modx . '<br>';
                  foreach( $modx as $key1 => $key1x)
                  {
                        //echo $key1.' - ' . $key1x . '<br>';
                        
                        if ($key1 == $mod)
                        {
                              foreach( $key1x as $a => $b)
                              {
                              $sx++;
                                    //echo $a.' - ' . $b . '<br>';
                                    $roster->tpl->assign_block_vars('menue',array(
                                          'ID' => $a,
                                          'NAME' => $a,
                                          'SELECTED' => (isset($sx) && $sx == 1 ? true : false)
                                          )
                                    );
                                    
                                    $roster->tpl->assign_block_vars('key1_block',array(
                                          'ID' => $a,
                                          'B_NAME' => $a,
                                          )
                                    );
                                    
                                    foreach( $b as $key2 => $c)
                                    {
                                          //echo $key2.' - ' . $c['m_key_2_texture'] . '<br>';
                                          if ($c['m_key_2_sub_head'] != ''){
                                          list($q,$t ) = explode("|", $c['m_key_2_sub_head'], 2);
                                          }
                                          else
                                          {
                                          $t = '';
                                          $q = '';
                                          }
                                          $ff++;
                                          
                                         
                                          $roster->tpl->assign_block_vars('key1_block.key2_block',array(
                                                'KEY2_NAME' => stripslashes($roster->locale->act[$key2]),
                                                'KEY2_SUBNAME1' => $roster->locale->act[$t],
                                                'KEY2_SUBNAME2' => $q,
                                                'KEY2_TOGGLE' => $ff,
                                                'KEY2_TEXTURE' => $roster->config['interface_url'].'Interface/Icons/'.strtolower($c['m_key_2_texture']).'.'.$imgext,
                                                'KEY2_QUALITY' => $c['m_key_2_quality'],
                                                )
                                          );
                                          
                                          foreach( $c['info'] as $item => $items)
                                          {
                                                //echo $item.' - ' . $items['item_id'] . '<br>';
                                                $stripe = (($stripe%2)+1);
                                                $textur = $items['item_texture'];
                                                
                                                if ($items['item_texture'] == '')
                                                {
                                                     $textur =  $prog->get_item_icon_mod($items['item_id'],'mod_info');
                                                }
                                                if ($items['item_quality'] == '')
                                                {
                                                $iquality = $prog->get_item_quality($items['item_id'],$items['item_name']);
                                                }
                                                else
                                                {
                                                 $iquality = $items['item_quality'];
                                                }
                                                $players = explode('|',$items['item_looters']);
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
                                                                        
                                          
                                                $roster->tpl->assign_block_vars('key1_block.key2_block.items',array(
                                                      'INFO_NAME' => $items['item_name'],
                                                      'INFO_ID' => $items['item_id'],
                                                      'INFO_TEXTURE' => $roster->config['interface_url'].'Interface/Icons/'.strtolower($textur).'.'.$imgext, //$items['item_texture'],
                                                      'INFO_QUALITY' => $iquality,
                                                      'INFO_LOOTED' => $items['item_looted'],
                                                      'INFO_LOOTERS' => $ltr,
                                                      'INFO_TOOLTIP' => makeOverlib( $prog->get_tooltip( $items['item_id'] ) , $caption=$items['item_name'] , $caption_color='' , $mode=2 , $locale='' , $extra_parameters=''), //$prog->get_tooltip( $items['item_id'] ),
                                                      'INFO_STRIPE' => $stripe,
                                                      )
                                                );
                                          }
                                    }
                              }
                        }
                  }
            }
            $menu .='</ul></div>'.border('sgray','end');

$roster->tpl->set_handle('body', $addon['basename'] . '/mod.html');
$roster->tpl->display('body');


    }  
	

