<?php

function VentriloInfo1_Stripe( &$bgidx, $name, $val )
{
	if ( $bgidx % 2 )
		$bgcolname = "#666666";
	else
		$bgcolname = "#333333";
		
	if ( $bgidx % 2 )
		$bgcolval = "#FFFFCC";
	else
		$bgcolval = "#FFFFFF";
		
	$display = "    <div width=\"35%\" bgcolor=\"$bgcolname\"><font color=\"#FFFFFF\">";
	$display .= "<strong>";
	$display .= $name;
	$display .= "</strong>";
	$display .= "</font></div>\n";
	$display .= "<div align=\"center\">";
	$display .= $val;
	$display .= "</div>";
	$display .= "</font>\n";
	
	$bgidx += 1;
	
	return print($display);
}




function VentriloInfo1( &$stat )
{
	$bgidx	= 0;
	
	VentriloInfo1_Stripe( $bgidx, "Name", $stat->m_name );
	VentriloInfo1_Stripe( $bgidx, "Phonetic", $stat->m_phonetic );
	VentriloInfo1_Stripe( $bgidx, "Comment", $stat->m_comment );
	VentriloInfo1_Stripe( $bgidx, "Auth", $stat->m_auth );
	VentriloInfo1_Stripe( $bgidx, "Max Clients", $stat->m_maxclients );
	VentriloInfo1_Stripe( $bgidx, "Voice Codec", $stat->m_voicecodec_desc );
	VentriloInfo1_Stripe( $bgidx, "Voice Format", $stat->m_voiceformat_desc );
	VentriloInfo1_Stripe( $bgidx, "Uptime", $stat->m_uptime );
	VentriloInfo1_Stripe( $bgidx, "Platform", $stat->m_platform );
	VentriloInfo1_Stripe( $bgidx, "Version", $stat->m_version );
	VentriloInfo1_Stripe( $bgidx, "Channel Count", $stat->m_channelcount );
	VentriloInfo1_Stripe( $bgidx, "Client Count", $stat->m_clientcount );
}

