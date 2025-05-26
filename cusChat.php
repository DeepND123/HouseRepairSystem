<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure user is logged in
if (!isset($_SESSION["Email_Address"])) {
    die("<p>You need to be logged in to chat with a seller.</p>");
}

$email = $_SESSION["Email_Address"];

// Get product ID and sender email
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sender_email = isset($_GET['email']) ? $_GET['email'] : '';

if ($product_id <= 0 || empty($sender_email)) {
    die("<p>Invalid request. Missing product or sender details.</p>");
}

// Fetch seller email
$stmt = $conn->prepare("SELECT seller_email FROM images WHERE id = ?");
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$seller_email = ($row = $result->fetch_assoc()) ? $row['seller_email'] : die("<p>Seller not found for this product.</p>");
$stmt->close();

// Fetch seller name
$stmt = $conn->prepare("SELECT Seller_Name FROM sellerdetails WHERE Email_Address = ?");
$stmt->bind_param("s", $seller_email);
$stmt->execute();
$result = $stmt->get_result();
$Seller_Name = ($row = $result->fetch_assoc()) ? $row['Seller_Name'] : "Seller";
$stmt->close();

// Fetch all messages
$stmt = $conn->prepare("
    (SELECT id, sender_email, receiver_email, message, timestamp, 'message' AS message_type 
     FROM messages 
     WHERE ((sender_email = ? AND receiver_email = ?) OR (sender_email = ? AND receiver_email = ?)) 
     AND product_id = ?)
    UNION ALL
    (SELECT r.id, r.sender_email, r.receiver_email, r.message, r.timestamp, 'reply' AS message_type 
     FROM message_reply r
     WHERE r.product_id = ? AND r.sender_email = ? AND r.receiver_email = ?)
    ORDER BY timestamp ASC
");
$stmt->bind_param("ssssissi", $sender_email, $seller_email, $seller_email, $sender_email, $product_id, $product_id, $seller_email, $sender_email);

$stmt->execute();
$result = $stmt->get_result();
$messages = [];
while ($message = $result->fetch_assoc()) {
    $messages[] = $message;
}
$stmt->close();

// Handle new message submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    $message_text = trim($_POST['message']);

    if (!empty($message_text)) {
        $stmt = $conn->prepare("INSERT INTO messages (sender_email, receiver_email, message, product_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $email, $seller_email, $message_text, $product_id);

        if ($stmt->execute()) {
            // Redirect to prevent form resubmission
            header("Location: cusChat.php?id=$product_id&email=$sender_email");
            exit();
        } else {
            echo "<p>Error sending message.</p>";
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="RH-Style.css">
    <link rel="stylesheet" href="bootsrap/css/bootstrap.min.css">
    <script src="bootsrap/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/x-icon" href="Source/fevi.png">
    <title>Chat with Seller</title>

    <style>
        .chat-container { max-width: 600px; margin: auto; }
        .chat-box { padding: 15px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9; margin-bottom: 15px; }
        .chat-form textarea { width: 100%; height: 100px; padding: 10px; font-size: 16px; border-radius: 5px; }
        .chat-form button { margin-top: 10px; padding: 10px 20px; background-color: #df6d14; color: white; border: none; border-radius: 5px; }
        .sent { background-color: #d1e7dd; text-align: left; margin-right: auto; }
        .received { background-color: #f8d7da; text-align: right; margin-left: auto; }
        .chat-message { margin-bottom: 10px; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>

<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg" style="height: 80px; background-color:#605678;">
        <div class="container-fluid">
            <a class="navbar-brand" href="Supplies.php" style="font-family: 'LT Saeada'; font-size: 33px; color: #fff; padding-left: 20px;">
                Repair Helper
                <span style="font-size: 20px; padding-left: 10px;">Message Center</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <br>
</div>

<div class="container chat-container">
    <h2>Chat with <?php echo htmlspecialchars($Seller_Name); ?></h2>
    <div class="chat-box">
    <?php if (!empty($messages)): ?>
        <?php foreach ($messages as $msg): ?>
            <?php
            // Check if the message is from the user or the seller
            $is_user_message = ($msg['sender_email'] == $email); 
            $is_seller_reply = ($msg['sender_email'] == $seller_email); 
            ?>
            <div class="chat-message <?php echo $is_user_message ? 'sent' : ($is_seller_reply ? 'received' : ''); ?>">
                <p><strong>
                    <?php
                    if ($is_user_message) {
                        echo "You";
                    } else {
                        echo "Seller";
                    }
                    ?>:</strong></p>
                <p><?php echo htmlspecialchars($msg['message']); ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No messages yet. Start the conversation!</p>
    <?php endif; ?>
</div>



    <div class="chat-form">
        <form method="POST">
            <textarea name="message" placeholder="Type your message here..." required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </div>
</div>

</body>
</html>
