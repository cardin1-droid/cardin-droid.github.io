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
    <div class="container">
        <?php
        echo "<table border='1'>";
        echo "<tr>
            <th>Username</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Sex</th>
            <th>Age</th>
            <th>Options</th>
        </tr>";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $birthdate = new DateTime($row['birthdate']);
                $today = new DateTime();
                $age = $birthdate->diff($today)->y;

                echo "<tr>
        <td>" . ucfirst($row["username"]) . "</td>
        <td>" . ucfirst($row["first_name"]) . "</td>
        <td>" . ucfirst($row["middle_name"]) . "</td>
        <td>" . ucfirst($row["last_name"]) . "</td>
        <td>" . ucfirst($row["sex"]) . "</td>
        <td>" . $age . "</td>
        <td><button type='button' class='btn btn-primary viewButton' data-toggle='modal' data-target='#popupModal' 
            data-username='" . $row["username"] . "' 
            data-email='" . $row["email"] . "' 
            data-firstname='" . ucfirst($row["first_name"]) . "' 
            data-middlename='" . ucfirst($row["middle_name"]) . "' 
            data-lastname='" . ucfirst($row["last_name"]) . "' 
            data-sex='" . ucfirst($row["sex"]) . "' 
            data-age='" . $age . "'
            data-birthdate='" . $row["birthdate"] . "'
            data-civil_status='" . ucfirst($row["civil_status"]) . "'
            data-house_number='" . $row["house_number"] . "'
            data-street='" . ucfirst($row["street"]) . "'
            data-city='" . ucfirst($row["city"]) . "'
            data-household_condition='" . ucfirst($row["household_condition"]) . "'
            data-family_condition='" . ucfirst($row["family_condition"]) . "'
            data-family_info_q1='" . ucfirst($row["family_info_q1"]) . "'
            data-family_info_q2='" . ucfirst($row["family_info_q2"]) . "'
            data-family_info_q3='" . ucfirst($row["family_info_q3"]) . "'
            data-family_info_q3_2='" . ucfirst($row["family_info_q3_2"]) . "'
            data-meals_daily='" . ucfirst($row["meals_daily"]) . "'
            data-herbal_plant='" . ucfirst($row["herbal_plant"]) . "'
            data-vege_garden='" . ucfirst($row["vege_garden"]) . "'
            data-fam_plan='" . ucfirst($row["fam_plan"]) . "'
            data-therapy='" . ucfirst($row["therapy"]) . "'
        '>View</button></td>
    </tr>";
            }
        } else {
            echo "<tr>
                <td colspan='6'>No data available</td>
            </tr>";
        }

        echo "</table>";

        ?>
    </div>

<div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="popupModalLabel">User Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="userDetailsContent">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Field</th>
                            <th>Value</th>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td id="username"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td id="email"></td>
                        </tr>
                        <tr>
                            <td>First Name</td>
                            <td id="firstname"></td>
                        </tr>
                        <tr>
                            <td>Middle Name</td>
                            <td id="middlename"></td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td id="lastname"></td>
                        </tr>
                        <tr>
                            <td>Sex</td>
                            <td id="sex"></td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td id="age"></td>
                        </tr>
                        <tr>
                            <td>Birthdate</td>
                            <td id="birthdate"></td>
                        </tr>
                        <tr>
                            <td>Civil Status</td>
                            <td id="civil_status"></td>
                        </tr>
                        <tr>
                            <td>House Number</td>
                            <td id="house_number"></td>
                        </tr>
                        <tr>
                            <td>Street</td>
                            <td id="street"></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td id="city"></td>
                        </tr>
                        <tr>
                            <td>Household Condition</td>
                            <td id="household_condition"></td>
                        </tr>
                        <tr>
                            <td>Family Condition</td>
                            <td id="family_condition"></td>
                        </tr>
                        <tr>
                            <td>No. Family Members</td>
                            <td id="family_info_q1"></td>
                        </tr>
                        <tr>
                            <td>Year Resided</td>
                            <td id="family_info_q2"></td>
                        </tr>
                        <tr>
                            <td>Municipality Origin</td>
                            <td id="family_info_q3"></td>
                        </tr>
                        <tr>
                            <td>Province Origin</td>
                            <td id="family_info_q3_2"></td>
                        </tr>
                        <tr>
                            <td>Meals Daily</td>
                            <td id="meals_daily"></td>
                        </tr>
                        <tr>
                            <td>Herbal Plant</td>
                            <td id="herbal_plant"></td>
                        </tr>
                        <tr>
                            <td>Vege Garden</td>
                            <td id="vege_garden"></td>
                        </tr>
                        <tr>
                            <td>Fam Plan</td>
                            <td id="fam_plan"></td>
                        </tr>
                        <tr>
                            <td>Therapy</td>
                            <td id="therapy"></td>
                        </tr>
                        <!-- Add more rows for other fields as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Function to fetch and display user details in the modal
    $(document).on('click', '.viewButton', function() {
        var username = $(this).data('username');
        var email = $(this).data('email');
        var firstname = $(this).data('firstname');
        var middlename = $(this).data('middlename');
        var lastname = $(this).data('lastname');
        var birthdate = $(this).data('birthdate');
        var birthdate = $(this).data('birthdate');
        var age = calculateAge(birthdate);

        function calculateAge(birthdate) {
            var today = new Date();
            var dob = new Date(birthdate);
            var ageDiff = today.getTime() - dob.getTime();
            var ageDate = new Date(ageDiff);
            return Math.abs(ageDate.getUTCFullYear() - 1970);
        }

        var sex = $(this).data('sex');
        var civil_status = $(this).data('civil_status');
        var house_number = $(this).data('house_number');
        var street = $(this).data('street');
        var city = $(this).data('city');
        var household_condition = $(this).data('household_condition');
        var family_condition = $(this).data('family_condition');
        var family_info_q1 = $(this).data('family_info_q1');
        var family_info_q2 = $(this).data('family_info_q2');
        var family_info_q3 = $(this).data('family_info_q3');
        var family_info_q3_2 = $(this).data('family_info_q3_2');
        var meals_daily = $(this).data('meals_daily');
        var herbal_plant = $(this).data('herbal_plant');
        var vege_garden = $(this).data('vege_garden');
        var fam_plan = $(this).data('fam_plan');
        var therapy = $(this).data('therapy');

        $('#username').text(username);
        $('#email').text(email);
        $('#firstname').text(firstname);
        $('#middlename').text(middlename);
        $('#lastname').text(lastname);
        $('#birthdate').text(birthdate);
        $('#age').text(age);
        $('#sex').text(sex);
        $('#civil_status').text(civil_status);
        $('#house_number').text(house_number);
        $('#street').text(street);
        $('#city').text(city);
        $('#household_condition').text(household_condition);
        $('#family_condition').text(family_condition);
        $('#family_info_q1').text(family_info_q1);
        $('#family_info_q2').text(family_info_q2);
        $('#family_info_q3').text(family_info_q3);
        $('#family_info_q3_2').text(family_info_q3_2);
        $('#meals_daily').text(meals_daily);
        $('#herbal_plant').text(herbal_plant);
        $('#vege_garden').text(vege_garden);
        $('#fam_plan').text(fam_plan);
        $('#therapy').text(therapy);
    });
</script>

<?php include "footer.php"; ?>