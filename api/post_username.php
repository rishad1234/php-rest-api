<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $response = json_decode(file_get_contents("php://input"), true);
        postName($response);
    }

    function postName($response){
        include "../db.php";
        // echo "gese";
        $username = $response['username'];

        $username = mysqli_real_escape_string($connection, trim($username));

        $query = "SELECT * FROM users WHERE `username`='$username'";
        $result1 = mysqli_query($connection, $query);

        // echo mysqli_error($connection);

        if(mysqli_num_rows($result1) > 0){
            echo "gese 1";
            echo '{"result": "error"}'; 
        }else{
            // INSERT INTO `users` (`uuid`, `username`) VALUES (NULL, 'test');
            $query1 = "INSERT INTO users (`uuid`, `username`) VALUES (NULL, '$username')";
            $result = mysqli_query($connection, $query1);

            if(!$result){
                echo '{"result": "failed"}' . " " . mysqli_error($connection);
            }else{
                echo '{"result": "succeed"}';
            }
        } 
    }

    // http://localhost/anonymous_chat/api/post_username.php
    // this is the api endpoint

    // {
    //     "username" : "test3"
    // }
    // post request with this body

?>