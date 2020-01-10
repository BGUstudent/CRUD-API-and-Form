<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../database.php';    
include_once '../user.php';        
 
// instantiate database and user object
$database = new database();
//calling getConnection function from database object
$db = $database->getConnection();
 
// initialize object
$user = new user($db);
 
// query users
$stmt = $user->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0) {
     // users array
    $users_arr=array();
    // $users_arr["users"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
 
        $user_item=array(
            "id" =>  $id,
            "pseudo" => $pseudo,
            "lastName" => $lastName,
            "firstName" => $firstName,
            "birthday" => $birthday,
            "email" => $email,
            "pass" => $pass,
            "sex" => $sex,
        );
        array_push($users_arr, $user_item); // store every row from $user_item into $user_arr["users"][...]
    }
     // set response code - 200 OK
    http_response_code(200);
     // show users data in json format
    echo json_encode($users_arr);
}
// no user
else {
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell me no user found
    echo json_encode(array("message" => "No users found.")
    );
}
?>