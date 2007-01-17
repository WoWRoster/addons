<?php

if ( !defined('ROSTER_INSTALLED') )
{
    exit('Detected invalid access to this file!');
}

$char_ext = '.png';

if( !empty($sig_race) )
{
	// Set race-gender based image
	if( !empty($sig_gender) )
	{
		// Set race-gender-class based image
		if( !empty($sig_class) )
		{
			$im_user_file = $configData['image_dir'].$configData['char_dir'].$sig_race.'-'.$sig_gender.'-'.strtolower(getEnglishValue($sig_class,$sig_char_locale)).$char_ext;
		}
		else
		{
			$im_user_file = $configData['image_dir'].$configData['char_dir'].$sig_race.'-'.$sig_gender.$char_ext;
		}
	}
	// Set race only image
	else
	{
		$im_user_file = $configData['image_dir'].$configData['char_dir'].$sig_race.$char_ext;
	}

}	// Set default character image
else
{
	$im_user_file = $configData['image_dir'].$configData['char_dir'].$configData['charlogo_default_image'];
}
