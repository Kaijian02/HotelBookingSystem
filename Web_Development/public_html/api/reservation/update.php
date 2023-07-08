<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/reservation.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare product object
$reservation = new Reservation($db);
  
// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));
  
// set ID property of product to be edited
$reservation->id = $data->id;
  
// set product property values
$reservation->name = $data->name;
$reservation->ic = $data->ic;
$reservation->email = $data->email;
$reservation->phone_no = $data->phone_no;
$reservation->check_in = $data->check_in;
$reservation->check_out = $data->check_out;
$reservation->room_name = $data->room_name;
$reservation->room_num = $data->room_num;
$reservation->pax_num = $data->pax_num;
$reservation->total = $data->total;
$reservation->username = $data->username;
$reservation->users_id = $data->users_id;

  
// update the product
if($reservation->update()){
  
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array("message" => "Reservation was updated."));
}
  
// if unable to update the product, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update reservation."));
}
?>
