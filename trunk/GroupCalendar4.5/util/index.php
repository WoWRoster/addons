<?php
/**
 * Project: Group Calendar - Guild Group Calendar for WoWRoster
 * File: /today.php
 *
 * Licensed under the Creative Commons
 * "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * Short summary:
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/
 *
 * Legal Information:
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/legalcode
 *
 * Full License:
 *  license.txt (Included within this library)
 *
 * You should have recieved a FULL copy of this license in license.txt
 * along with this library, if you did not and you are unable to find
 * and agree to the license you may not use this library.
 *
 * For questions, comments, information and documentation please visit
 * the official website at cpframework.org
 *
 * @link http://www.wowroster.net
 * @license http://creativecommons.org/licenses/by-nc-sa/2.5/
 * @author Joseph Foster AkA Ulminia
 * @version $Id: index.php 449 2009-07-06 16:12:56Z Ulminia $
 * @package GroupCalendar
 * @filesource
 *
 */
 
 /*
 #################################################################
 
 This file is designed for the guild master to use it will create
 a Image generadted display of the events for the given date of the
 server the file is hosted on Displaying the guilds events for that 
 day 
 
 #################################################################
 */
	require("include/helper_functions.php");
	require("include/calendar_functions.php");
	
	define('CALENDAR_TABLE',$roster->db->table('info',$addon['basename']));
	
	define('ATTENDANCE_TABLE',$roster->db->table('attend',$addon['basename']));
	
	define('OTHERINFO_TABLE',$roster->db->table('other',$addon['basename']));
	
	
if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

