<?php
session_start();
?>
<!DOCTYPE html>
<head>
<title>BIN MOBILE REVIEW</title>
<script type="text/javascript" src="script.js"></script>
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    
    background-color: green;
    color: white;
}
th, td {
    padding: 5px;
    text-align: left;
}
#header-wrapper {
	color: white;
}
#header-wrapper #header #logo p {
	color: white;
}
</style>
</head>

<body>
<div id="header-wrapper">
	<div id="header">
	    <div id="logo">
	    <h1><a href="#">MOBILE REVIEW</a></h1>
		<br>
		
			<p>The ultimate resource for handset information.</p>
		</div>
		<div id="menu">
			<ul>
                 
				<li class="current_page_item"><a href="index.php" accesskey="1" title="">Home</a></li>
				

                <?php
                
                 if(isset($_SESSION['user']))
                 {
                     echo ("<li><a href=\"logout.php\" >Logout</a></li>");
                 }else
                 {
                     echo ("<li><a href=\"login.php\" >Login</a></li>");
                 }


                ?>

			

				
				<li><a href="about.php" >About</a></li>
				<li><a href="feedback.php" >Feedback</a></li>
				
			</ul>
		</div>
	</div>


	<div id="banner">
		<div class="img-border"><img src="images/JJ-cell-phone-home-banner.jpg" width="1120" height="470" alt=""/></a> </div>
	</div>



 
<div id="calendar">
     <p id="calendar-day"></p>
     <p id="calendar-date"></p>
     <p id="calendar-month-year"></p>
    </div>
    
</div>
</body>
</html>
