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
$postContent = $_POST["post-content"];
$queryExists = "SELECT user_id FROM Users WHERE user_id='" . "$username" . "';";

if($result = $mysqli->query($queryExists))
{
	$userExists = false;
	if($row = $result->fetch_assoc())
	{
		if($row["user_id"] == $username)
		{
			$userExists = true;
		}
	}
	echo "($userExists)";
	if($userExists)
	{
		$queryInsert = "INSERT INTO Posts (content, author_id) VALUES (\"" . "$postContent" . "\", '" . "$username" . "');";
		if($mysqli->query($queryInsert))
		{
			echo "Your message was posted successfully!\n";
		}
		else
		{
			echo "Something went wrong with posting your message.\n";
		}
	}
	else
	{
		echo "The user \"$username\" does not exist.  Please use an existing username or <a href=\"https://people.eecs.ku.edu/~c817l905/eecs448-lab5/ex2-user/CreateUser.html\">create a new user</a> before posting your comment.";
	}
	
	$result->free();
}
else
{
	echo "Unable to query the server.";
}
$mysqli->close();

?>