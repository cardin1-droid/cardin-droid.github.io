<?php

// Start the session
session_start();

include "db_connect.php";

$error_message = '';
$success_message = '';
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to fetch user details from the users table
    $sql_user = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result_user = $conn->query($sql_user);

    // SQL query to fetch user details from the admins table
    $sql_admin = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result_admin = $conn->query($sql_admin);

    if ($result_user->num_rows == 1) {
        // User found in the users table
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        header("Location: user-interface.php");

        exit;
    } elseif ($result_admin->num_rows == 1) {
        // User found in the admins table
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['admin'] = true;

        header("Location: index.php");
        exit;
    } else {
        // Invalid username or password, show error message
        $error_message = "Invalid username or password!";
    }
}

include "head.php";
?>
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
        background: url('uploads/balayan.png') center/cover fixed;


    }
</style>
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <a class="navbar-brand ml-4" href="#" style="font-size:24px;">Canda<span style="color: #7287C0; font-size:24px">Web</span></a>
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
                <form method="post" action="login.php">
                    <h2 class="font-weight-bold fill pt-4 pb-4">LOGIN</h2>
                    <div class="container">
                        <!-- Error message -->
                        <?php if (!empty($error_message)) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php endif; ?>
                        <div class="input-group mt-5">
                            <div class="input-group-prepend">
                                <span class="border-none mt-2 mr-2"><i class="bi bi-person-fill text-dark"></i></span>
                            </div>
                            <input type="text" id="username" name="username" placeholder="Username" class="form-control" required>
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


                        <a class="text-right" href="forgot.php">
                            <p style="font-size: 13px;">Forgot Password?</p>
                        </a>
                    </div>
                    <style>
                        #btn89:hover {
                            background-color: red;
                            /* Change the background color to red on hover */
                        }
                    </style>
                    <div class="form-group">
                        <button class="button pt-3 pb-3 font-weight-bold text-white" style="width: 100%; border-radius: 15px; background-color:#202a5b; border:none;" type="submit" id="btn89">Login</button>
                        <a href="user-create.php">
                            <p style="font-size: 13px;">Create an account?</p>
                        </a>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

    var loader = document.getElementById("preloader");

    window.addEventListener("load", function() {
        setTimeout(function() {
            loader.style.display = "none";
        }, 2000);

    });
</script>