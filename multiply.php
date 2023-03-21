<?php
include('./functions.php');
$price = $cart->getCart();

$allSum = 0;
// foreach ($price as $row) {
    $allSum++;
    if (isset($_POST["number"])) {
        $number = $_POST["number"];
        $result = $number * $allSum;
        echo $result;
    }
// }
