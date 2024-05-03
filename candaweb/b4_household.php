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
    $city = $_POST["city"];

    // Prepare and execute SQL query to update user profile information
    $updateSql = "UPDATE users SET sex = ?, civil_status = ?, house_number = ?, street = ?, city = ? WHERE username = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("ssssss", $sex, $civil_status, $house_no, $street, $city, $username);

    if ($updateStmt->execute()) {
        // Redirect to a success page or do something else after updating the data
        header("Location: b5_health.php");
        exit();
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

?>

<?php include "head.php"; ?>

<?php include "user-nav.php"; ?>

<div class="container cont-color">
    <h1 style="margin-top: 80px;">Family Information</h1>
    <div class="container">
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        ilalagay dito family members 
        <a href="b3_household.php" class="btn btn-primary">Back</a>
        <button type="submit" class="btn btn-success">next</button>

    </form>
</div>
</body>
</html>
