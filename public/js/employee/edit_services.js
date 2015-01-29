$(document).ready(function(){

	$('#save').click(function()
	{
		var sid = $('#admin_edit_id').val();
		var servicepriceid = $('#admin_edit_price').val();
		var servicename = $('#admin_edit_name').val();
		var servicecategory = $('#admin_edit_category').val();
		var duration = $('#admin_edit_duration').val();

		if(!checkLength(servicename,1))
		{
			bootbox.alert('Please enter service name');
			return false;
		}
		if(!checkLength(duration,1))
		{
			bootbox.alert('Please enter duration');
			return false;
		}
		var c = isNaN(duration);
		if(c)
		{
			bootbox.alert('Please enter a valid duration. Should be in minutes');
			return false;
		}
		if(duration <= 0)
		{
			bootbox.alert('Please enter a valid duration. Should be a positive number.');
			return false;
		}

			$.ajax({
			url: ajaxUrl + "edit_services.php"	,
            type: "POST",
            data:
                {
                	'p1': sid,
                	'p2': servicepriceid,
                	'p3': servicename,
                	'p4': servicecategory,
                	'p5': duration,
            	},
            	beforeSend:function(){
            		bootbox.alert("saving..");
            	},
            success:function(res){
            	bootbox.alert(res);
             }
             });
	});
});