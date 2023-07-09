<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';

// instantiate product object
include_once '../objects/room.php';

$database = new Database();
$db = $database->getConnection();

$room = new Room($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if (
        !empty($data->name) &&
        !empty($data->price) &&
        !empty($data->image_path) &&
        !empty($data->description)
) {

    // set product property values
    $room->name = $data->name;
    $room->price = $data->price;
    $room->image_path = $data->image_path;
    $room->description = $data->description;

    // create the product
    if ($room->create()) {

        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "Room was created."));
    }

    // if unable to create the product, tell the user
    else {

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create room."));
    }
}

// tell the user data is incomplete
else {

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to create room. Data is incomplete."));
}
?>
