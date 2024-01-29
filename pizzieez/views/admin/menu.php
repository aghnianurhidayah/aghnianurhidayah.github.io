<?php
require "../../db_conn/db_connect.php";

if (isset($_GET['edit'])) {
    $menu_id = $_GET['edit'];
    $get = mysqli_query($conn, "SELECT * FROM menu WHERE menu_id = $menu_id");
    $menu = [];

    while ($row = mysqli_fetch_assoc($get)) {
        $menu[] = $row;
    }
    $menu = $menu[0];
}

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

if (isset($_POST['save-menu'])) {
    $name = $_POST['menu-name'];
    $desc = $_POST['menu-desc'];
    $price = $_POST['menu-price'];
    $img = $_FILES['menu-img']['name'];
    $x = explode('.', $img);
    $ekstensi = strtolower(end($x));
    $date = date("Y-m-d_h-i-s_");
    $img = "$date.$name.$ekstensi";
    $tmp = $_FILES['menu-img']['tmp_name'];

    if (move_uploaded_file($tmp, "../../assets/img/" . $img)) {
        $result = mysqli_query($conn, "INSERT INTO menu VALUES ('', '$name', '$desc', '$price', '$img')");
        if ($result) {
            echo "
            <script>
                alert('Menu Successfully Added!');
                document.location.href = 'add_menu.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Menu Added Failed!');
                document.location.href = 'add_menu.php';
            </script>";
        }
    } else {
        echo "
            <script>
                alert('Failed Upload Picture!');
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Menu</title>

    <link rel="stylesheet" href="../../styles/adminstyle.css">
</head>

<body>
    <?php include 'sidebar.php'; ?>

    <div class="popup-edit-menu" id="popup-edit-menu">
        <div class="edit-menu">
            <div class="box">
                <div class="close-btn">
                    <i class="fa-solid fa-xmark" onclick="toggleEditmenu()"></i>
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
    </div>

    <div class="popup-add-menu" id="popup-add-menu">
        <div class="form-menu">
            <div class="box">
                <div class="close-btn">
                    <i class="fa-solid fa-xmark" onclick="toggleAddmenu()"></i>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <h1>Add Menu</h1>
                    <div class="input-field">
                        <label for="">Name</label>
                        <input type="text" name="menu-name" placeholder="">
                    </div>
                    <div class="input-field">
                        <label for="">Description</label>
                        <input type="text" name="menu-desc" placeholder="">
                    </div>
                    <div class="input-field">
                        <label for="">Price</label>
                        <input type="number" name="menu-price" placeholder="">
                    </div>
                    <div class="input-field">
                        <label for="">Image</label>
                        <input type="file" name="menu-img" placeholder="">
                    </div>
                    <div class="input-field submit-btn">
                        <input type="submit" value="SAVE" name="save-menu">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="add-menu">
        <header>
            <h4>Menus</h4>
        </header>
        <div class="content">
            <div class="add-btn">
                <button onclick="toggleAddmenu()">
                    <i class="fa-solid fa-plus fa-sm"></i>
                    <span class="add-text text">Add Menu</span>
                </button>
            </div>
            <div class="menus-table">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price ($)</th>
                            <th>Picture</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql_show_menu = mysqli_query($conn, "SELECT * FROM menu");

                        $menus = [];
                        while ($row = mysqli_fetch_assoc($sql_show_menu)) {
                            $menus[] = $row;
                        }
                        $i = 1;
                        foreach ($menus as $menu) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $menu['name_menu']; ?></td>
                                <td><?= $menu['desc_menu']; ?></td>
                                <td><?= $menu['price']; ?></td>
                                <td class="pic"><img src="../../assets/img/<?= $menu['pic']; ?>" alt="" width="100px"></< /td>
                                <td>
                                    <div class="action">
                                        <a onclick="toggleEditmenu()" class="edit-btn" href="menu.php?edit=<?= $menu['menu_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a class="delete-btn" href="menu.php?menu_id=<?= $menu['menu_id'] ?>"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../../scripts/script.js"></script>
</body>

</html>