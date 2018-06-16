<?php

session_start();
try {

    if(isset($_SESSION['user']))
    header('Location: welcome.php');
    require_once 'DB_CONFIG/connect_db.php';
    $msg1 = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
		if(isset($_POST['login'])){
		$username = $_POST["username"];
        $password = $_POST["password"];
      
        $sql = "SELECT * FROM allusers WHERE username = '".$username."' AND password = '".$password."'";
           
             $result = $db->query($sql);
            if ($result->num_rows>0) {

               $test="admin";
                if($username == $test){
                    $_SESSION['user'] = $username;
				$home_url = './admin/insert.php';
header('Location: '.$home_url);
         
				 
				
				}else{			$_SESSION['user'] = $username;
			 header('Location: User_welcome.php');
				}
                die();

            }



            $msg1 = "Username and password wrong!";
        }
        if(isset($_POST['register'])){
            $name = $_POST["name"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];
			
//if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email))
//{
// Return Error - Invalid Email
// $msg2 = 'The email you have entered is invalid, please try again.';
// }else{
// Return Success - Valid Email
// $msg2 = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
//}
//$hash = md5( rand(0,1000) );
//$dob = $_POST["dob"];

$a= "SELECT * FROM allusers WHERE username='".$username."'";
$resulta = $db->query($a);
            if ($resulta->num_rows>0) {
    echo("<script>alert('Username already exist! Please try new !');
                     window.location.href='login.php';
                     </script>");
					 //$msg1 = "Username exist!";
   }
 else
    {
      $b= "SELECT * FROM allusers WHERE email='".$email."'";
$resultb = $db->query($b);
            if ($resultb->num_rows>0) {
        echo("<script>alert('Email already exist! Please try new !');
                     window.location.href='login.php';
                     </script>");
					 //$msg1 = "Email exist!";
                           }
	else{
		$sql = "INSERT INTO allusers (name,username,password,email) VALUES ('$name','$username','$password','$email')";
$db->query($sql);
if($db->affected_rows>0) {

                $msg1 = "You have Registered Successfully!";
							
              }
			 }					   
           }			
        }
	}
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>





<!DOCTYPE html>
<!-- 

 -->
 
<head>
<title>USER LOGIN</title>
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/reset.css">

<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <link rel="stylesheet" href="css/style.css">
<style type="text/css">
<style>


#header-wrapper {
	color: white;
}
        #header-wrapper #header #logo p {
	color: white;

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
            <?php

				if(isset($_SESSION['user']))
				{
					echo ("<li ><a href=\"User_welcome.php\" >My Page</a></li>");
				}else
				{
					echo ("<li><a href=\"index.php\" accesskey='1' >Home</a></li>");
				}

				?>
						
				

                <?php

                if(isset($_SESSION['user']))
                {
                    echo ("<li><a href=\"logout.php\" >Logout</a></li>");
                }else
                {
                    echo ("<li class='current_page_item'><a href=\"login.php\" >Login</a></li>");
                }


                ?>
			

				<li><a href="about.php" >About</a></li>
				<li><a href="feedback.php" >Feedback</a></li>
				
			</ul>
		</div>
	</div>


	
</div>
<br/><br/>

 <form name="form" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST">
				
		<div class="module form-module">
<div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <div class="tooltip">Register</div>
</div>
  <div class="form">
    <h2>Login to your account</h2>
	<p style="color:red;"><?php echo $msg1; ?> </p>
	 <br/>
    <form>
      <input name="username" type="text" placeholder="Username" >
      <input name="password" type="password" placeholder="Password" >
      <button type="submit" name="login" onsubmit="return ValidationEvent_1()" >LOGIN</button>
    </form>
 <br>   
<?php 
    if(isset($msg2)){  // Check if $msg is not empty
        echo '<div class="statusmsg">'.$msg2.'</div>'; // Display our message and wrap it with a div with the class "statusmsg".
    } 
?>
  </div>
<div class="form">
    <h2>Create an account</h2>
	 <p style="color:red;"><?php echo $msg1; ?> </p>
	 <br/>
    <form method="post">
	<input name="username" type="text" placeholder="Username"required/>
    <input name="name" type="text" placeholder="Name" required/>
	<input name="email" type="email" placeholder="Email Address"required/>
	<input name="password" type="password" placeholder="Password"required/>
	
     
          
	 
     
    
          
	
	  
      <button type="submit" name="register">Register</button>
  </form>
  </div>
  
</div>


</form>
    
<script src='js/da0415260bc83974687e3f9ae.js'></script>

<script src="js/index.js"></script>	
<script>
function ValidationEvent_1() {

var name = document.getElementById("name").value;
var pass = document.getElementById("password").value

if (name != '' && pass != '') {
if(pass.length > 10) {

return true;
} 

else {
alert("Your password must be more than 10 characters");
return false;
}
} else {
alert("All fields are required.....!");
return false;
}
}

</script>

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>	
	
</body>
</html>
