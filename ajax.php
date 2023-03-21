<?php

// require MySQL Connection
require('./database/db.php');

// require Product Class
require('./database/Products.php');

// DBController object
$db = new DBController();

// Products object
$products = new Products($db);

if (isset($_POST['itemid'])){
    $result = $products->getProduct($_POST['itemid']);
    echo json_encode($result);
}