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
            <form action="">
                <div class="input-field">
                    <label for="">Email</label>
                    <input type="email">
                </div>
                <div class="input-field">
                    <label for="">Password</label>
                    <input type="text">
                </div>
                <input class="submit-login" type="submit" value="Login">
                <p>Don't have an a account? <a href="signup.php">Sign Up here</a></p>
            </form>
        </div>
    </div>
</body>
</html>