// Set track errors on
/*
if( CAN_INI_SET )
{
	ini_set('track_errors',1);
}
*/
#--[ FUNCTIONS ]-----------------------------------------------------------

	// Debug function
	function debugMode( $line,$message,$file=null,$config=null,$message2=null )
	{
		global $im, $configData;

		// Destroy the image
		if( isset($im) )
		{
			imageDestroy($im);
		}

		if( is_numeric($line) )
		{
			$line -= 1;
		}

		$error_text = 'Error!';
		$line_text  = 'Line: ' . $line;
		$file  = ( !empty($file) ? 'File: ' . $file : '' );
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
					imagestring( $im, $line['f'], 1, $linestep, utf8_to_nce($line['s']), $$line['c'] );
					$linestep += ImageFontHeight($line['f']);
				}
			}

			switch ( $configData['image_type'] )
			{
				case 'jpeg':
				case 'jpg':
					header( 'Content-type: image/jpg' );
					@imageJpeg( $im );
					break;

				case 'png':
					header( 'Content-type: image/png' );
					@imagePng( $im );
					break;

				case 'gif':
				default:
					header( 'Content-type: image/gif' );
					@imagegif( $im );
					break;
			}
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

	// Get and format eXp
	function printXP( $expval )
	{
		list($current, $max) = explode( ':', $expval );
		if( $current > 0 )
		{
			$for_curr = number_format($current);
			$for_max = number_format($max);
			return $for_curr . ' of ' . $for_max;
		}
		else
		{
			return '';
		}
	}

	// Get eXp percentage for expbar
	function retPerc( $expval,$loc,$len )
	{
		list($current, $max) = explode( ':', $expval );
		if ( $current > 0 )
		{
			$perc = round( ( ($current / $max)* $len ) + $loc, 0);
			return $perc;
		}
		else
		{
			return 0;
		}
	}

	// Function to set color of text
	function setColor( $image,$color,$trans=0 )
	{
		$red = 100;
		$green = 100;
		$blue = 100;

		$ret = '';
		if( eregi("[#]?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})",$color,$ret) )
		{
			$red = hexdec($ret[1]);
			$green = hexdec($ret[2]);
			$blue = hexdec($ret[3]);
		}

		// Get a transparent color if trans > 0
		if( $trans > 0 )
		{
			$color_index = @imageColorAllocateAlpha( $image,$red,$green,$blue,$trans )
				or debugMode((__LINE__),$php_errormsg);
		}
		else // Get a regular color
		{
			// Damn, we cannot supress this function...
			$color_index = imageColorAllocate( $image,$red,$green,$blue );
		}

		return $color_index;
	}

	// Align text Function
	function textAlignment( $font,$size,$text,$where,$align = 'left' )
	{
		$txtsize = @imageTTFBBox( $size,0,$font,$text )
			or debugMode((__LINE__),$php_errormsg);		// Gets the points of the image coordinates

		switch ($align)
		{
			case 'right':
				$txt = $txtsize[2];
				break;

			case 'center':
				$txt = $txtsize[2]/2;
				break;

			default:
				$txt = 0;
				break;
		}
		$txtloc = $where-$txt;	// Sets the x coordinate where to print the server name
		return $txtloc;
	}

	// Shadow Text
	function shadowText( $image,$fontsize,$xpos,$ypos,$font,$text,$color )
	{
		$color = setColor( $image,$color );

		$_x = array(-1,-1,-1, 0, 0, 1, 1, 1 );
		$_y = array(-1, 0, 1,-1, 1,-1, 0, 1 );

		for( $n=0; $n<=7; $n++ )
		{
			@imageTTFText( $image,$fontsize,0,$xpos+$_x[$n],$ypos+$_y[$n],$color,$font,$text )
				or debugMode((__LINE__),$php_errormsg);
		}
	}

	// Function to convert strings to a compatable format
	// This function was copied from http://de3.php.net/manual/de/function.imagettftext.php
	// Under post made by limalopex.eisfux.de
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
				$html .= '&#' . $new_val . ';';
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

	function removeAccents($string)
	{
		return strtr(utf8_decode($string),
			"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ",
			"AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn");
	}

	// Write Text
	function writeText( $image,$fontsize,$xpos,$ypos,$color,$font,$text,$align,$shadow_color )
	{
		// Get the font
		$font = getFont( $font );
		// Get the color
		$color = setColor( $image,$color );
		// Convert text for display
		$text = utf8_to_nce($text);

		// Correct alignment
		if( $align != 'left' )
		{
			$xpos = textAlignment( $font,$fontsize,$text,$xpos,$align );
		}

		// Create the pseudo-shadow
		if( !empty($shadow_color) )
		{
			shadowText( $image,$fontsize,$xpos,$ypos,$font,$text,$shadow_color );
		}

		// Write the text
		@imageTTFText( $image,$fontsize,0,$xpos,$ypos,$color,$font,$text )
			or debugMode((__LINE__),$php_errormsg);
	}

	// Get font and font path
	function getFont( $font )
	{
		global $configData;

		$font_file = $configData['font_dir'] . $font;

		// Check to see if SigGen can see the font
		if( file_exists($font_file) )
		{
			return $font_file;
		}
		else
		{
			debugMode( (__LINE__),'Cannot find font',$font_file,0 );
		}
	}

	// GIF image creator
	function makeImageGif( $image,$w,$h,$dither,$save_image = '' )
	{
		// Check dither mode
		if( $dither )
		{
			$dither = TRUE;
		}
		else
		{
			$dither = FALSE;
		}

		// Create a new true color image because we don't want to ruin the original
		$im_gif = @imagecreatetruecolor( $w,$h )
			or debugMode((__LINE__),$php_errormsg);

		// Copy the original image into the new one
		@imagecopy( $im_gif,$image,0,0,0,0,$w,$h )
			or debugMode((__LINE__),$php_errormsg);

		// Convert the new image to palette mode
		@imagetruecolortopalette( $im_gif,$dither,256 )
			or debugMode((__LINE__),$php_errormsg);

		// Check if this needs to be saved
		if( empty($save_image) )
		{
			@imageGif( $im_gif )
				or debugMode((__LINE__),$php_errormsg);
		}
		else
		{
			@imageGif( $im_gif,$save_image )
				or debugMode((__LINE__),$php_errormsg);
		}

		// Destroy palette image
		@imageDestroy( $im_gif )
			or debugMode((__LINE__),$php_errormsg);
	}

	// Funtion to merge images with the main image
	function combineImage( $image,$filename,$line,$x_loc,$y_loc )
	{
		$info = getimagesize($filename)
			or debugMode( $line,$php_errormsg );

		switch( $info['mime'] )
		{
			case 'image/jpeg' :
				$im_temp = @imagecreatefromjpeg($filename)
					or debugMode( $line,$php_errormsg );
				break;

			case 'image/png' :
				$im_temp = @imagecreatefrompng($filename)
					or debugMode( $line,$php_errormsg );
				break;

			case 'image/gif' :
				$im_temp = @imagecreatefromgif($filename)
					or debugMode( $line,$php_errormsg );
				break;

			default:
				debugMode( $line,'Unhandled image type: ' . $info['mime'] );
		}

		// Get the image dimentions
		$im_temp_width = imageSX( $im_temp );
		$im_temp_height = imageSY( $im_temp );

		// Copy created image into main image
		@imagecopy( $image,$im_temp,$x_loc,$y_loc,0,0,$im_temp_width,$im_temp_height )
			or debugMode( $line,$php_errormsg );

		// Destroy the temp image
		if( isset($im_temp) )
		{
			@imageDestroy( $im_temp )
				or debugMode( $line,$php_errormsg );
		}
	}
	
	
	
	// resize image for config - ulminia
	
	function resizeimage( $image , $config_name){


            switch ($config_name)
		{
			case 'signature':
				$image_data = SIGGEN_DIR.'save/remp.png';
				$image_data_save = SIGGEN_DIR.'save/temp.png';
				break;

			case 'avatar':
				$image_data = SIGGEN_DIR.'save/crop-av.png';
				$image_data_save = SIGGEN_DIR.'save/temp-av.png';
				break;

			default:
				$image_data = SIGGEN_DIR.'save/remp.png';
				break;
		}

if (is_file($image_data) || is_link($image_data)) unlink($image_data);


//unlink($image_data);
//$image_data_save = SIGGEN_DIR.'save/temp.png';      
		// Set our crop dimensions.
                  $width = 210;
                  $height = 120;
            // Get dimensions of existing image
                  $dimensions = getimagesize($image);
            // Prepare image resizing and crop -- Center crop location
                  $newwidth = $dimensions[0];
                  $newheight = $dimensions[1];

                  $im_dest = imagecreatefrompng($image_data_save); //imagecreatetruecolor ($width, $height);
                  //imagealphablending($im_dest, false);
                  combineImage( $im_dest, $image,(__LINE__),0,0 );
                  $im_temp = @imagecreatefrompng($image_data_save);
                  $im_temp_width = imageSX( $im_temp );
		      $im_temp_height = imageSY( $im_temp );
		
                  //@imagecopy( $im_dest,$im_temp,0,0,0,0,$im_temp_width,$im_temp_height );
                  //imagecopyresampled($im_dest, $im, 0, 0, 0, 0, $width, $height, $newwidth, $newheight);

                  imagesavealpha($im_dest, true);
                  //$imagenew = 
                  
                  //ob_start();
                  imagepng($im_dest,$image_data);
                  //$image_data = ob_get_contents();
                  //ob_end_clean();

                  return $image_data;

}



	function getEnglishValue( $keyword , $locale=null )
	{
		global $roster;

		if( is_null($locale) )
		{
			$locale = $roster->config['locale'];
		}

		if( isset($roster->locale->wordings[$locale]['translate'][$keyword]) )
		{
			return $roster->locale->wordings[$locale]['translate'][$keyword];
		}
		else
		{
			foreach( $roster->multilanguages as $lang )
			{
				if( isset($roster->locale->wordings[$lang][$keyword]) )
				{
					return $roster->locale->wordings[$lang][$keyword];
				}
			}
		}
	}

	function blankpng()
	{
		$c  = "iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29m"
			. "dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAADqSURBVHjaYvz//z/DYAYAAcTEMMgBQAANegcCBNCg"
			. "dyBAAA16BwIE0KB3IEAADXoHAgTQoHcgQAANegcCBNCgdyBAAA16BwIE0KB3IEAADXoHAgTQoHcgQAAN"
			. "egcCBNCgdyBAAA16BwIE0KB3IEAADXoHAgTQoHcgQAANegcCBNCgdyBAAA16BwIE0KB3IEAADXoHAgTQ"
			. "oHcgQAANegcCBNCgdyBAAA16BwIE0KB3IEAADXoHAgTQoHcgQAANegcCBNCgdyBAAA16BwIE0KB3IEAA"
			. "DXoHAgTQoHcgQAANegcCBNCgdyBAgAEAMpcDTTQWJVEAAAAASUVORK5CYII=";
		return $c;
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

#-- end functions --#

#-- begin info gathering --#
if ($_GET['id']) {
		$eid = $_GET['id'];
		$order = isset($_GET['order'])?$_GET['order']:"level ASC, classcode, guild, name";
		$order = str_replace(";","",$order);
		
		$sql = "SELECT id, title, start AS start_time, DATE_ADD(`start`, INTERVAL `duration` MINUTE) AS `end_time`, ";
		$sql.= "creator, type, duration, `description`, guildonly, minlevel, maxlevel, limits, maxattend, ";
		if ($addon['config']['TIME_DISPLAY_FORMAT'] == "12hr") {
			$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL $t_offset SECOND), '%l:%i%p') AS stime, ";
			$sql .= "TIME_FORMAT(DATE_ADD(DATE_ADD(`start`, INTERVAL $t_offset SECOND), INTERVAL `duration` MINUTE), '%l:%i%p') AS etime, ";
		} elseif ($addon['config']['TIME_DISPLAY_FORMAT'] == "24hr") {
			$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL $t_offset SECOND), '%H:%i') AS stime, ";
			$sql .= "TIME_FORMAT(DATE_ADD(DATE_ADD(`start`, INTERVAL $t_offset SECOND), INTERVAL `duration` MINUTE), '%H:%i') AS etime, ";
		} else {
			echo "Bad time display format, check your configuration.";
		}
		$sql .= "TIME_FORMAT(start, '%H:%i:%s') AS s_time, ";
		$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL `duration` MINUTE), '%H:%i:%s') AS e_time, ";
		$sql .= "DAYOFMONTH(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) AS d, MONTH(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) AS m, YEAR(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) AS y ";
		$sql .= "FROM ". CALENDAR_TABLE ." WHERE id='". mysql_escape_string($_GET['id']) ."'";

		$result = $roster->db->query($sql); //$result = mysql_query($sql,$gc_database['connection']) or die("Error in SQL Statement: $sql.\n ". mysql_error());
		$event = mysql_fetch_array($result);
		if ($event['s_time'] == "00:00:25") {
			//This event had no specified Start Time, so we need to redo the query to get
			// the times without the TimeZone offset
			$sql = "SELECT id, title, start AS start_time, DATE_ADD(`start`, INTERVAL `duration` MINUTE) AS `end_time`, ";
			$sql.= "creator, type, duration, `description`, minlevel, maxlevel, limits, maxattend, ";
			if ($addon['config']['TIME_DISPLAY_FORMAT'] == "12hr") {
				$sql .= "TIME_FORMAT(`start`, '%l:%i%p') AS stime, ";
				$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL `duration` MINUTE), '%l:%i%p') AS etime, ";
			} elseif ($addon['config']['TIME_DISPLAY_FORMAT'] == "24hr") {
				$sql .= "TIME_FORMAT(`start`, '%H:%i') AS stime, ";
				$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL `duration` MINUTE), '%H:%i') AS etime, ";
			} else {
				echo "Bad time display format, check your configuration.";
			}
			$sql .= "TIME_FORMAT(start, '%H:%i:%s') AS s_time, ";
			$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL `duration` MINUTE), '%H:%i:%s') AS e_time, ";
			$sql .= "DAYOFMONTH(`start`) AS d, MONTH(`start`) AS m, YEAR(`start`) AS y ";
			$sql .= "FROM ". CALENDAR_TABLE ." WHERE id='". mysql_escape_string($_GET['id']) ."'";
	
			$result = $roster->db->query($sql);//$result = mysql_query($sql,$gc_database['connection']) or die("Error in SQL Statement: $sql.\n ". mysql_error());
			$event = mysql_fetch_array($result);
		}
		
		if ($event['s_time'] == "00:00:25") $timestr = "";
		elseif ($event['s_time'] == $event['e_time']) $timestr = $event['stime'];
		else $timestr = $event['stime'] ." - ". $event['etime'];
		$event['timestr'] = $timestr;
		
		if ($event['title']=="") $event['title'] = getGCtext($event['type']);
		
		$sql = "SELECT * FROM ". ATTENDANCE_TABLE ." WHERE eid='". mysql_escape_string($_GET['id']) ."' AND status='Y' ORDER BY `classcode`";
		$y_attendees = $roster->db->query($sql);//,$gc_database['connection']);
		$y_attendees_n = $roster->db->num_rows($y_attendees);
		$sql = "SELECT * FROM ". ATTENDANCE_TABLE ." WHERE eid='". mysql_escape_string($_GET['id']) ."' AND status='N' ORDER BY `classcode`";
		$n_attendees = $roster->db->query($sql);//,$gc_database['connection']);
		$n_attendees_n = $roster->db->num_rows($n_attendees);
		$sql = "SELECT * FROM ". ATTENDANCE_TABLE ." WHERE eid='". mysql_escape_string($_GET['id']) ."' AND status='S' ORDER BY `classcode`";
		$s_attendees = $roster->db->query($sql);//,$gc_database['connection']);
		$s_attendees_n = $roster->db->num_rows($s_attendees);
		
		$month = $event['m'];
		$day = $event['d'];
		$year = $event['y'];
	} elseif ($_GET['d']) {
		$eid = "";
		$month 	= (int) $_GET['m'];
		$day	= (int) $_GET['d'];
		$year 	= (int) $_GET['y'];
	} else {
		// set month and year to present if month
		// and year not received from query string
		$eid = "";
		$month = date("n",gmmktime()+$t_offset);
		$day = date("j",gmmktime()+$t_offset);
		$year = date("Y",gmmktime()+$t_offset);
	}
	$prevDay = dateadd($month,$day,$year,"-1","day");
	$nextDay = dateadd($month,$day,$year,"1","day");
	
	////// Get other events happening this day
	$skipme = reset_event_names();
	$dayEvents = array();
	//First get the ones without a start time
	$sql = "SELECT id, title, start AS start_time, DATE_ADD(`start`, INTERVAL `duration` MINUTE) AS `end_time`, ";
	$sql.= "creator, type, duration, `description`, minlevel, maxlevel, limits, maxattend, ";
	if ($addon['config']['TIME_DISPLAY_FORMAT'] == "12hr") {
		$sql .= "TIME_FORMAT(`start`, '%l:%i%p') AS stime, ";
		$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL `duration` MINUTE), '%l:%i%p') AS etime, ";
	} elseif ($addon['config']['TIME_DISPLAY_FORMAT'] == "24hr") {
		$sql .= "TIME_FORMAT(`start`, '%H:%i') AS stime, ";
		$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL `duration` MINUTE), '%H:%i') AS etime, ";
	} else {
		echo "Bad time display format, check your configuration.";
	}
	$sql .= "TIME_FORMAT(`start`, '%H:%i:%s') AS s_time, ";
	$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL `duration` MINUTE), '%H:%i:%s') AS e_time, ";
	$sql .= "DAYOFMONTH(`start`) AS d, MONTH(`start`) AS m, YEAR(`start`) AS y ";
	$sql .= "FROM ". CALENDAR_TABLE ." WHERE DAYOFMONTH(`start`) = $day AND MONTH(`start`) = $month AND YEAR(`start`) = $year ";
	$sql .= "AND TIME_FORMAT(`start`, '%H:%i:%s')='00:00:25' AND id != '". $event['id'] ."' ";
	$sql .= "ORDER BY `start` ASC";
	
	$result = $roster->db->query($sql);//$result = mysql_query($sql,$gc_database['connection']) or die("Error in SQL Statement: $sql.\n ". mysql_error());

	while ($row = mysql_fetch_array($result)) {
		if ($row['s_time'] == "00:00:25") $timestr = "";
		elseif ($row['s_time'] == $row['e_time']) $timestr = $row['stime'];
		else $timestr = $row['stime'] ." - ". $row['etime'];
		$row['timestr'] = $timestr;
		if ($row['title']=="") $row['title'] = getGCtext($row['type']);
		
		if (! in_array($row['type'],$skipme)) $dayEvents[] = $row;
	}
	//Now get the ones that DO have a start time
	$sql = "SELECT id, title, start AS start_time, DATE_ADD(`start`, INTERVAL `duration` MINUTE) AS `end_time`, ";
	$sql.= "creator, type, duration, `description`, minlevel, maxlevel, limits, maxattend, ";
	if ($addon['config']['TIME_DISPLAY_FORMAT'] == "12hr") {
		$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL $t_offset SECOND), '%l:%i%p') AS stime, ";
		$sql .= "TIME_FORMAT(DATE_ADD(DATE_ADD(`start`, INTERVAL $t_offset SECOND), INTERVAL `duration` MINUTE), '%l:%i%p') AS etime, ";
	} elseif ($addon['config']['TIME_DISPLAY_FORMAT'] == "24hr") {
		$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL $t_offset SECOND), '%H:%i') AS stime, ";
		$sql .= "TIME_FORMAT(DATE_ADD(DATE_ADD(`start`, INTERVAL $t_offset SECOND), INTERVAL `duration` MINUTE), '%H:%i') AS etime, ";
	} else {
		echo "Bad time display format, check your configuration.";
	}
	$sql .= "TIME_FORMAT(`start`, '%H:%i:%s') AS s_time, ";
	$sql .= "TIME_FORMAT(DATE_ADD(`start`, INTERVAL `duration` MINUTE), '%H:%i:%s') AS e_time, ";
	$sql .= "DAYOFMONTH(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) AS d, MONTH(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) AS m, YEAR(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) AS y ";
	$sql .= "FROM ". CALENDAR_TABLE ." WHERE DAYOFMONTH(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) = $day AND MONTH(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) = $month AND YEAR(DATE_ADD(`start`, INTERVAL $t_offset SECOND)) = $year ";
	$sql .= "AND TIME_FORMAT(`start`, '%H:%i:%s')!='00:00:25' AND id != '". $event['id'] ."' ";
	$sql .= "ORDER BY start ASC";
	
	$result = $roster->db->query($sql);//$result = mysql_query($sql,$gc_database['connection']) or die("Error in SQL Statement: $sql.\n ". mysql_error());

	while ($row = mysql_fetch_array($result)) {
		if ($row['s_time'] == "00:00:25") $timestr = "";
		elseif ($row['s_time'] == $row['e_time']) $timestr = $row['stime'];
		else $timestr = $row['stime'] ." - ". $row['etime'];
		$row['timestr'] = $timestr;
		if ($row['title']=="") $row['title'] = getGCtext($row['type']);
	
		if (! in_array($row['type'],$skipme)) $dayEvents[] = $row;
	}


echo $event['creator'].'---';

