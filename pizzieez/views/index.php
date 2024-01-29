<?php
session_start();
require "../db_conn/db_connect.php";

$sql_menu = mysqli_query($conn, "SELECT * FROM menu");

$menus = [];
while ($row = mysqli_fetch_assoc($sql_menu)) {
    $menus[] = $row;
}

if (isset($_POST['submit-order'])) {
    $email = $_SESSION['email'];
    $name = $_POST['name'];
    $pizza_id = $_POST['pizza'];
    $qty = $_POST['qty'];
    $address = $_POST['address'];
    $payment = $_POST['payment'];
    $sts = "Waiting";

    if (isset($_SESSION['username'])) {
        $result = mysqli_query($conn, "INSERT INTO orders VALUES ('', '$email', '$name', '$pizza_id', '$qty', '$address', '$payment', '$sts')");
        if ($result) {
            echo "<script>
        alert('Ordered Successfully');
        document.location.href = 'order.php';
        </script>";
        } else {
            echo "<script>
            alert('Order Failed');
            document.location.href = 'index.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Please Login');
            document.location.href = 'login.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIZZIEEZ</title>

    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="hero">
        <div class="hero-img">
            <div class="img-overlay"></div>
        </div>
        <div class="hero-content">
            <p>LET'S GET A SLICE OF PIZZIEEZ!</p>
            <div class="tagline">
                <ul>
                    <li>TASTY</li>
                    <li>MEATY</li>
                    <li>FRESH</li>
                </ul>
            </div>
            <div class="order-btn">
                <a class="button" href="#form-order">Order Now</a>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="fav-menu">
            <h1>OUR FAVORITES MENU</h1>
            <div class="boxes">
                <div class="box">
                    <div class="fav-menu-button"><a href="">Order</a></div>
                    <img src="../assets/img/Pepperoni.png" alt="" />
                    <div class="menu">
                        <p>PIZZA 1</p>
                        <p>$20</p>
                    </div>
                    <p>Paperoni, Mozarella Cheese, Tomato Sauce</p>
                </div>
                <div class="box">
                    <img src="../assets/img/Pepperoni.png" alt="" />
                    <div class="menu">
                        <p>PIZZA 2</p>
                        <p>$20</p>
                    </div>
                    <p>Cheedar Cheese, Mozarella Cheese, Tomato Sauce</p>
                </div>
                <div class="box">
                    <img src="../assets/img/Pepperoni.png" alt="" />
                    <div class="menu">
                        <p>PIZZA 3</p>
                        <p>$20</p>
                    </div>
                    <p>Chicken Meat, Mushroom, Tomato, BBQ Sauce</p>
                </div>
            </div>
        </div>

        <div class="form-order" id="form-order">
            <h1>FILL ORDER FORM HERE</h1>
            <div class="form-box">
                <form action="" method="post">
                    <div class="input-field">
                        <label for="">Full Name</label>
                        <input type="text" name="name" placeholder="Enter your Full Name">
                    </div>
                    <div class="pizza">
                        <div class="input-field">
                            <label for="">Your PIZZIEEZ</label>
                            <select name="pizza" id="pizza-choice">
                                <?php
                                $i = 1;
                                foreach ($menus as $menu) :
                                ?>
                                    <option value="<?= $menu['menu_id']; ?>"><?= $menu['name_menu']; ?></option>
                                <?php
                                    $i++;
                                endforeach; ?>
                            </select>
                        </div>
                        <div class="input-field qty">
                            <label for="">Qty</label>
                            <input type="number" name="qty" maxlength="10">
                        </div>
                    </div>
                    <div class="input-field">
                        <label for="">Address</label>
                        <input type="text" name="address" placeholder="Enter your Address">
                    </div>
                    <div class="input-field payment">
                        <label for="">Payment Method</label>
                        <div class="payment-choice">
                            <input type="radio" id="paymentChoice1" name="payment" value="Cash On Delivery" />
                            <label for="paymentChoice1">Cash On Delivery</label></br>
                            <input type="radio" id="paymentChoice2" name="payment" value="Visa" />
                            <label for="paymentChoice2">Visa</label></br>
                            <input type="radio" id="paymentChoice3" name="payment" value="Credit Card" />
                            <label for="paymentChoice3">Credit Card</label>
                        </div>
                    </div>
                    <div class="input-field submit-btn">
                        <input type="submit" value="ORDER" name="submit-order">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>