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

      function paint($room='office',$color='red') {
        return "The color of the {$room} is {$color}.<br>";
      }

      echo paint();
      echo paint('bedroom','blue');
      echo paint('bedroom', null);
      echo paint('bedroom');
      echo paint('blue');
    ?>
  </body>
</html>
