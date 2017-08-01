<?php
  function hello($name) {
    return "Hello {$name}!";
  }

  function redirect_to($new_location) {
    header("Location: {$new_location}");
    exit;
  }

  function url_for($script_path) {
    if ($script_path[0] != '/') {
      $script_path = "/${script_path}";
    }
    return WWW_ROOT.$script_path;
  }

  function error_404() {
     header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
     exit();
  }

  function error_500() {
    header($_SERVER['SERVER_PROTOCOL'].' 500 Internal Server Error');
    exit();
  }

  function redirect($location) {
    header("Location: ".url_for($location));
    exit();
  }
?>
