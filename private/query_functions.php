<?php
  function db_escape($string) {
    global $db;

    return mysqli_real_escape_string($db, $string);
  }
  //Select everything from table
  function select_all($table) {
    global $db;

    $sql ="SELECT * FROM {$table} ORDER BY ".
    ($table == 'pages'?'subject_id ASC, ':'').'position ASC';
    $result = mysqli_query($db, $sql);
    if (!$result) {
    	exit("Database query failed.");
    } else {
      return $result;
    };
  }

  //Select by id from table
  function find_by_id_from($table, $id) {
    global $db;

    $result = mysqli_query($db, "SELECT * FROM ${table} WHERE id='".db_escape($id)."'");
    if (!$result)
      exit("Database query failed.");
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    return $subject;
  }

  function validate_subject($subject) {
    $errors = [];

    //menu_name
    if (is_blank($subject['menu_name'])) {
      $errors[] = 'Name cannot be blank.';
    }
    if (!has_length($subject['menu_name'], ['min' => 2, 'max' => '255'])) {
      $errors[] = 'Name must be between 2 and 255 characters.';
    }

    // position
    $position_int = (int) $subject['position'];
    if ($position_int <= 0) {
      $errors[] = 'Position must be greater than zero.';
    }
    if ($position_int > 999) {
      $errors[] = 'Position must be less than 999.';
    }

    //visible
    $visible_str = (string) $subject['visible'];
    if (!has_inclusion_in($visible_str, ['0', '1'])) {
      $errors[] = 'Visible must be true or false.';
    }

    return $errors;
  }

  function validate_page($page) {
    $errors = [];

    //subject id
    if (is_blank($page['subject_id'])) {
      $errors[] = 'Subject cannot be blank';
    }

    //menu name
    if (is_blank($page['menu_name'])) {
      $errors[] = 'Name cannot be blank.';
    }
    if (!has_length($page['menu_name'], ['min' => 2, 'max' => '255'])) {
      $errors[] = 'Name must be between 2 and 255 characters.';
    }
    $id = isset($page['id']) ? $page['id'] : '0';
    if (!has_unique_page_menu_name($page['menu_name'], $id)) {
      $errors[] = 'Menu name must be unique.';
    }

    //position
    $position_int = (int) $page['position'];
    if ($position_int <= 0) {
      $errors[] = 'Position must be greater than zero.';
    }
    if ($position_int > 999) {
      $errors[] = 'Position must be less than 999.';
    }

    //visible
    $visible_str = (string) $page['visible'];
    if (!has_inclusion_in($visible_str, ['0', '1'])) {
      $errors[] = 'Visible must be true or false.';
    }

    return $errors;
  }

  //Insert by id
  function insert_subject($subject) {
    global $db;

    $errors = validate_subject($subject);
    if (!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO subjects (menu_name, position, visible) VALUES ".
    "('".
    db_escape($subject['menu_name']). "', '".
    db_escape($subject['position']). "', '".
    db_escape($subject['visible']).
    "')";

    return perform_query($db, $sql);
  }
  function insert_page($page) {
    global $db;

    $errors = validate_page($page);
    if (!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO pages (subject_id, menu_name, position, visible, content) VALUES ".
    "('".
    db_escape($page['subject_id'])."', '".
    db_escape($page['menu_name'])."', '".
    db_escape($page['position'])."', '".
    db_escape($page['visible'])."', '".
    db_escape($page['content']).
    "')";

    return perform_query($db, $sql);
  }

  //Update by id
  function update_subject($subject) {
    global $db;

    $errors = validate_subject($subject);
    if (!empty($errors)) {
      return $errors;
    }

    $query = "UPDATE subjects SET ".
    "menu_name='".db_escape($subject['menu_name'])."', ".
    "position='".db_escape($subject['position'])."', ".
    "visible='".db_escape($subject['visible'])."' ".
    "WHERE id='".db_escape($subject['id'])."' LIMIT 1";

    return perform_query($db, $query);
  }
  function update_page($page) {
    global $db;

    $errors = validate_page($page);
    if (!empty($errors)) {
      return $errors;
    }

    $query = "UPDATE pages SET ".
    "subject_id='".db_escape($page['subject_id'])."', ".
    "menu_name='".db_escape($page['menu_name'])."', ".
    "position='".db_escape($page['position'])."', ".
    "visible='".db_escape($page['visible'])."', ".
    "content='".db_escape($page['content'])."' ".
    "WHERE id='".db_escape($page['id'])."' LIMIT 1";

    return perform_query($db, $query);
  }

  //Delete by id
  function delete_subject($id) {
    global $db;
    return delete_from('subjects', $id);
  }
  function delete_page($id) {
    global $db;
    return delete_from('pages', $id);
  }
  function delete_from($table, $id) {
    global $db;

    $sql = "DELETE FROM ${table} WHERE id='".db_escape($id)."' LIMIT 1";

    return perform_query($db, $sql);
  }

  function perform_query($db, $query) {
    if (mysqli_query($db, $query)) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }
?>
