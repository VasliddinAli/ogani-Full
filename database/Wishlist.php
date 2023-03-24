<?php

// PHP Wishlist class
class Wishlist
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // get cart items
    public function getWishlist($user_id)
    {
        $result = $this->db->con->query("SELECT * FROM wishlist WHERE user_id=$user_id");
        if ($result->num_rows > 0) {
            $arr = [];
            foreach($result as $row){
                $arr[] = $row;
            }
            return $arr;
        }
    }

    // to get user_id and item_id and insert into cart table
    public  function addToWishlist($userid, $itemid)
    {
        if (isset($userid) && isset($itemid)) {
            $query_string = "INSERT INTO wishlist (user_id, item_id) VALUES ('$itemid', '$userid')";
            $result = $this->db->con->query($query_string);
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    // delete cart item using cart item id
    public function deleteWishlist($item_id = null, $table = 'wishlist')
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id}");
            if ($result) {
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    // get item_id of shopping cart list
    public function getWishlistId($cartArray = null, $key = 'item_id')
    {
        if ($cartArray != null) {
            $cart_id = array_map(function ($value) use ($key) {
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }
}
