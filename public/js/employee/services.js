$(document).ready(function(){
	$('#Search').bind("enterKey",function(e){
   		var value = $('#Search').val();
   		document.location = cpanel +"services/search=" + value + "@page=0";
	});

	$('#new_category').click(function(){
			bootbox.prompt("New Category Name", function(result) 
			{
			if (result === null) 
			{
				bootbox.alert("Please enter a valid category name");
				return false;
			}
			else 
			{
				if(!checkLength(result,1))
				{
					bootbox.alert("Please enter a valid category name");
					return false;
				}
				
				$.ajax({
					type: 'POST',
				     url: ajaxUrl + "create_category.php", // same domain
				     data: {'p1' : result},
				     beforeSend: function() 
				     {
				     	bootbox.alert("Adding new Category: " + result);
				     },
				     success: function(res) 
				     {
				      	bootbox.alert(res);
				     }
				   	});
			}
			});
	});

	$('#new_price').click(function(){
		bootbox.prompt("New Service Price. Enter Service Fee", function(result) 
			{
			if (result === null) 
			{
				bootbox.alert("Please enter a valid Service Fee");
				return false;
			}
			else 
			{
				if(!checkLength(result,1))
				{
					bootbox.alert("Please enter a Service Fee");
					return false;
				}
				var c = isNaN(result);
				if(c === true || result < 0)
				{
					bootbox.alert("Please enter a valid service fee(positive number)");
					return false;
				}
				$.ajax({
					type: 'POST',
				     url: ajaxUrl + "create_price.php", // same domain
				     data: {'p1' : result},
				     beforeSend: function() 
				     {
				     	bootbox.alert("Adding new Service Price: " + result);
				     },
				     success: function(res) 
				     {
				      	bootbox.alert(res);
				     }
				   	});
			}
			});
	});
	$('#Search').keyup(function(e)
	{
		 if(e.keyCode == 13)
    	{
        	$(this).trigger("enterKey");
    	}
	});

	$('#service_new_price').keypress(function(e){
		var v  = $(this).val();
		if(!isNumberKey(v))
		{
			e.preventDefault();
		}
	});

	$('#service_duration').keypress(function(e){
		var v  = $(this).val();
		if(!isNumberKey(v))
		{
			e.preventDefault();
		}
	});
	$('#service_category').on('change',function()
	{
		
	});
	$('#service_add_btn').click(function(){
		var n = $('#service_name').val();
		var c = $('#service_category option:selected').text();
		var d = $('#desc').val();
		var p = $('#service_price').val();
		var dur = $('#service_duration').val();

		if(!checkLength( n,1))
		{
			bootbox.alert('Please input Service Name');
			return false;
		}
		if(c === '-1')
		{
			
				bootbox.alert('Please select service category');
				return false;
			
		}
		if(p === '-1')
		{
			
				bootbox.alert('Please select a service fee');
				return false;
			
		}
		if(!checkLength( d,1))
		{
			bootbox.alert('Please input Description');
			return false;
		}
		if(!checkLength( p,1))
		{
			bootbox.alert('Please select a price');
			return false;
		}
		if(!checkLength( dur,1))
		{
			bootbox.alert('Please input the Duration');
			return false;
		}
		$.ajax({
					type: 'POST',
				     url: ajaxUrl + "create_service.php", // same domain
				     data: {'p1' : n, 'p2' : c ,'p3' :d , 'p4' : p ,'p5' :dur},
				     beforeSend: function() 
				     {
				     	bootbox.alert("Adding new Service ");
				     },
				     success: function(res) 
				     {
				      	bootbox.alert(res);
				     }
				   	});
		
		});
	
});
