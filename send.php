<!DOCTYPE html>
<html lang="en" class="no-js">

	<?php 
		include 'core/init.php';
		include 'includes/head.php'; 
	?>

	<body>
		<?php include 'includes/header2.php'; ?>

		<div id="wrapper">

			<div id="content">
				<h3> Private Messaging </h3>
				<?php include 'messagetitlebar.php' ?>
				
				<div>
					<?php
						if(isset($_GET['user_id']) == !empty($_GET['user_id'])){
							?>
							<form method="post">
							
							<?php 
							
								if(isset($_POST['message']) && !empty($_POST['message'])){
									$my_id = $_SESSION['user_id']; //check this
									$user = $_GET['user'];
									$random_number = rand();
									$message = $_POST['message'];
									
									$check_con = mysql_query("SELECT hash FROM message_group WHERE (`user_one`='$my_id' AND `user_two`='$user') OR (`user_one`='$user' AND `user_two`='$my_id')");
									
									if(mysql_num_rows($check_con) >= 1) {
										echo "<p>Conversation already started!</p>";
									} else {
										mysql_query("INSERT INTO message_group VALUES ($my_id, $user, '$random_number')");
										mysql_query("INSERT INTO messages VALUES ('', $random_number, $my_id, $message')");
										echo "<p> Conversation started! </p>";
								}
								}
							?>
							
							Enter Message: <br/>
							<textarea name='message' rows='7' cols='60'></textarea>
							<br/><br/>
							<input type="submit" value="Send Message">
							</form>
							<?php
						} else {
							echo "<h3>Select User</h3>";
							
							$user_list = mysql_query("SELECT user_id, username FROM users");
							while($run_user = mysql_fetch_array($user_list)){
								$user_id = $run_user['user_id'];
								$username = $run_user['username'];
								echo "<p><a href='send.php?user=$user_id'>$username</a>";
							}
							/* $user_id =  $user_data['user_id'];
							$username = $user_data['username'];
							echo "<p><a href='send.php?user=$user_id'>$username</a>"; */
						}
					?>
				</div>
			</div>

			
			
			<?php include 'includes/footer.php'; ?>
		</div>
	</body>

</html>
