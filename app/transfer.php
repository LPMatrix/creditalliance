<?php
  include("server/session.php"); 
  include("server/conn.php");
  $userSql = mysqli_query($mysqli, "SELECT * FROM customers WHERE accountno = $cusID");
  $user =  mysqli_fetch_assoc($userSql);
  
  $transSql = mysqli_query($mysqli, "SELECT * FROM transactions WHERE userID = $cusID");
?>
<?php include("layout/head.php") ?>
<body>

    <div class="app">
      <!--sidebar panel-->
      <?php include("layout/sidebar.php"); ?>
      <!-- /sidebar panel -->
      <!-- content panel -->
      <div class="main-panel">
        <!-- top header -->
        <?php include("layout/topnav.php"); ?>
        <!-- /top header -->

        <!-- main area -->
        <div class="main-content">
          <div class="content-view">
            <?php include("layout/navlinks.php"); ?>
            <br>
            <div class="card">
              <div class="card-block">
                <div class="m-b-1">
                  <div>
                    
                  </div>
                 <h4><span id="greeting"></span><?php $fullname = explode(" ", $user['name']); echo $fullname[1];?></h4>
                <h5><span class="text-orange">Your Last Login:&nbsp;<?php echo $user['lastlogin']; ?></span></h5>
                <h5><span class="text-orange">Account Number:</span>&nbsp;<?php echo $user['accountno']; ?></h5
                <br>
                <div class="col-lg-3"></div>
                <div class="col-lg-6 col-md-offset-2">
                  <div class="card-block">
                    <form method="POST" action="server/transfer.php" name="transferForm" id="transferForm">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-xs-2 col-form-label">From</label>
                        <div class="col-xs-10">
                          <input class="form-control" type="text" name="from" id="fromAccount" value="<?php echo $user['accountno']; ?>" disabled id="fromAcount">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="toAccount" class="col-xs-2 col-form-label">Transfer type</label>
                        <div class="col-xs-10">
                        <small style="color:red; display:none;" id="benError">
                            Beneficiary field is required
                          </small>
                          <select class="form-control" name="transfer" required="required" id="transfer">
                            <option value="0">Local Transfer</option>
                            <option value="1">International Transfer</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row" style="display: none;" id="show1">
                        <label for="" class="col-xs-2 col-form-label">Country</label>
                        <div class="col-xs-10">
                          <input class="form-control" type="text" name="country" id="country" placeholder="Country">
                        </div>
                      </div>


                      <div class="form-group row" style="display: none;" id="show2">
                        <label for="" class="col-xs-2 col-form-label">IBAN Nr</label>
                        <div class="col-xs-10">
                          <input class="form-control" type="text" name="iban" id="iban" placeholder="IBAN Nr">
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="toAccount" class="col-xs-2 col-form-label">To</label>
                        <div class="col-xs-10">
                        <small style="color:red; display:none;" id="benError">
                            Beneficiary field is required
                          </small>
                          <select class="form-control" name="to" id="toAccount">
                            <option selected disabled>Select beneficiary</option>
                            <?php 
                              $benSql = mysqli_query($mysqli, "SELECT * FROM `beneficiary` WHERE `ownerID` = '$cusID'");
                              while($ben = mysqli_fetch_array($benSql)){
                            ?>
                            <option><?php echo $ben['name'].' ( '.$ben['accountno'].' )'; ?></option>
                            <?php
                              }
                            ?>
                          </select>
                          <stong class="text-muted">
                              You don't have beneficiary on the list? &nbsp;<a href="addbeneficiary.php" style="text-decoration:underlined; color:blue;">Add it here</a>
                          </stong>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="example-text-input" class="col-xs-2 col-form-label">Amount</label>
                        <div class="col-xs-10">
                        <small style="color:red; display:none;" id="amountError">
                            Amount field is required
                          </small>
                          <input class="form-control" type="text" name="amount" id="amount" placeholder="Enter Amount" id="money">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-offset-6 col-sm-6">
                          <button type="submit" class="btn btn-primary">
                              Continue
                          </button>
                        </div>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- bottom footer -->
          <div class="content-footer">
            <nav class="footer-right">
              <ul class="nav">
                <li>
                  <a href="javascript:;">Feedback</a>
                </li>
              </ul>
            </nav>
            <nav class="footer-left">
              <ul class="nav">
                <li>
                  <a href="javascript:;">
                    <span>Copyright</span>
                    &copy; <?php echo Date("Y"); ?> &nbsp;Credit Allliance
                  </a>
                </li>
                <li class="hidden-md-down">
                  <a href="javascript:;">Privacy</a>
                </li>
                <li class="hidden-md-down">
                  <a href="javascript:;">Terms</a>
                </li>
                <li class="hidden-md-down">
                  <a href="javascript:;">help</a>
                </li>
              </ul>
            </nav>
          </div>
          <!-- /bottom footer -->
        </div>
        <!-- /main area -->
      </div>
      <!-- /content panel -->

      <!--Chat panel-->

      <!--/Chat panel-->

    </div>

    <script type="text/javascript">
      window.paceOptions = {
        document: true,
        eventLag: true,
        restartOnPushState: true,
        restartOnRequestAfter: true,
        ajax: {
          trackMethods: [ 'POST','GET']
        }
      };
    </script>

    

    <!-- build:js({.tmp,app}) scripts/app.min.js -->
    <script src="vendor/jquery/dist/jquery.js"></script>
    <script src="vendor/pace/pace.js"></script>
    <script src="vendor/tether/dist/js/tether.js"></script>
    <script src="vendor/bootstrap/dist/js/bootstrap.js"></script>
    <script src="vendor/fastclick/lib/fastclick.js"></script>
    <script src="scripts/constants.js"></script>
    <script src="scripts/main.js"></script>
    <!-- endbuild -->

    <!-- page scripts -->
    <script src="vendor/flot/jquery.flot.js"></script>
    <script src="vendor/flot/jquery.flot.resize.js"></script>
    <script src="vendor/flot/jquery.flot.stack.js"></script>
    <script src="vendor/flot-spline/js/jquery.flot.spline.js"></script>
    <script src="vendor/bower-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="data/maps/jquery-jvectormap-us-aea.js"></script>
    <script src="vendor/jquery.easy-pie-chart/dist/jquery.easypiechart.js"></script>
    <script src="vendor/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
    <script src="scripts/helpers/noty-defaults.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.26.28/sweetalert2.min.js"></script>
    <!-- end page scripts -->

    <!-- initialize page scripts -->
    <!-- <script src="scripts/dashboard/dashboard.js"></script> -->
    <!-- end initialize page scripts -->

    <script type="text/javascript">
    $(document).ready(function(){
      $("#transfer").change(function(){
        transfer = $("#transfer").val();
        // alert(transfer);
        if (transfer == 1){
          $('#show1').css('display','block');
          $('#show2').css('display','block');
        }else{

          $('#show1').css('display','none');
          $('#show2').css('display','none');
        }
      }).change();
    });
    </script>


    <script>

      
