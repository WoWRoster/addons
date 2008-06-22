<?php
/******************************
 * $Id$
 ******************************/
include( $addon['dir'] . 'inc/functions.php' );
include( $addon['dir'] . 'inc/conf.php' );
//$roster->output['show_menu'] = false;
$functions = new ssconfig;
define('ROSTER_SCREENTABLE',$roster->db->table('ss',$addon['basename']));
$basename = basename(dirname(dirname(__FILE__)));
if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

$imagex = str_replace( 'img/', '', $roster->config['interface_url'] );
$imgdir = $imagex.$addon['url'].'screenshots/';
$imgdirthumb = $imagex.$addon['url'].'screenshots/thumbs/';
//<body onload="MM_preloadImages(‘/images/menu_on.gif’)…;initLightbox()">
$roster->output['body_onload'] = 'onload="MM_preloadImages(‘'.$addon['dir'].'images/menu_on.gif’)…;initLightbox()"';
$roster->output['html_head'] = '

<script type="text/javascript" src="' . ROSTER_PATH . 'addons/RosterGallery/js/lightbox.js"></script>

<link rel="stylesheet" href="' . ROSTER_PATH . 'addons/RosterGallery/lightbox.css" type="text/css" media="screen" />
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


echo '

<!-- Begin Java Link -->
<script type="text/javascript" language="JavaScript">
<!--
	var id=new tabcontent(\'rg_menu2\');
      id.init();
//-->
</script>
<!-- Begin Java Link -->
<script type="text/javascript" language="JavaScript">
<!--
	var id=new tabcontent(\'rg_menu3\');
      id.init();
//-->
</script>
<!-- Begin Java Link -->
<script type="text/javascript" language="JavaScript">
<!--
	var id=new tabcontent(\'rg_menu4\');
      id.init();
//-->
</script>

<!-- Begin Java Link -->
<script type="text/javascript" language="JavaScript">
<!--
	var id=new tabcontent(\tab_menu3\');
      id.init();
//-->
</script>
';


              
$password_message = '';
$min = null;
$max = null;
$c = null;
$nothing = 1;

/*

this is just to make zanix go "huh?!?! what the hell!!??!! :P

*/
$addon['config']['rg_cat11en'] = '';

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
		    $functions->uploadImage( $addon['dir'].'screenshots/', $_FILES['userfile']['name'], addslashes($_POST['caption']), $_POST['catagory'], $_POST['desc'] ,$addon['config']['rg_width'] ,$addon['config']['rg_height'] ,$addon['config']['rg_wm_loc'],$addon['config']['rg_wm_use'],$addon['config']['rg_wm_file'],$addon['config']['rg_wm_dir'],ROSTER_SCREENTABLE,$addon['config']['rg_upload_size'] );
            break;
            
            case 'upload_wm';
                  $functions->uploadwmImage( $addon['dir'].'inc/'.$addon['config']['rg_wm_dir'], $_FILES['wmfile']['name'] );
            break;

		default:
		break;
	}
}
// ----[ End Decide what to do next ]-----------------------

// just an array for future use
$pross_ign = array(
	'config_name',
	'gi_op',
);
$id = isset($_GET['id']);
$vop = isset($_GET['op']);




      if ($id != '' && $addon['config']['rg_use_votepopup'] == '0' && $vop != 'vote')

            {

                  $sql = "SELECT * FROM `" . ROSTER_SCREENTABLE . "` WHERE `id` = '".$id."'";
                  $result = $roster->db->query($sql) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$query);
                  $row = $roster->db->fetch($result);

                  if ($row['rateing'] != 0 && $row['votes'] != 0)
                  
                        {
                              $rank2 = ($row['rateing'] / $row['votes']);
                              $rank = number_format($rank2, 1, '.', '');
                        }
                  else
                        {
                              $rank = "No Votes";
                        }

                  ob_start();
                  include_once( $addon['dir'].'inc/vote.tpl' );
                  $vote = ob_get_contents();
                  ob_end_clean();
                  echo $vote;
            }

      if ($id != '' && $vop == 'vote')
      
            {

                  $sql = "SELECT * FROM `" . ROSTER_SCREENTABLE . "` WHERE `id` = '".$id."'";
                  $result = $roster->db->query($sql) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$query);
                  $row = $roster->db->fetch($result);
                  
                  if ($row['rateing'] != 0 && $row['votes'] != 0)
                  
                        {
                              $rank2 = ($row['rateing'] / $row['votes']);
                              $rank = number_format($rank2, 1, '.', '');
                        }
                  else
                        {
                              $rank = "No Votes";
                        }
                        
                  $roster->config['logo'] = false;
                  $roster->output['show_menu'] = false;    // Turn off roster menu
                  $roster->output['show_footer'] = false;  // Turn off roster footer 
                  ob_start();
                  include_once( $addon['dir'].'inc/vote2.tpl' );
                  $vote = ob_get_contents();
                  ob_end_clean();

                  echo $vote;
            }


      if (isset($_GET['dir']) != '' && isset($_GET['edit']) == 'chmod')
      
            {
            
                  $dir = $_GET['dir'];
                  $roster->output['show_menu'] = false;
                  $roster->config['logo'] = false;
                  $roster->output['show_menu'] = false;    // Turn off roster menu
                  $roster->output['show_footer'] = false;  // Turn off roster footer 

                  $cmd = '';
                  $cmd .= ''.border('sgreen','start',''.$roster->locale->act['admin']['status_chmod'].'').'';
                  $cmd .= '<table width="200">';

                  if( file_exists('addons/RosterGallery/'.$dir) )
                  
                        {            
                              if( chmod( 'addons/RosterGallery/'.$dir,0777 ) )
                              
                                    {
                                          $cmd.= '<tr><td class="membersRow1">'.$roster->locale->act['admin']['status_chmod_changed'].'</td></tr>';
            
                                    }
                              else
                                    {
                                          $cmd.= '<tr><td class="membersRow1">'.$roster->locale->act['admin']['status_chmod_unchanged'].'</td></tr>';
                                    }
                        }
                  else
                        {
                              $cmd.= '<tr><td class="membersRow1">'.sprintf(''.$roster->locale->act['admin']['status_chmod_nodir'].'',$dir).'</td></tr>';
                        }
      
                  $cmd .= '</table>'.border('sgreen','end').'<br>';
                  echo $cmd;
            }



      if ( $id == '' )

            {                 
                  $colx = $addon['config']['rg_ipl'];
                  $rowx = $addon['config']['rg_lpp'];                  
                  $row = 0;
                  $x = 0;
                  $html = '';

                  if (isset($_GET['c']) != '')
                        {
                              $c = $functions->getvars( 'c' );
                        }

                  if (isset($_GET['edit']) =='')
                  
                        {

                              if ($functions->getMessage() != '')
                                    {
                                          print border('sblue','start','Messages');
                                          echo $functions->getMessage();
                                          print border('sblue','end');
                                    }

                              if ($c)
                                    {
                                          $query2 = "SELECT * FROM `".ROSTER_SCREENTABLE."` WHERE `approve` = 'yes' AND `catagory` = '".$c."' ORDER BY `id` DESC";
                                    }
                              else
                                    {
                                          $query2 = "SELECT * FROM `".ROSTER_SCREENTABLE."` WHERE `approve` = 'yes' ORDER BY `id` DESC";
                                    }

                              $result2 = $roster->db->query($query2) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$query2);
                              $total = mysql_num_rows($result2);

                              $tapproved = $roster->db->num_rows($result2);

                              if ($tapproved >= $addon['config']['rg_ipp'] )
                                    {
                                          $apages1  = ($tapproved / $addon['config']['rg_ipp']);
                                    }
                              else
                                    {
                                          $apages1  = 1;
                                    }
                              $apages = ceil($apages1);



                              $NN = null;
                              print '<br />';

                              print border($addon['config']['rg_mp_bc'],'start');

                              echo '<table class="main_roster_menu" cellspacing="0" cellpadding="2" width="650">';
                              echo '<tr><td colspan="3" align="center" valign="top" class="header">
                                    <span style="font-size:18px;">'.$roster->locale->act['rgname'].' '.$roster->locale->act['admin']['w_version'].' '.$addon['config']['rg_version'].'</span><br /></td>
                                    </tr><tr><td colspan="3" class="divider_'.$addon['config']['rg_mp_bc'].'"><img src="img/pixel.gif" width="1" height="1" alt="" /></td></tr>';
  
                              if ($addon['config']['rg_dspc'] == 1)
                                    {
                                          echo '<tr><td colspan="3" align="center" valign="top" class="header">';
                                          echo '<a href="'.makelink().'">'.$roster->locale->act['all'].'</a>';
                                          
                                          for($n=1;$n<=10;$n++)
                                                {
                                                      if ($n != 11)
                                                            {
                                                                  $NN == 0;
                                                                  $NN = $n;
                                                                  $j = ($n + 1 );
                                                                  $total = $addon['config']['rg_catcount'];
                                                                  $current = $addon['config']['rg_cat'.$n.'en'];

                                                                  if( $roster->auth->getAuthorized($addon['config']['config_' . $addon['config']['rg_cat'.$n.'id']]) )
                                                                        {
                                                                              if ($addon['config']['rg_cat'.$n.'en'] == 1)
                                                                                    {
                  
                                                                                          echo ' - <a href="'.makelink().'&c='.$addon['config']['rg_cat'.$n.'id'].'">'.$addon['config']['rg_cat'.$n].'</a>';
                                                                                    }
                                                                        }
                                                            }
                                                }
                                          echo '</td></tr><tr><td colspan="3" class="divider_'.$addon['config']['rg_mp_bc'].'"><img src="img/pixel.gif" width="1" height="1" alt="" /></td></tr>';
                                    }
                                    
                              echo '<tr><td colspan="3"><div><ul id="rg_menu2" class="tab_menu">'."\n";
                              echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr>\n";

                              for( $i=1; $i<=$apages; $i++)
                                    {
                                    
                                          if ($i == 1)
                                          {
                                                $first_tab = ' class="selected"';
                                                echo '<td><ul id="rg_menu2" class="tab_menu3"><li'.$first_tab.'><a href="#" rel="t1'.$i.'" >Page '.$i."</a></li></ul></td>\n\n";
                                          }
                                          else
                                          {
                                                echo '<td><ul id="rg_menu2" class="tab_menu3"><li><a href="#" rel="t1'.$i.'" >Page '.$i."</a></li></ul></td>\n\n";
                                          }
                                          if ($i == 10)
                                          {
                                                echo '</tr><tr>';
                                          }
                                    }
                              echo '</tr><tr><td colspan="10" class="divider_'.$addon['config']['rg_mp_bc'].'"><img src="img/pixel.gif" width="1" height="1" alt="" /></td></tr></table></ul></div>';
                              echo'<tr><td>';
                              $menue = '0';
                              $rowex = 0;
                              $rowe = 0;
                              $g = 1;
                              $ipp = $addon['config']['rg_ipp'];
                              $ipl = $addon['config']['rg_ipl'];
                              $h = 0;
                              $pag = 1;
                              $q = 0;
	
      while ($row = $roster->db->fetch($result2))
      {
            $q++;
            $rowex++;
            $h++;
            
            if ($g == 1)
            {
                  echo '<div id="t1'.$pag.'" style="display:none;">';
                  echo "<table width=\"600\">\n\n\n";

                  $menue++;
            }
            $g++;
            if ($q == 1)
            {
                  echo '<tr>';
                  $rowe++;
            }
            $c = 0;
            
            if ($row['rateing'] != 0 && $row['votes'] != 0)
            {
                  $rank2 = ($row['rateing'] / $row['votes']);
                  $rank = number_format($rank2, 1, '.', '');
            }
            else
            {
                  $rank = "No Votes";
            }
            if ($row['rateing'] != '')
            {
                  $rating = $roster->locale->act['rating'].': '.$row['rateing'].'';
            } 
            else 
            {
                  $rating = ' '.$roster->locale->act['norating'];
            }	

//############################################################################################################

      if( $roster->auth->getAuthorized($addon['config']['config_' . $row['catagory']]) )
	{

            $caption = '';
            echo	'<td colspan=2>';


            if ($row['rateing'] != '')
            {
                  $rating = $roster->locale->act['rating'].': '.$rank.'';
            } else {
                  $rating = ' '.$roster->locale->act['norating'];
            }
            if ($addon['config']['rg_dct'] == 1)
            {
                  if ($addon['config']['rg_caption_align'] == 1)
                  {
                        $caption .= $row['caption'];
                  }
            }
            if ($addon['config']['rg_drt'] == 1)
            {      
                  if ($addon['config']['rg_rating_align'] == 1)
                  {
                        $caption .= ' '.$rating;
                  }
            }
            
            if (strlen($caption) > 27)
                  {
				$caption = substr(stripslashes($caption), 0, 24) . "...";
			}
			else
			{
				$caption = stripslashes($caption);
			}
				
				
            if ($caption != ''){ 
                  print border($addon['config']['rg_tn_bc'],'start',$caption);
            }else{
                  print border($addon['config']['rg_tn_bc'],'start',$roster->locale->act['nocaption']);
            }
      
            echo '<table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tr>
            <td colspan=2>';

            $path = $imgdirthumb.$row['file'].'-thumb.'.$row['ext'];
            $path2 = $imgdir.$row['catagory'].'/'.$row['file'].'.'.$row['ext'];
            echo $functions->getimage($row['id'] , $addon['config']['rg_u_ovlb'], $addon['config']['rg_u_lb'], $row['disc'], $row['caption'], $path, $path2, $rating, $addon['config']['rg_width'], $addon['config']['rg_height'], $row['catagory']);

            echo '</td></tr>';

            $caption = '';
            if ($addon['config']['rg_dct'] == 1)
            {
                  if ($addon['config']['rg_caption_align'] == 0)
                  {
                        $caption .= $row['caption'];
                  }
            }
            if ($addon['config']['rg_drt'] == 1){      
                  if ($addon['config']['rg_rating_align'] == 0)
                  {
                        $caption .= ' '.$rating;
                  }
            }
            if ($caption != '')
            {
                  echo '<tr>
                  <td class="divider_'.$addon['config']['rg_tn_bc'].'" colspan=2><img src="img/pixel.gif" width="1" height="1" alt="" /></td>
                  </tr>
                  <tr>
                  <th class="simpleborderheader '.$addon['config']['rg_tn_bc'].'borderheader" align="center" valign="top">'.$caption.'</th>';

                              echo '<th><a href="'.makelink('&amp;id='.$row['id'].'&amp;op=vote').'" onclick="return popitup(\''.makelink('&amp;id='.$row['id'].'&amp;op=vote').'\')">'.$roster->locale->act['vote'].'</a></th></tr>';


                  }      

                  echo '</table>';
                  print border($addon['config']['rg_tn_bc'],'end');
                  
                  }

                  echo "\n\n\n";
                  if ($q == 3){
                        echo '</tr>';
                        $q = '0';
                  }
                  if ($h == $ipp){
                        $g = 1;
                        $pag++;
                        $h = 0;
                        echo '</table></div>';
                  }

            } 
      
    echo '</tr>';

    echo '</table></div></table>';


print border($addon['config']['rg_mp_bc'],'end');


print '<br />';

if ($addon['config']['rg_dul'] == 0 ){
$uploadwin = '
<form method="post" action="'.makelink().'" enctype="multipart/form-data" onsubmit="submitonce(this)">
    <table width="198" class="ss_table" cellspacing="0" cellpadding="2">
      <tr>
        <td class="ss_row_right1" align="left">'.$roster->locale->act['imgloc'].':<br />
          <input class="inputbox" name="userfile" type="file" /></td>
      </tr>
      <tr>
        <td class="ss_row_right1" align="left">'.$roster->locale->act['capt'].':<br />
          <input class="inputbox" name="caption" type="text" size="40" /></td>
      </tr>
            <tr>
        <td class="ss_row_right1" align="left">'.$roster->locale->act['desc'].':<br />
        <textarea cols="30" rows="3" name="desc" class="inputbox">Image discription.</textarea>
</tr>
      <tr>
        <td class="ss_row_right2" align="left">'.$roster->locale->act['cat'].':<br />
        

        <select class="sc_select" name="catagory">';
      for($n=1;$n<=10;$n++)
      {
            if ($n != 11){
            
            $total = $addon['config']['rg_catcount'];
            $current = $addon['config']['rg_cat'.$n.'en'];
          if ($addon['config']['rg_cat'.$n.'en'] == 1){
                  
              $uploadwin .= "<option value=\"".$addon['config']['rg_cat'.$n.'id']."\" >".$addon['config']['rg_cat'.$n]."</option>\n";
            }
            }
      }
      
$uploadwin .= '</select></td>
	</tr>
      <tr>
        <td class="ss_row_right1" align="center">
        <input type="hidden" name="ss_op" value="upload" />
        <input type="hidden" name="dir" value="screenshots" />
          <input type="submit" value="'.$roster->locale->act['upimg'].'" name="fileupload" /></td>
      </tr>
    </table>
  </form>
  <!-- Begin Java Link -->
<script type="text/javascript" language="JavaScript">
<!--
	initializetabcontent("rg_menu2")
//-->
</script>  
  

';

echo messageboxtoggle($uploadwin, $title = 'Upload Image', $style = 'sblue', $open = (bool)$addon['config']['rg_upload_win'], $width = '210px');
 
  }
 } 

}
echo '

<!-- Begin Java Link -->
<script type="text/javascript" language="JavaScript">
<!--
	var id=new tabcontent(\'rg_menu2\');
      id.init();
//-->
</script>
<!-- Begin Java Link -->
<script type="text/javascript" language="JavaScript">
<!--
	var id=new tabcontent(\'rg_menu3\');
      id.init();
//-->
</script>
<!-- Begin Java Link -->
<script type="text/javascript" language="JavaScript">
<!--
	var id=new tabcontent(\'rg_menu4\');
      id.init();
//-->
</script>

<!-- Begin Java Link -->
<script type="text/javascript" language="JavaScript">
<!--
	var id=new tabcontent(\tab_menu3\');
      id.init();
//-->
</script>
';
