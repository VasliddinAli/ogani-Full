<?php

// PHP Cart class
class Checkout
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // get Checkout items
    public function getCheckout()
    {
        $result = $this->db->con->query("SELECT * FROM orders");
        if ($result->num_rows > 0) {
            $arr = [];
            foreach ($result as $row) {
                $arr[] = $row;
            }
            return $arr;
        }
    }

    // to set check data
    public  function insertCheckout($firstName, $email, $country, $region, $district, $address, $zipCode, $allSum, $user_id)
    {
        $result = "INSERT INTO `orders` (`firstName`, `email`, `country`, `region`, `district`, `address`, `zipCode`, `allSum`, `user_id`) VALUES ('$firstName', '$email', '$country', '$region', '$district', '$address', '$zipCode', '$allSum', '$user_id');";
        if ($this->db->con->query($result)) {
            header("Location:" . $_SERVER['PHP_SELF']);
            return $result;
        }
    }
}
