<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../database.php';
include_once '../user.php';
 
// initialize object and get database connection
$database = new database();
//calling getConnection function from database object
$db = $database->getConnection();

// prepare user object
$user = new user($db);
 
// get id of user to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of user to be edited
$user->id = $data->id;
 // set user property values
$user->pseudo = $data->pseudo;

// update the user
if($user->update()) {
     // set response code - 200 ok
    http_response_code(200);
     // tell the user
    echo json_encode(array("message" => "User has been updated."));
}

// if unable to update the user, tell the me !!!!!
else{
     // set response code - 503 service unavailable
    http_response_code(503);
     // tell the user
    echo json_encode(array("message" => "Unable to update user."));
}
?>