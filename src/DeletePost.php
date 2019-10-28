<?php
function populateTable() {
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$mysqli = new mysqli("mysql.eecs.ku.edu", "constanceli", "aph7Yui7", "constanceli");
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	$query = "SELECT * from Posts;";
	if($result = $mysqli->query($query))
	{
		while($row = $result->fetch_assoc())
		{
			echo '<tr><td>' . $row["post_id"] . '</td><td>' . $row["author_id"] . '</td><td>' . $row["content"] . '</td><td><input type="checkbox" name="' . $row["post_id"] . '" value="' . $row["post_id"] . '"></td></tr>';
		}
	}
	else
	{
		echo "Unable to query the server.";
	}
	$mysqli->close();
}

function deleteChecked() {
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$mysqli = new mysqli("mysql.eecs.ku.edu", "constanceli", "aph7Yui7", "constanceli");
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	echo '<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title>Exercise 7: Delete Posts - Lab 5, EECS 448</title>
			<link rel="stylesheet" type="text/css" href="../styles/styles.css">
		</head>
		<body>
			<div>Exercise 7: Delete Posts - Lab 5, EECS 448</div>
			<div id="content">
				<h1 class="centered">Confirmation of Deletion(s)</h1>
				<div class="inner-content">
				<p>The following Post IDs were deleted:</p><ul>';
	foreach($_POST as $key => $value)
	{
		if(isset($key) && $key != "submit")
		{
			$query = "DELETE FROM Posts WHERE post_id='$_POST[$key]';";
			if($result = $mysqli->query($query))
			{
				echo "<li>$key</li>";
			}
			else
			{
				echo "<div>Error deleting ($key)</div>";
			}
		}
	}
	$mysqli->close();
	
	echo '</ul></div></div></body></html>';
}

if(isset($_POST["submit"]))
{
	deleteChecked();
}
?>