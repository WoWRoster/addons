<?php
/******************************
 * $Id$
 ******************************/
 
 if (isset($_GET['edit']) != ''){
$roster->output['show_menu'] = false;
}
$roster->output['html_head'] = '
<script src="addons/RosterGallery/css/SpryTooltip.js" type="text/javascript"></script>
<link href="' . ROSTER_PATH . 'addons/RosterGallery/css/samples.css" rel="stylesheet" type="text/css" />
<link href="' . ROSTER_PATH . 'addons/RosterGallery/css/SpryTooltip.css" rel="stylesheet" type="text/css" />

<script language="JavaScript" type="text/javascript" src="addons/RosterGallery/css/xpath.js"></script>
<script language="JavaScript" type="text/javascript" src="addons/RosterGallery/css/SpryData.js"></script>
<script language="JavaScript" type="text/javascript" src="addons/RosterGallery/css/SpryTooltip.js"></script>
<link href="addons/RosterGallery/css/SpryTooltip.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.tooltip {
	background-color: #FFFFCC;
}
#multipleSample, .multipleSample2 {
	width: 300px;
	float: left;
}
#tooltipMultipleSample {
	border: 1px;
	width: 400px;
}
#classonme {
	width: 150px;
	height: 120px;
}
#classonme.enlarge {
	width: 160px;
	height: 130px;
	border: 2px solid red;
}
.optionName, .optionValue {
	font-weight: bold;
	font-size: 14px;
	color: red;
}
.optionValue {
	color: blue;
}
</style>

';

include( $addon['dir'] . 'inc/functions.php' );
include( $addon['dir'] . 'inc/conf.php' );
//$roster->output['show_menu'] = false;
$functions = new ssconfig;
define('ROSTER_SCREENTABLE',$roster->db->table('ss',$addon['basename']));
if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

echo '

