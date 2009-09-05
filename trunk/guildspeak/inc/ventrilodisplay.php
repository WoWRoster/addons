<?php

function VentriloDisplay1( &$stat, $name, $cid, $bgidx )
{
  $chan = $stat->ChannelFind( $cid );
  
  if ( $bgidx % 2 )
  	$bg = "#666666";
  else
  	$bg = "#333333";

/*
  if ( $chan->m_prot )
    $fg = "#FF0000";
  else
    $fg = "#FFFFFF";
*/
  $fg = "#FFFFFF";
  
  if ( $chan->m_prot )
  {
  		if ( $bgidx %2 )
			$bg = "#660000";
		else
			$bg = "#330000";
  }
  
  echo "  <tr>\n";
  echo "    <td bgcolor=\"$bg\"><font color=\"$fg\"><strong>";
  echo $name;
  echo "</strong></font>\n";
  
  echo "      <table width=\"95%\" border=\"0\" align=\"right\">\n";
  
  // Display Client for this channel.
  
  for ( $i = 0; $i < count( $stat->m_clientlist ); $i++ )
  {
  		$client = $stat->m_clientlist[ $i ];
		
  		if ( $client->m_cid != $cid )
			continue;
			
		echo "      <tr>\n";
		echo "        <td bgcolor=\"#FFFFFF\">";

		$flags = "";
		
		if ( $client->m_admin )
			$flags .= "A";
			
		if ( $client->m_phan )
			$flags .= "P";
			
		if ( strlen( $flags ) )
			echo "\"$flags\" ";
			
		echo $client->m_name;
		if ( $client->m_comm )
			echo " ($client->m_comm)";
			
		echo "  </td>\n";
		echo "      </tr>\n";
  }
  
  // Display sub-channels for this channel.

  for ( $i = 0; $i < count( $stat->m_channellist ); $i++ )
  {
  		if ( $stat->m_channellist[ $i ]->m_pid == $cid )
		{
			$cn = $stat->m_channellist[ $i ]->m_name;
			if ( strlen( $stat->m_channellist[ $i ]->m_comm ) )
			{
				$cn .= " (";
				$cn .= $stat->m_channellist[ $i ]->m_comm;
				$cn .= ")";
			}
			
			VentriloDisplay1( $stat, $cn, $stat->m_channellist[ $i ]->m_cid, $bgidx + 1 );
		}
  }
  
  echo "      </table>\n";
  echo "    </td>\n";
  echo "  </tr>\n";
}

function VentriloDisplay2_Stripe( $perc, $val, $bgidx )
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



function VentriloDisplay2( &$stat, $name, $cid, $bgidx )
{
	// Display the table headers.
	
	echo "  <tr>\n";
	
	VentriloDisplay2_Stripe( "5%", "Flags", -1 );
	VentriloDisplay2_Stripe( "5%", "UID", -1 );
	VentriloDisplay2_Stripe( "5%", "CID", -1 );
	VentriloDisplay2_Stripe( "10%", "Sec", -1 );
	VentriloDisplay2_Stripe( "10%", "Ping", -1 );
	VentriloDisplay2_Stripe( "20%", "Name", -1 );
	VentriloDisplay2_Stripe( "45%", "Comment", -1 );
	
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
		
		VentriloDisplay2_Stripe( "5%", $flags, $bgidx );
		VentriloDisplay2_Stripe( "5%", $client->m_uid, $bgidx );
		VentriloDisplay2_Stripe( "5%", $client->m_cid, $bgidx );
		VentriloDisplay2_Stripe( "10%", $client->m_sec, $bgidx );
		VentriloDisplay2_Stripe( "10%", $client->m_ping, $bgidx );
		VentriloDisplay2_Stripe( "20%", $client->m_name, $bgidx );
		VentriloDisplay2_Stripe( "45%", $client->m_comm, $bgidx );
		
		echo "  </tr>\n";
		
		$bgidx += 1;
	}
}

