<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../database.php';
include_once '../user.php';
 
// get database connection
$database = new database();
//calling getConnection function from database object
$db = $database->getConnection();
 
// prepare user object
$user = new user($db);
 
// set ID property of record to read
$user->id = isset($_GET['inputID']) ? $_GET['inputID'] : die();
 
// read the details of user to be edited
$user->readOne();
 
if($user->id!=null){
    // create array
    $user_arr = array(
        "id" =>  $user->id,
        "pseudo" => $user->pseudo,
        "lastName" => $user->lastName,
        "firstName" => $user->firstName,
        "birthday" => $user->birthday,
        "email" => $user->email,
        "pass" => $user->pass,
        "sex" => $user->sex,
    );
 
    // set response code - 200 OK
    http_response_code(200);
     // make it json format
    echo json_encode($user_arr);
}
else{
    // set response code - 404 Not found
    http_response_code(404);
    echo json_encode(array("message" => "User does not exist."));
}
?>