<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: user-index.php");
    exit;
}
include "db_connect.php";
include "head.php";
include "admin-nav.php";
?>

<section style="padding-top: 70px;">
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-12 rounded p-2 float-left" style="color: #202A5B;">
                <h2 class="font-weight-bold">INCIDENT REPORTS</h2>
            </div>
        </div>
        <div class="container bg-light pb-5 mb-5 rounded">
            <div class="row ">
                <div class="col-md-12">
                    <table class="table table-bordered mt-4">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Incident Type</th>
                                <th>Date and Time</th>
                                <th>Location</th>
                                <th>Involved Person</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM incident_reports";
                            $result = $conn->query($sql);

                            if ($result !== false && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['incident_type'] . "</td>";
                                    echo "<td>" . $row['incident_date'] . "</td>";
                                    echo "<td>" . $row['location'] . "</td>";
                                    echo "<td>" . $row['involved_person'] . "</td>";
                                    echo '<td><button onclick="printPage(' . $row['id'] . ')" class="btn btn-primary btn-block"><i class="bi bi-printer"></i> Print</button></td>';

                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No records found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function printPage(id) {
        var features = 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=800,height=600';
        var url = 'incident.php?id=' + id;

        // Open a new window or tab with the desired page URL
        var newWindow = window.open(url, '_blank');
        
        // Once the new window is open, wait for it to load
        newWindow.onload = function() {
            // Call the print function for the new window
            newWindow.print();
        };
    }
</script>

