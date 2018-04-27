<?php
$servername = "localhost";
$username = "root";
$password = "";
$err = "";
$rID =  $_POST["requestID"];



    try {
        $conn = new mysqli("localhost", "id5517220_userinfodb", "qazxsw21", "id5517220_userinfodb");

        if(isset($rID) == true){
            if($rID == 1){ registerrequest($conn);
            } elseif($rID == 2){loginrequest($conn);
            } elseif($rID == 3){logout();
            } else {
                $err="invalid+form+ID";
                setcookie("err", $err, time() + (86400), "/");
                die();
            }
            
            
        } else {
            $err="no+form+ID";
            setcookie("err", $err, time() + (86400), "/");
            die();
        }

    } catch(PDOException $e) {

        $conn->close;  
        $err =  $sql . "<br>" . $e->getMessage();
    }



function registerrequest($conn){
        $name = test_input($_POST["username"]);
        $pass1= test_input($_POST["password1"]);
        $pass2= test_input($_POST["password2"]);
        $email =test_input($_POST["email"]);
        if(empty($name) == false && $pass1 == $pass2 && empty($pass1) == false && empty($email) == false){
            $checkusr = "SELECT Username FROM `users` WHERE `Username` = '$name'" ;
            $checkemail = "SELECT Email FROM `users` WHERE `Email` = '$email'" ;
            $didcheckfail = true;

            if ($stmt1 = $conn->query($checkusr)) {          
                $rs1 = $stmt1->num_rows;
                $stmt1->close();
            }

            if ($stmt2 = $conn->query($checkemail)) {          
                $rs2 = $stmt2->num_rows;
                $stmt2->close();
            }
            
            if ($rs1 > 0) {
                $err = "user Already Exists" .$rs2;  
                $didcheckfail = true;

            } elseif ($rs2 > 0) {
                $err = "email Already Exists" .$rs2;
                $didcheckfail = true;

            } else {
                $didcheckfail = false;
            }
            
            if($didcheckfail == false){

                $sql = "INSERT INTO users (username, password, email) VALUES ('$name','$pass1','$email')";
                $conn->query($sql);
                $err = "REGISTER successful";

            } else {

            }

        } else {
            $err = " ERROR REGISTER INFO WRONG";
        }

        setcookie("err", $err, time() + (86400), "/");
}

function loginrequest($conn){
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

                $err = "Logged IN!";
                setcookie("err", $err, time() + (86400), "/");

            } else {
                $err = "login info incorrect";
            }
        }
            

    } else {
        $err = "LOGIN INFO INVALID";
    }
    setcookie("err", $err, time() + (86400), "/");
} 


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = strtolower($data);
    return $data;
}

function logout(){
    $past = time() - 3600;
    foreach ($_COOKIE as $key => $value ){
        setcookie( $key, $value, $past, '/' );
    }
}
?>