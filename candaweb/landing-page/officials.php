<?php
// Include the necessary database connection file
include "db_connect.php";

// Perform database query to retrieve all officials
$sql = "SELECT * FROM officials";
$result = $conn->query($sql);
?>
<style>
    /* Custom styles for the officials section */
    #officials-section {
        padding: 20px 0;
        
    }

    #officials-section .title {
        text-align: center;
        margin-bottom: 50px;
        color: white;
    }

    #officials-section .card {
        border: 2px solid rgba(128, 128, 128, 0.1);
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    #officials-section .card:hover {
        transform: translateY(-10px);
    }

    #officials-section .card-img-top {
        border-radius: 10px 10px 0 0;
    }

    #officials-section .card-body {
        padding: 20px;
    }

    #officials-section .card-title {
        margin-bottom: 10px;
        font-size: 1.2rem;
        font-weight: bold;
    }

    #officials-section .card-text {
        color: #666;
    }
</style>

<section id="officials-section">
    <div class="container">
        <h2 class="title font-weight-bold">Barangay Officials</h2>
        <div class="row justify-content-center">
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="<?php echo $row['image_url']; ?>" style="width: 100%; height: auto;" class="card-img-top" alt="Official Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $row['name']; ?></h5>
                            <p class="card-text text-center"><?php echo $row['position']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>



