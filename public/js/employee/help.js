$(document).ready(function()
{
	var count = $('#help_count').val();
	var cid = -1;
	for(var x = 0; x < count ; x++)
	{
		$('#txtmessage_'+ x).click(function()
		{
			bootbox.alert(this.name);
		});
		$('#m_'+x).click(function(){
			 cid = this.name;
		});
	}

	$('#Search').bind("enterKey",function(e){
   		var value = $('#Search').val();
   		document.location = cpanel +"help/search=" + value + "@page=0";
	});
	$('#Search').keyup(function(e)
	{
		 if(e.keyCode == 13)
    	{
        	$(this).trigger("enterKey");
    	}
	});

	$('#help_send_help').click(function()
	{
	var title = $('#help_send_title').val();
	var content = $('#help_send_content').val();	
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
	if(cid === -1)
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
                	'p3':'0',
                	'p4': cid,
            	},
            success:function(res)
            {
            	bootbox.alert(res);
    		}
    	});
});
});