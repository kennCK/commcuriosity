/* 
This document is own by Kennette J. Canales.

No portion of this document shall be use or copy  by anyone without the authorization of the owner.
That act stated above is against the law of IP or Intellectual Property.

This document is exclusive to the website (commcuriosity) develop by the following members of the team:

1. Kennette J. Canales
2. Joseph Carlo Ruiz 

@copyright 2016
@communicaction curiosity
@department of communications, linguistics and literature
*/
$(document).ready( function(){
	var base_url = window.location.protocol + "//" + window.location.host + "/"  + (window.location.pathname.split('/'))[1] + "/" + "index.php/";	
	
	$('#login-account').click(function (){
		var username = $("#username").val();
		var password = $("#password").val();
		
		var result = validate(username, password);
		
		
		switch(result){
			case 0: 
				$('#login-notif').show();
				$('#login-notif').load(base_url + 'login/loginRequiredInformationError');
				break;
			default:
				$('#login-notif').hide();
			break;
			
		}
	});
});
