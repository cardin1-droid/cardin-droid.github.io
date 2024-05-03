<?php
// Include the necessary database connection file
include_once "db_connect.php";

// Check if an ID parameter is provided
if (isset($_GET['id'])) {
    // Retrieve the official's ID from the URL parameter
    $official_id = $_GET['id'];

    // Perform database query to delete the official with the provided ID
    $sql = "DELETE FROM officials WHERE id = $official_id";

    if ($conn->query($sql) === TRUE) {
        // If the deletion was successful, redirect back to the officials page with a success message
        header("Location: admin-officials.php?message=Official deleted successfully");
        exit();
    } else {
        // If an error occurred during deletion, display an error message
        echo "Error deleting record: " . $conn->error;
    }
} else {
    // If no ID parameter is provided, display an error message
    echo "No official ID provided.";
}
?>
