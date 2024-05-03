<?php
// Include the database connection file
include 'db_connect.php';

// Query to get gender distribution (excluding null values)
$sql = "SELECT sex, COUNT(*) as count FROM users WHERE sex IS NOT NULL GROUP BY sex";
$result = $conn->query($sql);

$gender_counts = array();
while ($row = $result->fetch_assoc()) {
    $gender_counts[$row['sex']] = $row['count'];
}

// Close connection
$conn->close();

// Data for pie chart
$labels = array_keys($gender_counts);
$data = array_values($gender_counts);

// Pie chart colors
$colors = array('rgba(0, 103, 165)', 'rgba(132, 27, 45)');

// Create the pie chart
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Include required libraries -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="row">
        <div class="col-md-12">

            <div style="width: 100%;">
            <canvas id="genderChart" width="200" height="200"></canvas>            </div>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('genderChart').getContext('2d');
        var genderChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: <?php echo json_encode($colors); ?>
                }]
            },
            
        });
    </script>
</body>

</html>
