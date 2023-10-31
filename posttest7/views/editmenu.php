<?php
    require "../action/db_conn.php";
    $id_menu = $_GET['id_menu'];
    $get = mysqli_query($conn, "SELECT * FROM menu WHERE id_menu = $id_menu");
    $menu = [];

    while ($row = mysqli_fetch_assoc($get)) {
        $menu[] = $row;
    }
    $menu = $menu[0];

    if (isset($_POST['menuedit'])) {
        $name = $_POST['menuname'];
        $prize = $_POST['prize'];
        $pic = $_FILES['picture']['name'];
        date_default_timezone_set('Asia/Makassar');
        $tanggal = date("Y-m-d_h-i-s_");
        $x = explode('.', $pic);
        $ekstensi = strtolower(end($x));
        $picture = "$tanggal.$name.$ekstensi";
        $tmp = $_FILES['picture']['tmp_name'];

        if (move_uploaded_file($tmp, "../assets/img/".$picture)){
            $result = mysqli_query($conn, "UPDATE menu SET name_menu = '$name', prize = '$prize', pic = '$picture' WHERE id_menu = $id_menu");
            if ($result) {
                echo "
                <script>
                    alert('Menu Successfully Changed!');
                    document.location.href = 'menudash.php';
                </script>";
            } else {
                echo "
                <script>
                    alert('Failed Add Menu!');
                    document.location.href = 'menudash.php';
                </script>";
            }
        }else{
            echo "
                <script>
                    alert('Failed Upload Picture!');
                    document.location.href = 'menudash.php';
                </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu</title>

    <link rel="stylesheet" href="../css/dashstyle.css" <?php echo time(); ?>/> 
</head>
<body>
<div class="content">
        <div class="content-menu">
        <h3>EDIT MENU</h3>
        <div class="menu" id="menu">
          <div class="form-box">
            <form action="" method="post" enctype="multipart/form-data">
              <p>
                <label for="menuname">Name</label><br />
                <input type="text" name="menuname" id="name" size="50" value="<?php echo $menu['name_menu'] ?>" required/><br />
              </p>
              <p>
                <label>Prize</label><br />
                <input type="number" name="prize" id="prize" size="50" value="<?php echo $menu['prize'] ?>" required/>
              </p>
              <p>
                <label for="picture">Picture</label><br />
                <input type="file" name="picture" id="picture" size="50" required>
              </p>

              <input class="button" type="submit" value="EDIT" name="menuedit"/>
            </form>
          </div>
        </div>
      </div>
    </div>
</body>
</html>