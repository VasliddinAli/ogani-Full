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

// require Blog Class
require('database/Blog.php');

// require User Class
require('database/User.php');

// DBController object
$db = new DBController();

// Categories object
$categories = new Categories($db);

// Products object
$products = new Products($db);

// Cart object
$cart = new Cart($db);

// Blog object
$blog = new Blog($db);

// User object
$user = new User($db);

function logOut(){
    session_destroy();
    header("Location: index.php");
}