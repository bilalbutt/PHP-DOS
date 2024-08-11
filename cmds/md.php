<?php
include_once( "config.php" );
$ResultDiv = '';
$BaseURL = dirname( $_SERVER['PHP_SELF']);
$DirName = $_REQUEST['DirName'];		// /phpdos/dos/
$PhpCmdRaw = $_REQUEST['phpdoscmd'];	// cd..

	$PhpCmd = str_replace("md ", "", $PhpCmdRaw);
	$FolderName = $_SERVER["DOCUMENT_ROOT"] . $DirName . $PhpCmd . "/";	
	if ( file_exists( $FolderName ) ){
		$case = 0;
		$Fld = $PhpCmd;
	}else{
		$case = 1;
		$Fld = 'Create Folder. ' . '<br />';
	}

echo $ToDo . "|" . $Fld . "|" . $case;
?>