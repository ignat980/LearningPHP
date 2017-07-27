<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>I'm learning to PHP</title>
    </head>
    <body>
      <?= $float = 3.14 ?><br/>
      <?= $float + 7 ?><br/>
      <?= 4/3 ?><br/>
      <br/>
      Round: <?= round($float, 1) ?><br/>
      Ceiling: <?= ceil($float) ?><br/>
      Floor: <?= floor($float) ?><br/>
      <br>
      <?= $integer = 3 ?>
      <?= "Is {$integer} an integer? " . is_int($integer) ?><br/>
      <?= "Is {$float} an integer? " . is_int($float) ?><br/>
      <br>
      <?= "Is {$integer} a float? " . is_float($integer) ?><br/>
      <?= "Is {$float} a float? " . is_float($float) ?><br/>
      <br>
      <?= "Is {$integer} numeric? " . is_numeric($integer) ?><br/>
      <?= "Is {$float} numeric? " . is_numeric($float) ?><br/>
      <br>
    </body>
</html>
