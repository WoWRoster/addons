<?php
/**
 * WoWRoster.net WoWRoster
 *
 * Displays Raid Progresion info
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *

 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $Id$
 * @link       http://ulminia.zenutech.com
 * @package    Raid Progresion
*/
define("USE_CURL", TRUE);


/*

      end my localisaiation for xml....

*/
    
    
      
	
      function arraydisplay($array)
	{
	     echo '<pre>';
	     print_r($array);
	}

$pages = array(
	'92' => Array(
		'0' => 'General',
		),
	'96' => Array(
		'0' => 'Quests',
		'1' => 'Classic',
		'2' => 'The Burning Crusade',
		'3' => 'Wrath of the Lich King',
		),
	'97' => Array(
		'0' => 'Exploration',
		'1' => 'Eastern Kingdoms',
		'2' => 'Kalimdor',
		'3' => 'Outland',
		'4' => 'Northrend',
		),
	'95' => Array(
		'0' => 'Player vs. Player',
		'1' => 'Arena',
		'2' => 'Alterac Valley',
		'3' => 'Arathi Basin',
		'4' => 'Eye of the Storm',
		'5' => 'Warsong Gulch',
		'6' => 'Strand of the Ancients',
		'7' => 'Wintergrasp',
		),
	'168' => Array(
		'0' => 'Dungeons &amp; Raids',
		'1' => 'Classic',
		'2' => 'The Burning Crusade',
		'3' => 'Lich King Dungeon',
		'4' => 'Lich King Heroic',
		'5' => 'Lich King Raid',
		'6' => 'Lich King Heroic Raid',
		),
	'169' => Array(
		'0' => 'Professions',
		'1' => 'Cooking',
		'2' => 'Fishing',
		'3' => 'First Aid',
		),
	'201' => Array(
		'0' => 'Reputation',
		'1' => 'Classic',
		'2' => 'The Burning Crusade',
		'3' => 'Wrath of the Lich King',
		),
	'155' => Array(
		'0' => 'World Events',
		'1' => 'Lunar Festival',
		'2' => 'Love is in the Air',
		'3' => 'Children\'s Week',
		'4' => 'Noble Garden',
		'5' => 'Midsummer',
		'6' => 'Brewfest',
		'7' => 'Hallow\'s End',
		'8' => 'Winter Veil',
		),
	'81' => Array(
		'0' => 'Feats of Strength',
		),
);

