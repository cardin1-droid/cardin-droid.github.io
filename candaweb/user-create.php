<?php
session_start();

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $password_regex = '/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&*()-_+=]).{8,}$/';

    $check_email_sql = "SELECT * FROM users WHERE email = '$email'";
    $check_email_result = $conn->query($check_email_sql);
    if ($check_email_result->num_rows > 0) {
        $error_message = "Error: Email already exists.";
    } elseif (!preg_match($password_regex, $password)) {
        $error_message = "Error: Password must contain at least 8 characters, including at least one number, one uppercase letter, one lowercase letter, and one special character. Example: Mypassword@123";
    } elseif ($password !== $confirm_password) {
        $error_message = "Error: Passwords do not match.";
    } else {
        // No verification code needed anymore

        // Store user input data in session
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['username'] = generateUsername($conn);

        // Redirect to verification page
        header('Location: user-create.php');
        exit();
    }
}

include "head.php";
?>
<!-- Your HTML content -->

<style>
    body {
        background-color: rgba(0, 0, 0, 0.7);
    }

    .navbar-nav .nav-item {
        border-bottom: 2px solid transparent;
        transition: border-bottom 0.3s ease;
    }

    .navbar-nav .nav-item:hover {
        border-bottom: 4px solid #1565c0;
        /* Border bottom color on hover */
    }

    .navbar-nav .nav-item .nav-link:hover {
        color: #1565c0;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        /* Full width input fields */
        padding: 10px;
        background-color: rgb(0, 0, 0, 0);
    }

    .fill {
        background-color: #202a5b;
    }

    .login-section {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        /* Ensure the container is positioned */
        color: #fff;
        text-align: center;
        background: url('uploads/vanishing-stripes.png') center/cover fixed;

    }
</style>
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <a class="navbar-brand ml-5" href="#" style="font-size:24px;">Canda<span style="color: #7287C0; font-size:24px">Web</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link  ml-4 mr-4" href="user-index.php" style="color:#4159AA; font-size:18px">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ml-4 mr-4" href="user-index.php#about-section" style="color:#4159AA; font-size:18px">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ml-4 mr-4" href="user-index.php#services-section" style="color:#4159AA; font-size:18px">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ml-4 mr-4" href="user-index.php#officials-section" style="color:#4159AA; font-size:18px">Officials</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ml-4 mr-4" href="user-index.php#contact-section" style="color:#4159AA; font-size:18px">Contact</a>
            </li>
        </ul>
        <a href="login.php" class="btn log mr-4 pr-4 pl-4 text-white" style="border-radius: 20px; background-color:#4159AA;"><strong>Login</strong></a>
    </div>
</nav>
<div class="login-section">
    <div class="container mt-5">
        <div class="row justify-content-center ">
            <div class="col-md-4 bg-light rounded" style="box-shadow:  4px 6px rgba(0, 0, 0, .1);">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <h2 class="font-weight-bold fill pt-4 pb-4">Create Account</h2>
                    <div class="container">
                        <!-- Error message -->
                        <?php if (isset($error_message)) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($success_message)) : ?>
                            <div class="alert alert-success" role="success">
                                <?php echo $success_message; ?>
                            </div>
                        <?php endif; ?>
                        <div class="input-group mt-5">
                            <div class="input-group-prepend">
                                <span class="border-none mt-2 mr-2"><i class="bi bi-person-fill text-dark"></i></span>
                            </div>
                            <input type="text" id="username" name="username" placeholder="Username" class="form-control" value="<?php echo $username; ?>" readonly required>
                        </div>
                        <div class="input-group mt-4">
                            <div class="input-group-prepend">
                                <span class="border-none mt-2 mr-2"><i class="bi bi-envelope-fill text-dark"></i></span>
                            </div>
                            <input type="email" id="email" name="email" placeholder="Email" class="form-control" required>
                        </div>
                        
                        <div class="input-group mt-4">
                            <div class="input-group-prepend">
                                <span class="border-none mt-2 mr-2"><i class="bi bi-lock-fill text-dark "></i></span>
                            </div>
                            <input type="password" id="password" name="password" placeholder="Password" class="form-control" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" class="form-check-input" id="showPasswordCheckbox" onclick="showPassword()">
                                </div>
                            </div>
                        </div>
                        <div class="input-group mt-4">
                            <div class="input-group-prepend">
                                <span class="border-none mt-2 mr-2"><i class="bi bi-lock-fill text-dark"></i></span>
                            </div>
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" class="form-control" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" class="form-check-input" id="showPasswordCheckbox" onclick="cshowPassword()">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group mt-4">
                        <button class="button pt-3 pb-3 font-weight-bold text-white" style="width: 100%; border-radius: 15px; background-color:#202a5b; border:none;" type="submit">Create Account</button>
                        <a href="login.php">
                            <p>Already have an account? Login here</p>
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<!-- JavaScript and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function showPassword() {
        var passwordField = document.getElementById("password");
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

<?php
include "footer.php";
?>
