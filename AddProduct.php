<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
    $conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


     // Accepting data from the form
    $productName = $_POST['txtPname'];
    $category = $_POST['txtCato'];
    $brand = $_POST['txtPbrand'];
    $numOfPieces = $_POST['txtPnumOfpice'];
    $material = $_POST['txtMaterial'];
    $model = $_POST['txtmodel'];
    $price = $_POST['txtPrice'];
    $specialPrice = $_POST['txtSprice'];
    $stock = $_POST['txtStock'];
    $sku = $_POST['txtSKU'];
    $freeItem = $_POST['txtFreeItem'];
    $description = $_POST['txtdescriotion'];
    $weight = $_POST['txtWeight'];
    $length = $_POST['txtLength'];
    $width = $_POST['txtwidth'];
    $height = $_POST['txtheight'];
    $courierCharges = $_POST['txtCCharge'];
    $warranty = $_POST['txtWarenty'];

    // File upload handling
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        // Save to database
        $name = $_FILES["image"]["name"];
        $path = $targetFile;

        $stmt = $conn->prepare("INSERT INTO product (product_name, catogory,name, product_images, brand, numberof_pieces, material, model, price, special_price, stock, sellerSKU, free_item, product_description, weight, length, width, height, curier_charges, warrenty) 
            VALUES ($productName, $category,$name, $path, $brand, $numOfPieces, $material, $model, $price, $specialPrice, $stock, $sku, $freeItem, $description, $weight, $length, $width, $height, $courierCharges, $warranty)");
        $stmt->bind_param("ss", $productName, $category,$name, $path, $brand, $numOfPieces, $material, $model, $price, $specialPrice, $stock, $sku, $freeItem, $description, $weight, $length, $width, $height, $courierCharges, $warranty);
        if ($stmt->execute()) {
            echo "Image uploaded and saved successfully!";
        } else {
            echo "Database error: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "File upload failed.";
    }

    $conn->close();
}
?>
