<?php
  require_once 'included_functions.php';
  require_once 'validation_functions.php';

  $errors = array();
  $message = "";

  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Validations
    if (!has_text($username)) {
      $errors['username'] = "Username can't be blank";
    }
    if (!has_presence($password)) {
      $errors['password'] = "Password is too weak";
    }

    $fields_with_max_lengths = array('username' => 30, 'password' => 8); //arbitrary lengths
    validate_max_lengths($fields_with_max_lengths);


    if (empty($errors)) {
      if ($username == "bob" && $password == "pass") {
        //Success !
        redirect_to('basic.html');
      } else {
        $message = 'Username or password do not match our records.';
      }
    }
  } else {
    $message = 'Please log in.';
    $username = '';
  }
?>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='UTF-8'>
    <title>Login</title>
  </head>
  <body>
     <?= $message ?> <br>
     <?= form_errors($errors)?>
    <form action="index.php" method="post">
      Username: <input type="text" name="username" value="<?= htmlspecialchars($username) ?>"> <br>
      Password:  <input type="password" name="password" value=""><br>
      <br>
      <input type="submit" name="submit" value="Submit">
    </form>
  </body>
</html>
