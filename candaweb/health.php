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
}

$first_name = $profile_info['first_name'];
$middle_name = $profile_info['middle_name'];
$last_name = $profile_info['last_name'];
$sex = $profile_info['sex'];
$civil_status = $profile_info['civil_status'];

// Determine the appropriate title based on sex and civil status
$title = '';
if ($sex === 'male') {
    $title = 'Mr.';
} elseif ($sex === 'female' && $civil_status === 'Single') {
    $title = 'Ms.';
} elseif ($sex === 'female' && ($civil_status === 'Married' || $civil_status === 'Widowed')) {
    $title = 'Mrs.';
}
// Get the current date
$current_date = date('d'); // Day
$current_month = date('F'); // Month
$current_year = date('Y'); // Year

// Fetch the Barangay Chairman or Chairwoman from the database
$officials_query = "SELECT name, position FROM officials WHERE position = 'Barangay Chairman' OR position = 'Barangay Chairwoman'";
$officials_result = $conn->query($officials_query);

$official_name = '';
$official_position = '';

if ($officials_result->num_rows > 0) {
    $official_info = $officials_result->fetch_assoc();
    $official_name = $official_info['name'];
    $official_position = $official_info['position'];
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

        /* CSS for making images smaller */
        .logo-img {
            max-width: 200px;
            /* Adjust the max-width as needed */
            height: auto;
        }

        .transparent-table {
            background-color: transparent;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .table {
            border-collapse: collapse !important;
        }

        .table td,
        .table th,
        .table tr {
            border: none !important;
        }

        p {
            font-size: 22px;
        }

        .pdn {
            padding-left: 30px;
            padding-right: 20px;
        }
    </style>
    <title>Clearance</title>
</head>

<body>
    <div class="container-fluid" style="margin-top: 50px;">
        <div class="container">
            <table class="table transparent-table">
                <tr>
                    <td class="text-center">
                        <img class="logo-img" src="uploads/canda-logo.jpg" alt="">
                    </td>
                    <td class="text-center">
                        <h5 class="text-center font-weight-bold">REPUBLIC OF THE PHILIPPINES</h5>
                        <h5 class="text-center font-weight-bold">PROVINCE OF BATANGAS</h5>
                        <h5 class="text-center font-weight-bold">MUNICIPALITY OF BALAYAN</h5>
                        <h5 class="text-center font-weight-bold">Barangay Canda</h5>
                    </td>
                    <td class="text-center">
                        <img class="logo-img" src="uploads/bayan-logo.jpg" alt="">
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                

                <tr>
                    <td colspan="4" class="text-center">
                        <h3 class="font-weight-bold">BARANGAY HEALTH CERTIFICATE</h3>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="4" class="text-left" style="padding-left: 80px; ">
                        <p>TO WHOM IT MAY CONCERN,</p>
                    </td>
                </tr>
                <tr>
    <td colspan="4" style="padding-left: 80px; padding-right:80px;">
        <p style="text-indent: 50px; text-align: justify;">This is to certify that <u><?php echo $title . ' ' . $first_name; ?> <?php echo strtoupper(substr($middle_name, 0, 1)); ?>. <?php echo $last_name; ?></u>, legal of age, residence of Barangay Canda, Balayan, Batangas.</p>
    </td>
</tr>

<tr>
    <td colspan="4" style="padding-left: 80px; padding-right:80px;">
        <p style="text-indent: 50px; text-align:justify;">It certifies further, that the following individual have been examined in the Barangay Health Center of Barangay Canda, Balayan Batangas and is found to be in good health condition as of <u><?php echo $current_date; ?></u> of <u><?php echo $current_month; ?></u> <u><?php echo $current_year; ?></u></p>
    </td>
</tr>
<tr>
    <td colspan="4" style="padding-left: 80px; padding-right:80px;">
        <p style="text-align:justify;">ISSUED this <u><?php echo $current_date; ?></u> of <u><?php echo $current_month; ?></u> <u><?php echo $current_year; ?></u> at Barangay CANDA, Balayan, Batangas. This document is not valid without the official seal.</p>
    </td>
</tr>
<tr>
    <td></td>
</tr>
<tr>
    <td></td>
</tr>
<tr>
    <td></td>
</tr>
<tr>
    <td></td>
</tr>
<tr>
    <td></td>
</tr>
<tr>
    <td></td>
</tr>
<tr>
    <td colspan="4">
        <p class="text-right"><b><?php echo $official_name; ?></b></p>
    </td>
</tr>
<tr>
    <td colspan="4">
        <p class="text-right"><b><?php echo $official_position; ?></b></p>
    </td>
</tr>

            </table>
        </div>
    </div>
</body>

</html>