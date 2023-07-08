<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/room.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$room = new Room($db);
 
// set ID property of record to read
$room->name = isset($_GET['name']) ? $_GET['name'] : die();
 
// read the details of product to be edited
$room->readOne();
 
if($room->name!=null){
    // create array
    $room_arr = array(
        "id" =>  $room->id,
        "name" => $room->name,
        "price" => $room->price,
        "image_path" => $room->image_path,
        "description" => $room->description
 
    );
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($room_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user product does not exist
    echo json_encode(array("message" => "Room does not exist."));
}
?>
