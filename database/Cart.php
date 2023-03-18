<?php

// PHP Cart class
class Cart{
    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    // get cart items
    public function getCart(){
        $result = $this->db->con->query("SELECT * FROM cart");
        if($result->num_rows > 0){
            return $result;
        }
    }
}