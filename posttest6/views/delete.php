<?php
    require "../action/db_conn.php";

    $order_id = $_GET['order_id'];
    $result = mysqli_query($conn, "DELETE FROM orders WHERE order_id = $order_id");
    $order = [];

    if ($result) {
        echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'dashboard.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'dashboard.php';
        </script>";
    }
?>