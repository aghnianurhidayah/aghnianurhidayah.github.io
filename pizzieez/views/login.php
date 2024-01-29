<?php
    session_start();
    require "../db_conn/db_connect.php";

    if(isset($_SESSION['username'])){
        header("Location: index.php");
        exit();
    }

    if(isset($_POST['submit-login'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pw = $_POST['password'];

        $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['email'] == "admin@gmail.com" && $row['password'] == "admin123"){
                header("Location: admin/dashboard.php");
            }else{
                if($email == $row['email'] && password_verify($pw, $row['password'])){
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    header("Location: index.php");
                }else{
                    echo "<script>alert('Email/Password Invalid')</script>";
                }
            }
        }else{
            echo "<script>alert('Your Account Hasn't Registered Yet')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIZZIEEZ | Login</title>

    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="login">
        <div class="login-box">
            <h1>Login</h1>
            <form action="" method="post">
                <div class="input-field">
                    <label for="">Email</label>
                    <input type="email" name="email">
                </div>
                <div class="input-field">
                    <label for="">Password</label>
                    <input type="text" name="password">
                </div>
                <input class="submit-login" name="submit-login" type="submit" value="Login">
                <p>Don't have an a account? <a href="signup.php">Sign Up here</a></p>
            </form>
        </div>
    </div>
</body>
</html>