<!DOCTYPE html>
<html lang="en">

<?php 
include 'core/init.php';
protect_page();
include 'includes/head.php'; 
include 'includes/header2.php';
?>

	
	<body>
	 
	 <div id="wrapper">

		<div id="content">
			
				
			<h2> Welcome back <?php echo $user_data['first_name']; ?>! </h2><br/>
			<h3> Your profile details:</h3>
				
						Full name: <br/>
						<?php echo $user_data['first_name']; ?> <?php echo $user_data['last_name']; ?> <br/><br/>
					
					
					
						Gender:<br/>
						<?php echo $user_data['gender']; ?><br/><br/>
					
					
						Email:<br/>
						<?php echo $user_data['email']; ?><br/><br/>
					
					
						Date of birth:<br/>
						<?php echo $user_data['date_of_birth']; ?><br/><br/>
					
					
						Biography:<br/>
						<?php echo $user_data['biography']; ?><br/><br/>
					
					
						Availability:<br/>
						<?php echo $user_data['availability']; ?><br/><br/>
					
					
						Contact Number:<br/>
						<?php echo $user_data['contact_number']; ?><br/><br/>
					
					
						Website URL:<br/>
						<?php echo $user_data['website_url']; ?><br/><br/>
					
					
						Location:<br/>
						<?php echo $user_data['location']; ?><br/><br/>
					
				
				<? include 'includes/footer.php'; ?>
		 </div>
	</div>
	
</html>