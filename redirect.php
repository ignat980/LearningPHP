<?php
  header("X-Powered-By: none of your beeswax");
?><!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='UTF-8'>
    <title>Redirect</title>
  </head>
  <body>
    <pre>
      <?php print_r(headers_list())?>
    </pre>
    <br>
    You've been successfuly redirected.
  </body>
</html>