<script language="javascript" type="text/javascript">
<!--
function popitup(url) {
	newwindow=window.open(url,\'name\',\'height=400,width=300\');
	if (window.focus) {newwindow.focus()}
	return false;
}

// -->
</script>



';



//echo $functions->sql_debug;


$addon_cfgn = 'addon_rg';
                  /**
                   * Get the current config values from the roster config table
                   */
                  $sql = "SELECT `config_name`, `config_value` FROM `roster_addon_config` WHERE `addon_id` = '".$addon['addon_id']."' ORDER BY `id` ASC;";
                  $results = $roster->db->query($sql);

                  if( !$results || $roster->db->num_rows($results) == 0 )
                        {
	                       $install = 1;
                        }

                  /**
                   * Fill the config array with values
                   */
                        while( $row = $roster->db->fetch($results) )
                              {
	                             $addon_cfg[$row['config_name']] = stripslashes($row['config_value']);
                              }
                        $roster->db->free_result($results);

                  // end config values

/*
OK here is where we check and see if the table is installed if not it installes it using the install script
*/

// ----[ Decide what to do next ]---------------------------
if( isset($_POST['ss_op']) && $_POST['ss_op'] != '' )
{
	switch ( $_POST['ss_op'] )
	{
		case 'settings':
		$functions->processData( $_POST );
		break;

		case 'incert';
		$functions->incertData( $_POST );
            break;

            case 'delete';
            if (is_array($_POST['deletess'])){
                  foreach ($_POST['deletess'] as $delete) {
      			$functions->deletesc( $delete );
		      }//$functions->deletesc( $_POST['deletess'] );
		}
            else {
      	
                  $functions->deletesc( $_POST['deletess'] );
		}
            break;
            
            case 'change_cat';
                  $functions->changecat($_POST['id'],$_POST['new_cat'],$_POST['old_cat'],$addon_cfg,$_POST['file'],$_POST['path']);
            break;

            case 'approve';
                  if (isset($_POST['approve'])){
        	         foreach ($_POST['approve'] as $approve) {
				$functions->approvesc( $approve );
        	         }
                  }
                  if (isset($_POST['delete'])){
            	     foreach ($_POST['delete'] as $delete) {
                              $functions->deletesc( $delete );
			      }
                  }

            break;
            
            case 'upload_wm';
                  $functions->uploadwmImage( $addon['dir'].$addon_cfg['rg_wm_dir'], $_FILES['wmfile']['name'] );
            break;

		default:
		break;
	}
}


if( isset($_GET['make_dir']) == 'chmod' )
{
	if( $functions->checkDirst( $ssfolder,1,1 ) )
	{
		$functions->setMessage('All folders in Screenshots Changed to 777');
	}
	else
	{
		$functions->setMessage('Change chmod manualy');
	}
}
// ----[ End Decide what to do next ]-----------------------

                  /**
                  * Get the current config values from the roster config table
                  */
                  $sql = "SELECT `config_name`, `config_value` FROM `roster_addon_config` WHERE `addon_id` = '".$addon['addon_id']."' ORDER BY `id` ASC;";
                  $results = $roster->db->query($sql);

                  if( !$results || $roster->db->num_rows($results) == 0 )
                        {
	                       $install = 1;
                        }

                  /**
                  * Fill the config array with values
                  */
                  while( $row = $roster->db->fetch($results) )
                  {
	                  $addon_cfg[$row['config_name']] = stripslashes($row['config_value']);
                  }
                  $roster->db->free_result($results);
                  // end config values
                  
                  
                  
                  if (isset($_GET['edit']) != ''){

if (isset($_GET['ide']) != '' && isset($_GET['edit']) == 'cat'){
//$roster->output['show_header'] = false;  // Disable the roster header
$roster->output['show_menu'] = false;    // Disable roster menu
$roster->config['logo'] = '';
$pagebar = null;
$menu = '';
$messages = '';
$ide = $_GET['ide'];
//echo $_GET['ide'].'<br>';
$imgdirthumb = 'addons' . DIR_SEP . 'RosterGallery' . DIR_SEP . 'screenshots' . DIR_SEP . 'thumbs' . DIR_SEP;
$imgdirthumb2 = 'addons' . DIR_SEP . 'RosterGallery' . DIR_SEP . 'screenshots' . DIR_SEP;
$roster->output['show_menu'] = false;
$sqle = "SELECT * FROM `" . ROSTER_SCREENTABLE . "` WHERE `id` = '".$ide."'";
//echo $sqle.'<br>';
$resulte = $roster->db->query($sqle) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$querye);
$rowe = $roster->db->fetch($resulte);
//echo $rowe['ide'];
if ($rowe['rateing'] != 0 && $rowe['votes'] != 0){
$rank2 = ($rowe['rateing'] / $rowe['votes']);
$rank = number_format($rank2, 1, '.', '');
}else{
$rank = "No Votes";
}


$messages = $functions->getMessage();
$messages .= $functions->getAdminMessage();

if( !empty($messages) )
{
	$messages .= '';
}
$x = 1;
$msg = border('sblue','start',$roster->locale->act['admin']['messages']).'<table width="200"><tr><td width="200" class="membersRow2"><center>'.$messages.' </td></tr></table>'.border('sblue','end').'<br>';


$html = border('sgreen','start',$rowe['caption'].' Current Rating '.$rank);
$html .= '

<form method="post" action="'.makelink('&amp;edit=cat&amp;ide='.$ide.'').'" enctype="multipart/form-data" onsubmit="submitonce(this)">
<table cellspacing="0" cellpadding="0" border="0">
<tr>
<td>';
$html .= '<img src="' . $imgdirthumb.$rowe['file'].'-thumb.'.$rowe['ext'].'" ></a><br>';
$html .= '
</td>
</tr>
  <tr>
    <td class="simpleborderbot sgreenborderbot"></td>
  </tr>  
<tr>
    <td class="simpleborderbot sgreenborderbot"></td>
  </tr>
<tr>
<td>
<select class="sc_select" name="new_cat"><option value="" selected="selected">--['.$addon_cfg['rg_'.$rowe['catagory'].''].']--</option>';

     for($n=1;$n<=10;$n++)
      {
            if ($n != 11){
            
            $total = $addon_cfg['rg_catcount'];
            $current = $addon_cfg['rg_cat'.$n.'en'];
          if ($addon_cfg['rg_cat'.$n.'en'] == 1){
          if ($addon_cfg['rg_'.$rowe['catagory'].''] != $addon_cfg['rg_cat'.$n]){
                  
              $html .= "<option value=\"".$addon_cfg['rg_cat'.$n.'id']."\" >".$addon_cfg['rg_cat'.$n]."</option>\n";
            }
            }
            }
      }
	  $html .= '</select>

        <input type="hidden" name="ss_op" value="change_cat" />
        <input type="hidden" name="id" value="'.$ide.'" />
        <input type="hidden" name="old_cat" value="'.$rowe['catagory'].'" />
        <input type="hidden" name="path" value="'.$imgdirthumb2.'" />
        <input type="hidden" name="file" value="'.$rowe['file'].'.'.$rowe['ext'].'" />
          <input type="submit" value="'.$roster->locale->act['admin']['edit'].'" name="edit" /></td>
      </tr>
</td>
</tr>
';
$html .= '</table></form>';
$html .= border('sgreen','end');
if( !empty($messages) )
{
echo $msg;
}
echo $html;
//die;
//$html .= $vote;


}

}else{

$query2 = "SELECT * FROM `".ROSTER_SCREENTABLE."` WHERE `approve` = '' ORDER BY 'order' DESC";
$result2 = $roster->db->query($query2) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$query2);
$tnapproved = $roster->db->num_rows($result2);


