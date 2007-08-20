<?php
/**
 * WoWRoster.net WoWRoster
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $ v2.0 Titan99  $
 * @link       http://www.wowroster.net
 * @package    Key_BC
 * @subpackage Key_BC
*/


/*
	<div style="display:none; ">70</div>
	<div  style="cursor:default;">
		<div class="levelbarParent" style="width:70px;">
			<div class="levelbarChild">70</div>
		</div>
		<table class="expOutline" border="0" cellpadding="0" cellspacing="0" width="70">
			<tr>
				<td style="background-image: url('img/expbar-var2.gif');" width="100%">
					<img src="img/pixel.gif" height="14" width="1" alt="" />
				</td>
				<td width="0%"></td>
			</tr>

		</table>
	</div>

*/

function progress_bar($current,$max,$width=70,$affMode=1)
{
	switch($affMode)
	{
		case 3 :
			$aff='';
			break;
		case 2 :
			$aff=$current;
			break;
		case 1 :
		default :
			$aff=$current.'/'.$max;
	}
	$p100=($current*100)/$max;

	$display='<div style="display:none; ">'.$aff.'</div><div  style="cursor:default;"><div class="levelbarParent" style="width:'.$width.'px;"><div class="levelbarChild">'.$aff.'</div></div><table class="expOutline" border="0" cellpadding="0" cellspacing="0" width="'.$width.'"><tr><td style="background-image: url('."'img/expbar-var2.gif'".');" width="'.$p100.'%"><img src="img/pixel.gif" height="14" width="1" alt="" /></td><td width="'.(100-$p100).'%"></td></tr></table></div>';

	return $display ;
}


?>