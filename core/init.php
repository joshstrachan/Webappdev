<?php
	session_start();
	// error_reporting(0); //this to see errors
	require 'Database/connect.php';
	require 'Functions/users.php';
	require 'Functions/general.php';

	if (logged_in() === true) {
		$session_user_id = $_SESSION['user_id'];
		$user_data = user_data($session_user_id, 'user_id', 'first_name', 'password', 'last_name', 'username', 'email', 'date_of_birth', 'biography', 'availability', 'contact_number', 'website_url', 'gender', 'location', 'profile');
		if (user_active($user_data['username']) === false) {
			session_destroy();
			header('location:index.php');
			exit();
		
		}
			
	}
	
	
	$errors = array();
?>