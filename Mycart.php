
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

    <style>

    .product-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
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
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            font-size: 12px;
            color: white;
            border: 1px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            width: 100px;
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
  </style>

	<title>Repair Helper</title>


	
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


<br>

<!-------------------Write your code here--------------------------------------------------------------------------------------------------------->



            <?php
            if (isset($_SESSION["Email_Address"])) {
            $email = $_SESSION["Email_Address"];  // Retrieve the email from session
            // Database connection
            $conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch image data from the database
            $sql = "SELECT * FROM product_cart WHERE buyer_email = '$email'";
            $result = $conn->query($sql);
             }
            ?>


    



    
    <div class="row">
               <p style="font-size:18px;font-weight: bold; padding-left: 250px;">My Cart</p>
            <div class="col-sm-2"></div>
            
         <div class="col-sm-8">

            <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        
                        echo '<div class="address-card">';
                            echo '<p>Sold By : ' . htmlspecialchars($row['seller_name']) . '</p>';
                            
                            echo '<table style="width: 100%;">';
                                echo '<tr>';
                                    echo '<td style="width: 20%;">';
                                        echo '<img class="product-image" src="' . htmlspecialchars($row['image_path']) . '" alt="' . htmlspecialchars($row['image_name']) . '">';
                                    echo '</td>';
                                    
                                    echo '<td style="width: 40%;">';
                                        echo '<p><strong>' . htmlspecialchars($row['product_name']) . '</strong></p>';
                                    echo '</td>';
                                    
                                    echo '<td style="width: 10%;">';
                                        echo '<p>Qty: <br>' . htmlspecialchars($row['quantity']) . '</p>';
                                    echo '</td>';
                                    
                                    echo '<td style="width: 10%;">';
                                        echo '<p>Item Total: <strong>Rs.' . htmlspecialchars($row['total_amount']) . '</strong></p>';
                                    echo '</td>';
                                    
                                echo '</tr>';
                                echo '</table>';
                                echo '<br>';
                                echo '<table>';
                                echo '<tr>';
                        
                            echo '<table style="width: 100%;">';
                            echo '<td style="width: 70%;"></td>';
                            echo '<td style="width: 30%;">';
                                echo '<a href="deletecart.php?cart_id=' . $row['cart_id'] . '" class="btn btn-cart" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="bi bi-trash3"></i></a>';


                                echo '<a href="addtocarttobuy.php?product_id=' . urlencode($row['product_id']) . '&buyer_email=' . urlencode($row['buyer_email']).  '&seller_email=' . urlencode($row['seller_email']) .  '&quantity=' . urlencode($row['quantity']) .'&total_amount=' . urlencode($row['total_amount']) . '&cart_id=' . urlencode($row['cart_id']) .'" class="btn btn-buy">Buy Now</a>';

                            echo '</td>';
                            echo '</table>';
                        echo '</div>';
                        echo '<br>';
                  

                  }
                } else {
                    echo "<p><strong>No Added to cart yet.</strong></p>";
                }
                ?>
            </div>
            <div class="col-sm-2"></div>
         </div>




















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
                        <li><a class="dropdown-item" href="">Privacy Policy</a></li>
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



</body>
</html>
