function validateEmail(email) 
{ 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 
function validatePassword1(password)
{
	var re = /[a-z]/;
	var validated = false;
	if(re.test(password))validated = true;
      return validated;
}
function validatePassword2(password)
{
	var re = /[A-Z]/;
	var validated = false;
	if(re.test(password))validated = true;
      return validated;
}
function validatePassword3(password)
{
	var re = /[0-9]/;
	var validated = false;
	if(re.test(password))validated = true;
    return validated;
}
function checkLength(str, len)
{
	if(str.length < len)return false;
	return true;
}
function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode != 43 && charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}