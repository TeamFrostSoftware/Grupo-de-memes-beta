<?php

  require 'database.php';

  $message = '';


  if(!empty($_POST['Name'])&& !empty($_POST['LastName'])&& !empty($_POST['EmployeeN'])&& !empty($_POST['Email'])&& !empty($_POST['Password'])){

  	$sql = "INSERT INTO users (name, last_name, employee_number, email, password) VALUES (:Name,:LastName,:EmployeeN,:Email,:Password)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Name', $_POST['Name']);
  	$stmt->bindParam(':LastName',$_POST['LastName']);
  	$stmt->bindParam(':EmployeeN',$_POST['EmployeeN']);
    $stmt->bindParam(':Email', $_POST['Email']);

    $password = password_hash($_POST['Password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':Password',$password);

  	if ($stmt->execute()) {

      $message = 'Successfully created new user';
    } 
    else {
      $message = 'Sorry there must have been an issue creating your account';
    }
  }
  
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Sign up</title>
	</head>
	<body>
		<center>
			<h1>Sign up</h1>

			 <?php if(!empty($message)): ?>
			 	<p> <?= $message ?></p>
			 <?php endif; ?>

			<form action="Signup_User.php" method="POST">
				<table width="50px">
				<tr>
					<tr>
						<td>
							<label for="Name">Name: </label>
						</td>
						<td>
							<input type="text" name="Name" maxlength="25" size="30" placeholder="Enter your name" required>
						</td>
					</tr>

					<tr>
						<td>
							<label for="LastName">Last Name: </label>
						</td>
						<td>
							<input type="text" name="LastName" maxlength="50" size="30" placeholder=" Enter your last name" required>
						</td>
					</tr>

					<td>
							<label for="EmployeeN">Employee Number: </label>
						</td>
						<td>
							<input type="text" name="EmployeeN" maxlength="50" size="30" placeholder="Enter your employee number" required>
						</td>
					</tr>

					<tr>
						<td>
							<label for="Email">Email: </label>
						</td>
						<td>
							<input type="email" name="Email" maxlength="50" size="30" placeholder="Enter your email" required>
						</td>
					</tr>

					<tr>
						<td>
							<label for="Password">Password: </label>
						</td>
						<td>
							<input type="Password" name="Password" minlength="8" maxlength="20" size="30" placeholder="Enter your password" required>
						</td>
					</tr>

					<tr>
						<td>
							<input type="submit" value="Accept">
						</td>
					</tr>;

					<tr>
						<td>
							<span><a href="Login.php">Login</a></span>
						</td>
					</tr>

				</table>
			</form>
		</center>
	</body>
</html>