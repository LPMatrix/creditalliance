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
      <?php //include("layout/sidebar.php"); ?>
      <!-- /sidebar panel -->
      <!-- content panel -->
      <div class="main-panel">
        <!-- top header -->
        <?php //("layout/topnav.php"); ?>
        <!-- /top header -->

        <!-- main area -->
        <div class="main-content">
          <div class="content-view">
            <?php //include("layout/navlinks.php"); ?>
            <br>
            <div class="card">
              <div class="card-block">
                <div class="m-b-1">
                  <div class="align-center">
                    <h3>Transaction Declined contact the administrator to activate your account</h3>
                    <a href="index.php" class="btn btn-primary">Go back</a>
                  </div>
              </div>
            </div>
          </div>
      
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
   

    </script>
  </body>
</html>
