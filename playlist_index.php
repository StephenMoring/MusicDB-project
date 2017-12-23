<?php 
session_start();
$connect = mysqli_connect('localhost', 'root', '');
$dbname = 'playlist';
mysqli_select_db( $connect, '$dbname');

$username = $_SESSION['user'];
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$val = $_POST['addSong'];
$plName = $_POST['plName'];


$query = "SELECT playlists.playlist_id, users.user_id FROM $dbname.playlists INNER JOIN $dbname.users ON playlists.playlistName = '$plName' AND users.Username = '$username'";
$userinfo = mysqli_query($connect, $query);
$results = mysqli_fetch_array($userinfo);
$user_ID = $results['user_id'];
$pl_ID = $results['playlist_id'];


$insert = "INSERT INTO playlist.songs (song_id, playlist_id) VALUES ('$val', '$pl_ID')";

if(mysqli_query($connect, $insert) or die (mysqli_error($connect))){
	echo '<script language="javascript">';
	echo 'alert("Song Added!");';
	echo 'window.location.href="Browse.php";';
	echo '</script>';
}

?>