//open only edit box
$adddir = 'addons' . DIR_SEP . 'RosterGallery' . DIR_SEP;
$backgFilesArr = $functions->listFiles( $adddir.$addon_cfg['rg_wm_dir'],array('png') );
                  
$messages = $functions->getMessage();
$messages .= $functions->getAdminMessage();
if ($tnapproved > 0){
$messages .= '<font color=green>There are '.$tnapproved.' images that need approving</font>';
}

if (!is_writeable($addon['dir'].'screenshots/')){
$messages .= sprintf('Screenshots folder is not writable<br />Click <a href="%1$s">HERE</a> to try to chmod [<span class="green">%2$s</span>]',makelink('&amp;make_dir=chmod'),'screenshots/');
}

if( !empty($messages) )
{
	$messages .= '';
}
$x = 1;
$msg = border('sblue','start',$roster->locale->act['admin']['messages']).'<table width="500"><tr><td width="500" class="membersRow2"><center>';
$msg .= $messages;
$msg .= '<br>'.$roster->locale->act['admin']['configurationgreeting'];
$msg .= '<br><span style="font-size:10px;color:red;">Logged in Admin:</span><form style="display:inline;" name="roster_logout" action="?p=rostercp" method="post"><span style="font-size:10px;color:#FFFFFF"><input type="hidden" name="logout" value="1" />[<a href="javascript:document.roster_logout.submit();">Logout</a>]</span></form></center><br /></td></tr></table>';
$msg .= border('sblue','end').'<br>';


$menu = '
<!-- Begin Config Menu -->
'.border('sgray','start','Config Menu').'
<div style="width:200px;">
  <ul id="rg_menu" class="tab_menu">'."\n";
$first_tab = ' class="selected"';
$menu .= '<li class="selected">
                  <a href="#" rel="t1" '.makeOverlib( $roster->locale->act['admin']['dispconfigt'] , $caption=$roster->locale->act['admin']['dispconfig'] , $caption_color='' , $mode=0 , $locale='' , $extra_parameters='' ).'>'.$roster->locale->act['admin']['dispconfig'].'</a></li>';
$menu .= '    <li><a href="#" rel="t2" '.makeOverlib( $roster->locale->act['admin']['uplodconfigt'] , $caption=$roster->locale->act['admin']['uplodconfig'] , $caption_color='' , $mode=0 , $locale='' , $extra_parameters='' ).'>'.$roster->locale->act['admin']['uplodconfig'].'</a></li>'."\n";
$menu .= '    <li><a href="#" rel="t3" '.makeOverlib( $roster->locale->act['admin']['thumbconfigt'] , $caption=$roster->locale->act['admin']['thumbconfig'] , $caption_color='' , $mode=0 , $locale='' , $extra_parameters='' ).'>'.$roster->locale->act['admin']['thumbconfig'].'</a></li>'."\n";
$menu .= '    <li><a href="#" rel="t4" '.makeOverlib( $roster->locale->act['admin']['catconfigt'] , $caption=$roster->locale->act['admin']['catconfig'] , $caption_color='' , $mode=0 , $locale='' , $extra_parameters='' ).'>'.$roster->locale->act['admin']['catconfig'].'</a></li>'."\n";
$menu .= '    <li><a href="#" rel="t5" '.makeOverlib( $roster->locale->act['admin']['apconfigt'] , $caption=$roster->locale->act['admin']['apconfig'] , $caption_color='' , $mode=0 , $locale='' , $extra_parameters='' ).'>'.$roster->locale->act['admin']['apconfig'].'</a></li>'."\n";
$menu .= '    <li><a href="#" rel="t6" '.makeOverlib( $roster->locale->act['admin']['unapconfigt'] , $caption=$roster->locale->act['admin']['unapconfig'] , $caption_color='' , $mode=0 , $locale='' , $extra_parameters='' ).'>'.$roster->locale->act['admin']['unapconfig'].'</a></li>'."\n";
$menu .= '    <li><a href="#" rel="t9" '.makeOverlib( $roster->locale->act['admin']['vote_configt'] , $caption=$roster->locale->act['admin']['vote_config'] , $caption_color='' , $mode=0 , $locale='' , $extra_parameters='' ).'>'.$roster->locale->act['admin']['vote_config'].'</a></li>'."\n";
$menu .= '    <li><a href="#" rel="t10" '.makeOverlib( $roster->locale->act['admin']['status_configt'] , $caption=$roster->locale->act['admin']['status_config'] , $caption_color='' , $mode=0 , $locale='' , $extra_parameters='' ).'>'.$roster->locale->act['admin']['status_config'].'</a></li>'."\n";

