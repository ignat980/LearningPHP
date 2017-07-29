<?php
//!!!! IMPORTANT No characters before php for redirects, unless you have output buffering turned on.
  function redirect_to($new_location) {
    // This is how to make a 302 redirect
    // Usually you would have to add the header "HTTP 1.1/ 302 Found"
    // But php adds it automatically when you do "Location: ..."
    header("Location: {$new_location}");
    exit;
  }

  $logged_in = $_GET['logged_in'];
  if ($logged_in == 1) {
    redirect_to('redirect.php');
  } else {
    redirect_to("http://www.google.com");
  }

?>

<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='UTF-8'>
    <title>Redirect</title>
  </head>
  <body>
  </body>
</html>
