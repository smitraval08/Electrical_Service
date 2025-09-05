<?php
session_start();
if(!isset($_SESSION['user_id'])){ header("Location: login.php"); exit; }

$con = mysqli_connect("localhost","root","","electric_service",3307);
if(!$con){ die("Connection Failed: ".mysqli_connect_error()); }

if(isset($_POST['submit'])){
    $user_id = $_SESSION['user_id'];
    $complaint = $_POST['complaint'];
    $address = $_POST['address'];
    $status = 'Pending';

    $sql = "INSERT INTO complaints (user_id, complaint_text, address, status)
            VALUES ('$user_id','$complaint','$address','$status')";
    if(mysqli_query($con,$sql)){
        $_SESSION['complaint_id'] = mysqli_insert_id($con); // latest ID
        header("Location: Appointment.php");
        exit;
    } else {
        echo "❌ Query Failed: ".mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Submit Complaint</title></head>
<body>
<h2>✅ Welcome <?php echo $_SESSION['user_name']; ?></h2>
<form method="POST">
    <textarea name="complaint" placeholder="Describe your problem" required></textarea><br>
    <input type="text" name="address" placeholder="Your Address" required><br>
    <button type="submit" name="submit">Submit Complaint</button>
</form>
</body>
</html>
