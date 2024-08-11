<?php
include_once( "config.php" );
include_once( "functions.php" );

$BaseURL = dirname( $_SERVER['PHP_SELF']);
$DirName = $_REQUEST['DirName'];		// /phpdos/dos/
$FolderName = $_SERVER["DOCUMENT_ROOT"] . $DirName;

$PhpCmdRaw = $_REQUEST['phpdoscmd'];	// ren file.txt|file1.txt
$PhpCmd = Mid($PhpCmdRaw, 4, strlen( $PhpCmdRaw ) ) ; // (  str_replace("ren ", "", $PhpCmdRaw);

$RenameParts = explode( "==", $PhpCmd );
$OldName = $FolderName . trim($RenameParts[0]);
$NewName = $FolderName . trim($RenameParts[1]);

if ( file_exists( $OldName ) ){
	$case = 0;
	rename($OldName,$NewName);
	$FileRenamed = "'" . $OldName . "' has been renamed to '" . $NewName . "' successfully.<br />";
}else{
	$case = 1;
	$FileRenamed = 'The system cannot find the specified file/folder.<br />';
}

echo $ToDo . "|" . $FileRenamed . "|" . $case;
?>