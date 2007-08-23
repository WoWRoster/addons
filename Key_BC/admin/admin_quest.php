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

echo border('sblue','start',$roster->locale->act['keybc_title_manage_quest']);
?>
<input type="hidden" id="Qcheck" name="Qcheck" value=" " />

<table class="bodyline" cellspacing="0">
	<thead>
<!-- id   	 lang   	 order   	 Faction   	 part -->
		<tr>
			<th class="membersHeader" > <?php echo $roster->locale->act['Select'];?></th>
			<th class="membersHeader" <?php echo makeOverlib($roster->locale->act['id_key_use']);?>> <?php echo $roster->locale->act['id_key'];?> </th>
			<th class="membersHeader" <?php echo makeOverlib($roster->locale->act['order_use']);?>> <?php echo $roster->locale->act['order'];?> </th>
			<th class="membersHeader" <?php echo makeOverlib($roster->locale->act['id_rfaction_use']);?>> <?php echo $roster->locale->act['id_rfaction'];?> </th>
			<th class="membersHeader" <?php echo makeOverlib($roster->locale->act['part']);?>> <?php echo $roster->locale->act['part'];?> </th>			
			<th class="membersHeaderRight">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php
$query="SELECT *
	FROM `" . $roster->db->table('Quest','Key_BC') . "`
	WHERE `lang`= '".$roster->config['locale']."'
	AND id= '$id'
	ORDER BY `order` ASC";

$result_key = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', 	basename(__FILE__),__LINE__,$query);

$max=0;
$Q_id=$id;
$Q_pk='';
$Q_change='';

while($row = $roster->db->fetch($result_key))
{
?>
		<tr>
			<td class="membersRow1" style="text-align:center;">
<?php
  $Q_pk=$row['id']."_".$row['order']."_".$row['Faction'];

  if(isset($_POST['Qcheck'])&&$_POST['Qcheck']==$Q_pk)
  {
?>
 					<img src="img/check_on.png" alt="" />
<?php
	$Q_id=$row['id'];
	$Q_order=$row['order'];
	$Q_Faction=$row['Faction'];
	$Q_part=$row['part'];
	$Q_change=1;
  }
  else
  {
?>
				<button class="button_hide" onclick="setvalue('Qcheck','<?php echo $Q_pk ;?>');">
					<img src="img/check_off.png" alt="" />
				</button>
<?php
  }
?>
			</td>
			<td class="membersRow1"><?php echo $row['id'];?></td>
			<td class="membersRow1"><?php echo $row['order']; $max=$row['order'];?></td>
			<td class="membersRow1"><?php echo $row['Faction'];?></td>
			<td class="membersRow1"><?php echo $row['part'];?></td>
			<td class="membersRowRight1"><button type="submit" class="input" onclick="setvalue('action','Qdel_<?php echo $Q_pk;?>');"><?php echo $roster->locale->act['delete'];?></button></td>
		</tr>
<?php
}//end while
?>
		<tr>
			<td class="membersRow2" style="text-align:center;">&nbsp;</td>
			<td class="membersRow2"><input class="wowinput64" type="text" name="Q_id" value="<?php echo $Q_id;?>" MAXLENGTH="5" readonly/></td>
			<td class="membersRow2"><input class="wowinput64" type="text" name="Q_order" value="<?php echo $max+1;?>" /></td>
			<td class="membersRow2">
  			<select name="Q_Faction">
				<option>H</option>
				<option>A</option>
			</select>
			</td>
			<td class="membersRow2"><input class="wowinput128" type="text" name="Q_part" value="" MAXLENGTH="50"/></td>
		
			<td class="membersRowRight2"><button type="submit" class="input" onclick="setvalue('action','Qadd');"><?php echo $roster->locale->act['add'];?></button></td>
		</tr>
	</tbody>
</table>
<?php
echo border('sblue','end');
?>
