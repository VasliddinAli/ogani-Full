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

    // insert category
    public function setCategory($name, $image){
        $result = "INSERT INTO `categories` (`name`, `image`) VALUES ('$name', '$image');";
        if ($this->db->con->query($result)) {
            header("Location:" . $_SERVER['PHP_SELF']);
            return $result;
        }
    }
    
    // delete categories
    public function deleteCategory($item_id){
        $sql = "SELECT * FROM categories WHERE id=$item_id";
        $result = $this->db->con->query($sql);
        $row = $result->fetch_assoc();
        $unlink = unlink("./img/".$row['image']);
        if($unlink){
            $res = $this->db->con->query("DELETE FROM categories WHERE id={$item_id}");
            if($res){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
        }
    }


    // get one categories
    public function getCategory(){
        $item_id = $_GET['id'];
        $sql = "SELECT * FROM categories WHERE id=$item_id";
        $result = $this->db->con->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }
    
    // update categories
    public function updateCategory($name, $image){
        $item_id = $_GET['id'];
        $sql_update = "UPDATE `categories` SET `name` = '$name', `image` = '$image' WHERE `categories`.`id` = $item_id;";
        if ($this->db->con->query($sql_update) == TRUE) {
            header("Location: admin_categories.php");
        } else {
            echo "Error updating record: " . $this->db->con->error;
        }
    }
}


