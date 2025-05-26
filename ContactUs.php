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


     <style>
    .category-card {
      text-align: center;
      padding: 20px;
      height: 280px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .category-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .category-icon {
      font-size: 50px;
      color: #007bff;
      margin-bottom: 15px;
    }

    .category-title {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .category-description {
      font-size: 14px;
      color: #6c757d;
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
  




<!--stat of the nav bar--------->

<?php include 'navbarNew.php'; ?> <!-- Include the navbar -->

<!--End of the navigation bar-->




       
    <div style="position: relative;width: 100%;padding-bottom: 30px;">
         <img src="Source/Contact.jpg" alt="Repair Helper Contact Image">
           <div style="position: absolute;top: 35%; left: 10%;color: #605678;">
             <p class="h2">Get in touch</p>
             <p style="padding-bottom:110px">Want to get in touch? We'd love to here from you.Here how you can reach us....</p>
          
        </div>
     </div>
         


<div class="row" style="padding-bottom: 30px;">
    <div class="col-sm-12">
    <div style="color: #605678; padding-top: 50px; padding-bottom: 40px; text-align: center;">
      <p class="h4">Contact Customer Support</p>
    </div>
  </div>
 <div class="col-md-2"></div>

  <!-- Talk to an Assistant -->
  <div class="col-md-4">
    <div class="category-card border p-3 rounded">
      <div class="category-icon">📞</div>
      <div class="category-title">Need an Assistant?</div>
      <div class="category-description">Just pick up the phone to chat with a member of our assistant team.</div>
      <div class="contact-info">+94 112 599 799</div>
    </div>
  </div>


  <!-- Contact Customer Support -->
  <div class="col-md-4">
    <div class="category-card border p-3 rounded">
      <div class="category-icon">💬</div>
      <div class="category-title">Need a Little Help?</div>
      <div class="category-description">
        Sometimes you need a little help from your friends. Don’t worry… we’re here for you.
      </div>
      <div class="contact-action"><br>
        <a href="#" class="btn btn-primary">Chat with Us</a>
      </div>
    </div>
  </div>
  <div class="col-md-2"></div>
</div>

<br><br>
      
    

<div class="container-fluid custom-border">
  <div class="row" style="padding-bottom: 30px; padding-top: 30px;">

    <div class="col-sm-1"></div>

      <div class="col-sm-4">
          <div style="color: #605678; padding-top: 100px;">
             <p class="h2">We are here to help you</p><br>
             <p style="padding-bottom:110px">Let us know how we can best serve you. Use the Contact from to email us. It's honor to Support for your problem</p>
          
          </div>
      </div>

      <div class="col-sm-1"></div>

      <div class="col-sm-5">
          
            <form style="padding-bottom:10px;padding-top: 10px;">
                <div class="form-label-group">
                    <input type="text"  class="form-control" placeholder="Your Name" required>
                </div><br>

                <div class="form-label-group">
                    <input type="text"  class="form-control" placeholder="Mobile number" required>
                </div><br>

                <div class="form-label-group">
                    <input type="text"  class="form-control" placeholder="Email Address" required>
                </div><br>

                <div class="form-label-group">
                    <textarea class="form-control" rows="3" placeholder="Enter your message..."></textarea>
                </div><br>

                
                <button class="custom-form" style="width:100%;" type="submit">Send</button>
                                  
            </form>

      </div>

      <div class="col-sm-1"></div>
  </div>
</div>   



    
    


<!----------------------------------------------------End of the middle section------------------------------------------------------------->
<!------------------------------------------------------------ footer ---------------------------------------------------------------------->

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
                        <li><a class="dropdown-item" href="fetch.php">Privacy Policy</a></li>
                        <li><a class="dropdown-item" href="tecnician.html">Terms & Conditions</a></li>
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
