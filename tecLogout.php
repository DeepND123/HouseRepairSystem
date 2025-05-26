<?php
session_start();

// Destroy all session data
$_SESSION = array();
session_destroy();

// Redirect to ProCenter.html
header("Location: ProCenter.html");
exit();
?>



