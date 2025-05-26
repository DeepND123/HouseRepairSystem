<?php
if (isset($_GET['cart_id'])) {
    $cart_id = intval($_GET['cart_id']); // Ensure it's an integer

    // Database connection
    $conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete item from cart for this user
    $sql = "DELETE FROM product_cart WHERE cart_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $cart_id);

    if ($stmt->execute()) {
        echo "<script>alert('Item removed from cart'); window.location.href='cart.php';</script>";
        header("Location: Mycart.php");
    } else {
        echo "<script>alert('Error deleting item'); window.location.href='cart.php';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request'); window.location.href='cart.php';</script>";
}
?>
