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
				<h4 class="page-title">Debit or Credit</h4>
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

				<?php 
				include("server/conn.php");
				$sqlTrans = mysqli_query($mysqli, "SELECT * FROM  `transactions`");

					// $allUsers =  mysql_fetch_assoc($sqlUsers);
				?>

				   <form method="POST" action="server/action.php" name="actionForm" >
				   	<div class="form-group row">
				   		<label for="action" class="col-xs-2 col-form-label">Select Action</label>
                    <div class="col-xs-10">
                          <select class="form-control" name="type" id="action">
                            <option selected disabled>Select Action</option>
                            <option value="1">Credit</option>
                            <option value="2">Debit</option>
                          </select>
                        </div>
                    </div>
                      <div class="form-group row">
                        <label for="toAccount" class="col-xs-2 col-form-label">Select Account</label>
                        <div class="col-xs-10">
                        <small style="color:red; display:none;" id="benError">
                            Account field is required
                          </small>
                          <select class="form-control" name="account" id="toAccount">
                            <option selected disabled>Select Account</option>
                            <?php 
                              $benSql = mysqli_query($mysqli, "SELECT * FROM `customers` WHERE id != 9");
                              while($ben = mysqli_fetch_array($benSql)){
                            ?>
                            <option><?php echo $ben['name'].' ( '.$ben['accountno'].' )'; ?></option>
                            <?php
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="example-text-input" class="col-xs-2 col-form-label">Amount</label>
                        <div class="col-xs-10">
                        <small style="color:red; display:none;" id="amountError">
                            Amount field is required
                          </small>
                          <input class="form-control" type="text" name="amount" id="amount" placeholder="Enter Amount">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="example-text-input" class="col-xs-2 col-form-label">Date</label>
                        <div class="col-xs-10">
                        <small style="color:red; display:none;" id="amountError">
                            Date field is required
                          </small>
                          <input class="form-control" type="date" name="date" id="date">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-offset-6 col-sm-6">
                          <button type="submit" class="btn btn-primary" name="debit">
                              Continue
                          </button>
                        </div>
                      </div>
                    </form>

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
