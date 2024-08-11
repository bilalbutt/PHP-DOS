<?php
include_once( "config.php" );

$DirName = $_REQUEST['DirName'];
$Dir = $_SERVER["DOCUMENT_ROOT"] . $DirName;
$Files = scandir($Dir);
$DirList = '';	$FileList = ''; $FldTime = '';
$Col1 = ""; $Col2 = ""; $Col3 = ""; $Col4 = "";
//print_r ( $Files );
for ( $a=0;$a<=(count($Files) -1);$a++){
	$Folder = $Files[$a];
	if ($HideFiles == 1) {
		if ( !in_array($Folder, $FilesNotToInclude ) ){
			//$Size = FormatSizeUnits(filesize($Folder));
			if ( ($Folder == ".") || ($Folder == "..") ){
				// Nothing
			}else{
				$stat = stat($_SERVER["DOCUMENT_ROOT"] . $DirName . $Folder);
				$FldDate = date ("D, M d, y",  $stat['mtime'] ); // date ("D, M d, y", filemtime($Folder));
				$FldTime = date ("h:i:s A", $stat['mtime'] ); // date ("h:i:s A", filemtime($Folder));
				//$Col5 .= $Size . "<br />";
				if ( is_dir($_SERVER["DOCUMENT_ROOT"] . $DirName . $Folder) ){
					$DirList .= $Folder . "<br />";
					$Col2 .= $FldDate . "<br />";
					$Col3 .= $FldTime . "<br />";
					$Col4 .= "&lt;DIR&gt; <br />";
				}else{
					$FileList .= $Folder . "<br />";
					$Col2 .= $FldDate . "<br />";
					$Col3 .= $FldTime . "<br />";
				}
			}			
		}
	}else{
		//$Size = FormatSizeUnits(filesize($Folder));
		if ( ($Folder == ".") || ($Folder == "..") ){
			// Nothing
		}else{
			$stat = stat($_SERVER["DOCUMENT_ROOT"] . $DirName . $Folder);
			$FldDate = date ("D, M d, y",  $stat['mtime'] ); // date ("D, M d, y", filemtime($Folder));
			$FldTime = date ("h:i:s A", $stat['mtime'] ); // date ("h:i:s A", filemtime($Folder));
			//$Col5 .= $Size . "<br />";
			if ( is_dir($_SERVER["DOCUMENT_ROOT"] . $DirName . $Folder) ){
				$DirList .= $Folder . "<br />";
				$Col2 .= $FldDate . "<br />";
				$Col3 .= $FldTime . "<br />";
				$Col4 .= "&lt;DIR&gt; <br />";
			}else{
				$FileList .= $Folder . "<br />";
				$Col2 .= $FldDate . "<br />";
				$Col3 .= $FldTime . "<br />";
			}
		}		
	}
}

$ResultDiv = '<div class="FldList">';
$ResultDiv .= '<br />Directory of ' . $DirName . "<br /><br />";
$ResultDiv .= '	<div class="col2">' . $Col2 . ' </div>';
$ResultDiv .= '	<div class="col3">' . $Col3 . ' </div>';
$ResultDiv .= '	<div class="col4">' . $Col4 . ' </div>';
//$ResultDiv .= '	<div class="col4">' . $Col5 . ' </div>';
$ResultDiv .= '	<div class="col1">' . $DirList . $FileList . ' </div>';
$ResultDiv .= '</div>';
$ResultDiv .= '<div class="clearfix">&nbsp;</div>';
$ResultDiv .= '<div>------------------------------------------------------------------</div>';
echo $ToDo . "|" . $ResultDiv;
?>