<?php
/******************************
 * WoWRoster.net  Roster
 * Copyright 2002-2006
 * Licensed under the Creative Commons
 * "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * Short summary
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/
 *
 * Full license information
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/legalcode
 * -----------------------------
 *
 * $Id$
 *
 ******************************/
 
// Slightly modified class for item
class itemlink
{
	var $data;
	var $iconsize;	

	function itemlink( $data )
	{
		$this->data = $data;
	}
		
	// Function to display the itemlink
	function display($displaytype = 'both', $dkp_value = false, $show_border = false, $bankers = 0)
	{
		global $roster_conf, $wordings, $addon_conf;

		$itemlink = str_replace("%%LANG%%", $roster_conf['roster_lang'], $addon_conf['roster_dkp']['itemlink']);
		$setlink = str_replace("%%LANG%%", $roster_conf['roster_lang'], $addon_conf['roster_dkp']['setlink']);
		
		if (!eregi('Interface', $this->data['item_texture']))
		{
			$this->data['item_texture'] = 'Interface/Icons/'.$this->data['item_texture'];
		}
		
		$item_texture = preg_replace('|\\\\|','/', $this->data['item_texture']);
		$item_texture = preg_replace('|//|','/', $item_texture);

		$path = $roster_conf['interface_url'].$item_texture.'.'.$roster_conf['img_suffix'];
		
		// Set some initial parameters
		$first_line = True;
		$last_lines = '';
		$banker_lines = '';
		$dkp_lines = '';
		
		// Set the DKP Value display if requested
		if ($dkp_value && isset($this->data['dkp_value']) && floatval($this->data['dkp_value']) > 0)
		{
			if ($this->data['item_quantity'] > 1)
			{
				$dkpval = number_format($this->data['dkp_value']*$this->data['item_quantity'], 2, '.', '').' / '.$this->data['item_quantity'].'x</span>&nbsp;&nbsp;<span style="color: white;">('.number_format($this->data['dkp_value'], 2, '.', '').' / 1x)';
			}
			else
			{
				$dkpval = number_format($this->data['dkp_value'], 2, '.', '');
			}
			$dkp_lines = "<span style=\"color: #ff8000; font-weight: bold;\">".$wordings[$roster_conf['roster_lang']]['rosterdkp_dkpvalue'].":&nbsp;".$dkpval;
		}
		
		// Set the bankers string
		if ($bankers && is_array($bankers))
		{
			foreach ($bankers as $bankerdata)
			{
				$banker_lines .= "<span style=\"color: #5c82a3;\">".stripslashes($bankerdata['name'])."</span>&nbsp;<span style=\"color: #ffffff;\">(".$bankerdata['quantity'].")&nbsp;-&nbsp;</span><span style=\"color: gray;\">".$bankerdata['lastupdate']."</span><br />";
			}
		}
		
		// Disect and build the tooltip
		foreach (explode("\n", $this->data['item_tooltip']) as $line )
		{
			if( $first_line )
			{
				$color = substr( $this->data['item_color'], 2, 6 ) . '; font-size: 12px; font-weight: bold';
				$first_line = False;
			}
			else
			{
				if( substr( $line, 0, 2 ) == '|c' )
				{
					$color = substr( $line, 4, 6 ).';';
					$line = substr( $line, 10, -2 );
				}
				else if ( strpos( $line, $wordings[$roster_conf['roster_lang']]['tooltip_use'] ) === 0 )
					$color = '00ff00;';
				else if ( strpos( $line, $wordings[$roster_conf['roster_lang']]['tooltip_requires'] ) === 0 )
				{
					$color = 'ff0000;';
					$last_lines .= "<span style=\"color: #".$color."\">".$wordings[$roster_conf['roster_lang']]['item'].' '.$line."</span><br />";
					$line = '';
				}
				else if ( strpos( $line, $wordings[$roster_conf['roster_lang']]['tooltip_reinforced'] ) === 0 )
					$color = '00ff00;';
				else if ( strpos( $line, $wordings[$roster_conf['roster_lang']]['tooltip_equip'] ) === 0 )
					$color = '00ff00;';
				else if ( strpos( $line, $wordings[$roster_conf['roster_lang']]['tooltip_chance'] ) === 0 )
					$color = '00ff00;';
				else if ( strpos( $line, $wordings[$roster_conf['roster_lang']]['tooltip_enchant'] ) === 0 )
					$color = '00ff00;';
				else if ( strpos( $line, $wordings[$roster_conf['roster_lang']]['tooltip_soulbound'] ) === 0 )
					$color = '00bbff;';
				else if ( strpos( $line, '"' ) === 0 )
					$color = 'd9b200';
				else if ( strpos( $line, $wordings[$roster_conf['roster_lang']]['tooltip_set'] ) === 0 )
				{
					$color = 'd9b200;';
					$last_lines .= "<span style=\"color: #".$color."\">".$wordings[$roster_conf['roster_lang']]['item'].' '.$line."</span><br />";
					$line = '';
				}
				elseif ( strpos( $line, '"' ) )
					$color = 'ffd517';
				else
					$color='ffffff;';
			}
			$line = preg_replace('|\\>|','&#8250;', $line );
			$line = preg_replace('|\\<|','&#8249;', $line );

			if( strpos($line,"\t") )
			{
				$line = str_replace("\t",'</td><td align="right" style="font-size:10px;color:white;">', $line);
				$line = '<table width="220" cellspacing="0" cellpadding="0"><tr><td style="font-size:10px;color:white;">'.$line.'</td></tr></table>';
				$tooltip .= $line;
			}
			elseif( $line != '')
			{
				$tooltip .= "<span style=\"color: #".$color."\">".$line."</span><br />";
			}
		}

		// Add the banker lines
		$tooltip = $banker_lines.$tooltip;
				
		// Add the lines that we want to the end of the tooltip
		$tooltip .= $last_lines;
		
		// Add DKP Value line
		$tooltip .= $dkp_lines;		

		$tooltip = str_replace("'", "\'", $tooltip);
		$tooltip = str_replace('"','&quot;', $tooltip);
		$tooltip = str_replace('<','&lt;', $tooltip);
		$tooltip = str_replace('>','&gt;', $tooltip);
		
		$tmpitemid = explode(":", $this->data['item_id']);
		$itemlink = str_replace("%%ID%%", $tmpitemid[0], $itemlink);
		$itemlink = str_replace("%%NAME%%", urlencode(utf8_decode($this->data['item_name'])), $itemlink);
		$itemlink = '<a href="'.$itemlink.'" target="_itemlink">';
		$itemspan = '<span onmouseover="overlib(\''.$tooltip.'\');" onmouseout="return nd();">';
		$itemdiv = '<div class="item" onmouseover="overlib(\''.$tooltip.'\');" onmouseout="return nd();">';
		
		if ($this->data['item_setid'])
		{
			$rowspan = ' rowspan="2"';
			$setlink = str_replace("%%ID%%", $this->data['item_setid'], $setlink);
			$setlink = str_replace("%%NAME%%", urlencode(utf8_decode($this->data['item_setname'])), $setlink);
			$setlink = '<a href="'.$setlink.'" target="_setlink">';

			$setspan = '<span onmouseover="overlib(\''.$wordings[$roster_conf['roster_lang']]['item'].' '.$wordings[$roster_conf['roster_lang']]['tooltip_set'].': '.stripslashes($this->data['item_setname']).'\');" onmouseout="return nd();">';
		}
		
		// Build the Output of the itemlink
		$output = '<table cellspacing="0" cellpadding="0"><tr>';
		
		if (!$show_border)
		{
			$bordercolor = '';
		}
		else
		{
			switch ($this->data['item_color'])
			{
				case "ffff8000":
					$bordercolor = "orange";
					break;
				case "ffa335ee":
					$bordercolor = "purple";
					break;
				case "ffffffff":
					$bordercolor = "white";
					break;
				case "ff1eff00":
					$bordercolor = "green";
					break;
				case "ff9d9d9d":
					$bordercolor = "grey";
					break;
				case "ff0070dd":
					$bordercolor = "blue";
					break;
				default:
					$bordercolor = '';
			}
		}
		
		if ($displaytype == 'icon' || $displaytype == 'both')
		{
			if( ($this->data['item_quantity'] > 1) )
			{
				$quantity = '<span class="quant_shadow">'.$this->data['item_quantity'].'</span>';
				$quantity .= '<span class="quant">'.$this->data['item_quantity'].'</span>';
			}

			if ($this->iconsize)
			{
				$size = 'width="'.$this->iconsize.'px" height="'.$this->iconsize.'px" ';
			}
			else
			{
				$size = 'class="icon'.$bordercolor.'" ';
			}

			$output .= '<td'.$rowspan.'>'.$itemdiv.$itemlink.'<img '.$size.'src="'.$path.'" alt="" /></a>'.$quantity."</div></td>";
		}

		if ($displaytype == 'both')
		{
			$output .= '<td rowspan="2">&nbsp;</td>';
		}

		if ($displaytype == 'text' || $displaytype == 'both')
		{
			$output .= '<td>'.$itemspan.$itemlink."<span style=\"color: #".substr( $this->data['item_color'], 2, 6 )."; font-size: 12px; font-weight: bold; \">[".stripslashes($this->data['item_name'])."]</span></a></td></tr>\n";
			
			if ($this->data['item_setid'])
			{
				$output .= '<tr><td>'.$setspan.$setlink.'<span style="color: #d9b200; font-size: 9px;">'.$wordings[$roster_conf['roster_lang']]['item'].' '.$wordings[$roster_conf['roster_lang']]['tooltip_set'].': '.stripslashes($this->data['item_setname']).'</span></a></span></td></tr>';
			}
		}
		
		
		$output .= "</table>\n";
		
		return $output;
	}
}

?>
