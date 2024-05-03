<?php 
include "head.php";
include "user-nav.php";
include "footer.php";
?>

<section id="content">
    <div class="container-fluid">
        <div id="slideshow" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/img/ann.svg" class="d-block w-100" alt="Image 1">
                </div>
                <div class="carousel-item">
                    <img src="/img/people.png" class="d-block w-100" alt="Image 2">
                </div>
                <div class="carousel-item">
                    <img src="image3.jpg" class="d-block w-100" alt="Image 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#slideshow" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#slideshow" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
        $('#slideshow').carousel();
    });
</script>
