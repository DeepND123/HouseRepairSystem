<?php
session_start();
if (!isset($_SESSION["Email_Address"])) {
    header("Location: Seller.html"); // Redirect to login if not logged in
    exit();
}

$email = $_SESSION["Email_Address"];
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

	<title>Repair Helper</title>


	
</head>
</head>


<body class="container-fluid">

 <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg" style="height: 80px;background-color:#605678 ;">
    <div class="container-fluid">
        <!-- Brand Logo & Name -->
        <a class="navbar-brand" href="SellerIndex.php" style="font-family: 'LT Saeada'; font-size: 33px; color: #fff; padding-left: 20px;">
            Repair Helper
            <span style="font-size: 20px; padding-left: 10px;">Seller Center</span>
        </a>

        <!-- Mobile Menu Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="messageCenter()" style="font-size: 19px;color: #fff">Message Center</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="manageAccount()" style="font-size: 19px;color: #fff">Account Setting</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="SellerLogout.php" style="font-size: 19px; font-weight: bold;padding-left: 50px;color: #fff;"><i class="bi bi-box-arrow-right"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>
</div>
 


 <!------------------------------------------------------------------------------------------------------------------------------------->



<!--Body section------------------------------------------------------------------------------------------------------------------------>				  
 <div class="container-fluid">
    <div class="row">

     <div class="col-sm-2" style="padding-top: 20px; background-color: #EEEEEE;">

        <ul class="navbar-nav" style="padding-top: 10px;height: 85vh;">
            <table class="table table-hover table-borderless">
                <tr>
                  <td style="background-color: transparent;">
                      <a class="nav-link" href="#" onclick="myFunction4()" style="color: #565656; font-size: 17px;"><i class="bi bi-bag-check" style=" padding-right: 20px;"></i>Product</a>
                  </td>
                </tr>

                <tr>
                  <td style="background-color: transparent;">
                      <a class="nav-link" href="#" onclick="myFunction()" style="color: #565656; font-size: 17px;"><i class="bi bi-folder-plus" style=" padding-right: 20px;"></i>Add New Product</a>
                  </td>
                </tr>

                <tr>
                  <td style="background-color: transparent;">
                      <a class="nav-link" href="#" onclick="myFunction2()" style="color: #565656; font-size: 17px;"><i class="bi bi-check2-circle" style=" padding-right: 20px;"></i>Orders</a>
                  </td>
                </tr>


                 <tr>
                  <td style="background-color: transparent;">
                      <a class="nav-link" href="#" onclick="myFunction6()" style="color: #565656; font-size: 17px;"><i class="bi bi-star" style=" padding-right: 20px;"></i>Reviews</a>
                  </td>
                </tr>

                <tr>
                  <td style="background-color: transparent;">
                      <a class="nav-link" href="#" style="color: #565656; font-size: 17px;"><i class="bi bi-shop" style=" padding-right: 20px;"></i>Store</a>
                  </td>
                </tr>

                <tr>
                  <td style="background-color: transparent;">
                      <a class="nav-link" href="#" onclick="myFunction5()"  style="color: #565656;  font-size: 17px;"><i class="bi bi-question-circle" style=" padding-right: 20px;"></i>Support</a>
                  </td>
                </tr>

                <tr>
                  <td style="background-color: transparent;">
                      <a class="nav-link" href="#" style="color: #565656; font-size: 17px;"></a>
                  </td>
                </tr>
                  
              </table>

     </div>

<!--start of the middle Body section------------------------------------------------------------------------------------------------------>    

     <div class="col-sm-10">
    <?php $email = $_SESSION['Email_Address']; ?> 
    <iframe id="middleBody" width="100%" height="100%" src="Product.php?email=<?php echo urlencode($email); ?>"></iframe>
</div>


<!--End of the middle Body section-------------------------------------------------------------------------------------------------------->     

   </div>
 </div>







<script type="text/javascript">
      function myFunction() {
      var email = "<?php echo $_SESSION['Email_Address']; ?>"; // Get the email from session
      document.getElementById("middleBody").src = "testImage.php?email=" + email; // Pass email via URL
      }

       function myFunction2() {
      var email = "<?php echo $_SESSION['Email_Address']; ?>"; // Get the email from session
      document.getElementById("middleBody").src = "OrdersAndReview.php?email=" + email; // Pass email via URL";
      }

      function myFunction4() {
      var email = "<?php echo $_SESSION['Email_Address']; ?>"; // Get the email from session
      document.getElementById("middleBody").src = "Product.php?email=" + email; // Pass email via URL;
      }


      function myFunction6() {
      var email = "<?php echo $_SESSION['Email_Address']; ?>"; // Get the email from session
      document.getElementById("middleBody").src = "Reviews.php?email=" + email; // Pass email via URL;
      }

      function myFunction5() {
      document.getElementById("middleBody").src = "Supports.html";
      }


      function messageCenter() {
      var email = "<?php echo $_SESSION['Email_Address']; ?>"; // Get the email from session
      document.getElementById("middleBody").src = "MessageCenter.php?email=" + email; // Pass email via URL;
      }

      function manageAccount() {
      var email = "<?php echo $_SESSION['Email_Address']; ?>"; // Get the email from session
      document.getElementById("middleBody").src = "manageSellerAccount.php?email=" + email; // Pass email via URL;
      }
      

    </script>
				


</body>
</html>