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
    $sex = $profile_info["sex"];
    $civil_status = $profile_info["civil_status"];
    $house_no = $profile_info["house_number"];
    $street = $profile_info["street"];
    $city = $profile_info["city"];
    $barangay = $profile_info["barangay"];

} else {
    $answer = ''; // Set default value if no data is retrieved
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form submission to update user profile

    // Retrieve updated profile information from the form
    $sex = $_POST["sex"];
    $civil_status = $_POST["civil_status"];
    $house_no = $_POST["house_no"];
    $street = $_POST["street"];
    $city = "Balayan";
    $barangay = "Canda";

    // Prepare and execute SQL query to update user profile information
    $updateSql = "UPDATE users SET sex = ?, civil_status = ?, house_number = ?, street = ?, city = ?, barangay = ? WHERE username = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("sssssss", $sex, $civil_status, $house_no, $street, $city, $barangay, $username);

    if ($updateStmt->execute()) {
        // Redirect to a success page or do something else after updating the data
        header("Location: b3_household.php");
        exit();
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

?>


<?php include "head.php"; ?>
<?php include "user-nav.php"; ?>

<style>
#cont3{
    position: relative;
    padding: 0;
    height: 50vh;
}
#cont4{
    box-shadow: 2px 2px 5px black;
    border-radius: 10px;
    height: 35vh;
    margin-left:5rem ;
    width: 63vw;
    background-color: #B5C0D0;
}
#sx > button{
    margin-left: 29rem;
    margin-top: 4.4rem;
    width: 4rem;
}
#sx > a{
    margin-left: 29rem;
    margin-top: 7rem;
}

#sx > input[type='radio'] {
    border: none;
    width: 25px;
    height: 30px;
    position: absolute;
    margin-top: 39px ;
    margin-left: 53px ;
    
}

#sx label{
    color:#1565c0;
    font-size: 18px;
    font-weight: bold; 
    margin-left:3.4rem;
    padding-left: 30px;
    padding-right: 30px;
    padding-bottom: 0;
    padding-top: 35px;
}
#cs label{
    color:#1565c0;
    font-size: 18px;
    font-weight: bold; 
    margin-left:3.4rem;
    padding-left: 30px;
    padding-bottom: 0;
    padding-top: 10px;
}
#cs > input[type='radio'] {
    border: none;
    width: 25px;
    height: 30px;
    position: absolute;
    margin-top: 15px ;
    margin-left: 52px ;
}
#ad > input{
    box-shadow: 1px 1px 3px black;
    border: none;
    border-radius: 10px;
    padding: 10px 10px;
    width: 8rem;
}

</style>

<div class="container" id="cont3">
    <h1 class="text-center"style="margin-top:80px;color: #1565c0; font-weight: bold;"id="">Personal Information</h1>
    <div class="container" id="cont4">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <div class="form-group" id="sx">
                <label for="sex"style="font-size: 25px;margin-left: 2.3rem;">Sex:</label>
                <input type="radio" id="male" name="sex" value="male" <?php echo ($sex == 'male') ? 'checked' : ''; ?> id="nm">
                <label for="male">Male</label >
                <input type="radio" id="female" name="sex" value="female" <?php echo ($sex == 'female') ? 'checked' : ''; ?> id="nm">
                <label for="female">Female</label>
                <a href="b1_personal.php" class="btn btn-primary"style="position: absolute;">Back</a>
                <button type="submit" class="btn btn-success" style="position: absolute;">next</button>
            </div>
            <div class="form-group" id="cs">
                <label for="civil_status" style="font-size: 25px;margin-left: 2.1rem;">Civil Status:</label>
                <input type="radio" id="single" name="civil_status" value="single" <?php echo ($civil_status == 'single') ? 'checked' : ''; ?>>
                <label for="single"id="c2">Single</label>
                <input type="radio" id="married" name="civil_status" value="married" <?php echo ($civil_status == 'married') ? 'checked' : ''; ?>>
                <label for="married"id="c2">Married</label>
                <input type="radio" id="widowed" name="civil_status" value="widowed" <?php echo ($civil_status == 'widowed') ? 'checked' : ''; ?>>
                <label for="widowed"id="c2">Widowed</label>
            </div>
            <div class="form-group" id="ad">
                <label for="civil_status" style="font-size: 25px;font-weight: bold;color: #1565c0;margin-left: 4rem;margin-top: 1rem;">Address:</label>
                <input class="text-center"style="margin-left: 2rem;"type="text" id="house_no" name="house_no" placeholder="House Number" value="<?php echo $house_no; ?>">
                <input class="text-center"style="margin-left: 2rem; type="text" id="street" name="street" placeholder="Street" value="<?php echo $street; ?>">
                <input class="text-center"style="margin-left: 2rem; type="text" id="barangay" name="barangay" placeholder="Barangay" value="Canda" readonly>
                <input class="text-center"style="margin-left: 2rem;type="text" id="city" name="city" placeholder="City" value="Balayan" readonly>
            </div>
        </form>
    </div>
</div>