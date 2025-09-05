<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-box">
    <h2>Login</h2>
    <form action="Login_datastore.php" method="POST">
        <div class="input-group">
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="input-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" name="login">Login</button>
        <p>Don't have an account? <a href="registration.php">Register</a></p>
    </form>
</div>
</body>
</html>
