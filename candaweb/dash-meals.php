<?php
// Include your database connection file
include "db_connect.php";

// Fetch data from the database, excluding null values
$sql = "SELECT meals_daily, COUNT(*) AS total FROM users WHERE meals_daily IS NOT NULL GROUP BY meals_daily";
$result = $conn->query($sql);

// Initialize arrays to store data
$labels = [];
$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Capitalize the first letter of each meal option
        $meal = ucfirst($row['meals_daily']);
        // Put 'Yes' first in the bar chart
        if ($meal === 'Yes') {
            array_unshift($labels, $meal);
            array_unshift($data, $row['total']);
        } else {
            $labels[] = $meal;
            $data[] = $row['total'];
        }
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
    <title>Meals Per Day Bar Chart</title>
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="icon" type="image/png" href="uploads/cwlogo.png">

</head>

<body>
    <canvas id="mealsChart" width="300" height="200"></canvas>

    <script>
        // Data from PHP
        const labels = <?php echo json_encode($labels); ?>;
        const data = <?php echo json_encode($data); ?>;

        // Chart data
        const mealsData = {
            labels: labels,
            datasets: [{
                label: 'Population',
                data: data,
                backgroundColor: [
                    'rgba(39, 59, 226)', // Red for 'Yes'
                    'rgba(31, 56, 85)', // Blue for 'No'
                ],
               
               
            }]
        };

        // Chart configuration
        const chartConfig = {
            type: 'bar',
            data: mealsData,
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: '3 Meals per Day'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Population'
                        }
                    }
                }
            }
        };

        // Get the chart canvas element
        const mealsChartCanvas = document.getElementById('mealsChart').getContext('2d');

        // Create the bar chart
        new Chart(mealsChartCanvas, chartConfig);
    </script>
</body>

</html>
