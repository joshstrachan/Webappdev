<div class="dropdown"> <!-- dropdown bar for accessing user profile and settings -->
  <button class="dropbtn"> <?php echo $user_data['first_name']; ?> </button>
  <div class="dropdown-content">
    <a href="index2.php">My Profile</a>
    <a href="messages.php">Messages</a>
	<a href="updateprofile.php">Update Profile</a>
    <a href="changepassword.php">Change Password</a>
	<a href="logout.php">Log Out</a>
  </div>
</div>
</div>