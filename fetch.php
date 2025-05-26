<?php
// Database connection
$conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch image data from the database
$sql = "SELECT name, path, Names,price FROM images";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Images</title>
    <style>
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .gallery-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            max-width: 220px;
        }
        .gallery img {
            width: 200px;
            height: 150px;
            object-fit: cover;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .image-name {
            margin-top: 15px;
            font-size: 16px;
            font-weight: bold;
        }






.chat-form {
    margin-top: 20px;
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 5px;
}

.chat-form textarea {
    width: 100%;
    height: 100px;
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
}

.chat-form button {
    margin-top: 10px;
    padding: 10px 20px;
    background-color: #df6d14;
    color: white;
    border: none;
    border-radius: 5px;
}

.message {
    margin-bottom: 15px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.message p {
    margin: 0;
    font-size: 14px;
}


        
    </style>
</head>
<body>
    <h1>Uploaded Images</h1>
    <div class="gallery">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="gallery-item">';
                echo '<img src="' . htmlspecialchars($row['path']) . '" alt="' . htmlspecialchars($row['Names']) . '">';
                echo '<p class="image-name">' . htmlspecialchars($row['Names']) . '</p>';
                echo '<p class="image-name">Rs.' . htmlspecialchars($row['price']) . '</p>';
                echo '</div>';
            }
        } else {
            echo "<p>No images found.</p>";
        }
        ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
