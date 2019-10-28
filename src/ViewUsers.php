<?php
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
	echo '<!DOCTYPE html><html>
		<head>
			<meta charset="utf-8">
			<title>Exercise 5: View Users - Lab 5, EECS 448</title>
			<link rel="stylesheet" type="text/css" href="../styles/styles.css">
		</head>
		<body>
			<h4>EECS 448, Lab 5, Exercise 5: View Users</h4>
			<div id="content">
				<div class="centered"><h1>View Users</h1><table><caption class="subtitle">Users</caption>';
	while($row = $result->fetch_assoc())
	{
		echo '<tr><td>' . $row["user_id"] . '</td></tr>';
	}
	
	echo '</table></div></div>
		</body>
		</html>';
	$result->free();
}
else
{
	echo "Unable to query the server.";
}
$mysqli->close();

?>