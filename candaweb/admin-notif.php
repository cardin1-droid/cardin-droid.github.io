<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: user-index.php");
    exit;
}


include "head.php" ?>
<?php include 'admin-nav.php'; ?>

<section style="padding: 70px;">
    <div class="row justify-content-center">
        <div class="container-fluid ">
            <div class="row mb-2">
                <div class="col-md-7 rounded p-2 float-left" style="color: #202A5B;">
                    <h2 class="font-weight-bold">NOTIFICATIONS</h2>
                </div>
                <div class="col-md-5 rounded p-2 float-right" style="color: #202A5B; position: relative;">
                    <div style="position: absolute; left: 25px; top: 45%; transform: translateY(-50%);">
                        <i class="bi bi-search"></i>
                    </div>
                    <input type="text" class="form-control rounded-pill pl-5" id="searchInput" placeholder="Search..." style="padding-right: 40px;">
                </div>
            </div>
            <div class="row bg-light rounded">
                <div class="col-md-12">
                    <h3 class="font-weight-bold pl-2 pt-4">Contacts</h3>
                </div>
            </div>
            <div class="row bg-light">
                <div class="col-md-12">
                    <div class="container bg-light text-center" style="height: 430px; overflow-y: auto;padding-bottom: 15px;">
                        <table class="table">
                            <colgroup>
                                <col style="width: 70%;">
                                <col style="width: 20%;">
                                <col style="width: 10%;">

                            </colgroup>
                            <thead>
                                <tr>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Include database connection
                                include "db_connect.php";

                                // Fetch data from contact_messages table
                                // Fetch data from contact_messages table in descending order
                                $sql = "SELECT * FROM contact_messages ORDER BY created_at DESC";
                                $result = mysqli_query($conn, $sql);
                                // Check if any rows were returned
                                if (mysqli_num_rows($result) > 0) {
                                    // Output data of each row
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        // Check if name is empty
                                        $name = !empty($row["name"]) ? ucfirst($row["name"]) : "Unknown";
                                        echo "<tr class='data-row'>";
                                        echo "<td style='display: flex; align-items: center;'><a href='#' data-toggle='modal' data-target='#messageModal' onclick=\"setMessageContent('" . $row["message"] . "')\">" . $name . "</a><span style='flex-shrink: 0; margin-left: 10px; max-width: 700px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'>" . $row["message"] . "</span></td>";
                                        echo "<td>" . $row["created_at"] . "</td>";
                                        echo "<td><button type='button' class='btn btn-danger btn-block' data-toggle='modal' data-target='#deleteConfirmationModal' onclick='prepareDelete(" . $row["id"] . ")'>Remove</button></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>No messages found.</td></tr>";
                                }

                                // Close connection
                                mysqli_close($conn);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">Message Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="messageModalContent">
                <!-- PHP will dynamically populate the message content here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this message?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <form id="deleteForm" action="admin-notif-delete.php" method="post">
                    <input type="hidden" id="messageId" name="message_id" value="">
                    <button type="submit" class="btn btn-danger">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // Function to set message content dynamically
    function setMessageContent(message) {
        document.getElementById('messageModalContent').innerHTML = message;
    }

    // Function to set the message ID in the delete form
    function prepareDelete(messageId) {
        document.getElementById('messageId').value = messageId;
    }
</script>
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
</script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>