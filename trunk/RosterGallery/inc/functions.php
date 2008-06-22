<?php
class ssconfig
{

 //global $wordings;

	var $message;
	var $message2;
	var $message3;
	var $sql_debug;
	var $id;
	var $min;
	var $max;
	var $c;

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

function setAdminMessage( $message3 )
	{
		$this->message3 .= "$message3\n";
	}	
function getvars( $varname )
      {
            $var = NULL;
            
                  if ( isset($HTTP_GET_VARS[$varname]) != '')
                  {
                        $var = $HTTP_GET_VARS[$varname];
                  } 
                  else if ( isset($_GET[$varname]) != '')
                  {
                        $var = $_GET[$varname];
                  }
            return $var;
      }
      
	
function checkDir( $dir , $check=0 , $chmod=0 )
	{
		// See if it exists
		if( file_exists(ROSTER_BASE.$dir) )
		{
			if( $check )
			{
				if( !is_writable(ROSTER_BASE.$dir) )
				{
					if( $chmod )
					{
						if( chmod( ROSTER_BASE.$dir,0777 ) )
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
	{ global $roster, $addon;
	$ft=0;
	foreach( $ssfolder as $dir )
            {
		    // See if it exists
                  if( file_exists($addon['dir'].$dir) )
                  {
                        if( $check )
                        {
                              if( !is_writable($addon['dir'].$dir) )
                              {
                                    if( $chmod )
                                    {
                                          if( chmod( $addon['dir'].$dir,0777 ) ){
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
	global $roster, $addon;
		$message = $this->message;
$output = '';
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
function getAdminMessage()
	{
	global $roster, $addon;
		$message = $this->message3;

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

// new function for voting      
      
      function vote( $id, $vote ){
            global $roster;

            $query = "SELECT * FROM `".ROSTER_SCREENTABLE."` WHERE `id` ='".$id."'";
            $result = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$query);
            $row = $roster->db->fetch($result);
      
            $count = ( $row['votes'] + 1);
            $rate = ( $row['rateing'] + $vote );

            $query1 = "UPDATE `".ROSTER_SCREENTABLE."` SET `votes` = '".$count."' , `rateing` = '".$rate."' WHERE `id` ='".$id."'";
            $result1 = $roster->db->query($query1) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$query1);
            //$row = $wowdb->fetch_array($result);
            if ($result1){     
                  $this->setMessage( '<span class="green">     Vote Accepted!     </span>' );
            }
      
      }
// end new function      

      /*
      Change catagory function for admin section error function "CC"
      */
      function changecat($id, $new, $old, $addon_cfg, $file, $path){
      
      global $roster, $addon;
      
      $old_path = $path.''.$old.'/'.$file;
      $new_path = $path.''.$new.'/'.$file;
      if (file_exists($old_path))
            {
                  if (!file_exists($new_path))
                        {
                              if (copy ($old_path, $new_path))
                                    {
                                          unlink ($old_path);                                          
                                    }
                        }
                        else
                        {
                              $this->setMessage( '<span class="red">ERROR RG:001-CC - Selected dir "'.$new_path.'" does not exist</span>' );
                        }
            }
            else
            {
                  $this->setMessage( '<span class="red">ERROR RG:001-CC - Selected dir "'.$old_path.'" does not exist</span>' );
            }

            $query = "UPDATE `".ROSTER_SCREENTABLE."` SET `catagory` = '".$new."' WHERE `id` = '".$id."'";
            $result = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$query);
            $this->setMessage( '<span class="green">Image with ID '.$id.' has been changed from Catagory ['.$addon_cfg['rg_'.$old.''].'] to ['.$addon_cfg['rg_'.$new.''].']</span>' );
      
      
      }
      
      function approvesc( $approve ){
      global $roster, $addon;
            $query = "UPDATE `".ROSTER_SCREENTABLE."` SET `approve` = 'YES' WHERE `id` ='".$approve."'";
            $result = $roster->db->query($query) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$query);
            $this->setMessage( '<span class="green">Image with ID '.$approve.' is now Approved</span>' );
      }
          
      
      /*
       delete screenshoot function
       error = DS
      */
      function deletesc( $delete ){
      global $roster, $addon;

      			$query5 = "SELECT * FROM `".ROSTER_SCREENTABLE."` WHERE id='".$delete."' ";
      			$result5 = $roster->db->query($query5) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$query5);
                        $row = $roster->db->fetch($result5);

      			//any other code tidbits here, error pages etc
      			$roster->db->query("DELETE FROM `".ROSTER_SCREENTABLE."` WHERE id='$delete' ");
      			
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
	 							$this->setMessage( '<span class="red">ERROR RG:002-DS - '.str_replace( '\\','/',$dir ).$filename.': Could not be deleted</span>' );
	  							return FALSE;
	  						}

	   					}
	   					else
	   					{
	                                   $this->setMessage( '<span class="red">ERROR RG:001-DS - '.$dir.$filename.' Does not exist Cannot Delete</span>' );
                                    }
	  		   	}
        }

      function uploadwmImage( $dir, $filename){
      global $roster, $addon;
            $target_path = $dir."/".basename( $_FILES['wmfile']['name']);
            if(move_uploaded_file($_FILES['wmfile']['tmp_name'], $target_path)) {
                  $this->setMessage("The file ".basename( $_FILES['wmfile']['name'])." has been uploaded <br> To the Watermark Directory");
            }else{
                  $this->setMessage("Your uploaded was unseccessful<BR>");
            exit;
            }
            
      }
      
      
	function uploadImage( $dir , $filename, $caption, $catagory, $desc, $width ,$height, $wm_loc, $wm_use, $wm_file, $wm_dir, $table, $size )
	{   global $roster, $addon;
	
	     $frame3 = $addon['dir'].$wm_dir.'/frame_layer_3.png';
	      $tempg = $addon['dir'].$wm_dir.'/temp.gif';
	      $tempg2 = $addon['dir'].$wm_dir.'/temp2.gif';
	      $tempj = $addon['dir'].$wm_dir.'/temp.jpg';
	      $tempj2 = $addon['dir'].$wm_dir.'/temp2.jpg';
	      $tempp = $addon['dir'].$wm_dir.'/temp.png';
	      $tempp2 = $addon['dir'].$wm_dir.'/temp2.png';
            $fname = '';
            $extension = '';
            $upfilename = '';

            $extension = substr($filename, strrpos($filename, '.')+1);
            $target_path = $dir.$catagory."/";
            $sql = "SELECT * FROM `".$table."` ORDER BY `id` DESC LIMIT 0 , 1";
            
            $result = $roster->db->query($sql);// or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql);
            $pict = $roster->db->fetch($result);
            list($name, $num) = explode("ss", $pict['file']);
            
            $fname ="ss".($num + 1);
            $uploadcompleate = null;
            $target_path = $target_path . basename( $fname.".".$extension );
            $fileloc = $dir.$catagory."/". basename( $fname );
            
            
            $upfilename = $fname.".".$extension;
            $sizea = (filesize($_FILES['userfile']['tmp_name']) / 1024);
            if (filesize($sizea) <= $size ){
            
                  if ($extension == "jpg" OR $extension == "gif" OR $extension == "JPG" OR $extension == "GIF" OR $extension == "jpeg" OR $extension == "JPEG")
                  {
                  
                        if(move_uploaded_file($_FILES['userfile']['tmp_name'], $target_path)) {

                              $sql2 = "INSERT INTO `".$table."` ( `id` , `file` , `caption` , `disc` , `ext`, `catagory`, `approve` ) VALUES ( NULL , '".$fname."', '".$caption."', '".$desc."' , '".$extension."', '".$catagory."', '');";
                              $result2 = $roster->db->query($sql2) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql2);


                              ///////// Start the thumbnail generation//////////////
                              $n_width= $width;          // Fix the width of the thumb nail images
                              $n_height= $height;         // Fix the height of the thumb nail imaage

                              # Path of the Origional Uploaded image
                              $tsrc1 = $dir.$catagory.'/'.$fname.".".$extension;
                              # Path where thumb nail image will be stored
                              $tsrc= $dir.'/thumbs/'.$fname."-thumb.".$extension;

                              #///////////////////////////////// Starting of GIF thumb nail creation///////////
                              if (@$extension=="gif" OR $extension=="GIF")
                              {
                                    $im=ImageCreateFromGIF($tsrc1);
                                    $frame4=ImageCreateFromPNG($frame3);
                                    $width=ImageSx($im);              // Original picture width is stored
                                    $height=ImageSy($im);             // Original picture height is stored
                                    $width1=ImageSx($frame4);              // Original picture width is stored
                                    $height1=ImageSy($frame4);             // Original picture height is stored
                                    //create new blank image
                                    $newimage=$this->imagecreatetruecolortrans($n_width, $n_height);
                                    //create new blank image for the border
                                    $frame5=$this->imagecreatetruecolortrans($n_width, $n_height);
                                    //resise the screenshot to the new size -6px for the border
                                    imageCopyResized($newimage,$im,0,0,0,0,($n_width - 6),($n_height - 6),$width,$height);
                                    // resize the border to fit the screenshot
                                    imageCopyResized($frame5,$frame4,0,0,0,0,$n_width,$n_height,$width1,$height1);
                                    // add a water mark to the screenshoot
                                    $oldimage = $this->addwatermark($im, $wm_loc, $wm_use, $wm_file, $wm_dir);
                                    // create a temp image to continue the process
                                    imageGIF($newimage,$tempg);
                                    // create temp image of the border
                                    imagePNG($frame5,$tempg2);
                                    // add the border
                                    $im2 = $this->addborderimg($tempg,$tempg2,$n_height, $n_width);
                                    //watermark the origional image
                                    $im2 = $this->addwatermark($im2, $wm_loc, $wm_use, $wm_file, $wm_dir);
                                    // create the screen shoot image 
                                    imageGIF($im2,$tsrc);
                                    // save the origional image
                                    imageGIF($oldimage,$tsrc1);
                  
                              }
            
                              if($extension=="jpg" OR $extension=="jpeg" OR $extension=="JPEG" OR $extension=="JPG")
                              {
                                    $im=ImageCreateFromJPEG($tsrc1);
                                    $frame4=ImageCreateFromPNG($frame3);
                                    $width=ImageSx($im);              // Original picture width is stored
                                    $height=ImageSy($im);             // Original picture height is stored
                                    $width1=ImageSx($frame4);              // Original picture width is stored
                                    $height1=ImageSy($frame4);             // Original picture height is stored
                                    //create new blank image
                                    $newimage=$this->imagecreatetruecolortrans($n_width, $n_height);
                                    //create new blank image for the border
                                    $frame5=$this->imagecreatetruecolortrans($n_width, $n_height);
                                    //resise the screenshot to the new size -6px for the border
                                    imageCopyResized($newimage,$im,0,0,0,0,($n_width - 6),($n_height - 6),$width,$height);
                                    // resize the border to fit the screenshot
                                    imageCopyResized($frame5,$frame4,0,0,0,0,$n_width,$n_height,$width1,$height1);
                                    // add a water mark to the screenshoot
                                    $oldimage = $this->addwatermark($im, $wm_loc, $wm_use, $wm_file, $wm_dir);
                                    // create a temp image to continue the process
                                    imageJPEG($newimage,$tempj);
                                    //create tempimage of the border
                                    imagePNG($frame5,$tempj2);
                                    // add the border
                                    $im2 = $this->addborderimg($tempj,$tempj2,$n_height, $n_width);
                                    //watermark the origional image
                                    $im2 = $this->addwatermark($im2, $wm_loc, $wm_use, $wm_file, $wm_dir);
                                    // create the screen shoot image 
                                    imageJPEG($im2,$tsrc);
                                    // save the origional image
                                    imageJPEG($oldimage,$tsrc1);
                              
                              }
                        
                              if($extension=="png" OR $extension=="PNG"){
                        
                                    $im=ImageCreateFromPNG($tsrc1);
                                    $frame4=ImageCreateFromPNG($frame3);
                                    $width=ImageSx($im);              // Original picture width is stored
                                    $height=ImageSy($im);             // Original picture height is stored
                                    $width1=ImageSx($frame4);              // Original picture width is stored
                                    $height1=ImageSy($frame4);             // Original picture height is stored
                                    //create new blank image
                                    $newimage=$this->imagecreatetruecolortrans($n_width, $n_height);
                                    //create new blank image for the border
                                    $frame5=$this->imagecreatetruecolortrans($n_width, $n_height);
                                    //resise the screenshot to the new size -6px for the border
                                    imageCopyResized($newimage,$im,0,0,0,0,($n_width - 6),($n_height - 6),$width,$height);
                                    // resize the border to fit the screenshot
                                    imageCopyResized($frame5,$frame4,0,0,0,0,$n_width,$n_height,$width1,$height1);
                                    // add a water mark to the screenshoot
                                    $oldimage = $this->addwatermark($im, $wm_loc, $wm_use, $wm_file, $wm_dir);
                                    // create a temp image to continue the process
                                    imagePNG($newimage,$tempp);
                                    //create tempimage of the border
                                    imagePNG($frame5,$tempp2);
                                    // add the border
                                    $im2 = $this->addborderimg($tempp,$tempp2,$n_height, $n_width);
                                    //watermark the origional image
                                    $im2 = $this->addwatermark($im2, $wm_loc, $wm_use, $wm_file, $wm_dir);
                                    // create the screen shoot image 
                                    imagePNG($im2,$tsrc);
                                    // save the origional image
                                    imagePNG($oldimage,$tsrc1);
                              }
                              
                              chmod("$tsrc",0777);
                              $uploadcompleate = True;
                        }
                        else
                        {
                              $this->setMessage("File could not be uploaded to \"".$target_path."\" Check chmod of file path");
                        }
                  }            
                  else
                  {
                        $this->setMessage('<span class="red">ERROR RG:002-UP - Your uploaded file "'.$_FILES['userfile']['name'].'" must be (jpg gif png). Other file types are not allowed</span>');
                  }
                  if (!$uploadcompleate)
                  {
                        $this->setMessage('<span class="red">ERROR RG:002-UP - Your uploaded file "'.$_FILES['userfile']['name'].'" must be (jpg gif png). Other file types are not allowed</span>');
                  }
                  if ($uploadcompleate){
                        $this->setMessage("The file ".basename( $_FILES['userfile']['name'])." has been uploaded as ".$upfilename." - Pending admin approval");
                  }
            }
            else
            {
                  $this->setMessage('<span class="red">ERROR RG:001-UP - The file '.basename( $_FILES['userfile']['name']).' is to large must be '.$size.'kb or less</span>');
            }
	}
	
#
##########################################################################################################
#
#           This is where the new Border system starts
#
#                       Adds a border to the image like the blizzard image gallory lol yoink!!!
#
	
	function addborderimg($temp,$frame3,$width ,$height){
      
      $im2 = $this->imagecreatetruecolortrans( $height,$width ) or die('Cannot Initialize new GD image stream');
                        // sould combine the blank image and frame 1
                        if( file_exists($temp) )
                        {
                              $this->combineImage( $im2,$temp,(__LINE__),3,3 );
                        }
                        if( file_exists($frame3) )
                        {
                              $this->combineImage( $im2,$frame3,(__LINE__),0,0 );
                        }
            return $im2;
      }
function imagecreatetruecolortrans($x,$y)
    {
        $i = @imagecreatetruecolor($x,$y)
			or debugMode( (__LINE__),'Cannot Initialize new GD image stream','',0,'Make sure you have the latest version of GD2 installed' );

        $b = imagecreatefromstring(base64_decode($this->blankpng()));

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



#
##########################################################################################################
#
#           This is where the new water mark systen starts : Took some time but i got it
#
#                       Now the WM system add the watermark to the uploaded image i hope
#

      function addwatermark($newimage, $wm_loc, $wm_use, $wm_file, $wm_dir){
            global $roster, $addon;
            $widthtn=ImageSx($newimage);               // thumb width is stored
            $heightn=ImageSy($newimage);               // thumb width is stored
            $wm = $addon['dir'].$wm_dir.'/'.$wm_file;
            if( file_exists($wm)){

            $blah = getimagesize($wm);
            $type = $blah['mime'];
            $widthwm = $blah[0];
            $heightwm = $blah[1];
#                 this is where we determin where to place the water mark we ar gona 
#                 allways ass a 5pix buffer incase the image uses the hole image size
#                 1 = top left - 2 = top right - 3 = bottom left - 4 = bottom right
      
                  if ($wm_loc == 1){
                        $lox = 8;
                        $loy = 8;                  
                  }
                  if ($wm_loc == 2){
                        $lox = (($widthtn - $widthwm) - 8);
                        $loy = 8;                  
                  }
                  if ($wm_loc == 3){
                        $lox = 8;
                        $loy = (($heightn - $heightwm) - 8);                  
                  }
                  if ($wm_loc == 4){
                        $lox = (($widthtn - $widthwm) - 8);
                        $loy = (($heightn - $heightwm) - 8);                  
                  }
            
            $this->combineImage( $newimage,$wm,(__LINE__),$lox,$loy );
            
            }
            
            else {
                  $this->setMessage("watermark ".$wm." does not exist");
            }
      
      return $newimage;
      
      }
function reset_values()
	{
		$this->assignstr = '';
	}      
      
function processData($data)
{
	global $roster, $addon_cfg, $addon;
      //global $addon_cfg, $addon;
	$this->reset_values();
	foreach( $data as $settingName => $settingValue )
	{
			if(  $settingName != 'process' )
			{
				$update_sql[] = "UPDATE `roster_addon_config` SET `config_value` = '".$roster->db->escape( $settingValue )."' WHERE `config_name` = '".$settingName."';";
			}
		
	}

	// Update DataBase
	if( is_array($update_sql) )
	{
		foreach( $update_sql as $sql )
		{
			$queries[] = $sql;

			$result = $roster->db->query($sql);
			if( !$result )
			{
				$this->setMessage('<span style="color:#0099FF;font-size:11px;">Error saving settings</span><br />MySQL Said:<br /><pre>'.$roster->db->error().'</pre>');
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


function get_size($dirr ,$ssfolder)
      {
$size = 0;
      foreach( $ssfolder as $path )
            {
            $path = $dirr.$path;

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
	
function combineImage2( $image, $filename, $line, $x_loc, $y_loc )
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
	
#######
#######    Some new functions i created to see if i can get less and less hard coded veriables
#######
	
	#
	#    first new way to call Image Thumbnail and prepare it for output
	#
	
      function getimage($id , $iflib, $iflb, $disc, $title, $path, $path2, $rating, $width, $height, $cat){
            global $roster, $addon;
            $img = '';
            if ($disc == ''){
                  $disc = $roster->locale->act['nodisc'];
            }
                  
            if ($title == ''){
                  $title = $roster->locale->act['nocaption'];
            }
                        
            if ($rating == ''){
                  $disc = $roster->locale->act['norating'];
            }
            if ($iflib == 1){
            $tool = makeOverlib( $disc , $caption=$title.' ~ '.$rating, $caption_color='' , $mode=0 , $locale='' , $extra_parameters='' );
            }
            if ($iflb == 1){
            $img .= '
            <div style="cursor:help;" '.$tool.'>
            <a href="'.$path2.'" rel="lightbox" title="'.$title.' '.$rating.'<br>'.$disc.'" >
            <img src="' . $path.'" width="'.$width.'" height="'.$height."\"></a></div>\n\n";
            
            }else{
                  
            
            $img .= '
                  <div style="cursor:help;" '.$tool.'>
            <a href="'.makelink().'&id='.$id.'" title="'.$title.' '.$rating.'">
            <img src="' . $path.'" width="'.$width.'" height="'.$height."\"></a></div>\n\n";

            }
            return $img;
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
				$option_list .= "    <option value=\"{$value}\" selected=\"selected\">->{$name}<-</option>\n";
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
