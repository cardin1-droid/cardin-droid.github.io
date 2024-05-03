<?php

include "db_connect.php"; // Include your database connection file

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Population Rate Chart</title>
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="icon" type="image/png" href="uploads/cwlogo.png">

</head>

<body>
<h3 class="font-weight-bold">Population Rate</h3>
    <canvas id="populationChart" width="400" height="300"></canvas>

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

