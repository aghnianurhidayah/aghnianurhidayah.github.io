<?php
    require "../action/db_conn.php";

    $id_menu = $_GET['id_menu'];
    $result = mysqli_query($conn, "DELETE FROM menu WHERE id_menu = $id_menu");
    $menu = [];

    if ($result) {
        echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'menudash.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'menudash.php';
        </script>";
    }
?>