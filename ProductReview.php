<?php

$conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST["order_id"];
    $product_id = $_POST["product_id"];
    $buyer_email = $_POST["buyer_email"];
    $seller_email = $_POST["Seller_email"];
    $rating = $_POST["rating"];
    $review = $_POST["review"];
    $status = $_POST["status"];



    // Validate input
    if (empty($order_id) || empty($product_id) || empty($buyer_email) || empty($seller_email) || empty($rating) || empty($review)) {
        die("All fields are required!");
    }

    if ($status !== "Complete") { 
        echo "<script>alert('You have to wait until the order is completed..!'); window.location.href='Myorder.php';</script>";
        exit(); 
    }


    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO product_reviews (order_id, product_id, buyer_email, seller_email, rating, review) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssis", $order_id, $product_id, $buyer_email, $seller_email, $rating, $review);

    // Execute and check success
    if ($stmt->execute()) {
        echo "<script>alert('Review submitted successfully!'); window.location.href='Myorder.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close resources
    $stmt->close();
    $conn->close();
}
?>
