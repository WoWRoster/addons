<?php


if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

require ($addon['dir'] . 'inc/b.php');
$roster->output['html_head'] = '<script src="http://www.wowhead.com/widgets/power.js"></script>';
$filenam = $addon['dir'] . 'inc/b.php';
include( $addon['dir'] . 'inc/functions.php' );
//$roster->output['show_menu'] = false;
$prog = new prog;	


include($addon['dir'] . 'inc/configrp.lib.php');
	
$config['master'] = new rpc( $roster->db->table('config',$addon['basename']), '1', null );

$config['master']->getConfigData();	
	
$config['master']->db_values['menu']['hr'] = array(
	'name' => 'hr',
	'config_type' => 'menu',
	'value' => null,
	'form_type' => 'hr',
	'description' => '',
	'percent' => 'percent',
	'tooltip' => ''
);


//<a href="#" rel="'.$inst['Acronym'].'">'.$inst['ZoneName'].'
foreach( $array as $instance => $inst)
	{
	
$config['master']->db_values['menu'][$inst['Acronym']] = array(
	'name' => ''.$inst['Acronym'].'',
	'config_type' => 'menu',
	'value' => ''.$inst['Acronym'].'',
	'form_type' => 'makelink',
	'description' => ''.$inst['ZoneName'].' Loot',
	'percent' => '',
	'tooltip' => ''.$inst['ZoneName'].''
);

}

$save_message = $config['master']->processData($addon['config']);

$menu = $config['master']->buildConfigMenu();
$menu .= '<br>';


foreach( $config as $id => $conf_obj )
{
     
	$config[$id]->buildConfigPage();
}

$body .= $config['master']->form_start
	. $save_message;
      /*	
      echo '<pre>';
	print_r($config);
	echo '</pre>';
	*/
      if (isset($_GET['loot']))
      {
      //foreach( $config as $id => $conf_obj )

            $sql = "SELECT * FROM `".$roster->db->table('config',$addon['basename'])."` WHERE `config_type` = '".$inst."'";

            $result = $roster->db->query($sql) or die_quietly($roster->db->error(),'Database Error',basename(__FILE__),__LINE__,$sql);
            //$row = $roster->db->fetch($result);
            
            while ($row = $roster->db->fetch($result))
            {
            
            }
            
            $loot = $prog->getConfigData('`config_type` = \''.$_GET['loot'].'\'', '`downed`', $roster->db->table('config',$addon['basename']));
      //echo '<pre>';
	//print_r($loot);
	//echo '</pre>';
            //foreach( $loot[$_GET['loot']] as $id => $value )
            //{
    ///*             
    		$body .= border('sblue','start',$header_text) . "\n";
		$body .= "<table cellspacing=\"0\" cellpadding=\"0\" class=\"bodyline\" width=\"100%\">\n"; 
            $body .= $prog->buildBlock($loot[$_GET['loot']]);
            $body .= "</table>\n";
	     $body .= border('sblue','end') . "\n";
            //echo '-'.$id.' '.$value['item_id'].'<br>';

            /*
      echo '<pre>';
	print_r($loot[$id]);
	echo '</pre>';
	*/

            
      }
      else
      {
            foreach( $config as $id => $conf_obj )
            {
	           $body .= $config[$id]->formpages;
            }
      }
$body .= $config['master']->submit_button
	. $config['master']->form_end;

	
$body .= $config['master']->nonformpages
	. $config['master']->jscript;


