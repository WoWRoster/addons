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
 * @package    Key_BC
 * @subpackage Admin
*/

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

echo border('syellow','start',$roster->locale->act['keybc_title_change_quest']);

?>

<table class="bodyline" cellspacing="0">
	<thead>
<!-- id   	 lang   	 id_display   	 instance_name   	 key_name   	 Type   	 order -->
		<tr>
			<th class="membersHeader" <?php echo makeOverlib($roster->locale->act['id_key_use']);?>> <?php echo $roster->locale->act['id_key'];?> </th>
			<th class="membersHeader" <?php echo makeOverlib($roster->locale->act['order_use']);?>> <?php echo $roster->locale->act['order'];?> </th>
			<th class="membersHeader" <?php echo makeOverlib($roster->locale->act['id_rfaction_use']);?>> <?php echo $roster->locale->act['id_rfaction'];?> </th>
			<th class="membersHeader" <?php echo makeOverlib($roster->locale->act['part']);?>> <?php echo $roster->locale->act['part'];?> </th>
			<th class="membersHeaderRight">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="membersRow2"><input class="wowinput64" type="text" name="QC_id" value="<?php echo $Q_id;?>" MAXLENGTH="5" readonly/></td>
			<td class="membersRow2"><input class="wowinput64" type="text" name="QC_order" value="<?php echo $Q_order;?>" /></td>
			<td class="membersRow2">
  			<select name="QC_Faction">
				<option <?php if($Q_Faction=='H') echo 'selected';?>>H</option>
				<option <?php if($Q_Faction=='A') echo 'selected';?>>A</option>
			</select>
			</td>
			<td class="membersRow2"><input class="wowinput128" type="text" name="QC_part" value="<?php echo $Q_part;?>" MAXLENGTH="50"/></td>
		
			<td class="membersRowRight2"><button type="submit" class="input" onclick="setvalue('action','Qchange');"><?php echo $roster->locale->act['update'];?></button></td>
		</tr>
	</tbody>
</table>
<?php
echo '<input type="hidden" id="AQ_order" name="AQ_order" value="'.$Q_order.'" />
<input type="hidden" id="AQ_Faction" name="AQ_Faction" value="'.$Q_Faction.'" />';
echo border('syellow','end');
?>
