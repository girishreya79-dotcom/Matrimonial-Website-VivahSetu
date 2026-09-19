<?php
$email = $_GET['email'];                        
$conn = mysqli_connect("localhost","root","","matrimony");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }
$sql = mysqli_query($conn,"SELECT * FROM userdata WHERE email='$email'");
$di = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f0f2f5;
            font-family: 'Segoe UI', sans-serif;
        }

        .profile-container {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .profile-header {
            background: #4e73df;
            color: #fff;
            padding: 30px;
            border-radius: 15px 15px 0 0;
            display: flex;
            align-items: center;
            gap: 30px;
            position: relative; /* For button positioning */
        }

        .profile-header img {
            width: 140px;
            height: 180px;
            object-fit: cover;
            border-radius: 12px; /* rectangular photo */
            border: 3px solid #fff;
        }

        .profile-header h2 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
        }

        .profile-header p {
            margin: 0;
            font-size: 16px;
            opacity: 0.85;
        }

        /* Chat Button */
        .chat-btn {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: #6c5ce7;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: 0.3s;
        }
        .chat-btn:hover {
            background: #341f97;
            color: #fff;
        }

        .profile-section {
            background: #fff;
            padding: 25px;
            border-radius: 0 0 15px 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
        }

        .profile-card {
            padding: 15px;
            border-radius: 12px;
            background: #f8f9fc;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.03);
        }

        .profile-card h5 {
            font-weight: 600;
            margin-bottom: 10px;
            color: #4e73df;
        }

        .profile-card p {
            margin: 0;
            color: #555;
        }

        @media(max-width:768px) {
            .profile-header {
                flex-direction: column;
                text-align: center;
            }

            .profile-header img {
                margin-bottom: 15px;
            }

            .chat-btn {
                position: static;
                transform: none;
                margin-top: 15px;
            }
        }
    </style>
</head>
<body>

<div class="container profile-container">

    <!-- Profile Header -->
    <div class="profile-header">
        <img src="<?php echo $di[10]; ?>" alt="User Photo">
        <div>
            <h2><?php echo $di[0]; ?></h2>
            <p><?php echo $di[1]; ?></p>
        </div>
        <!-- Chat Button -->
        <a href="chat2.php?receiver_email=<?php echo $di[1]; ?>" class="chat-btn">💬 Chat Now</a>
    </div>

    <!-- Profile Details -->
    <div class="profile-section">
        <div class="row">
            <!-- Personal Info -->
            <div class="col-md-6">
                <div class="profile-card">
                    <h5>Personal Information</h5>
                    <p><strong>Age:</strong> <?php echo $di[3]; ?></p>
                    <p><strong>Gender:</strong> <?php echo $di[8]; ?></p>
                    <p><strong>Date of Birth:</strong> <?php echo $di[9]; ?></p>
                    <p><strong>Contact:</strong> <?php echo $di[4]; ?></p>
                    <p><strong>Address:</strong> <?php echo $di[5]; ?>, <?php echo $di[6]; ?>, <?php echo $di[7]; ?></p>
                </div>
            </div>

            <!-- Family & Background -->
            <div class="col-md-6">
                <div class="profile-card">
                    <h5>Family & Background</h5>
                    <p><strong>Father:</strong> <?php echo $di[11]; ?></p>
                    <p><strong>Mother:</strong> <?php echo $di[12]; ?></p>
                    <p><strong>Income:</strong> <?php echo $di[13]; ?></p>
                    <p><strong>Caste:</strong> <?php echo $di[14]; ?></p>
                    <p><strong>Marital Status:</strong> <?php echo $di[18]; ?></p>
                </div>
            </div>

            <!-- Education & Occupation -->
            <div class="col-md-6">
                <div class="profile-card">
                    <h5>Education & Occupation</h5>
                    <p><strong>Qualification:</strong> <?php echo $di[15]; ?></p>
                    <p><strong>Occupation:</strong> <?php echo $di[16]; ?></p>
                    <p><strong>Known Languages:</strong> <?php echo $di[19]; ?></p>
                    <p><strong>Blood Group:</strong> <?php echo $di[20]; ?></p>
                </div>
            </div>

            <!-- Physical Attributes & Lifestyle -->
            <div class="col-md-6">
                <div class="profile-card">
                    <h5>Physical & Lifestyle</h5>
                    <p><strong>Height:</strong> <?php echo $di[21]; ?></p>
                    <p><strong>Weight:</strong> <?php echo $di[22]; ?></p>
                    <p><strong>Complexion:</strong> <?php echo $di[17]; ?></p>
                    <p><strong>Diet:</strong> <?php echo $di[23]; ?></p>
                    <p><strong>Smoking:</strong> <?php echo $di[24]; ?>, <strong>Drinking:</strong> <?php echo $di[25]; ?></p>
                    <p><strong>Hobbies:</strong> <?php echo $di[26]; ?></p>
                </div>
            </div>

            <!-- About Me -->
            <div class="col-md-12">
                <div class="profile-card">
                    <h5>About Me</h5>
                    <p><?php echo $di[27]; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>