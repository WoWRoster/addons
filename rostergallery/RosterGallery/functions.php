<?php
class ssconfig
{

 //global $wordings;

	var $message;
	var $message2;
	var $sql_debug;

function setSqlDebug( $message )
	{
		$this->sql_debug .= "$message\n";
	}

function emptyMessage()
	{
		$this->message = "";
	}

function setMessage( $message )
	{
		$this->message .= "$message\n";
	}
	
function setinstallMessage( $message2 )
	{
		$this->message2 .= "$message2\n";
	}
	
function getvars( $varname )
      {
            $var = NULL;
            
                  if ( $HTTP_GET_VARS[$varname] != '')
                  {
                        $var = $HTTP_GET_VARS[$varname];
                  } else if ( $_GET[$varname] != '')
                  {
                        $var = $_GET[$varname];
                  }
            return $var;
      }
      
	
function checkDir( $dir , $check=0 , $chmod=0 )
	{
		// See if it exists
		if( file_exists($dir) )
		{
			if( $check )
			{
				if( !is_writable($dir) )
				{
					if( $chmod )
					{
						if( chmod( $dir,0777 ) )
							return TRUE;
						else
							return FALSE;
					}
					else
						return FALSE;
				}
			}
			return TRUE;
		}
	}

#      
#     end of dir structire     
# 

function checkDirst( $ssfolder, $check=0, $chmod=0 )
	{
	$ft=0;
	foreach( $ssfolder as $dir )
            {
		    // See if it exists
                  if( file_exists($dir) )
                  {
                        if( $check )
                        {
                              if( !is_writable($dir) )
                              {
                                    if( $chmod )
                                    {
                                          if( chmod( $dir,0777 ) ){
                                                return TRUE;
                                          }
                                          else
                                          {
							     return FALSE;
							}

                                    }
                                    else
                                    {
                                          return FALSE;
                                    }
                              }
                        
                        return TRUE;
                        }
                  $ft = ( $ft + 1  );
                  //echo "".$dir." Present<br>";
                  }
                  else
                  {
                        //echo "".$dir." Not Present<br>";
                  }
            }
            //echo $ft;
            return $ft;
	}
      
#      
#     end of dir structire     
#      	

function makesubDir( $ssfolder )
	{
	
	     foreach( $ssfolder as $dir )
            {
		    // See if it exists
                  if( !file_exists($dir) )
                  {
                        if( mkdir($dir) )
                        {
                              chmod( $dir,0777 );
                              $this->setinstallMessage("Screenshot folder '".$dir."' created");
                              
		
                        }
                  }
                  else
                  {
                        $this->setinstallMessage("Could not create Screenshot folder ".$dir." or it exists");
                        
                  }
            }            
      }






function makeDir( $dir )
	{
		if( mkdir($dir) )
		{
		chmod( $dir,0777 );
		$this->setinstallMessage("Screenshot folder created");
            	return TRUE;
		
		}
		else
		{
		$this->setinstallMessage("Could not create Screenshot folder");
            	return FALSE;
		
		}
	}

	/**
	 * Get the Messages
	 *
	 * @return string | Full HTML table with messages
	 */
	 
	function getconfig(){
	     
           global $wowdb;
	     
                 

      }

	function getMessage()
	{
		$message = $this->message;

		if( !empty($message) )
		{
			// Replace newline feeds with <br />, then newline
			$messageArr = explode("\n",$message);

			$row=0;
			foreach( $messageArr as $line )
			{
				if( $line != '' )
				{
					$output .= ''.$line.'<BR>';
				}
			}

			return $output;
		}
		else
		{
			return '';
		}
	}
	
	function getinstallMessage()
	{
		$message = $this->message2;

		if( !empty($message) )
		{
			// Replace newline feeds with <br />, then newline
			$messageArr = explode("\n",$message);

			$row=0;
			foreach( $messageArr as $line )
			{
				if( $line != '' )
				{
					$output .= ''.$line.'<BR>';
				}
			}

			return $output;
		}
		else
		{
			return '';
		}
	}


      function checkver( $old, $new ){
      
            global $wowdb;
            
            $t = 0;
            
            if (!$old){
                  $t=($t + 1);
            }
            
            if ($old != $new){
                  if ($old < $new){ 
                        $t=($t + 1);
                  }
            }
      //echo $t;
      return $t; 
      
      }
      
      function checkDb( $table )
	{
		global $wowdb;

		$sql_str = "SHOW TABLES LIKE '$table';";
            echo "\n\n\n\n<!-- $sql_str -->\n\n\n\n";
		$this->setSqlDebug("checkDb: $sql_str");

		$result = $wowdb->query($sql_str);

		$r = $wowdb->fetch_assoc($result);

		if( empty($r) )
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function config( $defaults )
	{
	global $wowdb;
	$mis = '0';
	$total = '0';
	     foreach( $defaults as $default => $val)
			{
                        $keys = array_keys($defaults);      
				$query5 = "SELECT * FROM `".ROSTER_CONFIGTABLE."` WHERE `config_name` ='".$default."' ";
				//echo $default.' - '. $val .'<br>';
      			$result5 = mysql_query ($query5) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query5);
      			$row = mysql_fetch_array($result5);
      			$b = $wowdb->num_rows($result5);
      			$total++;
      			if ($b ==0){
      			$mis++;
      			}
				//$update++;
			}
			//echo 'missed'.$mis.' - Total '.$total.'<br>';

            if ($mis == 0){
                  //echo 'false';
                  return FALSE;
            }
            if ($mis == $true ){
                  //echo 'true';
                  return TRUE;
            }
	
	}
	
	
	function tableexists()
	{
	/*
	$sql_str = "show table status like '".ROSTER_SCREENTABLE."'";
	$result5 = mysql_query ($sql_str) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$sql_str);
      			
      $table_exists = mysql_num_rows($result5) == 1;
      echo $table_exists;
      return $table_exists;
*/
            $table_name = ROSTER_SCREENTABLE;
            $table_found = false;
            
            $sql_str = "SHOW TABLES";
            $result = mysql_query ($sql_str) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$sql_str);
      

