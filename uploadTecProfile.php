<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
    $conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Ensure file input is set and no errors occurred
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {
        $targetDir = "uploads/";

        // Create the directory if it doesn't exist
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $targetFile = $targetDir . basename($_FILES["image"]["name"]);

        // Get form data safely
        $workname = trim($_POST['workname'] ?? '');
        $tecemail = trim($_POST['email'] ?? '');
        $WorkerName = trim($_POST['txtWorkerName'] ?? '');
        $category = trim($_POST['txtCato'] ?? '');
        $price = trim($_POST['txtPrice'] ?? 0);
        $specialPrice = trim($_POST['txtSprice'] ?? 0);
        $description = trim($_POST['txtDescription'] ?? '');
        $mobileNumber = trim($_POST['txtMnumber'] ?? 0);
        $landNumber = trim($_POST['txtLnumber'] ?? 0);
        $fnumber = trim($_POST['txtFnumber'] ?? 0);

        // Check if the file was moved successfully
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Prepare the SQL statement
            $stmt = $conn->prepare("INSERT INTO tec_profile 
                (tec_email, worker_name, workname, description, image_name, image_path, mobilenumber, landNumber, fnumber, working_area, hourly_rate, specialRate) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            
            $stmt->bind_param("ssssssiiisii", $tecemail, $WorkerName, $workname, $description, $_FILES["image"]["name"], $targetFile, $mobileNumber, $landNumber, $fnumber, $category, $price, $specialPrice);

            if ($stmt->execute()) {
                header("Location: tecprofile.php");'<script>
                    alert("Work successfully added!");
                    setTimeout(function() {
                        window.location.href = "tecprofile.php";
                    }, 2000); // 2 seconds delay
                </script>';
                exit(); // Stop execution after redirect
            } else {
                echo "Database error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "File upload failed.";
        }
    } else {
        echo "No file uploaded or an error occurred.";
    }

    $conn->close();
}
?>
