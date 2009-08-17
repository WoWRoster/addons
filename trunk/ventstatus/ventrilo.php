<html>
  <head>
    <title>Ventrilo Test</title>
    <style>
      <!--
      img,table {border:0; celpadding:0; cellspacing:0; vertical-align:middle;}
      td {line-height:14px; vertical-align:middle;}
      div {font-family:arial; color:black; font-size: 8pt; line-height:14px;}
      .chnl{font-weight:bold; font-style=normal;}
      .chnl_pwd {font-weight:bold; font-style=normal;}
      .sub_chnl{font-weight:bold; font-style=normal;}
      .sub_chnl_pwd {font-weight:bold; font-style=normal;}
      .members {font-weight:normal; font-style=normal; color: blue}
      -->
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  </head>
  <body>

<?php
include "ventrilostatus.php";
include "ventrilodisplay_ex1.php";

$stat = new CVentriloStatus;
$stat->m_cmdprog	= "C:/Storage/Web/Online/roster/addons/ventstatus/ventrilo_status";	// Adjust accordingly.
$stat->m_cmdcode	= "2";					// Detail mode.
$stat->m_cmdhost	= "127.0.0.1";			// Assume ventrilo server on same machine.
$stat->m_cmdport	= "3784";				// Port to be statused.
$stat->m_cmdpass	= "";					// Status password if necessary.

$rc = $stat->Request();

if ( $rc )
  echo "CVentriloStatus->Request() failed. <strong>$stat->m_error</strong><br><br>\n";

$name = $stat->m_name;

if ( strlen( $stat->m_comment ) )
  $name .= " ($stat->m_comment)";

echo "<table width=\"100%\" border=\"0\">\n";
VentriloDisplayEX1( $stat, $name, 0, 0 );
echo "</table>\n";
?>
	</body>
</html>
