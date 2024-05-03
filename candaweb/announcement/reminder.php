<?php
$conn = new mysqli("localhost", "root", "", "candaweb");

//messange para sa success ng pag upload
$msg = '';


if (isset($_POST['upload'])) {
    $image = $_FILES['image']['name'];
    $path = 'images/' . $image;

    //connection sa database
    $sql = $conn->query("INSERT INTO announcement (image) VALUES ('$path')");

    if ($sql) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path);
        $msg = 'Image Upload Successfully!';
    } else {
        $msg = 'Image Upload Failed!';
    }
}

//kukunin nya ang result galing sa database

$result = $conn->query("SELECT image FROM announcement");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>slider</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">

        <div class="row justify-content-center mb-2">
            <div class="col-lg-10">
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
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

                    <!-- pag loop ng image -->
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
                                <img src="<?= $row['image'] ?>" width="100%" height="400">
                            </div>

                        <?php $i++;
                        } ?>

                    </div>

                    <!-- arrow control para sa pag navigate ng image -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                </div>
            </div>
        </div>

        <!-- ito ang function ng upload images -->
        <div class="row justify-content-center">
            <div class="col-lg-4 bg-dark rounded px-4">
                <h4 class="text-center text-light p-1">select image to upload</h4>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" name="image" class="form-control p-1" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="upload" class="btn btn-warning btn-block" value="Upload Image">
                    </div>

                    <div class="form-group">
                        <h5 class="text-center text-light"><?= $msg; ?></h5>
                    </div>
                </form>
            </div>

            <!-- ito ang function ng header ng table -->
            <table class="table table-bordered text-center">
                <thead>
                    <tr class="bg-dark text-white">
                        <td>ID</td>
                        <td>Image</td>
                        <td>Action</td>

                    </tr>

                </thead>

                <tbody>
                    <!-- connection ito -->
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "candaweb";

                    //connection

                    $connection = new mysqli($servername, $username, $password, $database);

                    if ($connection->connect_error) {
                        die("connection failed: " . $connection->connect_error);
                    }

                    //pagpapalabas ng data galing sa database
                    $sql = "SELECT * FROM announcement";
                    $result = $connection->query($sql);

                    if (!$result) {
                        die("invalid query: " . $connection->connect_error);
                    }
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                                <td>$row[id]</td>
                                <td>$row[image]</td>
                                <td>
                                    <a class='btn btn-primary btn-sm' href='update'>Update</a>
                                    <a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>Delete</a>
                                </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>