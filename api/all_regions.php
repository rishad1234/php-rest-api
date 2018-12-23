<?php

    if(isset($_GET["ref"])){
        $reference = $_GET["ref"];
        // echo "gese";
        switch($reference){
            case "region":
                getAllregions($reference);
                break;
            default:
                echo '{"result": "error"}';
                break;
        }
    }

    function getAllregions($reference){
        include "../db.php";
        $regions = array();

        $query = "SELECT * FROM " . $reference;
        
        $result = mysqli_query($connection, $query);
    
    
        while($row = mysqli_fetch_assoc($result)){
            $regions["regions"][] = $row["region_name"];
        }
    
        echo json_encode($regions);
    }

    // http://localhost/anonymous_chat/api/all_regions.php?ref=region
    // this is the api url
?>