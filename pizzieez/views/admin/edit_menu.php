<?php
require "../../db_conn/db_connect.php";
$menu_id = $_GET['menu_id'];
$get = mysqli_query($conn, "SELECT * FROM menu WHERE menu_id = $menu_id");
$menu = [];

while ($row = mysqli_fetch_assoc($get)) {
    $menu[] = $row;
}
$menu = $menu[0];

if (isset($_POST['edit-menu'])) {
    $name = $_POST['menu-name'];
    $desc = $_POST['menu-desc'];
    $price = $_POST['menu-price'];
    $img_edited = $_FILES['menu-img']['name'];
    $x = explode('.', $img_edited);
    $ekstensi = strtolower(end($x));
    $date = date("Y-m-d_h-i-s");
    $img_edited = "$date.$name.$ekstensi";
    $tmp = $_FILES['menu-img']['tmp_name'];

    if (is_uploaded_file($tmp) && file_exists($tmp)) {
        move_uploaded_file($tmp, "../../assets/img/" . $img_edited);
    } else {
        $img_edited = $menu['pic'];
    }

    $result = mysqli_query($conn, "UPDATE menu SET name_menu = '$name', desc_menu = '$desc', price = '$price', pic = '$img_edited' WHERE menu_id = $menu_id");
    if ($result) {
        echo "
            <script>
                alert('Menu Successfully Changed!');
                document.location.href = 'menu.php';
            </script>";
    } else {
        echo "
        <script>
            alert('Failed Change Menu!');
            document.location.href = 'menu.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../styles/adminstyle.css">
</head>

<body>
    <div class="edit-menu">
        <div class="box">
            <div class="close-btn">
                <i class="fa-solid fa-xmark" onclick="toggleAddmenu()"></i>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <h1>Edit Menu</h1>
                <div class="input-field">
                    <label for="">Name</label>
                    <input type="text" name="menu-name" value="<?= $menu['name_menu'] ?>">
                </div>
                <div class="input-field">
                    <label for="">Description</label>
                    <input type="text" name="menu-desc" value="<?= $menu['desc_menu'] ?>">
                </div>
                <div class="input-field">
                    <label for="">Price</label>
                    <input type="number" name="menu-price" value="<?= $menu['price'] ?>">
                </div>
                <div class="input-field">
                    <label for="">Image</label>
                    <input type="file" name="menu-img">
                </div>
                <div class="input-field submit-btn">
                    <input type="submit" value="SAVE" name="edit-menu">
                </div>
            </form>
        </div>
    </div>
</body>

</html>