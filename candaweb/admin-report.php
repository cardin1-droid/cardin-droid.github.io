<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: user-index.php");
    exit;
}
include "db_connect.php";
include "head.php";
include "admin-nav.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gather form data
    $incident_type = $_POST['incident_type'];
    $incident_date = $_POST['incident_date'];
    $location = $_POST['location'];
    $involved_person = $_POST['involved_person'];
    $narrative_details = $_POST['narrative_details'];

    // Insert data into the database
    $sql = "INSERT INTO incident_reports (incident_type, incident_date, location, involved_person, narrative_details) VALUES ('$incident_type', '$incident_date', '$location', '$involved_person', '$narrative_details')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<section style="padding-top: 70px;">
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-12 rounded p-2 float-left" style="color: #202A5B;">
                <h2 class="font-weight-bold">INCIDENT REPORT</h2>
            </div>
        </div>
        <div class="container bg-light pb-5 mb-5">
            <div class="row ">
                <div class="col-md-12">
                    <h3 class="font-weight-bold pl-2 pt-4">Fill Up</h3>
                </div>
            </div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="incident_type">Type of Incident:</label>
                    <input type="text" class="form-control" id="incident_type" name="incident_type" required>
                </div>
                <div class="form-group">
                    <label for="incident_date">Date and Time of Incident:</label>
                    <input type="datetime-local" class="form-control" id="incident_date" name="incident_date" required>
                </div>
                <div class="form-group">
                    <label for="location">Exact Location of Incident:</label>
                    <input type="text" class="form-control" id="location" name="location" required>
                </div>
                <div class="form-group">
                    <label for="involved_person">Involved Person/Specific Identification:</label>
                    <input type="text" class="form-control" id="involved_person" name="involved_person" required>
                </div>
                <div class="form-group">
                    <label for="narrative_details">Narrative Details of the Incident:</label>
                    <textarea class="form-control" id="narrative_details" name="narrative_details" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary float-right mb-2">Submit</button>
            </form>
        </div>
    </div>
</section>