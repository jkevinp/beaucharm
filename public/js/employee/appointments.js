$(document).ready(function(){
	$('#Search').bind("enterKey",function(e){
   		var value = $('#Search').val();
   		document.location = cpanel +"appointments/search=" + value + "@page=0";
	});
	$('#Search').keyup(function(e)
	{
		 if(e.keyCode == 13)
    	{
        	$(this).trigger("enterKey");
    	}
	});
	$('#appointment_status').on('change',function(e){
		var v = $('#appointment_status').val();
		document.location = cpanel +"appointments/search=" + v+ "@page=0";
	});
});