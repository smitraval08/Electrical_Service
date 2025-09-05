<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$dbname = "electric_service";
$port = 3307;

$con = mysqli_connect($server, $username, $password, $dbname, $port);
if(!$con){ 
    die("❌ Connection Failed: ".mysqli_connect_error()); 
}

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Backticks lagaye kyunki column names me space hai
    $sql = "SELECT * FROM `eservice` WHERE `Email`='$email' AND `Password`='$password'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        // Sessions set
        $_SESSION['user_id'] = $row['id'];   // id column hona chahiye table me
        $_SESSION['user_name'] = $row['Full Name'];
        $_SESSION['role'] = $row['Select Role'];

        // Redirect after successful login
        header("Location: ProblemPage.php");
        exit;
    } else {
        echo "<script>alert('❌ Invalid Email or Password!');window.location='login.php';</script>";
        exit;
    }
}
?>
