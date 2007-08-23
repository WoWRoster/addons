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

echo border('syellow','start',$roster->locale->act['keybc_title_change_reput']);

$query="SELECT *
	FROM `" . $roster->db->table('Quest','Key_BC') . "`
	WHERE `lang`= '".$roster->config['locale']."'
	AND id= '$id'
	AND Faction= 'H'
	ORDER BY `order` ASC";

$result_key = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', 	basename(__FILE__),__LINE__,$query);

$max=0;
$Q_id='';
$Q_pk='';

if($row = $roster->db->fetch($result_key))
{
	$Q_pk=$row['id']."_".$row['order']."_".$row['Faction'];
	$Q_id=$row['id'];
	$Q_order=$row['order'];
	$Q_Faction=$row['Faction'];
	$Q_part=explode('|',$row['part']);
	
}


?>

<table class="bodyline" cellspacing="0">
	<thead>
<!-- id   	 lang   	 id_display   	 instance_name   	 key_name   	 Type   	 order -->
		<tr>
			<th class="membersHeader" <?php echo makeOverlib($roster->locale->act['id_key_use']);?>> <?php echo $roster->locale->act['id_key'];?> </th>
			<th class="membersHeader" <?php echo makeOverlib($roster->locale->act['id_faction_use']);?>> <?php echo $roster->locale->act['id_faction'];?> </th>
			<th class="membersHeader" <?php echo makeOverlib($roster->locale->act['id_rfaction_use']);?>> <?php echo $roster->locale->act['id_rfaction'];?> </th>
			<th class="membersHeader" <?php echo makeOverlib($roster->locale->act['id_rlevel_use']);?>> <?php echo $roster->locale->act['id_rlevel'];?> </th>
			<th class="membersHeaderRight">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="membersRow2">
				<input class="wowinput64" type="text" name="RH_id" value="<?php echo $id;?>" MAXLENGTH="5" readonly/>
			</td>
			<td class="membersRow2">
				<input class="wowinput64" type="text" name="RH_Faction" value="H" readonly/>
			</td>
			<td class="membersRow2"><input class="wowinput128" type="text" name="RH_part1" value="<?php echo $Q_part[0];?>" MAXLENGTH="35"/></td>
			<td class="membersRow2"><input class="wowinput128" type="text" name="RH_part2" value="<?php echo $Q_part[1];?>" MAXLENGTH="15"/></td>
			<td class="membersRowRight2">
<?php
	if($Q_id=='')
	{
?>
				<button type="submit" class="input" onclick="setvalue('action','RHAdd');"><?php echo $roster->locale->act['add'];?></button>
<?php
	}
	else
	{
?>
				<button type="submit" class="input" onclick="setvalue('action','RHchange');"><?php echo $roster->locale->act['update'];?></button>
<?php
	}
?>
			</td>
		</tr>
	</tbody>
</table>
<?php
$query="SELECT *
	FROM `" . $roster->db->table('Quest','Key_BC') . "`
	WHERE `lang`= '".$roster->config['locale']."'
	AND id= '$id'
	AND Faction= 'A'
	ORDER BY `order` ASC";

$result_key = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error', 	basename(__FILE__),__LINE__,$query);

$max=0;
$Q_id='';
$Q_pk='';

if($row = $roster->db->fetch($result_key))
{
	$Q_pk=$row['id']."_".$row['order']."_".$row['Faction'];
	$Q_id=$row['id'];
	$Q_order=$row['order'];
	$Q_Faction=$row['Faction'];
	$Q_part=explode('|',$row['part']);
	
}


?>

<table class="bodyline" cellspacing="0">
	<thead>
<!-- id   	 lang   	 id_display   	 instance_name   	 key_name   	 Type   	 order -->
		<tr>
			<th class="membersHeader" <?php echo makeOverlib($roster->locale->act['id_key_use']);?>> <?php echo $roster->locale->act['id_key'];?> </th>
			<th class="membersHeader" <?php echo makeOverlib($roster->locale->act['id_faction_use']);?>> <?php echo $roster->locale->act['id_faction'];?> </th>
			<th class="membersHeader" <?php echo makeOverlib($roster->locale->act['id_rfaction_use']);?>> <?php echo $roster->locale->act['id_rfaction'];?> </th>
			<th class="membersHeader" <?php echo makeOverlib($roster->locale->act['id_rlevel_use']);?>> <?php echo $roster->locale->act['id_rlevel'];?> </th>
			<th class="membersHeaderRight">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="membersRow2">
				<input class="wowinput64" type="text" name="RA_id" value="<?php echo $id;?>" MAXLENGTH="5" readonly/>
			</td>
			<td class="membersRow2">
				<input class="wowinput64" type="text" name="RA_Faction" value="A" readonly/>
			</td>
			<td class="membersRow2"><input class="wowinput128" type="text" name="RA_part1" value="<?php echo $Q_part[0];?>" MAXLENGTH="35"/></td>
			<td class="membersRow2"><input class="wowinput128" type="text" name="RA_part2" value="<?php echo $Q_part[1];?>" MAXLENGTH="15"/></td>
			<td class="membersRowRight2">
<?php
	if($Q_id=='')
	{
?>
				<button type="submit" class="input" onclick="setvalue('action','RAAdd');"><?php echo $roster->locale->act['add'];?></button>
<?php
	}
	else
	{
?>
				<button type="submit" class="input" onclick="setvalue('action','RAchange');"><?php echo $roster->locale->act['update'];?></button>
<?php
	}
?>
			</td>
		</tr>
	</tbody>
</table>
<?php
echo '<input type="hidden" id="AMid" name="AMid" value="'.$id.'" />';
echo border('syellow','end');
?>
