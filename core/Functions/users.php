<?php

function update_user($update_data) { // function to update users profile information in the database
	global $session_user_id;
	$update = array();
	array_walk($update_data, 'array_sanitiser' );
	
	foreach($update_data as $field=>$data) {
		$update[] = '`' . $field . '` = \'' . $data . '\'';
	}
	
	mysql_query("UPDATE users SET " . implode(', ', $update) . " WHERE  user_id = '$session_user_id'") or die(mysql_error());
}

function register_user($register_data) { // function to register new users into the database
	array_walk($register_data, 'array_sanitiser' );
	$register_data['password'] = md5($register_data['password']);
	$fields = '`' . implode ('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';
	mysql_query("INSERT INTO users ($fields) VALUES ($data)");
}

function user_data($user_id) { /* allows all user data to be accessable anywhere on website */
	$data = array();
	$user_id = (int)$user_id;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args(); 
	
	if ($func_num_args > 1) {
		unset($func_get_args[0]);
		$fields = '`' . implode('`, `', $func_get_args) . '`' ;
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM users where user_id = $user_id")); /*converts the data so it can be used in forms */
		
		return $data;
	}
}

function change_password($user_id, $password){
	$user_id = (int)$user_id;
	$password = md5 ($password);
	mysql_query("UPDATE users SET password = '$password' WHERE user_id = $user_id");
}

Function logged_in() {
	return (isset($_SESSION['user_id'])) ? true : false;
} /* function to verify whether user is currently logged in */

function user_exists($username) {
 $username = sanitise($username);
return (mysql_result(mysql_query("SELECT COUNT(user_id) FROM users WHERE username = '$username'"),0) == 1) ? true : false;
} /* function to test if user exists on database */

function email_exists($email) {
 $email = sanitise($email);
return (mysql_result(mysql_query("SELECT COUNT(user_id) FROM users WHERE email = '$email'"),0) == 1) ? true : false;
} /* function to test if email exists on database */

function user_active($username) {
 $username = sanitise($username);
return (mysql_result(mysql_query("SELECT COUNT(user_id) FROM users WHERE username = '$username' AND active = 1"),0) == 1)? true : false;
} /* function to test whether user account has been activated */

function user_id_from_username ($username) {
	$username = sanitise($username);
	return mysql_result(mysql_query("SELECT user_id FROM users WHERE username = '$username'"), 0, 'user_id');
} /* function to gain user id from the username */

function login($username, $password) { //logs users into the database ?
	$user_id = user_id_from_username($username);
	$username = sanitise($username);
	$password = md5($password);
	
	return (mysql_result(mysql_query("SELECT COUNT(user_id) FROM users WHERE username = '$username' AND password = '$password'"), 0) == 1) ? $user_id : false;
}
?>