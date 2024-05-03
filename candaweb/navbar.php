<?php
include "db_connect.php";
function generateUsername($conn)
{
    $sql = "SELECT MAX(username) AS max_username FROM users";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $max_username = $row['max_username'];

    if ($max_username) {
        $last_number = intval(substr($max_username, -5));
        $next_number = $last_number + 1;
        return '24-' . str_pad($next_number, 5, '0', STR_PAD_LEFT);
    } else {
        return '24-00001';
    }
}
$username = generateUsername($conn);
?>
<style>

.form-group {
    margin-bottom: 20px; /* Spacing between form fields */
}

input[type="text"],
input[type="password"] {
    width: 100%; /* Full width input fields */
    padding: 10px; /* Padding inside the input fields */
    border: 1px solid #ced4da; /* Border color */
    border-radius: 5px; /* Rounded corners */
}

.btn-success {
    width: 100%; /* Full width button */
    padding: 10px; /* Padding inside the button */
    border: none; /* No border */
    border-radius: 5px; /* Rounded corners */
    background-color: #28a745; /* Green background color */
    color: #ffffff; /* White text color */
    cursor: pointer; /* Cursor style */
    transition: background-color 0.3s; /* Smooth transition */
}

.btn-success:hover {
    background-color: #218838; /* Darker green background color on hover */
}

.modal-footer {
    margin-top: 20px; /* Spacing above the modal footer */
}

.modal-footer a {
    margin-right: 10px; /* Spacing between footer links */
}
</style>
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <a class="navbar-brand" href="user-index.php">Canda<span style="color: #64b5f6;">Web</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white ml-4 mr-4" href="#home-section">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white ml-4 mr-4" href="#about-section">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white ml-4 mr-4" href="#services-section">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white ml-4 mr-4" href="#officials-section">Officials</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white ml-4 mr-4" href="#contact-section">Contact</a>
            </li>
        </ul>
        <a href="login.php" class="btn btn-primary log mr-4" ><strong>Login</strong></a>
    </div>
</nav>
</section>


<div class="modal fade" id="popupCreate" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="popupModalLabel">CandaWeb</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                if (isset($error_message)) {
                    echo '<p style="color: red;">' . $error_message . '</p>';
                }
                ?>
                <form method="post" action="user-create.php">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" required>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password:</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Create User</button>
                    <a href="login.php" class="btn btn-primary">Go to Login Page</a>

                </form>

                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
<script>
    const passwordField = document.getElementById('password');
    const confirmField = document.getElementById('confirm_password');
    const showPasswordBtn = document.getElementById('showPasswordBtn');
    const showConfirmPasswordBtn = document.getElementById('showConfirmPasswordBtn');

    showPasswordBtn.addEventListener('click', function() {
        togglePasswordVisibility(passwordField);
    });

    showConfirmPasswordBtn.addEventListener('click', function() {
        togglePasswordVisibility(confirmField);
    });

    function togglePasswordVisibility(field) {
        if (field.type === "password") {
            field.type = "text";
        } else {
            field.type = "password";
        }
    }
</script>
</body>

</html>