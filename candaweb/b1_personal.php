<?php
// Start session (if not already started)
session_start();

// Include database connection
include "db_connect.php";

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page
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
}

$first_name = $profile_info['first_name'];
$middle_name = $profile_info['middle_name'];
$last_name = $profile_info['last_name'];
$birthdate = $profile_info['birthdate'];
$sex = $profile_info["sex"];
$sex = $profile_info["sex"];
$civil_status = $profile_info["civil_status"];
$house_no = $profile_info["house_number"];
$street = $profile_info["street"];
$city = $profile_info["city"];
$barangay = $profile_info["barangay"];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form submission to update user profile

    // Retrieve updated profile information from the form
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $birthdate = $_POST['birthdate'];
    $sex = $_POST["sex"];
    $civil_status = $_POST["civil_status"];
    $house_no = $_POST["house_no"];
    $street = $_POST["street"];
    $city = "Balayan";
    $barangay = "Canda";

    // Prepare and execute SQL query to update user profile information
    $sql_update = "UPDATE users SET 
    first_name = '$first_name', 
    middle_name = '$middle_name', 
    last_name = '$last_name', 
    birthdate = '$birthdate',
    sex =  '$sex',
    civil_status = '$civil_status',
    house_number = '$house_no',
    street = '$street',
    city = '$city',
    barangay = '$barangay'
    WHERE username = '$username'";

    if ($conn->query($sql_update) === TRUE) {
        $conn->close();

        // Redirect to a success page or do something else after updating the data
        header("Location: b3_household.php");
        exit();
    }
}
include "b2_personal.php"
?>

<?php include "head.php"; ?>

<?php include "user-nav.php"; ?>
<style>
    input[type="radio"].custom-radio {
        width: 25px;
        /* Set width */
        height: 25px;
        /* Set height */
    }

    .radio-label {
        display: inline-block;
        vertical-align: middle;
        margin-bottom: 20px;
        /* Adjust the top margin as needed */
    }

    .back {
        border: 2px solid #202A5B;
        color: #202A5B;
    }

    .back:hover {
        background-color: rgb(114, 135, 192);
        color: white;
    }

    .next {
        background-color: #202A5B;
    }

    .next:hover {
        background-color: green;
    }
</style>
<link rel="stylesheet" href="style-progressbar.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<section style="padding-top:70px ;">
    <div class="container">
        <ul class="step-wizard-list">
            <li class="step-wizard-item current-item">
                <span class="progress-count">1</span>
                <span class="progress-label">Personal Information</span>
            </li>
            <li class="step-wizard-item">
                <span class="progress-count">2</span>
                <span class="progress-label">Family Information</span>
            </li>
            <li class="step-wizard-item">
                <span class="progress-count">3</span>
                <span class="progress-label">Health Information</span>
            </li>
            <li class="step-wizard-item ">
                <span class="progress-count">4</span>
                <span class="progress-label">Additional Information</span>
            </li>
            <li class="step-wizard-item">
                <span class="progress-count">5</span>
                <span class="progress-label">Success</span>
            </li>
        </ul>
    </div>
</section>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-5" style="border-radius: 10px; background-color:whitesmoke;">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" style="padding: 25px;">
                    <label for="first_name">
                        <h5 class="font-weight-bold">Full Name</h5>
                    </label>
                    <div class="row">
                        <div class="col-md-4">
                            <input class="form-control mb-3" type="text" id="first_name" name="first_name" placeholder="First name" value="<?php echo $first_name; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control mb-3" type="text" id="middle_name" name="middle_name" placeholder="Middle name" value="<?php echo $middle_name; ?>">
                        </div>
                        <div class="col-md-4">
                            <input class="form-control mb-3" type="text" id="last_name" name="last_name" placeholder="Last name" value="<?php echo $last_name; ?>" required>
                        </div>
                    </div>
                    <label for="birthdate">
                        <h5 class="font-weight-bold">Birthdate</h5>
                    </label>

                    <div class="row">
                        <div class="col-md-8">
                            <input class="form-control mb-3" type="date" id="birthdate" name="birthdate" value="<?php echo $birthdate; ?>" onchange="calculateAge(this.value)" required> 
                        </div>
                        <div class="col-md-4">
                            <input class="form-control mb-3" type="text" id="age" name="age" placeholder="Age" value="<?php echo $age; ?>" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <label for="sex">
                                <h5 class="font-weight-bold">Sex</h5>
                            </label>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="custom-radio" type="radio" id="male" name="sex" value="male" <?php echo ($sex == 'male') ? 'checked' : ''; ?>>
                                        <label class="radio-label" for="male">Male</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="custom-radio" type="radio" id="female" name="sex" value="female" <?php echo ($sex == 'female') ? 'checked' : ''; ?>>
                                        <label class="radio-label" for="female">Female</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <label for="civil_status">
                                <h5 class="font-weight-bold">Civil Status</h5>
                            </label>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="custom-radio" type="radio" id="single" name="civil_status" value="single" <?php echo ($civil_status == 'single') ? 'checked' : ''; ?>>
                                        <label class="radio-label" for="single">Single</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="custom-radio" type="radio" id="married" name="civil_status" value="married" <?php echo ($civil_status == 'married') ? 'checked' : ''; ?>>
                                        <label class="radio-label" for="married">Married</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="custom-radio" type="radio" id="widowed" name="civil_status" value="widowed" <?php echo ($civil_status == 'widowed') ? 'checked' : ''; ?>>
                                        <label class="radio-label" for="widowed">Widowed</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <label for="house_no">
                        <h5 class="font-weight-bold">Address</h5>
                    </label>
                    <div class="row">
                        <div class="col-md-3">
                            <input class="form-control mb-3" type="text" id="house_no" name="house_no" placeholder="House Number" value="<?php echo $house_no; ?>">
                        </div>
                        <div class="col-md-3">
                            <input class="form-control mb-3" type="text" id="street" name="street" placeholder="Street" value="<?php echo $street; ?>">
                        </div>
                        <div class="col-md-3">
                            <input class="form-control mb-3" type="text" id="barangay" name="barangay" placeholder="Barangay" value="Canda" readonly>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control mb-3" type="text" id="city" name="city" placeholder="City" value="Balayan" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <hr>
                            <a href="user-profile.php" class="btn float-left font-weight-bold back">Back</a>

                            <input type="submit" class="btn float-right text-white font-weight-bold next" value="Next">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    function calculateAge(birthdate) {
        var today = new Date();
        var birthDate = new Date(birthdate);
        var age = today.getFullYear() - birthDate.getFullYear();
        var month = today.getMonth() - birthDate.getMonth();
        if (month < 0 || (month === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        document.getElementById('age').value = age;
    }
</script>