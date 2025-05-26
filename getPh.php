<?php

if (isset($_GET['wid']) && isset($_GET['tid'])) {
    $wid = $_GET['wid'];
    $tid = $_GET['tid'];

    $conn = mysqli_connect("localhost", "Repair_Helper_DB_Server", "Madush@RepairHelper", "repair_helper");
    if ($conn) {
        $stmt = mysqli_prepare($conn, "SELECT Uploaded_Work FROM work_upload WHERE workID = ? AND techID = ?");
        mysqli_stmt_bind_param($stmt,"ii", $wid, $tid); // Corrected line
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $imageData);

        if (mysqli_stmt_fetch($stmt)) {
            header("Content-type: image/jpeg"); // Adjust content type as needed
            echo $imageData;
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "Image not found";
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        echo "Error: Database connection failed.";
    }
} else {
    echo "Error: Missing parameters.";
}

?>



