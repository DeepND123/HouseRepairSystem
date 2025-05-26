<?php
session_start();

// If not logged in, redirect to index.php
if (!isset($_SESSION["user_logged_in"])) {
    header("Location: index.php");
    exit();
}

// Get username from session
$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
     <!--fevicon-->
  <link rel="icon" type="image/x-icon" href="Source/fevi.png">
    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Arial", sans-serif;
        }

        body {
            display: flex;
            height: 100vh;
            background-color: #f4f4f4;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: #ebe6e8;
            color: #605678;
            padding: 20px;
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .sidebar h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            border-bottom: 2px solid white;
            padding-bottom: 10px;
        }

        .sidebar a {
            display: block;
            padding: 15px;
            margin: 8px 0;
            color: #605678;
            font-size: 18px;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
            text-align: center;
        }

        .sidebar a:hover {
            background-color: #7289DA;
            color: white;
        }

        /* Header */
        .header {
            width: calc(100% - 250px);
            height: 80px;
            background: #605678;
            color: white;
            text-align: center;
            position: fixed;
            left: 250px;
            top: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            font-weight: bold;
            padding: 10px;
        }

        /* Logout Button */
        .logout-btn {
            position: absolute;
            background-color: #ebe6e8;
            right: 30px;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            color: #605678;
            padding: 10px 18px;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
            border: 2px solid white;
        }

        .logout-btn:hover {
            background: #ddd;
            color: #605678;
        }

        /* Content Area */
        .content {
            margin-left: 250px;
            margin-top: 80px;
            padding: 20px;
            width: calc(100% - 250px);
        }

        /* Iframe */
        iframe {
            width: 100%;
            height: 85vh;
            border: none;
            border-radius: 8px;
            background: white;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Banner Text */
        .banner-text {
            text-align: center;
            font-size: 36px;
            font-weight: bold;
            color: #333;
            margin-top: 30px;
        }
    </style>
</head>
<body>

     <div class="header">
        Welcome, <?php echo htmlspecialchars($username); ?>!
        <a href="AdminLogout.php" class="logout-btn">Logout</a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="add_technician.php" target="content-frame">Add Technician</a>
        <a href="add_seller.php" target="content-frame">Add Seller</a>
        <a href="approve_product.php" target="content-frame">Approve Product Listing</a>
        <a href="approve_work.php" target="content-frame">Approve Work</a>
    </div>

    <!-- Header -->
   

    <!-- Main Content -->
    <div class="content">
        <!-- Add Banner Text -->
        <div class="banner-text">
           
        </div>
        
        <iframe name="content-frame" src="approve_product.php"></iframe>
    </div>

</body>
</html>
