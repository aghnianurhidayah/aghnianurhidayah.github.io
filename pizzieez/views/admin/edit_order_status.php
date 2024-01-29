<?php
require "../../db_conn/db_connect.php";
$order_id = $_GET['order_id'];
$status = $_GET['status'];

mysqli_query($conn, "UPDATE orders SET sts = '$status'  WHERE order_id = $order_id");
header("Location: order.php");
?>