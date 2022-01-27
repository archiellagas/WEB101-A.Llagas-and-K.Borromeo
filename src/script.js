$(document).ready(function(){
	var user={};

	function register(e){
		user.idnumber =document.getElementById('idnumber').value;
		user.lastname =document.getElementById('lastname').value;
		user.name =document.getElementById('name').value;
		user.bday =document.getElementById('bday').value;
		user.program =document.getElementById('program').value;
		user.yearlevel =document.getElementById('yearlevel').value;
		
		console.log(user);

		$.ajax({
			type:"POST",
			data:{action:"register", userdata:user},
			url:"src/php/user.php",
			success:function(response){
				idresponse = jQuery.parseJSON(response);
				var table = $("#usertable tbody");
				if(idresponse==0){
					alert("Error saving the user!");
				}else{
					user.id = idresponse;
					appendUser(user, table);
				}

			},
		})

		e.preventDefault();
	}
	 

	




	
	
});
