<html>
<body>
<?php
$t1=$_POST['nm1'];
$t2=$_POST['nm2'];
$t3=$_POST['nm3'];
$t4=$_POST['nm4'];
$t5=$_POST['nm5'];
$t6=$_POST['nm6'];
$t7=$_POST['nm7'];
$t8=$_POST['nm8'];
$t9=$_POST['nm9'];
$t10=$_POST['nm10'];
$conn=mysqli_connect("localhost","root","","matrimony");
mysqli_select_db($conn,"matrimony");
$recs= mysqli_query($conn,"insert into userdata(fullname,email,password,age,contact,address,city,state,gender,dob) values('$t1','$t2','$t3','$t4','$t5','$t6','$t7','$t8','$t9','$t10')");
if($recs!=0)
	{
	  print"<center><h2>Congratulation!you registered successfully to the VivaSetu...</h2>";
	}
 else
	{
	  print "<h2>Sorry Try Again !..</h2>";
          echo "MySQL Error: " . mysqli_error($conn);
	}
?>
</body></html>