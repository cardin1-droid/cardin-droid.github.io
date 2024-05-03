<?php
session_start();

include "db_connect.php";

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
}

$contact_number = $profile_info['contact_number'];
$fourps = $profile_info['4ps'];
$house_acquisition = $profile_info['house_acquisition'];
$lot_ownership = $profile_info['lot_ownership'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contact_number = $_POST['contact_number'];
    $fourps = $_POST['4ps'];
    $house_acquisition = $_POST['house_acquisition'];
    $lot_ownership = $_POST['lot_ownership'];

    $sql_update = "UPDATE users SET 
    4ps = '$fourps',
    contact_number =  '$contact_number',
    house_acquisition = '$house_acquisition',
    lot_ownership = '$lot_ownership'
    WHERE username = '$username'";

    if ($conn->query($sql_update) === TRUE) {
        $conn->close();

        header("Location: b7_success.php");
        exit();
    }
}

include "head.php";

include "user-nav.php";
?>

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
            <li class="step-wizard-item ">
                <span class="progress-count">1</span>
                <span class="progress-label">Personal Information</span>
            </li>
            <li class="step-wizard-item ">
                <span class="progress-count">2</span>
                <span class="progress-label">Family Information</span>
            </li>
            <li class="step-wizard-item">
                <span class="progress-count">3</span>
                <span class="progress-label">Health Information</span>
            </li>
            <li class="step-wizard-item current-item">
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
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="four_ps_member">
                                    <h5 class="font-weight-bold">4P's Member</h5>
                                </label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="custom-radio" type="radio" id="fourPsYes" name="4ps" value="Yes" <?php echo ($fourps == 'Yes') ? 'checked' : ''; ?>>
                                        <label class="radio-label" for="fourPsYes">Yes</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="custom-radio" type="radio" id="fourPsNo" name="4ps" value="No" <?php echo ($fourps == 'No') ? 'checked' : ''; ?>>
                                        <label class="radio-label" for="fourPsNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="contact_number">
                                    <h5 class="font-weight-bold">Contact Number</h5>
                                </label>
                                <input type="text" class="form-control" id="contact_number" name="contact_number" value="<?php echo $contact_number; ?>" placeholder="Enter contact number" maxlength="11">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="house_acquisition">
                            <h5 class="font-weight-bold">House acquisition</h5>
                        </label>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1">
                                        <input class="custom-radio" type="radio" id="houseOwned" name="house_acquisition" value="owned" <?php echo ($house_acquisition == 'owned') ? 'checked' : ''; ?>>
                                    </div>
                                    <div class="col-md-11">
                                        <label class="radio-label" for="houseOwned">Owned</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1">
                                        <input class="custom-radio" type="radio" id="houseRented" name="house_acquisition" value="rented" <?php echo ($house_acquisition == 'rented') ? 'checked' : ''; ?>>
                                    </div>
                                    <div class="col-md-11">
                                        <label class="radio-label" for="houseRented">Rented</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1">
                                        <input class="custom-radio" type="radio" id="houseAmortized" name="house_acquisition" value="amortized" <?php echo ($house_acquisition == 'amortized') ? 'checked' : ''; ?>>
                                    </div>
                                    <div class="col-md-11">
                                        <label class="radio-label" for="houseAmortized">Being Amortized (hinuhulugan)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1">
                                        <input class="custom-radio" type="radio" id="houseOccupiedWithConsent" name="house_acquisition" value="occupied free with consent" <?php echo ($house_acquisition == 'occupied free with consent') ? 'checked' : ''; ?>>
                                    </div>
                                    <div class="col-md-11">
                                        <label class="radio-label" for="houseOccupiedWithConsent">Being occupied for free with consent (nakatira nang libre na may pahintulot)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1">
                                        <input class="custom-radio" type="radio" id="houseOccupiedWithoutConsent" name="house_acquisition" value="occupied free without consent" <?php echo ($house_acquisition == 'occupied free without consent') ? 'checked' : ''; ?>>
                                    </div>
                                    <div class="col-md-11">
                                        <label class="radio-label" for="houseOccupiedWithoutConsent">Being Occupied for free without consent (nakatira nang libre na walang pahintulot)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1">
                                        <input class="custom-radio" type="radio" id="houseCaretaker" name="house_acquisition" value="caretaker" <?php echo ($house_acquisition == 'caretaker') ? 'checked' : ''; ?>>
                                    </div>
                                    <div class="col-md-11">
                                        <label class="radio-label" for="houseCaretaker">Caretaker (taga-bantay ng bahay)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1">
                                        <input class="custom-radio" type="radio" id="houseFamilyOwned" name="house_acquisition" value="family owned" <?php echo ($house_acquisition == 'family owned') ? 'checked' : ''; ?>>
                                    </div>
                                    <div class="col-md-11">
                                        <label class="radio-label" for="houseFamilyOwned">Family owned (pagmamay-ari ng pamilya)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1">
                                        <input class="custom-radio" type="radio" id="houseGovernmentOwned" name="house_acquisition" value="government owned" <?php echo ($house_acquisition == 'government owned') ? 'checked' : ''; ?>>
                                    </div>
                                    <div class="col-md-11">
                                        <label class="radio-label" for="houseGovernmentOwned">Government owned (pagmamay-ari ng gobyerno)</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="lot_ownership">
                            <h5 class="font-weight-bold">Lot Ownership</h5>
                        </label>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1">
                                        <input class="custom-radio" type="radio" id="lotOwned" name="lot_ownership" value="owned" <?php echo ($lot_ownership == 'owned') ? 'checked' : ''; ?>>
                                    </div>
                                    <div class="col-md-11">
                                        <label class="radio-label" for="lotOwned">Owned</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1">
                                        <input class="custom-radio" type="radio" id="lotRented" name="lot_ownership" value="rented" <?php echo ($lot_ownership == 'rented') ? 'checked' : ''; ?>>
                                    </div>
                                    <div class="col-md-11">
                                        <label class="radio-label" for="lotRented">Rented</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1">
                                        <input class="custom-radio" type="radio" id="lotAmortized" name="lot_ownership" value="amortized" <?php echo ($lot_ownership == 'amortized') ? 'checked' : ''; ?>>
                                    </div>
                                    <div class="col-md-11">
                                        <label class="radio-label" for="lotAmortized">Being Amortized (hinuhulugan)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1">
                                        <input class="custom-radio" type="radio" id="lotOccupiedWithConsent" name="lot_ownership" value="occupied free with consent" <?php echo ($lot_ownership == 'occupied free with consent') ? 'checked' : ''; ?>>
                                    </div>
                                    <div class="col-md-11">
                                        <label class="radio-label" for="lotOccupiedWithConsent">Being occupied for free with consent (nakatira nang libre na may pahintulot)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1">
                                        <input class="custom-radio" type="radio" id="lotOccupiedWithoutConsent" name="lot_ownership" value="occupied free without consent" <?php echo ($lot_ownership == 'occupied free without consent') ? 'checked' : ''; ?>>
                                    </div>
                                    <div class="col-md-11">
                                        <label class="radio-label" for="lotOccupiedWithoutConsent">Being Occupied for free without consent (nakatira nang libre na walang pahintulot)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1">
                                        <input class="custom-radio" type="radio" id="lotCaretaker" name="lot_ownership" value="caretaker" <?php echo ($lot_ownership == 'caretaker') ? 'checked' : ''; ?>>
                                    </div>
                                    <div class="col-md-11">
                                        <label class="radio-label" for="lotCaretaker">Caretaker (taga-bantay ng bahay)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1">
                                        <input class="custom-radio" type="radio" id="lotFamilyOwned" name="lot_ownership" value="family owned" <?php echo ($lot_ownership == 'family owned') ? 'checked' : ''; ?>>
                                    </div>
                                    <div class="col-md-11">
                                        <label class="radio-label" for="lotFamilyOwned">Family owned (pagmamay-ari ng pamilya)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1">
                                        <input class="custom-radio" type="radio" id="lotGovernmentOwned" name="lot_ownership" value="government owned" <?php echo ($lot_ownership == 'government owned') ? 'checked' : ''; ?>>
                                    </div>
                                    <div class="col-md-11">
                                        <label class="radio-label" for="lotGovernmentOwned">Government owned (pagmamay-ari ng gobyerno)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-1">
                                        <input class="custom-radio" type="radio" id="lotPNROwned" name="lot_ownership" value="pnr" <?php echo ($lot_ownership == 'pnr') ? 'checked' : ''; ?>>
                                    </div>
                                    <div class="col-md-11">
                                        <label class="radio-label" for="lotPNROwned">PNR lot</label>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="b5_health.php" class="btn float-left font-weight-bold back" style=" border: 2px solid #202A5B;">Back</a>

                                <input type="submit" class="btn float-right text-white font-weight-bold next" value="Next">
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</section>