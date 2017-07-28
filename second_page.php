<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Second Page</title>
  </head>
  <body>
    <pre>
      <?php
        // print_r($_GET);
      ?>
    </pre>
    <?php
      $id = $_GET['id'];
      echo $id . "<br>";

      $company = $_GET['company'];
      echo $company . "<br>" . "<br>";

      $page = 'William Shakespeare';
      $quote = 'To be or not to be';
      echo $link1 = '/bio/' . rawurlencode($page) . "?quote=" . urlencode($quote);
      echo "<br>";
      echo $link2 = '/bio/' . urlencode($page) . "?quote=" . rawurlencode($quote);


    ?>
  </body>
</html>
