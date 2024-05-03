<style>
    .icon {
        font-size: 35px;
    }
</style>

<body>
    <div class="container">
        <i class="bi bi-house-fill icon text-white"></i>
        <?php
        // Include database connection
        require 'db_connect.php';

        $query = "SELECT COUNT(*) as total_4ps_users FROM users WHERE 4ps = 'Yes'";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $total_4ps_users = $row['total_4ps_users'];
            echo "<h1 class='text-white'>$total_4ps_users</h1>";
            echo "<p class='text-white'>Total 4Ps Members</p>";
        } else {
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        }

        // Close connection
        mysqli_close($conn);
        ?>
    </div>
</body>

</html>