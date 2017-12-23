<?php

$username = "root";
$password = "";
$host = "localhost";
$dbname = "playlist";
$connect = mysql_connect($host, $username, $password, $dbname);

if(isset($_POST['password_1'])) 
{
	$pass = $_POST['password_1'];
	$query = "SELECT * FROM $dbname.users WHERE Password = '$pass'";
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
mysql_close($connect);

?>