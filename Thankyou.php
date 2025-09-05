<?php
session_start();
if(!isset($_SESSION['user_id'])){ header("Location: login.php"); exit; }
?>
<!DOCTYPE html>
<html>
<head><title>Thank You</title></head>
<body>
<h2>✅ Your appointment is successfully booked!</h2>
<a href='Feedback.php'>Give Feedback</a>
</body>
</html>
