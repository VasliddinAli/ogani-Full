<?php

// PHP User class
class User{
    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    // get User items
    public function getUsers(){
        $result = $this->db->con->query("SELECT * FROM user");
        if($result->num_rows > 0){
            return $result;
        }
    }

    // insert user
    public function setUser($name, $email, $password, $image){
        $result = "INSERT INTO `user` (`name`, `email`, `password`, `image`) VALUES ('$name', '$email', '$password', '$image');";
        if ($this->db->con->query($result)) {
            header("Location: index.php");
            return $result;
        }
    }
}