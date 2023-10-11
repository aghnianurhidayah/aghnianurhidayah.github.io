<?php
    if (isset($_POST['order'])) {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $pizza = $_POST['pizza'];
        $qty = $_POST['qty'];
        $address = $_POST['address'];
    } else {
        echo "Tidak bisa mengakses website";
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Order</title>

    <link rel="stylesheet" href="style.css" <?php echo time(); ?>/>
</head>
<body>
    <?php include 'navbar.php';?>

    <div class="my-order">
        <h3>My Orders</h3>
        <div class="my-order-box">
            <div class="order1">
                <div class="order-pic">
                <img src="assets/pizza-2.jpg" alt="" width="120" />
                </div>
                <div class="order-detail">
                    <div class="col-1">
                        <h4>Email</h4>
                        <p><?= $email;?></p>
                        <h4>Name</h4>
                        <p><?= $name;?></p>
                    </div>
                    <div class="col-2">
                        <h4>Pizza</h4>
                        <p><?= $pizza;?> <?=$qty;?></p>
                        <h4>Address</h4>
                        <p class="address"><?= $address;?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>