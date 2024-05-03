<?php
include "db_connect.php";

if (isset($_GET['username']) && !empty($_GET['username'])) {
    $username = $_GET['username'];
    $conn->query("DELETE FROM users WHERE username = '$username'");
}

$conn->close();
?>
