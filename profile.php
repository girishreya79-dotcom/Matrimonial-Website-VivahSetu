<?php
session_start();
include("sidebar.php"); // include permanent sidebar
$t1 = $_SESSION["xx"];                         
$conn= mysqli_connect("localhost","root","","matrimony");
$sql = mysqli_query($conn,"SELECT * FROM userdata WHERE email='$t1'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f2f4f7; }
        .profile-card { background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        .profile-img { border-radius: 50%; border: 2px solid #0d6efd; }
        .profile-title { font-weight: bold; color: #0d6efd; }
        .main-content { margin-left: 260px; padding: 30px; }
        @media(max-width:768px){ .main-content { margin-left:0; } }
    </style>
</head>
<body>

<div class="main-content">
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-9 profile-card">

<table class="table table-bordered table-striped table-hover">
<?php while($di = mysqli_fetch_array($sql)) { ?>
<tr class="text-center">
    <td colspan="2">
        <img src="<?php echo $di[10]; ?>" height="120" width="120" class="profile-img"><br>
        <span class="profile-title"><?php echo $di[0]; ?></span><br>
        <small class="text-muted"><?php echo $di[1]; ?></small>
    </td>
</tr>
<tr><th>Full Name</th><td><?php echo $di[0]; ?></td></tr>
<tr><th>Email</th><td><?php echo $di[1]; ?></td></tr>
<tr><th>Password</th><td><?php echo $di[2]; ?></td></tr>
<tr><th>Age</th><td><?php echo $di[3]; ?></td></tr>
<tr><th>Contact</th><td><?php echo $di[4]; ?></td></tr>
<tr><th>Address</th><td><?php echo $di[5]; ?></td></tr>
<tr><th>City</th><td><?php echo $di[6]; ?></td></tr>
<tr><th>State</th><td><?php echo $di[7]; ?></td></tr>
<tr><th>Gender</th><td><?php echo $di[8]; ?></td></tr>
<tr><th>DOB</th><td><?php echo $di[9]; ?></td></tr>
<tr><th>Father Name</th><td><?php echo $di[11]; ?></td></tr>
<tr><th>Mother Name</th><td><?php echo $di[12]; ?></td></tr>
<tr><th>Income</th><td><?php echo $di[13]; ?></td></tr>
<tr><th>Caste</th><td><?php echo $di[14]; ?></td></tr>
<tr><th>Highest Qualification</th><td><?php echo $di[15]; ?></td></tr>
<tr><th>Occupation</th><td><?php echo $di[16]; ?></td></tr>
<tr><th>Complexion</th><td><?php echo $di[17]; ?></td></tr>
<tr><th>Marital Status</th><td><?php echo $di[18]; ?></td></tr>
<tr><th>Known Language</th><td><?php echo $di[19]; ?></td></tr>
<tr><th>Blood Group</th><td><?php echo $di[20]; ?></td></tr>
<tr><th>Height</th><td><?php echo $di[21]; ?></td></tr>
<tr><th>Weight</th><td><?php echo $di[22]; ?></td></tr>
<tr><th>Diet</th><td><?php echo $di[23]; ?></td></tr>
<tr><th>Smoking</th><td><?php echo $di[24]; ?></td></tr>
<tr><th>Drinking</th><td><?php echo $di[25]; ?></td></tr>
<tr><th>Hobbies</th><td><?php echo $di[26]; ?></td></tr>
<tr><th>About Me</th><td><?php echo $di[27]; ?></td></tr>
<?php } ?>
</table>

        </div>
    </div>
</div>
</div>

</body>
</html>