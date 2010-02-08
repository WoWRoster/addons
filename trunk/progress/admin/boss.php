<?php


if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

$roster->output['html_head'] = '<script src="http://www.wowhead.com/widgets/power.js"></script>';
$roster->output['html_head'] = '
<script src="'.$addon['url_path'] . 'css/SpryTooltip.js" type="text/javascript"></script>
<link href="'.$addon['url_path'] . 'css/samples.css" rel="stylesheet" type="text/css" />
<link href="'.$addon['url_path'] . 'style.css" rel="stylesheet" type="text/css" />
<link href="'.$addon['url_path'] . 'css/SpryTooltip.css" rel="stylesheet" type="text/css" />';
$roster->output['body_onload'] .= 'initARC(\'rp_menu\',\'radioOn\',\'radioOff\',\'checkboxOn\',\'checkboxOff\');';
//include( $addon['dir'] . 'inc/functions.php' );
//$roster->output['show_menu'] = false;

$roster->scope = 'guild';
$roster->get_scope_data();
echo $roster->data['guild_id'].'<br>';
//$prog = new prog;	
$bosscfg = $prog->getConfigDataboss($roster->db->table('boss',$addon['basename']));
/*
echo '<pre>';
print_r($_POST);
echo '</pre>';
*/
$instcfg = $prog->getConfigDatainst($roster->db->table('inst_table',$addon['basename']));
$lootcfg = $prog->getConfigDataloots($roster->db->table('loot_table',$addon['basename']));
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

foreach( $instcfg as $instance => $inst)
	{
            $menu .= '<li><a href="#" rel="i'.$inst['inst_id'].'" '.makeOverlib( $inst['inst_zone'].'<br>'.$roster->locale->act['admin']['t_boss'].': '.$inst['inst_t_bosses'] , $caption=$inst['inst_name'] , $caption_color='' , $mode=0 , $locale='' , $extra_parameters='' ).'>'.$roster->locale->act['admin'][$inst['inst_name']].'</a></li>'."\n";    
      }
$menu .='</ul></div>'.border('sgray','end');

$html .= '<div id="i0" style="display:none">';
      $html .= ''.border('sgreen','start',$roster->locale->act['admin']['main']).'';
      $html .= '<table width="600" cellspacing="0" cellpadding="0">';
      $html .= '<tr><td>WElcome to your RP Config section. This is the BOss config where you can set a boss to downed or not. for Loot config please use the Raid Progreshion Loot config';
      
      $html .= '</td></tr>';
      $html .= '</table>'.border('sgreen','end').'';
      $html .= "</div>\n\n";
      
foreach( $instcfg as $instance => $inst)
	{
$html .= '<div id="i'.$inst['inst_id'].'" style="display:none">';
      $html .= ''.border('sgreen','start',''.$inst['inst_name'].'').'';
      $html .= '<table width="600" cellspacing="0" cellpadding="0">';
      $html .= '<tr><td class="header_text">'.$roster->locale->act['admin']['boss'].'</td>
                  <td class="header_text">'.$roster->locale->act['admin']['downed'].'</td>
                  <td class="header_text">'.$roster->locale->act['admin']['percent'].'</td></tr>';
      $stripe = 0;
      foreach( $bosscfg as $b_inst => $b_id)
      {
      //$html .= '<tr><td class="membersRow2" align="center">'.$b_inst.'-'.$b_id.'</td></tr>';
            if ('i'.$instance == $b_inst)
            {
                  foreach($b_id as $boss => $b_info)
                  {
                  $stripe = (($stripe%2)+1);
                        //echo $instance .'+'. $boss.'<br>';
                  //echo '<pre>';
                  //print_r($b_info);
                  //echo '<pre><hr>';
                  if ($b_info['b_down'] == 'yes')
                  {
                        $col = 'green';
                  }
                  else
                  {
                  $col = 'red';
                  }
                  $html .= '<tr>
                        <td class="membersRow'.$stripe.'" align="center"><font color="'.$col.'">'.$b_info['b_name'].'</font></td>
                        <td class="membersRow'.$stripe.'" align="right">
( <font color="green">'.$roster->locale->act['admin']['yes'].'</font> <input type="radio" class="checkBox" name="'.$b_inst.'_'.$b_info['b_id'].'_down" value="yes" '.($b_info['b_down'] == 'yes' ? 'checked="checked"' : '' ).' /> )
( <font color="red">'.$roster->locale->act['admin']['no'].'</font> <input type="radio" class="checkBox" name="'.$b_inst.'_'.$b_info['b_id'].'_down" value="no" '.($b_info['b_down'] == 'no' ? 'checked="checked"' : '' ).'/> )
                  </td>
                  <td class="membersRow'.$stripe.'">'.$b_info['b_percent'].'</td>
                        </tr>';
                  }
            }
      }
      

      $html .= '</td></tr>';
      $html .= '</table>'.border('sgreen','end').'';
      $html .= "</div>\n\n";
}


echo '
<table align="center" width="90%">
<tr>
<td width="250" align="left"></td><td width="20"></td><td width="600"></td>
</tr><tr>
<td width="100%" align="center" colspan ="3">
'.$msg.'</td>
</tr>

<td width="800" valign="top">';

echo "
<form action=\"\" method=\"post\" enctype=\"multipart/form-data\" id=\"config\" onsubmit=\"return confirm('".$roster->locale->act['confirm_config_submit']."');submitonce(this);\">
<input type=\"submit\" value=\"".$roster->locale->act['config_submit_button']."\" />\n
<input type=\"reset\" name=\"Reset\" value=\"".$roster->locale->act['config_reset_button']."\" onclick=\"return confirm('".$roster->locale->act['confirm_config_reset']."')\"/>\n
<input type=\"hidden\" name=\"rp_op\" value=\"boss\" />\n<br /><br />\n
".$html.'
</td>
</tr>
</table>

<script type="text/javascript">
var rp_menu=new tabcontent(\'rp_menu\');
rp_menu.init();
</script>
';









