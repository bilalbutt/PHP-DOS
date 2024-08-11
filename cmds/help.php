<?php
include_once( "config.php" );

$PhpCmdRaw = $_REQUEST['phpdoscmd'];
$PhpCmdVar = explode(' ', $PhpCmdRaw );

include_once("help/cls.php");
include_once("help/dir.php");
include_once("help/help.php");
include_once("help/about.php");
include_once("help/cd.php");
include_once("help/chdir.php");
include_once("help/restart.php");
include_once("help/exit.php");
include_once("help/ver.php");
include_once("help/type.php");
include_once("help/del.php");
include_once("help/ren.php");
include_once("help/date.php");
include_once("help/color.php");

$Cmds = array("CLS", "DIR", "HELP", "ABOUT", "CD", "CHDIR", "RESTART", "EXIT", "VER", "TYPE", "DEL", "REN", "DATE", "COLOR");

$CmdsSyntax = array(
	$ClsSyntax,
	$DirSyntax,
	$HelpSyntax,
	$AboutSyntax,
	$CdSyntax,
	$ChDirSyntax,
	$RestartSyntax,
	$ExitSyntax,
	$VerSyntax,
	$TypeSyntax,
	$DelSyntax,
	$RenSyntax,
	$DateSyntax,
	$ColorSyntax
);

$CmdsHelp = array(
	$ClsHelp, 
	$DirHelp,
	$HelpHelp,
	$AboutHelp,
	$CdHelp,
	$ChDirHelp,
	$RestartHelp,
	$ExitHelp,
	$VerHelp,
	$TypeHelp,
	$DelHelp,
	$RenHelp,
	$DateHelp,
	$ColorHelp
);

$ResultDiv = '<div class="FldList">';

if ( count($PhpCmdVar) == 1 ){
	$ResultDiv = '<div class="FldList">';
	echo "<h3>For more information on a specific command, type HELP command-name</h3>";
	for ($a=0;$a<=(count($Cmds)-1);$a++){
		$ResultDiv .= '	<div class="col1-help">' . $Cmds[$a] .'</div>';
		$ResultDiv .= '	<div class="col2-help">' . $CmdsHelp[$a] .'</div>';
	}
	$ResultDiv .= '<br />Use Help &lt;CMD&gt; to view more help.';
	$ResultDiv .= '</div>';
	$ResultDiv .= '<div class="clearfix">&nbsp;</div>';	
	$ResultToShow = $ToDo . "|" .  $ResultDiv . "|" . count($PhpCmdVar);
	
}else{	
	$PhpCmd = strtoupper($PhpCmdVar[1]);
	$key = array_search(strtoupper( $PhpCmd ), $Cmds); // $key = 2;
	$ResultDiv .= '<div class="clearfix">&nbsp;</div>';
	$ResultDiv .= '	<div class="col1-help">' . $Cmds[$key] .'</div>';
	$ResultDiv .= '	<div class="col2-help">' . $CmdsHelp[$key] .'</div>';
	$ResultDiv .= '	<div class="col3-help"> Syntax : <br /><br /></div>';
	$ResultDiv .= '	<div class="col4-help">' . $CmdsSyntax[$key] . '</div>';
	$ResultDiv .= '</div>';
	$ResultDiv .= '<div class="clearfix">------------------------------------------------------------------</div>';
	$ResultToShow = $ToDo . "|" .  $ResultDiv . "|" . $Cmds[$key];	
}
echo $ResultToShow; 
?>