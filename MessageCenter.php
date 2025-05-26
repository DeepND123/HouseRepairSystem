

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--fevicon-->
    <link rel="icon" type="image/x-icon" href="Source/fevi.png">

     <link rel="stylesheet" href="RH-Style.css">



  <script type="text/javascript" src="jquery-3.7.1.js"></script>
    <!-- Link jQuery file -->
    <script src="RH-scripts.js"></script>

  <link rel="stylesheet" type="text/css" href="bootsrap/css/bootstrap.min.css">
  <script type="text/javascript" src="bootsrap/js/bootstrap.min.js"></script>

  <!--fevicon-->
  <link rel="icon" type="image/x-icon" href="Source/fevi.png">

  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <title>Chat with Seller</title>
<style type="text/css">
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



<?php

if (isset($_GET['email'])) {
    $email = $_GET['email']; 
} else {
    $email = ''; 
}


?>

<div class="chat-messages">
    <div class="card">
  <div class="card-header">
    <h5 class="card-title">Message Center</h5>
  </div>



    <div class="card-body" style="height: 100%;">
   <?php
           // Database connection
        $conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Fetch previous chat messages
        $stmt = $conn->prepare(" SELECT * FROM messages 
        WHERE receiver_email = ? 
        GROUP BY product_id, sender_email 
        ORDER BY timestamp ASC ");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
        while ($message = $result->fetch_assoc()) {
            // Ensure message is not null
            if (!empty($message['message'])) {
                echo '<p>
                        <a href="chatReply.php?sender_email=' . urlencode($message['sender_email']) . '&product_id=' . urlencode($message['product_id']) . '" 
                           style="text-decoration: none; color: black;">
                            <strong>' . htmlspecialchars($message['sender_email']) . '</strong> - Product ID: ' . htmlspecialchars($message['product_id']) . '
                        </a>
                      </p>';
            }
            echo '<hr>';
        }
    } else {
        echo "<p>No messages yet.</p>";
    }

        $stmt->close();
        ?>


    </div>
</div>





</body>
</html>
