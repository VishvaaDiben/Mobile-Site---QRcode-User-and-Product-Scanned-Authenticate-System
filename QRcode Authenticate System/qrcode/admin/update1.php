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
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8">
    <title>Admin Home </title>
 <!--  	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
	</style>-->

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

    <br>
      <br>
    <div class="row"> 
	<div class="container">
	<br>
       <!-- <a href="index.php" ><button id="showAll" class="btn btn-success btn-md">Manage Users</button></a>
	   
        <a href="feedback.php"><button class="btn btn-info btn-md">View Feedback</button></a>-->
        <a href="insert.php"><button class="btn btn-primary">Add Data</button></a>
        <a href="update1.php"><button class="btn btn-default">View Data</button></a>
        <a href="../logout.php"><button class="btn btn-danger btn-md">Logout</button></a>


    </div>
	</div>
    <br><br>
<div class="container">
<div class="panel panel-default">
<div class="panel-body">
<div class="row">

				<table class="table table-bordered">
		<caption class="title">View</caption>
		<thead>
			<tr>
				<!--<th>NO</th>-->
				<th>Serial</th>
				<th>Distributor</th>
				<th>Region</th>
				<th>LastScan</th>
                <th>ScanCounter</th>
                <!--<th>UrlForQrcode</th>-->
			</tr>
		</thead>
		<tbody>
		<?php
		$sql2= "SELECT * FROM product";
$query1 = mysqli_query($db,$sql2) or die ;
							

						//$result = mysql_query($sql); <td>'.$row['product_id'].'</td>
                        //<td align="center">https://diben.000webhostapp.com/info1.php?product_id='.$row['product_id'].'</td>
						if (mysqli_num_rows($query1) > 0) 
						{                                         
    
   						while($row = mysqli_fetch_array($query1)) 
						{
			echo '<tr>
					
					<td>'.$row['product_name'].'</td>
					<td>'.$row['battery'].'</td>
					<td>'.$row['build'].'</td>
					<td>'. $row['timestamp'] . '</td>
					<td>'.$row['counter'].'</td>
					
				</tr>';
			
						}}?>
		</tbody>
		<tfoot>
			<!--<tr>
				<th colspan="4">TOTAL</th>
				<th><?=number_format($total)?></th>
			</tr>-->
		</tfoot>
	</table>
    </div>
    </div>
    </div>
    </div>
    
  
  <!-- Le javascript
  ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    


  </body>
</html>
