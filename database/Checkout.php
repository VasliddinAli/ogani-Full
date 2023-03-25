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
        $result = $this->db->con->query("SELECT * FROM checkout");
        if ($result->num_rows > 0) {
            $arr = [];
            foreach ($result as $row) {
                $arr[] = $row;
            }
            return $arr;
        }
    }

    // to set check data
    public  function insertCheckout($firstName, $lastName, $country, $region, $district, $address, $zipCode, $allSum)
    {
        $result = "INSERT INTO `checkout` (`firstName`, `lastName`, `country`, `region`, `district`, `address`, `zipCode`, `allSum`) VALUES ('$firstName', '$lastName', '$country', '$region', '$district', '$address', '$zipCode', '$allSum');";
        if ($this->db->con->query($result)) {
            header("Location:" . $_SERVER['PHP_SELF']);
            return $result;
        }
    }
}
