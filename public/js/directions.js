 $(document).ready(function(){
          var key ="AIzaSyBfLBTDTkiL-VKpNqJ-QTlhSaSa1GXZjSE";
          $('#path1').click(function(){
          var me = pos;
          var z = '14.5545821';
          var zz = '121.0181316';
          var to =new google.maps.LatLng(z,zz);
          drawShortestPath(me,to);
       
        });
 });

  function drawShortestPath(from,to)
    {
      var service = new google.maps.DirectionsService();
      irectionsDisplay = new google.maps.DirectionsRenderer();    
      directionsDisplay.setMap(map);
      
      var waypts = [];
      var myCoord= [from,to];
      for(j=1;j<myCoord.length-1;j++)
      {            
            waypts.push({location: myCoord[j],
                         stopover: true});
      }
      var request={
          origin: myCoord[0],
          destination: myCoord[myCoord.length-1],
          waypoints: waypts,
          travelMode: google.maps.DirectionsTravelMode.WALKING,
          optimizeWaypoints: true,
          provideRouteAlternatives: true,
          avoidHighways: false,
          durationInTraffic: true
        };
      service.route(request,function(result, status) {                
        if(status == google.maps.DirectionsStatus.OK) {                 
          directionsDisplay.setDirections(result);
        } else { alert("Directions request failed:" +status); }
      });
      }
