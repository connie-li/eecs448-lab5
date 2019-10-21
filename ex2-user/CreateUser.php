<?php
    /* this section is based on the example in the lab spec */
    $mysqli = new mysqli("mysql.eecs.ku.edu", "constanceli", "aph7Yui7", "constanceli");

    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    
    $queryExists = "SELECT user_id FROM Users WHERE EXISTS (SELECT user_id FROM Users WHERE user_id=" . $_POST["username"] . ");";

    echo $queryExists;
    $userExists = $mysqli->query($queryExists);
    if($userExists)
    {
        echo "Sorry, that username already exists.";
    }
    else
    {
        $queryInsert = "INSERT INTO Users (user_id) VALUES ('" . $_POST["username"] . "');";
        echo $queryInsert;
        echo "The username " . $_POST["username"] . " was added!";
    }
    
$mysqli->close();
?>
