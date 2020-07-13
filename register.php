
<DOCTYPE html>
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

<div class="container">
	
	<h2 class="text-center">Register</h2>
	
	<div class="row">
	<div class="col-md-6 col-lg-6">
	<form method="post" name="restrationForm" action="register.php">

		<label for="name"><b>Full Name:</b></label>
		<input type='text' class="form-control" id='name' placeholder="First Name" name='name' required/>
		<br />
		
		<label for="email"><b>Email ID:</b></label>
		<input type='text' class="form-control" id='email' placeholder="Email Address" name='email' required/>
		<br/>
		
		<label for="nic"><b>NIC:</b></label>
		<input type='text' class="form-control" id='nic' placeholder="NIC Number" name='nic' required/>
		<br/>
		
		<label for="contact"><b>Contact No:</b></label>
		<input type='text' class="form-control" id='contact' placeholder="Contact Number" name='contact' required/>
		<br/>
		
		<label for="address"><b>Home Address:</b></label>
		<input type='text' class="form-control" id='address' placeholder="Home Address" name='address' required/>
		</br>
		
		<label for="password"><b>Password:</b></label>
		<input type='text' class="form-control" id='password' placeholder="Password" name='password' required/>
		<br/>
		
		<label for="cpassword"><b>Confirm Password:</b></label>
		<input type='text' class="form-control" id='cpassword' placeholder="Confirm Password" name='cpassword' required/>
		</br/>
		
		<input type='submit' class="btn btn-primary" value='Register' id="register" name='btnSubmit'/>
	</form>
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
					type: 'POST',
					url: 'dbController.php',
					data: $values,
					success: function(data){
						alert(data);
						console.log(data);
					},
					error: function(error){
						alert(error);
						console.log(error);
					}
				});
				
			}else{
				
			}
			
		});
	});
</script>

</body>
</html>

