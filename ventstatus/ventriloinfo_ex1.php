<?php

function VentriloInfoEX1_Stripe( &$bgidx, $name, $val )
{
	if ( $bgidx % 2 )
		$bgcolname = "#666666";
	else
		$bgcolname = "#333333";
		
	if ( $bgidx % 2 )
		$bgcolval = "#FFFFCC";
	else
		$bgcolval = "#FFFFFF";
		
	echo "  <tr>\n";
	echo "    <td width='35%' bgcolor='$bgcolname'><font color='#FFFFFF'>";
	echo "<strong>";
	echo $name;
	echo "</strong>";
	echo "</font></td>\n";
	echo "    <td width='65%' bgcolor='$bgcolval' align='center'><font color='#000000'>";
	echo $val;
	echo "</font></td>\n";
	echo "  </tr>\n";
	
	$bgidx += 1;
}

function VentriloInfoEX1_PrettyTime( $time )
{
$week = $time / 604800;
if ( $week < 1 ){ $week = 0; } else { $week = round($week); }

$day = (round($time - ( $week * 604800))) / 86400;
if ( $day < 1 ){ $day = 0; } else { $day = round($day); }

$hour = (round($time - ( $week * 604800) - ( $day * 86400))) / 3600;
if ( $hour < 1 ){ $hour = 0; } else { $hour = round($hour); }

$minute = (round($time - ( $week * 604800) - ( $day * 86400) - ( $hour * 3600))) / 60;
if ( $minute < 1 ){ $minute = 0; } else { $minute = round($min); }

$secs = (round($time - ( $week * 604800) - ( $day * 86400) - ( $hour * 3600) - ( $minute * 60)));

return $week . 'wks' . $day . 'days' . $hour . 'hours' . $minute . 'min' . $secs . 's';
}

function returnHumanDate($thedate)
{ 
    // create a unix timestamp from the mysql date
    $thedate = strtotime($thedate); 
    // get todays date
    $today = time();
 
    // if its been less than a minute output how many secs old it is
    if(($secs = floor($today-$thedate)) < 60) $howold = $secs.' sec.'.(($secs==1)?'':'').' ago';
 
    // otherwise if its less than an hour output how many minutes
    elseif(($mins = floor(($today-$thedate)/60)) < 60) $howold = $mins.' min.'.(($mins==1)?'':'').' ago';
 
    // otherwise if its less than a day output how many hours
    elseif(($hours = floor(($today-$thedate)/3600)) < 24) $howold = $hours.' hour'.(($hours==1)?'s':'.').' ago'; 
 
    // otherwise output how many days
    else { $days = floor((($today-$thedate)/86400)); $howold = $days.' day'.(($days==1)?'':'s').' ago';}
 
    return $howold;
}

function VentriloInfoEX1( $stat )
{
	$bgidx	= 0;
	//$time = returnHumanDate( $stat->m_uptime );
	
	VentriloInfoEX1_Stripe( $bgidx, "Name", $stat->m_name );
	VentriloInfoEX1_Stripe( $bgidx, "Phonetic", $stat->m_phonetic );
	VentriloInfoEX1_Stripe( $bgidx, "Comment", $stat->m_comment );
	//VentriloInfoEX1_Stripe( $bgidx, "Auth", $stat->m_auth );
	VentriloInfoEX1_Stripe( $bgidx, "Max Clients", $stat->m_maxclients );
	VentriloInfoEX1_Stripe( $bgidx, "Voice Codec", $stat->m_voicecodec_desc );
	VentriloInfoEX1_Stripe( $bgidx, "Voice Format", $stat->m_voiceformat_desc );
	VentriloInfoEX1_Stripe( $bgidx, "Uptime", $stat->m_uptime );
	VentriloInfoEX1_Stripe( $bgidx, "Platform", $stat->m_platform );
	VentriloInfoEX1_Stripe( $bgidx, "Version", $stat->m_version );
	VentriloInfoEX1_Stripe( $bgidx, "Channel Count", $stat->m_channelcount );
	VentriloInfoEX1_Stripe( $bgidx, "Client Count", $stat->m_clientcount );
}

?>
