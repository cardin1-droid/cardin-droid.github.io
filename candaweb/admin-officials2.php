<?php
include_once "db_connect.php";
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page
    header("Location: user-index.php");
    exit;
}
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $image = $_FILES['image'];

    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($image["name"]);
    if (move_uploaded_file($image["tmp_name"], $targetFile)) {
        $sql = "INSERT INTO officials (name, position, image_url) VALUES ('$name', '$position', '$targetFile')";
        if ($conn->query($sql) === TRUE) {
            $message = "<div class='container mt-3'><div class='alert alert-success' role='success'>Official added successfully.</div></div>";
        } else {
            $message = "<div class='container mt-3'><div class='alert alert-danger' role='danger'>Error: " . $sql . "<br>" . $conn->error . "</div></div>";
        }
    } else {
        $message = "<div class='container mt-3'><div class='alert alert-danger' role='danger'>Sorry, there was an error uploading your file.</div></div>";
    }
}

$sql = "SELECT * FROM officials";
$result = $conn->query($sql);
?>

<?php include "head.php"; ?>
<?php include "admin-nav.php"; ?>

<section style="padding: 70px;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12 rounded p-2 float-left">
                <h2 class="font-weight-bold">OFFICIALS</h2>
            </div>
        </div>
        <?php if (!empty($message)) : ?>
            <?php echo $message; ?>
        <?php endif; ?>
        <div class="row bg-light rounded pb-4">
            <div class="col-md-6">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <h3 class="font-weight-bold pl-2 pt-4">Add Officials</h3>
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <select class="form-control" id="position" name="position" required>
                            <option value="">Select Position</option>
                            <option value="Barangay Captain">Barangay Captain</option>
                            <option value="Barangay Kagawad">Barangay Kagawad</option>
                            <option value="Barangay Secretary">Barangay Secretary</option>
                            <option value="Barangay Treasurer">Barangay Treasurer</option>
                            <option value="Barangay Tanod">Barangay Tanod</option>
                            <option value="SK Chairperson">SK Chairperson</option>
                            <option value="SK Kagawad">SK Kagawad</option>
                            <!-- Add more positions as needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required onchange="previewImage(this);">
                    </div>
                    <button type="submit" class="btn btn-success float-right">Add Official</button>
                </form>
            </div>
            <div class="col-md-6">
                <img id="preview" src="#" alt="Image Preview" style="display: none; max-width: 275px; height: 275px;">
            </div>
        </div>
    </div>

    <div class="container-fluid mt-4 mb-4">

        <div class="row bg-light rounded mb-2 pt-2 pb-2 justify-content-center">
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="col-md-2">
                    <div class="card mb-4 ">
                        <div style="width: 100%; height: 150px; overflow: hidden;">
                            <img src="<?php echo $row['image_url']; ?>" class="card-img-top" alt="Official Image" style="max-width: 100%; height: 100%; max-height:275px;">

                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="card-text"><?php echo $row['position']; ?></p>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editOfficialModal" data-id="<?php echo $row['id']; ?>">Edit</button>
                                <a href="admin-officials-delete.php?id=<?php echo $row['id']; ?>" class="btn-delete btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<!-- Modal for editing officials -->
<div class="modal fade" id="editOfficialModal" tabindex="-1" role="dialog" aria-labelledby="editOfficialModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editOfficialModalLabel">Edit Official</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="admin-officials-update.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="editOfficialId"> <!-- Hidden input field to store the ID -->

                    <div class="form-group">
                        <label for="editOfficialName">Name:</label>
                        <input type="text" class="form-control" id="editOfficialName" name="name">
                    </div>

                    <div class="form-group">
                        <label for="editOfficialPosition">Position:</label>
                        <input type="text" class="form-control" id="editOfficialPosition" name="position">
                    </div>

                    <div class="form-group">
                        <label for="editOfficialImage">Update Picture:</label>
                        <input type="file" class="form-control-file" id="editOfficialImage" name="image" onchange="previewImage(this);">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Official</button>
                </form>

            </div>
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
        $('.edit-btn').click(function() {
            var id = $(this).data('id');
            var name = $(this).closest('.card').find('.card-title').text().trim();
            var position = $(this).closest('.card').find('.card-text').text().trim();
            $('#editOfficialId').val(id); // Set the ID value to the hidden input field
            $('#editOfficialName').val(name); // Set the name value to the input field
            $('#editOfficialPosition').val(position); // Set the position value to the input field
            $('#editOfficialModal').modal('show'); // Show the modal
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

<script src="script.js"></script>