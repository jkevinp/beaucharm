$(document).ready(function(){
	$('#Search').bind("enterKey",function(e){
   		var value = $('#Search').val();
   		document.location = cpanel +"promos/search=" + value + "@page=0";
	});
	$('#Search').keyup(function(e)
	{
		 if(e.keyCode == 13)
    	{
        	$(this).trigger("enterKey");
    	}
	});


	$('#promo_add').click(function()
	{
		var name = $('#promo_name').val();
		var code =  $('#promo_code').val();
		var mechanics =  $('#promo_mechanics').val();
		var service =  $('#promo_service').val(); 

		if(!checkLength(name,1))
		{
			bootbox.alert('Please enter promo name');
			return false;
		}
		if(!checkLength(code,1))
		{
			bootbox.alert('Please enter promo code');
			return false;
		}
		if(!checkLength(mechanics,1))
		{
			bootbox.alert('Please enter promo mechanics');
			return false;
		}

		$.ajax({
			url: ajaxUrl + "promo_add.php",
            type: "POST",
            data:
                {'p1': name,
            	 'p2' : code,
            	 'p3': mechanics,
            	 'p4': service,
            	},
            success:function(res){
            	if(res === "1")
            	{
            		document.location.href = url + "cpanel/promos";
            	}else bootbox.alert(res);
             }
          	});
	});
});