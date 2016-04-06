<?php
ob_start();
include_once './DbConnect.php';
function getMyAddress(){
    $db = new DbConnect();
    $response = array();
   
    $result = mysql_query("SELECT * from `atm_details` where `bank_id` = 1");
    $response["atms"] = array();
    while($row = mysql_fetch_array($result)) {
        $tmp = array();        // temporary array to create single match information
        $tmp["atm_id"] = $row["id"];
        $tmp["atm_unique_id"] = $row["atm_id"];
        $tmp["atm_last_audit_date"] = $row["last_audit_date"];
        $tmp["atm_bank_name"] = $row["bank_name"];
        $tmp["atm_address"] = $row["address"];
        $tmp["atm_city"] = $row["city"];
        $tmp["atm_pincode"] = $row["pincode"];
        array_push($response["atms"], $tmp);
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
getMyAddress();
ob_flush();
?>