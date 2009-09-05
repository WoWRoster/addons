<?php
/*
****************************************************************
* gllcTS2 for TeamSpeak 2 © Gryphon, LLC (www.gryphonllc.com ) *
****************************************************************
*
* $Id: tpl_login.php 5 2005-10-26 23:19:04Z gryphon $
* $Rev: 5 $
* $LastChangedBy: gryphon $
* $Date: 2005-10-26 16:19:04 -0700 (Wed, 26 Oct 2005) $
*/
?>
 <table width="<?php echo ''.(($setting["popupwidth"])-20).''; ?>" height="100%" class="listfont" align="center">
  <tr>
    <td align="center" valign="middle">
      <table align="center" border="0" cellpadding="3" cellspacing="1" width="100%" bgcolor="<?php echo ''.$setting["bordercolor"].''; ?>" class="listfont">
        <tr><form action="login.php" method="post">
            <input type="hidden" name="action" value="login">
            <input type="hidden" name="server" value="teamspeak://<?php echo ''.$row->server_ip.':'.$row->server_port.''; ?>">
            <input type="hidden" name="servername" value="<?php echo ''.str_replace(" ", "", $row->server_name).''; ?>">
          <td align="center" bgcolor="<?php echo ''.$setting["catrowcolor1"].''; ?>" class="catagory"><b><?php echo ''.$row->server_name.''; ?></b></td>
        </tr>
        <tr>
          <td align="center" bgcolor="<?php echo ''.$setting["rowcolor2"].''; ?>" class="listing">Nickname<br>
          <input type="text" name="nickname" size="15" value="">
        </tr>
        <tr>
          <td align="center" bgcolor="<?php echo ''.$setting["catrowcolor1"].''; ?>" class="catagory"><b>Optional Login</b></td>
        </tr>
        <tr>
          <td align="center" bgcolor="<?php echo ''.$setting["rowcolor2"].''; ?>" class="listing">Login Name<br>
          <input type="text" name="loginname" size="15" value="">
        </tr>
        <tr>
          <td align="center" bgcolor="<?php echo ''.$setting["rowcolor2"].''; ?>" class="listing">Login Password<br>
          <input type="password" name="password" size="15" value="">
        </tr>
        <tr>
          <td align="center" bgcolor="<?php echo ''.$setting["catrowcolor1"].'';  ?>" class="catagory"><b>Join Channel</b></td>
        </tr>
        <tr>
          <td align="center" bgcolor="<?php echo ''.$setting["rowcolor2"].''; ?>" class="listing">Channel<br>
          <input type="text" name="channel" size="15" value="<?php if (isset($_GET["channel"])) { echo ''.stripslashes($_GET["channel"]).''; } ?>">
        </tr>
        <tr>
          <td align="center" bgcolor="<?php echo ''.$setting["rowcolor2"].''; ?>" class="listing">Channel Password<br>
          <input type="password" name="channelpassword" size="15" value="">
        </tr>
        <tr>
          <td align="center" bgcolor="<?php echo ''.$setting["catrowcolor1"].''; ?>" class="catagory"><input type="submit" value="Submit" class="button"> <input type="submit" value="Cancel" class="button" onclick="window.close();"></td>
        </tr></form>
      </table>
    </td>
  </tr>
</table>

</body>
</html>