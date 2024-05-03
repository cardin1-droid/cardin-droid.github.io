<?php
include "db_connect.php";

$sql = "SELECT * FROM about";
$result = $conn->query($sql);
?>

<section id="about-section">
        <h2 class="title font-weight-bold">About</h2>
        <div class="container-fluid bg-col">
            <?php $index = 0; ?>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <?php if ($index % 2 == 0) : ?>
                    <div class="row mr-4 ml-4">
                        <div class="col-md-6">
                            <div class="about-image mt-4 mb-4">
                                <img src="<?php echo $row['about_image']; ?>" alt="About Image" class="fixed-size-image-left custom-shadow ">
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="about-text mt-4 mb-4 text-justify">
                                <h3 class="align-middle"><?php echo $row['about_text']; ?></h3>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="row mr-4 ml-4">
                        <div class="col-md-6 d-flex">
                            <div class="about-text text-justify mb-4">
                                <h3 class="align-middle"><?php echo $row['about_text']; ?></h3>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="about-image-right mb-4">
                                <img src="<?php echo $row['about_image']; ?>" alt="About Image" class="fixed-size-image-right custom-shadow ">
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php $index++; ?>
            <?php endwhile; ?>
        </div>
    </div>

</section>

<style>
    
    #about-section {
       
        margin: 0;
        padding: 0;
    }

    .about-text {
        padding: 10;
        margin: 10;
        color: white;
    }

    .container-fluid.bg-col {
        padding: 0;
        margin: 0;
    }

    .custom-shadow {
        box-shadow: 0 0.5rem 1rem rgba(1, 1, 1, 1);
    }

    .bg-col {
        background: rgb(252, 252, 252);
        background: linear-gradient(312deg, rgba(252, 252, 252, 1) 0%, rgba(17, 47, 98, 1) 0%);
    }

    .fixed-size-image-left {
        width: 100%;
        max-height: 300px;
        object-fit: cover;
        border-radius: 80px 0px 0px 0px;
    }

    .fixed-size-image-right {
        width: 100%;
        max-height: 300px;
        object-fit: cover;
        border-radius: 0px 0px 80px 0px;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    }

    .align-middle {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        margin: 0;
    }
</style>
</body>

</html>