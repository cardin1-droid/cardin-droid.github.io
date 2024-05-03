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

$sql = "SELECT * FROM admin WHERE username = '$username'";
$result = $conn->query($sql);

$profile_info = [];

if ($result->num_rows > 0) {
    $profile_info = $result->fetch_assoc();
}

// Variable to track if the profile update was successful
$update_success = false;

// If the form is submitted, update the profile
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve new username and password from the form
    $new_username = $_POST['username'];
    $new_password = $_POST['password'];

    // Update the database with the new values
    $update_sql = "UPDATE admin SET username='$new_username', password='$new_password' WHERE username='$username'";
    if ($conn->query($update_sql) === TRUE) {
        // Update session with new username
        $_SESSION['username'] = $new_username;
        // Refresh profile_info array with updated values
        $profile_info['username'] = $new_username;
        $profile_info['password'] = $new_password;
        // Set update success flag to true
        $update_success = true;
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

?>

<?php include "head.php"; ?>

<?php include 'admin-nav.php'; ?>


<section style="padding: 70px;">
    <div class="row justify-content-center">
        <div class="container-fluid ">
            <div class="row mb-2">
                <div class="col-md-7 rounded p-2 float-left" style="color: #202A5B;">
                    <h2 class="font-weight-bold">Account Settings</h2>
                </div>

            </div>
        </div>
        <div class="container-fluid">
            <div class="row bg-light rounded">
                <div class="col-md-6 p-4">
                    <h3 class="font-weight-bold pl-2">Admin Profile</h3>
                    <div class="container">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo isset($profile_info['username']) ? $profile_info['username'] : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="<?php echo isset($profile_info['password']) ? $profile_info['password'] : ''; ?>">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="showPasswordCheckbox" onclick="showPassword()">
                                    <label class="form-check-label" for="showPasswordCheckbox">Show Password</label>
                                </div>
                            </div>

                            <button class="btn btn-success btn-block" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">

            </div>
        </div>
    </div>
    </div>
</section>



<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="popupModalLabel">CandaWeb</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="userDetailsContent">
                <p>Profile updated successfully!</p>
            </div>
        </div>

    </div>
</div>

<script>
    function showPassword() {
        var passwordField = document.getElementById("password");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }


    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // Show the modal if the profile update was successful
    <?php if ($update_success) : ?>
        modal.style.display = "block";
    <?php endif; ?>

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<script src="script.js"></script>