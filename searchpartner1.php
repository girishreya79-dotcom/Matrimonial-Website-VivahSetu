<?php
session_start();
$t1_session = isset($_SESSION["xx"]) ? $_SESSION["xx"] : "";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f3f5f9; }

        .result-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            height: 100%;
        }

        .profile-img {
            border-radius: 12px;
            border: 1px solid #ddd;
            object-fit: cover;
            width: 150px;
            height: 180px;
        }

        .profile-details {
            flex: 1;
            margin-left: 15px;
            min-width: 200px;
        }

        .name {
            font-size: 18px;
            font-weight: 600;
            color: #0d6efd;
        }

        .table td {
            padding: 3px 5px;
            font-size: 13px;
        }

        .label {
            font-weight: 500;
            color: #444;
            width: 40%;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .btn-custom {
            flex: 1;
            margin: 2px;
        }
    </style>
</head>

<body>

<div class="container mt-4 mb-5">

    <?php if($t1_session != ""): ?>
        <h4 class="text-center mb-3">
            Welcome <?php echo htmlspecialchars($t1_session); ?>
        </h4>
    <?php endif; ?>

    <div class="text-center mb-4">
        <h2 class="text-danger">Find Your Perfect Match</h2>
        <p class="text-secondary">
            Browse through profiles carefully selected according to your preferences.<br>
            Take your time to explore profiles, learn about their interests, hobbies, and lifestyle.<br>
            Connect with someone who feels right for you and start a meaningful journey today!
        </p>
    </div>

    <?php
        $t1 = isset($_POST['nm1']) ? $_POST['nm1'] : "";
        $t2 = isset($_POST['nm2']) ? $_POST['nm2'] : "";
        $t3 = isset($_POST['nm3']) ? $_POST['nm3'] : "";

        $conn = mysqli_connect("localhost","root","","matrimony");
        mysqli_select_db($conn,"matrimony");

        $sql = mysqli_query($conn,
            "SELECT * FROM userdata 
             WHERE gender='$t1' 
             OR city='$t2' 
             OR age='$t3'"
        );
    ?>

    <div class="row">

        <?php while($di = mysqli_fetch_array($sql)) { ?>

        <div class="col-md-6 mb-4">
            <div class="result-card">

                <div class="profile-img-container">
                    <img src="<?php echo $di[10]; ?>" class="profile-img">
                </div>

                <div class="profile-details">

                    <div class="text-center mb-2">
                        <div class="name"><?php echo $di[0]; ?></div>
                        <small class="text-muted"><?php echo $di[6]; ?></small>
                    </div>

                    <table class="table table-sm table-bordered">
                        <tr>
                            <td class="label">Age</td>
                            <td><?php echo $di[3]; ?></td>
                        </tr>
                        <tr>
                            <td class="label">City</td>
                            <td><?php echo $di[6]; ?></td>
                        </tr>
                        <tr>
                            <td class="label">Gender</td>
                            <td><?php echo $di[8]; ?></td>
                        </tr>
                        <tr>
                            <td class="label">DOB</td>
                            <td><?php echo $di[9]; ?></td>
                        </tr>
                        <tr>
                            <td class="label">Qualification</td>
                            <td><?php echo $di[15]; ?></td>
                        </tr>
                        <tr>
                            <td class="label">Occupation</td>
                            <td><?php echo $di[16]; ?></td>
                        </tr>
                    </table>

                    <div class="btn-container">
                        <a href="chat.html" class="btn btn-success btn-sm">
                            Send Interest ❤️
                        </a>
                     <a href="profileview.php?email=<?php echo $di['email']; ?>" 
   class="btn btn-primary btn-sm">View More→
</a>

                         
                  </div>
               </div>
            </div>
        </div>


        <?php } ?>

    </div>

</div>

</body>
</html>
