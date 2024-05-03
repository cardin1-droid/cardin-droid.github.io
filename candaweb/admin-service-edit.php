<?php
session_start();
include_once "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST['service_id'], $_POST['edit_service_title'], $_POST['edit_services_text'])) {
        $service_id = $_POST['service_id'];
        $edit_service_title = $_POST['edit_service_title'];
        $edit_services_text = $_POST['edit_services_text'];

        // Check if a new image is uploaded
        if ($_FILES['edit_image']['name']) {
            $image = $_FILES['edit_image']['name'];
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($image);
            if (move_uploaded_file($_FILES['edit_image']['tmp_name'], $targetFile)) {
                // Update service in the database with new image path
                $sql = $conn->prepare("UPDATE services SET service_title = ?, services_text = ?, services_img = ? WHERE id = ?");
                $sql->bind_param("sssi", $edit_service_title, $edit_services_text, $targetFile, $service_id);
            } else {
                // Error in uploading image
                echo json_encode(array('status' => 'error', 'message' => 'Failed to upload image'));
                exit();
            }
        } else {
            // Update service in the database without changing the image path
            $sql = $conn->prepare("UPDATE services SET service_title = ?, services_text = ? WHERE id = ?");
            $sql->bind_param("ssi", $edit_service_title, $edit_services_text, $service_id);
        }

        if ($sql->execute()) {
            // Success
            echo json_encode(array('status' => 'success', 'message' => 'Service updated successfully'));
            header("Location: admin-services.php");
            exit();
        } else {
            // Error
            echo json_encode(array('status' => 'error', 'message' => 'Failed to update service'));
            exit();
        }
    } else {
        // Required fields are not set
        echo json_encode(array('status' => 'error', 'message' => 'Required fields are missing'));
        exit();
    }
} else {
    // Invalid request method
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request method'));
    exit();
}
?>
