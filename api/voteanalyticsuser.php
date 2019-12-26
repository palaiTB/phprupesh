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
$vote->id = isset($_GET['que']) ? $_GET['que'] : die();

    //echo $vote->id;

    $vote->voteAnalytics();
    //echo "Here";
    //echo $vote->que;
    if($vote->que!=null){
        // create array
        $result_arr = array(
            /*"id" =>  $vote->que,
            "option1" => $vote->option1,
            "option2" => $vote->option2,
            "option3" => $vote->option3,
            "option4" => $vote->option4,
            "option5" => $vote->option5,
            "option6" => $vote->option6,
            "Total" => $vote->total,
            */
            "p_opt1" => round($vote->p_opt1,2),
            "p_opt2" => round($vote->p_opt2,2),
            "p_opt3" => round($vote->p_opt3,2),
            "p_opt4" => round($vote->p_opt4,2),
            "p_opt5" => round($vote->p_opt5,2),
            "p_opt6" => round($vote->p_opt6,2)
            
     
        );
        
     
        // set response code - 200 OK
        http_response_code(200);
     
        // make it json format
        echo json_encode($result_arr);
    }
     
    else{
        // set response code - 404 Not found
        http_response_code(404);
     
        // tell the user product does not exist
        echo json_encode(array("message" => "Vote does not exist."));
    }

?>
