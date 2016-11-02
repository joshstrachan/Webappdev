<div id="header">  <!-- header including logo/home button and navigation bar for signing in and registering-->
 
	<!-- Logo set as clickable link to homepage-->
	<div class="left">
	<a href="index2.php"><img class="Logo" src="images/logo.jpg" alt="WePlay Logo" height="70" width="100"></a>
	</div>
	<div class="right">
	<?php include 'includes/aside.php'; ?>
	</div>
<!-- Search bar will go here -->


</div>

<div id="navclmn">
<!-- Navigation bar to find other sections -->
<nav>
	<a href="#" class="nav-toggle-btn" name="Click"></a>
	<ul>
		<li><a href="browsembrs.php">Browse Members</a></li>
		<li><a href="browseevnts.php">Browse Events</a></li>
		<li><a href="mybands.php">My Bands</a></li>
		<li><a href="myevents.php">My Events</a></li>
</nav>


</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
	(function() {
	var bodyEl = $('body'),
		navToggleBtn = bodyEl.find('.nav-toggle-btn');
	navToggleBtn.on('click', function(e) {
	bodyEl.toggleClass('active-nav');
	e.preventDefault();
	});
	
	})();
	</script>
	
	<div class="clear"></div>
</div>