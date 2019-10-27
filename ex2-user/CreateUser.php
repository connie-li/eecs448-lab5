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
        while($row = $result->fetch_assoc())
        {
            if($row["user_id"] == $username)
            {
                $userExists = true;
            }
        }
        if($userExists)
        {
            echo "Sorry, that username already exists.\n";
        }
        else
        {
            $queryInsert = "INSERT INTO Users (user_id) VALUES ('$username');";
            if($mysqli->query($queryInsert))
            {
                echo "The username \"$username\" was added!\n";
            }
            else
            {
                echo "Something went wrong.\n";
            }
        }
        $result->free();
    }
    
    $mysqli->close();
?>
