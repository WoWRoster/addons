<?php
/**
 * WoWRoster.net WoWRoster
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $ v2.0 Titan99  $
 * @link       http://www.wowroster.net
 * @package    Key_BC
 * @subpackage Admin
*/
if(isset($_POST['action']))
{
  if($_POST['action']=='add')
  {
    $query="INSERT INTO `" . $roster->db->table('Key','Key_BC') . "` ( `id` , `lang` , `id_display` , `instance_name` , `key_name` , `Type` , `order` )
            VALUES (
             '".addslashes($_POST['id'])."', '".$roster->config['locale']."',
             '".addslashes($_POST['id_display'])."', '".addslashes($_POST['instance_name'])."',
             '".addslashes($_POST['key_name'])."', '".$_POST['Type']."',
             '".$_POST['order']."'
            );";
    
    $result_key = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', 	basename(__FILE__),__LINE__,$query);
  }
  elseif($_POST['action']=='change')
  {
    $query="UPDATE `" . $roster->db->table('Key','Key_BC') . "` 
            SET `id` = '".addslashes($_POST['Mid'])."',
              `id_display` = '".addslashes($_POST['Mid_display'])."',
              `instance_name` = '".addslashes($_POST['Minstance_name'])."',
              `key_name` = '".addslashes($_POST['Mkey_name'])."',
              `Type` = '".$_POST['MType']."'
            WHERE `id` = '".$_POST['AMid']."' AND `lang` = '".$roster->config['locale']."' LIMIT 1;";
            
    $result_key = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', 	basename(__FILE__),__LINE__,$query);
    
    $query="UPDATE `" . $roster->db->table('Quest','Key_BC') . "` 
            SET `id` = '".addslashes($_POST['Mid'])."'
            WHERE `id` = '".$_POST['AMid']."';";
            
    $result_key = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', 	basename(__FILE__),__LINE__,$query);
  }
  else
  {
    $tab=explode("_",$_POST['action']);
    if($tab[0]=='del')
    {
      $query="DELETE FROM `" . $roster->db->table('Key','Key_BC') . "` WHERE `id` = '".$tab[1]."' AND `lang` = '".$roster->config['locale']."' LIMIT 1;";
    
      $result_key = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', 	basename(__FILE__),__LINE__,$query);

      $query="DELETE FROM `" . $roster->db->table('Quest','Key_BC') . "` WHERE `id` = '".$tab[1]."' AND `lang` = '".$roster->config['locale']."' LIMIT 1;";
    
      $result_key = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', 	basename(__FILE__),__LINE__,$query);
    }
  }
}

echo '<form action="' . makelink() . '" method="post" id="allow">
<input type="hidden" id="check" name="check" value="" />
<input type="hidden" id="action" name="action" value="" />';

echo border('sgreen','start','title');

?>

<table class="bodyline" cellspacing="0">
	<thead>
<!-- id   	 lang   	 id_display   	 instance_name   	 key_name   	 Type   	 order -->
		<tr>
			<th class="membersHeader" > Select</th>
			<th class="membersHeader" <?php echo makeOverlib("id");?>> id</th>
			<th class="membersHeader" <?php echo makeOverlib("id_display");?>> id_display</th>
			<th class="membersHeader" <?php echo makeOverlib("instance_name");?>> instance_name</th>
			<th class="membersHeader" <?php echo makeOverlib("key_name");?>> key_name</th>
			<th class="membersHeader" <?php echo makeOverlib("Type");?>> Type</th>
			<th class="membersHeader" <?php echo makeOverlib("order");?>> order</th>
			<th class="membersHeaderRight">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php
$query="SELECT *
	FROM `" . $roster->db->table('Key','Key_BC') . "`
	WHERE `lang`= '".$roster->config['locale']."'
	ORDER BY `order` ASC";

$result_key = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', 	basename(__FILE__),__LINE__,$query);

$max=0;

