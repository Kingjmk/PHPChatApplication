<?php
    $past = time() - 3600;
    foreach ($_COOKIE as $key => $value ){
        setcookie( $key, $value, $past, '/' );
    }
    setcookie("err", "Logged Out", time() + (86400), "/");
?>