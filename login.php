<!DOCTYPE html>
<html lang="en" class="no-js">

<?php
include 'core/init.php';
logged_in_redirect();
include 'includes/head.php';
?>
<body>

<?php
include 'includes/header.php';
?>
<div id="wrapper">

<div id="content">

<?php
if (empty($_POST) === false){
 $username = $_POST['username'];
 $password = $_POST['password'];
 
 if (empty($username) === true || empty($password) === true) {
  $errors[] = 'You need to enter a username and password';
 } else if (user_exists($username) === false) {
  $errors[] = 'We can\'t find that username. Have you registered?';
 } else if (user_active($username) === false) {
	 $errors[] = 'You need to activate your account';
} else {
	
	if (strlen($password) > 32) {
		$errors[] = 'Password too long (maximum of 32 characters';
	}
	$login = login($username, $password);
	if ($login === false) {
		$errors[] = 'That username/password combination is incorrect';
	} else {
		$_SESSION['user_id']= $login; /* set the user session */
		header('Location: index2.php'); /* redirect user to home once logged in*/
	}
}
} else {
	$errors[] = 'No data recieved'; /* this is for when users access login page without giving any data */
}
if (empty($errors) === false) {/* displays error messages on login */
	?>
	<h2>We tried to log you in, but...</h2>
	<?php
echo output_errors($errors);
	
}
include 'includes/footer.php'; ?>

</body>