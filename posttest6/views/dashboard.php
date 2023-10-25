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
    <title>Dashboard</title>

    <link rel="stylesheet" href="../css/dashstyle.css" <?php echo time(); ?>/>
</head>
<body>
    <?php include 'navbardash.php'; ?>


    <div class="container">
        <h4 class="time">Current Date : <?php echo date('l, d F Y')?><br></h4>
        <div class="dash-box">
            <div class="menu-box">
                <a href="menudash.php">
                <img src="../assets/pizza.png" alt="" width="100px">
                <p>Menu</p>
                </a>
            </div>
            <div class="order-box">
                <a href="orderdash.php">
                <img src="../assets/shopping.png" alt="" width="100px">
                <p>Order</p>
                </a>
            </div>
        </div>
    </div>
    
</body>
</html>

<?php 
    }else{
        header("Location: login.php");
    }