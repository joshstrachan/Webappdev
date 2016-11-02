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
				<h3> Private message system </h3>
				<?php include 'messagetitlebar.php' ?>

				<?php
					if(isset($_GET['hash']) && !empty($_GET['hash'])){
						echo "Show messages";
					} else {
						echo "Select conversation:"; 
						$my_id = $_SESSION['user_id'];
						$get_con = mysql_query("SELECT hash, 'user_one', 'user_two' FROM message_group WHERE user_one='$my_id' OR user_two='$my_id'"); // pulling up all conversations that the current user was a participant in
						while($run_con = mysql_fetch_array($get_con)){
							$hash = $run_con['hash'];
							$user_one = $run_con['user_one'];
							$user_two = $run_con['user_two'];
							
							
							if($user_one == $my_id) {
								$select_id = $user_two;
							} else {
								$select_id = $user_one;
							}
							
							$user_get = mysql_query("SELECT username FROM users WHERE user_id='$select_id'");
							$run_user = mysql_fetch_array($user_get);
							$select_username = $run_user['username'];
							
							echo "<p><a href='conversations.php?hash=$hash'>$select_username</a></p>";
						}
					}
			?>
			</div>
			<?php include 'includes/footer.php'; ?>
		</div>
	</body>

</html>