                  while($row = mysql_fetch_array($result)) {
                        if($row[0] == $table_name) {
                        $table_found = true;
                        break;
                        }
                  }

            if($table_found) {
            //echo "Table exixts";
                  return 1;
            } else {
            //echo "table doesnot";
                  return 0;
            }	
	}
	
	
	function tablecompare( $db_table )
	{
            global $wowdb;
	
            $sql_str = "SHOW COLUMNS FROM `".ROSTER_SCREENTABLE."`";

            $this->setSqlDebug( "getDbColumns: $sql_str" );

            $result = $wowdb->query( $sql_str );

            while( $row = $wowdb->fetch_array( $result ) )
            {
                  $col_names[] = $row[0];
            }
            
            $diff = array_diff( $db_table, $col_names );
            
            if ( empty( $diff ) ){
            
                  return false;
            
            } else {
            
                  return true;
            
            }
            
	}
	
	
      function configuptest( $defaults )
	{
	global $wowdb;
	$mis = '0';
	$total = '0';
	     foreach( $defaults as $default => $val)
			{
                        $keys = array_keys($defaults);      
				$query5 = "SELECT * FROM `".ROSTER_CONFIGTABLE."` WHERE `config_name` ='".$default."' ";
				//echo $default.' - '. $val .'<br>';
      			$result5 = mysql_query ($query5) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query5);
      			$row = mysql_fetch_array($result5);
      			$b = $wowdb->num_rows($result5);
      			$total++;
      			if ($b ==0){
      			$mis++;
      			}
				//$update++;
			}
			//echo 'missed'.$mis.' - Total '.$total.'<br>';
            if ($mis <= $total && $miss != 0){
                  
                  //echo 'upgrade';
                  return 2;
                  
            }
            if ($mis == $total){
                  //echo 'false';
                  return FALSE;
            }

	
	}

      function upgradetable( $db_table )
      {
            global $wowdb;
            
            $sql_str = "SHOW COLUMNS FROM `".ROSTER_SCREENTABLE."`";

			//$this->setSqlDebug("getDbColumns: $sql_str");

			$result = $wowdb->query($sql_str);

			while( $row = $wowdb->fetch_array($result) )
			{
				$col_names[] = $row[0];
			}
	
            $diff = array_diff($db_table, $col_names);
            $v = '0';
            foreach( $diff as $id => $val){
            $v++;
            $sql = "ALTER TABLE `".ROSTER_SCREENTABLE."` ADD COLUMN `".$val."` varchar (10) ";
            $result = $wowdb->query($sql);
            echo $val.'<br>';
            }
            $this->setinstallMessage( 'Table "'.ROSTER_SCREENTABLE.'" upgraded '.$v." Columns added<br>");
      }
      
      function upgradedb($script_filename, $defaults, $version )
      {
      global $wowdb;
      $missing = array();      
            foreach( $defaults as $default => $val)
			{
			$keys = array_keys($defaults);      
				$query5 = "SELECT * FROM `".ROSTER_CONFIGTABLE."` WHERE `config_name` ='".$default."' ";
				//echo $default.' - '. $val .'<br>';
      			$result5 = mysql_query ($query5) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query5);
      			$row = mysql_fetch_array($result5);
      			if ($row == 0){
      			$missing[$default] = $val;
      			}
				//$update++;
			}
			$sql2 = "SELECT MAX(id) as bob FROM `".ROSTER_CONFIGTABLE."`";
                  $results2 = $wowdb->query($sql2);
                  $row2 = $wowdb->fetch_array($results2);

                  $num = $row2['bob'];
                  $missingrow = 0;
      
      foreach( $missing as $key => $value)
            {
			$num = ($num + 1);
			//echo $key.' - '.$value.'<br>';
                  $sql3 = "INSERT INTO `".ROSTER_CONFIGTABLE."` (`id`, `config_name`, `config_value`, `form_type`, `config_type`) VALUES (".$num.", '".$key."', '".$value."', NULL, 'addon_rg')";
                  $bob3 = $wowdb->query($sql3) or exit( 'Incert data roster config: '.$wowdb->error() );
                  $missingrow++;

            }
            $sql4 = "UPDATE `".ROSTER_CONFIGTABLE."` SET `config_value` = '".$version."' WHERE `config_name` = 'rg_version' LIMIT 1";
      $bob4 = $wowdb->query($sql4) or exit( 'Incert data roster config: '.$wowdb->error() );
      
                  $this->setinstallMessage( 'Config upgraded<br>'.$missingrow." Rows Incerted<br>");
      }

	
      
      
      function installDb($script_filename)
	{
		global $wowdb;

		$sql1 =  "
            CREATE TABLE `".ROSTER_SCREENTABLE."` (
            `id` int(11) NOT NULL auto_increment,
            `file` varchar(255) NOT NULL default '',
            `caption` varchar(255) NOT NULL default '',
            `disc` text NOT NULL default '',
            `ext` varchar(255) NOT NULL default '',
            `catagory` varchar(255) NOT NULL default '',
            `approve` varchar(3) NOT NULL default '',
            `votes` varchar(10) NOT NULL default '',
            `rateing` varchar(10) NOT NULL default '',
            PRIMARY KEY  (`id`)
            ) ";
                  
            $sql2 = "INSERT INTO `".ROSTER_SCREENTABLE."` ( `id` , `file` , `caption` , `desc` , `ext` , `catagory` , `approve`, `votes`, `rateing` ) VALUES ('0', '0', '0', '0', '0', '0', '0', '0', '0')";
            
            $error = 0;

		$this->setSqlDebug("installDb: $sql");

		$bob = $wowdb->query($sql1) or exit( 'installDb: '.$wowdb->error().' -('.$sql1.')' );
		$bob2 = $wowdb->query($sql2) or exit( 'installDb: '.$wowdb->error().' -('.$sql2.')' );
			
            if ( $bob && $bob2){
		    $this->setinstallMessage("Table has been Created\n");
		}
		    
		else
		{
			$this->setinstallMessage("Cannot Create Table");
		}
	}

