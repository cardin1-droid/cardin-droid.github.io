<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: user-index.php");
    exit;
}
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if(isset($_POST['about_id'], $_POST['edit_about_text'])) {
        $about_id = $_POST['about_id'];
        $edit_about_text = $_POST['edit_about_text'];

        // Check if a new image is uploaded
        if ($_FILES['edit_about_image']['name']) {
            $image = $_FILES['edit_about_image']['name'];
            $path = 'uploads/' . $image;
            move_uploaded_file($_FILES['edit_about_image']['tmp_name'], $path);
            
            // Update about in the database with new image path
            $sql = $conn->prepare("UPDATE about SET about_text = ?, about_image = ? WHERE id = ?");
            $sql->bind_param("ssi", $edit_about_text, $path, $about_id);
        } else {
            // Update about in the database without changing the image path
            $sql = $conn->prepare("UPDATE about SET about_text = ? WHERE id = ?");
            $sql->bind_param("si", $edit_about_text, $about_id);
        }

        if ($sql->execute()) {
            // Success, redirect to admin-about.php
            header("Location: admin-about.php");
            exit(); // Ensure that no further code execution occurs after redirection
        }
         else {
            // Error
            echo json_encode(array('status' => 'error', 'message' => 'Failed to update about'));
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
