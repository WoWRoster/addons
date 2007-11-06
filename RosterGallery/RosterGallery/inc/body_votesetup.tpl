<?php
      echo '<div id="t9" style="display:none">';
      echo ''.border('sgreen','start',''.$roster->locale->act['admin']['page_vote'].'').'';
      echo '<table width="500">';
      echo '';
      echo '<tr>
            <td class="membersRow2" align="center" colspan=2><br>'.$roster->locale->act['admin']['page_vote_disc'].'<br></td>
            </tr>';
      echo '<tr>
            <td class="membersRow1" align="center">
            <div style="cursor:help;" '.makeOverlib( $roster->locale->act['admin']['tooltip21'] , $caption=$roster->locale->act['admin']['tooltip21cap'], $caption_color='' , $mode=0 , $locale='' , $extra_parameters='' ).'">'.$roster->locale->act['admin']['tooltip21cap'].'</div></td>
            <td class="membersRow1" align="center"> 
            <input type="radio" class="checkBox" name="rg_use_popup" value="1" '.($addon_cfg['rg_use_popup'] == 1 ? 'checked="checked"' : '' ).' /> '.$roster->locale->act['admin']['popup_off'].' 
            <input type="radio" class="checkBox" name="rg_use_popup" value="0" '.($addon_cfg['rg_use_popup'] == 0 ? 'checked="checked"' : '' ).'/> '.$roster->locale->act['admin']['popup_on'].' </td>
            </tr>';
      
      echo '</table>'.border('sgreen','end').'';
      echo'</div>';
