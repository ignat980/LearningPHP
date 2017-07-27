<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>I'm learning to PHP</title>
    </head>
    <body>
      <?php
        $max_width = 980; //variable

        define("MAX_WIDTH", 980); //constant
        echo MAX_WIDTH;
      ?>
      <br>
      <?php
        //can't change value
        // MAX_WIDTH = MAX_WIDTH + 1;
        // echo MAX_WIDTH;

        //can't redefine it either
        // define("MAX_WIDTH", 981);
        // echo MAX_WIDTH;
      ?>
    </body>
</html>
