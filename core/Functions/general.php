<?php

function logged_in_redirect () {
	if (logged_in() === true) {
		header('Location:index2.php');
		exit();
	}
}

function protect_page() { // protects pages from users who are not signed in
	if (logged_in() === false) {
		header('location:protected.php');
		exit();
	}
}

	function sanitise ($data) {
		return mysql_real_escape_string($data);
	} /* general function to sanitise data */
	
	function array_sanitiser(&$item) {
		$item = mysql_real_escape_string($item);
	}
	
	function output_errors($errors) {
		return '<ul><li>' . implode('</li><li>', $errors) . '</li></ul>';
	}
	
?>