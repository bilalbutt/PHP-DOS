<?php
foreach (glob("help/*.php") as $filename){
	include_once $filename;
	echo "<hr />" . $filename . "<hr />";
}

echo $ClsSyntax;

?>