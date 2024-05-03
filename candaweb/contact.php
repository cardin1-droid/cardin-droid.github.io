<?php 
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: user-index.php");
    exit;
}
include "head.php";
include 'user-nav.php'; ?>
<!-- Button trigger modal -->
<style>
    .mt-10{
margin-top: 5rem;

    }
</style>
<!-- Modal -->
<div class="container mt-10">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="modal-content">
                <div class="modal-header bg-canda justify-content-center">
                    <h2 class="modal-title text-white font-weight-bold">Contact Us</h2>
                </div>
                <div class="modal-body">
                    <?php
                    // Include database connection
                    include "db_connect.php";

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Escape user inputs for security
                        $name = mysqli_real_escape_string($conn, $_POST['name']);
                        $email = mysqli_real_escape_string($conn, $_POST['email']);
                        $message = mysqli_real_escape_string($conn, $_POST['message']);

                        // Attempt to insert data into database
                        $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";
                        if (mysqli_query($conn, $sql)) {
                            echo '<div class="alert alert-success">Your message has been saved successfully.</div>';
                        } else {
                            echo '<div class="alert alert-danger">Sorry, there was an error saving your message. Please try again later.</div>';
                        }

                        // Close connection
                        mysqli_close($conn);
                    }
                    ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Optional">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Enter your message..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success float-right ">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>