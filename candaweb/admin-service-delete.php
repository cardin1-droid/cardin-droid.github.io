<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: user-index.php");
    exit;
}
include_once "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $service_id = $_GET['id'];

    // Delete the service entry based on ID
    $sql = "DELETE FROM services WHERE id = $service_id";

    if ($conn->query($sql) === TRUE) {
        $message = "<div class='container mt-3'><div class='alert alert-success' role='success'>Service information deleted successfully.</div></div>";
    } else {
        $message = "Error deleting service information: " . $conn->error;
    }

    $conn->close();

    // Redirect back to the main page after deletion
    header("Location: admin-services.php");
    exit;
} else {
    // If ID is not provided or request method is not GET, redirect to the main page
    header("Location: admin-services.php");
    exit;
}
?>
