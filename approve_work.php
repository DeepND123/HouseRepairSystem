<?php

if (isset($_GET['email'])) {
    $email = $_GET['email']; 
} else {
    $email = ''; 
}

// Database connection
$conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Use prepared statement to fetch image data from the database based on seller email
$stmt = $conn->prepare("SELECT * FROM tec_profile");

$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Close the statement after use
$stmt->close();
?>


<!DOCTYPE html>
<html><!--lang="en" data-bs-theme="dark"-->
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

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
    .gallery {
        display: flex;
        flex-wrap: wrap;

    }
    .gallery-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        max-width: 220px;
    }
    .gallery img {
        width: 120px;
        height: 90px;
        object-fit: cover;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .image-name {
        margin-top: 15px;
        font-size: 16px;
    }
  </style>

 
  <title>RepairHelperAddProduct</title>


  
</head>


<body class="container-fluid" style="background-color: #e1e1e1;">

 <div class="row"  style="margin-top:10px ; margin-bottom: 10px;">
   
    <div class="col-sm-12"  style="text-align: left; margin-bottom:20px; font-size:25px;color: #565656;font-weight: bold;"></div>
   
  </div>





<div class="card">
  <div class="card-header">
    <h5 class="card-title">All Works</h5>
  </div>



    <div class="card-body" style="height: 100%;"> 
      <div class="gallery">
        <?php
echo '<div class="gallery-item"></div>';

if ($result->num_rows > 0) {
    echo '<table class="table">';
    echo ' <thead >';
    echo '  <tr>';
    echo '      <th style="width:10%;" scope="col">profile_id</th>';
    echo '      <th style="width:15%;" scope="col">Work</th>';
    echo '      <th style="width:15%;" scope="col">Work Name</th>';
    echo '      <th style="width:8%;" scope="col">catogory</th>';
    echo '      <th style="width:20%;" scope="col">Technician Email</th>';
    echo '      <th style="width:12%;" scope="col">pricing</th>';
    echo '      <th scope="col">Status</th>';
    echo '  </tr>';
    echo ' </thead>';
    echo ' <tbody>';

    while ($row = $result->fetch_assoc()) {
        

        echo '<tr>';
        echo '  <td><p class="image-name">' . htmlspecialchars($row['profile_id']) . '</p></td>';
        echo '  <td><img src="' . htmlspecialchars($row['image_path']) . '" alt="' . htmlspecialchars($row['image_name']) . '" width="80"></td>';
        echo '  <td><p class="image-name">' . htmlspecialchars($row['workname']) . '</p></td>';
        echo '  <td><p class="image-name">' . htmlspecialchars($row['working_area']) . '</p></td>'; // Fixed column
        echo '  <td><p class="image-name">' . htmlspecialchars($row['tec_email']) . '</p></td>'; // Fixed column
        echo '  <td><p class="image-name">Rs.' . htmlspecialchars($row['hourly_rate']) . '.00</p></td>';
        echo '  <td><p class="image-name">' . htmlspecialchars($row['status']) . '</p></td>';
        echo '  <td>
           <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                  Marked As
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li>
                      <a class="dropdown-item" href="approvework.php?id=' . htmlspecialchars($row['profile_id']) . '">Approve</a>
                  </li>
                  <li>
                      <a class="dropdown-item" href="rejectWork.php?id=' . htmlspecialchars($row['profile_id']) . '" 
                         onclick="return confirm(\'Are you sure you want to reject this work?\');">
                         reject
                      </a>
                  </li>
              </ul>
          </div>
      </td>';

        echo '</tr>';
    }

    echo ' </tbody>';
    echo '</table>';
} else {
    echo '<p>No Orders Yet.</p>';
}
?>

      </div>

   
                     
    </div>
</div>


</body>
</html>