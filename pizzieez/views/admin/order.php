<?php
require "../../db_conn/db_connect.php";

$sql = mysqli_query($conn, "SELECT * FROM orders JOIN menu ON orders.menu_id = menu.menu_id");

$orders = [];
while ($row = mysqli_fetch_assoc($sql)) {
    $orders[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Order</title>

    <link rel="stylesheet" href="../../styles/adminstyle.css">
</head>

<body>
    <?php include 'sidebar.php'; ?>

    <div class="orders">
        <header>
            <h4>Orders</h4>
        </header>
        <div class="content">
            <div class="orders-table">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Order ID</th>
                            <th>Name</th>
                            <th>Pizza</th>
                            <th>Amount</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($orders as $order) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $order['order_id']; ?></td>
                                <td><?= $order['name']; ?></td>
                                <td><?= $order['name_menu']; ?></td>
                                <td><?= $order['qty']; ?></td>
                                <td>$<?= $order['qty'] * $order['price']; ?></td>
                                <td><?= $order['payment']; ?></td>
                                <td><?= $order['sts']; ?></td>
                                <td>
                                    <div class="action">
                                        <?php
                                        if ($order['sts'] == "Waiting"){
                                        ?>
                                        <a class="accept" href="edit_order_status.php?order_id=<?= $order['order_id'].'&status=Process'?>">Accept</a>
                                        <?php
                                        } else if ($order['sts'] == "Process") {
                                        ?>
                                        <a class="done" href="edit_order_status.php?order_id=<?= $order['order_id'].'&status=Done'?>">Done</a>
                                        <?php
                                        } else {
                                        ?>
                                        <a class="done-disabled">Done</a>
                                        <?php 
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>