$menu .='
</ul>

</div>
'.border('sgray','end');



#-[ upload display section ] ---
$html = '<!-- begin page content -->';




      $html .= '<div id="t1" style="display:none">';
      $html .= ''.border('sgreen','start',''.$roster->locale->act['admin']['dispconfig'].'').'';
      $html .= '<table width="600" cellspacing="0" cellpadding="0">';
      $html .= '';
      $html .= '<tr>
            <td class="membersRow2" align="center"><div style="cursor:help;" onmouseover="overlib(\''.$roster->locale->act['admin']['tooltip02'].'\',CAPTION,\''.$roster->locale->act['admin']['tooltip02cap'].'\');" onmouseout="return nd();">'.$roster->locale->act['admin']['tooltip02cap'].'</div></td>
            <td class="membersRow2" align="right">
            '.$roster->locale->act['amount'].': <input name="rg_ipp" type="text" value="'.$addon_cfg['rg_ipp'].'" size="5" maxlength="5" /></td>
            </tr>';
      $html .= '<tr>
            <td class="membersRow1" align="center"><div style="cursor:help;" onmouseover="overlib(\''.$roster->locale->act['admin']['tooltip03'].'\',CAPTION,\''.$roster->locale->act['admin']['tooltip03cap'].'\');" onmouseout="return nd();">'.$roster->locale->act['admin']['tooltip03cap'].'</div></td>
            <td class="membersRow1" align="right">
            '.$roster->locale->act['amount'].': <input name="rg_ipl" type="text" value="'.$addon_cfg['rg_ipl'].'" size="5" maxlength="5" /></td>
            </tr>';
      $html .= '<tr>
            <td class="membersRow2" align="center"><div style="cursor:help;" onmouseover="overlib(\''.$roster->locale->act['admin']['tooltip04'].'\',CAPTION,\''.$roster->locale->act['admin']['tooltip04cap'].'\');" onmouseout="return nd();">'.$roster->locale->act['admin']['tooltip04cap'].'</div></td>
            <td class="membersRow2" align="right">'.$roster->locale->act['rows'].': <input name="rg_lpp" type="text" value="'.$addon_cfg['rg_lpp'].'" size="5" maxlength="5" /></td>
            </tr>';
      $html .= '<tr>
            <td class="membersRow1" align="center"><div style="cursor:help;" onmouseover="overlib(\''.$roster->locale->act['admin']['tooltip08'].'\',CAPTION,\''.$roster->locale->act['admin']['tooltip08cap'].'\');" onmouseout="return nd();">'.$roster->locale->act['admin']['tooltip08cap'].'</div></td>
            <td class="membersRow1" align="center"> 
            <input type="radio" class="checkBox" name="rg_dspc" value="1" '.($addon_cfg['rg_dspc'] ? 'checked="checked"' : '' ).' /> '.$roster->locale->act['yes'].' 
            <input type="radio" class="checkBox" name="rg_dspc" value="0" '.(!$addon_cfg['rg_dspc'] ? 'checked="checked"' : '' ).'/> '.$roster->locale->act['no'].' </td>
            </tr>';
      $html .= '<tr>
            <td class="membersRow2" align="center"><div style="cursor:help;" onmouseover="overlib(\''.$roster->locale->act['admin']['tooltip09'].'\',CAPTION,\''.$roster->locale->act['admin']['tooltip09cap'].'\');" onmouseout="return nd();">'.$roster->locale->act['admin']['tooltip09cap'].'</div></td>
            <td class="membersRow2" align="center"> 
            <input type="radio" class="checkBox" name="rg_dscp" value="1" '.($addon_cfg['rg_dscp'] ? 'checked="checked"' : '' ).' /> '.$roster->locale->act['yes'].' 
            <input type="radio" class="checkBox" name="rg_dscp" value="0" '.(!$addon_cfg['rg_dscp'] ? 'checked="checked"' : '' ).'/> '.$roster->locale->act['no'].' </td>
            </tr>'; 
      $html .= '<tr>
            <td class="membersRow1" align="center"><div style="cursor:help;" onmouseover="overlib(\''.$roster->locale->act['admin']['tooltip14'].'\',CAPTION,\''.$roster->locale->act['admin']['tooltip14cap'].'\');" onmouseout="return nd();">'.$roster->locale->act['admin']['tooltip14cap'].'</div></td>
            <td class="membersRow1" align="center"> 
            <input type="radio" class="checkBox" name="rg_u_ovlb" value="1" '.($addon_cfg['rg_u_ovlb'] == 1 ? 'checked="checked"' : '' ).' /> '.$roster->locale->act['yes'].' 
            <input type="radio" class="checkBox" name="rg_u_ovlb" value="0" '.($addon_cfg['rg_u_ovlb'] == 0 ? 'checked="checked"' : '' ).'/> '.$roster->locale->act['no'].' </td>
            </tr>';
      $html .= '<tr>
            <td class="membersRow2" align="center"><div style="cursor:help;" onmouseover="overlib(\''.$roster->locale->act['admin']['tooltip20'].'\',CAPTION,\''.$roster->locale->act['admin']['tooltip20cap'].'\');" onmouseout="return nd();">'.$roster->locale->act['admin']['tooltip20cap'].'</div></td>
            <td class="membersRow2" align="center"> 
            <input type="radio" class="checkBox" name="rg_u_lb" value="1" '.($addon_cfg['rg_u_lb'] == 1 ? 'checked="checked"' : '' ).' /> '.$roster->locale->act['yes'].' 
            <input type="radio" class="checkBox" name="rg_u_lb" value="0" '.($addon_cfg['rg_u_lb'] == 0 ? 'checked="checked"' : '' ).'/> '.$roster->locale->act['no'].' </td>
            </tr>';
            
      $html .= '<tr>
            <td class="membersRow2" align="center" width="150"><div style="cursor:help;" onmouseover="overlib(\''.$roster->locale->act['admin']['tooltip18'].'\',CAPTION,\''.$roster->locale->act['admin']['tooltip18cap'].'\');" onmouseout="return nd();">'.$roster->locale->act['admin']['tooltip18cap'].'</div></td>
            <td class="membersRow2" align="right">'.$functions->createOptionList($ssbordercolor,$addon_cfg['rg_mp_bc'],'rg_mp_bc',0 ).'';
      $html .= '</td></tr>';
      $html .= '</table>'.border('sgreen','end').'';
      $html .= '</div>';