// create the table


// install config settings
function installcfg($script_filename, $defaults)
	{
		global $wowdb;

					$sql2 = "SELECT MAX(id) as bob FROM `".ROSTER_CONFIGTABLE."`";
$results2 = $wowdb->query($sql2);
$row2 = $wowdb->fetch_array($results2);

                  $num = $row2['bob'];
            $error = 0;
             foreach( $defaults as $default => $val){
                  $num++;
                  $sql3 = "INSERT INTO `".ROSTER_CONFIGTABLE."` ( `id` , `config_name` , `config_value` , `form_type` , `config_type` ) 
                  VALUES ('$num' , '$default', '$val' , NULL , 'addon_rg')";

                  $this->setSqlDebug("installDb[$mode]: $sql3");
                  echo "<!-- $sql3 -->";
		      $upres = $wowdb->query($sql3) or exit( 'Incert roster_config data: '.$wowdb->error().' -('.$sql3.')' );
		      $update++;
           
                  if ( !$upres ){
                        $error = ($error + 1);
                  }
            }
		
		if ( $upres && $error == 0 ){
			$this->setinstallMessage("Roster Config Settings have been installed\n");
                  if ($missingrow >=1){
                  $this->setinstallMessage( $missingrow." Rows Incerted<br>");
                  }
                  
		}
		else
		{
			$this->setinstallMessage("Cannot upgrade database");
		}

	}


// new function for voting      
      
      function vote( $id, $vote ){
      global $wowdb;

      $query = "SELECT * FROM `".ROSTER_SCREENTABLE."` WHERE `id` ='".$id."'";
      $result = $wowdb->query($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
      $row = $wowdb->fetch_array($result);
      
      $count = ( $row['votes'] + 1);
      $rate = ( $row['rateing'] + $vote );

      $query1 = "UPDATE `".ROSTER_SCREENTABLE."` SET `votes` = '".$count."' , `rateing` = '".$rate."' WHERE `id` ='".$id."'";
      $result1 = $wowdb->query($query1) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query1);
      //$row = $wowdb->fetch_array($result);
      if ($result1){     
      $this->setMessage( '<span class="green">     Vote Accepted!     </span>' );
      }
      
      }
