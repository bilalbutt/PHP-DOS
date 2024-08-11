<?php
include_once( "config.php" );
include_once( "functions.php" );

$BaseURL = dirname( $_SERVER['PHP_SELF']);
$DirName = $_REQUEST['DirName'];		// /phpdos/dos/
$PhpCmdRaw = $_REQUEST['phpdoscmd'];	// type file.txt

$PhpCmd = str_replace("type ", "", $PhpCmdRaw);
$FolderName = $_SERVER["DOCUMENT_ROOT"] . $DirName;
$FilePath = $FolderName . $PhpCmd;
$ext = Right($PhpCmd,3);

$AllowedExt = array( "txt" );

if ( $OpenAll == 1 ){
	if ( file_exists( $FilePath ) ){
		$case = 0;
		$FileContent = "";
		//$FileToOpen = file_get_contents( $FilePath );
		$FileToOpen = OpenTheFile($FilePath);
		$FileToOpen .= '<br /><br />';
	}else{
		$case = 1;
		$FileToOpen = 'The system cannot find the specified file.<br />';
	}
}else{
	if ( in_array($ext,$AllowedExt) ){
		if ( file_exists( $FilePath ) ){
			$case = 0;
			//$FileToOpen = file_get_contents( $FilePath );	
			$FileToOpen = OpenTheFile($FilePath);
			$FileToOpen .= '<br /><br />';
		}else{
			$case = 1;
			$FileToOpen = 'The system cannot find the specified file.<br />';
		}
	}else{
		$case = 1;
		$FileToOpen = 'The system cannot open the specified file due to configration settings.<br />';
	}
}

echo $ToDo . "|" . $FileToOpen . "|" . $case;
?>