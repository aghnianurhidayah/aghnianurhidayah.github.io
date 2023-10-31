<?php
  session_start();
  require "../action/db_conn.php";

  if(isset($_POST['order'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $pizza = $_POST['pizza'];
    $qty = $_POST['qty'];
    $address = $_POST['address'];
    $sts = "Waiting";

    if(isset($_SESSION['username'])){
      $result = mysqli_query($conn, "INSERT INTO orders VALUES ('', '$email', '$name', '$pizza', '$qty', '$address', '$sts')");
    }else{
      echo "<script>
        alert('Please Login');
        document.location.href = 'login.php';
        </script>";
    }


    if($result){
        echo "<script>
        alert('Ordered Successfully');
        document.location.href = 'order.php';
        </script>";
    }else{
        echo "<script>
        alert('Order Failed');
        document.location.href = 'index.php';
        </script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PIZZIEEZ</title>

    <link rel="stylesheet" href="../css/style.css" <?php echo time(); ?>/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    
    <section class="hero">
      <div class="image">
        <div class="image-overlay"></div>
      </div>
      <div class="hero-title">
        <h1>LET'S GET A SLICE OF PIZZIEEZ!</h1>
        <div class="tagline">
          <li>TASTY</li>
          <li>HEALTHY</li>
          <li>FRESH</li>
        </div>
        <a href="#order">Order Now</a>
      </div>
    </section>

    <div class="content">
      <h3>OUR POPULAR MENU</h3>
      <div class="boxes">
        <div class="box-1">
          <img src="../assets/pizza-1.jpg" alt="" width="240" />
          <p>VEGGYZZA</p>
        </div>
        <div class="box-2">
          <img src="../assets/pizza-2.jpg" alt="" width="240" />
          <p>MEATZZA</p>
        </div>
        <div class="box-3">
          <img src="../assets/pizza-3.jpg" alt="" width="240" />
          <p>PAPERIZZA</p>
        </div>
      </div>

      <div class="content-order">
        <h3>ORDER FORM</h3>
        <div class="order" id="order">
          <div class="form-box">
            <form action="" method="post">
              <p>
                <label for="email">Email</label><br />
                <input type="email" name="email" id="email" placeholder="Input your Email" size="50" required /><br />
              </p>
              <p>
                <label for="name">Name</label><br />
                <input type="text" name="name" id="name" placeholder="Input your Name" size="50" required /><br />
              </p>
              <p>
                <label>Choose your Pizzieez</label><br />
                <input type="radio" name="pizza" value="Papperizza" required/>
                <label>Pepperizza</label><br />
                <input type="radio" name="pizza" value="Meatzza" required/>
                <label for="name">Meatzza</label><br />
                <input type="radio" name="pizza" value="Veggyzza" required/>
                <label for="name">Veggyzza</label><br />
                <input type="radio" name="pizza" value="Chickzza" required/>
                <label for="name">Chickzza</label><br />
                <input type="radio" name="pizza" value="Cheezza" required/>
                <label for="name">Cheezza</label>
              </p>
              <p>
                <input type="number" name="qty" size="50" min="1" max="10" value="1"/><br />
              </p>
              <p>
                <label for="address">Address</label><br />
                <textarea name="address" id="address" cols="54" rows="4" required></textarea>
              </p>

              <input class="button" type="submit" value="ORDER" name="order"/>
            </form>
          </div>
        </div>
      </div>
      
      
    </div>

    <footer>
      <p>© 2023 Aghnia Nurhidayah. All rights reserved.</p>
    </footer>

    <script>
      var icon = document.getElementById("icon");
      icon.onclick = function () {
        alert("Berhasil mengubah theme");
        document.body.classList.toggle("dark-theme");
        if (document.body.classList.contains("dark-theme")) {
          icon.src = "../assets/icons8-sun-90.png";
        } else {
          icon.src = "../assets/icons8-moon-96.png";
        }
      };
    </script>
  </body>
</html>
