


<!DOCTYPE html>
<html><!--lang="en" data-bs-theme="dark"-->
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

    

    <title>Get A technician</title>
    <style>
        .product-container {
            margin: auto;
            text-align: left;
            padding: 20px;
            height: auto;
            border-radius: 5px;
        }
        .product-image {
            width: 500px;
            height: 500px;
            object-fit: cover;
            border-radius: 10px;
        }
        .product-name {
            font-size: 24px;
            margin-top: 10px;
        }
        .product-price {
            font-size: 30px;
            font-weight: bold;
            color: #DF6D14;
            margin-top: 5px;
        }
        .product-info {
            text-align: left;
            margin-top: 15px;
        }
        .product-info p {
            font-size: 16px;
            margin: 5px 0;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            color: white;
            border: 1px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            width: 200px;
        }
        .btn-buy {
            background-color: #DF6D14;
            border-color: #DF6D14;
        }
        .btn-buy:hover{
            border-color: #DF6D14;
            color: #DF6D14;
        }

        .btn-cart {
            background-color: #666;
            color: white;
        }
        .btn:hover {
            opacity: 0.8;
        }
        .seller-container {
            margin: auto;
            height: auto;
            width: 100%;
            text-align: left;
            padding: 20px;
            border: 1px solid #eee;
            border-radius: 5px;
        }
        .selle-fo{
            color: gray;
            font-weight: bold;
            font-size: 15px;
        }
        .btn-chat{
            color: gray;
        }

          .description-card {
        background: white;
        padding: 15px;
        padding-left: 220px;
        border-radius: 10px;
        text-align: left;
        cursor: pointer;
        }



        #quantityForm {
        display: flex;
        align-items: center;
        gap: 10px;
        }

        .buttons {
        padding: 5px 10px;
        font-size: 18px;
        cursor: pointer;
        }

        .input {
        width: 40px;
        text-align: center;
        font-size: 16px;
        border: none;
        background: transparent;
        }
    

    </style>


    
</head>


<body class="container-fluid">

  <div id="header">
    <p style="text-align: center; color: black; background-color: #FFE6A5 ; height: 30px; margin: 0 ; padding: 0;"> Need to be a Pro <a class="text-secondary" href="ProCenter.html"> click here</a>
    <button id="headerClose" style = "float: right; background-color: #FFE6A5; border-color:#FFE6A5 ;"> X </button>
    </p>
</div>



  


<!--stat of the nav bar------------------------------------------------------------->

<?php include 'navbarNew.php'; ?> <!-- Include the navbar --------------------------->

<!--End of the navigation bar-------------------------------------------------------->
<?php


// Check if user is logged in
if (!isset($_SESSION["user_logged_in"]) || !$_SESSION["user_logged_in"]) {
    echo '<script>
            alert("You need to loging to the system!");
            setTimeout(function() {
                window.location.href = "findapro.php";
            }, 200); // 0.5-second delay
          </script>';
    exit(); // Stop further execution after the alert and redirection
}
?>

<?php
// Start the session to access session variables

// Check if the user is logged in
if (isset($_SESSION["Email_Address"])) {
    $email = $_SESSION["Email_Address"];  // Retrieve the email from session
}
    ?>



<?php
if (isset($_GET['profile_id']) && isset($_GET['tec_email'])) {
    $profile_id = $_GET['profile_id'];
    $tec_email = $_GET['tec_email'];
$conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM tec_profile where profile_id =$profile_id";
$result = $conn->query($sql);

 if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        
    } else {
        echo "Product not found!";
        exit;
    }
}

?>







