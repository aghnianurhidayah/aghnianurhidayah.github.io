<?php
    require "../action/db_conn.php";
    session_start();

    if(isset($_SESSION['username'])){
        header("Location: index.php");
        exit();
    }

    if(isset($_POST['submitlogin'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pw = $_POST['passw'];
        $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND passw='$pw'");
        if($result->num_rows > 0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            if($row['username'] == "admin"){
                header("Location: dashboard.php");
            }else{
                header("Location: index.php");
            }
        }else{
            echo "<script>alert('Email atau Password Anda Salah')</script>";
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
</body>
</html>