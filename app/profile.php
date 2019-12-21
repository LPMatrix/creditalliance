<?php
  include("server/session.php"); 
  include("server/conn.php");
  $userSql = mysqli_query($mysqli, "SELECT * FROM customers WHERE accountno = $cusID");
  $user =  mysqli_fetch_assoc($userSql);
  
  $transSql = mysqli_query($mysqli, "SELECT * FROM transactions WHERE userID = $cusID");
?>
<?php include("layout/head.php") ?>

<?php 
    if (isset($_POST['pass'])) {
      $password = $_POST['password'];
      $cpassword= $_POST['cpassword'];

      if ($password == $cpassword) {
        # code...
        $password = md5($password);
        mysqli_query($mysqli, "UPDATE customers SET password = '$password' WHERE accountno = $cusID") or die($mysqli->error);
        echo "<script>alert('Password Successfully changed'); window.location = 'profile.php';</script>";
      }else{
        echo "<script>alert('Paswords don\'t match'); window.location = 'profile.php';</script>";
      }
    }
 ?>
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
                
                <h5>My Profile</h5
                <br>
                <div class="col-lg-3"></div>
                <div class="col-lg-6 col-md-offset-2">
                  <div class="card-block">
                    <form method="POST" action="server/transfer.php" name="transferForm" id="transferForm">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-xs-2 col-form-label" style="padding-right:10px">Name:</label>
                        <div class="col-xs-10">
                          <input class="form-control" type="text" name="name" value="<?php echo $user['name']; ?>" style="border:0px;margin-left:10px;">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="example-text-input" class="col-xs-2 col-form-label" style="padding-right:10px">Email:</label>
                        <div class="col-xs-10">
                          <input class="form-control" type="text" name="email" value="<?php echo $user['email']; ?>" style="border:0px; margin-left:10px;">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="example-text-input" class="col-xs-2 col-form-label" style="padding-right:10px">Phone number:</label>
                        <div class="col-xs-10">
                          <input class="form-control" type="text" name="phoneno" value="<?php echo $user['phoneno']; ?>" style="border:0px; margin-left:10px;">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="example-text-input" class="col-xs-2 col-form-label" style="padding-right:10px">Address:</label>
                        <div class="col-xs-10">
                          <input class="form-control" type="text" name="address" value="<?php echo $user['address']; ?>" style="border:0px; margin-left:10px;">
                        </div>
                      </div>
                      <h4><b>Next of Kin Details</b></h4>
                      <div class="form-group row">
                        <label for="example-text-input" class="col-xs-2 col-form-label" style="padding-right:10px">Name :</label>
                        <div class="col-xs-10">
                          <input class="form-control" type="text" name="kinname" value="<?php echo $user['kinname']; ?>" style="border:0px; margin-left:10px;">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="example-text-input" class="col-xs-2 col-form-label" style="padding-right:10px">Email :</label>
                        <div class="col-xs-10">
                          <input class="form-control" type="text" name="kinemail" value="<?php echo $user['kinemail']; ?>" style="border:0px; margin-left:10px;">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="example-text-input" class="col-xs-2 col-form-label" style="padding-right:10px">Name :</label>
                        <div class="col-xs-10">
                          <input class="form-control" type="text" name="kinphoneno" value="<?php echo $user['kinphoneno']; ?>" style="border:0px; margin-left:10px;">
                        </div>
                      </div>
                 
                      <div class="form-group row">
                        <div class="col-sm-offset-6 col-sm-6">
                          <a href="editprofile.php" class="btn btn-primary">
                              Edit Profile
                          </a>
                        </div>
                      </div>
                    </form>

                    <form method="POST" action="profile.php">
                        <div class="form-group row">
                        <label for="example-text-input" class="col-xs-2 col-form-label">New Pasword:</label>
                        <div class="col-xs-10">
                          <input class="form-control" type="password" name="password">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="example-text-input" class="col-xs-2 col-form-label">Confirm Password:</label>
                        <div class="col-xs-10">
                          <input class="form-control" type="password" name="cpassword" >
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-offset-6 col-sm-6">
                          <button type="submit" class="btn btn-primary" name="pass">
                              Update password
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



    </script>
  </body>
</html>
