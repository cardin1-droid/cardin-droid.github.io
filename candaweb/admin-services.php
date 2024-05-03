<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: user-index.php");
    exit;
}

include_once "db_connect.php";
$message = '';

// Add Service Section
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_service'])) {
    $service_title = $_POST['service_title'];
    $services_text = $_POST['services_text'];
    $image = $_FILES['image'];

    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($image["name"]);
    if (move_uploaded_file($image["tmp_name"], $targetFile)) {
        $sql = "INSERT INTO services (service_title, services_text, services_img, created_date) VALUES (?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $service_title, $services_text, $targetFile);

        if ($stmt->execute()) {
            $message = "<div class='container mt-3'><div class='alert alert-success' role='success'>Service added successfully.</div></div>";
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
        $stmt->close();
    } else {
        $message = "Sorry, there was an error uploading your file.";
    }
}

// Edit Service Section
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_service'])) {
    $service_id = $_POST['edit_service_id'];
    $edit_service_title = $_POST['edit_service_title'];
    $edit_services_text = $_POST['edit_services_text'];

    // Check if a new image is uploaded
    if ($_FILES['edit_service_image']['name']) {
        $image = $_FILES['edit_service_image']['name'];
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($image);
        if (move_uploaded_file($_FILES['edit_service_image']['tmp_name'], $targetFile)) {
            $sql = $conn->prepare("UPDATE services SET service_title = ?, services_text = ?, services_img = ? WHERE id = ?");
            $sql->bind_param("sssi", $edit_service_title, $edit_services_text, $targetFile, $service_id);
        } else {
            $message = "Error: Failed to upload image.";
        }
    } else {
        $sql = $conn->prepare("UPDATE services SET service_title = ?, services_text = ? WHERE id = ?");
        $sql->bind_param("ssi", $edit_service_title, $edit_services_text, $service_id);
    }

    if ($sql->execute()) {
        $message = "<div class='container mt-3'><div class='alert alert-success' role='success'>Service updated successfully.</div></div>";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<?php include "head.php"; ?>
<?php include 'admin-nav.php'; ?>
<style>
    .table-image {
        max-width: 100px;
        height: auto;
    }
</style>

<section style="padding: 70px;">
    <div class="row justify-content-center">
        <div class="container-fluid ">
            <div class="row mb-2">
                <div class="col-md-7 rounded p-2 float-left" style="color: #202A5B;">
                    <h2 class="font-weight-bold">SERVICES</h2>
                </div>
            </div>
            <div class="row bg-light rounded">
                <div class="col-md-12">
                    <h3 class="font-weight-bold pl-2 pt-4">Edit Services</h3>
                </div>
            </div>
            <div class="row bg-light">
                <div class="col-md-6">
                    <?php if (!empty($message)) : ?>
                        <p><?php echo $message; ?></p>
                    <?php endif; ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control p-1" type="file" id="image" name="image" accept="image/*" required onchange="previewImage(this);">
                        </div>
                        <div class="form-group">
                            <input class="form-control p-1" type="text" id="service_title" name="service_title" placeholder="Service Title" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control p-1" id="services_text" name="services_text" placeholder="Service" required></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="add_service" class="btn-add btn btn-success btn-block">Add</button>
                            <a href="admin-services.php" class="btn btn-danger btn-block">Cancel</a>
                        </div>
                    </form>

                </div>
                <div class="col-md-6 ">
                    <img id="preview" src="#" alt="Image Preview" style="display: none; max-width: 250px; max-height: 220px;">
                </div>
            </div>
            <div class="row bg-light rounded mt-4 p-4">
                <table class="table table-bordered text-center">
                    <colgroup>
                        <col style="width: 20%;">
                        <col style="width: 60%;">
                        <col style="width: 10%;">
                        <col style="width: 10%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Service</th>
                            <th>Image</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM services";
                        $result = $conn->query($sql);
                        ?>
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo $row['service_title']; ?></td>
                                <td><?php echo $row['services_text']; ?></td>
                                <td><img src="<?php echo $row['services_img']; ?>" alt="Service Image" class="table-image"></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-block edit-service" data-toggle="modal" data-target="#editServiceModal" data-id="<?php echo $row['id']; ?>" data-title="<?php echo $row['service_title']; ?>" data-text="<?php echo $row['services_text']; ?>">Edit</button>
                                    <a href="admin-service-delete.php?id=<?php echo $row['id']; ?>" class="btn-delete btn btn-danger btn-block">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap Modal for Edit Service -->
<div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="editServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editServiceForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="edit_service_id" id="editServiceId">
                    <div class="form-group">
                        <label for="edit_service_title">Service Title:</label>
                        <input class="form-control" type="text" id="edit_service_title" name="edit_service_title" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_services_text">Service Text:</label>
                        <textarea class="form-control" id="edit_services_text" name="edit_services_text" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit_service_image">Service Image:</label>
                        <input class="form-control" type="file" id="edit_service_image" name="edit_service_image" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="edit_service" class="btn btn-primary" value="Save changes">
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

    $(document).ready(function() {
        $('.edit-service').click(function() {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var text = $(this).data('text');
            $('#editServiceId').val(id);
            $('#edit_service_title').val(title);
            $('#edit_services_text').val(text);
        });
    });



    ///sucess delete ito
    $('.btn-delete').on('click', function(e){
        e.preventDefault();
        const href = $(this).attr('href')

        Swal.fire({
            title: 'Are You Sure?',
            text: 'Record Will be Deleted?',
            type: 'warning',
            showCancelButton: true,
            confirmationButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmationButtonText: 'Delete Record',
        }).then((result) => {
                 if (result.value){
                     document.location.href = href;
            }
        })
    })


    const flashdata = $('.flash-data').data('flashdata')
        if(flashdata) {
            Swal.fire({
                type: 'sucess',
                title: 'Sucess',
                text: 'Ang iyong record ay na delete na hampas lupa'
            })
        }
</script>
