<?php

// PHP categories class
class Categories{
    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    // get categories
    public function getCategories(){
        $result = $this->db->con->query("SELECT * FROM categories");
        if($result->num_rows > 0){
            return $result;
        }
    }
}


