
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
    $conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    

        // Get product ID (needed for update)
        $product_id = $_POST['product_id'] ?? '';

        // Get form data safely  
        $path = $_POST['name'] ?? ''; 
        $name = $_POST['path'] ?? '';
        $productName = $_POST['names'] ?? ''; 
        $category = $_POST['txtCato'] ?? '';
        $brand = $_POST['txtPbrand'] ?? '';
        $numOfPieces = $_POST['txtPnumOfpice'] ?? '';
        $material = $_POST['txtMaterial'] ?? '';
        $model = $_POST['txtmodel'] ?? '';
        $price = $_POST['txtPrice'] ?? '';
        $specialPrice = $_POST['txtSprice'] ?? '';
        $stock = $_POST['txtStock'] ?? '';
        $sku = $_POST['txtSKU'] ?? '';
        $freeItem = $_POST['txtFreeItem'] ?? '';
        $description = $_POST['txtdescriotion'] ?? '';
        $weight = $_POST['txtWeight'] ?? '';
        $length = $_POST['txtLength'] ?? '';
        $width = $_POST['txtwidth'] ?? '';
        $height = $_POST['txtheight'] ?? '';
        $courierCharges = $_POST['txtCCharge'] ?? '';
        $warranty = $_POST['txtWarenty'] ?? '';
        $seller_mail = $_POST['email'] ?? '';


            
           if (!empty($product_id)) {
    // Prepare the SQL statement
    $stmt = $conn->prepare("UPDATE images 
        SET Names = ?, catogory = ?, brand = ?, numberof_piese = ?, material = ?, model = ?, 
            price = ?, special_price = ?, stock = ?, sellerSKU = ?, freeItem = ?, product_description = ?, 
            weight = ?, length = ?, width = ?, height = ?, curier_chrges = ?, warrenty = ? 
        WHERE id = ?");

    $stmt->bind_param("ssssssssssssssssssi", 
        $productName, $category, $brand, $numOfPieces, $material, $model, 
        $price, $specialPrice, $stock, $sku, $freeItem, $description, 
        $weight, $length, $width, $height, $courierCharges, $warranty, $product_id); 

                // Execute the statement
                if ($stmt->execute()) {
                    header("Location: AfterProductAddpage.html");
                    exit;
                } else {
                    echo "Database error: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Product ID is missing.";
            }
        } else {
            echo "File upload failed.";
        }
 

exit(); // Stops execution so you can see the output

    
    $conn->close();

?>
