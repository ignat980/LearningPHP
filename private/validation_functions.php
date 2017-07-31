<?php

// Tests for non-empty strings like "a", "bob", or "  "
function has_presence($value) {
	return isset($value) && $value !== "";
}

// Tests for strings that have more than just whitespace
function has_text($value) {
  return has_presence($value) && !preg_match("/^\s*$/", $value);
}

// string length
function has_max_length($value, $max) {
	return strlen($value) <= $max;
}

function has_inclusion_in($value, $set) {
	return in_array($value, $set);
}

function validate_max_lengths($fields_with_max_lengths) {
	global $errors;
	// Expects an associative array
	foreach($fields_with_max_lengths as $field => $max) {
		$value = $_POST[$field];
	  if (!has_max_length($value, $max)) {
	    $errors[$field] = ucfirst($field)." is too long";
	  }
	}
}

function form_errors($errors=array()) {
	$output = "";
	if (!empty($errors)) {
	  $output .= "<div class=\"error\">";
	  $output .= "Please fix the following errors:";
	  $output .= "<ul>";
	  foreach ($errors as $key => $error) {
	    $output .= "<li>{$error}</li>";
	  }
	  $output .= "</ul>";
	  $output .= "</div>";
	}
	return $output;
}

?>
