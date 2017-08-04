<?php

function is_blank($value) {
	return !isset($value) || trim($value) === '';
}

// Tests for non-empty strings like "a", "bob", or "  spaces "
function has_presence($value) {
	return !is_blank($value);
}

// string length
function has_length_greater_than($value, $min) {
	return strlen($value) > $min;
}

function has_length_less_than($value, $max) {
	return strlen($value) < $max;
}

function has_length($value, $options) {
  if (isset($options['min']) && !has_length_greater_than($value, $options['min'] - 1)) {
		return false;
  } elseif (isset($options['max']) && !has_length_less_than($value, $options['max'] + 1)) {
		return false;
  } elseif (isset($options['exact']) && !(strlen($value) == $options['exact'])) {
		return false;
  } else {
  	return true;
  }
}

function has_inclusion_in($value, $set) {
	return in_array($value, $set);
}
function has_exclusion_in($value, $set) {
	return !in_array($value, $set);
}

function has_string($value, $required_string) {
  return strpos($value, $required_string) !== false;
}

function has_valid_email_format($value) {
	$email_regex = '/(?:[a-z0-9!#$%&\'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/i';
  return preg_match($email_regex, $value);
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
