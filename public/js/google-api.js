 var map;
  var marker;
  var mapOptions = {zoom: 18};
  var pos;
    var directionsDisplay ; 

  function initialize() 
  {
      map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        directionsDisplay = new google.maps.DirectionsRenderer();    
      directionsDisplay.setMap(map);
      if(navigator.geolocation)
      {
        navigator.geolocation.getCurrentPosition(function(position) 
        {
          pos = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
          marker = new google.maps.Marker({
            icon: 'me.png',
          position:pos,
          animation:google.maps.Animation.BOUNCE
        });
        marker.setMap(map);//draws the map
        var dx =document.getElementById('x');
        dx.value= position.coords.latitude;
        var dy =document.getElementById('y');
        dy.value= position.coords.longitude;
        var infowindow = new google.maps.InfoWindow({
            //map: map,
            //position: pos,
            content: 'You'
          });
        infowindow.open(map,marker);
        map.setTilt(1);
        map.setCenter(pos);
    
            //drawShortestPath(pos,startLocation);
        
        }, function() {
          handleNoGeolocation(true);
        });
      }
      else 
      {
        // Browser doesn't support Geolocation
        handleNoGeolocation(false);
      }
     // google.maps.event.addListener(map, 'click', function(event) {
     // placeMarker(event.latLng);
  //});
 


      
 
   
 
    }//end init


    function placeMarker(location) {
  var marker = new google.maps.Marker({
    position: location,
    map: map,
  });
  var infowindow = new google.maps.InfoWindow({
    content: 'Latitude: ' + location.lat() +
    '<br>Longitude: ' + location.lng()
  });
  infowindow.open(map,marker);
  var c1 =document.getElementById('c1');
  var c2 =document.getElementById('c2');
  c1.value = location.lat();
  c2.value = location.lng();
  var k ="AIzaSyBfLBTDTkiL-VKpNqJ-QTlhSaSa1GXZjSE"

    }
    function handleNoGeolocation(errorFlag) {
      if (errorFlag) 
      {
        var content = 'Error: The Geolocation service failed.';
      }
      else
      {
        var content = 'Error: Your browser doesn\'t support geolocation.';
      }
      var options = {map: map,position: new google.maps.LatLng(60, 105),content: content};
      var infowindow = new google.maps.InfoWindow(options);
      map.setCenter(options.position);
    }

    function drawPath(from, to)
    {
      var path = [from,to];
      var path = new google.maps.Polyline({
        path:path,
        strokeColor:"#B22222",
        strokeOpacity:0.7,
        strokeWeight:3,
        editable :true
      });
      path.setMap(map);
    }
   
    google.maps.event.addDomListener(window, 'load', initialize);

