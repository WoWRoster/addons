<?php
require_once ($addon['dir'] . 'inc/constants.php');
function return_class($classid) {
    switch ($classid) {
        case 1:
            $class = "Warrior";
            break;
        case 2:
            $class = "Paladin";
            break;
        case 3:
            $class = "Hunter";
            break;
        case 4:
            $class = "Rogue";
            break;
        case 5:
            $class = "Priest";
            break;
        case 6:
            $class = "Death Knight";
            break;
        case 7:
            $class = "Shaman";
            break;
        case 8:
            $class = "Mage";
            break;
        case 9:
            $class = "Warlock";
            break;
        case 11:
            $class = "Druid";
            break;
    }
    return $class;
}
function return_race($raceid) {
    switch ($raceid) {
        case 1:
            $race = "Human";
            break;
        case 2:
            $race = "Orc";
            break;
        case 3:
            $race = "Dwarf";
            break;
        case 4:
            $race = "Night Elf";
            break;
        case 5:
            $race = "Undead";
            break;
        case 6:
            $race = "Tauren";
            break;
        case 7:
            $race = "Gnome";
            break;
        case 8:
            $race = "Troll";
            break;
        case 10:
            $race = "Blood Elf";
            break;
        case 11:
            $race = "Draenei";
            break;
    }
    return $race;
}
function return_gender($genderid) {
    if ($genderid == "0") {$gender = "Male";}
    if ($genderid == "1") {$gender = "Female";}
    return $gender;
}


echo 'hello';
echo $roster->data['guild_name'];
//aprint($roster);
include (ROSTER_LIB .'armory.class.php');
 
$armory = new Rosterarmory;
 $data = $armory->pull_xmln(null, $roster->data['guild_name'], $roster->data['server'], 'roster');
 //aprint($data);
echo '<h1>'.$data->guildInfo->guildHeader['name'].'</h1><br>';    

	if (isset($data->guildInfo->guildHeader['name']))
        {
		$armory->_debug( 1, null, 'Guild Data retrived', 'OK');
        }
        else
        {
        	$armory->_debug( 1, null, 'Guild Data retrived', 'Failed');
        }

	$members_list = $data->guildInfo->guild->members->character;

        if ($data->guildInfo->guildHeader['faction'] == "0") {$faction = "Alliance";}
	if ($data->guildInfo->guildHeader['faction'] == "1") {$faction = "Horde";}

        $query =    "SELECT ".
                    "guild_id ".
                    "FROM `". $roster->db->table('guild'). "` ".
                    "WHERE ".
                    "`guild_name`='". $roster->db->escape($data->guildInfo->guildHeader['name']). "' ".
                    "AND `server`='". $roster->db->escape($data->guildInfo->guildHeader['realm']). "';";
	$ret = $roster->db->query_first($query);

        if ( $ret )
        {
                $queryx = "SELECT guild_id FROM `". $roster->db->table('guild'). "` WHERE `guild_name`='". $roster->db->escape($data->guildInfo->guildHeader['name']). "'";
                	$retx = $roster->db->query_first($queryx);
                        $gID =  $retx;//gdi['guild_id'];
		$query =    "Update `". $roster->db->table('guild'). "` ".
                        "SET ".
                        "`server`='". $roster->db->escape($data->guildInfo->guildHeader['realm']). "', ".
                        "`faction`='". $roster->db->escape($faction). "', ".
                        "`factionEn`='". $roster->db->escape($faction). "', ".
                        "`guild_num_members`='". $data->guildInfo->guildHeader['count']. "', ".
                        "`region`='". $roster->db->escape($roster->data['region']). "' ".
                        " WHERE `guild_id`='". $gID . "';";

		$armory->_debug( 1, null, 'Guild '.$data->guildInfo->guildHeader['name'].' Updated', 'OK');

           	if ( !$roster->db->query($query) )
                {
                	die_quietly($roster->db->error(),'Database Error',__FILE__,__LINE__,$query);
            	}
        		$queryx = "SELECT guild_id FROM `". $roster->db->table('guild'). "` WHERE `guild_name`='". $roster->db->escape($data->guildInfo->guildHeader['name']). "'";
                	$retx = $roster->db->query_first($queryx);
                        $gID =  $retx;//gdi['guild_id'];


       }
       else
       {
        $query =    "INSERT ".
                        "INTO `". $roster->db->table('guild'). "` ".
                        "SET ".
                        "`guild_name`='". $roster->db->escape($data->guildInfo->guildHeader['name']). "', ".
                        "`server`='". $roster->db->escape($data->guildInfo->guildHeader['realm']). "', ".
                        "`faction`='". $roster->db->escape($faction). "', ".
                        "`factionEn`='". $roster->db->escape($faction). "', ".
                        "`guild_num_members`='". $data->guildInfo->guildHeader['count']. "', ".
                         "`region`='" . $roster->data['region'] . "';";
           //echo $query.'<br>';
            $ret2 = $roster->db->query($query);
            if ( !$ret2 ) {
                die_quietly($roster->db->error(),'Database Error',__FILE__,__LINE__,$query);
                $armory->_debug( 1, null, 'Guild '.$data->guildInfo->guildHeader['name'].'  Added', 'Fail');
            }
            else
            {
                	$queryx = "SELECT guild_id FROM `". $roster->db->table('guild'). "` WHERE `guild_name`='". $roster->db->escape($data->guildInfo->guildHeader['name']). "'";
                	$retx = $roster->db->query_first($queryx);
                        $gID =  $retx;//gdi['guild_id'];
                $armory->_debug( 2, null, 'Guild '.$data->guildInfo->guildHeader['name'].' Added', 'OK');
            }
       }
       //now add members ...
      //$datam = $armory->pull_xmln('', $roster->data['guild_name'], $roster->data['server'], 'character');
     // aprint($datam);
     $querym = "DELETE FROM `". $roster->db->table('members'). "` WHERE `guild_id` ='".$gID."'";
      $rem = $roster->db->query($querym);
       foreach($members_list as $player => $member)
       {
       		$query = "INSERT INTO `". $roster->db->table('members'). "` (`name`, `server`, `region`, `guild_id`, `class`, `classid`, `level`, `guild_rank`, `active`) VALUES
 		('".$member['name']."', '".$data->guildInfo->guildHeader['realm']."', '" . $roster->data['region'] . "', '".$gID."', '". return_class($member['classId'])."', '". $member['classId']."', '". $member['level']."', '". $member['rank']."', '1');";
      		$retm = $roster->db->query($query);

                if (!$retm)
                {
                	$armory->_debug( 1, null, 'Failed to Add "'.$member['name'].'" ', 'Failed');
                }
       }
       echo "You may now sechronize your memberlist with Guild->ArmorySync Character";
$armory->_showFooter();
 //aprint($data);






