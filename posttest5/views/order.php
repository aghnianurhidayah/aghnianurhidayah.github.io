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
    <title>My Order</title>

    <link rel="stylesheet" href="../css/style.css" <?php echo time(); ?>/>
</head>
<body>
    <?php include 'navbar.php';?>

    <div class="my-order">
        <h3>My Orders</h3>
        <div class="my-order-box">
            <?php $i = 1; foreach($orders as $order) :?>
            <div class="order1">
                <div class="order-pic">
                <img src="../assets/pizza-2.jpg" alt="" width="120" />
                </div>
                <div class="order-detail">
                    <div class="col-1">
                        <h4>Email</h4>
                        <p><?= $order["email"];?></p>
                        <h4>Name</h4>
                        <p><?= $order["name"];?></p>
                    </div>
                    <div class="col-2">
                        <h4>Pizza</h4>
                        <p><?= $order["pizza"]; ?> <?= $order["qty"] ?></p>
                        <h4>Address</h4>
                        <p class="address"><?= $order["address"]; ?></p>
                    </div>
                    <div class="col-3">
                        <h4>Status</h4>
                        <p><?= $order["sts"];?></p>
                    </div>
                </div>
            </div>
            <?php $i; endforeach; ?>
        </div>
    </div>
</body>
</html>
<?php
    }else{
        header("Location: login.php");
    }
?>