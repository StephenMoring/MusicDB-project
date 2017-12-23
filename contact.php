<?php 
session_start();
if (!isset($_SESSION['user']))
{
	header('Location: login.php');
}
else
{
	$firstname = $_SESSION['firstname'];
	$lastname = $_SESSION['lastname'];
}
?>
<!doctype html>
<html>
<head>
		<meta charset="utf-8">
		<title>Contact</title>
		<link rel="stylesheet" href="navbarstyle.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  		<style>
  			body {font-family: "Lato", sans-serif}
  			.mySlides {display: none}
  		</style>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
	<li><a class="w3-hover-grey" href="/welcome.php">Home</a></li>
	<li><a class="w3-hover-grey" href="/playlist.php">Playlist</a></li>
	<li><a class="w3-hover-grey" href="/tours.php">Tours</a></li>
	<li><a class="w3-hover-grey" href="Browse.php">Browse</a></li>
	<li><a class="w3-hover-grey" href="/contact.php">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	 <li style="width:auto"><a>Welcome <span><?php echo $firstname,' ', $lastname;?></span></a>
	 <li><a class="w3-hover-red" href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="w3-container w3-light-grey w3-opacity w3-padding-32" style="text-align:center; margin-top:60px;">
  <h1 style="color: #797C5D; font-weight: bold">Contact Information</h1>
  <br/>
  <br/>
  <p style="text-align:center; font-size: 24px;">Email: dopeplaylistdesigns@gmail.com</p>
  <br/>
  <p style="text-align:center; font-size: 24px;">Phone: 407-719-4657</p>
  <br/>
  <p style="text-align:center; font-size: 24px;">Address: 2636 Mission Road Tallahassee, Florida 32304
</div>

</body>

<footer class="w3-container w3-padding-32 w3-center w3-bottom w3-opacity w3-light-grey w3-xlarge">
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p class="w3-medium">Powered by Dope Playlist Designs</p>
</footer>