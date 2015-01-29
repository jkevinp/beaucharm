$(document).ready(function()
{

	$('#header_services').click(function(){
		var body = $("html,body");
		body.animate({scrollTop:'1200px'},'1000','swing',function(){	
		});
		
	});
	$('#header_aboutus').click(function(){
		var body = $("html,body");
		body.animate({scrollTop:'550px'},'1000','swing',function(){
		});
		
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
		var businessaddress = $('#header_txt_businessaddress').val();
		var contactnumber = $('#header_txt_contactnumber').val();
		var contactnumber1 = $('#header_txt_bcontactnumber').val();
		var occupation = $('#header_txt_occupation').val();
		var civilstatus = $('#header_select_civilstatus').val();
		var gender = $('#header_select_gender').val();
		var birthdate = $('#header_txt_birthday').val();

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
		if(!checkLength(businessaddress,1))
		{
			bootbox.alert('Please enter your business address.');
			canregister = false;
			return false;
		}
		if(!checkLength(contactnumber,1))
		{
			bootbox.alert('Please enter your contact number');
			canregister = false;
			return false;
		}
		if(!checkLength(contactnumber1,1))
		{
			bootbox.alert('Please enter your business contact number');
			canregister = false;
			return false;
		}
		if(!checkLength(birthdate,1))
		{
			bootbox.alert('Please enter your birthdate');
			canregister = false;
			return false;
		}
		if(!checkLength(occupation,1))
		{
			bootbox.alert('Please enter your occupation');
			canregister = false;
			return false;
		}

		if(canregister)
		{
			bootbox.alert('Loading.. Please Wait');
			console.log(canregister);
			$('#index_btn_register').prop('disabled','true');
			$.ajax({
			url: ajaxUrl+"register.php",
            type: "POST",
            data:
                {
                'email': email,
            	 'password' : password,
            	 'lastname' : lastname,
            	 'firstname' : firstname,
            	 'homeaddress':homeaddress,
            	 'businessaddress' : businessaddress,
            	 'contactnumber' :contactnumber,
            	 'businesscontact' :contactnumber1,
            	 'occupation': occupation,
            	 'civilstatus' : civilstatus,
            	 'gender' :gender,
            	 'birthdate' : birthdate,
            	},
            success:function(res){
            	bootbox.alert(res);
            	$('#index_btn_register').removeAttr('disabled');
             }
          	});
		
		}
	});

	$('#header_txt_contactnumber').keypress(function(e){
		var v  = $(this).val();
		if(!isNumberKey(v))
		{
			e.preventDefault();
		}
		
	});
	$('#header_select_civilstatus').click(function(){
		civilstatus = $(this).val();
	});
	$('#header_select_gender').click(function(){
		gender = $(this).val();
	});
	$('#header_checkbox_agree').click(function(){
		var agree = $('#header_checkbox_agree').prop('checked');
		if(!agree)
		{
			$('#index_btn_register').prop('disabled', 'true');
		}else
		{
			$('#index_btn_register').removeAttr("disabled");
		}
	});




//LOGIN
	
	
	$('#header_login_btn_login').click(function(){

		var canlogin = true;
		var loginpw = $('#header_login_txt_password').val();
		var loginemail = $('#header_login_txt_email').val();
		if(!checkLength(loginpw,8))
		{
			bootbox.alert('Password length is too short.');
			canlogin= false;
			return false;
		}
		if(!validateEmail(loginemail))
		{
				canlogin = false;
				bootbox.alert('Please input a valid email address.');
				return false;
		}
		if(canlogin)
		{
			console.log(canlogin);
			bootbox.alert('Loading.. Please Wait');
			$('#header_login_btn_login').prop('disabled','true');
			var l = ajaxUrl+"login.php";
			console.log(l);
			$.ajax({
			url: l,
            type: "POST",
            data:
                {'email': loginemail,
            	 'password' : loginpw,
            	},
            success:function(res){
            	$('#header_login_btn_login').removeAttr('disabled');
            	if(res === "1")
            	{
            		document.location.href = url + "myaccount";
            	}else bootbox.alert(res);
             }
          	});
		}

	});

});

function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 
function validatePassword1(password)
{
	var re = /[a-z]/;
	var validated = false;
	if(re.test(password))validated = true;
   
      //  $('div').text(validated ? "pass" : "fail");
      return validated;
}
function validatePassword2(password)
{
	var re = /[A-Z]/;
	var validated = false;
	if(re.test(password))validated = true;
   
      //  $('div').text(validated ? "pass" : "fail");
      return validated;
}
function validatePassword3(password)
{
	var re = /[0-9]/;
	var validated = false;
	if(re.test(password))validated = true;
   
      //  $('div').text(validated ? "pass" : "fail");
      return validated;
}
function checkLength(str, len)
{
	if(str.length < len)
		return false;
	return true;
}
	//^
				//(?=.*\d)                //should contain at least one digit
				//(?=.*[a-z])             //should contain at least one lower case
				//(?=.*[A-Z])             //should contain at least one upper case
				//[a-zA-Z0-9]{8,}         //should contain at least 8 from the mentioned characters
				//$/).

function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode != 43 && charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
