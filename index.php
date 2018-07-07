<?php

  session_start();
  require 'database.php';

  if (isset($_SESSION['user_id'])) {

    $records = $conn->prepare('SELECT id, name, last_name, employee_number, email, password  FROM users WHERE id = :id');

    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;
    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Welcome to you WebApp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php if(!empty($user)): ?>

      <br> Welcome. <?= $user['name']; ?>
      <br>You are Successfully Logged In
      <a href="logout.php">Logout</a>
    <?php else: ?>

      <h1>Please Login or SignUp</h1>

      <a href="Login.php">Login</a> or
      <a href="Signup_User.php">SignUp</a>
      <a href="Client_Registry.php">Client</a>
    <?php endif; ?>

  </body>
</html>