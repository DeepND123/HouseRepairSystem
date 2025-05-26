
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
    $conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Ensure file input is set and no errors occurred
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);

        // Get product name safely
        $productName = $_POST['names'] ?? ''; 
        $category = $_POST['txtCato']?? '';
        $brand = $_POST['txtPbrand']?? '';
        $numOfPieces = $_POST['txtPnumOfpice']?? '';
        $material = $_POST['txtMaterial']?? '';
        $model = $_POST['txtmodel']?? '';
        $price = $_POST['txtPrice']?? '';
        $specialPrice = $_POST['txtSprice']?? '';
        $stock = $_POST['txtStock']?? '';
        $sku = $_POST['txtSKU']?? '';
        $freeItem = $_POST['txtFreeItem']?? '';
        $description = $_POST['txtdescriotion']?? '';
        $weight = $_POST['txtWeight']?? '';
        $length = $_POST['txtLength']?? '';
        $width = $_POST['txtwidth']?? '';
        $height = $_POST['txtheight']?? '';
        $courierCharges = $_POST['txtCCharge']?? '';
        $warranty = $_POST['txtWarenty']?? '';
        $seller_mail = $_POST['email']?? '';

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Prepare data for the database
            $name = $_FILES["image"]["name"];
            $path = $targetFile;

            // Prepare the SQL statement
            $stmt = $conn->prepare("INSERT INTO images (name, path, Names,catogory, brand, numberof_piese, material, model, price, special_price, stock, sellerSKU, freeItem, product_description, weight, length, width, height, curier_chrges, warrenty,Seller_Email) VALUES (?,?,?,?,?,?,?,?,?,?, ?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssssssssssssssssss", $name, $path, $productName,$category,$brand,$numOfPieces,$material,$model,$price,$specialPrice,$stock,$sku,$freeItem,$description,$weight,$length,$width,$height,$courierCharges,$warranty,$seller_mail);

            if ($stmt->execute()) {
                header("Location:AfterProductAddpage.html");
            } else {
                echo "Database error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "File upload failed.";
        }
    } else {
        echo "No file uploaded or an error occurred.";
    }

    $conn->close();
}
?>
