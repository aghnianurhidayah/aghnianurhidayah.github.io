<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "pizzastore_db";

    $conn = mysqli_connect($host, $user, $pass, $db);

    if (!$conn){
        die("Gagal terhubung".mysqli_connect_error());
    }
?>