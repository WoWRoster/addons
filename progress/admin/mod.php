<?php


      $info = '';


	// Initialize output
	$addons = '';
	$output = '';
	$stripe = 0;
      $mod_dir = $addon['dir'].'moduels/';
      $message = '';
      $imgext = $roster->config['img_suffix'];
      
      include(ROSTER_LIB . 'install.lib.php');
            $installer = new Install;
            
      if( $handle = @opendir($mod_dir) )
	{
		while( false !== ($file = readdir($handle)) )
		{
			if( $file != '.' && $file != '..' && $file != '.svn' )
			{
				$mods[] = $file;
			}
		}
	}      
      usort($mods, 'strnatcasecmp');
      //print_r($mods);
      
      if (isset($_GET['uninstallmd']))
      {
            $modun = $_GET['uninstallmd'];
            
            $query = 'SELECT * FROM `' . $roster->db->table('mods',$addon['basename']) . '` WHERE `mod_basename` = "' . $modun . '";';
            $result = $roster->db->query($query);
            if( !$result )
            {
		      $installer->seterrors(sprintf($roster->locale->act['installer_fetch_failed'],$output[$info]['basename']) . '.<br />MySQL said: ' . $roster->db->error(),$roster->locale->act['installer_error']);
		      return;
            }
            $previous = $roster->db->fetch($result);
            
            //ok delete the info from the mod_info table
            $query1 = 'delete FROM `' . $roster->db->table('mod_info',$addon['basename']) . '` WHERE `m_name` = "' . $modun . '";';
            $result1 = $roster->db->query($query1);
            //delete the mods table entry
            $query2 = 'delete FROM `' . $roster->db->table('mods',$addon['basename']) . '` WHERE `mod_basename` = "' . $modun . '";';
            $result2 = $roster->db->query($query2);
            $title = 'pro'.$modun;
            $query3 = "DELETE FROM `" . $roster->db->table('menu_button') . "` WHERE `addon_id`='" . $addon['addon_id'] . "' AND `title`='" . $title . "'";
            $result3 = $roster->db->query($query3);
            $installer->remove_menu_button('pro'.$modun);
            
            $message .= "Mod '".$modun."' Uninstalled";
      }
      
      if (isset($_GET['upgrademd']))
      {
            $mod = $_GET['upgrademd'];
            
            $installfile = $mod_dir . $mod . DIR_SEP . 'install.php';
		$install_class = $mod.'Install';

		if( file_exists($installfile) )
		{
				include_once($installfile);
				
				$localetemp = $roster->locale->wordings;
	                  foreach( $roster->multilanguages as $lang )
                        {
		                  $roster->locale->add_locale_file($mod_dir = $addon['dir'].'moduels' . DIR_SEP . $mod . DIR_SEP . $lang . '.php',$lang);
                        }

                        $roster->locale->wordings = $localetemp;
                        unset($localetemp);
	                  $addonstuff = new $install_class;
                        
				// Save current locale array
				// Since we add all locales for localization, we save the current locale array
				// This is in case one addon has the same locale strings as another, and keeps them from overwritting one another
				$localetemp = $roster->locale->wordings;

				foreach( $roster->multilanguages as $lang )
				{
					$roster->locale->add_locale_file($mod_dir . $mod . DIR_SEP . $lang . '.php',$lang);
				}
                        $stripe = (($stripe%2)+1);
				$output[$info]['basename'] = $mod;
				$output[$info]['fullname'] = ( isset($roster->locale->act[$addonstuff->fullname]) ? $roster->locale->act[$addonstuff->fullname] : $addonstuff->fullname );
				$output[$info]['author'] = $addonstuff->credits[0]['name'];
				$output[$info]['version'] = $addonstuff->version;
				$output[$info]['icon'] = $addonstuff->icon;
				$output[$info]['description'] = ( isset($roster->locale->act[$addonstuff->description]) ? $roster->locale->act[$addonstuff->description] : $addonstuff->description );
                        $binfo = $addonstuff->info;
                        $upgradeinfo = $addonstuff->upgrade;
                        
                       ///print_r($upgradeinfo);
                        foreach  ($upgradeinfo['I'] as $boss => $lt)
                        {
                              //echo $boss.'<br>';
                              
                              foreach  ($lt as $b => $c)
                              {
                              echo $boss . '<br>';// - ' . $c['item_texture'] .' - ' . $c['item_quality'] .' - ' . $c['item_sub_head'].'<br>';
                                    $modinst = '';
                                    foreach  ($c['info'] as $x => $y)
                                    {
                                          //echo $y['item_id'] . ' + ' . $y['item_texture'] . ' + ' . $y['item_quality'] . ' + ' . $y['item_name'] .'<br>';
                                          $modinst = "INSERT INTO `" . $roster->db->table('mod_info',$addon['basename']) . "` VALUES (NULL, $mod_id,".
                                    "'".$output[$info]['basename']."',".
                                    "'".$data['guild_id']."',".
                                    "'".$boss."',".
                                    "'".$b."',".
                                    "'".strtolower($c['item_texture'])."',".
                                    "'".$c['item_quality']."',".
                                    "'".(!empty($c['item_sub_head']) ? $c['item_sub_head'] : '')."',".
                                    "'".addslashes($y['item_name'])."',".
                                    "'".strtolower($y['item_texture'])."',".
                                    "'".$y['item_id']."',".
                                    "'',".
                                    "'".$y['item_quality']."',".
                                    "'no',".
                                    "null".
                                    ");";
                                    //echo $modinst.'<br>';
                                    //$modinstrst = $roster->db->query($modinst) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$modinst);
                                    }
                                    
                              }
                                    
                        }
                        
                        foreach  ($upgradeinfo['U'] as $boss => $lt)
                        {

                                    echo $boss . '<br>';
                              
                        }
            }
      }
      
      
      
      if (isset($_GET['installmd']))
      {
      
      if( is_array($mods) )
	{
		foreach( $mods as $mod )
		{
		echo $mod;
		if ($_GET['installmd'] == $mod)
		{
			$installfile = $mod_dir . $mod . DIR_SEP . 'install.php';
			$install_class = $mod.'Install';

			if( file_exists($installfile) )
			{
				include_once($installfile);
				
				$localetemp = $roster->locale->wordings;
	                  foreach( $roster->multilanguages as $lang )
                        {
		                  $roster->locale->add_locale_file($mod_dir = $addon['dir'].'moduels' . DIR_SEP . $mod . DIR_SEP . $lang . '.php',$lang);
                        }

                        $roster->locale->wordings = $localetemp;
                        unset($localetemp);
	                  $addonstuff = new $install_class;
                        
				// Save current locale array
				// Since we add all locales for localization, we save the current locale array
				// This is in case one addon has the same locale strings as another, and keeps them from overwritting one another
				$localetemp = $roster->locale->wordings;

				foreach( $roster->multilanguages as $lang )
				{
					$roster->locale->add_locale_file($mod_dir . $mod . DIR_SEP . $lang . '.php',$lang);
				}
                        $stripe = (($stripe%2)+1);
				$output[$info]['basename'] = $mod;
				$output[$info]['fullname'] = ( isset($roster->locale->act[$addonstuff->fullname]) ? $roster->locale->act[$addonstuff->fullname] : $addonstuff->fullname );
				$output[$info]['author'] = $addonstuff->credits[0]['name'];
				$output[$info]['version'] = $addonstuff->version;
				$output[$info]['icon'] = $addonstuff->icon;
				$output[$info]['description'] = ( isset($roster->locale->act[$addonstuff->description]) ? $roster->locale->act[$addonstuff->description] : $addonstuff->description );
                        $binfo = $addonstuff->info;
                        $installer->add_menu_button('pro'.$mod.'','pro','guild-progress-mods&amp;mod='.$mod.'',$output[$info]['icon']);
                        $menus = "INSERT INTO `" . $roster->db->table('menu_button') . "` VALUES (NULL,'" . $addon['addon_id'] . "','pro" . $output[$info]['basename'] . "','pro','guild-progress-mods&amp;mod=$mod','" . $output[$info]['icon'] . "');";
                        //echo $menus.'<br>';
                        $resulta = $roster->db->query($menus) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$menus);
                        
                        $menud = "UPDATE `" . $roster->db->table('menu') . "` SET `config` = CONCAT(`config`,':','b',LAST_INSERT_ID()) WHERE `section` = 'pro' LIMIT 1;";
                        $resultb = $roster->db->query($menud) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$menud);

                        // inset info into rp mods table
                        $modinst = "INSERT INTO `" . $roster->db->table('mods',$addon['basename']) . "` VALUES (NULL,'" . $output[$info]['fullname'] . "','" . $output[$info]['description'] . "','" . $output[$info]['author'] . "','" . $output[$info]['version'] . "','" . $output[$info]['basename'] . "', 'yes');";
                        $resultmi = $roster->db->query($modinst) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$modinst);
                        //get our mod id to carry over to info installer
                        $query = 'SELECT * FROM `' . $roster->db->table('mods',$addon['basename']) . '` WHERE `mod_basename` = "' . $output[$info]['basename'] . '";';
                        $result = $roster->db->query($query);
                        if( !$result )
                        {
		                $installer->seterrors(sprintf($roster->locale->act['installer_fetch_failed'],$output[$info]['basename']) . '.<br />MySQL said: ' . $roster->db->error(),$roster->locale->act['installer_error']);
		                return;
                        }
                        $previous = $roster->db->fetch($result);
                        $mod_id = $previous['mod_id'];
                        
                        $errorstringout = $installer->geterrors();
                        $messagestringout = $installer->getmessages();
                        
                        //install mod data 
                     
                        echo $errorstringout.$messagestringout.'<br>';
                        
                        $query = "SELECT `guild_name`, CONCAT(`region`,'-',`server`), `guild_id` FROM `" . $roster->db->table('guild') . "`"
				   . " ORDER BY `region` ASC, `server` ASC, `guild_name` ASC;";
                        $result = $roster->db->query($query);
                        if( !$result )
                        {
                              die_quietly($roster->db->error(),'Database error',__FILE__,__LINE__,$query);
                        }
                        while( $data = $roster->db->fetch($result) )
                        {
                        
                        
                        foreach  ($binfo as $boss => $lt)
                        {
                              //echo $boss.'<br>';
                              
                              foreach  ($lt as $b => $c)
                              {
                              //echo $b . ' - ' . $c['item_texture'] .' - ' . $c['item_quality'] .' - ' . $c['item_sub_head'].'<br>';
                                    $modinst = '';
                                    foreach  ($c['info'] as $x => $y)
                                    {
                                          //echo $y['item_id'] . ' + ' . $y['item_texture'] . ' + ' . $y['item_quality'] . ' + ' . $y['item_name'] .'<br>';
                                          $modinst = "INSERT INTO `" . $roster->db->table('mod_info',$addon['basename']) . "` VALUES (NULL, $mod_id,".
                                    "'".$output[$info]['basename']."',".
                                    "'".$data['guild_id']."',".
                                    "'".$boss."',".
                                    "'".$b."',".
                                    "'".strtolower($c['item_texture'])."',".
                                    "'".$c['item_quality']."',".
                                    "'".(!empty($c['item_sub_head']) ? $c['item_sub_head'] : '')."',".
                                    "'".addslashes($y['item_name'])."',".
                                    "'".strtolower($y['item_texture'])."',".
                                    "'".$y['item_id']."',".
                                    "'',".
                                    "'".$y['item_quality']."',".
                                    "'no',".
                                    "null".
                                    ");";
                                    //echo $modinst.'<br>';
                                    $modinstrst = $roster->db->query($modinst) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$modinst);
                                    }
                                    
                              }
                                    
                        }
                        }
                        unset($addonstuff);

				// Restore our locale array
				$roster->locale->wordings = $localetemp;
				unset($localetemp);
			}
			$message .= "Mod '".$output[$info]['fullname']."' Installed";
		}
	}
	}
	


      }
      
      
      
      
      $mod_dir = $addon['dir'].'moduels/';
   
      usort($mods, 'strnatcasecmp');
            
      $stripe = 1;      
      $body = border('spurple','start','').'<table >
      <tr><td colspan=3 class="membersRow'.$stripe.'">Welcome to the rp mod installer!<br>'.$message.'</td></tr>';
	
	

	if( is_array($mods) )
	{
		foreach( $mods as $mod )
		{
			$installfile = $mod_dir . $mod . DIR_SEP . 'install.php';
			$install_class = $mod.'Install';

			if( file_exists($installfile) )
			{
				include_once($installfile);

				

				$addonstuff = new $install_class;
                        // Get existing addon record if available
	                 $query = 'SELECT * FROM `' . $roster->db->table('mods',$addon['basename']) . '` WHERE `mod_basename` = "' . $mod . '";';
	                 $result = $roster->db->query($query);
	                 if( !$result )
	                 {
		                $installer->seterrors(sprintf($roster->locale->act['installer_fetch_failed'],$addata['basename']) . '.<br />MySQL said: ' . $roster->db->error(),$roster->locale->act['installer_error']);
		                return;
	                 }
	                 $previous = $roster->db->fetch($result);
				// Save current locale array
				// Since we add all locales for localization, we save the current locale array
				// This is in case one addon has the same locale strings as another, and keeps them from overwritting one another
				$localetemp = $roster->locale->wordings;

				foreach( $roster->multilanguages as $lang )
				{
					$roster->locale->add_locale_file(ROSTER_ADDONS . $addon . DIR_SEP . 'locale' . DIR_SEP . $lang . '.php',$lang);
				}
                        $stripe = (($stripe%2)+1);
				$output[$info]['basename'] = $mod;
				$output[$info]['fullname'] = ( isset($roster->locale->act[$addonstuff->fullname]) ? $roster->locale->act[$addonstuff->fullname] : $addonstuff->fullname );
				$output[$info]['author'] = $addonstuff->credits[0]['name'];
				$output[$info]['version'] = $addonstuff->version;
				$output[$info]['icon'] = $addonstuff->icon;
				$output[$info]['description'] = ( isset($roster->locale->act[$addonstuff->description]) ? $roster->locale->act[$addonstuff->description] : $addonstuff->description );
                        echo '-<br>';
                        $body .= '<tr><td class="membersRow'.$stripe.'" ><img src ="'.$roster->config['interface_url'].'Interface/Icons/'.strtolower($output[$info]['icon']).'.'.$imgext.'" align="middle" /></a></td>';
                        $body .= '<td class="membersRow'.$stripe.'">'.$output[$info]['fullname'].' - '.$output[$info]['version'].'<br>'.$output[$info]['author'].'</td>';
                        
                        if (!$previous)
                        {
                              $body .= '<td class="membersRow'.$stripe.'"><a href="'.makelink('&amp;cfg=mod&amp;installmd='.$mod).'">Install</a></td></tr>';
                        }
                              $vs = version_compare($output[$info]['version'],$previous['mod_version']);
                              echo $vs.'<br>';
                        if ($vs == '1' && $previous['mod_version'] != '')
                        {
                              $body .= '<td class="membersRow'.$stripe.'"><a href="'.makelink('&amp;cfg=mod&amp;upgrademd='.$mod).'">Upgrade to '.$output[$info]['version'].'</a></td></tr>';
                        }
                        if ($previous['mod_version'] == $output[$info]['version'] && $vs != '1')
                        {
                              $body .= '<td class="membersRow'.$stripe.'"><a href="'.makelink('&amp;cfg=mod&amp;uninstallmd='.$mod).'">unInstall</a></td></tr>';
                        }
                        
				unset($addonstuff);

				// Restore our locale array
				$roster->locale->wordings = $localetemp;
				unset($localetemp);
			}
		}
	}
$body .= '</table>'.border('spurple','end','');




