
<div id="t10" style="display:none;">
<?php

$ssfolder = array(
'screenshots/',
'screenshots/thumbs/',
'screenshots/cat1/',
'screenshots/cat2/',
'screenshots/cat3/',
'screenshots/cat4/',
'screenshots/cat5/',
'screenshots/cat6/',
'screenshots/cat7/',
'screenshots/cat8/',
'screenshots/cat9/',
'screenshots/cat10/',
'inc/wm/');
            $status = '';

            $status .= ''.border('sgreen','start',''.$roster->locale->act['admin']['status_config'].'').'';
            $status .= '<table width="600">';
            $status .= '';
            $status .= '<tr>
            <td class="membersRow2" align="center" colspan=2>'.$roster->locale->act['admin']['status_info'].'</td>
            </tr>';            
            
      foreach($ssfolder as $dir){
      //echo $addon['dir'].$dir.'<br>';
            if (!is_writeable($addon['dir'].$dir)){
            
                  $status .= '<tr>
                              <td class="membersRow2" align="center" >'.sprintf(''.$roster->locale->act['admin']['dir_check'].'',$dir).'</td>
                              <td class="membersRow2" align="center" ><font color="red">'.sprintf(''.$roster->locale->act['admin']['dir_not_write'].'','index.php?p=util-RosterGallery&amp;edit=chmod&amp;dir='.$dir.'').'</font>
                              </tr>';
            
            }
            else
            {
                  $status .= '<tr>
                              <td class="membersRow2" align="center" >'.sprintf(''.$roster->locale->act['admin']['dir_check'].'',$dir).'</td>
                              <td class="membersRow2" align="center" ><font color="green">'.$roster->locale->act['admin']['dir_is_write'].'</font></td>
                              </tr>';
            
            }
      }


$status .= '</table>'.border('syellow','end').'<br></div>';
echo $status;
?>
