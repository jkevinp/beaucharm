$(document).ready(function()
{

	var userid = '-1';	

	$.post( ajaxUrl + "getUserId.php")
	.done(function(data)
	{
		if(data === '-1')
		{
				var temp = $('#ace_bakla').val();
				if(temp !== undefined)
					{
						userid = temp;
						//alert(userid);
					}
				}else  userid= data;

	})
	.fail(function(){
		bootbox.alert("Something went wrong fetching user id");userid =  '-1';});

	
	var selectedEmployeeId = '-1';
	var selectedEmployeeName = '';
	var selectedServiceName = '';
	var selectedAppointmentDate = '';
	var selectedServiceId = '-1';
	var selectedServiceCategory = '';
	var selectedAppointmentID = '-1';
	var lbl_serviceName = $('#myaccount_lbl_serviceName');
    var lbl_employeeName = $('#myaccount_lbl_employeeName');
    var lbl_appointmentDate = $('#myaccount_lbl_appointmentDate');
    var serviceArray = null;
    var serviceSelected = null;



    $('#myaccount_select_category').on('change',function(e){
		$('#myaccount_select_servicename').empty();
		$('#myaccount_select_servicename').attr('disabled','true');
		$('#myaccount_select_servicename').append($('<option>', {value: 'LOADING',text:  'LOADING'}));
		var optionSelected = $("option:selected", this);
		selectedServiceCategory = $(this).val();
		populateEmployee(selectedServiceCategory);
		var valueSelected = $(this).val();
		$.post( ajaxUrl + "services.php", { 'catname': valueSelected}).done(function(data) 
	 	{
	 		$('#myaccount_select_servicename').removeAttr('disabled');
	 			$('#myaccount_select_servicename').empty();
	 			$('#myaccount_select_servicename').append($('<option>', {value: 'Select Service',text:  'Select Service'}));
	 			var obj = jQuery.parseJSON(data);
	 			serviceArray = new Array(obj.length);
	 			for(var x= 0; x < obj.length; x++)
	 			{
	 				var serviceTemp = new Service(obj[x][0],obj[x][1],obj[x][2],obj[x][3],obj[x][4],obj[x][5]);
	 				serviceArray[x] = serviceTemp;
	 				$('#myaccount_select_servicename').append($('<option>', {value: obj[x][0],text: obj[x][2]}));
	 			}
	  		});
	});


   $('#date').on('change',function(e){
   		selectedAppointmentDate = $(this).val();
   });
	
	$('#myaccount_btn_findEmployees').click(function()
	{
		if(selectedEmployeeId === '-1')
		{
			bootbox.alert('Please Select an Employee to serve you');
		}
		else
		{ 
			var tbody = $('#myaccount_tbody_employeeList');
			$.post( ajaxUrl + "get_appointmentList.php", { 
				'empid': selectedEmployeeId,
				'date' : selectedAppointmentDate,
				'catname' : selectedServiceCategory,
				'CustomerID': userid,
				'selectedServiceId' : selectedServiceId,
			}).done(function(data) 
	 		{
	 			tbody.empty();
	 			if(data === 'You Already booked this service.')
	 			{
	 				bootbox.alert(data);
	 				return false;
	 			}
	 			var obj = jQuery.parseJSON(data);

	 			for(var x= 0; x < obj.length; x++)
	 			{	
	 				var c = isNaN(obj[x][3]); //connected to get_appointmentlist
	 				if(!c)
	 				{
		 				tbody.append('<tr><td>' +obj[x][4] +'</td><td>' +obj[x][5] +'</td><td id="fvck">'+obj[x][0]+'</td><td><button type="button" data-toggle="collapse" data-parent="#accordion" href="#myaccount_collapseThree" class="btn btn-default" id="myaccount_btn_employeeSelect" value="'+ obj[x][3]+'">Select</button></td></tr>');
		 				$(document).on('click', '#myaccount_btn_employeeSelect', function() 
		 				{
	     					//Functions when user selects and employee
	     					if(selectedServiceName === '')
	     					{
	     						bootbox.alert('Please Select a Service Name');
	     					}
	     					else 
	     					{
	     						if(selectedEmployeeName === '')
	     						{
	     							bootbox.alert('Please Select an employee to serve you');
	     						}
	     						else
	     						{
	     							selectedAppointmentID = $(this).val();
	     							lbl_serviceName.empty().append(selectedServiceName);
	     							lbl_employeeName.empty().append(selectedEmployeeName);
	     							lbl_appointmentDate.empty().append(selectedAppointmentDate);
	     						}
	     					}
						});
	 				}
	 			}
	  		});
	 	}
	});

	$('#myaccount_select_servicename').on('click',function(e)
	{
		var optionSelected = $("option:selected", this);
		var s = optionSelected[0].text;
		$('#myaccount_txt_currentService').empty().append("<a target='_blank' href=" + url + "service?name=" + $(this).val() + ">" + s + "</a>");
		selectedServiceName = s;
	    selectedServiceId = optionSelected.val();
	   	for(var x =0; x < serviceArray.length; x++)
	   	{
	   		if(serviceArray[x].sid === selectedServiceId)
	   		{
	   			serviceSelected = serviceArray[x];
	   			break;
	   		}
	   	}
	});
	$('#myaccount_select_employee').on('change',function(e)
	{
		var c = $(this).val();
		$.post( ajaxUrl + "getAppointments.php", { 'empid': c}
			  ).done(function(data) {
				var obj = jQuery.parseJSON(data);
	 			for(var x= 0; x < obj.length; x++)
	 			{
	 				selectedEmployeeId = obj[x][0];
	 				selectedEmployeeName = obj[x][4];
	 			}
	 			var btn_find_employees = $('#myaccount_btn_findEmployees');
				btn_find_employees.empty().append("Find Appointments for "+ selectedEmployeeName);
				btn_find_employees.removeAttr('disabled');
			  });
	});
	
	$('#myaccount_checkbox_terms').on('change',function(){
		if($(this).prop('checked'))
		{
			$('#myaccount_btn_bookIt').removeAttr('disabled');
		}
		else
		{
			$('#myaccount_btn_bookIt').attr('disabled','true');
		}
	});

	$('#myaccount_btn_bookIt').click(function(){
		bootbox.alert('saving Please wait..');

		if(userid === '-1')bootbox.alert('Error Fetching user Id');
		else
		{
			alert(userid);
			$.post( ajaxUrl + "setAppointments.php", { 
				'cid' : userid, 
				'sid' : selectedServiceId , 
				'spid': serviceSelected.spid ,
				'eid' : selectedEmployeeId , 
				'apd' : selectedAppointmentDate,
				'apid' : selectedAppointmentID
			})
			.done(function(data) 
				  {
				  	
				  	var result = !isNaN(data);
					if(result)
					{
						bootbox.alert('Save Complete!');
						document.location = url + "checkout?cid=" + base64_encode(userid) + "&bid=" + base64_encode(data);	
		 			
					}
					else 
					{
						bootbox.alert('Error saving -' + data);
					}
		 			//for(var x= 0; x < obj.length; x++)
		 			//{
		 				//}

		 			var btn_find_employees = $('#myaccount_btn_findEmployees');
					btn_find_employees.empty().append("Find Appointments for "+ selectedEmployeeName);
				  }).fail(function() {bootbox.alert( "Error Occured." );});
		}
	});

	
});

