<?php
session_start();
if(!isset($_SESSION["xx"])) {
    header("Location: login.php");
    exit();
}

include("sidebar.php");

$t1 = $_SESSION["xx"];

$conn = mysqli_connect("localhost","root","","message");
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

$sql = mysqli_query($conn,"SELECT * FROM chat WHERE receiver_email='$t1' ORDER BY 3 DESC");

if(!$sql){
    die("Query Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
<title>My Messages</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #eef2f7;
    font-family: 'Segoe UI', sans-serif;
}

.main-content {
    margin-left: 260px;
    padding: 40px;
}

@media(max-width:768px){
    .main-content {
        margin-left: 0;
        padding: 20px;
    }
}

.page-title {
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 35px;
}

/* Message Card */
.msg-card {
    background: #ffffff;
    border-radius: 14px;
    padding: 25px;
    margin-bottom: 25px;
    border-left: 5px solid #2563eb;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    transition: 0.3s;
}

.msg-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.08);
}

.msg-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.sender-name {
    font-weight: 600;
    color: #111827;
}
.receiver-name {
    font-weight: 600;
    color: #111827;
}


.msg-date {
    font-size: 13px;
    color: #6b7280;
}

.msg-subject {
    font-weight: 500;
    color: #2563eb;
    margin-bottom: 10px;
}

.message-box {
    background: #f3f4f6;
    padding: 15px;
    border-radius: 10px;
    font-size: 14px;
    line-height: 1.6;
    color: #374151;
    margin-bottom: 15px;
}

.msg-actions {
    text-align: right;
}

.btn-chat {
    background-color: #2563eb;
    color: white;
    border: none;
    padding: 8px 18px;
    border-radius: 6px;
    font-size: 13px;
    transition: 0.3s;
    text-decoration: none;
}

.btn-chat:hover {
    background-color: #1e40af;
    color: white;
}

.btn-profile {
    background-color: #10b981;
    color: white;
    border: none;
    padding: 8px 18px;
    border-radius: 6px;
    font-size: 13px;
    margin-left: 8px;
    transition: 0.3s;
    text-decoration: none;
}

.btn-profile:hover {
    background-color: #047857;
    color: white;
}
</style>
</head>

<body>

<div class="main-content">
<div class="container">

<h3 class="page-title text-center">My Messages</h3>

<?php
if(mysqli_num_rows($sql) == 0) {
    echo "<div class='alert alert-warning text-center'>No messages found</div>";
}

while($di = mysqli_fetch_array($sql)) {
?>

<div class="msg-card">

    <div class="msg-header">
        <div class="sender-name">
            From: <?php echo $di[0]; ?>
        </div>
         <div class="receiver-name">
            To: <?php echo $di[1]; ?>
        </div>

        <div class="msg-date">
            <?php echo $di[3]; ?>
        </div>
    </div>

    <div class="msg-subject">
        Subject: <?php echo $di[2]; ?>
    </div>

    <div class="message-box">
        <?php echo $di[4]; ?>
    </div>

    <div class="msg-actions">

    <!-- Chat Button -->
    <a href="chat.html" class="btn-chat">
                            Send Interest ❤️
                        </a>

    <!-- View Profile Button -->
    <a href="profileview.php?email=<?php echo urlencode($di[0]); ?>" 
       class="btn-profile">
        View Profile
    </a>

</div>
</div>

<?php } ?>

</div>
</div>

</body>
</html>