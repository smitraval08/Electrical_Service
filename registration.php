<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-box">
    <h2>Register</h2>
    <form action="Datastore.php" method="POST">
        <div class="input-group">
            <input type="text" name="fullname" placeholder="Full Name" required>
        </div>
        <div class="input-group">
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="input-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="input-group">
            <select name="role" required>
                <option value="" disabled selected>Select Role</option>
                <option value="customer">Customer</option>
                <option value="electrician">Electrician</option>
            </select>
        </div>
        <button type="submit" name="register">Register</button>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </form>
</div>
</body>
</html>