function populateEmployee(v)
{
	$('#myaccount_select_employee').empty();
	$('#myaccount_select_employee').attr('disabled','true');
	$('#myaccount_select_employee').append($('<option>', {value: 'LOADING',text:  'LOADING'}));
	$.post( ajaxUrl + "getEmployees.php", { 'catname': v}).done(function(data) 
	 {

	 	$('#myaccount_select_employee').removeAttr('disabled');
	 			$('#myaccount_select_employee').empty();
	 			$('#myaccount_select_employee').append($('<option>', {value: 'Select Employee',text:  'Select Employee'}));
	 			if(data === "[]")
	 			{
	 				bootbox.alert("No Available Employee was found.");
	 			}
	 			var obj = jQuery.parseJSON(data);
	 			serviceArray = new Array(obj.length);
	 			for(var x= 0; x < obj.length; x++)
	 			{

	 				$('#myaccount_select_employee').append($('<option>', {value: obj[x][0],text: obj[x][1] + " " + obj[x][2]}));
	 			}
	  		});
}
function base64_encode(data) {
  //  discuss at: http://phpjs.org/functions/base64_encode/
  // original by: Tyler Akins (http://rumkin.com)
  // improved by: Bayron Guevara
  // improved by: Thunder.m
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // improved by: Rafał Kukawski (http://kukawski.pl)
  // bugfixed by: Pellentesque Malesuada
  //   example 1: base64_encode('Kevin van Zonneveld');
  //   returns 1: 'S2V2aW4gdmFuIFpvbm5ldmVsZA=='
  //   example 2: base64_encode('a');
  //   returns 2: 'YQ=='

  var b64 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';
  var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
    ac = 0,
    enc = '',
    tmp_arr = [];

  if (!data) {
    return data;
  }

  do { // pack three octets into four hexets
    o1 = data.charCodeAt(i++);
    o2 = data.charCodeAt(i++);
    o3 = data.charCodeAt(i++);

    bits = o1 << 16 | o2 << 8 | o3;

    h1 = bits >> 18 & 0x3f;
    h2 = bits >> 12 & 0x3f;
    h3 = bits >> 6 & 0x3f;
    h4 = bits & 0x3f;

    // use hexets to index into b64, and append result to encoded string
    tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
  } while (i < data.length);

  enc = tmp_arr.join('');

  var r = data.length % 3;

  return (r ? enc.slice(0, r - 3) : enc) + '==='.slice(r || 3);
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
function Person()
{
	var serviceName ="";


}

function Service(id,servicePriceid,servicename,cat,duration) 
{
	this.sname =servicename;
	this.sid=id;
	this.spid=servicePriceid;
	this.cat=cat;
	this.duration=duration;
}
//$('#myaccount_btn_addnewservice').click(function(){$('#service_add').append('<select id=myaccount_select_category><option value="category" >Service Category</option></select><select id=myaccount_select_servicename><option value=service_name>Service name</option></select></div>');});
function getSelectedText(elementId) {
    var elt = document.getElementById(elementId);

    if (elt.selectedIndex == -1)
        return null;

    return elt.options[elt.selectedIndex].text;
}