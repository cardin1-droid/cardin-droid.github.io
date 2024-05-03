


<?php

// Start session (if not already started)
session_start();

// Include database connection
include "db_connect.php";

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page
    header("Location: user-index.php");
    exit;
}?>
<?php include "head.php"; ?>
<?php include "user-nav.php"; ?>
<?php include "news.php";?>



<script src="script.js"></script>

</body>

</html>