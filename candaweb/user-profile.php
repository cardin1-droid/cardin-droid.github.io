<?php
session_start();

include "db_connect.php";

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: user-index.php");
    exit;
}

$username = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

$profile_info = [];

if ($result->num_rows > 0) {
    $profile_info = $result->fetch_assoc();
    $birthdate = new DateTime($profile_info['birthdate']);
    $today = new DateTime();
    $age = $birthdate->diff($today)->y;

    // Store the profile picture path in the session variable
    $_SESSION['profile_picture'] = $profile_info['profile_picture'];
}
// Handle profile picture upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded
    if (isset($_FILES["profilePicture"]) && $_FILES["profilePicture"]["error"] == 0) {
        // Specify the directory where you want to save the uploaded profile pictures
        $uploadDirectory = "uploads/";

        // Create the directory if it doesn't exist
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        // Generate a unique filename for the uploaded profile picture
        $targetFile = $uploadDirectory . uniqid() . '_' . basename($_FILES["profilePicture"]["name"]);

        // Check if the file is an actual image
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowedExtensions)) {
            $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";

            exit;
        }

        // Upload the file
        if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $targetFile)) {
            // Store the path to the uploaded profile picture in the session
            $_SESSION['profile_picture'] = $targetFile;

            // Update the database with the profile picture path
            $updateSql = "UPDATE users SET profile_picture = '$targetFile' WHERE username = '$username'";
            if ($conn->query($updateSql) === TRUE) {
                $_SESSION['message'] = "Profile picture uploaded successfully.";
            } else {
                $_SESSION['message'] = "Error updating profile picture: " . $conn->error;
            }
        } else {
            $_SESSION['message'] = "Sorry, there was an error uploading your file.";
        }
    } elseif (isset($_POST['action']) && $_POST['action'] == 'remove') {
        // Remove the profile picture
        unset($_SESSION['profile_picture']);

        // Update the database to remove the profile picture path
        $updateSql = "UPDATE users SET profile_picture = NULL WHERE username = '$username'";
        if ($conn->query($updateSql) === TRUE) {
            $_SESSION['message'] = "Profile picture removed successfully.";
        } else {
            $_SESSION['message'] = "Error removing profile picture: " . $conn->error;
        }
    } else {
        $_SESSION['message'] = "No file uploaded.";
    }

    // Redirect back to the profile page
    header("Location: user-profile.php");
    exit;
}


include "head.php";

?>
<section>
    <?php include "user-nav.php"; ?>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-4 profile-cont">
                <div class="container " style="height: auto;">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card-body">
                                <?php
                                // Check if profile picture is set
                                if (isset($_SESSION['profile_picture'])) {
                                    echo '<img src="' . $_SESSION['profile_picture'] . '" class="img-fluid rounded-circle mb-3" alt="Profile Picture">';
                                } else {
                                    echo '<div class="alert alert-secondary mb-3">No profile picture found</div>';
                                }
                                ?>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="profilePicture" name="profilePicture" accept="image/*">
                                            <label class="custom-file-label" for="profilePicture">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger ml-1" <?php if (!isset($_SESSION['profile_picture'])) echo 'disabled'; ?> data-toggle="modal" data-target="#deleteConfirmationModal">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <form action="b1_personal.php">
                                    <button class="btn btn-primary btn-block mb-2 font-weight-bold">
                                        FILL UP BIDANI
                                    </button>
                                </form>
                            </div>



                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-7 profile-cont">
    <div class="modal-header justify-content-center text-white bg-canda"style="background-color: #202a5b;">
        <h4 class="font-weight-bold modal-title">Profile Information</h4>
    </div>

    <div class="table-responsive">
        <table class="table table-transparent">
            <tbody>
                <tr>
                    <th scope="row">Username</th>
                    <td><?php echo $profile_info['username']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td><?php echo $profile_info['email']; ?></td>
                </tr>
                <tr>
                    <th scope="row">First Name</th>
                    <td><?php echo ucfirst($profile_info['first_name']); ?></td>
                </tr>
                <tr>
                    <th scope="row">Middle Name</th>
                    <td><?php echo ucfirst($profile_info['middle_name']); ?></td>
                </tr>
                <tr>
                    <th scope="row">Last Name</th>
                    <td><?php echo ucfirst($profile_info['last_name']); ?></td>
                </tr>
                <tr>
                    <th scope="row">Birthdate</th>
                    <td><?php echo $profile_info['birthdate']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Age</th>
                    <td><?php echo $age; ?></td>
                </tr>
                <tr>
                    <th scope="row">Sex</th>
                    <td><?php echo ucfirst($profile_info['sex']); ?></td>
                </tr>
                <tr>
                    <th scope="row">Civil Status</th>
                    <td><?php echo ucfirst($profile_info['civil_status']); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete your profile picture?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button id="confirmDeleteBtn" type="button" class="btn btn-danger">Yes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="popupModalLabel">CandaWeb</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="userDetailsContent">
                <!-- User details content will be loaded here dynamically -->
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // When the Remove button in the modal footer is clicked, submit the form
        $('#deleteConfirmationModal').on('click', '.btn-danger', function() {
            $('#deleteForm').submit();
        });
    });
