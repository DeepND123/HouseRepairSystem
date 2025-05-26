
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--link css file-->
    <link rel="stylesheet" href="RH-Style.css">



    <script type="text/javascript" src="jquery-3.7.1.js"></script>
        <!-- Link jQuery file -->
    <script src="RH-scripts.js"></script>

    <link rel="stylesheet" type="text/css" href="bootsrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootsrap/js/bootstrap.min.js"></script>

    <!--fevicon-->
    <link rel="icon" type="image/x-icon" href="Source/fevi.png">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


    <!--fevicon-->
    <link rel="icon" type="image/x-icon" href="Source/fevi.png">
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

    <div class="chat-messages">
    <div class="card">
  <div class="card-header">
    <h5 class="card-title">Message Center</h5>
  </div>



    <div class="card-body" style="height: 100%;">


<div class="container">
<?php
// Start session if needed
session_start();

// Connect to the database
$conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get sender_email and product_id from the URL
if (isset($_GET['sender_email']) && isset($_GET['product_id'])) {
    $sender_email = $_GET['sender_email'];
    $product_id = $_GET['product_id'];
    

    // Combined query using UNION to fetch both messages and replies
   $stmt = $conn->prepare("(SELECT id, sender_email, receiver_email, message, timestamp, 'message' AS message_type FROM messages 
     WHERE sender_email = ? AND product_id = ?) UNION (SELECT id AS id, sender_email, receiver_email, message, timestamp, 'reply' ASmessage_type FROM message_reply WHERE product_id = ?)ORDER BY timestamp ASC");

    $stmt->bind_param("sii", $sender_email, $product_id, $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display messages and replies
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['message_type'] == 'message') {
                echo "<p><strong>" . htmlspecialchars($row['sender_email']) . ":</strong> " . htmlspecialchars($row['message']) . "</p>";
            } else {
                echo "<p style='text-align:right; color: blue;'><strong>Reply:</strong> " . htmlspecialchars($row['message']) . "</p>";
            }
        }
    } else {
        echo "<p>No messages found.</p>";
    }

    $stmt->close();
} else {
    echo "<p>Invalid request. Missing details.</p>";
}

// Check if the request is POST and message is set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    if (isset($_SESSION["Email_Address"]) && isset($_GET['product_id']) && isset($_GET['sender_email'])) {
        $email = $_SESSION["Email_Address"];
        $product_id = intval($_GET['product_id']);
        $sender_email = $_GET['sender_email'];
        $message = $_POST['message'];

        // Fetch the last message ID for this product and sender
        $stmt = $conn->prepare("SELECT id, sender_email FROM messages WHERE receiver_email = ? AND product_id = ? ORDER BY timestamp DESC LIMIT 1");
        $stmt->bind_param("si", $email, $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $original_message = $result->fetch_assoc();
            $chatId = $original_message['id'];
            $seller_email = $original_message['sender_email'];

            // Insert the reply, linking it to the specific message ID
            $stmt = $conn->prepare("INSERT INTO message_reply (receiver_email,sender_email, message, product_id) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sssi", $sender_email, $email, $message, $product_id);

            if ($stmt->execute()) {
                echo "<p>Reply sent!</p>";
            } else {
                echo "<p>Error sending reply.</p>";
            }
            $stmt->close();
        } else {
            echo "<p>No messages found to reply to.</p>";
        }
    } else {
        echo "<p>Invalid request. Missing necessary details.</p>";
    }
}

// Close connection
$conn->close();
?>








  <div class="chat-form">
    <form method="POST" action="">
        <textarea name="message" placeholder="Type your message here..." required></textarea>
        <button type="submit">Send Message</button>
    </form>
</div>


</div>
</div>
</div>
</div>
   

</body>
</html>


