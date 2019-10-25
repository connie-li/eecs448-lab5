<?php
/* much of this is modeled after the example in the lab spec */
error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "constanceli", "aph7Yui7", "constanceli");
if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

$username = $_POST["username"];
$queryExists = "SELECT user_id FROM Users WHERE user_id='$username'";

if($result = $mysqli->query($queryExists));
{
	$userExists = false;
	if($row = $result->fetch_assoc())
	{
		if($row["user_id"] == $username)
		{
			$userExists = true;
		}
	}
	else
	{
		echo "Unable to get the result row.";
	}
	
	if($userExists)
	{
		
	}
	
	$result->free();
}
else
{
	echo "Unable to get result from the server.";
}
$mysqli->close();

?>