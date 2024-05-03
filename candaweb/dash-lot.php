<?php
include "db_connect.php";

// Fetch data for Lot Ownership
$sqlLotOwnership = "SELECT lot_ownership, COUNT(*) AS count FROM users GROUP BY lot_ownership";
$resultLotOwnership = $conn->query($sqlLotOwnership);

$lotOwnershipLabels = [];
$lotOwnershipCounts = [];

if ($resultLotOwnership->num_rows > 0) {
    while ($row = $resultLotOwnership->fetch_assoc()) {
        $lotOwnershipLabels[] = $row['lot_ownership'];
        $lotOwnershipCounts[] = $row['count'];
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
    <title>Lot Ownership Chart</title>
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="icon" type="image/png" href="uploads/cwlogo.png">

</head>
<body>
    <canvas id="lotOwnershipChart" width="400" height="300"></canvas>

    <script>
        // Data for Lot Ownership
        const lotOwnershipLabels = <?php echo json_encode($lotOwnershipLabels); ?>;
        const lotOwnershipCounts = <?php echo json_encode($lotOwnershipCounts); ?>;

        // Chart data
        const lotOwnershipData = {
            labels: lotOwnershipLabels,
            datasets: [{
                label: 'Lot Ownership',
                data: lotOwnershipCounts,
                backgroundColor: 'rgba(0, 60, 95)', // Red color
                
            }]
        };

        // Chart configuration
        const chartConfiga = {
            type: 'bar',
            data: lotOwnershipData,
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Lot Type'
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
        const lotOwnershipChartCanvas = document.getElementById('lotOwnershipChart').getContext('2d');

        // Create the bar chart
        new Chart(lotOwnershipChartCanvas, chartConfiga);
    </script>
</body>
</html>
