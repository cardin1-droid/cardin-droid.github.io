<?php
include "db_connect.php";

// Fetch data for House Acquisition
$sqlHouseAcquisition = "SELECT house_acquisition, COUNT(*) AS count FROM users GROUP BY house_acquisition";
$resultHouseAcquisition = $conn->query($sqlHouseAcquisition);

$houseAcquisitionLabels = [];
$houseAcquisitionCounts = [];

if ($resultHouseAcquisition->num_rows > 0) {
    while ($row = $resultHouseAcquisition->fetch_assoc()) {
        $houseAcquisitionLabels[] = $row['house_acquisition'];
        $houseAcquisitionCounts[] = $row['count'];
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
    <title>House Acquisition Chart</title>
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Include Chart.js datalabels plugin -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <link rel="icon" type="image/png" href="uploads/cwlogo.png">

</head>
<body>
    <canvas id="houseAcquisitionChart" width="400" height="300"></canvas>

    <script>
        // Data for House Acquisition
        const houseAcquisitionLabels = <?php echo json_encode($houseAcquisitionLabels); ?>;
        const houseAcquisitionCounts = <?php echo json_encode($houseAcquisitionCounts); ?>;

        // Chart data
        const houseAcquisitionData = {
            labels: houseAcquisitionLabels,
            datasets: [{
                label: 'House Acquisition',
                data: houseAcquisitionCounts,
                backgroundColor: 'rgba(54, 162, 235, 0.5)', // Blue color
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        // Chart configuration
        const chartConfigs = {
            type: 'bar',
            data: houseAcquisitionData,
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'House Acquisition Type'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Users'
                        }
                    }
                },
                plugins: {
                    datalabels: {
                        anchor: 'end',
                        align: 'end',
                        color: 'black',
                        formatter: function(value, context) {
                            return value;
                        }
                    }
                }
            }
        };

        // Get the chart canvas element
        const houseAcquisitionChartCanvas = document.getElementById('houseAcquisitionChart').getContext('2d');

        // Create the bar chart
        new Chart(houseAcquisitionChartCanvas, chartConfigs);
    </script>
</body>
</html>

