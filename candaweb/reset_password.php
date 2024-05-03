<?php
session_start();
require 'db_connect.php'; // Include your database connection script

if (!isset($_SESSION['verification_username']) || !isset($_SESSION['verification_email'])) {
    // If session variables are not set, redirect back to the forgot password page
    header('Location: index.php');
    exit();
}

if (isset($_POST["reset"])) {
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validate password and confirm password
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match. Please try again.');</script>";
    } else {
        // Hash the new password
        $hashed_password = $password;

        // Update the password in the database
        $username = $_SESSION['verification_username'];
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
        $stmt->bind_param("ss", $hashed_password, $username);
        $stmt->execute();

        // Password reset successful, redirect to login page
        echo "<script>alert('Password reset successfully. Please login with your new password.');</script>";
        header('Location: login.php'); // Redirect to login page
        exit();
    }
}
?>

<?php
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
                <form method="post" action="">
                    <h2 class="font-weight-bold fill pt-4 pb-4">
                        Reset Password
                    </h2>
                    <div class="container">

                        <div class="form-group">
                            <input class="mb-2" placeholder="New Password" type="password" name="password" required>

                            <input class="mb-2"placeholder="Confirm New Password" type="password" name="confirm_password" required><br>
                            <button type="submit" class="btn btn-primary btn-block mb-4" name="reset">Reset</button>
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
    var loader = document.getElementById("preloader");

    window.addEventListener("load", function() {
        setTimeout(function() {
            loader.style.display = "none";
        }, 2000);

    });
</script>