$(document).ready(function()
{
	var messageArray =[];
	var customerID = -1;
	$.post( ajaxUrl + "getUserId.php")
  	.done(function( data )
  	{
    	customerID = data;
    }).fail(function(){
  		bootbox.alert("Something went wrong fetching user id");
  	});

  
//$('select').on('change', function (e) {
    //var optionSelected = $("option:selected", this);
    //var valueSelected = this.value;
  //  ....
//});

//search 

$('#header_send_help').click(function()
{
	var title = $('#header_send_title').val();
	var content = $('#header_send_content').val();	
	if(!checkLength(title,5))
	{
		bootbox.alert('Title too short.');
		return false;
	}
	if(!checkLength(content,10))
	{
		bootbox.alert('Message Content too short.');
		return false;
	}
	if(customerID === -1)
	{
		bootbox.alert('Something went wrong fetching customerID');
		return false;
	}
	$.ajax({
			url: ajaxUrl + "send_message.php",
            type: "POST",
            data:
                {
                	'p1': title,
                	'p2':content,
                	'p3':customerID,
            	},
            success:function(res)
            {
            	bootbox.alert(res);
    		}
    	});
});
$('#myaccount_btn_getMessages').click(function(){
	if(customerID === -1)
	{
		bootbox.alert('Something Went Wrong fetching customer information');
		return false;
	}
	var tbody=  $('#lheader_tbody_message');
	$.ajax({
			url: ajaxUrl + "get_messages.php",
            type: "POST",
            data:
                {
                	'p1': customerID,
            	},
            success:function(res){
            	if(res === "Empty")
            	{
            		bootbox.alert("No new messages");
            	}
            	else
            	{
            		var obj = jQuery.parseJSON(res);
            		tbody.empty();
            		messageArray = new Array(obj.length);
		 			for(var x= 0; x < obj.length; x++)
		 			{
		 				tbody.append('<tr>');
		 				tbody.append('<td> Admin </td>');
		 				
		 				var btn =$('<input />', 
		 				{
					              type  : 'button',
					              value : obj[x][1],
					              id    : 'btn_a',
					              name : obj[x][2],
					              on    : {
					                 click: function() 
					                 {
					                 	bootbox.alert(this.name);
					                 }
					              }
					          });
		 				btn.addClass('btn btn-default');
		 				btn.css('width','100%');
		 				tbody.append('<td>');
		 				tbody.append(btn);
		 				tbody.append('</td>');
		 				tbody.append('</tr>');
		 			}
            	}
             }
    });
});


$('#myaccount_btn_getMessages').click(function(){
	if(customerID === -1)
	{
		bootbox.alert('Something Went Wrong fetching customer information');
		return false;
	}
	var tbody=  $('#lheader_tbody_sent_message');
	$.ajax({
			url: ajaxUrl + "get_sent_messages.php",
            type: "POST",
            data:
                {
                	'p1': customerID,
            	},
            success:function(res)
            {
            	if(res === "Empty")
            	{
            		bootbox.alert("No new messages");
            	}
            	else
            	{
            		var obj = jQuery.parseJSON(res);
            		tbody.empty();
            		messageArray = new Array(obj.length);
		 			for(var x= 0; x < obj.length; x++)
		 			{
		 				tbody.append('<tr>');
		 				tbody.append('<td> Me </td>');
		 				
		 				var btn =$('<input />', 
		 				{
					              type  : 'button',
					              value : obj[x][1],
					              id    : 'btn_a',
					              name : obj[x][2],
					              on    : {
					                 click: function() 
					                 {
					                 	bootbox.alert(this.name);
					                 }
					              }
					          });
		 				btn.addClass('btn btn-default');
		 				btn.css('width','100%');
		 				tbody.append('<td>');
		 				tbody.append(btn);
		 				tbody.append('</td>');
		 				tbody.append('</tr>');
		 			}
            	}
             }
    });
});


$("#lheader_livesearch").keyup(function(event){
    if(event.keyCode == 13){
        document.location = surl+ "search?q=" + $(this).val();
    }
});
	$('#myaccount_btn_getInfo').click(function(){
		var canupdate = true;
		var eemail  = $('#myaccount_txt_email');
		var elastname = $('#myaccount_txt_lastname');
		var efirstname = $('#myaccount_txt_firstname');
		var ehomeaddress = $('#myaccount_txt_homeaddress');
		var ebusinessaddress = $('#myaccount_txt_businessaddress');
		var econtactnumber = $('#myaccount_txt_contactnumber');
		var econtactnumber1 = $('#myaccount_txt_bcontactnumber');
		var eoccupation = $('#myaccount_txt_occupation');
		var ecivilstatus = $('#myaccount_select_civilstatus');
		var egender = $('#myaccount_select_gender');
		var ebirthdate = $('#myaccount_txt_birthday');

	var id = -1;	
	$.post( ajaxUrl + "getUserId.php")
  	.done(function( data ) {
    	id = data;
	    if(id > 0)
	  	{
			$.post( ajaxUrl + "update_profile.php", { 'userid': id, 'mode' : 'fetch' })
	 		.done(function(data) {
	 			var obj = jQuery.parseJSON(data);
	 			eemail.val(obj[1]);
	 			elastname.val(obj[3]);
	 			efirstname.val(obj[4]);
	 			ebirthdate.val(obj[5]);
	 			egender.val(obj[6]);
	 			ehomeaddress.val(obj[7]);
	 			ebusinessaddress.val(obj[8]);
	 			econtactnumber.val(obj[9]);
	 			econtactnumber1.val(obj[10]);
	 			eoccupation.val(obj[11]);
	 			ecivilstatus.val(obj[12]);
	  		});
	  	}
   	}).fail(function(){
  		bootbox.alert("Something went wrong fetching user id");
  	});

  

  	//	$.post( xurl + "getUserId.php", { 'userid': id })
 // 	.done(function( data ) {
   // bootbox.alert( "Data Loaded: " + data );
  	//});



	});

	$("#myaccount_btn_save").click(function()
	{
		var canregister= true;
		var email  = $('#myaccount_txt_email').val();
		var password = $('#myaccount_txt_password').val();
		var lastname = $('#myaccount_txt_lastname').val();
		var firstname = $('#myaccount_txt_firstname').val();
		var homeaddress = $('#myaccount_txt_homeaddress').val();
		var businessaddress = $('#myaccount_txt_businessaddress').val();
		var contactnumber = $('#myaccount_txt_contactnumber').val();
		var occupation = $('#myaccount_txt_occupation').val();
		var civilstatus = $('#myaccount_select_civilstatus').val();
		var gender = $('#myaccount_select_gender').val();
		var birthdate = $('#myaccount_txt_birthday').val();

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
			console.log(canregister);
			var s = ajaxUrl+"update_profile.php";
			console.log(s);
			$.ajax({
			url: s,
            type: "POST",
            data:
                {'email': email,
            	 'password' : password,
            	 'lastname' : lastname,
            	 'firstname' : firstname,
            	 'homeaddress':homeaddress,
            	 'businessaddress' : businessaddress,
            	 'contactnumber' :contactnumber,
            	 'occupation': occupation,
            	 'civilstatus' : civilstatus,
            	 'gender' :gender,
            	 'birthdate' : birthdate,

            	},
            success:function(res){
            	bootbox.alert(res);
             }
          	});
		
		}
	});

	$('#myaccount_txt_contactnumber').keypress(function(e){
		var v  = $(this).val();
		if(!isNumberKey(v))
		{
			e.preventDefault();
		}
		
	});
	$('#myaccount_select_civilstatus').click(function(){
		civilstatus = $(this).val();
	});
	$('#myaccount_select_gender').click(function(){
		gender = $(this).val();
	});
	$('#myaccount_checkbox_agree').click(function(){
		var agree = $('#myaccount_checkbox_agree').prop('checked');
		if(!agree)
		{
			$('#myaccount_btn_save').prop('disabled', 'true');
		}else
		{
			$('#myaccount_btn_save').removeAttr("disabled");
		}
	});




//LOGIN
	
	
	$('#myaccount_login_btn_login').click(function(){
		var canlogin = true;
		var loginpw = $('#myaccount_login_txt_password').val();
		var loginemail = $('#myaccount_login_txt_email').val();
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
            	if(res === "1")
            	{
            		document.location.href = surl + "myaccount";
            	}else bootbox.alert(res);
             }
          	});
		}

	});

});

function showMessage(x)
{
	bootbox.alert(messageArray[x]);
}
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