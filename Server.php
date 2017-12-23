<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '');
$dbname = 'playlist';
mysqli_select_db( $connect, '$dbname');


if (isset($_POST['createaccount_button']))
{
	
	$user = $_POST['user_name'];
	$user = rtrim($user);
	$pass = $_POST['password_1'];
	$pass = rtrim($pass);
	$email = $_POST['email'];
	$email = rtrim($email);
	$firstname = $_POST['firstname'];
	$firstname = rtrim($firstname);
	$lastname = $_POST['lastname'];
	$lastname = rtrim($lastname);


	$insert="INSERT INTO playlist.users (FirstName, LastName, Email, Username, Password) VALUES ))('$firstname', '$lastname', '$email', '$user', '$pass')";
	if(mysqli_query($connect, $insert))
	{
		 	echo '<script language="javascript">';
			echo 'alert("Account has been created. Please login to continue.");';
			echo 'window.location.href="login.php";';
			echo '</script>';
	}
	else
	{
		 	echo '<script language="javascript">';
			echo 'alert("Account could not be created successfully. Please try again.");';
			echo 'window.location.href="login.php";';
			echo '</script>';
	}
}


if (isset($_POST['resetbutton']))
{
	$pass = $_POST['password1'];
	$pass = rtrim($pass);
	$email = $_POST['either'];
	$email = rtrim($email);

	$update="UPDATE playlist.users SET Password='$pass' WHERE Email = '$email'";
	if(mysqli_query($connect, $update))
	{
		 	echo '<script language="javascript">';
			echo 'alert("Password has been reset. Please login to continue.");';
			echo 'window.location.href="login.php";';
			echo '</script>';
	}
	else
	{
		 	echo '<script language="javascript">';
			echo 'alert("Password could not be reset successfully. Please try again.");';
			echo 'window.location.href="Resetpassword.php";';
			echo '</script>';
	}
}

if (isset($_POST['emailbutton']))
{
	$email = $_POST['either'];
	$email = rtrim($email);
	$query = "SELECT FirstName,LastName,Username,Password FROM $dbname.users WHERE Email = '$email'";
	$user = mysqli_query($connect, $query);
	$results = mysqli_fetch_array($user);
	$firstname = $results['FirstName'];
	$lastname = $results['LastName'];
	$pass = $results['Password'];
	$username = $results['Username'];

	require_once('PHPMailer/PHPMailer-6.0.1/src/PHPMailer.php');
	require_once('PHPMailer/PHPMailer-6.0.1/src/POP3.php');
	require_once('PHPMailer/PHPMailer-6.0.1/src/Exception.php');
	require_once('PHPMailer/PHPMailer-6.0.1/src/SMTP.php');

	$mail = new PHPMailer\PHPMailer\PHPMailer();
	$mail->IsSMTP();
	$mail->IsHTML(true);
	$mail->SMTPDebug = 0;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->isHTML(true);
	$mail->Username = 'dopeplaylistdesigns@gmail.com';
	$mail->Password = 'seminoles';
	$mail->setFrom('no-reply@dopeplaylistdesigns.com');
	$mail->Subject = 'Forgot Password';
	$mail->Body = 'Hello '.$firstname.' '.$lastname.'!<br/> You recently requested to reset your password through the forgot password portal. Please click on button below to reset password. <br/><br/><a href="http://localhost/resetpassword.php"><button btn btn-successful>Reset Password</button></a>';
	$mail->AddAddress($email, $firstname.' '.$lastname);
	if($mail->send())
	{
		 	echo '<script language="javascript">';
			echo 'alert("An email has been sent to reset your password. Please login to continue.");';
			echo 'window.location.href="login.php";';
			echo '</script>';
	}
	else
	{
		 	echo '<script language="javascript">';
			echo 'alert("Email could not be sent successfully. Please try again.");';
			echo 'window.location.href="ForgotPassword.php";';
			echo '</script>';
	}
}

