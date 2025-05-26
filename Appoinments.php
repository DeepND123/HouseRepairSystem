<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION["user_logged_in"]) || !$_SESSION["user_logged_in"]) {

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
    
     <link rel="stylesheet" href="RH-Style.css">



  <script type="text/javascript" src="jquery-3.7.1.js"></script>
    <!-- Link jQuery file -->
    <script src="RH-scripts.js"></script>

  <link rel="stylesheet" type="text/css" href="bootsrap/css/bootstrap.min.css">
  <script type="text/javascript" src="bootsrap/js/bootstrap.min.js"></script>

  <!--fevicon-->
  <link rel="icon" type="image/x-icon" href="Source/fevi.png">

  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
       
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
                    <a class="nav-link" href="#" style="font-size: 19px;color:#fff;">User Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="font-size: 19px;color:#fff;">Account Setting</a>
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
                    <a class="nav-link" href="" style="font-size: 16px;color:#605678;padding-left: 100px; font-weight:bold;">My Appoinments</a>
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
</nav><br>




<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
       <?php


    // Database connection
    $conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Secure Query with Prepared Statement
    $stmt = $conn->prepare("SELECT * FROM tec_appoinment WHERE tec_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

?>

<div class="gallery-item"></div>

<table class="table">
    <thead>
        <tr>
            <th style="width:20%;" scope="col">Appointment Number</th>
            <th style="width:50%;" scope="col">Customer Details</th>
            <th style="width:20%;" scope="col">Appointment Date</th>
            <th style="width:10%;" scope="col">Status</th>
        </tr>
    </thead>
    <tbody>

    <?php
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $appoinment_id = $row['appoinment_id'];
            $user_email = $row['user_emali']; // Fixed typo

            // Fetch user details
            $stmt2 = $conn->prepare("SELECT * FROM userdetails WHERE Email_Address = ?");
            $stmt2->bind_param("s", $user_email);
            $stmt2->execute();
            $userResult = $stmt2->get_result();
            $user = $userResult->fetch_assoc();

            // Assign user details
            $Name = $user['Name'] ?? "Unknown";
            $Address_Line1 = $user['Address_Line1'] ?? "N/A";

            echo '<tr>';
            echo '<td><p><strong>' . htmlspecialchars($appoinment_id) . '</strong></p></td>';

            echo '<td>';
            echo '<p><strong>Name :</strong> ' . htmlspecialchars($Name) . '</p>';
            echo '<p><strong>Address :</strong> ' . htmlspecialchars($Address_Line1) . '</p>';
            echo '<p><strong>Mobile Number :</strong> ' . htmlspecialchars($user['Mobile_number']) . '</p>';
            echo '<p><strong>Created Time :</strong> ' . htmlspecialchars($row['created_time']) . '</p>';
            echo '</td>';

            echo '<td><p>' . htmlspecialchars($row['appoinment_date']) . '</p></td>';
            echo '<td><p>' . htmlspecialchars($row['status']) . '</p></td>';

            echo '<td>';
            echo '<div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Mark as
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li>
                            <a class="dropdown-item" href="AppoinmentConfirm.php?id=' . htmlspecialchars($appoinment_id) . '">Confirmed</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="Order_complete.php?id=' . htmlspecialchars($appoinment_id) . '">Reject</a>
                        </li>
                    </ul>
                  </div>';
            echo '</td>';
            echo '</tr>';

            $stmt2->close();
        }
    } else {
        echo '<p>No Appointments Yet.</p>';
    }
    ?>

    </tbody>
</table>

<?php
if (isset($stmt)) {
    $stmt->close();
}
if (isset($conn)) {
    $conn->close();
}
?>

    </div>
    <div class="col-sm-2"></div>
</div>

    </div>
    <div class="col-sm-2"></div>
</div>

