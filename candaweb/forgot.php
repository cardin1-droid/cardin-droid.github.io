<?php
session_start();
require 'db_connect.php'; // Include your database connection script

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];

    // Check if username and email match the records in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Generate a random verification code
        $verification_code = rand(100000, 999999);

        // Store the verification code in the database
        $stmt = $conn->prepare("UPDATE users SET confirmation_code = ? WHERE username = ?");
        $stmt->bind_param("ss", $verification_code, $username);
        $stmt->execute();

        // Send email with the verification code
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'candawebsite@gmail.com';
        $mail->Password = 'skexpexbxgbfbbet';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('candawebsite@gmail.com');
        $mail->addAddress($email);
        $mail->isHTML(true);

        $mail->Subject = 'Password Reset Verification Code';
        $mail->Body = 'Your verification code is: ' . $verification_code;

        if ($mail->send()) {
            $_SESSION['verification_username'] = $username;
            $_SESSION['verification_email'] = $email;
            header('Location: verification.php'); // Redirect to verification page
            exit();
        } else {
            echo "<script>alert('Failed to send verification code. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('Invalid username or email. Please try again.');</script>";
    }
}
include "head.php"
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
    input[type="email"],
    button {
        border: 1px solid black;
        width: 100%;
        /* Full width input fields */
        padding: 10px;
        background-color: rgb(0, 0, 0, 0);
        margin-bottom: 10px;
        border-radius: 10px;
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
                    <h2 class="font-weight-bold fill pt-4 pb-4">Forgot Password</h2>
                    <div class="container">

                        <input class="mt-3 mb-3" type="text" name="username" placeholder="Username" required><br>

                        <input type="email" name="email" placeholder="Email" required><br>

                        <button class="btn btn btn-primary mb-2" type="submit" name="submit" style="border-radius: 10px;">Submit</button>
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