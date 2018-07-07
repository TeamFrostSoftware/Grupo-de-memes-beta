<?php
  
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'loginuser_database';

	try {
  		$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);

	} catch (PDOException $e) {
  		die('Connection Failed: ' . $e->getMessage());
	}
	
	/*
	$EmployeeN = $_POST['EmployeeN'];
	$Name = $_POST['Name'];
	$LastName = $_POST['LastName'];
	$Email = $_POST['Email'];
	$Password = $_POST['Password'];
	$Password2 = $_POST['Password2'];

	if (!empty($EmployeeN) || !empty($Name) || !empty($LastName) || !empty($Email) || !empty($Password)) {
		$host = 'localhost';
		$dbUsername = 'root';
		$dbPassword = '';
		$dbname = 'loginuser_database';

		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

		if (mysqli_connect_error()) {
			die('Connect Error('.msqli_connect_error().')'.msqli_connect_error());
		}
		else{
			$SELECT = "SELECT  Email FROM users WHERE Email = ? Limit 1";
			$INSERT = "INSERT INTO users (EmployeeN, Name, LastName, Email, Password) VALUES (?, ?, ?, ?, ?)";

			$stmt = $conn->prepare($SELECT);
			$stmt->bind_param("s", $Email);
			$stmt->execute();
			$stmt->bind_result($Email);
			$stmt->store_result();
			$rnum = $stmt->num_rows;

			if ($rnum == 0) {
				$stmt->close();

				$stmt = $conn->prepare($INSERT);

				$stmt->bind_param("ssssii", $EmployeeN, $Name, $LastName, $Email, $Password);
				$stmt->execute();

				echo "New record inserted sucessfully";
			}
			else{
				echo "Someone already register using this email";
			}
			$stmt->close();
			$conn->close();
		}
	}
	else{
		echo "All field are required";
		die();
	}
*/
	
?>