// end new function      

      
      function approvesc( $approve ){
      $query = "UPDATE `".ROSTER_SCREENTABLE."` SET `approve` = 'YES' WHERE `id` ='".$approve."'";
      $result = mysql_query ($query) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query);
      $this->setMessage( '<span class="green">Image with ID '.$approve.' is now Approved</span>' );
      }
          
      
      
      function deletesc( $delete ){

      			$query5 = "SELECT * FROM `".ROSTER_SCREENTABLE."` WHERE id='".$delete."' ";
      			$result5 = mysql_query ($query5) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$query5);


      			//any other code tidbits here, error pages etc
      			mysql_query ("DELETE FROM `".ROSTER_SCREENTABLE."` WHERE id='$delete' ");
      			$row = mysql_fetch_array($result5);
      			$dir = "screenshots/";
      			$filename = $row['catagory']."/".$row['file'].'.'.$row['ext'];
      			$filename2 = "thumbs/".$row['file'].'-thumb.'.$row['ext'];
      			if( empty($delete) )
	  				{
	  					$this->setMessage( 'Please select an image to delete' );
	  					return FALSE;
	  				}
	  				else
	  				{
	  					if( file_exists($dir.$filename) )
	  					{
	  						if( unlink($dir.$filename) && unlink($dir.$filename2))
	  						{
	  							$this->setMessage( '<span class="green">'.$filename.' & '.$filename2.'</span>: <span class="red">Deleted</span>' );
	  							return TRUE;

	  						}
	 						else
	 						{
	 							$this->setMessage( str_replace( '\\','/',$dir ).$filename.': Could not be deleted. I don&acute;t know why' );
	  							return FALSE;
	  						}

	   					}
	  		   	}
        }

      function uploadwmImage( $dir, $filename){
      
            $target_path = $dir."/".basename( $_FILES['wmfile']['name']);
            if(move_uploaded_file($_FILES['wmfile']['tmp_name'], $target_path)) {
                  $this->setMessage("The file ".basename( $_FILES['wmfile']['name'])." has been uploaded <br> To the Watermark Directory");
            }else{
                  $this->setMessage("Your uploaded was unseccessful<BR>");
            exit;
            }
            
      }
	function uploadImage( $dir , $filename, $caption, $catagory, $desc, $width ,$height, $wm_loc, $wm_use, $wm_file, $wm_dir )
	{   global $wowdb;
            $fname = '';
            $extension = '';
            $upfilename = '';

            $extension = substr($filename, strrpos($filename, '.')+1);
            $target_path = $dir."/".$catagory."/";
            $sql = "SELECT * FROM `".ROSTER_SCREENTABLE."` ORDER BY `id` DESC LIMIT 0 , 1";
            $result = $wowdb->query($sql) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$sql);
            $pict = $wowdb->getrow($result);
            list($name, $num) = explode("ss", $pict['file']);
            //echo $name ." - ".$num." - ".($num + 1);
            $fname ="ss".($num + 1);

            $target_path = $target_path . basename( $fname.".".$extension );
            $fileloc = $dir."/".$catagory."/". basename( $fname );
            
            //echo $target_path;
            $upfilename = $fname.".".$extension;
            if (($extension =="jpg" OR $extension=="gif" OR $extension =="JPG" OR $extension=="GIF" OR $extension=="jpeg" OR $extension=="JPEG")){
                  if(move_uploaded_file($_FILES['userfile']['tmp_name'], $target_path)) {
                        $this->setMessage("The file ".basename( $_FILES['userfile']['name'])." has been uploaded as ".$upfilename." - Pending admin approval");
                  }else{
                        echo "Your uploaded file must be of JPG or GIF or jpg or gif. Other file types are not allowed<BR>";
                  exit;}

            $sql2 = "INSERT INTO `".ROSTER_SCREENTABLE."` ( `id` , `file` , `caption` , `disc` , `ext`, `catagory`, `approve` ) VALUES ( NULL , '".$fname."', '".$caption."', '".$desc."' , '".$extension."', '".$catagory."', '');";
            $result2 = $wowdb->query($sql2) or die_quietly($wowdb->error(),'Database Error',basename(__FILE__),__LINE__,$sql2);
            //$pict2 = $wowdb->getrow($resul2);


            ///////// Start the thumbnail generation//////////////
            $n_width= $width;          // Fix the width of the thumb nail images
            $n_height= $height;         // Fix the height of the thumb nail imaage

            $tsrc1= $dir.'/'.$catagory.'/'.$fname.".".$extension;
            $tsrc= $dir.'/thumbs/'.$fname."-thumb.".$extension;   // Path where thumb nail image will be stored
            //echo '<br>'.$tsrc.'<br>';
            if (!($extension =="jpg" OR $extension=="gif" OR $extension =="JPG" OR $extension=="GIF" OR $extension=="jpeg" OR $extension=="JPEG")){echo "Your uploaded file must be of JPG or jpg or GIF or gif. Other file types are not allowed<BR>";
            exit;}
/////////////////////////////////////////////// Starting of GIF thumb nail creation///////////
            if (@$extension=="gif" OR $extension=="GIF")
            {
                  $im=ImageCreateFromGIF($tsrc1);
                  $width=ImageSx($im);              // Original picture width is stored
                  $height=ImageSy($im);                  // Original picture height is stored
                  $newimage=imagecreatetruecolor($n_width,$n_height);
                  imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
                  
                  #
##########################################################################################################
#
#           This is where the new water mark systen starts : look some time but i got it
#
#
#

      if ($wm_use == 1){
            $widthtn=ImageSx($newimage);               // thumb width is stored
            $heightn=ImageSy($newimage);               // thumb width is stored
            $wm = RG_DIR.$wm_dir.'/'.$wm_file;
            if( file_exists($wm)){
            //$widthwm=ImageSx($wm);               // wm width is stored
            //$heighwm=ImageSy($wm);               // wm width is stored
            $blah = getimagesize($wm);
            $type = $blah['mime'];
            $widthwm = $blah[0];
            $heightwm = $blah[1];
#                 this is where we determin where to place the water mark we ar gona 
#                 allways ass a 5pix buffer incase the image uses the hole image size
#                 1 = top left - 2 = top right - 3 = bottom left - 4 = bottom right
      
                  if ($wm_loc == 1){
                        $lox = 5;
                        $loy = 5;                  
                  }
                  if ($wm_loc == 2){
                        $lox = (($widthtn - $widthwm) - 5);
                        $loy = 5;                  
                  }
                  if ($wm_loc == 3){
                        $lox = 5;
                        $loy = (($heightn - $heightwm) - 5);                  
                  }
                  if ($wm_loc == 4){
                        $lox = (($widthtn - $widthwm) - 5);
                        $loy = (($heightn - $heightwm) - 5);                  
                  }
            
            $this->combineImage( $newimage,$wm,(__LINE__),$lox,$loy );
            }
            else { echo ' watermark '.$wm.' does not exist';}

      }
#
############################################################################################################
#
                  if (function_exists("imagegif")) {
                        Header("Content-type: image/gif");
                        ImageGIF($newimage,$tsrc);
                  }
                  elseif (function_exists("imagejpeg")) {
                        Header("Content-type: image/jpeg");
                        ImageJPEG($newimage,$tsrc);
                  }
                  chmod("$tsrc",0777);
            }

            ////////// end of gif file thumb nail creation//////////

            ////////////// starting of JPG thumb nail creation//////////
            if($extension=="jpg" OR $extension=="jpeg" OR $extension=="JPEG" OR $extension=="JPG"){
            $im=ImageCreateFromJPEG($tsrc1);
            $width=ImageSx($im);              // Original picture width is stored
            $height=ImageSy($im);             // Original picture height is stored
            $newimage=imagecreatetruecolor($n_width,$n_height);
            imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
#
##########################################################################################################
#
#           This is where the new water mark systen starts : look some time but i got it
#
#
#

      if ($wm_use == 1){
            $widthtn=ImageSx($newimage);               // thumb width is stored
            $heightn=ImageSy($newimage);               // thumb width is stored
            $wm = ''.RG_DIR.$wm_dir.'/'.$wm_file;
            if( file_exists($wm)){
            //$widthwm=ImageSx($wm);               // wm width is stored
            //$heighwm=ImageSy($wm);               // wm width is stored
            $blah = getimagesize($wm);
            $type = $blah['mime'];
            $widthwm = $blah[0];
            $heightwm = $blah[1];
#                 this is where we determin where to place the water mark we ar gona 
#                 allways ass a 5pix buffer incase the image uses the hole image size
#                 1 = top left - 2 = top right - 3 = bottom left - 4 = bottom right
      
                  if ($wm_loc == 1){
                        $lox = 5;
                        $loy = 5;                  
                  }
                  if ($wm_loc == 2){
                        $lox = (($widthtn - $widthwm) - 5);
                        $loy = 5;                  
                  }
                  if ($wm_loc == 3){
                        $lox = 5;
                        $loy = (($heightn - $heightwm) - 5);                  
                  }
                  if ($wm_loc == 4){
                        $lox = (($widthtn - $widthwm) - 5);
                        $loy = (($heightn - $heightwm) - 5);                  
                  }
            
            $this->combineImage( $newimage,$wm,(__LINE__),$lox,$loy );
            }
else { echo ' watermark '.$wm.' does not exist';}
      }
#
############################################################################################################
#

            
            ImageJpeg($newimage,$tsrc);
            
            
            
            chmod("$tsrc",0777);
            }
            ////////////////  End of JPG thumb nail creation //////////


             else{
    		$this->setMessage("There was an error uploading the file, please try again!");
		}

	}
}

