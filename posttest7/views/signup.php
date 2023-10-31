<?php
    session_start();
    require "../action/db_conn.php";

    if (isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }
     
    if (isset($_POST['submitregis'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['passw'];
        $cpassword = $_POST['cpassw'];

        if($password === $cpassword){
            $password = password_hash($password, PASSWORD_DEFAULT);
            $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
            if (!$check->num_rows > 0) {
                $result = mysqli_query($conn, "INSERT INTO users VALUES ('', '$username', '$email', '$password')");
                if ($result) {
                    echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                    header("Location: login.php");
                } else {
                    echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
                }
            } else {
                echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
            }
        }else{
            echo "
                <script>
                    alert('Konformasi Password Anda Tidak Sesuai');
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
    <title>Sign Up</title>

    <link rel="stylesheet" href="../css/login.css" <?php echo time(); ?>/>
</head>
<body>
    <div class="login">
        <div class="box">
        <header id="login">SIGN UP</header>
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
                <div class="field-input">
                    <label for="cpassw">Confirm Password</label>
                    <input type="password" name="cpassw" id="cpassword" required>
                </div>
                <div class="field">
                    <input type="submit" id="button" name="submitregis" value="Sign Up">
                </div>
            </form>
        </div>
    </div>
</body>
</html>