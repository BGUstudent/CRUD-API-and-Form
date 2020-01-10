<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object file
include_once '../database.php';
include_once '../user.php';
 
// get database connection
$database = new database();
//calling getConnection function from database object
$db = $database->getConnection();
 
// prepare user object
$user = new user($db);
 
// get user id
$data = json_decode(file_get_contents("php://input"));
 
// set user input log info
$user->pseudo = $data->pseudo;
// set user input log info
$user->pass = $data->pass;
 
// delete the user
if($user->login()){
     // set response code - 200 ok
    http_response_code(200);
     // tell the user
    echo json_encode(array("message" => "User is logged."));
}
 
// if unable to login
else{
     // set response code - 503 service unavailable
    http_response_code(503);
     // tell the user
    echo json_encode(array("message" => "Z'a va pas être pozzible"));
}
?>