<!-------------------Write the body code here------------------------------------------------------------------------------------------------>
<br>
     <div class="container-fluid">
        <div class="product-container">
         <div class="row">
             

             <div class="col-sm-5">
                  <img class="product-image" src="<?php echo htmlspecialchars($product['image_path']); ?>" alt="<?php echo htmlspecialchars($product['image_name']); ?>">
             </div>

             <div class="col-sm-6">
                  <p class="product-name"><strong><?php echo htmlspecialchars($product['workname']); ?></strong></p>
                    <p class="product-price">Rs. <?php echo htmlspecialchars($product['hourly_rate']); ?>.00
                        <?php if (!empty($product['specialRate'])): ?>
                            <span style="text-decoration: line-through; color: gray;font-size: 20px"><br>Rs. <?php echo htmlspecialchars($product['specialRate']); ?></span>
                        <?php endif; ?>
                    </p><hr>
                     <div class="product-info">
                            <p><strong>Specialization : </strong> <?php echo htmlspecialchars($product['working_area']); ?></p>
                            <p><strong>Description : </strong> <?php echo htmlspecialchars($product['description']); ?></p>
                            <p><strong>Contact Details : </strong> </p>
                            <p><strong>Contact Person : </strong> <?php echo htmlspecialchars($product['worker_name']); ?></p>
                            <p><strong>Mobile number : </strong><?php echo htmlspecialchars($product['mobilenumber']); ?>  |   <strong>Land Number : </strong><?php echo htmlspecialchars($product['landNumber']); ?></p>
                            <p><strong>Email Address : </strong> <?php echo htmlspecialchars($product['tec_email']); ?></p>
                            <hr>

                            <?php
                                
                                if (!isset($_GET['profile_id']) || !is_numeric($_GET['profile_id'])) {
                                    exit("Invalid profile ID.");
                                }
                                $profile_id = intval($_GET['profile_id']);

                                $conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $stmt = $conn->prepare("SELECT AVG(rating) AS avg_rating FROM work_reviews WHERE profile_id = ?");
                                $stmt->bind_param("i", $profile_id);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $row = $result->fetch_assoc();
                                $avg_rating = $row['avg_rating'] !== null ? round($row['avg_rating'], 1) : "No Ratings Yet";
                                $stmt->close();
                                ?>

                                <strong><p>Rating: ⭐ <?php echo $avg_rating; ?> / 5</p></strong>

                                <?php
                                // Close database connection
                                $conn->close();
                                ?>




                            

                            <p style="color:red;">**Select a date and time to make an Appoinment**</p><br>


                            <form action="makeanAppoinment.php" method="POST">
                            <!-- Updated Buy Now Button -->
                            
                                <label for="appointment"><strong>Select Date & Time:</strong></label>
                                <input class="form-control" type="datetime-local" id="appointment" name="appointment" required><br><br>
                           
                            
                                <input type="hidden" name="profile_id" value="<?php echo htmlspecialchars($product['profile_id']); ?>">
                                <input type="hidden" name="tec_email" value="<?php echo htmlspecialchars($product['tec_email']); ?>">
                                <input type="hidden" name="buyer_email" value="<?php echo ($email); ?>">

                                
                                <button type="submit" class="btn btn-buy">Make an Appoinment</button>
                            </form>


                            

                    </div>
             </div>

            

             <div class="col-sm-1"></div>
         </div>
     </div>
     </div>

<hr>



<!------------------------------------------------------------------------------------------------------------------------------------->

        
<br><br>


<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <h5>My Previous Work</h5>

        <?php
        if (isset($_GET['profile_id']) && isset($_GET['tec_email'])) {
            $profile_id = $_GET['profile_id'];
            $tec_email = $_GET['tec_email'];

            $conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM uploads WHERE tec_email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $tec_email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo '<div class="row">';  
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-2 col-sm-4 mb-3">';  
                    echo '<div style="width: 100%;">'; 
                    echo '<img class="product-image img-fluid" src="' . htmlspecialchars($row['image_path']) . '" alt="' . htmlspecialchars($row['image_name']) . '" style="width: 100%; height: auto; border-radius: 10px;">';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';  
            } else {
                echo "No previous works!";
            }

            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
    <div class="col-sm-2"></div>
</div>



<hr>

<div class="container-fluid">
        <div class="product-container">
         <div class="row">

            <p style="padding-left: 200px; font-size: 18px"><strong>Work Reviews </strong></p>

         <div class="col-sm-2"></div>

         <div class="col-sm-8">


              <?php
// Validate and sanitize profile ID
if (!isset($_GET['profile_id']) || !is_numeric($_GET['profile_id'])) {
    exit("Invalid profile ID.");
}
$profile_id = intval($_GET['profile_id']);

