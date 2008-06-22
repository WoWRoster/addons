<div id="t6" style="display:none;">
<?php

$upimgdir = 'addons' . DIR_SEP . 'RosterGallery' . DIR_SEP . 'screenshots' . DIR_SEP . 'thumbs' . DIR_SEP;


$query22 = "SELECT * FROM `".ROSTER_SCREENTABLE."` WHERE `approve` = '' ORDER BY 'order' DESC";
$result22 = $roster->db->query($query22) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$query22);
$tapproved = $roster->db->num_rows($result22);

if ($tapproved >= 12 ){
$apages1  = ($tapproved / 12);
} else {
$apages1  = 1;
}
$apages = ceil($apages1);

echo border('sred','start',$roster->locale->act['admin']['unapconfig']).'';
?>
<!-- begin Display settings -->

<div>
<?php
echo '<form action="'.makelink().'" method="post" enctype="multipart/form-data" id="configapp" onsubmit="submitonce(this)">
	<input type="hidden" name="ss_op" value="approve" />';


echo '<div><ul id="rg_menu3" class="tab_menu">'."\n";
echo "<table width=\"600\" colspan=6 ><tr>\n";
for( $i=1; $i<=$apages; $i++){
if ($i == 1){
$first_tab = ' class="selected"';
echo '<td><ul id="rg_menu3" class="tab_menu"><li'.$first_tab.'><a href="#" rel="t3'.$i.'" >Page '.$i."</a></li></ul></td>\n\n";
}else {
echo '<td><ul id="rg_menu3" class="tab_menu"><li><a href="#" rel="t3'.$i.'" >Page '.$i."</a></li></ul></td>\n\n";
}
if ($i == 5){
echo '</tr>
<tr>';
}
}
echo '</tr>
<tr>
   <td colspan=6 class="divider_sred"><img src="img/pixel.gif" width="1" height="1" alt="" /></td>
</tr>
</table></ul></div>';
$g = 1;
$ipp = 12;
$ipl = 3;
$h = 0;
$pag = 1;
$q = 0;
echo "<table width=\"600\"><tr><td>\n\n\n";
if ( $tapproved == 0){
echo 'No Images</td></tr>';
}
while ($row2 = $roster->db->fetch($result22)){
$q++;
$rowex++;
$h++;
if ($g == 1){
echo '
<div id="t3'.$pag.'" style="display:none;">';
echo "<table width=\"600\">\n\n\n";
}
$g++;
if ($q == 1){
echo '<tr>';
$rowe++;
}
$c = 0;
	
echo	'<td class="ss_row'.(($rowex % 2) +1).'">';
$caption = '';
    if ($row2['rateing'] != '')
    {
      $rating = $roster->locale->act['rating'].': '.$row2['rateing'].'';
    } else {
    $rating = ' '.$roster->locale->act['norating'];
    }
      if ($addon_cfg['rg_dct'] == 1){
            if ($addon_cfg['rg_caption_align'] == 1){
                  $caption .= $row2['caption'];
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
      print border($addon_cfg['rg_tn_bc'],'start',$caption);
    }else{
    print border($addon_cfg['rg_tn_bc'],'start');
    }
echo '<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
<td>';

      if ($addon_cfg['rg_u_ovlb'] == 1){
                                                                                                                                                                                                                                                                                                //width="'.$addon_cfg['rg_width'].'" height="'.$addon_cfg['rg_height'].'"
            echo '<div style="cursor:help;" onmouseover="overlib(\''.$row2['disc'].'\',CAPTION,\''.$row2['caption'].' '.$rating.'\');" onmouseout="return nd();">
            <img src="'.$upimgdir.$row2['file'].'-thumb.'.$row2['ext'].'" width="206" height="150" ></a></div>';
 
      }
      else if ($row['desc'] != '')
      {
            echo '<div style="cursor:help;" onmouseover="overlib(\''.$row2['disc'].'\',CAPTION,\'\');" onmouseout="return nd();">
            <img src="'.$upimgdir.$row2['file'].'-thumb.'.$row2['ext'].'" width="206" height="150"></a></div>';
      } 
      else
      {
            echo "<img src=\"".$upimgdir.$row2['file'].'-thumb.'.$row2['ext'].'" width="206" height="150"></a>';
      }

echo '</td></tr>';

$caption = '';
if ($addon_cfg['rg_dct'] == 1){
      if ($addon_cfg['rg_caption_align'] == 0){
            $caption .= $row2['caption'];
      }
}
if ($addon_cfg['rg_drt'] == 1){      
      if ($addon_cfg['rg_rating_align'] == 0){
            $caption .= ' '.$rating;
      }
}
if ($caption != ''){
echo '

      <tr>
            <td class="divider_sred"><img src="img/pixel.gif" width="1" height="1" alt="" /></td>
      </tr>

      <tr>
            <td align="center">
                  ['.$addon_cfg['rg_'.$row2['catagory'].''].']
            <td>
      </tr>
      
      <tr>
            <td class="divider_sred"><img src="img/pixel.gif" width="1" height="1" alt="" /></td>
      </tr>

      <tr>
            <td align="center">
            <div style="cursor:help;" onmouseover="overlib(\''.sprintf($roster->locale->act['admin']['delimage_ov'],$row2['id']).'\',CAPTION,\''.$roster->locale->act['admin']['delimage'].'\');" onmouseout="return nd();">
                  '.$roster->locale->act['admin']['delimage'].'?  <input name="delete[]" type="checkbox" id="delete" value="'.$row2['id'].'"></div>
            </td>
      </tr>

      <tr>
            <td class="divider_sred"><img src="img/pixel.gif" width="1" height="1" alt="" /></td>
      </tr>

      <tr>
            <td align="center">';

                  if ($row2['approve']){
                        echo '<font color=green>'.$roster->locale->act['admin']['imageapproved'].'</font>';
                  }
                  if (!$row2['approve']){
                        echo '<font color=red><div style="cursor:help;" onmouseover="overlib(\''.sprintf($roster->locale->act['admin']['na1'],$row2['id']).'\',CAPTION,\''.$roster->locale->act['admin']['imagenotapproved'].'\');" onmouseout="return nd();">'.$roster->locale->act['admin']['imagenotapproved'].'</font>  <input name="approve[]" type="checkbox" id="approve" value="'.$row2['id'].'"></div>';
                  }
}      

echo '</table>';
    print border($addon_cfg['rg_tn_bc'],'end');
echo'    



</td>';
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

?>
<?php
if ( $tapproved == 0){
echo '</td></tr><tr><td colspan='.$ipl.'>';
}else{
echo '</table></td></tr><tr><td colspan='.$ipl.'>';
}
echo '
    <input type="submit" value="'.$roster->locale->act['admin']['approve'].'" />';
echo  '</form>';
echo '</table>'.border('sred','end').'<br>';
?>			
</div>
<!-- Begin Java Link -->
<script type="text/javascript" language="JavaScript">
<!--
	var id=new tabcontent('tab_menu');
      id.init();
//-->
</script>
<!-- Begin Java Link -->
<script type="text/javascript" language="JavaScript">
<!--
	var id=new tabcontent('rg_menu3');
      id.init();
//-->
</script>

