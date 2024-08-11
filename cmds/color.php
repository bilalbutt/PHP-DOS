<?php
include_once( "config.php" );
include_once( "functions.php" );

$PhpCmdRaw = $_REQUEST['phpdoscmd'];	// type file.txt
$PhpCmd = trim(str_replace("color", "", $PhpCmdRaw));

if ( $PhpCmd != "" ){
	$clrs = strtoupper( $PhpCmd );
	$bgclrraw = Left($clrs,1);
	$txtclrraw = Mid($clrs,1,1);
	if  ( $bgclrraw != $txtclrraw ){
		$bgclr = GetColor( $bgclrraw );
		$txtclr = GetColor( $txtclrraw );
	}else{
		$bgclr = GetColor("0");
		$txtclr = GetColor("F");
	}
}else{
	$bgclr = GetColor("0");
	$txtclr = GetColor("F");
}

echo $ToDo . "|" . $PhpCmd . "|" . $bgclr . "|" . $txtclr;
//echo $ToDo . "|[" . $PhpCmd . "]";
?>