require_once( ROSTER_LIB . 'simple.class.php' );
require_once(ROSTER_LIB . 'armory.class.php');
			$armory = new RosterArmory();






 //foreach ($pages as $cat => $title)
     // {      
                  
            $r = $armory->fetchArmorya( $type = '12', $character ='Ulminia', $guild = false, $realm = 'Zangarmarsh', $item_id = '96',$fetch_type = 'array' );//getArmoryDataXML($url);
	
            $g = 0;

            foreach ($r as $category )
            {
                  //aprint($category);
                  echo '<hr><br>-='.$g.' '.$pages[96][$g].'=-<br><hr><br>';
                  foreach ($category->achievement as $achiv)
                  {
                        
                        $temp = get_object_vars($achiv);
                        //aprint($temp);
                        echo $temp['@attributes']['title'].'<br>';
                  }
                  
                  foreach ($category->category as $catag)
                  {
                        $g++;
                        echo '<hr><br>-='.$g.' '.$pages[96][$g].'=-<br><hr><br>';
                        $temp = get_object_vars($catag);
                        //aprint($temp);
                        foreach ($catag->achievement as $ach)
                        {
                              $temp = get_object_vars($ach);
                              echo $temp['@attributes']['title'].'<br>';     
                        }
                        
                  }
                  
                  
                  
                  
            }      
                  
            /*
                  //echo '<hr><br>~~-  '.$title[0].'~~~<br>';
                  foreach ($category->achievement as $achievement)
                  {
                  
                        
                        $achv_points='';
                        $achv_icon='';
                        $achv_title='';
                        $achv_disc='';
                        $achv_date='';
                        $achv_title='';
                        $achv_id='';
                        $achv_reward_title = '';
                        $achv_criteria = '';
                        $achv_progress = '';
                        $achv_progress_width = '';
                        $achv_complete = '';
                        $quantity = '';
                        $max = '';
                        $order = '';
                        //echo '~~----  '.$title[$g].'~~~<br>';
                        $achv_cat_sub = $title[$g];
                        $temp = get_object_vars($achievement);
                        $achv_title = $temp['@attributes']['title'];//.' -<br>';
                        
                        //echo '$lang[\''.$temp['@attributes']['id'].'title\'] = "'.addslashes($temp['@attributes']['title']).'";<br>';
                        //echo '$lang[\''.$temp['@attributes']['id'].'disc\'] = "'.addslashes($temp['@attributes']['desc']).'";<br>';
                        //--echo $temp['@attributes']['categoryId']v.' -<br>';// => 97
                        if (isset($temp['@attributes']['dateCompleted']))
                        {
                              $achv_date=$temp['@attributes']['dateCompleted'];//.' -<br>';// => 2009-01-16-07:00
                              $achv_complete = '1';
                        }
                        $achv_disc=$temp['@attributes']['desc'];//.' -<br>';// => Explore the regions of Northrend.
                        $achv_icon=$temp['@attributes']['icon'];//.' -<br>';// => achievement_zone_northrend_01
                        $achv_id=$temp['@attributes']['id'];//.' -<br>';// => 45
                        $achv_points=$temp['@attributes']['points'];//.' -<br>';// => 25
                        if (isset($temp['@attributes']['reward']))
                        {
                              $achv_reward_title = $temp['@attributes']['reward'];//.' -<br><br>';// => Reward: Tabard of the Explorer
                        }
                        ////--echo $achievements->{'@attributes'}['title'].' -<br>';
                        //--echo 'Criteria listing<br>';
                        $datae = '';
                        foreach($achievement->criteria as $achievemen)
                        {

                              $temp2 = get_object_vars($achievemen);
                              if (isset($temp2['@attributes']['name']))
                              {
                                    $datae.= $temp2['@attributes']['name'].'<br>';//.' -<br>';
                              }
                              if (isset($temp2['@attributes']['quantity']))
                              {
                                    $quantity = $temp2['@attributes']['quantity'];//.'-<br>';
                              }
                              if (isset($temp2['@attributes']['maxQuantity']))
                              {
                                     $max = $temp2['@attributes']['maxQuantity'];//.'-<br>';
                              }
                              if ($max != '')
                              {
                                    $achv_progress_width = 'width:'.round( ( ( $quantity / $max )*100 ) ).'%';
                                    $achv_progress = ''.$quantity.' / '.$max.'';
                              }
                              
                        }
                        
                        //--echo 'Achivement Criteria <BR>';
                        
                        foreach($achievement->achievement as $achievemen)
                        {
                              $date = '';
                              $b1 = '';
                              $b2 = '';
                              $temp2 = get_object_vars($achievemen);
                  
                              if (isset($temp2['@attributes']['dateCompleted']))
                              {
                        ////--echo '-------'.$temp2['@attributes']['date'].' -<br>';
                                    $date = '( ' . $temp2['@attributes']['dateCompleted'] . ' )';
                                    $b1 = '<b><span style="color:#7eff00;">';
                                    $b2 = '</span></b>';
                              }
                              else
                              {
                                    $date = '';
                                    $b1 = '';
                                    $b2 = '';
                              }
                              if (isset($temp2['@attributes']['icon']))
                              {
                                    $datae.= '<img src="img/Interface/Icons/' .$temp2['@attributes']['icon'] . '.png" width="24" height="24"> ';
                              }
                              if (isset($temp2['@attributes']['title']))
                              {
                                    $datae.= $b1.$temp2['@attributes']['title'].$b2.' ' . $date . ' ';
                              }

                              if (isset($temp2['@attributes']['quantity']))
                              {
                                    $quantity = $temp2['@attributes']['quantity'];//.'-<br>';
                              }
                              if (isset($temp2['@attributes']['maxQuantity']))
                              {
                                     $max = $temp2['@attributes']['maxQuantity'];//.'-<br>';
                              }
                              if ($max != '')
                              {
                                    $achv_progress_width = 'width:'.round( ( ( $quantity / $max )*100 ) ).'%';
                                    $achv_progress = ''.$quantity.' / '.$max.'';
                              }
                              if (isset($temp2['@attributes']['points']))
                              {
                                    $datae.= ' Points'.$temp2['@attributes']['points'].'<br>';
                              }
                               
                        }
                        
                        $achv_criteria = $datae;
            
                        $g++;
                        
                       // $this->achnum++;


                //  $this->order++;
            }
                  $g = 1;
      
                  foreach($category->category as $f => $achievements)
                  {
                  
                        
                        //aprint($category);
                        $achv_cat_sub = $title[$g];
                       // echo  $achv_cat_sub.' - '.$f.' - '.$category.'<br>';
      
                        foreach ($achievements as $achiev)
                        {
            
                              $achv_points='';
                              $achv_icon='';
                              $achv_title='';
                              $achv_disc='';
                              $achv_date='';
                              $achv_title='';
                              $achv_id='';
                              $achv_reward_title = '';
                              $achv_criteria = '';
                              $achv_progress = '';
                              $achv_progress_width = '';
                              $quantity = '';
                              $max = '';
                              $order = '';
                              $achv_complete = '';
                        
                  
                              $temp = get_object_vars($achiev);
                              $achv_title = $temp['@attributes']['title'];//.' -<br>';
                              //--echo $temp['@attributes']['categoryId']v.' -<br>';// => 97
                              
                        //echo '$lang[\''.$temp['@attributes']['id'].'title\'] = "'.addslashes($temp['@attributes']['title']).'";<br>';
                        //echo '$lang[\''.$temp['@attributes']['id'].'disc\'] = "'.addslashes($temp['@attributes']['desc']).'";<br>';
                              if (isset($temp['@attributes']['dateCompleted']))
                              {
                                    $achv_date=$temp['@attributes']['dateCompleted'];//.' -<br>';// => 2009-01-16-07:00
                                    $achv_complete = '1';
                              }
                              $achv_disc=$temp['@attributes']['desc'];//.' -<br>';// => Explore the regions of Northrend.
                              $achv_icon=$temp['@attributes']['icon'];//.' -<br>';// => achievement_zone_northrend_01
                              $achv_id=$temp['@attributes']['id'];//.' -<br>';// => 45
                              $achv_points=$temp['@attributes']['points'];//.' -<br>';// => 25
                              if (isset($temp['@attributes']['reward']))
                              {
                                    $achv_reward_title = $temp['@attributes']['reward'];//.' -<br><br>';// => Reward: Tabard of the Explorer
                              }
                              ////--echo $achievements->{'@attributes'}['title'].' -<br>';
                              //--echo 'Criteria listing<br>';
                              $datae = '';
                              foreach($achiev->criteria as $achievemen)
                              {

                                    $temp2 = get_object_vars($achievemen);
                                    if (isset($temp2['@attributes']['name']))
                                    {
                                          $datae.= $temp2['@attributes']['name'].'<br>';//.' -<br>';
                                    }
                                    if (isset($temp2['@attributes']['quantity']))
                                    {
                                          $quantity = $temp2['@attributes']['quantity'];//.'-<br>';
                                    }
                                    if (isset($temp2['@attributes']['maxQuantity']))
                                    {
                                          $max = $temp2['@attributes']['maxQuantity'];//.'-<br>';
                                    }
                                    if ($max != '')
                                    {
                                          $achv_progress_width = 'width:'.round( ( ( $quantity / $max )*100 ) ).'%';
                                          $achv_progress = ''.$quantity.' / '.$max.'';
                                    }
                              
                              }
                        
                        //--echo 'Achivement Criteria <BR>';
                        
                              foreach($achiev->achievement as $achievemen)
                              {
                                    $date = '';
                                    $b1 = '';
                                    $b2 = '';
                                    $temp2 = get_object_vars($achievemen);
                  
                                    if (isset($temp2['@attributes']['dateCompleted']))
                                    {
                        ////--echo '-------'.$temp2['@attributes']['date'].' -<br>';
                                          $date = '( ' . $temp2['@attributes']['dateCompleted'] . ' )';
                                          $b1 = '<b><span style="color:#7eff00;">';
                                          $b2 = '</span></b>';
                                    }
                                    else
                                    {
                                          $date = '';
                                          $b1 = '';
                                          $b2 = '';
                                    }
                                    if (isset($temp2['@attributes']['icon']))
                                    {
                                          $datae.= '<img src="img/Interface/Icons/' .$temp2['@attributes']['icon'] . '.png" width="24" height="24"> ';
                                    }
                                    if (isset($temp2['@attributes']['title']))
                                    {
                                          $datae.= $b1.$temp2['@attributes']['title'].$b2.' ' . $date . ' ';
                                    }

                                    if (isset($temp2['@attributes']['quantity']))
                                    {
                                          $quantity = $temp2['@attributes']['quantity'];//.'-<br>';
                                    }
                                    if (isset($temp2['@attributes']['maxQuantity']))
                                    {
                                          $max = $temp2['@attributes']['maxQuantity'];//.'-<br>';
                                    }
                                    if ($max != '')
                                    {
                                          $achv_progress_width = 'width:'.round( ( ( $quantity / $max )*100 ) ).'%';
                                          $achv_progress = ''.$quantity.' / '.$max.'';
                                    }
                                    if (isset($temp2['@attributes']['points']))
                                    {
                                          $datae.= ' Points'.$temp2['@attributes']['points'].'<br>';
                                    }
                               
                              }
                        
                              $achv_criteria = $datae;
            
                      
                        
                           //   $this->achnum++;
                              
            
                        }
                        $g++;
                  }

           }*/
            //end pages
     // }

