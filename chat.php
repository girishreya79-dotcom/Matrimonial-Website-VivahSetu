<?php
// Start the session if you want to track users
session_start();

// Collect POST data safely
$t1 = $_POST['nm1'] ?? '';
$t2 = $_POST['nm2'] ?? '';
$t3 = $_POST['nm3'] ?? '';
$t4 = $_POST['nm4'] ?? '';
$t5 = $_POST['nm5'] ?? '';

// Connect to database
$conn = mysqli_connect("localhost","root","","message");
if(!$conn){
    die("Database connection failed: " . mysqli_connect_error());
}

// Insert the message
$query = "INSERT INTO chat(sender_email, receiver_email, subject, date, message) 
          VALUES('$t1','$t2','$t3','$t4','$t5')";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Message Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .status-card {
            background: #fff;
            padding: 40px 30px;
            border-radius: 16px;
            box-shadow: 0 12px 25px rgba(0,0,0,0.15);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        .status-card h2 {
            color: #4e73df;
            margin-bottom: 20px;
        }

        .status-card p {
            color: #555;
            margin-bottom: 25px;
        }

        .btn-home {
            background: linear-gradient(135deg, #4e73df, #6c5ce7);
            color: #fff;
            font-weight: 500;
            border-radius: 12px;
            padding: 10px 25px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-home:hover {
            background: linear-gradient(135deg, #3b5bdb, #4834d4);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            color: #fff;
        }
    </style>
</head>
<body>

<div class="status-card">
    <?php if($result): ?>
        <h2>✅ Message Sent Successfully!</h2>
        <p>Your message has been delivered to <strong><?php echo htmlspecialchars($t2); ?></strong>.</p>
    <?php else: ?>
        <h2>❌ Failed to Send Message</h2>
        <p>There was an error sending your message. Please try again.</p>
        <p class="text-danger"><?php echo mysqli_error($conn); ?></p>
    <?php endif; ?>

    <a href="viewreply.php" class="btn-home">Go Back to Messages</a>
</div>

</body>
</html>

<?php
// Close the connection
mysqli_close($conn);
?>