<?php


$id = $_GET['id'];

$imgdir = 'addons' . DIR_SEP . 'RosterGallery' . DIR_SEP . 'screenshots' . DIR_SEP;
$imgdirthumb = 'addons' . DIR_SEP . 'RosterGallery' . DIR_SEP . 'screenshots' . DIR_SEP . 'thumbs' . DIR_SEP;

$sqlv = "SELECT * FROM `" . ROSTER_SCREENTABLE . "` WHERE `id` = '".$id."'";
$resultv = $roster->db->query($sqlv) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sqlv);
$rowv = $roster->db->fetch($resultv);
if ($rowv['rateing'] != 0 && $rowv['votes'] != 0){
$rank2 = ($rowv['rateing'] / $rowv['votes']);
$rank = number_format($rank2, 1, '.', '');
}else{
$rank = "No Votes";
}
print border('sgreen','start',$rowv['caption'].' Current Rating '.$rank);
echo '

<form method="post" action="'.makelink().'" enctype="multipart/form-data" onsubmit="submitonce(this)">
<table cellspacing="0" cellpadding="0" border="0">
<tr>
<td>';
echo '<img src="' . $imgdirthumb.$rowv['file'].'-thumb.'.$rowv['ext'].'" ></a><br>';
echo '
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
<select class="sc_select" name="vote"><option value="" selected="selected">--None--</option>';

     for($n=1;$n<=$addon_cfg['rg_catcount'];$n++)
      {
            if ($n != 11){
                  if ($addon_cfg['rg_cat'.$n.'en'] == 1){
                        $uploadwin .= "<option value=\"".$addon_cfg['rg_cat'.$n.'id']."\" >".$addon_cfg['rg_cat'.$n]."</option>\n";
                  }
            }
      }
	  echo '</select>

        <input type="hidden" name="ss_op" value="vote" />
        <input type="hidden" name="id" value="'.$rowv['id'].'" />
          <input type="submit" value="Vote Now!" name="votenow" /></td>
      </tr>
</td>
</tr>
';
echo '</table></form>';
print border('sgreen','end');
