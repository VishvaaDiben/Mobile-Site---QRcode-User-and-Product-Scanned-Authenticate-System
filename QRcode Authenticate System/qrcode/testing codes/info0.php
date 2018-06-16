<?php

if(isset($_GET['product_id'])){
?>	

<!DOCTYPE html>
<html><head>


<body>


<p>Ensure gps/share location is on. Then, press OK to continue..</p>

<button onclick="initialize();">OK</button>

<p id="demo"></p>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> 
<script type="text/javascript">
<!-- Next Code-->
var geocoder;

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successFunction, errorFunction,redirectToPosition);
} 
//Get the latitude and the longitude;
function successFunction(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    codeLatLng(lat, lng)
}

function errorFunction(){
    alert("Geocoder failed");
}

  function initialize() {
    geocoder = new google.maps.Geocoder();

  }

  function codeLatLng(lat, lng) {

    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      console.log(results)
        if (results[1]) {
         //formatted address
         alert(results[0].formatted_address)
        //find country name
             for (var i=0; i<results[0].address_components.length; i++) {
            for (var b=0;b<results[0].address_components[i].types.length;b++) {

            //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                    //this is the object you are looking for
                    country= results[0].address_components[i];
                    break;
                }
            }
        }
        //city data
        alert(country.short_name + " " + country.long_name)


        } else {
          alert("No results found");
        }
      } else {
        alert("Geocoder failed due to: " + status);
      }
    });
  }
  function redirectToPosition(position) {
    window.location='testingphpvariable.php?region='+country.short_name+'&lat='+position.coords.latitude+'&lng='+position.coords.longitude+'&id='+"<?php echo $_GET['product_id']; ?>";
}
</script>

</body>
</html>
	
	
	
<?php	
}

?>