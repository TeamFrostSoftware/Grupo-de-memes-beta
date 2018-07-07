<?php

  require 'database.php';

  $message = '';


  if(!empty($_POST['NameC'])&& !empty($_POST['Telephone'])&& !empty($_POST['Email'])&& !empty($_POST['Address'])){

  	$sql = "INSERT INTO clients (name, telephone, email, address) VALUES (:NameC,:Telephone,:Email,:Address)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':NameC', $_POST['NameC']);
  	$stmt->bindParam(':Telephone',$_POST['Telephone']);
  	$stmt->bindParam(':Email',$_POST['Email']);
    $stmt->bindParam(':Address', $_POST['Address']);

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
    <title>Client Registry</title>
  </head>
  <body>
    <center>
      <h1>Client</h1>

      <?php if(!empty($message)): ?>
          <p> <?= $message ?></p>
        <?php endif; ?>

      <form action="Client_Registry.php" method="POST">
        <table width="50px">
          <tr>
            <td>
              <label for="NameC">Name Company: </label>
            </td>

            <td>
              <input type="text" name="NameC" maxlength="50" size="30" placeholder="example: Hauling LLC">
            </td>
          </tr>

          <tr>
            <td>
              <label for="Telephone">Telephone: </label>
            </td>
            <td>
              <input type="tel" name="Telephone" maxlength="12" size="30" placeholder="example: 808-870-72-79">
            </td>
          </tr>

          <tr>
            <td>
              <label for="Email">Email: </label>
            </td>
            <td>
               <input type="email" name="Email" maxlength="30" size="30" placeholder="example: lupes-hauling@hotmail.com">
            </td>
          </tr>

          <tr>
            <td>
              <label for="Address">Address: </label>
            </td>
            <td>
              <input type="text" name="Address" maxlength="70" size="30" placeholder="example: 188 Ahaaina way">
            </td>
          </tr>

          <tr>
            <td>
              <input type="submit" value="Accept">
            </td>
          </tr>
        </table>
      </form>
    </center>
  </body>
</html>