<!DOCTYPE html>
<html>
<head>
    <title>Population Dashboard</title>
    <style>
        .icon {
            font-size: 35px;
        }
    </style>
        <link rel="icon" type="image/png" href="uploads/cwlogo.png">

</head>
<body>
    <div class="container">
    <i class="bi bi-people-fill icon text-white"></i>        <?php
            // Include database connection
            require 'db_connect.php';

            // Query to count total users
            $query = "SELECT COUNT(*) as total_users FROM users";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $total_users = $row['total_users'];
                echo "<h1 class='text-white'>$total_users</h1>"; 
                echo "<p class='text-white'>Total Population </>";
            } else {
                echo "<p>Error: " . mysqli_error($conn) . "</p>";
            }

            // Close connection
            mysqli_close($conn);
        ?>
    </div>
</body>
</html>
