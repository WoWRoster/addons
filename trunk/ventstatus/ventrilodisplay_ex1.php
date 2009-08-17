<?php

function VentriloDisplayEX1( &$stat, $name, $cid, $bgidx )
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
  
echo "<tr>\n";
echo "<td bgcolor='$bg'><font color='$fg'><strong>";
echo $name;
echo "</strong></font>\n";
echo "<table width='95%' border='0' align='right'>\n";
  
  // Display Client for this channel.
  
 echo "<tr><td></td></tr>";
  
  for ( $i = 0; $i < count( $stat->m_clientlist ); $i++ )
  {
  		$client = $stat->m_clientlist[ $i ];
		
  		if ( $client->m_cid != $cid ) 
		  {
				continue;
			}
			
		echo "<tr>\n";
		echo "<td bgcolor='#999999'>";
		
		$flags = "";
		
		if ( $client->m_admin )
			$flags .= "A";
			
		if ( $client->m_phan )
			$flags .= "P";
			
		if ( strlen( $flags ) )
			$content .= $flags;
			$content .= " ";
			
		echo $client->m_name;
		if ( $client->m_comm )
			echo $client->m_comm;
			
		echo "</td>\n";
		echo "</tr>\n";
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
			
			VentriloDisplayEX1( $stat, $cn, $stat->m_channellist[ $i ]->m_cid, $bgidx + 1 );
		}
  }
  
  echo "</table>\n";
  echo "</td>\n";
  echo "</tr>\n";
}

