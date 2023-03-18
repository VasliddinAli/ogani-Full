<?php

// PHP Products class
class Products{
    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    // get Products
    public function getProducts(){
        $result = $this->db->con->query("SELECT * FROM products");
        if($result->num_rows > 0){
            return $result;
        }
    }
    
    // get latest products
    public function getLatestProducts(){
        $result = $this->db->con->query("SELECT * FROM products ORDER BY id DESC LIMIT 6");
        if($result->num_rows > 0){
            return $result;
        }
    }

    // insert product
    public function setProduct($name, $category_id, $price, $image){
        $result = "INSERT INTO `products` (`name`, `category_id`, `price`, `image`) VALUES ('$name', '$category_id', '$price', '$image');";
        if ($this->db->con->query($result)) {
            header("Location:" . $_SERVER['PHP_SELF']);
        }
    }
}
