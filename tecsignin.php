<?php 
session_start();

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST["signin"])){

    // Get email and password from the form
    $emailAadd = $_POST["txtEmailAddress"];
    $password = $_POST["txtPassword"];

    // Connect to the database
    $con = mysqli_connect("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");
    if (!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL query to avoid SQL injection
    $stmt = $con->prepare("SELECT * FROM technician WHERE email = ? AND password = ? and status = 'Approve'");
    $stmt->bind_param("ss", $emailAadd, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($row = $result->fetch_assoc()) {
        $_SESSION["email"] = $emailAadd;
        $_SESSION["user_logged_in"] = true;

        // Redirect to index page on successful login
        header("Location: tecindex.php");
        exit();
    } else {
        // Failed login attempt
        echo "<script>alert('Invalid Email or Password'); window.location.href='ProCenter.html';</script>";
    }

    $stmt->close();
    $con->close();
}
?>
