<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>I'm learning to PHP</title>
    </head>
    <body>
      <?php
        $numbers = array(4,8,15,16,23,42);
        echo $numbers[0] . "<br>";
        echo var_dump($numbers) . "<br>";

        $mixed = array(6, 'fox', 'dog', array('x','y','z'));
        echo $mixed[2] . "<br>";
        echo $mixed[3] . "<br>";
        echo $mixed . "<br>";
        echo "<pre>";
        echo var_dump($mixed) . "<br>";
      ?>
        <?php echo print_r($mixed) . "<br>";?>
      </pre>
      <?php
        echo $mixed[3][0];

        $mixed[2] = "cat";
        $mixed[4] = "mouse";
        $mixed[] = "house";
      ?>
      <pre>
        <?php echo print_r($mixed) . "<br>";?>
      </pre>

      <?php
        //PHP 5.4 or greater
        $array = [1,2,3];
      ?>
    </body>
</html>
