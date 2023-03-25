<?php
ob_start();

// require MySQL Connection
require('database/db.php');

// require Category Class
require('database/Categories.php');

// require Product Class
require('database/Products.php');

// require Cart Class
require('database/Cart.php');

// require Wishlist Class
require('database/Wishlist.php');

// require Blog Class
require('database/Blog.php');

// require User Class
require('database/User.php');

// require checkout Class
require('database/checkout.php');

// require checkout Class
require('database/Order_products.php');

// DBController object
$db = new DBController();

// Categories object
$categories = new Categories($db);

// Products object
$products = new Products($db);

// Cart object
$cart = new Cart($db);

// Cart object
$wishlist = new Wishlist($db);

// Blog object
$blog = new Blog($db);

// User object
$user = new User($db);

// Checkout object
$checkout = new Checkout($db);

// OrderProducts object
$orders = new OrderProducts($db);

function logOut()
{
    unset($_SESSION['admin']);
    header("Location: index.php");
}


function allSum()
{
    global $products;
    global $cart;
    if(isset($_SESSION['user']) && $cart->getCart($_SESSION['user']['id'])){
        foreach ($cart->getCart($_SESSION['user']['id']) as $item){
            if ($item['user_id'] == $_SESSION['user']['id']) {
                $product = $products->getProduct($item['item_id']);
                $subTotal[] = array_map(function ($item) {
                    return $item['price'];
                }, $product);
            }
        }
        return $cart->getSum($subTotal);
    }else{
        return 0;
    }
}
