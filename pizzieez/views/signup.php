<?php
session_start();
require "../db_conn/db_connect.php";

// if(isset($_SESSION['username'])){
//     header("Location: index.php");
//     exit();
// }

if (isset($_POST['submit-signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirm-password'];

    if ($password === $cpassword) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
        if (!$check->num_rows > 0) {
            $result = mysqli_query($conn, "INSERT INTO users VALUES ('', '$username', '$email', '$password')");
            if ($result) {
                echo "<script>alert('Register Successfully!');
                    document.location.href = 'login.php';
                    </script>";
            } else {
                echo "<script>alert('Woops! Register Failed.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email has been registered.')</script>";
        }
    } else {
        echo "
                <script>
                    alert('Confirm Password Invalid');
                    document.location.href = 'signup.php';
                </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIZZIEEZ | Sign Up</title>

    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="signup">
        <div class="signup-box">
            <h1>Sign Up</h1>
            <form action="" method="post">
                <div class="input-field">
                    <label for="">Email</label>
                    <input type="email" name="email">
                </div>
                <div class="input-field">
                    <label for="">Username</label>
                    <input type="username" name="username">
                </div>
                <div class="input-field">
                    <label for="">Password</label>
                    <input type="text" name="password">
                </div>
                <div class="input-field">
                    <label for="">Confirm Password</label>
                    <input type="text" name="confirm-password">
                </div>
                <input class="submit-signup" name="submit-signup" type="submit" value="Sign Up">
                <p>Already have an a account? <a href="login.php">Login here</a></p>
            </form>
        </div>
    </div>
</body>

</html>