#-[ upload settings section ] ---
      $html .= '<!-- begin Upload settings -->';
      $html .= '<div id="t2" style="display:none;">';
      $html .= ''.border('sgreen','start',''.$roster->locale->act['admin']['uplodconfig'].'').'';
      $html .= '<table width="600" cellspacing="0" cellpadding="0">';
      $html .= '<tr>
            <td class="membersRow1" colspan=2 align=center>'.$roster->locale->act['admin']['rg_version'].' : '.$addon_cfg['rg_version'].'<br>
            '.$roster->locale->act['admin']['sssize'].' : '.$functions->get_size($addon_cfg['rg_ssfolderpath'], $ssfolder).'</td>
            </tr>';
      $html .= '<tr>
            <td class="membersRow2" align="center"><div style="cursor:help;" onmouseover="overlib(\''.$roster->locale->act['admin']['tooltip06'].'\',CAPTION,\''.$roster->locale->act['admin']['tooltip06cap'].'\');" onmouseout="return nd();">'.$roster->locale->act['admin']['tooltip06cap'].'</div></td>
            <td class="membersRow2" align="center"> 
            <input type="radio" class="checkBox" name="rg_dct" value="1" '.($addon_cfg['rg_dct'] ? 'checked="checked"' : '' ).' /> '.$roster->locale->act['yes'].' 
            <input type="radio" class="checkBox" name="rg_dct" value="0" '.(!$addon_cfg['rg_dct'] ? 'checked="checked"' : '' ).'/> '.$roster->locale->act['no'].' </td>
            </tr>';

                  If ($addon_cfg['rg_dul'] == 1){
                        $font = "red";
                  }else{
                        $font = "green";
                  }  
      $html .= '<tr>
            <td class="membersRow1" align="center" Valign="center">
            <div style="cursor:help;" onmouseover="overlib(\''.$roster->locale->act['admin']['tooltip07'].'\',CAPTION,\''.$roster->locale->act['admin']['tooltip07cap'].'\');" onmouseout="return nd();"><font color='.$font.'>'.$roster->locale->act['admin']['tooltip07cap'].'</font></div></td>
            <td class="membersRow1" align="center"> 
            <input type="radio" class="checkBox" name="rg_dul" value="1" '.($addon_cfg['rg_dul'] ? 'checked="checked"' : '' ).' /> '.$roster->locale->act['disable'].' 
            <input type="radio" class="checkBox" name="rg_dul" value="0" '.(!$addon_cfg['rg_dul'] ? 'checked="checked"' : '' ).'/> '.$roster->locale->act['enable'].' </td>
            </tr>';
      $html .= '<tr>
            <td class="membersRow2" align="center" Valign="center">
            <div style="cursor:help;" onmouseover="overlib(\''.$roster->locale->act['admin']['tooltip25'].'\',CAPTION,\''.$roster->locale->act['admin']['tooltip25cap'].'\');" onmouseout="return nd();">'.$roster->locale->act['admin']['tooltip25cap'].'</div></td>
            <td class="membersRow2" align="center"> 
            <input type="radio" class="checkBox" name="rg_upload_win" value="1" '.($addon_cfg['rg_upload_win'] ? 'checked="checked"' : '' ).' /> '.$roster->locale->act['admin']['open'].' 
            <input type="radio" class="checkBox" name="rg_upload_win" value="0" '.(!$addon_cfg['rg_upload_win'] ? 'checked="checked"' : '' ).'/> '.$roster->locale->act['admin']['closed'].' </td>
            </tr>';
      $html .= '<tr>
            <td class="membersRow1" align="center"><div style="cursor:help;" onmouseover="overlib(\''.$roster->locale->act['admin']['tooltip23'].'\',CAPTION,\''.$roster->locale->act['admin']['tooltip23cap'].'\');" onmouseout="return nd();">'.$roster->locale->act['admin']['tooltip23cap'].'</div></td>
            <td class="membersRow1">'.$roster->locale->act['admin']['rg_upload_size'].': <input name="rg_upload_size" type="text" value="'.$addon_cfg['rg_upload_size'].'" size="5" maxlength="5" />
            </td>
            </tr>';

      $html .= '</table>';
      $html .= ''.border('sgreen','end').'';
      $html .= '</div>';




