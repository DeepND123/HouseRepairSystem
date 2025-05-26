<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION["user_logged_in"]) || !$_SESSION["user_logged_in"]) {
    header("Location: index.php"); // Redirect to login page if not logged in
    exit();
}

// Get the logged-in email
$email = $_SESSION["email"];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Repair Helper</title>
    
    <!-- CSS & Bootstrap -->
    <link rel="stylesheet" href="RH-Style.css">
    <link rel="stylesheet" type="text/css" href="bootsrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="Source/fevi.png">

    <!-- JavaScript -->
    <script type="text/javascript" src="jquery-3.7.1.js"></script>
    <script src="RH-scripts.js"></script>
    <script type="text/javascript" src="bootsrap/js/bootstrap.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .hero-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            height: 100vh;
        }
       .text-side {
            width: 50%;
            background: #ebe6e8;
            color: #605678;;
            padding: 60px;
            text-align: center; /* Center text horizontally */
            display: flex;
            flex-direction: column;
            justify-content: center; /* Center content vertically */
            align-items: center; /* Center items horizontally */
            height: 100vh; /* Ensure it takes full height */
}
        .text-side h1 span {
            color: yellow;
        }
        .image-side {
            width: 50%;
            height: 100vh;
            background: url('Source/Tech.jpg') center/cover no-repeat;
        }
        .btn {
            background: #ffcc00;
            color: black;
            text-transform: uppercase;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .btn:hover {
            background: whitesmoke;
            border-color: #ffcc00;
            color: #ffcc00;
        }
        .footer {
            background-color: #605678;
            color: white;
            padding: 20px 0;
        }
        .card:hover{
            border-color: #605678;
            transform: scale(1.00);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .span{
            color:#ffcc00;
        }
    </style>
</head>
<body>



<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg" style="height: 80px;background-color: #605678;color: white;">
    <div class="container-fluid">
        <!-- Brand Logo & Name -->
        <a class="navbar-brand" href="tecindex.php" style="font-family: 'LT Saeada'; font-size: 33px; color:#fff; padding-left: 20px;">
            Repair Helper
            <span style="font-size: 20px; padding-left: 10px;">Technician</span>
        </a>

        <!-- Mobile Menu Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="tecprofile.php" style="color:#fff;font-size: 19px;">Add A Work</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="tecLogout.php" style="font-size: 19px; font-weight: bold;padding-left: 50px;color:#fff;"><i class="bi bi-box-arrow-right"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>


 <nav class="navbar navbar-expand-lg navbar-light" style="height:40px;background-color: #ebe6e8;">
    <div class="container-fluid">
        <!-- Brand Logo & Name -->
        <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="tecprofile.php" style="font-size: 16px;color:#605678;padding-left: 100px; font-weight:bold;"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="font-size: 16px;color:#605678;"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="updateMywork.php" style="font-size: 16px;color:#605678;"></a>
                </li>
            </ul>
            
        </div>
    </div>
</nav>




    <!-- Hero Section -->
    <div class="container-fluid">
        <div class="row">
        <div class="text-side">
            <h1>Expand Your Reach & Schedule Appointments</h1>
            <p>You want to provide the best service to customers anytime.</p>
            <a href="Appoinments.php" class="btn">Appointment</a>
        </div>
        <div class="image-side"></div>
        </div>
    </div><br>

    <!-- Cards Section -->
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">My Appointment</h2>
                        <p class="card-text">Check customer requests and give appointments.</p>
                    </div>
                    <div class="card-footer"><center><a class="btn btn-primary btn-sm" href="Appoinments.php">More Info</a></center></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Upload Previous Works</h2>
      
                        <p class="card-text">Upload your completed previous work images.</p>
                    </div>
                    <div class="card-footer"><center><a class="btn btn-primary btn-sm" href="photoUp.php">Upload Work</a></center></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Communicate with Customers</h2>
                        <p class="card-text">Communicate with customers, learn about the work, give a quotation, and share available time.</p>
                    </div>
                    <div class="card-footer"><center><a class="btn btn-primary btn-sm" href="#">More Info</a></center></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Reviews</h2>
                        <p class="card-text">Check customer reviews and provide feedback.</p>
                    </div>
                    <div class="card-footer"><center><a class="btn btn-primary btn-sm" href="#">More Info</a></center></div>
                </div>
            </div>
        </div>
    </div>




</div>







<br><br><br>
   
</body>
</html>
