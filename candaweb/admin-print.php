<?php
session_start();

include "db_connect.php";

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: user-index.php");
    exit;
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

?>
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-bordered" style="width: 100%;">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Sex</th>
                    <th>Age</th>
                    <th>Civil Status</th>
                    <th>Contact Number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $birthdate = new DateTime($row['birthdate']);
                        $today = new DateTime();
                        $age = $birthdate->diff($today)->y;

                        echo "<tr>
                                <td>" . ucfirst($row["first_name"]) . " " . ucfirst($row["middle_name"]) . " " . ucfirst($row["last_name"]) . "</td>
                                <td>" . ucfirst($row["sex"]) . "</td>
                                <td>$age</td>
                                <td>" . ucfirst($row["civil_status"]) . "</td>
                                <td>" . $row["contact_number"] . "</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No data available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Include Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php include "footer.php"; ?>
