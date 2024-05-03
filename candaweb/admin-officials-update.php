<?php
// Include the necessary database connection file
include_once "db_connect.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['position'])) {
        // Retrieve data from the form
        $official_id = $_POST['id'];
        $name = $_POST['name'];
        $position = $_POST['position'];

        // Check if a new image is uploaded
        if ($_FILES['image']['size'] > 0) {
            // Upload the new image
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($_FILES['image']['name']);

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                // Update the official details in the database, including the new image URL
                $sql = "UPDATE officials SET name = '$name', position = '$position', image_url = '$targetFile' WHERE id = $official_id";

                if ($conn->query($sql) === TRUE) {
                    // Redirect to the officials page with a success message
                    header("Location: admin-officials.php?message=Official updated successfully");
                    exit();
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            // If no new image is uploaded, update the official details without changing the image URL
            $sql = "UPDATE officials SET name = '$name', position = '$position' WHERE id = $official_id";

            if ($conn->query($sql) === TRUE) {
                // Redirect to the officials page with a success message
                header("Location: admin-officials2.php?message=Official updated successfully");
                exit();
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    } else {
        echo "Required fields are missing.";
    }
} else {
    // If the form is not submitted, redirect to the officials page
    header("Location: admin-officials2.php");
    exit();
}
?>
