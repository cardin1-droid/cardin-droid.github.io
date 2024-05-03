<?php
// Include the necessary database connection file
include_once "db_connect.php";

// Check if an ID parameter is provided
if (isset($_GET['id'])) {
    // Retrieve the official's details from the database based on the ID
    $official_id = $_GET['id'];
    
    // Perform database query to retrieve official's details
    $sql = "SELECT * FROM officials WHERE id = $official_id";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Store the retrieved details in variables
        $name = $row['name'];
        $position = $row['position'];
        $image_url = $row['image_url'];
    } else {
        // If the official with the provided ID does not exist, display an error message
        echo "Official not found.";
    }
} else {
    // If no ID parameter is provided, display an error message
    echo "No official ID provided.";
}
?>

<?php include "head.php"; ?> <!-- Include the common head.php file -->

<body>
    <h1>Edit Official</h1>

    <div class="container">
        <div class="row">
            <?php if (isset($name) && isset($position) && isset($image_url)) : ?>
                <div class="col-md-6">
                    <img src="<?php echo $image_url; ?>" alt="Official Image" style="height: 275px;"><br>
                    <form action="admin-officials-update.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $official_id; ?>">
                        Name: <input type="text" name="name" value="<?php echo $name; ?>"><br>
                        Position: <input type="text" name="position" value="<?php echo $position; ?>"><br>
                        Update Picture: <input type="file" name="image" onchange="previewImage(this);"><br> <!-- Field for updating the picture -->
                        <input type="submit" value="Update Official">
                    </form>
                </div>
                <div class="col-md-6">
                    <h2>Preview</h2>
                    <img id="preview" src="<?php echo $image_url; ?>" alt="Image Preview" style="max-width: 275px; height: 275px;">
                </div>
            <?php endif; ?>
        </div>
    </div>


    
    <!-- Include any necessary JavaScript scripts here -->
    <script>
        function previewImage(input) {
            var preview = document.getElementById('preview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
