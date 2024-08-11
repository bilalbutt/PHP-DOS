// AJAX Functions

////////////////// AJAX request intialization //////////////////
function ajaxRequest(){
	// ajax request intialization with respect to browser	
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }else{// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	return xmlhttp;
}
////////////////// AJAX request intialization //////////////////

function Ajax_RunCmd(phpdoscmd){
	var xmlhttp = new ajaxRequest();
	
	//var PhpDosCmd = phpdoscmd.toLowerCase();
	var PhpDosCmd = phpdoscmd;
	
	if( PhpDosCmd.toLowerCase() == 'cd..' || PhpDosCmd.toLowerCase() == 'chdir..'){
		var PhpCmdToDo = PhpDosCmd.replace( "..", "" );
	}else if( PhpDosCmd.toLowerCase() == 'cd.' || PhpDosCmd.toLowerCase() == 'chdir.' ){
		var PhpCmdToDo = PhpDosCmd.replace( ".", "" );
	}else{
		var PhpCmd = PhpDosCmd.split(" ");
		var PhpCmdToDo =  PhpCmd[0].toLowerCase();
	}
    	
	var DirName = document.getElementById('dir_name').innerHTML;
	DirName = DirName.replace( "&gt;", "" );	
	var parameters = "phpdoscmd=" + PhpDosCmd + "&DirName=" + DirName;    
	
    console.log ( "AJAX.js | Func Variable : " + PhpDosCmd + " | To Do : " + PhpCmdToDo + " | Parameters : " + parameters );		
	
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 || xmlhttp.readyState=="complete"){
			if(xmlhttp.status == 200){
				var content = xmlhttp.responseText;
				if (content == 'Error1'){
					console.log('Error1');
				}else if (content == 'Error2'){
					console.log('Error2');
				}else{
					//console.clear();
					console.log( "content : " + content + "\n\n");
					
					var CmdContent = content.split("|");
					var Cmd = CmdContent[0];
					//console.log( "\n\ncontent : " + content + "\nCMD : " + CmdContent[0] + " | " + CmdContent[1] );
					
					if ( CmdContent[0] == "cls" ){
						document.getElementById('results').innerHTML = '';
						console.clear();						
					}else if ( CmdContent[0] == "cd" ){
						//console.log( "CMD : " + CmdContent[0] + " | " + CmdContent[1] + " | " + CmdContent[2] );						
						// Case 0	:	cd..
						// Case 1	:	cd & cd.
						// Case 2	:	cd FOLDER ( Folder exists )
						// Case 3	:	cd FOLDER ( Folder does not exists )
						
						if ( CmdContent[2] == 0 ){
							document.getElementById('dir_name').innerHTML = CmdContent[1] + '&gt;';
							SetInput();
						}else if ( CmdContent[2] == 1 ){
							document.getElementById('results').innerHTML = document.getElementById('results').innerHTML + "<br />" + CmdContent[1] + '&gt;';
						}else if ( CmdContent[2] == 2 ){
							var Str = document.getElementById('dir_name').innerHTML;
							Str = Str.substring(0, (Str.length) - 4 );
							document.getElementById('dir_name').innerHTML = Str + CmdContent[1] + '/&gt;';
							SetInput();
						}else if ( CmdContent[2] == 3 ){
							document.getElementById('results').innerHTML = document.getElementById('results').innerHTML + CmdContent[1];
						}
					}else if ( CmdContent[0] == "chdir" ){
						//console.log( "CMD : " + CmdContent[0] + " | " + CmdContent[1] + " | " + CmdContent[2] );						
						// Case 0	:	chdir..
						// Case 1	:	chdir & chdir.
						// Case 2	:	chdir FOLDER ( Folder exists )
						// Case 3	:	chdir FOLDER ( Folder does not exists )
						
						if ( CmdContent[2] == 0 ){
							document.getElementById('dir_name').innerHTML = CmdContent[1] + '&gt;';
							SetInput();
						}else if ( CmdContent[2] == 1 ){
							document.getElementById('results').innerHTML = document.getElementById('results').innerHTML + "<br />" + CmdContent[1] + '&gt;';
						}else if ( CmdContent[2] == 2 ){
							var Str = document.getElementById('dir_name').innerHTML;
							Str = Str.substring(0, (Str.length) - 4 );
							document.getElementById('dir_name').innerHTML = Str + CmdContent[1] + '/&gt;';
							SetInput();
						}else if ( CmdContent[2] == 3 ){
							document.getElementById('results').innerHTML = document.getElementById('results').innerHTML + CmdContent[1];
						}											
					}else if ( CmdContent[0] == "md" ){
						//console.log( "CMD : " + CmdContent[0] + " | " + CmdContent[1] + " | " + CmdContent[2] );
						// Case 0	:	md FOLDER ( Folder exists )
						// Case 1	:	md FOLDER ( Folder does not exists )
						
						if ( CmdContent[2] == 1 ){
							document.getElementById('results').innerHTML = document.getElementById('results').innerHTML + "<br />" + CmdContent[1] + '&gt;';
						}else if ( CmdContent[2] == 2 ){
							var Str = document.getElementById('dir_name').innerHTML;
							Str = Str.substring(0, (Str.length) - 4 );
							document.getElementById('dir_name').innerHTML = Str + CmdContent[1] + '/&gt;';
							SetInput();
						}else if ( CmdContent[2] == 3 ){
							document.getElementById('results').innerHTML = document.getElementById('results').innerHTML + CmdContent[1];
						}					
					}else if (CmdContent[0] == "type" ){
						//console.log( "CMD : " + CmdContent[0] + " | " + CmdContent[1] + " | " + CmdContent[2] );
						// Case 0	:	File Exists
						// Case 1	:	File not found.
						if ( CmdContent[2] == 0 ){
							document.getElementById('results').innerHTML = document.getElementById('results').innerHTML + "<pre>" + CmdContent[1] + "</pre>";
						}else{
							document.getElementById('results').innerHTML = document.getElementById('results').innerHTML + CmdContent[1];
						}						
					}else if (CmdContent[0] == "del" ){
						//console.log( "CMD : " + CmdContent[0] + " | " + CmdContent[1] + " | " + CmdContent[2] );
						// Case 0	:	File Exists
						// Case 1	:	File not found.
						document.getElementById('results').innerHTML = document.getElementById('results').innerHTML + CmdContent[1];												
					}else if (CmdContent[0] == "ren" ){
						//console.log( "CMD : " + CmdContent[0] + " | " + CmdContent[1] + " | " + CmdContent[2] );						
						document.getElementById('results').innerHTML = document.getElementById('results').innerHTML + CmdContent[1];
					}else if( CmdContent[0] == "restart" ){
						location.reload();
					}else if( CmdContent[0] == "exit" ){
						location.href = "exit.php";
					}else if( CmdContent[0] == "date" ){
						document.getElementById('results').innerHTML = document.getElementById('results').innerHTML + CmdContent[1];
					}else if( CmdContent[0] == "time" ){
						document.getElementById('results').innerHTML = document.getElementById('results').innerHTML + CmdContent[1];
					}else if( CmdContent[0] == "color" ){
						var ColorContent = content.split("|");
						var bg = ColorContent[2];
						var txt = ColorContent[3];
						$( ".result-div, .cmd-input, .input-div" ).css("color",txt);
						$( ".result-div, .cmd-input, .input-div, body" ).css("background-color",bg);
					}else{
						// DIR, ABOUT, HELP, VER
						if( document.getElementById('results').innerHTML == "" ){
							document.getElementById('results').innerHTML = CmdContent[1];
						}else{
							document.getElementById('results').innerHTML = document.getElementById('results').innerHTML + CmdContent[1];
						}
					}
					
					Scroll();
					
				}
				
			}else{
				alert("Error reading data");
			}
		}
	}
	xmlhttp.open("POST", "ajax_php.php?todo=" + PhpCmdToDo, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send(parameters);	
}