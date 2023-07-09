<?php

class Reservation {

    // database connection and table name
    private $conn;
    private $table_name = "reservation";
    // object properties
    public $id;
    public $name;
    public $ic;
    public $email;
    public $phone_no;
    public $check_in;
    public $check_out;
    public $room_name;
    public $room_num;
    public $pax_num;
    public $total;
    public $username;
    public $users_id;

    // constructor with $db as database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // read products
//    function read() {
//
//        // select all query
//        $query = "SELECT
//                 r.id, r.name, r.ic, r.email, r.phone_no, r.check_in, r.check_out, r.room_name, r.room_num, r.pax_num, r.total, r.username, r.users_id
//            FROM
//                " . $this->table_name . " r                
//            ORDER BY
//                r.id DESC";
//
//        // prepare query statement
//        $stmt = $this->conn->prepare($query);
//
//        // execute query
//        $stmt->execute();
//        // bind users_id parameter
//        
//        return $stmt;
//    }
    
    // read products
    function read($users_id) {
        
        

        // select all query
        $query = "SELECT
                 r.id, r.name, r.ic, r.email, r.phone_no, r.check_in, r.check_out, r.room_name, r.room_num, r.pax_num, r.total, r.username, r.users_id
            FROM
                " . $this->table_name . " r
            WHERE
                r.users_id = :users_id
            ORDER BY
                r.id DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind users_id parameter
        $stmt->bindParam(":users_id", $users_id);

    
        // execute query
        $stmt->execute();
        // bind users_id parameter
        
        return $stmt;
    }

// create product
    function create() {

        // query to insert record
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
                name=:name, ic=:ic, email=:email, phone_no=:phone_no, check_in=:check_in, check_out=:check_out, room_name=:room_name, room_num=:room_num, pax_num=:pax_num, total=:total, username=:username, users_id=:users_id";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->ic = htmlspecialchars(strip_tags($this->ic));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phone_no = htmlspecialchars(strip_tags($this->phone_no));
        $this->check_in = htmlspecialchars(strip_tags($this->check_in));
        $this->check_out = htmlspecialchars(strip_tags($this->check_out));
        $this->room_name = htmlspecialchars(strip_tags($this->room_name));
        $this->room_num = htmlspecialchars(strip_tags($this->room_num));
        $this->pax_num = htmlspecialchars(strip_tags($this->pax_num));
        $this->total = htmlspecialchars(strip_tags($this->total));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->users_id = htmlspecialchars(strip_tags($this->users_id));

        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":ic", $this->ic);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phone_no", $this->phone_no);
        $stmt->bindParam(":check_in", $this->check_in);
        $stmt->bindParam(":check_out", $this->check_out);
        $stmt->bindParam(":room_name", $this->room_name);
        $stmt->bindParam(":room_num", $this->room_num);
        $stmt->bindParam(":pax_num", $this->pax_num);
        $stmt->bindParam(":total", $this->total);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":users_id", $this->users_id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

// used when filling up the update product form
    function readOne() {

        // query to read single record
        $query = "SELECT
                r.id, r.name, r.ic, r.email, r.phone_no, r.check_in, r.check_out, r.room_name, r.room_num, r.pax_num, r.total, r.username, r.users_id
            FROM
                " . $this->table_name . " r               
            WHERE
                r.id = ?
            LIMIT
                0,1";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of reservation to be updated
        $stmt->bindParam(1, $this->id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->id = $row['id'];
        $this->name = $row['name'];
        $this->ic = $row['ic'];
        $this->email = $row['email'];
        $this->phone_no = $row['phone_no'];
        $this->check_in = $row['check_in'];
        $this->check_out = $row['check_out'];
        $this->room_name = $row['room_name'];
        $this->room_num = $row['room_num'];
        $this->pax_num = $row['pax_num'];
        $this->total = $row['total'];
        $this->username = $row['username'];
        $this->users_id = $row['users_id'];
    }

// update the product
    function update() {

        // update query
        $query = "UPDATE
                " . $this->table_name . "
            SET
                name = :name,
                ic = :ic,
                email = :email,
                phone_no = :phone_no,
                check_in = :check_in,
                check_out = :check_out,
                room_name = :room_name,
                room_num = :room_num,
                pax_num = :pax_num,
                total = :total,
                username = :username,
                users_id = :users_id
            WHERE
                id = :id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->ic = htmlspecialchars(strip_tags($this->ic));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phone_no = htmlspecialchars(strip_tags($this->phone_no));
        $this->check_in = htmlspecialchars(strip_tags($this->check_in));
        $this->check_out = htmlspecialchars(strip_tags($this->check_out));
        $this->room_name = htmlspecialchars(strip_tags($this->room_name));
        $this->room_num = htmlspecialchars(strip_tags($this->room_num));
        $this->pax_num = htmlspecialchars(strip_tags($this->pax_num));
        $this->total = htmlspecialchars(strip_tags($this->total));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->users_id = htmlspecialchars(strip_tags($this->users_id));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind new values   
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":ic", $this->ic);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phone_no", $this->phone_no);
        $stmt->bindParam(":check_in", $this->check_in);
        $stmt->bindParam(":check_out", $this->check_out);
        $stmt->bindParam(":room_name", $this->room_name);
        $stmt->bindParam(":room_num", $this->room_num);
        $stmt->bindParam(":pax_num", $this->pax_num);
        $stmt->bindParam(":total", $this->total);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":users_id", $this->users_id);
        $stmt->bindParam(':id', $this->id);

        // execute the query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

// delete the product
    function delete() {

        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

// search products
    function search($keywords) {

        // select all query
        $query = "SELECT
                r.id, r.name, r.ic, r.email, r.phone_no, r.check_in, r.check_out, r.room_name, r.room_num, r.pax_num, r.total, r.username, r.users_id
            FROM
                " . $this->table_name . " r
            WHERE
                r.name LIKE ? OR r.ic LIKE ? OR r.username LIKE ?
            ORDER BY
                r.id DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $keywords = htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";

        // bind
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
        $stmt->bindParam(3, $keywords);

        // execute query
        $stmt->execute();

        return $stmt;
    }

}

?>
