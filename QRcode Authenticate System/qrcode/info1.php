<?php

if(isset($_GET['product_id'])){
?>	

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
#alertBox {
	position:relative;
	width:33%;
	min-height:100px;
  max-height:400px;
	margin-top:50px;
	border:1px solid #fff;
	background-color:#fff;
	background-repeat:no-repeat;
  top:30%;
}
#alertBox h1 {
	margin:0;
	font:bold 1em Raleway,arial;
	background-color:#f97352;
	color:#FFF;
	border-bottom:1px solid #f97352;
	padding:10px 0 10px 5px;
}
#alertBox p {
	height:50px;
	padding-left:5px;
  padding-top:30px;
  text-align:center;
  vertical-align:middle;
}

#alertBox #closeBtn {
	display:block;
	position:relative;
	margin:10px auto 10px auto;
	padding:7px;
	border:0 none;
	width:70px;
	text-transform:uppercase;
	text-align:center;
	color:#FFF;
	background-color:#f97352;
	border-radius: 0px;
	text-decoration:none;
  outline:0!important;
}
/*#alertBox{
    position:absolute;
    top:100px;
    left:100px;
    border:solid 1px black;
    background-color:#FF6;
    padding: 50px;
    visibility: hidden;
}
#alertClose{
    position: absolute;
    right:0;
    top: 0;
    background-color: black;
    border: solid 1px white;
    color: white;
    width: 1em;
    text-align: center; 
    cursor: pointer;
}*/
</style>
</head>
<body onload="getGeolocation();">
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script>

setTimeout(function getGeolocation()
{
    if (navigator.geolocation) 
	{
        navigator.geolocation.getCurrentPosition(geoSuccess, showError);
    } 
	else 
	{
        //$('.error-message').html('<p>Your browser does not support this function</p>');
		alert('Your browser does not support this function');
    }
}
, 1000);

function geoSuccess(position) {
 
    window.location='info2.php?lat='+position.coords.latitude+'&lng='+position.coords.longitude+'&id='+"<?php echo $_GET['product_id']; ?>";
}


function showError(error) {
  switch(error.code) {
	 
    case error.PERMISSION_DENIED:
     alert('<h1>Location Undetected!</h1><p>Turn On the GPS/Location Sharing and Scan again.</p>');
      break;
    case error.POSITION_UNAVAILABLE:
      alert('<h1>Location Unavailable!</h1>.<p>Try Again</p>');
      break;
    case error.TIMEOUT:
      alert('<h1>TIMEOUT!</h1>.<p>Try Again</p>');
      break;
    case error.UNKNOWN_ERROR:
      alert('<h1>UNKNOWN_ERROR</h1><p>Try Again or Contact Administrator</p>');
      break;
  }
}


/*function backpage() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    }*/

/*function closeAlertBox(){
    alertBox = document.getElementById("alertBox");
    alertClose = document.getElementById("alertClose");
    alertBox.style.visibility = "hidden";
    alertClose.style.visibility = "hidden";
}
window.alert = function(msg){
    var id = "alertBox", alertBox, closeId = "alertClose", alertClose;
    alertBox = document.createElement("div");
    document.body.appendChild(alertBox);
    alertBox.id = id;
    alertBox.innerHTML = msg;
    alertClose = document.createElement("div");
    alertClose.id = closeId;
    alertClose.innerHTML = "x";
    alertBox.appendChild(alertClose);
    alertBox.style.visibility = "visible";
    alertClose.style.visibility = "visible";
    alertClose.onclick = closeAlertBox;
};*/
</script>

</body>
</html>
	
	
	
<?php	
}

?>