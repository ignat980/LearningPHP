<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>I'm learning to PHP</title>
    </head>
    <body>
      <?php
        function say_hello() {
          echo "Hello World! <br>";
        }

        say_hello();

        function say_hello_to($word) {
          echo "Hello {$word}! <br>";
        }

        say_hello_to("Me");
        say_hello_to("Everyone");

        say_hello_loudly();
        
        //function definitions get hoisted
        function say_hello_loudly() {
          echo "HELLO WOOOOORLD!!<br>";
        }
      ?>
    </body>
</html>
