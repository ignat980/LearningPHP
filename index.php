<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>I'm learning to PHP</title>
    </head>
    <body>
      <?php
        $result1 = true;
        $result2 = false;
      ?>
      Result1: <?= $result1?><br>
      Result2: <?= $result2?><br>

      Result2 is a boolean?: <?= is_bool($result2)?>
    </body>
</html>
