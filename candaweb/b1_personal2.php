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

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);
$profile_info = [];

if ($result->num_rows > 0) {
    $profile_info = $result->fetch_assoc();
}

$first_name = $profile_info['first_name'];
$middle_name = $profile_info['middle_name'];
$last_name = $profile_info['last_name'];
$birthdate = $profile_info['birthdate'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form submission to update user profile

    // Retrieve updated profile information from the form
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $birthdate = $_POST['birthdate'];

    // Prepare and execute SQL query to update user profile information
    $sql_update = "UPDATE users SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', birthdate = '$birthdate' WHERE username = '$username'";
    if ($conn->query($sql_update) === TRUE) {
        $conn->close();

        // Redirect to a success page or do something else after updating the data
        header("Location: b2_personal.php");
        exit();
    }
}

?>

<?php include "head.php"; ?>

<?php include "user-nav.php"; ?>
<style>
    #cont1{
        position: relative;
        padding: 0;
        height: 50vh;
    }
    #cont2{
        box-shadow: 2px 2px 5px black;
        border-radius: 10px;
        height: 35vh;
        margin-left:5rem ;
        width: 63vw;
        background-color: #B5C0D0;
    }
    #cont2 h5{
        color: #1565c0;
    }
    input{
        box-shadow: 1px 1px 3px black;
        border: none;
        border-radius: 10px;
        padding: 10px 10px;
    }
    #fn{
        font-weight: bold;
        margin-left:3.4rem;
        padding: 19px 10px;
    }
    #bd{
        font-weight: bold;
        margin-left:3rem;
        padding: 28px 20px;
    }
</style>

<div class="container"id="cont1">
    <h1 class="container text-center"style="margin-top:80px;font-weight: bold; color: #1565c0;">Personal Information</h1>
    <div class="container" id="cont2">
        <h5 id="fn">Full Name</h5>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <input class="text-center" style="margin-left:3.5rem;"type="text" id="first_name" name="first_name" placeholder="First name" value="<?php echo $first_name; ?>" required>
            <input class="text-center"style="margin-left: 3rem;" type="text" id="middle_name" name="middle_name" placeholder="Middle name" value="<?php echo $middle_name; ?>">
            <input class="text-center"style="margin-left: 3rem;"  type="text" id="last_name" name="last_name" placeholder="Last name" value="<?php echo $last_name; ?>" required>
            <button style="position: absolute;margin-left:9rem;"type="submit" class="btn btn-success">next</button>
            <h5 id="bd">Birthdate</h5>
            <input class="text-center"style="margin-left: 3.5rem;width: 48.3rem;" type="date" name="birthdate" value="<?php echo $birthdate; ?>">
        </form>
    </div>
</div>


</body>

</html>