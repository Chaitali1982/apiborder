
var x = document.getElementById("demo");
window.onload =function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}


function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude +
  "<br>Longitude: " + position.coords.longitude;


  var apikey = 'dd23949b2baa4598a19d75070f1be9ae';
  var latitude = position.coords.latitude;
  var longitude = position.coords.longitude;

  var api_url = 'https://api.opencagedata.com/geocode/v1/json'

  var request_url = api_url
    + '?'
    + 'key=' + apikey
    + '&q=' + encodeURIComponent(latitude + ',' + longitude)
    + '&pretty=1'
    + '&no_annotations=1';

  // see full list of required and optional parameters:
  // https://opencagedata.com/api#forward

  var request = new XMLHttpRequest();
  request.open('GET', request_url, true);

  request.onload = function() {
    // see full list of possible response codes:
    // https://opencagedata.com/api#codes

    if (request.status == 200){ 
      // Success!
      var data = JSON.parse(request.responseText);
      alert(data.results[0].formatted);
      var country = data.results[0].components.country;
      console.log(country);
     
      const countryname = data.results[0].components.country;

      getLocation(countryname );
      
      
      
      
      function getLocation( countryname) {
        if (layerGroup){
              map.removeLayer(layerGroup);
          }
        jQuery
          .ajax({
            type: "GET",
            dataType: "json",
            url:
              "https://nominatim.openstreetmap.org/search?country=" +
              countryname.trim() +
              "&polygon_geojson=1&format=json"
          })
          .then(function(data) {
            var bounds = new L.LatLngBounds([data[0].boundingbox[0],data[0].boundingbox[2]],[data[0].boundingbox[1],data[0].boundingbox[3]]);
                map.fitBounds(bounds)
                layerGroup = new L.LayerGroup();
              layerGroup.addTo(map);
              L.geoJSON(data[0].geojson, {
                fillColor: 'red',
                weight: 2,
              opacity: 1,
              color: 'white',
              dashArray: '3',
              fillOpacity: 0.7
              }).addTo(layerGroup);
            });
        }
      
      
         
                

    } else if (request.status <= 500){ 
      // We reached our target server, but it returned an error
                           
      console.log("unable to geocode! Response code: " + request.status);
      var data = JSON.parse(request.responseText);
      console.log(data.status.message);
    } else {
      console.log("server error");
    }
  };

  request.onerror = function() {
    // There was a connection error of some sort
    console.log("unable to connect to server");        
  };

  request.send();  // make the request
}               