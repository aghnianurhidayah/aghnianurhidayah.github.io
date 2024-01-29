<?php
    require "../db_conn/db_connect.php";

    $sql = mysqli_query($conn, "SELECT * FROM menu");

    $menus = [];
    while ($row = mysqli_fetch_assoc($sql)) {
        $menus[] = $row;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIZZIEEZ | Menu</title>

    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="menus">
        <h1>OUR MENUS</h1>
        <div class="row">
            <?php 
            $i = 1;
            foreach ($menus as $menu) : 
            ?>
            <div class="box">
                <img src="../assets/img/<?= $menu['pic']; ?>" alt="" />
                <div class="menu">
                    <p><?= $menu['name_menu']; ?></p>
                    <p>$<?= $menu['price']; ?></p>
                </div>
                <p><?= $menu['desc_menu']; ?></p>
            </div>
            <?php
            $i++;
            endforeach; ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>