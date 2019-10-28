<?php

function getUsers() {
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$mysqli = new mysqli("mysql.eecs.ku.edu", "constanceli", "aph7Yui7", "constanceli");
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	
	$query = "SELECT * FROM Users;";
	if($result = $mysqli->query($query))
	{
		while($row = $result->fetch_assoc())
		{
			echo '<option value="' . $row["user_id"] . '">' . $row["user_id"] . '</option>';
		}
	}
	else
	{
		echo "Unable to query the server.";
	}
	$mysqli->close();
	
}

	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$mysqli = new mysqli("mysql.eecs.ku.edu", "constanceli", "aph7Yui7", "constanceli");
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	
	$query = "SELECT * from Posts WHERE author_id='$user';";
	if($result = $mysqli->query($query))
	{
		while($row = $result->fetch_assoc())
		{
			echo '<tr><td>' . $row["post_id"] . '</td><td>' . $row["content"] . '</td></tr>';
		}
	}
	else
	{
		echo "Unable to query the server.";
	}
	$mysqli->close();




?>