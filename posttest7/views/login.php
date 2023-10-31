<?php
    session_start();
    require "../action/db_conn.php";
    
    if(isset($_SESSION['username'])){
        header("Location: index.php");
        exit();
    }

    if(isset($_POST['submitlogin'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $uname = $_POST['username'];
        $pw = $_POST['passw'];

        $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$uname'");
        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['username'] == "admin" && $row['email'] == "admin@gmail.com" && $row['passw'] == "admin123"){
                header("Location: dashboard.php");
            }else{
                if($email == $row['email'] && password_verify($pw, $row['passw'])){
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    header("Location: index.php");
                }else{
                    echo "<script>alert('Email atau Password Anda Salah')</script>";
                }
            }
        }else{
            echo "<script>alert('Akun Anda belum terdaftar')</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../css/login.css" <?php echo time(); ?>/>
</head>
<body>
    <div class="login">
        <div class="box">
        <header id="login">LOGIN</header>
            <form action="" method="post">
                <div class="field-input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="field-input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="field-input">
                    <label for="passw">Password</label>
                    <input type="password" name="passw" id="password" required>
                </div>
                <div class="field">
                    <input type="submit" id="button" name="submitlogin" value="Login">
                </div>
                <div class="links">
                    Don't Have Account? <a href="signup.php"> Sign Up Now</a>
                </div>
            </form>
        </div>
    </div>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae et reiciendis maxime, eos incidunt esse ipsam modi quasi beatae sequi eum consequatur veritatis voluptatum nemo, rerum neque dolorem quaerat alias?
</body>
</html>