function processData($data)
{
	global $wowdb; //, $queries;
      global $addon_cfg;
	$wowdb->reset_values();
//print_r($data);
	// Update only the changed fields
	foreach( $data as $settingName => $settingValue )
	{
			if( $config['config_value'] != $settingValue && $settingName != 'process' )
			{
				$update_sql[] = "UPDATE `".ROSTER_CONFIGTABLE."` SET `config_value` = '".$wowdb->escape( $settingValue )."' WHERE `config_name` = '".$settingName."';";
			}
		
	}

	// Update DataBase
	if( is_array($update_sql) )
	{
		foreach( $update_sql as $sql )
		{
			$queries[] = $sql;

			$result = $wowdb->query($sql);
			if( !$result )
			{
				$this->setMessage('<span style="color:#0099FF;font-size:11px;">Error saving settings</span><br />MySQL Said:<br /><pre>'.$wowdb->error().'</pre>');
			}
		}
		$this->setMessage('<span style="color:#0099FF;font-size:11px;">Settings have been changed</span>');
	}
	else
	{
		$this->setMessage('<span style="color:#0099FF;font-size:11px;">No changes have been made</span>');
	}
}


function get_size2($path)
   {
       if(!is_dir($path)) return filesize($path);
   if ($handle = opendir($path)) {
       $size = 0;
       while (false !== ($file = readdir($handle))) {
           if($file!='.' && $file!='..'){
                   $size += filesize($path.'/'.$file);
               $size += $this->get_size2($path.'/'.$file);
           }
       }
       closedir($handle);
       //echo "-".$size."<br>";
       return $size;
   }
} 


function get_size($ssfolder)
      {
$size = 0;
      foreach( $ssfolder as $path )
            {
                  if(!is_dir($path)) return filesize($path);
                        if ($handle = opendir($path)) {
                        
                        while (false !== ($file = readdir($handle)))
                              {
                                    if($file!='.' && $file!='..'){
                                    $size += filesize($path.''.$file);
                                    //$size += $this->get_size2($path.''.$file);
                              }
                        }closedir($handle);
                  }//closedir($handle);
            }

      $size = $this->size_hum_read($size);

      return $size; 
}

