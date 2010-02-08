<?php
require ($addon['dir'] . 'inc/b.php');
$roster->output['html_head'] = '
<script src="'.$addon['url'] . 'css/SpryTooltip.js" type="text/javascript"></script>
<script src="http://www.wowhead.com/widgets/power.js"></script>
<link href="'.$addon['url'] . 'css/samples.css" rel="stylesheet" type="text/css" />
<link href="'.$addon['url'] . 'style.css" rel="stylesheet" type="text/css" />
<link href="'.$addon['url'] . 'css/SpryTooltip.css" rel="stylesheet" type="text/css" />

';
$filenam = $addon['dir'] . 'inc/b.php';
include( $addon['dir'] . 'inc/functions.php' );
//$roster->output['show_menu'] = false;
$prog = new prog;	

$form = '1';
		
$body = '';		
$menu = '
<!-- Begin Config Menu -->
'.border('sgray','start','Raids').'
<div style="width:200px;">
  <ul id="rg_menu" class="tab_menu">'."\n";

      $h = '';
      foreach( $array as $instance => $inst)
	{
            $h++;
            if ($h == 1){
            $first_tab = ' class="selected"';
            }
            $menu .= '<li >
                  <a href="'.makelink('guild-progress&a=g:1&inst='.$inst['Acronym']).'" >'.$inst['ZoneName'].'</a></li>';		
	}
$menu .='
</ul>

</div>
'.border('sgray','end');

