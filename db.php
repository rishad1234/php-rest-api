<?php

    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "anonymous_chat";

    $connection = mysqli_connect($db_host, 
                                $db_user, 
                                $db_password, 
                                $db_name);
    
    // if($connection){
    //     echo "connected";
    // }else{
    //     die("not connected");
    // }
    
?>