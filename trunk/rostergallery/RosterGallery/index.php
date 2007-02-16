<?php
/******************************
 * $Id: index.php,v 1.7.0 2006/06/14 09:16:24 Ulminia Exp $
 ******************************/
require_once('functions.php');

$functions = new ssconfig;

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}
/**
 * Set PHP error reporting
 */
error_reporting(E_ALL ^ E_NOTICE);

echo '

<!-- Begin Java Link -->
<script type="text/javascript" language="JavaScript">
<!--
	initializetabcontent("siggen_menu")
//-->
</script>';


//echo $functions->sql_debug;


$addon_cfgn = 'addon_rg';
                  /**
                   * Get the current config values from the roster config table
                   */
                  $sql = "SELECT `config_name`, `config_value` FROM `".ROSTER_CONFIGTABLE."` WHERE `config_type` = '".$addon_cfgn."' ORDER BY `id` ASC;";
                  $results = $wowdb->query($sql);

                  if( !$results || $wowdb->num_rows($results) == 0 )
                        {
	                       $install = 1;
                        }

                  /**
                   * Fill the config array with values
                   */
                        while( $row = $wowdb->fetch_assoc($results) )
                              {
	                             $addon_cfg[$row['config_name']] = stripslashes($row['config_value']);
                              }
                        $wowdb->free_result($results);

                  // end config values
                  
$password_message = '';
$script_filename = 'addon.php?roster_addon_name=RosterGallery';
//$functions->getconfig($script_filename);
// ----[ Check log-in ]-------------------------------------
if( isset( $_GET['logout'] ) && $_GET['logout'] == 'logout' )
{
	if( isset($_COOKIE['roster_pass']) )
		setcookie( 'roster_pass','',time()-86400 );
	if( isset($_COOKIE['roster_conf_tab']) )
		setcookie( 'roster_conf_tab','',time()-86400 );
	$password_message = '<span style="font-size:11px;color:red;">Logged Out</span><br />';
}
else
{
	if( !isset($_COOKIE['roster_pass']) )
	{
		if( isset($_POST['pass_word']) )
		{
			if( md5($_POST['pass_word']) == $roster_conf['roster_upd_pw'] )
			{
				setcookie( 'roster_pass',$roster_conf['roster_upd_pw'] );
				$password_message = '<span style="font-size:10px;color:red;">Logged in:</span><span style="font-size:10px;color:#FFFFFF"> [<a href="'.$script_filename.'&logout=logout">Logout</a>]</span><br />';
				$allow_login = 1;
			}
			else
			{
				$password_message = '<span style="font-size:11px;color:red;">Wrong password</span><br />';
			}
		}
	}
	else
	{
		$BigCookie = $_COOKIE['roster_pass'];

		if( $BigCookie == $roster_conf['roster_upd_pw'] )
		{
			$password_message = '<span style="font-size:10px;color:red;">Logged in:</span><span style="font-size:10px;color:#FFFFFF"> [<a href="'.$script_filename.'&logout=logout">Logout</a>]</span><br />';
			$allow_login = 1;
		}
		else
		{
			setcookie( 'roster_pass','',time()-86400 );
		}
	}
}

$nothing = 1;
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
                  foreach ($_POST['deletess'] as $delete) {
      			$functions->deletesc( $delete );
		      }//$functions->deletesc( $_POST['deletess'] );
            break;

            case 'approve';
                  if ($_POST['approve']){
        	         foreach ($_POST['approve'] as $approve) {
				$functions->approvesc( $approve );
        	         }
                  }
                  if ($_POST['delete']){
            	     foreach ($_POST['delete'] as $delete) {
                              $functions->deletesc( $delete );
			      }
                  }

            break;
            
            case 'vote';
                  $functions->vote( $_POST['id'], $_POST['vote'] );
            break;

            case 'upload';
		    $functions->uploadImage( $_POST['dir'], $_FILES['userfile']['name'], addslashes($_POST['caption']), $_POST['catagory'], $_POST['desc'] ,$addon_cfg['rg_width'] ,$addon_cfg['rg_height'] ,$addon_cfg['rg_wm_loc'],$addon_cfg['rg_wm_use'],$addon_cfg['rg_wm_file'],$addon_cfg['rg_wm_dir'] );
            break;
            
            case 'upload_wm';
                  $functions->uploadwmImage( RG_DIR.$addon_cfg['rg_wm_dir'], $_FILES['wmfile']['name'] );
            break;

		default:
		break;
	}
}
// ----[ End Decide what to do next ]-----------------------


         

if( $_GET['install'] == 'install' )
{ ///echo "install active ";
      if ($_GET['table'] == 0){
      
            $functions->installDb($script_filename);
      }
      
      if ($_GET['tableupgrade'] == 0 ){
      
            $functions->upgradetable( $db_table );
            
      }
      
      if ($_GET['folder'] == 0){
            
            $functions->makeDir('screenshots/');
            
      }
      
      if ( $_GET['folderstinstalled'] == 0 ){
      
            $functions->makesubDir( $ssfolder );
      
      }
      
      if ($_GET['config'] == 0){
      
            $functions->installcfg($script_filename, $defaults);
      
      }
      
      if ($_GET['upconfig'] == 1){
      
            $functions->upgradedb($script_filename, $defaults, $addon_conf['ss']['version'] );
      }
      
      if ($_GET['version'] == 0 && $_GET['config'] == 1){
      
            $functions->upgradedb($script_filename, $defaults ,$addon_conf['ss']['version']);
      
      }
      
$functions->setinstallMessage("<br>Install was successfull...<br>Click <a href=\"".$script_filename."\">HERE</a> to continue\n");
print border('sblue','start','Install Messages');
echo $functions->getinstallMessage();
print border('sblue','end');
	return;
}

