<section id="services-section">
    <?php
    include "db_connect.php";

    $sql = "SELECT * FROM services"; // Update SQL query to fetch data from the 'services' table
    $result = $conn->query($sql);
    ?>

    <body>
        <section id="services-section">
            <div class="services-section">
            <h2 class="title bold" style="color: #202A5B;">Services</h2>
            <div class="container">
                <?php $index = 0; ?>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <?php if ($index % 2 == 0) : ?>
                        <div class="row ">
                            <div class="col-md-5 px-0 bg-col custom-shadow">
                                <div class="service-image ">
                                    <img src="<?php echo $row['services_img']; ?>" alt="Service Image" class="fixed-size-image">
                                </div>
                            </div>
                            <div class="col-md-6 d-flex bg-col custom-shadow">
                                <div class="service-text text-justify mt-4 d-flex flex-column align-items-center">
                                    <h1 class="font-weight-bold"><?php echo $row['service_title']; ?></h1>
                                    <h5><?php echo $row['services_text']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="row ">
                            <div class="col-md-1"></div>
                            <div class="col-md-6 d-flex bg-col custom-shadow">
                                <div class="service-text text-justify mt-4 d-flex flex-column align-items-center">
                                    <h1 class="font-weight-bold"><?php echo $row['service_title']; ?></h1>
                                    <h5><?php echo $row['services_text']; ?></h5>
                                </div>

                            </div>
                            <div class="col-md-5 px-0 bg-col custom-shadow">
                                <div class="service-image">
                                    <img src="<?php echo $row['services_img']; ?>" alt="Service Image" class="fixed-size-image">
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
            .services-section {
                height: 100vh;
                
                align-items: center;
                justify-content: center;
                background: white;
                color: #fff;
                text-align: center;
                height: 100%;
            }

            .custom-shadow {
                box-shadow: 0 0.5rem 1rem rgba(.5, .5, .5, .5);
            }

            .service-text {
                color: white;
            }

          

            .bg-col {
                background: rgb(252, 252, 252);
                background: linear-gradient(312deg, rgba(252, 252, 252, 1) 0%, rgba(17, 47, 98, 1) 0%);
                margin-bottom: 20px;
            }

            .fixed-size-image {
                width: 100%;
                height: 100%;
                max-height: 300px;
                object-fit: cover;
                border-radius: 0px;
            }

            .align-middle {
                display: flex;
                align-items: center;
                justify-content: center;

                /* Set the height to fill the container */
                margin: 0;
                /* Remove default margin */
            }

            

            


           
        </style>
    </body>

    </html>

</section>