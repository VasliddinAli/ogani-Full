<?php

// PHP Cart class
class OrderProducts
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // get Checkout items
    public function getOrders($user_id)
    {
        $result = $this->db->con->query("SELECT * FROM order_products WHERE user_id=$user_id");
        if ($result->num_rows > 0) {
            $arr = [];
            foreach ($result as $row) {
                $arr[] = $row;
            }
            return $arr;
        }
    }

    // to set check data
    public  function insertOrders($user_id, $name, $count, $price, $image)
    {
        $result = "INSERT INTO `order_products` (`user_id`, `name`, `count`, `price`, `image`) VALUES ('$user_id', '$name', '$count', '$price', '$image')";
        if ($this->db->con->query($result)) {
            header("Location:" . $_SERVER['PHP_SELF']);
            return $result;
        }
    }
}
