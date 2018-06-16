<?php

//header('Location:info1.php');

session_start();
/*

if (!isset($_SESSION["visitstime"]))
$_SESSION["visitstime"] = date("s");
//$_SESSION["visits"] = $_SESSION["visits"] + 1;
$timenow = date("s"); 
if ($_SESSION["visitstime"] !== $timenow)
{
 unset($_SESSION["visitstime"]); // will delete just the name data
// session_destroy();
//you refreshed the page!
echo("<script>alert('Backed!');
     window.location.href='backed.html';
     </script>");
}

else
{
    //nothing to do here!
}*/
 

$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

if($pageWasRefreshed ) {
  echo("<script>alert('Page Refreshed!');
                      window.location.href='refreshed.html';
                      </script>");
}


else {
  //do nothing;

include 'DB_CONFIG/connect_db.php';


$lat=(isset($_GET['lat']))?$_GET['lat']:'';
$lng=(isset($_GET['lng']))?$_GET['lng']:'';
$id=(isset($_GET['id']))?$_GET['id']:'';

date_default_timezone_set('Asia/Singapore');
$timestamp = date('Y-m-d h:i:s A');
if (!isset($_SESSION["visitstime"]))
$_SESSION["visitstime"] = $timestamp;
global $shortName;

//GoogleApi Start
$json = @file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=true');

$data = json_decode($json, true);

foreach ($data['results'] as $item) 
 {
	
    if( !empty( $item['address_components'] ) )
	{
		$longName='';
		$shortName='';
        $longName = $item['address_components'][0]['long_name']; 
        $shortName = $item['address_components'][0]['short_name']; 		
	}
		
}//GoogleApi Ends
 	

		
//$check = "SELECT build FROM product WHERE product_id = '$id'";
//$check1 = mysqli_query($db,$check) or die ;
//while($row = mysqli_fetch_array($check1))
//{
$check = "SELECT build FROM product WHERE product_id = '$id'";
$check1 = mysqli_query($db,$check) ;
// Associative array
$row=mysqli_fetch_assoc($check1);	
$region= $row['build'];
 
if($region !== "MY")
{
			  echo("<script>alert('ERROR:Your Location is out of Malaysia region.');
                      window.location.href='error.html';
                      </script>");
}

else{
$query = "Update product set counter=counter+1, timestamp='".$_SESSION['visitstime']."' where product_id='$id' ";
//if (mysqli_query($db, $sql1))  {
 if ($db->query($query) === TRUE) 
         {
			 
			 $a="SELECT counter FROM product WHERE product_id='$id'";
			 $integer = mysqli_query($db,$a);
			 while($rows = mysqli_fetch_array($integer))
			 {
				 $num = $rows['counter'];
/*    		*/	 if($num == 1) 
				  { 
                    $query2="SELECT * FROM product WHERE product_id='$id'";

                          $sql = mysqli_query($db,$query2) or die ;

						    if (mysqli_num_rows($sql) > 0) 
						     {                                             
   						       while($row = mysqli_fetch_array($sql)) 
						      {
							   echo'
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
</head>
<body>
        <div>
        <div id="header" style="background-color:#000066;border-style:None;">
	
            <br />
            
</div>
            <div id="Hlogo" style="background-color:White;height:153px;">
	
            <br />
                <center>
                    <img id="HPlogo" src="logo.png" alt="" 
                        style="height:120px;width:120px;border-width:0px;" />
                </center>
            
</div>
            <div id="Content">
	
           <div id="Panel1" style="background-color:#1890C3;height:438px;width:100%;">
		
    <center style="height: 438px; width: 100%;">
    <br />
        <div style="width:70%; height:auto; border-bottom-style: solid; border-bottom-width: thin; border-bottom-color: #666666; background-color:#84e371">
            <img id="validicon" alt="" src="logo_successful.png" 
                style="height:auto; width:30%; text-align:center;" />
            <br />
            <span id="SuccessfulText" style="color:#FFFFFF; font-family: FixSwiss;text-align:center;">SUCCESSFUL</span>
            <br />
            <span id="ImpressionText" style="color:#FFFFFF; font-family: "Kristen ITC"; text-align:center;">Yay, your product is original!</span>
        </div>
        <div style="width:70%; height:auto; border-bottom-style: solid; border-bottom-width: thin; border-bottom-color: #666666; background-color:#005043">
            
			<span id="PinText"                 
                style="color:#FFFFFF; font-family: Arial; text-align:center; font-size: x-large;">PIN :</span>
            <span id="NoPin" 
                style="color:#FFFFFF; font-family: Arial; text-align:center; font-size: x-large;">'.$row['announce'].'</span>
				<br/>
			<span id="RegionText"                 
                style="color:#FFFFFF; font-family: Arial; text-align:center; font-size: x-medium;">REGION :</span>
				<span id="RegionName" 
                style="color:#FFFFFF; font-family: Arial; text-align:center; font-size: x-medium;">'.$row['build'].'</span>
				<br/>
			<span style="position:relative;right:35px;">
			    <span id="DistributorText"                 
                style="color:#FFFFFF; font-family: Arial; text-align:center; font-size: x-medium;">DISTRIBUTOR :</span>
				<span id="DistributorName" 
                style="color:#FFFFFF; font-family: Arial; text-align:center; font-size: x-medium;">'.$row['battery'].'</span>
			</span>	
				
				
        <br />
        </div>
        &nbsp;<br />
        <br />
        <span id="date" style="color:#000066;">QR has been scan at </span>
        <span id="timenowtext" style="color:White;">&nbsp;'.$row['timestamp'].'</span><br/>
		<span id="a" style="color:#000066;">Number of times scanned </span>
        <span id="b" style="color:White;">&nbsp;'.$row['counter'].'</span>
        
    
        <br />
    </center>
    
	</div>
            
</div>
            <div id="footer" style="background-color:#000066;border-style:None;">
	
           
            <center><span id="footertext" style="color:White;font-weight:bold;">© 2017-'.date("Y").'.| All Right Reserved</span>
            </center>
            
</div>
    </div>
</body>
</html>
';
							
					           }
						     
							 
							  }
						
				  }//endif
					
else
     { 
	
	
	                     $query3="SELECT * FROM product WHERE product_id='$id'";

                          $b = mysqli_query($db,$query3) or die ;

						    if (mysqli_num_rows($b) > 0) 
						     {                                         
    
   						       while($rowsa = mysqli_fetch_array($b)) 
						      {
							   echo'
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
        <div>
        <div id="header" style="background-color:#000066;border-style:None;">
	
            <br />
            
</div>
            <div id="Hlogo" style="background-color:White;height:153px;">
	
            <br />
                <center>
                  <img id="HPlogo" src="logo.png" alt="" 
                        style="height:120px;width:120px;border-width:0px;" /> 
                </center>
            
</div>
            <div id="Content">
	
           <div id="Panel1" style="background-color:#1890C3;height:438px;width:100%;">
		
    <center style="height: 438px; width: 100%;">
    <br />
        <div style="width:70%; height:auto; border-bottom-style: solid; border-bottom-width: thin; border-bottom-color: #666666; background-color:#eac208">
            <img id="validicon" alt="" src="logo_invalid.png" style="height:auto; width:30%; text-align:center;" />
            <br />
            <span id="SuccessfulText" style="color:#FFFFFF; font-family: FixSwiss;text-align:center;">INVALID</span>
            <br />
            <span id="ImpressionText" style="color:#FFFFFF; font-family: "Kristen ITC"; text-align:center;">Please make a report!</span>
        </div>
        <div style="width:70%; height:auto; border-bottom-style: solid; border-bottom-width: thin; border-bottom-color: #666666; background-color:#e00024">
            
			<span id="PinText"                
                style="color:#FFFFFF; font-family: Arial; text-align:center; font-size: x-large;">PIN :</span>
            <span id="NoPin" 
                style="color:#FFFFFF; font-family: Arial; text-align:center; font-size: x-large;">'.$rowsa['announce'].'</span>
				<br/>
				<span id="RegionText"                 
                style="color:#FFFFFF; font-family: Arial; text-align:center; font-size: x-medium;">REGION :</span>
				<span id="RegionName" 
                style="color:#FFFFFF; font-family: Arial; text-align:center; font-size: x-medium;">'.$rowsa['build'].'</span>
				<br/>
			<span style="position:relative;right:35px;">
			    <span id="DistributorText"                 
                style="color:#FFFFFF; font-family: Arial; text-align:center; font-size: x-medium;">DISTRIBUTOR :</span>
				<span id="DistributorName" 
                style="color:#FFFFFF; font-family: Arial; text-align:center; font-size: x-medium;">'.$rowsa['battery'].'</span>
			</span>	
        <br />
        </div>
        &nbsp;<br />
        <br />
        <span id="date" style="color:#000066;">QR has been scan 1st at</span>
        <span id="timenowtext" style="color:White;">&nbsp;
        '.$rowsa['timestamp'].'
        </span><br/>
		<span id="a" style="color:#000066;">Number of times scanned </span>
        <span id="b" style="color:White;">&nbsp;'.$rowsa['counter'].'</span>

        <br />
    </center>
    
	</div>
            
</div>
            <div id="footer" style="background-color:#000066;border-style:None;">
	
           
            <center><span id="footertext" style="color:White;font-weight:bold;">© 2017-'.date("Y").'.| All Right Reserved</span>
            </center>
            
</div>
    </div>
</body>
</html>

';
							
					           }
						     
							 
							  }
						
				  }	
			 }
                 
				 
		 }
				 
			
		 }
				 
}

?>

