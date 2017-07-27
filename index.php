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
        $first = "The quick brown fox";
        $second = " jumped over the lazy dog.";

        $third = $first;
        $third .= $second;
        echo $third;
        ?>
        <br />
        Lowercase: <?= strtolower($third) ?> <br>
        Uppercase: <?= strtoupper($third) ?> <br>
        Uppercase first: <?= ucfirst($third) ?> <br>
        Uppercase words: <?= ucwords($third) ?> <br>
        <br>
        Length <?= strlen($third) ?><br>
        Trim: <?= "A" . trim(" B C D ") . "E" ?><br>
        Find: <?= strstr($third, "brown") ?><br>
        Replace by string: <?= str_replace("quick", "super-fast", $third) ?><br>
        <br>
        Repeat: <?= str_repeat($third, 2) ?><br>
        Make substring: <?= substr($third, 5, 10) ?><br>
        Find position: <?= strpos($third, "brown") ?><br>
        Find character: <?= strchr($third, "z") ?><br>
        

    </body>
</html>
