<?php
session_start();
?>
<html>
<body>
<?php
  $t1=$_POST['nm1'];
  $t2=$_POST['nm2'];
  $_SESSION["xx"]=$t1;
  $conn= mysqli_connect("localhost","root","","matrimony");
  mysqli_select_db($conn,"matrimony");
 $sql=mysqli_query($conn,"select* from userdata where email='$t1'and password='$t2'");
 ?>
<table border=1>
<?php
if($di=mysqli_fetch_array($sql))
      {
        include "admindashboard.php";
      } 
     else {
         include "adminlogin.php";   
    }
?>
</table>
</body>
</html>