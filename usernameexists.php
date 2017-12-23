<?php

$username = "root";
$password = "";
$host = "localhost";
$dbname = "playlist";
$connect = mysql_connect($host, $username, $password, $dbname);

if(isset($_POST['user_name'])) 
{
	$user = $_POST['user_name'];
	$query = "SELECT * FROM $dbname.users WHERE Username = '$user'";
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

if(isset($_POST['username'])) 
{
	$user = $_POST['username'];
	$query = "SELECT * FROM $dbname.users WHERE Username = '$user'";
	$results = mysql_query($query);
	if(mysql_num_rows($results) > 0)
	{
        	echo "true";
	}
	else
	{
        	echo "false";
	}

}
mysql_close($connect);

?>