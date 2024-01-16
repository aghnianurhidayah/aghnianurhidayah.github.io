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
                    <img src="../assets/img/pizza-1.png" alt="" />
                    <div class="menu">
                        <p>PIZZA 1</p>
                        <p>$20</p>
                    </div>
                    <p>Paperoni, Mozarella Cheese, Tomato Sauce</p>
                </div>
                <div class="box">
                    <img src="../assets/img/pizza-2.png" alt="" />
                    <div class="menu">
                        <p>PIZZA 2</p>
                        <p>$20</p>
                    </div>
                    <p>Cheedar Cheese, Mozarella Cheese, Tomato Sauce</p>
                </div>
                <div class="box">
                    <img src="../assets/img/pizza-3.png" alt="" />
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
                <form action="">
                    <div class="input-field">
                        <label for="">Email</label>
                        <input type="text" placeholder="Enter your Email">
                    </div>
                    <div class="input-field">
                        <label for="">Full Name</label>
                        <input type="text" placeholder="Enter your Full Name">
                    </div>
                    <div class="pizza">
                        <div class="input-field pz">
                            <label for="">Your PIZZIEEZ</label>
                            <select name="" id="">
                                <option value="">Pizza 1</option>
                                <option value="">Pizza 2</option>
                                <option value="">Pizza 3</option>
                                <option value="">Pizza 4</option>
                                <option value="">Pizza 5</option>
                            </select>
                        </div>
                        <div class="input-field qty">
                            <label for="">Qty</label>
                            <input type="number" maxlength="10">
                        </div>
                    </div>
                    <div class="input-field">
                        <label for="">Address</label>
                        <input type="text" placeholder="Enter your Address">
                    </div>
                    <div class="input-field submit-btn">
                        <input type="submit" value="ORDER">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>