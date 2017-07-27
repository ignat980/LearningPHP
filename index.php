<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>I'm learning to PHP</title>
    </head>
    <body>
      <?php
        $numbers = array(8,15,16,23,42,4);
      ?>
      Count: <?= count($numbers);?><br>
      Max value: <?= max($numbers);?><br>
      Min value: <?= min($numbers);?><br>
      <br>
      <pre>
        <!-- In-place sorts!!! -->
        Sort: <?php sort($numbers); print_r($numbers)?><br>
        Reverse sort: <?php rsort($numbers); print_r($numbers)?><br>
      </pre>
      <br>
      Implode: <?= $num_string = implode(" * ", $numbers)?> <br>
      Explode: <?php print_r($num_string = explode(" * ", $num_string))?> <br>
      <br>
      Is 15 in the array?: <?= in_array(15, $numbers)?><br>
      Is 19 in the array?: <?= in_array(19, $numbers)?><br>

    </body>
</html>
