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

<?php include "user-nav.php"; ?>

<section style="padding-top: 70px;">
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-7 rounded p-2 float-left" style="color: #202A5B;">
                <h2 class="font-weight-bold">REQUEST DATA</h2>
            </div>

        </div>
        <div class="container bg-light rounded pb-4">
            <div class="row ">
                <div class="col-md-10">
                    <h3 class="font-weight-bold pl-2 pt-4">CERTIFICATE OF INDIGENCY</h3>
                </div>
                <div class="col-md-2 text-center justify-content-center pt-4">
                    <button onclick="printIndigency()" class="btn btn-success btn-block"><i class="bi bi-printer mr-2"></i>Print</button>
                </div>
            </div>
            <hr>
            <div class="row ">
                <div class="col-md-10">
                    <h3 class="font-weight-bold pl-2 pt-2">BARANGAY CLEARANCE</h3>
                </div>
                <div class="col-md-2 text-center justify-content-center pt-2">
                    <button onclick="printClearance()" class="btn btn-success btn-block"><i class="bi bi-printer mr-2"></i>Print</button>
                </div>
            </div>
            <hr>
            <div class="row ">
                <div class="col-md-10">
                    <h3 class="font-weight-bold pl-2 pt-2">BARANGAY HEALTH CERTIFICATE</h3>
                </div>
                <div class="col-md-2 text-center justify-content-center pt-2">
                    <button onclick="printHealth()" class="btn btn-success btn-block"><i class="bi bi-printer mr-2"></i>Print</button>
                </div>
            </div>
        </div>

    </div>
</section>
<script>
    function printIndigency() {
        var features = 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=800,height=600';

        // Open a new window or tab with the desired page URL
        var newWindow = window.open('indigency.php', '_blank');
        
        // Once the new window is open, wait for it to load
        newWindow.onload = function() {
            // Call the print function for the new window
            newWindow.print();
        };
    }
    function printClearance() {
        var features = 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=800,height=600';

        // Open a new window or tab with the desired page URL
        var newWindow = window.open('clearance.php', '_blank');
        
        // Once the new window is open, wait for it to load
        newWindow.onload = function() {
            // Call the print function for the new window
            newWindow.print();
        };
    }
    function printHealth() {
        var features = 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=800,height=600';

        // Open a new window or tab with the desired page URL
        var newWindow = window.open('health.php', '_blank');
        
        // Once the new window is open, wait for it to load
        newWindow.onload = function() {
            // Call the print function for the new window
            newWindow.print();
        };
    }
</script>




<script src="script.js"></script>