/*

foreach ($pages as $cat => $title)
      {      
                  
            $r = $armory->fetchArmorya( $type = '12', $character ='Ulminia', $guild = false, $realm = 'Zangarmarsh', $item_id = $cat,$fetch_type = 'array' );//getArmoryDataXML($url);
	
            $g = 0;

            foreach ($r as $category)
            {

                  //--echo '~~-  '$title.'~~~<br><hr><br>';
                  foreach ($category->achievement as $achievement)
                  {
                  
                        
                        $achv_points='';
                        $achv_icon='';
                        $achv_title='';
                        $achv_disc='';
                        $achv_date='';
                        $achv_title='';
                        $achv_id='';
                        $achv_reward_title = '';
                        $achv_criteria = '';
                        $achv_progress = '';
                        $achv_progress_width = '';
                        $quantity = '';
                        $max = '';
                        $order = '';
                        
                  
                        $temp = get_object_vars($achievement);
                        $achv_title = $temp['@attributes']['title'];//.' -<br>';
                        //--echo $temp['@attributes']['categoryId']v.' -<br>';// => 97
                        if (isset($temp['@attributes']['dateCompleted']))
                        {
                              $achv_date=$temp['@attributes']['dateCompleted'];//.' -<br>';// => 2009-01-16-07:00
                        }
                        $achv_disc=$temp['@attributes']['desc'];//.' -<br>';// => Explore the regions of Northrend.
                        $achv_icon=$temp['@attributes']['icon'];//.' -<br>';// => achievement_zone_northrend_01
                        $achv_id=$temp['@attributes']['id'];//.' -<br>';// => 45
                        $achv_points=$temp['@attributes']['points'];//.' -<br>';// => 25
                        
                        echo '$lang[\'ach'.$temp['@attributes']['id'].'title\'] = "'.addslashes($temp['@attributes']['title']).'";<br>';
                        echo '$lang[\'ach'.$temp['@attributes']['id'].'disc\'] = "'.addslashes($temp['@attributes']['desc']).'";<br>';
                              
                              
                        if (isset($temp['@attributes']['reward']))
                        
                        {
                              $achv_reward_title = $temp['@attributes']['reward'];//.' -<br><br>';// => Reward: Tabard of the Explorer
                        }
                        ////--echo $achievements->{'@attributes'}['title'].' -<br>';
                        //--echo 'Criteria listing<br>';
                        $datae = '';
                        foreach($achievement->criteria as $achievemen)
                        {

                              $temp2 = get_object_vars($achievemen);
                              if (isset($temp2['@attributes']['name']))
                              {
                                    $datae.= $temp2['@attributes']['name'];//.' -<br>';
                              }
                              if (isset($temp2['@attributes']['quantity']))
                              {
                                    $quantity = $temp2['@attributes']['quantity'];//.'-<br>';
                              }
                              if (isset($temp2['@attributes']['maxQuantity']))
                              {
                                     $max = $temp2['@attributes']['maxQuantity'];//.'-<br>';
                              }
                              if ($max != '')
                              {
                                    $achv_progress_width = 'width:'.round( ( ( $quantity / $max )*100 ) ).'%';
                                    $achv_progress = ''.$quantity.' / '.$max.'';
                              }
                              
                        }
                        
                        //--echo 'Achivement Criteria <BR>';
                        
                        foreach($achievement->achievement as $achievemen)
                        {
                              $date = '';
                              $b1 = '';
                              $b2 = '';
                              $temp2 = get_object_vars($achievemen);
                  
                              if (isset($temp2['@attributes']['dateCompleted']))
                              {
                        ////--echo '-------'.$temp2['@attributes']['date'].' -<br>';
                                    $date = '( ' . $temp2['@attributes']['dateCompleted'] . ' )';
                                    $b1 = '<b><span style="color:#7eff00;">';
                                    $b2 = '</span></b>';
                              }
                              else
                              {
                                    $date = '';
                                    $b1 = '';
                                    $b2 = '';
                              }
                              if (isset($temp2['@attributes']['icon']))
                              {
                                    $datae.= '<img src="img/Interface/Icons/' .$temp2['@attributes']['icon'] . '.png" width="24" height="24"> ';
                              }
                              if (isset($temp2['@attributes']['title']))
                              {
                                    $datae.= $b1.$temp2['@attributes']['title'].$b2.' ' . $date . ' ';
                              }

                              if (isset($temp2['@attributes']['quantity']))
                              {
                                    $quantity = $temp2['@attributes']['quantity'];//.'-<br>';
                              }
                              if (isset($temp2['@attributes']['maxQuantity']))
                              {
                                     $max = $temp2['@attributes']['maxQuantity'];//.'-<br>';
                              }
                              if ($max != '')
                              {
                                    $achv_progress_width = 'width:'.round( ( ( $quantity / $max )*100 ) ).'%';
                                    $achv_progress = ''.$quantity.' / '.$max.'';
                              }
                              if (isset($temp2['@attributes']['points']))
                              {
                                    $datae.= ' Points'.$temp2['@attributes']['points'].'<br>';
                              }
                               
                        }
                        
                        $achv_criteria = $datae;
            
                        $g++;
                        


                  }
            }
                  $g = 1;
      
                  foreach($category->category as $f => $achievements)
                  {
      
                        foreach ($achievements as $achiev)
                        {
                        
                        
                        
            
                              $temp = get_object_vars($achiev);
                              
                              echo '$lang[\'ach'.$temp['@attributes']['id'].'title\'] = "'.addslashes($temp['@attributes']['title']).'";<br>';
                              echo '$lang[\'ach'.$temp['@attributes']['id'].'disc\'] = "'.addslashes($temp['@attributes']['desc']).'";<br>';
                              //--echo 'title '.$temp['@attributes']['title'].' -<br>';
                              //--echo 'categoryId '.$temp['@attributes']['categoryId'].' -<br>';// => 97
                              if (isset($temp['@attributes']['dateCompleted']))
                              {
                                    //--echo 'dateCompleted '.$temp['@attributes']['dateCompleted'].' -<br>';// => 2009-01-16-07:00
                              }
                              //--echo 'desc '.$temp['@attributes']['desc'].' -<br>';// => Explore the regions of Northrend.
                              //--echo 'icon '.$temp['@attributes']['icon'].' -<br>';// => achievement_zone_northrend_01
                              //--echo 'id '.$temp['@attributes']['id'].' -<br>';// => 45
                              //--echo 'points '.$temp['@attributes']['points'].' -<br>';// => 25
                              if (isset($temp['@attributes']['reward']))
                              {
                                    //--echo 'reward '.$temp['@attributes']['reward'].' -<br><br>';// => Reward: Tabard of the Explorer
                              }
                              ////--echo $achievements->{'@attributes'}['title'].' -<br>';
                              //--echo 'Criteria <BR>';
                              
                              foreach($achiev->criteria as $achievement)
                              {
                                    $date = '';
                                    $b1 = '';
                                    $b2 = '';
                                    $temp2 = get_object_vars($achievement);
                  
                                    if (isset($temp2['@attributes']['date']))
                                    {
                                          $date = '( ' . $temp2['@attributes']['date'] . ' )';
                                          $b1 = '<b><span style="color:#7eff00;">';
                                          $b2 = '</span></b>';
                                    }
                                    else
                                    {
                                          $date = '';
                                          $b1 = '';
                                          $b2 = '';
                                    }
                                    
                                    if (isset($temp2['@attributes']['icon']))
                                    {
                                          //--echo '<img src="img/Interface/Icon/' .$temp2['@attributes']['icon'] . '.png"> ';
                                    }
                                    if (isset($temp2['@attributes']['name']))
                                    {
                                          //--echo $b1.$temp2['@attributes']['name'].$b2.' ' . $date . '-<br>';
                                    }

                                    if (isset($temp2['@attributes']['quantity']))
                                    {
                                          //--echo 'Quantity '.$temp2['@attributes']['quantity'].'-<br>';
                                    }
                                    if (isset($temp2['@attributes']['maxQuantity']))
                                    {
                                          //--echo 'maxQuantity '.$temp2['@attributes']['maxQuantity'].'-<br>';
                                    }
                  
                              }
            
                              //--echo '<span style="color:red;">Achivement Criteria </span><BR>';
                              foreach($achiev->achievement as $achievemen)
                              {
                                    $date = '';
                                    $b1 = '';
                                    $b2 = '';
                                    $temp2 = get_object_vars($achievemen);
                  
                                    if (isset($temp2['@attributes']['date']))
                                    {
                                          $date = '( ' . $temp2['@attributes']['date'] . ' )';
                                          $b1 = '<b><span style="color:#7eff00;">';
                                          $b2 = '</span></b>';
                                    }
                                    else
                                    {
                                          $date = '';
                                          $b1 = '';
                                          $b2 = '';
                                    }
                                    if (isset($temp2['@attributes']['icon']))
                                    {
                                          //--echo '<img src="img/Interface/Icon/' .$temp2['@attributes']['icon'] . '.png"> ';
                                    }
                                    if (isset($temp2['@attributes']['name']))
                                    {
                                          //--echo $b1.$temp2['@attributes']['name'].$b2.' ' . $date . '-<br>';
                                    }

                                    if (isset($temp2['@attributes']['quantity']))
                                    {
                                          //--echo 'Quantity '.$temp2['@attributes']['quantity'].'-<br>';
                                    }
                                    if (isset($temp2['@attributes']['maxQuantity']))
                                    {
                                          //--echo 'maxQuantity '.$temp2['@attributes']['maxQuantity'].'-<br>';
                                    }
                  
                              }
            
                        }
                        $g++;
                  }

            }
         */   
            //end pages
      
      
      
      
      
