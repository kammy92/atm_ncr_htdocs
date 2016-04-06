<?php
ob_start();
include_once './DbConnect.php';
function getMyAddress(){
    $db = new DbConnect();
    $response = array();
    $user_id = $_POST["user_id"];
    $atm_id = $_POST["atm_id"];
    $checklist_item = $_POST["checklist_item"];
    $image_name = $_POST["image_name"];
    $comments = $_POST["comments"];
    $resp_lat = $_POST["resp_lat"];
    $resp_lng = $_POST["resp_lng"];

    date_default_timezone_set("Asia/Kolkata");
    $dt = new DateTime();
    $dt->format('Y-m-d H:i:s');
    $newdt = $dt->format('Y-m-d H:i:s');

    $result = mysql_query("INSERT INTO `response`(`user_id`, `atm_id`, `image_name`, `comments`, `resp_lat`, `resp_lng`, `created_at`) VALUES ('$user_id','$atm_id','$image_name','$comments','$resp_lat','$resp_lng','$newdt')");
    
    if($result){
        switch ($checklist_item) {
            case '1':
                $result2 = mysql_query("UPDATE `atm_checklist` SET `atm_cctv`='1' WHERE `atm_id` = '$atm_id'");
                break;
            case '2':
                $result2 = mysql_query("UPDATE `atm_checklist` SET `atm_machine`='1' WHERE `atm_id` = '$atm_id'");
                break;
            case '3':
                $result2 = mysql_query("UPDATE `atm_checklist` SET `atm_ac`='1' WHERE `atm_id` = '$atm_id'");
                break;
            case '4':
                $result2 = mysql_query("UPDATE `atm_checklist` SET `atm_guard`='1' WHERE `atm_id` = '$atm_id'");
                break;
        }

        $response["error"] = "false";
        $response["status"] = "1";
        $response["message"] = "record inserted successfully";
    } else {
        $response["error"] = "true";
        $response["status"] = "0";
        $response["message"] = "error occurred";
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
getMyAddress();
ob_flush();
?>