<?php
ob_start();
include_once './DbConnect.php';
function getMyAddress(){
    $db = new DbConnect();
    $response = array();
    $atm_id = $_POST["atm_id"];
    $result2 = mysql_query("UPDATE `atm_checklist` SET `atm_cctv`='0',`atm_machine`='0',`atm_ac`='0',`atm_guard`='0' WHERE `atm_id` = '$atm_id'");

    if($result2) {
    	$response["error"] = "false";
    	$response["status"] = "1";
    	$response["message"] = "record updated successfully";	
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