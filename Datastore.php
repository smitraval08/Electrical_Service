<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "electric_service";
$port = 3307;

$con = mysqli_connect($server, $username, $password, $dbname, $port);
if (!$con) { 
    die("❌ Connection Failed: ".mysqli_connect_error()); 
}

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Table column names with spaces must be in backticks
    $sql = "INSERT INTO `eservice` (`Full Name`, `Email`, `Password`, `Select Role`)
            VALUES ('$name','$email','$password','$role')";
    
    if(mysqli_query($con, $sql)){
        echo "<script>alert('✅ Registration Successfully!');window.location='login.php';</script>";
    } else {
        echo "❌ Query Failed: ".mysqli_error($con);
    }
}
?>
