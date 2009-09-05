<?php
/*
****************************************************************
* gllcTS2 for TeamSpeak 2 © Gryphon, LLC (www.gryphonllc.com ) *
****************************************************************
*
* $Id: tpl_loggedin.php 5 2005-10-26 23:19:04Z gryphon $
* $Rev: 5 $
* $LastChangedBy: gryphon $
* $Date: 2005-10-26 16:19:04 -0700 (Wed, 26 Oct 2005) $
*/
?>
<table width="<?php echo ''.(($setting["popupwidth"])-20).'' ?>" height="100%" class="listfont" align="center">
  <tr>
    <td align="center" valign="middle">
      <table align="center" border="0" cellpadding="3" cellspacing="1" width="100%" bgcolor="<?php echo ''.$setting["bordercolor"].''; ?>">
        <tr>
          <td align="center" bgcolor="<?php echo ''.$setting["catrowcolor1"].''; ?>" class="catagory"><b>
            <a href="
            <?php
              echo ''.$_POST["server"].'/nickname='.$_POST["nickname"].'?loginname='.stripslashes($_POST["loginname"]).'?password='.$_POST["password"].'?channel='.stripslashes($_POST["channel"]).'?channelpassword='.$_POST["channelpassword"].'';
            ?>">
            Click here<br>to Log in</a></b>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>

</body>
</html>
