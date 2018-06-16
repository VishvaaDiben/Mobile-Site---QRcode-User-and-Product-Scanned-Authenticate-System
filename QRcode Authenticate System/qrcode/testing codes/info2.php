<?php

if(isset($_GET['product_id'])){
?>	

<!DOCTYPE html>
<html>
<body>


<p>Ensure gps/share location is on. Then, press OK to continue..</p>

<button onclick="$(document)">OK</button>

<p id="demo"></p>

<script>
$(document).ready(function(){



      //Check geolocation success 
      if (navigator.geolocation) {
        console.log('Geolocation API success') 

        // Geolocation API not supported by current browser
        }  else {
           console.log('Geolocation API is not supported by your browser')
           };
        });

        // Get latitude and longitude
        navigator.geolocation.getCurrentPosition(function(position){
        var lat = position.coords.latitude;
        var long = position.coords.longitude;
        console.log("Your latitude is: " + lat + " and your longitude is: " + long);

        // Get formatted address using reverse geocoding for latitude/longitude 
        $.getJSON('https://maps.googleapis.com/maps/api/geocode/json?latlng=' + lat + ',' + long +  '&key=AIzaSyCJw0QfJXXleECtFD5031OMG75lZMiC6dY',                 function(response){
         $('.yourLocationGoesHere').text(response.results[7].formatted_address);
           })

           $.getJSON('',)
});
function redirectToPosition(position) {
    window.location='testingphpvariable.php?lat='+position.coords.latitude+'&long='+position.coords.longitude+'&id='+"<?php echo $_GET['product_id']; ?>";
}
</script>

</body>
</html>
	
	
	
<?php	
}

?>