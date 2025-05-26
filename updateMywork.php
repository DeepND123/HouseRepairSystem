
 <?php

    session_start();

    // Check if user is logged in
    if (!isset($_SESSION["user_logged_in"]) || !$_SESSION["user_logged_in"]) {
        header("Location: index.php"); // Redirect to login page if not logged in
        exit();
    }

    // Get the logged-in email
    $email = $_SESSION["email"];
    $conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch user details from the database
    $sql = "SELECT * FROM technician WHERE email = '$email'";
    $result = $conn->query($sql);

    // Fetch data if the user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();  // Fetch the data from the result
        $email = $row['email']; 
        $city = $row['city'];
        $name = $row['full_name'];
        $mobile_number = $row['phone_number'];
    }
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
    .upload-container {
      display: inline-block;
      width: 100px; /* Adjust size */
      height: 100px;
      border: 2px dashed #ddd; /* Dashed border */
      border-radius: 8px; /* Rounded corners */
      text-align: center;
      line-height: 100px; /* Vertically center the content */
      font-size: 24px; /* Size of the "+" icon */
      color: #888; /* Light gray color */
      cursor: pointer;
      background-color: #f9f9f9; /* Slightly off-white background */
      position: relative;
    }

    .upload-container input[type="file"] {
      opacity: 0;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      cursor: pointer;
    }

    .upload-preview {
      display: flex;
      gap: 10px; /* Space between previews */
      margin-top: 10px;
    }

    .upload-preview img {
      width: 80px; /* Thumbnail size */
      height: 80px;
      object-fit: cover;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

     .custom-button {
      background-color: black;
      border-color: black;
      color: white;
      font-weight: bold;
      padding: 15px 30px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 10px 2px;
      cursor: pointer;
      border-radius: 5px;
       }

       .custom-button:hover {
        background-color: white;
        color: black;
       }

       .custom-sub {
      background-color: white;
      border-color: black;
      color: black;
      font-weight: bold;
      padding: 15px 30px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 10px 2px;
      cursor: pointer;
      border-radius: 5px;
       }

       .custom-sub:hover {
        background-color: black;
        color: white;
       }
       .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
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
                    <a class="nav-link" href="tecprofile.php" style="font-size: 16px;color:#605678;padding-left: 100px;">Add A new Work</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="font-size: 16px;color:#605678;"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="updateMywork.php" style="font-size: 16px;color:#605678;font-weight:bold;">My Work</a>
                </li>
            </ul>
            
        </div>
    </div>
</nav><br>







<?php
 $email = $_SESSION["email"];

// Database connection
$conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch works uploaded by the logged-in technician
$stmt = $conn->prepare("SELECT * FROM tec_profile WHERE tec_email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="container">
    <?php if ($result->num_rows > 0): ?>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-4">
                    <div class="card">
                        <img class="product-image" src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="<?php echo htmlspecialchars($row['image_name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['worker_name']); ?></h5>
                            <p class="card-text"><strong>Category:</strong> <?php echo htmlspecialchars($row['workname']); ?></p>
                            <p class="card-text"><strong>Price:</strong> Rs. <?php echo htmlspecialchars($row['hourly_rate']); ?></p>
                            <?php if (!empty($row['txtSprice'])): ?>
                                <p class="card-text"><strong>Special Price:</strong> Rs. <?php echo htmlspecialchars($row['specialRate']); ?></p>
                            <?php endif; ?>
                            <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>No works uploaded yet.</p>
    <?php endif; ?>
</div>

<?php
$stmt->close();
$conn->close();
?>













<br><br><br>
   
</body>
</html>
