$( document ).ready(function() {	
	SetInput();
	$( "#results" ).click(function() {
		document.getElementById('phpdoscmd').focus();
	});	
});

function SetInput(){
	var WinWidth = $( window ).width();
	var DirName = document.getElementById('dir_name').offsetWidth ;
	var CmdWidth = ( (WinWidth - DirName) - 30 ) + 'px';
	document.getElementById('cmd_div').style.width = CmdWidth;	
	//console.log ( WinWidth + " | " + DirName + " | " + ((WinWidth - DirName) - 20 ));	
	document.getElementById('phpdoscmd').focus();
}

function Scroll(){
	console.log( "Scrolling..." );
	$("#results").animate({ scrollTop: $('#results').prop("scrollHeight")}, 1000);
}