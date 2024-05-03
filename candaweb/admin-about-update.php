<?php
// Include the necessary database connection file
include_once "db_connect.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST['id']) && isset($_POST['about_text'])) {
        // Retrieve data from the form
        $about_id = $_POST['id'];
        $about_text = $_POST['about_text'];

        // Check if a new image is uploaded
        if ($_FILES['image']['size'] > 0) {
            // Upload the new image
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($_FILES['image']['name']);

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                // Update the about details in the database, including the new image URL
                $sql = "UPDATE about SET about_text = '$about_text', about_image = '$targetFile', created_at = NOW() WHERE id = $about_id";

                if ($conn->query($sql) === TRUE) {
                    // Redirect to the about page with a success message
                    header("Location: admin-about.php?message=About updated successfully");
                    exit();
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            // If no new image is uploaded, update the about details without changing the image URL
            $sql = "UPDATE about SET about_text = '$about_text', created_at = NOW() WHERE id = $about_id";

            if ($conn->query($sql) === TRUE) {
                // Redirect to the about page with a success message
                header("Location: admin-about.php?message=About updated successfully");
                exit();
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    } else {
        echo "Required fields are missing.";
    }
} else {
    // If the form is not submitted, redirect to the about page
    header("Location: admin-about.php");
    exit();
}
?>
