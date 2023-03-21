<?php
session_start();
class DBController{
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $database = "ogani_base";
    // Database Connection Properties

    // connection property
    public $con = null;

    // call constructor
    public function __construct(){
        $this->con = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
        if($this->con->connect_error){
            echo "Fail:" . $this->con->connect_error;
        }
    }
}

