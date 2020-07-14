<?php 

require 'config.php';
session_start();

$users = '';

$sql = "SELECT * FROM users";
	$table = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($table)){
			$users .= "<tr id=\"{$row['id']}\">";
			$users .= "<td data-target=\"name\">{$row['username']}</td>";
			$users .= "<td data-target=\"email\">{$row['email']}</td>";
			$users .= "<td data-target=\"nic\">{$row['nic']}</td>";
			$users .= "<td data-target=\"contact\">{$row['phone']}</td>";
			$users .= "<td data-target=\"address\">{$row['address']}</td>";
			$users .= "<td><a href=\"#\" data-role=\"update\" data-id=\"{$row['id']}\">Update</a></td>";
			$users .= "<td><a href=\"#\" data-role=\"delete\" data-id=\"{$row['id']}\">Detete</a></td>";
			$users .= "</tr>";
			
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' type='text/javascript'></script>
 

</head>
<body>

<div class="contatiner">
	<p class="text-right p-2 bg-light">Welcome <?php echo $_SESSION['username'] ?>! <a href="logout.php">Logout</a></p>
	
	<h2 class="text-center text-dark p-2">User Management</h2>
	
	<a href="register.php" class="btn btn-primary m-2">Register New User</a>

	<table class="table border m-2 ">
		<thead>
			<tr>
				<th>Full Name</th>
				<th>Email</th>
				<th>NIC</th>
				<th>Contact No</th>
				<th>Home Address</th>
				<th>Action</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		
		<?php 
			echo $users;
		?>
		
		</tbody>
	</table>
	
	<div id="userModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="text-center">Update User</h4>
					<button type="button" class="close float-right" data-dismiss="modal" >&times;</button>
				</div>
				<div class="modal-body">
				
					<form method="post" action="register.php">
								
								<input type="hidden" id="userId">
						
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
								
					</form>
					
				</div>
				<div class="modal-footer">
					<a href="#" id="save" class="btn btn-primary float-right">Update</a>
				</div>
			</div>
		</div>
	</div>
	
</div>


<script>

	$(document).ready(function(){
		$(document).on('click', 'a[data-role=update]', function(){
			var id = $(this).data('id');
			var name = $('#'+id).children('td[data-target=name]').text();
			var email = $('#'+id).children('td[data-target=email]').text();
			var nic = $('#'+id).children('td[data-target=nic]').text();
			var contact = $('#'+id).children('td[data-target=contact]').text();
			var address = $('#'+id).children('td[data-target=address]').text();
			
			$('#userId').val(id);
			$('#name').val(name);
			$('#email').val(email);
			$('#nic').val(nic);
			$('#contact').val(contact);
			$('#address').val(address);
			$('#userModal').modal('toggle');
			
		})
		
		$('#save').click(function(){
			var id = $('#userId').val();
			var name = $('#name').val();
			var email = $('#email').val();
			var nic = $('#nic').val();
			var contact = $('#contact').val();
			var address = $('#address').val();
			
			$.ajax({
				url: 'updateController.php',
				method: 'post',
				data: {id: id, name: name, email: email, nic: nic, contact: contact, address: address},
				success: function(res){
					alert(res);
					window.location.replace('users.php');
				}
			});
			
		});
		
		$(document).on('click', 'a[data-role=delete]', function(){
			var id = $(this).data('id');
			
			$.ajax({
				url: 'deleteController.php',
				method: 'post',
				data: {id: id},
				success: function(res){
					alert(res);
					window.location.replace('users.php');
				}
			});
			
		});
		
	});

</script>

</body>
</html>