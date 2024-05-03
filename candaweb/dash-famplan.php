<?php
include "db_connect.php"; // Include your database connection file

// Fetch count of users practicing family planning
$sqlYes = "SELECT COUNT(*) AS count FROM users WHERE fam_plan = 'Yes'";
$resultYes = $conn->query($sqlYes);
$rowYes = $resultYes->fetch_assoc();
$familyPlanningYesCount = $rowYes['count'];

// Fetch count of users not practicing family planning
$sqlNo = "SELECT COUNT(*) AS count FROM users WHERE fam_plan = 'No'";
$resultNo = $conn->query($sqlNo);
$rowNo = $resultNo->fetch_assoc();
$familyPlanningNoCount = $rowNo['count'];

// Close the database connection
$conn->close();
?>

<canvas id="familyPlanningChart" width="400" height="300"></canvas>
<script>
    var familyPlanningChartCanvas = document.getElementById('familyPlanningChart').getContext('2d');
    var familyPlanningChart = new Chart(familyPlanningChartCanvas, {
        type: 'bar',
        data: {
            labels: ['Yes', 'No'],
            datasets: [{
                label: 'Family Planning',
                data: [<?php echo $familyPlanningYesCount; ?>, <?php echo $familyPlanningNoCount; ?>],
                backgroundColor: [
                    'rgba(0, 107, 166)',
                    'rgba(80, 114, 167)',
                ],
                
            }]
        },
        options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Practice Family Planning'
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
