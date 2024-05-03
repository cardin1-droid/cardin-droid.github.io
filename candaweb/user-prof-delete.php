<?php
session_start();

include "db_connect.php";

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: user-index.php");
    exit;
}

$username = $_SESSION['username'];

// Remove the profile picture
unset($_SESSION['profile_picture']);

// Update the database to remove the profile picture path
$updateSql = "UPDATE users SET profile_picture = NULL WHERE username = '$username'";
if ($conn->query($updateSql) === TRUE) {
    $_SESSION['message'] = "Profile picture removed successfully.";
} else {
    $_SESSION['message'] = "Error removing profile picture: " . $conn->error;
}

// Redirect back to the profile page
header("Location: user-profile.php");
exit;
?>
