<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $response = json_decode(file_get_contents("php://input"), true);
        postchat($response);
    }


    function postchat($response){
        include "../db.php";
        echo "gese";
        $region = $response['region'];
        $user_id = $response['user_id'];
        $message_body = $response['message_body'];

        // INSERT INTO `asia` (`uuid`, `user_id`, `message_body`) VALUES (NULL, 'bdf', 'sfdgsdcv');

        $query = "INSERT INTO " . $region . " ( `uuid`, `user_id`, `message_body` ) VALUES ( NULL,  '$user_id', '$message_body' );";
        
        $result = mysqli_query($connection, $query);
        if($result){
            echo '{"result" : "message added"} ';
        }else{
            echo '{"result" : "message failed"}' .  mysqli_error($connection);
        }
    }

    //http://localhost/anonymous_chat/api/postchat.php
    // this is the api url

    // the request should be sent as a json request formatted like

    // {
    //     "region" : "europe",
    //     "user_id" : "test baby",
    //     "message_body" : "iujvbiuwvbweiurvbiuwetbvjbfhygvsalifvb"
        
    // }


?>