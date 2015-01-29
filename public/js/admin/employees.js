$(document).ready(function(){
	$('#Search').bind("enterKey",function(e){
   		var value = $('#Search').val();
   		document.location = cpanel +"employees/search=" + value + "@page=0";
	});
	$('#Search').keyup(function(e)
	{
		 if(e.keyCode == 13)
    	{
        	$(this).trigger("enterKey");
    	}
	});


	$("#index_btn_register").click(function()
		{
		var canregister= true;
		var email  = $('#header_txt_email').val();
		var password = $('#header_txt_password').val();
		var password1 = $('#header_txt_password1').val();
		var lastname = $('#header_txt_lastname').val();
		var firstname = $('#header_txt_firstname').val();
		var homeaddress = $('#header_txt_homeaddress').val();
		var contactnumber = $('#header_txt_contactnumber').val();
		var civilstatus = $('#header_select_civilstatus').val();
		var gender = $('#header_select_gender').val();
		var birthdate = $('#header_txt_birthday').val();
		var service_category = $('#service_category').val();
		var service_skill = $('#service_category option:selected').text();
		if(service_category === '-1' || service_category === -1)
		{
			bootbox.alert('Please Select An employee Skill');
			return false;
		}

		if(email.length < 10)
		{
			canregister = false;
			bootbox.alert('Email Address too short.');return false;
		}
		else
		{
			if(!validateEmail(email))
			{
				canregister = false;
				bootbox.alert('Please input a valid email address.');return false;
			}
		}
		if(password.length < 8)
		{
			canregister = false;
			bootbox.alert('Password length is too short.');
			return false;			
		}
		else
		{
			//bootbox.alert(validatePassword1(password) ? "pass" : "fail");
			if(!validatePassword1(password))
				{
					bootbox.alert('Password String must contain at least one lowercase character');
					canregister = false;return false;
				}
			else if(!validatePassword2(password))
			{ bootbox.alert('Password String must contain at least one uppercase character');
				canregister = false;return false;
			}
			else if(!validatePassword3(password))
			{ 
				bootbox.alert('Password String must contain at least one numerical character');
				canregister= false;return false;
				
			}
			else if(password !== password1)
			{
				bootbox.alert('Password doesnt match');
				return false;
			}
		}
		if(!checkLength(lastname,1))
		{
			bootbox.alert('Please input your lastname.');
			canregister = false;
			return false;
		}
		if(!checkLength(firstname,1))
		{
			bootbox.alert('Please input your firstname');
			canregister = false;
			return false;
		}
		if(!checkLength(homeaddress,1))
		{
			bootbox.alert('Please enter your home address.');
			canregister = false;
			return false;
		}
		
		if(!checkLength(contactnumber,1))
		{
			bootbox.alert('Please enter your contact number');
			canregister = false;
			return false;
		}
		
		if(!checkLength(birthdate,1))
		{
			bootbox.alert('Please enter your birthdate');
			canregister = false;
			return false;
		}
		

		if(canregister)
		{
			console.log(canregister);
			var s = ajaxUrl+"register_employee.php";
			console.log(s);
			$.ajax({
			url: s,
            type: "POST",
            data:
                {
                'email': email,
            	 'password' : password,
            	 'lastname' : lastname,
            	 'firstname' : firstname,
            	 'homeaddress':homeaddress,
            	 'contactnumber' :contactnumber,
            	 'civilstatus' : civilstatus,
            	 'gender' :gender,
            	 'birthdate' : birthdate,
            	 'serviceskill' : service_skill

            	},
            success:function(res){
            	bootbox.alert(res);
             }
          	});
		
		}
	});
});