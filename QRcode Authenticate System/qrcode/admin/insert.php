<?php
session_start();
include '../DB_CONFIG/connect_db.php';
if($_SESSION['user'] != "admin") {
    $home_url = '../login.php';
    header('Location: '.$home_url);
}

 ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Home </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--  styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!--  favicon -->
    <link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

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
    <br>
    <br>
    <br>

    <div class="row"> 
	<div class="container">
	
        <!--<a href="index.php" ><button id="showAll" class="btn btn-success btn-md">Manage Users</button></a>-->   
        <!--<a href="feedback.php"><button class="btn btn-info btn-md">View Feedback</button></a>-->
        <a href="insert.php"><button class="btn btn-primary">Add Data</button></a>
        <a href="update1.php"><button class="btn btn-default">View Data</button></a>
        <a href="../logout.php"><button class="btn btn-danger btn-md">Logout</button></a>

    </div>
	</div>
    <br><br>
<div class="container">
<div class="panel panel-default">
<div class="panel-body">
<br>
<div class="row">
<form action="./import.php" method="post" enctype="multipart/form-data" id="import_form">
<div class="col-md-3">
<input type="file" name="file" />
</div>
<div class="col-md-5">
<input type="submit" class="btn btn-success" name="import_data" value="IMPORT">
</div>
</form>
</div>
<br>
<div class="row">
<table class="table table-bordered">
<thead>
<tr>
<th>Id</th>
<th>Serial</th>
<th>Pin</th>
<th>Distributor</th>
<th>Region</th>
</tr>
</thead>
<tbody>
<?php
$sql = "SELECT product_id, product_name, announce, battery, build FROM product ORDER BY product_id ";
$resultset = mysqli_query($db, $sql) or die("database error:". mysqli_error($db));
if(mysqli_num_rows($resultset)) {
while( $rows = mysqli_fetch_assoc($resultset) ) {
?>
<tr>
<td><?php echo $rows['product_id']; ?></td>
<td><?php echo $rows['product_name']; ?></td>
<td><?php echo $rows['announce']; ?></td>
<td><?php echo $rows['battery']; ?></td>
<td><?php echo $rows['build']; ?></td>
</tr>
<?php } } else { ?>
<tr><td colspan="5">No records to display.....</td></tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</body>

</html>