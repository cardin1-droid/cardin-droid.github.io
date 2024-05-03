<?php
// Include the database connection script
include 'db_connect.php';

// Query to retrieve population count by age group
$query = "SELECT
            CASE
                WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 1 AND 4 THEN '1-4'
                WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 5 AND 9 THEN '5-9'
                WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 10 AND 14 THEN '10-14'
                WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 15 AND 19 THEN '15-19'
                WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 20 AND 24 THEN '20-24'
                WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 25 AND 29 THEN '25-29'
                WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 30 AND 34 THEN '30-34'
                WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 35 AND 39 THEN '35-39'
                WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 40 AND 44 THEN '40-44'
                WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 45 AND 49 THEN '45-49'
                WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 50 AND 54 THEN '50-54'
                WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 55 AND 59 THEN '55-59'
                WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 60 AND 64 THEN '60-64'
                WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 65 AND 69 THEN '65-69'
                WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 70 AND 74 THEN '70-74'
                WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 75 AND 79 THEN '75-79'
                ELSE '80+'
            END AS age_group,
            COUNT(*) AS population_count
        FROM
            users
        GROUP BY
            age_group
            ORDER BY
            FIELD(age_group, '1-4', '5-9', '10-14', '15-19', '20-24', '25-29', '30-34', '35-39', '40-44', '45-49', '50-54', '55-59', '60-64', '65-69', '70-74', '75-79', '80+')";

// Perform the query
$result = mysqli_query($conn, $query);

// Initialize arrays to store age groups and population counts
$age_groups = array();
$population_counts = array();

// Fetch data and populate arrays
while ($row = mysqli_fetch_assoc($result)) {
    $age_groups[] = $row['age_group'];
    $population_counts[] = $row['population_count'];
}

// Close the database connection
mysqli_close($conn);

// Convert the data into JSON format for passing to JavaScript
$age_groups_json = json_encode($age_groups);
$population_counts_json = json_encode($population_counts);
?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php include "head.php"; ?>


        <canvas id="populationCharts" width="300" height="200"></canvas>


    <script>
        var ctx = document.getElementById('populationCharts').getContext('2d');
        var populationChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= $age_groups_json ?>,
                datasets: [{
                    label: 'Population by Age Group',
                    data: <?= $population_counts_json ?>,
                    backgroundColor: 'rgba(0, 46, 99)',
                   
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Age'
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
</body>

</html>
