
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

        .address-card:hover{
            border-color: #605678;
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .popup-overlay {
            display: none; /* Initially hidden */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            justify-content: center;
            align-items: center;
            }

        .popup-content {
            background: white;
            padding: 20px;
            width: 500px;
            border-radius: 8px;
            text-align: center;
            position: relative;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            cursor: pointer;
        }

        #star-rating {
            display: flex;
            gap: 5px;
            font-size: 30px;
            cursor: pointer;
            justify-content: center;
        }

        .star {
            color: gray; /* Default color */
            transition: color 0.3s;
        }

        .star:hover,
        .star.active {
            color: gold; /* Highlighted stars */
        }

      .review {
            background-color: #DF6D14;
            border-color: #DF6D14;;
            width: 300px;
            height: 40px;
            align-self: center;
            color: white;
        }
        .review:hover{
            color: #DF6D14;
            background-color: white;
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

// Check if user is logged in
if (isset($_SESSION["Email_Address"])) {
    $email = $_SESSION["Email_Address"];

    // Database connection
    $conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare a secure SQL query
    $stmt = $conn->prepare("SELECT * FROM tec_appoinment WHERE user_emali = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    $appointments = []; // Store appointments
    while ($row = $result->fetch_assoc()) {
        $appointments[] = $row;
    }

    // Close the first statement
    $stmt->close();
    
    // If there are appointments, fetch technician details for each
    $technicians = [];
    if (!empty($appointments)) {
        foreach ($appointments as $appointment) {
            $profile_id = $appointment['profile_id'];

            $stmt2 = $conn->prepare("SELECT * FROM tec_profile WHERE profile_id = ?");
            $stmt2->bind_param("s", $profile_id);
            $stmt2->execute();
            $technicians[$profile_id] = $stmt2->get_result()->fetch_assoc();
            $stmt2->close();
        }
    }

    $conn->close(); // Close connection
} else {
    $appointments = []; // No appointments if user is not logged in
}
?>

<div class="row">
    <p style="font-size:18px;font-weight: bold; padding-left: 250px;">My Appointments</p>
    <div class="col-sm-2"></div>

    <div class="col-sm-8">
        <?php if (!empty($appointments)): ?>
            <?php foreach ($appointments as $appointment): ?>
                <div class="address-card" onclick="openPopup('<?= htmlspecialchars($appointment['appoinment_id']) ?>', '<?= htmlspecialchars($appointment['profile_id']) ?>', '<?= htmlspecialchars($appointment['user_emali']) ?>')">
                    <p>Appointment Number: <?= htmlspecialchars($appointment['appoinment_id']) ?></p>

                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 30%;">
                                <?php if (!empty($technicians[$appointment['profile_id']])): ?>
                                    <p>Technician Name: <?= htmlspecialchars($technicians[$appointment['profile_id']]['worker_name']) ?></p>
                                    <p>For: <?= htmlspecialchars($technicians[$appointment['profile_id']]['workname']) ?></p>
                                    <p>Contact Number: <?= htmlspecialchars($technicians[$appointment['profile_id']]['mobilenumber']) ?></p>
                                    <p>Company Number: <?= htmlspecialchars($technicians[$appointment['profile_id']]['landNumber']) ?></p>
                                <?php else: ?>
                                    <p>No technician assigned.</p>
                                <?php endif; ?>
                            </td>

                            <td style="width: 20%;">
                                <p>Appointment Date: <strong><?= htmlspecialchars($appointment['appoinment_date']) ?></strong></p>
                            </td>

                            <td style="width: 20%;">
                                <p>Status: <?= htmlspecialchars($appointment['status']) ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
                <br>
            <?php endforeach; ?>
        <?php else: ?>
            <p><strong>No Appointments yet.</strong></p>
        <?php endif; ?>
    </div>

    <div class="col-sm-2"></div>
</div>









<div id="popup-overlay" class="popup-overlay">
    <div class="popup-content">
        <span class="close-btn" onclick="closePopup()">&times;</span>
        <h3>Work Review</h3>
        <p><strong>Work_number:</strong> <span id="popup-order-id"></span></p>
 
        
        <!-- Add a review form inside -->
        <form action="workreview.php" method="POST">
            <input type="hidden" name="order_id" id="hidden-order-id">
            <input type="hidden" name="product_id" id="hidden-product-id">
            <input type="hidden" name="buyer_email" id="hidden-buyer-email">


            <label for="rating">Your Rating:</label>
                <div id="star-rating">
                    <span class="star" data-value="1">★</span>
                    <span class="star" data-value="2">★</span>
                    <span class="star" data-value="3">★</span>
                    <span class="star" data-value="4">★</span>
                    <span class="star" data-value="5">★</span>
                </div>
                <input type="hidden" name="rating" id="rating-value" value="0"><br>

            <label for="review">Your Review:</label><br><br>
            <textarea name="review" cols="50" rows="4" required placeholder="Are You satisfy about the worker"></textarea><br><br>

            <button class="review" type="submit">Submit Review</button>
        </form>
    </div>
</div>


<script type="text/javascript">
function openPopup(orderId, productId, buyerEmail) {
    document.getElementById("popup-order-id").innerText = orderId;


    // Also set hidden fields for the form
    document.getElementById("hidden-order-id").value = orderId;
    document.getElementById("hidden-product-id").value = productId;
    document.getElementById("hidden-buyer-email").value = buyerEmail;

    document.getElementById("popup-overlay").style.display = "flex";
}

function closePopup() {
    document.getElementById("popup-overlay").style.display = "none";
}
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
    const stars = document.querySelectorAll(".star");
    const ratingInput = document.getElementById("rating-value");

    stars.forEach((star, index) => {
        star.addEventListener("click", function () {
            let rating = index + 1; // Get star value
            ratingInput.value = rating;

            // Update colors for all stars
            stars.forEach((s, i) => {
                s.classList.toggle("active", i < rating);
            });
        });
    });
});

</script>











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
