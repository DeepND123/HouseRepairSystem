<?php

session_start();

// Check if user is logged in
if (!isset($_SESSION["user_logged_in"]) || !$_SESSION["user_logged_in"]) {
    
    exit();
}

// Get the logged-in email
$email = $_SESSION["email"];



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {

        // File validation (optional: file type and size)
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];  // Allowed file extensions
        $fileExtension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
            echo "Invalid file type!";
            exit;
        }

        if ($_FILES["file"]["size"] > 5 * 1024 * 1024) {  // Max file size: 5MB
            echo "File size exceeds limit!";
            exit;
        }

        $fileName = basename($_FILES["file"]["name"]); // Get file name
        $fileTmp = $_FILES["file"]["tmp_name"]; // Temporary file path
        $uploadDir = "uploads/"; // Folder where images will be saved
        $filePath = $uploadDir . $fileName; // Final file path


            // Move file to the uploads directory
            if (move_uploaded_file($fileTmp, $filePath)) {
                // Insert file path into the database
                $conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "INSERT INTO uploads (image_name, image_path, tec_email, description) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssss", $fileName, $filePath, $email, $description);

                if ($stmt->execute()) {
                    echo "File uploaded and saved successfully!";
                     header("Location: photoUp.php");'<script>
                    alert("Work successfully added!");
                    setTimeout(function() {
                        window.location.href = "photoUp.php";
                    }, 1000); // 2 seconds delay
                </script>';
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
                $conn->close();
            } else {
                echo "Failed to upload file!";
            }
        } else {
            echo "Email or description not provided!";
        }
    } else {
        echo "No file uploaded or an error occurred!";
    }

?>
