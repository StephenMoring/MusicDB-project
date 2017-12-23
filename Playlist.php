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
<!DOCTYPE html>
<html>
<head>
  <title>Playlists</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="playlist_style.css">
  <link rel="stylesheet" href="navbarstyle.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  body {font-family: "Lato", sans-serif}
  .mySlides {display: none}
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
	<li><a class="w3-hover-grey" href="/Welcome.php">Home</a></li>
	<li><a class="w3-hover-grey" href="/playlist.php">Playlist</a></li>
	<li><a class="w3-hover-grey" href="/tours.php">Tours</a></li>
	<li><a class="w3-hover-grey" href="/Browse.php">Browse</a></li>
	<li><a class="w3-hover-grey" href="/contact.php">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	 <li style="width:auto"><a>Welcome <span><?php echo $firstname,' ', $lastname;?></span></a>
	 <li><a class="w3-hover-red" href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Page content -->
<div id="artists" style="max-width:2000px;margin-top:46px">
  <div>
    <h2 class="headers" style="color: #9e9e9e">Create A Playlist</h2>
    <div id="playlist_area">
      <div id="playlist_display">
        <h4 id="listLoc" style="text-align: center">Your Playlist:</h4>


      </div>
        <!--- Here I want the user to 
              1. Create and name a new playlist
              2. Look at previously created Playlists
              3. See songs in said Playlists        -->
              <!-- below is the button to create a new playlist, as well as the loop to show all user playlists -->
        <button id="myBtn" name="addplaylist" class="welcomeButtons">+ Create New Playlist</button>
        <?php
          $connect = mysqli_connect('127.0.0.1', 'root', '');
          $dbname = 'playlist';
          $person = $_SESSION['user'];
          $sqlGetUser = "SELECT user_id FROM playlist.users WHERE Username = '$person'";
          $sqlData1 = mysqli_query($connect, $sqlGetUser);
          $results = mysqli_fetch_array($sqlData1);
          $variable = $results['user_id'];
          $sqlGetId = "SELECT playlistName FROM playlist.playlists WHERE user_id = '$variable'";
          $sqlData2  = mysqli_query($connect, $sqlGetId) or die ($connect);
          echo "<table>";
          echo "<tr><th>Playlists</th></th>";
           while ($row = mysqli_fetch_array($sqlData2, MYSQLI_ASSOC)){
              $listItem = $row['playlistName'];
              echo "<tr><td>";
              echo "<form action='playlist.php' method='post'>";
              echo "<input type='submit' name='selectedplaylist' value='$listItem' />";
              echo "</form>";
              echo "</td></tr>";
           }
           echo "</table>";
           ?>


           <!-- conditional function to print the songs for a respective playlist when the playlist is selected -->
           <?php
           if(isset($_POST['selectedplaylist'])){
            $person = $_SESSION['user'];
            $currentPlayList = $_POST['selectedplaylist'];
            $sqlData1 = mysqli_query($connect, "SELECT user_id FROM playlist.users WHERE Username = '$person'") or die(mysqli_error($connect));
            $results= mysqli_fetch_array($sqlData1);
            $usersID = $results['user_id'];
            $sqlData2 = mysqli_query($connect, "SELECT playlist_id FROM playlist.playlists WHERE user_id = '$usersID' AND playlistName = '$currentPlayList' ") or die(mysqli_error($connect));
            $results  = mysqli_fetch_array($sqlData2);
            $usersPlaylist = $results['playlist_id'];
            $result = mysqli_query($connect, "SELECT * FROM playlist.songs WHERE playlist_id = '$usersPlaylist'") or die(mysqli_error($connect));

            ?><table style="position: absolute; top: 32%; right: 41%; background: rgba(0,0,0,0.5)"><?php
            while ($row = mysqli_fetch_array($result)){
              $value = $row['song_id'];
              ?>
                <div id="playlist_table">
                  <tr><td><p> <?php echo "<iframe src='https://open.spotify.com/embed?uri=spotify:track:$value' height='75' frameborder='0' allowtransparency='true'></iframe>" ?></p></td></tr>
                </div>

              <?php 
            }
            ?></table><?php
           }


        ?>
    </div>  


    <!-- $$$$$$$$$$$$$$$$$$$$$$$$$$ modal table for create a new playlist button create a new playlist   $$$$$$$$$$$$$$$ -->
    <div id="myModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <form action="Server.php" method="post">
          <label>Name your Playlist:</label>
          <br />
          <input type="text" name="playlistName" />
          <button type="submit" name="create_playlist_button" id="create_playlist_button" class="btn btn-success" style="margin:auto">Create</button>
        </form>
      </div>
    </div>
  </div>
</div>


  <script>
          // Get the modal
      var modal = document.getElementById('myModal');

      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks the button, open the modal 
      btn.onclick = function() {
          modal.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
          modal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }
  </script>

</body>


<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge w3-bottom" style="position: static">
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p class="w3-medium">Powered by Dope Playlist Designs</p>
</footer>



</html>
