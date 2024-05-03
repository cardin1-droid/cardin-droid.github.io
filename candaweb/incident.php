<?php
include "db_connect.php";

// Retrieve the incident ID from the URL
if (isset($_GET['id'])) {
    $incident_id = $_GET['id'];

    // Fetch the incident data from the database based on the ID
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM incident_reports WHERE id = ?");
    $stmt->bind_param("i", $incident_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Output the incident details
        while ($row = $result->fetch_assoc()) {
            // Output the incident details using PHP or HTML
            $incident_type = $row['incident_type'];
            $incident_date = $row['incident_date'];
            $location = $row['location'];
            $involved_person = $row['involved_person'];
            $narrative_details = $row['narrative_details'];
        }
    } else {
        // Handle case where no incident found with the provided ID
    }
} else {
    // Handle case where no incident ID provided in the URL
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="uploads/cwlogo.png">

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {

            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        .d td,
        .d th {
            border: none;
            /* Remove borders from all cells */
        }

        h3 {
            text-align: center;
        }

        p {
            text-align: justify;
        }

        /* Custom CSS class for table cells with borders */
        .bordered-cell {
            border: 1px solid #000;
        }

        /* Custom CSS class for adding separation between rows */
        .row-separator {
            height: 50px;
            /* Adjust the height as needed */
        }
    </style>
    <title>Incident Report</title>
</head>

<body>
    <div class="container-fluid" style="margin-top: 50px;">
        <div class="container">
            <table class="table transparent-table">
                <tr class="d">
                    <td class="text-center" colspan="2">
                        <h5 class="text-center font-weight-bold">REPUBLIC OF THE PHILIPPINES</h5>
                        <h5 class="text-center font-weight-bold">PROVINCE OF BATANGAS</h5>
                        <h5 class="text-center font-weight-bold">MUNICIPALITY OF BALAYAN</h5>
                        <h5 class="text-center font-weight-bold">Barangay Canda</h5>
                    </td>
                </tr>
                <tr class="d">
                    <td colspan="2"></td>
                </tr>
                <tr class="d">
                    <td colspan="2"></td>
                </tr>
                <tr class="d">
                    <td colspan="2" class="text-center">
                        <h3 class="font-weight-bold">INCIDENT REPORT FORM</h3>
                    </td>
                </tr>
                <tr class="row-separator"></tr> <!-- Add a row separator -->
            </table>
            <table class="table bordered-cell" style="border-top: 2px solid #000; margin-left:20px; margin-right:20px; width:100%;">
                <tr>
                    <th style="border-bottom: 1px solid black;padding-top:50px; padding-bottom:50px;">Type of Incident</th>
                    <td style="border-bottom: 1px solid black;padding-top:50px; padding-bottom:50px;"><?php echo isset($incident_type) ? ucfirst(strtolower($incident_type)) : ''; ?></td>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid black;padding-top:50px; padding-bottom:50px;">Date and Time of Incident</th>
                    <td style="border-bottom: 1px solid black;padding-top:50px; padding-bottom:50px;"><?php echo isset($incident_date) ? ucfirst(strtolower($incident_date)) : ''; ?></td>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid black;padding-top:50px; padding-bottom:50px;">Location of Incident</th>
                    <td style="border-bottom: 1px solid black;padding-top:50px; padding-bottom:50px;"><?php echo isset($location) ? ucfirst(strtolower($location)) : ''; ?></td>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid black;padding-top:50px; padding-bottom:50px;">Involved Person</th>
                    <td style="border-bottom: 1px solid black;padding-top:50px; padding-bottom:50px;"><?php echo isset($involved_person) ? ucfirst(strtolower($involved_person)) : ''; ?></td>
                </tr>
                <tr>
                    <th style="padding-top:50px; padding-bottom:50px;">Narrative Details</th>
                    <td style="padding-top:50px; padding-bottom:50px;"><?php echo isset($narrative_details) ? ucfirst(strtolower($narrative_details)) : ''; ?></td>
                </tr>
            </table>



        </div>
    </div>
</body>

</html>