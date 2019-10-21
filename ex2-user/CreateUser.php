<?php
    /* this section is based on the example in the lab spec */
    $mysqli = new mysqli("mysql.eecs.ku.edu", "constanceli", "aph7Yui7", "constanceli");

    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $username = $_POST["username"];
    $queryExists = "SELECT user_id FROM Users WHERE user_id=" . $_POST["username"] . ");";
    if($result = $mysqli->query($queryExists));
    {
        echo "result true";
        $userExists = false;
        while($row = $result->fetch_assoc())
        {
            echo $row["user_id"];
            if($row["user_id"] == $username)
            {
                $userExists = true;
                echo $userExists;
            }
        }
        if($userExists)
        {
            echo "Sorry, that username already exists.\n";
        }

    //    $numRows = $result->num_rows;
    //    echo '$numRows = ' . $numRows . "\n";
    //    if($numRows != 0)
    //    {
    //        echo "Sorry, that username already exists.\n";
    //    }
        else
        {
            $queryInsert = "INSERT INTO Users (user_id) VALUES ('" . $_POST["username"] . "');";
            if($mysqli->query($queryInsert))
            {
                echo "The username " . $_POST["username"] . " was added!\n";
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
