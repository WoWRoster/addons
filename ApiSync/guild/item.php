<?php
	
	/*
	$queryx = "SELECT * FROM `" . $roster->db->table('talenttree_data') . "`";
	$resultx = $roster->db->query($queryx);
	$usage = array();
	while ($row = $roster->db->fetch($resultx))
	{
		echo '<img src="img/Interface/icons/'.$row['icon'].'.png"></a>';
	}
	*/
	foreach($roster->locale->act['ts_iconArray'] as $name => $icon)
	{
	echo '<img src="img/Interface/icons/'.$icon.'.png"></a>';
	}
	
/*
$name = 'Zonous';
$server = 'Zangarmarsh';
$feed = $roster->api->Char->getCharInfo('Zangarmarsh','Zonous','1');
$e = $feed['thumbnail'];
$c = explode("-", $e);

$img_url = "http://us.battle.net/static-render/us/".$c[0]."-profilemain.jpg";
$save_path = $addon['dir'].'x/'.$name.'-'.$server.'.jpg';
save_image($img_url,$save_path);


function save_image($inPath,$outPath)
{
	//Download images from remote server
	$in=    fopen($inPath, "rb");
	$out=   fopen($outPath, "wb");
	while ($chunk = fread($in,8192))
	{
		fwrite($out, $chunk, 8192);
	}
	fclose($in);
	fclose($out);
	if (file_exists($outPath))
	{
		return true;
	}
	else
	{
		return false;
	}
}

echo $c[0].'<br>';
echo basename($e);
/*
function save_image($inPath,$outPath)
{
	//Download images from remote server
	$in=    fopen($inPath, "rb");
	$out=   fopen($outPath, "wb");
	while ($chunk = fread($in,8192))
	{
		fwrite($out, $chunk, 8192);
	}
	fclose($in);
	fclose($out);
	if (file_exists($outPath))
	{
		return true;
	}
	else
	{
		return false;
	}
}

	$query = "SELECT * FROM `".$roster->db->table('members')."`";			
	$result = $roster->db->query($query);

	while($char = $roster->db->fetch($result))
	{
		$feed = $roster->api->Char->getCharInfo($char['server'],$char['name'],'1');
		
		$name = $char['name'];
		$server = $char['server'];

		if (isset($feed['thumbnail']))
		{
			$e = $feed['thumbnail'];
			$c = explode("-", $e);

			$img_url = "http://us.battle.net/static-render/us/".$c[0]."-profilemain.jpg";
			//$save_path = $addon['dir'].'x/'.$name.'-'.$server.'.jpg';
			$save_path = $addon['dir'].'x/'.$char['member_id'].'.jpg';
			if (!save_image($img_url,$save_path))
			{
				echo ' - <font color=red>Not saves</font><br>';
			}
			else
			{
				echo ' - <font color=green>Saved '.$name.'-'.$server.'</font><br>';
				
				$file = $char['member_id'].'.jpg';
				$dir = $addon['dir'].'x/';
				list($width, $height) = getimagesize($dir.$file);
				$im = imagecreatetruecolortrans( 369,479 );
				$saved_image = $dir.'thumb-'.strtolower($file);
				$im_temp = imagecreatefromjpeg($dir.$file);
				//imagecopyresampled($im, $im_temp, 0, 0, 213, 45, 369, 479, $width, $height);
				@imagecopy( $im,$im_temp,0,0,213, 45, 369, 479 );
				//header('Content-type: image/png');
				imagePng( $im,$saved_image );//imagepng($im);
				imagedestroy($im);
				imagedestroy($im_temp);
			}
		}
	}
		function imagecreatetruecolortrans($x,$y)
    {
        $i = @imagecreatetruecolor($x,$y)
			or debugMode( (__LINE__),'Cannot Initialize new GD image stream','',0,'Make sure you have the latest version of GD2 installed' );

        $b = imagecreatefromstring(base64_decode(blankpng()));

        imagealphablending($i,false);
        imagesavealpha($i,true);
        imagecopyresized($i,$b,0,0,0,0,$x,$y,imagesx($b),imagesy($b));
        imagealphablending($i,true);

        return $i;
    }
    function blankpng()
	{
		$c  = "iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29m".
			"dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAADqSURBVHjaYvz//z/DYAYAAcTEMMgBQAANegcCBNCg".
			"dyBAAA16BwIE0KB3IEAADXoHAgTQoHcgQAANegcCBNCgdyBAAA16BwIE0KB3IEAADXoHAgTQoHcgQAAN".
			"egcCBNCgdyBAAA16BwIE0KB3IEAADXoHAgTQoHcgQAANegcCBNCgdyBAAA16BwIE0KB3IEAADXoHAgTQ".
			"oHcgQAANegcCBNCgdyBAAA16BwIE0KB3IEAADXoHAgTQoHcgQAANegcCBNCgdyBAAA16BwIE0KB3IEAA".
			"DXoHAgTQoHcgQAANegcCBNCgdyBAgAEAMpcDTTQWJVEAAAAASUVORK5CYII=";
		return $c;
	}
*/

/*
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
			*
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
			//
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
				*	
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
				//
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
*/