<?php
/* <PREE>PRINT_R</PREE> */
function PrintR($arr){
	echo pres;
	print_r($arr);
	echo pree;
}
/* <PREE>PRINT_R</PREE> */

function FormatSizeUnits($bytes){
	if ($bytes >= 1073741824){
		$bytes = number_format($bytes / 1073741824, 2) . ' GB';
	}elseif ($bytes >= 1048576){
		$bytes = number_format($bytes / 1048576, 2) . ' MB';
	}elseif ($bytes >= 1024){
		$bytes = number_format($bytes / 1024, 2) . ' KB';
	}elseif ($bytes > 1){
		$bytes = $bytes . ' bytes';
	}elseif ($bytes == 1){
		$bytes = $bytes . ' byte';
	}else{
		$bytes = '0 bytes';
	}
	return $bytes;
}

##############################################################################
/* VISUAL BASIC 6 LEFT$ EVQUALENT OF PHP */
function Left($str,$len){
	$length=strlen($str);
	if ( $len > $length ){
		$len=$length;
	}else if ( $len <= 0 ) {
		$new = $str;
	}else{
		for ($i=0;$i<$len;$i++){
			$temp[]=$str[$i];
		}
		$new = implode ("",$temp);
	}
	return ($new);
}
##############################################################################

##############################################################################
/* VISUAL BASIC 6 MID$ EVQUALENT OF PHP */
function Mid($str,$start,$end){
	$new = substr ($str, $start, $end);
	return $new;
}
##############################################################################

##############################################################################
/* VISUAL BASIC 6 RIGTH$ EVQUALENT OF PHP */
function Right($str,$len){
	$rest = substr($str, -$len);
	return $rest;
}
##############################################################################

function OpenTheFile($Path){
	$myfile = fopen($Path, "r") or die("Unable to open file!");
	// Output one line until end-of-file
	$FileContent = '';
	while(!feof($myfile)) {
		$FileContent .= fgets($myfile) . "<br>";
	}
	fclose($myfile);
	return $FileContent;
}
##############################################################################

function GetColor($colrs){
	$clrs = strtoupper($colrs);
	if ( $clrs == "0" ){ $clr = '#000000'; }	//	Black
	if ( $clrs == "1" ){ $clr = '#000080';}	//	Blue
	if ( $clrs == "2" ){ $clr = '#008000';}	//	Green
	if ( $clrs == "3" ){ $clr = '#008080';}	//	Auqa
	if ( $clrs == "4" ){ $clr = '#800000';}	//	Red
	if ( $clrs == "5" ){ $clr = '#800080';}	//	Purple
	if ( $clrs == "6" ){ $clr = '#808000';}	//	Yellow
	if ( $clrs == "7" ){ $clr = '#c0c0c0';}	//	White
	if ( $clrs == "8" ){ $clr = '#808080';}	//	Grey
	if ( $clrs == "9" ){ $clr = '#0000ff';}	//	Light Blue
	if ( $clrs == "A" ){ $clr = '#00ff00';}	//	Light Green
	if ( $clrs == "B" ){ $clr = '#00ffff';}	//	Light Aqua
	if ( $clrs == "C" ){ $clr = '#ff0000';}	//	Light Red
	if ( $clrs == "D" ){ $clr = '#ff00ff';}	//	Light Purple
	if ( $clrs == "E" ){ $clr = '#ffff00';}	//	Light Yellow
	if ( $clrs == "F" ){ $clr = '#ffffff';}	//	Light White
	return $clr;
}
##############################################################################
?>
