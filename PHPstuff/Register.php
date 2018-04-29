<?php 
        //get connection
        require '../main.php';

        //get info from form
        $name = test_input($_POST["username"]);
        $pass1= test_input($_POST["password1"]);
        $pass2= test_input($_POST["password2"]);
        $email =test_input($_POST["email"]);

        //validate info
        if(empty($name) == false && $pass1 == $pass2 && empty($pass1) == false && empty($email) == false){
            //check if user and email exists sql queries
            $checkusr = "SELECT Username FROM `users` WHERE `Username` = '$name'" ;
            $checkemail = "SELECT Email FROM `users` WHERE `Email` = '$email'" ;
            $didcheckfail = true;
            
            //excecution of sql queries
            if ($stmt1 = $conn->query($checkusr)) {          
                $rs1 = $stmt1->num_rows;
                $stmt1->close();
            }

            if ($stmt2 = $conn->query($checkemail)) {          
                $rs2 = $stmt2->num_rows;
                $stmt2->close();
            }
            //vertification of sql queries
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
                //sql injection
                $sql = "INSERT INTO users (username, password, email) VALUES ('$name','$pass1','$email')";
                $regQuery = $conn->query($sql);
                
                if($regQuery){
                    $err = "register successful " . $name ;
                } else {
                    $err = "register unsuccessful " . $name ;
                }
            } else {

            }

        } else {
            $err = "register info wrong";
        }

        setcookie("err", $err, time() + (86400), "/");


?>