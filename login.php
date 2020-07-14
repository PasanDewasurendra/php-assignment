<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<script
	src="https://code.jquery.com/jquery-3.5.1.min.js"
	integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
	crossorigin="anonymous"></script>
	
</head>
<body>
        <div class="container">
		
			<h3 class="text-center text-primary pt-5">Login</h3>
		
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="col-md-12">
                        <form class="form" action="" method="post">
						
                            <div class="form-group">
                                <label for="username" class="text-dark">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-dark">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="button" name="login" id="login" class="btn btn-primary float-right" value="Login">
                            </div>
							
                            <div class="justify-content-center align-items-center">Dont have an Account?
                                <a href="./register.php" class="text-link">Register here</a>
                            </div>
							
                        </form>
                    </div>
                </div>
            </div>
        </div>
		

<script type="text/javascript">
	$(document).ready(function(){
		console.log('ready');
		$('#login').click(function(){
			
				var username = document.getElementById('username');
				var password = document.getElementById('password');
				
				if(username.value.length == 0 || password.value.length == 0){
					alert("Username or password cannot be empty.");
				}else{
					
					if(!validEmail(username)){
						alert("Enter Valid Email Address");
					}else if(!validPassword(password)){
						alert("Password must contain at least 8 characters!");
					}else{
		
						$values = {username: username.value, password: password.value};

						$.ajax({
							type: 'POST',
							url: 'loginController.php',
							data: $values,
							success: function(data){
								if(data.trim() === "success"){
									alert('Login Successfully.');
									window.location.replace('users.php');
								}else{
									alert(data);
								}
								
							}
						});
					}
				}

		});
	});
	
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