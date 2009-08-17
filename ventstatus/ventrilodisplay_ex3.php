<?php

function VentriloDisplayEX3( &$stat, $name, $cid, $bgidx )
{
  $chan = $stat->ChannelFind( $cid );

  /* Pass protected vs. regular */
  if ( $bgidx == 0 ) {
    $img_protected = "top.bmp";
  } else {
    if ( $chan->m_prot )
    {
      if ( $bgidx % 2 ) {
        $img_protected = "chnl_pwd.gif";
      } else {
        $img_protected = "sub_chnl_pwd.gif";
      }
    } else {
      if ( $bgidx % 2 ) {
        $img_protected = "chnl.gif";
      } else {
        $img_protected = "sub_chnl.gif";
      }
    }
  }

  echo "  <tr>\n";
  echo "    <td align='left'><img src='addons/ventstatus/img/" . $img_protected . "' height='13' alt=''><font color='black'><b>".$name;
  echo "      </b></font><table width='100%' border='0' align='left' cellpadding='0' cellspacing='0' bgcolor='white'>\n";
  echo "<tr><td></td></tr>";
   
  // Display Client for this channel.
  for ( $i = 0; $i < count( $stat->m_clientlist ); $i++ )
  {
    $client = $stat->m_clientlist[ $i ];
		
    if ( $client->m_cid != $cid )
      continue;
    echo "        <tr>\n";
    echo "          <td align='left'><img src='addons/ventstatus/img/member.bmp' alt='member' height='14'><font color='black'>";

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
			
    echo "  </font></td>\n";
    echo "        </tr>\n";
  }
  
  // Display sub-channels for this channel.

//$test[]= (CVentriloChannel) $stat->m_channellist;
//usort($test , 'cmp_obj');

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

      VentriloDisplayEX3( $stat, $cn, $stat->m_channellist[ $i ]->m_cid, $bgidx + 1 );
    }
  }
  
  echo "      </table>\n";
  echo "    </td>\n";
  echo "  </tr>\n";
}

?>
