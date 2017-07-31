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
      $script_path = "/${$script_path}";
    }
    return WWW_ROOT.$script_path;
  }
?>
