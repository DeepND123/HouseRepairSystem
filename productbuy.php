<?php
// Database connection
$conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get product ID from URL
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    // Fetch product details
    $stmt = $conn->prepare("SELECT name, path, Names, catogory, brand, numberof_piese, material, model, price, special_price, stock, sellerSKU, freeItem, product_description, weight, length, width, height, curier_chrges, warrenty, Seller_Email FROM images WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        $seller_email = $product['Seller_Email']; // Get seller email
    } else {
        echo "Product not found!";
        exit;
    }
    $stmt->close();

    // Fetch seller data from the sellerdetails table using the seller's email
    $stmt = $conn->prepare("SELECT Email_Address, Seller_Name, Password, Full_Name, Address, City, State, Zip_Code FROM sellerdetails WHERE Email_Address = ?");
    $stmt->bind_param("s", $seller_email); // Use the seller's email to query
    $stmt->execute();
    $seller_result = $stmt->get_result();

    if ($seller_result->num_rows > 0) {
        $seller = $seller_result->fetch_assoc(); // Fetch seller data
    } else {
        echo "Seller details not found!";
        header("Location: 404Error.html");
        exit;
    }
    $stmt->close();




    // Fetch product from the seller table using the seller's email
    $stmt = $conn->prepare("SELECT Email_Address, Seller_Name, Password, Full_Name, Address, City, State, Zip_Code FROM sellerdetails WHERE Email_Address = ?");
    $stmt->bind_param("s", $seller_email); // Use the seller's email to query
    $stmt->execute();
    $seller_result = $stmt->get_result();

    if ($seller_result->num_rows > 0) {
        $seller = $seller_result->fetch_assoc(); // Fetch seller data
    } else {
        echo "Seller details not found!";
        exit;
    }
    $stmt->close();
        



} else {
    echo "<script>
    alert('Product added to cart successfully');
    setTimeout(function() {
        window.location.href = 'Supplies.php';
    }, 200); // 200 milliseconds = 2 seconds
    </script>";

    exit;
}

$conn->close();
?>





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

    

    <title><?php echo htmlspecialchars($product['Names']); ?></title>
    <style>
        .product-container {
            margin: auto;
            text-align: left;
            padding: 20px;
            height: auto;
            border-radius: 5px;
        }
        .product-image {
            width: 100%;
            height: 100%;
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


<!--------------chech whether user loging or not---------------->
<?php
if (!isset($_SESSION["user_logged_in"]) || !$_SESSION["user_logged_in"]) {
    echo '<script>
            alert("You need to login to the system!");
            setTimeout(function() {
                window.location.href = "Supplies.php";
            }, 500); // 0.5-second delay
          </script>';
    exit(); // Stop further execution after the alert and redirection
}
?>

<?php
// Start the session to access session variables

// Check if the user is logged in
if (isset($_SESSION["Email_Address"])) {
    $email = $_SESSION["Email_Address"];  // Retrieve the email from session

    // Connect to the database
    $con = mysqli_connect("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper");

    // Check if the connection was successful
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Select the database
    mysqli_select_db($con, "repair_helper");

    // Fetch the user details from the database
    $sql = "SELECT * FROM userdetails WHERE Email_Address = '$email'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the user details from the query result
        $user = mysqli_fetch_assoc($result);

        
    } else {
        echo "No user found with this email.";
    }

    // Close the database connection
    mysqli_close($con);
} else {
    $email = "Guest";  // Default value if the user is not logged in
    echo "Welcome, " . htmlspecialchars($email);
}
?>
<br>

