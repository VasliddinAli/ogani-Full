<?php

// PHP Products class
class Products{
    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    // fetch product data using getData Method
    public function getProducts($table = 'products')
    {
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
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
            return $result;
        }
    }

    // delete product
    public function deleteProduct($item_id){
        $sql = "SELECT * FROM products WHERE id=$item_id";
        $result = $this->db->con->query($sql);
        $row = $result->fetch_assoc();
        $unlink = unlink("./img/".$row['image']);
        if($unlink){
            $res = $this->db->con->query("DELETE FROM products WHERE id={$item_id}");
            if($res){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
        }
    }


    // get product using item id
    public function getProduct($item_id, $table = 'products')
    {
        if (isset($item_id)) {
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE id={$item_id}");

            $resultArray = array();

            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }
    
    // update product
    public function updateProduct($name, $category_id, $price, $image){
        $item_id = $_GET['id'];
        $sql_update = "UPDATE `products` SET `name` = '$name', `category_id` = '$category_id', `price` = '$price', `image` = '$image' WHERE `products`.`id` = $item_id;";
        if ($this->db->con->query($sql_update) == TRUE) {
            header("Location: admin.php");
        } else {
            echo "Error updating record: " . $this->db->con->error;
        }
    }

    // addToCart
    public function addToCart($item_id){
        $sql = "INSERT INTO cart SELECT * FROM products WHERE id = {$item_id};";
        $result = $this->db->con->query($sql);
        if($result){
            header("Location:" . $_SERVER['PHP_SELF']);
        }
        return $result;
    }
}
