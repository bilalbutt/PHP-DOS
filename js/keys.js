// Keyboard Keys
var AllowedCmds = [ "help", "cls", "dir", "about", "cd", "restart", "exit", "type", "del", "ren", "date", "ver", "color", "chdir", "time", "md"];

$(document).bind('keydown',function(evt) {
	if ( document.getElementById('phpdoscmd') ){		
		var phpdoscmd = document.getElementById('phpdoscmd').value;
		var BadCmd = "'" + phpdoscmd + "' is not recognized as a internal command.";
		
		//var PhpDosCmd = phpdoscmd.toLowerCase();
		var PhpDosCmd = phpdoscmd;
		var PhpCmd = PhpDosCmd.split(" ");
		var DosCmd = PhpCmd[0].toLowerCase();
		
		if (DosCmd == "cd.." || DosCmd == "cd." || DosCmd == "cd"){
			DosCmd = "cd";
		}
		
		if (DosCmd == "chdir.." || DosCmd == "chdir." || DosCmd == "chdir"){
			DosCmd = "chdir";
		}
		
		switch(event.keyCode) {
			case 13: // Numeric Pad Key Enter
				event.preventDefault();
				if ( phpdoscmd != ""  ){					
					if ( AllowedCmds.indexOf( DosCmd ) == -1){						
						if ( document.getElementById('results').innerHTML != '' ){
							document.getElementById('results').innerHTML = document.getElementById('results').innerHTML + "<br />" + BadCmd;
						}else{
							document.getElementById('results').innerHTML = BadCmd;
						}
					}else{
						//console.log ( "Keys.js " + DosCmd );
						Ajax_RunCmd(PhpDosCmd);
					}
					document.getElementById('phpdoscmd').value = '';
				}
				document.getElementById('phpdoscmd').focus();
			break;
		}
	}else{
		// Do Nothing
	}
});