#   Thumbnail comfig
      $html .= '<!-- begin Display settings -->';
      $html .= '<div id="t3" style="display:none;">';
      $html .= ''.border('sgreen','start',''.$roster->locale->act['admin']['thumbconfig'].'').'';
      $html .= '<table width="600" cellspacing="0" cellpadding="0">';
      $html .= '';
      $html .= '<tr>
            <td class="membersRow1" align="center" width="150"><div style="cursor:help;" onmouseover="overlib(\''.$roster->locale->act['admin']['tooltip01'].'\',CAPTION,\''.$roster->locale->act['admin']['tooltip01cap'].'\');" onmouseout="return nd();">'.$roster->locale->act['admin']['tooltip01cap'].'</div></td>
            <td class="membersRow1" align="right">
            '.$roster->locale->act['width'].': <input name="rg_width" type="text" value="'.$addon_cfg['rg_width'].'" size="5" maxlength="5" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            '.$roster->locale->act['height'].': <input name="rg_height" type="text" value="'.$addon_cfg['rg_height'].'" size="5" maxlength="5" /></td>
            </tr>';
      $html .= '<tr>
            <td class="membersRow2" align="center" width="150"><div style="cursor:help;" onmouseover="overlib(\''.$roster->locale->act['admin']['tooltip12'].'\',CAPTION,\''.$roster->locale->act['admin']['tooltip12cap'].'\');" onmouseout="return nd();">'.$roster->locale->act['admin']['tooltip12cap'].'</div></td>
            <td class="membersRow2" align="right"><select name="rg_rating_align">
            <option value="1" '.($addon_cfg['rg_rating_align'] == 1 ? 'selected="selected"' : '' ).'>Top</option>
            <option value="0" '.($addon_cfg['rg_rating_align'] == 0 ? 'selected="selected"' : '' ).'>Bottom</option></select></td>
            </tr>';
      
      $html .= '<tr>
            <td class="membersRow1" align="center" width="150"><div style="cursor:help;" onmouseover="overlib(\''.$roster->locale->act['admin']['tooltip13'].'\',CAPTION,\''.$roster->locale->act['admin']['tooltip13cap'].'\');" onmouseout="return nd();">'.$roster->locale->act['admin']['tooltip13cap'].'</div></td>
            <td class="membersRow1" align="right"><select name="rg_caption_align">
            <option value="1" '.($addon_cfg['rg_caption_align'] == 1 ? 'selected="selected"' : '' ).'>Top</option>
            <option value="0" '.($addon_cfg['rg_caption_align'] == 0 ? 'selected="selected"' : '' ).'>Bottom</option></select></td>
            </tr>';
      
      
      $html .= '<tr>
            <td class="membersRow2" align="center" Valign="center">
            <div style="cursor:help;" onmouseover="overlib(\''.$roster->locale->act['admin']['tooltip15'].'\',CAPTION,\''.$roster->locale->act['admin']['tooltip15cap'].'\');" onmouseout="return nd();">'.$roster->locale->act['admin']['tooltip15cap'].'</div></td>
            <td class="membersRow2" align="center"> 
            <input type="radio" class="checkBox" name="rg_wm_use" value="1" '.($addon_cfg['rg_wm_use'] ? 'checked="checked"' : '' ).' /> '.$roster->locale->act['yes'].' 
            <input type="radio" class="checkBox" name="rg_wm_use" value="0" '.(!$addon_cfg['rg_wm_use'] ? 'checked="checked"' : '' ).'/> '.$roster->locale->act['no'].' </td>
            </tr>';
      $html .= '<tr>
            <td class="membersRow1" align="center" width="150"><div style="cursor:help;" onmouseover="overlib(\''.$roster->locale->act['admin']['tooltip16'].'\',CAPTION,\''.$roster->locale->act['admin']['tooltip16cap'].'\');" onmouseout="return nd();">'.$roster->locale->act['admin']['tooltip16cap'].'</div></td>
            <td class="membersRow1" align="right"><select name="rg_wm_loc">
            <option value="1" '.($addon_cfg['rg_wm_loc'] == 1 ? 'selected="selected"' : '' ).'>Top Left</option>
            <option value="2" '.($addon_cfg['rg_wm_loc'] == 2 ? 'selected="selected"' : '' ).'>Top Right</option>
            <option value="3" '.($addon_cfg['rg_wm_loc'] == 3 ? 'selected="selected"' : '' ).'>Bottom Left</option>
            <option value="4" '.($addon_cfg['rg_wm_loc'] == 4 ? 'selected="selected"' : '' ).'>Bottom Right</option></select></td>
            </tr>';
      $html .= '';
      $html .= '<tr>
            <td class="membersRow2" align="center" width="150"><div style="cursor:help;" onmouseover="overlib(\''.$roster->locale->act['admin']['tooltip17'].'\',CAPTION,\''.$roster->locale->act['admin']['tooltip17cap'].'\');" onmouseout="return nd();">'.$roster->locale->act['admin']['tooltip17cap'].'</div></td>
            <td class="membersRow2" align="right">'.$functions->createOptionList($backgFilesArr,$addon_cfg['rg_wm_file'],'rg_wm_file',2 ).'';
      $html .= '</td></tr>';
      $html .= '<tr>
            <td class="membersRow1" align="center" width="150">'.$functions->createTip( $roster->locale->act['admin']['tooltip19'] , $roster->locale->act['admin']['tooltip19cap'] ).'</td>
            <td class="membersRow1" align="right">'.$functions->createOptionList($ssbordercolor,$addon_cfg['rg_tn_bc'],'rg_tn_bc',0 ).'';
      $html .= '</td>
            </tr>';
      $html .= '</table>';
      $html .= ''.border('sgreen','end').'';
      $html .= '</div>';



