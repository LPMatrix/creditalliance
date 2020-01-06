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
      <div class="col-md-6 col-md-offset-3">  
        <div class="panel panel-default card2">
          <div class="panel-heading bg-white">
            Fund your Account
          </div>
          <div class="panel-body">
            <div class="col-md-8 col-md-offset-2">
<form id="fundAccount" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Amount</label>
    <input type="number" name="amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Amount">
  </div>
  <div class="form-group">
    <label for="fromAccount">From (Account No)</label>
    <input type="number" class="form-control" id="fromAccount" name="fromAccount" placeholder="Fund account from (Account No)">
  </div>
  <button type="button" onclick="fundAccount();" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
    </div>
    </div>
      </div>
      
    </div>
  </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.min.js"></script> -->
    <script src="../js/app.js"></script>
  </body>
</html>