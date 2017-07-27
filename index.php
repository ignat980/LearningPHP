<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>I'm learning to PHP</title>
    </head>
    <body>
      <?php
        // null == NULL aka case insensitive
        $var1 = null;
        $var2 = "";
      ?>

      Is var1 null? <?= is_null($var1)?><br>
      Is var2 null? <?= is_null($var2)?><br>
      Is var3 null? <?= is_null($var3)?><br>
      <br>
      Is var1 set? <?= isset($var1)?><br>
      Is var2 set? <?= isset($var2)?><br>
      Is var3 set? <?= isset($var3)?><br>
      <br>

      <?php // empty: "", null, 0, 0.0, "0", false, array()?>
      <?php $var3 = "0";?>
      Is var1 empty? <?= empty($var1)?><br>
      Is var2 empty? <?= empty($var2)?><br>
      Is var3 empty? <?= empty($var3)?><br>
    </body>
</html>
