<?php include "head.php" ?>
<style>
    .fadein {
        position: relative;
        height: 332px;
        width: 500px;
        margin: 0 auto;
        background: #ebebeb;
        padding: 10px;
    }

    .fadein img {
        position: absolute;
        width: calc(96%);
        height: calc(94%);
        object-fit: scale-down;
    }
</style>
<script>
    $(function() {
        var intervalId;
        function startSlideshow() {
            intervalId = setInterval(function() {
                $('.fadein :first-child').fadeOut(function() {
                    $(this).next('img').fadeIn().end().appendTo('.fadein');
                });
            }, 3000);
        }
        
        function stopSlideshow() {
            clearInterval(intervalId);
        }

        $('.fadein img:gt(0)').hide(); // Hide all images except the first one
        startSlideshow(); // Start the slideshow
        
        // Pause the slideshow when hovering over it
        $('.fadein').hover(function() {
            stopSlideshow();
        }, function() {
            startSlideshow();
        });
    });
</script>
<div class="fadein">
    <?php 
    $dir = "./uploads/";

    $scan_dir = scandir($dir);
    foreach($scan_dir as $img):
        if(in_array($img, array('.','..')))
        continue;
    ?>
    <img src="<?php echo $dir.$img ?>" alt="<?php echo $img ?>">
    <?php endforeach; ?>
</div>
</body>
</html>
