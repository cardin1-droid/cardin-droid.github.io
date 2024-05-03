<?php
include "db_connect.php"; // Include your database connection file

// Fetch count of users with herbal plants
$sqlYes = "SELECT COUNT(*) AS count FROM users WHERE herbal_plant = 'Yes'";
$resultYes = $conn->query($sqlYes);
$rowYes = $resultYes->fetch_assoc();
$herbalPlantsYesCount = $rowYes['count'];

// Fetch count of users without herbal plants
$sqlNo = "SELECT COUNT(*) AS count FROM users WHERE herbal_plant = 'No'";
$resultNo = $conn->query($sqlNo);
$rowNo = $resultNo->fetch_assoc();
$herbalPlantsNoCount = $rowNo['count'];

// Close the database connection
$conn->close();
?>
    <canvas id="herbalPlantsChart" width="400" height="300"></canvas>
    <script>
        // Define the counts of Herbal Plants (replace these with your actual counts)
        var herbalPlantsYesCount = <?php echo $herbalPlantsYesCount; ?>;
        var herbalPlantsNoCount = <?php echo $herbalPlantsNoCount; ?>;
        
        // Create the bar chart
        var herbalPlantsChartCanvas = document.getElementById('herbalPlantsChart').getContext('2d');
        var herbalPlantsChart = new Chart(herbalPlantsChartCanvas, {
            type: 'bar',
            data: {
                labels: ['Yes', 'No'],
                datasets: [{
                    label: 'Herbal Plants',
                    data: [herbalPlantsYesCount, herbalPlantsNoCount],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.5)', // Blue color for "Yes"
                        'rgba(255, 99, 132, 0.5)'   // Red color for "No"
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Own a Herbal Garden'
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
</body>
</html>
