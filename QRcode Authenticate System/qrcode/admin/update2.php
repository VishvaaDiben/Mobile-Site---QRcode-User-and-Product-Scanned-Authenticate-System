<?php

include '../DB_CONFIG/connect_db.php';

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['save']))
{   
    $id1 = $_POST['id1'];
	$id2 = $_POST['id2'];
	$id3 = $_POST['id3'];
	$id4 = $_POST['id4'];
	
	$id5 = $_POST['id5'];
	$id6 = $_POST['id6'];
	$id7 = $_POST['id7'];
	$id8 = $_POST['id8'];
	$id9 = $_POST['id9'];
	$id10 = $_POST['id10'];
	$id11= $_POST['id11'];
	$id12 = $_POST['id12'];
	$id13 = $_POST['id13'];
	$id14 = $_POST['id14'];
	
	
$sql1 =  "UPDATE product SET product_name='$id2',
announce='$id3',
battery='$id4',
build='$id5',
camera='$id6',
Chipset='$id7',
cpu='$id8',
os='$id9',
performance='$id10',
sim='$id11',
technology='$id12',
weight='$id13',
price='$id14'
WHERE product_id = '$id1' "; 



                     if (mysqli_query($db, $sql1))  {
                     echo("<script>alert('Records Updated Successfully!');
                     window.location.href='update1.php';
                     </script>");
                       } 
	
                      else{
   	                  echo("<script>alert('ERROR: Could not able to execute $sql1.  . mysql_error()');
                      window.location.href='update1.php';
                      </script>");
                       }
}
	




elseif(isset($_POST['delete']))
{
	$id1 = $_POST['id1'];
	$id2 = $_POST['id2'];
	$id3 = $_POST['id3'];
	$id4 = $_POST['id4'];
	
	$id5 = $_POST['id5'];
	$id6 = $_POST['id6'];
	$id7 = $_POST['id7'];
	$id8 = $_POST['id8'];
	$id9 = $_POST['id9'];
	$id10 = $_POST['id10'];
	$id11= $_POST['id11'];
	$id12 = $_POST['id12'];
	$id13 = $_POST['id13'];
	$id14 = $_POST['id14'];
	
	$sql2 = "DELETE FROM product WHERE product_id = '$id1'";
	

if (mysqli_query($db, $sql2)) {
      echo("<script>alert('Records Deleted Successfully!');
                     window.location.href='update1.php';
                </script>");
} 
	
else{
           	 echo("<script>alert('ERROR: Could not able to execute $sql2.  . mysql_error()');
                     window.location.href='update1.php';
                </script>");
}
	
}





mysqli_close($db);
?>