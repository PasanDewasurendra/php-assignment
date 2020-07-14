
<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<script
	src="https://code.jquery.com/jquery-3.5.1.min.js"
	integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
	crossorigin="anonymous"></script>
  
</head>
<body>

	<div class="container mb-5 mt-2">
		
        <div class="row justify-content-center align-items-center">
		
            <div class="col-md-6">
                <div class="col-md-12">
					<div class="card">
						<div class="card-header bg-primary"><h2 class="text-center text-white">Register</h2></div>
						<div class="card-body">
							<form method="post" action="register.php">
						
								<div class="form-group">
									<label for="name" class="text-dark">Full Name:</label><br>
									<input type="text" name="name" placeholder="UserName" id="name" class="form-control" >
								</div>
								<div class="form-group">
									<label for="email" class="text-dark">Email ID:</label><br>
									<input type="text" name="email" id="email" placeholder="Email Address" class="form-control" >
								</div>
								<div class="form-group">
									<label for="nic" class="text-dark">NIC:</label><br>
									<input type="text" name="nic" id="nic" placeholder="XXXXXXXXXV" class="form-control" >
								</div>
								<div class="form-group">
									<label for="contact" class="text-dark">Contact No:</label><br>
									<input type="text" name="contact" id="contact" placeholder="Contact Number" class="form-control" >
								</div>
								<div class="form-group">
									<label for="address" class="text-dark">Home Address:</label><br>
									<input type="text" name="address" id="address" placeholder="Address" class="form-control" >
								</div>
								<div class="form-group">
									<label for="password" class="text-dark">Password:</label><br>
									<input type="password" name="password" id="password" placeholder="Password" class="form-control" >
								</div>
								<div class="form-group">
									<label for="cpassword" class="text-dark">Confirm Password:</label><br>
									<input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" class="form-control" >
								</div>
								<div class="form-group">
									<input type="button" name="register" id="register" class="btn btn-primary float-right" value="Register">
								</div>
								
								<div class="justify-content-center align-items-center">Allready hava a Account?
									<a href="./login.php" class="text-link">Login Here</a>
								</div>
								
							</form>
						</div>
					</div>
                </div>
			</div>
        </div>
	</div>



<script type="text/javascript">
	$(function(){
		$('#register').click(function(){
			
			var valid = false;	
			console.log(valid);
			
			var name = document.getElementById('name');
			var email = document.getElementById('email');
			var nic = document.getElementById('nic');
			var contact = document.getElementById('contact');
			var address = document.getElementById('address');
			var pass = document.getElementById('password');
			var cpass = document.getElementById('cpassword');
			
			if(name.value.length != 0){
				if(email.value.length != 0){
					if(nic.value.length != 0){
						if(contact.value.length != 0){
							if(pass.value.length != 0){
								if(cpass.value.length != 0){
									
									if(validEmail(email)){
										
										if(validNIC(nic)){
											
											if(validPassword(pass)){
												
												if(pass.value == cpass.value){
													
													valid =  true;
													
												}else{
													alert('Password did not matched.');
												}
												
											}else{
												alert('Password must contain at least 8 characters!');
											}
											
										}else{
											alert('Please Enter Valid NIC Number)');
										}
											
									}else{
										alert('Please Enter Valid Email Adddress)');
									}		
								}else{
									alert('Confirm your passowrd.');
								}
							}else{
								alert('Pssowrd is required!');
							}
						}else{
							alert('Contact number is required!');
						}
					}else{
						alert('NIC is required!');
					}
				}else{
					alert('Email is required!');
				}
			}else{
				alert('Name is required!');
			}

			
			if(valid){
				
				$values = {name: name.value, email: email.value, nic: nic.value, contact: contact.value, address: address.value, password: pass.value};

				$.ajax({
					method: 'post',
					url: 'registerController.php',
					data: $values,
					success: function(data){
						alert(data);
						window.location.replace('login.php');
					}
				});
				
			}else{
				alert('please, fill all the fiellds');
			}
			
		});
	});
	
	
	function validLetter(data) {
		var exp = /^[a-zA-Z]+$/;
		alert(data.value.trim());
		if(data.value.trim().match(exp)){
			
			return true;
		}else{
			return false;
		}
	}
	
	function validNIC(data){
		var exp = /^(?:19|20)?\d{2}(?:[0-35-8]\d\d(?<!(?:000|500|36[7-9]|3[7-9]\d|86[7-9]|8[7-9]\d)))\d{4}(?:[vVxX])$/;
		if(data.value.trim().match(exp)){
			return true;
		}else{
			return false;
		}
	}
	
	function validContact(data){
		var phoneno = /^\d{10}$/;
		if(data.value.match(phoneno)){
			return true;
        }else{
			return false;
        }
	}

	function validEmail(data){
        var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        if(data.value.match(emailExp)){
            return true;
        }else{
            return false;
        }
	}
	
	function validPassword(data){
		if(data.value.length < 8){
			return false;
		}else{
			return true;
		}
	}
	
</script>

</body>
</html>

