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
		$result->free();
	}
	else
	{
		echo "Unable to query the server.";
	}
	$mysqli->close();
	
}

// get and display the selected user's posts.
function getPosts() {
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$mysqli = new mysqli("mysql.eecs.ku.edu", "constanceli", "aph7Yui7", "constanceli");
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	$user = $_POST["user"];
	$query = "SELECT * from Posts WHERE author_id='$user';";
	if($result = $mysqli->query($query))
	{
		echo '<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title>Exercise 6: View User Posts - Lab 5, EECS 448</title>
			<link rel="stylesheet" type="text/css" href="../styles/styles.css">
		</head>
		<body>
			<div>Exercise 6: View User Posts - Lab 5, EECS 448</div>
			<div id="content">
				<h1 class="centered">View User Posts</h1>
				<div class="inner-content">
				<div id="posts-table">
						<table><caption class="subtitle">Posts by ' . $user . '</caption>
							<tr>
								<th>Post ID</th><th>Post Content</th>
							</tr>';
		while($row = $result->fetch_assoc())
		{
			echo '<tr><td>' . $row["post_id"] . '</td><td>' . $row["content"] . '</td></tr>';
		}

		echo '</table></div>
				</div>
			</div>
		</body>
		</html>';
		$result->free();
	}
	else
	{
		echo "Unable to query the server.";
	}
	$mysqli->close();
}

if(isset($_POST["user"]))
{
	getPosts();
}

?>