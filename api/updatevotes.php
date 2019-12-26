<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// echo "step1";
// include database and object files
include_once '../config/database.php';
include_once '../objects/votes.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
 //echo "step2";
// prepare product object
$vote = new Vote($db);
 
 //echo "step3";
// set ID property of record to read
$vote->que = isset($_GET['que']) ? $_GET['que'] : die();
$vote->opt = isset($_GET['opt']) ? $_GET['opt'] : die();
 //$vote->que=20;
 //$vote->opt='opt1';
 //echo "step4";
 //echo $vote->que;
 //echo $vote->opt;
// read the details of product to be edited
        if($vote->update()){
         
            // set response code - 200 ok
            http_response_code(200);
         
            // tell the user
            echo json_encode(array("message" => "Vote was updated."));
        }
         
        // if unable to update the product, tell the user
        else{
         
            // set response code - 503 service unavailable
            http_response_code(503);
         
            // tell the user
            echo json_encode(array("message" => "Unable to update vote."));
        }
       // echo "step6";
?>
