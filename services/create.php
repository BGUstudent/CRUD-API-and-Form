<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
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

// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if(
    !empty($data->pseudo) &&
    !empty($data->lastName) &&
    !empty($data->firstName) &&
    !empty($data->birthday) &&
    !empty($data->email) &&
    !empty($data->pass) &&
    !empty($data->sex)
){ 
    // set user property values
    $user->pseudo = $data->pseudo;
    $user->lastName = $data->lastName;
    $user->firstName = $data->firstName;
    $user->birthday = $data->birthday;
    $user->email = $data->email;
    $user->pass = $data->pass;
    $user->sex = $data->sex;

    // create the user
    if($user->create()){ //si la fonction renvoie true
         // set response code - 201 created
        http_response_code(201);
         // tell the user
        echo json_encode(array("message" => "User was created."));
    }
 
    // if unable to create the user, tell me !!!!!
    else{ //la la fonction retourne false
         // set response code - 503 service unavailable
        http_response_code(503);
         // tell the user
        echo json_encode(array("message" => "Unable to create user."));
    }
}

// tell the user data is incomplete
else{ //si les champs du json sont incomplets
     // set response code - 400 bad request
    http_response_code(400);
     // tell the user
    echo json_encode(array("message" =>"Unable to create product. Data is incomplete."));
}
?>