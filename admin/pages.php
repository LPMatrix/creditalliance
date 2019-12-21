 <!DOCTYPE html>
<?php require 'server/conn.php'; ?>
<html>
<head>
	<meta charset="utf-8" />
	<title>Hajj Mabrur - CMS / PMS </title>
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
</head>

<body class="fixed-left">
	<div id="wrapper">
		<!-- Navtop file -->
		<?php include 'layout/navtop.php'; ?>
	</div>
</div>


<div class="content-page">
	<div class="content">
		<div class="">
			<div class="page-header-title">
				<h4 class="page-title">CMS / PMS</h4>
			</div>
		</div>

		<div class="page-content-wrapper ">
			<div class="container">
	
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-body">
				<h4 class="m-b-30 m-t-0">Pages</h4>
				<?php 
					// $allUsers =  mysql_fetch_assoc($sqlUsers);
				?>
	<table id="datatable-buttons" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Customer ID</th>
				<th>Phone Number</th>
				<th>E-mail</th>
				<th>Action</th>
				
			</tr>
		</thead>

		<tbody>
			<?php 
			$sqlpages =  mysql_query("SELECT * FROM pages");
			while($pages = mysql_fetch_assoc($sqlpages)){ ?>  

			<tr>
				<td><?php echo $pages['page']; ?></td>
				<td><?php //echo $allUsers['customerID']; ?></td>
				<td><?php //echo $allUsers['phone']; ?></td>
				<td><?php //echo $allUsers['email']; ?></td>
				<td>2011/04/25</td>
				
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
<?php include 'layout/footerplugins.php'; ?>
<!-- Mirrored from themesdesign.in/appzia/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 31 Mar 2018 07:37:29 GMT -->
</html>


