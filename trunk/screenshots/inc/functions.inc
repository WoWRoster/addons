<?php

if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

/**
 * Common Screenshot Functions Class
 * @package SigGen
 */
class ScreenshotClass
{
	/**
	 * Get a list of files from a directory
	 *
	 * @param string $dir | directory to get list of files
	 * @param mixed $ext | get files with this extention can be an array
	 * @return array | $file => $name
	 */
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
						$name = str_replace('.' . $pfad_info['extension'],'',$file);
						$arrFiles += array($file => $name);
					}
				}
				else
				{
					if( strtolower($pfad_info['extension']) == strtolower($ext) )
					{
						$name = str_replace('.' . $pfad_info['extension'],'',$file);
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

}
