<?php
  function select_all($table, $ordering='position ASC') {
    global $db;

    $sql ="SELECT * FROM ${table} ORDER BY ${ordering}";
    $result = mysqli_query($db, $sql);
    if (!$result) {
    	exit("Database query failed.");
    } else {
      return $result;
    };
  }

  function find_subject_by_id($id) {
    global $db;

    $result = mysqli_query($db, "SELECT * FROM subjects WHERE id='".$id."'");
    if (!$result)
      exit("Database query failed.");
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject;
  }
?>
