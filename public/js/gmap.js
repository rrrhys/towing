var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;

function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  var sydney = new google.maps.LatLng(-33.873, 151.206);
  var mapOptions = {
    zoom:7,
    center: sydney,
    scrollwheel: false
  }
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  directionsDisplay.setMap(map);
if(typeof($) != "undefined"){
  $(function(){
    calcRoute();
  });
}
}

function calcRoute() {
  var start = document.getElementById('start').value;
  var end = document.getElementById('end').value;
  var request = {
      origin:start,
      destination:end,
      travelMode: google.maps.TravelMode.DRIVING
  };
  directionsService.route(request, function(response, status) {
    console.log(response);
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
    if(response){
      if(response.routes.length > 0){
        var route = response.routes[0];
        var leg = route.legs[0];
        var distance = leg.distance.text;
        document.getElementById('distance').innerHTML = distance;
      }
    }
  });
}

google.maps.event.addDomListener(window, 'load', initialize);
