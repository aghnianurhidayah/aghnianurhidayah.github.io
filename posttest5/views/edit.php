<?php
    require "../action/db_conn.php";
    $order_id = $_GET['order_id'];
    $get = mysqli_query($conn, "SELECT * FROM orders WHERE order_id = $order_id");
    $order = [];

    while ($row = mysqli_fetch_assoc($get)) {
        $order[] = $row;
    }
    $order = $order[0];

    if (isset($_POST['edit'])) {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $pizza = $_POST['pizza'];
        $qty = $_POST['qty'];
        $address = $_POST['address'];
        $sts = $_POST['sts'];

        $result = mysqli_query($conn, "UPDATE orders SET sts='$sts' WHERE order_id = $order_id");

        if ($result) {
            echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'dashboard.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Data gagal diubah!');
                document.location.href = 'dashboard.php';
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>

    <link rel="stylesheet" href="../css/edit.css" <?php echo time(); ?>/> 
</head>
<body>

    <div class="content">
        <div class="content-order">
        <h3>EDIT ORDER FORM</h3>
        <div class="order" id="order">
          <div class="form-box">
            <form action="" method="post">
              <p>
                <label for="email">Email</label><br/>
                <input type="email" name="email" id="email" size="50" value="<?php echo $order['email'] ?>" disabled/><br />
              </p>
              <p>
                <label for="name">Name</label><br />
                <input type="text" name="name" id="name" size="50" value="<?php echo $order['name'] ?>" required disabled/><br />
              </p>
              <p>
                <label>Pizza</label><br />
                <input type="text" name="pizza" id="pizza" size="50" value="<?php echo $order['pizza'] ?>" size="50" required disabled/>
              </p>
              <p>
                <input type="number" name="qty" id="qty" size="50" min="1" max="10" value="<?php echo $order['qty'] ?>" disabled/><br />
              </p>
              <p>
                <label for="address">Address</label><br />
                <input type="text" name="address" id="address" size="50" value="<?php echo $order['address'] ?>" required disabled>
              </p>
              <p>
                <label for="status">Status</label><br />
                <select name="sts" id="status" value="<?php echo $order['sts'] ?>">Status
                    <option value="Waiting">Waiting</option>
                    <option value="Process">Process</option>
                    <option value="Deliver">Deliver</option>
                    <option value="Done">Done</option>
                </select>
              </p>

              <input class="button" type="submit" value="EDIT" name="edit"/>
            </form>
          </div>
        </div>
      </div>
    </div>
</body>
</html>