//	$r = $armory->fetchArmorya( $type = '11', $character ='Zonous', $guild = false, $realm = 'Zangarmarsh', $item_id = '',$fetch_type = 'array' );//getArmoryDataXML($url);
	//echo '<pre>';
	/*
	aprint($r->achievements->summary);
	$temps = get_object_vars($r->achievements->summary);
	$total = 'Total Completed: '.$temps['c']['earned'].' / '.$temps['c']['total'].'<br>';
	$general         = $temps['category']['0']->c['earned'].' / '.$temps['category'][0]->c['total'];
	$quests          = $temps['category']['1']->c['earned'].' / '.$temps['category'][1]->c['total'];
	$exploration     = $temps['category']['2']->c['earned'].' / '.$temps['category'][2]->c['total'];
	$pvp             = $temps['category']['3']->c['earned'].' / '.$temps['category'][3]->c['total'];
	$dn_raids        = $temps['category']['4']->c['earned'].' / '.$temps['category'][4]->c['total'];
      $prof            = $temps['category']['5']->c['earned'].' / '.$temps['category'][5]->c['total'];
	$rep             = $temps['category']['6']->c['earned'].' / '.$temps['category'][6]->c['total'];
	$world_events    = $temps['category']['7']->c['earned'].' / '.$temps['category'][7]->c['total'];
      $feats           = $temps['category']['8']->c['earned'].' / '.$temps['category'][8]->c['total'];
      
	
	//`title_1`,`disc_1`,`date_1`,`points_1`

	'categoryId' => 95,
				'dateCompleted' => '2009-01-29T16:03:00-07:00',
				'desc' => 'Obtain an Insignia or Medallion of the Alliance.',
				'icon' => 'inv_jewelry_trinketpvp_01',
				'id' => 701,
				'points' => 10,
				'title' => 'Freedom of the Alliance'


	$title_1 = $temps['achievement']['0']['title'];
	$date_1 = $temps['achievement']['0']['dateCompleted'];
	$disc_1 =  $temps['achievement']['0']['desc'];
	$points_1 = $temps['achievement']['0']['points'];
$general = '';
$quests = '';
$exploration = '';
$pvp = '';
$dn_raids = '';
$prof = '';
$rep = '';
$world_events = '';
$feats = '';
	

	foreach ($r->achievements->summary as $type => $data)
	{
	     //aprint($data);
	     //echo $type->category[0]['total'] .' - '.$data.'<br>';
	     foreach($data as $cat => $i)
	     {
	           $temp2 = get_object_vars($i);
	           aprint($temp2);
	           
	           echo $$temp2['c'][0] .' '.$temp2['c']['total'].'<br>';
	     }
	}

	
$g = 0;
//arraydisplay($r);
foreach ($r as $category)
{

//arraydisplay($category);


echo '~~-  '.$pages['96'][$g].'~~~<br><hr><br>';
      foreach ($category->achievement as $achievement)
      {
            $temp = get_object_vars($achievement);
            echo $temp['@attributes']['title'].' -<br>';
            echo $temp['@attributes']['categoryId'].' -<br>';// => 97
            if (isset($temp['@attributes']['dateCompleted']))
            {
                  echo $temp['@attributes']['dateCompleted'].' -<br>';// => 2009-01-16-07:00
            }
            echo $temp['@attributes']['desc'].' -<br>';// => Explore the regions of Northrend.
            echo $temp['@attributes']['icon'].' -<br>';// => achievement_zone_northrend_01
            echo $temp['@attributes']['id'].' -<br>';// => 45
            echo $temp['@attributes']['points'].' -<br>';// => 25
            if (isset($temp['@attributes']['reward']))
            {
                  echo $temp['@attributes']['reward'].' -<br><br>';// => Reward: Tabard of the Explorer
            }
            //echo $achievements->{'@attributes'}['title'].' -<br>';
            echo 'Criteria listing<br>';
            foreach($achievement->criteria as $achievemen)
            {
            //echo '<pre>';
            //print_r($achievement);
                  $temp2 = get_object_vars($achievemen);
                  if (isset($temp2['@attributes']['name']))
                  {
                        echo '##'.$temp2['@attributes']['name'].' -<br>';
                  }
                  if (isset($temp2['@attributes']['quantity']))
                  {
                        echo 'Quantity '.$temp2['@attributes']['quantity'].'-<br>';
                  }
                  if (isset($temp2['@attributes']['maxQuantity']))
                  {
                        echo 'maxQuantity '.$temp2['@attributes']['maxQuantity'].'-<br>';
                  }
            }
            echo 'Achivement Criteria <BR>';
            foreach($achievement->achievement as $achievemen)
            {
            $date = '';
            $b1 = '';
            $b2 = '';
                  $temp2 = get_object_vars($achievemen);
                  if (isset($temp2['@attributes']['dateCompleted']))
                  {
                        //echo '-------'.$temp2['@attributes']['date'].' -<br>';
                        $date = '( ' . $temp2['@attributes']['dateCompleted'] . ' )';
                        $b1 = '<b><span style="color:#7eff00;">';
                        $b2 = '</span></b>';
                  }
                  else
                  {
                        $date = '';
                        $b1 = '';
                        $b2 = '';
                  }
                  if (isset($temp2['@attributes']['icon']))
                  {
                        echo '<img src="img/Interface/Icons/' .$temp2['@attributes']['icon'] . '.png" width="24" height="24"> ';
                  }
                  if (isset($temp2['@attributes']['title']))
                  {
                        echo $b1.$temp2['@attributes']['title'].$b2.' ' . $date . ' ';
                  }

                  if (isset($temp2['@attributes']['quantity']))
                  {
                        echo 'Quantity '.$temp2['@attributes']['quantity'].'-<br>';
                  }
                  if (isset($temp2['@attributes']['maxQuantity']))
                  {
                        echo 'maxQuantity '.$temp2['@attributes']['maxQuantity'].'-<br>';
                  }
                  if (isset($temp2['@attributes']['points']))
                  {
                        echo 'Points'.$temp2['@attributes']['points'].'-<br>';
                  }
                  
            }
            
            
            //echo '<pre>';
            //print_R($achievements);
            $g++;
            echo '<br><hr><br>';
      }
      
      echo '<br><hr><br>';
      $g = 1;
      
      foreach($category->category as $f => $achievements)
      {
      foreach ($achievements as $achiev)
      {
            
            $temp = get_object_vars($achiev);
            echo 'title '.$temp['@attributes']['title'].' -<br>';
            echo 'categoryId '.$temp['@attributes']['categoryId'].' -<br>';// => 97
            if (isset($temp['@attributes']['dateCompleted']))
                  {
            echo 'dateCompleted '.$temp['@attributes']['dateCompleted'].' -<br>';// => 2009-01-16-07:00
                  }
            echo 'desc '.$temp['@attributes']['desc'].' -<br>';// => Explore the regions of Northrend.
            echo 'icon '.$temp['@attributes']['icon'].' -<br>';// => achievement_zone_northrend_01
            echo 'id '.$temp['@attributes']['id'].' -<br>';// => 45
            echo 'points '.$temp['@attributes']['points'].' -<br>';// => 25
            if (isset($temp['@attributes']['reward']))
            {
            echo 'reward '.$temp['@attributes']['reward'].' -<br><br>';// => Reward: Tabard of the Explorer
            }
            //echo $achievements->{'@attributes'}['title'].' -<br>';
            echo 'Criteria <BR>';
            foreach($achiev->criteria as $achievement)
            {
            $date = '';
            $b1 = '';
            $b2 = '';
            //echo '<pre>';
            //print_r($achievement);
                  $temp2 = get_object_vars($achievement);
                  if (isset($temp2['@attributes']['date']))
                  {
                        //echo '-------'.$temp2['@attributes']['date'].' -<br>';
                        $date = '( ' . $temp2['@attributes']['date'] . ' )';
                        $b1 = '<b><span style="color:#7eff00;">';
                        $b2 = '</span></b>';
                  }
                  else
                  {
                        $date = '';
                        $b1 = '';
                        $b2 = '';
                  }
                  if (isset($temp2['@attributes']['icon']))
                  {
                        echo '<img src="img/Interface/Icon/' .$temp2['@attributes']['icon'] . '.png"> ';
                  }
                  if (isset($temp2['@attributes']['name']))
                  {
                        echo $b1.$temp2['@attributes']['name'].$b2.' ' . $date . '-<br>';
                  }

                  if (isset($temp2['@attributes']['quantity']))
                  {
                        echo 'Quantity '.$temp2['@attributes']['quantity'].'-<br>';
                  }
                  if (isset($temp2['@attributes']['maxQuantity']))
                  {
                        echo 'maxQuantity '.$temp2['@attributes']['maxQuantity'].'-<br>';
                  }
                  
            }
            echo '<span style="color:red;">Achivement Criteria </span><BR>';
            foreach($achiev->achievement as $achievemen)
            {
            $date = '';
            $b1 = '';
            $b2 = '';
                  $temp2 = get_object_vars($achievemen);
                  if (isset($temp2['@attributes']['date']))
                  {
                        //echo '-------'.$temp2['@attributes']['date'].' -<br>';
                        $date = '( ' . $temp2['@attributes']['date'] . ' )';
                        $b1 = '<b><span style="color:#7eff00;">';
                        $b2 = '</span></b>';
                  }
                  else
                  {
                        $date = '';
                        $b1 = '';
                        $b2 = '';
                  }
                  if (isset($temp2['@attributes']['icon']))
                  {
                        echo '<img src="img/Interface/Icon/' .$temp2['@attributes']['icon'] . '.png"> ';
                  }
                  if (isset($temp2['@attributes']['name']))
                  {
                        echo $b1.$temp2['@attributes']['name'].$b2.' ' . $date . '-<br>';
                  }

                  if (isset($temp2['@attributes']['quantity']))
                  {
                        echo 'Quantity '.$temp2['@attributes']['quantity'].'-<br>';
                  }
                  if (isset($temp2['@attributes']['maxQuantity']))
                  {
                        echo 'maxQuantity '.$temp2['@attributes']['maxQuantity'].'-<br>';
                  }
                  
            }
      
            //echo '<pre>';
            //print_R($achievements);
            echo '<br><hr><br>';
            
      }
      $g++;
      echo '<br><hr><br>';
      }

      echo '<br><hr><br>';
echo '<br><hr><br>';
}
*/

