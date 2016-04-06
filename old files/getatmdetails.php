<?php
ob_start();
include_once './DbConnect.php';
function getMyAddress(){
    $db = new DbConnect();
    $response = array();
    $url = "http://actiknow-demo.com/atm_ncr/images/";
    $atm_id = $_POST["atm_id"];

    $result = mysql_query("SELECT * from `atm_details` where id = '$atm_id'");
    while($row = mysql_fetch_array($result)) {
        $response["atm_id"] = $row["id"];
        $response["atm_name"] = $row["name"];
        $response["atm_bank"] = $row["bank"];
        $response["atm_location"] = $row["location"];
        $response["atm_image"] = $url.$row["atm_image"];
    }

    $result2 = mysql_query("SELECT * from `atm_checklist` where atm_id = '$atm_id'");
    while($row = mysql_fetch_array($result2)) {
        $response["atm_cctv_check"] = $row["atm_cctv"];
        $response["atm_machine_check"] = $row["atm_machine"];
        $response["atm_ac_check"] = $row["atm_ac"];
        $response["atm_guard_check"] = $row["atm_guard"];
    } 

    header('Content-Type: application/json');
    echo json_encode($response);
}
getMyAddress();
ob_flush();
?>