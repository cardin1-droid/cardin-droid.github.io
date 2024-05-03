<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: user-index.php");
    exit;
}

include "db_connect.php";
// Check if the username is set and not empty
if (isset($_GET['username']) && !empty($_GET['username'])) {
    // Sanitize the username parameter to prevent SQL injection
    $username = $_GET['username'];

    // Prepare a delete statement
    $stmt = $conn->prepare("DELETE FROM users WHERE username = ?");

    if ($stmt) {
        // Bind the username parameter to the prepared statement
        $stmt->bind_param("s", $username);

        // Execute the prepared statement
        if ($stmt->execute()) {
            header("Location: admin-data2.php");
        }
        $stmt->close();
    }
    exit; // Stop further execution
}

// Continue with the rest of your code

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


<section style="padding-top: 70px;">
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-7 rounded p-2 float-left" style="color: #202A5B;">
                <h2 class="font-weight-bold">RESIDENTS DATA</h2>    
            </div>
            <div class="col-md-5 rounded p-2 float-right" style="color: #202A5B; position: relative;">
                <div style="position: absolute; left: 25px; top: 45%; transform: translateY(-50%);">
                    <i class="bi bi-search"></i>
                </div>
                <input type="text" class="form-control rounded-pill pl-5" id="searchInput" placeholder="Search..." style="padding-right: 40px;">
            </div>
        </div>

        <div class="row bg-light rounded">
            <div class="col-md-11">
                
            </div>
            <div class="col-md-1 rounded p-2 float-right pt-4" style="color: #202A5B;">
                <button onclick="printPage()" class="btn btn-primary btn-block"><i class="bi bi-printer"></i>Print</button>
                
            </div>
            <div class="container bg-light text-center" style="height: 430px; overflow-y: auto;padding-bottom: 15px;">
                <div style="overflow-x:auto;">
                    <table id="dataTable" class="border-0 text-center" style="width:100%; table-layout: fixed;">
                        <colgroup>
                            <col style="width: 10%;">
                            <col style="width: 15%;">
                            <col style="width: 5%;">
                            <col style="width: 5%;">
                            <col style="width: 10%;">
                            <col style="width: 10%;">
                            <col style="width: 5%;">
                        </colgroup>

                        <tr>
                            <th>Profile Picture</th>
                            <th>Full Name</th>
                            <th>Sex<a href="?sort=sex"> <i class="<?= $sexSortIcon ?>"></i></a></th>
                            <th>Age</th>
                            <th>Civil Status</th>
                            <th>Contact Number</th>
                            <th></th>
                        </tr>

                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $birthdate = new DateTime($row['birthdate']);
                                $today = new DateTime();
                                $age = $birthdate->diff($today)->y;


                                echo "<tr class='data-row'>"; // Add class 'data-row' for easier targeting
                                echo "<td><img src='" . $row["profile_picture"] . "' style='width: 50px; height: 50px; border-radius: 50%;'></td>";
                                echo "<td>" . ucfirst($row["last_name"]) . ", " . ucfirst($row["first_name"]) . " " . ucfirst($row["middle_name"]) . "</td>";
                                echo "<td>" . ucfirst($row["sex"]) . "</td>";
                                echo "<td>" . $age . "</td>";
                                echo "<td>" . ucfirst($row["civil_status"]) . "</td>";
                                echo "<td>" . ucfirst($row["contact_number"]) . "</td>";
                                echo "<td><a href=\"#\" class=\"btn btn-danger delete-button\" data-username=\"" . $row['username'] . "\"><i class=\"bi bi-trash\"></i></a></td>";
                                
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No data available</td></tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function printPage() {
        var features = 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=800,height=600';

        // Open a new window or tab with the desired page URL
        var newWindow = window.open('admin-print.php', '_blank');
        
        // Once the new window is open, wait for it to load
        newWindow.onload = function() {
            // Call the print function for the new window
            newWindow.print();
        };
    }
</script>
<script>
    // jQuery function to handle delete button click
    $(document).on('click', '.delete-button', function(event) {
        event.preventDefault(); // Prevent the default behavior of the anchor tag
        
        // Retrieve the username from the delete button's data attribute
        var username = $(this).data('username');

        // Show a confirmation dialog before deleting the user data
        var confirmDelete = confirm('Are you sure you want to delete this data?');
        
        // If the user confirms the deletion, proceed with the deletion
        if (confirmDelete) {
            // Redirect to the current page with the username parameter to trigger the deletion
            window.location.href = 'admin-data2.php?username=' + username;
        }
    });
</script>
<script src="jquery-3.7.1.min.js"></script>
<script src="sweetalert2.all.min.js"></script>
<script>
    document.getElementById("searchInput").addEventListener("input", function() {
        var searchText = this.value.toLowerCase();

        var rows = document.querySelectorAll("tbody .data-row");

        for (var i = 0; i < rows.length; i++) {
            var found = false;
            var cells = rows[i].getElementsByTagName("td");

            // Loop through each cell in the row
            for (var j = 0; j < cells.length; j++) {
                var cellText = cells[j].innerText.toLowerCase();
                if (cellText.includes(searchText)) {
                    found = true;
                    break; // If found in any column, break the loop
                }
            }

            if (found) {
                rows[i].classList.remove("hidden"); // Show the row
            } else {
                rows[i].classList.add("hidden"); // Hide the row
            }
        }
    });
    ///sucess delete ito
    $('.btn-delete').on('click', function(e){
        e.preventDefault();
        const href = $(this).attr('href')

        Swal.fire({
            title: 'Are You Sure?',
            text: 'Record Will be Deleted?',
            type: 'warning',
            showCancelButton: true,
            confirmationButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmationButtonText: 'Delete Record',
        }).then((result) => {
                 if (result.value){
                     document.location.href = href;
            }
        })
    })


    const flashdata = $('.flash-data').data('flashdata')
        if(flashdata) {
            Swal.fire({
                type: 'sucess',
                title: 'Sucess',
                text: 'Ang iyong record ay na delete na hampas lupa'
            })
        }
</script>
