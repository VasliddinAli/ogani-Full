<?php

// require MySQL Connection
require('./database/db.php');

// require Product Class
require('./database/Products.php');

// DBController object
$db = new DBController();

// Products object
$products = new Products($db);

$itemid = $_POST['itemid'];

if (isset($itemid)){
    $result = $products->getProduct($itemid);
    echo json_encode($result);
}