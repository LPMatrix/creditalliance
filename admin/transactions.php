<?php include('layout/head.php'); ?>

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
				<h4 class="page-title">Transaction</h4>
			</div>
		</div>
<?php
	include('inc_files/conn.php');
?>
		<div class="page-content-wrapper ">
			<div class="container">
				<div class="row">
			<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-body">
				<h4 class="m-b-30 m-t-0">Transactions that require code to complete</h4>
				<?php 
				include("server/conn.php");
				$sqlTrans = mysqli_query($mysqli, "SELECT * FROM  `transactions` WHERE `status` = 1");

					// $allUsers =  mysql_fetch_assoc($sqlUsers);
				?>
	<table id="datatable-buttons" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Transaction ID</th>
				<th>Amount</th>
				<th>Status</th>
				<th>Action</th>
				
			</tr>
		</thead>

		<tbody>
			<?php 
			while($trans = mysqli_fetch_assoc($sqlTrans)){ 
				// $loc = 'upload/'.$product['picture'];
			?> 

			<tr>
				<td><?php echo $trans['transID']; ?></td>
				<td><?php echo $trans['amount']; ?></td>
        <td>
          <?php 
            if($trans['status'] == 0){
              echo 'Successful';
            }elseif($trans['status'] == 1 ){
              echo "Pending";
          
            }else{
              echo "Faild";
            }
          ?>
        </td>
				<td class="flex">
					<button title="Send Code" id="<?php echo $trans['transID']?>" class="btn btn-primary openBtn" data-toggle="modal" data-target="#editP 	roduct<?php echo $trans['id']; ?>">
						<i class="ion ion-checkmark"></i>&nbsp; Send Code
					</button>&nbsp; &nbsp;
					<a href="inc_files/deactivate.php?id=<?php echo $trans['transID']?>" title="Cancel" class="btn btn-danger"><i class="ion ion-close"></i>&nbsp; Declined</a>
				</td>
				
			</tr>
			<?php 
                // include 'modals/addProduct.php'; 
                // include 'modals/editProduct.php'; 
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

<?php 
// include 'modals/CreateAccount.php'; 
// include 'modals/editProduct.php'; 
?>

		</div>
	</div>
</div>
</div>
<?php include 'layout/footerplugins.php'; ?>
</html>
