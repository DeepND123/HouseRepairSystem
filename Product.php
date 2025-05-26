<?php

// Check if email is passed in the URL
if (isset($_GET['email'])) {
    $email = $_GET['email']; // Get the email from URL
} else {
    $email = ''; // Default to empty if not set
}

// Database connection
$conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Use prepared statement to fetch image data from the database based on seller email
$stmt = $conn->prepare("SELECT id, name, path, Names, price, stock, Seller_Email FROM images WHERE Seller_Email = ?");
$stmt->bind_param("s", $email);  // Bind the email parameter (string type)
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Close the statement after use
$stmt->close();

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--link css file-->
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
        gap: 20px;
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

 <div class="row" style="margin-top:10px; margin-bottom: 10px;">
    <div class="col-sm-12" style="text-align: left; margin-bottom:20px; font-size:25px;color: #4e4e4e;font-weight: bold;">Products</div>
  </div>

  <div class="card">
    <div class="card-header">
      <h5 class="card-title"></h5>
    </div>

    <div class="card-body" style="height: 100%;"> 
      <div class="gallery">
        
        <?php

        echo '<div class="gallery-item">';
               echo '</div>';

         echo '<table class="table">';
               echo ' <thead class="thead-dark">';
                 echo ' <tr>';
                  echo '  <th style="width:18%"; scope="col">Product</th>';
                  echo '  <th style="width:37%"; scope="col">Product Name</th>';
                  echo '  <th style="width:15%"; scope="col">Price</th>';
                  echo '  <th style="width:10%"; scope="col">Stock</th>';
                  echo '  <th style="width:20%"; scope="col"></th>';
                echo '  </tr>';

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          
              echo '  </thead>';
              echo '  <tbody>';
                echo '  <tr>';
                  echo '  <th scope="row"><img src="' . htmlspecialchars($row['path']) . '" alt="' . htmlspecialchars($row['Names']) . '"></th>';
                  echo '  <td><p class="image-name">' . htmlspecialchars($row['Names']) . '</p></td>';
                  echo '  <td><p class="image-name">Rs.' . htmlspecialchars($row['price']) . '</td>';
                  echo '  <td><p class="image-name">' . htmlspecialchars($row['stock']) . '</td>';
                  echo '  <td>
                              <div class="dropdown">
                                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                      Actions
                                  </button>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <li><a class="dropdown-item" href="edit_product.php?id=' . htmlspecialchars($row['id']) . '">Edit</a></li>
                                      <li><a class="dropdown-item" href="delete_product.php?id=' . htmlspecialchars($row['id']) . '" onclick="return confirm(\'Are you sure you want to delete this product?\');">Delete</a></li>
                                  </ul>
                              </div>
                          </td>';

                 echo ' </tr>';

            }
        } else {
            echo "<p>No product listed yet.</p>";
        }
         echo ' </tbody>';
              echo '</table>';
        ?>
      </div>
    </div>
  </div>

</body>
</html>

<?php
// Close the connection after script ends
$conn->close();
?>
