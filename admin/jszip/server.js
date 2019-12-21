$(document).ready(function (e) {

	setInterval(function(){    
	$.ajax({
	    type : "POST",
	    url : "inc_files/notify.php",
	    success : function(data){
	    	// console.log(data); return;
	        if (data > 0) {
	        	$("#num").text(data);
	       		$("#note").addClass('badge-danger');
	        }
	        else{
	        	$("#num").text(data);
	        	$("#note").removeClass('badge-danger'); 
	        	$("#note").addClass('badge-success');
	        }
	    }
	});
	},1000);

	$('.openBtn').on('click', function(){
	 var id = $(this).attr('id');
	 //alert(id); return;
	 $.ajax({
	    type : 'post',
	     url : 'inc_files/loadselectedItem.php', 
	    data :  'id='+ id,
	 	success : function(res)
	     {
	 		// console.log(res); return;
	      var obj = jQuery.parseJSON(res);
	     	//alert(obj.price);
	      $("#uploadimage")[0].reset();
	      $("#editProduct").modal("toggle");
	      $("#field-0").val(obj.sku);
	      $("#field-q").val(obj.quantity);
	      $("#field-d").val(obj.description);
	      $("#field-n").val(obj.product_name);
	      $("#field-p").val(obj.price);
	      $("#dat").hide();
	      $('#das').attr('src', obj.pic);
	      $('#das').show();
	      // $("#idholder").val(id);
	     }
	    });
	});

	$('.openCat').on('click', function(){
	 var id = $(this).attr('id');
	 //alert(id); return;
	 $.ajax({
	    type : 'post',
	     url : 'inc_files/loadselectedCat.php', 
	    data :  'id='+ id,
	 	success : function(res)
	     {
	 		// console.log(res); return;
	      var obj = jQuery.parseJSON(res);
	     	//alert(obj.price);
	      $("#editCat")[0].reset();
	      $("#editCategory").modal("toggle");
	      $("#cat_name").val(obj.cat_name);
	      $("#idd").val(obj.id);
	      $("#cat_description").val(obj.description);
	      $("#dott").hide();
	      $('#cat_img').attr('src', obj.pic);
	      $('#cat_img').show();
	      // $("#idholder").val(id);
	     }
	    });
	});

	$('.openUser').on('click', function(){
	 var id = $(this).attr('id');
	 // alert(id); return;
	 $.ajax({
	    type : 'post',
	     url : 'inc_files/loadselectedUser.php', 
	    data :  'id='+ id,
	 	success : function(res)
	     {
	 		// console.log(res); return;
	      var obj = jQuery.parseJSON(res);
	      $("#userEdit")[0].reset();
	      $("#editUser").modal("toggle");
	      $("#username").val(obj.username);
	      $("#firstname").val(obj.firstname);
	      $("#lastname").val(obj.lastname);
	      $("#email").val(obj.email);
	      $("#status").val(obj.status);
	      $("#idd").val(obj.id);
	      $("#dut").hide();
	      $('#dos').attr('src', obj.pic);
	      $('#dos').show();
	      // $("#idholder").val(id);
	     }
	    });
	});

	$('#filter').on('change', function(){
	 var id = $(this).val();
	 //alert(id); return;
	 $.ajax({
	    type : 'post',
	     url : 'inc_files/loadReport.php', 
	    data :  'id='+ id,
	 	success : function(res)
	     {
	      $("#def").hide();
	      $("#new").html(res);
	     }
	    });
	});
})

function loadNofitications(){
   $.post("inc_files/loadNotifications.php",{},
   function(response){
    $("#notificationHolder").html(response);
   }); 
}