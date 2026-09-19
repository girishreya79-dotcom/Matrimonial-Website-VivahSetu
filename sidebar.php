<?php
// Assumes session already started in main page
$t1 = $_SESSION["xx"] ?? '';

$conn = mysqli_connect("localhost","root","","matrimony");
$sql = mysqli_query($conn,"SELECT * FROM userdata WHERE email='$t1'");
$user = mysqli_fetch_array($sql);

// Detect current page
$current_page = basename($_SERVER['PHP_SELF']);
?>

<style>
/* ===== Professional Sidebar ===== */
.sidebar {
    width: 260px;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #1f2937; /* deep navy gray */
    color: #f3f4f6;
    font-family: 'Segoe UI', sans-serif;
    box-shadow: 4px 0 20px rgba(0,0,0,0.08);
    padding-top: 20px;
    z-index: 1000;
}

/* Profile section */
.profile-section {
    text-align: center;
    padding: 25px 15px;
    border-bottom: 1px solid rgba(255,255,255,0.08);
    margin-bottom: 20px;
}
.profile-section img {
    width: 85px;
    height: 85px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #374151;
}
.profile-section h5 {
    margin-top: 12px;
    font-size: 15px;
    font-weight: 600;
    color: #ffffff;
}

/* Navigation links */
.nav-link {
    display: block;
    padding: 12px 22px;
    margin: 8px 15px;   /* spacing improved */
    border-radius: 8px;
    color: #d1d5db;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.25s ease;
}

.nav-link:hover {
    background-color: #374151;
    color: #ffffff;
}

/* Active link */
.nav-link.active {
    background-color: #2563eb; /* professional blue */
    color: #ffffff;
    font-weight: 600;
}

/* Main content spacing */
.main-content {
    margin-left: 260px;
    padding: 30px;
}
</style>

<div class="sidebar">

    <div class="profile-section">
        <img src="<?php echo $user[10] ?? 'default.jpg'; ?>" alt="User Photo">
        <h5><?php echo $user[0] ?? 'User'; ?></h5>
    </div>

    <a href="myprofile.php" 
       class="nav-link <?php if($current_page=='myprofile.php') echo 'active'; ?>">
       Dashboard
    </a>

    <a href="profile.php" 
       class="nav-link <?php if($current_page=='profile.php') echo 'active'; ?>">
       My Profile
    </a>

    <a href="createprofile.php" 
       class="nav-link <?php if($current_page=='createprofile.php') echo 'active'; ?>">
       Complete Profile
    </a>

    <a href="searchpartner.php" 
       class="nav-link <?php if($current_page=='searchpartner.php') echo 'active'; ?>">
       Search Partner
    </a>

    <a href="viewreply.php" 
       class="nav-link <?php if($current_page=='message.php') echo 'active'; ?>">
       Messages
    </a>

    <a href="settings.php" 
       class="nav-link <?php if($current_page=='settings.php') echo 'active'; ?>">
       Settings
    </a>

    <a href="logout.php" class="nav-link">
       Logout
    </a>

</div>