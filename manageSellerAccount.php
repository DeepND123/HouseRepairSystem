
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
  

<br>

<!-------------------Write your code here--------------------------------------------------------------------------------------------------------->

<?php
session_start(); // Start session for logged-in users

// Check if user is logged in
if (!isset($_SESSION["Email_Address"])) {
    die("Unauthorized access! Please log in.");
}

$email = $_SESSION["Email_Address"];  // Retrieve logged-in user's email

// Database connection
$conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user details
$stmt = $conn->prepare("SELECT * FROM sellerdetails WHERE Email_Address = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Initialize variables
$Full_Name = $Address = $city = $province = $zipcode = "";

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $password = $row['Password'];
    $Full_Name = $row['Full_Name'];
    $Address = $row['Address']; // Assuming this is Address 1
    $city = $row['City'];
    $province = $row['State'];
    $zipcode = $row['Zip_Code'];
    $Seller_Name = $row['Seller_Name'];
}
 
?>

<!-- Account Details Form -->
<div class="row" style="margin-top:10px; margin-bottom: 10px;">
    <div class="col-sm-12 text-center mb-3" style="font-size:25px;color:#605678;">My Account Details</div>
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <form class="form" method="post" action="UpdatesellerDetais.php">
            <div class="row">
                <div class="col-sm-6">
                    <label>Email Address</label>
                    <input type="email" class="form-control" name="txtEmailAddress" value="<?php echo htmlspecialchars($email); ?>" readonly required>
                </div>
                <div class="col-sm-6">
                    <label>Password</label>
                    <input type="password" class="form-control" name="txtPassword" value="<?php echo htmlspecialchars($password); ?>">
                </div>
            </div><br>

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" class="form-control" name="FullName" value="<?php echo htmlspecialchars($Full_Name); ?>" required>
            </div><br>

            <div class="form-group">
                <label>Business Name</label>
                <input type="text" class="form-control" name="businessname" value="<?php echo htmlspecialchars($Seller_Name); ?>" required>
            </div><br>

            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="txtAddress" value="<?php echo htmlspecialchars($Address); ?>" required>
            </div><br>

            <div class="row">
                <div class="col-sm-4">
                    <label>City</label>
                    <input type="text" class="form-control" name="txtCity" value="<?php echo htmlspecialchars($city); ?>" required>
                </div>

                <div class="col-sm-4">
                    <label>State</label>
                    <select class="form-control" name="txtProvince">
                        <option <?php echo ($province == 'Central Province') ? 'selected' : ''; ?>>Central Province</option>
                        <option <?php echo ($province == 'Eastern Province') ? 'selected' : ''; ?>>Eastern Province</option>
                        <option <?php echo ($province == 'Northern Province') ? 'selected' : ''; ?>>Northern Province</option>
                        <option <?php echo ($province == 'North Western Province') ? 'selected' : ''; ?>>North Western Province</option>
                        <option <?php echo ($province == 'North Central Province') ? 'selected' : ''; ?>>North Central Province</option>
                        <option <?php echo ($province == 'Southern Province') ? 'selected' : ''; ?>>Southern Province</option>
                        <option <?php echo ($province == 'Sabaragamuwa Province') ? 'selected' : ''; ?>>Sabaragamuwa Province</option>
                        <option <?php echo ($province == 'Uva Province') ? 'selected' : ''; ?>>Uva Province</option>
                        <option <?php echo ($province == 'Western Province') ? 'selected' : ''; ?>>Western Province</option>
                    </select>
                </div>

                <div class="col-sm-4">
                    <label>Zip Code</label>
                    <input type="text" class="form-control" name="txtZipCode" value="<?php echo htmlspecialchars($zipcode); ?>" required>
                </div>
            </div><br>

            <button class="custom-btn w-100" type="submit" name="signup">Update Account Details</button>
        </form>
    </div>
    <div class="col-sm-1"></div><br>
</div>




</body>
</html>
