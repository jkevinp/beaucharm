$(document).ready(function(){

	$('#save').click(function()
	{
		var id = $('#admin_edit_id').val();
		var username = $('#admin_edit_username').val();
		var lastname = $('#admin_edit_lastname').val();
		var firstname = $('#admin_edit_firstname').val();
		var birthdate = $('#admin_edit_birthdate').val();
		var gender = $('#admin_edit_gender').val();
		var address= $('#admin_edit_address').val();
		var contact= $('#admin_edit_contact').val();
		var civil  = $('#admin_edit_civil').val();

		if(!checkLength(lastname,1))
		{
			bootbox.alert('Please enter a valid lastname');
			return false;
		}
		if(!checkLength(firstname,1))
		{
			bootbox.alert('Please enter a valid firstname');
			return false;
		}
		if(!checkLength(birthdate,1))
		{
			bootbox.alert('Please enter a valid birthdate');
			return false;
		}
		if(!checkLength(contact,1))
		{
			bootbox.alert('Please enter a valid contact');
			return false;
		}
		if(!checkLength(address,1))
		{
			bootbox.alert('Please enter a valid address');
			return false;
		}
		if(!checkLength(username,1))
		{
			bootbox.alert('Please enter a valid username');
			return false;
		}

			var s = ajaxUrl+"update_employee.php";
			console.log(s);
			$.ajax({
			url: s,
            type: "POST",
            data:
                {
                	'p1': id,
                	'p2': username,
                	'p3': lastname,
                	'p4': firstname,
                	'p5': birthdate,
                	'p6': gender,
                	'p7': address,
                	'p8': contact,
                	'p9':civil,
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