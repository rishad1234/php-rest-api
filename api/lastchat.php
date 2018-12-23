<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    if(isset($_GET["ref"])){
        $reference = $_GET["ref"];

        get_last_chat($reference);
    }

    function get_last_chat($reference){

        include "../db.php";
        $last_chat = array();
        $query = "SELECT * FROM " . $reference . " ORDER BY uuid DESC LIMIT 1";
        
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $last_chat["chat"]["user_id"] = $row["user_id"];
                $last_chat["chat"]["message_body"] = $row["message_body"];
            }
        
            echo json_encode($last_chat);
        }else{
            echo '{"result": "error"}';
        }
    }

    // http://localhost/anonymous_chat/api/all_regions.php?ref=asia
    // http://localhost/anonymous_chat/api/all_regions.php?ref=africa
    // http://localhost/anonymous_chat/api/all_regions.php?ref=north_america
    // http://localhost/anonymous_chat/api/all_regions.php?ref=south_america
    // http://localhost/anonymous_chat/api/all_regions.php?ref=europe
    // these are the api url
?>