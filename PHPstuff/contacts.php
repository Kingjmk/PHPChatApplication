<?php

    require '../main.php';

    //sql queries 
    $sql = "SELECT * FROM users " ; //have a friend list maybe ??
    $ContactList = $conn->query($sql);

    if ($ContactList->num_rows > 0) {
        // output contacts of each row
        while($row = $ContactList->fetch_assoc()) {
            //check if sender is this user then add class or something
            echo "<input type=\"radio\" name=\"cont\" id=\"conbtn\" value=" . $row["ID"] . ">"  . $row["Username"] . "</input><br>";
        }

    } else {
        echo "0 Messages";
    }

    $conn->close();

?>