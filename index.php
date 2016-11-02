<!DOCTYPE html>
<html lang="en">
<?php 
include 'core/init.php';

if (logged_in() === true) { //redirects logged in users to the updated index page
	header('Location: index2.php');
}
include 'includes/head.php'; 
?>

<body>

<?php
include 'includes/header.php';
?>

<div id="wrapper">

<div id="content">

<section class="module parallax parallax-1">
  <div class="container">
  <h1>WePlay</h1>
  </div>
  </section>
  
  
  <section class="module content">
  <div class="container">
    <h2>The social network for musicians</h2>
  <p>WePlay is a brand new social networking website specifically aimed at aspiring and professional musicians. WePlay is designed to make it as easy as possible to meet, and connect with other musicians locally whether this is to form a new band, or simply to arrange a jam. Sign up today and unleash your potential!</p>
  </div>
</section>
<section class="module parallax parallax-2">
  <div class="container">
    <h1>What?</h1>
  </div>
</section>

<section class="module content">
  <div class="container">
    <h2>What</h2>
    <p>WePlay allows its users to find nearby musicians, whether that be to arrange a jam, discuss music or even form a band. Not only this but our live chats and online jam sessions will allow you to interact with potentially like-minded musicians from all over the world! </p>
  </div>
</section>


<section class="module parallax parallax-3">
  <div class="container">
    <h1>Who?</h1>
  </div>
</section>

<section class="module content">
  <div class="container">
    <h2>Free to all!</h2>
    <p>While we do aim to help musicians find one another, that doesn't mean everyone is not welcome! Whether you're a budding young musician, or just a music fan, we are open to all. So sign up today and find out what all the fuss is about</p>
  </div>
</section>
</div>


</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>
