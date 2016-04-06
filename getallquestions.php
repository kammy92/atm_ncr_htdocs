<?php
ob_start();
include_once './DbConnect.php';
function getMyAddress(){
    $db = new DbConnect();
    $response = array();
   
    $result = mysql_query("SELECT * from `questions`");
    $response["questions"] = array();
    while($row = mysql_fetch_array($result)) {
        $tmp = array();        // temporary array to create single match information
        $tmp["question_id"] = $row["id"];
        $tmp["question"] = $row["question"];
        array_push($response["questions"], $tmp);
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
getMyAddress();
ob_flush();
?>