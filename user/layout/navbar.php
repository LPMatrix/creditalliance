<?php 
  $useSql = mysqli_query($mysqli, "SELECT * FROM customers WHERE accountno = $cusID");
  $user =  mysqli_fetch_assoc($useSql);
?>

<nav class="navbar navbar-default navbar-static-top">
          <div class="container-fluid" style="margin-top:15px;">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">
                <b>Creed Bank</b>
              </a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
              <ul class="nav navbar-nav navbar-right" style="margin-left:-20px !important;">
                <li><a><b>Balance</b>
                <span style="color:#dc3545 !important; font-size: 1.1em;">&nbsp;&dollar;&nbsp;<b>
                  <?php
                    echo $user['balance'];
                  ?>
                </b>
              </span></a></li>
                <li><a>&nbsp;&nbsp;</a></li>
                <li class="dropdown ">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                   <span style="background:#dc3545; padding:10px; color:#fff; border-radius:20px;">
                   ACC NO&nbsp;&nbsp;
                  <?php
                    echo $user['accountno'];
                  ?>
                   &nbsp;
                   <span class="caret"></span></a></span>
                   
                    <ul class="dropdown-menu" role="menu">
                      <li class="dropdown-header">SETTINGS</li>
                      <li class="divider"></li>
                      <li><a href="#">Logout</a></li>
                    </ul>
                  </li>
                  <li><a>&nbsp;&nbsp;</a></li>
                  <li><a>&nbsp;&nbsp;</a></li>
                  <li><a>&nbsp;&nbsp;</a></li>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
