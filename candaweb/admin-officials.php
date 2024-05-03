<?php
// Start session (if not already started)
session_start();

// Include database connection
include_once "db_connect.php";

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
	// Redirect to login page
	header("Location: user-index.php");
	exit;
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['name'];
	$position = $_POST['position'];
	$image = $_FILES['image'];

	$targetDir = "uploads/";
	$targetFile = $targetDir . basename($image["name"]);
	if (move_uploaded_file($image["tmp_name"], $targetFile)) {
		$sql = "INSERT INTO officials (name, position, image_url) VALUES ('$name', '$position', '$targetFile')";
		if ($conn->query($sql) === TRUE) {
			$message = "<div class='container mt-3'><div class='alert alert-success' role='success'>Official added successfully.</div></div>";
		} else {
			$message = "Error: " . $sql . "<br>" . $conn->error;
		}
	} else {
		$message = "Sorry, there was an error uploading your file.";
	}
}
?>

<?php include "head.php"; ?>

<?php include "admin-nav.php"; ?>

<section id="content">

	<main>
		<style>
			.mid {
				background-color: white;
				width: 100%;
				margin-top: 10px;
				border-radius: 10px;
				padding: 15px;
			}

			.text-b-off {
				padding: 5px;
				margin: 5px;
				width: 100%;
			}

			.btn-off {
				margin: 5px;
			}
		</style>
		<div class="container mid">
			<div class="row">
				<?php if (!empty($message)) : ?>
					<p><?php echo $message; ?></p>
				<?php endif; ?>
				<div class="col-md-6">

					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
						<label for="name">Add Official</label><br>
						<input class="text-b-off" type="text" id="name" name="name" placeholder="Name" required><br>
						<input class="text-b-off" type="text" id="position" name="position" placeholder="Position" required><br>

						<input class="text-b-off" type="file" id="image" name="image" accept="image/*" required onchange="previewImage(this);"><br>
						<button type="submit" class="btn btn-success btn-off">Add Official</button>
					</form>
				</div>
				<div class="col-md-6">
					<img id="preview" src="#" alt="Image Preview" style="display: none; max-width: 275px; height: 275px;">
				</div>
			</div>
		</div>
		<?php
		include_once "db_connect.php";

		$sql = "SELECT * FROM officials";
		$result = $conn->query($sql);

		$conn->close();
		?>

		<div class="container mid">
			<label for="">Officials</label>
			<div class="row">
				<?php while ($row = $result->fetch_assoc()) : ?>
					<div class="col-md-4">
						<div class="card mb-4">
							<img src="<?php echo $row['image_url']; ?>" class="card-img-top" alt="Official Image" style=" max-width: 100%; height: 100%; max-height:275px;">
							<div class="card-body">
								<h5 class="card-title"><?php echo $row['name']; ?></h5>
								<p class="card-text"><?php echo $row['position']; ?></p>
								<div class="btn-group" role="group">
									<a href="admin-officials-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
									<a href="admin-officials-delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
								</div>
							</div>
						</div>
					</div>

				<?php endwhile; ?>
			</div>
		</div>



		<script>
			function previewImage(input) {
				var preview = document.getElementById('preview');
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
						preview.src = e.target.result;
						preview.style.display = 'block';
					}
					reader.readAsDataURL(input.files[0]);
				} else {
					preview.style.display = 'none';
				}
			}
		</script>
		<script src="script.js"></script>
		</body>

		</html>