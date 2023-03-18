<?php

// PHP Blog class
class Blog{
    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    // get Blog items
    public function getBlogs(){
        $result = $this->db->con->query("SELECT * FROM blog");
        if($result->num_rows > 0){
            return $result;
        }
    }
}