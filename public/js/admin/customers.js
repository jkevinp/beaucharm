$(document).ready(function(){
	$('#Search').bind("enterKey",function(e){
   		var value = $('#Search').val();
   		document.location = cpanel +"customers/search=" + value + "@page=0";
	});
	$('#Search').keyup(function(e)
	{
		 if(e.keyCode == 13)
    	{
        	$(this).trigger("enterKey");
    	}
	});
});