if( $_GET['uninstall'] == 'Uninstall' && $allow_login)
{

if( isset($_COOKIE['roster_pass']) )
		setcookie( 'roster_pass','',time()-86400 );
	if( isset($_COOKIE['roster_conf_tab']) )
		setcookie( 'roster_conf_tab','',time()-86400 );
		
      $functions->uninstall($script_filename, $defaults, $ssfolder);
      return;
}

// -- [ Begin the new way of checking and install or upgrade the addon ]-- 
#
#     Where 1 = no changes needed
#     And 0 means changes need to be done
#

$nothing = 0;

$tableinstalled = null;
$tableupgrade = 1;
$configinstalled = null;
$configupgrade = null;
$folderinstalled = null;
$versioninstalled = null;
$folderstinstalled = null;
$todoinstall = "";

// check to see if table installed	                 
if ( $functions->checkDb( ROSTER_SCREENTABLE ) ){
$tableinstalled = 1;
}else{
$tableinstalled = 0;
}

// check to see if table exists 

if ( $functions->tableexists() == 1 )

      {

            // check to see if the table need to be upgraded
            if ( $functions->tablecompare( $db_table ) ){
      echo "bob";
                  $tableupgrade = 0;
      
            }else{

                  $tableupgrade = 1;

            }
      
      }


// check to see if config is installed
if ( !$functions->config( $defaults ) ){
$configinstalled = 1;     
}
else 
{
$configinstalled = 0;
}

// check to see if the config needs to be upgraded
if ( $functions->configuptest( $defaults ) == 2 )
{
//echo "Config needs to be upgraded";
$configupgrade = 1;
} else {
$configupgrade = 0;
//echo "config is ok";
}
// check and see if the version is equil
//echo $addon_cfg['rg_version'].$addon_conf['ss']['version'];
if ( !$functions->checkver( $addon_cfg['rg_version'], $addon_conf['ss']['version'] ) >= 1){
$versioninstalled = 1;
}
else
{
$versioninstalled = 0;
}

// check and see if the screenshots folder exists
if( $functions->checkDir( $addon_cfg['rg_ssfolder'] ) )
{
$folderinstalled = 1;
}
else
{
$folderinstalled = 0;
}


if( $functions->checkDirst( $ssfolder ) < 10 )
{
$folderstinstalled = 0;
}
else
{
$folderstinstalled = 1;
}
/*
echo '
Table installed '.$tableinstalled.'<br>
config installed '.$configinstalled.'<br>
folder found '.$folderinstalled.'<br>
versions match '.$versioninstalled.' <br>               
';
*/

if ($tableinstalled == 0){
$todoinstall .= "Install Table<br>";
}
if ($tableupgrade == 0){
$todoinstall .= "Upgrade Database Table<br>";
}
if ($configinstalled == 0){
$todoinstall .= "Incert Config<br>";
}
if ($configupgrade == 1){
$todoinstall .= "Upgrade Config<br>";
}
if ($folderinstalled == 0){
$todoinstall .= "Create Folder<br>";
}
if ($folderstinstalled == 0){
$todoinstall .= "Create Sub-Folder's<br>";
}
if ($versioninstalled == 0 && $configinstalled == 1){
$todoinstall .= "Update Version<br>Update Config<br>";
}


//$tableinstalled, $configinstalled, $folderinstalled, $versioninstalled

if ( $tableinstalled == 0 OR $configinstalled == 0 OR $folderinstalled == 0 OR $folderstinstalled == 0 OR $versioninstalled == 0 OR $configupgrade == 1 OR $tableupgrade == 0){

      $functions->chksett($addon_cfg['rg_version'], $addon_conf['ss']['version'], $script_filename, $tableinstalled, $configinstalled, $folderinstalled, $folderstinstalled, $versioninstalled, $configupgrade, $tableupgrade, $todoinstall);
      $nothing = 1;
}
  
/*
this will check and see if the screenshots folder exisis and is wrightable
*/
if( !$functions->checkDir( $addon_cfg['rg_ssfolder'] ) )
{
	$functions->setMessage("Screenshot folder doesn't exist");
	$allow_upload = false;
}
elseif( !$functions->checkDir( $addon_cfg['rg_ssfolder'],1 ) )
{
	$functions->setMessage("Custom Images folder isn't writable");
	$allow_upload = false;
} else {
$allow_upload = TRUE;
}

// just an array for future use
$pross_ign = array(
	'config_name',
	'gi_op',
);
                 
