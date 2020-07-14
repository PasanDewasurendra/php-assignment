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
			
				var username = $('#username').val();
				var password = $('#password').val();
				
				$values = {username: username, password: password};

				$.ajax({
					type: 'POST',
					url: 'loginController.php',
					data: $values,
					success: function(data){
						if(data.trim() === "success"){
							window.location.replace('users.php');
						}else{
							console.log(data);
						}
						
					}
				});
			
		});
	});
</script>		


</body>
</html>