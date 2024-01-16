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
            <form action="">
                <div class="input-field">
                    <label for="">Email</label>
                    <input type="email">
                </div>
                <div class="input-field">
                    <label for="">Password</label>
                    <input type="text">
                </div>
                <div class="input-field">
                    <label for="">Confirm Password</label>
                    <input type="text">
                </div>
                <input class="submit-signup" type="submit" value="Sign Up">
                <p>Already have an a account? <a href="login.php">Login here</a></p>
            </form>
        </div>
    </div>
</body>
</html>