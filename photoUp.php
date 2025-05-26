<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION["user_logged_in"]) || !$_SESSION["user_logged_in"]) {
    
    exit();
}

// Get the logged-in email
$email = $_SESSION["email"];

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
        
        
        .upload-box {
            border: 2px dashed #ccc;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 15px;
            cursor: pointer;

        }
        .upload-box img {
            width: 80px;
        }
        .upload-box p {
            color: #666;
            font-size: 16px;
        }
        .file-btn {
            background: linear-gradient(to right, #4a90e2, #8a4ef2);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 14px;
            width: 200px;
        }
        .textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
        }
        .submit-btn {
            background: #6a5acd;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
            width: 150px;
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
                    <a class="nav-link" href="tecprofile.php" style="font-size: 16px;color:#605678;padding-left: 100px; font-weight:bold;"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="font-size: 16px;color:#605678;"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="updateMywork.php" style="font-size: 16px;color:#605678;"></a>
                </li>
            </ul>
            
        </div>
    </div>
</nav>
<br><br><br><br>




<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <center>
                <form action="uploadSave.php" method="POST" enctype="multipart/form-data">
                    <!-- File Upload Box -->
                    <div class="upload-box" onclick="document.getElementById('fileInput').click()">
                        <img id="previewImage" src="upload-icon.png" alt="Upload Icon" style="width: 80px;">
                        <p id="fileText">No file chosen yet!</p><br>
                    </div>
                    <button type="button" class="file-btn" onclick="document.getElementById('fileInput').click()">CHOOSE A FILE</button><br>
                    <input type="file" id="fileInput" name="file" style="display: none;" accept="image/*">
                    <br>

                    <!-- Description -->
                    <label for="description" class="mt-3"></label>
                    <textarea id="description" name="description" rows="5" cols="60"></textarea><br><br>
                    <input type="hidden" name="txtEmail" value="<?php echo $email;?>">

                    <!-- Submit Button -->
                    <button type="submit" class="submit-btn">Submit</button>
                </form>
            </center>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>

<!-- JavaScript for Image Preview -->
<script>
document.getElementById('fileInput').addEventListener('change', function(event) {
    var file = event.target.files[0];
    var reader = new FileReader();

    if (file) {
        reader.readAsDataURL(file);
        reader.onload = function() {
            document.getElementById('previewImage').src = reader.result; 
            document.getElementById('fileText').textContent = file.name; 
        };
    }
});
</script>





<br><br><br>
   
</body>
</html>
