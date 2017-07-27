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
        echo "Hello World<br />";
        echo 'Hello World<br />';

        $greeting = "Hello";
        $target = "World";
        $phrase = $greeting . " " . $target;
        echo $phrase . "<br />";

        echo "$phrase Again<br />";
        echo '$phrase Again<br />';
        echo "{$phrase}Again<br />";
        ?>
    </body>
</html>
