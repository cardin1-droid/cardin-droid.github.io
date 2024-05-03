<?php
session_start();

include "db_connect.php";

// Message for success or failure of image upload
$msg = '';

if (isset($_POST['upload'])) {
    $image = $_FILES['image']['name'];
    $path = 'images/' . $image;
    $announcement_name = $_POST['announcement_name'];
    $message = $_POST['message'];

    // Insert query with new fields
    $sql = $conn->prepare("INSERT INTO announcement (image, announcement_name, message) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $path, $announcement_name, $message);

    if ($sql->execute()) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path);
        $msg = 'Image Upload Successfully!';
    } else {
        $msg = 'Image Upload Failed!';
    }
}
?>

<?php include "head.php"; ?>

<?php include 'admin-nav.php'; ?>

<section style="padding: 70px;">

    <div class="row justify-content-center">
        <div class="container-fluid ">
            <div class="row mb-2">
                <div class="col-md-7 rounded p-2 float-left" style="color: #202A5B;">
                    <h2 class="font-weight-bold">ANNOUNCEMENTS</h2>
                </div>
            </div>
            <div class="row bg-light rounded">
                <div class="col-md-12">
                    <h3 class="font-weight-bold pl-2 pt-4">Edit Announcements</h3>
                </div>
            </div>
            <div class="row bg-light">
                <div class="col-md-6">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control p-1" type="file" id="image" name="image" accept="image/*" required onchange="previewImage(this);">

                        </div>
                        <div class="form-group">
                            <input type="text" name="announcement_name" class="form-control p-1" placeholder="Announcement Name" required>
                        </div>
                        <div class="form-group">
                            <textarea name="message" class="form-control p-1" placeholder="Message" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="upload" class="btn btn-success btn-block" value="Announce">
                        </div>
                        <div class="form-group">
                            <h5 class="text-center text-light"><?= $msg; ?></h5>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                <img id="preview" src="#" alt="Image Preview" style="display: none; max-width: 250px; max-height: 220px;">

                </div>
            </div>
            <div class="row bg-light rounded mt-4 p-4">
                <table class="table table-bordered text-center">
                    <colgroup>
                        <col style="width: 20%;">
                        <col style="width: 20%;">
                        <col style="width: 50%;">
                        <col style="width: 10%;">

                    </colgroup>
                    <thead>
                        <tr>
                            <td>Image</td>
                            <td>Announcement Name</td>
                            <td>Message</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "candaweb";

                        // Connection
                        $connection = new mysqli($servername, $username, $password, $database);

                        if ($connection->connect_error) {
                            die("Connection failed: " . $connection->connect_error);
                        }

                        // Retrieve data from the database
                        $sql = "SELECT * FROM announcement";
                        $result = $connection->query($sql);

                        if (!$result) {
                            die("Invalid query: " . $connection->connect_error);
                        }
                        while ($row = $result->fetch_assoc()) {
                            echo "
                                    <tr>
                                        <td><img src='$row[image]' alt='Announcement Image' style='max-width: 100px;'></td>
                                        <td>$row[announcement_name]</td>
                                        <td>$row[message]</td>
                                        <td>
                                        <button class='btn btn-primary btn update-btn btn-block' data-id='$row[id]' >Edit</button>
                                       
                                        <a class= 'btn btn-danger btn delete-btn btn-block' href='delete.php?id=$row[id]'>Delete</a>
                                        </td>
                                    </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    </div>
</section>
<!-- Bootstrap Modal for Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Announcement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm" action="admin-announcements-edit.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="announcement_id" id="announcement_id">
                    <div class="form-group">
                        <label for="edit_announcement_name">Announcement Name:</label>
                        <input type="text" class="form-control" id="edit_announcement_name" name="edit_announcement_name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_message">Message:</label>
                        <textarea class="form-control" id="edit_message" name="edit_message" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="jquery-3.7.1.min.js"></script>
<script src="sweetalert2.all.min.js"></script>
<script>
    function previewImage(input) {
        var preview = document.getElementById('preview');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.style.display = 'none';
        }
    }


</script>
<script src="script.js"></script>