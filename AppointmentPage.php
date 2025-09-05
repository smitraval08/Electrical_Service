<?php
session_start();
if(!isset($_SESSION['user_id']) || !isset($_SESSION['complaint_id'])){
    header("Location: login.php");
    exit;
}

$con = mysqli_connect("localhost","root","","electric_service",3307);
if(!$con){ die("Connection Failed: ".mysqli_connect_error()); }

if(isset($_POST['book'])){
    $complaint_id = $_SESSION['complaint_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $sql = "INSERT INTO appointments (complaint_id, appointment_date, appointment_time)
            VALUES ('$complaint_id','$date','$time')";
    if(mysqli_query($con,$sql)){
        header("Location: Thankyou.php");
        exit;
    } else {
        echo "❌ Query Failed: ".mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Book Appointment</title></head>
<body>
<form method="POST">
    <input type="date" name="date" required><br>
    <input type="time" name="time" required><br>
    <button type="submit" name="book">Book Appointment</button>
</form>
</body>
</html>
