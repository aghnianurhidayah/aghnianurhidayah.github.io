<?php
  require "../action/db_conn.php";
  

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <nav>
      <div class="nav-logo">
        <h3>PIZZIEEZ</h3>
      </div>
      <div class="nav-items">
        <a href="index.php">Home</a>
        <a href="#">Menu</a>
        <a href="order.php">My Order</a>
        <a href="about.php">About</a>
          <?php
          if(isset($_SESSION['username'])) {
          ?>
              <a href="logout.php" class="button">Logout</a>
          <?php
          }elseif(!isset($_SESSION['username'])){
          ?>
              <a href="login.php" class="button">Login</a>
          <?php
          }
          ?>

        <a><img src="../assets/icons8-moon-96.png" alt="" id="icon" onclick="tampilkanPopUp()" /></a>
      </div>
    </nav>
  </body>
</html>
