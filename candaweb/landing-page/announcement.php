<?php
include "db_connect.php";

$result = $conn->query("SELECT image FROM announcement");
?>

<style>
    .carousel {
        height: 620px;
    }

    .carousel-item img {
        object-fit: cover;
        height: 100%;
        width: 100%;
        max-height: 620px;
    }

    @media (max-width: 768px) {
        .carousel {
            height: 38vh;
        }
    }

    .container {
        margin-top: 50px;
    }
</style>
<section id="home-section">


<div class="container">
    <div class="row justify-content-center mb-2">
        <div class="col-lg-12">
            <div id="demo" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                    <?php
                    $i = 0;
                    foreach ($result as $row) {
                        $actives = '';
                        if ($i == 0) {
                            $actives = 'active';
                        }
                        ?>
                        <li data-target="#demo" data-slide-to="<?= $i; ?>" class="<?= $actives; ?>"></li>
                        <?php $i++;
                    } ?>
                </ul>
                <div class="carousel-inner">
                    <?php
                    $i = 0;
                    foreach ($result as $row) {
                        $actives = '';
                        if ($i == 0) {
                            $actives = 'active';
                        }
                        ?>
                        <div class="carousel-item <?= $actives; ?>">
                            <img src="<?= $row['image'] ?>" class="d-block w-100">
                        </div>
                        <?php $i++;
                    } ?>
                </div>
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </div>
</div>
</section>