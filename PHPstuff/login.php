<?php 

    //get connection
    require '../main.php';


    $pass3= test_input($_POST["password1"]);
    $email =test_input($_POST["email"]);
    if(empty($pass3) == false && empty($email) == false && isset($pass3)){
        $checkemail = "SELECT * FROM `users` WHERE `Email` = '$email'" ;
            
        if ($stmtusr = $conn->query($checkemail)) {          
            $temprow = $stmtusr->fetch_assoc();
            $tempUsr = $temprow["Username"];
            $tempEmail = $temprow["Email"];
            $tempPass = $temprow["Password"];
            $tempID = $temprow["ID"];
            $stmtusr->close();

            //actual login validation 
            if($tempEmail == $email && $tempPass == $pass3){
                //deleting cookies
                $past = time() - 3600;
                foreach ($_COOKIE as $key => $value ){
                    setcookie( $key, $value, $past, '/' );
                }
                //throwing info into session
                setcookie("ID", $tempID, time() + (86400), "/");
                setcookie("Username", $tempUsr, time() + (86400), "/");
                setcookie("Email", $tempEmail, time() + (86400), "/");
                setcookie("password", $tempPass, time() + (86400), "/");

                $err = "Logged in!";
                setcookie("err", $err, time() + (86400), "/");

            } else {
                $err = "login info incorrect";
            }
        }
            

    } else {
        $err = "login info invalid";
    }
    setcookie("err", $err, time() + (86400), "/"); 
    
    $conn->close();
?>