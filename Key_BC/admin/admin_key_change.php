<?php
/**
 * WoWRoster.net WoWRoster
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $ v0.5 Titan99 and Tyradil $
 * @link       http://www.wowroster.net
 * @package    GemsDisplay
 * @subpackage Admin
*/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

echo border('syellow','start',$roster->locale->act['keybc_title_change_key']);

?>

<table class="bodyline" cellspacing="0">
	<thead>
<!-- id   	 lang   	 id_display   	 instance_name   	 key_name   	 Type   	 order -->
		<tr>
			<th class="membersHeader" <?php echo makeOverlib($roster->locale->act['id_key_use']);?>> <?php echo $roster->locale->act['id_key'];?> </th>
			<th class="membersHeader" <?php echo makeOverlib($roster->locale->act['id_display_use']);?>> <?php echo $roster->locale->act['id_display'];?> </th>
			<th class="membersHeader" <?php echo makeOverlib($roster->locale->act['instance_name_use']);?>> <?php echo $roster->locale->act['instance_name'];?> </th>
			<th class="membersHeader" <?php echo makeOverlib($roster->locale->act['key_name_use']);?>> <?php echo $roster->locale->act['key_name'];?> </th>
			<th class="membersHeader" <?php echo makeOverlib($roster->locale->act['Type_use']);?>> <?php echo $roster->locale->act['Type'];?> </th>
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
			<td class="membersRowRight2"><button type="submit" class="input" onclick="setvalue('action','change');"><?php echo $roster->locale->act['update'];?></button></td>
		</tr>
	</tbody>
</table>
<?php
echo '<input type="hidden" id="AMid" name="AMid" value="'.$id.'" />';
echo border('syellow','end');
?>
