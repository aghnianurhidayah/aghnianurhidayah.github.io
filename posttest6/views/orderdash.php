<?php
    require "../action/db_conn.php";
    session_start();

    $result = mysqli_query($conn, "SELECT * FROM orders");

    $orders = [];

    while($row = mysqli_fetch_assoc($result)){
        $orders[] = $row;
    }

    if(isset($_SESSION['username'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>

    <link rel="stylesheet" href="../css/dashstyle.css" <?php echo time(); ?>/>
</head>
<body>

<?php include 'navbardash.php'; ?>

<div class="container">
        <div class="dashboard">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Order ID</th>
                        <th>Name</th>
                        <th>Pizza</th>
                        <th>Qty</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($orders as $order) :?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $order["order_id"] ?></td>
                            <td><?php echo $order["name"] ?></td>
                            <td><?php echo $order["pizza"] ?></td>
                            <td><?php echo $order["qty"] ?></td>
                            <td><?php echo $order["address"] ?></td>
                            <td><?php echo $order["sts"] ?></td>
                            <td class="action">
                                <a href="edit.php?order_id=<?php echo $order['order_id']?>"><button class="edit-btn"><img src="../assets/icons8-edit-100.png" width="20px"></button></a>
                                <a href="delete.php?order_id=<?php echo $order['order_id']?>"><button class="delete-btn"><img src="../assets/icons8-delete-90.png" width="20px"></button></a>
                            </td>
                        </tr>
                    <?php $i; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php 
    }else{
        header("Location: login.php");
    }