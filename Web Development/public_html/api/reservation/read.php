<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// database connection will be here
// include database and object files
include_once '../config/database.php';
include_once '../objects/reservation.php';
  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$reservation = new Reservation($db);


// read products will be here
$users_id = $_GET['users_id']; // Assuming you're passing the users_id as a query parameter

// read products will be here
// query products
$stmt = $reservation->read($users_id);
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // products array
    $reservations_arr=array();
    $reservations_arr["records"]=array();
  
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
  
        $reservation_item=array(
            "id" => $id,
            "name" => $name,
            "ic" => $ic,
            "email" => $email,
            "phone_no" => $phone_no,
            "check_in" => $check_in,
            "check_out" => $check_out,
            "room_name" => $room_name,
            "room_num" => $room_num,
            "pax_num" => $pax_num,
            "total" => $total,
            "username" => $username,
            "users_id" => $users_id
        );
  
        array_push($reservations_arr["records"], $reservation_item);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show products data in json format
    echo json_encode($reservations_arr);
}
  
// no products found will be here
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no products found
    echo json_encode(
        array("message" => "No reservations found.")
    );
}