<?php
// Include database connection
include "db_connect.php";

// Check if message ID is provided
if(isset($_POST['message_id'])) {
    // Sanitize the input to prevent SQL injection
    $message_id = mysqli_real_escape_string($conn, $_POST['message_id']);

    $sql = "DELETE FROM contact_messages WHERE id = $message_id";

    // Execute the query
    if(mysqli_query($conn, $sql)) {
        header("Location: admin-notif.php");

    } else {
        // If deletion fails, return error message
        echo "Error deleting message: " . mysqli_error($conn);
    }
} else {
    // If message ID is not provided, return error message
    echo "Message ID not provided";
}

// Close database connection
mysqli_close($conn);
?>
