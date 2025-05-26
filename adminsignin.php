<?php
session_start();

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["signin"])) {
    // Get username and password from the form
    $UName = $_POST["txtUsername"];
    $password = $_POST["txtPassword"];

    // Connect to the database
    $con = mysqli_connect("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");
    if (!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Prepare SQL query (Ensure password verification is correct)
    $stmt = $con->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param("s", $UName);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($row = $result->fetch_assoc()) {
        if ($password === $row['password']) { // Assuming plain text passwords (hashing is recommended)
            $_SESSION["username"] = $UName;
            $_SESSION["user_logged_in"] = true;

            // Redirect to adminindex.php after successful login
            header("Location: adminindex.php");
            exit();
        } else {
            echo "<script>alert('Invalid Username or Password'); window.location.href='adminlog.html';</script>";
        }
    } else {
        echo "<script>alert('Invalid Username or Password'); window.location.href='adminlog.html';</script>";
    }

    $stmt->close();
    $con->close();
}
?>
