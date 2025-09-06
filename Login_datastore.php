<?php
session_start();

$server = "localhost";
$username = "root";
$password = "31613161"; // your MySQL password
$dbname = "electric_service";

// Connect to DB (default port 3306)
$con = mysqli_connect($server, $username, $password, $dbname);
if(!$con){ 
    die("❌ Connection Failed: ".mysqli_connect_error()); 
}

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Login: check if email + password exist
    $sql = "SELECT * FROM eservice WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        // Save data in session
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['full_name'];
        $_SESSION['role'] = $row['role'];

        // Redirect after login
        header("Location: ProblemPage.php");
        exit;
    } else {
        echo "<script>alert('❌ Invalid Email or Password!');window.location='login.php';</script>";
        exit;
    }
}
?>
