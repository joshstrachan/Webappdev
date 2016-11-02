<!DOCTYPE html>
<html lang="en">
	<body>
	
		<?php 
			include 'core/init.php';
			logged_in_redirect();
			include 'includes/header.php';
		?>
		
		<div id="wrapper">

			<div id="content">
			
			<?php 
				include 'includes/head.php'; 
				if (empty($_POST) === false) {/* used for error reporting for missing necissary data */
					$required_fields = array('username', 'password', 'confirm_password', 'first_name', 'email');
					foreach($_POST as $key=>$value) {
						if (empty($value) && in_array($key, $required_fields) === true) {
							$errors[] = 'Fields marked with an asterisk are required';
							break 1; 
						}
						if (empty($errors) === true) { /* used to stop from outputting error messages if fields are missing */
							
							if (user_exists($_POST['username']) === true) { /* used to verify if username exists on database */
								$errors[] = 'Sorry, the username \'' . htmlentities($_POST['username']) . '\' has already been taken';
							}
							
							if (preg_match("/\\s/", $_POST['username']) == true) {
								$errors[] = 'Your username should not contain any spaces';
							}
							
							if (strlen($_POST['password']) <= 6) {
								$errors[] = 'Your password must be at least 6 characters';
							}
							
							if ($_POST['password'] !== $_POST['confirm_password']) {
								$errors[] = 'Your password do not match';
							}
							
							if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
								$errors[] = 'A valid email address is required';
							}
							
							if (email_exists($_POST['email'] === true)) {
								$errors[] = 'sorry, the email \'' . $_POST['email'] . '\' is already in use';
							}
						}
					}
				}
			?>
				<section id="Registration">
					<h1>Join us Now, completely free!</h1>
					<p>Please enter your details below, all forms are required.</p>
					
					<?php
					if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
		echo 'Your profile has been successfully created, please log in now.';
	} else {

						if (empty($_POST) === false && empty($errors) === true) {
							$register_data = array(
								'username' 		=> $_POST['username'],
								'password' 		=> $_POST['password'],
								'email' 		=> $_POST['email'],
								'first_name' 	=> $_POST['first_name'],
								'last_name'		=> $_POST['last_name'],
							); 
							
							register_user($register_data); //registers user in the database
							header('Location: register.php?success');
							exit();
							
						} else if (empty($errors) === false){
							echo output_errors($errors); // output error messages
						}
	}
					?>
					<br></br>
					<br></br>
					<fieldset>
						<legend> Register now! </legend>
						<form action="" method="post">
							<ul>
								<li>
									Username*:<br>
									<input type="text" name="username">
								</li>
								<li>
									Password*<br>
									<input type="password" name="password">
								</li>
								<li>
									Confirm Password*<br>
									<input type="password" name="confirm_password">
								</li>
								<li>
									email*<br>
									<input type="text" name="email">
								</li>
								<li>
									First Name*<br>
									<input type="text" name="first_name">
								</li>
								<li>
									Last Name<br>
									<input type="text" name="last_name">
								</li>
								<li>
									<input type="submit" value="Register">
								</li>
							</ul>
						</form>
					</fieldset>
				</section>
			</div>





			<?php include 'includes/footer.php'; ?>


		</div>
	</body>
</html>
