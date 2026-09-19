<!DOCTYPE html>
<html>
<body>

<?php
if(isset($_GET['email'])){

    $email = $_GET['email'];
    
    $conn = mysqli_connect("localhost","root","","matrimony");
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "DELETE FROM userdata WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if($result){
        if(mysqli_affected_rows($conn) > 0){
            echo "<h2>Data deleted successfully!</h2>";
        } else {
            echo "<h2>No record found with this email.</h2>";
        }
    } else {
        echo "<h2>Error: " . mysqli_error($conn) . "</h2>";
    }

} else {
    echo "<h2>Invalid request!</h2>";
}
?>

</body>
</html>