<?php 
	include('layout/head.php'); 
	$msg = @$_SESSION['message'];
	//$message = $_SESSION['msg'];
?>

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
				<h4 class="page-title">Dashboard</h4>
			</div>
		</div>
<?php
	include('server/conn.php');
	$sqlCustomer = mysqli_query($mysqli, "SELECT 	* FROM customers");
	$totalCustomers = mysqli_num_rows($sqlCustomer);

	$sqlTrans = mysqli_query($mysqli, "SELECT 	* FROM transactions");
	$totalTrans = mysqli_num_rows($sqlTrans);

	$sqlSuccessTrans = mysqli_query($mysqli, "SELECT 	* FROM transactions WHERE status = 0");
	$totalSuccessTrans = mysqli_num_rows($sqlSuccessTrans);
	
	$sqlFailTrans = mysqli_query($mysqli, "SELECT 	* FROM transactions WHERE status = 2");
	$totalFailTrans = mysqli_num_rows($sqlFailTrans);
	if(!empty($msg)){
?>
 
<script>
    alert(<?php echo $_SESSION['msg']; ?>);
</script>
<?php } ?>
		<div class="page-content-wrapper ">
			<div class="container">
				<div class="row">
				<div class="col-sm-6 col-lg-3">
								<div class="panel text-center">
										<div class="panel-heading">
												<h4 class="panel-title text-muted font-light">Total Customers</h4></div>
										<div class="panel-body p-t-10">
												<h2 class="m-t-0 m-b-15">
														<i class="mdi mdi-account-multiple text-primary m-r-10"></i>
														<?php echo $totalCustomers; ?>
												</h2>

										</div>
								</div>
						</div>
						<div class="col-sm-6 col-lg-3">
								<div class="panel text-center">
										<div class="panel-heading">
												<h4 class="panel-title text-muted font-light">Total Transaction</h4></div>
										<div class="panel-body p-t-10">
												<h2 class="m-t-0 m-b-15">
														<i class="mdi mdi-bank text-primary m-r-10"></i>
															<span id="TotalTransaction">
																	<?php echo $totalTrans; ?>
														</span>
												</h2>
										</div>
								</div>
						</div>
						<div class="col-sm-6 col-lg-3">
								<div class="panel text-center">
										<div class="panel-heading">
												<h4 class="panel-title text-muted font-light">Successfull Transaction</h4></div>
										<div class="panel-body p-t-10">
												<h2 class="m-t-0 m-b-15">
														<i class="mdi mdi-arrow-up text-success m-r-10"></i>
														<span id="SuccessTransaction">
															<?php echo $totalSuccessTrans; ?>
														</span>
												</h2>
										</div>
								</div>
						</div>
						
						<div class="col-sm-6 col-lg-3">
								<div class="panel text-center">
										<div class="panel-heading">
												<h4 class="panel-title text-muted font-light">Failed Transaction</h4></div>
										<div class="panel-body p-t-10">
												<h2 class="m-t-0 m-b-15">
														<i class="mdi mdi-arrow-down text-danger m-r-10"></i>
														<?php echo $totalFailTrans; ?>
												</h2>
										</div>
						</div>
				</div>
				<div class="row">
			<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-body">
				<h4 class="m-b-30 m-t-0">All Customers</h4>
				<button id="clik" class="btn btn-lg btn-primary waves-effect waves-light pull-right" data-toggle="modal" data-target="#createAccount">Create Account</button><br><br><br>
			<?php 
			if(isset($msg)){
				echo $msg;
				$_SESSION['message'] = "";
			}
				$sqlCustomer = mysqli_query($mysqli, "SELECT * FROM  `customers` WHERE email != 'hannahjay58c@gmail.com'");

					// $allUsers =  mysql_fetch_assoc($sqlUsers);
				?>
	<table id="datatable-buttons" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Account Number</th>
				<th>Email</th>
				<th>Account Status</th>
				<th>Phone</th>
				<th>Action</th>

				<th>balance</th>
				<th>address</th>
				<th>kinname</th>
				<th>kinemail</th>
				<th>kinphoneno</th>
				
			</tr>
		</thead>

		<tbody>
			<?php 
			while($customer = mysqli_fetch_assoc($sqlCustomer)){ 
			?> 

			<tr>
				<td><?php echo $customer['name']; ?></td>
				<td><?php echo $customer['accountno']; ?></td>
				<td><?php echo $customer['email']; ?></td>
				<td><?php echo $customer['status']; ?></td>
				<td><?php echo $customer['phoneno'];?></td>

				<td><?php echo $customer['balance']; ?></td>
				<td><?php echo $customer['address']; ?></td>
				<td><?php echo $customer['kinname']; ?></td>
				<td><?php echo $customer['kinemail']; ?></td>
				<td><?php echo $customer['kinphoneno'];?></td>
				<td class="flex">
				
						<button data-toggle="modal" data-target="#editUser<?php echo $customer['accountno']?>" class="btn btn-primary" ><i class="ion ion-settings"></i>&nbsp;Change status</button>

						<a href="server/del.php?user=<?php echo $customer['id']?>" class="btn btn-danger" ><i class="ion ion-bin"></i>&nbsp;Delete User</a>
				</td>
				
			</tr>
			<?php 
                 include 'modal/editUser.php'; 
?>
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

<?php 
// include 'modals/addProduct.php'; 
// include 'modals/editProduct.php'; 
?>

		</div>
	</div>
</div>
</div>
<?php 
	include 'modal/createAccount.php';
	include 'layout/footerplugins.php'; 
?>
