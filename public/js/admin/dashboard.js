$(document).ready(function(){

ctx = $("#chart_pie_mostAvailed").get(0).getContext("2d");
var count1= $('#chart_1_data').val();

var strData = "";
var data = [];

for (var ctr =1; ctr <= count1; ctr++)
{

	 data.push({
	 	value :parseInt($('#chart_1_data_value_' + ctr).val())	,
	 	color : "#3AA" + ctr +"F"+ctr,
	 	highlight: "#AAA" +ctr + "F" + ctr,
	 	label : $('#chart_1_data_label_' + ctr).val()
	 });
}
var myNewChart = new Chart(ctx).Doughnut(data);



ctx1 = $("#chart_pie_leastAvailed").get(0).getContext("2d");
var count2 = $('#chart_1_data_least').val();
var strData = "";
var data1 = [];
for (var ctr =1; ctr <= count2; ctr++)
{

	 data1.push({
	 	value :parseInt($('#chart_2_data_value_' + ctr).val())	,
	 	color : "#CCC" + ctr +"A"+ctr,
	 	highlight: "#BBB" +ctr + "0" + ctr,
	 	label : $('#chart_2_data_label_' + ctr).val()
	 });
}
var myNewChart1 = new Chart(ctx1).Doughnut(data1);






	var labelDates =[];
	var list = [];
	bootbox.alert("Bar Graph Report Initializing..");
	$.ajax({
			url: ajaxUrl+"admin_dashboard.php",
            success:function(res)
            {
	            var obj = jQuery.parseJSON(res);
	            for (var x = 0; x < obj.length ; x++)
	            {
	            	list.push(obj[x][0]);
	            	switch(parseInt(obj[x][1]))
	            	{

	            		case 1:
	            			for (var c = 0; c < labelDates.length; c ++)
		            		{
		            			var hasResult = false;
		            			if(labelDates[c] === '"January"' && !hasResult)
		            			{
		            				hasResult = true;
		            				break;
		            			}
		            		}
		            		if(!hasResult)labelDates.push('"January"');
	            		break;
	            		case 2:
	            			for (var c = 0; c < labelDates.length; c ++)
		            		{
		            			var hasResult = false;
		            			if(labelDates[c] === '"February"' && !hasResult)
		            			{
		            				hasResult = true;
		            				break;
		            			}
		            		}
		            		if(!hasResult)labelDates.push('"February"');
	            		break;
	            		case 3:
	            			for (var c = 0; c < labelDates.length; c ++)
		            		{
		            			var hasResult = false;
		            			if(labelDates[c] === '"March"' && !hasResult)
		            			{
		            				hasResult = true;
		            				break;
		            			}
		            		}
		            		if(!hasResult)labelDates.push('"March"');
	            		break;
	            		case 4:
	            			for (var c = 0; c < labelDates.length; c ++)
		            		{
		            			var hasResult = false;
		            			if(labelDates[c] === '"April"' && !hasResult)
		            			{
		            				hasResult = true;
		            				break;
		            			}
		            		}
		            		if(!hasResult)labelDates.push('"April"');
	            		break;
	            		case 5:
	            			for (var c = 0; c < labelDates.length; c ++)
		            		{
		            			var hasResult = false;
		            			if(labelDates[c] === '"May"' && !hasResult)
		            			{
		            				hasResult = true;
		            				break;
		            			}
		            		}
		            		if(!hasResult)labelDates.push('"May"');
	            		break;
	            		case 6:
	            			for (var c = 0; c < labelDates.length; c ++)
		            		{
		            			var hasResult = false;
		            			if(labelDates[c] === '"June"' && !hasResult)
		            			{
		            				hasResult = true;
		            				break;
		            			}
		            		}
		            		if(!hasResult)labelDates.push('"June"');
	            		break;
	            		case 7:
	            			for (var c = 0; c < labelDates.length; c ++)
		            		{
		            			var hasResult = false;
		            			if(labelDates[c] === '"July"' && !hasResult)
		            			{
		            				hasResult = true;
		            				break;
		            			}
		            		}
		            		if(!hasResult)labelDates.push('"July"');
	            		break;
	            		case 8:
		            		for (var c = 0; c < labelDates.length; c ++)
		            		{
		            			var hasResult = false;
		            			if(labelDates[c] === '"August"' && !hasResult)
		            			{
		            				hasResult = true;
		            				break;
		            			}
		            		}
		            		if(!hasResult)labelDates.push('"August"');
	            		break;
	            		case 9:
		            		for (var c = 0; c < labelDates.length; c ++)
		            		{
		            			var hasResult = false;
		            			if(labelDates[c] === '"September"' && !hasResult)
		            			{
		            				hasResult = true;
		            				break;
		            			}
		            		}
		            		if(!hasResult)labelDates.push('"September"');


	            		break;
	            		case 10:
	            			for (var c = 0; c < labelDates.length; c ++)
		            		{
		            			var hasResult = false;
		            			if(labelDates[c] === '"October"' && !hasResult)
		            			{
		            				hasResult = true;
		            				break;
		            			}
		            		}
		            		if(!hasResult)labelDates.push('"October"');
	            		break;
	            		case 11:
	            			for (var c = 0; c < labelDates.length; c ++)
		            		{
		            			var hasResult = false;
		            			if(labelDates[c] === '"November"' && !hasResult)
		            			{
		            				hasResult = true;
		            				break;
		            			}
		            		}
		            		if(!hasResult)labelDates.push('"November"');
	            		break;
	            		case 12:
	            			for (var c = 0; c < labelDates.length; c ++)
		            		{
		            			var hasResult = false;
		            			if(labelDates[c] === '"December"' && !hasResult)
		            			{
		            				hasResult = true;
		            				break;
		            			}
		            		}
		            		if(!hasResult)labelDates.push('"December"');
	            		break;
	            	}
	            
	            } //end for
	            
	            //contenxt
	            
	            bar_ctx = $("#chart_bar").get(0).getContext("2d");
				var data3 = {
				    labels: labelDates,
				    datasets: [
						        {
						            label: "Availed",
						            fillColor: "rgba(220,220,220,0.5)",
						            strokeColor: "rgba(220,220,220,0.8)",
						            highlightFill: "rgba(220,220,220,0.75)",
						            highlightStroke: "rgba(220,220,220,1)",
						            data: list
						        }
				    		]
							};
					var myBarChart = new Chart(bar_ctx).Bar(data3,  {scaleBeginAtZero : true,
					    scaleShowGridLines : true,
					    scaleGridLineColor : "rgba(0,0,0,.05)",
					    scaleGridLineWidth : 1,
					    barShowStroke : true,
					    barStrokeWidth : 2,
					    barValueSpacing : 5,
					    barDatasetSpacing : 1,
					    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
					});

            }
    });

					var labelDates1 = [];
					var list1 = [];
					$.ajax({
					url: ajaxUrl+"admin_dashboard1.php",
		            success:function(res1)
		            {
			            var obj = jQuery.parseJSON(res1);
			            
			            for (var x = 0; x < obj.length ; x++)
			            {
			            	list1.push(obj[x][0]);
			            	switch(parseInt(obj[x][1]))
			            	{

			            		case 1:
			            			for (var c = 0; c < labelDates1.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates1[c] === '"January"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates1.push('"January"');
			            		break;
			            		case 2:
			            			for (var c = 0; c < labelDates1.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates1[c] === '"February"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates1.push('"February"');
			            		break;
			            		case 3:
			            			for (var c = 0; c < labelDates1.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates1[c] === '"March"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates1.push('"March"');
			            		break;
			            		case 4:
			            			for (var c = 0; c < labelDates1.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates1[c] === '"April"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates1.push('"April"');
			            		break;
			            		case 5:
			            			for (var c = 0; c < labelDates1.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates1[c] === '"May"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates1.push('"May"');
			            		break;
			            		case 6:
			            			for (var c = 0; c < labelDates1.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates1[c] === '"June"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates1.push('"June"');
			            		break;
			            		case 7:
			            			for (var c = 0; c < labelDates1.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates1[c] === '"July"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates1.push('"July"');
			            		break;
			            		case 8:
				            		for (var c = 0; c < labelDates1.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates1[c] === '"August"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates1.push('"August"');
			            		break;
			            		case 9:
				            		for (var c = 0; c < labelDates1.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates1[c] === '"September"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates1.push('"September"');


			            		break;
			            		case 10:
			            			for (var c = 0; c < labelDates1.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates1[c] === '"October"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates1.push('"October"');
			            		break;
			            		case 11:
			            			for (var c = 0; c < labelDates1.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates1[c] === '"November"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates1.push('"November"');
			            		break;
			            		case 12:
			            			for (var c = 0; c < labelDates1.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates1[c] === '"December"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates1.push('"December"');
			            		break;
			            	}
			            
			            } //end for
			            
			            //contenxt
			            
			            bar_ctx1 = $("#chart_bar1").get(0).getContext("2d");
						var data4 = {
						    labels: labelDates1,
						    datasets: [
								        {
								            label: "Cancelled",
								            fillColor: "rgba(20,220,220,0.5)",
								            strokeColor: "rgba(20,220,220,0.8)",
								            highlightFill: "rgba(20,220,220,0.75)",
								            highlightStroke: "rgba(20,220,220,1)",
								            data: list1
								        }
						    		]
									};
							var myBarChart1 = new Chart(bar_ctx1).Bar(data4,  {scaleBeginAtZero : true,
							    scaleShowGridLines : true,
							    scaleGridLineColor : "rgba(0,0,0,.05)",
							    scaleGridLineWidth : 1,
							    barShowStroke : true,
							    barStrokeWidth : 2,
							    barValueSpacing : 5,
							    barDatasetSpacing : 1,
							    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
							});

		            }
    });




					var labelDates2 = [];
					var list2 = [];
					$.ajax({
					url: ajaxUrl+"admin_dashboard2.php",
		            success:function(res1)
		            {
			            var obj = jQuery.parseJSON(res1);
			            
			            for (var x = 0; x < obj.length ; x++)
			            {
			            	list2.push(obj[x][0]);
			            	switch(parseInt(obj[x][1]))
			            	{

			            		case 1:
			            			for (var c = 0; c < labelDates2.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates2[c] === '"January"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates2.push('"January"');
			            		break;
			            		case 2:
			            			for (var c = 0; c < labelDates2.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates2[c] === '"February"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates2.push('"February"');
			            		break;
			            		case 3:
			            			for (var c = 0; c < labelDates2.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates2[c] === '"March"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates2.push('"March"');
			            		break;
			            		case 4:
			            			for (var c = 0; c < labelDates2.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates2[c] === '"April"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates2.push('"April"');
			            		break;
			            		case 5:
			            			for (var c = 0; c < labelDates2.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates2[c] === '"May"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates2.push('"May"');
			            		break;
			            		case 6:
			            			for (var c = 0; c < labelDates2.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates2[c] === '"June"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates2.push('"June"');
			            		break;
			            		case 7:
			            			for (var c = 0; c < labelDates2.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates2[c] === '"July"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates2.push('"July"');
			            		break;
			            		case 8:
				            		for (var c = 0; c < labelDates2.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates2[c] === '"August"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates2.push('"August"');
			            		break;
			            		case 9:
				            		for (var c = 0; c < labelDates2.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates2[c] === '"September"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates2.push('"September"');


			            		break;
			            		case 10:
			            			for (var c = 0; c < labelDates2.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates2[c] === '"October"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates2.push('"October"');
			            		break;
			            		case 11:
			            			for (var c = 0; c < labelDates2.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates2[c] === '"November"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates2.push('"November"');
			            		break;
			            		case 12:
			            			for (var c = 0; c < labelDates2.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates2[c] === '"December"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates2.push('"December"');
			            		break;
			            	}
			            
			            } //end for
			            
			            //contenxt
			            
			            bar_ctx2 = $("#chart_bar2").get(0).getContext("2d");
						var data5 = {
						    labels: labelDates2,
						    datasets: [
								        {
								            label: "Reserved",
								            fillColor: "rgba(120,120,220,0.5)",
								            strokeColor: "rgba(120,120,220,0.8)",
								            highlightFill: "rgba(120,120,220,0.75)",
								            highlightStroke: "rgba(120,120,220,1)",
								            data: list2
								        }
						    		]
									};
							var myBarChart2 = new Chart(bar_ctx2).Bar(data5,  {scaleBeginAtZero : true,
							    scaleShowGridLines : true,
							    scaleGridLineColor : "rgba(0,0,0,.05)",
							    scaleGridLineWidth : 1,
							    barShowStroke : true,
							    barStrokeWidth : 2,
							    barValueSpacing : 5,
							    barDatasetSpacing : 1,
							    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
							});

		            }
    });



				var labelDates3 = [];
					var list3 = [];
					$.ajax({
					url: ajaxUrl+"admin_dashboard3.php",
		            success:function(res1)
		            {
			            var obj = jQuery.parseJSON(res1);
			            
			            for (var x = 0; x < obj.length ; x++)
			            {
			            	list3.push(obj[x][0]);
			            	switch(parseInt(obj[x][1]))
			            	{

			            		case 1:
			            			for (var c = 0; c < labelDates3.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates3[c] === '"January"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates3.push('"January"');
			            		break;
			            		case 2:
			            			for (var c = 0; c < labelDates3.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates3[c] === '"February"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates3.push('"February"');
			            		break;
			            		case 3:
			            			for (var c = 0; c < labelDates3.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates3[c] === '"March"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates3.push('"March"');
			            		break;
			            		case 4:
			            			for (var c = 0; c < labelDates3.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates3[c] === '"April"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates3.push('"April"');
			            		break;
			            		case 5:
			            			for (var c = 0; c < labelDates3.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates3[c] === '"May"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates3.push('"May"');
			            		break;
			            		case 6:
			            			for (var c = 0; c < labelDates3.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates3[c] === '"June"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates3.push('"June"');
			            		break;
			            		case 7:
			            			for (var c = 0; c < labelDates3.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates3[c] === '"July"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates3.push('"July"');
			            		break;
			            		case 8:
				            		for (var c = 0; c < labelDates3.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates3[c] === '"August"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates3.push('"August"');
			            		break;
			            		case 9:
				            		for (var c = 0; c < labelDates3.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates3[c] === '"September"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates3.push('"September"');


			            		break;
			            		case 10:
			            			for (var c = 0; c < labelDates3.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates3[c] === '"October"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates3.push('"October"');
			            		break;
			            		case 11:
			            			for (var c = 0; c < labelDates3.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates3[c] === '"November"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates3.push('"November"');
			            		break;
			            		case 12:
			            			for (var c = 0; c < labelDates3.length; c ++)
				            		{
				            			var hasResult = false;
				            			if(labelDates3[c] === '"December"' && !hasResult)
				            			{
				            				hasResult = true;
				            				break;
				            			}
				            		}
				            		if(!hasResult)labelDates3.push('"December"');
			            		break;
			            	}
			            
			            } //end for
			            
			            //contenxt
			            
			            bar_ctx3 = $("#chart_bar3").get(0).getContext("2d");
						var data6 = {
						    labels: labelDates3,
						    datasets: [
								        {
								            label: "On Transaction",
								            fillColor: "rgba(120,120,120,0.5)",
								            strokeColor: "rgba(120,120,120,0.8)",
								            highlightFill: "rgba(120,120,120,0.75)",
								            highlightStroke: "rgba(120,120,120,1)",
								            data: list3
								        }
						    		]
									};
							var myBarChart3 = new Chart(bar_ctx3).Bar(data6,  {scaleBeginAtZero : true,
							    scaleShowGridLines : true,
							    scaleGridLineColor : "rgba(0,0,0,.05)",
							    scaleGridLineWidth : 1,
							    barShowStroke : true,
							    barStrokeWidth : 2,
							    barValueSpacing : 5,
							    barDatasetSpacing : 1,
							    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
							});

		            }
    });

});


 function dataObject()
 {
 	var value = 1;
 	var color = "#FFF";
 	var highlight = "#000";
 	var label = "";
}
function statusObj()
{
	var name = "";
	var c = 0;
	var r = 0;
	var t = 0;
	var f = 0;
}