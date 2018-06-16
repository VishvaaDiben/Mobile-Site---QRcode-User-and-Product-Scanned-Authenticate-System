<?php
session_start();
if($_SESSION['user'] != "admin") {
    $home_url = '../login.php';
    header('Location: '.$home_url);
}
$_SESSION['itemType'] = "allusers";
include '../DB_CONFIG/connect_db.php';
$sql1= "SELECT * FROM allusers WHERE username = 'admin'";
$result1=$db->query($sql1);

$sql2= "SELECT * FROM allusers WHERE username NOT LIKE 'admin'";
$result2=$db->query($sql2);

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin Home </title>
  

    <!--  styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!--  favicon -->
    <link rel="shortcut icon" href="favicon.ico">

  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.html"></a>
        </div>
      </div>
    </div>

     <div class="container">
 




    <br>
      <br>
    <div class="row"> 
	<div class="container">
	<br>
        <a href="index.php" ><button id="showAll" class="btn btn-success btn-md">Manage Users</button></a>
	   
        <a href="feedback.php"><button class="btn btn-info btn-md">View Feedback</button></a>
        <a href="insert.php"><button class="btn btn-primary">Add Item</button></a>
        <a href="update1.php"><button class="btn btn-default">Update Item</button></a>
        <a href="../logout.php"><button class="btn btn-danger btn-md">Logout</button></a>




    </div>
	</div>
    
	<div id="displayAll" class="row">
<div class="col-md-12">
        <h4>Admin can Edit, View and Delete All data here</h4>
        <br>
        <h5 style="font-weight:bold"> Admin </h5>
        <div class="table-responsive">

                
              <table id="mytable1" class="table table-bordred table-striped table-hover">
                   
                   <thead>
                   
                    <th>ID</th>
                    <th>Username</th>
                     <th>Password</th>
                     <th>Email</th>
                    <th>Name</th>
                   <!-- <th>DOB</th>
                    <th>Address</th>
                    <th>Tel No.</th>-->
                      
                      <th>Edit</th>
                      <th>Delete</th>
                   </thead>
<tbody>
<?php
  if(mysqli_num_rows($result1)>0) {
      while ($row = mysqli_fetch_array($result1)) {

              echo("<tr>
        <td>$row[0]</td>
        <td>$row[1]</td>
        <td>$row[2]</td>
        <td>$row[3]</td>
        <td>$row[4]</td>
        
        <td><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Edit\"><a href=\"Edit.php?id=$row[0]\"><button class=\"btn btn-primary btn-xs\" data-title=\"Edit\"><span class=\"glyphicon glyphicon-pencil\"></span></button></a> </p></td>
        <td><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Delete\"><a href=\"Delete.php?id=$row[0]\"><button class=\"btn btn-danger btn-xs\" data-title=\"Delete\"><span class=\"glyphicon glyphicon-trash\"></span></button></a></p></td>

    </tr>");

      }
  }
?>


    </tbody>
        
</table>

<!--Second(2nd Table for Users) -->
<br>
 <h5 style="font-weight:bold"> User</h5>
<table id="mytable2" class="table table-bordred table-striped table-hover">
                   
                   <thead>
                   
                    <th>ID</th>
                    <th>Username</th>
                     <th>Password</th>
                     <th>Email</th>
                  
                   <!-- <th>DOB</th>
                    <th>Address</th>
                    <th>Tel No.</th>-->
                      
                      
                      <th>Delete</th>
                   </thead>
<tbody>
<?php
  if(mysqli_num_rows($result2)>0) {
      while ($row = mysqli_fetch_array($result2)) {

              echo("<tr>
        <td>$row[0]</td>
        <td>$row[1]</td>
        <td>$row[2]</td>
        <td>$row[3]</td>
        
        
        <!--<td><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Edit\"><a href=\"Edit.php?id=$row[0]\"><button class=\"btn btn-primary btn-xs\" data-title=\"Edit\"><span class=\"glyphicon glyphicon-pencil\"></span></button></a> </p></td>-->
        <td><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Delete\"><a href=\"Delete.php?id=$row[0]\"><button class=\"btn btn-danger btn-xs\" data-title=\"Delete\"><span class=\"glyphicon glyphicon-trash\"></span></button></a></p></td>

    </tr>");

      }
  }
?>


    </tbody>
        
</table>

<div class="clearfix"></div>
<ul class="pagination pull-right">
  <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
  <li class="active"><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
</ul>
                
            </div>
            


            
        </div>
	
</div>





      </div>

  <footer class="white navbar-fixed-bottom">

  </footer>


  <!-- Le javascript
  ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>

             <script>

                 $(document).ready(function () {
                     $('.dropdown-toggle').dropdown();
                     $("[data-toggle=tooltip]").tooltip();
                 });

             </script>


  </body>
</html>