$id = $functions->getvars( 'id' );
$alogin = $functions->getvars( 'alogin' );
if ($alogin == 1){
echo '<br>'.$passbox;
}
else if ($id){


$sql = "SELECT * FROM `".ROSTER_SCREENTABLE."` WHERE `id` = '".$id."'";
$result = $wowdb->query($sql) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
$row = $wowdb->fetch_array($result);
if ($row['rateing'] != 0 && $row['votes'] != 0){
$rank2 = ($row['rateing'] / $row['votes']);
$rank = number_format($rank2, 1, '.', '');
}else{
$rank = "No Votes";
}
print border('sgreen','start',$row['caption'].' Current Rating '.$rank);
echo '

<form method="post" action="'.$script_filename.'" enctype="multipart/form-data" onsubmit="submitonce(this)">
<table cellspacing="0" cellpadding="0" border="0">
<tr>
<td>';
echo '<img src="screenshots/'.$row['catagory'].'/'.$row['file'].'.'.$row['ext'].'" ></a><br>';
echo '
</td>
</tr>
  <tr>
    <td class="simpleborderbot sgreenborderbot"></td>
  </tr>
<tr>
<td>
<select class="sc_select" name="vote"><option value="" selected="selected">--None--</option>';

     for ( $k='1';$k<='10';$k++ )
		{
		echo "<option value=\"".$k."\" >".$k."</option>";
		}
	  echo '</select>

        <input type="hidden" name="ss_op" value="vote" />
        <input type="hidden" name="id" value="'.$row['id'].'" />
          <input type="submit" value="Vote Now!" name="votenow" /></td>
      </tr>
</td>
</tr>
';
echo '</table></form>';
print border('sgreen','end');

}
else
{
                  
$colx = $addon_cfg['rg_ipl'];
$rowx = $addon_cfg['rg_lpp'];                  
                  
// example connect
$server_name_escape = $wowdb->escape($roster_conf['server_name']);
$guild_name_escape = $wowdb->escape($roster_conf['guild_name']);
$query = "SELECT `guild_id`, `guild_name`, DATE_FORMAT(`update_time`, '".$timeformat[$roster_conf['roster_lang']]."') FROM `".ROSTER_GUILDTABLE."` WHERE `guild_name` = '$guild_name_escape' AND `server` = '$server_name_escape'";
$result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
if ($row = $wowdb->fetch_array($result))
{
	$guildId = $row[0];
	$guildname = $row[1];
	$updateTime = $row[2];
}

if ($roster_conf['sqldebug'])
{
	print "<!-- $query -->\n";
}

$row = 0;

$x = 0;
$html = '';
/*
this defins the limits on the screen shot query if more the the page aloted images are pressent
*/
//$min = $HTTP_GET_VARS['min'];
//$max = $HTTP_GET_VARS['max'];
$min = $functions->getvars( 'min' );
$max = $functions->getvars( 'max' );

$c = $functions->getvars( 'c' );

//echo $min;
if ($min == ''){
$min = '0';
}
if ($max == ''){
$max = $addon_cfg['rg_ipp'];
}
//echo $total."<br>";
if (!$allow_login ){
if ($functions->getMessage() != ''){
print border('sblue','start','Messages');
echo $functions->getMessage();
print border('sblue','end');
}
}
//while ($row = $wowdb->fetch_array($result2)){

if( !$allow_login && $nothing == '0' )
{

print '<br />';
print border($addon_cfg['rg_mp_bc'],'start');

    echo '<table class="main_roster_menu" cellspacing="0" cellpadding="2" width="650">';
    echo '<tr>
    <td colspan="3" align="center" valign="top" class="header">
      <span style="font-size:18px;">'.$wordings[$roster_conf['roster_lang']]['ss']['name'].' '.$wordings[$roster_conf['roster_lang']]['ss']['admin']['version'].' '.$addon_cfg['rg_version'].'</a></span>     <span style="font-size:10px;color:#FFFFFF"> [<a href="'.$script_filename.'&alogin=1">Admin</a>]<br />
</span></td>
  </tr>
  <tr>
    <td colspan="3" class="simpleborderbot '.$addon_cfg['rg_mp_bc'].'borderbot"></td>
  </tr>';
  if ($addon_cfg['rg_dspc'] == 1){
  echo '<tr>
    <td colspan="3" align="center" valign="top" class="header">';

    echo '<a href="'.$script_filename.'&c=">'.$wordings[$roster_conf['roster_lang']]['ss']['all'].'</a> - ';
    for($count = 0; $count < sizeof($catagory); $count++) {
$count=$count;
}
	
		        for($n=1;$n<=$addon_cfg['rg_catcount'];$n++)
{
$NN == 0;
$NN = $n;
if ($addon_cfg['rg_cat'.$n.'en'] == 1){
echo '<a href="'.$script_filename.'&c='.$addon_cfg['rg_cat'.$n.'id'].'">'.$addon_cfg['rg_cat'.$n].'</a>';
}
if ($n <= ($addon_cfg['rg_catcount'] - 1 && $addon_cfg['rg_cat'.($NN + 1).'en'] != 0)){
echo " - ";

}
}

    echo '</td>
  </tr>
  <tr>
    <td colspan="3" class="simpleborderbot '.$addon_cfg['rg_mp_bc'].'borderbot"></td>
  </tr>';
}

  // begin questy of pulling info from the roster gallory data abse
if ($c){
$query2 = "SELECT * FROM `".ROSTER_SCREENTABLE."` WHERE `approve` = 'yes' AND `catagory` = '".$c."' ORDER BY `id` DESC LIMIT $min , $max";
}else{
$query2 = "SELECT * FROM `".ROSTER_SCREENTABLE."` WHERE `approve` = 'yes' ORDER BY `id` DESC LIMIT $min , $max";
}
$result2 = $wowdb->query($query2) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query2);
$total = mysql_num_rows($result2);

// this will get the total number of images in the database

if ($c){
$queryt= "SELECT * FROM `".ROSTER_SCREENTABLE."` WHERE `approve` = 'yes' AND `catagory` = '".$c."'";
}else{
$queryt = "SELECT * FROM `".ROSTER_SCREENTABLE."` WHERE `approve` = 'yes'";
}
$resultt = $wowdb->query($queryt) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$queryt);
$totalimg = mysql_num_rows($resultt);

  $rowe = '0';
  $col = '0';
  $t = 0;
