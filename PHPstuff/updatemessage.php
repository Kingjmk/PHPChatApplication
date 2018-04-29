<?php

    require '../main.php';
    
    $senderID= $_COOKIE["ID"]; //get later from form or JS script 

    if (isset($_COOKIE["ReceiverID"])){
        $recieverID = $_COOKIE["ReceiverID"];
        echo "<p>chatting with " . sqltogetName($recieverID,$conn) . "</p></br>";
        //sql queries 
        $sql = "SELECT * FROM `messages` WHERE (`Sender`= $senderID or `Sender`= $recieverID)  and (`Reciever` = $senderID or `Reciever` = $recieverID) ORDER BY `messages`.`DateT` DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                //check if sender is this user then add class or something
                echo sqltogetName($row["Sender"],$conn) ." : ". $row["Message"] . "<br>";

            }

        } else {
            echo "0 Messages";
        }

    }

    $conn->close();
?>