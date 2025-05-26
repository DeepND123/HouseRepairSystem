<?php

// Include database connection
$con = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");

if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['id'])) {
    $order_id = intval($_GET['id']); // For GET request
    $status = "Complete";
    
    // Prepare update query
    $sql = "UPDATE product_order SET status = ? WHERE order_id = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $status, $order_id); // "s" for string, "i" for integer

        if (mysqli_stmt_execute($stmt)) {
             header("Location: OrdersAndReview.php ");

        } else {
            echo "<script>alert('Shipping Error: " . mysqli_stmt_error($stmt) . "');</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Error preparing statement');</script>";
    }
} else {
    echo "<script>alert('Error: Missing product_id');</script>";
}


?>
