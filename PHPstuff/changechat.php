<?php

    require '../main.php';

    //get id from form then insert it to a cookie
    setcookie("ReceiverID" , $_POST["cont"] , time() + (86400 * 30), "/");
    
?>