//}
/*	
	foreach($r as $a => $catagory)
	{
	     foreach ($catagory as $b => $achievement)
	     {
	     echo $a .' - '.$b.' - '.$achievement['title'].'-<br>';
	     
	           foreach ($achievement as $achv => $info)
	           {
	           if (isset($info['name']))
	           {
	           echo $info['name'].'--<br>';
	           }
	           if (isset($info['maxQuantity']))
	           {
	           //echo $achv .' - '.$info['quantity'].' / '.$info['maxQuantity'].'---<br>';
	           }
	           //print_r($info);
	           if (isset($info['title']))
	           {
	           //echo $info['title'].'----<br>';
	           }
	                 foreach ( $info as $c => $achiv)
	                 {
	                       //echo $achiv['title'].'-----<br>';
	                       foreach($achiv as $d => $crit)
	                       {
	                       //echo $crit['title'].'------<br>';
	                       }
	                 }
	           }
	      echo '<br><hr><br>';
	     }
	
	     
	}
*/


/**
     * helper function to get classes for content
     *
     * @param string $class
     * @param string $tree
     * @return string
     */
    function _parseData ( $array = array() ) {
        $datas = array();
        _makeSimpleClass( $array );
        //$this->_debug( 3, true, 'Parsed XML data', 'OK' );
        return $this->datas[0];
        //$this->_debug( 3, '', 'Parsed XML data', 'OK' );
    }

    function _makeSimpleClass ( $array = array() ) {

        $tags = array_keys( $array );
        foreach ( $array as $tag => $content ) {
            foreach ( $content as $leave ) {
                _initClass( $tag, $leave['attribs'] );
                $datas[count($datas)-1]->setProp("_CDATA", $leave['data']);
                if ( array_keys($leave['child']) ) {
                    _makeSimpleClass( $leave['child'] );
                }
                _finalClass( $tag );
            }
        }
        //$this->_debug( 3, '', 'Made simple class', 'OK' );
    }

    /**
     * helper function initialise a simpleClass Object
     *
     * @param string $class
     * @param string $tree
     * @return string
     */
    function _initClass( $tag, $attribs = array() ) {
        $node = new SimpleClass();
        $node->setArray($attribs);
        $node->setProp("_TAGNAME", $tag);
        $datas[] = $node;
        //$this->_debug( 3, '', 'Initialized simple class', 'OK' );
    }


    /**
     * helper function finalize a simpleClass Object
     *
     * @param string $class
     * @param string $tree
     * @return string
     */
    function _finalClass( $tag, $val = array() ) {
        if (count($datas) > 1) {
            $child = array_pop($this->datas);

            if (count($datas) > 0) {
                $parent = &$datas[count($datas)-1];
                $tag = $child->_TAGNAME;

                if ($parent->hasProp($tag)) {
                    if (is_array($parent->$tag)) {
                        //Add to children array
                        $array = &$parent->$tag;
                        $array[] = $child;
                    } else {
                        //Convert node to an array
                        $children = array();
                        $children[] = $parent->$tag;
                        $children[] = $child;
                        $parent->$tag = $children;
                    }
                } else {
                    $parent->setProp($tag, $child);
                }
            }
        }
        //$this->_debug( 3, '', 'Finalized simple class', 'OK' );
    }
    function setProp($propName, $propValue) {
		$this->$propName = $propValue;
		if (!in_array($propName, $this->properties)) {
			$this->properties[] = $propName;
		}
  } 
  
	function setArray($array) {
		if (is_array($array)) {
			foreach ($array as $key => $value) {
				$this->setProp($key, $value);
			}
		}
	}
	
	function hasProp($propName) {
		return in_array($propName, $this->properties);
	}
