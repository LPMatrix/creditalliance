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
	<link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
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
				<h4 class="page-title">Customer</h4>
			</div>
		</div>
<?php
	include("inc_files/conn.php");
	$id = $_REQUEST['id'];
	$sele = mysql_query("SELECT * FROM customer WHERE Cust_Id = '$id'") or die(mysql_error());
	$sql = mysql_query("SELECT * FROM `order` INNER JOIN `products` ON `order`.`product_id` = `products`.`product_id` INNER JOIN `customer` ON order.customer_id = customer.Cust_id INNER JOIN category On category.category_id = products.category_id WHERE order.order_id ='$id'") or die(mysql_error());
?>
		<div class="page-content-wrapper ">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-primary">
							<div class="panel-body">
								<h4 class="m-b-10 m-t-0">Single Customer Record</h4>
								<div class="row">
									<div class="col-lg-4">
										<div class="panel panel-color panel-info" style="background-color: #fff;">
											<div class="panel-heading">
												<h3 class="panel-title"><i class="mdi mdi-account"></i> Customer Detail</h3>
											</div>
											<?php 
												$row = mysql_fetch_assoc($sele); 
											?>
											<div class="panel-body" style="color: black;">
												<div class="row">
													<div class="col-sm-2 col-xs-2">
														<i  class="mdi mdi-account-box text-info" style="font-size: 2rem !important;"></i>
													</div>
													<div class="col-sm-10 col-xs-10">
														<span><?php echo $row['FullName']; ?></span>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-2 col-xs-2">
														<i  class="mdi mdi-email text-info" style="font-size: 2rem !important;"></i>
													</div>
													<div class="col-sm-10 col-xs-10">
														<span><?php echo $row['Email']; ?></span>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-2 col-xs-2">
														<i  class="mdi mdi-phone text-info" style="font-size: 2rem !important;"></i>
													</div>
													<div class="col-sm-10 col-xs-10">
														<span><?php echo $row['Phone']; ?></span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-2"></div>
									<div class="col-lg-6">
										<div class="panel panel-color panel-info" style="background-color: #fff;">
											<div class="panel-heading">
												<h3 class="panel-title"><i class="mdi mdi-home-variant" ></i> Address Detail</h3>
											</div>
											<div class="panel-body" style="color: black;">
												<div class="row">
													<div class="col-sm-2 col-xs-2" style="vertical-align: middle;">
														<i  class="mdi mdi-home-map-marker text-info" style="font-size: 2.5rem !important; margin-top: 20px;"></i>
													</div>
													<div class="col-sm-10 col-xs-10">
														<span style="white-space: normal; text-overflow: ellipsis; overflow: hidden;"><?php echo $row['Adress']; ?></span><br>
														<span><?php echo $row['PostalCode']; ?></span><br>
														<span><?php echo $row['City'].", ".$row['Country'];; ?></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="panel panel-primary">
											<div class="panel-body">
												<h4 class="m-b-10 m-t-0">Product</h4>
												<div class="row">
													<div class="col-xs-12">
														<table class="table table-bordered">
															<thead>
																<tr>
																	<th>Product</th>
																	<th>Model</th>
																	<th>Quantity</th>
																	<th>Status</th>
																	<th>Unit Price</th>
																	<th>Total</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	while ($row2 = mysql_fetch_assoc($sql)) {
																?>
																<tr>
																	<td>
																		<span><?php echo $row2['product_name']; ?></span><br>
																		<span><?php echo $row2['sku']; ?></span><br>
																		<span><?php echo $row2['category_name']; ?></span><br>
																	</td>
																	<td><span><?php echo $row2['description']; ?></span><br></td>
																	<td><span><?php echo $row2['order_quantity']; ?></span><br></td>
																	<td><span><?php echo $row2['order_status']; ?></span><br></td>
																	<td><span><?php echo $row2['order_price']; ?></span><br></td>
																	<td><span><?php echo $row2['total_price']; ?></span><br></td>
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
									</div>
								</div>
				   		</div>
				  	</div>
		 			</div>
				</div>
		</div>
	</div>
</div>
<?php 
	require('inc_files/approve_order.php');
	include 'layout/footerplugins.php'; 
?>

</html>
