<?php
  include("server/session.php"); 
  include("server/conn.php");
  $userSql = mysqli_query($mysqli, "SELECT * FROM customers WHERE accountno = $cusID");
  $user =  mysqli_fetch_assoc($userSql);
  
  $sql = mysqli_query($mysqli, "SELECT * FROM beneficiary WHERE ownerID = $cusID");
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
            <div class="card col-sm-12">
              <div class="card-block container">
                <div class="m-b-1">
                <br>
                <h5>All Beneficiary</h5>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped m-b-0">
                    <thead class="bg-orange">
                      <tr>
                    <th>Account Number</th>
                    <th>Name</th>
                    <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                          <?php
                            while($ben = mysqli_fetch_array($sql)){
                        ?>
                      <tr>
                        <td><?php echo $ben['accountno']; ?></td>
                        <td><?php echo $ben['name']; ?></td>
                        <td><a href="server/deleteben.php?id=<?php echo $ben['accountno']; ?>" class="btn btn-success">Delete</a></td>
                      </tr>
                       <?php } ?>
                    </tbody>
                  </table>
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

      <!-- Modals -->
  
      <div class="modal fade" id="statement" tabindex="-1" role="dialog" aria-labelledby="statementModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Choose Date</h5>
        <button type="button" class="pull-right close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
                      <fieldset class="form-group">
                        <label for="exampleInputEmail1">
                          From
                        </label>
                        <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Enter email"/>
                      </fieldset>
                      <fieldset class="form-group">
                        <label for="exampleInputPassword1">
                          TO
                        </label>
                        <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Password"/>
                      </fieldset>
                      <button type="submit" class="btn btn-primary">
                        Submit
                      </button>
                    </form>
      </div>
    </div>
  </div>
</div>
<!--/ Modal -->


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
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
<script type="text/javascript" src="dist/js/pignose.calendar.full.min.js"></script>
    
  </body>
</html>
