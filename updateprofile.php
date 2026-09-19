<?php
session_start();
$t1 = $_SESSION["xx"];  
?>
<html>
<body>
<?php
$t11=$_FILES['nm11'];
$t12=$_POST['nm12'];
$t13=$_POST['nm13'];
$t14=$_POST['nm14'];
$t15=$_POST['nm15'];
$t16=$_POST['nm16'];
$t17=$_POST['nm17'];
$t18=$_POST['nm18'];
$t19=$_POST['nm19'];
$t20=$_POST['nm20'];
$t21=$_POST['nm21'];
$t22=$_POST['nm22'];
$t23=$_POST['nm23'];
$t24=$_POST['nm24'];
$t25=$_POST['nm25'];
$t26=$_POST['nm26'];
$t27=$_POST['nm27'];
$t28=$_POST['nm28'];
move_uploaded_file($t11['tmp_name'],"foldernew/".$t11['name']);
$xx="foldernew/".$t11['name'];
$conn=mysqli_connect("localhost","root","","matrimony");
mysqli_select_db($conn,"matrimony");
$recs=mysqli_query($conn,"update userdata set uploadphoto='$xx', fathername='$t12', mothername='$t13', income='$t14', caste='$t15', highestqualification='$t16', occupation='$t17', complexion='$t18', maritalstatus='$t19', knownlanguage='$t20', bloodgroup='$t21', height='$t22', weight='$t23', diet='$t24', smoking='$t25', drinking='$t26', hobbies='$t27', aboutme='$t28' where email='$t1'");
if($recs!=0)
	{
	  print"<center><h2>Your Profile Completed!...</h2>";
	}
 else
	{
	  print "<h2>Sorry Try Again !..</h2>";
          echo "MySQL Error: " . mysqli_error($conn);
	}
?>
</body></html>