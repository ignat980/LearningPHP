<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='UTF-8'>
    <title>Form Processing</title>
  </head>
  <body>
    <pre>
      <?php print_r($_POST)?>
    </pre>
    <br>
    <?php

    if (isset($_POST['submit'])) {
      echo "Form is submitted<br>";

      if (isset($_POST['username'])) {
        $username = $_POST['username'];
      } else {
        $username = '';
      }
      if (isset($_POST['password'])) {
        $password = $_POST['password'];
      } else {
        $password = '';
      }

      //or use ternary operator

      $username = isset($_POST['username']) ? $_POST['username'] : "";
      $password = isset($_POST['password']) ? $_POST['password'] : "";

    } else {
      $username = '';
      $password = '';
    }

      echo "{$username}: {$password}";
    ?>
  </body>
</html>
