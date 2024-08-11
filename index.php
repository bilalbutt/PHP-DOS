<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<title>PHP DOS</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/ajax.js"></script>
<script src="js/keys.js"></script>
<script src="js/functions.js"></script>
</head>
<body>
<?php include_once( "config.php" );
include_once( "defines.php" );
include_once( "functions.php" ); ?>
    <div id="results" class="result-div">
    	<!-- <div style="text-align:center"><img src="images/php-dos.png" width="330" height="300" /></div> -->
    	<h3>Welcome to <?php echo APP_TITLE;?>. Use the DOS commands as you do in DOS. Type Help for Commands.</h3>        
    </div>
    <div class="input-div">
		<form action="#" method="post" name="phpdos">        	        	
        	<div id="dir_name" class="dir_name"><?php echo dirname( $_SERVER['PHP_SELF']) . "/>" ;?></div>
            <div id="cmd_div" class="cmd-input-div">
            	<input autocomplete="off" id="phpdoscmd" class="cmd-input" name="phpdoscmd" type="text" />
            </div>
        </form>        
    </div>
</body>
</html>