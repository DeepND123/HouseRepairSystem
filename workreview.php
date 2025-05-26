<?php

$conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST["order_id"];
    $product_id = $_POST["product_id"];
    $buyer_email = $_POST["buyer_email"];
    $rating = $_POST["rating"];
    $review = $_POST["review"];

    if (empty($order_id) || empty($product_id) || empty($buyer_email) || empty($rating) || empty($review)) {
        die("All fields are required!");
    }



    $stmt = $conn->prepare("INSERT INTO work_reviews (id, profile_id, user_email, rating, review) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssis", $order_id, $product_id, $buyer_email, $rating, $review);

    // Execute and check success
    if ($stmt->execute()) {
        echo "<script>alert('Review submitted successfully!'); window.location.href='myworks.php';</script>";
    } else {
        echo "<script>alert('You have already submitted a review successfully!'); window.location.href='myworks.php';</script>";
    }

    // Close connection
    $stmt->close();
    $conn->close();
}
?>
