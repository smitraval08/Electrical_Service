<?php
session_start();
if(!isset($_SESSION['user_id']) || !isset($_SESSION['complaint_id'])){
    header("Location: login.php");
    exit;
}

$con = mysqli_connect("localhost","root","","electric_service",3307);
if(!$con){ die("Connection Failed: ".mysqli_connect_error()); }

if(isset($_POST['submit'])){
    $user_id = $_SESSION['user_id'];
    $complaint_id = $_SESSION['complaint_id'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];

    $sql = "INSERT INTO feedback (user_id, complaint_id, rating, comments)
            VALUES ('$user_id','$complaint_id','$rating','$comments')";
    if(mysqli_query($con,$sql)){
        echo "<h3>✅ Thank you for your feedback!</h3>";
    } else {
        echo "❌ Query Failed: ".mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Feedback</title></head>
<body>
<form method="POST">
    <label>Rating (1-5):</label><br>
    <input type="number" name="rating" min="1" max="5" required><br>
    <textarea name="comments" placeholder="Write your feedback" required></textarea><br>
    <button type="submit" name="submit">Submit Feedback</button>
</form>
</body>
</html>
