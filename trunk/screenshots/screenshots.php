<?php
if ( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}
require_once( $addon['dir'].'/inc/functions.inc');

// Set track errors on
if( CAN_INI_SET )
{
	ini_set('track_errors',1);
}
ob_start();

define('SCREENSHOT_DIR', $addon['dir']  . "screenshots");
define('SCREENSHOT_URL', $addon['url_full']  . "screenshots");
$functions = new ScreenshotClass();
$files = $functions->listFiles(SCREENSHOT_DIR,'jpg');
echo gen_imagetable($files);


function gen_imagetable($files){
	$out = '';
	$out .= "<table class=\"\">\n";
	$i=0;
	foreach($files as $file)
	{
		if ($i%3 == 0){
			if ($i==0)
				$out .= "<tr>\n";
			else
				$out .= "</tr><tr>\n";
		}
		$out .= '<td>'.gen_imagediv($file,$i)."</td>\n";
		$i++;
	}
	if (count($files) > 0)
		$out .= "</tr>\n";
	$out .= "</table>\n";
	return $out;
}
function gen_imagediv($md5,$i){

	$filepath = SCREENSHOT_DIR."/$md5.jpg";
	
	$last_modified = filemtime($filepath);
	$modtag = "<span>" . date("m-d-y H:i:s", $last_modified)."</span>";
	$out = "<div style='cursor:pointer;' onclick='switchImage(\"$md5\",$i);'>
	$modtag
	<div id='image_$i' name='image_$i'><img src='".SCREENSHOT_URL."/".$md5."_thumb.png'></div>
	
	</div>\n";
	return $out;
}

?>

<script type="text/javascript">

var ssurl = '<?php echo SCREENSHOT_URL; ?>';

function switchImage(md5, i){
	
	var oldDiv = document.getElementById('image_'+i);
	var oldImg = oldDiv.childNodes[0];
	var oldImgUrl = oldImg.src;
	var newImgUrl = ssurl + ((oldImgUrl.indexOf("_thumb") != -1) ? '/'+md5+'.jpg' : '/'+md5+'_thumb.png');
	
	var newImg = document.createElement("img");
	newImg.src = newImgUrl;
	
	var newDiv = document.createElement("div");
	newDiv.name = 'image_'+i;
	newDiv.id = 'image_'+i;
	
	newDiv.appendChild(newImg);
	
	oldDiv.parentNode.replaceChild(newDiv,oldDiv);
}
function replaceDiv(DivName, newContent){
	oldDiv = document.getElementById(DivName);
	if (oldDiv == null)return;
	newDiv = document.createElement(oldDiv.tagName);
	newDiv.id = oldDiv.id;
	newDiv.className = oldDiv.className;
	newDiv.innerHTML = newContent;
	oldDiv.parentNode.replaceChild(newDiv, oldDiv);
}
function remElement(ElementName){
	var Element = document.getElementById(ElementName);
	Element.parentNode.removeChild(Element);
}
function show(elemName){
	var elem = document.getElementById(elemName);
	elem.style.display='block';
}
function hide(elemName){
	var elem = document.getElementById(elemName);
	elem.style.display='none';
}
</script>


<?php




$out = ob_get_contents();
ob_end_clean();
echo messagebox( $out , 'Screenshots' ); 
?>