<div id="createAccount" class="modal fade" tabindex="-1" role="dialog"
aria-labelledby="custom-width-modalLabel" aria-hidden="true" style=
"display: none">
  <div class="modal-dialog" style="width:90%;margin: 10px auto;">
  <form action="server/createAccount.php" id="AccountInfo" method="post">
      <div class="modal-content panel panel-primary">
        <div class="modal-header">
          <button type="button" class="close" style=
          "font-size: 35px; color: red;" data-dismiss="modal"
          aria-hidden="true">×</button>
          <h4 class="modal-title" style="color: #fff;" id=
          "custom-width-modalLabel">
            Create Account
          </h4>
        </div>
        <div class="modal-body panel-body">
          <div class="row">
            <div class="col-sm-6 col-xs-12">
              <h3 class="header-title m-t-0"></h3>
              <div class="m-t-10">
                <div class="form-group">
                  <label>Account Number</label>
                  <input type="text" id="AccountNumber" class="form-control"
                  name="AccountNumber" required=""
                  placeholder="Account Number" /> <span id="info" style=
                  "color: red;"></span>
                </div>
                <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" required placeholder="Email Address" />
                    </div>
                </div>  
                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Phone Number</label>
                      <input type="number" class="form-control" name="phoneno" required placeholder="Phone Number">
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                <label>Status</label> 
                  <select class="form-control" name="status" required>
                    <option disabled="disabled" selected=
                    "selected">
                      Select account status
                    </option>
                      <option>Ask for Code</option>
                      <option>Transaction Successful</option>
                      <option>Transaction Declined</option>
                  </select>
              </div>
                </div>  
                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Opening Balance</label>
                      <input type="number" class="form-control" name="balance" required placeholder="Opening Balance">
                    </div>
                </div>
              </div>

<div class="col-sm-12">
                    <div class="form-group">
                      <label>Date</label>
                      <input type="date" class="form-control" name="date" required placeholder="Date">
                    </div>
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <div>
                  <textarea required="" class="form-control"
                    name="address" rows="8">
                  </textarea>
                  </div>
                </div>
             </div>
  
            </div>
            <div class="col-sm-6 col-xs-12">
              <h3 class="header-title m-t-0"></h3>
              <div class="m-t-10">
                <div class="form-group">
                  <label>Customer Name</label> <input type="text"
                  class="form-control" name="name" required=""
                  placeholder="Customer Name" /> <input type=
                  "hidden" value="<?php //echo $staff['id']; ?>"
                  name="id" />
                </div>
                <div class="form-group">
                  <label>Next of Kin's Name</label> <input type="text" class=
                  "form-control" name="nokname" required=""
                  placeholder="Next of Kin's Name" />
                </div>
                <div class="form-group">
                  <label>Next of Kin's Email</label> <input type="text" class=
                  "form-control" name="nokemail" required=""
                  placeholder="Next of Kin's Email" />
                </div>
                <div class="form-group">
                  <label>Next of Kin's Phone</label> <input type="type" class=
                  "form-control" name="nokphoneno" required=""
                  placeholder="Next of Kin's Phone" />
                </div>
                <div class="form-group">
                  <label>Next of Kin's Address</label>
                  <div>
                  <textarea required="" class="form-control"
                    name="nokaddress" rows="4">
                  </textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class=
          "btn btn-default waves-effect" data-dismiss=
          "modal">Close</button> <button name="submit" type="submit" id=
          "addtestimonybtn" class=
          "btn btn-primary waves-effect waves-light" id="createbtn">Create Account</button>
        </div>
      </div>
    </form>
  </div>
</div>