function size_hum_read($size){
/*
Returns a human readable size
*/
  $i=0;
  $iec = array("B", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB");
  while (($size/1024)>1) {
   $size=$size/1024;
   $i++;
  }
  return substr($size,0,strpos($size,'.')+3).$iec[$i];
}



function chksett($old, $new, $script_filename, $tableinstalled, $configinstalled, $folderinstalled, $folderstinstalled, $versioninstalled, $configupgrade, $tableupgrade, $todoinstall){

    //
    // Server settings
    //
    // Roster versions
    if ($old == ''){
    $old = '0.0';
    }
    $our_roster_version = $old;

    $their_roster_version = $new;


    // Roster Versions
    $our_roster_version = (( $our_roster_version >= $their_roster_version || $their_roster_version == 'Unknown' ) ? '<font color="green">' : '<font color="red">') . $our_roster_version . '</font>';

    // PHP Versions
    $our_php_version   = (( phpversion() >= '4.3.0' ) ? '<font color="green">' : '<span class="negative">') . phpversion() . '</font>';
    $their_php_version = '4.3.0+';
    
    // Modules
    $our_mysql   = ( extension_loaded('mysql') ) ? '<font color="green">Yes</font>' : '<font color="red">No</font>';
    // Required?
    $their_mysql = 'Yes';

    $our_gd    = ( function_exists('imageTTFBBox') && function_exists('imageTTFText') && function_exists('imagecreatetruecolor') )  ? '<font color="green">Yes</font>' : '<font color="red">No</font> - <a href="gd_info.php" target="_blank">More Info</a>';
    // Required?
    $their_gd  = 'YES';
    $uploadsshoulebe = "ON";
    $uploadsare = $this->onOff(ini_get('file_uploads'));

    if ( (phpversion() < '4.3.0') || (!extension_loaded('mysql')) )
    {
        $this->setMessage('<span style="font-weight: bold; font-size: 14px;">Sorry, your server does not meet the minimum requirements for Roster</span>');
    }
    else
    {
        $this->setMessage('Roster Installer has scanned your server and determined that it meets the requirements');
    }

    //
    // Output the page
    //
	
print border('sgreen','start','Roster Gallory Installer');
    echo '
    
    <table class="borderless" cellspacing="8"><tr><td valign="top">

<table border="0" cellspacing="1" cellpadding="2">
  <tr>
      <td class="ss_row2" align="left">Installer ToDo List</td>
      <td class="ss_row2" align="right">'.$todoinstall.'</td>
  </tr>
  <tr>
    <th align="left" colspan="3">Roster Gallory Verison</th>
  </tr>
  <tr>
    <td class="ss_row1" align="right">This:</td>
    <td class="ss_row1" align="left">'.$our_roster_version.'</td>
  </tr>
  <tr>
    <td class="ss_row2" align="right">Latest:</td>
    <td class="ss_row2" align="left">'.$new.'</td>
  </tr>
</table>

</td>
<td valign="top">

<table cellspacing="1" cellpadding="2">
  <tr>
    <th align="left" colspan="3">PHP Info</th>
  </tr>
  <tr>
    <td colspan="3" class="ss_row1" align="left"><small><a href="install.php?mode=phpinfo">View phpinfo()</a></small></td>
  </tr>
  <tr>';
  echo "
    <td class=\"ss_row2\" align=\"left\">PHP Version:</td>
    <td class=\"ss_row2\" align=\"left\">Using: ".$our_php_version."</td>
    <td class=\"ss_row2\" align=\"left\">Required: ".$their_php_version."</td>
  </tr>
  <tr>
    <td class=\"ss_row1\" align=\"left\">MySQL Module:</td>
    <td class=\"ss_row1\" align=\"left\">Available: ".$our_mysql."</td>
    <td class=\"ss_row1\" align=\"left\">Required: ".$their_mysql."</td>
  </tr>
  <tr>
    <td class=\"ss_row2\" align=\"left\">GD Module:</td>
    <td class=\"ss_row2\" align=\"left\">Available: ".$our_gd."</td>
    <td class=\"ss_row2\" align=\"left\">Required: ".$their_gd."</td>
  </tr>
  <tr>
    <td class=\"ss_row2\" align=\"left\">File Uploads:</td>
    <td class=\"ss_row2\" align=\"left\">Uploads are: ".$uploadsare."</td>
    <td class=\"ss_row2\" align=\"left\">Uploads should be: ".$uploadsshoulebe."</td>
  </tr>
</table>

</td>
</tr></table>";
echo '

<form method="post" action="'.$script_filename.'&install=install&table='.$tableinstalled.'&folder='.$folderinstalled.'&config='.$configinstalled.'&version='.$versioninstalled.'&upconfig='.$configupgrade.'&tableupgrade='.$tableupgrade.'&folderstinstalled='.$folderstinstalled.'" name="post">
<input type="hidden" name="install_step" value="2" />

<div align="center"><input type="submit" name="submit" value="Go" class="mainoption" /></div>
</form>';
print border('sgreen','end');
}


function deleteDir($dir)
{

     if (substr($dir,-1) != "/") $dir .= "/";
  if (!is_dir($dir)) return false;

  if (($dh = opendir($dir)) !== false) {
   while (($entry = readdir($dh)) !== false) {
     if ($entry != "." && $entry != "..") {
       if (is_file($dir . $entry) || is_link($dir . $entry)) unlink($dir . $entry);
       else if (is_dir($dir . $entry)) $this->deleteDir($dir . $entry);
     }
   }
   closedir($dh);
   rmdir($dir);

   return true;
  }
  return false;
}

function uninstall($script_filename, $defaults, $ssfolder){
global $wowdb, $wordings, $roster_conf;
$SQL1 = "DELETE FROM `".ROSTER_CONFIGTABLE."` WHERE `config_type` = 'addon_rg'";
$SQL2 = "DROP TABLE `".ROSTER_SCREENTABLE."`";

$bob = $wowdb->query($SQL1) or die_quietly( 'REMOVE CONFIG: '.$wowdb->error().' -('.$SQL1.')' );
$bob2 = $wowdb->query($SQL2) or die_quietly( 'REMOVE TABLE: '.$wowdb->error().' -('.$SQL2.')' );

//foreach( $ssfolder as $dir )
//            {
$this->deleteDir('screenshots/');
//            }
if ( $bob && $bob2){
		
		echo "UNINSTALL was successfull...<br>Click <a href=\"".$script_filename."\">HERE</a> to continue\n";
		
		print border('sgreen','start',$wordings[$roster_conf['roster_lang']]['ss']['uninstallmsgtitle']);
    echo '
    
    <table class="borderless" cellspacing="8">
    <tr>
<td valign="top">

<table cellspacing="1" cellpadding="2">
  <tr>
    <th align="left" colspan="3">PHP Info</th>
  </tr>
  <tr>
    <td colspan="3" class="ss_row1" align="left"><small><a href="install.php?mode=phpinfo">View phpinfo()</a></small></td>
  </tr>
  <tr>';
  echo "
    <td class=\"ss_row2\" align=\"left\">".$wordings[$roster_conf['roster_lang']]['ss']['uninstallmsg']."</td>
  </tr>
</table>

</td>
</tr></table>";
echo '

<form method="post" action="'.$roster_conf['roster_dir'].'/index.php" name="post">
<input type="hidden" name="install_step" value="2" />

<div align="center"><input type="submit" name="submit" value="Go" class="mainoption" /></div>
</form>';
print border('sgreen','end');

	}
	else
	{
		return "Cannot UNinstall database";
	}
}


function assign_vars($vararray)
	{
		foreach ($vararray as $key => $val)
		{
			$this->_tpldata[$key] = $val;
		}

		return true;
	}

function onOff($bool)
{
	if($bool)
	{
		return "<span class=\"green\">On</span>";
	}
	else
	{
		return "<span class=\"red\">Off</span>";
	}
}

	function combineImage( $image,$filename,$line,$x_loc,$y_loc )
	{
		$info = getimagesize($filename);

		switch( $info['mime'] )
		{
			case 'image/jpeg' :
				$im_temp = @imagecreatefromjpeg($filename);
				break;

			case 'image/png' :
				$im_temp = @imagecreatefrompng($filename);
				break;

			case 'image/gif' :
				$im_temp = @imagecreatefromgif($filename);
				break;

			default:
			break;
		}

		// Get the image dimentions
		$im_temp_width = imageSX( $im_temp );
		$im_temp_height = imageSY( $im_temp );

		// Copy created image into main image
		@imagecopy( $image,$im_temp,$x_loc,$y_loc,0,0,$im_temp_width,$im_temp_height );

		// Destroy the temp image
		if( isset($im_temp) )
		{
			@imageDestroy( $im_temp );
		}
	}		
function debugMode( $line,$message,$file=null,$config=null,$message2=null )
	{
		global $im;

		// Destroy the image
		if( isset($im) )
			imageDestroy($im);

		if( is_numeric($line) )
			$line -= 1;

		$error_text = 'Error!';
		$line_text  = 'Line: '.$line;
		$file  = ( !empty($file) ? 'File: '.$file : '' );
		$config = ( $config ? 'Check the config file' : '' );
		$message2 = ( !empty($message2) ? $message2 : '' );

		$lines = array();
		$lines[] = array( 's' => $error_text, 'f' => 5, 'c' => 'red' );
		$lines[] = array( 's' => $line_text,  'f' => 3, 'c' => 'blue' );
		$lines[] = array( 's' => $file,       'f' => 2, 'c' => 'green' );
		$lines[] = array( 's' => $message,    'f' => 2, 'c' => 'black' );
		$lines[] = array( 's' => $config,     'f' => 2, 'c' => 'black' );
		$lines[] = array( 's' => $message2,   'f' => 2, 'c' => 'black' );

		$height = $width = 0;
		foreach( $lines as $line )
		{
			if( strlen($line['s']) > 0 )
			{
				$line_width = ImageFontWidth($line['f']) * strlen($line['s']);
				$width = ( ($width < $line_width) ? $line_width : $width );
				$height += ImageFontHeight($line['f']);
			}
		}

		$im = @imagecreate($width+1,$height);
		if( $im )
		{
			$white = imagecolorallocate( $im, 255, 255, 255 );
			$red = imagecolorallocate( $im, 255, 0, 0 );
			$green = imagecolorallocate( $im, 0, 255, 0 );
			$blue = imagecolorallocate( $im, 0, 0, 255 );
			$black = imagecolorallocate( $im, 0, 0, 0 );

			$linestep = 0;
			foreach( $lines as $line )
			{
				if( strlen($line['s']) > 0 )
				{
					imagestring( $im, $line['f'], 1, $linestep, $this->utf8_to_nce($line['s']), $$line['c'] );
					$linestep += ImageFontHeight($line['f']);
				}
			}

			header( 'Content-type: image/gif' );
			imagegif( $im );
			imageDestroy( $im );
		}
		else
		{
			if( !empty($file) )
			{
				$file = "[<span style=\"color:green\">$file</span>]";
			}
			$string = "<strong><span style=\"color:red\">Error!</span></strong>";
			$string .= "<span style=\"color:blue\">Line $line:</span> $message $file\n<br /><br />\n";
			if( $config )
			{
				$string .= "$config\n<br />\n";
			}
			if( !empty($message2) )
			{
				$string .= "$message2\n";
			}
			print $string;
		}

		exit();
	}
	
	function utf8_to_nce( $utf = '' )
	{
		if($utf == '')
		{
			return($utf);
		}

		$max_count = 5;		// flag-bits in $max_mark ( 1111 1000 == 5 times 1)
		$max_mark = 248;	// marker for a (theoretical ;-)) 5-byte-char and mask for a 4-byte-char;

		$html = '';
		for($str_pos = 0; $str_pos < strlen($utf); $str_pos++)
		{
			$old_val = ord( $utf{$str_pos} );
			$new_val = 0;

			$utf8_marker = 0;

			// skip non-utf-8-chars
			if( $old_val > 127 )
			{
				$mark = $max_mark;
				for($byte_ctr = $max_count; $byte_ctr > 2; $byte_ctr--)
				{
					// actual byte is utf-8-marker?
					if( ( $old_val & $mark  ) == ( ($mark << 1) & 255 ) )
					{
						$utf8_marker = $byte_ctr - 1;
						break;
					}
					$mark = ($mark << 1) & 255;
				}
			}

			// marker found: collect following bytes
			if($utf8_marker > 1 and isset( $utf{$str_pos + 1} ) )
			{
				$str_off = 0;
				$new_val = $old_val & (127 >> $utf8_marker);
				for($byte_ctr = $utf8_marker; $byte_ctr > 1; $byte_ctr--)
				{
					// check if following chars are UTF8 additional data blocks
					// UTF8 and ord() > 127
					if( (ord($utf{$str_pos + 1}) & 192) == 128 )
					{
						$new_val = $new_val << 6;
						$str_off++;
						// no need for Addition, bitwise OR is sufficient
						// 63: more UTF8-bytes; 0011 1111
						$new_val = $new_val | ( ord( $utf{$str_pos + $str_off} ) & 63 );
					}
					// no UTF8, but ord() > 127
					// nevertheless convert first char to NCE
					else
					{
						$new_val = $old_val;
					}
				}
				// build NCE-Code
				$html .= '&#'.$new_val.';';
				// Skip additional UTF-8-Bytes
				$str_pos = $str_pos + $str_off;
			}
			else
			{
				$html .= chr($old_val);
				$new_val = $old_val;
			}
		}
		return($html);
	}
	
function listFiles( $dir , $ext )
	{
		$arrFiles = array();

		// Open the directory
		$tmp_dir = @opendir( $dir );

		if( !empty($tmp_dir) )
		{
			// Read the files
			while( $file = readdir($tmp_dir) )
			{
				$pfad_info = pathinfo($file);

				if( is_array($ext) )
				{
					if( in_array(strtolower($pfad_info['extension']),$ext))
					{
						$name = str_replace('.'.$pfad_info['extension'],'',$file);
						$arrFiles += array($file => $name);
					}
				}
				else
				{
					if( strtolower($pfad_info['extension']) == strtolower($ext) )
					{
						$name = str_replace('.'.$pfad_info['extension'],'',$file);
						$arrFiles += array($file => $name);
					}
				}
			}
			// close the directory
			closedir($tmp_dir);

			//sort the list
			asort($arrFiles);
		}
		return $arrFiles;
	}
	
	function createOptionList( $values , $selected , $id , $type='' , $param='' )
	{
		if( !empty($selected) )
		{
			$select_one = true;
		}

		$option_list = "\n  <select class=\"sc_select\" name=\"{$id}\" $param>\n    <option value=\"\">--None--</option>\n";

		foreach( $values as $Aname => $Avalue )
		{
			switch ($type)
			{
				case 0: // name value
				case 'list':
					$value = $Avalue;
					$name = $Aname;
					break;

				case 1: // value name
				case 'rev':
					$value = $Aname;
					$name = $Avalue;
					break;

				case 2: // name name
				case 'name':
					$value = $Aname;
					$name = $Aname;
					break;

				case 3: // value value
				case 'value':
					$value = $Avalue;
					$name = $Avalue;
					break;

				default:
					$value = $Avalue;
					$name = $Aname;
					break;
			}

			if( $selected == $value && $select_one )
			{
				$option_list .= "    <option value=\"{$value}\" selected=\"selected\">{$name}</option>\n";
				$select_one = false;
			}
			else
			{
				$option_list .= "    <option value=\"{$value}\">{$name}</option>\n";
			}
		}
		$option_list .= "  </select>";

		return $option_list;
	}
function createTip( $content , $caption )
	{
		$tipsettings = ",WRAP";

		if( !empty($caption) )
			$caption2 = ",CAPTION,'$caption'";

		$tip = "<div style=\"cursor:help;\" onmouseover=\"overlib('$content'$caption2$tipsettings);\" onmouseout=\"return nd();\">$caption</div>";

		return $tip;
	}

	
}


?>