<!-------------------Write the body code here------------------------------------------------------------------------------------------------>
<br>
     <div class="container-fluid">
        <div class="product-container">
         <div class="row">
             <div class="col-sm-1"></div>

             <div class="col-sm-3">
                  <img class="product-image" src="<?php echo htmlspecialchars($product['path']); ?>" alt="<?php echo htmlspecialchars($product['Names']); ?>">
             </div>

             <div class="col-sm-4">
                  <p class="product-name"><strong><?php echo htmlspecialchars($product['Names']); ?></strong></p>
                    <p class="product-price">Rs. <?php echo htmlspecialchars($product['price']); ?>.00
                        <?php if (!empty($product['special_price'])): ?>
                            <span style="text-decoration: line-through; color: gray;font-size: 20px"><br>Rs. <?php echo htmlspecialchars($product['special_price']); ?></span>
                        <?php endif; ?>
                    </p><hr>
                     <div class="product-info">
                            <p><strong>Brand:</strong> <?php echo htmlspecialchars($product['brand']); ?></p>
                            <p><strong>Category:</strong> <?php echo htmlspecialchars($product['catogory']); ?></p>
                            <p><strong>Stock:</strong> <?php echo htmlspecialchars($product['stock']); ?> available</p>
                            <hr>
                            <?php
                                // Validate and sanitize product ID
                                if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
                                    exit("Invalid product ID");
                                }
                                $product_id = intval($_GET['id']);

                                // Database connection
                                $conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");

                                // Check connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // Get average rating
                                $query = "SELECT AVG(rating) AS avg_rating FROM product_reviews WHERE product_id = ?";
                                $stmt = $conn->prepare($query);
                                $stmt->bind_param("i", $product_id);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $row = $result->fetch_assoc();
                                $avg_rating = $row['avg_rating'] !== null ? round($row['avg_rating'], 1) : "No Ratings Yet";

                                // Display rating
                                echo "<strong><p>Rating: ⭐ $avg_rating / 5</p></strong>";

                                // Get all reviews
                                $reviews_query = "SELECT * FROM product_reviews WHERE product_id = ?";
                                $reviews_stmt = $conn->prepare($reviews_query);
                                $reviews_stmt->bind_param("i", $product_id);
                                $reviews_stmt->execute();
                                $reviews_result = $reviews_stmt->get_result();

                                

                                // Close connection
                                $conn->close();
                                ?>


                                
                                <hr>
                    

                           <p><strong>Quantity</strong> 
                                <form id="quantityForm" data-max="<?php echo htmlspecialchars($product['stock']); ?>">
                                    <button type="button" id="decrease">-</button>
                                    <input type="text" id="quantity" value="1" readonly>
                                    <button type="button" id="increase">+</button>
                                </form>
                                <p id="errorMsg" style="color: red; display: none;">Not enough stock available!</p>
                            </p>





                            <form action="AddtoCart.php" method="POST">
                            <!-- Updated Buy Now Button -->
                            <a href="#" class="btn btn-buy" data-id="<?php echo $product_id; ?>">Buy Now</a>

                           
                            
                                <input type="hidden" name="quantity" id="cartQuantity">
                                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
                                <input type="hidden" name="buyer_email" value="<?php echo htmlspecialchars($user['Email_Address']); ?>">
                                <input type="hidden" name="price" value="<?php echo htmlspecialchars($product['price']); ?>">
                                <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product['Names']); ?>">
                                <input type="hidden" name="seller_email" value="<?php echo htmlspecialchars($seller['Email_Address']); ?>">
                                <input type="hidden" name="seller_name" value="<?php echo htmlspecialchars($seller['Seller_Name']); ?>">
                                <input type="hidden" name="path" value="<?php echo htmlspecialchars($product['path']); ?>">
                                <input type="hidden" name="name" value="<?php echo htmlspecialchars($product['name']); ?>">

                                <button type="submit" class="btn btn-cart">Add To Cart</button>
                            </form>


                             <script>
                                document.querySelectorAll(".btn-buy").forEach(button => {
                                    button.addEventListener("click", function(event) {
                                        event.preventDefault(); // Prevent default link behavior
                                        
                                        let productId = this.getAttribute("data-id");
                                        let quantityInput = document.getElementById("quantity");
                                        
                                        let quantity = quantityInput ? quantityInput.value : 1;

                                        window.location.href = `Orderplace.php?id=${productId}&quantity=${quantity}`;
                                    });
                                });
                            </script>


                            <script>

                                document.addEventListener("DOMContentLoaded", function () {
                                const quantityInput = document.getElementById("quantity");
                                const cartQuantityInput = document.getElementById("cartQuantity");
                                const addToCartForm = document.querySelector("form[action='AddtoCart.php']");

                                addToCartForm.addEventListener("submit", function () {
                                cartQuantityInput.value = quantityInput.value;
                                    });
                                });

                                </script>


                            

                    </div>
             </div>

             <div class="col-sm-3">
                 
                <div class="seller-container">
                    
                    <p class="selle-fo">Return & Warranty </p>
                    <p>Warranty :  <?php echo htmlspecialchars($product['warrenty']); ?> Month</p>

                </div>

               <div class="seller-container">
                        <p class="selle-fo">Sold by <?php echo htmlspecialchars($seller['Seller_Name']); ?></p>
                        
                        <!-- Add the product ID as a query parameter to the chat link -->
                       <a href="cusChat.php?id=<?php echo $product_id; ?>&email=<?php echo $email; ?>" class="btn btn-chat">Chat with Seller</a>


                        <!-- Optionally: You can add a modal or a hidden section to show the chat -->
                        <div id="chatSection" class="chat-section" style="display:none;">
                            <!-- The chat form and messages will go here -->
                            <i class="bi bi-chat-left-dots"></i>
                </div>
            </div>


             </div>

             <div class="col-sm-1"></div>
         </div>
     </div>
     </div>

