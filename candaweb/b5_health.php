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
    $answer = $profile_info["meals_daily"];
    $answer1 = $profile_info["herbal_plant"];
    $answer2 = $profile_info["vege_garden"];
    $answer3 = $profile_info["fam_plan"];
    $answer4 = $profile_info["therapy"];
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

    // Prepare and execute SQL query to update user profile information
    $sql_update = "UPDATE users SET meals_daily = ?, herbal_plant = ?, vege_garden = ?, fam_plan = ?, therapy = ? WHERE username = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ssssss", $answer, $answer1, $answer2, $answer3, $answer4, $username);

    if ($stmt_update->execute()) {
        // Redirect to a success page or do something else after updating the data
        header("Location: b6_info.php");
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
        margin-left: 10px;
    }
    

    .radio-label {
        display: inline-block;
        vertical-align: middle;
        margin-bottom: 1px;
        margin-left: 5px;
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
            <li class="step-wizard-item ">
                <span class="progress-count">1</span>
                <span class="progress-label">Personal Information</span>
            </li>
            <li class="step-wizard-item ">
                <span class="progress-count">2</span>
                <span class="progress-label">Family Information</span>
            </li>
            <li class="step-wizard-item current-item">
                <span class="progress-count">3</span>
                <span class="progress-label">Health Information</span>
            </li>
            <li class="step-wizard-item">
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

                    <label for="answer">
                        <h5 class="font-weight-bold">Health Information</h5>
                    </label>
                    <div class="row">
                        <div class="col-md-9">
                            <label for="answer">Does your family eat three meals a day? (Kumakain ba ang inyong pamilya nang tatlong beses araw araw?)</label>
                        </div>
                        <div class="col-md-3 d-flex align-items-center">
                            <input class="custom-radio"type="radio" id="yes" name="answer" value="yes" <?php echo ($answer == $yesValue) ? 'checked' : ''; ?>>
                            <label class="radio-label" for="yes">Yes</label>
                            <input class="custom-radio"type="radio" id="no" name="answer" value="no" <?php echo ($answer == $noValue) ? 'checked' : ''; ?>>
                            <label class="radio-label"for="no">No</label>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-9">
                            <label for="answer">Do you have herbal plants?(May taniman ba kayo nang halamang gamot?)</label>
                        </div>
                        <div class="col-md-3 d-flex align-items-center">
                            <input class="custom-radio"type="radio" id="yes" name="answer1" value="yes" <?php echo ($answer1 == $yesValue) ? 'checked' : ''; ?>>
                            <label class="radio-label"for="yes">Yes</label>
                            <input class="custom-radio"type="radio" id="no" name="answer1" value="no" <?php echo ($answer1 == $noValue) ? 'checked' : ''; ?>>
                            <label class="radio-label"for="no">No</label>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-9">
                            <label for="answer">Do you have a vegetable garden?(May taniman ba kayo nang gulay?)</label>
                        </div>
                        <div class="col-md-3 d-flex align-items-center">
                            <input class="custom-radio"type="radio" id="yes" name="answer2" value="yes" <?php echo ($answer2 == $yesValue) ? 'checked' : ''; ?>>
                            <label class="radio-label"for="yes">Yes</label>
                            <input class="custom-radio"type="radio" id="no" name="answer2" value="no" <?php echo ($answer2 == $noValue) ? 'checked' : ''; ?>>
                            <label class="radio-label"for="no">No</label>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-9">
                            <label for="answer">Do you practice family planning?(Gumagamit ba nang Family Planning ang inyong Pamilya?)</label>
                        </div>
                        <div class="col-md-3 d-flex align-items-center">
                            <input class="custom-radio"type="radio" id="yes" name="answer3" value="yes" <?php echo ($answer3 == $yesValue) ? 'checked' : ''; ?>>
                            <label class="radio-label"for="yes">Yes</label>
                            <input class="custom-radio"type="radio" id="no" name="answer3" value="no" <?php echo ($answer3 == $noValue) ? 'checked' : ''; ?>>
                            <label class="radio-label"for="no">No</label>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-9">
                            <label for="answer">Have you received theraphy, counseling or treatment in the past?</label>
                        </div>
                        <div class="col-md-3 d-flex align-items-center">
                            <input class="custom-radio"type="radio" id="yes" name="answer4" value="yes" <?php echo ($answer4 == $yesValue) ? 'checked' : ''; ?>>
                            <label class="radio-label"for="yes">Yes</label>
                            <input class="custom-radio"type="radio" id="no" name="answer4" value="no" <?php echo ($answer4 == $noValue) ? 'checked' : ''; ?>>
                            <label class="radio-label"for="no">No</label>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href="b3_household.php" class="btn float-left font-weight-bold back" style=" border: 2px solid #202A5B;">Back</a>

                            <input type="submit" class="btn float-right text-white font-weight-bold next" value="Next">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>












                    