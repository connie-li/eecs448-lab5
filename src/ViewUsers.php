<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "constanceli", "aph7Yui7", "constanceli");
if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}


if($result = $mysqli->query($queryExists))
{
	
}
else
{
	echo "Unable to query the server.";
}
$mysqli->close();

?>