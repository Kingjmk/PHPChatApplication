<?php 

    require '../main.php';

    $senderID=$_COOKIE["ID"]; //get later from form or JS script 
    $recieverID = $_COOKIE["ReceiverID"]; 
    $message = $_POST["message"];

    //do vertifcation then send then check if send is successful
    if(strlen($message) > 1){
        $sql = "INSERT INTO messages (Sender, Reciever, Message) VALUES ('$senderID','$recieverID','$message')";
        $sendQuery = $conn->query($sql);
    }

    $conn->close();
?>