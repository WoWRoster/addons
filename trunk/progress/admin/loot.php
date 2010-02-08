<?php


if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

$roster->output['html_head'] = '<script src="http://www.wowhead.com/widgets/power.js"></script>';
$roster->output['html_head'] = '
<script src="'.$addon['url_path'] . 'css/SpryTooltip.js" type="text/javascript"></script>
<link href="'.$addon['url_path'] . 'style.css" rel="stylesheet" type="text/css" />
<link href="'.$addon['url_path'] . 'css/SpryTooltip.css" rel="stylesheet" type="text/css" />';
$roster->output['body_onload'] .= 'initARC(\'config_config\',\'radioOn\',\'radioOff\',\'checkboxOn\',\'checkboxOff\');';
//include( $addon['dir'] . 'inc/functions.php' );
//$roster->output['show_menu'] = false;

$roster->scope = 'guild';
$roster->get_scope_data();
$gid = $roster->data['guild_id'];
//$prog = new prog;	
$bosscfg = $prog->getConfigDataboss($roster->db->table('boss',$addon['basename']));

//echo '<pre>';
//print_r($_POST);
//echo '</pre>';

$instcfg = $prog->getConfigDatainst($roster->db->table('inst_table',$addon['basename']));
$lootcfg = $prog->getConfigDataloots($roster->db->table('loot_table',$addon['basename']));
//echo '<pre>';
//print_r($lootcfg);
//echo '</pre>';

$form = '';
$html = '';    

$menu .= '
<!-- Begin Config Menu -->
'.border('sgray','start','Config Menu').'
<div >
  <ul id="rp_menu" class="tab_menu">'."\n";
$first_tab = ' class="selected"';
$menu .= '<li class="selected">
                  <a href="#" rel="i0" '.makeOverlib( $roster->locale->act['admin']['main'] , $caption=$roster->locale->act['admin']['main'] , $caption_color='' , $mode=0 , $locale='' , $extra_parameters='' ).">".$roster->locale->act['admin']['main']."</a></li>\n";
$r = '0';
foreach( $instcfg as $instance => $inst)
	{
            $menu .= '<li><a href="#" rel="i'.$inst['inst_id'].'" '.makeOverlib( $inst['inst_zone'].'<br>'.$roster->locale->act['admin']['t_boss'].': '.$inst['inst_t_bosses'] , $caption=$inst['inst_name'] , $caption_color='' , $mode=0 , $locale='' , $extra_parameters='' ).'>'.$roster->locale->act['admin'][$inst['inst_name']].'</a></li>'."\n";    
      }
$menu .='</ul></div>'.border('sgray','end');

$html .= '<div id="i0" style="display:none">';
      $html .= ''.border('sgreen','start',$roster->locale->act['admin']['main']).'';
      $html .= '<table width="600" cellspacing="0" cellpadding="0">';
      $html .= '<tr><td>'.$roster->locale->act['admin']['loot_main'].'';
      
      $html .= '</td></tr>';
      $html .= '</table>'.border('sgreen','end').'';
      $html .= "</div>\n\n";
      
      foreach( $instcfg as $instance => $inst)
	{
$html .= '<div id="i'.$inst['inst_id'].'" style="display:none">';
      $html .= ''.border('sgreen','start',''.$inst['inst_name'].'').'';
      $html .= '<table width="600" cellspacing="0" cellpadding="0">';
      
      $stripe = 0;
      foreach( $bosscfg as $b_inst => $b_id)
      {
            if ('i'.$instance == $b_inst)
            {

                  

                  foreach($lootcfg as $ins => $bid)
                  {
                        if ($ins == $inst['inst_id'])
                        {
                              foreach ($bid as $boss => $info)
                              {
                                    $html .= '<tr><td class="header_text" align="center" colspan=3><span class=blue>'.$bosscfg['i'.$ins][$boss]['b_name'].'</span></td></tr>';
                                    $html .= '<tr><td class="header_text" width="200">'.$roster->locale->act['admin']['loot_name'].'</td>
                                                <td class="header_text">'.$roster->locale->act['admin']['loot_looters'].'</td>
                                                <td class="header_text">'.$roster->locale->act['admin']['loot_looted'].'</td></tr>';

                                    foreach ($info as $lt => $loot)
                                    {
                                          foreach ($loot as $loots)
                                          {
                                          $r++;
                                          $stripe = (($stripe%2)+1);
                                                $html .= '<tr>';
                                                $html .= '<td class="membersRow'.$stripe.'" width="200"><span color=>'.$loots['l_name'].'<span></td>';
                                                $html .= '<td class="membersRow'.$stripe.'">'.$loots['l_looters'].'</td>';
                                                $html .= '<td class="membersRow'.$stripe.'">
( <input type="radio" id="rad_config_' . $r . '" name="config_'.$gid.'_'.$loots['l_id'].'_looted" value="yes" '.($loots['l_looted'] == 'yes' ? 'checked="checked"' : ' ' ).' />  <label for="rad_config_' . $r++ . '" class="' . ( $loots['l_looted'] == 'yes' ? 'blue' : 'white' ) . '">'.$roster->locale->act['admin']['yes'].'</label> )
( <input type="radio" id="rad_config_' . $r . '" name="config_'.$gid.'_'.$loots['l_id'].'_looted" value="no" '.($loots['l_looted'] == 'no' ? 'checked="checked"' : ' ' ).'/>  <label for="rad_config_' . $r++ . '" class="' . ( !$loots['l_looted'] == 'yes' ? 'blue' : 'white' ) . '">'.$roster->locale->act['admin']['no'].'</label> )
                  
                                                
                                                </td>';
                                                $html .= '</tr>';
                                          }
                                    }
                                    $html .= '<tr><td colspan="3" class="divider_gold"><img src="img/pixel.gif" width="1" height="1" alt="" /></td></tr>';
                              }
                        }
                        
                  }
            }
      }
      

      $html .= '</td></tr>';
      $html .= '</table>'.border('sgreen','end').'';
      $html .= "</div>\n\n";
}



echo "
<form action=\"\" method=\"post\" enctype=\"multipart/form-data\" id=\"config\" onsubmit=\"return confirm('".$roster->locale->act['confirm_config_submit']."');submitonce(this);\">
<input type=\"submit\" value=\"".$roster->locale->act['config_submit_button']."\" />\n
<input type=\"reset\" name=\"Reset\" value=\"".$roster->locale->act['config_reset_button']."\" onclick=\"return confirm('".$roster->locale->act['confirm_config_reset']."')\"/>\n
<input type=\"hidden\" name=\"rp_op\" value=\"loots\" />\n<br /><br />\n
".$html.'
<script type="text/javascript">
var rp_menu=new tabcontent(\'rp_menu\');
rp_menu.init();
</script>
';
