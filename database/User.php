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
    public function setUser($name, $email, $password){
        $result = "INSERT INTO `user` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password');";
        if ($this->db->con->query($result)) {
            header("Location: index.php");
            return $result;
        }
    }

    // get one user by email
    public function getUser($users_email){
        $result = $this->db->con->query("SELECT * FROM user WHERE `email` = '". $users_email ."' LIMIT 1");
        if($result->num_rows > 0){
            return $result->fetch_assoc();
        }
    }
}
