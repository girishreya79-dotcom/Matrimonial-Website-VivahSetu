<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mobile Shop - Bootstrap Grid</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  .carousel-item {
    height: 80vh;
    background: transparent; /* no black bars */
  }
  .carousel-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;   /* fills screen */
    object-position: center;
  }
.profile-slider .carousel-item {
  height:700px;                 /* not full screen */
  display: flex;
  align-items: center;
  justify-content: center;
  background: #f5f5f5;           /* light background instead of black */
}

.profile-slider .carousel-item img {
  max-width: 100%;
  max-height: 100%;
  
  object-fit: contain;           /* show full photo */
}

</style>

</head>
<body>
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-danger p-0">
  <div class="container-fluid">
<a class="navbar-brand text-light" href="#">VivahSetu🤍 </a>
    <button class="navbar-toggler" type="button text-dark" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.html">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="adminlogin.html">Admin</a>
        </li>


         <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle text-light" href="service.html" role="button" data-bs-toggle="dropdown" aria-expanded="false">Service</a>
     <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="service.html">Features</a></li>

    <li><a class="dropdown-item" href="#">Membership Options</a></li>
    <li><a class="dropdown-item" href="#">VivahSetu Premier</a></li>
    </ul>
</li>

        <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Explore
    
  </a>
  <ul class="dropdown-menu text-dark">
    <li><a class="dropdown-item" href="privacy.html">Privacy policy</a></li>
    <li><a class="dropdown-item" href="terms.html">Terms of use</a></li>
      </ul>
</li>
</ul>
              <div class="d-flex align-items-center gap-2">

        
        <a href="loginform.html" class="btn text-light btn-outline-secondary btn-sm">Log-in</a>
        <a href="register.html" class="btn text-light btn-outline-secondary btn-sm">Register</a>

      </div>
    </div>
  </div>
</nav>

<body>
<div class="container-center py-5">
<div class="hero" style="display:flex; justify-content:center; align-items:center; flex-direction:column; min-height:150px;">

        <?php
        $yy = $_SESSION["xx"];
        echo"Welcome " . $yy;
        ?>
      
  <div class="mb-4 text-center">
        <h3 class="text">Admin Dashboard</h3>
        <h5 class="text-muted">
            Manage Users profile,search profiles& message
          </h5>
  </div>

  
  <div class="row g-2 justify-content-center">
    
      <div class="col-md-5">
       <div class="shadow p-4 mb-4 bg-body-tertiary rounded">
        <div class="card text-center h-70">
          <div class="card-body">
          <h5 class="card-title">Total Users:150</h5>
          <p class="card-text">
            All users registered on the platform
          </p>
           <a href="viewuser.php" class="btn btn-primary" type="button">ViewUsers</a>
        </div>
    </div>
    </div>
    </div>
    <div class="col-md-5">
     <div class="shadow p-4 mb-4 bg-body-tertiary rounded">
      <div class="card text-center h-70">
        <div class="card-body">
          <h5 class="card-title">Pending Users:10</h5>
          <p class="card-text">Profiles waiting for admin approval</p>
          <a href="viewuser.html" class="btn btn-primary" type="button">ReviewNow</a>
        </div>
      </div>
    </div>
    </div>
   
      <div class="col-md-5">
     <div class="shadow p-4 mb-4 bg-body-tertiary rounded">
      <div class="card text-center h-70">
        <div class="card-body">
          <h5 class="card-title">Blocked Users:15</h5>
          <p class="card-text">Users who are not allowed to access</p>
        </div>
      </div>
    </div>
    </div>

      <div class="col-md-5">
     <div class="shadow p-4 mb-4 bg-body-tertiary rounded">
      <div class="card text-center h-70">
        <div class="card-body">
          <h5 class="card-title">Active Users:135</h5>
          <p class="card-text">Members who can use the platform</p>
       </div>
     </div>
    </div>
   </div>
      
  
</div>
</div>
</body>
</html>