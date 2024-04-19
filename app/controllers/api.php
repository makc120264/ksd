<?php

use app\models\Orders;

session_start();

include_once "../models/Orders.php";
$orders = new Orders();
if (!empty($_REQUEST['orderId'])) {
    $status = $orders->getOrderStatus($_REQUEST['orderId']);
    echo $status;
} else {
    include '../views/api.php';
}
