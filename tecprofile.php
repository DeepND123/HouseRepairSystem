
 <?php

    session_start();

    // Check if user is logged in
    if (!isset($_SESSION["user_logged_in"]) || !$_SESSION["user_logged_in"]) {
        header("Location: index.php"); // Redirect to login page if not logged in
        exit();
    }

    // Get the logged-in email
    $email = $_SESSION["email"];
    $conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch user details from the database
    $sql = "SELECT * FROM technician WHERE email = '$email'";
    $result = $conn->query($sql);

    // Fetch data if the user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();  // Fetch the data from the result
        $email = $row['email']; 
        $city = $row['city'];
        $name = $row['full_name'];
        $mobile_number = $row['phone_number'];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Repair Helper</title>
    
    <!-- CSS & Bootstrap -->
    <link rel="stylesheet" href="RH-Style.css">
    <link rel="stylesheet" type="text/css" href="bootsrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="Source/fevi.png">

    <!-- JavaScript -->
    <script type="text/javascript" src="jquery-3.7.1.js"></script>
    <script src="RH-scripts.js"></script>
    <script type="text/javascript" src="bootsrap/js/bootstrap.min.js"></script>

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
      background-color: black;
      border-color: black;
      color: white;
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
        background-color: white;
        color: black;
       }

       .custom-sub {
      background-color: white;
      border-color: black;
      color: black;
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

       .custom-sub:hover {
        background-color: black;
        color: white;
       }
       


  </style>

</head>
<body>


<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg" style="height: 80px;background-color: #605678;color: white;">
    <div class="container-fluid">
        <!-- Brand Logo & Name -->
        <a class="navbar-brand" href="tecindex.php" style="font-family: 'LT Saeada'; font-size: 33px; color:#fff; padding-left: 20px;">
            Repair Helper
            <span style="font-size: 20px; padding-left: 10px;">Technician</span>
        </a>

        <!-- Mobile Menu Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="tecprofile.php" style="color:#fff;font-size: 19px;">Add A Work</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tecLogout.php" style="font-size: 19px; font-weight: bold;padding-left: 50px;color:#fff;"><i class="bi bi-box-arrow-right"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>




 <nav class="navbar navbar-expand-lg navbar-light" style="height:40px;background-color: #ebe6e8;">
    <div class="container-fluid">
        <!-- Brand Logo & Name -->
        <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="tecprofile.php" style="font-size: 16px;color:#605678;padding-left: 100px; font-weight:bold;">Add A new Work</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="font-size: 16px;color:#605678;"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="updateMywork.php" style="font-size: 16px;color:#605678;">My Work</a>
                </li>
            </ul>
            
        </div>
    </div>
</nav><br>



<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">


 <form action="uploadTecProfile.php" method="POST" enctype="multipart/form-data">


        <div class="card">
  <div class="card-header">
    <h5 class="card-title">Basic Information</h5>
  </div>

  <div class="card-body">
   
        <div class="form-group">
                  <label>Work Name</label>
                  <input type="text"  class="form-control" name="workname" placeholder="House Painting" required><br>
                      <br>
                  <label>* Working Catogory</label>
                  <select id="inputCato" class="form-control" name="txtCato">
                                                            <option>Air Conditioning</option>
                                                            <option>Flooring</option>
                                                            <option>Painting</option>
                                                            <option>Carpentry</option>
                                                            <option>Garage Door Installation</option>
                                                            <option>Pest Control</option>
                                                            <option>Cleaning</option>
                                                            <option>Garage Door Repair</option>
                                                            <option>Plumbing</option>
                                                            <option>Concrete</option>S
                                                            <option>Handyman</option>
                                                            <option>Remodeling</option>
                                                            <option>Drywall</option>
                                                            <option>Heating & Furnace</option>
                                                            <option>Roofing</option>
                                                            <option>Electrician</option>
                                                            <option>Landscape</option>
                                                            <option>Welder</option>
                                                            <option>Fencing</option>
                                                            <option>Tile</option>
                                              </select>
                     <br>
                 
                  <label for="product-images">Profile Picture</label><br>
                  <div class="upload-container">
                    <span>+</span>
                    <input type="file" name="image" id="product-images" accept="image/*" multiple>
                  </div>
                  <div class="upload-preview" id="preview"></div>
                
        </div>                  
    </div>
</div>

<br>

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Hourly rate</h5>
  </div>

  <div class="card-body">
   
        <div class="form-group">
                    
                    <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Price</th>
                        <th scope="col">Special price</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="text" class="form-control" name="txtPrice" placeholder=" Rs." required ></td>
                        <td><input type="text" class="form-control" name="txtSprice" placeholder="Add" ></td>
                      </tr>
                    </tbody>
                  </table>


        </div>                  
    </div>
</div>
<br>



<div class="card">
  <div class="card-header">
    <h5 class="card-title">About My Working</h5>
    <p>Main Description</p>
  </div>

  <div class="card-body">
   
        <div class="form-group">   
          <textarea class="form-control" name="txtDescription " rows="15"></textarea>  
        </div>
                     
  </div>                  
 </div>

 <br>

 <div class="card">
  <div class="card-header">
    <h5 class="card-title">Contact Details</h5>
  </div>

  <div class="card-body">
   
        <div class="form-group">

                  <div class="row">
                      <label>Mobile Number </label>
                      <div class="col-sm-4">
                      <input type="text" class="form-control" name="txtMnumber" placeholder="07X XXX XXXX" value="<?php echo isset($mobile_number) ? $mobile_number : ''; ?>" readonly required >
                    </div>
                    <div class="col-sm-4">
                      <input type="text"  class="form-control" name="txtLnumber" placeholder="09X XXX XXXX" >
                    </div>
                  </div>
                  <br>

                  <div class="row">
                  <div class="col-sm-4">
                  <label>Fax Number</label>
                      <input type="text" class="form-control" name="txtFnumber" placeholder="09X XXX XXXX">
                     </div>
              </div><br>  
             <br>         
                
        </div>                  
    </div>
</div>


<input type="hidden" name="email" value="<?php echo $email; ?>">
<input type="hidden" name="txtWorkerName" value="<?php echo $name ?>">



<br>
<br>


 <div class="card">
  <div class="card-body" style="text-align: right;">
    <button class="custom-button" type="submit" name="signup">Cancel</button>
    <button class="custom-sub" type="submit" name="addProduct">Add A work</button>
  </div>
</div>


    </form>

</div>
    <div class="col-sm-2"></div>

</div>




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









<br><br><br>
   
</body>
</html>