<hr>


     <div class="container-fluid">
        <div class="product-container">
         <div class="row">

            <p style="padding-left: 200px; font-size: 18px"><strong>Product details of <?php echo htmlspecialchars($product['Names']); ?></strong></p>

         <div class="col-sm-2"></div>

            
             <div class="col-sm-3">

                <p><strong>Material:</strong> <?php echo htmlspecialchars($product['material']); ?></p>
                <p><strong>Weight:</strong> <?php echo htmlspecialchars($product['weight']); ?> kg</p>
                <p><strong>Size:</strong> <?php echo htmlspecialchars($product['length'] . " x " . $product['width'] . " x " . $product['height']); ?> cm</p>

            </div>
            <div class="col-sm-3">
                <p><strong>Stock:</strong> <?php echo htmlspecialchars($product['stock']); ?> available</p>
                <p><strong>SKU:</strong> <?php echo htmlspecialchars($product['sellerSKU']); ?></p>
                <p><strong>Free Item:</strong> <?php echo htmlspecialchars($product['freeItem']); ?></p>
                

             </div>
         
         <div class="col-sm-4"></div>
          </div>
        </div>
    </div>




    <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="description-card">
            <div class="col-sm-1"></div>

            <div class="col-sm-10">

                 <p style="font-size: 18px"><strong>Description</strong></p><br><p style="padding-left: 20px; font-size: 17px"> <?php echo htmlspecialchars($product['product_description']); ?></p>

            </div>

            <div class="col-sm-1"></div>
        </div>
        </div>
    </div>

<!------------------------------------------------------------------------------------------------------------------------------------->

        
<br><br>

<hr>

<div class="container-fluid">
        <div class="product-container">
         <div class="row">

            <p style="padding-left: 200px; font-size: 18px"><strong>Product Reviews </strong></p>

         <div class="col-sm-2"></div>

         <div class="col-sm-8">


              <?php
// Validate and sanitize product ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    exit("Invalid product ID.");
}
$product_id = intval($_GET['id']);

// Database connection
$conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get average rating securely
$stmt = $conn->prepare("SELECT AVG(rating) AS avg_rating FROM product_reviews WHERE product_id = ?");
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$avg_rating = $row['avg_rating'] !== null ? round($row['avg_rating'], 1) : "No Ratings Yet";
$stmt->close();

// Get all reviews securely
$reviews_stmt = $conn->prepare("SELECT buyer_email, rating, review FROM product_reviews WHERE product_id = ?");
$reviews_stmt->bind_param("i", $product_id);
$reviews_stmt->execute();
$reviews = $reviews_stmt->get_result();
?>

<!-- Display average rating -->
<strong><p>Rating: ⭐ <?php echo $avg_rating; ?> / 5</p></strong>

<!-- Display reviews -->
<?php while ($review = $reviews->fetch_assoc()): ?>
    <div class="review">
        <strong><?php echo htmlspecialchars($review['buyer_email']); ?></strong> - ⭐ <?php echo $review['rating']; ?>/5
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