<?php include("server/session.php"); ?>
<?php include("server/conn.php"); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/style.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.min.css">
   

    <title>Creed Bank User</title>
  </head>
  <body>
    <header>
      <?php include("layout/navbar.php"); ?>
    </header>
    <main>
      <div class="container-fluid main-container">
       <?php include("layout/sidebar.php"); ?>
    <div class="col-md-11 content">
      <div class="col-md-6">  <div class="panel panel-default card2">
          <div class="panel-heading bg-white">
            Transactions Details
          </div>
          <div class="panel-body">
            
            <?php
             // session_start();
              $sql = mysqli_query($mysqli, "SELECT * FROM transactions WHERE userID = $cusID");
              while($row = mysqli_fetch_array($sql)){
            ?>
            <div class="transaction">
              <?php 
                if($row[4] == '0'){ ?>
                  <div class="transaction-content">
                    Credit from 
                  </div>
                  <div class="transaction-amount">$<?php echo $row['credit']; ?></div>
              <?php 
                }else{
              ?>
                  <div class="transaction-content">Debit from 343423143433</div>
                  <div class="transaction-amount">$<?php echo $row['debit']; ?></div>
                <?php }?>
          </div>
                <?php } ?>
      </div>
    </div>
    </div>
      <div class="col-md-3">
          <div class="panel panel-default card2">
              <div class="panel-body">
                <div class="img img-circle" style="text-align:center;">
                    <img style="height:100px; width:100px;" src="../admin/upload/<?php $user['accoutno']; ?>" class="img img-circle" >
                </div>
              </div>
            </div>
      </div>
      <div class="col-md-3">
          <div class="panel panel-default card2">
              <div class="panel-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </div>
            </div>
      </div>
    
      </div>
      
    </div>
  </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.min.js"></script> -->
    <script src="../js/app.js"></script>
  </body>
</html>