if (isset($_POST['usernamebutton']))
{
	$email = $_POST['either'];
	$email = rtrim($email);
	$query = "SELECT FirstName,LastName,Username,Password FROM $dbname.users WHERE Email = '$email'";
	$user = mysqli_query($connect, $query);
	$results = mysqli_fetch_array($user);
	$firstname = $results['FirstName'];
	$lastname = $results['LastName'];
	$pass = $results['Password'];
	$username = $results['Username'];

	require_once('PHPMailer/PHPMailer-6.0.1/src/PHPMailer.php');
	require_once('PHPMailer/PHPMailer-6.0.1/src/POP3.php');
	require_once('PHPMailer/PHPMailer-6.0.1/src/Exception.php');
	require_once('PHPMailer/PHPMailer-6.0.1/src/SMTP.php');

	$mail = new PHPMailer\PHPMailer\PHPMailer();
	$mail->IsSMTP();
	$mail->IsHTML(true);
	$mail->SMTPDebug = 0;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->isHTML(true);
	$mail->Username = 'dopeplaylistdesigns@gmail.com';
	$mail->Password = 'seminoles';
	$mail->setFrom('no-reply@dopeplaylistdesigns.com');
	$mail->Subject = 'Forgot Username';
	$mail->Body = 'Hello '.$firstname.' '.$lastname.'!<br/> You recently requested to receive your username through the forgot username portal. Below is your username. <br/><br/>Username: '.$username.'<br/><br/>Please login to continue';
	$mail->AddAddress($email, $firstname.' '.$lastname);
	if($mail->send())
	{
		 	echo '<script language="javascript">';
			echo 'alert("An email has been sent containing your username. Please login to continue.");';
			echo 'window.location.href="login.php";';
			echo '</script>';
	}
	else
	{
		 	echo '<script language="javascript">';
			echo 'alert("Email could not be sent successfully. Please try again.");';
			echo 'window.location.href="ForgotPassword.php";';
			echo '</script>';
	}
}


if (isset($_POST['login_button']))
{
	$user = $_POST['username'];
	$user = rtrim($user);
	$pass = $_POST['password'];
	$pass = rtrim($pass);
	$query = mysqli_query($connect, "SELECT * FROM $dbname.users WHERE Username = '$user'");
	$results = mysqli_fetch_array($query);
	$sqlpass = $results['Password'];
		
	if($pass == $sqlpass)
	{
			$_SESSION['user'] = $results['Username'];
			$_SESSION['firstname'] = $results['FirstName'];
			$_SESSION['lastname'] = $results['LastName'];
		 	echo '<script language="javascript">';
			echo 'alert("Login Successful");';
			echo 'window.location.href="welcome.php";';
			echo '</script>';
			
	}
	else
	{
		 	echo '<script language="javascript">';
			echo 'alert("Login not successfully. Please try again.");';
			echo 'window.location.href="login.php";';
			echo '</script>';

	}
}

if (isset($_POST['logout']))
{
	session_start();
	unset($_SESSION);
	session_destroy();
	echo '<script language="javascript">';
	echo 'alert("Logout Successful");';
	echo 'window.location.href="welcome.php";';
	echo '</script>';
}

//button to insert new playlist into database
if (isset($_POST['create_playlist_button'])){
	$playlistName = $_POST['playlistName'];
	$item = $_SESSION['user'];
	$query = "SELECT user_id FROM $dbname.users WHERE Username = '$item'";
	$userinfo = mysqli_query($connect, $query);
	$results = mysqli_fetch_array($userinfo);
	$user_ID = $results['user_id'];

	$insert = "INSERT INTO playlist.playlists (user_id, playlistName) VALUES ('$user_ID', '$playlistName')";

	//reroutes us back to welcome page
	if(mysqli_query($connect, $insert) or die (mysqli_error($connect))){
		echo '<script language="javascript">';
		echo 'alert("Playlist Created");';
		echo 'window.location.href="welcome.php";';
		echo '</script>';
	}
}



mysqli_close($connect);

?>