<?php
$servername = "localhost";
$DBusername = "root";
$DBpassword = "";
$err = "";


    try {
        $conn = new mysqli($servername, $DBusername, $DBpassword, "userdata");

    } catch(PDOException $e) {

        $conn->close;  
        $err =  $sql . "<br>" . $e->getMessage();
    }
    
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = strtolower($data);
    return $data;
}

function sqltogetName($ID, $conn){
    $result = $conn->query("select Username from users where ID = " . $ID);
    $result = $result->fetch_assoc();
    $IDtoName = $result["Username"];
    return $IDtoName;
}


?>