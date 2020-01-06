function Login(){
		var datastring = $("#UserLogin").serialize();
		alert(datastring);
		$.ajax({
					url: "user/server/login.php",
					type: "post",
					data: datastring,
					success: function(Response){
						if(Response == "success"){
							window.location = "app/index.php";
						}
					}
		});
}

function fundAccount(){
	var datastring = $("#fundAccount").serialize();
	$.ajax({
				url: "server/fundAccount.php",
				type: "post",
				data: datastring,
				success: function(Response){
					if(Response == "declined"){
							alert("Transaction Declined Contact you Account Officer")
					}
				}
	});
}