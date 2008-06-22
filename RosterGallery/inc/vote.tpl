<?php


if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}
$id = $_GET['id'];


$sqlv = "SELECT * FROM `" . ROSTER_SCREENTABLE . "` WHERE `id` = '".$id."'";

$resultv = $roster->db->query($sqlv) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sqlv);
$rowv = $roster->db->fetch($resultv);
if ($rowv['rateing'] != 0 && $rowv['votes'] != 0){
$rank2 = ($rowv['rateing'] / $rowv['votes']);
$rank = number_format($rank2, 1, '.', '');
}else{
$rank = "No Votes";
}
//echo $sqlv.'<br>';
print border('sgreen','start',$rowv['caption'].' Current Rating '.$rank);
echo '

<form method="post" action="'.makelink('&amp;id='.$id.'').'" enctype="multipart/form-data" onsubmit="submitonce(this)">
<table cellspacing="0" cellpadding="0" border="0">
<tr>
<td>';
echo '<img src="' . $imgdir.$rowv['catagory'].'/'.$rowv['file'].'.'.$rowv['ext'].'" ></a><br>';
echo '
</td>
</tr>
<tr>
<td class="divider_sgreen" ><img src="img/pixel.gif" width="1" height="1" alt="" /></td>
</tr>
<tr>
<td>'.$row['disc'].'<br><br>Back to <a href="'.makelink().'">Roster Gallery</a></td></tr>  
<tr>
<td class="divider_sgreen" ><img src="img/pixel.gif" width="1" height="1" alt="" /></td>
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
        <input type="hidden" name="id" value="'.$rowv['id'].'" />
          <input type="submit" value="Vote Now!" name="votenow" /></td>
      </tr>
</td>
</tr>
';
echo '</table></form>';
print border('sgreen','end');
