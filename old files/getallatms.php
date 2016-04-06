<?php
ob_start();
include_once './DbConnect.php';
function getMyAddress(){
    $db = new DbConnect();
    $response = array();
    $url = "http://actiknow-demo.com/atm_ncr/images/";

    $result = mysql_query("SELECT * from `atm_details`");
    $response["atms"] = array();
    while($row = mysql_fetch_array($result)) {
        $tmp = array();        // temporary array to create single match information
        $tmp["atm_id"] = $row["id"];
        $tmp["atm_name"] = $row["name"];
        $tmp["atm_bank"] = $row["bank"];
        $tmp["atm_location"] = $row["location"];
        $tmp["atm_image"] = $url.$row["atm_image"];
        array_push($response["atms"], $tmp);
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
getMyAddress();
ob_flush();
?>