# -[ Catagory settings ] --
      $html .= '<!-- begin Display settings -->';
      $html .= '<div id="t4" style="display:none;">';
      $html .= ''.border('sgreen','start',''.$roster->locale->act['admin']['catconfig'].'').'';
      $html .= '<table width="600" cellspacing="0" cellpadding="0">';
      $html .= '<tr>
            <td class="membersRow2"><div style="cursor:help;" onmouseover="overlib(\''.$roster->locale->act['admin']['tooltip10'].'\',CAPTION,\''.$roster->locale->act['admin']['tooltip10cap'].'\');" onmouseout="return nd();">'.$roster->locale->act['admin']['tooltip10cap'].'</div></td>
            <td class="membersRow2">'.$roster->locale->act['amount'].': <input name="rg_catcount" type="text" value="'.$addon_cfg['rg_catcount'].'" size="5" maxlength="5" /></td>
            <td class="membersRow2">Cat Status</td>
            <td class="membersRow2">Access</td>
            </tr>';
      //$row6 = 1;
      for($n=1;$n<=10;$n++)
            {
             if ($addon_cfg['rg_cat'.$n.'en'] == 0){ 
            $html .= '<tr>
                  <td class="membersRow1"><div style="cursor:help;" onmouseover="overlib(\''.$roster->locale->act['admin']['tooltip11'].'\',CAPTION,\''.$roster->locale->act['admin']['tooltip11cap'].' '.$n.'\');" onmouseout="return nd();"><font color="red">'.$roster->locale->act['admin']['tooltip11cap'].' '.$n.'</font></div></a></td>
                  <td class="membersRow1"><input name="rg_cat'.$n.'" type="text" value="'.$addon_cfg['rg_cat'.$n].'" size="20" maxlength="150" /></td>
                  <td class="membersRow1">
                  Enable <input type="radio" class="checkBox" name="rg_cat'.$n.'en" value="1" '.($addon_cfg['rg_cat'.$n.'en'] ? 'checked="checked"' : '' ).' /> 
                  <font color="red">Disable</font> <input type="radio" class="checkBox" name="rg_cat'.$n.'en" value="0" '.(!$addon_cfg['rg_cat'.$n.'en'] ? 'checked="checked"' : '' ).'/> 
                  </td>
                  <td class="membersRow1">
'.$functions->createOptionList(array('Public' => '0','Guild' => '1','Officer' => '2','Overseer' => '3','Admin' => '4'),$addon_cfg['cat'.$n.''],'cat'.$n.'',0 ).'
</td>
                  </tr>
                  <tr>
                  <td colspan="4" class="divider_sgreen"><img src="img/pixel.gif" width="1" height="1" alt="" /></td>
                  </tr>';
            }
            else
            { 
            $html .= "\n\n".'<tr>
                  <td class="membersRow1"><div style="cursor:help;" onmouseover="overlib(\''.$roster->locale->act['admin']['tooltip11'].'\',CAPTION,\''.$roster->locale->act['admin']['tooltip11cap'].' '.$n.'\');" onmouseout="return nd();">'.$roster->locale->act['admin']['tooltip11cap'].' '.$n.'</div></a></td>
                  <td class="membersRow1"><input name="rg_cat'.$n.'" type="text" value="'.$addon_cfg['rg_cat'.$n].'" size="20" maxlength="150" /></td>
                  <td class="membersRow1">
                  Enable <input type="radio" class="checkBox" name="rg_cat'.$n.'en" value="1" '.($addon_cfg['rg_cat'.$n.'en'] ? 'checked="checked"' : '' ).' /> 
                  Disable <input type="radio" class="checkBox" name="rg_cat'.$n.'en" value="0" '.(!$addon_cfg['rg_cat'.$n.'en'] ? 'checked="checked"' : '' ).'/> 
                  </td>
                  <td class="membersRow1">
'.$roster->auth->rosterAccess(array('name' => 'cat'.$n.'', 'value' => $addon_cfg['config_cat'.$n.''])).'
</td>
                  </tr>
                  <tr>
                  <td colspan="4" class="divider_sgreen"><img src="img/pixel.gif" width="1" height="1" alt="" /></td>
                  </tr>';
            }
  //$functions->createOptionList(array('Public' => '0','Guild' => '1','Officer' => '2','Overseer' => '3','Admin' => '4'),$addon['config']['cat'.$n.''],'cat'.$n.'',0 )

  
  
            }  
      $html .= '</table>';
      $html .= ''.border('sgreen','end').'';
      $html .= '</div>';
