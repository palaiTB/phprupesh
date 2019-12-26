<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
 //echo "part1";
// include database and object files
include_once '../config/database.php';
include_once '../objects/questions.php';
 

 //echo "part2";
// get database connection
$database = new Database();
$db = $database->getConnection();
 

 //echo "part3";
// prepare product object
$question = new Question($db);
 
// set ID property of record to read
//$question->id = isset($_GET['id']) ? $_GET['id'] : die();
 

 //echo "part4";
// read the details of product to be edited
$question->readLatest();
 
 //echo "part5";
if($question->que!=null){
    // create array
    $question_arr = array(
        "id" =>  $question->id,
        "que" => $question->que,
        "date" => $question->date,
        "option1" => $question->option1,
        "option2" => $question->option2,
        "option3" => $question->option3,
        "option4" => $question->option4,
        "option5" => $question->option5,
        "option6" => $question->option6
        
 
    );
    
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($question_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user product does not exist
    echo json_encode(array("message" => "Product does not exist."));
}
?>