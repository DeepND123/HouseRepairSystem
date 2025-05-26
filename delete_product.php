<?php
// Include database connection
$conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' is passed in URL
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']); // Get product ID from URL

    // Prepare SQL query to delete the product
    $stmt = $conn->prepare("DELETE FROM images WHERE id = ?");
    $stmt->bind_param("i", $product_id);

    if ($stmt->execute()) {
        // Redirect to the product listing page with success message
        
    } else {
        // Redirect to the product listing page with error message
        header("Location: SellerIndex.php");
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // Redirect to product listing page with error message if no id is provided
    header("Location: SellerIndex.php");
}

$conn->close();
exit;
?>
