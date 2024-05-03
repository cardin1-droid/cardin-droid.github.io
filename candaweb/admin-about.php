<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: user-index.php");
    exit;
}

include_once "db_connect.php";
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $about_text = $_POST['about_text'];
    $image = $_FILES['image'];

    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($image["name"]);
    if (move_uploaded_file($image["tmp_name"], $targetFile)) {
        $sql = "INSERT INTO about (about_text, about_image, created_at) VALUES ('$about_text', '$targetFile', NOW())";
        if ($conn->query($sql) === TRUE) {
            $message = "<div class='container mt-3'><div class='alert alert-success' role='success'>About added successfully.</div></div>";
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $message = "Sorry, there was an error uploading your file.";
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
                    <h2 class="font-weight-bold">ABOUT</h2>
                </div>
            </div>
            <div class="row bg-light rounded">
                <div class="col-md-12">
                    <h3 class="font-weight-bold pl-2 pt-4">Edit About</h3>
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
                            <textarea class="form-control p-1" id="about_text" name="about_text" placeholder="Add About" required rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="upload" class="btn btn-success btn-block" value="Add">
                            <a href="admin-about.php" class="btn btn-danger btn-block">Cancel</a>
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
                        <col style="width: 70%;">
                        <col style="width: 20%;">
                        <col style="width: 10%;">

                    </colgroup>
                    <thead>
                        <tr>
                            <th>About</th>
                            <th>Image</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sql = "SELECT * FROM about";
                        $result = $conn->query($sql); ?>
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo $row['about_text']; ?></td>
                                <td><img src="<?php echo $row['about_image']; ?>" alt="About Image" class="table-image"></td>

                                <td>
                                    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#editAboutModal" data-id="<?php echo $row['id']; ?>">Edit</button>
                                    <a href="admin-about-delete.php?id=<?php echo $row['id']; ?>" class="btn-delete btn btn-danger btn-block">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
</section>

<!-- Bootstrap Modal for Edit About -->
<div class="modal fade" id="editAboutModal" tabindex="-1" role="dialog" aria-labelledby="editAboutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAboutModalLabel">Edit About</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editAboutForm" action="admin-about-edit.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="about_id" id="editAboutId">
                    <div class="form-group">
                        <label for="edit_about_text">About Text:</label>
                        <textarea class="form-control" id="edit_about_text" name="edit_about_text" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit_about_image">About Image:</label>
                        <input class="form-control" type="file" id="edit_about_image" name="edit_about_image" accept="image/*">
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

    $('#editAboutModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);
        modal.find('.modal-body #editAboutId').val(id);
    });

         ///sucess added ito
         $('.btn-add').on('click', function(e){
        e.preventDefault();
        const href = $(this).attr('href')

        Swal.fire({
            title: 'Are You Sure',
            text: 'Your Record Will be Added?',
            type: 'sucess',
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



        ///sucess delete ito
        $('.btn-delete').on('click', function(e){
        e.preventDefault();
        const href = $(this).attr('href')

        Swal.fire({
            title: 'Are You Sure?',
            text: 'Your Record Will be Deleted?',
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