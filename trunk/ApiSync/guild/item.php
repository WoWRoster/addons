<?php
require_once (ROSTER_LIB . 'update.lib.php');
		$update = new update();	
echo ROSTER_PATH.'<br>';
	$a = $roster->api->Data->getAchievInfo();
	$rx = 0;
	$rc = 0;
foreach($a['achievements'] as $order => $cat)
{
	echo $cat['name'].' - '.$cat['id'].'<br>';
	if (isset($cat['achievements']))
	{
		foreach($cat['achievements'] as $d => $achi)
		{
			//echo '-----'.$achi['title'].'<br>';
			/*
			[id] => 6
			[title] => Level 10
			[points] => 10
			[description] => Reach level 10.
			[rewardItems] => Array
			[icon] => achievement_level_10
			*/	
			$tooltip = '<div style="width:100%;style="color:#FFB100""><span style="float:right;">' . $achi['points'] . ' Points</span>' . $achi['title'] . '</div><br>' . $achi['description'] . '';
			$crit='';
			$crit .= '<br><div class="meta-achievements"><ul>';
			foreach ($achi['criteria'] as $r => $d)
			{
				$crit .= '<li>'.$d['description'].'</li>';
				$update->reset_values();
				$update->add_value('crit_achie_id',	$achi['id']);
				$update->add_value('crit_id',		$d['id']);
				$update->add_value('crit_desc',		$d['description']);
				$querystr = "INSERT INTO `roster_addons_achievements_crit` SET " . $update->assignstr;
				//$result = $roster->db->query($querystr);
				//echo $querystr.'<br>';
				$rc++;
			}
			$crit .= '</ul></div>';
				
			$tooltip .= $crit;
				
			$update->reset_values();
			$update->add_value('achie_name',	$achi['title']);
			$update->add_value('achie_desc',	$achi['description']);
			$update->add_value('achie_points',	$achi['points']);
			$update->add_value('achie_id',		$achi['id']);
			$update->add_value('achie_icon',	$achi['icon']);
			$update->add_value('achie_tooltip',	$tooltip);
			$update->add_value('c_id',			$cat['id']);
			$update->add_value('p_id',			'-1');
			$update->add_value('achi_cate',		$cat['name']);
			
			$querystr = "INSERT INTO `roster_addons_achievements_achie` SET " . $update->assignstr;
			//$result = $roster->db->query($querystr);
			//echo$querystr.'<br>';
			$rx++;
			//*/
		}
	}
	if (isset($cat['categories']))
	{
		foreach($cat['categories'] as $corder => $sub)
		{
			echo '--'.$sub['name'].' - '.$sub['id'].'<br>';
			foreach($sub['achievements'] as $d => $achi)
			{
				//echo '-----'.$achi['title'].'<br>';
				/*
				[id] => 6
				[title] => Level 10
				[points] => 10
				[description] => Reach level 10.
				[rewardItems] => Array
				[icon] => achievement_level_10
				*/	
				$tooltip = '<div style="width:100%;style="color:#FFB100""><span style="float:right;">' . $achi['points'] . ' Points</span>' . $achi['title'] . '</div><br>' . $achi['description'] . '';
				$crit='';
				$crit .= '<br><div class="meta-achievements"><ul>';
				foreach ($achi['criteria'] as $r => $d)
				{
					$crit .= '<li>'.$d['description'].'</li>';
					
					$update->reset_values();
					$update->add_value('crit_achie_id',	$achi['id']);
					$update->add_value('crit_id',		$d['id']);
					$update->add_value('crit_desc',		$d['description']);
					$querystr = "INSERT INTO `roster_addons_achievements_crit` SET " . $update->assignstr;
					//$result = $roster->db->query($querystr);
					//echo $querystr.'<br>';
					$rc++;
				}
				$crit .= '</ul></div>';
					
				$tooltip .= $crit;
				
				$update->reset_values();
				$update->add_value('achie_name',	$achi['title']);
				$update->add_value('achie_desc',	$achi['description']);
				$update->add_value('achie_points',	$achi['points']);
				$update->add_value('achie_id',		$achi['id']);
				$update->add_value('achie_icon',	$achi['icon']);
				$update->add_value('achie_tooltip',	$tooltip);
				$update->add_value('c_id',			$sub['id']);
				$update->add_value('p_id',			$cat['id']);
				$update->add_value('achi_cate',		$sub['name']);
				
				$querystr = "INSERT INTO `roster_addons_achievements_achie` SET " . $update->assignstr;
				//$result = $roster->db->query($querystr);
				//echo $querystr.'<br>';
				$rx++;
				//*/
			}
		}
	}
}	
echo '<br><hr><br> Achievements '.$rx.'<br>Criteria '.$rc.'<br>';
	echo '<pre>';
	print_r($a);
	echo '</pre>';
	echo '<br><hr><br>';
	echo '<pre>';
