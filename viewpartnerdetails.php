<!DOCTYPE html>
<html>
<head>
    <title>View Profile</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .profile-card {
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.08);
        }

        .profile-img {
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .table th {
            width: 30%;
            font-weight: 600;
            background-color: #f8f9fa; /* light grey only */
        }

        .table td {
            background-color: #ffffff;
        }

        .table tr {
            border-bottom: 1px solid #dee2e6;
        }

        .btn {
            padding: 6px 20px;
        }
    </style>
</head>

<body>

<?php
$conn = mysqli_connect("localhost","root","","matrimony");

if(isset($_GET['email'])) {
    $email = mysqli_real_escape_string($conn, $_GET['email']);
    $sql = mysqli_query($conn,"SELECT * FROM userdata WHERE email='$email'");
    $di = mysqli_fetch_assoc($sql);
}
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="profile-card">

                <?php if(!empty($di)) { ?>

                <div class="text-center">
                    <img src="<?php echo $di['uploadphoto']; ?>" 
                         width="140" height="140" 
                         class="profile-img">
                    <h4><?php echo $di['fullname']; ?></h4>
                    <p class="text-muted"><?php echo $di['email']; ?></p>
                </div>

                <hr>

                <table class="table">

                    <tr><th>Age</th><td><?php echo $di['age']; ?></td></tr>
                    <tr><th>Contact</th><td><?php echo $di['contact']; ?></td></tr>
                    <tr><th>Address</th><td><?php echo $di['address']; ?></td></tr>
                    <tr><th>City</th><td><?php echo $di['city']; ?></td></tr>
                    <tr><th>State</th><td><?php echo $di['state']; ?></td></tr>
                    <tr><th>Gender</th><td><?php echo $di['gender']; ?></td></tr>
                    <tr><th>DOB</th><td><?php echo $di['dob']; ?></td></tr>
                    <tr><th>highestqualification</th><td><?php echo $di['highestqualification']; ?></td></tr>
                    <tr><th>Occupation</th><td><?php echo $di['occupation']; ?></td></tr>
                    <tr><th>Income</th><td><?php echo $di['income']; ?></td></tr>
                    <tr><th>Marital Status</th><td><?php echo $di['maritalstatus']; ?></td></tr>
                    <tr><th>Height</th><td><?php echo $di['height']; ?></td></tr>
                    <tr><th>Weight</th><td><?php echo $di['weight']; ?></td></tr>
                    <tr><th>Hobbies</th><td><?php echo $di['hobbies']; ?></td></tr>
                    <tr><th>About Me</th><td><?php echo $di['aboutme']; ?></td></tr>

                </table>

                <div class="text-center mt-3">
                    <a href="approve.php?email=<?php echo $di['email']; ?>" 
                       class="btn btn-success me-2">Approve</a>

                    <a href="reject.php?email=<?php echo $di['email']; ?>" 
                       class="btn btn-danger">Reject</a>
                </div>

                <?php } else { ?>
                    <div class="alert alert-danger text-center">
                        User not found
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>

</body>
</html>
