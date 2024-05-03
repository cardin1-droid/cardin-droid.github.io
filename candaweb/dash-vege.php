<?php
include "db_connect.php"; // Include your database connection file

// Fetch count of users with vegetable gardens
$sqlYes = "SELECT COUNT(*) AS count FROM users WHERE vege_garden = 'Yes'";
$resultYes = $conn->query($sqlYes);
$rowYes = $resultYes->fetch_assoc();
$vegetableGardensYesCount = $rowYes['count'];

// Fetch count of users without vegetable gardens
$sqlNo = "SELECT COUNT(*) AS count FROM users WHERE vege_garden = 'No'";
$resultNo = $conn->query($sqlNo);
$rowNo = $resultNo->fetch_assoc();
$vegetableGardensNoCount = $rowNo['count'];

// Close the database connection
$conn->close();
?>

<canvas id="vegetableGardensChart" width="300" height="200"></canvas>
<script>
    var vegetableGardensChartCanvas = document.getElementById('vegetableGardensChart').getContext('2d');
    var vegetableGardensChart = new Chart(vegetableGardensChartCanvas, {
        type: 'bar',
        data: {
            labels: ['Yes', 'No'],
            datasets: [{
                label: 'Vegetable Gardens',
                data: [<?php echo $vegetableGardensYesCount; ?>, <?php echo $vegetableGardensNoCount; ?>],
                backgroundColor: [
                    'rgba(0, 146, 162)',
                    'rgba(128, 191, 215)',
                ],
                
                
            }]
        },
        options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Own a Vegetable Garden'
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
    });
</script>