</script>
<script>
    // When the "Yes" button is clicked, submit the form
    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        document.getElementById('deleteForm').submit();
    });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Function to fetch and display user details in the modal based on information type
    $(document).on('click', '.viewButton', function() {
        var infoType = $(this).data('info-type');
        var userDetailsHTML = "<div class='container'>";
        userDetailsHTML += "<h4>" + infoType.charAt(0).toUpperCase() + infoType.slice(1) + " Information</h4>";

        if (infoType === 'household') {
            userDetailsHTML += "<p><strong>House Number:</strong> <?php echo $profile_info['house_number']; ?></p>";
            userDetailsHTML += "<p><strong>Street:</strong> <?php echo ucfirst($profile_info['street']); ?></p>";
            userDetailsHTML += "<p><strong>Barangay:</strong> <?php echo ucfirst($profile_info['barangay']); ?></p>";
            userDetailsHTML += "<p><strong>City:</strong> <?php echo ucfirst($profile_info['city']); ?></p>";
            userDetailsHTML += "<p><strong>Household Condition:</strong> <?php echo ucfirst($profile_info['household_condition']); ?></p>";
            userDetailsHTML += "<p><strong>Family Condition:</strong> <?php echo ucfirst($profile_info['family_condition']); ?></p>";
            userDetailsHTML += "<p><strong>No. of Family Members:</strong> <?php echo $profile_info['family_info_q1']; ?></p>";
            userDetailsHTML += "<p><strong>Year Resided:</strong> <?php echo $profile_info['family_info_q2']; ?></p>";
            userDetailsHTML += "<p><strong>Municipality Origin:</strong> <?php echo ucfirst($profile_info['family_info_q3']); ?></p>";
            userDetailsHTML += "<p><strong>Province Origin:</strong> <?php echo ucfirst($profile_info['family_info_q3_2']); ?></p>";
        } else if (infoType === 'health') {
            userDetailsHTML += "<p><strong>3x Meals Daily:</strong> <?php echo $profile_info['meals_daily']; ?></p>";
            userDetailsHTML += "<p><strong>Herbal Plant:</strong> <?php echo $profile_info['herbal_plant']; ?></p>";
            userDetailsHTML += "<p><strong>Vegetable Garden:</strong> <?php echo $profile_info['vege_garden']; ?></p>";
            userDetailsHTML += "<p><strong>Family Planning:</strong> <?php echo $profile_info['fam_plan']; ?></p>";
            userDetailsHTML += "<p><strong>Past Therapy:</strong> <?php echo $profile_info['therapy']; ?></p>";
        }

        userDetailsHTML += "</div>";

        $('#userDetailsContent').html(userDetailsHTML);
    });
</script>