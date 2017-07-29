<?php
  require_once 'included_functions.php';

  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == "bob" && $password == "pass") {
      //Success !
      redirect_to('basic.html');
    } else {
      $message = 'There were some errors.';
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
    <title>Form</title>
  </head>
  <body>
     <?= $message ?> <br>
    <form action="index.php" method="post">
      Username: <input type="text" name="username" value="<?= htmlspecialchars($username) ?>"> <br>
      Password  <input type="password" name="password" value=""><br>
      <br>
      <input type="submit" name="submit" value="Submit">
    </form>
  </body>
</html>
