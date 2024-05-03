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
}
include 'head.php';
include 'user-nav.php';
?>
<div class="container mt-4" style="padding-top: 5px;">
    <div class="container mt-5 cont-bg">
        <?php include 'landing-page/officials.php'; ?>
    </div>
</div>