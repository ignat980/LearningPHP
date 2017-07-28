<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>First Page</title>
  </head>
  <body>
    <?php
      $link_name = "Second Page";
      $id = 2;
    ?>
    <a href="second_page.php?id=<?= $id ?>"><?= $link_name ?></a>
  </body>
</html>
