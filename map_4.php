<!DOCTYPE html>
<html>
  <head>
    <title>Map 4</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
    <script>
var map;
var infowindow;

function initMap() {
  // var pyrmont = {lat: 14.531826362117847,  lng: 121.052666944458};

  var pyrmont = new google.maps.LatLng(14.528918373997007, 121.06562737841796);
  map = new google.maps.Map(document.getElementById('map'), {
    center: pyrmont,
    zoom: 13
  });

   var cityCircle = new google.maps.Circle({
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.35,
      map: map,
      center: pyrmont,
      radius: 3965.79
    });

  infowindow = new google.maps.InfoWindow();

  var service = new google.maps.places.PlacesService(map);
  service.nearbySearch({
    location: pyrmont,
    radius: 3965.79,
    keyword: 'yellow cab',
    types: ['cafe']
  }, callback);
}

function callback(results, status) {
  if (status === google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      createMarker(results[i]);
      console.log(results[i]);
    }
  }
}

function createMarker(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
    icon:  {
      url: place.icon,
      anchor: new google.maps.Point(10, 10),
      scaledSize: new google.maps.Size(10, 17)
    } ,
    position: place.geometry.location
  });

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(place.name);
    infowindow.open(map, this);
  });
}

    </script>
  </head>
  <body>
    <div id="map" style="width: 820px; height: 480px;"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA890xJPPqBNULWSmlA1duYt3CTYEzHQ10&signed_in=true&libraries=places&callback=initMap" async defer></script>
  </body>
</html>