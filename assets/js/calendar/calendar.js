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
	var base_url = window.location.protocol + "//" + window.location.host + "/"  + (window.location.pathname.split('/'))[1] + "/";	
	var assets_url = window.location.protocol + "//" + window.location.host + "/"  + (window.location.pathname.split('/'))[1] + "/";
	
	$('#calendar-main-menu').click(function (){
		$(".calendar-page-overlay").show(500);
		$(".calendar-page-overlay").load(base_url+ 'calendar/calendarMenu');
	});
	$('#calendar-menu-option-close').click(function (){
		$(".calendar-page-overlay").hide(500);
	});
	
});
