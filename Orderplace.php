<?php $quantity = isset($_GET['quantity']) ? intval($_GET['quantity']) : 1; ?>


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

        



} else {
    echo "Invalid request!";
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
            height: auto;
            border-radius: 5px;
        }
        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }
    
       
     
        .btn-buy {
            background-color: #DF6D14;
            width: 300px;
            height: 40px;
            align-self: center;
            color: white;
        }
        .btn-buy:hover{
            color: #DF6D14;
            border-color: #DF6D14;
            background-color: white;
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
            font-size: 15px;
        }
       

          .address-card {
            margin: auto;
            height: auto;
            width: 100%;
            text-align: left;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
    }



    </style>


	
</head>


<body class="container-fluid">

  <div id="header">
    <p style="text-align: center; color: black; background-color: #FFE6A5 ; height: 30px; margin: 0 ; padding: 0;"> Need to be a Pro <a class="text-secondary" href="ProCenter.html"> click here</a>
    <button id="headerClose" style = "float: right; background-color: #FFE6A5; border-color:#FFE6A5 ;"> X </button>
    </p>
</div>
  

<?php

// Include the navbar and pass the login information
include 'navbarNew.php'; 
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


<!------------------------------------------------------------------------------------------------------------------------------------------->

        
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-1"></div>

        <div class="col-sm-7">
        <div class="address-card">
            <p style="font-size :17px;font-weight: bold;">Product Details</p>

             <div style="padding-left: 50px;">
               <table>
                <tr>
                    <td style="width :10%">
                         <img class="product-image" src="<?php echo htmlspecialchars($product['path']); ?>" alt="<?php echo htmlspecialchars($product['Names']); ?>">
                    </td>

                    <td style="width :55%;padding-left: 50px;">
                         <p><?php echo htmlspecialchars($product['Names']); ?></p>
                    </td>
                       
                    <td style="width :20%">
                         <p class="product-price">Rs. <?php echo htmlspecialchars($product['price']); ?>.00</p>
                    </td>

                    <td style="width :15%">

                         <?php echo "<p> Qty : ". htmlspecialchars($quantity) . "</p>"; ?> 
                    </td>
                </tr>
              </table>
          </div>


            <br>
            <p style="font-size :17px;font-weight: bold;">Shipping & Billing</p>

                    <div style="padding-left: 50px;">
            
                         <p><?php echo htmlspecialchars($user['Name']); ?></p>
                         <?php $full_address = htmlspecialchars($user['Address_Line1']) . ', ' . 
                                    htmlspecialchars($user['City']) . ', ' . 
                                    htmlspecialchars($user['State']) . ', ' . 
                                    htmlspecialchars($user['Zip_Code']);?>
                                    <p><?php echo $full_address; ?></p>
                         <p> <?php echo htmlspecialchars($user['Mobile_number']); ?></p> 
                    </div>
            <hr>
             
             <p>Sold By <?php echo htmlspecialchars($seller['Seller_Name']); ?></p>
                         
                         

        </div>
        </div>

        <div class="col-sm-3">
        <div class="address-card">
            
            <p style="font-size :17px;font-weight: bold;">Order Summery</p>

            <table style="width:100%">
               <tr>
                <td><p>Item Total</p></td>
                <td style="text-align : right">
                                <?php
                                $quantity = isset($_GET['quantity']) ? intval($_GET['quantity']) : 1;
                                $price = isset($product['price']) ? floatval($product['price']) : 0; // Ensure price is numeric
                                $total_price = $quantity * $price; // Calculate total price
                                ?>
                                <p><strong>Rs. <?php echo number_format($total_price, 2); ?></strong></p></td>
               </tr>
                <tr>
                <td><p>Delivary fee </p></td>
                <td style="text-align : right"><p style="font-weight: bold">Rs. <?php echo htmlspecialchars($product['curier_chrges']); ?>.00</p></td>
               </tr>
              </tr>
          </table>
            <hr>
          <table style="width :100%">
              <tr>
                <td><p>Total </p></td>
                <td style="text-align : right">
                    <?php 
                    $delivary_fee = isset($product['curier_chrges']) ? floatval($product['curier_chrges']) : 0;
                    $net_price = $total_price + $delivary_fee ; ?>
                    <p><strong>Rs. <?php echo number_format($net_price); ?>.00</strong></p>
               </tr>
              </tr>
            </table>

            <!---updating product quantity---->

                                <?php
                                $order_qty = isset($_GET['quantity']) ? intval($_GET['quantity']) : 1;
                                $stock = isset($product['stock']) ? floatval($product['stock']) : 0; // Ensure price is numeric
                                $new_stock = $stock - $order_qty; // Calculate total price
                                ?>
                             



             <form action="Placeorder.php" method="POST">
                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
                <input type="hidden" name="quantity" value="<?php echo htmlspecialchars($quantity); ?>">
                <input type="hidden" name="total_price" value="<?php echo htmlspecialchars($net_price); ?>">
                <input type="hidden" name="address" value="<?php echo htmlspecialchars($full_address); ?>">
                <input type="hidden" name="buyer_email" value="<?php echo htmlspecialchars($user['Email_Address']); ?>"> 
                <input type="hidden" name="buyer_name" value="<?php echo htmlspecialchars($user['Name']); ?>"> 
                <input type="hidden" name="buyer_mobile" value="<?php echo htmlspecialchars($user['Mobile_number']); ?>"> 
                <input type="hidden" name="price" value="<?php echo htmlspecialchars($product['price']); ?>">
                <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product['Names']); ?>">
                <input type="hidden" name="seller_email" value="<?php echo htmlspecialchars($seller['Email_Address']); ?>">
                <input type="hidden" name="seller_name" value="<?php echo htmlspecialchars($seller['Seller_Name']); ?>">
                <input type="hidden" name="new_qty" value="<?php echo htmlspecialchars($new_stock); ?>">
                <input type="hidden" name="path" value="<?php echo htmlspecialchars($product['path']); ?>">
                <input type="hidden" name="name" value="<?php echo htmlspecialchars($product['name']); ?>">


                <button type="submit" class="btn btn-buy">Place Order</button>
            </form>

            

        </div>
        </div>

        <div class="col-sm-1"></div>
    </div>
</div>


  <br>






  





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
        }
    });
});


</script>

</body>
</html>
