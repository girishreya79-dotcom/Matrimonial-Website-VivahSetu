<?php
session_start();

// Redirect to login if not logged in
if(!isset($_SESSION["xx"])) {
    header("Location: login.php");
    exit();
}

// Include sidebar
include("sidebar.php");

// Connect to database
$conn = mysqli_connect("localhost","root","", "matrimony");
if(!$conn){
    die("Database connection failed: ".mysqli_connect_error());
}

// Fetch user info safely
$email = $_SESSION["xx"];
$sqlUser = mysqli_query($conn, "SELECT * FROM userdata WHERE email='$email'");
if(!$sqlUser){
    die("Query failed: ".mysqli_error($conn));
}

$user = mysqli_fetch_array($sqlUser);
if(!$user){
    die("User not found in database.");
}

// Fetch message count
$sqlMsg = mysqli_query($conn, "SELECT COUNT(*) as total FROM chat WHERE receiver_email='$email'");
$msgCount = ($sqlMsg) ? mysqli_fetch_array($sqlMsg)['total'] : 0;

// Fetch profile completion percentage (example)
$totalFields = 28; // total fields in userdata table to complete
$filledFields = 0;
for($i=0; $i<$totalFields; $i++){
    if(!empty($user[$i])) $filledFields++;
}
$profilePercent = round(($filledFields/$totalFields)*100);
?>

<!-- Main Content -->
<div class="main-content" style="padding:30px; font-family:'Poppins',sans-serif;">

    <h2>Welcome, <?php echo htmlspecialchars($user[0]); ?>!</h2>
    <p>Here’s a quick overview of your VivahSetu dashboard.</p>

    <div style="display:flex; gap:20px; flex-wrap:wrap; margin-top:30px;">
        
        <!-- Messages -->
        <div style="flex:1 1 250px; background:#f5f5f5; padding:20px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
            <h5>Messages 📩</h5>
            <p style="font-size:28px; font-weight:bold;"><?php echo $msgCount; ?></p>
            <small>Unread messages</small>
        </div>

        <!-- Profile Completion -->
        <div style="flex:1 1 250px; background:#f5f5f5; padding:20px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
            <h5>Profile Completion ✅</h5>
            <p style="font-size:28px; font-weight:bold;"><?php echo $profilePercent; ?>%</p>
            <div style="background:#ddd; border-radius:12px; height:12px; overflow:hidden;">
                <div style="width:<?php echo $profilePercent; ?>%; background:#6a1b9a; height:12px;"></div>
            </div>
        </div>

        <!-- Placeholder for Notifications -->
        <div style="flex:1 1 250px; background:#f5f5f5; padding:20px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
            <h5>Notifications 🔔</h5>
            <p style="font-size:28px; font-weight:bold;">0</p>
            <small>No new notifications</small>
        </div>
        
    </div>

    <div style="margin-top:40px;">
        <p>Use the sidebar to navigate your dashboard and complete your profile, search for partners, and view messages.</p>
    </div>

</div>