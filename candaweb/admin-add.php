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

// Initialize variables
$add_success = false;
$delete_success = false;
$error_message = "";

// If the form is submitted to add admin
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_admin'])) {
    // Retrieve new username and passwords from the form
    $new_username = $_POST['new_username'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($new_password !== $confirm_password) {
        $error_message = "Error: Passwords do not match";
    } else {
        // Insert new admin into the database
        $insert_sql = "INSERT INTO admin (username, password) VALUES ('$new_username', '$new_password')";
        try {
            if ($conn->query($insert_sql) === TRUE) {
                // Set add success flag to true
                $add_success = true;
            }
        } catch (mysqli_sql_exception $e) {
            // Check if the error is due to a duplicate entry
            if ($e->getCode() == 1062) {
                // Set error message
                $error_message = "Error: Username is already in use";
            } else {
                $error_message = "Error: " . $e->getMessage();
            }
        }
    }
}

// If the form is submitted to delete admin
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_admin'])) {
    // Retrieve admin username to delete
    $admin_to_delete = $_POST['admin_to_delete'];

    // Delete admin from the database
    $delete_sql = "DELETE FROM admin WHERE username = '$admin_to_delete'";
    if ($conn->query($delete_sql) === TRUE) {
        // Set delete success flag to true
        $delete_success = true;
    } else {
        $error_message = "Error deleting admin: " . $conn->error;
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
                    <h2 class="font-weight-bold">Admin Management</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row bg-light rounded">
                <div class="col-md-6 p-4">
                    <div class="container">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <?php if (!empty($error_message)) : ?>
                                <p style="color: red;"><?php echo $error_message; ?></p>
                            <?php endif; ?>
                            <?php if ($add_success) : ?>
                                <p style="color: green;">Admin added successfully!</p>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="new_username">Username</label>
                                <input type="text" class="form-control" id="new_username" name="new_username" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label for="new_password">Password</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter password">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="showPasswordCheckbox" onclick="showPassword()">
                                    <label class="form-check-label" for="showPasswordCheckbox">Show Password</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="PasswordCheckbox" onclick="cshowPassword()">
                                    <label class="form-check-label" for="PasswordCheckbox">Show Password</label>
                                </div>
                            </div>
                            <button class="btn btn-success btn-block" type="submit" name="add_admin">Add Admin</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 p-4">
    <div class="container">
        <h3>Admin List</h3>
        <?php if ($delete_success) : ?>
            <p style="color: green;">Admin deleted successfully!</p>
        <?php endif; ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Retrieve admins from the database
                $admins_query = "SELECT username FROM admin";
                $admins_result = $conn->query($admins_query);

                if ($admins_result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $admins_result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td><form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
                        echo "<input type='hidden' name='admin_to_delete' value='" . $row["username"] . "'>";
                        echo "<button class='btn btn-danger' type='submit' name='delete_admin'>Delete</button>";
                        echo "</form></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No admins found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

            </div>
        </div>
    </div>
</section>

<script>
    function showPassword() {
        var passwordField = document.getElementById("new_password");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }

    function cshowPassword() {
        var passwordField = document.getElementById("confirm_password");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
</script>