if (isset($_GET['inst'])){
$insts = $_GET['inst'];
}else{
$insts = 'Ony';
}		
foreach( $array as $instance => $inst)
	{
	     if ($insts == $inst['Acronym'])
            {
                  $i = '1';
                  //$body .= '<div id="'.$inst['Acronym'].'" style="display:none;">';
                  $body .= ''.border('sgreen','start',''.$inst['ZoneName'].'').'';
                  $body .= "<table width=\"600\">\n\n";
                  $title = $inst['ZoneName'];
                  $body .= '<tr><td colspan=3>Acronym: '.$inst['Acronym'].'<br>Instance Name: '
                  .$inst['ZoneName'].'<br>Location: '
                  .$inst['Location'].'<br></td></tr><tr><td width="15%"></td><td width="70%" align="left">';
                  
            for($i=1;$i<20;$i++)
                  { 
              
                        if (isset($inst['Boss'.$i.'']))
                              {
                                    if (!is_array($inst['Boss'.$i.'']))
                                          {
                                                if (!empty($inst['Boss'.$i.'']))
                                                      {
                                                            $color = $prog->getstatus($instance, $inst['Acronym'], addslashes($inst['Boss'.$i.'']));
                                                            $name = $inst['Boss'.$i.''];
                                                            $loots = $prog->getloots($instance, $inst['Acronym'], addslashes($inst['Boss'.$i.'']), $form++);
                                                            $percent = $prog->getper($instance, $prog->nospace(addslashes($inst['ZoneName'])), $prog->nospace(addslashes($inst['Boss'.$i.''])));
                                                            //$body .= '<dl><dt><strong>Boss '.$i.'</strong><dd><font color="'.$color.'">'.stripslashes($name)."</font></dl>\n\n";
                                                            $body .= ''.border('s'.$color.'','start',''.stripslashes($name).'').'
                                                            <table width="400">
                                                            <tr><td>
                                                            <img src="'.$addon['url'].'images/'.$name.'.jpg" ></a></td><td>'.$loots.'<br>Kills: n/a<br>Percent Down: '.$percent.'<br>
                                                            </td></tr></table>
                                                            '.border('s'.$color.'','end','').'<br>';
                                                      }
                                          }
                            
                              }
                  
                        if (isset($inst['Area'.$i.'']))
                              {
                                    if (is_array($inst['Area'.$i.'']))
                                          {
                  
                                                if (!empty($inst['Area'.$i.'']))
                                                      {
                  
                                                            //$body .= '<strong>Area '.$i."</strong>\n\n";
                                                            //$body .= ''.border('orange','start',''.$inst['Area'.$i.''].'').'';
                        
                                                      }
                                          }
                              }
                        if (isset($inst['Boss'.$i.'']))
                              {
                                    if (is_array($inst['Boss'.$i.'']))
                                          {
                                                foreach( $inst['Boss'.$i.''] as $id => $boss)
                                                      {
                                                      //echo $id;
                        /*
                                                            //$color = $prog->getstatus($instance, $inst['Acronym'], addslashes($id));
                                                            //$name = $prog->getloot($instance, $inst['Acronym'], addslashes($id), $form++);
                                                            //$body .= '<dl><dt><strong>Boss '.$i.'</strong><dl><dd><dt><strong><font color="'.$color.'">'.stripslashes($name)."</font></strong>\n\n";
                                                            $name = $inst['Boss'.$i.''];
                                                            $loots = $prog->getloots($instance, $inst['Acronym'], addslashes($inst['Boss'.$i.'']), $form++);
                                                            $percent = $prog->getper($instance, $prog->nospace(addslashes($inst['ZoneName'])), $prog->nospace(addslashes($inst['Boss'.$i.''])));
                                                            //$body .= '<dl><dt><strong>Boss '.$i.'</strong><dd><font color="'.$color.'">'.stripslashes($name)."</font></dl>\n\n";
                                                            $body .= ''.border('s'.$color.'','start',''.stripslashes($name).'').'
                                                            <table width="400">
                                                            <tr><td>
                                                            <img src="'.$addon['url'].'images/'.$name.'.jpg" width=100 height=100></a></td><td>'.$loots.'<br>Kills: n/a<br>Percent Down: '.$percent.'<br>
                                                            </td></tr></table>
                                                            '.border('s'.$color.'','end','').'<br>';
                        */
                                                            if (!is_array($boss))
                                                                  {
                                                                        $color = $prog->getstatus($instance, $inst['Acronym'], addslashes($boss));
                                                                        //$name = $prog->getloot($instance, $inst['Acronym'], addslashes($boss),$form++);
                                                                        //$body .= '<dd><font color="'.$color.'">'.stripslashes($name)."</font>\n\n";
                                                                        $name = $inst['Boss'.$i.''];
                                                                        $loots = $prog->getloots($instance, $inst['Acronym'], addslashes($inst['Boss'.$i.'']), $form++);
                                                                        $percent = $prog->getper($instance, $prog->nospace(addslashes($inst['ZoneName'])), $prog->nospace(addslashes($inst['Boss'.$i.''])));
                                                                        //$body .= '<dl><dt><strong>Boss '.$i.'</strong><dd><font color="'.$color.'">'.stripslashes($name)."</font></dl>\n\n";
                                                                        $body .= ''.border('s'.$color.'','start',''.stripslashes($boss).'').'
                                                                        <table width="400">
                                                                        <tr><td>
                                                                        <img src="'.$addon['url'].'images/'.$name.'.jpg" ></a></td><td>'.$loots.'<br>Kills: n/a<br>Percent Down: '.$percent.'<br>
                                                                        </td></tr></table>
                                                                        '.border('s'.$color.'','end','').'<br>';
                                                                  }
                                                            else
                                                                  {
                                                                  $body .= ''.border('syellow','start',''.$id.'').'<br>';
                                                                        foreach( $boss as $bos => $bo)
                                                                              {
                                    
                                                                                    $color = $prog->getstatus($instance, $inst['Acronym'], addslashes($bo));
                                                                                    //$name = $prog->getloot($instance, $inst['Acronym'], addslashes($bo), $form++);
                                                                                    //$body .= '<dd><font color="'.$color.'">'.stripslashes($name)."</font>\n\n";
                                                                                    $name = $bo;
                                                                                    $loots = $prog->getloots($instance, $inst['Acronym'], addslashes($bo), $form++);
                                                                                    $percent = $prog->getper($instance, $prog->nospace(addslashes($inst['ZoneName'])), $prog->nospace(addslashes($bo)));
                                                                                    //$body .= '<dl><dt><strong>Boss '.$i.'</strong><dd><font color="'.$color.'">'.stripslashes($name)."</font></dl>\n\n";
                                                                                    $body .= ''.border('s'.$color.'','start',''.stripslashes($name).'').'
                                                                                    <table width="400">
                                                                                    <tr><td>
                                                                                    <img src="'.$addon['url'].'images/'.$name.'.jpg" ></a></td><td>'.$loots.'<br>Kills: n/a<br>Percent Down: '.$percent.'<br>
                                                                                    </td></tr></table>
                                                                                    '.border('s'.$color.'','end','').'<br>';
                                    
                                                                              }
                              
                                                                  }
                                                            $body .= ''.border('syellow','end','').'<br>';
                                                      }
                                          }
                              }
                  
                        if (isset($inst['Area'.$i.'']))
                              {
                                    if (is_array($inst['Area'.$i.'']))
                                          {
                              
                                                foreach( $inst['Area'.$i.''] as $id => $boss)
                                                      {
                        
                                                            //$body .= '<dl><dt><strong>'.$id.'</strong>';
                                                            $body .= ''.border('sorange','start',''.$id.'').'';
                        
                                                            if (!is_array($boss))
                                                                  {
                                    
                                                                        //$color = $prog->getstatus($instance, $inst['Acronym'], addslashes($bo));
                                                                        ///$name = $prog->getloot($instance, $inst['Acronym'], addslashes($bo), $form++);
                                                                        //$body .= '<dd><font color="'.$color.'">'.stripslashes($name)."</font>\n\n";
                                                                                                                                    $color = $prog->getstatus($instance, $inst['Acronym'], addslashes($inst['Boss'.$i.'']));
                                                            $name = $bo;
                                                            $loots = $prog->getloots($instance, $inst['Acronym'], addslashes($bo), $form++);
                                                            $percent = $prog->getper($instance, $prog->nospace(addslashes($inst['ZoneName'])), $prog->nospace(addslashes($bo)));
                                                            //$body .= '<dl><dt><strong>Boss '.$i.'</strong><dd><font color="'.$color.'">'.stripslashes($name)."</font></dl>\n\n";
                                                            $body .= ''.border('s'.$color.'','start',''.stripslashes($name).'').'
                                                            <table width="400">
                                                            <tr><td>
                                                            <img src="'.$addon['url'].'images/'.$name.'.jpg" ></a></td><td>'.$loots.'<br>Kills: n/a<br>Percent Down: '.$percent.'<br>
                                                            </td></tr></table>
                                                            '.border('s'.$color.'','end','').'<br>';
                  
                                                                  }
                                                            else
                                                                  {
                                                                        
                                                                        foreach( $boss as $bos => $bo)
                                                                              {
                                    
                                                                                    if (!is_array($bo))
                                                                                          {
                                                                                                /*
                                                                                                $color = $prog->getstatus($instance, $inst['Acronym'], addslashes($bo));
                                                                                                $name = $prog->getloot($instance, $inst['Acronym'], addslashes($bo), $form++);
                                                                                                $body .= '<dd><font color="'.$color.'">'.stripslashes($name)."</font>\n\n";
                                                                                               */ 
                                                                                                $color = $prog->getstatus($instance, $inst['Acronym'], addslashes($bo));
                                                                                                $name = $bo;
                                                                                                $loots = $prog->getloots($instance, $inst['Acronym'], addslashes($bo), $form++);
                                                                                                $percent = $prog->getper($instance, $prog->nospace(addslashes($inst['ZoneName'])), $prog->nospace(addslashes($bo)));
                                                                                                //$body .= '<dl><dt><strong>Boss '.$i.'</strong><dd><font color="'.$color.'">'.stripslashes($name)."</font></dl>\n\n";
                                                                                                $body .= ''.border('s'.$color.'','start',''.stripslashes($name).'').'
                                                                                                <table width="400">
                                                                                                <tr><td>
                                                                                                <img src="'.$addon['url'].'images/'.$name.'.jpg" ></a></td><td>'.$loots.'<br>Kills: n/a<br>Percent Down: '.$percent.'<br>
                                                                                                </td></tr></table>
                                                                                                '.border('s'.$color.'','end','').'<br>';
                                                            
                  
                                                                                          }
                                                                                    else
                                                                                          {
                                                                                                foreach( $bo as $b1 => $b2)
                                                                                                      {
                                                      
                                                                                                            $body .= '<dd><dl><dt><strong>'.$b1.'</strong>';
                                                      
                                                                                                            foreach( $b2 as $b3 => $b4)
                                                                                                                  {
                                                      
                                                                                                                        $color = $prog->getstatus($instance, $inst['Acronym'], addslashes($b4));
                                                                                                                        $name = $prog->getloot($instance, $inst['Acronym'], addslashes($b4), $form++);
                                                                                                                        $body .= '<dd><font color="'.$color.'">'.stripslashes($name)."</font>\n\n";
                                                      
                                                                                                                  }
                                                                                                      }
                                                                                                $body .= '</dl></dl>';
                                                                                          }                         
                                                                              }
                                                                  }
                                                            $body .= '</dl>';
                                                      }
                                                      $body .= ''.border('sorange','end','').'<br>';
                                          }
                              }
                  }
            
            
            if (isset($inst['Events']))
                  {
                        if (is_array($inst['Events']))
                              {
                                    //$body .= "<dl><dt><strong>Events</strong><dl><dd>\n\n";
                                    $body .= ''.border('sorange','start','Events').'';
                        
                                          foreach( $inst['Events'] as $id => $boss)
                                                {
                                                /*
                                                      $color = $prog->getstatus($instance, $inst['Acronym'], addslashes($boss));
                                                      $name = $prog->getloot($instance, $inst['Acronym'], addslashes($boss),$form++);
                                                      $body .= '<dd><font color="'.$color.'">'.stripslashes($name)."</font>\n\n";
                                                      */ 
                                                      $color = $prog->getstatus($instance, $inst['Acronym'], addslashes($boss));
                                                      $name = $boss;
                                                      $loots = $prog->getloots($instance, $inst['Acronym'], addslashes($boss), $form++);
                                                      $percent = $prog->getper($instance, $prog->nospace(addslashes($inst['ZoneName'])), $prog->nospace(addslashes($boss)));
                                                      //$body .= '<dl><dt><strong>Boss '.$i.'</strong><dd><font color="'.$color.'">'.stripslashes($name)."</font></dl>\n\n";
                                                      $body .= ''.border('s'.$color.'','start',''.stripslashes($name).'').'
                                                      <table width="400">
                                                      <tr><td>
                                                      <img src="'.$addon['url'].'images/'.$name.'.jpg" ></a></td><td>'.$loots.'<br>Kills: n/a<br>Percent Down: '.$percent.'<br>
                                                      </td></tr></table>
                                                      '.border('s'.$color.'','end','').'<br>';
                                                }
                                    
                                          //$body .= '</dl></dl>';
                                          $body .= ''.border('sorange','end','').'';
                              }
                  }
                        
            if (isset($inst['Trash']))
                  {
                        if (is_array($inst['Trash']))
                              {
                                    $body .= "<dl><dt><strong>Trash Loots</strong><dl><dd>\n\n";
                        
                                    foreach( $inst['Trash'] as $id => $boss)
                                          {
                                    
                                                $color = $prog->getstatus($instance, $inst['Acronym'], addslashes($boss));
                                                $name = $prog->getloot($instance, $inst['Acronym'], addslashes($boss),$form++);
                                                $body .= '<dd><font color="'.$color.'">'.$name."</font>\n\n";
                  
                                          }
                                    
                                    $body .= '</dl></dl>';
                              }
                              else
                              {
                              $body .= "<dl><dt><strong>Trash Loots</strong><dl><dd>\n\n";
                              $boss = $inst['Trash'];
                                                $color = $prog->getstatus($instance, $inst['Acronym'], addslashes($boss));
                                                $name = $prog->getloot($instance, $inst['Acronym'], addslashes($boss),$form++);
                                                $body .= '<dd><font color="'.$color.'">'.$name."</font>\n\n";
                  
                                        //  }
                                    
                                    $body .= '</dl></dl>';
                                    }
                  }
                  
            if (isset($inst['Enchants']))
                  {
                        
                              $body .= "<dl><dt><strong>Enchants Loots</strong><dl><dd>\n\n";
                              $color = $prog->getstatus($instance, $inst['Acronym'], addslashes($inst['Enchants']));
                              $name = $prog->getloot($instance, $inst['Acronym'], addslashes($inst['Enchants']),$form++);
                              $body .= '<dd><font color="'.$color.'">'.$name."</font>\n\n";
                              $body .= '</dl></dl>';
                  }                  
                  
            if (isset($inst['Opening']))
                  {
                        
                              $body .= "<dl><dt><strong>Opening Loots</strong><dl><dd>\n\n";
                              $color = $prog->getstatus($instance, $inst['Acronym'], addslashes($inst['Opening']));
                              $name = $prog->getloot($instance, $inst['Acronym'], addslashes($inst['Opening']),$form++);
                              $body .= '<dd><font color="'.$color.'">'.$name."</font>\n\n";
                              $body .= '</dl></dl>';
                  }
            if (isset($inst['RANDOMDROPPS']))
                  {
                        
                              $body .= "<dl><dt><strong>Random Boss Dropps</strong><dl><dd>\n\n";
                              $color = $prog->getstatus($instance, $inst['Acronym'], addslashes($inst['RANDOMDROPPS']));
                              $name = $prog->getloot($instance, $inst['Acronym'], addslashes($inst['RANDOMDROPPS']),$form++);
                              $body .= '<dd><font color="'.$color.'">'.$name."</font>\n\n";
                              $body .= '</dl></dl>';
                  }
            $body .= '<td width="15%"></td></tr></table>';
            $body .= ''.border('sgreen','end').'</div>';
      }
}




echo '<link rel="stylesheet" type="text/css" href="'.$addon['dir'].'style.css" />';
echo '
<table align="center" width="90%">
<tr>
<td width="250" align="left"></td><td width="50"></td><td width="600"></td>
</tr>
<tr>
<td valign="top">
'.$menu.'
</td>
<td width = "20"></td>
<td width="800" valign="top" align="center">';

echo "
\n<br /><br />\n
".$body.'
</td>
</tr>
</table>
';

echo '

<!-- Begin Java Link -->
<script type="text/javascript" language="JavaScript">
<!--
	
	var id=new tabcontent(\'rg_menu\');
      id.init();
//-->
</script>
<!-- Begin Java Link -->
<script type="text/javascript" language="JavaScript">
<!--
	var id=new tabcontent(\'rg_menu2\');
      id.init();
//-->
</script>
<!-- Begin Java Link -->
<script type="text/javascript" language="JavaScript">
<!--
	var id=new tabcontent(\'rg_menu3\');
      id.init();
//-->
</script>

';
	//echo $b;
	//		foreach( $characters as $char_name => $char)
				//{

?>
