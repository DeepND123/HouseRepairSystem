<?php

// Include database connection
$con = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");

if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['id'])) {
    $appoinment_id = intval($_GET['id']); 
    $status = "Confirmed";
    
    // Prepare update query
    $sql = "UPDATE tec_appoinment SET status = ? WHERE appoinment_id = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $status, $appoinment_id);

        if (mysqli_stmt_execute($stmt)) {
             header("Location: Appoinments.php ");

        } else {
            echo "<script>alert('Confirm error: " . mysqli_stmt_error($stmt) . "');</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Error preparing statement');</script>";
    }
} else {
    echo "<script>alert('Error: Missing appinment id');</script>";
}


?>
