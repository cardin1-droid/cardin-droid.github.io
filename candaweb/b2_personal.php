<?php

// Include database connection
include "db_connect.php";

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page
    header("Location: user-index.php");
    exit;
}

$username = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

$profile_info = [];

if ($result->num_rows > 0) {
    $profile_info = $result->fetch_assoc();
    $sex = $profile_info["sex"];
    $civil_status = $profile_info["civil_status"];
    $house_no = $profile_info["house_number"];
    $street = $profile_info["street"];
    $city = $profile_info["city"];
    $barangay = $profile_info["barangay"];

} else {
    $answer = ''; // Set default value if no data is retrieved
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form submission to update user profile

    // Retrieve updated profile information from the form
    $sex = $_POST["sex"];
    $civil_status = $_POST["civil_status"];
    $house_no = $_POST["house_no"];
    $street = $_POST["street"];
    $city = "Balayan";
    $barangay = "Canda";

    // Prepare and execute SQL query to update user profile information
    $updateSql = "UPDATE users SET sex = ?, civil_status = ?, house_number = ?, street = ?, city = ?, barangay = ? WHERE username = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("sssssss", $sex, $civil_status, $house_no, $street, $city, $barangay, $username);

    if ($updateStmt->execute()) {
        // Redirect to a success page or do something else after updating the data
        header("Location: b3_household.php");
        exit();
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

?>
