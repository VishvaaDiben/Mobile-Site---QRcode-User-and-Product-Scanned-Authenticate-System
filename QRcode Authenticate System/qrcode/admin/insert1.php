<?php
session_start();
include '../DB_CONFIG/connect_db.php';
if($_SESSION['user'] != "admin") {
    $home_url = '../login.php';
    header('Location: '.$home_url);
}

if(isset($_POST['submit'])){
 $Name1 = $_POST['Name1'];
 $Name2 =  $_POST['Name2'];
 $Name3 = $Name2+1;
 $Range = range($Name1,$Name2);
$Ran = var_dump($Range);
// $Pin = $_POST['Announce'];
// $Region = $_POST['Battery'];
// $Distributor = $_POST['Build'];
          
// mysql_query("INSERT INTO my_table(user_id) values('$i')");
//for ($i = $Name1; $i < $Name3; $i++) 
  //{
$sql= "INSERT INTO product(product_name) VALUE ('$Ran')";
//,announce,battery,build
//,'".$_POST["Announce"]."','".$_POST["Battery"]."','".$_POST["Build"]."'
  //}
if ($db->query($sql) === TRUE) {
echo "<script type= 'text/javascript'>alert('New record created successfully');
</script>";
//window.location.href='./insert.php';

} else {
echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $db->error."');</script>";
}


		
/*$sql= "INSERT INTO product(product_name,announce,battery,build) VALUES ('".$_POST["Name"]."','".$_POST["Announce"]."','".$_POST["Battery"]."','".$_POST["Build"]."')";*/
//
//'".$_FILES["pic"]["name"]."'
//



	} 

?>