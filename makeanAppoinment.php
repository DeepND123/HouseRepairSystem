<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tec_email = $_POST["tec_email"];
    $profile_id = intval($_POST["profile_id"]); // Ensure it's an integer
    $appointment_date = $_POST["appointment"];
    $user_email = $_POST["buyer_email"];
    $now = date("Y-m-d H:i:s"); // Get current timestamp

    $con = mysqli_connect("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO tec_appoinment(tec_email, profile_id, user_emali, appoinment_date, created_time) VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
  
        mysqli_stmt_bind_param($stmt, "sisss", $tec_email, $profile_id, $user_email, $appointment_date, $now);

        if (mysqli_stmt_execute($stmt)) {
            echo '<script>
                    alert("Appointment successfully added!");
                    setTimeout(function() {
                        window.location.href = "findapro.php";
                    }, 500); // 1 seconds delay
                </script>';
        } else {
            echo "<script>alert('Error placing appointment: " . mysqli_stmt_error($stmt) . "');</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Error preparing statement');</script>";
    }

    mysqli_close($con);
}
?>
