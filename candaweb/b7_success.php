<?php 
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: user-index.php");
    exit;
}


include "head.php"; ?>

<?php include "user-nav.php"; ?>

<link rel="stylesheet" href="style-progressbar.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<section style="padding-top:70px ;">
    <div class="container">
        <ul class="step-wizard-list">
            <li class="step-wizard-item">
                <span class="progress-count">1</span>
                <span class="progress-label">Personal Information</span>
            </li>
            <li class="step-wizard-item ">
                <span class="progress-count">2</span>
                <span class="progress-label">Family Information</span>
            </li>
            <li class="step-wizard-item">
                <span class="progress-count">3</span>
                <span class="progress-label">Health Information</span>
            </li>
            <li class="step-wizard-item ">
                <span class="progress-count">4</span>
                <span class="progress-label">Additional Information</span>
            </li>
            <li class="step-wizard-item current-item">
                <span class="progress-count">5</span>
                <span class="progress-label">Success</span>
            </li>
        </ul>
    </div>
</section>
<section>
    <div class="container ">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 bg-white " style="border-radius: 10px;">
                <div class="row justify-content-center pt-4">
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        <img src="uploads/s-fill.jpg" class="img-fluid" alt="Responsive image">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <h1 class="text-center font-weight-bold" style="color: #202A5B;">Successfully Submit!</h1>
                    </div>
                </div>
                <div class="row justify-content-center pb-4">
                    <a href="user-interface.php" class="text-success" style="text-decoration: none;">Continue</a>
                </div>
            </div>
        </div>
    </div>


</section>