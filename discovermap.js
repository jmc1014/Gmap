var map;
var infowindow;
var service;
var markers = [];

function initMap() { 
  var rad = 3210.82;  
  var taguig = new google.maps.LatLng(14.530247744741608, 121.05790261645507);
  map = new google.maps.Map(document.getElementById('map'), {
    center: taguig,
    zoom: 14
  });
  visible_radius(map, taguig, rad);

  infowindow = new google.maps.InfoWindow();

  service = new google.maps.places.PlacesService(map);

  document.getElementById("submit_btn").addEventListener("click", function () {
      var x = document.getElementById("liketodo").selectedIndex;
      var y = document.getElementById("liketodo").options;
      service.nearbySearch({
        location: taguig,
        radius: rad,
        // keyword: 'yellow cab',
        types: [ y[x].value ]
      }, callback);
  });

  document.getElementById("search_btn").addEventListener("click", function () {
      var search_val = document.getElementById("discover-maps-search-item").value; 
      // alert(search_val);
      service.nearbySearch({
        location: taguig,
        radius: rad,
        keyword: search_val + ' , Taguig'
      }, callback);
  });

} 

function visible_radius (map, location, radius ) {
  
   var cityCircle = new google.maps.Circle({
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.35,
      map: map,
      center: location,
      radius: radius
    });

}


function callback(results, status) {
  if (status === google.maps.places.PlacesServiceStatus.OK) {

    deleteMarkers() 
    for (var i = 0; i < results.length; i++) {
      createMarker(results[i])
      console.log(results[i])
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

  markers.push(marker);
}
 function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}
function clearMarkers() {
  setMapOnAll(null);
}
 
function deleteMarkers() {
  clearMarkers();
  markers = [];
}


function searchKeyPress(e)
{ 
    e = e || window.event;
    if (e.keyCode == 13)
    {
        document.getElementById('search_btn').click();
        return false;
    }
    return true;
}