<?php
  require_once '../../../private/initialize.php';


  if (is_request_a('POST')) {
    $menu_name = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
    $position = isset($_POST['position']) ? $_POST['position'] : '';
    $visible = isset($_POST['visible']) ? $_POST['visible'] : '';

    echo 'Form parameters<br>';
    echo "Menu name: ${menu_name}<br>";
    echo "Position: ${position}<br>";
    echo "Visible: ${visible}<br>";
  } else {
    redirect('/staff/subjects/new');
  }
?>