while ($row = $wowdb->fetch_array($result2)){
  if ($col == '0'){
  echo '<tr>';
  }
  $caption = '';
  $col++;
    echo '<td align="left" width="215">';
    if ($row['rateing'] != '')
    {
      $rating = $wordings[$roster_conf['roster_lang']]['ss']['rating'].': '.$row['rateing'].'';
    } else {
    $rating = ' '.$wordings[$roster_conf['roster_lang']]['ss']['norating'];
    }
      if ($addon_cfg['rg_dct'] == 1){
            if ($addon_cfg['rg_caption_align'] == 1){
                  $caption .= $row['caption'];
            }
      }
      if ($addon_cfg['rg_drt'] == 1){      
            if ($addon_cfg['rg_rating_align'] == 1){
                  $caption .= ' '.$rating;
            }
      }
     if ($caption != ''){ 
      print border($addon_cfg['rg_tn_bc'],'start',$caption);
    }else{
    print border($addon_cfg['rg_tn_bc'],'start');
    }
echo '<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
<td>';

      if ($addon_cfg['rg_u_ovlb'] == 1){
      
            echo '<div style="cursor:help;" onmouseover="overlib(\''.$row['disc'].'\',CAPTION,\''.$row['caption'].' '.$rating.'\');" onmouseout="return nd();"><a href="'.$script_filename.'&id='.$row['id'].'\" ><img src="screenshots/thumbs/'.$row['file'].'-thumb.'.$row['ext'].'" width="'.$addon_cfg['rg_width'].'" height="'.$addon_cfg['rg_height'].'"></a></div>';
 
      }
      else if ($row['desc'] != '')
      {
            echo '<div style="cursor:help;" onmouseover="overlib(\''.$row['disc'].'\',CAPTION,\'\');" onmouseout="return nd();"><a href="'.$script_filename.'&id='.$row['id'].'\" ><img src="screenshots/thumbs/'.$row['file'].'-thumb.'.$row['ext'].'" width="'.$addon_cfg['rg_width'].'" height="'.$addon_cfg['rg_height'].'"></a></div>';
      } 
      else
      {
            echo "<a href=\"".$script_filename."&id=".$row['id']."\" alt=\"\"><img src=\"screenshots/thumbs/".$row['file'].'-thumb.'.$row['ext'].'" width="'.$addon_cfg['rg_width'].'" height="'.$addon_cfg['rg_height'].'"></a>';
      }

echo '</td></tr>';

$caption = '';
if ($addon_cfg['rg_dct'] == 1){
      if ($addon_cfg['rg_caption_align'] == 0){
            $caption .= $row['caption'];
      }
}
if ($addon_cfg['rg_drt'] == 1){      
      if ($addon_cfg['rg_rating_align'] == 0){
            $caption .= ' '.$rating;
      }
}
if ($caption != ''){
echo '<tr>
   <td class="simplebordertop '.$addon_cfg['rg_tn_bc'].'bordertop"></td>
  </tr>
  <tr>
    <th class="simpleborderheader '.$addon_cfg['rg_tn_bc'].'borderheader" align="center" valign="top">'.$caption.'</th>
  </tr>';
}      

echo '</table>';
    print border($addon_cfg['rg_tn_bc'],'end');
    echo '</td>';
  if ($col == '3'){
  $rowe++;
  $col='0'; //echo $rowe;
  echo '</tr>';
  }

  if ( $rowe == '4'){
  $maxe = ($max + $addon_cfg['rg_ipp']);
  $mine = ($min + $addon_cfg['rg_ipp']);
  }
  if ($min == '0'){
  $mina = '0';
  $maxa = $addon_cfg['rg_ipp'];
  }
  if ($min != '0'){
  $mina = ($min - $addon_cfg['rg_ipp']);
  $maxa = ($max - $addon_cfg['rg_ipp']);
  }
  if($c){
  $cate = "&c='.$c.'";
  }else{
  $cate = '';
  }

  if ($t == $total){
  $timage = $t;
  break;
  
  }
$t++;
  }

      if ($min != '' && $max != '' && $total < $totalimg)
      {
  echo'<tr>
    <td colspan="3" class="simpleborderbot syellowborderbot"></td>
  </tr>
  <tr>
  <td><a href="'.$script_filename.'&max='.$maxa.'&min='.$mina.''.$cate.'">'.$wordings[$roster_conf['roster_lang']]['ss']['previous'].''.$timage.'</a></td>
  <td></td>
  <td><a href="'.$script_filename.'&max='.$maxe.'&min='.$mine.''.$cate.'">'.$wordings[$roster_conf['roster_lang']]['ss']['next'].'</a></td>
  </tr>
  ';

  }
  
    echo '</tr>';

    echo '</table>';

print border($addon_cfg['rg_mp_bc'],'end');


print '<br />';