var today = new Date();
var hourNow = today.getHours();
var greeting ;

  if (hourNow > 18) {
    greeting = 'Good evening, ';
  } else if (hourNow > 12) {
    greeting = 'Good afternoon, ';
  } else if (hourNow > 0) {
    greeting = 'Good morning, ';
  } else {
    greeting = 'Welcome, ';
  }
$("#greeting").append(greeting);


function Transfer(){
    var to = $("#toAccount").val();
    var amount = $("#amount").val();
    if(to == null){
      $("#benError").show();
      $("#toAccount").focus();
    } else if(amount == ""){
      $("#amountError").show();
      $("#amount").focus();
    } else{
      $.ajax({
			url: "server/transfer.php",
			type: "POST",
            cache: false,
			data: {
            toAccount:to,
            amount:amount
          },
					success: function(Response){
            alert(Response);
              if(Response == "declined"){
                swal({
                    position: 'top-end',
                    type: 'error',
                    title: 'Oops...',
                    text: 'Sorry are not able to perfore transaction at the moment pleas contact you account officer!',
                  }).then(function(){ 
                    location.reload();
                    }
                  );
              } else if(Response == "toAccDeclined"){
                swal({
                    position: 'top-end',
                    type: 'error',
                    title: 'Oops...',
                    text: 'Sorry you can not transfer to the beneficiary selected. Please, contact you acount officer!',
                  }).then(function(){ 
                    location.reload();
                    }
                  );
              }else if(Response == "code"){
                  window.location="completetransaction.php"
              }
			}
    });
  }
   
}

    </script>
  </body>
</html>
