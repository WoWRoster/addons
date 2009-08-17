<?php
function VentriloDisplayEX2_Stripe( $perc, $val, $bgidx )
{
	$fgcol = "#000000";
	
	if ( $bgidx < 0 )
	{
		$fgcol = "#FFFFFF";
		$bgcol = "#000000";
	}
	else
	{
		if ( $bgidx % 2 )
			$bgcol = "#FFFFCC";
		else
			$bgcol = "#FFFFFF";
	}
			
	echo "    <td width=\"$perc\" bgcolor=\"$bgcol\"><font color=\"$fgcol\">$val</font></td>\n";
}



function VentriloDisplayEX2( &$stat, $name, $cid, $bgidx )
{
	// Display the table headers.
	
	echo "  <tr>\n";
	
	VentriloDisplayEX2_Stripe( "5%", "Flags", -1 );
	VentriloDisplayEX2_Stripe( "5%", "UID", -1 );
	VentriloDisplayEX2_Stripe( "5%", "CID", -1 );
	VentriloDisplayEX2_Stripe( "10%", "Sec", -1 );
	VentriloDisplayEX2_Stripe( "10%", "Ping", -1 );
	VentriloDisplayEX2_Stripe( "20%", "Name", -1 );
	VentriloDisplayEX2_Stripe( "45%", "Comment", -1 );
	
	echo "  </tr>\n";
	
	// Display all clients.
	
	for ( $i = 0; $i < count( $stat->m_clientlist ); $i++ )
	{
		echo "  <tr>\n";
		
		$client = $stat->m_clientlist[ $i ];
		
		$flags = "";
		
		if ( $client->m_admin )
			$flags .= "A";
			
		if ( $client->m_phan )
			$flags .= "P";
		
		VentriloDisplayEX2_Stripe( "5%", $flags, $bgidx );
		VentriloDisplayEX2_Stripe( "5%", $client->m_uid, $bgidx );
		VentriloDisplayEX2_Stripe( "5%", $client->m_cid, $bgidx );
		VentriloDisplayEX2_Stripe( "10%", $client->m_sec, $bgidx );
		VentriloDisplayEX2_Stripe( "10%", $client->m_ping, $bgidx );
		VentriloDisplayEX2_Stripe( "20%", $client->m_name, $bgidx );
		VentriloDisplayEX2_Stripe( "45%", $client->m_comm, $bgidx );
		
		echo "  </tr>\n";
		
		$bgidx += 1;
	}
}
?>