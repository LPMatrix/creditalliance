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
                <h4><span id="greeting"></span><?php $fullname = explode(" ", $user['name']); echo $fullname[1];?></h4><br>
                 <h5><span class="text-orange">Your Last Login:&nbsp;<?php echo $user['lastlogin']; ?></span></h5>
                <h5><span class="text-orange">Account Number:</span>&nbsp;<?php echo $user['accountno']; ?></h5>
                <br>
                <div class="col-lg-3"></div>
                <div class="col-lg-6 col-md-offset-2">
                  <div class="card-block">
                    <form method="POST" name="beneForm" id="beneForm">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Account Number</label>
                        <div class="col-xs-12">
                          <input class="form-control" type="text" name="AccountNo" placeholder="Account Number" id="AccountNo">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="" class="col-form-label">Account Name</label>
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="beneName" placeholder="Account Name" id="beneName">        
                        </div>
                      </div>

                      <div class="form-group">
                      <label for="" class="col-form-label">Bank Name</label>
                      <div class="col-xs-12">
                          <input class="form-control" type="text" name="bank" placeholder="Bank Name" id="bank">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="" class="col-form-label">Bank Address</label>
                      <div class="col-xs-12">
                          <input class="form-control" type="text" name="address" placeholder="Bank Address" id="bank">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="" class="col-form-label">Country</label>
                      <div class="col-xs-12">
                          <input class="form-control" type="text" name="country" placeholder="Country" id="bank">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="" class="col-form-label">IBAN Nr</label>
                      <div class="col-xs-12">
                          <input class="form-control" type="text" name="iban" placeholder="IBAN Nr" id="bank">
                        </div>
                      </div>
                      
                        <button type="button" id="savebtn" class="btn btn-primary form-control" style="margin-top: 5px" onclick="Save()">Save</button>
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
    <script src="../js/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- end page scripts -->

    <!-- initialize page scripts -->
    <!-- <script src="scripts/dashboard/dashboard.js"></script> -->
    <!-- end initialize page scripts -->
    <script>
      // import Swal from 'sweetalert2'

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

function HideBene(){
      $("#AccName").hide();
      $("#AccountError").hide();
}

function CheckBeneficiary(){
    var AccountNo = $("#AccountNo").val();
      $.ajax({
      url: "server/CheckAccount.php",
      type: "POST",
            cache: false,
    data: {
              AccountNo:AccountNo
          },
    success: function(Response){
       if(Response == "null"){
           $("#AccountError").show();
           $("#AccountNo").focus();
           $("#savebtn").attr("disabled",true);
       }else{
           $("#beneName").show();
           $("#AccountError").hide();
           $("#beneName").attr("Value", Response);
            $("#savebtn").removeAttr("disabled",false);
       }
    }
    });
  }
 function Save(){

     var  datastring = $("#beneForm").serialize();
     $.ajax({
      url: "server/saveBene.php",
      type: "POST",
            cache: false,
      data:datastring,
          success: function(Response){
            // alert(Response);
              if(Response == "success"){
               // alert(Response);
                Swal.fire({
                    type: 'success',
                    title: 'Beneficiary added successfully',
                  }).then(function(){ 
                    location.reload();
                    }
                  );
              } else if(Response == "exist"){
               // alert(Response);
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Beneficiary already exist',
                  }).then(function(){ 
                    location.reload();
                    }
                  );
              }else if(Response == "fail"){
                  Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Sorry beneficiary was not added, please try again',
                  }).then(function(){ 
                    location.reload();
                    }
                  );
              }
              
      }
    });
 }
  
  
   

    </script>
  </body>
</html>
