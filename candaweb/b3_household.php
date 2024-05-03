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

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

$profile_info = [];

if ($result->num_rows > 0) {
    $profile_info = $result->fetch_assoc();
    $answer = $profile_info["household_condition"];
    $answer1 = $profile_info["family_condition"];
    $answer2 = $profile_info["family_info_q1"];
    $answer3 = $profile_info["family_info_q2"];
    $answer4 = $profile_info["family_info_q3"];
    $answer5 = $profile_info["family_info_q3_2"];
} else {
    $answer = ''; // Set default value if no data is retrieved
}

$yesValue = 'yes';
$noValue = 'no';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form submission to update user profile

    // Retrieve updated profile information from the form
    $answer = $_POST['answer'];
    $answer1 = $_POST['answer1'];
    $answer2 = $_POST['answer2'];
    $answer3 = $_POST['answer3'];
    $answer4 = $_POST['answer4'];
    $answer5 = $_POST['answer5'];

    // Prepare and execute SQL query to update user profile information
    $sql_update = "UPDATE users SET household_condition = ?, family_condition = ?, family_info_q1 = ?, family_info_q2 = ?, family_info_q3 = ?, family_info_q3_2 = ? WHERE username = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("sssssss", $answer, $answer1, $answer2, $answer3, $answer4, $answer5, $username);

    if ($stmt_update->execute()) {
        // Redirect to a success page or do something else after updating the data
        header("Location: b5_health.php");
        exit();
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

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
            <li class="step-wizard-item">
                <span class="progress-count">1</span>
                <span class="progress-label">Personal Information</span>
            </li>
            <li class="step-wizard-item current-item">
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
            <div class="col-md-8 mb-5" style="border-radius: 10px; background-color:#ECF2FF;">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" style="padding: 25px;">
                    <div class="row">
                        <div class="col-md-7">
                            <label for="answer">
                                <h5 class="font-weight-bold">Household Condition</h5>
                            </label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="custom-radio" type="radio" id="owner" name="answer" value="owner" <?php echo ($answer == 'owner') ? 'checked' : ''; ?>>
                                    <label class="radio-label" for="owner">Main Family</label>
                                </div>
                                <div class="col-md-6">
                                    <input class="custom-radio" type="radio" id="extended_family" name="answer" value="extended_family" <?php echo ($answer == 'extended_family') ? 'checked' : ''; ?>>
                                    <label class="radio-label" for="answer">Extended Family</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="answer">
                                <h5 class="font-weight-bold">Family Status</h5>
                            </label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="custom-radio" type="radio" id="active" name="answer1" value="active" <?php echo ($answer1 == 'active') ? 'checked' : ''; ?>>
                                            <label class="radio-label" for="active">Active</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input class="custom-radio" type="radio" id="inactive" name="answer1" value="inactive" <?php echo ($answer1 == 'inactive') ? 'checked' : ''; ?>>
                                            <label class="radio-label" for="inactive">Inactive</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="answer">
                        <h5 class="font-weight-bold">Family Information</h5>
                    </label>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-7">
                                    <p>1. Number of Family Members (Bilang ng Miyembro ng Pamilya)</h5>
                                </div>
                                <div class="col-md-5">
                                    <input class="text-center form-control mb-3" type="number" id="family_members" name="answer2" value="<?php echo $answer2; ?>"><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <p>2. Year the household head first resided in the barangay (Unang taon na nanirahan ang puno ng pamilya sa barangay)</h5>
                                </div>
                                <div class="col-md-5">
                                    <input class="text-center form-control mb-3" type="text" id="first_resided_year" name="answer3" pattern="\d{4}" placeholder="YYYY" maxlength="4" value="<?php echo $answer3; ?>"><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <p>3. Place of Origin of the Household Head (Lugar na pinang-galingan bago nanirahan sa barangay)</h5>
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="text-center form-control" type="text" id="place_of_origin_municipal" name="answer4" placeholder="Municipal" value="<?php echo $answer4; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="text-center form-control mb-3" type="text" id="place_of_origin_province" name="answer5" placeholder="Province" value="<?php echo $answer5; ?>"><br>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href="b1_personal.php" class="btn float-left font-weight-bold back" style=" border: 2px solid #202A5B;">Back</a>

                            <input type="submit" class="btn float-right text-white font-weight-bold next" value="Next">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>