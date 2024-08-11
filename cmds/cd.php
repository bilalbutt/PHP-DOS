<?php
include_once( "config.php" );
$ResultDiv = '';
$BaseURL = dirname( $_SERVER['PHP_SELF']);
$DirName = $_REQUEST['DirName'];		// /phpdos/dos/
$PhpCmdRaw = $_REQUEST['phpdoscmd'];	// cd..

if( $PhpCmdRaw == "cd.."){
	$BaseFound = 0;
	$case = 0;
	//$Fld = $BaseURL . "/ | " . $DirName ;	
	$ExpDirNameRaw = explode( "/", $DirName );
	$TotalExpArrs = count($ExpDirNameRaw);
	
	if ( $LimitBackRoot == 1 ){
		if ( $TotalExpArrs > 3 ){
			$Fld = "/";
			for ($a=0;$a<=($TotalExpArrs - 1);$a++){
				if ($BaseURL . "/" == $DirName){
					$BaseFound = 1;
				}
				if ( $BaseFound == 0){
					if ( $a <= ($TotalExpArrs - 3) ){
						if ( $ExpDirNameRaw[$a] != "" ){ $Fld .= $ExpDirNameRaw[$a] . "/"; }
					}
				}else{
					$Fld = $BaseURL . "/";
				}
			}
		}else{
			$Fld = $DirName;
		}
	}else{
		$Fld = "/";
		for ($a=0;$a<=($TotalExpArrs - 3);$a++){
			if ( $ExpDirNameRaw[$a] != "" ){ 
				$Fld .= $ExpDirNameRaw[$a] . "/"; 
			}
		}	
	}	
	
}else if($PhpCmdRaw == "cd."){
	$case = 1;
	$Fld = $DirName;
}else if($PhpCmdRaw == "cd"){
	$case = 1;
	$Fld = $DirName;
}else{
	$PhpCmd = str_replace("cd ", "", $PhpCmdRaw);
	$FolderName = $_SERVER["DOCUMENT_ROOT"] . $DirName . $PhpCmd . "/";	
	if ( file_exists( $FolderName ) ){
		$case = 2;
		$Fld = $PhpCmd;
	}else{
		$case = 3;
		$Fld = 'The system cannot find the path specified. ' . '<br />';
	}
}

echo $ToDo . "|" . $Fld . "|" . $case;
?>