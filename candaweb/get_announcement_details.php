<?php
// Include database connection
include "db_connect.php";

// Check if announcement_id is set and numeric
if (isset($_POST['announcement_id']) && is_numeric($_POST['announcement_id'])) {
    // Sanitize the input to prevent SQL injection
    $announcement_id = mysqli_real_escape_string($conn, $_POST['announcement_id']);

    // Prepare and execute the SQL query to fetch announcement details
    $sql = "SELECT announcement_name, message FROM announcement WHERE id = $announcement_id";
    $result = $conn->query($sql);

    // Check if query was successful
    if ($result) {
        // Fetch the data
        $row = $result->fetch_assoc();

        // Return the data as JSON
        echo json_encode($row);
    } else {
        // Return an error message if query fails
        echo json_encode(array('error' => 'Failed to fetch announcement details.'));
    }
} else {
    // Return an error message if announcement_id is not set or not numeric
    echo json_encode(array('error' => 'Invalid announcement ID.'));
}
?>
