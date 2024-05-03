<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page
    header("Location: user-index.php");
    exit;
}

include "db_connect.php";
include "head.php";
include "admin-nav.php";



// Fetch the count of users for each year
$sql = "SELECT YEAR(birthdate) AS year, COUNT(*) AS user_count FROM users WHERE birthdate IS NOT NULL GROUP BY YEAR(birthdate)";
$result = $conn->query($sql);

// Initialize arrays to store data for the chart
$years = [];
$userCounts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $years[] = $row['year'];
        $userCounts[] = $row['user_count'];
    }
}

// Close the database connection
$conn->close();
?>
?>
<section style="padding-top: 70px;">
    <div class="container ">
        <div class="row mb-2">
            <div class="col-md-12 rounded p-2 float-left" style="color: #202A5B;">
                <h2 class="font-weight-bold">DASHBOARD</h2>
            </div>
        </div>
        <div class="row bg-light rounded">
            <div class="col-md-12">
                <h3 class="font-weight-bold pl-2 pt-4">Summary Report</h3>
            </div>
        </div>
        <div class="row bg-light rounded mb-2 pt-2 pb-2 justify-content-center">
            <div class="col-md-3 mb-3 bg-custom-blue pt-4 pb-2 mr-2 ml-2 rounded">
                <?php include "dash-population.php"; ?>
            </div>
            <div class="col-md-3 mb-3 bg-custom-color pt-4 pb-2 mr-2 ml-2 rounded">
                <?php include "dash-4ps.php"; ?>
            </div>
            <div class="col-md-3 mb-3 bg-color-senior pt-4 pb-2 mr-2 ml-2 rounded">
                <?php include "dash-senior.php"; ?>
            </div>
        </div>
        <div class="row bg-light mb-2 pt-2 pb-2 justify-content-center">
            <div class="col-md-8 mb-2">
                <div class="bg-light rounded">
                    <h3 class="font-weight-bold custom-font-size">Population by Age</h3>
                    <?php include "dash-pop-street.php"; ?>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="bg-light rounded">
                    <h3 class="font-weight-bold custom-font-size">Gender Rate</h3>
                    <?php include "dash-sex.php"; ?>
                </div>
            </div>


        </div>





        <div class="row bg-light rounded mb-2 pt-2 pb-2 justify-content-center">
            <div class="col-md-6 text-center">
                <h3 class="font-weight-bold custom-font-size">Daily Meal Frequency</h3>
                <?php include "dash-meals.php"; ?>
            </div>
            <div class="col-md-6 text-center">
                <h3 class="font-weight-bold custom-font-size">Vegetable Gardens Ownership</h3>
                <?php include "dash-vege.php"; ?>
            </div>



        </div>
        <div class="row bg-light rounded mb-2 pt-2 pb-2 justify-content-center">
            <div class="col-md-6 text-center">
                <h3 class="font-weight-bold custom-font-size">Family Planning Practices</h3>
                <?php include "dash-famplan.php"; ?>
            </div>
            <div class="col-md-6 text-center">
                <h3 class="font-weight-bold custom-font-size">Lot Ownership</h3>
                <?php include "dash-lot.php"; ?>
            </div>
        </div>

        <style>
            .bg-custom-blue {
                background-color: #202A5B;
            }

            .bg-custom-color {
                background-color: #2f3550;
            }

            .bg-color-senior {
                background-color: #4d5f77
            }

            .custom-font-size {
                font-size: 20px;
                margin-left: 10px;
            }
        </style>

    </div>

</section>

<script>
    // Get the data from PHP variables
    var years = <?php echo json_encode($years); ?>;
    var userCounts = <?php echo json_encode($userCounts); ?>;

    // Create the line chart
    var ctx = document.getElementById('populationChart').getContext('2d');
    var populationChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: years,
            datasets: [{
                label: 'Population Rate',
                data: userCounts,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Year'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Population Rate'
                    }
                }
            }
        }
    });
</script>