<?php
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

    $result = mysqli_query($db, "SELECT * FROM ${table} WHERE id='{$id}'");
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
      $errors[] = 'Position must be less than 999.';
    }
    if ($position_int > 999) {
      $errors[] = 'Position must be greater than zero.';
    }

    //visible
    $visible_str = (string) $subject['visible'];
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
    "('{$subject['menu_name']}', '{$subject['position']}', '{$subject['visible']}')";

    return perform_query($db, $sql);
  }
  function insert_page($page) {
    global $db;

    $sql = "INSERT INTO pages (subject_id, menu_name, position, visible, content) VALUES ".
    "('{$page['subject_id']}', '{$page['menu_name']}', '{$page['position']}', '{$page['visible']}', '{$page['content']}')";

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
    "menu_name='{$subject['menu_name']}', ".
    "position='{$subject['position']}', ".
    "visible='{$subject['visible']}' ".
    "WHERE id='{$subject['id']}' LIMIT 1";

    return perform_query($db, $query);
  }
  function update_page($page) {
    global $db;

    $query = "UPDATE pages SET ".
    "subject_id='{$page['subject_id']}', ".
    "menu_name='{$page['menu_name']}', ".
    "position='{$page['position']}', ".
    "visible='{$page['visible']}', ".
    "content='{$page['content']}' ".
    "WHERE id='{$page['id']}' LIMIT 1";

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

    $sql = "DELETE FROM ${table} WHERE id='{$id}' LIMIT 1";

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
