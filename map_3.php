<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Map 3</title>
    <style>
      html, body {
        height: 70%;
        margin: 0;
        padding: 0;
      }
      #map {
      	width: 50%;
        height: 100%;
      }
    </style>
    

<script src="../jquery-1.11.3.min.js"></script>
    
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyBRWgzfglEmqogRHH1Cj5rCzW2NgAqwzNM&signed_in=true&libraries=places,visualization&sensor=false" type="text/javascript"></script>
<script type="text/javascript"> 
     
    jQuery(document).ready(function() { 



    //g_map
     initialize_gmap();
    
    });
    
    
    
    //google map

        var geocoder;
        var map;
        var marky = [];
        var marky2 = []; 
        
                        var mark_jmc = [];
                        var marker_jmc;   
    


        function updateMarkerPosition(latLng,latLngField) {  
            document.getElementById(latLngField).value = latLng.lat() + ', ' + latLng.lng()  ;  
        }

        function codeAddress(map, marky, address_to_searh,latLngField, markers) { 
            deleteOverlays(marky); // Delete all teh markers
            var address = document.getElementById(address_to_searh).value; 
            geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                map.setZoom(18); 
                markers = new google.maps.Marker({
                    map: map,  
                    noClear:false,
                    position: results[0].geometry.location,
                    draggable: true
                }); 
                
                marky.push(markers);
                //update the  LAtitude and Longhitude
                updateMarkerPosition(markers.getPosition(),latLngField);

                google.maps.event.addListener(markers, 'dragend', function() {  
                        updateMarkerPosition(markers.getPosition(),latLngField);
                });

            } else if (status == google.maps.GeocoderStatus.ZERO_RESULTS) { 
                alert("Result Not Found " );
            }else {
                alert("Geocode was not successful for the following reason: " + status);
            }
            });
        }
        function deleteOverlays(marky) {
            for (var i = 0; i < marky.length; i++) {
                marky[i].setMap(null);
                }
                marky = [];
        }

        function initialize_gmap() {
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(14.5176184, 121.05086449999999);
            var mapOptions = {
            zoom: 14,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
            } 
           
           map_name_jmc = new google.maps.Map(document.getElementById("map_jmc"), mapOptions);
        }

</script> 
  </head>
  <body> 

<div class="widgetbox3 inlineblock" style="min-width: 820px; ">
        <h3><span>
<h3><span>
            <input id="address_jmc" type="text" value="Manila" class="sf">
            <input type="button" class="button button_brown" value="Search the place" onclick="codeAddress(map_name_jmc, mark_jmc,'address_jmc', 'jmc',  marker_jmc )"> 
        </span></h3>        </span></h3>
        <div id="map_jmc" style="width: 820px; height: 480px;"></div>
        <input type="hidden" name="jmc"  id="jmc" class="sf"  />
    </div>
  </body>
</html>