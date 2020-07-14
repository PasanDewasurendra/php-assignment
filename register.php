
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
									<input type="text" name="name" id="name" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="email" class="text-dark">Email ID:</label><br>
									<input type="text" name="email" id="email" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="nic" class="text-dark">NIC:</label><br>
									<input type="text" name="nic" id="nic" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="contact" class="text-dark">Contact No:</label><br>
									<input type="text" name="contact" id="contact" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="address" class="text-dark">Home Address:</label><br>
									<input type="text" name="address" id="address" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="password" class="text-dark">Password:</label><br>
									<input type="password" name="password" id="password" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="cpassword" class="text-dark">Confirm Password:</label><br>
									<input type="password" name="cpassword" id="cpassword" class="form-control" required>
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
			
			var valid = this.form.checkValidity();	
			console.log(valid);
			
			if(valid){
				var name = $('#name').val();
				var email = $('#email').val();
				var nic = $('#nic').val();
				var contact = $('#contact').val();
				var address = $('#address').val();
				var pass = $('#password').val();
				var cpass = $('#cpassword').val();
				
				$values = {name: name, email: email, nic: nic, contact: contact, address: address, password: pass};

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
</script>

</body>
</html>

