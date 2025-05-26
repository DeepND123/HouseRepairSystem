
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
    .category-card {
      text-align: center;
      padding: 20px;
      height: 250px;
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
  


<!--stat of the nav bar------------------------------------------------------------->

<?php include 'navbarNew.php'; ?> <!-- Include the navbar --------------------------->

<!--End of the navigation bar-------------------------------------------------------->


<br>

<!-------------------Write your code here--------------------------------------------------------------------------------------------------------->




    <div class="container-fluid" style="padding-top: 10px;">
        <div class="row" style="height: 500px;">
            <div class="col-sm-3" style="background-color: #ebe6e8;">
                
            </div>




            
<!--End of the link of the header section------------------------------------------------------------------------------------------------------>

            <div class="col-sm-9">
                    <div style="position: relative;">
                         <img src="Source/main1.jpg" alt="Repair Helper Image" style="width:100%;">
                          <div style="position: absolute;top: 35%; left: -10%;color: #605678;">
                             <p class="h1">Reliable Appliance,</p><p class="h2">Repair Service</p>
                             <p>Hassle-Free Home Repair Solutions - Expert Help, Anytime, Anywhere</p>
                             <button class="custom-btn" name="Find_Helper" style="width:200px" type="button" onclick="window.location.href='findapro.php'">Find A Pro</button>

                          </div>
                    </div>
            </div>

        </div>
    </div>
 <!--End of the header section-------------------------------------------------------------------------------------------------->



<div class="container my-5">
    <h3 class="text-center mb-4" style="color: #605678">Explore Pro Technician</h3>
    <div class="row g-4">
      <!-- HVAC & Climate Control -->
      <div class="col-md-3">
        <div class="category-card border p-3 rounded">
          <div class="category-icon">❄️</div>
          <div class="category-title">HVAC & Climate Control</div>
          <div class="category-description">Heating, cooling, and ventilation systems.</div>
        </div>
      </div>

      <!-- Repairs & Maintenance -->
      <div class="col-md-3">
        <div class="category-card border p-3 rounded">
          <div class="category-icon">🔧</div>
          <div class="category-title">Repairs & Maintenance</div>
          <div class="category-description">General repair services and maintenance tools.</div>
        </div>
      </div>

      <!-- Construction & Installation -->
      <div class="col-md-3">
        <div class="category-card border p-3 rounded">
          <div class="category-icon">🏗️</div>
          <div class="category-title">Construction & Installation</div>
          <div class="category-description">Building materials and installation services.</div>
        </div>
      </div>

      <!-- Home Remodeling & Improvements -->
      <div class="col-md-3">
        <div class="category-card border p-3 rounded">
          <div class="category-icon">🏠</div>
          <div class="category-title">Home Remodeling & Improvements</div>
          <div class="category-description">Redesign and renovation solutions for homes.</div>
        </div>
      </div>
    </div>
  </div>



 <!--------------------------------------------------------------------------------------------------------------------------->



<!----------------------------------------------------End of the 2nd  section-------------------------------------------------------------->

<div class="container-fluid" style="padding-top: 40px;">
 <div class="row">

     <div style="position: relative;">
       <img src="Source/3rd.jpg" alt="Repair Helper aboutus Image" style="width:100%;">
         <div style="position: absolute;top: 35%; left: 10%;color: #605678;">
                 <p class="h2">Your Ultimate Hardware Solution</p>
                 <p>Discover a wide range of quality hardware products.</p>
            <button class="custom-btn" name="Find_Helper" style="width:200px" type="button" onclick="window.location.href='Supplies.php';">Shop Now</button>

        </div>
    </div>

 </div>
</div>
<br>



     <div class="container my-5">
    <h3 class="text-center mb-4" style="color: #605678">Explore Categories</h3>
    <div class="row g-4">
      <!-- Power Tools -->
      <div class="col-md-4">
        <div class="category-card border p-3 rounded">
          <div class="category-icon">🔧</div>
          <div class="category-title">Power Tools</div>
          <div class="category-description">Drills, grinders, saws, and more.</div>
        </div>
      </div>

      <!-- Plumbing Supplies -->
      <div class="col-md-4">
        <div class="category-card border p-3 rounded">
          <div class="category-icon">🚰</div>
          <div class="category-title">Plumbing Supplies</div>
          <div class="category-description">Pipes, fittings, valves, and sealants.</div>
        </div>
      </div>

      <!-- Electrical Components -->
      <div class="col-md-4">
        <div class="category-card border p-3 rounded">
          <div class="category-icon">💡</div>
          <div class="category-title">Electrical Components</div>
          <div class="category-description">Switches, sockets, and wiring tools.</div>
        </div>
      </div>

      <!-- Hand Tools -->
      <div class="col-md-4">
        <div class="category-card border p-3 rounded">
          <div class="category-icon">🛠️</div>
          <div class="category-title">Hand Tools</div>
          <div class="category-description">Wrenches, hammers, screwdrivers, and pliers.</div>
        </div>
      </div>

      <!-- Safety Equipment -->
      <div class="col-md-4">
        <div class="category-card border p-3 rounded">
          <div class="category-icon">🦺</div>
          <div class="category-title">Safety Equipment</div>
          <div class="category-description">Gloves, helmets, and goggles.</div>
        </div>
      </div>

      <!-- Cleaning and Maintenance -->
      <div class="col-md-4">
        <div class="category-card border p-3 rounded">
          <div class="category-icon">🧹</div>
          <div class="category-title">Cleaning and Maintenance</div>
          <div class="category-description">Brushes, cleaning liquids, and mops.</div>
        </div>
      </div>
    </div>
  </div>



<br>

<!----------------------------------------------------End of the 3rd  section-------------------------------------------------------------->

<div class="card">
<div class="container-fluid" style="padding-top: 80px;padding-bottom: 80px;">
 <div class="row">

     <div class="col-sm-12" style="text-align: center;color: #605678; padding-bottom: 40px;"><p class="h3">How It Works</p></div>

     <div class="col-sm-4">
        <div class="card border-light" style="width:90%; background-color: #;">
            <div class="card-body" align="center">
                <img class="card-img-top" src="Source/folder.png" style="width: 100px;padding-bottom: 23px;">
                <p class="h5"> Select The Service You Need </p>
                <p>Get lowest priced quotes for your repair service</p>
            </div>
        </div>
     </div>

    <div class="col-sm-4">
        <div class="card border-light" style="width:90%;">
            <div class="card-body card-borderless" align="center">
                <img class="card-img-top" src="Source/booking.png" style="width: 100px;padding-bottom: 23px;">
                <p class="h5"> Book your Service</p>
                <p>Select date and timeslot and complete service booking</p>
            </div>
        </div>
     </div>

     <div class="col-sm-4">
        <div class="card border-light" style="width:90%;">
            <div class="card-body" align="center">
                <img class="card-img-top" src="Source/customer-service.png" style="width: 100px;padding-bottom: 23px;">
                <p class="h5">Get Hassle Free Service</p>
                <p>NoBroker.. Repair Partner arrives at your doorstep</p>
            </div>
        </div>
     </div>


 </div>
</div>
</div>
</br>


<!----------------------------------------------------End of the 4th  section-------------------------------------------------------------->

<div class="card">
<div class="container-fluid" style="padding-top: 80px; background-color: #ebe6e8; height: 500px;">
 <div class="row">

    <div class="col-sm-12" style="text-align: center;color: #605678; padding-bottom: 40px;"><p class="h3">Our Key Features</p></div>

     <div class="col-sm-4">
        <div class="card border-light" style="width:90%;">
            <div class="card-body" align="center">
                <img class="card-img-top" src="Source/key-features1.png" style="width: 100px;padding-bottom: 23px;">
                <p class="h5"> Expert Technician </p>
                <p>From switch replacement to complete home renovation, we provide expert hands to every home complication.</p>
            </div>
        </div>
     </div>

    <div class="col-sm-4">
        <div class="card border-light" style="width:90%;">
            <div class="card-body card-borderless" align="center">
                <img class="card-img-top" src="Source/key-features2.png" style="width: 100px;padding-bottom: 23px;">
                <p class="h5"> Services On Demand</p>
                <p>Serving 24x7 to our customer is top motto of Ezhome. Now get services at your door <br>anytime, anywhere.</p>
            </div>
        </div>
     </div>

     <div class="col-sm-4">
        <div class="card border-light" style="width:90%;height: 100%;">
            <div class="card-body" align="center">
                <img class="card-img-top" src="Source/key.png" style="width: 100px;padding-bottom: 23px;">
                <p class="h5">Genuine Price</p>
                <p>Easy booking, On-time service delivery, cutting edge resolution through expert hands on Pocket friendly cost.</p>
            </div>
        </div>
     </div>


 </div>
</div>
</div>
<br>



<!----------------------------------------------------End of the 5th  section---------------------------------------------------------------->

<div class="card">

<div class="container-fluid" style="padding-top: 80px;">
 <div class="row">

    <div class="col-sm-12" style="text-align: center;color: #605678; padding-bottom: 20px;"><p class="h3">Why Choose Us?</p></div>

     <div class="col-sm-1"></div>

     <div class="col-sm-10">
             <table class="table table-borderless table align-middle">

                <tr style="">
                    <td><i class="bi bi-people" style="color: #605678; font-size: 45px;"></i></td>
                    <td align="left"><p class="h6" style="color: #605678;">All Services Available</p></td>
                    <td><i class="bi bi-tags" style="color: #605678; font-size: 45px;"></i></td>
                    <td align="left"><p class="h6" style="color: #605678;">Lower Prices</p></td>
                    <td><i class="bi bi-person-check" style="color: #605678; font-size: 45px;"></i></td>
                    <td align="left"><p class="h6" style="color: #605678;">Trusted Experienced Technicians</p></td>
                </tr>

               <tr>
                    <td><i class="bi bi-tools" style="color: #605678; font-size: 45px;"></i></td>
                    <td align="left"><p class="h6" style="color: #605678;">Advance Technology & Equipments</p></td>
                    <td><i class="bi bi-hand-thumbs-up" style="color: #605678; font-size: 45px;"></i></td>
                    <td align="left"><p class="h6" style="color: #605678;">100% Quality Guaranteed</p></td>
                    <td><i class="bi bi-sliders" style="color: #605678; font-size: 45px;"></i></td>
                    <td align="left"><p class="h6" style="color: #605678;">Customized Services</p></td>
                </tr>

                
             </table>
     </div>
     
     <div class="col-sm-1"></div>
 </div>
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
                        <li><a class="dropdown-item" href="">Privacy Policy</a></li>
                        <li><a class="dropdown-item" href="adminlog.html">Admin Panel</a></li>
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
