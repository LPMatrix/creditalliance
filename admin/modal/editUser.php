<div id="editUser<?php echo $customer['accountno']?>" class="modal fade" tabindex="-1" role="dialog"
aria-labelledby="custom-width-modalLabel" aria-hidden="true" style=
"display: none">
  <div class="modal-dialog" style="margin: 10px auto;">
  <form id="AccountInfo" action="server/updateUser.php" method="post">
      <div class="modal-content panel panel-primary">
        <div class="modal-header">
          <button type="button" class="close" style=
          "font-size: 35px; color: red;" data-dismiss="modal"
          aria-hidden="true">×</button>
          <h4 class="modal-title" style="color: #fff;" id=
          "custom-width-modalLabel">
            Change Account Status
          </h4>
        </div>
        <div class="modal-body panel-body">
          <div class="row">
              <div class="container">
                   <div class="form-group">
                  <label>Account Status</label>
                  <select class="form-control" id="status" name="status" required>
                      <option selected disabled>Choose account status</option>
                      <option>Ask for Code</option>
                      <option>Transaction Successful</option>
                      <option>Transaction Declined</option>
                  </select>
                  <input type="hidden" name="user" value="<?php echo $customer['accountno']; ?>" >
                </div>
              </div>
                
    
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class=
          "btn btn-default waves-effect" data-dismiss=
          "modal">Close</button> <button name="submit" type="submit" id=
          "addtestimonybtn" class=
          "btn btn-primary waves-effect waves-light">Update Account</button>
        </div>
      </div>
    </form>
  </div>
</div>