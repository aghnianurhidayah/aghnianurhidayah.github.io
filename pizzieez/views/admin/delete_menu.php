<?php
require "../../db_conn/db_connect.php";

$menu_id = $_GET['menu_id'];
$delete = mysqli_query($conn, "DELETE FROM menu WHERE menu_id = $menu_id");
$menu = [];

if ($delete) {
    echo "
        <script>
            alert('Menu Successfully Deleted!');
            document.location.href = 'menu.php';
        </script>";
} else {
    echo "
        <script>
            alert('Failed Delete Menu!');
            document.location.href = 'menu.php';
        </script>";
}
