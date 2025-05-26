<?php
session_start();

// Assume you validate user credentials here
$isLoggedIn = true; // Replace with your authentication logic

if ($isLoggedIn) {
    $_SESSION['user_logged_in'] = true; // Set session variable
    header("Location: dashboard.php");
    exit();
}
?>
