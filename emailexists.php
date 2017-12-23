<?php

$username = "root";
$password = "";
$host = "localhost";
$dbname = "playlist";
$connect = mysql_connect($host, $username, $password, $dbname);

if(isset($_POST['email'])) 
{
	$email = $_POST['email'];
	$query = "SELECT * FROM $dbname.users WHERE Email = '$email'";
	$results = mysql_query($query);
	if(mysql_num_rows($results) == 0)
	{
        	echo "true";  //good to register
	}
	else
	{
        	echo "false"; //already registered
	}

}

if(isset($_POST['either'])) 
{
	$email = $_POST['either'];
	$email = rtrim($email);
	$query = "SELECT * FROM $dbname.users WHERE Email = '$email'";
	$results = mysql_query($query);
	if(mysql_num_rows($results) == 0)
	{
        	echo "false";
	}
	else
	{
        	echo "true";
	}

}
mysql_close($connect);

?>