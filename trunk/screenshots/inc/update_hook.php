<?php
if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}
require_once('functions.inc');

define('SCREENSHOT_DIR', $addon['dir']  . "screenshots");

class screenshotsUpdate
{
	var $messages = '';	    // Update messages
	var $data = array();	// Addon config data automatically pulled from the addon_config table
	var $gendata = array(); // screenshots specific data since the port doesn't use Roster's Config API
	var $files = array();
	
		/**
	 * Resets addon messages
	 */
	function reset_messages()
	{
		$this->messages = '';
	}


	function screenshotsUpdate($data)
	{
		global $roster;
		$this->data = $data;
		$this->files[] = 'screenshots'; // Register this file for upload
	}
	
	function update()
	{
		$this->messages .= 'screenshots update hook processing';
		$op= $this->get_var("OPERATION");
		switch($op){
			case 'CHECKSHOTS':
			$this->check_shots();
			break;
			case 'UPSHOTS':
			$this->up_shots();
			break;
			default:
			break;
		}
		
		return true;
	}
	
	function up_shots(){
		foreach($_FILES as $key => $file){
			$md5 = md5_file($file['tmp_name']);
			if (!$this->doihave($md5) && $key == $md5){
				$this->process_new_screenshot($file,$md5);
			}
		}
	}
	function process_new_screenshot($file,$md5){
		$this->make_thumb($file['tmp_name'],SCREENSHOT_DIR.'/'.$md5.'_thumb.png',150,150);
		move_uploaded_file($file['tmp_name'],SCREENSHOT_DIR.'/'.$md5.'.jpg');
	}
	
	function make_thumb($name,$filename,$new_w,$new_h){
		$src_img=imagecreatefromjpeg($name);
		$old_x=imageSX($src_img);
		$old_y=imageSY($src_img);
		if ($old_x > $old_y) {
			$thumb_w=$new_w;
			$thumb_h=$old_y*($new_h/$old_x);
		}
		if ($old_x < $old_y) {
			$thumb_w=$old_x*($new_w/$old_y);
			$thumb_h=$new_h;
		}
		if ($old_x == $old_y) {
			$thumb_w=$new_w;
			$thumb_h=$new_h;
		}
		$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
		imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 
		imagepng($dst_img,$filename); 
		imagedestroy($dst_img);
		imagedestroy($src_img);
	}


	function check_shots(){
		$data = $this->get_var("data");
		$rows = explode("\n",$data);
		$donthaveyet = array();
		foreach($rows as $row){
			if (!$this->doihave($row)){
				$donthaveyet[] = $row;
			}
		}
		$out = implode("\n",$donthaveyet);
		echo $out;	
	}

	function doihave($fingerprint){
		$functions = new ScreenshotClass();
		$files = $functions->listFiles(SCREENSHOT_DIR,'jpg');
		foreach($files as $fullname => $filename){
			if ($filename == $fingerprint)
				return true;
		}
		return false;
	}

	function get_var($var){
		$out = '';
		if (isset($_POST[$var]))
			$out = $_POST[$var];
	
		if (isset($_REQUEST[$var]))
			$out = $_REQUEST[$var];
			
		return $out;
	}

}