If ($addon_cfg['rg_dul'] == 0 && $allow_upload){
echo '
<form method="post" action="'.$script_filename.'" enctype="multipart/form-data" onsubmit="submitonce(this)">
'.border('sgray','start').'
    <table width="198" class="ss_table" cellspacing="0" cellpadding="2">
      <tr>
        <td class="ss_row_right1" align="left">'.$wordings[$roster_conf['roster_lang']]['ss']['imgloc'].':<br />
          <input class="inputbox" name="userfile" type="file" /></td>
      </tr>
      <tr>
        <td class="ss_row_right1" align="left">'.$wordings[$roster_conf['roster_lang']]['ss']['capt'].':<br />
          <input class="inputbox" name="caption" type="text" size="40" /></td>
      </tr>
            <tr>
        <td class="ss_row_right1" align="left">'.$wordings[$roster_conf['roster_lang']]['ss']['desc'].':<br />
          <input class="inputbox" name="desc" type="text" size="40" /></td>
      </tr>
      <tr>
        <td class="ss_row_right2" align="left">'.$wordings[$roster_conf['roster_lang']]['ss']['cat'].':<br />
        

        <select class="sc_select" name="catagory">';

        for($n=1;$n<=$addon_cfg['rg_catcount'];$n++)
{
if ($addon_cfg['rg_cat'.$n.'en'] == 1){
echo "<option value=\"".$addon_cfg['rg_cat'.$n.'id']."\" >".$addon_cfg['rg_cat'.$n]."</option>\n";

}
}

/*
      foreach( $catagory as $name )
		{
		echo "<option value=\"".$name."\" >".$name."</option>";
		}
		*/
	  echo '</select></td>
	</tr>
      <tr>
        <td class="ss_row_right1" align="center">
        <input type="hidden" name="ss_op" value="upload" />
        <input type="hidden" name="dir" value="screenshots" />
          <input type="submit" value="'.$wordings[$roster_conf['roster_lang']]['ss']['upimg'].'" name="fileupload" /></td>
      </tr>
    </table>
'.border('sgray','end').'
  </form>';
  }
  

}
if ($allow_login ){


if( !$functions->checkDir( $addon_cfg['rg_ssfolder'] ) )
{
	$functions->setMessage("Screenshot folder doesn't exist<br />It is required for users to uplaod imaged<br />Click <a href=\"$script_filename&amp;make_dir=user\">HERE</a> to try to create [<span class=\"green\">".$addon_cfg['rg_ssfolder']."</span>]");
	$allow_upload = false;
}
elseif( !$functions->checkDir( $addon_cfg['rg_ssfolder'],1 ) )
{
	$functions->setMessage("Custom Images folder isn't writable<br />Click <a href=\"$script_filename&amp;make_dir=chmoduser\">HERE</a> to try to chmod [<span class=\"green\">".$addon_cfg['rg_ssfolder']."</span>]");
	$allow_upload = false;
} else {
$allow_upload = TRUE;
}

/**
                   * Get the current config values from the roster config table
                   */
                  $sql = "SELECT `config_name`, `config_value` FROM `".ROSTER_CONFIGTABLE."` WHERE `config_type` = '".$addon_cfgn."' ORDER BY `id` ASC;";
                  $results = $wowdb->query($sql);

                  if( !$results || $wowdb->num_rows($results) == 0 )
                        {
	                       $install = 1;
                        }

                  /**
                   * Fill the config array with values
                   */
                        while( $row = $wowdb->fetch_assoc($results) )
                              {
	                             $addon_cfg[$row['config_name']] = stripslashes($row['config_value']);
                              }
                        $wowdb->free_result($results);

                  // end config values
                  

$query2 = "SELECT * FROM `".ROSTER_SCREENTABLE."` WHERE `approve` = '' ORDER BY 'order' DESC";
$result2 = $wowdb->query($query2) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query2);
$tnapproved = $wowdb->num_rows($result2);


$backgFilesArr = $functions->listFiles( RG_DIR.$addon_cfg['rg_wm_dir'],array('png','jpeg','jpg') );
                  
$messages = $functions->getMessage();
if( !empty($messages) )
{
	$messages .= '<br />';
}
$x = 1;
$msg = border('sblue','start',$wordings[$roster_conf['roster_lang']]['ss']['admin']['messages']).'<table width="500"><tr><td width="500" class="ss_row2">';
$msg .= $password_message.$messages;
$msg .= '<br>'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['configurationgreeting'];
$msg .= '</td></tr></table>';
$msg .= border('sblue','end').'<br>';


$menu = '
<!-- Begin Config Menu -->
'.border('sgray','start','Config Menu').'
<div style="width:200px;">
  <ul id="siggen_menu" class="tab_menu">'."\n";
$first_tab = ' class="selected"';
$menu .= '<li class="selected">
                  <a href="#" rel="t1">'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['dispconfig'].'</a></li>';
$menu .= '    <li><a href="#" rel="t2">'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['uplodconfig'].'</a></li>'."\n";
$menu .= '    <li><a href="#" rel="t3">'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['thumbconfig'].'</a></li>'."\n";
$menu .= '    <li><a href="#" rel="t4">'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['catconfig'].'</a></li>'."\n";
$menu .= '    <li><a href="#" rel="t5">'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['apconfig'].'</a></li>'."\n";
$menu .= '    <li><a href="#" rel="t6">'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['unapconfig'].'</a></li>'."\n";
$menu .='
</ul>

</div><br>
<a href="'.$script_filename.'&uninstall=Uninstall">'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['uninstall'].'</a><br>

'.border('sgray','end');



//echo $menu;
$html = '<!-- begin page content -->';