ob_start();
include_once( $addon['dir'].'inc/body_votesetup.tpl' );
$voting = ob_get_contents();
ob_end_clean();
$html .= $voting.'</form>';


ob_start();
include_once( $addon['dir'].'inc/body_apimage.tpl' );
$apimages = ob_get_contents();
ob_end_clean();
$html .= $apimages;

ob_start();
include_once( $addon['dir'].'inc/body_uapimage.tpl' );
$uapimages = ob_get_contents();
ob_end_clean();
$html .= $uapimages;

ob_start();
include_once( $addon['dir'].'inc/uploadimg.tpl' );
$uploadimg = ob_get_contents();
ob_end_clean();



ob_start();
include_once( $addon['dir'].'inc/status.tpl' );
$stat = ob_get_contents();
ob_end_clean();
$html .= $stat;



echo '<link rel="stylesheet" type="text/css" href="'.$addon['dir'].'style.css" />';
$menu .= $uploadimg;
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
<input type=\"hidden\" name=\"ss_op\" value=\"settings\" />\n<br /><br />\n
".$html.'
</td>
</tr>
</table>
';
echo '
<script type="text/javascript">
var rg_menu=new tabcontent(\'rg_menu\');
rg_menu.init();
</script>

<script type="text/javascript">
var rg_menu1=new tabcontent(\'rg_menu1\');
rg_menu1.init();
</script>
<script type="text/javascript">
var rg_menu2=new tabcontent(\'rg_menu2\');
rg_menu2.init();
</script>
<script type="text/javascript">
var rg_menu3=new tabcontent(\'rg_menu3\');
rg_menu3.init();
</script>


';


}
