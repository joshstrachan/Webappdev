<!DOCTYPE html>
<html lang="en" class="no-js">

<?php 
	include 'core/init.php';
	protect_page();
	include 'includes/head.php';
	include 'includes/header2.php'; 
?>

<body>
<?php 
	if (empty($_POST) === false) { // below this is the validation for updating the profile
		$required_fields = array('first_name', 'email', 'availability', 'location');
		foreach($_POST as $key=>$value) {
			if (empty($value) && in_array($key, $required_fields) === true) {
				$errors[] = 'fields marked with an asterisk are required';
				break 1;
			}
		}
		
		if (empty($errors) === true) { //email address validation
			if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
				$errors[] = 'A valid email address is required';
			} else if (email_exists($_POST['email']) === true && $user_data['email'] !== $_POST['email']) {
				$errors[] = 'Sorry, the email \'' . $_POST['email'] . '\' is already in use';
			}
		}
	}
?>

</form>

<div id="wrapper">

<div id="content">
<h1>Update Profile</h1>
<br>

<?php
	if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
		echo 'Your profile details have been updated';
	} else {

		if (empty($_POST) === false && empty($errors) === true) { // prints errors into the page itself rather than elsewhere on the page
			$update_data = array(
									'first_name' 		=> $_POST['first_name'],
									'last_name' 		=> $_POST['last_name'],
									'gender' 			=> $_POST['gender'],
									'email' 			=> $_POST['email'],
									'date_of_birth'		=> $_POST['date_of_birth'],
									'biography'			=> $_POST['availability'],
									'contact_number'	=> $_POST['contact_number'],
									'website_url'		=> $_POST['website_url'],
									'availability'		=> $_POST['availability'],
									'location'			=> $_POST['location'],
								); 
								
								update_user($update_data);
								header('location: updateprofile.php?success');
								exit();
								
		} else if (empty($errors) === false) {
			echo output_errors($errors);
		}
	
?>

<fieldset>
<legend> Update Profile </legend>
	<form action="" method="post"> <!-- form to update user profile -->
	<ol>
		<li>
			first name*:
			<input type="Text" Name="first_name" value="<?php echo $user_data['first_name']; ?>">
		</li>
		<li>
			Last name:
			<input type="text" Name="last_name" value="<?php echo $user_data['last_name']; ?>">
		</li>
		<li>
			Gender:
			<input type="text" Name="gender" value="<?php echo $user_data['gender']; ?>">
		</li>
		<li>
			Email*:
			<input type="text" Name="email" value="<?php echo $user_data['email']; ?>">
		</li>
		<li>
			Date of Birth:
			<input type="date" Name="date_of_birth" value="<?php echo $user_data['date_of_birth']; ?>">
		</li>
		<li>
			Biography:
			<input type="text" Name="biography" value="<?php echo $user_data['biography']; ?>">
		</li>
			<li>
				Availability*:
				<select name="availability" value="<?php echo $user_data['availability']; ?>">
				<option value="Yes">Yes, I am available </option>
				<option value="No"> No, I am not avialable </option>
				</select>
			</li>
		<li>
			Contact number:
			<input type="text" Name="contact_number" value="<?php echo $user_data['contact_number']; ?>">
		</li>
		<li>
			Website_URL:
			<input type="text" Name="website_url" value="<?php echo $user_data['website_url']; ?>">
		</li>
		<li>
			Location*:
			<input type="text" name="location" value="<?php echo $user_data['location']; ?>">
		</li>
		<li>
			<input type="submit" value="Update">
		</li>
	</ol>
	<?php } ?>
<br>


</div>


<?php include 'includes/footer.php'; ?>


</div>
</body>

</html>