$html .= '<!-- begin Display settings -->';
$html .= '<div id="t1" style="display:none">';
$html .= ''.border('sgreen','start',''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['dispconfig'].'').'';
$html .= '<table width="600">';
$html .= '';
$html .= '<tr>
            <td class="ss_row2" align="center"><div style="cursor:help;" onmouseover="overlib(\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip02'].'\',CAPTION,\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip02cap'].'\');" onmouseout="return nd();">'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip02cap'].'</div></td>
            <td class="ss_row2" align="right">
            '.$wordings[$roster_conf['roster_lang']]['ss']['amount'].': <input name="rg_ipp" type="text" value="'.$addon_cfg['rg_ipp'].'" size="5" maxlength="5" /></td>
      </tr>';
$html .= '<tr>
            <td class="ss_row1" align="center"><div style="cursor:help;" onmouseover="overlib(\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip03'].'\',CAPTION,\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip03cap'].'\');" onmouseout="return nd();">'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip03cap'].'</div></td>
            <td class="ss_row1" align="right">
            '.$wordings[$roster_conf['roster_lang']]['ss']['amount'].': <input name="rg_ipl" type="text" value="'.$addon_cfg['rg_ipl'].'" size="5" maxlength="5" /></td>
      </tr>';
$html .= '<tr>
            <td class="ss_row2" align="center"><div style="cursor:help;" onmouseover="overlib(\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip04'].'\',CAPTION,\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip04cap'].'\');" onmouseout="return nd();">'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip04cap'].'</div></td>
            <td class="ss_row2" align="right">'.$wordings[$roster_conf['roster_lang']]['ss']['rows'].': <input name="rg_lpp" type="text" value="'.$addon_cfg['rg_lpp'].'" size="5" maxlength="5" /></td>
      </tr>';
$html .= '<tr>
            <td class="ss_row2" align="center"><div style="cursor:help;" onmouseover="overlib(\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip08'].'\',CAPTION,\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip08cap'].'\');" onmouseout="return nd();">'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip08cap'].'</div></td>
            <td class="ss_row2" align="center"> 
<input type="radio" class="checkBox" name="rg_dspc" value="1" '.($addon_cfg['rg_dspc'] ? 'checked="checked"' : '' ).' /> '.$wordings[$roster_conf['roster_lang']]['ss']['yes'].' 
<input type="radio" class="checkBox" name="rg_dspc" value="0" '.(!$addon_cfg['rg_dspc'] ? 'checked="checked"' : '' ).'/> '.$wordings[$roster_conf['roster_lang']]['ss']['no'].' </td>
      </tr>';
$html .= '<tr>
            <td class="ss_row2" align="center"><div style="cursor:help;" onmouseover="overlib(\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip09'].'\',CAPTION,\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip09cap'].'\');" onmouseout="return nd();">'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip09cap'].'</div></td>
            <td class="ss_row2" align="center"> 
<input type="radio" class="checkBox" name="rg_dscp" value="1" '.($addon_cfg['rg_dscp'] ? 'checked="checked"' : '' ).' /> '.$wordings[$roster_conf['roster_lang']]['ss']['yes'].' 
<input type="radio" class="checkBox" name="rg_dscp" value="0" '.(!$addon_cfg['rg_dscp'] ? 'checked="checked"' : '' ).'/> '.$wordings[$roster_conf['roster_lang']]['ss']['no'].' </td>
      </tr>'; 
$html .= '<tr>
            <td class="ss_row2" align="center"><div style="cursor:help;" onmouseover="overlib(\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip14'].'\',CAPTION,\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip14cap'].'\');" onmouseout="return nd();">'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip14cap'].'</div></td>
            <td class="ss_row2" align="center"> 
<input type="radio" class="checkBox" name="rg_u_ovlb" value="1" '.($addon_cfg['rg_u_ovlb'] == 1 ? 'checked="checked"' : '' ).' /> '.$wordings[$roster_conf['roster_lang']]['ss']['yes'].' 
<input type="radio" class="checkBox" name="rg_u_ovlb" value="0" '.($addon_cfg['rg_u_ovlb'] == 0 ? 'checked="checked"' : '' ).'/> '.$wordings[$roster_conf['roster_lang']]['ss']['no'].' </td>
      </tr>';
$html .= '';
$html .= '<tr>
            <td class="ss_row1" align="center" width="150"><div style="cursor:help;" onmouseover="overlib(\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip18'].'\',CAPTION,\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip18cap'].'\');" onmouseout="return nd();">'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip18cap'].'</div></td>
            <td class="ss_row1" align="right">'.$functions->createOptionList($ssbordercolor,$addon_cfg['rg_mp_bc'],'rg_mp_bc',0 ).'';
$html .= '</td>
      </tr>';
      
$html .= '';
$html .= '';
$html .= '</table>'.border('sgreen','end').'';
$html .= '</div>';

$html .= '<!-- begin Display settings -->';
$html .= '<div id="t2" style="display:none;">';
$html .= ''.border('sgreen','start',''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['uplodconfig'].'').'';
$html .= '<table width="600">';
$html .= '<tr>
            <td class="ss_row1" colspan=2 align=center>'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['version'].' : '.$addon_cfg['rg_version'].'<br>
             '.$wordings[$roster_conf['roster_lang']]['ss']['admin']['sssize'].' : '.$functions->get_size($ssfolder).'</td>
      </tr>';
