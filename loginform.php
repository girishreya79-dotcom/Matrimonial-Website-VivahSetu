<?php
session_start();

if(isset($_POST['nm1']) && isset($_POST['nm2'])) {
$email = $_POST['nm1'];
$password = $_POST['nm2'];
$conn = mysqli_connect("localhost","root","","matrimony");
if(!$conn){
        die("Database connection failed: " . mysqli_connect_error());
    }

$sql = mysqli_query($conn, "SELECT * FROM userdata WHERE email='$email' AND password='$password'");
if($user = mysqli_fetch_array($sql)) {
    $_SESSION["xx"] = $email;
    header("Location: myprofile.php");
        exit();
    } 
    else {
    echo '<script>alert("Invalid email or password");</script>';
    }
}
?>