while($row = $roster->db->fetch($result_key))
{
?>
		<tr>
			<td class="membersRow1" style="text-align:center;">
<?php
  if(isset($_POST['check'])&&$_POST['check']==$row['id'])
  {
?>
 					<img src="img/check_on.png" alt="" />
<?php
    $id=$row['id'];
    $id_display=$row['id_display'];
    $instance_name=$row['instance_name'];
    $key_name=$row['key_name'];
    $Type=$row['Type'];
    $order=$row['order'];
  }
  else
  {
?>
				<button class="button_hide" onclick="setvalue('check','<?php echo $row['id'];?>');">
					<img src="img/check_off.png" alt="" />
				</button>
<?php
  }
?>
			</td>
			<td class="membersRow1"><?php echo $row['id'];?></td>
			<td class="membersRow1"><?php echo $row['id_display'];?></td>
			<td class="membersRow1"><?php echo $row['instance_name'];?></td>
			<td class="membersRow1"><?php echo $row['key_name'];?></td>
			<td class="membersRow1"><?php echo $row['Type'];?></td>
			<td class="membersRow1"><?php echo $row['order']; $max=$row['order'];?></td>
			<td class="membersRowRight1"><button type="submit" class="input" onclick="setvalue('action','del_<?php echo $row['id'];?>');">Delete</button></td>
		</tr>
<?php
}//end while
?>
		<tr>
			<td class="membersRow2" style="text-align:center;">&nbsp;</td>
			<td class="membersRow2"><input class="wowinput64" type="text" name="id" value="" MAXLENGTH="5"/></td>
			<td class="membersRow2"><input class="wowinput64" type="text" name="id_display" value=""  MAXLENGTH="10"/></td>
			<td class="membersRow2"><input class="wowinput128" type="text" name="instance_name" value="" MAXLENGTH="50"/></td>
			<td class="membersRow2"><input class="wowinput128" type="text" name="key_name" value="" MAXLENGTH="50"/></td>
			<td class="membersRow2">
  			<select name="Type">
          <option>Key-Only</option>
          <option>Quests</option>
          <option>Reputation</option>
        </select>
      </td>
			<td class="membersRow2"><?php echo ($max+1);?></td>
			<td class="membersRowRight2"><button type="submit" class="input" onclick="setvalue('action','add');">Add</button></td>
		</tr>
	</tbody>
</table>

<?php

echo border('sgreen','end');
echo '
<input type="hidden" id="order" name="order" value="'.($max+1).'" />
';

if(isset($_POST['check'])&&$_POST['check']!='')
{
echo '<br/><br/>';
echo border('syellow','start','title2');
?>
<table class="bodyline" cellspacing="0">
	<thead>
<!-- id   	 lang   	 id_display   	 instance_name   	 key_name   	 Type   	 order -->
		<tr>
			<th class="membersHeader" <?php echo makeOverlib("id");?>> id</th>
			<th class="membersHeader" <?php echo makeOverlib("id_display");?>> id_display</th>
			<th class="membersHeader" <?php echo makeOverlib("instance_name");?>> instance_name</th>
			<th class="membersHeader" <?php echo makeOverlib("key_name");?>> key_name</th>
			<th class="membersHeader" <?php echo makeOverlib("Type");?>> Type</th>
			<th class="membersHeaderRight">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="membersRow2"><input class="wowinput64" type="text" name="Mid" value="<?php echo $id;?>" MAXLENGTH="5"/></td>
			<td class="membersRow2"><input class="wowinput64" type="text" name="Mid_display" value="<?php echo $id_display;?>"  MAXLENGTH="10"/></td>
			<td class="membersRow2"><input class="wowinput128" type="text" name="Minstance_name" value="<?php echo $instance_name;?>" MAXLENGTH="50"/></td>
			<td class="membersRow2"><input class="wowinput128" type="text" name="Mkey_name" value="<?php echo $key_name;?>" MAXLENGTH="50"/></td>
			<td class="membersRow2">
  			<select name="MType">
          <option <?php if($Type=='Key-Only') echo 'selected';?> >Key-Only</option>
          <option <?php if($Type=='Quests') echo 'selected';?> >Quests</option>
          <option <?php if($Type=='Reputation') echo 'selected';?> >Reputation</option>
        </select>
      </td>
			<td class="membersRowRight2"><button type="submit" class="input" onclick="setvalue('action','change');">Change</button></td>
		</tr>
	</tbody>
</table>

<?php
echo '
<input type="hidden" id="AMid" name="AMid" value="'.$id.'" />
';
echo border('syellow','end');
echo "</form>";
}//end if(isset($_POST['check'])&&$_POST['check']==$row['id'])

?>
