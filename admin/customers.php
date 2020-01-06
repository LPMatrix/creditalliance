<?php
session_start();

if( !isset($_SESSION['login_username']) ){
  echo "<script>alert('Login required'); window.location.assign('index.php');</script>";
  exit();
}
?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>New Look - CMS / PMS </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta content="Admin Dashboard" name="description" />
	<meta content="ThemeDesign" name="author" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="shortcut icon" href="assets/images/favicon.ico">
	<link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css">
	<link href="assets/css/style.css" rel="stylesheet" type="text/css">
	<script src="assets/js/jquery.min.js"></script>
</head>

<body class="fixed-left">
	<div id="wrapper">
		<!-- Navtop file -->
		<?php include 'layout/navtop.php'; ?>
	</div>
</div>

<?php include 'layout/sidebar.php'; ?>

<div class="content-page">
	<div class="content">
		<div class="">
			<div class="page-header-title">
				<h4 class="page-title">Customers</h4>
			</div>
		</div>
<?php
	include("inc_files/conn.php");   
	$sql = mysql_query("SELECT * FROM `customer`") or die(mysql_error());
?>
		<div class="page-content-wrapper ">
			<div class="container">
			
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-primary">
							<div class="panel-body">
								<h4 class="m-b-30 m-t-0">All Customers</h4>
								<table id="datatable" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>Username</th>
											<th>Fullname</th>
											<th>Email</th>
											<th>Phone No</th>
											<th>Address</th>
											<th>Action</th>				
										</tr>
									</thead>
									<tbody>
										<?php 
										while($row = mysql_fetch_assoc($sql)){ 
										?> 

										<tr>
											<td><?php echo $row['UserName']; ?></td>
											<td><?php echo $row['FullName']; ?></td>
											<td><?php echo $row['Email']; ?></td>
											<td><?php echo $row['Phone']; ?></td>
											<td><?php echo $row['Adress']." ". $row['City']." ". $row['Country']; ?></td>
											<td>
												<a href="customer_history.php?id=<?php echo $row['Cust_Id']?>" class="btn btn-primary openUser" title="View Record">
													<i class="ion ion-edit"></i>
												</a>
											</td>
											
										</tr>
							<?php
								} 
								?>
						</tbody>
					</table>
				   </div>
				  </div>
		 </div>
</div>

<?php 
include 'modals/addUser.php'; 
include 'modals/editUser.php'; 
?>
</div>
	</div>
</div>
<?php include 'layout/footerplugins.php'; ?>
</html>
