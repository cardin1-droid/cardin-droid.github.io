<!DOCTYPE html>
<html>

<head>
    <title>Population Dashboard</title>
    <style>
        .icon {
            font-size: 35px;
        }
    </style>
</head>

<body>
    <div class="container">
        <i class="bi bi-person-plus-fill icon text-white"></i>
        <?php
        // Include database connection
        require 'db_connect.php';

        // Query to count senior citizens (assuming senior citizens are those aged 60 and above)
        $query = "SELECT COUNT(*) as senior_citizens FROM users WHERE TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) >= 60";
        $result_senior_citizens = mysqli_query($conn, $query);

        if ($result_senior_citizens) {
            $row_senior_citizens = mysqli_fetch_assoc($result_senior_citizens);
            $senior_citizens = $row_senior_citizens['senior_citizens'];
            echo "<h1 class='text-white'>$senior_citizens</h1>";
            echo "<p class='text-white'>Senior Citizens</p>"; // Icon added here
        } else {
            echo "<p class='text-white'>Error: " . mysqli_error($conn) . "</p>";
        }

        // Close connection
        mysqli_close($conn);
        ?>
    </div>
</body>

</html>