// Database connection
$conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get average rating securely
$stmt = $conn->prepare("SELECT AVG(rating) AS avg_rating FROM work_reviews WHERE profile_id = ?");
$stmt->bind_param("i", $profile_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$avg_rating = $row['avg_rating'] !== null ? round($row['avg_rating'], 1) : "No Ratings Yet";
$stmt->close();

// Get all reviews securely
$reviews_stmt = $conn->prepare("SELECT user_email, rating, review FROM work_reviews WHERE profile_id = ?");
$reviews_stmt->bind_param("i", $profile_id);
$reviews_stmt->execute();
$reviews = $reviews_stmt->get_result();
?>

<!-- Display average rating -->
<strong><p>Rating: ⭐ <?php echo $avg_rating; ?> / 5</p></strong>

<!-- Display reviews -->
<?php while ($review = $reviews->fetch_assoc()): ?>
    <div class="review">
        <strong><?php echo htmlspecialchars($review['user_email']); ?></strong> - ⭐ <?php echo $review['rating']; ?>/5
        <p><?php echo htmlspecialchars($review['review']); ?></p>
    </div>
<?php endwhile; ?>

<?php
// Close connection
$reviews_stmt->close();
$conn->close();
?>

        </div>

            <div class="col-sm-2"></div>
        </div></div></div>


   

    








<!----------------------------------------------------End of the middle section-------------------------------------------------------------->
<!---------------------------------------------------------- footer ------------------------------------------------------------------------->

<!-- Footer -->
<footer class="footer">
        <div class="container-fluid" style="background-color: #605678;color :white">

            <div class="row">
                <div class="col-sm-12" style="padding: 15px;"></div>
            </div>

            <div class="row">
                <!-- Company Info Section -->
                <div class="col-sm-4">
                    <h5>About Us</h5>
                    <p>We are committed to providing the best solutions for our clients to find the best technician.</p>
                </div>

                <!-- Quick Links Section -->
                <div class="col-sm-1"></div>
                <div class="col-sm-2">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a class="dropdown-item" href="Aboutus.php">About us</a></li>
                        <li><a class="dropdown-item" href="#">Repair Helper Stores</a></li>
                        <li><a class="dropdown-item" href="ProCenter.html">Be a Pro</a></li>
                        <li><a class="dropdown-item" href="Seller.html">Sell on Repair Helper</a></li>
                        <li><a class="dropdown-item" href="ms.php">Privacy Policy</a></li>
                        <li><a class="dropdown-item" href="#">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="col-sm-1"></div>

                <!-- Social Media icons -->
                <div class="col-sm-4">
                    <h5>Follow Us</h5>
                    <table style="width:50%">
                        <tr>
                            <td><a href="#"><i class="bi bi-facebook" style="font-size: 20px;color: white;"></i></a></td>
                            <td><a href="#"><i class="bi bi-twitter" style="font-size: 20px;color: white;"></i></a></td>
                            <td><a href="#"><i class="bi bi-instagram" style="font-size: 20px;color: white;"></i></a></td>
                            <td><a href="#"><i class="bi bi-linkedin" style="font-size: 20px;color: white;"></i></a></td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Divide the footer -->
            <hr class="bg-white">

            <div class="row">
                <div class="col-sm-12 text-center">
                    <p>Repair Helper. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function () {
    const decrease = document.getElementById("decrease");
    const increase = document.getElementById("increase");
    const quantity = document.getElementById("quantity");
    const errorMsg = document.getElementById("errorMsg");
    const maxStock = parseInt(document.getElementById("quantityForm").dataset.max); // Get available stock

    // If stock is 0, show error and disable the increase button
    if (maxStock === 0) {
        errorMsg.style.display = "block";
        errorMsg.textContent = "Out of stock!";
        increase.disabled = true;
        decrease.disabled = true;
        quantity.value = 0; // Set quantity to 0
        return; // Stop further execution
    }

    decrease.addEventListener("click", function () {
        let value = parseInt(quantity.value);
        if (value > 1) {
            quantity.value = value - 1;
            errorMsg.style.display = "none"; 
        }
    });

    increase.addEventListener("click", function () {
        let value = parseInt(quantity.value);
        if (value < maxStock) {
            quantity.value = value + 1;
            errorMsg.style.display = "none"; 
        } else {
            errorMsg.style.display = "block";
            errorMsg.textContent = "Not enough stock available!";
        }
    });
});



</script>

</body>
</html>