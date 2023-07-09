<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// database connection will be here
// include database and object files
include_once '../config/database.php';
include_once '../objects/room.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$room = new Room($db);




// read products will be here
// query products
$stmt = $room->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {

    // products array
    $rooms_arr = array();
    $rooms_arr["records"] = array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
        $imageTruncateLength = 100;

        $room_item = array(
            "id" => $id,
            "name" => $name,
            "price" => $price,
            "description" => $description,
            "image_path" => $image_path
        );

        array_push($rooms_arr["records"], $room_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show products data in json format
    echo json_encode($rooms_arr);
}

// no products found will be here
else {

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
            array("message" => "No rooms found.")
    );
}