$html .= '<tr>
            <td class="ss_row2" align="center"><div style="cursor:help;" onmouseover="overlib(\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip06'].'\',CAPTION,\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip06cap'].'\');" onmouseout="return nd();">'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip06cap'].'</div></td>
            <td class="ss_row2" align="center"> 
<input type="radio" class="checkBox" name="rg_dct" value="1" '.($addon_cfg['rg_dct'] ? 'checked="checked"' : '' ).' /> '.$wordings[$roster_conf['roster_lang']]['ss']['yes'].' 
<input type="radio" class="checkBox" name="rg_dct" value="0" '.(!$addon_cfg['rg_dct'] ? 'checked="checked"' : '' ).'/> '.$wordings[$roster_conf['roster_lang']]['ss']['no'].' </td>
      </tr>';

If ($addon_cfg['rg_dul'] == 1){
$font = "red";
}else{
$font = "green";
}  
$html .= '<tr>
            <td class="ss_row1" align="center" Valign="center">
            <div style="cursor:help;" onmouseover="overlib(\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip07'].'\',CAPTION,\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip07cap'].'\');" onmouseout="return nd();"><font color='.$font.'>'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip07cap'].'</font></div></td>
            <td class="ss_row1" align="center"> 
<input type="radio" class="checkBox" name="rg_dul" value="1" '.($addon_cfg['rg_dul'] ? 'checked="checked"' : '' ).' /> '.$wordings[$roster_conf['roster_lang']]['ss']['disable'].' 
<input type="radio" class="checkBox" name="rg_dul" value="0" '.(!$addon_cfg['rg_dul'] ? 'checked="checked"' : '' ).'/> '.$wordings[$roster_conf['roster_lang']]['ss']['enable'].' </td>
      </tr>';
$html .= '';
$html .= '';
$html .= '';
$html .= '';
$html .= '</table>';
$html .= ''.border('sgreen','end').'';
$html .= '</div>';

$html .= '<!-- begin Display settings -->';
$html .= '<div id="t3" style="display:none;">';
$html .= ''.border('sgreen','start',''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['thumbconfig'].'').'';
$html .= '<table width="600">';
$html .= '';
$html .= '<tr>
            <td class="ss_row1" align="center" width="150"><div style="cursor:help;" onmouseover="overlib(\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip01'].'\',CAPTION,\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip01cap'].'\');" onmouseout="return nd();">'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip01cap'].'</div></td>
            <td class="ss_row1" align="right">
            '.$wordings[$roster_conf['roster_lang']]['ss']['width'].': <input name="rg_width" type="text" value="'.$addon_cfg['rg_width'].'" size="5" maxlength="5" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            '.$wordings[$roster_conf['roster_lang']]['ss']['height'].': <input name="rg_height" type="text" value="'.$addon_cfg['rg_height'].'" size="5" maxlength="5" /></td>
      </tr>';
$html .= '<tr>
            <td class="ss_row1" align="center" width="150"><div style="cursor:help;" onmouseover="overlib(\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip12'].'\',CAPTION,\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip12cap'].'\');" onmouseout="return nd();">'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip12cap'].'</div></td>
            <td class="ss_row1" align="right"><select name="rg_rating_align">
  <option value="1" '.($addon_cfg['rg_rating_align'] == 1 ? 'selected="selected"' : '' ).'>Top</option>
  <option value="0" '.($addon_cfg['rg_rating_align'] == 0 ? 'selected="selected"' : '' ).'>Bottom</option></select></td>
      </tr>';
      
$html .= '<tr>
            <td class="ss_row1" align="center" width="150"><div style="cursor:help;" onmouseover="overlib(\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip13'].'\',CAPTION,\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip13cap'].'\');" onmouseout="return nd();">'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip13cap'].'</div></td>
            <td class="ss_row1" align="right"><select name="rg_caption_align">
  <option value="1" '.($addon_cfg['rg_caption_align'] == 1 ? 'selected="selected"' : '' ).'>Top</option>
  <option value="0" '.($addon_cfg['rg_caption_align'] == 0 ? 'selected="selected"' : '' ).'>Bottom</option></select></td>
      </tr>';
      
      
$html .= '<tr>
            <td class="ss_row1" align="center" Valign="center">
            <div style="cursor:help;" onmouseover="overlib(\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip15'].'\',CAPTION,\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip15cap'].'\');" onmouseout="return nd();">'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip15cap'].'</div></td>
            <td class="ss_row1" align="center"> 
<input type="radio" class="checkBox" name="rg_wm_use" value="1" '.($addon_cfg['rg_wm_use'] ? 'checked="checked"' : '' ).' /> '.$wordings[$roster_conf['roster_lang']]['ss']['yes'].' 
<input type="radio" class="checkBox" name="rg_wm_use" value="0" '.(!$addon_cfg['rg_wm_use'] ? 'checked="checked"' : '' ).'/> '.$wordings[$roster_conf['roster_lang']]['ss']['no'].' </td>
      </tr>';
