<?php
session_start();
include("sidebar.php"); // permanent sidebar
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Partner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f3f5f9; }
        .main-content { margin-left: 260px; padding: 30px; }
        @media(max-width:768px){ .main-content { margin-left:0; } }
        .shadow { box-shadow: 0 4px 12px rgba(0,0,0,0.08) !important; }
    </style>
</head>
<body>

<div class="main-content">
    <div class="container-center mt-6">
        <div class="hero" style="display: flex; justify-content: center; align-items: center; flex-direction: column; min-height: 150px;">
            <?php
            $yy = $_SESSION["xx"];
            echo "<h4>Welcome " . $yy . "</h4>";
            ?>

            <div class="shadow p-4 mb-2 bg-body-tertiary rounded mt-3" style="width: 100%; max-width: 500px;">
                <form action="searchpartner1.php" method="post">
                    <h3 class="mb-4 text-center">Find Your Partner</h3>

                    <!-- Gender -->
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <div class="form-check">
                            <input type="radio" name="nm1" class="form-check-input" value="Male" id="genderMale">
                            <label class="form-check-label" for="genderMale">Male</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="nm1" class="form-check-input" value="Female" id="genderFemale">
                            <label class="form-check-label" for="genderFemale">Female</label>
                        </div>
                    </div>

                    <!-- City -->
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="nm2" id="city" class="form-control" placeholder="Enter City">
                    </div>

                    <!-- Age -->
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" name="nm3" id="age" class="form-control" placeholder="Enter Age">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>