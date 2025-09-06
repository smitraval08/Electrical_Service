<?php
$server = "localhost";
$username = "root";
$password = "31613161";//aayina taro password nakh mysql no
$dbname = "electric_service";
$port = 3306;// jo run thay to port change karje aaiya 3307 na badale 3306 karine

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
    $sql = "INSERT INTO eservice (full_name, email, password, role)
    VALUES ('$name','$email','$password','$role')";
    // //aa vadu table banay database ma:-
    // CREATE TABLE eservice ( 
    //     id INT AUTO_INCREMENT PRIMARY KEY,
    //     full_name VARCHAR(100) NOT NULL,
    //     email VARCHAR(150) NOT NULL UNIQUE,
    //     password VARCHAR(255) NOT NULL,
    //     role VARCHAR(50) NOT NULL
    // );
    // Aane junu table drop kar :- drop table table_naam
    if(mysqli_query($con, $sql)){
        echo "<script>alert('✅ Registration Successfully!');window.location='login.php';</script>";
    } else {
        echo "❌ Query Failed: ".mysqli_error($con);
    }
}
?>
