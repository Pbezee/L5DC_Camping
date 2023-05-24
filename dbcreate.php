<?php
	
	$host = "localhost";
	$username = "root";
	$password = "";

	$connection = mysqli_connect($host,$username,$password);

	$sql = "create database campingdb";

	if(mysqli_query($connection, $sql))
		echo "User database is created";

	else
		echo "Error creating database";

?>
