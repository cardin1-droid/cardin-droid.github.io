<?php

// Include the necessary files
include 'db_connect.php';


?>

<div class="container mt-4" style="padding-top: 70px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php
            // Query to retrieve announcements
            $query = "SELECT * FROM announcement";

            // Perform the query
            $result = mysqli_query($conn, $query);

            // Check if there are announcements
            if (mysqli_num_rows($result) > 0) {
                // Output each announcement styled as a Facebook post
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="card mb-3">';
                    echo '<div class="card-header">';
                    echo '<img src="' . $row['image'] . '" class="rounded-circle mr-2" alt="' . $row['announcement_name'] . '" style="width: 30px; height: 30px;">';
                    echo '<strong>' . $row['announcement_name'] . '</strong>';
                    echo '</div>';
                    echo '<img src="' . $row['image'] . '" class="card-img-top" alt="' . $row['announcement_name'] . '">';
                    echo '<div class="card-body">';
                    echo '<p class="card-text">' . $row['message'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                // If no announcements found
                echo '<div class="alert alert-warning" role="alert">No announcements found.</div>';
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </div>
    </div>
</div>
