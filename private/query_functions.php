<?php
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

  function find_subject_by_id($id) {
    global $db;

    $result = mysqli_query($db, "SELECT * FROM subjects WHERE id='{$id}'");
    if (!$result)
      exit("Database query failed.");
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject;
  }

  function insert_subject($subject) {
    global $db;

    $sql = "INSERT INTO subjects (menu_name, position, visible) VALUES ".
    "('{$subject['menu_name']}', '{$subject['position']}', '{$subject['visible']}')";
    if (mysqli_query($db, $sql)) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function delete_subject($id) {
    global $db;

    $sql = "DELETE FROM subjects WHERE id='{$id}' LIMIT 1";
    $result = mysqli_query($db, $sql);
    if ($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_subject($subject) {
    global $db;

    $query = "UPDATE subjects SET ".
    "menu_name='{$subject['menu_name']}', ".
    "position='{$subject['position']}', ".
    "visible='{$subject['visible']}' ".
    "WHERE id='{$subject['id']}' LIMIT 1";

    if (mysqli_query($db, $query)) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }
?>
