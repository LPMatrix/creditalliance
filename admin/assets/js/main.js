function generateAccountNumber(){
  var da = Date.now();
  document.getElementById('AccountNumber').value = da;
}

function updateAccount(data){
    var user = data;
    var status = $("#status").val();
    if(status !== null){
        $.ajax({
            url: "server/updateUser.php",
            type:"post",
            data: {
                user:user,
                status:status
            },
            success: function(Response){
                if(Response == "success"){
                    swal({
                  position: 'top-end',
                  type: 'success',
                  title: 'User Status Successfully',
                  showConfirmButton: true,
                }).then(function(){ 
                    location.reload();
                });
                }
            }
        });
    }
    else{
        $("#status").focus();
    }
    
}

function createAccount(){
    $("#createbtn").attr("disabled");
  var datastring = $("#AccountInfo").serialize();
  //alert(datastring);
  $.ajax({
        url: "server/createAccount.php",
        type: "post",
        cache: false,
        data: datastring,
        success: function(Response){
             alert(Response);
          if(Response == "success"){
              $("#createAccount").modal('hide');
              swal({
                  position: 'top-end',
                  type: 'success',
                  title: 'Account Created Successfully',
                  showConfirmButton: true,
                }).then(function(){ 
                    location.reload();
                });
            
          }else if(Response == "exist"){
               $("#createAccount").modal('hide');
               swal({
                    position: 'top-end',
                    type: 'error',
                    title: 'Oops...',
                    text: 'An account has been created using this email, use new email',
                  }).then(function(){ 
                    location.reload();
               S });
          }else{
              alert(Response);
          }
        }
  });
}
function Login(){
  var datastring = $("#loginForm").serialize();
  //alert(datastring);
  $.ajax({
        url: "server/login.php",
        type: "post",
        data: datastring,
        success: function(Response){
          if(Response == "success"){
            window.location = "dashboard.php";
          }
        }
  });
}

function ApproveTransaction(id) {
        var tid = id;
        alert(tid);
        $.ajax({
        url: "server/ApproveTransaction.php",
        type: "post",
        data: { id : tid},
        success: function(Response){
          if(Response == "success"){
            location.reload();
          }
        }
  });
}

function DeclineTransaction(id) {
        var tid = id;
        alert(tid);
        $.ajax({
        url: "server/DeclineTransaction.php",
        type: "post",
        data: { id : tid},
        success: function(Response){
          if(Response == "success"){
            location.reload();
          }
        }
  });
}