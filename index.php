<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>I'm learning to PHP</title>
    </head>
    <body>
      <?php
        $assoc = array('first_name' => 'Kevin', 'last_name' => 'Smith');
      ?>
      <?= $assoc['first_name'];?><br>
      <?= $assoc['first_name'] . " " . $assoc['last_name'];?><br>

      <?php $assoc['first_name'] = 'Larry';?>
      <?= $assoc['first_name'] . " " . $assoc['last_name'];?><br>

      <?php
        $numbers = array(4,8,15,16,23,42);
        // ==
        $numbers = array(0 => 4, 1 => 8, 2 => 15, 3 => 16, 4 => 23, 5 => 42);
        echo $numbers[0];
      ?>
    </body>
</html>
