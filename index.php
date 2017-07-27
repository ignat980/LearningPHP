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
      <?php
        $var1 = 3;
        $var2 = 4;
      ?>
      Basic Math: <?= ((1+2+$var1)*$var2)/2 -5; ?><br>
      <br>
      Absolute value: <?= abs(0-300) ?><br>
      Exponentiating: <?= pow(2,8) ?><br>
      Square root: <?= sqrt(100) ?><br>
      Modulo: <?= fmod(20,7) ?><br>
      Random: <?= rand() ?><br>
      Random (min, max): <?= rand(1,10) ?><br>
      <br>
      += : <?= $var2 += 4 ?><br>
      -= : <?= $var2 -= 4 ?><br>
      *= : <?= $var2 *= 3 ?><br>
      /= : <?= $var2 /= 4 ?><br>
      <br>
      Increment: <?= ++$var2 ?><br>
      Decrement: <?= --$var2 ?><br>
      <br>
      <?= 1 + 2 ?><br>
      <?= 1 + "2" ?><br>
      <?= 1 + "2 houses" ?><br>

    </body>
</html>
