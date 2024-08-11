<?php
include_once( "config.php" );
include_once( "functions.php" );

$BaseURL = dirname( $_SERVER['PHP_SELF']);
$DirName = $_REQUEST['DirName'];		// /phpdos/dos/
$PhpCmdRaw = $_REQUEST['phpdoscmd'];	// del file.txt

$PhpCmd = str_replace("del ", "", $PhpCmdRaw);
$FolderName = $_SERVER["DOCUMENT_ROOT"] . $DirName;
$FilePath = $FolderName . $PhpCmd;

if ( file_exists( $FilePath ) ){
	$case = 0;
	unlink($FilePath);
	$FileToDel = "'" . $PhpCmd . "' has been deleted successfully.<br />";
}else{
	$case = 1;
	$FileToDel = 'The system cannot find the specified file/folder.<br />';
}
echo $ToDo . "|" . $FileToDel . "|" . $case;
?>