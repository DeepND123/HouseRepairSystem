
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

    // Fetch user details from the database
    $sql = "SELECT * FROM userdetails WHERE Email_Address = '$email'";
    $result = $conn->query($sql);

    // Fetch data if the user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();  // Fetch the data from the result
        $email = $row['Email_Address']; 
        $password = $row['Password'];
        $address1 = $row['Address_Line1'];
        $Name = $row['Name'];
        $city = $row['City'];
        $province = $row['State'];
        $zipcode = $row['Zip_Code'];
        $mobile_number = $row['Mobile_number'];
    }
}
?>

<div class="row" style="margin-top:10px ; margin-bottom: 10px;">
    <div class="col-sm-12" style="text-align: center; margin-bottom:20px; font-size:25px;color:#605678;">My Account Details</div>
    <div class="col-sm-1"></div>
    <div class="col-sm-10">

        <form class="form" method="post" action="Updateuser.php">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label>Email address</label>
                        <input type="email" class="form-control" name="txtEmailAddress" placeholder="Email address" value="<?php echo isset($email) ? $email : ''; ?>" readonly required>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputPassword">Password</label>
                            <input type="password" class="form-control" name="txtPassword" placeholder="Password" value="<?php echo isset($password) ? $password : ''; ?>" required>
                        </div>
                    </div>
                </div><br>

                <div class="form-group">
                    <label>Address 1</label>
                    <input type="textbox" class="form-control" name="txtAddress1" placeholder="1234 Main Street" value="<?php echo isset($address1) ? $address1 : ''; ?>" required>
                </div><br>

                <div class="form-group">
                    <label>Full Name</label>
                    <input type="textbox" class="form-control" name="txtAddress2" placeholder="Mr./Ms." value="<?php echo isset($Name) ? $Name : ''; ?>">
                </div><br>

                <label>Mobile Number</label>
                <input type="text" class="form-control" name="mobile_number" id="mobile_number" 
                     placeholder="07X XXX XXXX" value="<?php echo isset($mobile_number) ? $mobile_number : ''; ?>" 
                     pattern="07[0-9]{8}" title="Mobile number must start with '07' and have 10 digits" required>
                    <br>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>City</label>
                            <input type="textbox" class="form-control" name="txtCity" placeholder="City" value="<?php echo isset($city) ? $city : ''; ?>" required>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="inputState">State</label>
                            <select id="inputState" class="form-control" name="txtProvince">
                                <option <?php echo isset($province) && $province == 'Central Province' ? 'selected' : ''; ?>>Central Province</option>
                                <option <?php echo isset($province) && $province == 'Eastern Province' ? 'selected' : ''; ?>>Eastern Province</option>
                                <option <?php echo isset($province) && $province == 'Northern Province' ? 'selected' : ''; ?>>Northern Province</option>
                                <option <?php echo isset($province) && $province == 'North Western Province' ? 'selected' : ''; ?>>North Western Province</option>
                                <option <?php echo isset($province) && $province == 'North Central Province' ? 'selected' : ''; ?>>North Central Province</option>
                                <option <?php echo isset($province) && $province == 'Southern Province' ? 'selected' : ''; ?>>Southern Province</option>
                                <option <?php echo isset($province) && $province == 'Sabaragamuwa Province' ? 'selected' : ''; ?>>Sabaragamuwa Province</option>
                                <option <?php echo isset($province) && $province == 'Uva Province' ? 'selected' : ''; ?>>Uva Province</option>
                                <option <?php echo isset($province) && $province == 'Western Province' ? 'selected' : ''; ?>>Western Province</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="inputEmail">Zip Code</label>
                            <input type="textbox" class="form-control" name="txtZipCode" placeholder="Zip Code" value="<?php echo isset($zipcode) ? $zipcode : ''; ?>" required autofocus>
                        </div>
                    </div><br>

            </div><br><br>
            <button class="custom-btn" style="width:100%" type="submit" name="signup">Update Account Details</button>
        </form>
    </div>

    <div class="col-sm-1"></div><br>
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
