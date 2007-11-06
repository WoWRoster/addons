<?php


if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}
?>

<!-- Begin Image Upload Box -->
<?php

?>
  <form method="post" action="" enctype="multipart/form-data" name="upload_wm" onsubmit="submitonce(this)">
<?php print border('sgray','start','<div style="width:187px;"><img src="'.ROSTER_PATH.'img/blue-question-mark.gif" style="float:right;" alt="" />'.$functions->createTip( 'Images are currently located in:<br />\n&quot;'.str_replace('\\','/',$addon['dir'].$addon_cfg['rg_wm_dir']).'&quot;','Upload Watermark' ).'</div>'); ?>
    <table width="200" class="sc_table" cellspacing="0" cellpadding="2">
      <tr>
        <td class="sc_row_right1" align="left">Image location:<br />
          <input class="inputbox" name="wmfile" type="file" /></td>
      </tr>
      <tr>
        <td class="sc_row_right2" align="center"><input type="hidden" name="ss_op" value="upload_wm" />
          <input type="submit" value="Upload Image" name="fileupload" /></td>
      </tr>
    </table>
<?php print border('sgray','end'); ?>
  </form>

<!-- End Image Upload Box -->
