<div id="t5" style="display:none;">
<?php
$apimgdir = $addon['url_path'] . DIR_SEP . 'screenshots' . DIR_SEP . 'thumbs' . DIR_SEP;


$query1 = "SELECT * FROM `".ROSTER_SCREENTABLE."` WHERE `approve` = 'YES' ORDER BY 'order' DESC";
$result1 = $roster->db->query($query1) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$query1);
$tapproved = $roster->db->num_rows($result1);

if ($tapproved >= 12 ){
$apages1  = ($tapproved / 12);
} else {
$apages1  = 1;
}
$apages = ceil($apages1);

echo border('sgreen','start',$roster->locale->act['admin']['apconfig']).'';
?>
<!-- begin Display settings -->

<div>
<?php
echo '<form action="'.makelink().'" method="post" enctype="multipart/form-data" id="configdel" onsubmit="submitonce(this)">
	<input type="hidden" name="ss_op" value="delete" />';


echo '<div><ul id="rg_menu2" class="tab_menu">'."\n";
echo "<table width=\"600\" colspan=6 ><tr>\n";
for( $i=1; $i<=$apages; $i++){
if ($i == 1){
$first_tab = ' class="selected"';
echo '<td><ul id="rg_menu2" class="tab_menu"><li'.$first_tab.'><a href="#" rel="t1'.$i.'" >Page '.$i."</a></li></ul></td>\n\n";
}else {
echo '<td><ul id="rg_menu2" class="tab_menu"><li><a href="#" rel="t1'.$i.'" >Page '.$i."</a></li></ul></td>\n\n";
}
if ($i == 5){
echo '</tr><tr>';
}
}
echo '</tr>
<tr>
   <td colspan=6 class="divider_sgreen"><img src="img/pixel.gif" width="1" height="1" alt="" /></td>
</tr>

</table></ul></div>';
$rowex = 0;
$rowe = 0;
$g = 1;
$ipp = 12;
$ipl = 4;
$h = 0;
$pag = 1;
$q = 0;
echo "<table width=\"600\"><tr><td>\n\n\n";
if ( $tapproved == 0){
echo 'No Images</td></tr>';
}
while ($row = $roster->db->fetch($result1)){
$q++;
$rowex++;
$h++;
if ($g == 1){
echo '
<div id="t1'.$pag.'" style="display:none;">';
echo "<table width=\"600\">\n\n\n";
}
$g++;
if ($q == 1){
echo '<tr>';
$rowe++;
}
$c = 0;
    if ($row['rateing'] != '')
    {
      $rating = $roster->locale->act['rating'].': '.$row['rateing'].'';
    } else {
    $rating = ' '.$roster->locale->act['norating'];
    }	

//############################################################################################################


echo	'<td class="ss_row'.(($rowex % 2) +1).'">';
$caption = '';
    if ($row['rateing'] != '')
    {
      $rating = $roster->locale->act['rating'].': '.$row['rateing'].'';
    } else {
    $rating = ' '.$roster->locale->act['norating'];
    }
      if ($addon_cfg['rg_dct'] == 1){
            if ($addon_cfg['rg_caption_align'] == 1){
                  $caption .= $row['caption'];
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
      print border('sgreen','start',$caption);
    }else{
    print border('sgreen','start',$roster->locale->act['nocaption']);
    }
echo '<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
<td >';
       //$tooltip = makeOverlib( $roster->locale->act['admin']['tooltip21'] , $caption=$row['caption'].' '.$rating, $caption_color='' , $mode=0 , $locale='' , $extra_parameters='' );     
      if ($addon_cfg['rg_u_ovlb'] == 1){
                                                                                                                                                                                                                                                                                                //width="'.$addon_cfg['rg_width'].'" height="'.$addon_cfg['rg_height'].'"
            echo '<div style="cursor:help;" onmouseover="overlib(\''.$row['disc'].'\',CAPTION,\''.$row['caption'].'&nbsp;'.$rating.'\');" onmouseout="return nd();">
            <img src="'.$apimgdir.$row['file'].'-thumb.'.$row['ext'].'" width="206" height="150" ></a></div>';
 
      }
      else if ($row['desc'] != '')
      {
            echo '<div style="cursor:help;" onmouseover="overlib(\''.$row['disc'].'\',CAPTION,\''.$row['caption'].'&nbsp;'.$rating.'\');" onmouseout="return nd();">
            <img src="'.$apimgdir.$row['file'].'-thumb.'.$row['ext'].'" width="206" height="150"></a></div>';
      } 
      else
      {
            echo "<img src=\"".$apimgdir.$row['file'].'-thumb.'.$row['ext'].'" width="206" height="150"></a>';
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
echo '

      <tr>
            <td class="divider_sgreen"><img src="img/pixel.gif" width="1" height="1" alt="" /></td>
      </tr>

      <tr>
            <td align="center">
                  ['.$addon_cfg['rg_'.$row['catagory'].''].'] - 
                  <a href="'.makelink('&amp;edit=cat&amp;ide='.$row['id'].'').'" onclick="return popitup(\''.makelink('&amp;edit=cat&amp;ide='.$row['id'].'').'\')">'.$roster->locale->act['admin']['edit'].'</a>
      <td>
      </tr>
      
      <tr>
            <td class="divider_sgreen"><img src="img/pixel.gif" width="1" height="1" alt="" /></td>
      </tr>

      <tr>
            <td align="center">
            <div style="cursor:help;" onmouseover="overlib(\''.sprintf($roster->locale->act['admin']['delimage_ov'],$row['id']).'\',CAPTION,\''.$roster->locale->act['admin']['delimage'].'\');" onmouseout="return nd();">
                  '.$roster->locale->act['admin']['delimage'].'?  <input name="deletess[]" type="checkbox" id="delete" value="'.$row['id'].'"></div>
            </td>
      </tr>

      <tr>
            <td class="divider_sgreen"><img src="img/pixel.gif" width="1" height="1" alt="" /></td>
      </tr>

      <tr>
            <td align="center">';

                  if ($row['approve']){
                        echo '<font color=green>'.$roster->locale->act['admin']['imageapproved'].'</font>';
                  }
                  if (!$row['approve']){
                        echo '<font color=red><div style="cursor:help;" onmouseover="overlib(\''.$roster->locale->act['admin']['na1'].''.$row['id'].''.$roster->locale->act['admin']['na2'].'\',CAPTION,\''.$roster->locale->act['admin']['imagenotapproved'].'\');" onmouseout="return nd();">'.$roster->locale->act['admin']['imagenotapproved'].'</font>  <input name="approve[]" type="checkbox" id="approve" value="'.$row['id'].'"></div>';
                  }
}      

echo '</table>';
    print border($addon_cfg['rg_tn_bc'],'end');

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
echo '</td></tr><tr><td colspan=4>';
}else{
echo '</table></td></tr><tr><td colspan=4>';
}
echo '<form action="'.makelink().'" method="post" enctype="multipart/form-data" id="configdel" onsubmit="submitonce(this)">
	<input type="hidden" name="ss_op" value="delete" />
    <input type="submit" value="'.$roster->locale->act['admin']['delsel'].'" />';
echo  '</form>';
echo '</table>'.border('syellow','end').'<br>';
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
	var id=new tabcontent('rg_menu2');
      id.init();
//-->
</script>


