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
$stmt = $conn->prepare("SELECT * FROM product_order WHERE Seller_email = '$email'");

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
   
    <div class="col-sm-12"  style="text-align: left; margin-bottom:20px; font-size:25px;color: #565656;font-weight: bold;">Reviews</div>
   
  </div>





<div class="card">
  <div class="card-header">
    <h5 class="card-title"></h5>
    <p>Feedback on products sold by the you</p>
  </div>

  <div class="card-body" style="height:auto">

        <?php
        $email = $_GET['email']; 
        $conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");


        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT * FROM product_reviews WHERE seller_email = ?");
        $stmt->bind_param("s", $email); 
        $stmt->execute();
        $reviews = $stmt->get_result();
        ?>

        <?php while ($review = $reviews->fetch_assoc()): ?>
            <div class="review">
                <p>Product Id : <?php echo htmlspecialchars($review['product_id']); ?>  |  
                Order Id : <?php echo htmlspecialchars($review['order_id']); ?></p>
                <strong><?php echo htmlspecialchars($review['buyer_email']); ?>
                </strong> - ⭐ <?php echo $review['rating']; ?>/5
                <p><?php echo htmlspecialchars($review['review']); ?></p>
            </div>
        <?php endwhile; ?>

        <?php
        $stmt->close();
        $conn->close();
        ?>

   
                        
    </div>
</div>


    </body>
</html>