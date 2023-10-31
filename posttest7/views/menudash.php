<?php
    require "../action/db_conn.php";
    session_start();

    $result = mysqli_query($conn, "SELECT * FROM menu");

    $menu = [];

    while($row = mysqli_fetch_assoc($result)){
        $menu[] = $row;
    }

    if(isset($_SESSION['username'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>

    <link rel="stylesheet" href="../css/dashstyle.css" <?php echo time(); ?>/>
</head>
<body>

<?php include 'navbardash.php'; ?>

<div class="container">
        <div class="dashboard">
            <a href="addmenu.php" class="add-button">Add Menu</a>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Menu ID</th>
                        <th>Name</th>
                        <th>Prize</th>
                        <th>Picture</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($menu as $m) :?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $m['id_menu'] ?></td>
                            <td><?php echo $m['name_menu'] ?></td>
                            <td><?php echo $m['prize'] ?></td>
                            <td><img src="../assets/img/<?php echo $m['pic']?>" alt="image" width="80px" height="80px"></td>
                            <td class="action">
                                <a href="editmenu.php?id_menu=<?php echo $m['id_menu']?>"><button class="edit-btn"><img src="../assets/icons8-edit-100.png" width="20px"></button></a>
                                <a href="deletemenu.php?id_menu=<?php echo $m['id_menu']?>"><button class="delete-btn"><img src="../assets/icons8-delete-90.png" width="20px"></button></a>
                            </td>
                        </tr>
                    <?php $i++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php 
    }else{
        header("Location: login.php");
    }