$html .= '<tr>
            <td class="ss_row1" align="center" width="150"><div style="cursor:help;" onmouseover="overlib(\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip16'].'\',CAPTION,\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip16cap'].'\');" onmouseout="return nd();">'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip16cap'].'</div></td>
            <td class="ss_row1" align="right"><select name="rg_wm_loc">
  <option value="1" '.($addon_cfg['rg_wm_loc'] == 1 ? 'selected="selected"' : '' ).'>Top Left</option>
  <option value="2" '.($addon_cfg['rg_wm_loc'] == 2 ? 'selected="selected"' : '' ).'>Top Right</option>
  <option value="3" '.($addon_cfg['rg_wm_loc'] == 3 ? 'selected="selected"' : '' ).'>Bottom Left</option>
  <option value="4" '.($addon_cfg['rg_wm_loc'] == 4 ? 'selected="selected"' : '' ).'>Bottom Right</option></select></td>
      </tr>';
$html .= '';
$html .= '<tr>
            <td class="ss_row1" align="center" width="150"><div style="cursor:help;" onmouseover="overlib(\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip17'].'\',CAPTION,\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip17cap'].'\');" onmouseout="return nd();">'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip17cap'].'</div></td>
            <td class="ss_row1" align="right">'.$functions->createOptionList($backgFilesArr,$addon_cfg['rg_wm_file'],'rg_wm_file',2 ).'';
$html .= '</td>
      </tr>';
$html .= '<tr>
            <td class="ss_row1" align="center" width="150">'.$functions->createTip( $wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip19'] , $wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip19cap'] ).'</td>
            <td class="ss_row1" align="right">'.$functions->createOptionList($ssbordercolor,$addon_cfg['rg_tn_bc'],'rg_tn_bc',0 ).'';
$html .= '</td>
      </tr>';
$html .= '</table>';
$html .= ''.border('sgreen','end').'';
$html .= '</div>';




$html .= '<!-- begin Display settings -->';
$html .= '<div id="t4" style="display:none;">';
$html .= ''.border('sgreen','start',''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['catconfig'].'').'';
$html .= '<table width="600">';
$html .= '<tr>
    <td class="membersRow2"><div style="cursor:help;" onmouseover="overlib(\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip10'].'\',CAPTION,\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip10cap'].'\');" onmouseout="return nd();">'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip10cap'].'</div></td>
    <td class="membersRow2">'.$wordings[$roster_conf['roster_lang']]['ss']['amount'].': <input name="rg_catcount" type="text" value="'.$addon_cfg['rg_catcount'].'" size="5" maxlength="5" /></td>
    <td class="membersRowRight2">~</td>
  </tr>';
$row6 = 1;
for($n=1;$n<=$addon_cfg['rg_catcount'];$n++)
{  
$html .= '<tr>
    <td class="membersRow'.(((++$row6)%2)+1).'"><div style="cursor:help;" onmouseover="overlib(\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip11'].'\',CAPTION,\''.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip11cap'].' '.$n.'\');" onmouseout="return nd();">'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['tooltip11cap'].' '.$n.'</div></a></td>
    <td class="membersRow'.(((++$row6)%2)+1).'"><input name="rg_cat'.$n.'" type="text" value="'.$addon_cfg['rg_cat'.$n].'" size="20" maxlength="150" /></td>
    <td class="membersRowRight'.(((++$row6)%2)+1).'">
      Enable <input type="radio" class="checkBox" name="rg_cat'.$n.'en" value="1" '.($addon_cfg['rg_cat'.$n.'en'] ? 'checked="checked"' : '' ).' /> 
      Disable <input type="radio" class="checkBox" name="rg_cat'.$n.'en" value="0" '.(!$addon_cfg['rg_cat'.$n.'en'] ? 'checked="checked"' : '' ).'/> 
</td>
  </tr>';
}  
$html .= '</table>';
$html .= ''.border('sgreen','end').'';
$html .= '</div></form>';

ob_start();
include_once( RG_DIR.'templates/body_apimage.tpl' );
$apimages = ob_get_contents();
ob_end_clean();
$html .= $apimages;

ob_start();
include_once( RG_DIR.'templates/body_uapimage.tpl' );
$uapimages = ob_get_contents();
ob_end_clean();
$html .= $uapimages;

ob_start();
include_once( RG_DIR.'templates/uploadimg.tpl' );
$uploadimg = ob_get_contents();
ob_end_clean();



echo '

<!-- Begin Java Link -->
<script type="text/javascript" language="JavaScript">
<!--
	initializetabcontent("siggen_menu")
//-->
</script>';

echo '
<table align="center" width="90%">
<tr>
<td width="250" align="left"></td><td width="20"></td><td width="600"></td>
</tr><tr>
<td width="100%" align="center" colspan ="3">
'.$msg.'</td>
</tr>
<tr><td width = "250" valign="top">
'.$menu.'<br>
'.$uploadimg.'
</td><td width="20"></td>
<td width="800" valign="top">
<form action="'.$script_filename.'" method="post" enctype="multipart/form-data" id="configsettings" onsubmit="submitonce(this)">
	<input type="hidden" name="ss_op" value="settings" />
<input type="submit" value="'.$wordings[$roster_conf['roster_lang']]['ss']['admin']['applysettings'].'" name="fileupload" /><br><br>

'.$html.'
</td>
</tr>
</table>
';
echo '

<!-- Begin Java Link -->
<script type="text/javascript" language="JavaScript">
<!--
	initializetabcontent("siggen_menu")
//-->
</script>
<!-- Begin Java Link -->
<script type="text/javascript" language="JavaScript">
<!--
	initializetabcontent("siggen_menu2")
//-->
</script>
<!-- Begin Java Link -->
<script type="text/javascript" language="JavaScript">
<!--
	initializetabcontent("siggen_menu3")
//-->
</script>
';
}
}
?>
