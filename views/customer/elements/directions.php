    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyBfLBTDTkiL-VKpNqJ-QTlhSaSa1GXZjSE&libraries=places"></script>
    <script type="text/javascript" src="<?php echo JS;?>google-api.js"></script>
    

  <section>
    <div class="row_services">  
      <h1 class="hdr2">Get Directions To Our Salon</h1>
          <div class="col-md-6">
            <div id="map-canvas"></div>
            <br/>
            <button onClick='initialize();' id='path1' >Get Directions</button>
                      <input type="hidden" placeholder="Lat" id='lat1'  value='14.5545821' />
                      <input type="hidden" placeholder="Long" id='long1' value='121.0181316'/>
            <div class="thumbs text-center">
            </div>
          </div>
      </div>
  </section>

