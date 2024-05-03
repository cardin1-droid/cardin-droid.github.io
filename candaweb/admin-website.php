<?php
// Start session (if not already started)
session_start();

// Include database connection
include "db_connect.php";

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
	// Redirect to login page
	header("Location: user-index.php");
	exit;
}

// If the user is logged in, proceed with the rest of the page content
?>
<?php include "head.php"; ?>

<?php include "admin-nav.php"; ?>
<style>
	.service-link {
    text-decoration: none; /* Remove underline text decoration */
    color: white; /* Set text color to white */
}

.service-link:hover {
    text-decoration: none; /* Remove underline on hover */
}

.service-link:hover h1 {
    transform: scale(1.05); /* Increase the size of the text on hover */
    transition: transform 0.3s ease; /* Add a smooth transition effect */
}

</style>


<section style="padding: 70px;">
	<div class="row justify-content-center">
		<div class="container-fluid ">
			<div class="row mb-2">
				<div class="col-md-7 rounded p-2 float-left" style="color: #202A5B;">
					<h2 class="font-weight-bold">WEBSITE</h2>
				</div>
			</div>
			<div class="row bg-light rounded">
				<div class="col-md-12">
					<h3 class="font-weight-bold pl-2 pt-4">Edit CandaWeb</h3>
				</div>
			</div>
			<div class="row bg-light rounded text-center pb-4">
				<div class="col-md-4">
					<div class="card-body bg-canda pt-5 pb-5 rounded text-white">
						<a href="admin-announcements.php" class="service-link">
							<h1 class="font-weight-bold">Announcements</h1>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card-body bg-canda pt-5 pb-5 rounded text-white">
						<a href="admin-about.php" class="service-link">
							<h1 class="font-weight-bold">About</h1>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card-body bg-canda pt-5 pb-5 rounded text-white">
						<a href="admin-services.php" class="service-link">
							<h1 class="font-weight-bold">Services</h1>
						</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
