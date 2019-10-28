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

	foreach($_POST as $key => $value)
	{
		if(isset($key) && $key != "submit")
		{
			$query = "DELETE FROM Posts WHERE post_id='$_POST[$key]';";
			if($result = $mysqli->query($query))
			{
				echo "Deleted post $key.";
			}
			else
			{
				echo "Error deleting ($key)";
			}
		}
	}
	$mysqli->close();
}

if(isset($_POST))
{
	deleteChecked();
}
?>