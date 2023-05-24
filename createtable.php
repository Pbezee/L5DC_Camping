<?php
	
	$host = "localhost";
	$username = "root";
	$password = "";
	$dbname = "campingdb";

	$connection = mysqli_connect($host,$username,$password,$dbname);

	$sql = "create table pitch_info
			(id integer primary key auto_increment, 
			pitch_name varchar(100) not null, 
			location text not null, 
			address text not null, 
			photo varchar(200) not null, 
			general_info text not null, 
			country varchar(100) not null, 
			remark varchar(100) not null)";

	if(mysqli_query($connection, $sql))
		echo "Pitch Table is created";

	else
		echo "Error creating Table";

?>
