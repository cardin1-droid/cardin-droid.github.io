<?php
include "db_connect.php";

// Define default sorting order
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';

// Define sorting icon class for Sex column
$sexSortIcon = $sort === 'sex' ? 'bi bi-caret-up-fill' : 'bi bi-caret-down';

// Construct SQL query based on sorting order
$sql = "SELECT * FROM users";

// Apply sorting if requested for Sex column
if ($sort === 'sex') {
    $sql .= " ORDER BY sex ASC";
}

$result = $conn->query($sql);

include "head.php";
include "admin-nav.php";
?>
<div class="text-center">
    <h3 class="font-weight-bold">Users Information</h3>
    <div class="container bg-light text-center" style="max-height: 300px; overflow-y: auto;">
        <div style="overflow-x:auto;">
            <table class="border-0 text-center" style="width:100%; table-layout: fixed;">
                <colgroup>
                    <col style="width: 50%;">
                    <col style="width: 10%;">
                    <col style="width: 10%;">
                    <col style="width: 30%;">
                </colgroup>
                <tr>
                    <th>Name</th>
                    <th>Sex<a href="?sort=sex"> <i class="<?= $sexSortIcon ?>"></i></a></th>
                    <th>Age</th>
                    <th>Contact Number</th>
                </tr>

                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $birthdate = new DateTime($row['birthdate']);
                        $today = new DateTime();
                        $age = $birthdate->diff($today)->y;

                        echo "<tr>
                            <td>" . ucfirst($row["last_name"]) . ", " . ucfirst($row["first_name"]) . " " . ucfirst($row["middle_name"]) . "</td>
                            <td>" . ucfirst($row["sex"]) . "</td>
                            <td>" . $age . "</td>
                            <td>" . ucfirst($row["contact_number"]) . "</td>
                        </tr>";
                    }
                } else {
                    echo "<tr>
                        <td colspan='4'>No data available</td>
                    </tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>
