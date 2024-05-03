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

// If the user is logged in, proceed with the rest of the page content
?>

<?php include "head.php"; ?>

<?php include "admin-nav.php"; ?>

<section style="padding-top: 70px;">
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-7 rounded p-2 float-left" style="color: #202A5B;">
                <h2 class="font-weight-bold">REQUEST DATA</h2>
            </div>

        </div>
        <div class="container bg-light rounded">
            <div class="row ">
                <div class="col-md-10">
                    <h3 class="font-weight-bold pl-2 pt-4">CERTIFICATE OF INDIGENCY</h3>
                </div>
                <div class="col-md-2 text-center justify-content-center pt-4">
                    <a href="fill-indigency.php" type="button" class="btn btn-primary">Fill up</a>
                </div>
            </div>
            <hr>
            <div class="row ">
                
            </div>
        </div>

    </div>
</section>





<script src="script.js"></script>