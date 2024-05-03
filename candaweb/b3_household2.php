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
#cont5{
    color: #1565c0;
    position: relative;
    padding: 0;
    height: 70vh;
}
#cont6{
    box-shadow: 2px 2px 5px black;
    border-radius: 10px;
    height: 60vh;
    margin-left:5rem ;
    width: 63vw;
    background-color: #B5C0D0;
}
#df{
    position: relative;
}
#st > input[type='radio'] {
    border: none;
    width: 25px;
    height: 30px;
    position: absolute;
    margin-left: 8rem;
    margin-top: 0px;
}
#as{
    padding-top: 2rem;
}
#hc > input[type='radio'] {
    border: none;
    width: 25px;
    height: 30px;
    position: absolute;
    margin-left: 2.2rem;
    margin-top: 0px;
}
#hcr{
    padding-top: 2rem;
}
#hc label, #st label{
    font-weight: bold;
    margin-top: 2px;
}
#qs{
    width: 50vw;
    margin: 2rem 5rem;
}
#qs input{
    border: none;
    padding: 10px 10px;
    margin-bottom: 1rem;
    border-radius: 10px;
    box-shadow: 1px 1px 3px black;
}
</style>

<div class="container"id="cont5">
    <h1 class="text-center" style="margin-top: 80px;font-weight: bold;">Family Information</h1>
    <div class="container"id="cont6">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="container d-flex">
                <div>
                    <h5 style="font-size: 25px;font-weight: bold;margin-left: 3rem;"class="text-center"id="hcr">Household Condition</h5>
                    <div class="d-flex" id="hc">
                        <input type="radio" id="owner" name="answer" value="owner" <?php echo ($answer == 'owner') ? 'checked' : ''; ?>>
                        <label style="margin-left: 4rem;"for="owner">Owner (Main Family)</label><br>
                        <input style="margin-left: 16.5rem;"type="radio" id="extended_family" name="answer" value="extended_family" <?php echo ($answer == 'extended_family') ? 'checked' : ''; ?>>
                        <label style="margin-left: 4rem;"for="answer">Extended Family</label><br>
                    </div>
                </div>
                <div id="fd">
                    <h5 style="margin-left: 10rem;font-size: 25px;font-weight: bold;" id="as">Active Status</h5> 
                    <div class="d-flex" id="st">
                        <input type="radio" id="active" name="answer1" value="active" <?php echo ($answer1 == 'active') ? 'checked' : ''; ?>id="df">
                        <label style="margin-left: 10rem;"for="active">Active</label><br>
                        <input style="margin-left: 16.5rem;"type="radio" id="inactive" name="answer1" value="inactive" <?php echo ($answer1 == 'inactive') ? 'checked' : ''; ?>>
                        <label style="margin-left: 5rem;"for="inactive">Inactive</label><br>
                        <a href="b2_personal.php" class="btn btn-primary"style="position: absolute;margin-left:32rem;margin-top: 2.6rem;">Back</a>
                        <button type="submit" class="btn btn-success"style="position: absolute; margin-left:32rem;width: 4rem;">next</button>
                    </div>
                </div>
            </div>
            <div id="qs">
                <h5>1. Number of Family Members (Bilang ng Miyembro ng Pamilya)</h5>
                <input class="text-center"type="number" id="family_members" name="answer2" value="<?php echo $answer2; ?>"><br>
                <h5>2. Year the household head first resided in the barangay
                    (Unang taon na nanirahan ang puno ng pamilya sa barangay)
                </h5>
                <input class="text-center"type="text" id="first_resided_year" name="answer3" pattern="\d{4}" placeholder="YYYY" maxlength="4" value="<?php echo $answer3; ?>"><br>
                <h5>3. Place of Origin of the Household Head (Lugar na pinang-galingan bago nanirahan sa barangay)</h5>
                <input class="text-center"type="text" id="place_of_origin_municipal" name="answer4" placeholder="Municipal" value="<?php echo $answer4; ?>">
                <input class="text-center" style="margin-left: 2rem;" type="text" id="place_of_origin_province" name="answer5" placeholder="Province" value="<?php echo $answer5; ?>"><br>
            </div>
        </form>
    </div>
    </body>

    </html>