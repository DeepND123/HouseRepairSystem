
<!DOCTYPE html>
<html>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .category-card {
          text-align: center;
          padding: 10px;
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

        
      .image-name {
            margin-top: 15px;
            font-size: 16px;
            font-weight: bold;
        }


      .product-card {
          background: white;
          padding: 15px;
          border-radius: 10px;
          box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
          text-align: center;
          cursor: pointer;
          transition: transform 0.3s, box-shadow 0.3s;
      }
      .product-card img {
          width: 100%;
          height: 200px;
          object-fit: cover;
          border-radius: 8px;
      }
      .product-card:hover {
          transform: scale(1.05);
          box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      }
      .product-name {
          font-weight: bold;
          margin-top: 10px;
          margin-bottom: 0px;
          color: #333;
      }
      .product-price {
          font-weight: bold;
          font-size: 18px;
          color: #DF6D14;
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
            
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                    

            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Page 1"></button>
      <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Page 2"></button>
      <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Page 3"></button>
    </div>

    <!-- Carousel Items -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="Source/c1.jpg" class="d-block w-100" alt="Page 1">
        <div class="carousel-caption d-none d-md-block">
          <h5></h5>
          <p></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="Source/c2.jpg" class="d-block w-100" alt="Page 2">
        <div class="carousel-caption d-none d-md-block">
          <h5></h5>
          <p></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="Source/c3.jpg" class="d-block w-100" alt="Page 3">
        <div class="carousel-caption d-none d-md-block">
          <h5></h5>
          <p></p>
        </div>
      </div>
    </div>

    <!-- Navigation Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


            </div>


      <div class="col-sm-1"></div>

        </div>
    </div>
 <!--End of the header section-------------------------------------------------------------------------------------------------->



  <div class="container my-5">
    <h2 class="text-center mb-4">Explore Categories</h2>
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
  </div><br>





<!--------------------------------------------------------------reviews----------------------------------------------------------------->











<!----------------------------------------------------End of the middle section------------------------------------------------------------->

<div class="card">

<div class="container-fluid" style="padding-top: 10px;">
    <div class="row">
        <div class="col-sm-12">
            <?php
            // Database connection
            $conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }


            // Get the search term from the URL
            $searchTerm = isset($_GET['q']) ? trim($_GET['q']) : "";

            if (!empty($searchTerm)) {
                $sql = "SELECT id, name, path, Names, price, catogory FROM images where status = 'Approve' and Names LIKE ?";
                $stmt = $conn->prepare($sql);
                $likeSearchTerm = "%" . $searchTerm . "%";
                $stmt->bind_param("s", $likeSearchTerm);
                $stmt->execute();
                $result = $stmt->get_result();


            } else {
                $sql = "SELECT id, name, path, Names, price, catogory FROM images where status = 'Approve'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();

            }

            
            $reviews_sql = "SELECT product_id, AVG(rating) AS avg_rating FROM product_reviews GROUP BY product_id";
            $reviews_result = $conn->query($reviews_sql);
            $avg_ratings = [];
            while ($row = $reviews_result->fetch_assoc()) {
                $avg_ratings[$row['product_id']] = round($row['avg_rating'], 1);
            }

            ?>

            <p class="h4" style="color: #605678;">Just For You</p><br>

            <div class="row">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $product_id = $row['id'];
                        $avg_rating = isset($avg_ratings[$product_id]) ? $avg_ratings[$product_id] : 0;

                        echo '<div class="col-md-2 col-sm-2 mb-3">';
                        echo '<div class="product-card" onclick="window.location.href=\'productbuy.php?id=' . $row['id'] . '&category=' . $row['catogory'] . '\'">';
                        echo '<img src="' . htmlspecialchars($row['path']) . '" alt="' . htmlspecialchars($row['Names']) . '">';
                        echo '<p class="product-name">' . htmlspecialchars($row['Names']) . '</p>';
                        echo '<p class="product-price">Rs.' . htmlspecialchars($row['price']) . '.00</p>';
                        echo '<h6>Average Rating: ⭐ ' . $avg_rating . '/5</h6>';
                        echo '</div>';
                        echo '</div>';
                        
                    }
                } else {
                    echo "<p>No images found.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<br>






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
                        <li><a class="dropdown-item" href="productbuy.php">Privacy Policy</a></li>
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
