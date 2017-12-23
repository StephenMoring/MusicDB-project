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
		<title>Browse</title>
	  <link rel="stylesheet" href="navbarstyle.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
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
	<li><a class="w3-hover-grey" href="/Welcome.php">Home</a></li>
	<li><a class="w3-hover-grey" href="/playlist.php">Playlist</a></li>
	<li><a class="w3-hover-grey" href="/tours.php">Tours</a></li>
	<li><a class="w3-hover-grey" href="Browse.php">Browse</a></li>
	<li><a class="w3-hover-grey" href="/contact.php">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	 <li style="width:auto"><a>Welcome <span><?php echo $firstname,' ', $lastname;?></span></a></li>
	 <li><a class="w3-hover-red" href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="w3-container w3-light-grey w3-opacity w3-padding-8" style="text-align:center; margin-top:60px;">
  <h1 style="color: #797C5D; font-weight: bold">Browse</h1>
  <br/>
  <form id="searchform" action="Browse.php" method="post">
    <input type="text" name="searchterm" id="searchterm" placeholder="Search by artist or song title..." style="width:250px" />
   <span class="input-group-btn">
      <input class="btn btn-success" type="submit" name="search" value="search" onclick="return load_page()" />
   </span>
  </form>
</div>

<div id="content" class="w3-container w3-light-grey w3-opacity w3-padding-8">
  <script language="javascript" type="text/javascript">
    function load_page(){
      
    
  
<?php
  $param = $_POST['searchterm'];

  require 'vendor/autoload.php';

  $session = new SpotifyWebAPI\Session(
    'ac7c18665b054b10a294faaeb3606f14',
    'e01e687f98bf4d56ac91eecb0a268138'

  );

  $api = new SpotifyWebAPI\SpotifyWebAPI();

  $session->requestCredentialsToken();
  $accessToken = $session->getAccessToken();


  // Store the access token somewhere. In a database for example.
  $api = new SpotifyWebAPI\SpotifyWebAPI();
  $api->setAccessToken($accessToken);



  echo "Results for tracks  : <br>";

  $listoftracks = array();
  $count = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't');

  $results = $api->search($param, 'track');
  foreach ($results->tracks->items as $track) {
     $listoftracks[] = $track->id;
  } 

  $_SESSION['genTracks'] = $listoftracks;


?>
  }
  </script>
</div>

<div>
  <?php
  foreach($listoftracks as $index => $value){
  echo "<table>";
  echo "<th></th><th></th>";
  echo "<tr><td><iframe src='https://open.spotify.com/embed?uri=spotify:track:$value' height='400' frameborder='0' allowtransparency='true'></iframe></td>";
  echo "<td><form action='playlist_index.php' method='post'><input type='text' name='plName' /><button type='submit' name='addSong' id='add $count[$index]' value='$value' />Add to playlist</form></td></tr>";
  echo "</table>";

}
?>
</div>
</body>

<footer class="w3-container w3-padding-32 w3-center w3-bottom w3-opacity w3-light-grey w3-xlarge" style="position: static">
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p class="w3-medium">Powered by Dope Playlist Designs</p>
</footer>

</html>