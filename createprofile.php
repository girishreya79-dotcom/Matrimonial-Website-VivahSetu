<?php
session_start();
include("sidebar.php"); // Include sidebar
$t1 = $_SESSION["xx"];
$conn = mysqli_connect("localhost","root","","matrimony");
$sql = mysqli_query($conn,"SELECT * FROM userdata WHERE email='$t1'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Complete Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f2f4f7; }
        .profile-form { background: #fff; padding: 25px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);}
        .form-title { color: #0d6efd; font-weight: bold; margin-bottom: 20px; text-align: center;}
        .table th { width: 40%; background: #f8f9fa;}
        .btn-update { padding: 8px 25px;}
        .main-content { margin-left: 260px; padding: 30px;} /* important to shift content next to sidebar */
        @media(max-width:768px){.main-content{margin-left:0;}}
    </style>
</head>
<body>

<div class="main-content">
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 profile-form">

<form action="updateprofile.php" method="post" enctype="multipart/form-data">

<h3 class="form-title">Complete Your Profile</h3>

<table class="table table-bordered table-hover">
<?php while($di=mysqli_fetch_array($sql)) { ?>            
<tr><th>Upload Photo</th><td><input type="file" name="nm11" class="form-control"></td></tr>
<tr><th>Father Name</th><td><input type="text" name="nm12" value="<?php echo $di[11]; ?>" class="form-control"></td></tr>
<tr><th>Mother Name</th><td><input type="text" name="nm13" value="<?php echo $di[12]; ?>" class="form-control"></td></tr>
<tr><th>Income</th><td><input type="text" name="nm14" value="<?php echo $di[13]; ?>" class="form-control"></td></tr>
<tr><th>Caste</th><td><input type="text" name="nm15" value="<?php echo $di[14]; ?>" class="form-control"></td></tr>
<tr><th>Highest Qualification</th><td><input type="text" name="nm16" value="<?php echo $di[15]; ?>" class="form-control"></td></tr>
<tr><th>Occupation</th><td><input type="text" name="nm17" value="<?php echo $di[16]; ?>" class="form-control"></td></tr>
<tr><th>Complexion</th><td><input type="text" name="nm18" value="<?php echo $di[17]; ?>" class="form-control"></td></tr>
<tr><th>Marital Status</th><td><input type="text" name="nm19" value="<?php echo $di[18]; ?>" class="form-control"></td></tr>
<tr><th>Known Language</th><td><input type="text" name="nm20" value="<?php echo $di[19]; ?>" class="form-control"></td></tr>
<tr><th>Blood Group</th><td><input type="text" name="nm21" value="<?php echo $di[20]; ?>" class="form-control"></td></tr>
<tr><th>Height</th><td><input type="text" name="nm22" value="<?php echo $di[21]; ?>" class="form-control"></td></tr>
<tr><th>Weight</th><td><input type="text" name="nm23" value="<?php echo $di[22]; ?>" class="form-control"></td></tr>
<tr><th>Diet</th><td><input type="text" name="nm24" value="<?php echo $di[23]; ?>" class="form-control"></td></tr>
<tr><th>Smoking</th><td><input type="text" name="nm25" value="<?php echo $di[24]; ?>" class="form-control"></td></tr>
<tr><th>Drinking</th><td><input type="text" name="nm26" value="<?php echo $di[25]; ?>" class="form-control"></td></tr>
<tr><th>Hobbies</th><td><input type="text" name="nm27" value="<?php echo $di[26]; ?>" class="form-control"></td></tr>
<tr><th>About Me</th><td><input type="text" name="nm28" value="<?php echo $di[27]; ?>" class="form-control"></td></tr>
<?php } ?>

<tr>
  <td></td>
  <td><input type="submit" name="update" value="Update" class="btn btn-primary btn-update"></td>
</tr>
</table>

</form>

        </div>
    </div>
</div>
</div>

</body>
</html>