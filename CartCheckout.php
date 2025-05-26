

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cart_id = intval($_POST["cart_id"]);
    $product_id = intval($_POST["product_id"]); 
    $quantity = intval($_POST["quantity"]);
    $total_price = floatval($_POST["total_price"]);
    $seller_email = $_POST["seller_email"];
    $seller_name = $_POST["seller_name"];
    $product_name = $_POST["product_name"];
    $price = floatval($_POST["price"]); 
    $buyer_mobile = $_POST["buyer_mobile"]; 
    $buyer_name = $_POST["buyer_name"];
    $buyer_email = $_POST["buyer_email"];
    $address = $_POST["address"];
    $name = $_POST["name"]; // Product display name
    $path = $_POST["path"]; // Product image path
    
    $now = date("Y-m-d H:i:s"); // Get current timestamp

    // Database connection
    $con = mysqli_connect("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Corrected SQL query
    $sql = "INSERT INTO product_order 
            (product_id, buyer_email, pro_path, pro_name, product_name, buyer_name, buyer_address, mobile_number, unit_price, quantity, total_price, seller_email, seller_name, order_date) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        // Corrected parameter binding with the correct number of variables
        mysqli_stmt_bind_param($stmt, "isssssssdidsss", 
            $product_id, $buyer_email, $path, $name, $product_name, $buyer_name, 
            $address, $buyer_mobile, $price, $quantity, $total_price, 
            $seller_email, $seller_name, $now
        );

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>window.location.href='AfterOrderPlace.html';</script>";
        } else {
            echo "<script>alert('Error placing order: " . mysqli_stmt_error($stmt) . "');</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Error preparing statement');</script>";
    }

    mysqli_close($con);
}
?>


<?php


//update product table quantiti

// Database connection
$con = mysqli_connect("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$product_id = $_POST["product_id"];
$new_stock = $_POST["new_qty"];

$sql = "UPDATE images SET stock = ? WHERE id = ?";

$stmt = mysqli_prepare($con, $sql);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ii", $new_stock, $product_id);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Stock updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating stock: " . mysqli_stmt_error($stmt) . "');</script>";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "<script>alert('Error preparing statement');</script>";
}

mysqli_close($con);
?>






<?php
// Database connection
$con = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Validate and sanitize cart_id
if (isset($_POST["cart_id"]) && is_numeric($_POST["cart_id"])) {
    $cart_id = intval($_POST["cart_id"]); // Convert to integer for security

    // Correct DELETE SQL statement
    $sql = "DELETE FROM product_cart WHERE cart_id = ?";

    $stmt = $con->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $cart_id);
        if ($stmt->execute()) {
            echo "<script>alert('Item removed from cart successfully!'); window.location.href='cart.php';</script>";
        } else {
            echo "<script>alert('Error deleting item: " . $stmt->error . "'); window.location.href='cart.php';</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Error preparing statement'); window.location.href='cart.php';</script>";
    }
} else {
    echo "<script>alert('Invalid cart ID'); window.location.href='cart.php';</script>";
}

// Close the database connection
$con->close();
?>
