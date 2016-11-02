<!DOCTYPE html>
<html lang="en" class="no-js">

<?php 
include 'core/init.php';
protect_page();
include 'includes/head.php';

if (empty($_POST) === false) { // below is validation for change password form
	$required_fields = array('current_password', 'password', 'confirm_password');
	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Fields marked with an asterisk are required';
			break 1; 
		}
	}
	
	if (md5($_POST['current_password']) === $user_data['password']) {
		if (trim($_POST['password']) !== trim($_POST['confirm_password'])) {
			$errors[] = 'Your new passwords do not match each other';
		} else if ($_POST['current_password'] === $_POST['password']) { 
			$errors[] = 'Your password must not be the same as your current password.'; 
		} else if (strlen($_POST['password']) <= 6) {
			$errors[] = 'Your password must be at least 6 characters';
		}
	} else {
		$errors[] = 'Your current password is incorrect';
	}
	
}
 ?>

<body>
<?php include 'includes/header2.php'; ?>

<div id="wrapper">

<div id="content">
<h1>Change Password</h1>
<br>

<?php // This uses the change password function in users. php to change the password in the database

	if (isset($_GET['success']) && empty($_GET['success'])) {
		echo 'Your password has been successfully changed';
	} else {
		
	if (empty($_POST) === false && empty($errors) === true) {
	change_password($session_user_id, $_POST['password']);
	header('Location: changepassword.php?success');
		} else {
			echo output_errors($errors);
	} 
?>
	
<br>

<form action="" method="post">
	<ul>
		<li>
			Current Password*:<br>
			<input type="password" name="current_password">
		</li>
		<li>
			New Password*:<br>
			<input type="password" name="password">
		</li>
		<li>
			Confirm New Password*:<br>
			<input type="password" name="confirm_password">
		</li>
		<li>
			<input type="submit" value="Update">
		</li>
	</ul>
	
	<?php } ?>
</div>


<?php include 'includes/footer.php'; ?>


</div>
</body>

</html>
