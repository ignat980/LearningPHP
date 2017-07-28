<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>First Page</title>
  </head>
  <body>
    <?php
      $link_name = "Second Page";
      $id = 5;
      $company = "Johnson & Johnson"
    ?>
    <a href="second_page.php?id=<?= $id ?>&company=<?= rawurlencode($company) ?>"><?= $link_name ?></a>
  </body>
</html>
