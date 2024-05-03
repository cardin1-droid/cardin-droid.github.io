<?php
session_start();
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if(isset($_POST['announcement_id'], $_POST['edit_announcement_name'], $_POST['edit_message'])) {
        $announcement_id = $_POST['announcement_id'];
        $edit_announcement_name = $_POST['edit_announcement_name'];
        $edit_message = $_POST['edit_message'];

        // Check if a new image is uploaded
        if ($_FILES['edit_image']['name']) {
            $image = $_FILES['edit_image']['name'];
            $path = 'images/' . $image;
            move_uploaded_file($_FILES['edit_image']['tmp_name'], $path);
            
            // Update announcement in the database with new image path
            $sql = $conn->prepare("UPDATE announcement SET image = ?, announcement_name = ?, message = ? WHERE id = ?");
            $sql->bind_param("sssi", $path, $edit_announcement_name, $edit_message, $announcement_id);
        } else {
            // Update announcement in the database without changing the image path
            $sql = $conn->prepare("UPDATE announcement SET announcement_name = ?, message = ? WHERE id = ?");
            $sql->bind_param("ssi", $edit_announcement_name, $edit_message, $announcement_id);
        }

        if ($sql->execute()) {
            // Success, redirect to admin-announcements.php
            header("Location: admin-announcements.php");
            exit(); // Ensure that no further code execution occurs after redirection
        }
         else {
            // Error
            echo json_encode(array('status' => 'error', 'message' => 'Failed to update announcement'));
        }
    } else {
        // Required fields are not set
        echo json_encode(array('status' => 'error', 'message' => 'Required fields are missing'));
    }
} else {
    // Invalid request method
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request method'));
}
?>
