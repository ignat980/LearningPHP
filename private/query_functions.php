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
?>
