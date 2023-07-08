<?php

class Room {

    // database connection and table name   
    private $conn;
    private $table_name = "room";
    
    // object properties
    public $id;
    public $name;
    public $price;
    public $description;
    public $image_path;

    // constructor with $db as database connection
    public function __construct($db) {
        $this->conn = $db;
    }

// read products
    function read() {

        // select all query
        $query = "SELECT
                p.id, p.name, p.price,  p.image_path, p.description
            FROM
                " . $this->table_name . " p
            ORDER BY
                p.price ASC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

// create product
    function create() {

        // query to insert record
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
                name=:name, price=:price, image_path=:image_path, description=:description";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->image_path = htmlspecialchars(strip_tags($this->image_path));
        $this->description = htmlspecialchars(strip_tags($this->description));

        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":image_path", $this->image_path);
        $stmt->bindParam(":description", $this->description);

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
                 p.id, p.name,  p.price, p.image_path, p.description
            FROM
                " . $this->table_name . " p
            WHERE
                p.name = ?
            LIMIT
                0,1";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of product to be updated
        $stmt->bindParam(1, $this->name);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->id = $row['id'];
        $this->price = $row['price'];
        $this->image_path = $row['image_path'];
        $this->description = $row['description'];
    }

// update the product
    function update() {

        // update query
        $query = "UPDATE
                " . $this->table_name . "
            SET
                name = :name,
                price = :price,           
                image_path = :image_path,
                description = :description
            WHERE
                id = :id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->image_path = htmlspecialchars(strip_tags($this->image_path));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind new values
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':image_path', $this->image_path);
        $stmt->bindParam(':description', $this->description);
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
                 p.id, p.name,  p.price, p.image_path, p.description
            FROM
                " . $this->table_name . " p               
            WHERE
                p.name LIKE ? OR p.description LIKE ?
            ORDER BY
                p.id DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $keywords = htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";

        // bind
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);

        // execute query
        $stmt->execute();

        return $stmt;
    }

}

?>
