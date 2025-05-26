<?php
    if (isset($_GET['email'])) {
        $email = $_GET['email']; // Get the email from URL
    } else {
        $email = ''; // Default to empty if not set
    }
?>
<?php
// Include database connection
$conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' is passed in URL
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']); // Get product ID from URL

    // Prepare SQL query to fetch the product details
    $stmt = $conn->prepare("SELECT * FROM images WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $product_result = $stmt->get_result();

    if ($product_result->num_rows > 0) {
        $product = $product_result->fetch_assoc(); // Fetch product data

        $name = $product['name']; 
        $path = $product['path']; 
        $Names = $product['Names']; 
        $catogory = $product['catogory'];
        $brand = $product['brand'];
        $numberof_piese = $product['numberof_piese'];
        $material = $product['material'];
        $model = $product['model'];
        $price = $product['price'];
        $special_price = $product['special_price'];
        $stock = $product['stock'];
        $sellerSku = $product['sellerSku'];
        $freeItem = $product['freeItem'];
        $product_description = $product['product_description'];
        $weight = $product['weight'];
        $length = $product['length'];
        $width = $product['width'];
        $height = $product['height'];
        $curier_chrges = $product['curier_chrges'];
        $warrenty = $product['warrenty'];
    }
    } else {
        header("Location: 404Error.html"); // Redirect to error page
        exit;
    }

    $stmt->close();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


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
    .upload-container {
      display: inline-block;
      width: 100px; /* Adjust size */
      height: 100px;
      border: 2px dashed #ddd; /* Dashed border */
      border-radius: 8px; /* Rounded corners */
      text-align: center;
      line-height: 100px; /* Vertically center the content */
      font-size: 24px; /* Size of the "+" icon */
      color: #888; /* Light gray color */
      cursor: pointer;
      background-color: #f9f9f9; /* Slightly off-white background */
      position: relative;
    }

    .upload-container input[type="file"] {
      opacity: 0;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      cursor: pointer;
    }

    .upload-preview {
      display: flex;
      gap: 10px; /* Space between previews */
      margin-top: 10px;
    }

    .upload-preview img {
      width: 80px; /* Thumbnail size */
      height: 80px;
      object-fit: cover;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    .custom-button {
  background-color: white;
  border-color: #605678;
  color: #605678;
  font-weight: bold;
  padding: 15px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 10px 2px;
  cursor: pointer;
  border-radius: 5px;
   }

   .custom-button:hover {
    background-color: #605678;
    color: white;
   }


  

  </style>

    <title>Add new Product</title>

</head>

<body class="container-fluid" style="background-color: #F8FAFC;">

 <div class="row"  style="margin-top:10px ; margin-bottom: 10px;">
   
    <div class="col-sm-12"  style="text-align: left; margin-bottom:20px; font-size:20px;color: #605678;font-weight: bold;">Add Product</div>
   
  </div>


    <form action="ProductEdit.php" method="POST" enctype="multipart/form-data">


        <div class="card">
  <div class="card-header">
    <h5 class="card-title">Basic Information</h5>
  </div>
  <div class="card-body">
   
        <div class="form-group">
                  <label>* Product Name</label>
                  <input type="text" class="form-control" name="names" placeholder="name" value="<?php echo $Names; ?>" required><br>

                      <br>
                  <label>* Catogory</label>
                 <select id="inputCato" class="form-control" name="txtCato">
                      <option disabled>Choose...</option>
                      <option value="Power Tools" <?php if(isset($category) && $category == "Power Tools") echo "selected"; ?>>Power Tools</option>
                      <option value="Hand Tools" <?php if(isset($category) && $category == "Hand Tools") echo "selected"; ?>>Hand Tools</option>
                      <option value="Electrical Components" <?php if(isset($category) && $category == "Electrical Components") echo "selected"; ?>>Electrical Components</option>
                      <option value="Plumbing Supplies" <?php if(isset($category) && $category == "Plumbing Supplies") echo "selected"; ?>>Plumbing Supplies</option>
                      <option value="Fasteners" <?php if(isset($category) && $category == "Fasteners") echo "selected"; ?>>Fasteners</option>
                      <option value="Construction Materials" <?php if(isset($category) && $category == "Construction Materials") echo "selected"; ?>>Construction Materials</option>
                      <option value="Woodworking Tools" <?php if(isset($category) && $category == "Woodworking Tools") echo "selected"; ?>>Woodworking Tools</option>
                      <option value="Automotive Tools" <?php if(isset($category) && $category == "Automotive Tools") echo "selected"; ?>>Automotive Tools</option>
                      <option value="Garden Tools" <?php if(isset($category) && $category == "Garden Tools") echo "selected"; ?>>Garden Tools</option>
                      <option value="Safety Equipment" <?php if(isset($category) && $category == "Safety Equipment") echo "selected"; ?>>Safety Equipment</option>
                      <option value="Home Repair Essentials" <?php if(isset($category) && $category == "Home Repair Essentials") echo "selected"; ?>>Home Repair Essentials</option>
                      <option value="Electronics Repair" <?php if(isset($category) && $category == "Electronics Repair") echo "selected"; ?>>Electronics Repair</option>
                      <option value="Lighting and Fixtures" <?php if(isset($category) && $category == "Lighting and Fixtures") echo "selected"; ?>>Lighting and Fixtures</option>
                      <option value="HVAC Components" <?php if(isset($category) && $category == "HVAC Components") echo "selected"; ?>>HVAC Components</option>
                      <option value="Cleaning and Maintenance" <?php if(isset($category) && $category == "Cleaning and Maintenance") echo "selected"; ?>>Cleaning and Maintenance</option>
                      <option value="Miscellaneous" <?php if(isset($category) && $category == "Miscellaneous") echo "selected"; ?>>Miscellaneous</option>
                  </select>

                     <br>
                 
                 <label for="product-images">* Product Images</label><br>
                  <div class="upload-container">
                      <span>+</span>
                      <input type="file" name="image[]" id="product-images" accept="image/*" multiple>
                  </div>

                  <!-- Preview section -->
                  <div class="upload-preview" id="preview">
                      <?php 
                      if (isset($product['path'])) {
                          echo '<img src="' . htmlspecialchars($product['path']) . '" alt="' . htmlspecialchars($product['name']) . '" width="80" height="80" style="border: 1px solid #ddd; border-radius: 5px; object-fit: cover;">';
                      }
                      ?>
                  </div>

                  <input type="hidden" name="path" value="<?php echo $path; ?>" />
                  <input type="hidden" name="name" value="<?php echo $name; ?>" />

        </div>                  
    </div>
</div>



<br>

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Product Specification</h5>
    <p>Fill more product specification will increase product searchability.</p>
  </div>

  <div class="card-body">
   
        <div class="form-group">
                  <div class="row">
                     <div class="col-sm-6">
                      <label>Brand</label>
                      <input type="text" class="form-control" name="txtPbrand" placeholder="Unbrand" value="<?php echo $brand; ?>" required >
                     </div>
                     <div class="col-sm-6">
                       <div class="form-group">
                        <label>Number of Pieces in Set</label>
                        <input type="text"  class="form-control" name="txtPnumOfpice" placeholder="number of pieses" value="<?php echo $numberof_piese; ?>" required>
                        </div>
                     </div>
                    </div><br>
                    <div class="row">
                     <div class="col-sm-6">
                      <label>Material</label>
                      <input type="text" class="form-control" name="txtMaterial" placeholder="Material" value="<?php echo $material; ?>" required >
                     </div>
                     <div class="col-sm-6">
                       <div class="form-group">
                        <label>Model</label>
                        <input type="text"  class="form-control" name="txtmodel" placeholder="Model" value="<?php echo $model; ?>" required>
                        </div>
                     </div>
                    </div><br>          
                
        </div>                  
    </div>
</div>
<br>









<div class="card">
  <div class="card-header">
    <h5 class="card-title">Price & Stock</h5>
  </div>

  <div class="card-body">
   
        <div class="form-group">
                    
                    <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Price</th>
                        <th scope="col">Special price</th>
                        <th scope="col">Stock</th>
                        <th scope="col">SelerSKU</th>
                        <th scope="col">Free Item</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="text" class="form-control" name="txtPrice" placeholder=" Rs." value="<?php echo $price; ?>" required ></td>
                        <td><input type="text" class="form-control" name="txtSprice" placeholder="Add" value="<?php echo $special_price; ?>" ></td>
                        <td><input type="text" class="form-control" name="txtStock" placeholder=" Quantity" value="<?php echo $stock; ?>" required ></td>
                        <td><input type="text" class="form-control" name="txtSKU" placeholder=" SKU" value="<?php echo $sellerSku; ?>" ></td>
                        <td><input type="text" class="form-control" name="txtFreeItem" value="<?php echo $freeItem; ?>" ></td>
                      </tr>
                    </tbody>
                  </table>


        </div>                  
    </div>
</div>
<br>



<div class="card">
  <div class="card-header">
    <h5 class="card-title">Product Description</h5>
    <p>Main Description</p>
  </div>

  <div class="card-body">
   
        <div class="form-group">   
          <textarea class="form-control" name="txtdescriotion" rows="15"><?php echo isset($product_description) ? htmlspecialchars($product_description) : ''; ?></textarea>

        </div>
                     
  </div>                  
 </div>

 <br>

 <div class="card">
  <div class="card-header">
    <h5 class="card-title">Shipping & Warrenty</h5>
  </div>

  <div class="card-body">
   
        <div class="form-group">
                  <div class="row">
                     <div class="col-sm-4">
                      <label>Package weight</label>
                      <input type="text" class="form-control" name="txtWeight" placeholder="KG" value="<?php echo $weight; ?>" >
                     </div>
                  </div><br>

                  <div class="row">
                      <label>Package Length(cm) * Width(cm) * Height(cm)</label>
                      <div class="col-sm-4">
                      <input type="text" class="form-control" name="txtLength" placeholder="cm" value="<?php echo $length; ?>" required >
                    </div>
                    <div class="col-sm-4">
                      <input type="text"  class="form-control" name="txtwidth" placeholder="cm" value="<?php echo $width; ?>" required>
                    </div>
                    <div class="col-sm-4">
                      <input type="text"  class="form-control" name="txtheight" placeholder="cm" value="<?php echo $height; ?>" required>
                    </div>
                  </div>
                  <br>

                  <div class="row">
                  <div class="col-sm-4">
                  <label>Curier Charges</label>
                      <input type="text" class="form-control" name="txtCCharge" placeholder="Rs." value="<?php echo $curier_chrges; ?>" >
                     </div>
              </div><br>  
              <div class="row">
                  <div class="col-sm-4">
                  <label>Warenty</label>
                      <input type="text" class="form-control" name="txtWarenty" placeholder="Month" value="<?php echo $warrenty; ?>" >
                     
                     </div>
              </div><br>         
                
        </div>                  
    </div>
</div>



<input type="hidden" name="email" value="<?php echo $email; ?>" />
<input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />


<br>
<br>


 <div class="card">
  <div class="card-body" style="text-align: right;">
    <button class="custom-button" type="submit" name="signup">Cancel</button>
    <button class="custom-btn" type="submit" name="addProduct">Update Product</button>
  </div>
</div>




    </form>





    <script>
   const input = document.getElementById('product-images');
   const preview = document.getElementById('preview');

   input.addEventListener('change', () => {
   preview.innerHTML = ''; // Clear previous previews
    const files = Array.from(input.files);

    files.forEach(file => {
     if (file.type.startsWith('image/')) { // Validate image type
     const img = document.createElement('img');
      img.src = URL.createObjectURL(file);
      img.alt = file.name; // Optional alt text
      preview.appendChild(img);

     // Release object URL memory after the image loads
      img.onload = () => URL.revokeObjectURL(img.src);
        }
       });
    });
 </script>
</body>
</html>










