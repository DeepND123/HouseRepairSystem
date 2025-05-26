<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = intval($_POST["product_id"]); 
    $quantity = intval($_POST["quantity"]);
    $seller_email = $_POST["seller_email"];
    $seller_name = $_POST["seller_name"];
    $product_name = $_POST["product_name"];
    $price = floatval($_POST["price"]); 
    $buyer_email = $_POST["buyer_email"];
    $name = $_POST["name"];
    $path = $_POST["path"]; // Product image path

    // Calculate total price
    $total = $quantity * $price;

    // Database connection
    $con = mysqli_connect("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert product into cart
    $sql = "INSERT INTO product_cart (product_id, seller_email, seller_name, product_name, image_name, image_path, unit_price, quantity, total_amount, buyer_email) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "isssssddds", $product_id, $seller_email, $seller_name, $product_name, $name, $path, $price, $quantity, $total, $buyer_email);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Product added to cart successfully');</script>";
            header("Location: productbuy.php");
            exit;
        } else {
            echo "<script>alert('Error adding to cart: " . mysqli_stmt_error($stmt) . "');</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Error preparing statement');</script>";
    }

    mysqli_close($con);
}
?>